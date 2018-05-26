function ejercicio6(nombre_piloto, tiempo){
    $.ajax({
        url: 'ejercicio6.php',
        type: "POST",        
        data: {nombre_piloto: nombre_piloto, tiempo: tiempo},
        beforeSend: function () {
            $("#tiempo_tramo").html("Realizando la consulta, espere por favor...");
        },
        success: function(response) {
            $('#tiempo_tramo').html(response);     
        },
        error: function() {    
            console.log("Se ha producido algún error");    
        }
    });
}