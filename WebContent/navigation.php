<?php
session_start();
?>
<nav class="site-header sticky-top py-1">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2 d-none d-md-inline-block" href="#">
         <img width="30" src="ressources/vectorgrafik.svg" style="filter: invert(100%);">
        </a>
        <a class="py-2 d-none d-md-inline-block" href="#">DHBW</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Product</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Features</a>
        <a class="py-2 d-none d-md-inline-block" href="">Support</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Pricing</a>
		<?php
		if (isset($_SESSION['email'])) {
			echo '<a href="logout.php" class="btn-info py-2 d-none d-md-inline-block">'."Hallo " .$_SESSION['firstname'].", zum ausloggen hier klicken".'</a>';  
		} 
		else {
		   echo '<a href="login.php" class="btn-info py-2 d-none d-md-inline-block">Login/Registrierung</a>';
		}
		?>
      </div>
 </nav>