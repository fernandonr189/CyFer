<?php
include 'connection.php';

$id = $_GET['id'];
$productId = $_GET['productId'];

$sql = mysqli_query($conn, "INSERT INTO shopping_kart (user_id, product_id, id)
VALUES ('$id', '$productId', 0)");

if ($sql -> connect_errno){
    die("Error al agregar" . $sql -> connect_errno);
} else {
    echo "Agregado correctamente";
    header("location: /products.php");
}
?>