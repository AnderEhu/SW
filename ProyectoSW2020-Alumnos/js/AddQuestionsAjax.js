function addQuestion(){
    var fd = new FormData();
    console.log(  $("#subirImagen")[0].files[0]);
    fd.append( 'imagenPregunta', $("#subirImagen")[0].files[0]);
    fd.append( 'email', $("#email").val());
    fd.append( 'pregunta', $("#pregunta").val());
    fd.append( 'resCorrecta', $("#resCorrecta").val());
    fd.append( 'resIncorrecta1', $("#resIncorrecta1").val());
    fd.append( 'resIncorrecta2', $("#resIncorrecta2").val());
    fd.append( 'resIncorrecta3', $("#resIncorrecta3").val());
    fd.append( 'tema', $("#tema").val() );
    fd.append( 'complejidad',$("#complejidad").val() );





    $.ajax({

        url: '../php/AddQuestionWithImage.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(data){
            showQuestions();
        }


    });
}