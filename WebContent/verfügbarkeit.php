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
   <!-- Auslesen der aktuell nicht verliehenen Fahrräder aus der Datenbank-->
  <?php
      require 'inc/db.php';
	  
	  $heute = date("Y-m-d");
	  
	  $stmt = $connect->prepare("SELECT bikeID FROM bikes LEFT JOIN ((SELECT radID AS r FROM loan WHERE leihDat =  '$heute' GROUP BY r) AS datum) ON bikes.bikeID = datum.r JOIN type ON type.modellID=bikes.modellID WHERE datum.r IS NULL AND bikes.modellID=1 GROUP BY bikeID");
	  $stmt->execute();
	  $bike1 = $stmt->rowCount();
	  
	  $stmt = $connect->prepare("SELECT bikeID FROM bikes LEFT JOIN ((SELECT radID AS r FROM loan WHERE leihDat = '$heute' GROUP BY r) AS datum) ON bikes.bikeID = datum.r JOIN type ON type.modellID=bikes.modellID WHERE datum.r IS NULL AND bikes.modellID=2 GROUP BY bikeID");
	  $stmt->execute();
	  $bike2 = $stmt->rowCount();
	  
	  $stmt = $connect->prepare("SELECT bikeID FROM bikes LEFT JOIN ((SELECT radID AS r FROM loan WHERE leihDat = '$heute' GROUP BY r) AS datum) ON bikes.bikeID = datum.r JOIN type ON type.modellID=bikes.modellID WHERE datum.r IS NULL AND bikes.modellID=3 GROUP BY bikeID");
	  $stmt->execute();
	  $bike3 = $stmt->rowCount();
	  
	  
	  $name = ['Mountainbike', 'Strassenrad', 'E-Bike'];	  
	  $sumOf = [$bike1,$bike2,$bike3];
?>
   <!-- Dynamisches Erstellen eines Piecharts mithilfe von PHP und Google Charts-->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        var name = <?= json_encode($name) ?>;
        var sumOf = <?= json_encode($sumOf) ?>;
        var array = name.split(",");
        newArr = [['Name', 'Amount']];
        array.forEach(function (v, i) {
            newArr.push([v, sumOf[i]]);
        });
        function drawChart() {

            var data = google.visualization.arrayToDataTable(newArr);


            var options = {
                title: 'Aufteilung der verfügbaren Fahrräder für heute in %'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>

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
	
	<div style ="text-align:center"> <h1>Hier sehen sie die aktuelle Verfügbarkeit unserer Fahrräder: </h1> </div>
		 <div id="piechart" style="width: 900px; height: 500px; margin: auto; border: 3px solid green; padding: 10px;"></div>
	</diV>
</body>
</html>
