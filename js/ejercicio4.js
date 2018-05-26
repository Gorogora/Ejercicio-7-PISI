function ejercicio4(nombre_piloto){
    $.ajax({
        url: 'ejercicio4.php',
        type: "POST",        
        data: {nombre_piloto: nombre_piloto},
        success: function(response) {
            $('#puntos').html(response);     
        },
        error: function() {    
            console.log("Se ha producido algún error");     
        }
    });
}
