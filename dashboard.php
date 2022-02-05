<?php
include('db/connection.php');

session_start();
if (!isset($_SESSION['user_name'])){
    header("Location: index.php");
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>
        Prueba KONECTA
    </title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<section class="page">
    <?php
    include ('headers/logged_in_header.php')
    ?>
    <div class="content">
        <div class="d-flex align-items-center justify-content-center">
            <div class="card col-8">
                <div class="card-header">
                    <div class="col-12">
                        <a href="products/create_form.php" class="btn btn-primary float-end">Ingresar Producto</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Referencia</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Peso (gr)</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Creado el</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = $conn->query("SELECT * FROM products");
                        $products = $query->fetch_all();
                        foreach ($products as $product){
                        ?>
                            <tr>
                                <td><?php echo $product[1]?></td>
                                <td><?php echo $product[2]?></td>
                                <td>$ <?php echo $product[3]?></td>
                                <td><?php echo $product[4]?></td>
                                <td><?php echo $product[5]?></td>
                                <td><?php echo $product[6]?></td>
                                <td><?php echo $product[7]?></td>
                                <td><a href="products/edit_form.php?id=<?php echo $product[0]?>" class="btn btn-icon btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="#" onclick="message(<?php echo $product[0]?>)" class="btn btn-icon btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
    function message(id) {
        var option = confirm("Seguro que quieres eliminar el producto?");
        if (option == true) {
            window.location = "products/delete.php?id="+id;
        }
    }
</script>
</body>
</html>