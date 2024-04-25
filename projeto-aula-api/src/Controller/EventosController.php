<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

/**
 * Eventos Controller
 *
 * @method \App\Model\Entity\Evento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventosController extends AppController
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

        if (!$autorizacao->validate($token)) {
            $response = $response->withType('application/json')->withStringBody(json_encode('Erro de autenticação'));
            return $response;
        }

        $eventos = $this->paginate($this->Eventos);
        $response = $response->withType('application/json')->withStringBody(json_encode($eventos));

        return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Evento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
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

        $evento = $this->Eventos->get($id);
        $response = $response->withType('application/json')->withStringBody(json_encode($evento));

        return $response;
    }
}
