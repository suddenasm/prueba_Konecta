<?php
include('../db/connection.php');

if (isset($_POST["email"]) && isset($_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = $conn->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    $result = $query ->fetch_assoc();
    if ($result){
        session_start();
        $_SESSION['user_name'] = $result['name'];
        $_SESSION['email'] = $result['email'];
        header("Location: ../dashboard.php");
    }else{
        echo "<script>
                alert('Datos Incorrectos');
                window.location= 'login_form.php'
                </script>";
    }
}else{
    header("Location: login_form.php");
}
?>