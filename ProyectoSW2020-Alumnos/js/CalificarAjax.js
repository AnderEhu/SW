function calificar(){
    var fd = new FormData();
    //console.log(  $("#subirImagen")[0].files[0]);
    fd.append( 'res', $("#fJugar input[type='radio']:checked").val());
    console.log($("#fJugar input[type='radio']:checked").val());
    $.ajax({

        url: '../php/Calificar.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(data){
            console.log("<br>"+data);
            //$("#ajugar").html("");
            //$("#ajugar").append(data);
            $("#abandonar").remove();
            $("#otraPreg").remove();
            $("#calificarPreg").remove();
            $(data).insertAfter("#imgQuiz");
        }


    });
}