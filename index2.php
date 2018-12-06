
<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "123456", "testing");
$sub_query = "SELECT framework, count(*) as no_of_like FROM like_table GROUP BY framework 
   ORDER BY id ASC";
$result = mysqli_query($connect, $sub_query);
$data = array();
while($row = mysqli_fetch_array($result))
{
 $data[] = array(
  'label'  => $row["framework"],
  'value'  => $row["no_of_like"]
 );
}
$data = json_encode($data);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Live Donut Chart by using Morris.js with Ajax PHP</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <!--Morris Chart CSS -->
        <link rel="stylesheet" href="morris/morris.css">
        <!--Morris Chart-->
        <script src="morris/morris.min.js"></script>
        <script src="morris/raphael.min.js"></script>

     
     
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
