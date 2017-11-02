<?php
	
	session_start();

	session_unset(); 

	session_destroy();

	echo 'Başarı ile çıkış yaptınız.';
?>

<html>
	<body>
	
		<button onclick="func()">Tekrar Giriş Yap</button>
		
		<script>
			function func(){
				
				window.location.replace('http://localhost/tutorialsPoint/adminPanel/index.php');
			}
		</script>
	</body>
</html>