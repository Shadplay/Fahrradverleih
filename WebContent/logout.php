<?php
	//Zerstöre Session und entferne den E-Mail Cookie bei Logout, sowie Weiterleitung zur Startseite
	require 'inc/db.php';
	session_destroy();
	setrawcookie("email","",time() - 3600,'/');

	header('Location: index.php');
?>
