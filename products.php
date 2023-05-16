<?php
include 'php/connection.php';
@$search = $_GET['search'];

if(is_null($search)) {
    $sql = "SELECT * FROM products ORDER BY id DESC";
    $result = $conn->query($sql);
    $conn->close();
}
else {
    $sql = "SELECT * FROM products WHERE name LIKE \"%$search%\" OR description LIKE \"%$search%\"";
    $result = $conn->query($sql);
    $conn->close();
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
			<a href="index.html">Inicio</a>
			<a href="products.php">Productos</a>
			<a href="location.html">Ubicación</a>
			<a href="login.html">
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
				<form action="products.php" method="get">
					<input name="search" type="text" value="<?php echo $search; ?>" ></input>
					<button type="submit">Buscar</button>
				</form>
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
				    </div>
				    <div class="productCost">
				        <h3><?php echo "$".$rows['price'];?></h3>
				    </div>
				    <div class="actions">
                        <a href="php/addToKart.php?id=1&productId=<?php echo $rows['id'];
                        ?>">Agregar al carrito</a>
                    </div>
				</div>
                <?php
                    }
                ?>
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