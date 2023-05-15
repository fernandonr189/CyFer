<?php

include 'connection.php';

$id = mysqli_query($conn, "SELECT id FROM products ORDER BY id DESC limit 1");
while ($row = $id->fetch_assoc()) {
    $lastId = intval($row['id']) + 1;
}
$target_dir = "images/";
$target_file = $target_dir . $lastId.".png";

echo strval($target_file);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$image = $target_file;
$type = $_POST['type'];


$sql = mysqli_query($conn, "INSERT INTO products (name, description, price, image, type, id)
VALUES ('$name', '$description', '$price', '$image', '$type', 0)");

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