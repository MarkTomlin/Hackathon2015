<?php 
$conn = new PDO("mysql:host=edward2.solent.ac.uk;dbname=dspokes;","dspokes","shaetuvo");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Description</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bluebootstrap.css">
  <!-- <script type='text/javascript'>jQuery(document).on("mobileinit", function() {
      jQuery.mobile.autoInitializePage = false;
  });
  </script>-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js"></script>
 <script src="//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
 
<script type="text/javascript">

var hotel_coords = new Array();
var destination_coords =new Array();
<?php 

$hotelID = $_GET['hotelID'];
 $flightID =   $_GET['flightID'];
	
	$sql ="SELECT * FROM Hotels h where h.ID='$hotelID'";

	$results = $conn->query($sql);

while ($row = $results->fetch(PDO::FETCH_ASSOC))
{
	echo "var pos = new Array();";
	echo "pos[0]=$row[lat];";
	echo "pos[1]=$row[long];";
	echo " hotel_coords.push(pos);";
	
}
$sql ="SELECT  DISTINCT h.city ,h.lat , h.long FROM  Flights f ,Hotels h where f.F_Id='$flightID' AND f.Dest_city=h.city"; 
	$results = $conn->query($sql);

while ($row = $results->fetch(PDO::FETCH_ASSOC))
{
	echo "var pos = new Array();";
	echo "pos[0]=$row[lat];";
	echo "pos[1]=$row[long];";
	echo " destination_coords.push(pos);";
	
}
?>
var geocoder;
var markers = [];
var maps = []; 

function initialize(canvasname ,mapIndex) {
	
	//createa and initilise geo coder 
	geocoder = new google.maps.Geocoder();
	
	//set map options 
  var mapOptions = {
    zoom: 6
  };
  //create the map 
  maps[mapIndex] = new google.maps.Map(document.getElementById(canvasname),
      mapOptions);

  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

    

      maps[mapIndex].setCenter(pos);
	  
	  var coords =destination_coords;
	  if(mapIndex==1)
	  coords = hotel_coords;
	  
	  if(mapIndex==0)
	  {
		   var flightPlanCoordinates = [
    new google.maps.LatLng(37.772323, -122.214897),
    new google.maps.LatLng(21.291982, -157.821856),
    new google.maps.LatLng(-18.142599, 178.431),
    new google.maps.LatLng(-27.46758, 153.027892)
  ];
  var flightPath = new google.maps.Polyline({
    path: flightPlanCoordinates,
    geodesic: true,
    strokeColor: '#FF0000',
    strokeOpacity: 1.0,
    strokeWeight: 2
  });

  flightPath.setMap(maps[0]);
	  }

	  for(var i = 0; i< coords.length;i++)
	  {
		  var pos = coords[i];
		  var lat = pos[0];
		  var lon = pos[1];
		 // alert(lat+" and  "+lon);
		  
		  
		  if (lat === undefined ||  lon === undefined) {
		  }
		  else
		  {
	  placeMarker( new google.maps.LatLng(lat, lon) , "France Hotel" ,"<div>Best place to go to</div>",maps[mapIndex]); 
	  
	  
	  if(i==coords.length-1)
	  maps[mapIndex].setCenter(new google.maps.LatLng(lat, lon));
		  }
	  
	  }
	  
	  
	  
	  
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
  
  
  // add more listners 

}
//

//

function placeMarker(location , title ,description, map) {
	
	// info window to show when a marker is selected 
	var infowindow = new google.maps.InfoWindow({
      content: description
  });

 //create the marker
  var marker = new google.maps.Marker({
      position: location,
      map: map,
	  title:title
  });
  //listen to mark clikced event , so we show the info  
 google.maps.event.addListener(marker, 'click', function() {
	 //open the marker details using the info window 
    infowindow.open(map,marker);
  });
  //map.setCenter(location);
  markers.push(marker);
  
}
var pages =Array();
var page = 0; 
pages.push("#pagecontent");
pages.push("#pagecontent2"); 
pages.push("#pagecontent3");  


 
 
function onSlide()
{
	page++; 
	if(page > 2)
	{
	page =0; 
	}
	
 var width = $( "#content" ).width();
	 
	
	for(var p = 0; p<3 ; p++)
	 $( pages[p] ).animate({ "left": "+="+width+"px" }, "slow", function(){
		 
		 for(var j = 0; j<3;j++)
		if($(pages[j]).position().left>width)
		{
		 $( pages[j] ).css("left" , "-"+width+"px"); 
		//initialize(canvases[page]);
		 
		}
		 
	 });
}

