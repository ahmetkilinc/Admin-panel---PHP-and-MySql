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

//$sql = "SELECT musteri_firma FROM musteri";
$sql = "SELECT musteri_firma FROM musteri ORDER BY id DESC";

$result = $conn->query($sql);

$i = 0;

if($result->num_rows > 0){
	
	while($row = $result->fetch_assoc()){
		
		$musterifirmalar[$i] = $row["musteri_firma"];
		
		$i = $i + 1;
	}
}

//$sql2 = "SELECT teklif_fiyat FROM musteri";
$sql2 = "SELECT teklif_fiyat FROM musteri ORDER BY id DESC";

$result2 = $conn->query($sql2);

$j = 0;

if($result2->num_rows > 0){
	
	while($row = $result2->fetch_assoc()){
		
		$tekliffiyatlar[$j] = $row["teklif_fiyat"];
		
		$j = $j + 1;
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
				text-align: center;
				padding: 8px;
			}
			
			td.b{
				
				border: 1px solid #dddddd;
				text-align: right;
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
	
	<h2>Verilen son 10 Teklif</h2>
	<form method="post" action="tekliflerdetaylibilgi.php">
		<table>
		  <tr>
			<th>Firma Adı:</th>
			<th>Teklif Fiyatı:</th>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musterifirmalar[0]; ?></td>
			<td class="b"><?php echo $tekliffiyatlar[0]; ?></td>
			<td><button class="buttonDetay" type="submit" value="<?php echo $musterifirmalar[0];?>" name="detay">Detaylı Bilgi</button></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musterifirmalar[1]; ?></td>
			<td class="b"><?php echo $tekliffiyatlar[1]; ?></td>
			<td><button class="buttonDetay" type="submit" value="<?php echo $musterifirmalar[1];?>" name="detay">Detaylı Bilgi</button></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musterifirmalar[2]; ?></td>
			<td class="b"><?php echo $tekliffiyatlar[2]; ?></td>
			<td><button class="buttonDetay" type="submit" value="<?php echo $musterifirmalar[2];?>" name="detay">Detaylı Bilgi</button></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musterifirmalar[3]; ?></td>
			<td class="b"><?php echo $tekliffiyatlar[3]; ?></td>
			<td><button class="buttonDetay" type="submit" value="<?php echo $musterifirmalar[3];?>" name="detay">Detaylı Bilgi</button></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musterifirmalar[4]; ?></td>
			<td class="b"><?php echo $tekliffiyatlar[4]; ?></td>
			<td><button class="buttonDetay" type="submit" value="<?php echo $musterifirmalar[4];?>" name="detay">Detaylı Bilgi</button></td>
		  </tr>
		  
		  <tr>
			<td class="a"><?php echo $musterifirmalar[5]; ?></td>
			<td class="b"><?php echo $tekliffiyatlar[5]; ?></td>
			<td><button class="buttonDetay" type="submit" value="<?php echo $musterifirmalar[5];?>" name="detay">Detaylı Bilgi</button></td>
		  </tr>
		  
		  <tr>
			<td class="a"><?php echo $musterifirmalar[6]; ?></td>
			<td class="b"><?php echo $tekliffiyatlar[6]; ?></td>
			<td><button class="buttonDetay" type="submit" value="<?php echo $musterifirmalar[6];?>" name="detay">Detaylı Bilgi</button></td>
		  </tr>
		  
		  <tr>
			<td class="a"><?php echo $musterifirmalar[7]; ?></td>
			<td class="b"><?php echo $tekliffiyatlar[7]; ?></td>
			<td><button class="buttonDetay" type="submit" value="<?php echo $musterifirmalar[7];?>" name="detay">Detaylı Bilgi</button></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musterifirmalar[8]; ?></td>
			<td class="b"><?php echo $tekliffiyatlar[8]; ?></td>
			<td><button class="buttonDetay" type="submit" value="<?php echo $musterifirmalar[8];?>" name="detay">Detaylı Bilgi</button></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musterifirmalar[9]; ?></td>
			<td class="b"><?php echo $tekliffiyatlar[9]; ?></td>
			<td><button class="buttonDetay" type="submit" value="<?php echo $musterifirmalar[9];?>" name="detay">Detaylı Bilgi</button></td>
		  </tr>
		</table>
	</form>
	<button class="buttonGonder" onclick="funcTumunuGor()">Tüm Teklifleri Gör</button>
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