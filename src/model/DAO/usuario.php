<?php

/**********************************************************************************
 * Objetivo: Arquivo de manipulação dos dados do usuário dentro do BD
 * Autor: Luiz Gustavo
 * Data: 29/12/2023
 * Versão: 1.0
 ***********************************************************************************/

require_once('./src/model/conexaoMySql.php');

function insertUser($dataUser)
{

    //declaração de variavel para utilizar no return desta função
    $statusResposta = (bool) false;

    $conexao = conexaoDB();

    //Monta o script para enviar para o BD
    $sql = "insert into tbl_usuario(
        nome,
        data_nascimento,
        email,
        profissao
    )values(
        '" . $dataUser['nome'] . "', 
        '" . $dataUser['data_nascimento'] . "', 
        '" . $dataUser['email'] . "', 
        '" . $dataUser['profissao'] . "'
    );";

    //Executa o scriipt no BD
    //Validação para veririficar se o script sql esta correto
    if (mysqli_query($conexao, $sql)) {
        //Validação para verificar se uma linha foi acrescentada no DB
        if (mysqli_affected_rows($conexao))
            $statusResposta = true;
    }

    return $statusResposta;
};

function selectAllUsers()
{
    $conexao = conexaoDB();

    $sql = "select * from tbl_usuario order by id asc";

    $result = mysqli_query($conexao, $sql);

    if ($result) {

        $cont = 0;

        while ($rsDados = mysqli_fetch_assoc($result)) {

            $arrayDados[$cont] = array(
                "id"                =>  $rsDados['id'],
                "nome"              =>  $rsDados['nome'],
                "data_nascimento"   =>  $rsDados['data_nascimento'],
                "email"             =>  $rsDados['email'],
                "profissao"         =>  $rsDados['profissao']
            );
            $cont++;
        }

        if (isset($arrayDados))
            return $arrayDados;
        else
            return false;
    }
}

function selectUserLastID()
{
    $conexao = conexaoDB();

    $sql = "select * from tbl_usuario order by id desc limit 1";

    $result = mysqli_query($conexao, $sql);

    if ($result) {

        $cont = 0;

        while ($rsDados = mysqli_fetch_assoc($result)) {

            $arrayDados[$cont] = array(
                "id"                =>  $rsDados['id'],
                "nome"              =>  $rsDados['nome'],
                "data_nascimento"   =>  $rsDados['data_nascimento'],
                "email"             =>  $rsDados['email'],
                "profissao"         =>  $rsDados['profissao']
            );
            $cont++;
        }

        if (isset($arrayDados))
            return $arrayDados;
        else
            return false;
    }
}

function selectUserByID($id)
{
    $conexao = conexaoDB();

    $sql = "select * from tbl_usuario where id=" . $id;

    $result = mysqli_query($conexao, $sql);

    if ($result) {

        $cont = 0;

        while ($rsDados = mysqli_fetch_assoc($result)) {

            $arrayDados[$cont] = array(
                "id"                =>  $rsDados['id'],
                "nome"              =>  $rsDados['nome'],
                "data_nascimento"   =>  $rsDados['data_nascimento'],
                "email"             =>  $rsDados['email'],
                "profissao"         =>  $rsDados['profissao']
            );
            $cont++;
        }

        if (isset($arrayDados))
            return $arrayDados;
        else
            return false;
    }
}
