<?php
	require 'inc/db.php';

	if(isset($_POST['register'])) {
		$errMsg = '';

		// Get data from FROM
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		

		if($firstname == '')
			$errMsg = 'Enter your first name';
		if($lastname == '')
			$errMsg = 'Enter a last name';
		if($email == '')
			$errMsg = 'Enter email';
		if($password == '')
			$errMsg = 'Enter password';
		

		if($errMsg == ''){
			try {
				$stmt = $connect->prepare('INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname,:lastname, :email, :password)');
				$stmt->execute(array(
					':firstname' => $firstname,
					':lastname' => $lastname,
					':email' => $email,
					':password' => $password,
					));
					?>
						<script>
						alert('Registrierung erfolgreich, bitte loggen sie sich nun ein');
						window.location = "index.php";	
						</script>
					<?php
				
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'joined') {
		$errMsg = 'Registration successfull. Now you can <a href="login.php">login</a>';
	}
?>
<html lang="en">
<head>
	<title>Fahrradverleih Mannheim Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="ressources/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="ressources/login/util.css">
	<link rel="stylesheet" type="text/css" href="ressources/login/main.css">
<!--===============================================================================================-->

<script>
function testekennwortqualitaet(inhalt)
{
 if (inhalt=="")
 {
  document.getElementById("sicherheitshinweis").innerHTML="Keine Eingabe";
  return;
 }
 if (window.XMLHttpRequest)
 {
  // AJAX nutzen mit IE7+, Chrome, Firefox, Safari, Opera
  xmlhttp=new XMLHttpRequest();
 }
 else
 {
  // AJAX mit IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 }
 xmlhttp.onreadystatechange=function()
 {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
  {
   document.getElementById("sicherheitshinweis").innerHTML=xmlhttp.responseText;
  }
 }
 xmlhttp.open("GET","kennworttesten.php?q="+inhalt,true);
 xmlhttp.send();
}
</script>

</head>
<body>
		
	<div class="limiter">
		<div class="container-login100" style="background-image: url('ressources/login/images/image.jpg');">
			<div class="wrap-login100">
					<span class="login100-form-logo">
						 <img width="90" src="ressources/vectorgrafik.svg">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Registration
					</span>
					<form action="" method="post">
					<div class="wrap-input100 validate-input" data-validate = "Enter Firstname">
						<input class="input100" input type="text" name="firstname" placeholder="Bitte geben sie ihren Vornamen an" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname'] ?>" autocomplete="off" />
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Enter Lastname">
						<input class="input100" type="text" name="lastname" placeholder="Bitte geben sie ihren Nachnamen an" value="<?php if(isset($_POST['firstname'])) echo $_POST['lastname'] ?>" autocomplete="off" />
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Enter E-Mail">
						<input class="input100" type="text" name="email" placeholder="Wie lautet ihre E-Mail Adresse?" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" autocomplete="off" />
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input input type="password" name="password" placeholder="Geben sie das gewünschte Passwort ein" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" autocomplete="off" class="input100" onkeyup="testekennwortqualitaet(this.value)" />	
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
						<span id="sicherheitshinweis"></span>
						
					</div>


					<div class="container-login100-form-btn">
						<input type="submit" name='register' value="Registrieren sie sich jetzt" class='submit' style="width:300px; height: 40px;  background-color :#ffffff"/>
					</div>
					</form>
			</div>
		</div>
	</div>
</body>
</html>