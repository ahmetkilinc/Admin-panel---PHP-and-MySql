<?php
	
session_start();

//echo $_SESSION["adminkullanici"];

$url = 'http://ahmetkilinc.net/adminPanel/index.php';

if(!isset($_SESSION['adminkullanici']) && empty($_SESSION['adminkullanici'])){
	
	header("Location: $url");
}

$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	
	die("Bağlantı sağlanamadı: " . $conn->connect_error);
}

$sql = "SELECT d_degeri FROM degiskenler";

$result = $conn->query($sql);

$i = 0;

if($result->num_rows > 0){
	
	while($row = $result->fetch_assoc()){
		
		$degiskenDegerleri[$i] = $row["d_degeri"];
		
		$i = $i + 1;
	}
}

?>
<!doctype html>
<html>
	<header>
	<meta charset='UTF-8' name='viewport' content='width=device-width, initial-scale=1.0'>
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
				width: 100%;
			}
			
			th, td{
				
				border: 1px solid #dddddd;
				text-align: center;
				padding: 8px;
			}
			
			td.a{
				
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
				
				margin-left: 42%;
			}
			
			.kullanici{
				
				width: 130%;
				border: 1px solid green;
				margin-right: 0px;
				text-align: center;
			}
				
		</style>
	</header>
	<body>
		<div class="buttonimg">
			<div style="float:left;" class="kullanici">
			<?php echo $_SESSION["adminkullanici"]; ?>
			</div>
			<div class="image">
				<div class="dropdown">
					<img style="width:130%; heigth:100%;" src="images/adminavatar.png">
				</div>
			</div>
				<button style="width: 130%; text-align:center; border-radius:50px;" onclick="funcAyarlar()" class="buttonD" type="button">Ayarlar</button>
				<button style="width: 130%; border-radius:50px;" class="button" type="button" onclick="func()">Çıkış</button>
		</div>
		
<div style="overflow:auto;" class='maincontent'>
<head>
<meta charset='UTF-8' name='viewport' content='width=device-width, initial-scale=1.0'>
</head>
	
	<h2>Değişken Ayarları</h2>
	
	<form method="post" action="changevariables.php">	
		<table>
		  <tr>
			<th>Değişkenler:</th>
			<th>Birim Fiyatları:</th>
		  </tr>
		  <tr>
			<td class="a">Demir Fiyatı: (m³)</td>
			<td><input type="number" step="0.001" min="0" name="demirFiyati" value="<?php echo $degiskenDegerleri[0]; ?>"></td>
			<td><button class="buttonKardemir" type="submit" value="kardemir" name="kardemir">Kardemir Sitesinden Al</button></td>
		  </tr>
		  <tr>
			<td class="a">Beton Fiyatı: (kg)</td>
			<td><input type="number" step="0.001" min="0" name="betonFiyati" value="<?php echo $degiskenDegerleri[1]; ?>"></td>
		  </tr>
		  <tr>
			<td class="a">Beton İşçilik Fiyatı: (m³)</td>
			<td><input type="number" step="0.001" min="0" name="betonIscilik" value="<?php echo $degiskenDegerleri[2]; ?>"></td>
		  </tr>
		  <tr>
			<td class="a">Demir İşçilik Fiyatı: (kg)</td>
			<td><input type="number" step="0.001" min="0" name="demirIscilik" value="<?php echo $degiskenDegerleri[3]; ?>"></td>
		  </tr>
		  <tr>
			<td class="a">Nakliyat Fiyatı 70 km'ye kadar: (sefer)</td>
			<td><input type="number" step="0.001" min="0" name="nakliyatFiyati" value="<?php echo $degiskenDegerleri[4]; ?>"></td>
		  </tr>
		  
		  <tr>
			<td class="a">Nakliyat Fiyatı 70-150 km arası: (sefer)</td>
			<td><input type="number" step="0.001" min="0" name="nakliyatFiyati2" value="<?php echo $degiskenDegerleri[9]; ?>"></td>
		  </tr>
		  
		  <tr>
			<td class="a">Nakliyat Fiyatı 150-300 km arası: (sefer)</td>
			<td><input type="number" step="0.001" min="0" name="nakliyatFiyati3" value="<?php echo $degiskenDegerleri[10]; ?>"></td>
		  </tr>
		  
		  <tr>
			<td class="a">Montaj İşçilik Fiyatı: (m³)</td>
			<td><input type="number" step="0.001" min="0" name="montajIscilikFiyati" value="<?php echo $degiskenDegerleri[5]; ?>"></td>
		  </tr>
		  <tr>
			<td class="a">Buhar Kürü Fiyatı: m³</td>
			<td><input type="number" step="0.001" min="0" name="buharKuruFiyati" value="<?php echo $degiskenDegerleri[6]; ?>"></td>
		  </tr>
		  <tr>
			<td class="a">Ankraj Fiyatı: (adet)</td>
			<td><input type="number" step="0.001" min="0" name="ankrajFiyati" value="<?php echo $degiskenDegerleri[7]; ?>"></td>
		  </tr>
		  <tr>
			<td class="a">Öngerme Halatı: (kg)</td>
			<td><input type="number" step="0.001" min="0" name="ongermeHalati" value="<?php echo $degiskenDegerleri[8]; ?>"></td>
		  </tr>
		</table>

		<button class="buttonGonder" type="submit">Gönder</button>
	</form>
	<button class="buttonGonder" onclick="funcGeri()">Geri Dön</button>
</div>	
	</body>
	<head>
		<script>
		
			function funcGeri(){
				
				window.location.replace('http://ahmetkilinc.net/adminPanel/main_page.php');
			}
			
			function funcAyarlar(){
				
				window.location.replace('http://ahmetkilinc.net/adminPanel/settings.php');
			}
			
			function func(){

				window.location.replace('http://ahmetkilinc.net/adminPanel/cikis.php');
			}
		</script>
	</head>
</html>

<?php 

	$conn->close();
?>