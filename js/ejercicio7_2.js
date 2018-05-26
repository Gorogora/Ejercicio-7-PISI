function ejercicio7_2(rollback){
    $.ajax({
        url: 'ejercicio7_2.php',
        type: "POST",        
        data: {rollback: rollback},
        success: function(response) {
            $('#error_table_7').html(response);     
        },
        error: function(error) {    
           // console.log("Se ha producido algún error");    
           $('#error_table_7').html(error); 
        }
    });
}