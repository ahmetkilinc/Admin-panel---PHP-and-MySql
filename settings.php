<?php 

session_start();

$url = 'http://localhost/tutorialsPoint/adminPanel/main_page.php';

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
			
			button.buttonDegistir{
				
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
				
				margin-left: 38%;
			}
			
			.imgSettings{
				
				width: 20px !important;
				height: 20px !important;
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
				<button style="width: 100%; text-align:center; border-radius:50px;" class="buttonD" type="button" onclick="funcDropdown()">Ayarlar</button>
				<button style="width: 100%; border-radius:50px;" class="button" type="button" onclick="func()">Çıkış</button>
		</div>
		
		<div style="overflow:auto;" class='maincontent'>

			<h2>Admin Paneli Ayarlar</h2>
				<table>
				  <tr>
					<td><img class="imgSettings" style="width:100%; heigth:100%;" src="images/settings.png">&nbsp;&nbsp;Kullanıcı Adını Değiştir</td>
					<td><button class="buttonDegistir" onclick="funcKulAdiDegistir()">Onayla</button></td>
				  </tr>
				  <tr>
					<td><img class="imgSettings" style="width:100%; heigth:100%;" src="images/settings.png">&nbsp;&nbsp;Şifre Değiştir</td>
					<td><button class="buttonDegistir" onclick="funcSifreDegistir()">Onayla</button></td>
				  </tr>
				  <tr>
					<td><img class="imgSettings" style="width:100%; heigth:100%;" src="images/settings.png">&nbsp;&nbsp;Yeni Yönetici Ekle</td>
					<td><button class="buttonDegistir" onclick="funcAdminEkle()">Onayla</button></td>
				  </tr>
				  <tr>
					<td><img class="imgSettings" style="width:100%; heigth:100%;" src="images/settings.png">&nbsp;&nbsp;Yöneticileri Düzenle</td>
					<td><button class="buttonDegistir" onclick="funcAdminDuzenle()">Onayla</button></td>
				  </tr>
				</table>	
				<button class="buttonGonder" onclick="funcGeri()" >Ana Sayfaya Dön</button>
		</div>	
	</body>
	<head>
		<script>		
			function funcAdminDuzenle(){
				
				window.location.replace('http://localhost/tutorialsPoint/adminPanel/')
			}
			
			function funcAdminEkle(){
				
				window.location.replace('http://localhost/tutorialsPoint/adminPanel/addNewAdmin.php');
			}
			
			function funcSifreDegistir(){
				
				window.location.replace('http://localhost/tutorialsPoint/adminPanel/passwordChange.php');
			}
			
			function funcKulAdiDegistir(){
				
				window.location.replace('http://localhost/tutorialsPoint/adminPanel/userNameChange.php');
			}
			
			function funcGeri(){
				
				window.location.replace('http://localhost/tutorialsPoint/adminPanel/main_page.php');
			}

			function func(){

				window.location.replace('http://localhost/tutorialsPoint/adminPanel/cikis.php');
			}
		</script>
	</head>
</html>