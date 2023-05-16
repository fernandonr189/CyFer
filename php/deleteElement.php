<?php
include 'connection.php';


$id = $_GET['id'];

$sql = mysqli_query($conn, "DELETE FROM products WHERE id = '$id'");


if ($sql -> connect_errno){
    die("Error al agregar" . $sql -> connect_errno);
} else {
    echo "Agregado correctamente";
    header("location: /admin.php?search=");
}
?>