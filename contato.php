
<?php 

    require_once ("email/PHPMailerAutoload.php");
    
    $ok = 0;
    
    try{   
    
        if(isset($_POST["email"])){ 
            
            $assunto    = "Site KiBeleza";
            $nome       = $_POST["nome"];
            $email      = $_POST["email"];
            $fone       = $_POST["fone"];
            $mens       = $_POST["mens"];

            // Alimentar os Atributos e chamar o método inserir Contato
            date_default_timezone_set('America/Sao_Paulo');
            $horaContato    = date('H:i:s');
            $dataContato    = date('Y/m/d');

            require_once('admin/site.php');
            $contato = new Site();
            $contato->nome = $nome;
            $contato->email = $email;
            $contato->fone = $fone;
            $contato->msg = $mens;
            $contato->data = $dataContato;
            $contato->hora = $horaContato;

            $contato->InserirContato();
        
            $phpmail = new PHPMailer(); // Instânciamos a classe PHPmailer para poder utiliza-la  
        
            $phpmail->isSMTP(); // envia por SMTP
            
            $phpmail->SMTPDebug = 0; // Opções de debug ( 0, 1 ou 2)
            $phpmail->Debugoutput = 'html';
            
            $phpmail->Host = "smtp.gmail.com"; // SMTP servers         smtp.gmail.com
            $phpmail->Port = 587; // Porta SMTP do GMAIL
            
            $phpmail->SMTPSecure = 'tls'; // Autenticação SMTP
            $phpmail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação   
            
            $phpmail->Username = "kaique.235.fly@gmail.com"; // SMTP username         
            $phpmail->Password = "plgrjncuvaaroeqx"; // SMTP password
            
            $phpmail->IsHTML(true);         
            
            $phpmail->setFrom($email, $nome); // E-mail do remetende enviado pelo method post  
                    
            $phpmail->addAddress("kaique.235.fly@gmail.com", $assunto);// E-mail do destinatario/*  
            
            $phpmail->Subject = $assunto; // Assunto do remetende enviado pelo method post
                    
            $phpmail->msgHTML(" Nome: $nome <br>
                                E-mail: $email <br>
                                Telefone: $fone <br>
                                Mensagem: $mens ");
                                                            
            $phpmail->AlrBody = " Nome: $nome \n
                                E-mail: $email \n
                                Telefone: $fone \n
                                Mensagem: $mens ";
                
            if($phpmail->send()){ 
                
                $ok = 1;
                //echo "A Mensagem foi enviada com sucesso.";
                
            }else{
                $ok = 2;
                echo "Não foi possível enviar a mensagem. Erro: " .$phpmail->ErrorInfo;
            }
                    
            // ############## RESPOSTA AUTOMATICA
            $phpmailResposta = new PHPMailer();        
            $phpmailResposta->isSMTP();
            
            $phpmailResposta->SMTPDebug = 0;
            $phpmailResposta->Debugoutput = 'html';
            
            $phpmailResposta->Host = "smtp.gmail.com";         
            $phpmailResposta->Port = 587;
            
            $phpmailResposta->SMTPSecure = 'tls';
            $phpmailResposta->SMTPAuth = true;   
            
            $phpmailResposta->Username = "kaique.235.fly@gmail.com";         
            $phpmailResposta->Password = "plgrjncuvaaroeqx";          
            $phpmailResposta->IsHTML(true);         
            
            $phpmailResposta->setFrom($email, $nome); // E-mail do remetende enviado pelo method post  
                    
            $phpmailResposta->addAddress($email, "Kibeleza");// E-mail do destinatario/*  
            
            $phpmailResposta->Subject = "Restosta - " .$assunto; // Assunto do remetende enviado pelo method post
                    
            $phpmailResposta->msgHTML(" Nome: $nome <br>
                                Em breve daremos o retorno");
            
            $phpmailResposta->AlrBody = "Nome: $nome \n
                                Em breve daremos o retorno";
                
            $phpmailResposta->send();
    
        } // FIM IF
    
    }catch(Exception $e){
        Erro::tratarErro($e); 
    }   
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site Kaique TI12</title>
    
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="css/lity.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
    <?php require_once("pages/topoRedeSocial.php")?>
    <section>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58570.0461621769!2d-46.501631186671176!3d-23.43780564428168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce8ae89ffd06a7%3A0x6b960ce636f632dd!2sAeroporto%2C%20Guarulhos%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1642506746055!5m2!1spt-BR!2sbr" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </section>
    <section class="formulario site">
        <h2>Contato</h2>
            <div class="caixaForm">
                <form method="post">
                    <div class="divForm">
                        <div> <input name="nome" type="text" placeholder="Nome: " required> </div>
                        <div> <input name="email" type="email" placeholder="E-mail: " required> </div>
                        <div> <input name="fone" type="tel" placeholder="Telefone"> </div>
                    </div>
                    <div>
                        <div><textarea name="mens" cols="10" rows="20" placeholder="Mensagens"></textarea></div>
                        <div><input type="submit" value="Enviar"></div>
                    </div>
                </form>
            </div>
    </section>
    <?php require_once("pages/galeria.php") ?>
    <?php require_once("pages/destaques.php") ?>
    <?php require_once("pages/equipes.php") ?>
    <?php require_once("pages/rodape.php") ?>
    
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/slick.js"></script>
    <script type="text/javascript" src="js/animate.js"></script>
    <script type="text/javascript" src="js/lity.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>