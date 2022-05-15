<?php 

    require_once("conexao.php");

    try {

    

    $conexao = Conexao::LigarConexao();
    $conexao->exec('SET NAMES UTF8');

    if(!$conexao){
        echo 'Erro ao cntatar o banco verifiacr credenciais ou endereço';
    }

    $query = $conexao->prepare("SELECT * FROM funcionario ORDER BY idFuncionario DESC");
    $query->execute();

    $json = "[";

    while($resultado = $query->fetch()){

        if($json != "["){
            $json .= ",";
        }

        $json .= '{"idFuncionario":"'.$resultado["idFuncionario"].'",';

            $json .= '"nomeFuncionario":"'.$resultado["nomeFuncionario"].'",';
            $json .= '"statusFuncionario":"'.$resultado["statusFuncionario"].'",';
        $json .= '"idEmpresa ":"'.$resultado["idEmpresa"].'"}';
    } //Fim do laço while

    $json .= ']';

    echo $json;

}catch (Exception $ex){
    echo "Erro" . $ex->getMessage();
}
?>