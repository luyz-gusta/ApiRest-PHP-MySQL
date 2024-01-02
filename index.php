<?php

/**********************************************************************************
 * Objetivo: Arquivo de rotas da api
 * Autor: Luiz Gustavo
 * Data: 29/12/2023
 * Versão: 1.0
 ***********************************************************************************/

header("Access-Control-Allow-Origin: *");

header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

header('Content-Type: application/json');

require_once('./vendor/autoload.php');
require_once('./src/controller/usuarioController.php');
include('./src/modulo/config.php');

$config = ['settings' => ['displayErrorDetails' => true]];

$app = new \Slim\App($config);

$app->post('/usuario', function ($request, $response, $args) {

    $contentTypeHeader = $request->getHeaderLine('Content-Type');

    $contentType =  explode(";", $contentTypeHeader);

    if ($contentType[0] == 'application/json') {
        $dadosBody = $request->getParsedBody();

        $arrayDados = array($dadosBody);

        $resposta = adicionarUsuario($arrayDados);

        return $response->withStatus($resposta['status'])
            ->withHeader('Content-Type', 'application/json')
            ->write(json_encode($resposta));
    }

    switch ($contentType[0]) {

        case 'application/json':


            break;

        case 'multipart/form-data':

        default:

            return $response->withStatus(415)
                ->withHeader('Content-Type', 'application/json')
                ->write('{"status": 415, "message": "O tipo de mídia Content-type da solicitação não é compatível com o servidor. Tipo aceito:[application/json]"}');

            break;
    }
});

//endpoint: retorna todos os dados de contatos
$app->get('/usuario', function ($request, $response, $args) {

    $dadosUsuario = getUsers();

    return $response->withStatus($dadosUsuario['status'])
        ->withHeader('Content-Type', 'application/json')
        ->write(json_encode($dadosUsuario));
});

$app->get('/usuario/{id}', function ($request, $response, $args) {

    $id = $args['id'];

    $dadosUsuario = getUserByID($id);

    return $response->withStatus($dadosUsuario['status'])
        ->withHeader('Content-Type', 'application/json')
        ->write(json_encode($dadosUsuario));
});

$app->run();
