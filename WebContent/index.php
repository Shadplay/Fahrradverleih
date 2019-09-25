<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="favicon.ico">
	
    <title>Fahrradverleih Mannheim</title>

    <!-- Bootstrap core CSS -->
    <link href="ressources/bootstrap.min.css" rel="stylesheet"> 

    <!-- Custom styles for this template -->
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

    <div class="image-1 text-center bg-light">
    	<div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="image1-font">Dat is doch alles super hier</h1>
        <p class="lead font-weight-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple's marketing pages.</p>
        <a class="btn btn-outline-secondary" href="#">Coming soon</a>
      	</div>
      </div>
      
      
      <br>
      <h2 style= "text-align:center"><b>Modelle</b></h2>
      <br>
    <div class= "row">
        <div class="col-md-4 p-lg-4 mx-auto my-4" style= text-align:center>
             <h5>Mountainbike</h5>
             <ul class="list-unstyled">
               <li><img src="ressources/image.jpg" alt="Fahrrad" style="width:350px;height:250px;" </a></li>
               <br>
               <li><a class="btn btn-outline-success" href="#">Buchen</a></li>
                <li><a id="self1" class="btn btn-link" onclick="toggleDisplay('button1', 'self1')">weitere Informationen</a></li>
               <li id="button1" style="display:none">
                   <ul class="list-unstyled">
                       <li> Preis: 20€ pro Tag </li>
                       <li> Modelle: A, B, C </li>
                   </ul>
               </li>
              
             </ul>
           </div>
          
         <div class="col-md-4 p-lg-4 mx-auto my-4" style= text-align:center>
             <h5>Straßenrad</h5>
             <ul class="list-unstyled">
               <li><img src="ressources/image1.jpg" alt="Fahrrad" style="width:350px;height:250px;" </a></li>
               <br>
               <li><a class="btn btn-outline-success" href="#">Buchen</a></li>
                <li><a id="self2" class="btn btn-link" onclick="toggleDisplay('button2', 'self2')">weitere Informationen</a></li>
               <li id="button2" style="display:none">
                   <ul class="list-unstyled">
                       <li> Preis: 30€ pro Tag </li>
                       <li> Modelle: D, E</li>
                   </ul>
               </li>
             </ul>
           </div>
            
          <div class="col-md-4 p-lg-4 mx-auto my-4" style= text-align:center>
             <h5>E-Bike</h5>
             <ul class="list-unstyled">
               <li><img src="ressources/image2.jpg" alt="Fahrrad" style="width:350px;height:250px;" </a></li>
               <br>
               <li><a class="btn btn-outline-success" href="#">Buchen</a></li>
               <li><a id="self3" class="btn btn-link" onclick="toggleDisplay('button3', 'self3')">weitere Informationen</a></li>
               <li id="button3" style="display:none">
                   <ul class="list-unstyled">
                       <li> Preis: 40€ pro Tag </li>
                       <li> Modelle: F, G, H </li>
                   </ul>
               </li>
             </ul>
           </div>
       </div>
      
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
       
	<div style ="text-align:center"> <b>How to find us: </b> </div>
	
	<div style='height: 500px; width: 100%;'>
		<iframe width="" height="500"
			src=https://maps.google.de/maps?hl=de&q=DHBW+Fahrradverleih%20%20Coblitzallee+1-9%20Mannheim&t=&z=14&ie=utf8&iwloc=b&output=embed
			frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
			style='height: 500px; width: 100%;'></iframe>
		<p
			style="text-align: right; margin: 0px; padding-top: -10px; line-height: 10px; font-size: 10px; margin-top: -25px;">
			<a href="http://www.checkpoll.de/google-maps-generator/"
				style="font-size: 10px;" target="_blank">Google Maps Generator</a>
			by <a href="https://www.on-projects.de/" style="font-size: 10px;"
				title="" target="_blank">on-projects</a>
		</p>
	</div>
	
	<div class="col-md-5 p-lg-5 mx-auto my-5" style= text-align:left>
	<h3>Kontakt</h3>
	<p> Geben Sie hier bitte zuerst Ihre Daten ein, damit wir Sie dann kontaktieren können </p>
		<form>
			<input type="radio" name="gender" value="frau" checked> Frau 
			<input type="radio" name="gender" value="herr"> Herr <br>
			Vorname: <br>
			<input type=text name="vorname" value="Max">
			<br>
			Nachname: <br>
			<input type="text" name="nachname" value="Mustermann">
			<br>
			E-Mail: <br>
			<input type="text" name="email" value="max.mustermann@example.com">
			<br>
			Grund der Kontaktaufnahme: <br>
			<select name="grund">
				<option value="leihe"> Leihe </option>
				<option value="beratung"> Beratung </option>
				<option value="feedback"> Feedback </option>
				<option value="sonstiges"> Sonstiges </option> 
			</select>
			<br>
			Ihre Nachricht: <br>
			<textarea rows="10" cols="40"> Your text </textarea>
		</form>
	</div>
	
	<footer class="container py-5">
      <div class="row">
        <div class="col-12 col-md">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mb-2"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
          <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
        </div>
        <div class="col-6 col-md">
          <h5>Features</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">Cool stuff</a></li>
            <li><a class="text-muted" href="#">Random feature</a></li>
            <li><a class="text-muted" href="#">Team feature</a></li>
            <li><a class="text-muted" href="#">Stuff for developers</a></li>
            <li><a class="text-muted" href="#">Another one</a></li>
            <li><a class="text-muted" href="#">Last time</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Resources</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">Resource</a></li>
            <li><a class="text-muted" href="#">Resource name</a></li>
            <li><a class="text-muted" href="#">Another resource</a></li>
            <li><a class="text-muted" href="#">Final resource</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Resources</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">Business</a></li>
            <li><a class="text-muted" href="#">Education</a></li>
            <li><a class="text-muted" href="#">Government</a></li>
            <li><a class="text-muted" href="#">Gaming</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>About</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">Team</a></li>
            <li><a class="text-muted" href="#">Locations</a></li>
            <li><a class="text-muted" href="#">Privacy</a></li>
            <li><a class="text-muted" href="#">Terms</a></li>
          </ul>
        </div>
      </div>
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