<html>
<body>

Hallo <?php echo ($_POST["gender"] . " " . $_POST["vorname"] . " " . $_POST["nachname"]); ?> <br><br>
Sie haben Folgendes angegeben:<br><br>
E-Mail: <?php echo $_POST["email"]; ?> <br>
Grund der Kontaktaufname:<?php echo $_POST["grund"]; ?> <br>
Nachricht: <?php echo $_POST["msg"]; ?> <br><br>

Vielen Dank für Ihre Kontaktaufnahme. Wir melden uns schnellstmöglich bei der von Ihnen angegebenen E-Mail-Adresse.


</body>
</html>


ProxyPass /Fahrradverleih ajp://127.0.0.1:8009/Fahrradverleih
ProxyPassReverse /Fahrradverleih ajp://127.0.0.1:8009/Fahrradverleih
