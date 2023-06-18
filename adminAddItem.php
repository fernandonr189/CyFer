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
			<?php
			if(isset($_SESSION['User_id']) || isset($_SESSION['Admin_id'])) {
				echo $logout_icon;
				if(isset($_SESSION['User_id'])) {
					echo $shopping_kart_icon;
				}
			}
			else {
				echo $login_icon;
			}
			?>
		</div>
		<div class="mainView">
			<div class="formDiv">
				<div class="formBox">
					<h2>Ingrese la información del articulo</h2>
					<form action="php/newProduct.php" method="post" enctype="multipart/form-data">
						<div class="inputContainer">
							<label for = "nameField">Nombre:</label>
							<input name="name" type="text" id="nameField" required="">
						</div>
						<div class="inputContainer">
							<label for = "descriptionField">Descripción:</label>
							<input name="description" type="text" id="descriptionField" required="">
						</div>
						<div class="inputContainer">
							<label for = "priceField">Price:</label>
							<input name="price" type="text" id="priceField" required="">
						</div>
						<div class="inputContainer">
							<input type="file" name="image" id="image">
						</div>
						<div class="inputContainer">
							<label for = "typeField">Tipo:</label>
							<input name="type" type="text" id="typeField" required="">
						</div>
						<button class="f-button red" type="submit">Continuar</button>
					</form>
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