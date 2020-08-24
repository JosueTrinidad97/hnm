<?php
require_once '../modelo/asistente.modelo.php';
require_once '../controlador/asistente.controlador.php';
require_once '../controlador/app.controlador.php';
class AjaxAsistente
{

    public $idAsistente;

    public function obtenerAsistenteIdAjax()
    {


        $res = AsistenteModelo::mdlObtenerAsistentesId($this->idAsistente);

        echo json_encode($res, true);
    }

    public function eliminarAsistenteajax()
    {
        $res = AsistenteModelo::mdlEliminarAsistente($this->idAsistente);

        echo json_encode($res, true);
    }


    public function eliminarAsistenteListaAjax()
    {
        $res = AsistenteModelo::mdlEliminarAsistenteLista($this->idAsistente);

        echo json_encode($res, true);
    }
    public function listaAgregarPresente()
    {




        $res = AsistenteControlador::ctrAgregarListaPresentes2($this->idAsistente);

        echo json_encode($res, true);
    }
}

if (isset($_POST['btnEditarAsistente'])) {
    $asistente = new AjaxAsistente();
    $asistente->idAsistente = $_POST['idAsistente'];
    $asistente->obtenerAsistenteIdAjax();
}

if (isset($_POST['btnEliminarAsistente'])) {
    $asistente = new AjaxAsistente();
    $asistente->idAsistente = $_POST['idAsistente'];
    $asistente->eliminarAsistenteajax();
}



if (isset($_POST['btnEliminalAsistenteLista'])) {
    $asistente = new AjaxAsistente();
    $asistente->idAsistente = $_POST['idAsistente'];
    $asistente->eliminarAsistenteListaAjax();
}
if (isset($_POST['btnListaAgregarPresente'])) {
    $asistente = new AjaxAsistente();
    $asistente->idAsistente = $_POST['idAsistente'];
    $asistente->listaAgregarPresente();
}
