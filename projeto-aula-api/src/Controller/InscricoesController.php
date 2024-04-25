<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

/**
 * Inscricoes Controller
 *
 * @method \App\Model\Entity\Inscrico[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InscricoesController extends AppController
{
    /**
     * Index method
     *
     * @param string|null $id Inscrico id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function index($id = null)
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

//        debug('teste');exit;

        $this->paginate = [
            'conditions' => ['usuario_id' => $id],
        ];

        $inscricoes = $this->paginate($this->Inscricoes);
        $response = $response->withType('application/json')->withStringBody(json_encode($inscricoes));

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

        $inscricaoEntity = $this->Inscricoes->newEmptyEntity();
        if ($this->request->is('post') && $this->request->input('json_decode')) {
            $data = $this->request->input('json_decode', true);

            $inscricaoEntity->usuario_id = $data['id_usuario'];
            $inscricaoEntity->evento_id = $data['id_evento'];
            $inscricaoEntity->data_inscricao = $data['data_inscricao'];

            if ($this->Inscricoes->save($inscricaoEntity)) {
                $response = $response->withType('application/json')->withStringBody(json_encode($inscricaoEntity->id));

                return $response;
            } else {
                $response = new \Cake\Http\Response();
                $response = $response->withType('application/json')->withStringBody(json_encode('Erro ao adicionar inscrição'));

                return $response;
            }
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Inscrico id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     */
    public function delete($id = null)
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

        $this->request->allowMethod(['delete']);
        $inscricao = $this->Inscricoes->get($id);
        if ($this->Inscricoes->delete($inscricao)) {
            $response = $response->withType('application/json')->withStringBody(json_encode('Inscrição deletada com sucesso.'));
        } else {
            $response = $response->withType('application/json')->withStringBody(json_encode('Inscrição não encontrada.'));
        }

        return $response;
    }
}
