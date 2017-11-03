<!doctype html>
<html>
<head>
 <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
<style>
	form{

		border: 3px solid #f1f1f1;
	}

	input[type=text], input[type=password]{

		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
	}
	
	button{
		
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		display: inline-block; 
	}

	button:hover{

		opacity: 0.8;
	}

	.cancelbtn{

		width: auto;
		padding: 10px 18px;
		background-color: #086A87;
	}

	.imgcontainer{

		text-align: center;
		margin-left: 40%;
		margin-top: 1%;
		width: 20%;
		height: 20%;
	}

	img.avatar{

		width: 40%;
		border-radius: 50%;
	}

	.container{

		width: 50%;
		height: 50%;
		margin-left: 24%;
		padding: 16px;
	}

	span.psw{

		float: right;
		padding-top: 16px;
	}

	h2{

		text-align: center;	
	}

	img.logo{

			text-align: left;
			width: 10%;
			height: 9.5%;
	}

	/* ekran büyüklük küçüklüğüne göre değişen style lar */
	@media screen and (max-width: 300px){

		span.psw{

		   display: block;
		   float: none;
		}
	}
	
</style>
</head>
<body>

<img src="images/logo.png" alt="Logo" class="logo">
	<h2>Kullanıcı adınızı veya şifrenizi unuttuysanız, yönetici olarak kaydedilmiş e-posta adresinizi yazarak kullanıcı adı ve şifrenizi mail yolu ile alabilirsiniz.
</h2>
<form action="lpserverside.php" method="post">

  <div class="container">
    <label><b>Admin E-Postanızı Giriniz:</b></label>
    <input type="text" placeholder="E-Posta Adresiniz" name="eposta" required>
    <button class="button" type="button" onclick="funcGeri()">Geri</button>
    <button class="button" type="submit">Onay İste</button>
  </div>
</form>
	<script>
		function funcGeri(){
			
			window.location.replace('http://localhost/tutorialsPoint/adminPanel/index.php');
		}
	</script>
</body>
</html>