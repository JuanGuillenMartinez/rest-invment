<?php
//API para eliminar una tienda por medio del ID
declare(strict_types=1);
require_once $_SERVER['DOCUMENT_ROOT'] . "/utils/CONSULTAS.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/utils/RESPUESTAS.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/rest/Header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$idTienda = $_POST["idTienda"];
	try {
		if (!Utils::parametersAreEmpty(array($idTienda))) {
			$consulta = "DELETE FROM tiendas WHERE id_tienda = ?";
			$parametros = array($idTienda);
			$respuesta = CONSULTAS::consultaCudParametros(
				$consulta,
				$parametros
			);
			$mensaje = ($respuesta["registros_afectados"] > 0) ? "Consulta realizada correctamente" : "No se realizaron modificaciones";
			echo RESPUESTAS::mensajeAJson("200", $mensaje, $respuesta);
		} else {
			header("HTTP/1.0 405 Parameters are empty");
		}
	} catch (PDOException $e) {
		echo RESPUESTAS::errorAJson($e);
	}
}
