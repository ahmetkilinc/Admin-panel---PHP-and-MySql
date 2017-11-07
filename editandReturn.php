<?php 

session_start();

$url = 'http://localhost/tutorialsPoint/adminPanel/index.php';
$url2 = 'http://localhost/tutorialsPoint/adminPanel/editAdmin.php';

if(!isset($_SESSION['adminkullanici']) && empty($_SESSION['adminkullanici'])){
	
	header("Location: $url");
}

$yeniAdminAdi = $_POST['yeniAdminAdi'];
$yeniAdminSifre = $_POST['yeniAdminSifre'];
$yeniAdminEmail = $_POST['yeniAdminEmail'];
$adminId = $_POST['duzenle'];

$servername = "localhost";
$username = "root";
$password = "ahmet3899";
$dbname = "webapp";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "UPDATE admin_user SET kullanici_adi = '$yeniAdminAdi', sifre = '$yeniAdminSifre', email = '$yeniAdminEmail' WHERE id= '$adminId'";

if ($conn->query($sql) === TRUE){

	header("Location: $url2");
}

else{

	echo "Error!: " . $conn->error;
}

?>