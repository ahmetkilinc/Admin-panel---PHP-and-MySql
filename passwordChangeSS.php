<?php

session_start();

$url = 'http://localhost/tutorialsPoint/adminPanel/main_page.php';
$url2 = 'http://localhost/tutorialsPoint/adminPanel/settings.php';

if(!isset($_SESSION['adminkullanici']) && empty($_SESSION['adminkullanici'])){

		header("Location: $url");
}

$sessionK = $_SESSION['adminkullanici'];

$yeniSifre = $_POST["yeniSifre"];

if(empty($yeniSifre)){
	
	echo "Hiçbir değeri güncellemediniz.";
	
	header("Location: $url2");
}

$servername = "localhost";
$username = "root";
$password = "ahmet3899";
$dbname = "webapp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){

	die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE admin_user SET sifre = '$yeniSifre' WHERE kullanici_adi = '$sessionK'";

if ($conn->query($sql) === TRUE){

	//echo "Variables Updated";
}

else{

	echo "Error!: " . $conn->error;
}

?>

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
	
			  width: 960px;
			  background: white;
			  margin: 0 auto 15px auto;
			  border-radius: 0 0 7px 7px;
			  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.6);
			}
			
			article{

				height: 70%;
				margin-left: 170px;
				border-left: 0px solid gray;
				padding: 1em;
				overflow: hidden;
			}
			
			td, th{
				
				border: 1px solid #dddddd;
				text-align: left;
				padding: 8px;
			}

			tr:nth-child(even){
				
				background-color: #dddddd;
			}
			
			table{
				
				font-family: arial, sans-serif;
				border: 1%;
				width: 100%;
				margin-top: 10%;
			}
			
			button.button{

				background-color: #4CAD60;
				color: white;
				border: none;
			}
			
			button.buttonGonder{

				background-color: #4CAD60;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				width: 100%;
			}
			
			h2{
				
				margin-left: 34%;
			}
		</style>
	</head>
	<body>
		<div class="buttonimg">
			<div style="float:center;" class="kullanici">
			<?php echo $_SESSION["adminkullanici"]; ?>
			</div>
			<div class="image">
				<div class="dropdown">
					<img style="width:100%; heigth:100%;" src="images/adminavatar.png">
				</div>
			</div>
				<button style="width: 100%; text-align:center; border-radius:50px;" class="buttonD" type="button" onclick="funcAyarlar()">Ayarlar</button>
				<button style="width: 100%; border-radius:50px;" class="button" type="button" onclick="funcCikis()">Çıkış</button>
		</div>
		
		<div class="maincontent">
			
			<h2>Şifrenizi Başarıyla Güncellediniz!</h2>
			
			<table>
			  <tr>
				<td>Güncellenmiş Şifreniz:</td>
				<td><?php echo $yeniSifre;
					?></td>
			  </tr>
			</table>
			<button class="buttonGonder" onclick="func()" type="button">Başka Değişiklikler İçin Geri Dön</button>
		</div>
	</body>
	<script>
		
		function funcCikis(){
			
			window.location.replace('http://localhost/tutorialsPoint/adminPanel/cikis.php');
		}
		
		function funcAyarlar(){
			
			window.location.replace('http://localhost/tutorialsPoint/adminPanel/settings.php');
		}
		
		function func(){
			
			window.location.replace('http://localhost/tutorialsPoint/adminPanel/settings.php');
		}
	</script>
</html>

<?php 
	$conn->close();
?>