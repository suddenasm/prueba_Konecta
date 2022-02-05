<?php
include('../db/connection.php');

if (isset($_POST["id_product"]) && isset($_POST["amount"])){
    $id = $_POST["id_product"];
    $amount = $_POST["amount"];

    $query = $conn->query("SELECT * FROM products WHERE id = '$id'");
    $product = mysqli_fetch_assoc($query);
    if (!mysqli_error($conn)){
        if ($product['stock'] > 0){
            $stock = $product['stock'] - $amount;
            if ($stock >= 0){
                $cost = $product['price'] * $amount;
                $query2 = $conn->query("INSERT INTO sales (product_id, amount, cost) VALUES ('$id', '$amount', '$cost')");
                if (!mysqli_error($conn)){
                    $query3 = $conn->query("UPDATE products SET stock='$stock' WHERE id = '$id'");

                    echo "<script>
                    alert('Compra Realizada con Exito');
                    window.location= '../index.php'
                    </script>";
                }else{
                    echo "<script>
                    alert('La compra no pudo ser realizada');
                    window.location= '../index.php'
                    </script>";
                }
            }else{
                echo "<script>
                    alert('La compra no pudo ser realizada, No hay suficientes Existencias');
                    window.location= '../index.php'
                    </script>";
            }
        }else{
            echo "<script>
                alert('Compra no Realizada, El Producto Ya esta Agotado');
                window.location= '../index.php'
                </script>";
        }
    }else{
        echo "<script>
                alert('El Producto no Fue encontrado');
                window.location= '../index.php'
                </script>";
    }
} else{
    header("Location: ../index.php");
}
?>