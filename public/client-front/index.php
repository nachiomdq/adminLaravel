<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Neumáticos Corral</title>


<link href="styles/corral-common.css" rel="stylesheet" type="text/css">
<link href="styles/corral-home.css" rel="stylesheet" type="text/css">




<script src="scripts/jquery-1.4.2.js"></script>
<script src="scripts/jquery.cycle.all.js"></script>
<script src="scripts/jquery.easing.js"></script>

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
						<li><a href="contacto.php">Contacto</a></li>
						<li><a href="sucursales.php">Sucursales</a></li>
						<li><a href="precurados.php">Precurados</a></li>
						<li><a href="empresa.php">Empresa</a></li>
						<li><a href="informacion-tecnica.php">Inf. Técnica</a></li>
						<li><a href="productos.php">Productos</a></li>
						<li><a href="index.php" class="active">Home</a></li>
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
						<a href="contacto.php">CONTACTO</a>
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
		<div class="slider">
			<div class="item" style="background-image: url(images/Home-bg-1.jpg);">
				<div class="wp">
					<div class="titulo">
						<h3>Scorpion ATR</h3>
					</div>
					<div class="copete">
						<p>Control Todo Terreno</p>
					</div>
					<div class="boton">
						<a href="#">Descubrila</a>
					</div>
				</div>
			</div>			
		</div>
		<div class="wp">
			<div class="nav">
				<div class="arrow-l">
				</div>
				<div class="arrow-r">
				</div>
			</div>
		</div>
		
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
						<a href="index.php" class="active">Home</a>
					</li>
				</ul>
			</div>
		</div>
		
	</div>

	<div class="destacado">
		<div class="wp">
			<div class="row">
			<div class="col" style="margin-right:4%;">
				<div class="titulo">
					<div class="icono">
						<img src="images/h2-icon-star.jpg" alt="h2-icon-star" width="45" height="45">
					</div>
					<h2>Productos Destacados</h2>
				</div>
				<div class="lista">
					<ul>
						<li>
							<div class="imagen">
								<img src="productos/p1.png" alt="p1" width="260" height="260">
							</div>
							<h3>Pirelli Scorpion ATR</h3>
							<a href="#">Ir al producto</a>
						</li>
						<li>
							<div class="imagen">
								<img src="productos/p2.png" alt="p1" width="260" height="260">
							</div>
							<h3>Pirelli P7 Cinturato</h3>
							<a href="#">Ir al producto</a>
						</li>
					</ul>
				</div>
			</div>
			
			<div class="col">
				<div class="titulo">
					<div class="icono">
						<img src="images/h2-icon-promo.jpg" alt="h2-icon-star" width="45" height="45">
					</div>
					<h2>Promociones</h2>					
				</div>

				<div class="lista">
					<ul>
						<li>
							<div class="imagen">
								<img src="promociones/promo1.png" alt="p1" width="260" height="260">
							</div>
							<p> <i class="fa fa-heart"></i>Sólo para CABA y Gran Buenos Aires.</p>
							<a href="#">Ver Promoción</a>
						</li>
						<li>
							<div class="imagen">
								<img src="promociones/promo2.png" alt="p1" width="260" height="260">
							</div>
							<p>En neumáticos para auto y camioneta.</p>
							<a href="#">Ver Promoción</a>
						</li>
					</ul>
				</div>
				
			</div>
			</div>
			
		</div>
	</div>

	<div class="categorias">
		<div class="wp">
			<div class="titulo">
				<div class="icono">
					<img src="images/h2-icon-lista.jpg" alt="h2-icon-star" width="45" height="45">
				</div>
				<h2>Búsqueda por Categoría</h2>
			</div>
			<div class="lista">
				<ul>
					<li>
						<div class="icono">
							<img src="images/categoria-icon-auto.png" alt="categoria-icon-auto" width="150" height="100">
						</div>
						<a href="##">Auto</a>
					</li>
					<li>
						<div class="icono">
							<img src="images/categoria-icon-camioneta.png" alt="categoria-icon-auto" width="150" height="100">
						</div>
						<a href="##">Camioneta</a>
					</li>
					<li>
						<div class="icono">
							<img src="images/categoria-icon-camion.png" alt="categoria-icon-auto" width="150" height="100">							
						</div>
						<a href="##">Camión</a>
					</li>
					<li>
						<div class="icono">
							<img src="images/categoria-icon-agricola.png" alt="categoria-icon-auto" width="150" height="100">							
						</div>
						<a href="##">Agrícola</a>
					</li>
					<li>
						<div class="icono">
							<img src="images/categoria-icon-industrial.png" alt="categoria-icon-auto" width="150" height="100">							
						</div>
						<a href="##">Industrial</a>
					</li>
					<li>
						<div class="icono">
							<img src="images/categoria-icon-otr.png" alt="categoria-icon-auto" width="150" height="100">							
						</div>
						<a href="##">OTR</a>
					</li>
					<li>
						<div class="icono">
							<img src="images/categoria-icon-camaras.png" alt="categoria-icon-auto" width="150" height="100">							
						</div>
						<a href="##">Cámaras</a>
					</li>
				</ul>
			</div>
			
			<div class="acceso">
				<a href="productos.php">Ver todos los productos</a>				
			</div>
			
		</div>
	</div>
	
	<div class="mapa">
		<div class="wp">
			
		</div>
	</div>

	<? include_once("footer.php");?>




</body>
</html>