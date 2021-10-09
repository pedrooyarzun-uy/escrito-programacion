<?php

    require '../utils/autoloader.php';

    class souvenirController{

        public static function preAltaDeSouvenir($nombre, $descripcion, $stock, $precio){
            if($nombre !== "" && $descripcion !== "" && $stock !== "" && $precio !== ""){
                try{
                    $s = new souvenirModelo();
                    $s -> nombre = $nombre;
                    $s -> descripcion = $descripcion;
                    $s -> stock = $stock;
                    $s -> precio = $precio;
                    $s -> guardarSouvenir();

                    return generarHtml("altaSouvenir", ["exito" => true]);
                } catch (Exception $e){
                    error_log("Error en el alta");
                    generarHtml("altaSoveunir", ["exito" => false]);

                }
            } else {
                return generarHtml("altaSouvenir", ["exito" => false]);
            }
        }

        public static function mostrarSouvenirs(){
            try{
                $s = new souvenirModelo();
                $souvenirs = $s -> listarSouvenir();
                return $souvenirs;

            } catch(Exception $e){
                error_log("Error en la eliminacion");
            }
        }

        public static function preBajaSouvenir($id){
            try{
                $s = new souvenirModelo();
                $s -> id = $id;
                $s -> eliminarSouvenir();
                return generarHtml("bajaSouvenir", ["exito" => true]);

            } catch (Exception $e){
                error_log("Error en la eliminacion");
                generarHtml("bajaSouvenir", ["exito" => false]);
            }
        }

        public static function preModificarSouvenir($id, $nombre, $descripcion, $stock, $precio){
            if($id !== "" && $nombre !== "" && $descripcion !== "" && $stock !== "" && $precio !== ""){
                try{
                    $s = new souvenirModelo();
                    $s -> id = $id;
                    $s -> nombre = $nombre;
                    $s -> descripcion = $descripcion;
                    $s -> stock = $stock;
                    $s -> precio = $precio;
                    $s -> modificarSouvenir();
                    return generarHtml("modificacionSouvenir", ["exito" => true]);
                } catch(Exception $e){
                    error_log("Error en la modificacion");
                    generarHtml("modificacionSouvenir", ["exito" => false]);
                }
            } else {
                generarHtml("modificacionSouvenir", ["exito" => false]);
            }
        }

        public static function preRegistroDeCompra($nombre, $stock, $id){
            if($nombre !== "" && $stock !== "" && $id !== ""){
                try{
                    $s = new souvenirModelo();
                    $s -> nombre = $nombre;
                    $s -> id = $id;
                    $s -> stock = $stock;
                    $s -> guardarCompra();

                } catch(Exception $e){
                    error_log("No se pudo guardar la compra");

                }
            }
        }

    }