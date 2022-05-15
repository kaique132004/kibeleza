<?php 

    require_once("conexao.php");

    try {

    

    $conexao = Conexao::LigarConexao();
    $conexao->exec('SET NAMES UTF8');

    if(!$conexao){
        echo 'Erro ao cntatar o banco verifiacr credenciais ou endereço';
    }

    $query = $conexao->prepare("SELECT * FROM cliente WHERE statusCliente='ATIVO' ORDER BY idCliente ASC");
    $query->execute();

    $json = "[";

    while($resultado = $query->fetch()){

        if($json != "["){
            $json .= ",";
        }

        $json .= '{"idCliente":"'.$resultado["idCliente"].'",';

            $json .= '"nomeCliente":"'.$resultado["nomeCliente"].'",';
            $json .= '"emailCliente":"'.$resultado["emailCliente"].'",';
            $json .= '"senhaCliente":"'.$resultado["senhaCliente"].'",';
            $json .= '"statusCliente":"'.$resultado["statusCliente"].'",';
            $json .= '"dataCadCliente":"'.$resultado["dataCadCliente"].'",';

        $json .= '"fotoCliente":"'.$resultado["fotoCliente"].'"}';
            
    } //Fim do laço while

    $json .= ']';

    echo $json;

}catch (Exception $ex){
    echo "Erro" . $ex->getMessage();
}
?>