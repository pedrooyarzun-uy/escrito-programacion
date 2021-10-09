<?php 
    require '../utils/autoloader.php';

    if(!isset($_SESSION['autenticado'])){
        header('Location: /');
        die();
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <title>Listar Souvenirs</title>
</head>
    <body>
        <h1 class="text-center">Listar Souvenirs</h1>

        <table class="table table-striped">
            <thead class="thead-dark">
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Stock</th>
                <th scope="col">Precio</th>
                <th scope="col">Fecha</th>
            </thead>
            <tbody>
                <?php
                    $souvenir = new souvenirController();
                    $souvenirs = $souvenir -> mostrarSouvenirs();

                    foreach($souvenirs as $souvenir){
                        echo "<tr>";
                        echo "<td> " . $souvenir['id'] . "</td>";
                        echo "<td> " . $souvenir['nombre'] . "</td>";
                        echo "<td> " . $souvenir['descripcion'] . "</td>";
                        echo "<td> " . $souvenir['stock'] . "</td>";
                        echo "<td> " . $souvenir['precio'] . "</td>";
                        echo "<td> " . $souvenir['fecha'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <form action="/principal" method="POST">
            <button class="btn btn-primary">Volver al inicio</button>
        </form>
</body>
</html>