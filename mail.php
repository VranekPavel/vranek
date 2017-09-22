<?php

$jmeno= test_input($_POST['jmeno']);
$email= test_input($_POST['email']);
$predmet= test_input($_POST['predmet']);
$text= test_input($_POST['text']);
$text = wordwrap($text, 70);
$headers = 'From: ' . $jmeno . ' <' . $email . '>';
$message;

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$message = "Špatný formát e-mailu.";
}
else if (empty($jmeno) || empty($email) || empty($predmet) || empty($text)){
	$message = 'Všechna pole musí být vyplněna';
}
else {
mail('vranek.pavel95@gmail.com',$predmet,$text, $headers);
	$message ='<i class="fa fa-check fontGreen" aria-hidden="true"></i> <span class="fontGreen">E-mail úspěšně odeslán. </span>';
}

echo $message;

function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
	return $data;
	}
?>