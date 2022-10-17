<?php
    require_once "inventario.php";
    require_once 'conexion.php';

    $idArticulo = $_POST['numberArticulo'];
    $t1 = (int)$_POST['T1'];
    $t2 = (int)$_POST['T2'];
    $s1 = (int)$_POST['S1'];
    $s2 = (int)$_POST['S2'];

        $c = new conectar();
            $conexion=$c->conexion();
            $sql = "SELECT * FROM productos WHERE idArticulo = $idArticulo";
            $result = mysqli_query($conexion, $sql);
            $ver = mysqli_fetch_row($result);

            $sql2 = "SELECT * FROM valoresesperados WHERE idArticulo = $idArticulo";
            $result2 = mysqli_query($conexion, $sql2);
            $ver2 = mysqli_fetch_row($result2);

            if(isset($ver[0]) == $idArticulo){
            
            $obj= new inventario();
            $production = $obj->suspende($t1, $t2, $s2, $idArticulo);
            
            $baja = $obj->remueve($t1, $t2, $s1, $s2, $idArticulo);
            
            $ensamble = $obj->ensamble($idArticulo);
            $conexion->close();
        }
        else
        {
            header("Location: ../index.php");
            die();
        }

        if(isset($ver[0]) == $idArticulo){
            ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Resultados</title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
                    rel="stylesheet" 
                    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
                    crossorigin="anonymous">
                </head>
                <body>
                    <div class="container">
                        <div><br>
                            <h4 class="text-center" style="border: 2px solid #d0d0d0;background: #F6F3B8;">Tabla del caso de prueba</h1>
                            <table class="table" style="border: 2px solid #d0d0d0;">
                            <thead>
                                <tr>
                                <th scope="col">Articulo</th>
                                <th scope="col">No.Pedido</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Catalogo</th>
                                <th scope="col">Ensamble</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row"> <?php echo $idArticulo ?> </th>
                                <td><?php echo $ver[1] ?> </td>
                                <td>
                                    <?php  
                                        if($production == 2){
                                            echo "No Produccion";
                                        }
                                        else if($production == 4)
                                        {
                                            echo "Produccion";
                                        }
                                    ?> 
                                </td>
                                <td>
                                    <?php  
                                        if($baja == 0){
                                            echo "Baja en Catalogo";
                                        }else if($baja == 4){
                                            echo "En catalogo";
                                        }
                                    ?> 
                                </td>
                                <td>
                                    <?php  
                                        if($ensamble == 4){
                                            echo "Ensamblado";
                                        }else {
                                            echo "NO Ensamblado";
                                        }  
                                    ?> 
                                </td>
                                </tr>
                                <tr>
                            </tbody>
                            </table>
                        </div>
                        <br>
                        <div>
                            <h4 class="text-center" style="border: 2px solid #d0d0d0;background: #F6F3B8;">Tabla valor esperado</h1>
                            <table class="table " style="border: 2px solid #d0d0d0;">
                            <thead>
                                <tr>
                                <th scope="col">idArticulo</th>
                                <th scope="col">Valor Previo</th>
                                <th scope="col">Valor Esperado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row"> <?php echo $idArticulo ?> </th>
                                <td>
                                    <?php
                                        if($ver2[1] == 0){
                                            echo "Baja del Catalogo";
                                        }
                                        else if($ver2[1] == 2){
                                            echo "No produccion";
                                        }else{
                                            echo "Produccion";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($ver2[1] == 0){
                                            echo "Baja del Catalogo";
                                        }
                                        else if($ver2[1] == 2){
                                            echo "No produccion";
                                        }else{
                                            echo "Produccion";
                                        }
                                    ?>
                                </td>
                                </tr>
                                <tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </body>
                </html>
            <?php
        } 
?>


