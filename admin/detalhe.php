<?php 

    require_once("conexao.php");

    try {

    

    $conexao = Conexao::LigarConexao();
    $conexao->exec('SET NAMES UTF8');

    if(!$conexao){
        echo 'Erro ao contatar o banco verifiacr credenciais ou endereço';
    }

        if(isset($_GET['idServico'])){
            
            $idServico = $_GET['idServico'];

            $query = $conexao->prepare("SELECT * FROM servico WHERE idServico= $idServico");         
            $query->execute();


            $json = "[";

            while($resultado = $query->fetch()){

                if($json != "["){
                    $json .= ",";
                }

            $json .= '{"idServico":"'.$resultado["idServico"].'",';

                $json .= '"nomeServico":"'.$resultado["nomeServico"].'",';
                $json .= '"valorServico":"'.$resultado["valorServico"].'",';
                $json .= '"statusServico":"'.$resultado["statusServico"].'",';
                $json .= '"dataCadCliente":"'.$resultado["dataCadServico"].'",';
                $json .= '"fotoServico1":"'.$resultado["fotoServico1"].'",';
                $json .= '"fotoServico2":"'.$resultado["fotoServico2"].'",';
                $json .= '"fotoServico3":"'.$resultado ["fotoServico3"].'",';
                $json .= '"fotoServico4":"'.$resultado["fotoServico4"].'",';
                $json .= '"descricaoServico":"'.$resultado["descricaoServico"].'",';
                $json .= '"textoServico":"'.$resultado["textoServico"].'",';
                


            $json .= '"idEmpresa ":"'.$resultado["idEmpresa"].'"}';
            } //Fim do laço while

            $json .= ']';

            echo $json;
        }
        
    }
    catch (Exception $ex){
        echo "Erro" . $ex->getMessage();
    }
?>