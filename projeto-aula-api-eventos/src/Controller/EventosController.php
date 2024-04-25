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

        $auth = new \App\auxiliares\AutenticaUser();
        $verificado = $auth->verificaUsuario($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);

        if (!$verificado) {
            $response = $response->withType('application/json')->withStringBody(json_encode('Erro de autenticação'));
            return $response;
        }

        $cliente = new \Cake\Http\Client();
        $url = "http://localhost:3000/eventos";
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
     * View method
     *
     * @param string|null $id Evento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $response = new \Cake\Http\Response();

        $auth = new \App\auxiliares\AutenticaUser();
        $verificado = $auth->verificaUsuario($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);

        if (!$verificado) {
            $response = $response->withType('application/json')->withStringBody(json_encode('Erro de autenticação'));
            return $response;
        }

        $cliente = new \Cake\Http\Client();
        $url = "http://localhost:3000/eventos/{$id}";
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
}
