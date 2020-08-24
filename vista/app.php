<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0">
  <title>Admin | HNM </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $url ?>vista/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!--Seccion de java script-->
  <script src="<?php echo $url ?>vista/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo $url ?>vista/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo $url ?>vista/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?php echo $url ?>vista/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?php echo $url ?>vista/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?php echo $url ?>vista/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?php echo $url ?>vista/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo $url ?>vista/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?php echo $url ?>vista/plugins/moment/moment.min.js"></script>
  <script src="<?php echo $url ?>vista/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo $url ?>vista/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?php echo $url ?>vista/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo $url ?>vista/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo $url ?>vista/js/adminlte.js"></script>

  <script src="<?php echo $url ?>vista/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo $url ?>vista/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo $url ?>vista/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo $url ?>vista/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


</head>


<?php if (isset($_SESSION['session']) && $_SESSION['session']) : ?>

  <body class="hold-transition sidebar-mini layout-fixed ">

    <div class="wrapper">



      <!-- Navbar -->

      <!-- /.navbar -->
      <?php

      $app->cargarComponente('navbar');


      $app->cargarComponente('sidebar');
      ?>
      <!-- Main Sidebar Container -->


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper container">
        <!-- Content Header (Page header) -->

        <?php



        // var_dump($rutas);

        if (isset($_GET['ruta'])) {

          $rutas = array();


          $rutas = explode('/', $_GET['ruta']);

          /**
           * 1.- Pagina
           * 2.- Accion
           * 3.- Filtro
           * 
           */
          if (isset($rutas[0])) {
            if (
              $rutas[0] == 'usuario' ||
              $rutas[0] == 'evento' ||
              $rutas[0] == 'admin'  ||
              $rutas[0] == 'asistentes' ||
              $rutas[0] == 'ponentes' ||
              $rutas[0] == 'documentos-Reconocimiento' ||
              $rutas[0] == 'documentos-Constancia' ||
              $rutas[0] == 'usuario' ||
              $rutas[0] == 'Listas' ||
              $rutas[0] == 'envios' ||
              $rutas[0] == 'salir'

            ) {
              // Aqui cambiar esto por una funcion que cargue paginas

              $app->cargarPagina($rutas[0], $rutas);
            } else {
              $app->cargarPagina('404');
            }
          }
        }




        ?>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php
      //  $app -> cargarComponente('footer');
      ?>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
  </body>

<?php else : ?>

  <body>

    <?php

    $app->cargarPagina('principal');

    ?>


  </body>
<?php endif; ?>




<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $url ?>vista/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $url ?>vista/js/demo.js"></script>

<script src="<?php echo $url ?>vista/js/eventos.js"></script>
<script src="<?php echo $url ?>vista/js/ponentes.js"></script>
<script src="<?php echo $url ?>vista/js/asistentes.js"></script>
<script src="<?php echo $url ?>vista/js/documentos.js"></script>








<script>
  $(".btnCambiarPass").on("click", function() {
    var email = $(this).attr('email')
    $("#emailUsuario").val(email)
  })
</script>
<script>
  $(".bt_plusR").each(function(el) {
    $(this).bind("click", addFieldRegistrarEvento);

  });

  function addFieldRegistrarEvento() {
    var clickID = parseInt($(this).parent('div').attr('id').replace('personasR_', ''));

    // Genero el nuevo numero id
    var newID = (clickID + 1);

    // Creo un clon del elemento div que contiene los campos de texto
    $newClone = $('#personasR_' + clickID).clone(true);

    //Le asigno el nuevo numero id
    $newClone.attr("id", 'personasR_' + newID);

    //Asigno nuevo id al primer campo input dentro del div y le borro cualquier valor que tenga asi no copia lo ultimo que hayas escrito.(igual que antes no es necesario tener un id)
    $newClone.children("input").eq(0).attr("id", 'usuarioR' + newID).val('');

    //Borro el valor del segundo campo input(este caso es el campo de cantidad)
    $newClone.children("input").eq(1).attr("id", 'costoR' + newID).val('');

    //Asigno nuevo id al boton
    $newClone.children("input").eq(2).attr("id", "r" + newID)

    //Inserto el div clonado y modificado despues del div original
    $newClone.insertAfter($('#personasR_' + clickID));

    //Cambio el signo "+" por el signo "-" y le quito el evento addfield
    $("#" + "r" + clickID).val('-').unbind("click", addFieldRegistrarEvento);

    //Ahora le asigno el evento delRow para que borre la fial en caso de hacer click
    $("#" + "r" + clickID).bind("click", delRowRegistrar);

  }
  $(".tablas").DataTable({

    
"ordering": true,

"language": {

    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

}

});
                        
                        
 
</script>
</body>

</html>