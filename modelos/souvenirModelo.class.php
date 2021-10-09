<?php

    require '../utils/autoloader.php';

    class souvenirModelo extends Modelo{

        public $id;
        public $nombre;
        public $descripcion;
        public $stock;
        public $precio;

        public function guardarSouvenir(){
            $this -> preGuardarSouvenir();
            $this -> sentencia -> execute();
        }

        private function preGuardarSouvenir(){
            $sql = "INSERT INTO souvenir (nombre, descripcion, stock, precio) VALUES (?,?,?,?)";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("ssii",
                $this -> nombre,
                $this -> descripcion,
                $this -> stock,
                $this -> precio
            );
        }


        public function listarSouvenir(){
            $this -> preListarSoveunir();
            $this -> sentencia -> execute();
            $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);

            return $resultado;

        }

        private function preListarSoveunir(){
            $sql = "SELECT * FROM souvenir";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            
        }

        public function eliminarSouvenir(){
            $this -> preEliminarSouvenir();
            $this -> sentencia -> execute();
        }

        private function preEliminarSouvenir(){
            $sql = "DELETE FROM souvenir WHERE id = ?";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("i", $this -> id);
        }

        public function modificarSouvenir(){
            $this -> preModificarSouvenir();
            $this -> sentencia -> execute();
        }

        private function preModificarSouvenir(){
            $sql = "UPDATE souvenir SET nombre = ?, descripcion = ?, stock = ?, precio = ? WHERE id = ?";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("ssiii",
                $this -> nombre,
                $this -> descripcion,
                $this -> stock,
                $this -> precio,
                $this -> id
            );

        }

        public function guardarCompra(){
            if($this -> preGuardarCompra() == false){
                return false;
                
            } else {
                return true;
            }
        }

        private function preGuardarCompra(){
            $sql1 = "SELECT stock FROM souvenir WHERE id = ?";
            $this -> sentencia = $this -> conexion -> prepare($sql1);
            $this -> sentencia -> bind_param("i", $this -> id);
            $this -> sentencia -> execute();
            $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
            if($this -> stock > $resultado['stock']){
                return false;
            } else {
                $nuevoStock = $resultado['stock'] - $this -> stock;
                $sql2 = "INSERT INTO souvenir (stock) VALUES ('{$nuevoStock}')";
                $this -> conexion -> query($sql2);

                $sql3 = "INSERT INTO compra(nombre, cantidad) VALUES (?, ?)";
                $this -> sentencia = $this -> conexion -> prepare($sql3);
                $this -> sentencia -> bind_param("si", $this -> nombre, $this -> stock);
                $this -> sentencia -> execute();
                return true;
                
                
            }
        }
        
    }