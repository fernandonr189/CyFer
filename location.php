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
			<div class="frame-holder">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3732.1979716714636!2d-103.39105798508673!3d20.702183986176227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae4e98d5453d%3A0xc4fdd3929a2ecbd1!2sCentro%20de%20Ense%C3%B1anza%20T%C3%A9cnica%20Industrial%20(Plantel%20Colomos)!5e0!3m2!1ses-419!2smx!4v1678827937171!5m2!1ses-419!2smx" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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