<?php
include('db/connection.php');
?>
<html>
<head>
    <meta charset="utf-8">
    <title>
        Prueba KONECTA
    </title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<section class="page">
    <?php
    session_start();
    if (isset($_SESSION['user_name'])){
        include ('headers/logged_in_header.php');
    }else{
        include ('headers/not_logged_header.php');
    }
    ?>
    <div class="content">
        <div class="d-flex align-items-center justify-content-center">
            <div class="card col-8">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Peso (gr)</th>
                            <th scope="col">Categoria</th>
                            <th scope="col" colspan="2">Stock</th>
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
                                <td>$ <?php echo $product[3]?></td>
                                <td><?php echo $product[4]?></td>
                                <td><?php echo $product[5]?></td>
                                <td><?php echo $product[6]?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal<?php echo $product[0]?>">
                                        Comprar
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="Modal<?php echo $product[0]?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Comprar <?php echo $product[1]?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="products/sale.php" name="buy_product<?php echo $product[0]?>">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <input type="text" name="id_product" value="<?php echo $product[0]?>" hidden>
                                                    <div class="form-group col-10">
                                                        <input type="text" name="name" class="form-control " value="<?php echo $product[1]?>" disabled>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <input type="number" name="amount" class="form-control" id="amount" onchange="calcValue($(this).val(), <?php echo $product[3]?>)" value="1" required min="1">
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="form-group d-flex">
                                                        <p><b class="text-success">Valor Total:</b></p>
                                                        <p id="totalCost">$<?php echo $product[3]?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Confirmar Compra</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
<script type="text/javascript">
    function calcValue(amount, price) {
        var cost = price * amount;
        $('#totalCost').html('$'+cost);
    }
</script>
</body>
</html>