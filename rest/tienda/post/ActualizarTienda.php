<?php 
declare(strict_types=1);
include_once $_SERVER["DOCUMENT_ROOT"] . "/rest/HeaderApi.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $idTienda = $_POST["idTienda"];
    $nombreTienda = $_POST["nombreTienda"];
    $nombreDueño = $_POST["nombreDueño"];
    $estatus = $_POST["estatus"];
    $parameters = array($nombreTienda, $nombreDueño, $estatus, $idTienda);
    try {
        if(!Utils::parametersAreEmpty($parameters)) {
            $query = "UPDATE tiendas SET nombre_tienda = ?, nombre_dueño = ?, estatus = ? WHERE id_tienda = ?";
            $response = Request::consultaCudParametros($query, $parameters);
            echo Response::responseToJson($response);
        } else {
            header("HTTP/1.0 405 Parameters are empty");
        }
    } catch (PDOException $e) {
        echo Response::errorToJson($e);
    }
}