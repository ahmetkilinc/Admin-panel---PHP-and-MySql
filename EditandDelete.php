<?php

session_start();

$url = 'http://localhost/tutorialsPoint/adminPanel/index.php';

if(!isset($_SESSION['adminkullanici']) && empty($_SESSION['adminkullanici'])){

	header("Location: $url");
}

$servername = "localhost";
$username = "root";
$password = "ahmet3899";
$dbname = "webapp";

$conn = new mysqli($servername, $username, $password, $dbname);

if(!empty($_POST["duzenle"])){

	$duzenlenecekAdmin = $_POST["duzenle"];
	
	$sql1 = "SELECT id, kullanici_adi, sifre, email FROM admin_user WHERE kullanici_adi = '$duzenlenecekAdmin'";
	
	$result = $conn->query($sql1);
	
	$row = $result->fetch_assoc();
	
	$editKullaniciAdi = $row['kullanici_adi'];
	$editSifre = $row['sifre'];
	$editEmail = $row['email'];
	$adminId = $row['id'];
?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
<!doctype html>
<html>
	<header>
		<style>

			.maincontent{

			  width: 960px;
			  background: white;
			  margin: 0 auto 15px auto;
			  border-radius: 0 0 7px 7px;
			  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.6);
			  overflow: auto;
			  cursor: pointer;
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
			}

			button.buttonGeri{

				background-color: #4CAD60;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				width: 100%;
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

			.buttonimg{

				margin-left: 90%;
				width: 5%;
				height: 5%;
			}
			h2{

				margin-left: 40%;
			}

			.imgSettings{

				width: 4%;
				height: 30%;
			}
		</style>
	</header>
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
				<button style="width: 100%; text-align:center; border-radius:50px;" onclick="funcAyarlar()" class="buttonD" type="button">Ayarlar</button>
				<button style="width: 100%; border-radius:50px;" class="button" type="button" onclick="func()">Çıkış</button>
		</div>

<div style="overflow:auto;" class='maincontent'>

	<h2>Yöneticileri Düzenle</h2>

	<form method="post" action="editandReturn.php">
		<table>
		  <tr>
			<th>Admin Kullanici Adı</th>
			<th>Admin Sifre</th>
			<th>Admin E-Posta</th>
		  </tr>
		  <tr>
			<td><input type="text" name="yeniAdminAdi" pattern=".{5,}" value="<?php echo $editKullaniciAdi; ?>" required title="kullanıcı adı en az 5 haneli olmalıdır."></td>
			<td><input type="text" name="yeniAdminSifre" pattern=".{6,}" value="<?php echo $editSifre; ?>" required title="Şifreniz en az 6 haneli olmalıdır."></td>
			<td><input type="text" name="yeniAdminEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $editEmail; ?>" required title="Geçerli bir e-posta adresi giriniz."></td>
			  
			<td><button class="buttonDuzenle" type="submit" name="duzenle" value= "<?php echo $adminId; ?>">Düzenle</button></td>
		  </tr>
		</table>
		<button class="buttonGeri" type="button" onclick="funcGeri()">Geri Dön</button>
	</form>
</div>	
	</body>
	<head>
		<script>

			function funcGeri(){

				window.location.replace('http://localhost/tutorialsPoint/adminPanel/settings.php');
			}

			function funcAyarlar(){

				window.location.replace('http://localhost/tutorialsPoint/adminPanel/settings.php');
			}

			function func(){

				window.location.replace('http://localhost/tutorialsPoint/adminPanel/cikis.php');
			}
		</script>
	</head>
</html>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
<?php 
	
}

else{

	$silinecekAdmin = $_POST["sil"];
	
	$sql = "DELETE FROM admin_user WHERE kullanici_adi = '$silinecekAdmin'";

	if ($conn->query($sql) === TRUE){

		$url2 = 'http://localhost/tutorialsPoint/adminPanel/editAdmin.php';
    	echo "Record deleted successfully";
		header("Location: $url2");
	}
	else{
		
    	echo "Error deleting record: " . $conn->error;
	}
}

$conn->close();

?>