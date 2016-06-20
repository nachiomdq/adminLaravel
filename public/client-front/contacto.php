<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Neumáticos Corral</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">

<link href="styles/corral-common.css" rel="stylesheet" type="text/css">
<link href="styles/corral-contacto.css" rel="stylesheet" type="text/css">


<script src="scripts/jquery-1.4.2.js"></script>
<script src="scripts/jquery.cycle.all.js"></script>
<script src="scripts/jquery.easing.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script src="map/contacto.js"></script>


<script type="text/javascript">

$(document).ready(function() {

	
	$("#menu-top").css("top", "-110px" );

 
	$(window).scroll(function() {
	
	if ($(window).scrollTop() >= 150){
	
				$("#menu-top").css("top", "0px" );
			
		
	    } else {
	
				$("#menu-top").css("top", "-110px" );
	
	    }
	
	
	});



});



</script>

</head>

<body>

	<div id="menu-top">
		<div class="top">
			<div class="wp">
				<div class="logo">
					<img src="images/header-logo.png" alt="header-logo" width="88" height="53">
				</div>
				<div class="menu">
					<ul>
						<li><a href="contacto.php" class="active">Contacto</a></li>
						<li><a href="sucursales.php">Sucursales</a></li>
						<li><a href="precurados.php">Precurados</a></li>
						<li><a href="empresa.php">Empresa</a></li>
						<li><a href="informacion-tecnica.php">Inf. Técnica</a></li>
						<li><a href="productos.php">Productos</a></li>
						<li><a href="index.php">Home</a></li>
					</ul>
				</div>
			</div>			
		</div>					
	</div>


	<div class="top">
		<div class="wp">
			<div class="pais">
				<ul>
					<li>
						<a href="#" class="active">ARGENTINA</a>
					</li>
					<li>
						<a href="#">URUGUAY</a>
					</li>
				</ul>
			</div>
			<div class="submenu">
				<ul>
					<li>
						<a href="contacto.php" class="active">CONTACTO</a>
					</li>
					<li>
						<a href="sucursales.php">SUCURSALES</a>
					</li>
				</ul>
			</div>
			<div class="pirelli">
				<img src="images/logo-pirelli.png" alt="logo-pirelli" width="88" height="22">
			</div>
		</div>
	</div>

	<div class="header">
		
		<div class="wp">
			<div class="logo">
				<img src="images/header-logo.png" alt="header-logo" width="150" height="90">
			</div>
			<div class="menu">
				<ul>
					<li>
						<a href="precurados.php" style="padding-right:0px;">Precurados</a>
					</li>
					<li>
						<a href="empresa.php">Empresa</a>
					</li>
					<li>
						<a href="informacion-tecnica.php">Inf. Técnica</a>
					</li>
					<li>
						<a href="productos.php">Productos</a>
					</li>
					<li>
						<a href="index.php">Home</a>
					</li>
				</ul>
			</div>			
		</div>
		
		
	</div>

	<div class="filtros">
		
		<div class="wp">
			<h4>Contacto</h4>
		</div>
		
		
	</div>




	<div class="cuerpo">
		<div class="wp">
			<div class="coli">
				<div class="titulo">
					<h2>Contacto</h2>
				</div>
				<div class="lista">
					<p>
Puede contactarnos llamando telefónicamente o por mail, o simplemente completando los datos del formulario.
<br><br>
					</p>
					<div class="mapa">
						<div id="map-canvas">
						</div>
					</div>
					<p>
<br><br>
Casa Central<br>
Av. Santa Fé 544<br>
Acassuso - Buenos Aires<br><br>

<b>0800 - 333 - 8929</b>
<br>
<a href="mailto:info@neumaticoscorral.com.ar">info@neumaticoscorral.com.ar</a>
<br><br>

Si desea contactarse con una de nuestras sucursales haga <a href="sucursales.php">click aquí.</a>			
					</p>
					
				</div>
			</div>

			<div class="cold">
				<div class="titulo">
					<h2>Complete el Formulario</h2>
				</div>
				<div class="lista">
					<form action="#">
						<h3>Nombre</h3>
						<input type="text" class="input-texto">
						<h3>Apellido</h3>
						<input type="text" class="input-texto">
						<h3>Teléfono</h3>
						<input type="text" class="input-texto">
						<h3>Correo Electrónico</h3>
						<input type="text" class="input-texto">
						<h3>Asunto</h3>
						<input type="text" class="input-texto">
						<h3>Consulta</h3>
						<textarea class="input-area"></textarea>
						<button type="submit" class="boton-enviar">Enviar Consulta</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	

	<div class="tip">
		<div class="wp">
			<div class="titulo">
				<div class="icono">
					<img src="images/h2-icon-tip.jpg" alt="h2-icon-star" width="45" height="45">
				</div>
				<h2>Sabías que</h2>
			</div>
			<h4>Los neumáticos tienen fecha de vencimiento...</h4>
			<p>Luego de 5 años de fabricados, los neumáticos pierden propiedades fundamentales a la hora de brindar seguridad a tu vehículo, es por eso que
recomendamos hacer una revisión en un taller especializado para chequear el estado de los mismos.</p>
		</div>
	</div>
	

	<? include_once("footer.php");?>




</body>
</html>