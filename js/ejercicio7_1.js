function ejercicio7_1(commit){
    $.ajax({
        url: 'ejercicio7_1.php',
        type: "POST",        
        data: {commit: commit},
        success: function(response) {
            $('#content_rally_table').html(response);     
        },
        error: function(error) {    
           // console.log("Se ha producido algún error");    
           $('#error_table_7').html(error); 
        }
    });
}