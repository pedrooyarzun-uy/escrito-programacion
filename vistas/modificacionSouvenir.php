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
    <title>Modificar Souvenir</title>
</head>
<body>
    <h1 class="mt-3 text-center">Modificar Souvenir</h1>
    <hr/>
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <form action="modificar" method="POST">
            <input
              type="text"
              id="id"
              class="form-control mt-2"
              name="id"
              placeholder="Ingrese el ID del Souvenir"
            />
            <input
              type="text"
              id="nombre"
              class="form-control mt-2"
              name="nombre"
              placeholder="Ingrese el nombre"
            />
            <textarea id="descripcion" name="descripcion" placeholder="Ingrese la descripcion" cols="30" rows="10" class="form-control mt-2"></textarea>
            <input type="text" id="stock" name="stock" placeholder="Ingrese la cantidad de Stock" class="form-control mt-2">
            <input type="text" id="precio" name="precio" placeholder="Ingrese el precio" class="form-control mt-2">
            <button
              class="btn btn-success btn-block mt-2"
            >
              Modificar Souvenir
            </button>
            <button class="btn btn-primary btn-block mt-2" formaction="/principal">Volver al inicio</button>
          </form>
        </div>
        <div class="col-md-7">
          <table class="table" id="tabla">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
              </tr>
            </thead>
            <tbody id="tbody-tabla">
                <?php
                    $souvenir = new souvenirController();
                    $souvenirs = $souvenir -> mostrarSouvenirs();

                    foreach($souvenirs as $souvenir){
                        echo "<tr>";
                        echo "<td> " . $souvenir['id'] . "</td>";
                        echo "<td> " . $souvenir['nombre'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
          </table>
        </div>
      </div>
      <h4 class="text-danger text-center mt-2">Para modificar un souvenir debe escribir el ID del souvenir que desea modificar, este podra buscarlo en la tabla que se encuentra en la parte derecha de la pagina.</h4> <br>
      <h5 class="text-info text-center mt-2">En caso de que ingrese un ID que no existe, la tabla con los souvenirs no se vera modificada. Si el ID es correcto, vera el cambio en la tabla.</h5>
    </div>
</body>
</html>