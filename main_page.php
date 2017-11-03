<?php
	session_start();

	//echo $_SESSION["adminkullanici"];

	$url = 'http://localhost/tutorialsPoint/adminPanel/index.php';

	if(!isset($_SESSION['adminkullanici']) && empty($_SESSION['adminkullanici'])){
	
		header("Location: $url");
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
				
				margin-left: 42%;
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
	
	<h2>Admin Paneli</h2>
	
	<form method="post" action="changevariables.php">	
		<table>
		  <tr>
			<th>Değişkenler:</th>
		  </tr>
		  <tr>
			<td>Demir Fiyatı:</td>
			<td><input type="number" step="0.001" name="demirFiyati" value=""></td>
		  </tr>
		  <tr>
			<td>Değişken 2:</td>
			<td><input type="number" step="0.001" name="degisken2" value=""></td>
		  </tr>
		  <tr>
			<td>Değişken 3:</td>
			<td><input type="number" step="0.001" name="degisken3" value=""></td>
		  </tr>
		  <tr>
			<td>Değişken 4:</td>
			<td><input type="number" step="0.001" name="degisken4" value=""></td>
		  </tr>
		  <tr>
			<td>Değişken 5:</td>
			<td><input type="number" step="0.001" name="degisken5" value=""></td>
		  </tr>
		  <tr>
			<td>Değişken 6:</td>
			<td><input type="number" step="0.001" name="degisken6" value=""></td>
		  </tr>
		</table>	

		<button class="buttonGonder" type="submit">Gönder</button>
	</form>
</div>	
	</body>
	<head>
		<script>
			
			function funcAyarlar(){
				
				window.location.replace('http://localhost/tutorialsPoint/adminPanel/settings.php');
			}
			
			function func(){

				window.location.replace('http://localhost/tutorialsPoint/adminPanel/cikis.php');
			}
		</script>
	</head>
</html>