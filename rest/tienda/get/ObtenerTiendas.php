<?php

declare(strict_types=1);
include_once $_SERVER["DOCUMENT_ROOT"] . "/rest/HeaderApi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    try {
        $query = "SELECT * FROM tiendas";
        $response = Request::ConsultaSinParametros($query);
        echo Response::responseToJson($response);
    } catch (PDOException $e) {
        echo Response::errorToJson($e);
    }
}
