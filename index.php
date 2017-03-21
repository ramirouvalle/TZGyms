<?php require 'functions/seguridad.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TzMaps</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>	
	<script src="js/bootstrap.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Team Zapdos</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Inicio</a></li>
					<li><a href="#" data-toggle="modal" data-target="#modalNewGym">Nuevo gimnasio</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="navbar-text">
						Bienvenido 
						<?php 
			            @session_start();
			    	   	echo $_SESSION['user']['user'];
			         ?>	
				    </li>
				    <li>
				    	<a href="functions/logout.php" title="Cerrar Sesión">
				    		<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
				    	</a>
				    </li>				    
				</ul>
			</div>
		</div>
	</nav>
	<div id="map"></div>	
	<!-- Modal -->
	<div id="modalNewGym" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Agregar nuevo gimnasio</h4>
				</div>
				<div class="modal-body">
					<form id="formNewGym">
						<div class="form-group">
						<label>Gimnasio</label>
							<input type="text" class="form-control" id="txtNameGym" placeholder="Nombre del gimnasio">
						</div>
						<div class="form-group">
							<label>Coordenadas</label>
							<input type="text" class="form-control" id="txtCoordenadasGym" placeholder="25.1234,-100.1234">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-success" data-dismiss="modal" onclick="newGym();">Guardar</button>
				</div>
			</div>

		</div>
	</div>	
	<script>
		var map;

		function initMap() {
			var monterrey = {lat: 25.6866142, lng: -100.3161126};
			var infoMarcador = new google.maps.InfoWindow;

			//Mapa
			map = new google.maps.Map(document.getElementById('map'), {
				center: monterrey,
				zoom: 15,
				zoomControl: true,
				mapTypeControl: false,
				scaleControl: false,
				streetViewControl: false,
				rotateControl: false
			});
			
			//GeoLocalizacion
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function(position) {			  		
					var pos = {
						lat: position.coords.latitude,
						lng: position.coords.longitude
					};
					map.setCenter(pos);
					var infoWindow = new google.maps.InfoWindow(
					{
						content: "Estas aquí."
					}
					);  		
					var marker = new google.maps.Marker({
						map: map,
						position: pos,
					});
					marker.addListener('click', function() {
						infoWindow.open(map, marker);
					});
				}, function() {
					handleLocationError(true);
				});
			} else {
			    // Browser doesn't support Geolocation
			    handleLocationError(false);
			}
			loadLocations();
		}			

		function handleLocationError(browserHasGeolocation) {
			map.setZoom(11);
			if (!browserHasGeolocation) {
				alert("Error: Your browser doesn\'t support geolocation.");
			}
		}
		
    	function loadLocations(){
    		$.post("functions/loadGyms.php", function(result){
    			result = JSON.parse(result);
    			$.each(result, function(index, gym){   
    				addMarker(gym);
    			});
    		});
    	}

    	function addMarker(gym){
    		var location = {
    			"lat": parseFloat(gym.coord_x),
    			"lng": parseFloat(gym.coord_y)
    		};
    		var content = gym.name.concat("<br>", gym.coord_x, ", ", gym.coord_y);
    		var infoWindow = new google.maps.InfoWindow(
    			{
    				content: content
    			}
    		);  		
    		var marker = new google.maps.Marker({
    			map: map,
    			position: location,
    		});
    		marker.addListener('click', function() {
    			infoWindow.open(map, marker);
    			map.setZoom(13);4
    			map.setCenter(marker.position);
    		});
    	}

    	function newGym(){
    		var nameGym = document.getElementById("txtNameGym").value;
    		var coords = document.getElementById("txtCoordenadasGym").value;
    		//Validar que se hayan ingresado datos
    		if (nameGym != "" && coords != "") {
    			//Separar las coordenadas
    			var coords = coords.split(",");
    			//Validar que sean solo dos coordenadas
    			if (coords.length == 2) {
    				var cx = parseFloat(coords[0]);
    				var cy = parseFloat(coords[1]);
    				//Validar que si sean flotantes
    				if (isFloat(cx)  && isFloat(cy)) {
    					//Guardar el gimnasio en la base de datos
    					$.post("functions/insertGym.php", 
    					{
    						name: nameGym,
    						cx: cx,
    						cy: cy
    					}, function(gym){
    						gym = JSON.parse(gym);
    						addMarker(gym);
    						document.getElementById("formNewGym").reset();
    					});
    				}else{
    					alert("Las coordenadas no son validas.");
    				}
    			}else{
    				alert("Las coordenadas no son validas.");
    			}
    		}
    	}

    	function isFloat(x) { return !!(x % 1); }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAomNlBqBqpdMdSkDcz9-tRGx77QLv0fBQ&callback=initMap"
    async defer></script>
</body>
</html>
<!-- Erika Kosegarten! -->