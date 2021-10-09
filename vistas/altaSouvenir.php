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
        <h1 class="text-center mt-2">Registrar Souvenir</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="/registrarSouvenir" method="POST">
                        <input type="text" name="nombre" placeholder="Ingrese un nombre" maxlength="50" class="form-control"> <br>
                        <textarea name="descripcion" id="" cols="30" rows="10" placeholder="Ingrese una descripcion" maxlength="255" class="form-control"></textarea> <br>
                        <input type="text" name="stock" placeholder="Ingrese cantidad de stock" class="form-control"> <br>
                        <input type="text" name="precio" placeholder="Ingrese un precio" class="form-control"> <br>
                        <button class="btn btn-success">Guardar Souvenir</button>
                        <button formaction="/principal" class="btn btn-primary">Volver al inicio</button>
                    </form>
                </div>
            </div>
        </div>
    
</body>
</html>