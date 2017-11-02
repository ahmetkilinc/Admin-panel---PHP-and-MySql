<?php

	session_start();

	$servername = "localhost";
	$username = "root";
	$password = "ahmet3899";
	$dbname = "webapp";

	$url1 = 'http://localhost/tutorialsPoint/adminPanel/index.php';

	if(empty($_POST['kul_ad']) && empty($_POST['kul_sif'])){
		
		header("Location: $url1");
	}
	
	$adminname = $_POST["kul_ad"];
	$adminpass = $_POST["kul_sif"];
	$tamam = 0;

	$url = 'http://localhost/tutorialsPoint/adminPanel/main_page.php';

	$dateOnlyY = date("Y");

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error){
		
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "SELECT kullanici_adi, sifre FROM admin_user";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0){
    	//output data of each row
		while($row = $result->fetch_assoc()){
			
			if($adminname == $row["kullanici_adi"]){
				
				if($adminpass == $row["sifre"]){

					$tamam = 1;
				}
			}
		}
	}

	$conn->close();
	
	if($tamam == 1){
		
		echo "Giris Başarılı.";
		$_SESSION["adminkullanici"] = $adminname;
		
		header("Location: $url");
	}

?>

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
						
			button {

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
		
		<div class="maincontent">
			
			<h2>UYARI!</h2>
			
			<p>Kullanıcı adınızı veya şifrenizi yanlış girdiniz. Lütfen.</p>
			
			<button onclick="func()" type="button">Giriş Sayfasına Dön</button>
		</div>
	</body>
	<script>
		function func(){
			
			window.location.replace('http://localhost/tutorialsPoint/adminPanel/index.php');
		}
	</script>
</html>
