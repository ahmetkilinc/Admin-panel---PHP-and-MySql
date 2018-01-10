<?php
	
session_start();

//echo $_SESSION["adminkullanici"];

$url = 'http://ahmetkilinc.net/adminPanel/index.php';

if(!isset($_SESSION['adminkullanici']) && empty($_SESSION['adminkullanici'])){
	
	header("Location: $url");
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
				width: 50%;
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
	
	<h2>Admin Paneli</h2>
		<table>
		  <tr>
			<td><button class="buttonGonder" onclick="degiskenAyarla()" >Değişkenleri Ayarla</button></td>
		  </tr>
		  <tr>
			<td><button class="buttonGonder" onclick="teklifGor()" >Teklifleri Gör</button></td>
		  </tr>
		  <tr>
			<td><button class="buttonGonder" onclick="onaysizteklifGor()" >Onaysız Teklifleri Gör</button></td>
		  </tr>
		  <tr>
			<td><button class="buttonGonder" onclick="funcAyarlar()" >Kullanıcı Ayarları</button></td>
		  </tr>
		  <tr>
			<td><button class="buttonGonder" onclick="func()" >Çıkış Yap</button></td>
		  </tr>
		</table>
</div>	
	</body>
	<head>
		<script>
		
			function onaysizteklifGor(){
				
				window.location.replace('http://ahmetkilinc.net/adminPanel/onaysizteklifler.php');
			}
		
			function teklifGor(){
				
				window.location.replace('http://ahmetkilinc.net/adminPanel/teklifler.php');
			}
		
			function degiskenAyarla(){
				
				window.location.replace('http://ahmetkilinc.net/adminPanel/degiskenayarlama.php');
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