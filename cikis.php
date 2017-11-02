<?php
	
	session_start();

	session_unset(); 
	session_destroy();

	//echo 'Başarı ile çıkış yaptınız.';
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
	
			  width: 70%;
			  background: white;
			  margin: 10% auto 15px auto;
			  border-radius: 10px 10px 10px 10px;
			  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.6);
			}
			
			article{

				height: 70%;
				margin-left: 170px;
				border-left: 0px solid gray;
				padding: 1em;
				overflow: hidden;
			}
						
			button {

				background-color: #4CAF50;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				cursor: pointer;
				width: 100%;
			}
			
			h2{
				
				margin-left: 42%;
			}
		</style>
	</head>
	<body>
		
		<div class="maincontent">
			
			<h2>Admin Paneli</h2>
			
			<p>Güvenli bir şekilde çıkış yaptınız.</p>
			
			<button onclick="func()" type="button">Giriş Sayfasına Dön</button>
		</div>
	</body>
	<script>
		function func(){
			
			window.location.replace('http://localhost/tutorialsPoint/adminPanel/index.php');
		}
	</script>
</html>