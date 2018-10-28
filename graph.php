<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "energysystemmanage");
$query = "SELECT * FROM analyzerreading";
$result = mysqli_query($connect, $query);

$chart_data = '';
while($row = mysqli_fetch_array($result))
{
  //echo $row;
 //$chart_data .= "{ excel_name:'".$row["excel_name"]."', excel_email:".$row["excel_email"]."},";
 $chart_data .= "{ date:'".$row["date"]."', valueunits:".$row["valueunits"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);

//echo $chart_data;
?>


<!DOCTYPE html>
<html>
 <head>
  <title>chart with PHP & Mysql | lisenme.com </title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Morris.js chart with PHP & Mysql</h2>
   <h3 align="center">Last 10 Years Profit, Purchase and Sale Data</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'year',
 ykeys:['date', 'valueunits'],
 labels:['MAIexcel_emailLS', 'date'],

 
 hideHover:'auto',
 stacked:true
});
</script>