<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
// use App\Models\NomeModel;
use Exception;

class UploadApiController extends ResourceController
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
    public function index($parameter = NULL)
    {
        # Parâmentros para receber um POST
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

    # route POST /www/upload/api/send/(:any)
    # route GET /www/upload/api/send/(:any)
    # Informação sobre o controller
    # retorno do controller [JSON]
    public function toExecute($parameter = NULL)
    {
        # Parâmentros para receber um POST
        $request = service('request');
        $processRequest = (array)$request->getVar();
        // $processRequest = eagarScagaire($processRequest);
        // myPrint($processRequest, 'www\codeigniter4\src\app\Controllers\UploadApiController.php');
        $myPathUpload = (isset($processRequest['mySelect'])) ? ($processRequest['mySelect']) : ('undefined');
        #
        try {
            $file = $this->request->getFile('myFile');
            if (!$file->isValid()) {
                $dbResponse = 'Erro ao realizar o Upload!';
            } else {
                $dbResponse = 'Upload realizado com sucesso!';
            }

            $extension = $file->getExtension();
            $fileName = "nomeArquivo_" . strtoupper(md5(password_hash(time() . date('Y-m-d H:i:s'), PASSWORD_DEFAULT))) . '.' . $extension;
            $fileType = $file->getMimeType();
            $fileSize = $file->getSize();

            // Validar tipos de arquivos (imagens, áudios, vídeos)
            if (!preg_match('/^(image|audio|video)\//', $fileType)) {
                return redirect()->back();
                // throw new \Exception('Tipo de arquivo não permitido.');
            }

            // Validar tamanho do arquivo (até 5MB)
            if ($fileSize > 5242880) { // 5MB em bytes
                return redirect()->back();
                // throw new \Exception('O arquivo excede o tamanho máximo permitido de 5MB.');
            }

            $file->move(WRITEPATH . 'uploads/' . $myPathUpload, $fileName);

            $apiRespond = [
                'HTTP/1.1' => array(
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'method'  => 'GET/POST',
                ),
                'message' => 'API loading data (dados para carregamento da API)',
                'date' => date('Y-m-d'),
                // 'method' => '__METHOD__',
                // 'function' => '__FUNCTION__',
                'page_title' => 'API Para Upload',
                'result' => $dbResponse,
            ];
            $response = $this->response->setJSON($apiRespond, 201);
            // myPrint($response, 'www\codeigniter4\src\app\Controllers\UploadApiController.php');
        } catch (\Exception $e) {
            $apiRespond = array(
                'message' => array('danger' => $e->getMessage()),
                'page_title' => 'ERRO: API Para Upload',
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
