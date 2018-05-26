function ejercicio10(codRally, nombre, pais, fecha){
    $.ajax({
        url: 'ejercicio10.php',
        type: "POST",        
        data: {codRally: codRally, nombre: nombre, pais: pais, fecha: fecha},
        beforeSend: function () {
           // $("#tiempo_tramo").html("Realizando la consulta, espere por favor...");
        },
        success: function(response) {
           $('#resultado_ej10').html(response);     
        },
        error: function() {    
            //console.log("Se ha producido algún error");    
        }
    });
}