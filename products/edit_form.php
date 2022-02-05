<?php
include('../db/connection.php');

session_start();
if (!isset($_SESSION['user_name'])){
    header("Location: index.php");
}

$id = $_GET['id'];
$query = $conn->query("SELECT * FROM products WHERE id = '$id'");
$product = $query->fetch_assoc();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>
        Prueba KONECTA
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<section class="page">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom bg-light">
        <span class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none fs-4">Cafeteria</span>
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="../index.php" class="nav-link">Inicio</a></li>
            <li class="nav-item"><a href="../autentication/logout.php" class="nav-link">Cerrar Sesion</a></li>
        </ul>
    </header>
    <div class="content">
        <div class="d-flex align-items-center justify-content-center">
            <div class="card col-8">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <span>Editar Producto</span>
                        </div>
                        <div class="col-6">
                            <a href="../dashboard.php" class="btn btn-success float-end">Volver</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="update.php">
                        <div class="row">
                            <input type="text" name="id" value="<?php echo $id?>" class="form-control" hidden required>
                            <div class="form-group col-6">
                                <label for="name">Nombre:</label>
                                <input type="text" name="name" value="<?php echo $product['name']?>" class="form-control" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="reference">Referencia:</label>
                                <input type="text" name="reference" value="<?php echo $product['reference']?>" class="form-control" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="price">Precio:</label>
                                <input type="text" name="price" value="<?php echo $product['price']?>" class="form-control" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="weight">Peso:</label>
                                <input type="text" name="weight" value="<?php echo $product['weight']?>" class="form-control" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="category">Categoria:</label>
                                <select name="category" class="form-select">
                                    <option value="grano" <?php echo ($product['category'] == 'grano' ? 'selected' : '');?>>Grano</option>
                                    <option value="harina" <?php echo ($product['category'] == 'harina' ? 'selected' : '');?>>Harina</option>
                                    <option value="bebida" <?php echo ($product['category'] == 'bebida' ? 'selected' : '');?>>Bebida</option>
                                    <option value="comestible" <?php echo ($product['category'] == 'comestible' ? 'selected' : '');?>>Comestible</option>
                                    <option value="delicado" <?php echo ($product['category'] == 'delicado' ? 'selected' : '');?>>Delicado</option>
                                    <option value="preparable" <?php echo ($product['category'] == 'preparable' ? 'selected' : '');?>>Preparable</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="stock">Cantidad en Stock:</label>
                                <input type="text" name="stock" value="<?php echo $product['stock']?>" class="form-control" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <input type="submit" class="btn btn-primary col-2 float-end" value="Guardar Cambios">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>