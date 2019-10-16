<?php
session_start();

// Definiere Datenbankinformationen zum Verbinden
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', '');
define('dbname', 'fahrrad');

// Verbindung mit der Datenbank herstellen, falls es fehlschlägt Fehlermeldung ausgeben
try {
	$connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo $e->getMessage();
}

?>
