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
    $msg_utf8 = utf8_decode($msg);

    if (empty($empresa))
        $empresa = '--';
    if (empty($telefone))
        $telefone = '--';

    if (empty($name) || empty($email_from) || empty($msg)) {
        $result['type'] = 'blank';
        $result = json_encode($result);
        echo $result;
        die();        
    }

    header('Content-Type: text/html; charset=utf-8');

    // Enviando dados para o bd, para manter um registro dos inscritos
    $host = "localhost"; /* your host - standard: localhost */
    $user = "root"; /* your database user - standard: root */
    $pass = "bccftw123"; /* your database password - standard: root */
    $database = "jr"; /* your database name - standard: odinms */

    // $connect = mysql_connect($host,$user,$pass);
    // $db = mysql_select_db($database, $connect) or die(mysql_error());
    // mysql_query("SET character_set_results=utf8", $connect);

    // $sql = mysql_query("INSERT INTO contato (nome, email, telefone, empresa, mensagem)
    //         VALUES ('$name', '$email_from', '$telefone', '$empresa', '$msg_utf8')", $connect);

    // if ($sql)
    //     $result['type'] = 'success';
    // else
    //     $result['type'] = 'error';



    $email_message = '  <div>
                            <div style="display: inline-block;float: left;margin-left:25px;margin-top:1px;">
                                <img style="width: 35%;" src="http://compjr.com.br/img/logo.png">
                            </div>

                            <div style="background-color: #3C8FBE;z-index: -1;text-align: right;height:69px;width: 100%;"></div>
                        </div>
                        <div style="min-height:120px;width:80%;margin:50px auto;font-family:\'Trebuchet MS\';"';
    $email_message .= '<table style="width:100%;">
                        <tr>
                            <td style="background-color: #E5E5E5;width: 190px;padding: 15px;text-align: center;"><b>Nome Completo:</b></td>
                            <td style="width: 600px;padding: 15px;text-align: center;">'.$name.'</td>
                        </tr>
                        <tr>
                            <td style="width: 190px;padding: 15px;text-align: center;"><b>Email:</b></td>
                            <td style="background-color: #E5E5E5;width: 600px;padding: 15px;text-align: center;">'.$email_from.'</td>
                        </tr>
                        <tr>
                            <td style="background-color: #E5E5E5;width: 190px;padding: 15px;text-align: center;"><b>Telefone:</b></td>
                            <td style="width: 190px;padding: 15px;text-align: center;">'.$telefone.'</td>
                        </tr>
                        <tr>
                            <td style="width: 190px;padding: 15px;text-align: center;"><b>Empresa:</b></td>
                            <td style="background-color: #E5E5E5;width: 600px;padding: 15px;text-align: center;">'.$empresa.'</td>
                        </tr>
                        <tr>
                            <td style="background-color: #E5E5E5;width: 190px;padding: 15px;text-align: center;"><b>Mensagem:</b></td>
                            <td style="width: 600px;padding: 15px;text-align: center;">'.$msg.'</td>
                        </tr>
                    </table>';
    $email_message .= '</div>
                        <div style="font-family:\'Trebuchet MS\';height: 69px;background-color: #1E253A;position: relative;top: 150px;padding: 10px 25px;color: #fff;">
                            <div>
                                <p>Av. Eng. Luiz Edmundo C. Coube 14-01, Núcleo Habitacional Presidente Geisel<br/>
                                17033-360 - Bauru - SP</p>
                            </div>
                        </div>';

    require 'classes/PHPMailer-master/PHPMailerAutoload.php';

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
    // $mail->addAddress('hcicarelli@gmail.com', 'no-reply-jr.com');     // Colocar email da Jr
    $mail->addAddress('compjrunesp@gmail.com', 'no-reply-jr.com');     // Colocar email da Jr

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
    header('Content-Type: text/html; charset=utf-8');
    
    $nome = !empty($_POST['nome'])?$_POST['nome']:'--';
    $email = !empty($_POST['email'])?$_POST['email']:'--';
    $telefone = !empty($_POST['telefone'])?$_POST['telefone']:'--';
    $curso = !empty($_POST['curso'])?$_POST['curso']:'--';
    $ano = !empty($_POST['ano'])?$_POST['ano']:'--';
    $resumo = !empty($_POST['resumo'])?$_POST['resumo']:'--';

    // Enviando dados para o bd, para manter um registro dos inscritos
    $host = "localhost"; /* your host - standard: localhost */
    $user = "root"; /* your database user - standard: root */
    $pass = "bccftw123"; /* your database password - standard: root */
    $database = "jr"; /* your database name - standard: odinms */

    $connect = mysql_connect($host,$user,$pass);
    $db = mysql_select_db($database, $connect) or die(mysql_error());
    mysql_query("SET character_set_results=utf8", $connect);

    $sql = mysql_query("INSERT INTO processo_seletivo (nome, email, telefone, curso, ano, resumo)
            VALUES ('$nome', '$email', '$telefone', '$curso', '$ano', '$resumo')", $connect);

    if ($sql)
        $result['type'] = 'success';
    else
        $result['type'] = 'error';

    // Enviando e-mail de confirmação para o inscrito
    // header do email
    $email_message = '  <div>
                            <div style="display: inline-block;float: left;margin-left:25px;margin-top:1px;">
                                <img style="width: 35%;" src="http://compjr.com.br/img/logo.png">
                            </div>

                            <div style="background-color: #3C8FBE;z-index: -1;text-align: right;height:69px;width: 100%;"></div>
                        </div>
                        <div style="min-height:120px;width:80%;margin:50px auto;font-family:\'Trebuchet MS\';"';
    // corpo do email
    $email_message .= '<h2>'.$nome.', sua inscrição foi enviada com sucesso!</h2><p>Em breve entraremos em contato para mais detalhes.</p>';
    // footer do email
    $email_message .= '</div>
                        <div style="font-family:\'Trebuchet MS\';height: 69px;background-color: #1E253A;position: relative;top: 150px;padding: 10px 25px;color: #fff;">
                            <div>
                                <p>Av. Eng. Luiz Edmundo C. Coube 14-01, Núcleo Habitacional Presidente Geisel<br/>
                                17033-360 - Bauru - SP</p>
                            </div>
                        </div>';

    require 'classes/PHPMailer-master/PHPMailerAutoload.php';

    // $mail = new PHPMailer;

    // $mail->isSMTP();                                      // Set mailer to use SMTP
    // $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    // $mail->SMTPAuth = true;                               // Enable SMTP authentication
    // $mail->Username = 'noreply.jr.com@gmail.com';                 // SMTP username
    // $mail->Password = 'noreplybccftw123';                           // SMTP password
    // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    // $mail->Port = 587;                                    // TCP port to connect to
    // $mail->CharSet = "UTF-8";

    // $mail->From = $email;
    // $mail->FromName = 'Jr.COM';
    // $mail->addAddress($email);     // Colocar email da Jr

    // $mail->isHTML(true);                                  // Set email format to HTML

    // $mail->Subject = 'Jr.COM - Processo Seletivo 2015';
    // $mail->Body    = $email_message;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // if(!$mail->send()) {
    //     $result['type'] = 'error';
    // } else {
    //     $result['type'] = 'success';
    // }

    $result = json_encode($result);
    echo $result;
    die();
}
?>