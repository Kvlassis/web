<?php
session_start();
if(@$_SESSION['login']=="")
{
	echo "<b> Error. Try to connect from the main form</b>";
	die();
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>COVID19</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
  
  
  <link rel="stylesheet" href="my.css">
  <script src="my.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>COVID19 CHECK POIS</h1>
  <p>Try our application to have more COVID19 security</p> 
</div>

<nav class="navbar ">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" style='border-color:black;' data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="login.php">COVID19</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="login.php">Αρχική</a></li>
        <li><a href="pos.php">Δήλωση Θετικού Covid</a></li>
		<li><a href="cont.php">Επαφές με κρούσμα</a></li>
		<li><a href="prof.php">Τα στοιχεία μου</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    
    </div>
  </div>
</nav>
<hr>
  
<div class="container">
  <div class="row">
    <div class="col-sm-12">  
		Επιλογή τύπου POI: <select id=poitype ></select>
	
		<div id=map>
		
		</div>
    </div>
    
   
  </div>
</div>
<script>
$.get("backend.php?q=4",function(res){

	var A=JSON.parse(res);
	$("#poitype").append("<option></option>");
	for (i=0;i<A.length;i++)
		$("#poitype").append("<option>"+A[i].type+"</option>");
		
});



var mypos;
var map;
var Markers=[];
map = L.map('map');
map.locate({setView: true, maxZoom: 15});
map.on('locationfound', onLocationFound);

 function onLocationFound(e) {
    var radius = e.accuracy;
	
	mypos=e.latlng;
    
	L.marker(e.latlng).addTo(map)
        .bindPopup("MY POSITION").openPopup();

    L.circle(e.latlng, radius).addTo(map);
}



 L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 15,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoicHBvbHlkMDEiLCJhIjoiY2t6MnM1NW4xMDB2bDJvcDJ2NW04enZkNSJ9.SR1qSNVWd5oSCGgU1kjRQg'
}).addTo(map);




$("#poitype").change(function(){
	
			
	
	
	tp=$("#poitype").val();
		
	$.get("backend.php?q=5&tp="+tp,function(res){
		var js=JSON.parse(res);
		
		for (var i=0;i<Markers.length;i++) Markers[i].remove();
		Markers=[];
		for (i=0;i<js.length;i++)
		{
			
			gicon="http://maps.google.com/mapfiles/kml/paddle/grn-circle.png";
			ricon="http://maps.google.com/mapfiles/kml/paddle/red-circle.png";
			oicon="http://maps.google.com/mapfiles/kml/paddle/orange-circle.png";
			
			
			
			if(js[i].persent<=32) icon1=gicon;
			else if(js[i].persent<=65) icon1=oicon;
			else icon1=ricon;
			
			lat=Number(js[i].lat);
			lng=Number(js[i].lng);
			
			var M=L.marker([lat, lng], {
						icon:L.icon({iconUrl:icon1, iconSize:[40,40]})
					, perc:js[i].persent, id_poi:js[i].idp, pname : js[i].name
					
					}).addTo(map)
			
			Markers.push(M);			
					
			M.on('click', function(e)
					{
						var id=this.options.id_poi;
						html="<b>"+this.options.pname+"</b><br> Εκτίμηση Επισκεψιμότητας:"+this.options.perc+"%";
												
						if(dst(e.latlng,mypos)<500)
						{
							html+="<br><a href='putvisit.php?idp="+this.options.id_poi+"'>Δήλωση Επίσκεψης</a>";
						}
					
						var popup = L.popup()
									.setLatLng(e.latlng)
									.setContent(html)
									.openOn(map);
					});
					
					
			
			
			
			
			 
		}
			
	});

});




function dst(p1,p2) {
lat1=p1.lat; lon1=p1.lng;
lat2=p2.lat; lon2=p2.lng;
        var radlat1 = Math.PI * lat1/180;
        var radlat2 = Math.PI * lat2/180;
        var theta = lon1-lon2;
        var radtheta = Math.PI * theta/180;
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        dist = Math.acos(dist);
        dist = dist * 180/Math.PI;
        dist = dist * 60 * 1.1515;
        dist = dist * 1.609344 ;
        
        return dist;
}


</script>
</body>
</html>