<?php
include('../db/connection.php');
date_default_timezone_set('America/Bogota');

if (isset($_POST["name"]) && isset($_POST["reference"]) && isset($_POST["price"]) && isset($_POST["weight"]) && isset($_POST["category"]) && isset($_POST["stock"])){
    $name = $_POST["name"];
    $reference = $_POST["reference"];
    $price = $_POST["price"];
    $weight = $_POST["weight"];
    $category = $_POST["category"];
    $stock = $_POST["stock"];
    $created_at = date('Y-m-d');

    $query = $conn->query("INSERT INTO products (name, reference, price, weight, category, stock, created_at) 
                                                    VALUES ('$name', '$reference', '$price', '$weight', '$category', '$stock', '$created_at')");

    if (!mysqli_error($conn)){
        echo "<script>
                alert('Producto Ingresado Correctamente');
                window.location= 'create_form.php'
                </script>";
    }else{
        echo "<script>
                alert('No se Ingreso el Producto');
                window.location= 'create_form.php'
                </script>";
    }
} else{
    header("Location: create_form.php");
}
?>