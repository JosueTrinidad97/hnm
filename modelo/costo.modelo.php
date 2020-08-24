<?php
class CostoModelo
{
    public static function obtenerCostos()
    {
        try {
            $sql = "SELECT * FROM costo";
            $con = ConexionModelo::conectarBd('EventosPrueba');
            $pps = $con->prepare($sql);

            $pps->execute();

            return $pps->fetchAll();
        } catch (PDOException $e) {
            echo  $e->getMessage();
            return null;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function obtenerCostoEventos($idEvento)
    {
        try {
            $sql = "SELECT * FROM costo WHERE idEventos = ?";
            $con = ConexionModelo::conectarBd('EventosPrueba');
            $pps = $con->prepare($sql);

            $pps -> bindValue(1,$idEvento);

            $pps->execute();

            return $pps->fetchAll();
        } catch (PDOException $e) {
            echo  $e->getMessage();
            return null;
        } finally {
            $pps = null;
            $con = null;
        }
    }


    public static function mdlAgregarCosto($evento)
    {
        try{
        
        $sql = "INSERT INTO costo(idCosto,idEventos,TipoAsistente,precio)VALUES(?,?,?,?)";
        $con = ConexionModelo::conectarBd('EventosPrueba');

        $pps = $con->prepare($sql);

        $pps->bindValue(1, $evento['idCosto']);
        $pps->bindValue(2, $evento['idEventos']);
        $pps->bindValue(3, $evento['tipoAsistente']);
        $pps->bindValue(4, $evento['precio']);
        $pps->execute();
        return $pps ->rowCount()>0;
    }catch(PDOException $e){
        echo $e->getMessage();
        return false;

    }finally{
        $pps = null;
        $con = null;
    }


    }
}
