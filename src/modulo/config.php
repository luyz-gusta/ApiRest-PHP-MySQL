<?php

/*********************************************************************************************************
 * Objetivo: Arquivo de rotas da api
 * Autor: Luiz Gustavo
 * Data: 29/12/2023
 * Versão: 1.0
 *********************************************************************************************************/

/*************************************** MENSAGENS DE ERRO ***************************************/

$errorRequiredFields = array(
    'status' => 400,
    'message' => 'Campos obrigatórios não foram preenchidos devidamente.'
);

$errorRegisterNotFound = array(
    'status' => 404,
    'message' => 'O servidor não encontrouo o recurso solicitado.'
);

$errorInternalServer = array(
    'status' => 500,
    'message' => 'Devido a um erro interno no servidor, não foi possível processar a requisição.',
);

/*************************************** MENSAGENS DE SUCESSO ***************************************/
$sucessRequest = array(
    'status' => 200,
    'message' => 'Requisição bem sucedida.'
);

$sucessCreateItem = array(
    'status'    => 201,
    'message'   => 'Item criado com sucesso.'
);

?>
