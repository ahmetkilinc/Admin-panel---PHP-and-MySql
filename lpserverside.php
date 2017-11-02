<?php

require_once("class.phpmailer.php");

$eposta = $_POST["eposta"];
$tamam = 0;

$conn = new mysqli("localhost", "root", "", "webapp");

if($conn->connect_error){
	
	die("Bağlantı Sağlanamadı: " . $conn->connect_error);
}

$sql = "SELECT email FROM admin_user";
$result = $conn->query($sql);

if($result->num_rows > 0){
	
	while($row = $result->fetch_assoc()){
		
		if($eposta == $row["email"]){
			
			$tamam = 1;
		}
	}
}

$sqlKulAd = "SELECT kullanici_adi, sifre FROM admin_user WHERE email='$eposta'";

$resultKulAd = $conn->query($sqlKulAd);

$row = $resultKulAd->fetch_assoc();

$kullanici_adi = $row["kullanici_adi"];
$kullanici_sifre = $row["sifre"];

if($tamam == 1){
	
	$mail = new PHPMailer();

	$mail->IsSMTP();
	$mail->CharSet = 'UTF-8';
	$mail->Mailer = "smtp";
	$mail->Host = "ssl://smtp.gmail.com";
	$mail->Port = 465;
	$mail->SMTPAuth = true; 
	$mail->Username = "@gmail.com"; //SMTP username
	$mail->Password = ""; //SMTP password

	$mail->setFrom('@.com.tr', 'Betonel A.Ş.');
	$mail->AddAddress($eposta);
	$mail->addReplyTo("@.com.tr", "Betonel A.Ş.");

	$mail->Subject = "Betonel E-Posta Dogrulama Maili";
	$mail->AddEmbeddedImage('presets/mail-footer.png', 'mail-footer');
	$mail->AltBody = "kullanıcı adınız: " . $kullanici_adi ." şifreniz: " . $kullanici_sifre;

	$mail->Body =
			"<head>
				<style>
					div.container{

						width: 100%;
						border: 1px solid gray;
						padding-left:5em;
					}
				</style>
			</head>
				<body>
					<div class=\"container\">
						<br> <h4> Merhaba kullanıcı adınız: $kullanici_adi, şifreniz: $kullanici_sifre</a></h4> <br> <br> <br> <br>
					</div>
					<footer>
						<img src=\"cid:mail-footer\" alt=\"Betonel A.Ş.\" style=\"width:1326px;height:195;\">
					</footer>
				</body>";

	$mail->IsHTML(true);
	$mail->WordWrap = 50;

	if(!$mail->Send()){

		echo "mail gitmedi.";
	}
	else{

		echo "mail yollandı.";
	}
}
else{
	
	echo "eposta adresiniz sistemde kayıtlı değil.";
}

$conn->close();

?>
