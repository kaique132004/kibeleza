<?php
    if(isset($_GET["email"]) || isset($_GET["senha"])){
        if(!empty($_GET["email"]) || !empty($_GET["senha"])){
            require_once('conexao.php');
            $conexao = Conexao::LigarConexao();
            $conexao->exec("SET NAMES UTF8");

            $email = $_GET["email"];
            $senha = $_GET["senha"]; 

            if(!$conexao){
                echo "Não foi possicel se conectar ao banco de dados";
            }

            $query = $conexao->prepare("SELECT * FROM cliente WHERE emailCliente='$email' AND senhaCliente='$senha'");
            
            $query->execute();

            $json = "";

            if($resultado = $query->fetch()){
                if($json != ""){
                    $json .= ",";
                }

                $json .= '{"IdCliente":"'.$resultado["idCliente"].'",';
                    $json .= '"nomeCliente":"'.$resultado["nomeCliente"].'",';
                    $json .= '"emailCliente":"'.$resultado["emailCliente"].'",';
                    $json .= '"senhaCliente":"'.$resultado["senhaCliente"].'",';
                    $json .= '"statusCliente":"'.$resultado["statusCliente"].'",';
                    $json .= '"dataCadCliente":"'.$resultado["dataCadCliente"].'",';
                $json .= '"fotoCliente ":"'.$resultado["fotoCliente"].'"}';

                $json = '{"msg": {"Logado": "Sim", "Texto": "Logado com sucesso"}, "Dados": '.$json.' }';
            } else{
                $json = '{"msg": {"Logado": "Nao", "Texto": "Dados Invalidos tente novamente"}, "Dados": { '.$json.' }}';
            }
            
        }
        echo $json;
    }
?>