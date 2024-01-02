<?php

/**********************************************************************************
 * Objetivo: Arquivo responsavel pela maniupulação de dados dos usuários
 * Autor: Luiz Gustavo
 * Data: 29/12/2023
 * Versão: 1.0
 ***********************************************************************************/

require_once('./src/model/DAO/usuario.php');
include './src/modulo/config.php';

function adicionarUsuario($dadosUsuario){

    global $errorRequiredFields;
    global $sucessCreateItem;
    global $errorInternalServer;

    if(
        empty($dadosUsuario[0]['nome']) || is_numeric($dadosUsuario[0]['nome']) || strlen($dadosUsuario[0]['nome']) > 150 ||
        empty($dadosUsuario[0]['data_nascimento']) || is_numeric($dadosUsuario[0]['data_nascimento']) || strlen($dadosUsuario[0]['data_nascimento']) > 10 ||
        empty($dadosUsuario[0]['email']) || is_numeric($dadosUsuario[0]['email']) || strlen($dadosUsuario[0]['email']) > 255 ||
        empty($dadosUsuario[0]['profissao']) || is_numeric($dadosUsuario[0]['profissao']) || strlen($dadosUsuario[0]['profissao']) > 100
    ){
        return $errorRequiredFields;
    }else{

        $jsonUser = array(
            "nome" => $dadosUsuario[0]['nome'],
            "data_nascimento" => $dadosUsuario[0]['data_nascimento'],
            "email" => $dadosUsuario[0]['email'],
            "profissao" => $dadosUsuario[0]['profissao']
        );

        if(insertUser($jsonUser)){
            $newUser = selectUserLastID();

            $jsonResponse = array(
                'status' => $sucessCreateItem["status"],
                'message' => $sucessCreateItem["message"],
                'data' => $newUser[0]
            );

            return $jsonResponse;
        }else{
            return $errorInternalServer;
        }
    }
};

function getUsers(){
    global $errorInternalServer;
    global $sucessRequest;

    $dados = selectAllUsers();

    if (!empty($dados)) {

        $jsonResponse = array(
            'status' => $sucessRequest['status'],
            'message' => $sucessRequest['message'],
            'quantidade' => count($dados),
            'data' => $dados
        );

        return $jsonResponse;
    } else {
        return $errorInternalServer;
    }
}

function getUserByID($id){
    global $errorRegisterNotFound;
    global $sucessRequest;

    $dados = selectUserByID($id);

    if (!empty($dados)) {

        $jsonResponse = array(
            'status' => $sucessRequest['status'],
            'message' => $sucessRequest['message'],
            'quantidade' => count($dados),
            'data' => $dados[0]
        );

        return $jsonResponse;
    } else {
        return $errorRegisterNotFound;
    }
}