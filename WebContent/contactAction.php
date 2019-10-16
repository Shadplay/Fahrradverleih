<?php
require 'inc/db.php';

// Daten vom Formular abrufen und in Variablen speichern
$anrede = $_POST['anrede'];
$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$email = $_POST['email'];
$grund = $_POST['grund'];
$message = $_POST['message'];

// Bei fehlenden Daten wird ein Fehler erzeugt
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
		
// Falls kein Fehler aufgetreten ist, dann speichere die Informationen in der Datenbanktabelle "contact"		

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