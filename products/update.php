<?php
include('../db/connection.php');

if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["reference"]) && isset($_POST["price"]) && isset($_POST["weight"]) && isset($_POST["category"]) && isset($_POST["stock"])){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $reference = $_POST["reference"];
    $price = $_POST["price"];
    $weight = $_POST["weight"];
    $category = $_POST["category"];
    $stock = $_POST["stock"];

    $query = $conn->query("UPDATE products SET name = '$name', reference = '$reference', price = '$price', weight = '$weight', category = '$category', stock = '$stock' WHERE id = '$id'");

    if (!mysqli_error($conn)){
        echo "<script>
                alert('Producto Actualizado Correctamente');
                window.location= '../dashboard.php'
                </script>";
    }else{
        echo "<script>
                alert('No se Actualizo el Producto');
                window.location= '../dashboard.php'
                </script>";
    }
} else{
    header("Location: ../dashboard.php");
}
?>