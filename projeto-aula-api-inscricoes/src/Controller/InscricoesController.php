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

        $auth = new \App\auxiliares\AutenticaUser();
        $verificado = $auth->verificaUsuario($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);

        if (!$verificado) {
            $response = $response->withType('application/json')->withStringBody(json_encode('Erro de autenticação'));
            return $response;
        }

        $cliente = new \Cake\Http\Client();
        $url = "http://localhost:3000/inscricoes/{$id}";
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
        $url = "http://localhost:3000/inscricoes";
        $token = 'f0347912e1c9b20f27145f58887c0497';

        $resposta = $cliente->post($url, $this->request->getBody()->getContents(), [
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ]
        ]);

        $body = $resposta->getBody()->getContents();

        if ($body) {
            $response = $response->withType('application/json')->withStringBody(json_encode($body));
        } else {
            $response = $response->withType('application/json')->withStringBody(json_encode('Erro ao receber dados da API FULL'));
        }

        return $response;
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

        $auth = new \App\auxiliares\AutenticaUser();
        $verificado = $auth->verificaUsuario($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);

        if (!$verificado) {
            $response = $response->withType('application/json')->withStringBody(json_encode('Erro de autenticação'));
            return $response;
        }

        $cliente = new \Cake\Http\Client();
        $url = "http://localhost:3000/inscricoes/{$id}";
        $token = 'f0347912e1c9b20f27145f58887c0497';

        $resposta = $cliente->delete($url, [], [
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ]
        ]);

        $body = $resposta->getBody()->getContents();

        if (strpos($body, 'com sucesso') || strpos($body,  'não encontrada')) {
            $response = $response->withType('application/json')->withStringBody($body);
        } else {
            $response = $response->withType('application/json')->withStringBody(json_encode('Erro ao receber dados da API FULL'));
        }

        return $response;
    }
}
