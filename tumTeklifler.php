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

$dateControl = (new \DateTime(date("Y")."-01-01"))->format("Y-m-d");
//echo $dateC . " hey there!";

$sql = "SELECT musteri_adi, musteri_firma, musteri_tel, musteri_eposta, teklif_fiyat, teklif_tarih FROM musteri WHERE teklif_tarih >= '$dateControl' ORDER BY id DESC";

$result = $conn->query($sql);

$i = 0;

if($result->num_rows > 0){
	
	while($row = $result->fetch_assoc()){
		
		$musteriadlar[$i] = $row["musteri_adi"];
		$musterifirmalar[$i] = $row["musteri_firma"];
		$musteriteller[$i] = $row["musteri_tel"];
		$musteriepostalar[$i] = $row["musteri_eposta"];
		$tekliffiyatlar[$i] = $row["teklif_fiyat"];
		$tekliftarihler[$i] = $row["teklif_tarih"];
		
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
				
				text-align: center;
			}
			
			.kullanici{
				
				width: 130%;
				border: 1px solid green;
				margin-right: 0px;
				text-align: center;
			}
			
			.btnPast{
				
				background-color: CornflowerBlue;
				width: 8%;
				height: 7%;
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

	<button class="btnPast" onclick="goPast()"> <?php echo date("Y")-1; ?></button>
	<h2>Tüm Teklifler <?php echo date("Y");?></h2>
	<form method="post" action="tekliflerdetaylibilgi.php">
		<table>
		  <tr>
			<th>Müşteri Ad-Soyadı:</th>
			<th>Firma Adı:</th>
			<th>Müşteri Telefon:</th>
			<th>Müşteri E-Posta:</th>
			<th>Teklif Fiyatı:</th>
			<th>Teklif Tarihi:</th>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[0]; ?></td>
			<td class="b"><?php echo $musterifirmalar[0]; ?></td>
			<td class="a"><?php echo $musteriteller[0]; ?></td>
			<td class="b"><?php echo $musteriepostalar[0]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[0]; ?></td>
			<td class="b"><?php echo $tekliftarihler[0]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[1]; ?></td>
			<td class="b"><?php echo $musterifirmalar[1]; ?></td>
			<td class="a"><?php echo $musteriteller[1]; ?></td>
			<td class="b"><?php echo $musteriepostalar[1]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[1]; ?></td>
			<td class="b"><?php echo $tekliftarihler[1]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[2]; ?></td>
			<td class="b"><?php echo $musterifirmalar[2]; ?></td>
			<td class="a"><?php echo $musteriteller[2]; ?></td>
			<td class="b"><?php echo $musteriepostalar[2]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[2]; ?></td>
			<td class="b"><?php echo $tekliftarihler[2]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[3]; ?></td>
			<td class="b"><?php echo $musterifirmalar[3]; ?></td>
			<td class="a"><?php echo $musteriteller[3]; ?></td>
			<td class="b"><?php echo $musteriepostalar[3]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[3]; ?></td>
			<td class="b"><?php echo $tekliftarihler[3]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[4]; ?></td>
			<td class="b"><?php echo $musterifirmalar[4]; ?></td>
			<td class="a"><?php echo $musteriteller[4]; ?></td>
			<td class="b"><?php echo $musteriepostalar[4]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[4]; ?></td>
			<td class="b"><?php echo $tekliftarihler[4]; ?></td>
		  </tr>
		  
		  <tr>
			<td class="a"><?php echo $musteriadlar[5]; ?></td>
			<td class="b"><?php echo $musterifirmalar[5]; ?></td>
			<td class="a"><?php echo $musteriteller[5]; ?></td>
			<td class="b"><?php echo $musteriepostalar[5]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[5]; ?></td>
			<td class="b"><?php echo $tekliftarihler[5]; ?></td>
		  </tr>
		  
		  <tr>
			<td class="a"><?php echo $musteriadlar[6]; ?></td>
			<td class="b"><?php echo $musterifirmalar[6]; ?></td>
			<td class="a"><?php echo $musteriteller[6]; ?></td>
			<td class="b"><?php echo $musteriepostalar[6]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[6]; ?></td>
			<td class="b"><?php echo $tekliftarihler[6]; ?></td>
		  </tr>
		  
		  <tr>
			<td class="a"><?php echo $musteriadlar[7]; ?></td>
			<td class="b"><?php echo $musterifirmalar[7]; ?></td>
			<td class="a"><?php echo $musteriteller[7]; ?></td>
			<td class="b"><?php echo $musteriepostalar[7]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[7]; ?></td>
			<td class="b"><?php echo $tekliftarihler[7]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[8]; ?></td>
			<td class="b"><?php echo $musterifirmalar[8]; ?></td>
			<td class="a"><?php echo $musteriteller[8]; ?></td>
			<td class="b"><?php echo $musteriepostalar[8]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[8]; ?></td>
			<td class="b"><?php echo $tekliftarihler[8]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[9]; ?></td>
			<td class="b"><?php echo $musterifirmalar[9]; ?></td>
			<td class="a"><?php echo $musteriteller[9]; ?></td>
			<td class="b"><?php echo $musteriepostalar[9]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[9]; ?></td>
			<td class="b"><?php echo $tekliftarihler[9]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[10]; ?></td>
			<td class="b"><?php echo $musterifirmalar[10]; ?></td>
			<td class="a"><?php echo $musteriteller[10]; ?></td>
			<td class="b"><?php echo $musteriepostalar[10]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[10]; ?></td>
			<td class="b"><?php echo $tekliftarihler[10]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[11]; ?></td>
			<td class="b"><?php echo $musterifirmalar[11]; ?></td>
			<td class="a"><?php echo $musteriteller[11]; ?></td>
			<td class="b"><?php echo $musteriepostalar[11]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[11]; ?></td>
			<td class="b"><?php echo $tekliftarihler[11]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[12]; ?></td>
			<td class="b"><?php echo $musterifirmalar[12]; ?></td>
			<td class="a"><?php echo $musteriteller[12]; ?></td>
			<td class="b"><?php echo $musteriepostalar[12]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[12]; ?></td>
			<td class="b"><?php echo $tekliftarihler[12]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[13]; ?></td>
			<td class="b"><?php echo $musterifirmalar[13]; ?></td>
			<td class="a"><?php echo $musteriteller[13]; ?></td>
			<td class="b"><?php echo $musteriepostalar[13]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[13]; ?></td>
			<td class="b"><?php echo $tekliftarihler[13]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[14]; ?></td>
			<td class="b"><?php echo $musterifirmalar[14]; ?></td>
			<td class="a"><?php echo $musteriteller[14]; ?></td>
			<td class="b"><?php echo $musteriepostalar[14]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[14]; ?></td>
			<td class="b"><?php echo $tekliftarihler[14]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[15]; ?></td>
			<td class="b"><?php echo $musterifirmalar[15]; ?></td>
			<td class="a"><?php echo $musteriteller[15]; ?></td>
			<td class="b"><?php echo $musteriepostalar[15]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[15]; ?></td>
			<td class="b"><?php echo $tekliftarihler[15]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[16]; ?></td>
			<td class="b"><?php echo $musterifirmalar[16]; ?></td>
			<td class="a"><?php echo $musteriteller[16]; ?></td>
			<td class="b"><?php echo $musteriepostalar[16]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[16]; ?></td>
			<td class="b"><?php echo $tekliftarihler[16]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[17]; ?></td>
			<td class="b"><?php echo $musterifirmalar[17]; ?></td>
			<td class="a"><?php echo $musteriteller[17]; ?></td>
			<td class="b"><?php echo $musteriepostalar[17]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[17]; ?></td>
			<td class="b"><?php echo $tekliftarihler[17]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[18]; ?></td>
			<td class="b"><?php echo $musterifirmalar[18]; ?></td>
			<td class="a"><?php echo $musteriteller[18]; ?></td>
			<td class="b"><?php echo $musteriepostalar[18]; ?></td>
			<td class="a"><?php echo $tekliffiyatlar[18]; ?></td>
			<td class="b"><?php echo $tekliftarihler[18]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[19]; ?></td>
			<td class="b"><?php echo $musterifirmalar[19]; ?></td>
			<td class="a"><?php echo $musteriteller[19]; ?></td>
			<td class="b"><?php echo $musteriepostalar[19]; ?></td>
			<td class="a"><?php echo $musterifiyatlar[19]; ?></td>
			<td class="b"><?php echo $musteritarihler[19]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[20]; ?></td>
			<td class="b"><?php echo $musterifirmalar[20]; ?></td>
			<td class="a"><?php echo $musteriteller[20]; ?></td>
			<td class="b"><?php echo $musteriepostalar[20]; ?></td>
			<td class="a"><?php echo $musterifiyatlar[20]; ?></td>
			<td class="b"><?php echo $musteritarihler[20]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[21]; ?></td>
			<td class="b"><?php echo $musterifirmalar[21]; ?></td>
			<td class="a"><?php echo $musteriteller[21]; ?></td>
			<td class="b"><?php echo $musteriepostalar[21]; ?></td>
			<td class="a"><?php echo $musterifiyatlar[21]; ?></td>
			<td class="b"><?php echo $musteritarihler[21]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[22]; ?></td>
			<td class="b"><?php echo $musterifirmalar[22]; ?></td>
			<td class="a"><?php echo $musteriteller[22]; ?></td>
			<td class="b"><?php echo $musteriepostalar[22]; ?></td>
			<td class="a"><?php echo $musterifiyatlar[22]; ?></td>
			<td class="b"><?php echo $musteritarihler[22]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[23]; ?></td>
			<td class="b"><?php echo $musterifirmalar[23]; ?></td>
			<td class="a"><?php echo $musteriteller[23]; ?></td>
			<td class="b"><?php echo $musteriepostalar[23]; ?></td>
			<td class="a"><?php echo $musterifiyatlar[23]; ?></td>
			<td class="b"><?php echo $musteritarihler[23]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[24]; ?></td>
			<td class="b"><?php echo $musterifirmalar[24]; ?></td>
			<td class="a"><?php echo $musteriteller[24]; ?></td>
			<td class="b"><?php echo $musteriepostalar[24]; ?></td>
			<td class="a"><?php echo $musterifiyatlar[24]; ?></td>
			<td class="b"><?php echo $musteritarihler[24]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[25]; ?></td>
			<td class="b"><?php echo $musterifirmalar[25]; ?></td>
			<td class="a"><?php echo $musteriteller[25]; ?></td>
			<td class="b"><?php echo $musteriepostalar[25]; ?></td>
			<td class="a"><?php echo $musterifiyatlar[25]; ?></td>
			<td class="b"><?php echo $musteritarihler[25]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[26]; ?></td>
			<td class="b"><?php echo $musterifirmalar[26]; ?></td>
			<td class="a"><?php echo $musteriteller[26]; ?></td>
			<td class="b"><?php echo $musteriepostalar[26]; ?></td>
			<td class="a"><?php echo $musterifiyatlar[26]; ?></td>
			<td class="b"><?php echo $musteritarihler[26]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[27]; ?></td>
			<td class="b"><?php echo $musterifirmalar[27]; ?></td>
			<td class="a"><?php echo $musteriteller[27]; ?></td>
			<td class="b"><?php echo $musteriepostalar[27]; ?></td>
			<td class="a"><?php echo $musterifiyatlar[27]; ?></td>
			<td class="b"><?php echo $musteritarihler[27]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[28]; ?></td>
			<td class="b"><?php echo $musterifirmalar[28]; ?></td>
			<td class="a"><?php echo $musteriteller[28]; ?></td>
			<td class="b"><?php echo $musteriepostalar[28]; ?></td>
			<td class="a"><?php echo $musterifiyatlar[28]; ?></td>
			<td class="b"><?php echo $musteritarihler[28]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[29]; ?></td>
			<td class="b"><?php echo $musterifirmalar[29]; ?></td>
			<td class="a"><?php echo $musteriteller[29]; ?></td>
			<td class="b"><?php echo $musteriepostalar[29]; ?></td>
			<td class="a"><?php echo $musterifiyatlar[29]; ?></td>
			<td class="b"><?php echo $musteritarihler[29]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[30]; ?></td>
			<td class="b"><?php echo $musterifirmalar[30]; ?></td>
			<td class="a"><?php echo $musteriteller[30]; ?></td>
			<td class="b"><?php echo $musteriepostalar[30]; ?></td>
			<td class="a"><?php echo $musterifiyatlar[30]; ?></td>
			<td class="b"><?php echo $musteritarihler[30]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[31]; ?></td>
			<td class="b"><?php echo $musterifirmalar[31]; ?></td>
			<td class="a"><?php echo $musteriteller[31]; ?></td>
			<td class="b"><?php echo $musteriepostalar[31]; ?></td>
			<td class="a"><?php echo $musterifiyatlar[31]; ?></td>
			<td class="b"><?php echo $musteritarihler[31]; ?></td>
		  </tr>
		  <tr>
			<td class="a"><?php echo $musteriadlar[32]; ?></td>
			<td class="b"><?php echo $musterifirmalar[32]; ?></td>
			<td class="a"><?php echo $musteriteller[32]; ?></td>
			<td class="b"><?php echo $musteriepostalar[32]; ?></td>
			<td class="a"><?php echo $musterifiyatlar[32]; ?></td>
			<td class="b"><?php echo $musteritarihler[32]; ?></td>
		  </tr>
		  <>
		</table>
	</form>
	<button class="buttonGonder" onclick="funcGeri()">Geri Dön</button>
</div>	
	</body>
	<head>
		<script>
		
			function goPast(){
				
				window.location.replace('http://ahmetkilinc.net/adminPanel/tumTekliflerPast1.php');
			}
		
			function funcGeri(){
				
				window.location.replace('http://ahmetkilinc.net/adminPanel/teklifler.php');
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