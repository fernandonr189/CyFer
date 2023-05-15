<?php
include 'connection.php';


$id = $_POST['id'];
$target_dir = "images/";
$target_file = $target_dir . $id.".png";


$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$image = $target_file;
$type = $_POST['type'];


$sql = mysqli_query($conn, "UPDATE products SET name = '$name', description = '$description',
price = '$price', image = '$image', type = '$type' WHERE id = '$id'");

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

if ($sql -> connect_errno){
    die("Error al agregar" . $sql -> connect_errno);
} else {
    echo "Agregado correctamente";
    header("location: /admin.php");
}

?>