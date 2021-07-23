<?php
//API para eliminar una tienda por medio del ID
declare(strict_types=1);
require $_SERVER['DOCUMENT_ROOT'] . "/utils/CONSULTAS.php";
require $_SERVER['DOCUMENT_ROOT'] . "/utils/RESPUESTAS.php";

//Si la petición HTTP es de tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//Variables recibidas por el cliente
	$idTienda = $_POST["idTienda"];
	if (isset($idTienda) and !empty($idTienda)) {
		try {
			//Consulta a realizar y sus respectivos parámetros en forma de un array
			$consulta = "DELETE FROM tiendas WHERE id_tienda = ?";
			$parametros = array($idTienda);
			//Realiza la consulta utilizando la clase estática CONSULTAS enviándoles la consulta y los parámetros
			$respuesta = CONSULTAS::consultaCudParametros(
				$consulta,
				$parametros
			);
			//Muestra el mensaje de respuesta del servidor con los datos obtenidos
			$mensaje = ($respuesta["registros_afectados"]>0) ? "Consulta realizada correctamente" : "No se realizaron modificaciones";
			echo RESPUESTAS::mensajeAJson("200", $mensaje, $respuesta);
		} catch (PDOException $e) {
			//Muestra la información de la excepción
			echo RESPUESTAS::errorAJson($e);
		}
	} else {
		header("HTTP/1.0 405 Void Parameters");
	}
}
