<?php
    if($_REQUEST['fecha'] && $_REQUEST['codRally']){

        //copiar los parámetros en variables
        $fecha = $_REQUEST['fecha'];
        $codRally = $_REQUEST['codRally'];

        $resultado="";

        if($fecha!= "" || $codRally!=""){
            try{
                // conectar con el servidor de base de datos
                $db = new PDO("mysql:host=localhost; dbname=WRC; charset=utf8", "root");

                //comienzo de la transacción
                $db->beginTransaction();

                //componer la consulta sql de actualización
                $query_update_date = 'UPDATE rally SET fecha="'.$fecha.'" WHERE codRally="'.$codRally.'"';
                
                //prepara la sentencia para su ejecución
                $result_update = $db->prepare($query_update_date);

                //ejecuta la sentencia
                $result_update->execute();

                //validar las sentencias
                $db->commit();

                $resultado = "Se ha actualizado ".$result_update->rowCount()." rallies";
            }
            
            catch(PDOException $e){
                $db->rollback();
                $resultado = "No se ha podido modificar la fecha del rally " .$codRally. " a " .$fecha;
                
            }
            $db = null;

        }

        return $resultado;       
    }
?>