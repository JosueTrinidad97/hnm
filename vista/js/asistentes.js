$(document).ready(function () {


})

function editarAsistente(idAsistente, idEventos) {




    var idEvento = idEventos



    $('.tipoAsistente option').remove();



    var datos = new FormData()

    datos.append('idEventos', idEvento)
    datos.append('consultarCosto', true)

    $.ajax({

        url: "ajax/ajax.evento.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (res) {

            console.log(res)


            let option = $('<option />', {
                text: "Seleccione el tipo de asistente",
                value: ""
            });

            $('.tipoAsistente').prepend(option);

            res.forEach(element => {

                let option = $('<option />', {
                    text: element.TipoAsistente,
                    value: element.idCosto
                });

                costos[element.idCosto] = element.precio;

                $('.tipoAsistente').prepend(option);

                // console.log(element.idCosto + " \n")
            });

            console.log(costos)


        }



    })


    var data = new FormData();

    data.append('btnEditarAsistente', true);
    data.append('idAsistente', idAsistente);


    $.ajax({

        url: "ajax/ajax.asistente.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        beforeSend: function () {



        },


        success: function (res) {

            console.log(res);

            $("#Act_tema").val(res.idEventos);
            $("#Act_nombre").val(res.nombre);
            $("#Act_correo").val(res.correo);
            $("#Act_telefono").val(res.telefono);
            $("#Act_gradoEstudios").val(res.gradoEstudios);
            $("#Act_tipoAsistente").val(res.idCosto);
            $("#Act_total").val(res.precio);
            $("#Atc_idAsistente").val(idAsistente);




        }
    })


}


function eliminarAsistente(idAsistente) {



    swal({
        title: "Estas seguro de que quieres eliminar este asistente?",
        text: "Al confirmar ya no podras recuperar ",
        icon: "warning",
        buttons: ["No", "Si, eliminar"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var data = new FormData();

                data.append('btnEliminarAsistente', true);
                data.append('idAsistente', idAsistente);


                $.ajax({

                    url: "ajax/ajax.asistente.php",
                    method: "POST",
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",

                    beforeSend: function () {



                    },

                    success: function (res) {

                        if (res) {


                            swal({
                                title: "Bien hecho",
                                text: "Registro eliminado",
                                icon: "success",
                                buttons: [false, "Ok"],
                                dangerMode: true,
                            })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        window.location.href = './asistentes'
                                    } else {
                                        window.location.href = './asistentes'
                                    }
                                });




                        } else {
                            swal("Ohh no", "Asistente no eliminado", "error");


                        }



                    }
                })
            }
        });


}



$(".btnListaAgregarPresente").on("click", function () {
    var idAsistente = $(this).attr("idAsistente")


   

    var data = new FormData();
    data.append('btnListaAgregarPresente', true)
    data.append('idAsistente', idAsistente)

    $.ajax({

        url: "ajax/ajax.asistente.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        beforeSend: function () {

        },
        success: function (res) {

            if(res.status){

                alert(res.mensaje)
            }else{
                alert(res.mensaje)
            }

            window.location.href = "./Listas"
        }
    })

})


$(".btnEliminarListaAsistente").on("click", function () {
    var idAsistente = $(this).attr("idAsistente")

    var data = new FormData();
    data.append('btnEliminalAsistenteLista', true)
    data.append('idAsistente', idAsistente)

    $.ajax({

        url: "ajax/ajax.asistente.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",

        beforeSend: function () {

        },
        success: function (res) {

            if(res){

                window.location.href = './Listas';
            }else{


                alert("No se elimino")
            }
        }
    })

})





