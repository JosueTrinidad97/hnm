<?php
require_once 'conexion.modelo.php';
 class DocumentoModelo{

    public static function mdlObtnerTipoDocumento($Documento)
    {
        try {
            // QUERY DE INSERT


            $sql = "SELECT * FROM documentos WHERE tipo = ?";
            $con = ConexionModelo::conectarBd('EventosPrueba');

            // Preparar la consulta

            $pps = $con->prepare($sql);

            // Asignar los valores 

            $pps->bindValue(1, $Documento);
          


            // Ejecutar la consulta 

            $pps->execute();

            return $pps->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            //Cerar cone
            $con = null;
            $pps = null;
        }





    
 }


 public static function mdlModificarDocumento($Documento)
	{

		try {
			//code... 
			$sql = "UPDATE documentos set titulo = ?,sujeto = ?,descripcion = ?,frase = ?,firmas = ? where tipo =?;
            ";

			$con = ConexionModelo::conectarBd('EventosPrueba');
			$pps = $con->prepare($sql);

            $pps->bindValue(1, $Documento ['titulo']);
            $pps->bindValue(2, $Documento ['sujeto']);
            $pps->bindValue(3, $Documento ['descripcion']);
            $pps->bindValue(4, $Documento ['frase']);
            $pps->bindValue(5, $Documento ['firmas']);
            $pps->bindValue(6, $Documento ['tipo']);

			$pps->execute();

			return $pps->rowCount()>0;
		} catch (PDOException $th) {
			throw $th;
			return false;
		} finally {
			$con = null;
			$pps = null;
		}
	}

}