<?php

class EventoControlador
{





    public static function ctrAgregarEvento()
    {

        if (isset($_POST['btnAgregarEvento'])) {        // $idCosto = EventoControlador::crearIdCosto();
            $_POST['idEventos'] = EventoControlador::crearIdEvento();






            // 

            $bandera = true;
            $imagenes = "";

            ///EventoControlador::guardarImagen($bandera, $imagenes, $_POST['idEvento'], $_POST['tema']);

            /*foreach ($_FILES["imagenes"]['tmp_name'] as $key => $tmp_name) {
                if ($_FILES["imagenes"]["name"][$key]) {
                    $nombreImagen = $_FILES["imagenes"]["name"][$key];
                    if ($_FILES["imagenes"]["type"][$key] == "image/png" || $_FILES["imagenes"]["type"][$key] == "image/jpg" || $_FILES["imagenes"]["type"][$key] == "image/jpeg") {
                        $nombreImagen = $_FILES["imagenes"]["name"][$key]; //Obtenemos el nombre original del archivo
                        $url_tmp = $_FILES["imagenes"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
                        // $typeImagen = $_FILES["imagenes"]["type"][$key];
                        //$directorio = 'C:/xampp/htdocs/Hospital/eventosHNM/imagenes';
                        $directorio = $_SERVER['DOCUMENT_ROOT'] . '/EventosHNM3/recursos/imagenes/' . $_POST['idEvento'] . '-' . $_POST['tema']; //Declaramos un  variable con la ruta donde guardaremos los archivos
                        //$directorio = 'C:/Apache24/htdocs/EventosHNM3/recursos/imagenes/'.$$_POST['idEvento'].'-'.$tema;
                        //Validamos si la ruta de destino existe, en caso de no existir la creamos
                        if (!file_exists($directorio)) {
                            mkdir($directorio, 0755, true) or die("No se puede crear el directorio");
                        }
    
    
                        $dir = opendir($directorio); //Abrimos el directorio de destino
                        $nombreImagen = $_POST['idEvento'] . md5(microtime(true)) . ".png"; //se crea nombre aleatorio con extencion .png
                        $target_path = $directorio . '/' . $nombreImagen; //Indicamos la ruta de destino, así como el nombre del archivo
    
    
                        //Movemos y validamos que el archivo se haya cargado correctamente
                        //El primer campo es el origen y el segundo el destino
                        if (move_uploaded_file($url_tmp, $target_path)) {
                            // echo "El archivo $nombreImagen se ha almacenado en forma exitosa.<br>";
                            $bandera = true;
                            $imagenes .= $nombreImagen . "||";
                        } else {
                            // echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
                            $bandera = false;
                            // por si no se carga una imagen
                        }
                        closedir($dir); //Cerramos el directorio de destino
                    } else {
                        // echo $nombreImagen.":Imagen no compatible, ingrese: .png  .jpg o .jpeg ";
                        $imagenes .= "No diponible.png||";
                        $bandera = true;
                    }
                }


            }*/



            if ($bandera) {

                $_POST['fecha'] = $_POST['fecha'].' '.$_POST['hora'];

                date_default_timezone_set('America/Mexico_city');

                $fecha = date('Y-m-d');
    
    
                $hora = date('H:i:s');
    
                $fechaActual = $fecha . ' ' . $hora;

                $_POST['fechaCreacion']=$fechaActual;




                $guardarEvento = EventoModelo::mdlAgreagarEvento($_POST);

                if ($guardarEvento) {
                    // Mensaje exitoso



                    for ($i = 0; $i < sizeof($_POST['tipoPersonaR']); $i++) {
                        $idCosto  = CostoControlador::CrearIdCosto();
                        $item = array(
                            'idCosto' => $idCosto,
                            'idEventos' => $_POST['idEventos'],
                            'tipoAsistente' => $_POST['tipoPersonaR'][$i],
                            'precio' => $_POST['costoR'][$i]

                        );


                        $guardarCosto  = CostoModelo::mdlAgregarCosto($item);

                        if ($guardarCosto) {
                            AppControlador::mensajeInfo('Bien', '', 'success', '');
                        } else {
                            var_dump($guardarCosto);
                        }
                    }
                } else {
                    // Mensaje Eroor
                    AppControlador::mensajeInfo('Mal', '', '', '');
                    die();
                }
            }
        }
    }



