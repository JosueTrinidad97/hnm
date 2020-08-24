<?php
class DocumentoControlador
{


    public function ctrEditarDocumento()
    {
        if (isset($_POST['btnActualizarDocumento'])) {

            echo "<pre>", print_r($_FILES), "</pre>";

            if ($_FILES['firma-img-1']['name'] != "") {

                list($ancho, $alto) = getimagesize($_FILES['firma-img-1']['tmp_name']);

                $nuevoAncho = 500;
                $nuevoAlto = 500;

                $directorio = "vista/img/firmas_constancia/";

                mkdir($directorio, 0777, true);


                if ($_FILES["firma-img-1"]["type"] == "image/jpeg") {

                    $rutaFirma1 = "vista/img/firmas_constancia/firma1.jpg";

                    $origen = imagecreatefromjpeg($_FILES['firma-img-1']['tmp_name']);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $rutaFirma1);
                } elseif ($_FILES['firma-img-1']['type'] == "image/png") {

                    $rutaFirma1 = "vista/img/firmas_constancia/firma1.png";

                    $origen = imagecreatefrompng($_FILES['firma-img-1']['tmp_name']);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagefill($destino, 0, 0, imagecolorallocate($destino, 255, 255, 255));


                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $rutaFirma1);
                } else {
                    echo "Imagen no admitida";
                }
            }

