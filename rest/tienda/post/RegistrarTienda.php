<?php 
declare(strict_types=1);
include_once $_SERVER["DOCUMENT_ROOT"] . "/rest/HeaderApi.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreTienda = $_POST["nombreTienda"];
    $nombreDueño = $_POST["nombreDueño"];
    $parameters = array($nombreTienda, $nombreDueño);
    try {
        if(!Utils::parametersAreEmpty($parameters)) {
            $query = "INSERT INTO tiendas(nombre_tienda, nombre_dueño) VALUES (?, ?)";
            $response = Request::consultaCudParametros($query, $parameters);
            echo Response::responseToJson($response);
        } else {
            header("HTTP/1.0 405 Parameters are empty");
        }
    } catch (PDOException $e) {
        echo Response::errorToJson($e);
    }
}