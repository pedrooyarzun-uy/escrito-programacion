<?php

    require '../utils/autoloader.php';

    class usuarioModelo extends Modelo{

        public $usuario;
        public $contrasenia;


        public function autenticar(){
            $this -> prepararAutenticacion();
            $this -> sentencia -> execute();
    
            $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
           
    
            if($this -> sentencia -> error){
                throw new Exception ("Error al obtener el usuario: " . $this -> sentencia -> error);
            }
    
            if($resultado){
                $comparacion = $this -> compararPasswords($resultado['contrasenia']);

                if($comparacion){
                    $this -> asignarDatosDeUsuario($resultado);
                }
                else{
                    throw new Exception ("Error al iniciar sesion");
                }
    
            }
            else throw new Exception ("Error al iniciar sesion");
        }


        private function compararPasswords($contraseniaHasheada){
            return password_verify($this -> contrasenia, $contraseniaHasheada);
        }

        private function prepararAutenticacion(){
            $sql= "SELECT usuario, contrasenia FROM usuario WHERE usuario= ? ";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("s", $this -> usuario);
        }

        private function asignarDatosDeUsuario($resultado){
            $this -> usuario = $resultado ['usuario'];
            $this -> contrasenia  = $resultado['contrasenia'];
        }
    }
    


