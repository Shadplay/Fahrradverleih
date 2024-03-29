<?php
	// Einbindung der Datenbankverbindung
	require 'inc/db.php';

	if(isset($_POST['login'])) {
		$errMsg = '';

		// Daten des HTML Forms auslesen
		$email = $_POST['email'];
		$password = $_POST['password'];
		$remember = isset($_POST['login_remember']) ? '1' : '0';
		
		// Auslesen der PHPSessionID 
		if(isset($_COOKIE['PHPSESSID'])) {
			$session_id= $_COOKIE['PHPSESSID'];
		}
		
		// Fehler erzeugen falls Informationen nicht eingetragen wurden
		if($email == '')
			$errMsg = 'Enter email';
		if($password == '')
			$errMsg = 'Enter password';

		// Lese Nutzerinformationen wie Namen und Passwort aus der Datenbanktabelle users aus
		if($errMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT id, firstname, lastname, email, password FROM users WHERE email = :email');
				$stmt->execute(array(
					':email' => $email
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
		// Falls die E-Mail Adresse nicht exisitiert gebe über ein JavaScript Alert einen Fehler aus	
				if($data == false){
					$errMsg = "User $email not found.";
					?>
						<script>
						alert("Die von Ihnen eingegebene Email ist falsch");
						</script>
					<?php
				}
	    // Wenn E-Mail und Passwort übereinstimmen, speichere die Daten in eine PHP Session
				else {
					if(password_verify($password , $data['password'] )) {
						$_SESSION['firstname'] = $data['firstname'];
						$_SESSION['lastname'] = $data['lastname'];
						$_SESSION['email'] = $data['email'];
						$_SESSION['password'] = $data['password'];
		// Aktualisiere die Session ID in der Datenbank der Nutzer				
						$stmt = $connect->prepare('UPDATE users SET session_id = (:session_id) WHERE email = :email');
						$stmt->execute(array(
						':session_id' => $session_id,
						':email' => $email,
						));
		// Setze Cookie mit dem Wert der E-Mail				
						setrawcookie("email",$email,time()+(3600*24),'/');
						
						header('Location: index.php');
						exit;
					}
		// Falls Passwort falsch ist, gebe über ein JavaScript Alert einen Fehler aus
					else {
						$errMsg = 'Password not match.';
						?>
						<script>
						alert("Das von Ihnen eingegebene Passwort ist falsch");
						</script>
						<?php
					}
				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
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
</head>
<body>
	<!--Login Formular das mit Hilfe von CSS gestaltet wurde-->	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('ressources/login/images/image.jpg');">
			<div class="wrap-login100">
					<!--Einbindung einer SVG Grafik-->	
					<span class="login100-form-logo">
						 <img width="90" src="ressources/vectorgrafik.svg">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<form action="" method="post">
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" value="<?php include ('auslesenCookie.php'); ?>" name="email" placeholder="E-Mail" autocomplete="off" />
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input type="password" name="password" placeholder="Password" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" autocomplete="off" class="input100" />
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>


					<div class="container-login100-form-btn">
						<input type="submit" name='login' value="Login" class='submit' style="width:300px; height: 40px;  background-color :#ffffff"/>
					</div>
					</form>
					<div class="text-center p-t-90">
						<a class="txt1" href="register.php">
							Möchten sie sich Registrieren? Hier klicken!
						</a>
					</div>
			</div>
		</div>
	</div>
</body>
</html>
