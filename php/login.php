<?php

include 'connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = mysqli_query($conn, "SELECT * FROM user_login_info WHERE email = '$email' AND password = '$password'");
if(!$sql) {
    echo "Error, usuario no encontrado";
}
if($user = mysqli_fetch_assoc($sql)) {
    header("location: ../index.html");
}
else {
    echo "Correo o contraseña incorrecto";
}

?>