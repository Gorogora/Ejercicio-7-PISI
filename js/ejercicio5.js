function ejercicio5(fecha, codRally){
    $.ajax({
        url: 'ejercicio5.php',
        type: "POST",        
        data: {fecha: fecha, codRally: codRally},
        success: function(response) {
            //$('#date').html(response);  
            //console.log(response);   
        },
        error: function() {    
            console.log("Se ha producido algún error");  
        }
    });
}