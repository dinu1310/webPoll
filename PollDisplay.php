
 <!DOCTYPE html>  
 <html>  
      <head> 
      <body>  
      <?php  
class poll {

  public static function dbs($qry) {
      $connect = mysqli_connect("localhost", "", "", "test");  
      $query = $qry;  
      $result = mysqli_query($connect, $query); 
      return $result;
      $conn->close();	  
  }
}

      ?>  	  
           <title>Poll Results</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['pollValue', 'Number'],  
                          <?php 
                           $p1= new poll();
                           $res=$p1->dbs("SELECT pollValue, count(*) as number FROM poll GROUP BY pollValue");						  
                          while($row = mysqli_fetch_array($res))  
                          {  
                               echo "['".$row["pollValue"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]); 
                     					 
                var options = {  
                      title:'',  
                      //is3D:true,  
                      pieHole: 0.4  
                     }; 
                       pieText:"hello world"					 
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      
           <br /><br />  
           <div style="width:900px;">  
                <h3 align="center">Percentage of individual poll</h3>  
                <br />  
                <div id="piechart" style="width: 900px; height: 300px;"></div> 
				
           </div> 
<div style="width:900px; height:200px;" align="left">		   
		   <?php
$p2= new poll();
$p3= new poll();
$ress=$p2->dbs("select `pollValue`, count(*) as max from poll group by `pollValue` order by count(*) desc limit 1");
$ress2=$p2->dbs("SELECT pollValue, count(*) as number FROM poll GROUP BY pollValue");
echo "<b>No of times of individual polls<br></b>";
while($row = mysqli_fetch_array($ress2))  
    {  
     echo "".$row["pollValue"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row["number"]."<br>";  
    }
$row = mysqli_fetch_array($ress);
echo "<b>".$row[0]."&nbsp;".$row[1]."<br>";

?>
</div>
      </body>  
	  </head>  
 </html> 