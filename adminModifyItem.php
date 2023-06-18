<?php
    $shopping_kart_icon = "
	<a href=\"cart.php\">
		<button class=\"round-btn\">
			<i class=\"fa-solid fa-cart-shopping\"></i>
		</button>
	</a>";
	include 'php/connection.php';

	$id = $_GET['id'];
	$sql = "SELECT * FROM products WHERE ID = '$id'";
    $result = $conn->query($sql);
    $conn->close();

    while($rows=$result->fetch_assoc()) {
        $name = $rows['name'];
        $description = $rows['description'];
        $price = $rows['price'];
        $type = $rows['type'];
        $image = $rows['image'];
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
			<div class="formDivMod">
				<div class="formBoxModify">
					<h2>Ingrese la información del articulo</h2>
					<form action="php/modifyProduct.php" method="post"
					enctype="multipart/form-data">
					<div class="modifyForm">
                        <div class="productImage">
                            <img src="php/<?php echo $image?>" alt="Component">
                        </div>
                        <div>
                            <div class="inputContainer">
                                <label for = "nameField">Nombre:</label>
                                <input name="name" type="text" id="nameField" required=""
                                value="<?php echo $name?>">
                            </div>
                            <div class="inputContainer">
                                <label for = "descriptionField">Descripción:</label>
                                <input name="description" type="text" id="descriptionField"
                                required="" value="<?php echo $description?>">
                            </div>
                            <div class="inputContainer">
                                <label for = "priceField">Price:</label>
                                <input name="price" type="text" id="priceField" required=""
                                value="<?php echo $price?>">
                            </div>
                            <div class="inputContainer">
                                <input value="<?php echo $image?>>" type="file" name="image"
                                id="image">
                            </div>
                            <div class="inputContainer">
                                <label for = "typeField">Tipo:</label>
                                <input name="type" type="text" id="typeField" required=""
                                value="<?php echo $type?>">
                                <input type="hidden" id="version" name="id" value="<?php echo
                                $id?>" />
                            </div>
                        </div>
					</div>
						<button class="f-button red" type="submit">Continuar</button>
					</form>
				</div>
			</div>
		</div>

	</div>
</body>
</html>