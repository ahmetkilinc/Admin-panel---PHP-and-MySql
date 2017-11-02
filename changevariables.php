<?php 

session_start();

$url = 'http://localhost/tutorialsPoint/adminPanel/main_page.php';

if(!isset($_SESSION['adminkullanici']) && empty($_SESSION['adminkullanici'])){
	
		header("Location: $url");
}

//database'de değişkenleri değiştir.

$demirFiyati = $_POST["demirFiyati"];
$degisken2 = $_POST["degisken2"];
$degisken3 = $_POST["degisken3"];
$degisken4 = $_POST["degisken4"];
$degisken5 = $_POST["degisken5"];
$degisken6 = $_POST["degisken6"];

if(empty($demirFiyati) && empty($degisken2) && empty($degisken3) && empty($degisken4) && empty($degisken5) && empty($degisken6)){
	
	echo "Hiçbir değeri güncellemediniz.";
	
	header("Location: $url");
}



	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "webapp";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error){

		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "UPDATE degiskenler SET d_degeri = $demirFiyati WHERE d_ismi = 'Demir'";

	if ($conn->query($sql) === TRUE){

		//echo "Variables Updated";
	}

	else{

		echo "Error!: " . $conn->error;
	}

	$sql1 = "UPDATE degiskenler SET d_degeri = $degisken2 WHERE d_ismi = 'Beton'";

	if ($conn->query($sql1) === TRUE){

		//echo "Variables Updated";
	}

	else{

		//echo "Error!: " . $conn->error;
	}

	/*echo $demirFiyati;
	echo $degisken2;
	echo $degisken3;
	echo $degisken4;
	echo $degisken5;
	echo $degisken6;*/
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
			
			button.button {

				background-color: #4CAD60;
				color: white;
				border: none;
			}
			
			button.buttonGonder {

				background-color: #4CAD60;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				width: 100%;
			}
			
			h2{
				
				margin-left: 42%;
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
			
			<h2>Admin Paneli</h2>
			
			<table>
			  <tr>
				<td>Demir Fiyatının Güncellenmiş Değeri:</td>
				<td><?php echo $demirFiyati ?></td>
			  </tr>
			  <tr>
				<td>Değişken 2 nin Güncellenmiş Değeri:</td>
				<td><?php if(empty($degisken2)){

							echo "Bu değişken üzerinde değişiklik yapılmadı.";
						} 
						  else{

							  echo $degisken2;
						  }
					?>
				</td>
			  </tr>
			  <tr>
				<td>Değişken 3 nin Güncellenmiş Değeri:</td>
				<td></td>
			  </tr>
			  <tr>
				<td>Değişken 4 nin Güncellenmiş Değeri:</td>
				<td></td>
			  </tr>
			  <tr>
				<td>Değişken 5 nin Güncellenmiş Değeri:</td>
				<td></td>
			  </tr>
			  <tr>
				<td>Değişken 6 nin Güncellenmiş Değeri:</td>
				<td></td>
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
			
			window.history.back();
		}
	</script>
</html>

<?php 
	$conn->close();
?>
