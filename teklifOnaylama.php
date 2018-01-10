<?php

session_start();

//echo $_SESSION["adminkullanici"];

$url = 'http://ahmetkilinc.net/adminPanel/index.php';

if(!isset($_SESSION['adminkullanici']) && empty($_SESSION['adminkullanici'])){
	
	header("Location: $url");
}

$oncekiSayfa = $_SERVER['HTTP_REFERER'];

$musteriId = $_POST["detay"];

$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	
	die("Bağlantı sağlanamadı: " . $conn->connect_error);
}

$sqlControl = "SELECT teklif_onay FROM musteri WHERE id = '$musteriId'";

$resultControl = $conn->query($sqlControl);

if($resultControl->num_rows > 0){
	
	while($row = $resultControl->fetch_assoc()){
		
		$teklifonay = $row["teklif_onay"];
	}
}

if($teklifonay == 0){
	
	$sql = "UPDATE musteri SET teklif_onay = 1 WHERE id = '$musteriId'";

	$result = $conn->query($sql);

	if ($conn->query($sql) === TRUE) {
		
		echo "Teklif Onaylandı!";
		if($oncekiSayfa == "http://ahmetkilinc.net/adminPanel/onaysizteklifler.php"){
			
			?>
			<html>
				<script>
					window.location.replace('http://ahmetkilinc.net/adminPanel/onaysizteklifler.php');
				</script>
			</html>
			<?php 
		}
		else{
			
			?>
			<html>
				<script>
					window.location.replace('http://ahmetkilinc.net/adminPanel/teklifler.php');
				</script>
			</html>
			<?php 		
		}
	} else {
		
		echo "Hata!: " . $conn->error;
	}
}

else{
	
	$sql = "UPDATE musteri SET teklif_onay = 0 WHERE id = '$musteriId'";

	$result = $conn->query($sql);

	if ($conn->query($sql) === TRUE) {
		
		echo "Teklif Onayı Kaldırıldı!";
		?>
		<html>
			<script>
				window.location.replace('http://ahmetkilinc.net/adminPanel/teklifler.php');
			</script>
		</html>
		<?php 
	} else {
		
		echo "Hata!: " . $conn->error;
	}
}

$conn->close();
?>