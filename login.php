<?php
	session_start();
	$shopping_kart_icon = "
	<a href=\"cart.php\">
		<button class=\"round-btn\">
			<i class=\"fa-solid fa-cart-shopping\"></i>
		</button>
	</a>";
	$login_icon = "
	<a href=\"login.php\">
		<button class=\"round-btn\">
			<i class=\"fas fa-lock\" ></i>
		</button>
	</a>";
	$logout_icon = "
	<a href=\"php/logout.php\">
		<button class=\"round-btn\">
			<i class=\"fa-solid fa-right-from-bracket\" ></i>
		</button>
	</a>";
	if(isset($_SESSION['Admin_id'])) {
		$products_page = "<a href=\"admin.php\">Productos</a>";
	}
	else {
		$products_page = "<a href=\"products.php\">Productos</a>";
	}
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
			<?php
			echo $products_page;
			?>
			<a href="location.php">Ubicación</a>
		</div>
		<div class="mainView">
			<div class="formDiv">
				<div class="formBox">
					<h1>Iniciar sesión</h1>
					<form action="php/login.php" method="post">
						<div class="inputContainer">
							<label for = "emailField">Email:</label>
							<input name="email" type="text" id="emailField" required="">
						</div>
						<div class="inputContainer">
							<label for = "passwordField">Contraseña:</label>
							<input name="password" type="password" id="passwordField" required="">
						</div>
						<button type="Submit" class="f-button red">Iniciar Sesión</button>
					</form>
					<a href="register.php">
						<button class="f-button red">¡Registrate!</button>
					</a>
				</div>
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