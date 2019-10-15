<?php
require 'inc/db.php';

// Get data from FROM
$anrede = $_POST['anrede'];
$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$email = $_POST['email'];
$grund = $_POST['grund'];
$message = $_POST['message'];

		if($anrede == '')
			$errMsg = 'error';
		if($vorname == '')
			$errMsg = 'error';
		if($nachname == '')
			$errMsg = 'error';
		if($email == '')
			$errMsg = 'error';
		if($grund == '')
			$errMsg = 'error';
		if($message == '')
			$errMsg = 'error';
		

		if($errMsg == ''){
			try {
				$stmt = $connect->prepare('INSERT INTO contact (anrede, vorname, nachname, email, grund, message) VALUES (:anrede, :vorname, :nachname, :email, :grund, :message)');
				$stmt->execute(array(
					':anrede' => $anrede,
					':vorname' => $vorname,
					':nachname' => $nachname,
					':email' => $email,
					':grund' => $grund,
					':message' => $message,
					));
					?>
						<script>
						alert('Die Nachricht wurde erfolgreich übermittelt');
						window.location = "contact.php";	
						</script>
					<?php
				
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
?>