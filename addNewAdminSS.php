<?php 

session_start();

$url = 'http://localhost/tutorialsPoint/adminPanel/main_page.php';
$url2 = 'http://localhost/tutorialsPoint/adminPanel/settings.php';

if(!isset($_SESSION['adminkullanici']) && empty($_SESSION['adminkullanici'])){

		header("Location: $url");
}

$sessionK = $_SESSION['adminkullanici'];

$yeniAdminAdi = $_POST['yeniAdminAdi'];
$yeniAdminSifre = $_POST['yeniAdminSifre'];
$yeniAdminEmail = $_POST['yeniAdminEmail'];

$servername = "localhost";
$username = "root";
$password = "ahmet3899";
$dbname = "webapp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){

	die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO admin_user (kullanici_adi, sifre, email)
VALUES ('$yeniAdminAdi', '$yeniAdminSifre', '$yeniAdminEmail')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
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
				
				margin-left: 30%;
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
			
			<h2>Yeni Yönetici Başarı ile Sisteme Eklendi!</h2>
			
			<table>
			  <tr>
				<td>Yeni Admin Kullanıcı Adi:</td>
				<td><?php echo $yeniAdminAdi;
					?></td>
			  </tr>
				
			  <tr>
				<td>Yeni Admin Kullanıcı Şifresi:</td>
				<td><?php echo $yeniAdminSifre;
					?></td>
			  </tr>
				
			  <tr>
				<td>Yeni Admin E-Posta Adresi:</td>
				<td><?php echo $yeniAdminEmail;
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