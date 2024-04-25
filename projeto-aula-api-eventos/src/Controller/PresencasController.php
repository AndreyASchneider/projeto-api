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

        $auth = new \App\auxiliares\AutenticaUser();
        $verificado = $auth->verificaUsuario($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);

        if (!$verificado) {
            $response = $response->withType('application/json')->withStringBody(json_encode('Erro de autenticação'));
            return $response;
        }

        $cliente = new \Cake\Http\Client();
        $url = "http://localhost:3000/presencas";
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
}
