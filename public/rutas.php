<?php
    require '../utils/autoloader.php';

    $request = $_SERVER['REQUEST_URI'];
    switch($request){


        case '/':
            cargarVista('login');
            break;

        case '/logearse':
            if($_SERVER['REQUEST_METHOD'] === "POST") usuarioController::iniciarSesion($_POST['usuario'], $_POST['contrasenia']);
            if($_SERVER['REQUEST_METHOD'] === "GET") usuarioController::MostrarLogin();
            break;
        
        case '/principal':
            usuarioController::MostrarMenuPrincipal();
            break;

        case '/registrarSouvenir':
            if($_SERVER['REQUEST_METHOD'] === "POST") souvenirController::preAltaDeSouvenir($_POST['nombre'], $_POST['descripcion'], $_POST['stock'], $_POST['precio']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /alta-souvenir");
            break;

        case '/alta-souvenir':
            cargarVista("altaSouvenir");
            break;

        case '/baja-souvenir':
            cargarVista("bajaSouvenir");
            break;

        case '/eliminar-souvenir':
            if($_SERVER['REQUEST_METHOD'] === "POST") souvenirController::preBajaSouvenir($_POST['id']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /baja-souvenir");
            break;
        
        case '/listar-souvenirs':
            cargarVista("listarSouvenir");
            break;

        case '/modificar-souvenir':
            cargarVista("modificacionSouvenir");
            break;

        case '/modificar':
            if($_SERVER['REQUEST_METHOD'] === "POST") souvenirController::preModificarSouvenir($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['stock'], $_POST['precio']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /modificar-souvenir");
            break;
        
        case '/registrar-compra':
            cargarVista("registrarCompra");
            break;

        case '/guardar-compra':
            if($_SERVER['REQUEST_METHOD'] === "POST") souvenirController::preRegistroDeCompra($_POST['nombre'], $_POST['stock'], $_POST['id']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /registrar-compra");
            break;
        
        
    }