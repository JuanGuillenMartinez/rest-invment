<?php
//API para eliminar una tienda por medio del ID
declare(strict_types=1);
include_once $_SERVER['DOCUMENT_ROOT'] . "/rest/HeaderApi.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	
	$idTienda = intval($_GET["idTienda"]);
	try {
		if (!Utils::parametersAreEmpty(array($idTienda))) {
			$consulta = "UPDATE tiendas SET estatus = 'inactivo' WHERE id_tienda = ?";
			$parametros = array($idTienda);
			$respuesta = Request::consultaCudParametros(
				$consulta,
				$parametros
			);
			echo Response::messageToJson("200", "Successfully completed query", $respuesta);
		} else {
			header("HTTP/1.0 405 Parameters are empty");
		}
	} catch (PDOException $e) {
		echo Response::errorToJson($e);
	}
}
