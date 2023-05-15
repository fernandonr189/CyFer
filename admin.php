<?php
	include 'php/connection.php';

	$sql = "SELECT * FROM products ORDER BY id DESC";
    $result = $conn->query($sql);
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
			<a href="index.html">Inicio</a>
			<a href="products.html">Productos</a>
			<a href="location.html">Ubicación</a>
			<a href="login.html">
				<button class="round-btn">
					<i class="fas fa-lock" ></i>
				</button>
			</a>
		</div>
		<div class="mainView">
			<div class="productHolder">
				<h1>Productos</h1>

                <table class="productsTable">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Tipo</th>
                        <td class="actions">
                            <a href="#">Agregar</a>
                        </td>
                    </tr>
                    <?php
                    while($rows=$result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $rows['name'];?></td>
                        <td><?php echo $rows['description'];?></td>
                        <td><?php echo '$'.$rows['price'];?></td>
                        <td><?php echo $rows['type'];?></td>
                        <td class="actions">
                            <a href="#">Modificar</a>
                            <a href="#">Eliminar</a>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
                </table>
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