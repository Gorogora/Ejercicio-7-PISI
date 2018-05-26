<?php
    
    if($_REQUEST['nombre_piloto'] && $_REQUEST['tiempo']){
        //copiar los parámetros en variables
        $nombre = $_REQUEST['nombre_piloto'];
        $tiempo = $_REQUEST['tiempo'];

        $resultado= "";

        if($nombre != "" || $tiempo != ""){
            try{
                // conectar con el servidor de base de datos
                $db = new PDO("mysql:host=localhost; dbname=WRC; charset=utf8", "root");

                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //comienzo de la transacción
            //    $db->beginTransaction();

                //componer la consulta sql
                $query_condicion = 'SELECT corre.codTramo AS tramo, corre.tiempo AS tiempo, rally.nombre AS nombre FROM corre INNER JOIN piloto ON corre.codPiloto = piloto.codPiloto INNER JOIN tramo ON corre.codTramo = tramo.codTramo INNER JOIN rally ON rally.codRally = tramo.codRally WHERE piloto.nombreP = "'.$nombre.'" AND corre.tiempo > "'.$tiempo.'" ORDER BY corre.tiempo';
                
                //prepara la sentencia para su ejecución
                $result_query = $db->prepare($query_condicion);

                //ejecuta la sentencia
                $result_query->execute();

                //validar las sentencias
            //    $db->commit();

                //mostrar el resultado de la consulta
                $titulo = "<h5>Rallies en los que ".$nombre." ha corrido tramos en más de más de ".$tiempo."</h5><br>";
                $cuerpo = "";
                foreach ($result_query as $row) {
                    $cuerpo = $cuerpo."<p>".$row['nombre']." ".$row['tramo']." ".$row['tiempo']."</p>";
                }

                if($cuerpo == ""){
                    $resultado = "<p>El piloto ".$nombre." no ha empleado más de ".$tiempo." segundos en recorrer un tramo.</p>";
                }
                
                else{
                    $resultado = $titulo . $cuerpo;
                }

            }
            catch(PDOException $e){
            //    $db->rollBack();
                $resultado = "No se ha podido realizar la conexión";
            }
        //    $db = null;
        }
    }

    echo $resultado;
    
?>