<?xml version="1.0" encoding="ISO-8859-1" ?>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Booking Status</title>

<!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    
</head>

<body>

<center>
<br><br>
<div id="result"></div>

<script>
// Check browser support
if (typeof(Storage) !== "undefined") {
	// get input
  document.getElementById("result").innerHTML = "Sie haben bisher "  + localStorage.clickcount + " Buchungen versucht / aufgegeben. Vielen Dank!";
} else {
  document.getElementById("result").innerHTML = "Ihr Browser unterstützt leider keinen Local Web Storage.";
}
</script>
<br><br>
<div>${message}</div>

</center>
</body>
</html>