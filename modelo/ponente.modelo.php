<?php
//importar la conexion
require_once 'conexion.modelo.php';

class PonenteModelo
{


    public static function mldAgregarPonente($ponente)
    {

        try {

            $sql = "INSERT INTO Ponentes(idPonente,nombre,correo,telefono,gradoEstudios,tema,descripcion,horaInicio,horaFin,idEventos)values(?,?,?,?,?,?,?,?,?,?)";

            $con = ConexionModelo::conectarBd('EventosPrueba');

            $pps = $con->prepare($sql);
            //asignar valores
            $pps->bindValue(1, $ponente['idPonente']);
            $pps->bindValue(2, $ponente['nombre']);
            $pps->bindValue(3, $ponente['correo']);
            $pps->bindValue(4, $ponente['telefono']);
            $pps->bindValue(5, $ponente['gradoEstudios']);
            $pps->bindValue(6, $ponente['tema']);
            $pps->bindValue(7, $ponente['descripcion']);
            $pps->bindValue(8, $ponente['horaInicio']);
            $pps->bindValue(9, $ponente['horaFin']);
            $pps->bindValue(10, $ponente['idEventos']);
            //$pps->bindValue(10, $ponente['estado']);



            $pps->execute();

            return $pps->Rowcount() > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mldConsultarTodosPonentes()
    {
        try {

            $sql = "SELECT * FROM Ponentes where estado = 1  ";
            $con = ConexionModelo::conectarBd('EventosPrueba');

            $pps = $con->prepare($sql);

            $pps->execute();

            return $pps->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mldGenerarIdPonentes()
    {
        try {

            $sql = "SELECT * FROM Ponentes  ";
            $con = ConexionModelo::conectarBd('EventosPrueba');

            $pps = $con->prepare($sql);

            $pps->execute();

            return $pps->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mldConsultarPonenteEvento($idEventos = "", $correo = "")
    {
        try {
            if ($correo != "") {
                $sql = "SELECT * FROM ponentes p JOIN Eventos e ON p.idEventos = e.idEventos WHERE p.correo  LIKE '$correo%' AND p.estado = 1 AND e.estado = 1";
                $con = ConexionModelo::conectarBd('EventosPrueba');
                $pps = $con->prepare($sql);
            } elseif ($idEventos == "") {
                $sql = "SELECT p.* FROM ponentes p JOIN Eventos e ON p.idEventos = e.idEventos where p.estado = 1 AND e.estado = 1";
                $con = ConexionModelo::conectarBd('EventosPrueba');
                $pps = $con->prepare($sql);
            } else {
                $sql = "SELECT * FROM ponentes where  idEventos = ? AND estado = 1";
                $con = ConexionModelo::conectarBd('EventosPrueba');
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $idEventos);
            }
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarPonente($idPonente)
    {

        try {
            //code...
            $sql = "UPDATE Ponentes SET estado = 0  where idPonente= ?  ";

            $con = ConexionModelo::conectarBd('EventosPrueba');
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $idPonente);

            $pps->execute();

            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            throw $th;
            return false;
        } finally {
            $con = null;
            $pps = null;
        }
    }
   /* public static function mdlActualizarAsistente($asistente)
    {
        try {
            // QUERY DE INSERT


            $sql = "UPDATE Asistentes SET nombre=?,correo=?,telefono=?,gradoEstudios=?,idCosto=?,idEventos=? where idAsistente =?";
            $con = ConexionModelo::conectarBd('EventosPrueba');

            // Preparar la consulta

            $pps = $con->prepare($sql);

            // Asignar los valores 

            $pps->bindValue(1, $asistente['nombre']);
            $pps->bindValue(2, $asistente['correo']);
            $pps->bindValue(3, $asistente['telefono']);
            $pps->bindValue(4, $asistente['gradoEstudios']);
            $pps->bindValue(5, $asistente['idCosto']);
            $pps->bindValue(6, $asistente['idEventos']);
            $pps->bindValue(7, $asistente['idAsistente']);


            // Ejecutar la consulta 

            $pps->execute();

            return $pps->rowCount() > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            //Cerar cone
            $con = null;
            $pps = null;
        }
    }*/
    public static function mdlActualizarPonente($ponente)
    {
        try {
            // QUERY DE INSERT


            $sql = "UPDATE Ponentes SET nombre=?,correo=?,telefono=?,gradoEstudios=?,tema=?,descripcion=?,idEventos=?,horaInicio=?,horaFin=? where idponente =?";
            $con = ConexionModelo::conectarBd('EventosPrueba');

            // Preparar la consulta

            $pps = $con->prepare($sql);

            // Asignar los valores 

            $pps->bindValue(1, $ponente['nombre']);
            $pps->bindValue(2, $ponente['correo']);
            $pps->bindValue(3, $ponente['telefono']);
            $pps->bindValue(4, $ponente['gradoEstudios']);
            $pps->bindValue(5, $ponente['tema']);
            $pps->bindValue(6, $ponente['descripcion']);
            $pps->bindValue(7, $ponente['idEventos']);
            $pps->bindValue(8, $ponente['horaInicio']);
            $pps->bindValue(9, $ponente['horaFin']);
            $pps->bindValue(10, $ponente['idPonente']);
            


            // Ejecutar la consulta 

            $pps->execute();

            return $pps->rowCount()>0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            //Cerar cone
            $con = null;
            $pps = null;
        }
    }
    public static function mldConsultarPonenteId($idPonente)//funcion para actualizar los datos del ponente
    {
        try {

            $sql = "SELECT * FROM Ponentes where idPonente= ?  ";
            $con = ConexionModelo::conectarBd('EventosPrueba');

            $pps = $con->prepare($sql);
            
            $pps->bindValue(1, $idPonente);

            $pps->execute();

            return $pps->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }


    // funcion para rellenar el reconocimiento del ponente

    public static function obtnerDatosPonenteReconocimiento($idPonente)
    {

        try {
            $sql = "select p.*, e.* from ponentes p JOIN Eventos e ON  p.idEventos = e.idEventos WHERE p.idPonente = ? ";

            $con = ConexionModelo::conectarBd('EventosPrueba');

            $pps =  $con ->prepare($sql);

            $pps->bindValue(1, $idPonente);

            $pps->execute();

            return $pps->fetch();


        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }finally{
            $pps = null;
            $con = null;
        }

    }
}
