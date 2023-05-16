<?php
include 'connection.php';


$id = $_GET['id'];
echo $id;
$sql = mysqli_query($conn, "DELETE FROM shopping_kart WHERE id = '$id'");


if ($sql -> connect_errno){
    die("Error al agregar" . $sql -> connect_errno);
} else {
    echo "Agregado correctamente";
    header("location: /cart.php");
}
?>