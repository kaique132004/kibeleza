<?php 

    header('Access-Control-Allow-Origin: *');

    class Conexao{

        public static function LigarConexao(){
            $conn = new PDO('mysql:host=kgbz.ddns.net;dbname=kibeleza','root','@kgb2022');
            return $conn;
        }

    }

?>