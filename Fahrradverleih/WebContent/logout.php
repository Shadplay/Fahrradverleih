<?php
	require 'inc/db.php';
	session_destroy();
	setcookie("email","",time() - 3600);

	header('Location: index.php');
?>
