function aJugar(){
    var fd = new FormData();
    //console.log(  $("#subirImagen")[0].files[0]);
    fd.append( 'opcionTema', $("#fJugar input[type='radio']:checked").val());
    console.log( $("#fJugar input[type='radio']:checked").val());

    $.ajax({

        url: '../php/AJugarTema.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(data){
            $("#ajugar").html(data);
        }


    });
}

function otraPregunta(){

    $.ajax({

        url: '../php/PreguntaAleatoria.php',
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(data){
            $("#ajugar").html("");
            $("#ajugar").html(data);
        }


    });
}

function resultados(){

    $.ajax({

        url: '../php/Resultados.php',
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(data){
            $("#ajugar").html("");
            $("#ajugar").html(data);
        }


    });
}

function anadirQuizzer(){
    var fd = new FormData();
    fd.append('nick',  $("#nick").val());


    $.ajax({

        url: '../php/AnadirARanking.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(data){
            $("#ajugar").html("");
            $("#ajugar").html(data);
        }


    });
}

function meGusta($id){
    var fd = new FormData();
    fd.append('id', $id);
    console.log($id);

    $.ajax({

        url: '../php/MeGustaPregunta.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(data){
            data = data + "<br><img src='../images/feliz.png' width='128px' height='85px'>";
            $(data).insertBefore("#likePreg");
            $("#likePreg").hide();
            $("#dislikePreg").hide();
        }


    });
}

function noMeGusta($id){
    var fd = new FormData();
    fd.append('id', $id);
    console.log($id);

    $.ajax({

        url: '../php/NoMeGustaPregunta.php',
        data: fd,
        processData: false,
        contentType: false,
        cache: false,
        type: 'POST',
        success: function(data){
            data = data + "<br><img src='../images/feliz.png' width='128px' height='85px'>";
            $(data).insertBefore("#likePreg");
            $("#likePreg").hide();
            $("#dislikePreg").hide();
        }


    });
}