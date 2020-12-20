function cambiarPass(){
    var fd = new FormData();
    //console.log(  $("#subirImagen")[0].files[0]);
    var email = $("#emailR").val();
    console.log(email);
    if(email==""){
        $("#fpass").append("<p class='ErrorMsgs'>Introduce un email </p><br>");
        return;
    }
    fd.append( 'email',  email);

    $.ajax({

        url: '../php/EnviarEmailCambiarPass.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(data){
            console.log(data);
            $('#cambiarPass').html("");
            $('#cambiarPass').html(data);


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
            $("#fResPass").remove();
            $("#datos").html(data);

        }


    });
}
