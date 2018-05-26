function ejercicio9(nombre_rally){
    $.ajax({
        url: 'ejercicio9.php',
        type: "POST",        
        data: {nombre_rally: nombre_rally},
        beforeSend: function () {
            //$("#tiempo_tramo").html("Realizando la consulta, espere por favor...");
        },
        success: function(response) {
            $('#content_clasification_table_9').html(response);     
        },
        error: function() {    
            console.log("Se ha producido algún error");    
        }
    });
}