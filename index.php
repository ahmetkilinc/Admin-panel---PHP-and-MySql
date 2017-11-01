<?php

session_start();
$url = 'http://localhost/tutorialsPoint/adminPanel/main_page.php';

if(isset($_SESSION['adminkullanici']) && !empty($_SESSION['adminkullanici'])){
	
	header("Location: $url");
}

?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
<style>
form {

    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {

    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
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

button:hover {

    opacity: 0.8;
}

.cancelbtn {

    width: auto;
    padding: 10px 18px;
    background-color: #086A87;
}

.imgcontainer {

    text-align: center;
    margin-left: 40%;
	margin-top: 1%;
	width: 20%;
	height: 20%;
}

img.avatar {

    width: 40%;
    border-radius: 50%;
}

.container {

	width: 50%;
	height: 50%;
	margin-left: 24%;
    padding: 16px;
}

span.psw {

    float: right;
    padding-top: 16px;
}
	
h2{
		
	text-align: center;	
}

img.logo{
	
	text-align: left;
	width: 10%;
	height: 5%;
}

/* ekran büyüklük küçüklüğüne göre değişen style lar */
@media screen and (max-width: 300px){

    span.psw {
	
       display: block;
       float: none;
    }
    .cancelbtn {
	
       width: 100%;
    }
}
</style>
</head>
<body>

<img src="images/logo.png" alt="Logo" class="logo">
	<h2>Admin Giriş Paneli
</h2>
<form action="action_page.php" method="post">
  <div class="imgcontainer">
    <img src="images/adminavatar.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Kullanıcı Adı:</b></label>
    <input type="text" placeholder="Kullanıcı Adınızı Giriniz" name="kul_ad" required>

    <label><b>Parola</b></label>
    <input type="password" placeholder="Parolanızı Giriniz" name="kul_sif" required>
        
    <button type="submit">Giriş Yap</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Vazgeç</button>
    <span class="psw"><a href="lostpassword.php">Şifremi Unuttum</a></span>
  </div>
</form>

</body>
</html>
