<?php
	session_start();
	
	if(!isset($_SESSION['email'])) {
			echo 'Please Login First';  
	}
?>