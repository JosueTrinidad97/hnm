$(".btnEliminarEvento").on("click", function () {

  var url = $(this).attr('urlApp');
  var idEvento = $(this).attr('idEvento')

  url = url + 'evento/delete/' + idEvento;
  //alert(url)  
  swal({
    title: "¿Estas seguro de eliminar el evento?",
    text: "se eliminara todo el contenido relacionado con el evento fechas y todo referente ",
    icon: "info",
    buttons: ["No", "Si, eliminar evento"],
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {

        window.location = url;

      }
    });
})

$(".btnEditarEvento").on("click", function () {
  var idEvento = $(this).attr("idEvento")

  var datos = new FormData()

  datos.append("idEventos", idEvento)
  datos.append("consultarEvento", true)


  $.ajax({

    url: "ajax/ajax.evento.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (res) {

      $("#updatetema").val(res.tema)
      $("#updatedescripcion").val(res.descripcion)
      $("#updatefecha").val(res.fecha)
      $("#updatehora").val(res.hora)
      $("#updatecapacidad").val(res.capacidad)
      //$("#updateusuarioR1").val(res.)
      //$("#updatecostoR1").val(res.)
      $("#updateubicacion").val(res.ubicacion)
      //$("#updatearchivo2[]").val(res.imagen)

      $(".previsualizar-img").attr("src",res.imagen)



      console.log(res)

      var datosCosto = new FormData()

      datosCosto.append('idEventos', idEvento)
      datosCosto.append('consultarCosto', true)

      $.ajax({

        url: "ajax/ajax.evento.php",
        method: "POST",
        data: datosCosto,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (costos) {
          console.log(costos)

          var contenido = "";
          var cont = 1;
          costos.forEach(element => {
            contenido += `
            
            <div id="UpdatepersonasR_${cont}">
						<label>Usuario:</label>
						<input type="text" class="w3-input w3-border form-control" name="tipoPersonaR[]" id="updateusuarioR${cont}" value ="${element.TipoAsistente}" /><label> Costo:</label>
						<input type="text" class="w3-input w3-border form-control" name="costoR[]" id="updatecostoR${cont}" value ="${element.precio}" /><br>
						<input class="Ubt_plusR" id="rc${cont}" type="button" value="+">
						<br><br>
						</div>
            `;
            cont ++;
          });

          $(".contenedor_costo").html(contenido)

        }
      });




    }

  })


})
  


//


$("#myEvento").on("change", function () {

  pintarTablaEventos($(this).val());
})



$("#myCorreo").on("keyup", function () {

  var correo = $(this).val()

  if ($(this).val() == "") {


    $("#myEvento").val("")

    // $("#myEvento option[value="+ correo +"]").attr("selected",true);
    // $("#myEvento option[value="+ correo +"]").attr("selected",true);
    //$("#myEvento option:contains(Todos los eventos)").attr('selected',true)

  }

  pintarTablaEventos("", correo);



})


function pintarTablaEventos(idEvento, correo = "") {


  var datos = new FormData();

  datos.append('pintarTabla', true);
  datos.append('idEventos', idEvento);
  datos.append('correo', correo)


  $.ajax({

    url: "ajax/ajax.evento.php",
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
          <th scope="col">Id Asistente</th>
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
        ${element.idAsistente}
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
            <a class="btn btn-warning" target="_blank" href="./lib/reportes/pagos/ficha_pago.php?idAsistente=${element.idAsistente}"><i class="fas fa-file-pdf"></i></a>
            <button  type="button" class="btn btn-info " onclick="editarAsistente('${element.idAsistente}','${element.idEventos}')" data-toggle="modal" data-target="#ActializarAsistente" > <i class="nav-icon far fa-edit"></i> </button>
            <button type="button" class="btn btn-danger " onclick="eliminarAsistente('${element.idAsistente}')"> <i class="nav-icon fas fa-trash-alt"></i> </button>
          </div>
        </td>
        
        `

        encabezado += `</tr>`;


      });

      encabezado += `</tbody>
     </table>`;


      $(".pintarEventos").html(encabezado);



      console.log(res);

    }

  })
}