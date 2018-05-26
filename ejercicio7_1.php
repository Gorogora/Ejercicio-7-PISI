<?php
    if($_REQUEST['commit']){
        //copiar el parámetro en una variable
        $commit = $_REQUEST['commit'];

        $resultado= "";

        if($commit != "" ){
            try{
                // conectar con el servidor de base de datos
                $db = new PDO("mysql:host=localhost; dbname=WRC; charset=utf8", "root");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Construir los códigos para los nuevos rallies
                $query_table_rally = "SELECT * FROM rally";
                $result_set = $db->query($query_table_rally);
                $codigos = $result_set->rowCount() + 1;

                $codigo_1 = "";
                if($codigos < 10){
                    $codigo_1 = "R00" .$codigos;
                }
                elseif($codigos < 100) {
                    $codigo_1 = "R0" .$codigos;
                }
                else{
                    $codigo_1 = "R" .$codigos;
                }

                $codigos = $codigos + 1;

                $codigo_2 = "";
                if($codigos < 10){
                    $codigo_2 = "R00" .$codigos;
                }
                elseif($codigos < 100) {
                    $codigo_2 = "R0" .$codigos;
                }
                else{
                    $codigo_2 = "R" .$codigos;
                }

                //comienzo de la transacción
                $db->beginTransaction();

                //componer el primer insert sql
                $insert_rally_1 = 'INSERT INTO rally (codRally, nombre, pais, fecha) VALUES ("'.$codigo_1.'", "Rally ' .$codigo_1. '", "País rally ' .$codigo_1. '", "'.date("Y-m-d").'")';
                //prepara la sentencia para su ejecución
                $result_insert_1 = $db->prepare($insert_rally_1);
                //ejecuta el insert
                $result_insert_1->execute();

                //componer el segundo insert sql
                $insert_rally_2 = 'INSERT INTO rally (codRally, nombre, pais, fecha) VALUES ("'.$codigo_2.'", "Rally ' .$codigo_2. '", "País rally ' .$codigo_2. '", "'.date("Y-m-d").'")';
                //prepara la sentencia para su ejecución
                $result_insert_2 = $db->prepare($insert_rally_2);
                //ejecuta el insert
                $result_insert_2->execute();

                //validar las sentencias
                $db->commit();

                //mostrar el resultado de la consulta (la tabla rally con la nueva info)
                $query_table_rally = "SELECT * FROM rally";
                $result_set_ej7 = $db->query($query_table_rally);
                //echo '<p>Número de filas: '.$result_set_ej7 -> rowCount().'</p>';
                foreach($result_set_ej7 as $row){
                    $resultado = $resultado. "<tr>";
                    $resultado = $resultado. "<td>".$row['codRally']."</td>";
                    $resultado = $resultado. "<td>".$row['nombre']."</td>";
                    $resultado = $resultado. "<td>".$row['pais']."</td>";
                    //creamos un objeto DateTime para formatear la fecha
                    $fecha = new DateTime($row['fecha']);
                    $resultado = $resultado. "<td>".$fecha->format('d-m-Y')."</td>";
                    $resultado = $resultado. "</tr>";
                }            

            }
            catch(PDOException $e){
                $db->rollBack();
                $resultado = "<p>No se ha podido realizar la transacción</p><br>Error: " .$e->getMessage();
            }

            $db = null;
        }
        echo $resultado;
    }
?>