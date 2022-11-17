<?php 
    require_once 'class/conexion.php';
    $db = new DB();

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cafetería</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?modulo=gestionar">Producto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?modulo=facturar">Venta</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>


    <?php 

        switch ($_GET['modulo']) {
            case 'facturar':
                    include("paginas/factura.php");
                break;

            case 'gestionar':
                    include("paginas/producto.php");
                break;            
            default:
                    include("paginas/producto.php");
                break;
        }

    ?>
   




<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/funciones.js"></script>
</body>
</html>