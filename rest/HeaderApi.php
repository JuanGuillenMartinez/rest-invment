<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('content-type: application/json; charset=utf-8');
require_once $_SERVER['DOCUMENT_ROOT'] . "/utils/Request.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/utils/Response.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/utils/Utils.php";