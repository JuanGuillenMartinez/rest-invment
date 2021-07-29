<?php 
declare(strict_types=1);
include_once $_SERVER["DOCUMENT_ROOT"] . "/rest/HeaderApi.php";

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $nombreTienda = $_GET["nombreTienda"];
    $parameters = array($nombreTienda);
    try {
        if(!Utils::parametersAreEmpty($parameters)) {
            $query = "CALL buscarTiendaPorNombre(?)";
            $response = Request::consultaParametros($query, $parameters);
            echo Response::responseToJson($response);
        } else {
            header("HTTP/1.0 405 Parameters are empty");
        }
    } catch (PDOException $e) {
        echo Response::errorToJson($e);
    }
}