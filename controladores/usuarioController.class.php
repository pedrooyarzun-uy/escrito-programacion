<?php

    require '../utils/autoloader.php';

    class usuarioController{


        public static function iniciarSesion($usuario,$contrasenia){
            try{
              $u = new usuarioModelo();
              $u -> usuario = $usuario;
              $u -> contrasenia = $contrasenia;
              $u -> autenticar(); 
              self::crearSesion($u);
    
              header("Location: /principal");
            
            }
            catch(Exception $e){
                error_log("fallo login del usuario ");
                generarHtml("login", ["falla" => true]);
            }
            
            
        }

        public static function MostrarLogin(){
            session_start();
            if(isset($_SESSION['autenticado'])) header ("Location: /principal");
            else return cargarVista("login");
        
        }

        public static function MostrarMenuPrincipal(){
            session_start();
            if(!isset($_SESSION['autenticado'])) header("Location : /inicio");
            else return cargarVista("principal");
        }

        private static function crearSesion($usuario){
            session_start();
            ob_start(); 
            $_SESSION['usuario'] = $usuario -> usuario;
            $_SESSION['autenticado'] = true; 
        }


        
    }


    