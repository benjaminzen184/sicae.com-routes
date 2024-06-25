<?php 
    if(isset($_SESSION['aviso']) && $_SESSION['aviso'] != "") {
        $aviso[] = $_SESSION['aviso'];
        unset($_SESSION['aviso']);
    }

    if (isset($_POST) && !empty($_POST)) {

        // function imagenet_validar_recaptcha($captcha){
        //     $cURL = curl_init('https://www.google.com/recaptcha/api/siteverify');
        //     curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        //     curl_setopt($cURL,CURLOPT_POST, 2);
        //     curl_setopt($cURL,CURLOPT_POSTFIELDS, 'secret='.SECRET_KEY.'&response='.$captcha);
            
        //     $resposta = json_decode(curl_exec($cURL),true);
        //     curl_close($cURL);
            
        //     return isset($resposta['success']);
        // }

        foreach($_POST as $key => $val) {
            if ($key == ('nome') && $val == "") {
                $aviso['nome'] = array ('tipo' => 'erro', 'mensagem' => 'Nome inválido!');
            }
            
            if ($key == ('telefone') && ($val == "" || (strlen(preg_replace("/[^0-9]/", "", $val)) != 10 && strlen(preg_replace("/[^0-9]/", "", $val)) != 11 && strlen(preg_replace("/[^0-9]/", "", $val)) != 12 && strlen (preg_replace("/[^0-9]/", "", $val)) != 13))) {
                $aviso['telefone'] = array ('tipo' => 'erro', 'mensagem' => 'Telefone inválido!');
            }
            
            if ($key == ('email') && (!trim($val) || !filter_var($val,FILTER_VALIDATE_EMAIL))) {
                $aviso['email'] = array ('tipo' => 'erro', 'mensagem' => 'E-mail inválido!');
            }
            
            if ($key == ('setor') && $val == "") {
                $aviso['setor'] = array ('tipo' => 'erro', 'mensagem' => 'Setor inválido!');
            }
            
            
            // if($key == ('g-recaptcha-response') && !imagenet_validar_recaptcha($val)){
                // $aviso[] = array('tipo' => 'erro', 'mensagem' => 'Erro ao enviar mensagem. Por favor tente novamente.');
                // }
        }

        if (isset($_SESSION['nome']) && isset($_SESSION['telefone']) && isset($_SESSION['email'])) {
            if($_SESSION['nome'] == $_POST['nome'] && $_SESSION['telefone'] == $_POST['telefone'] && $_SESSION['email'] == $_POST['email']){
                $aviso[] = array('tipo' => 'erro', 'mensagem' => 'E-mail com esse remetente já enviado. Por favor aguarde, logo entraremos em contato.');
            }
        }
        
        if(!isset($aviso)) {

            $html = '
                <table style="width: auto; margin:0 auto; background-color:white; border-radius:25px; padding:20px; color:gray;">
                    <tr><td style="padding-bottom:10px;" colspan="2"><h1 style="font-weight: normal; text-align: center; color:#25509f;">HFCP - Saúde</h1></td></tr>
                    <tr><td style="padding-bottom:10px;" colspan="2"><h2 style="font-weight: normal; text-align: center; color:#707070;">Solicitação de Contato </h2></td></tr>
                    <tr><td style="padding-left:5px;"><strong>Nome:</strong></td><td style="padding-left:5px; padding-right:5px;">     '.$_POST['nome'].'<br/></td></tr>
                    <tr><td style="padding-left:5px;"><strong>E-mail:</strong></td><td style="padding-left:5px; padding-right:5px;">   '.$_POST['email'].'<br/></td></tr>
                    <tr><td style="padding-left:5px;"><strong>Telefone:</strong></td><td style="padding-left:5px; padding-right:5px;"> '.$_POST['telefone'].'<br/></td></tr>
                    <tr><td style="padding-left:5px;"><strong>Setor:</strong></td><td style="padding-left:5px; padding-right:5px;"> '.$_POST['setor'].'<br/></td></tr>
                    <tr><td style="padding-left:5px;"><strong>Mensagem:</strong></td><td style="padding-left:5px; padding-right:5px;"> '.$_POST['mensagem'].'<br/></td></tr>
                </table>
                ';

            include './mailer/class.phpmailer.php';

            $mail = new PHPMailer();

            $mail->IsSMTP();
            $mail->SMTPAuth = true;

            $mail->Host = EMAIL_HOST;
            $mail->SMTPSecure = EMAIL_PROTOCOL;
            $mail->Port = EMAIL_PORT;
            $mail->Username = EMAIL_USER;
            $mail->Timeout = EMAIL_TIMEOUT;
            $mail->Password = EMAIL_PASS;

            $mail->Sender = $_POST['email']; // Quem enviou
            
            $mail->From       = $_POST['email']; // E-mail de quem enviou
            $mail->FromName   = utf8_decode($_POST['nome']); // Nome de quem enviou
            
            $mail->AddAddress(CONTATO_ADDRESS,CONTATO_NAME); // Quem vai receber
            $mail->AddReplyTo($_POST['email'],utf8_decode($_POST['nome'])); // Responder para
            
            $mail->IsHtml(); // Mensagem em HTML
                
            $mail->Subject = utf8_decode("Solicitação de Contato"); // Título da mensagem
            $mail->Body    = utf8_decode($html); // Mensagem

            if($mail->Send()) {
                $mail->clearAllRecipients(); // Limpar informações de envio
                $_SESSION['nome'] = $_POST['nome'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['telefone'] = $_POST['telefone'];
                $_SESSION['setor'] = $_POST['setor'];
                $_SESSION['aviso'] = array('tipo' => 'sucesso', 'mensagem' => 'Menssagem enviada com sucesso. Em breve, entraremos em contato...');
                
                header('Location: '.$rota.'#imagenet-conteiner-form');
            } 
            else {
                $mail->clearAllRecipients(); // Limpar informações de envio
                $aviso[] = array('tipo' => 'erro', 'mensagem' => 'Erro ao enviar mensagem. Por favor tente novamente.');
            }    
        }
        else {
            $_SESSION['aviso'] = array('tipo' => 'erro', 'mensagem' => 'E-mail com esse remetente já enviado. Por favor aguarde, logo entraremos em contato.');
            header('Location: '.$rota.'#imagenet-conteiner-form');
        }  
    }
?>