<?php

/**********************************************************************************
 * Objetivo: Arquivo para criar a conexão com o BD Mysql
 * Autor: Luiz Gustavo
 * Data: 29/12/2023
 * Versão: 1.0
 ***********************************************************************************/

//constantes para estabelecer a conexão com o BD (local do BD, usuário, senha e database)
const SERVER = 'localhost';
const USER = 'root';
const PASSWORD = '1529dev';
const DATABASE = 'db_php_apirest';

function conexaoDB(){
    //Se a conexão for estabelecida com o BD, iremos ter um array de dados sobre a conexão
    $conexao = new mysqli(SERVER, USER, PASSWORD, DATABASE);

    if($conexao->connect_errno){
        echo "Falha ao conectar: (" . $conexao->connect_errno . ") " . $conexao->connect_errno;
    }else
    
    return $conexao;   
};

/*
    Existem 3 formas de criar a conexão com o BD Mysql
        
        mysql_connect() - versão antiga do PHP de fazer a conexão com BD 
            (Não oferece performance e segurança)
        
        mysqli_connect() - versão mais atualizada do PHP de fazer a conexão com BD
            (ela permite ser utilizada para programação estruturada e POO)
        
        PDO() - versão mais completa e eficiente para conexão com BD
            (é indicada pela segurança e POO)
 
 */
?>