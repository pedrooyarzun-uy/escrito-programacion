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
    <title>Eliminar Souvenir</title>
</head>
<body>
    <h1 class="text-center">Eliminar Souvenir</h1>

    <table class="table table-striped">
        <thead class="thead-dark">
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Stock</th>
            <th scope="col">Precio</th>
            <th scope="col">Eliminar</th>
        </thead>
        <form action="submit" method="POST">
        <tbody>
            <?php
                $souvenir = new souvenirController();
                $souvenirs = $souvenir -> mostrarSouvenirs();

                foreach($souvenirs as $souvenir){
                    echo "<tr>";
                    echo "<td> " . $souvenir['nombre'] . "</td>";
                    echo "<td> " . $souvenir['descripcion'] . "</td>";
                    echo "<td> " . $souvenir['stock'] . "</td>";
                    echo "<td> " . $souvenir['precio'] . "</td>";
                    echo "<td> 
                            <button class='btn btn-danger' name='id' formaction='/eliminar-souvenir' value='".$souvenir['id']."'>  Eliminar Souvenir  </button> </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
        </form>
    </table>
    <form action="/principal" method="POST">
        <button class="btn btn-primary">Volver al inicio</button>
    </form>
</body>
</html>