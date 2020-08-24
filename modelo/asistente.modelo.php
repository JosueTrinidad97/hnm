<?php
require_once 'conexion.modelo.php';

class AsistenteModelo
{

    public static function GuardarAsistente($asistente)
    {

        try {
            $sql = "INSERT INTO asistentes (idAsistente,nombre,correo,telefono,gradoEstudios,idCosto,idEventos) values (?,?,?,?,?,?,?)";
            $con = ConexionModelo::conectarBd('EventosPrueba');
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $asistente['idAsistente']);
            $pps->bindValue(2, $asistente['nombre']);
            $pps->bindValue(3, $asistente['correo']);
            $pps->bindValue(4, $asistente['telefono']);
            $pps->bindValue(5, $asistente['gradoEstudios']);
            $pps->bindValue(6, $asistente['idCosto']);
            $pps->bindValue(7, $asistente['idEventos']);

            $pps->execute();

            return $pps->rowCount() > 0;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlObtenerAsistentes($idEvento = "", $correo = "")
    {
        try {
            if ($correo != "") {

                $sql = "SELECT * FROM asistentes WHERE correo LIKE '$correo%' and estado = 1 ";
                $con = ConexionModelo::conectarBd('EventosPrueba');
                $pps = $con->prepare($sql);
            } elseif ($idEvento == "") {
                $sql = "SELECT a.* FROM asistentes a JOIN Eventos e ON a.idEventos = e.idEventos where a.estado = 1 AND e.estado = 1";
                $con = ConexionModelo::conectarBd('EventosPrueba');
                $pps = $con->prepare($sql);
            } else {
                $sql = "SELECT * FROM asistentes WHERE idEventos = ? and estado = 1";
                $con = ConexionModelo::conectarBd('EventosPrueba');
                $pps = $con->prepare($sql);

                $pps->bindValue(1, $idEvento);
            }



            $pps->execute();

            return $pps->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;

            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlObtenerAsistentesTodos() // modal card buscar asistentes dentro de  la vista listas
    {
        try {
            
                $sql = "SELECT a.* FROM asistentes a  where a.estado = 1";
                $con = ConexionModelo::conectarBd('EventosPrueba');
                $pps = $con->prepare($sql);
           



            $pps->execute();

            return $pps->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;

            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlGenerarIdAsistentes($idEvento = "", $correo = "")
    {
        try {
            if ($correo != "") {

                $sql = "SELECT * FROM asistentes WHERE correo LIKE '$correo%' ";
                $con = ConexionModelo::conectarBd('EventosPrueba');
                $pps = $con->prepare($sql);
            } elseif ($idEvento == "") {
                $sql = "SELECT * FROM asistentes";
                $con = ConexionModelo::conectarBd('EventosPrueba');
                $pps = $con->prepare($sql);
            } else {
                $sql = "SELECT * FROM asistentes WHERE idEventos = ?";
                $con = ConexionModelo::conectarBd('EventosPrueba');
                $pps = $con->prepare($sql);

                $pps->bindValue(1, $idEvento);
            }



            $pps->execute();

            return $pps->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;

            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }


    public static function mdlObtenerAsistentesId($idAsistente)
    {
        try {

            $sql = "SELECT a.*,c.precio FROM asistentes a JOIN costo c ON a.idCosto = c.idCosto WHERE a.idAsistente = ? AND a.Estado = 1 ";
            $con = ConexionModelo::conectarBd('EventosPrueba');
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $idAsistente);




            $pps->execute();

            return $pps->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;

            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlHojaDePago($asistente)
    {
        try {
            $sql = "SELECT a.idAsistente,a.nombre,c.precio,e.tema 
            FROM asistentes a JOIN  costo c on a.idCosto = c.idCosto  join Eventos e on a.idEventos = e.idEventos  where a.idAsistente = ? ";
            $con = ConexionModelo::conectarBd('EventosPrueba');
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $asistente);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $e) {

            echo $e->getMessage();
        } finally {
            $pps = null;
            $con = null;
        }
    }


    public static function mdlActualizarAsistente($asistente)
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
    }
    public static function mdlEliminarAsistente($idAsistente)
    {
        try {
            //code...
            $sql = "UPDATE  Asistentes SET Estado = 0  WHERE idAsistente = ? ";

            $con = ConexionModelo::conectarBd('EventosPrueba');
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $idAsistente);

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
    public static function mdlEliminarAsistenteEvento($evento)
    {
        try {
            //code...
            $sql = "UPDATE  Asistentes SET Estado = 0  WHERE idEventos = ? ";

            $con = ConexionModelo::conectarBd('EventosPrueba');
            $pps = $con->prepare($sql);

            $pps->bindValue(1, $evento);

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

    // Lista Asistencia



    public static function mdlListarAsistentePorID($idAsistente)
    {
        try {

            $sql = "SELECT a.idAsistente,a.nombre,l.fecha from listaAsistencia as l inner join Asistentes as a on a.idAsistente= l.idAsistente WHERE l.idAsistente  = ? ";
            $con = ConexionModelo::conectarBd('EventosPrueba');
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $idAsistente);
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

    public static function mdlListarAsistentes()
    {
        try {

            $sql = "SELECT a.idAsistente,a.nombre,a.correo,l.fecha,e.tema from listaAsistencia as l inner join Asistentes as a on a.idAsistente= l.idAsistente JOIN Eventos e ON a.idEventos = e.idEventos WHERE a.Estado = 1";
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
    public static function mdlListarAsistentesActivos()
    {
        try {

            $sql = "SELECT a.idAsistente,a.nombre,l.fecha from listaAsistencia as l inner join Asistentes as a on a.idAsistente= l.idAsistente ";
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

    public static function mdlAgregarAsistentes($datosAsistentes)
    {
        try {

            $sql = "INSERT INTO listaAsistencia (idAsistente,fecha) values (?,?) ";
            $con = ConexionModelo::conectarBd('EventosPrueba');
            $pps = $con->prepare($sql);
            //$pps->bindValue(1, $datosAsistentes['idListaAsistencia']);
            $pps->bindValue(1, $datosAsistentes['idAsistente']);
            $pps->bindValue(2, $datosAsistentes['fecha']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlEliminarAsistenteLista($idAsistente){
        try {
            $sql = "DELETE FROM listaAsistencia WHERE idAsistente = ?";

            $con = ConexionModelo::conectarBd('EventosPrueba');
            
            $pps = $con->prepare($sql);
            $pps->bindValue(1,$idAsistente);
            $pps->execute();

            return $pps->rowCount()>0;

            
        } catch (\PDOException $th) {
            //throw $th;
            return false;
        }finally{
            $pps = null;
            $con = null;
        }
    }
  // funcion para rellenar el reconocimiento del presente 

  public static function obtnerDatosPresenteConstancia($idPresente)
  {

      try {
          $sql = "SELECT a.idAsistente,a.nombre,a.correo,l.fecha,e.tema from listaAsistencia as l inner join Asistentes as a on a.idAsistente= l.idAsistente JOIN Eventos e ON a.idEventos = e.idEventos WHERE a.idAsistente = ? ";

          $con = ConexionModelo::conectarBd('EventosPrueba');

          $pps =  $con ->prepare($sql);

          $pps->bindValue(1, $idPresente);

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

      //funcion para contador de asistentes 

      public static function mdlObtenerConteoListaAsistenciaEventos($idEvento)
  {

      try {
          $sql = "SELECT count (idAsistente)  as total_asistencia_evento from Asistentes where idEventos= ?;
          ";

          $con = ConexionModelo::conectarBd('EventosPrueba');

          $pps =  $con ->prepare($sql);

          $pps->bindValue(1, $idEvento);

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
