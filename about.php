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
	<div class="navBar">
		<nav>
			<a class="nav-elements" href="index.php">Inicio</a>
			<a class="nav-elements" href="products.php">Productos</a>
			<a class="nav-elements" href="location.php">Ubicación</a>
			<a class="nav-elements" href="login.php">
				<button class="round-btn">
					<i class="fa-solid fa-lock"></i>
				</button>
			</a>
				<?php
				if(isset($_SESSION['User_id'])) {
					echo $shopping_kart_icon;
				}
				?>
		</nav>
	</div>
	<div class="cover">
		<h1>Las mejores soluciones de tecnología al mejor precio</h1>
	</div>
</body>
</html>