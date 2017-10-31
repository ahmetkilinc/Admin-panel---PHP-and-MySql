<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "webapp";
	
	$adminname = $_POST["kul_ad"];
	$adminpass = $_POST["kul_sif"];
	$tamam = 0;

	$dateOnlyY = date("Y");

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error){
		
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "SELECT kullanici_adi, sifre FROM admin_user";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			
			if($adminname == $row["kullanici_adi"]){
				
				if($adminpass == $row["sifre"]){

					$tamam = 1;
				}
			}
		}
	}

	$conn->close();
	
	if($tamam == 1){
		
		echo "Giris Başarılı.";
	}
	else{
		
		echo '<head>
				<meta charset="UTF-8">
  				<title>Admin Paneli Hata Ekranı</title>
				<style>
					div.container{

						width: 80%;
						height: 100%;
						border: 5px solid gray;
						margin: 0 auto;
					}

					header, footer{

						padding: 1em;
						color: white;
						background-color: gray;
						clear: left;
						text-align: center;
					}

					article{

						height: 70%;
						margin-left: 170px;
						border-left: 0px solid gray;
						padding: 1em;
						overflow: hidden;
					}
					
					footer{
					
						font-size:12px;
						height:30px;
						padding-top:11px;
					}
					
					.btnGeri{
		
						background-color: #2E9AFE;
						border: none;
						color: white;
						padding: 15px 32px;
						text-align: justify;
						text-decoration: underline;
						font-size: 14px;
						margin: 4px 2px;
						cursor: pointer;
					}
				</style>
			</head>
			<body>

				<div class="container">

				<header>
				   <h1>Admin Paneli Hata Ekranı</h1>
				</header>

				<article>
				  <p><img src="images/logo.png" alt="Betonel A.Ş." style="width:150px;height:75;"> <br>Merhaba; admin girişiniz onaylanmadı, şifreniz veya kullanıcı adınız hatalı. Bu durumun aksini düşünüyorsanız lütfen yazılımcınız ile görüşünüz. Aşağıdaki butona tıklayarak bir önceki sayfaya dönebilir, tekrar giriş yapmayı deneyebilirsiniz.<br><br>
				<head>
					<script>
						function geriDon(){

							window.history.back()
						}
					</script>
				</head>
			<body>

				<input class="btnGeri" type="button" onclick="geriDon()" value="Değişiklikler için Geri Dön">
			
			</body>
	
		</p>
			</article>

			<footer> 
				BETONEL AŞ. Copyright &copy;' . $dateOnlyY .' .All rights reserved.
			</footer>			
			</div>
			</body>';
	}

/*
	echo $_POST["kul_ad"];
	echo $_POST["kul_sif"];*/
?>