    // Guardar Imagen
    public  static function  guardarImagen(&$bandera, &$imagenes, $idEvento, $tema)
    {
        // if($_FILES!=null){
        foreach ($_FILES["imagenes"]['tmp_name'] as $key => $tmp_name) {
            if ($_FILES["imagenes"]["name"][$key]) {
                $nombreImagen = $_FILES["imagenes"]["name"][$key];
                if ($_FILES["imagenes"]["type"][$key] == "image/png" || $_FILES["imagenes"]["type"][$key] == "image/jpg" || $_FILES["imagenes"]["type"][$key] == "image/jpeg") {
                    $nombreImagen = $_FILES["imagenes"]["name"][$key]; //Obtenemos el nombre original del archivo
                    $url_tmp = $_FILES["imagenes"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
                    // $typeImagen = $_FILES["imagenes"]["type"][$key];
                    //$directorio = 'C:/xampp/htdocs/Hospital/eventosHNM/imagenes';
                    $directorio = $_SERVER['DOCUMENT_ROOT'] . '/EventosHNM3/recursos/imagenes/' . $idEvento . '-' . $tema; //Declaramos un  variable con la ruta donde guardaremos los archivos
                    //$directorio = 'C:/Apache24/htdocs/EventosHNM3/recursos/imagenes/'.$idEvento.'-'.$tema;
                    //Validamos si la ruta de destino existe, en caso de no existir la creamos
                    if (!file_exists($directorio)) {
                        mkdir($directorio, 0755, true) or die("No se puede crear el directorio");
                    }


                    $dir = opendir($directorio); //Abrimos el directorio de destino
                    $nombreImagen = $idEvento . md5(microtime(true)) . ".png"; //se crea nombre aleatorio con extencion .png
                    $target_path = $directorio . '/' . $nombreImagen; //Indicamos la ruta de destino, así como el nombre del archivo


                    //Movemos y validamos que el archivo se haya cargado correctamente
                    //El primer campo es el origen y el segundo el destino
                    if (move_uploaded_file($url_tmp, $target_path)) {
                        // echo "El archivo $nombreImagen se ha almacenado en forma exitosa.<br>";
                        $bandera = true;
                        $imagenes .= $nombreImagen . "||";
                    } else {
                        // echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
                        $bandera = false;
                        // por si no se carga una imagen
                    }
                    closedir($dir); //Cerramos el directorio de destino
                } else {
                    // echo $nombreImagen.":Imagen no compatible, ingrese: .png  .jpg o .jpeg ";
                    $imagenes .= "No diponible.png||";
                    $bandera = true;
                }
            }
        }
        // }else {
        //   $imagenes.="predefinida.png";
        //   $bandera=true;
        // }
    }



    // Crear las funciones que se encargan de crear los ID

    public static  function crearIdCronograma()
    {
        $rowCount = EventoModelo::mdlConsultarCronogramas();

        $rowCount = count($rowCount);

        if ($rowCount === false) {
            $id = "CRON-1";
        } else {
            $num = $rowCount;
            $num += 1;
            if ($num < 10) {
                $id = "CRON-0000" . $num;
            } else if ($num < 100) {
                $id = "CRON-000" . $num;
            } else if ($num < 1000) {
                $id = "CRON-00" . $num;
            } else if ($num < 10000) {
                $id = "CRON-0" . $num;
            } else {
                $id = "CRON-" . $num;
            }
        }

        return $id;
    }

    public static function crearIdEvento()
    {

        $rowCount = EventoModelo::mdlGenerarIdEvento();



        var_dump($rowCount);

        $rowCount =  count($rowCount);
        if ($rowCount === false) {
            $id = "EVT-1";
        } else {
            $num = $rowCount;
            $num += 1;
            if ($num < 10) {
                $id = "EVT-0000" . $num;
            } else if ($num < 100) {
                $id = "EVT-000" . $num;
            } else if ($num < 1000) {
                $id = "EVT-00" . $num;
            } else if ($num < 10000) {
                $id = "EVT-0" . $num;
            } else {
                $id = "EVT-" . $num; //yaaaaaa
            }
        }
        return $id;
    }

    public static function crearIdLista()
    {

        $rowCount = EventoModelo::mdlConsultarListas();

        $rowCount = count($rowCount);
        if ($rowCount === false) {
            $id = "LISA-1";
        } else {
            $num = $rowCount;
            $num += 1;
            if ($num < 10) {
                $id = "LISA-0000" . $num;
            } else if ($num < 100) {
                $id = "LISA-000" . $num;
            } else if ($num < 1000) {
                $id = "LISA-00" . $num;
            } else if ($num < 10000) {
                $id = "LISA-0" . $num; //yaaaaaaaaaaaaaaaaaaa
            } else {
                $id = "LISA-" . $num;
            }
        }
    }

    public static function crearIdCosto()
    {

        $rowCount = EventoModelo::mdlConsultarCosto();

        $rowCount = count($rowCount);

        if ($rowCount === false) {
            $id = "COS-1";
        } else {
            $num = $rowCount;
            $num += 1;
            if ($num < 10) {
                $id = "COS-0000" . $num;
            } else if ($num < 100) {
                $id = "COS-000" . $num;
            } else if ($num < 1000) {
                $id = "COS-00" . $num;
            } else if ($num < 10000) {
                $id = "COS-0" . $num;
            } else {
                $id = "COS-" . $num;
            }
        }
    }

    public static function ctrEliminarEvento($accion, $idEvento, $url)
    {
        if ($accion == 'delete') {
            $eliminarEvento = EventoModelo::mdlEliminarEvento($idEvento);

           

            if ($eliminarEvento) {
                AsistenteModelo::mdlEliminarAsistenteEvento($idEvento);
                AppControlador::mensajeInfo('Bien hecho', 'Haz eliminado con exito el evento', 'success', $url . 'evento');
            }else{
                return;
            }
        }
    }

    public function seleccionEvento()
    {
        if (isset($_POST['btnSeleccionaEvento'])) {
            $_SESSION['selected_event'] = $_POST['idEventos'];
            echo '

                <script>
                    window.location.href="./asistentes"
                </script>

            ';

            //  header('Location:./asistentes');
        }
    }
}
