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
    <title>Document</title>
</head>
<body>
<?php if(isset($parametros['exito']) && $parametros['exito'] == true): ?>
        <div class="alert alert-success">
            El souvenir fue guardado exitosamente!
        </div>
    <?php endif; ?>

    <?php if(isset($parametros['exito']) && $parametros['exito'] == false): ?>
        <div class="alert alert-danger">
            El souvenir no se pudo guardar!
        </div>
    <?php endif; ?>


    <form action="/registrarSouvenir" method="POST">
        <input type="text" name="nombre" placeholder="Ingrese un nombre" maxlength="50"> <br>
        <textarea name="descripcion" id="" cols="30" rows="10" placeholder="Ingrese una descripcion" maxlength="255"></textarea> <br>
        <input type="text" name="stock" placeholder="Ingrese cantidad de stock"> <br>
        <input type="text" name="precio" placeholder="Ingrese un precio"> <br>
        <button>Guardar Souvenir</button>
    </form>
</body>
</html>