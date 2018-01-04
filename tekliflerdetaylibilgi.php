<?php
	
session_start();

//echo $_SESSION["adminkullanici"];

$url = 'http://ahmetkilinc.net/adminPanel/index.php';

if(!isset($_SESSION['adminkullanici']) && empty($_SESSION['adminkullanici'])){
	
	header("Location: $url");
}

$firmaAdi = $_POST["detay"];

$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	
	die("Bağlantı sağlanamadı: " . $conn->connect_error);
}

$sql = "SELECT * FROM musteri";

$result = $conn->query($sql);

$i = 0;

if($result->num_rows > 0){
	
	/*$a = $row["musteri_adi"];
	$b = $row["musteri_firma"];*/
	
	while($row = $result->fetch_assoc()){
		
		echo "hop: " . $row["musteri_adi"];
		echo "hop2 " . $row["musteri_firma"];
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
				
				text-align: center;
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
	
	<h2>"<?php echo $firmaAdi;?>" Şirketine Verilen Teklif Bilgileri</h2>	
		<table>
		  <tr>
			<td class="a">Müşteri Adı Soyadı:</td>
			<td class="a"><?php echo $a;?></td>
		  </tr>           
		  <tr>
			<td class="a">Firma Adı:</td>
			<td class="a"><?php echo $b;?></td>
		  </tr>
		  <tr>
			<td class="a">Müşteri Telefon No:</td>
			<td class="a">Müşteri Adı</td>
		  </tr>
		  <tr>
			<td class="a">Müşteri E-Posta:</td>
			<td class="a">Müşteri Adı</td>
		  </tr>
		  <tr>
			<td class="a">Teklif Fiyatı:</td>
			<td class="a">Müşteri Adı</td>
		  </tr>
		  
		  <tr>
			<td class="a">Teklif Tarihi</td>
			<td class="a">Müşteri Adı</td>
		  </tr>
		  
		  <tr>
			<td class="a">Onay</td>
			<td class="a">Müşteri Adı</td>
		  </tr>
		</table>
	<button class="buttonGonder" onclick="funcGeri()">Geri Dön</button>
</div>	
	</body>
	<head>
		<script>
		
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