<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PonenteControlador
{
    public  function GuardarPonente()
    {

        if (isset($_POST['btnGuardarPonente'])) {



            $_POST['idPonente'] = PonenteControlador::crearIdPonente();




            $guardar = PonenteModelo::mldAgregarPonente($_POST);

            if ($guardar) {
                AppControlador::mensajeInfo('Bien', 'Formulario Completado', 'success', 'ponentes');
            }
        }
    }

    public static function crearIdPonente()
    {

        $rowCount = PonenteModelo::mldGenerarIdPonentes();





        $rowCount =  count($rowCount);
        if ($rowCount === false) {
            $id = "PON-1";
        } else {
            $num = $rowCount;
            $num += 1;
            if ($num < 10) {
                $id = "PON-0000" . $num;
            } else if ($num < 100) {
                $id = "PON-000" . $num;
            } else if ($num < 1000) {
                $id = "PON-00" . $num;
            } else if ($num < 10000) {
                $id = "PON-0" . $num;
            } else {
                $id = "PON-" . $num; //yaaaaaa
            }
        }
        return $id;
    }

    public  function ctrActualizarPonente()
    {

        if (isset($_POST['btnActualizarPonente'])) {



            $actualizar = PonenteModelo::mdlActualizarPonente($_POST);



            if ($actualizar) {
                AppControlador::mensajeInfo('Bien', 'Ponente actualizado', 'success', 'ponentes');
            } else {

                AppControlador::mensajeInfo('Mal', 'Intenta de nuevo, no se pudo actualizar', 'error', 'ponentes');
            }
        }
    }



    public static function ctrEnviarCorreosPonentes()
    {
        if (isset($_POST['btnEviarCorreosPonentes'])) {
            // Instantiation and passing `true` enables exceptions



            $correos = PonenteModelo::mldConsultarTodosPonentes();

            //var_dump($correos);
            $mail = new PHPMailer(true);
            $url = AppControlador::cargarRutaAdmin();
            foreach ($correos as $key => $value) {

               

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.hostinger.mx';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'alberto.fbn@softmor.com';                     // SMTP username
                    $mail->Password   = '199720031230';                               // SMTP password
                    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                    //Recipients
                    $mail->setFrom('alberto.fbn@softmor.com', 'HNM Prueba');

                    $mail->addAddress($value['correo'], $value['nombre']);

                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Reconocimiento HNM Prueba';
                    $mail->Body    = '<a href="' . $url . 'lib/reportes/pagos/reconocimiento.php?idPonente=' . $value['idPonente'] . '">Descrgar tu reconocimiento</a>';


                    // Add a recipient
                    // $mail->addAddress(array($_POST['ponenteCorreo']), $_POST['ponenteNombre']);



                    // Content


                    $mail->send();
                    return true;
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    return false;
                }
            }
        }
    }


    public static function ctrEnviarCorreoPonente()
    {
        if (isset($_POST['btnEnviarCorreo'])) {
            // Instantiation and passing `true` enables exceptions




            $url = AppControlador::cargarRutaAdmin();


            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.hostinger.mx';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'alberto.fbn@softmor.com';                     // SMTP username
                $mail->Password   = '199720031230';                               // SMTP password
                $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('alberto.fbn@softmor.com', 'HNM');
                $mail->addAddress($_POST['ponenteCorreo'], $_POST['ponenteNombre']);     // Add a recipient




                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Reconocimiento HNM';
                $mail->Body    = '<a href="' . $url . 'lib/reportes/pagos/reconocimiento.php?idPonente=' . $_POST['ponenteId'] . '">Descrgar tu reconocimiento</a>';


                $mail->send();
                return true;
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                return false;
            }
        }
    }
}
