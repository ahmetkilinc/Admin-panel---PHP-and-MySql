<?php

require_once("class.phpmailer.php");

$eposta = $_POST["eposta"];
$tamam = 0;


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

	$mail->setFrom('betonel@betonel.com.tr', 'Betonel A.Ş.');
	$mail->AddAddress($eposta);

	$mail->Subject = "Betonel Yönetici Kullanıcı Adı ve Şifre Hatırlatıcı";
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
					<div class='container'>
						<br> <h4> Merhaba;<br><br> kullanıcı adınız: $kullanici_adi <br> şifreniz: $kullanici_sifre</a></h4> <br> <br> <br> <br>
						<p><a href=''/html/></a></p>
					</div>
					<footer>
						<img src='http://localhost/adminPanel/images/mail-footer' alt='Betonel A.Ş.' style='width:1326px;height:195;'>
					</footer>
				</body>";

	$mail->IsHTML(true);
	$mail->WordWrap = 50;

	if(!$mail->Send()){

		echo "<html>
				<head>
					<style>
						.buttonimg{

							margin-left: 90%;
							width: 5%;
							height: 5%;
						}

						.maincontent{

						  width: 70%;
						  background: white;
						  margin: 10% auto 15px auto;
						  border-radius: 10px 10px 10px 10px;
						  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.6);
						}

						article{

							height: 70%;
							margin-left: 170px;
							border-left: 0px solid gray;
							padding: 1em;
							overflow: hidden;
						}

						button{

							background-color: #4CAF50;
							color: white;
							padding: 14px 20px;
							margin: 8px 0;
							border: none;
							cursor: pointer;
							width: 100%;
						}

						h2{

							margin-left: 42%;
						}
					</style>
				</head>
				<body>

					<div class='maincontent'>

						<h2>Bilgileri Unuttum</h2>

						<p>E-Postanız gönderilemedi. Daha fazla bilgi almak için yazılımcınıza ulaşınız.</p>

						<button onclick='func()' type='button'>Giriş Sayfasına Dön</button>
					</div>
				</body>
				<script>
					function func(){

						window.location.replace('http://localhost/tutorialsPoint/adminPanel/index.php');
					}
				</script>
			</html>";
	}
	else{

		echo "
		<!doctype html>
		<html>
				<head>
					<style>
						.buttonimg{

							margin-left: 90%;
							width: 5%;
							height: 5%;
						}

						.maincontent{

						  width: 70%;
						  background: white;
						  margin: 10% auto 15px auto;
						  border-radius: 10px 10px 10px 10px;
						  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.6);
						}

						article{

							height: 70%;
							margin-left: 170px;
							border-left: 0px solid gray;
							padding: 1em;
							overflow: hidden;
						}

						button{

							background-color: #4CAF50;
							color: white;
							padding: 14px 20px;
							margin: 8px 0;
							border: none;
							cursor: pointer;
							width: 100%;
						}

						h2{

							margin-left: 42%;
						}
					</style>
				</head>
				<body>

					<div class='maincontent'>

						<h2>Bilgileri Unuttum</h2>

						<p>E-Postanız mail adresinize başarı ile yollandı. Lütfen kontrol ediniz.</p>

						<button onclick='func()' type='button'>Giriş Sayfasına Dön</button>
					</div>
				</body>
				<script>
					function func(){

						window.location.replace('http://localhost/tutorialsPoint/adminPanel/index.php');
					}
				</script>
			</html>";
		}
	}
	else{
	
		echo "<html>
				<head>
					<style>
						.buttonimg{

							margin-left: 90%;
							width: 5%;
							height: 5%;
						}

						.maincontent{

						  width: 70%;
						  background: white;
						  margin: 10% auto 15px auto;
						  border-radius: 10px 10px 10px 10px;
						  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.6);
						}

						article{

							height: 70%;
							margin-left: 170px;
							border-left: 0px solid gray;
							padding: 1em;
							overflow: hidden;
						}

						button{

							background-color: #4CAF50;
							color: white;
							padding: 14px 20px;
							margin: 8px 0;
							border: none;
							cursor: pointer;
							width: 100%;
						}

						h2{

							margin-left: 42%;
						}
					</style>
				</head>
				<body>

					<div class='maincontent'>

						<h2>Bilgileri Unuttum</h2>

						<p>Mail adresiniz sistemde kayıtlı değildir. Bir yanlışlık olduğunu düşünüyorsanız, yazılımcınıza ulaşınız.</p>

						<button onclick='func()' type='button'>Giriş Sayfasına Dön</button>
					</div>
				</body>
				<script>
					function func(){

						window.location.replace('http://localhost/tutorialsPoint/adminPanel/index.php');
					}
				</script>
			</html>";
	}

$conn->close();

?>