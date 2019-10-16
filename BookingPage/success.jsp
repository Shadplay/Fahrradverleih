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

<script>
function clickCounter() {
  if (typeof(Storage) !== "undefined") {
    if (localStorage.clickcount) {
      localStorage.clickcount = Number(localStorage.clickcount)+1;
    } else {
      localStorage.clickcount = 1;
    }
    document.getElementById("msg").innerHTML = "You have submitted" + localStorage.clickcount + " bookings so far. Thank You!";
  } else {
    document.getElementById("msg").innerHTML = "Sorry, your browser does not support web storage...";
  }
}
</script>
	<div style="color:black" id="msg"><br><br></div>
	
<div>${message}</div>

</center>
</body>
</html>