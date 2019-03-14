<?php
	include ("../../conn.php");
	$qry1 = mysqli_query($conn,"SELECT* FROM registered_voters");										
	$qry2 = mysqli_query($conn,"SELECT* FROM voternum");
	$rnum = mysqli_num_rows($qry1);//registered voters
	$num = mysqli_num_rows($qry2); 										
	$vnum; //people that voted
	if($num!=0){
		while($row = mysqli_fetch_array($qry2)){
		$vnum = $row["counter"];						
		}
	}
	$didnotvote = $rnum-$vnum;
    echo   "<!--Load the AJAX API-->
    <script type='text/javascript' src='js/jsapi.js'></script>
    <script type='text/javascript'>

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'summary');
        data.addColumn('number', 'value');
        data.addRows([
          ['Total number of students that voted', $vnum],
          ['Total number of students that did not vote', $didnotvote]
        ]);

        // Set chart options
        var options = {'title':'STATISTICS - Participation of Voters',
                       'width':500,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>";   
	include ("../../close.php");
?>
 <html><body>
    <!--Div that will hold the pie chart-->
    <div  style='border:1px dotted #14285f;min-height:250px;'><div id='chart_div'></div></div>
  </body></html>