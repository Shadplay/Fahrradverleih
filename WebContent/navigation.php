<?php
session_start();
?>
<nav class="site-header sticky-top py-1">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2 d-none d-md-inline-block" href="#">
         <a href=index.php><img width="30" src="ressources/vectorgrafik.svg" style="filter: invert(100%);"></a>
        </a>
        <a class="py-2 d-none d-md-inline-block" href="https://www.mannheim.dhbw.de/startseite">DHBW</a>
        <a class="py-2 d-none d-md-inline-block" href="location.html">Wie sie uns finden</a>
        <a class="py-2 d-none d-md-inline-block" href="contact.html">Kontakt</a>
        <a class="py-2 d-none d-md-inline-block" href="price.php">Preise</a>
        <a class="py-2 d-none d-md-inline-block" href="verfügbarkeit.php">Verfügbarkeitsstatus</a>
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