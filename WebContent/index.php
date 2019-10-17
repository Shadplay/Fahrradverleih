<?php
session_start();
?>
<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="favicon.ico">
	
    <title>Fahrradverleih Mannheim</title>

    <!-- Bootstrap core CSS -->
    <link href="ressources/bootstrap.min.css" rel="stylesheet"> 

    <!-- Anpassung der Kern CSS -->
    <link href="ressources/product.css" rel="stylesheet">
	
  </head>

  <body>

		<!--Navigation bar-->
	<div id="nav-placeholder">

	</div>

	<script src="//code.jquery.com/jquery.min.js"></script>
	<script>
	$.get("navigation.php", function(data){
		$("#nav-placeholder").replaceWith(data);
	});
	</script>
	<!--end of Navigation bar-->

    <!-- Titelbild mit Text und Button -->
	<div class="image-1 text-center bg-light">
    	<div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="image1-font">Läufst du noch oder fährst du schon?</h1>
        <p class="lead font-weight-normal">Top Markenfahrräder zu günstigen Preisen mieten!</p>
        <a class="btn btn-outline-secondary" href="login.php">Starte jetzt!</a>
      	</div>
      </div>
      
      <!-- Auswahl Fahrräder und Dropdown der Preise -->
      <br>
      <h2 style= "text-align:center"><b>Modelle</b></h2>
      <br>
    <div class= "row">
        <div class="col-md-4 p-lg-4 mx-auto my-4" style= text-align:center>
             <h5>Mountainbike</h5>
             <ul class="list-unstyled">
               <li><img src="ressources/image.jpg" alt="Fahrrad" style="width:350px;height:250px;" </a></li>
               <br>
               <li><a class="btn btn-outline-success" href="/BookingPage/bookingPage.jsp">Buchen</a></li>
                <li><a id="self1" class="btn btn-link" onclick="toggleDisplay('button1', 'self1')">weitere Informationen</a></li>
               <li id="button1" style="display:none">
                   <ul class="list-unstyled">
                       <li> Preis: 15€ pro Tag </li>
                   </ul>
               </li>
              
             </ul>
           </div>
          
         <div class="col-md-4 p-lg-4 mx-auto my-4" style= text-align:center>
             <h5>Straßenrad</h5>
             <ul class="list-unstyled">
               <li><img src="ressources/image1.jpg" alt="Fahrrad" style="width:350px;height:250px;" </a></li>
               <br>
               <li><a class="btn btn-outline-success" href="/BookingPage/bookingPage.jsp">Buchen</a></li>
                <li><a id="self2" class="btn btn-link" onclick="toggleDisplay('button2', 'self2')">weitere Informationen</a></li>
               <li id="button2" style="display:none">
                   <ul class="list-unstyled">
                       <li> Preis: 10€ pro Tag </li>
                   </ul>
               </li>
             </ul>
           </div>
            
          <div class="col-md-4 p-lg-4 mx-auto my-4" style= text-align:center>
             <h5>E-Bike</h5>
             <ul class="list-unstyled">
               <li><img src="ressources/image2.jpg" alt="Fahrrad" style="width:350px;height:250px;" </a></li>
               <br>
               <li><a class="btn btn-outline-success" href="/BookingPage/bookingPage.jsp">Buchen</a></li>
               <li><a id="self3" class="btn btn-link" onclick="toggleDisplay('button3', 'self3')">weitere Informationen</a></li>
               <li id="button3" style="display:none">
                   <ul class="list-unstyled">
                       <li> Preis: 20€ pro Tag </li>
                   </ul>
               </li>
             </ul>
           </div>
       </div>
	   
	     <!-- JavaScript zur Erfüllung des Dropdown -->
       <script type="text/javascript">
       function toggleDisplay(element,self){
           var x = document.getElementById(element);
           var y = document.getElementById(self);
           if (x.style.display === "none") {
             x.style.display = "block";
             y.innerHTML = "weniger anzeigen"
           } else {
             x.style.display = "none";
             y.innerHTML = "weitere Informationen"
           }
       }
       </script>
       
	 <!-- Fußbereich und Ende der Webseite -->   
	<footer>       
        <p class="text-muted" align = "center">&copy; Patrick Odermann and Maximilian Geis</small>
		<p class="text-muted" align = "center">Made with &hearts;</small>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
  </body>
</html>