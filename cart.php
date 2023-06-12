<?php
	session_start();
	include 'php/connection.php';
	$id = $_SESSION["User_id"];

	$sql = "SELECT p.name, p.image, p.price, p.description, s.id FROM products p, shopping_kart s, user_login_info u WHERE s.product_id = p.id AND s.user_id = u.id AND u.id = $id";

	$result = $conn->query($sql);

	$sql_price = "SELECT sum(p.price) FROM products p, shopping_kart s, user_login_info u WHERE s.product_id = p.id AND s.user_id = u.id AND u.id = $id";
	$result_price = $conn->query($sql_price);

	$conn->close();

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
			<a href="cart.php">
                <button class="round-btn">
                    <i class="fa-solid fa-cart-shopping"></i>
                </button>
            </a>
		</div>
		<div class="mainView">
			<div class="productHolder">
				<h1>Productos</h1>
				<?php
                while($rows=$result->fetch_assoc()) {
                ?>
				<div class="clientProductsTable">
				    <img src="<?php echo "php/".$rows['image'];?>" alt="Italian Trulli">
				    <div>
				        <h2><?php echo $rows['name'];?></h2>
				        <div class="productDescription">
				        <?php echo $rows['description'];?>
				        </div>
				        <div class="productCost">
                            <h3><?php echo "$".$rows['price'];?></h3>
                        </div>
				    </div>
				    <div class="actions">
                        <a href="php/deleteFromCart.php?id=<?php echo $rows['id'];
                        ?>">Eliminar</a>
                    </div>
				</div>
                <?php
                    }
                ?>
                <div class="buyButton">
                <?php
                while($rows=$result_price->fetch_assoc()) {
                ?>
                    <h3><?php echo "$".$rows['sum(p.price)'];?></h3>
					<a href="php/sendPurchaseEmail.php">
						<button>
							Comprar carrito
						</button>
					</a>
                <?php
                    }
                ?>
                </div>
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
					<h5>CyFer</h5>
				</div>
				<div class="inline-elements">
					<i class="fa-brands fa-twitter"></i>
					<h5>CyFer</h5>
				</div>
				<div class="inline-elements">
					<i class="fa-brands fa-instagram"></i>
					<h5>CyFer</h5>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>