<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Email\Email;
// use App\Models\NomeModel;
use Exception;

class MailApiController extends ResourceController
{
    use ResponseTrait;
    private $ModelResponse;
    private $uri;

    public function __construct()
    {
        // $this->ModelResponse = new NomeModel();
        $this->uri = new \CodeIgniter\HTTP\URI(current_url());
    }

    # route POST /www/sigla/rota
    # route GET /www/sigla/rota
    # Informação sobre o controller
    # retorno do controller [JSON]
    # Parâmentros para receber um POST
    public function index($parameter = NULL)
    {
        $request = service('request');
        $processRequest = (array)$request->getVar();
        // $processRequest = eagarScagaire($processRequest);
        #
        try {
            if ($processRequest !== array()) {
                # CRUD da Model
                // $dbResponse[] = $this->ModelResponse->dBcreate($processRequest);
                // $dbResponse[] = $this->ModelResponse->dBread($IdUFF = NULL);
                // $dbResponse[] = $this->ModelResponse->dBupdate($IdUFF = NULL);
                // $dbResponse[] = $this->ModelResponse->dBdelete($IdUFF = NULL);
            } else {
                # CRUD da Model
                // $dbResponse[] = $this->ModelResponse->dBcreate($parameter);
                // $dbResponse[] = $this->ModelResponse->dBread($parameter = NULL);
                // $dbResponse[] = $this->ModelResponse->dBupdate($parameter = NULL);
                // $dbResponse[] = $this->ModelResponse->dBdelete($parameter = NULL);
            };
            $apiRespond = [
                'HTTP/1.1' => array(
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'method'  => 'GET/POST',
                ),
                'message' => 'API loading data (dados para carregamento da API)',
                'date' => date('Y-m-d'),
                // 'method' => '__METHOD__',
                // 'function' => '__FUNCTION__',
                'page_title' => 'TITLE PAGE',
                // 'result' => $dbResponse,
            ];
            $response = $this->response->setJSON($apiRespond, 201);
        } catch (\Exception $e) {
            $apiRespond = array(
                'message' => array('danger' => $e->getMessage()),
                'page_title' => 'TITLE PAGE',
            );
            // $this->returnFunction(array($e->getMessage()), 'danger',);
            $response = $this->response->setJSON($apiRespond, 404);
        }
        if ($parameter != 'json') {
            return redirect()->back();
            // return redirect()->to('project/endpoint/parameter/parameter/' . $parameter);
        } else {
            return $response;
        }
    }

    # route POST /www/mail/api/send/(:any)
    # route GET /www/mail/api/send/(:any)
    # Informação sobre o controller
    # retorno do controller [JSON]
    public function mail($parameter = NULL)
    {
        # Configurações em : C:\laragon\www\codeigniter4\src\app\Config\Email.php
        # Parâmentros para receber um POST
        $request = service('request');
        $processRequest = (array)$request->getVar();
        // $processRequest = eagarScagaire($processRequest);
        $assunto = 'Protocolo de teste de E-mail: ' . md5(password_hash(date('Y-m-d H:i:s'), PASSWORD_DEFAULT));
        #
        try {
            $email = \Config\Services::email();
            // Configurações do E-mail
            // $email->setFrom('codeigniter4@habilidade.com', 'Gustavo Hammes');
            $email->setTo('gustavo@habilidade.com');
            $email->setSubject($assunto);
            $email->setMessage('Conteúdo do seu e-mail. ' . password_hash(date('Y-m-d H:i:s'), PASSWORD_DEFAULT));
            // Enviar o e-mail
            if ($email->send()) {
                $data = 'E-mail enviado com sucesso!';
            } else {
                $data = $email->printDebugger(['headers']);
            }
            $apiRespond = [
                'HTTP/1.1' => array(
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'method'  => 'GET/POST',
                ),
                'message' => 'API loading data (dados para carregamento da API)',
                'date' => date('Y-m-d'),
                // 'method' => '__METHOD__',
                // 'function' => '__FUNCTION__',
                'page_title' => 'Envio de E-mail',
                // 'result' => $dbResponse,
            ];
            $apiRespond = [
                'HTTP/1.1' => array(
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'method'  => 'GET/POST',
                ),
                'message' => 'API loading data (dados para carregamento da API)',
                'date' => date('Y-m-d'),
                // 'method' => '__METHOD__',
                // 'function' => '__FUNCTION__',
                'page_title' => 'API para envio de e-mail',
                'result' => $data,
            ];
            $response = $this->response->setJSON($apiRespond, 201);
        } catch (\Exception $e) {
            $apiRespond = array(
                'message' => array('danger' => $e->getMessage()),
                'page_title' => 'API para envio de e-mail',
            );
            // $this->returnFunction(array($e->getMessage()), 'danger',);
            $response = $this->response->setJSON($apiRespond, 404);
        }
        if ($parameter == 'json') {
            return redirect()->back();
            // return redirect()->to('project/endpoint/parameter/parameter/' . $parameter);
        } else {
            return $response;
        }
    }
}