function onSlideLeft()
{
	page--; 
	if(page < 0 )
	{
	page =2; 
	}
	

	 var width = $( "#content" ).width();
	
	for(var p = 0; p<3 ; p++)
	 $( pages[p] ).animate({ "left": "-="+width+"px" }, "slow", function(){
		 
		 for(var j = 0; j<3;j++)
		if($(pages[j]).position().left<-width)
		{
		 $( pages[j] ).css("left" , ""+width+"px"); 
		
		 
		}
		 
	 });
}

$(function(){
  // Bind the swipeleftHandler callback function to the swipe event on div.box
  $( "#content" ).on( "swipeleft", function(e){
	  
	  onSlideLeft();
  });
 

});
$(function(){
  // Bind the swipeleftHandler callback function to the swipe event on div.box
  $( "#content" ).on( "swiperight", function(e){
	  
	  onSlide();
  });
 

});


function init()
{
	initialize('map-canvas',0);
	initialize('map-canvas2',1);
	initialize('map-canvas3',2);
}
</script>

<link href="css/main.css" rel="stylesheet" type="text/css">
</head>

<body onLoad="init()">
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
<div name="container">
<div id="content">
<div id="pagecontent">
<h2>Description</h2>
<!-- Total Price for holiday -->
 <div id="map-canvas"></div>
 <div id="descript-content">
 <!--content changed-->
 <h3>General Area Information</h3>
 <p>Drinking Age Limit = 18</p>
 <p>Smoking Age Limit = 16</p>
 <p>Legal consent age = 21</p>
 <p>Clubbing / Bar age = 14</p>
 <p>No public drinking or smoking</p>
 
 </div>

 
 </div>
 
 <!-- content 2 -->
 <div id="pagecontent2">
<h2>Hotel Prices</h2>

 <div id="map-canvas2"></div>
 <div id="descript-content2">
 <!--content changed-->
 <?php 
 
 $hotelID = $_GET['hotelID'];
 $flightID =   $_GET['flightID'];
 echo '<table class="table table-striped">
 <tr>
 <th></th>
 <th>Hotel</th>
 <th>City</th>
  <th>Price(£) pppn</th>
  <th></th>
 </tr>';
	
	$sql ="SELECT * FROM Hotels h where h.ID='$hotelID'";
	
	
	$results = $conn->query($sql);

while ($row = $results->fetch(PDO::FETCH_ASSOC))
{
	
	echo ' <tr>';
	echo "<td><img src=$row[flag]  width='32' height='32'/></td>";  
 	echo "<td>$row[name]</td>"; 
 	echo "<td>$row[city]</td>"; 
 	echo "<td>£ $row[price]</td>";
 	echo "<td><a href=''>Book</a></td>"; 
 	echo "</tr>";
}
echo " </table>"; 


 
 ?>


 </div>
 </div>
 <!-- content 2 -->
 <div id="pagecontent3">
<h2>Flight Prices</h2>

 <div id="map-canvas3"></div>
 <div id="descript-content3">
 <!--content changed-->
  <?php 
 
 $hotelID = $_GET['hotelID'];
 $flightID =   $_GET['flightID'];
 echo '<table class="table table-striped">
 <tr>
 <th></th>
  <th>From</th>
 <th>Destination</th>
  <th>Price</th>
  <th></th>
 </tr>';
	$sql ="SELECT f.From , f.Dest_city , ROUND(f.Price,2) as Price ,f.flag FROM  Flights f  where f.F_Id='$flightID' "; 
	
	
	
	
		$results = $conn->query($sql);

while ($row = $results->fetch(PDO::FETCH_ASSOC))
{
		echo ' <tr>';
		echo "<td><img src=$row[flag]  width='32' height='32'/></td>";  
 echo "<td>$row[From]</td>"; 
 echo "<td>$row[Dest_city]</td>"; 
 echo "<td>£ $row[Price]</td>";
  echo "<td><input type='submit' class='btn btn-info'value='Book' />

</td></tr>"; 
}
 echo "</table>"; 
 
 ?>
 
 </div>
</div>
 </div>
 </div>
 <!--<input type="button" value="next page" onClick="onSlide()" style="top:700px; position:absolute"/>
 <input type="button" value="prev page" onClick="onSlideLeft()" style="top:700px; left:60px;  position:absolute"/>-->

</body>
</html>
