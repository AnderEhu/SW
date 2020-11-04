$(document).ready(function (){

    $("#button").click(function (){

        var email = $("#email").val();
        if (email == ""){
            $("#tel").val("");
			$("#nombre").val("");
			$("#apellidos").val("");
            alert("Hay que introducir un correo");
        } 

        else {
            $.get('../xml/Users.xml', function(d){

                var listaCorreos = $(d).find('email');
                var listaNombres = $(d).find('nombre');
                var listaApellidos1 = $(d).find('apellido1');
                var listaApellidos2 = $(d).find('apellido2');
                var listaTelefonos = $(d).find('telefono');
                var encontrado = false;
                for (var i = 0; i < listaCorreos.length; i++){
                    if (email == listaCorreos[i].childNodes[0].nodeValue){
                        //alert("hola");
                        encontrado = true;
                        $("#tel").val(listaTelefonos[i].childNodes[0].nodeValue);
                        $("#nombre").val(listaNombres[i].childNodes[0].nodeValue);
                        $("#apellidos").val(listaApellidos1[i].childNodes[0].nodeValue+
                            " "+listaApellidos2[i].childNodes[0].nodeValue);

                        break;
                    }
                }

                if (encontrado == false) alert("Este email no está registrado");

            });
        }

    });   
  

});

