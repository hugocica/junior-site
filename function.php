<?php
$action = $_POST['action'];

if ($action == 'validateForm') {
	validateForm();
} elseif ($action == 'sendEmail') {
	sendEmail();
}

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

    if ($type == 'email') {
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

    $result['type'] = 'success';
    $result = json_encode($result);
    echo $result;
    die();
	// ini_set("SMTP", "aspmx.l.google.com");
 //    ini_set("sendmail_from", "hcicarelli@gmail.com");

	// if (isset($_POST['send'])) {
 //        $email_to = "hcicarelli@gmail.com";
 //        $email_subject = "Jr.COM - Formulário de Contato";
        
 //        function died($error) {
 //            echo "Lamentamos, mas algum(ns) erro(s) foram encontrados:<br /><br />";
 //            echo $error."<br />";
 //            die();  
 //        }
        
 //        if (!isset($_POST['fullname']) ||
 //            !isset($_POST['email']) ||
 //            !isset($_POST['tel']) ||
 //            !isset($_POST['empresa']) ||
 //            !isset($_POST['mensagem'])) {
 //            died("Lamentamos, mas parece que houve erros ao enviar o formulário");
 //        }
        
 //        $name = $_POST['fullname'];
 //        $email_from = $_POST['email'];
 //        $telefone = $_POST['tel'];
 //        $empresa = $_POST['empresa'];
 //        $msg = $_POST['mensagem'];
        
 //        $email_message = "Detalhes do formulário abaixo. \n\n";
        
 //        $email_message .= "Nome Completo: ".$name."\n";
 //        $email_message .= "Email: ".$email_from."\n";
 //        $email_message .= "Telefone: ".$telefone."\n";
 //        $email_message .= "Empresa/Instituição: ".$empresa."\n";
 //        $email_message .= "Mensagem: ".$msg."\n";
        
 //        @mail($email_to, $email_subject, $email_message);
 //    }
}
?>