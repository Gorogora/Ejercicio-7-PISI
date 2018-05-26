<?php

    if($_REQUEST['nombre_rally']){
        //copiar los parámetros en variables
        $nombre_rally = $_REQUEST['nombre_rally'];

        $resultado = "";
        if($nombre_rally != ""){
            try{
                // conectar con el servidor de base de datos
                $db = new PDO("mysql:host=localhost; dbname=WRC; charset=utf8", "root");
                
                $query_clasificacion = 'SELECT posicion.posicion AS pos, piloto.nombreP AS nombre FROM posicion INNER JOIN rally ON posicion.codRally = rally.codRally INNER JOIN piloto ON posicion.codPiloto = piloto.codPiloto WHERE rally.nombre = "'.$nombre_rally.'" ORDER BY posicion.posicion';
                $result_set_ej8 = $db->query($query_clasificacion);

                foreach($result_set_ej8 as $row){
                    echo "<tr>";
                    echo "<td>".$row['pos']."</td>";
                    echo "<td>".$row['nombre']."</td>";                    												
                    echo "</tr>";
                }
            }
            catch(PDOException $e){
                //$db->rollback();
                //$resultado = "No se ha podido modificar la fecha del rally " .$codRally. " a " .$fecha;
                
            }
            $db = null;
        }
        echo $resultado;
    }
    
?>