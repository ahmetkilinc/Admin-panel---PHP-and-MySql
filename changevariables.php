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

		echo "Variables Updated";	
	} 

	else{

		echo "Error!: " . $conn->error;
	}

	$conn->close();

	echo $demirFiyati;
	echo $degisken2;
	echo $degisken3;
	echo $degisken4;
	echo $degisken5;
	echo $degisken6;
?>

<html>
	<head>
		
	</head>
	<body>
		
	</body>
</html>
