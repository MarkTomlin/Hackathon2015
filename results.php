<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Travel App</title>

  <link rel="stylesheet" href="bluebootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container">
	    <div class="navbar-header">
	      <a class="navbar-brand">StudentTravels</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="index.html">Home</a></li>
	        <li><a href="results.php?destination=Australia">Info</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
<div class="container">
<?php     
$destination = urldecode ($_GET['destination']);
$budget =  urldecode ($_GET['budget']);
$airport = urldecode ($_GET['airport']);
$packagedetail = urldecode($_GET['packagedetail']);
$departure = urldecode($_GET['departure']);
$duration = urldecode ($_GET['duration']);

$conn = new PDO("mysql:host=edward2.solent.ac.uk;dbname=dspokes;","dspokes","shaetuvo");
// all , if its flight and hotels 
if($packagedetail=="hotelandflight")
{
	echo '<table class="table table-striped">
 <tr>
 <th></th>
 <th>Leaving from</th>
  <th>Arriving at</th>
 <th>Price(£)</th>
  <th></th>
  <th></th>
 </tr>';
	
$sql ="SELECT DISTINCT  h.name, h.flag,f.From , f.Dest_city ,f.F_Id,h.ID, ROUND((f.price+(h.price*DATEDIFF(f.Date_Ret,f.Date_Out))),2) as total FROM Hotels h, Flights f where (f.price+(h.price*DATEDIFF(f.Date_Ret,f.Date_Out)))<='$budget' AND (f.Dest_city='$destination' OR h.country = '$destination' )  AND f.From='$airport' AND f.Date_Out='$departure' AND f.Date_Ret='$duration' AND f.Dest_city=h.city"; 

if(strlen($destination)<1)
{
	$sql ="SELECT DISTINCT  h.name, h.flag,f.From , f.Dest_city ,f.F_Id,h.ID, ROUND((f.price+(h.price*DATEDIFF(f.Date_Ret,f.Date_Out))),2) as total FROM Hotels h, Flights f where (f.price+(h.price*DATEDIFF(f.Date_Ret,f.Date_Out)))<='$budget'   AND f.From='$airport' AND f.Date_Out='$departure' AND f.Date_Ret='$duration' AND f.Dest_city=h.city"; 
}

	$results = $conn->query($sql);

while ($row = $results->fetch(PDO::FETCH_ASSOC))
{
	
	echo ' <tr>'; 
	 echo "<td><img src=$row[flag]  width='32' height='32'/></td>";
	 "<td>$row[name]</td>"; 
 echo "<td>$row[From]</td>"; 
  //echo  
 echo "<td>$row[Dest_city]</td>"; 
 echo "<td>$row[total]</td>";
   echo "<td>
 <form method='get' action='description.php'>
<input type='hidden' name='hotelID' value='$row[ID]' /> 
<input type='hidden' name='flightID' value='$row[F_Id]' /> 
<input type='submit' class='btn btn-info'value='View' /> 

</form>
</td>"; 
 echo "</tr>"; 
}

}

//if its only hotels 
if($packagedetail=="hotelonly")
{
	
	echo '<table class="table table-striped">
 <tr>
 <th></th>
 <th>Hotel</th>
 <th>City</th>
  <th>Price PPPN(£)</th>
  <th></th>
 </tr>';
	
	$sql ="SELECT * FROM Hotels h where h.price <= '$budget' AND (h.city='$destination' OR h.country = '$destination')";
	
	if(strlen($destination)<1)
	{
		$sql ="SELECT * FROM Hotels h where h.price <= '$budget'";
	}
	
	$results = $conn->query($sql);

while ($row = $results->fetch(PDO::FETCH_ASSOC))
{
	
	echo ' <tr>';
	echo "<td><img src=$row[flag]  width='32' height='32'/></td>";  
 echo "<td>$row[name]</td>"; 
 echo "<td>$row[city]</td>"; 
 echo "<td>$row[price]</td>";
  echo "<td>
 <form method='get' action='description.php'>
<input type='hidden' name='hotelID' value='$row[ID]'> 
<input type='hidden' name='flightID' value='$row[F_Id]'> 
<input type='submit' class='btn btn-info'value='View' /> 

</form>
</td>"; 
 echo "</tr>"; 
}
}
//if its only flights 
if($packagedetail=="flightsonly")
{
	echo '<table class="table table-striped">
 <tr>
 <th></th>
  <th>Leaving from</th>
 <th>Arriving at</th>
  <th>Price (£)</th>
  <th></th>
 </tr>';
	$sql ="SELECT f.From , f.Dest_city ,f.F_Id , ROUND(f.Price,2) as Price ,h.flag FROM  Flights f ,Hotels h where f.price<='$budget' AND (f.Dest_city like '%$destination' OR h.country = '$destination')  AND f.From like '%$airport' AND f.Date_Out='$departure' AND f.Date_Ret='$duration' AND f.Dest_city=h.city "; 
	
	
	if(strlen($destination)<1)
	{
		$sql ="SELECT f.From , f.Dest_city ,f.F_Id , ROUND(f.Price,2) as Price ,h.flag FROM  Flights f ,Hotels h where f.price<='$budget' AND  f.From like '%$airport' AND f.Date_Out='$departure' AND f.Date_Ret='$duration' AND f.Dest_city=h.city "; 
	}
	
		$results = $conn->query($sql);

while ($row = $results->fetch(PDO::FETCH_ASSOC))
{
		echo ' <tr>';
		echo "<td><img src=$row[flag]  width='32' height='32'/></td>";  
 echo "<td>$row[From]</td>"; 
 echo "<td>$row[Dest_city]</td>"; 
 echo "<td>$row[Price]</td>";
  echo "<td>
 <form method='get' action='description.php'>
<input type='hidden' name='hotelID' value='$row[ID]'> 
<input type='hidden' name='flightID' value='$row[F_Id]'> 
<input type='submit' class='btn btn-info'value='View' /> 

</form>
</td>"; 
 echo "</tr>"; 
 
 
}
}

if($destination=="Australia")
{
	 echo '<video width="320" height="240" controls autoplay>
		 <source src="rickroll.mp4" type="video/mp4">
		 Your browser does not support the video tag.
	 </video>';
}
 ?>

 
 

 </table>

</div>
</body>
</html>
