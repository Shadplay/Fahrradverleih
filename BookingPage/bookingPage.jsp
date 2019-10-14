<?xml version="1.0" encoding="ISO-8859-1" ?>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Booking page</title>
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
	$.get("\..\..\navigation.php", function(data){
		$("#nav-placeholder").replaceWith(data);
	});
	</script>
	<!--end of Navigation bar-->

<form action="booker" method= "post">
<table>
	<tr><td><label for="email" required/>E-Mail-Adresse:</label></td>
		<td><input type="text" id="email"name="email" placeholder="max.mustermann@bsp.com"></td>
	</tr>
	
	<tr><td><label for="type" required>Fahrradtyp:</label> </td>
		<td><select id="type" name="type">
				<option value="1"> Mountainbike </option>
				<option value="2"> Strassenrad </option>
				<option value="3"> E-Bike </option>
			</select>
		</td>
	</tr>
	
	<tr><td><label for="amount" required>Anzahl:</label></td>
		<td>
			<select id="amount" name="anzahl">
				<option value="1"> 1 </option>
				<option value="2"> 2 </option>
				<option value="3"> 3 </option>
				<option value="4"> 4 </option>
				<option value="5"> 5 </option>
			</select>
		</td>
	</tr>
	
	<tr><td><label for="ldate" required>Ausleihdatum:</label></td>
		<td><input type="date" id="ldate"name="ldate" placeholder="yyyy-mm-dd"></td>
	</tr>
	<br>
	<tr><td><label for="retdate" required>Rückgabedatum:</label></td>
		<td><input type="date" id="retdate"name="retdate" placeholder="yyyy-mm-dd"></td>
	</tr>
	<br>
	<tr><td><input type="submit" name="Absenden" value="Absenden" class="btn btn-outline-success"></td></tr>
</table>
</form>
<br>
<div style="color:red"> Bitte stellen Sie sicher, dass Sie eingeloggt sind, bevor Sie auf "Absenden" klicken.</div>
<br>
<div>${message}</div>
<br>
<jsp:useBean id="aktuelle_zeit" class="java.util.Date" />
<div>aktuelles Datum: ${aktuelle_zeit}</div>

</body>
</html>