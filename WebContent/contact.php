<html lang="de">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="favicon.ico">
	
    <title>Fahrradverleih Mannheim</title>

    <!-- Bootstrap core CSS -->
    <link href="ressources/bootstrap.min.css" rel="stylesheet"> 

    <!-- Custom styles for this template -->
    <link href="ressources/product.css" rel="stylesheet">
	
	<style>
		body {font-family: Arial, Helvetica, sans-serif;}
		* {box-sizing: border-box;}

		input[type=text], select, textarea {
		  width: 100%;
		  padding: 12px;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  box-sizing: border-box;
		  margin-top: 6px;
		  margin-bottom: 16px;
		  resize: vertical;
		}

		input[type=submit] {
		  background-color: #4CAF50;
		  color: white;
		  padding: 12px 20px;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
		}
		input[type=reset] {
		  background-color: #ff0000;
		  color: white;
		  padding: 12px 20px;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
		}

		input[type=submit]:hover {
		  background-color: #45a049;
		}

</style>
	
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
	<div style="width: 900px; margin: auto; padding: 10px;">
	<h2 style="text-align:center">Kontakt</h2>
	<div style="text-align:center"> Geben Sie hier bitte zuerst Ihre Daten ein, damit wir Sie dann kontaktieren können.</div>
		<form action="contactAction.php" method="POST">
			<br>Anrede<br>
			<select name="anrede" size="1">
			<option value="Herr">Herr</option>
			<option value="Frau">Frau</option>
			</select>
			<br>Vorname</br> <input type="text" name="vorname">
			<br>Nachname<br> <input type="text" name="nachname">
			<br>Email</br> <input type="text" name="email">
			<br>Grund</br>
			<select name="grund" size="1">
				<option value="Leihe"> Leihe </option>
				<option value="Beratung"> Beratung </option>
				<option value="Feedback"> Feedback </option>
				<option value="Sonstiges"> Sonstiges </option> 
			</select>
			<br>Message</br><textarea name="message" rows="10" cols="40"></textarea><br />
			<input type="submit" value="Send">&nbsp;<input type="reset" value="Clear">
		</form>
	</div>
	
</body>
</html>
