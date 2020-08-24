<?php

class AsistenteControlador
{



    public static function ctrGurdarAsistente($permiso=false)
    {

        if (isset($_POST['btnGuardarAsistente'])) {

            if ($_POST['idCosto'] == "") {
                AppControlador::mensajeInfo('Mal', 'Selecciona el tipo de asistente', 'error', './');

                return;
            }


            $detalleEvento = EventoModelo::mdlConsultarEvento($_POST['idEventos']);// cuando la hora del evento expire no permita registrarse con settalert

            
           

            date_default_timezone_set('America/Mexico_city');

			$fecha = date('Y-m-d');


			$hora = date('H:i:s');

            $fechaActual = $fecha . ' ' . $hora;

            if($detalleEvento['fecha'] < $fechaActual & $permiso == false){

                AppControlador::mensajeInfo('Mal', 'La fecha de este evento ya esta vencida', 'error', './');

                return false;
           
            }

            



            $_POST['idAsistente'] = AsistenteControlador::crearIdAsistente();


            $asistente = AsistenteModelo::GuardarAsistente($_POST);





            if ($asistente) {
                //AppControlador::mensajeInfo('Bien', 'Estas Inscrito', 'success', './');

                $url = AppControlador::cargarRutaAdmin();
                $url = $url . 'lib/reportes/pagos/ficha_pago.php?idAsistente=' . $_POST['idAsistente'];

                echo '

                <script>
                window.open("' . $url . '", "_blank");
                </script>';
            } else {
                AppControlador::mensajeInfo('Mal', 'Algo salio mal :(', 'error', './');
            }
        }
    }

    public static function ctrModificarAsistente()
    {
        if (isset($_POST['btnModificarAsistente'])) {


            //$_POST['idAsistente'] = AsistenteControlador::crearIdAsistente();



            if ($_POST['idCosto'] == "") {
                AppControlador::mensajeInfo('Mal', 'Selecciona el tipo de asistente', 'error', './');

                return;
            }

            $asistente = AsistenteModelo::mdlActualizarAsistente($_POST);






            if ($asistente) {
                //AppControlador::mensajeInfo('Bien', 'Estas Inscrito', 'success', './');

                $url = AppControlador::cargarRutaAdmin();
                $url = $url . 'lib/reportes/pagos/ficha_pago.php?idAsistente=' . $_POST['idAsistente'];

                echo '

                <script>
                    window.open("' . $url . '", "_blank");
                </script>';
            } else {
                AppControlador::mensajeInfo('Mal', 'Algo salio mal :(', 'error', './');
            }
        }
    }



    public static function crearIdAsistente()
    {

        $rowCount = AsistenteModelo::mdlGenerarIdAsistentes();





        $rowCount =  count($rowCount);
        if ($rowCount === false) {
            $id = "ASIS-1";
        } else {
            $num = $rowCount;
            $num += 1;
            if ($num < 10) {
                $id = "ASIS-0000" . $num;
            } else if ($num < 100) {
                $id = "ASIS-000" . $num;
            } else if ($num < 1000) {
                $id = "ASIS-00" . $num;
            } else if ($num < 10000) {
                $id = "ASIS-0" . $num;
            } else {
                $id = "ASIS-" . $num; //yaaaaaa
            }
        }
        return $id;
    }


    public static function crearPresentes()
    {

        $rowCount = AsistenteModelo::mdlListarAsistentesActivos();

        $rowCount =  count($rowCount);
        if ($rowCount === false) {
            $id = "ASISTENCIA-1";
        } else {
            $num = $rowCount;
            $num += 1;
            if ($num < 10) {
                $id = "ASISTENCIA-0000" . $num;
            } else if ($num < 100) {
                $id = "ASISTENCIA-000" . $num;
            } else if ($num < 1000) {
                $id = "ASISTENCIA-00" . $num;
            } else if ($num < 10000) {
                $id = "ASISTENCIA-0" . $num;
            } else {
                $id = "ASISTENCIA-" . $num; //yaaaaaa
            }
        }
        return $id;
    }


    public function ctrAgregarListaPresentes()
    {
        if (isset($_POST['btnListaAgregarPresente'])) {
            if ($_POST['idAsistente'] == "") {
                // Valida que el campo no este vacio

                AppControlador::mensajeInfo('Mal', ' El campo ID no debe ir vacio 😵', 'error', './Listas');

                return;
            }

            $idAsistente = AsistenteModelo::mdlObtenerAsistentesId($_POST['idAsistente']);

            if (!$idAsistente) {
                // Valida que el asistente exista o este registrado previamente

                AppControlador::mensajeInfo('Mal', 'El ID del asistente no existe 😖', 'error', './Listas');

                return;
            }

            $isExit = AsistenteModelo::mdlListarAsistentePorID($_POST['idAsistente']);

            if ($isExit != null) {
                AppControlador::mensajeInfo('Mal', 'El ID de este asistente ya esta registrado 😠', 'error', './Listas');
                return;
            }

            //$_POST['idListaAsistencia'] = AsistenteControlador::crearPresentes();

            // CREA LA FECHA ACTUAL

            $zona_horaria = 'America/Mexico_City';

            date_default_timezone_set($zona_horaria);

            $fecha = date('Y-m-d');
            $hora = date('H:i:s');

            $_POST['fecha'] = $fecha . ' ' . $hora;

            $agregarPresentes = AsistenteModelo::mdlAgregarAsistentes($_POST);

            if ($agregarPresentes) {
                // Mandar mensaje de registro exitoso
                echo "Registro exitoso";
            } else {
                // Error 
                echo "Error";
            }
        }
    }

    public static function ctrAgregarListaPresentes2()
    {
        if (isset($_POST['btnListaAgregarPresente'])) {
            if ($_POST['idAsistente'] == "") {
                // Valida que el campo no este vacio

                return array('status' => false, 'mensaje' => 'El campo ID no debe ir vacio 😵');
            }

            $idAsistente = AsistenteModelo::mdlObtenerAsistentesId($_POST['idAsistente']);

            if (!$idAsistente) {
                // Valida que el asistente exista o este registrado previamente



                return array('status' => false, 'mensaje' => 'El ID del asistente no existe 😖');
            }

            $isExit = AsistenteModelo::mdlListarAsistentePorID($_POST['idAsistente']);

            if ($isExit != null) {

                return array('status' => false, 'mensaje' => 'El ID de este asistente ya esta registrado 😠');
            }

            //$_POST['idListaAsistencia'] = AsistenteControlador::crearPresentes();

            // CREA LA FECHA ACTUAL

            $zona_horaria = 'America/Mexico_City';

            date_default_timezone_set($zona_horaria);

            $fecha = date('Y-m-d');
            $hora = date('H:i:s');

            $_POST['fecha'] = $fecha . ' ' . $hora;

            $agregarPresentes = AsistenteModelo::mdlAgregarAsistentes($_POST);

            if ($agregarPresentes) {
                // Mandar mensaje de registro exitoso

                return array('status' => true, 'mensaje' => 'Registro exitoso');
            } else {
                // Error 
                return array('status' => true, 'mensaje' => 'Error');
            }
        }
    }
}
