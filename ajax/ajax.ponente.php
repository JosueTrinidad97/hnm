<?php
require_once '../modelo/ponente.modelo.php';
require_once '../controlador/ponente.controlador.php';

require_once '../controlador/app.controlador.php';



require '../lib/phpMailer/Exception.php';
require '../lib/phpMailer/PHPMailer.php';
require '../lib/phpMailer/SMTP.php';



if (isset($_POST['pintarTabla'])) {

    if ($_POST['correo'] != "") {
        $datos = PonenteModelo::mldConsultarPonenteEvento("", $_POST['correo']);
    } else {
        $datos = PonenteModelo::mldConsultarPonenteEvento($_POST['idEventos'], "");
    }


    echo json_encode($datos);
}





if (isset($_POST['btnEliminarPonente'])) {
    $res = PonenteModelo::mdlEliminarPonente($_POST['idPonente']);
    echo json_encode($res, true);
}

if (isset($_POST['btnEditarPonente'])) {
    $res = PonenteModelo::mldConsultarPonenteId($_POST['idPonente']);
    echo json_encode($res, true);
}


if (isset($_POST['btnEnviarCorreo'])) {
    $res = PonenteControlador::ctrEnviarCorreoPonente();
    echo json_encode($res, true);
}

if (isset($_POST['btnEviarCorreosPonentes'])) {
    $res = PonenteControlador::ctrEnviarCorreosPonentes();
    echo json_encode($res, true);
}
