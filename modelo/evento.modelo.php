<?php

/**
 * 
 */

// Importar la conexion
require_once 'conexion.modelo.php';

class EventoModelo
{

	// Agregar evento
	// Las funciones para insertar retornan un valor boolean true o false (o / 1)

	public static function mdlAgreagarEvento($evento)
	{

		try {
			// QUERY DE INSERT

			$sql = "INSERT INTO Eventos(idEventos,fecha,hora,ubicacion,tema,descripcion,capacidad,imagen,fechaCreacion) values(?,?,?,?,?,?,?,?,?)";

			$con = ConexionModelo::conectarBd('EventosPrueba');

			// Preparar la consulta

			$pps = $con->prepare($sql);

			// Asignar los valores 

			$pps->bindValue(1, $evento['idEventos']);
			$pps->bindValue(2, $evento['fecha']);
			$pps->bindValue(3, $evento['hora']);
			$pps->bindValue(4, $evento['ubicacion']);
			$pps->bindValue(5, $evento['tema']);
			$pps->bindValue(6, $evento['descripcion']);
			$pps->bindValue(7, $evento['capacidad']);
			$pps->bindValue(8, $evento['imagen']);
			$pps->bindValue(9, $evento['fechaCreacion']);

			// Ejecutar la consulta 

			$pps->execute();

			return $pps->rowCount() > 0;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		} finally {
			//Cerar conexion

			$pps = null;
			$con = null;
		}
	}

	// Consultar todos los eventos 

	public static function mdlConsultarTodosEventosPublico()
	{ //yaaaaaaaaaaaaaaaaaaaaa
		try {


			//$sql = "SELECT * FROM Eventos WHERE estado = 1 ";
			//$sql = "SELECT * FROM Eventos WHERE estado = 1 OR (fecha < getdate() and hora > getdate()) ";
			//$sql = "SELECT * FROM Eventos WHERE  fecha > getdate()   AND estado = 1";
			$sql = "SELECT * FROM Eventos WHERE estado = 1 and  fecha > getdate() order by fechaCreacion DESC";


			$con = ConexionModelo::conectarBd('EventosPrueba');

			$pps = $con->prepare($sql);

			// No resive parametros porque no tiene filtro, si tuviera un where la consulta, si recibiera parametros

			$pps->execute();

			// Obtine una lista de eventos , es decir varias filas 

			return $pps->fetchAll();
		} catch (PDOException $e) {
			echo $e->getMessage();
			return null;
		} finally {
			$pps = null;
		}
	}
	public static function mdlConsultarTodosEventos()
	{ //yaaaaaaaaaaaaaaaaaaaaa
		try {


			//$sql = "SELECT * FROM Eventos WHERE estado = 1 ";
			//$sql = "SELECT * FROM Eventos WHERE estado = 1 OR (fecha < getdate() and hora > getdate()) ";
			//$sql = "SELECT * FROM Eventos WHERE  fecha > getdate()   AND estado = 1";
			$sql = "SELECT * FROM Eventos WHERE estado = 1 order by fechaCreacion DESC ";


			$con = ConexionModelo::conectarBd('EventosPrueba');

			$pps = $con->prepare($sql);

			// No resive parametros porque no tiene filtro, si tuviera un where la consulta, si recibiera parametros

			$pps->execute();

			// Obtine una lista de eventos , es decir varias filas 

			return $pps->fetchAll();
		} catch (PDOException $e) {
			echo $e->getMessage();
			return null;
		} finally {
			$pps = null;
		}
	}
	public static function mdlGenerarIdEvento()
	{ //yaaaaaaaaaaaaaaaaaaaaa
		try {


			$sql = "SELECT * FROM Eventos ";

			$con = ConexionModelo::conectarBd('EventosPrueba');

			$pps = $con->prepare($sql);

			// No resive parametros porque no tiene filtro, si tuviera un where la consulta, si recibiera parametros

			$pps->execute();

			// Obtine una lista de eventos , es decir varias filas 

			return $pps->fetchAll();
		} catch (PDOException $e) {
			echo $e->getMessage();
			return null;
		} finally {
			$pps = null;
		}
	}
	


	public static function mdlConsultarEvento($id)
	{ //yaaaaaaaaaaaaaaaaaaaaa
		try {


			$sql = "SELECT * FROM Eventos WHERE idEventos = ?";

			$con = ConexionModelo::conectarBd('EventosPrueba');

			$pps = $con->prepare($sql);

			$pps->bindValue(1, $id);

			// No resive parametros porque no tiene filtro, si tuviera un where la consulta, si recibiera parametros

			$pps->execute();

			// Obtine una lista de eventos , es decir varias filas 

			return $pps->fetch();
		} catch (PDOException $e) {
			echo $e->getMessage();
			return null;
		} finally {
			$pps = null;
		}
	}

	public static function mdlConsultarTodosEventosInicio($idEvento)
	{ //yaaaaaaaaaaaaaaaaaaaaa
		try {


			$sql = "SELECT e.idEventos,p.nombre FROM evento e JOIN evento_cronograma ec ON e.idEvento = ec.idEvento 
			JOIN cronograma c ON c.idCronograma = ec.idCronograma JOIN ponente p ON  p.idPonente = c.idPonente WHERE e.idEvento = ?;";

			$con = ConexionModelo::conectarBd('EventosPrueba');



			$pps = $con->prepare($sql);

			$pps->bindValue(1, $idEvento);

			// No resive parametros porque no tiene filtro, si tuviera un where la consulta, si recibiera parametros

			$pps->execute();

			// Obtine una lista de eventos , es decir varias filas 

			return $pps->fetchAll();
		} catch (PDOException $e) {
			echo $e->getMessage();
			return null;
		} finally {
			$pps = null;
		}
	}

