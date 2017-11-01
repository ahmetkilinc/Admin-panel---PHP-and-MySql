<?php
	session_start();
	
	echo "welcome to the new age...";

	echo $_SESSION["adminkullanici"];

	$url = 'http://localhost/tutorialsPoint/adminPanel/index.php';

	if(!isset($_SESSION['adminkullanici']) && empty($_SESSION['adminkullanici'])){
	
		header("Location: $url");
	}

?>

<html>
	<body>
		<button onclick="func()">Çıkış</button>
	</body>
	
	<script>
		function func(){
			
			window.location.replace('http://localhost/tutorialsPoint/adminPanel/control.php');
		}
	</script>
</html>