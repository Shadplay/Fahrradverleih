<?xml version="1.0" encoding="ISO-8859-1" ?>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Booking page</title>

	<link href="/bookingPage.css" rel="stylesheet"> 
    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet"> 
    <!-- Custom styles for this template -->
    <link href="ressources/product.css" rel="stylesheet">
    
    <style>
		body {font: 14px/21px "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif;}
		.bookingPage label {font-family:Georgia, Times, "Times New Roman", serif;}
		.background {
			  background-image: url(background2.jpg);	
			  background-size: 100% 100%;
			  position: relative!important;
			  overflow: hidden;
			  padding: 4rem!important; 
		}
		.background-font {
				font-size: 3.5rem;
				font-weight: 300;
				line-height: 1.2;
				font-weight: 400!important;
				opacity: 1.0 !important;
		}
	</style>
	
	<script>
		function clickCounter() {
		  if (typeof(Storage) !== "undefined") {
		    if (localStorage.clickcount) {
		      localStorage.clickcount = Number(localStorage.clickcount)+1;
		    } else {
		      localStorage.clickcount = 1;
		    }
		    
		}
	</script>
</head>
<body>

<div class="background bg-light">

<center>
<canvas id="dynamicGraphic" class="text1" width="250" height="100"></canvas>
              <script>
              var c = document.getElementById("dynamicGraphic");
              var ctx = c.getContext("2d");
              ctx.font = "30px Arial";
              ctx.strokeText("Fahrradbuchung",10,50);
              </script>


<form action="booker" method= "post">
<center>
<table>
	<tr><td><label for="type" style="color:white">Fahrradtyp:</label> </td>
		<td><select id="type" name="type">
				<option value="1"> Mountainbike </option>
				<option value="2"> Strassenrad </option>
				<option value="3"> E-Bike </option>
			</select>
		</td>
	</tr>
	
	<!-- <tr><td><label for="amount" style="color:white">Anzahl:</label></td>
		<td>
			<select id="amount" name="anzahl">
				<option value="1"> 1 </option>
				<option value="2"> 2 </option>
				<option value="3"> 3 </option>
				<option value="4"> 4 </option>
				<option value="5"> 5 </option>
			</select>
		</td>
	</tr> -->
	
	<tr><td><label for="ldate" style="color:white">Ausleihdatum:</label></td>
		<td><input type="date" id="ldate"name="ldate" placeholder="yyyy-mm-dd"></td>
	</tr>
	<br>
	
	<!-- <tr><td><label for="retdate" style="color:white">Rückgabedatum:</label></td>
		<td><input type="date" id="retdate"name="retdate" placeholder="yyyy-mm-dd"></td>
	</tr>
	<br> -->
	
	<tr><td></td><td><input type="submit" name="Absenden" value="Absenden" class="btn btn-info" onclick="clickCounter()"></td></tr>
</table>
</form>
<br>
<div style="color:red"> Bitte stellen Sie sicher, dass Sie eingeloggt sind, bevor Sie auf "Absenden" klicken.</div>
<br>
<a class="btn btn-info" href="../Fahrradverleih/WebContent/login.php">Login</a>
<br>
<div>${message}</div>
<br>

<!-- Aufruf JavaBean -->
<jsp:useBean id="jetzt" class="booking.MyTime" />
<div style="color:white"> aktuelles Datum: ${jetzt.date}</div>
 

</center>
</body>
</html>