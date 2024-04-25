<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $response = new \Cake\Http\Response();

        $authorizationHeader = $this->request->getHeaderLine('Authorization');
        $token = str_replace('Bearer ', '', $authorizationHeader);
        $autorizacao = new \App\auxiliares\AutenticaToken();
        $logs = new \App\auxiliares\RegistraLogs();
        $logs->logRequest($this->request, $this->response);

        if (!$autorizacao->validate($token)) {
            $response = $response->withType('application/json')->withStringBody(json_encode('Erro de autenticação'));
            return $response;
        }

        $usuarios = $this->paginate($this->Usuarios);
        $response = $response->withType('application/json')->withStringBody(json_encode($usuarios));

        return $response;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $response = new \Cake\Http\Response();
        $authorizationHeader = $this->request->getHeaderLine('Authorization');
        $token = str_replace('Bearer ', '', $authorizationHeader);
        $autorizacao = new \App\auxiliares\AutenticaToken();
        $logs = new \App\auxiliares\RegistraLogs();
        $logs->logRequest($this->request, $this->response);

        if (!$autorizacao->validate($token)) {
            $response = $response->withType('application/json')->withStringBody(json_encode('Erro de autenticação'));
            return $response;
        }

        $usuarioEntity = $this->Usuarios->newEmptyEntity();
        if ($this->request->is('post') && $this->request->input('json_decode')) {
            $data = $this->request->input('json_decode', true);

            $usuarioEntity->nome = $data['nome'];
            $usuarioEntity->email = $data['email'];
            $usuarioEntity->senha = password_hash($data['senha'], PASSWORD_DEFAULT);

            if ($this->Usuarios->save($usuarioEntity)) {
                $response = $response->withType('application/json')->withStringBody(json_encode($usuarioEntity->id));
            } else {
                $response = $response->withType('application/json')->withStringBody(json_encode('Erro ao adicionar usuário'));
            }

            return $response;
        }
    }

    public function autenticar()
    {
        $response = new \Cake\Http\Response();
        $authorizationHeader = $this->request->getHeaderLine('Authorization');
        $token = str_replace('Bearer ', '', $authorizationHeader);
        $autorizacao = new \App\auxiliares\AutenticaToken();
        $logs = new \App\auxiliares\RegistraLogs();
        $logs->logRequest($this->request, $this->response);

        if (!$autorizacao->validate($token)) {
            $response = $response->withType('application/json')->withStringBody(json_encode('Erro de autenticação'));
            return $response;
        }

        if ($this->request->is('post') && $this->request->input('json_decode')) {
            $data = $this->request->input('json_decode', true);

            if (!isset($data['email']) || !isset($data['senha'])) {
                return $this->response->withStatus(400)->withStringBody(json_encode(['error' => 'Campos incompletos']));
            }

            $usuario = $this->Usuarios->findByEmail($data['email'])->first();

            if ($usuario && password_verify($data['senha'], $usuario->senha)) {
                $response =  $response->withType('application/json')->withStringBody(json_encode('Autenticação bem-sucedida'));
            } else {
                $response =  $response->withType('application/json')->withStringBody(json_encode('Credenciais inválidas'));
            }
        }

        return $response;
    }
}
