<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Presencas Controller
 *
 * @method \App\Model\Entity\Presenca[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PresencasController extends AppController
{
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

        $presencaEntity = $this->Presencas->newEmptyEntity();
        if ($this->request->is('post') && $this->request->input('json_decode')) {
            $data = $this->request->input('json_decode', true);

            $presencaEntity->usuario_id = $data['id_usuario'];
            $presencaEntity->evento_id = $data['id_evento'];
            $presencaEntity->data_presenca = $data['data_presenca'];

            if ($this->Presencas->save($presencaEntity)) {
                $response = $response->withType('application/json')->withStringBody(json_encode($presencaEntity->id));
            } else {
                $response = $response->withType('application/json')->withStringBody(json_encode('Erro ao adicionar presença'));
            }

            return $response;
        }
    }
}
