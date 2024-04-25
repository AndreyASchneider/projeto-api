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

        $auth = new \App\auxiliares\AutenticaUser();
        $verificado = $auth->verificaUsuario($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);

        if (!$verificado) {
            $response = $response->withType('application/json')->withStringBody(json_encode('Erro de autenticação'));
            return $response;
        }

        $cliente = new \Cake\Http\Client();
        $url = "http://localhost:3000/usuarios";
        $token = 'f0347912e1c9b20f27145f58887c0497';

        $resposta = $cliente->get($url, [], [
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ]
        ]);

        $body = $resposta->getBody()->getContents();
        $jsonData = json_decode($body, true);

        if (json_last_error() === JSON_ERROR_NONE && $jsonData !== null) {
            $response = $response->withType('application/json')->withStringBody($body);
        } else {
            $response = $response->withType('application/json')->withStringBody(json_encode('Erro ao receber dados da API FULL'));
        }

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

        $auth = new \App\auxiliares\AutenticaUser();
        $verificado = $auth->verificaUsuario($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);

        if (!$verificado) {
            $response = $response->withType('application/json')->withStringBody(json_encode('Erro de autenticação'));
            return $response;
        }

        $cliente = new \Cake\Http\Client();
        $url = "http://localhost:3000/usuarios";
        $token = 'f0347912e1c9b20f27145f58887c0497';

        $resposta = $cliente->post($url, $this->request->getBody()->getContents(), [
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ]
        ]);

        $body = $resposta->getBody()->getContents();

        if ($body) {
            $response = $response->withType('application/json')->withStringBody($body);
        } else {
            $response = $response->withType('application/json')->withStringBody(json_encode('Erro ao receber dados da API FULL'));
        }

        return $response;
    }

    public function autenticar()
    {
        $response = new \Cake\Http\Response();

        $auth = new \App\auxiliares\AutenticaUser();
        $verificado = $auth->verificaUsuario($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);

        if (!$verificado) {
            $response = $response->withType('application/json')->withStringBody(json_encode('Erro de autenticação'));
            return $response;
        }

        $cliente = new \Cake\Http\Client();
        $url = "http://localhost:3000/autenticacao";
        $token = 'f0347912e1c9b20f27145f58887c0497';

        $resposta = $cliente->post($url, $this->request->getBody()->getContents(), [
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ]
        ]);

        $body = $resposta->getBody()->getContents();

        if (strpos($body, 'bem-sucedida') || strpos($body,  'Credenciais')) {
            $response = $response->withType('application/json')->withStringBody($body);
        } else {
            $response = $response->withType('application/json')->withStringBody(json_encode('Erro ao receber dados da API FULL'));
        }

        return $response;
    }
}
