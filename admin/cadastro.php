<?php

    require_once('conexao.php');
    header('content-type: application/json; charset-UTF-8');
    header('Access-Control-Allow-Methods: POST, GET');

    $data = file_get_contents("php://input");
    $objData =  json_decode($data);

    $nome       = $objData->nome;
    $email      = $objData->email;
    $senha      = $objData->senha;

    $dataCad    = date('Y-m-d');
    $status     = 'ATIVO';
    $foto       = 'cliente/user.png';

    $nome       = stripslashes($nome);
    $email      = stripslashes($email);
    $senha      = stripslashes($senha);

    $nome       = trim($nome);
    $email      = trim($email);
    $senha      = trim($senha);

    $dados;

    $conexao    = Conexao::LigarConexao();
    $conexao->exec("SET NAMES UTF8");

    if($conexao){
        $query = $conexao->prepare("INSERT INTO cliente (nomeCliente, emailCliente, senhaCliente, statusCliente, dataCadCliente, fotoCliente) 
        VALUES ('".$nome."','".$email."','".$senha."','".$status."','".$dataCad."','".$foto."')");

        $query->execute();

        $dados = array('mensagem' => 'Dados Inseridos com sucesso');

        echo json_encode($dados);
    }else
    {
        $dados =array('mensagem' => 'Não foi possivel realizar o cadastro.');
        echo json_encode($dados);
    }
?>