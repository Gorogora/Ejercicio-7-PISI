<?php
    if(isset($_POST['nombre_piloto'])){
        //copio el contenido de $_POST
        $nombre_piloto = $_POST['nombre_piloto'];

        // conectar con el servidor de base de datos
        $db = new PDO("mysql:host=localhost; dbname=WRC; charset=utf8", "root");

        //componer la consulta sql
        $query_posiciones = 'SELECT posicion.posicion as pos FROM posicion INNER JOIN piloto ON posicion.codPiloto = piloto.codPiloto WHERE piloto.nombreP = "'.$nombre_piloto.'"';
        
        //Enviar la instrucción SQL a la base de datos
        $result_set_ej4 = $db->query($query_posiciones);

        //definimos los puntos en función de la posición
        define("POS1", 30);
        define("POS2", 20);
        define("POS3", 10);

        $puntos = 0;
        foreach($result_set_ej4 as $row){
            switch($row['pos']){
                case 1;
                    $puntos = $puntos + POS1;
                    break;
                case 2: 
                    $puntos = $puntos + POS2;
                    break;
                case 3: 
                    $puntos = $puntos + POS3;
                    break;
            }
        }
        
        
        echo "<p>Puntos totales de $nombre_piloto en el mundial : <b>$puntos</b></p>";
    }


?>