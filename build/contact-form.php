<?php

if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
    header("location: about-us.php");
    die();
}

$email = '';

foreach($_POST AS $name => $value) {
	$email .= ucfirst($name).": ".filter_var(trim($value), FILTER_SANITIZE_STRING) . "\r\n";
}

// $to = "beer@surfbrewery.com";
$to = "phil@surfbrewery.com";
if($_POST['email']){
	$from = $_POST['email'];
} else {
	$from = "beer@surfbrewery.com";
}
$subject = "Contact Form Submission from ".filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);

$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=iso-8859-1";
$headers[] = "From: ".filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING)." <".$from.">";
$headers[] = "Reply-To: Surf Brewery <beer@surfbrewery.com>";
$headers[] = "Subject: ".$subject;
$headers[] = "X-Mailer: PHP/".phpversion();

if( mail($to, $subject, $email, implode("\r\n", $headers)) ){
	echo 'Thanks!  Your message has been sent!';
}

?>