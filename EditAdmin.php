<?php

session_start();

//echo $_SESSION["adminkullanici"];

$url = 'http://localhost/tutorialsPoint/adminPanel/index.php';

if(!isset($_SESSION['adminkullanici']) && empty($_SESSION['adminkullanici'])){

	header("Location: $url");
}

$servername = "localhost";
$username = "root";
$password = "ahmet3899";
$dbname = "webapp";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	
	die("Bağlantı sağlanamadı: " . $conn->connect_error);
}

$sql = "SELECT kullanici_adi, sifre, email FROM admin_user";

$result = $conn->query($sql);

$i = 0;

if($result->num_rows > 0){
	
	while($row = $result->fetch_assoc()){
		
		$kullaniciAdlar[$i] = $row["kullanici_adi"];
		$kullaniciSifreler[$i] = $row["sifre"];
		$kullaniciEmailler[$i] = $row["email"];
		
		$i = $i + 1;
	}
}

$adet = count($kullaniciAdlar);

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

	<form method="post" action="EditandDelete.php">
		<table>
		  <tr>
			<th>Admin Kullanici Adı</th>
			<th>Admin Sifre</th>
			<th>Admin E-Posta</th>
		  </tr>
		  <tr>
			<td><?php echo $kullaniciAdlar[0]; ?></td>
			<td><?php echo $kullaniciSifreler[0]; ?></td>
			<td><?php echo $kullaniciEmailler[0]; ?></td>
			<td><button class="buttonDuzenle" type="submit" name="duzenle" value= "<?php echo $kullaniciAdlar[0]; ?>" >Düzenle</button></td>
			<td><button class="buttonSil" type="submit" value="<?php echo $kullaniciAdlar[0]; ?>" name="sil">Sil</button></td>
		  </tr>
			 
		  <tr>
			<td><?php if(empty($kullaniciAdlar[1])){
	
							echo "-";
						}
					   else{
					   
					   		echo $kullaniciAdlar[1];
					   }?></td>
			<td><?php if(empty($kullaniciSifreler[1])){
	
							echo "-";
						}
					   else{
					   
					   		echo $kullaniciSifreler[1];
					   }?></td>
			<td><?php if(empty($kullaniciEmailler[1])){
	
							echo "-";
						}
					   else{
					   
					   		echo $kullaniciEmailler[1];
					   }?></td>
			<td><button class="buttonDuzenle" type="submit" name="duzenle" value= "<?php echo $kullaniciAdlar[1]; ?>" >Düzenle</button></td>
			<td><button class="buttonSil" type="submit" value="<?php echo $kullaniciAdlar[1]; ?>" name="sil">Sil</button></td>
		  </tr>
	
		  <tr>
			<td><?php if(empty($kullaniciAdlar[2])){
	
							echo "-";
						}
					   else{
					   
					   		echo $kullaniciAdlar[2];
					   }?></td>
			<td><?php if(empty($kullaniciSifreler[2])){
	
							echo "-";
						}
					   else{
					   
					   		echo $kullaniciSifreler[2];
					   }?></td>
			<td><?php if(empty($kullaniciEmailler[2])){
	
							echo "-";
						}
					   else{
					   
					   		echo $kullaniciEmailler[2];
					   }?></td>
			<td><button class="buttonDuzenle" type="submit" name="duzenle" value= "<?php echo $kullaniciAdlar[2]; ?>" >Düzenle</button></td>
			<td><button class="buttonSil" type="submit" value="<?php echo $kullaniciAdlar[2]; ?>" name="sil">Sil</button></td>
		  </tr>

		  <tr>
			<td><?php if(empty($kullaniciAdlar[3])){
	
							echo "-";
						}
					   else{
					   
					   		echo $kullaniciAdlar[3];
					   }?></td>
			<td><?php if(empty($kullaniciSifreler[3])){
	
							echo "-";
						}
					   else{
					   
					   		echo $kullaniciSifreler[3];
					   }?></td>
			<td><?php if(empty($kullaniciEmailler[3])){
	
							echo "-";
						}
					   else{
					   
					   		echo $kullaniciEmailler[3];
					   }?></td>
			<td><button class="buttonDuzenle" type="submit" name="duzenle" value= "<?php echo $kullaniciAdlar[3]; ?>" >Düzenle</button></td>
			<td><button class="buttonSil" type="submit" value="<?php echo $kullaniciAdlar[3]; ?>" name="sil">Sil</button></td>
		  </tr>
			
		  <tr>
			<td><?php if(empty($kullaniciAdlar[4])){
	
							echo "-";
						}
					   else{
					   
					   		echo $kullaniciAdlar[4];
					   }?></td>
			<td><?php if(empty($kullaniciSifreler[4])){
	
							echo "-";
						}
					   else{
					   
					   		echo $kullaniciSifreler[4];
					   }?></td>
			<td><?php if(empty($kullaniciEmailler[4])){
	
							echo "-";
						}
					   else{
					   
					   		echo $kullaniciEmailler[4];
					   }?></td>
			<td><button class="buttonDuzenle" type="submit" name="duzenle" value= "<?php echo $kullaniciAdlar[4]; ?>" >Düzenle</button></td>
			<td><button class="buttonSil" type="submit" value="<?php echo $kullaniciAdlar[4]; ?>" name="sil">Sil</button></td>
		  </tr>
			
		  <tr>
			<td><?php if(empty($kullaniciAdlar[5])){
	
							echo "-";
						}
					   else{
					   
					   		echo $kullaniciAdlar[5];
					   }?></td>
			<td><?php if(empty($kullaniciSifreler[5])){
	
							echo "-";
						}
					   else{
					   
					   		echo $kullaniciSifreler[5];
					   }?></td>
			<td><?php if(empty($kullaniciEmailler[5])){
	
							echo "-";
						}
					   else{
					   
					   		echo $kullaniciEmailler[5];
					   }?></td>
			<td><button class="buttonDuzenle" type="submit" name="duzenle" value= "<?php echo $kullaniciAdlar[4]; ?>" >Düzenle</button></td>
			<td><button class="buttonSil" type="submit" value="<?php echo $kullaniciAdlar[4]; ?>" name="sil">Sil</button></td>
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

$conn->close();
?>