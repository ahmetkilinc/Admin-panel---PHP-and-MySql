<?php 

session_start();

$url = 'http://localhost/tutorialsPoint/adminPanel/main_page.php';

if(!isset($_SESSION['adminkullanici']) && empty($_SESSION['adminkullanici'])){
	
		header("Location: $url");
}

//database'de değişkenleri değiştir.

$demirFiyati = $_POST["demirFiyati"];
$betonFiyati = $_POST["betonFiyati"];
$betonIscilik = $_POST["betonIscilik"];
$demirIscilik = $_POST["demirIscilik"];
$nakliyatFiyati = $_POST["nakliyatFiyati"];
$montajIscilikFiyati = $_POST["montajIscilikFiyati"];
$buharKurFiyati = $_POST["buharKuruFiyati"];
$ankrajFiyati = $_POST["ankrajFiyati"];


if(empty($demirFiyati) && empty($degisken2) && empty($degisken3) && empty($degisken4) && empty($degisken5) && empty($degisken6)){
	
	echo "Hiçbir değeri güncellemediniz.";
	
	header("Location: $url");
}

	$servername = "localhost";
	$username = "root";
	$dbname = "webapp";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error){

		die("Connection failed: " . $conn->connect_error);
	}

	$sqlDemirFiyati = "UPDATE degiskenler SET d_degeri = '$demirFiyati' WHERE d_ismi = 'Demir'";

	if ($conn->query($sqlDemirFiyati) === TRUE){

		//echo "Variables Updated";
	}
	else{

		//echo "Error!: " . $conn->error;
	}

	$sqlBetonFiyati = "UPDATE degiskenler SET d_degeri = '$betonFiyati' WHERE d_ismi = 'Beton'";

	if ($conn->query($sqlBetonFiyati) === TRUE){

		//echo "Variables Updated";
	}
	else{

		//echo "Error!: " . $conn->error;
	}

	$sqlBetonIscilik = "UPDATE degiskenler SET d_degeri = '$betonIscilik' WHERE d_ismi = 'beton_iscilik'";

	if ($conn->query($sqlBetonIscilik) === TRUE){

		//echo "Variables Updated";
	}
	else{

		//echo "Error!: " . $conn->error;
	}

	$sqlDemirIscilik = "UPDATE degiskenler SET d_degeri = '$demirIscilik' WHERE d_ismi = 'demir_iscilik'";

	if($conn->query($sqlDemirIscilik) === TRUE){
		
		//echo "demir işçilik fiyatı değişti";
	}
	else{
		
		//echo "Hata:" . $conn->error;
	}

	$sqlNakliyatFiyati = "UPDATE degiskenler SET d_degeri = '$nakliyatFiyati' WHERE d_ismi = 'nakliyat'";

	if($conn->query($sqlNakliyatFiyati) === TRUE){
		
		//echo "nakliyat fiyatı değişti";
	}
	else{
		
		//echo "hata:" . $conn->error;
	}

	$sqlMontajIscilikFiyati = "UPDATE degiskenler SET d_degeri = '$montajIscilikFiyati' WHERE d_ismi = 'montaj_iscilik'";

	if($conn->query($sqlMontajIscilikFiyati) === TRUE){
		
		//echo "montaj işçilik fiyati değişti";
	}
	else{
		
		//echo "hata:" . $conn->error;
	}

	$sqlBuharKurFiyati = "UPDATE degiskenler SET d_degeri = '$buharKurFiyati' WHERE d_ismi = 'buhar_kuru'";

	if($conn->query($sqlBuharKurFiyati) === TRUE){
		
		//echo "buhar kür fiyatı değişti";
	}
	else{
		
		//echo "hata:" . $conn->error;
	}

	$sqlAnkrajFiyati = "UPDATE degiskenler SET d_degeri = '$ankrajFiyati' WHERE d_ismi = 'ankraj'";

	if($conn->query($sqlAnkrajFiyati) === TRUE){
		
		//echo "ankraj fiyati değişti";
	}
	else{
		
		//echo "hata:". $conn->error;
	}
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
				
				margin-left: 32%;
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
	
	<h2>Değişkenlere Yeni Değerleri Atandı!</h2>
	
	<form>	
		<table>
		  <tr>
			<th>Değişkenler:</th>
		  </tr>
		  <tr>
			<td>Demir Fiyatı:</td>
			<td><?php echo $demirFiyati; ?> TL</td>
		  </tr>
		  <tr>
			<td>Beton Fiyatı:</td>
			<td><?php echo $betonFiyati; ?> TL</td>
		  </tr>
		  <tr>
			<td>Beton İşçilik Fiyatı:</td>
			<td><?php echo $betonIscilik; ?> TL</td>
		  </tr>
		  <tr>
			<td>Demir İşçilik Fiyatı:</td>
			<td><?php echo $demirIscilik; ?> TL</td>
		  </tr>
		  <tr>
			<td>Nakliyat Fiyatı:</td>
			<td><?php echo $nakliyatFiyati; ?> TL</td>
		  </tr>
		  <tr>
			<td>Montaj İşçilik Fiyatı:</td>
			<td><?php echo $montajIscilikFiyati; ?> TL</td>
		  </tr>
		  <tr>
			<td>Buhar Kürü Fiyatı:</td>
			<td><?php echo $buharKurFiyati; ?> TL</td>
		  </tr>
		  <tr>
			<td>Ankraj Fiyatı:</td>
			<td><?php echo $ankrajFiyati; ?> TL</td>
		  </tr>
		</table>

		<button class="buttonGonder" type="button" onclick="funcGeri()">Geri Dön</button>
	</form>
</div>	
	</body>
	<head>
		<script>
			
			function funcGeri(){
				window.location.replace('http://localhost/tutorialsPoint/adminPanel/main_page.php');
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

	//header("Location: $url");
?>












