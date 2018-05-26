<?php
    if($_REQUEST['codRally'] && $_REQUEST['nombre'] && $_REQUEST['pais'] && $_REQUEST['fecha']){
        $codigo = $_REQUEST['codRally'];
        $nombre = $_REQUEST['nombre'];
        $pais = $_REQUEST['pais'];
        $fecha = $_REQUEST['fecha'];

        $resultado = "";

        if($codigo != "" && $nombre != "" && $pais != "" && $fecha != ""){
            //validar código
            if(preg_match("/^R[0-9]{3}$/",$codigo)){
                //validar fecha yyyy-mm-dd
                if(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$fecha)){
                    try{
                        // conectar con el servidor de base de datos
                        $db = new PDO("mysql:host=localhost; dbname=WRC; charset=utf8", "root");
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        //comienzo de la transacción
                        $db->beginTransaction();

                        //componer el primer insert sql
                        $insert_rally = 'INSERT INTO rally (codRally, nombre, pais, fecha) VALUES ("'.$codigo.'", "' .$nombre. '", "' .$pais. '", "'.$fecha.'")';
                        //prepara la sentencia para su ejecución
                        $result_insert = $db->prepare($insert_rally);
                        //ejecuta el insert
                        $result_insert->execute();

                        //validar las sentencias
                        $db->commit();

                        $resultado = "Rally insertado con éxito";

                    }
                    catch(PDOException $e){
                        $db->rollBack();
                        $resultado = "No se ha podido realizar la inserción";

                    }

                    $db = null;
                }
                else{
                    $resultado = "La fecha debe tener el formato yyyy-mm-dd";
                }
            }
            else{
                $resultado = "El código debe seguir el formato R+tres dígitos";
            }
        }
        echo $resultado;
    }

?>