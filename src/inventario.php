<?php


    require 'conexion.php';
    class inventario{
        public function suspende($t1, $t2, $s2, $idArticulo){
            $c = new conectar();
            $conexion=$c->conexion();
            $sql = "SELECT * FROM productos WHERE idArticulo = $idArticulo";
            $result = mysqli_query($conexion, $sql);
            $ver = mysqli_fetch_row($result);
            $resultado = 0;
            if($ver[1] < $t1 || ($ver[1]<$t2 && $t1 < $ver[1]) && $ver[2] > $s2){
                $sql = "UPDATE productos SET idEstatus=2 WHERE idArticulo = $idArticulo";
                mysqli_query($conexion, $sql);

                $sql2 = "UPDATE valoresEsperados SET valor_esperado=2 WHERE idArticulo = $idArticulo";
                mysqli_query($conexion, $sql2);
                $resultado = 2;
            }
            else {
                $sql = "UPDATE productos SET idEstatus=4 WHERE idArticulo = $idArticulo";
                mysqli_query($conexion, $sql);

                $sql2 = "UPDATE valoresEsperados SET valor_esperado=4 WHERE idArticulo = $idArticulo";
                mysqli_query($conexion, $sql2);
                $resultado = 4;
            }  
            return $resultado;
            $conexion->close();
        }


        public function remueve($t1, $t2, $s1, $s2, $idArticulo){
            // idStatus 
            // 0 Baja Catalogo
            // 2 No produccion
            // 4 En produccion

            $c = new conectar();
            $conexion=$c->conexion();
            $sql = "SELECT * FROM productos WHERE idArticulo = $idArticulo";
            $result = mysqli_query($conexion, $sql);
            $ver = mysqli_fetch_row($result);
            $resultado = 0;
            if(($ver[4] == 2 && $ver[1] < $t1) && $ver[2] > $s1 && $ver[2] < $s2){
                $sql = "UPDATE productos SET idEstatus = 0 WHERE idArticulo = $idArticulo";
                mysqli_query($conexion, $sql);

                $sql2 = "UPDATE valoresEsperados SET valor_esperado=0 WHERE idArticulo = $idArticulo";
                mysqli_query($conexion, $sql2);
                $resultado = 0;


            }else if($ver[1] < $t2 && $ver[2] > $s1){
                $sql = "UPDATE productos SET idEstatus = 4 WHERE idArticulo = $idArticulo";
                mysqli_query($conexion, $sql);

                $sql2 = "UPDATE valoresEsperados SET valor_esperado=4 WHERE idArticulo = $idArticulo";
                mysqli_query($conexion, $sql2);
                $resultado = 4;
            }
            return $resultado;
            $conexion->close();

        }

        public function ensamble($idArticulo){
            // ensamblado = 1
            // no ensamblado = 0
            $c = new conectar();
            $conexion=$c->conexion();
            $sql = "SELECT * FROM `productos` WHERE idArticulo = $idArticulo";
            $result = mysqli_query($conexion, $sql);
            $ver = mysqli_fetch_row($result);
            $resultado  = 1000;
            if($ver[3] == 1){
                $sql = "UPDATE productos SET idEstatus=4 WHERE idArticulo = $idArticulo";
                mysqli_query($conexion, $sql);

                $sql2 = "UPDATE valoresEsperados SET valor_esperado=4 WHERE idArticulo = $idArticulo";
                mysqli_query($conexion, $sql2);
                $resultado  = 4;
            }
            return $resultado ;
            $conexion->close();
        }
    }

?>