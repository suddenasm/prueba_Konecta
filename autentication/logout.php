<?php
session_start();
if (isset($_SESSION['user_name'])){
    session_destroy();
    header("Location: ../index.php");
}else{
    header("Location: ../index.php");
}
?>