	public static function mdlAgreagarEventoLista($eventoLista)
	{

		try {
			$sql = "INSERT INTO evento_lista(idEvento,idListaAsistencia,estado)values(?,?,?)";

			$con = ConexionModelo::conectarBd('EventosHNM3');


			$pps = $con->prepare($sql);
			//asignar los valores

			$pps->bindValue(1, $eventoLista['idEvento']);
			$pps->bindValue(2, $eventoLista['idListaAsistencia']);
			$pps->bindValue(3, $eventoLista['estado']);

			$pps->execute();

			return $pps->rowCount() > 0;
		} catch (PDOException $e) {

			echo $e->getMessage();
			return false;
		} finally {
			$pps = null;
		}
	}
	public static function mdlConsultarCronogramas()
	{ //yaaaaaaaaaaaaaaaaaaaaa
		try {
			$sql = "SELECT * FROM evento_cronograma";
			$con = ConexionModelo::conectarBd('EventosHNM3');
			$pps = $con->prepare($sql);

			$pps->execute();
			return $pps->fetchAll();
		} catch (PDOException $e) {
			echo $e->getMessage();
			return null;
		} finally {
			$pps = null;
		}
	}
	//tarea
	public static function mdlAgreagarEventoCronograma($eventoCronograma)
	{

		try {
			$sql = "INSERT INTO evento_cronograma(idEvento,idCronograma,estado)values(?,?,?)";
			$con = ConexionModelo::conectarBd('EventosHNM3');
			$pps = $con->prepare($sql);

			$pps->bindValue(1, $eventoCronograma['idEvento']);
			$pps->bindValue(2, $eventoCronograma['idCronograma']);
			$pps->bindValue(3, $eventoCronograma['estado']);

			$pps->execute();
			return $pps->rowCount() > 0;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		} finally {
			$pps = null;
		}
	}
	public static function mdlConsultarListas()
	{ //yaaaaaaaaaaaaaaaaaaaaa

		try {
			$sql = "SELECT * FROM evento_lista";
			$con = ConexionModelo::conectarBd('EventosHNM3');
			$pps = $con->prepare($sql);

			$pps->execute();
			return $pps->fetchAll();
		} catch (PDOException $e) {
			echo $e->getMessage();
			return null;
		} finally {
			$pps = null;
		}
	}

	public static function mdlConsultarEventoCosto($eventoCosto)
	{

		try {
			$sql = "INSERT INTO evento_costo(idCosto,idEvento,estado)values(?,?,?)";
			$con = ConexionModelo::conectarBd('EventosHNM3');
			$pps = $con->prepare($sql);

			$pps->bindValue(1, $eventoCosto['idCosto']);
			$pps->bindValue(2, $eventoCosto['idEvento']);
			$pps->bindValue(3, $eventoCosto['estado']);

			$pps->execute();

			return $pps->rowCount() > 0;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		} finally {
			$pps = null;
		}
	}

	public static function mdlConsultarCosto()
	{ //faltaaaaaaaaaaaaaaaaa
		try {
			$sql = "SELECT * FROM evento_costo";
			$con = ConexionModelo::conectarBd('EventosHNM3');
			$pps = $con->prepare($sql);

			$pps->execute();
			return $pps->fetchAll();
		} catch (PDOException $e) {
			$e->getMessage();
			return null;
		} finally {
			$pps = null;
		}
	}

	public static function mdlEliminarEvento($idEvento)
	{

		try {
			//code... 
			$sql = "UPDATE  Eventos SET estado  = '0' WHERE idEventos = ? ";

			$con = ConexionModelo::conectarBd('EventosPrueba');
			$pps = $con->prepare($sql);

			$pps->bindValue(1, $idEvento);

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


	public static function mdlActualizarEvento($evento)
	{

		try {
			// QUERY DE INSERT

			$sql = "UPDATE Eventos SET fecha=?,hora=?,ubicacion=?,tema=?,descripcion=?,capacidad=?,costo=?,imagen=? where idEventos =?";

			$con = ConexionModelo::conectarBd('EventosPrueba');

			// Preparar la consulta

			$pps = $con->prepare($sql);

			// Asignar los valores 

			$pps->bindValue(1, $evento['fecha']);
			$pps->bindValue(2, $evento['hora']);
			$pps->bindValue(3, $evento['ubicacion']);
			$pps->bindValue(4, $evento['tema']);
			$pps->bindValue(5, $evento['descripcion']);
			$pps->bindValue(6, $evento['capacidad']);
			$pps->bindValue(7, $evento['costo']);
			$pps->bindValue(8, $evento['imagen']);
			$pps->bindValue(9, $evento['idEventos']);

			// Ejecutar la consulta 

			$pps->execute();

			return $pps->rowCount() > 0;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		} finally {
			//Cerar cone
			$con =null;
			$pps= null;


		}
	}
}
