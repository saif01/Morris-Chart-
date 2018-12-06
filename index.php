<?php

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'123456');
define('DB_NAME', 'carpool');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query2="SELECT `car_number`, COUNT(*) as number FROM `car_booking` WHERE `boking_status`=1 GROUP BY `car_number`";
$result = mysqli_query($con, $query2);

//$result = mysqli_query($connect, $sub_query);

$data = array();
while($row = mysqli_fetch_array($result))
{
 $data[] = array(
  'label'  => $row["car_number"],
  'value'  => $row["number"]
 );
}
$data = json_encode($data);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Live Donut Chart by using Morris.js with Ajax PHP</title>

 <!--CDN Morris Chart-->  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />  

 <!--Local Morris Chart-->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link rel="stylesheet" href="morris/morris.css"> 
      <script src="morris/morris.min.js"></script>
      <script src="morris/raphael.min.js"></script> -->


 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Live Donut Chart by using Morris.js with Ajax PHP</h2>
  
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>

$(document).ready(function(){
 
 var donut_chart = Morris.Donut({
     element: 'chart',
     data: <?php echo $data; ?>
    });
});

</script>
