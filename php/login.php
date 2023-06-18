<?php
    include 'connection.php';
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = mysqli_query($conn, "SELECT * FROM admin_login_info WHERE email = '$email' AND password='$password'");

    if(!$sql) {
        echo "Error, usuario no encontrado";
    }
    if($user = mysqli_fetch_assoc($sql)) {
        $_SESSION["Admin_email"] = $email;
        $_SESSION["Admin_name"] = $user["name"]." ".$user["last_name"];
        $_SESSION["Admin_id"] = $user['id'];
        header("location: ../admin.php?search=");
    }

    $sql = mysqli_query($conn, "SELECT * FROM user_login_info WHERE email = '$email' AND password='$password'");
    if(!$sql) {
        echo "Error, usuario no encontrado";
    }
    if($user = mysqli_fetch_assoc($sql)) {
        $_SESSION["User_email"] = $email;
        $_SESSION["User_name"] = $user["name"]." ".$user["last_name"];
        $_SESSION["User_id"] = $user['id'];
        header("location: ../index.php");
    }
    else {
        echo "Correo o contraseña incorrecto";
    }
?>