<?php
// Übernehme vorhandene PHP Session
session_start();
?>
<!--Erstellung der Navigation Bar-->
<nav class="site-header sticky-top py-1">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
        <!--Einbindung einer SVG Grafik als Link zur Homepage-->	
		<a class="py-2 d-none d-md-inline-block" href="#">
         <a href=index.php><img width="30" src="ressources/vectorgrafik.svg" style="filter: invert(100%);"></a>
        </a>
        <a class="py-2 d-none d-md-inline-block" href="https://www.mannheim.dhbw.de/startseite">DHBW</a>
        <a class="py-2 d-none d-md-inline-block" href="location.html">Wie sie uns finden</a>
        <a class="py-2 d-none d-md-inline-block" href="contact.php">Kontakt</a>
        <a class="py-2 d-none d-md-inline-block" href="zeiten.html">Öffnungszeiten</a>
        <a class="py-2 d-none d-md-inline-block" href="verfügbarkeit.php">Verfügbarkeitsstatus</a>
<!--Login/Registrierungsbutton der bei erfolgreichem Login den Nutzer begrüßt und ausloggt bei Mausklick-->		
		<?php
		if(isset($_SESSION['email'])) {
			echo '<a href="logout.php" class="btn-info py-2 d-none d-md-inline-block">'."Hallo " .$_SESSION['firstname'].", zum ausloggen hier klicken".'</a>';  
		} 
		else {
		   echo '<a href="login.php" class="btn-info py-2 d-none d-md-inline-block">Login/Registrierung</a>';
		}
		?>
      </div>
 </nav>