<?php
	include('inc/dados.php');

	$mail = new PHPMailer();
	$mail->IsSMTP(); 
	$mail->CharSet = 'UTF-8';
	$mail->True;
	$mail->Host = "smtp.gmail.com"; // SMTP servers
	$mail->SMTPSecure = "tls"; // conexão segura com TLS
	$mail->Port = 587; 
	$mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
	$mail->Username = "xxxxxxxxxx@gmail.com"; // SMTP username
	$mail->Password = "senha do email do cliente"; // SMTP password
	$mail->From = "xxxxxxxxxx@gmail.com"; // From
	$mail->FromName = $nomeSite ; // Nome de quem envia o email
	$mail->AddAddress($mailDestino, $nome); // Email e nome de quem receberá //Responder
	$mail->WordWrap = 50; // Definir quebra de linha
	$mail->IsHTML = true ; // Enviar como HTML
	$mail->Subject = $assunto ; // Assunto
	$mail->Body = '<br/>' . $mensagem . '<br/>' ; //Corpo da mensagem caso seja HTML
	$mail->AltBody = "$mensagem" ; //PlainText, para caso quem receber o email não aceite o corpo HTML

	if(!$mail->Send()) // Envia o email
	{	
		echo "Erro no envio da mensagem";
	}else{
		echo "Mensagem enviada com sucesso";
	}
?>