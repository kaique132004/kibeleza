<?php

    require_once('conexao.php');
    header('content-type: application/json; charset-UTF-8');
    header('Access-Control-Allow-Methods: POST, GET');
    header('Access-Control-Allow-Origin: *');

    $data = file_get_contents("php://input");
    $objData =  json_decode($data);

    $codFunc       = $objData->codFunc;
    $dataReserva      = $objData->dataReserva;
    $codCliente      = $objData->codCliente;
    $codServico     = $objData->codServico;
    
    $obsReserva = 'REALIZADA PELO APP';
    $statusReserva = 'AGUARDANDO';

    date_default_timezone_set('America/Sao_Paulo');
    $horaReserva    = date('H:i:s', strtotime($dataReserva));
    $dataReserva    = date('Y/m/d', strtotime($dataReserva));

    $codFunc       = stripslashes($codFunc);
    $codCliente      = stripslashes($codCliente);
    $dataReserva      = stripslashes($codServico);

    $codFunc       = trim($codFunc);
    $codCliente      = trim($codCliente);
    $dataReserva      = trim($dataReserva);

    $dados;

    $conexao    = Conexao::LigarConexao();
    $conexao->exec("SET NAMES UTF8");

    if($conexao){
        $query = $conexao->prepare("INSERT INTO reserva(idReserva, obsReserva, dataReserva, horaReserva, statusReserva, idFuncionario, idCliente, idServico) 
        VALUES (DEFAULT,'".$obsReserva."','".$dataReserva."','".$dataReserva."','".$statusReserva."','".$codFunc."','"$codCliente"','".$codServico."')");

        $query->execute();

        $dados = array('mensagem' => 'Dados Inseridos com sucesso');

        echo json_encode($dados);
    }else
    {
        $dados = array('mensagem' => 'Não foi possivel realizar o cadastro.');
        echo json_encode($dados);
    }
?>