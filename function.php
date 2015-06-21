<?php
$action = $_POST['action'];

if ($action == 'validateForm')
	validateForm();
elseif ($action == 'sendEmail')
	sendEmail();
elseif ($action == 'processoSeletivo')
    processoSeletivo();

function validateForm() {
	$field = $_POST['field'];
    $type = str_replace('#', '', $_POST['fieldType']);

	sleep(1);

	if (empty($field)) {
		$result['type'] = 'blank';
		$result = json_encode($result);
		echo $result;
		die();
	}

    if (in_array($type, array('email', 'email-candidato'))) {
        if (!preg_match('/^[^.0-9]*[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $field)) {
            $result['type'] = 'invalid';
            $result = json_encode($result);
            echo $result;
            die();
        }    
    }
	
	$result['type'] = 'success';
	$result = json_encode($result);
	echo $result;
	die();
}

function sendEmail() {
    $name = $_POST['nome'];
    $email_from = $_POST['email'];
    $telefone = $_POST['telefone'];
    $empresa = $_POST['empresa'];
    $msg = $_POST['mensagem'];

    if (empty($name) || empty($email_from) || empty($msg)) {
        $result['type'] = 'blank';
        $result = json_encode($result);
        echo $result;
        die();        
    }

    $email_message = '  <div>
                            <div style="display: inline-block;float: left;margin-left:25px;margin-top:1px;">
                                <img style="width: 35%;" src="http://compjr.com.br/img/logo.png">
                            </div>

                            <div style="background-color: #3C8FBE;z-index: -1;text-align: right;height:69px;width: 100%;"></div>
                        </div><div style="padding:50px 25px;min-height:120px;">';
    $email_message .= '<b>Nome Completo:</b> '.$name.'<br>';
    $email_message .= '<b>Email:</b> '.$email_from.'<br>';
    $email_message .= '<b>Telefone:</b> '.$telefone.'<br>';
    $email_message .= '<b>Empresa/Instituição:</b> '.$empresa.'<br>';
    $email_message .= '<b>Mensagem:</b> '.$msg.'<br>';
    $email_message .= '</div>
                        <div style="height: 69px;background-color: #1E253A;position: relative;top: 150px;padding: 10px 25px;color: #fff;">
                            <div>
                                <p>Av. Eng. Luiz Edmundo C. Coube 14-01, Núcleo Habitacional Presidente Geisel<br/>
                                17033-360 - Bauru - SP</p>
                            </div>
                        </div>';

    require 'PHPMailer-master/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'noreply.jr.com@gmail.com';                 // SMTP username
    $mail->Password = 'noreplybccftw123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->CharSet = "UTF-8";

    $mail->From = $email_from;
    $mail->FromName = 'Jr.COM';
    $mail->addAddress('hcicarelli@gmail.com', 'no-reply-jr.com');     // Colocar email da Jr

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Jr.COM - Formulário de Contato';
    $mail->Body    = $email_message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        $result['type'] = 'error';
    } else {
        $result['type'] = 'success';
    }

    $result = json_encode($result);
    echo $result;
    die();
}

function processoSeletivo() {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $curso = $_POST['curso'];
    $ano = $_POST['ano'];
    $sexo = $_POST['sexo'];
    $resumo = $_POST['resumo'];

    echo $nome . ' ' . $resumo . ' ' . $curso;
}
?>