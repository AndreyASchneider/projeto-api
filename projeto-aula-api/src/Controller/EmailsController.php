<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * Emails Controller
 *
 * @property \App\Model\Table\EmailsTable $Emails
 * @method \App\Model\Entity\Email[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $emails = $this->paginate($this->Emails);
        $this->set(compact('emails'));
        $this->viewBuilder()->setOption('serialize', ['emails']);
    }

    /**
     * View method
     *
     * @param string|null $id Email id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $email = $this->Emails->get($id);
        $this->set(compact('email'));
        $this->viewBuilder()->setOption('serialize', ['email']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->is('post') && $this->request->input('json_decode')) {
            $data = $this->request->input('json_decode', true);
            $response = new \Cake\Http\Response();
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '';
            $mail->Password = '';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom($data['remetente'], '');
            $mail->addAddress($data['destinatario'], '');

            $mail->isHTML();
            $mail->Subject = $data['assunto'];
            $mail->Body = $data['mensagem'];

            if ($mail->send()) {
                $response = $response->withType('application/json')->withStringBody(json_encode("E-mail enviado com sucesso."));
            } else {
                $response = $response->withType('application/json')->withStringBody(json_encode("Falha ao enviar o e-mail."));
            }

            return $response;
        }
    }
}
