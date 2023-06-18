<?php
	session_start();
	$shopping_kart_icon = "
	<a href=\"cart.php\">
		<button class=\"round-btn\">
			<i class=\"fa-solid fa-cart-shopping\"></i>
		</button>
	</a>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="styles.css" rel="stylesheet">
	<link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <title>CyFer - Tienda de tecnología</title>
</head>
<body>
	<div class="viewGrid">
		<div class="navBar">
			<a href="index.php">Inicio</a>
			<a href="products.php">Productos</a>
			<a href="location.php">Ubicación</a>
			<a href="login.php">
				<button class="round-btn">
					<i class="fas fa-lock" ></i>
				</button>
			</a>
			<?php
			if(isset($_SESSION['User_id'])) {
				echo $shopping_kart_icon;
			}
			?>
		</div>
		<div class="mainView">
			<h1>Bienvenido a CyFer</h1>
			<h2>Las mejores soluciones de tecnología al mejor precio</h2>
		</div>
		<div class="bottomView">
			<div class="box">
				<h2>Misión</h2>
				<i class="fa-solid fa-bullseye"></i>
				<h4>
					Ser una opción altamente confiable y segura a la hora de adquirir y cotizar componentes electrónicos orientados a la computadora
				</h4>
			</div>
			<div class="box">
				<h2>Vision</h2>
				<i class="fa-solid fa-eye"></i>
				<h4>
					Tener un catálogo variado para todos los componentes actuales, ofreciendo la mayor cantidad de proveedores posibles
				</h4>
			</div>
			<div class="box">
				<h2>Descripción</h2>
				<i class="fa-solid fa-circle-info"></i>
				<h4>
					Ser una opción altamente confiable y segura a la hora de adquirir y cotizar componentes electrónicos orientados a la computadora
				</h4>
			</div>

		</div>
		<footer>
			<div class="footer-element">
				<h4>Contacto</h4>
				<div>
					<div class="inline-elements">
						<i class="fa-solid fa-envelope"></i>
						<h5>contacto@cyfer.mx</h5>
					</div>
					<div class="inline-elements">
						<i class="fa-solid fa-phone"></i>
						<h5>+52 3343075456</h5>
					</div>
				</div>
			</div>
			<div class="footer-element">
				<h4>Redes sociales</h4>
				<div>
					<div class="inline-elements">
						<i class="fa-brands fa-facebook"></i>
						<h5>
							CyFer
						</h5>
					</div>
					<div class="inline-elements">
						<i class="fa-brands fa-twitter"></i>
						<h5>
							CyFer
						</h5>
					</div>
					<div class="inline-elements">
						<i class="fa-brands fa-instagram"></i>
						<h5>
							CyFer
						</h5>
					</div>
				</div>
			</div>
		</footer>
	</div>
</body>
</html>