<?php 

    require_once('conexao.php');

    class Site{
        // Atributos (variáveis)

        public $nome;
        public $email;
        public $fone;
        public $msg;
        public $data;
        public $hora;

        //Método (Função)
        public function InserirContato(){

            $query = "INSERT INTO contato (nomeContato, emailContato, foneContato, mensagemContato, data, hora) 
            VALUES ('".$this->nome."','".$this->email."','".$this->fone."','".$this->msg."','".$this->data."','".$this->hora."');";

            $conexao = Conexao::LigarConexao();
            $conexao->exec($query);
        }

        public function ListaServico(){

            $query = "SELECT * FROM servico WHERE statusServico='ATIVO' ORDER BY idServico ASC";
            $conexao = Conexao::LigarConexao();
            $conexao->exec("SET NAMES utf8");
            $resultado = $conexao->query($query);
            $listar = $resultado->fetchAll();
            return $listar;

        }

        public function ListaFunc(){

            $query = "SELECT * FROM `funcionario` WHERE statusFuncionario='ATIVO' ORDER BY idFuncionario;";
            $conexao = Conexao::LigarConexao();
            $conexao->exec("SET NAMES utf8");
            $resultado = $conexao->query($query);
            $listar = $resultado->fetchAll();
            return $listar;

        }
    }


?>