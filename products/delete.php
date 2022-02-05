<?php
include('../db/connection.php');

if (isset($_GET["id"])){
    $id = $_GET["id"];

    $query = $conn->query("DELETE FROM products WHERE id = '$id'");

    if (!mysqli_error($conn)){
        echo "<script>
                alert('Producto Eliminado Correctamente');
                window.location= '../dashboard.php'
                </script>";
    }else{
        echo "<script>
                alert('No se Elimino el Producto');
                window.location= '../dashboard.php'
                </script>";
    }
} else{
    header("Location: ../dashboard.php");
}
?>