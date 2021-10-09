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
    <title>Registrar una Compra</title>
</head>
<body>
    <h1 class="mt-3 text-center">Registrar una Compra</h1>
    <hr/>
    <form action="/" method="POST">
        <select name="nombre" id="" class="form-control">
            <option value="" selected disabled hidden>Seleccione un Souvenir</option>
            <?php
                $souvenir = new souvenirController();
                $souvenirs = $souvenir -> mostrarSouvenirs();

                    foreach($souvenirs as $souvenir){
                        echo "<option value='".$souvenir['nombre']."' >" . $souvenir['nombre'] . "</option>";
                    }
            ?>
        </select>
        <input type="text" name="stock" placeholder="Ingrese la cantidad de objetos vendidos" class="form-control">
        <?php
            $souvenir = new souvenirController();
            $souvenirs = $souvenir -> mostrarSouvenirs();

                foreach($souvenirs as $souvenir){
                    echo "<button class='btn btn-danger' name='id' formaction='/guardar-compra' value='".$souvenir['id']."'>  Guardar Souvenir  </button>";
                }
        ?>
        
    </form>

    
</body>
</html>