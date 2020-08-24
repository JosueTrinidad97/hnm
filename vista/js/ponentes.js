$(document).ready(function () {
  pintarTablaPonentes("");
})

$("#myPonente").on("change", function () {

  pintarTablaPonentes($(this).val());
})



$("#myCorreo").on("keyup", function () {

  var correo = $(this).val()

  if ($(this).val() == "") {


    $("#myPonente").val("")

    // $("#myEvento option[value="+ correo +"]").attr("selected",true);
    // $("#myEvento option[value="+ correo +"]").attr("selected",true);
    //$("#myEvento option:contains(Todos los eventos)").attr('selected',true)

  }

  pintarTablaPonentes("", correo);



})


function pintarTablaPonentes(idEvento, correo = "") {







  var datos = new FormData();

  datos.append('pintarTabla', true);
  datos.append('idEventos', idEvento);
  datos.append('correo', correo)


  $.ajax({

    url: "ajax/ajax.ponente.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (res) {



      var encabezado = `<table class="table table-bordered table-striped dataTable dtr-inline tablas ">
        <thead>
          <tr>
            <th scope="col">Id Ponente</th>
            <th scope="col">Nombre</th>
            <th scope="col">Grado de estudio</th>
            <th scope="col">Correo</th>
            <th scope="col">Gestión</th>
          </tr>
        </thead>
        <tbody>`;

      // 

      res.forEach(element => {
        encabezado += `<tr>`;

        encabezado += `
          <td>
          ${element.idPonente}
          </td>
          <td>
          ${element.nombre}
          </td>
          <td>
          ${element.gradoEstudios}
          </td>
          <td>
          ${element.correo}
          </td>
          <td>
          <div class="btn-group">
            <a class="btn btn-warning" href="http://localhost/HNM%20avance5/lib/reportes/pagos/reconocimiento.php?idPonente=${element.idPonente}" target="_blank"><i class="fas fa-file-pdf"></i></a>
            <button type="button" class="btn btn-info "  onclick="editarPonente('${element.idPonente}')"> <i class="nav-icon far fa-edit"></i> </button>
            <button type="button" class="btn btn-danger " onclick="eliminarPonente('${element.idPonente}')" > <i class="nav-icon fas fa-trash-alt"></i> </button>
            <button type="button" class="btn btn-success " onclick="enviarCorreo('${element.correo}','${element.nombre}','${element.idPonente}')" > <i class="nav-icon fas fa-mail-bulk"></i> </button>
            </div>
          </td>
          
          `

        encabezado += `</tr>`;


      });

      encabezado += `</tbody>
       </table>`;


      $(".pintarPonentes").html(encabezado);



      console.log(res);

    }

  })
}


function eliminarPonente(idPonente) {

  swal({
    title: "Estas seguro de que quieres eliminar este ponente?",
    text: "Al confirmar ya no podras recuperar ",
    icon: "warning",
    buttons: ["No", "Si, eliminar"],
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {
        var data = new FormData();

        data.append('btnEliminarPonente', true);
        data.append('idPonente', idPonente);


        $.ajax({

          url: "ajax/ajax.ponente.php",
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
                    window.location.href = './ponentes'
                  } else {
                    window.location.href = './ponentes'
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

function enviarCorreo(ponenteCorreo, ponenteNombre, ponenteId) {




  var data = new FormData();

  data.append("ponenteCorreo", ponenteCorreo)
  data.append("ponenteNombre", ponenteNombre)
  data.append("ponenteId", ponenteId)

  data.append("btnEnviarCorreo", true)


  $.ajax({

    url: "ajax/ajax.ponente.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (res) {
      if(res){
        swal("Bien ", "Corre enviado a "+ponenteCorreo, "success");
      }
    }
  })

}


$('.btnEviarCorreosPonentes').on("click", function () {

  var data = new FormData();

  data.append("btnEviarCorreosPonentes", true)

  $.ajax({

    url: "ajax/ajax.ponente.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (res) {
      console.log(res)
    }
  })
})

function editarPonente(idPonente) {

  // $("").modal("show")
  $('#ACT_Ponente').modal('show')
  var data = new FormData();

  data.append('btnEditarPonente', true);
  data.append('idPonente', idPonente);


  $.ajax({

    url: "ajax/ajax.ponente.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    beforeSend: function () {



    },

    success: function (res) {
      console.log(res)

      $("#Act_IdPonente").val(res.idPonente)
      $("#Act_Evento").val(res.idEventos);
      $("#Act_nombre").val(res.nombre)
      $("#Act_Correo").val(res.correo)
      $("#Act_Telefono").val(res.telefono)
      $("#Act_GradoEstudios").val(res.gradoEstudios)
      $("#Act_tema").val(res.tema)
      $("#Act_descripcion").val(res.descripcion)
      $("#Act_HoraInicio").val(res.horaInicio)
      $("#Act_HoraFin").val(res.horaFin)
    }
  })



}