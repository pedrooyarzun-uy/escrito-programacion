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
    <title>Document</title>
</head>
<body>
        <h1>Menu Principal</h1>

        <form action="" method="POST">
            <button formaction="/alta-souvenir">Registrar Souvenir</button>
            <button formaction="/baja-souvenir">Eliminar Souvenir</button>
            <button formaction="/listar-souvenirs">Listar Souvenirs</button>
            <button formaction="/modificar-souvenir">Modificar Souvenirs</button> <br>
            <button formaction="/registrar-compra">Registrar Compra</button>

            


        </form>
</body>
</html>