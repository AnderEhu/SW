function calificar(){
    var fd = new FormData();
    //console.log(  $("#subirImagen")[0].files[0]);
    fd.append( 'res', $("#fJugar").serialize().split("=")[1]);

    $.ajax({

        url: '../php/Calificar.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(data){
            console.log(data);
            $("#ajugar").html("");
            $("#ajugar").append(data);
        }


    });
}