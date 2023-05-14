<?php

include 'connection.php';

$name = $_POST['name'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = mysqli_query($conn, "INSERT INTO user_login_info (name, last_name, email, password, id) VALUES ('$name', '$lastname', '$email', '$password', 0)");



if ($sql -> connect_errno){
    die("Error al registrar" . $sql -> connect_errno);
} else {
    echo "Registrado correctamente";
    header("location: /index.html");
}

?>