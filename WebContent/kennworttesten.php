<?php
//Überprüfung des eingegebenen Kennworts auf verschiedene Sicherheitsmerkmale
$passwort = '';
if ( isset($_GET['q']) )
{
  $passwort = $_GET['q'];
}
$sicherheitszahl = 0;
$sicherheitszahl = strlen($passwort);
if (preg_match("/[a-z]/", $passwort)) {
    $sicherheitszahl = $sicherheitszahl + 5;
}
if (preg_match("/[A-Z]/", $passwort)) {
    $sicherheitszahl = $sicherheitszahl + 5;
}
if (preg_match("/[0-9]/", $passwort)) {
    $sicherheitszahl = $sicherheitszahl + 5;
}
if (preg_match("/[,.-;:_]/", $passwort)) {
    $sicherheitszahl = $sicherheitszahl + 5;
}
//Ausgabe des Analyseergebnis 
if ($sicherheitszahl <= 18 ) {
    echo '<span style="color:#FF0000"> Dieses Kennwort ist unsicher </span>';
}
elseif ($sicherheitszahl <= 25) {
    echo '<span style="color:#FF9900"> Dieses Kennwort ist sicher </span>';
}
elseif ($sicherheitszahl > 25) {
	echo '<span style="color:#54ff29"> Dieses Kennwort ist sehr sicher </span>';
}
?>