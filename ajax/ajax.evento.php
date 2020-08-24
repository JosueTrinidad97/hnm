<?php
require_once '../modelo/evento.modelo.php';
require_once '../modelo/costo.modelo.php';
require_once '../modelo/asistente.modelo.php';





class AjaxEvento{
    public $idEvento;

    public function ajaxMostrarEvento(){
        $valor = $this->idEvento;
        $res = EventoModelo::mdlConsultarEvento($valor);
        
    }

    
}


// AJAX 

if (isset($_POST['consultarEvento'])) {


    $datos = EventoModelo::mdlConsultarEvento($_POST['idEventos']);

    echo json_encode($datos);
}

if(isset($_POST['consultarCosto'])){

    $datos = CostoModelo::obtenerCostoEventos($_POST['idEventos']);
    echo json_encode($datos);

}
if(isset($_POST['pintarTabla'])){

    if($_POST['correo'] != "" ){
        $datos = AsistenteModelo::mdlObtenerAsistentes("",$_POST['correo']);


    }else{
        $datos = AsistenteModelo::mdlObtenerAsistentes($_POST['idEventos'],"");
    }

    
    echo json_encode($datos);

}