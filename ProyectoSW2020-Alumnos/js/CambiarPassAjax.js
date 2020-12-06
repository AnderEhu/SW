function cambiarPass(){
    var fd = new FormData();
    //console.log(  $("#subirImagen")[0].files[0]);
    console.log( $("#emailR").val());
    fd.append( 'email',  $("#emailR").val());

    $.ajax({

        url: '../php/EnviarEmailCambiarPass.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(data){
            console.log(data);
        }


    });
}

function cambiarPassConfirmation(){
    var fd = new FormData();

    fd.append( 'emailR',  $("#emailR").val());
    fd.append( 'codigoR',  $("#codigoR").val());
    fd.append( 'passR',  $("#passR").val());
    fd.append( 'repPassR',  $("#repPassR").val());

    //TODO: Validar


    $.ajax({

        url: '../php/CambiarContrasenaConfirmation.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(data){
            console.log(data);
        }


    });
}
