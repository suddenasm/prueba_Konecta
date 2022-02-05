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
            <li class="nav-item"><a href="index.php" class="nav-link">Volver</a></li>
        </ul>
    </header>
    <div class="content">
        <div class="d-flex align-items-center justify-content-center">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="login.php">
                        <div class="form-group">
                            <label for="E-Mail">E-mail:</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>
                        <div class="form-group mt-1">
                            <label for="Password">Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group mt-1">
                            <input type="submit" class="btn btn-primary col-12" value="Iniciar Sesion">
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