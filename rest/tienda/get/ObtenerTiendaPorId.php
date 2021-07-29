<?php 
declare(strict_types=1);
include_once $_SERVER["DOCUMENT_ROOT"] . "/rest/HeaderApi.php";

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $idTienda = $_GET["idTienda"];
    $parameters = array($idTienda);
    try {
        if(!Utils::parametersAreEmpty($parameters)) {
            $query = "SELECT * FROM tiendas WHERE id_tienda = ? LIMIT 1";
            $response = Request::consultaParametros($query, $parameters);
            echo Response::responseToJson($response);
        } else {
            header("HTTP/1.0 405 Parameters are empty");
        }
    } catch (PDOException $e) {
        echo Response::errorToJson($e);
    }
}