            if ($_FILES['firma-img-2']['name'] != "") {

                list($ancho, $alto) = getimagesize($_FILES['firma-img-2']['tmp_name']);

                $nuevoAncho = 500;
                $nuevoAlto = 500;

                $directorio = "vista/img/firmas_constancia/";

                mkdir($directorio, 0777, true);


                if ($_FILES['firma-img-2']['type'] == "image/jpeg") {

                    $rutaFirma2 = "vista/img/firmas_constancia/firma2.jpg";

                    $origen = imagecreatefromjpeg($_FILES['firma-img-2']['tmp_name']);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $rutaFirma2);
                } elseif ($_FILES['firma-img-2']['type'] == "image/png") {

                    $rutaFirma2 = "vista/img/firmas_constancia/firma2.png";

                    $origen = imagecreatefrompng($_FILES['firma-img-2']['tmp_name']);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagefill($destino, 0, 0, imagecolorallocate($destino, 255, 255, 255));


                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $rutaFirma2);
                } else {
                }
            }

            if ($_FILES['firma-img-3']['name'] != "") {

                list($ancho, $alto) = getimagesize($_FILES['firma-img-3']['tmp_name']);

                $nuevoAncho = 500;
                $nuevoAlto = 500;

                $directorio = "vista/img/firmas_constancia/";

                mkdir($directorio, 0777, true);


                if ($_FILES['firma-img-3']['type'] == "image/jpeg") {

                    $rutaFirma3 = "vista/img/firmas_constancia/firma3.jpg";

                    $origen = imagecreatefromjpeg($_FILES['firma-img-3']['tmp_name']);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $rutaFirma3);
                } elseif ($_FILES['firma-img-3']['type'] == "image/png") {

                    $rutaFirma3 = "vista/img/firmas_constancia/firma3.png";

                    $origen = imagecreatefrompng($_FILES['firma-img-3']['tmp_name']);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagefill($destino, 0, 0, imagecolorallocate($destino, 255, 255, 255));


                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $rutaFirma3);
                } else {
                }
            }


            $rutaFirma1 = isset($rutaFirma1) ? $rutaFirma1 : "";
            $rutaFirma2 = isset($rutaFirma2) ? $rutaFirma2 : "";
            $rutaFirma3 = isset($rutaFirma3) ? $rutaFirma3 : "";


            $firmas = array(
                "firma1" => $rutaFirma1,
                "nombref1" => $_POST['nombref1'],
                "puestof1" => $_POST['puestof1'],
                "institucionf1" => $_POST['institucionf1'],
                "firma2" => $rutaFirma2,
                "nombref2" => $_POST['nombref2'],
                "puestof2" => $_POST['puestof2'],
                "institucionf2" => $_POST['institucionf2'],
                "firma3" => $rutaFirma3,
                "nombref3" => $_POST['nombref3'],
                "puestof3" => $_POST['puestof3'],
                "institucionf3" => $_POST['institucionf3'],

            );

            $_POST['firmas'] = json_encode($firmas, true);





            $EditarDocumento = DocumentoModelo::mdlModificarDocumento($_POST);

            if ($EditarDocumento) {

                AppControlador::mensajeInfo('Bien', '', 'success', './documentos-Constancia');
                # code...
            } else {
                AppControlador::mensajeInfo('mal', '', 'error', './documentos-Constancia');
            }
            # code...
        }
    }

    public function ctrEditarDocumento2()
    {
        if (isset($_POST['btnActualizarDocumento'])) {

            echo "<pre>", print_r($_FILES), "</pre>";

            if ($_FILES['firma-img-1']['name'] != "") {

                list($ancho, $alto) = getimagesize($_FILES['firma-img-1']['tmp_name']);

                $nuevoAncho = 500;
                $nuevoAlto = 500;

                $directorio = "vista/img/firmas_reconocimiento/";

                mkdir($directorio, 0777, true);


                if ($_FILES["firma-img-1"]["type"] == "image/jpeg") {

                    $rutaFirma1 = "vista/img/firmas_reconocimiento/firma1.jpg";

                    $origen = imagecreatefromjpeg($_FILES['firma-img-1']['tmp_name']);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $rutaFirma1);
                } elseif ($_FILES['firma-img-1']['type'] == "image/png") {

                    $rutaFirma1 = "vista/img/firmas_reconocimiento/firma1.png";

                    $origen = imagecreatefrompng($_FILES['firma-img-1']['tmp_name']);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagefill($destino, 0, 0, imagecolorallocate($destino, 255, 255, 255));


                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $rutaFirma1);
                } else {
                    echo "Imagen no admitida";
                }
            }

            if ($_FILES['firma-img-2']['name'] != "") {

                list($ancho, $alto) = getimagesize($_FILES['firma-img-2']['tmp_name']);

                $nuevoAncho = 500;
                $nuevoAlto = 500;

                $directorio = "vista/img/firmas_reconocimiento/";

                mkdir($directorio, 0777, true);


                if ($_FILES['firma-img-2']['type'] == "image/jpeg") {

                    $rutaFirma2 = "vista/img/firmas_reconocimiento/firma2.jpg";

                    $origen = imagecreatefromjpeg($_FILES['firma-img-2']['tmp_name']);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $rutaFirma2);
                } elseif ($_FILES['firma-img-2']['type'] == "image/png") {

                    $rutaFirma2 = "vista/img/firmas_reconocimiento/firma2.png";

                    $origen = imagecreatefrompng($_FILES['firma-img-2']['tmp_name']);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagefill($destino, 0, 0, imagecolorallocate($destino, 255, 255, 255));


                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $rutaFirma2);
                } else {
                }
            }

            if ($_FILES['firma-img-3']['name'] != "") {

                list($ancho, $alto) = getimagesize($_FILES['firma-img-3']['tmp_name']);

                $nuevoAncho = 500;
                $nuevoAlto = 500;

                $directorio = "vista/img/firmas_reconocimiento/";

                mkdir($directorio, 0777, true);


                if ($_FILES['firma-img-3']['type'] == "image/jpeg") {

                    $rutaFirma3 = "vista/img/firmas_reconocimiento/firma3.jpg";

                    $origen = imagecreatefromjpeg($_FILES['firma-img-3']['tmp_name']);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $rutaFirma3);
                } elseif ($_FILES['firma-img-3']['type'] == "image/png") {

                    $rutaFirma3 = "vista/img/firmas_reconocimiento/firma3.png";

                    $origen = imagecreatefrompng($_FILES['firma-img-3']['tmp_name']);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagefill($destino, 0, 0, imagecolorallocate($destino, 255, 255, 255));


                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $rutaFirma3);
                } else {
                }
            }


            $rutaFirma1 = isset($rutaFirma1) ? $rutaFirma1 : "";
            $rutaFirma2 = isset($rutaFirma2) ? $rutaFirma2 : "";
            $rutaFirma3 = isset($rutaFirma3) ? $rutaFirma3 : "";


            $firmas = array(
                "firma1" => $rutaFirma1,
                "nombref1" => $_POST['nombref1'],
                "puestof1" => $_POST['puestof1'],
                "institucionf1" => $_POST['institucionf1'],
                "firma2" => $rutaFirma2,
                "nombref2" => $_POST['nombref2'],
                "puestof2" => $_POST['puestof2'],
                "institucionf2" => $_POST['institucionf2'],
                "firma3" => $rutaFirma3,
                "nombref3" => $_POST['nombref3'],
                "puestof3" => $_POST['puestof3'],
                "institucionf3" => $_POST['institucionf3'],

            );

            $_POST['firmas'] = json_encode($firmas, true);





            $EditarDocumento = DocumentoModelo::mdlModificarDocumento($_POST);

            if ($EditarDocumento) {

                AppControlador::mensajeInfo('Bien', '', 'success', './documentos-Reconocimiento');
                # code...
            } else {
                AppControlador::mensajeInfo('mal', '', 'error', './documentos-Reconocimiento');
            }
            # code...
        }
    }
}
