<?php
//Clase que contiene todos los métodos necesarios para realizar las consultas a la base de datos
declare(strict_types=1);
require $_SERVER['DOCUMENT_ROOT']."/utils/Database.php";

class CONSULTAS
{
	function _construct()
	{
	}

    //Recibe una consulta y devuelve un array asociativo con los registros obtenidos
	public static function ConsultaSinParametros(string $consulta): array
	{
        //Prepara la consulta y la almacena en la variable resultado
		$resultado = Database::getInstance()->getDb()->prepare($consulta);      
        //Ejecuta la consulta
		$resultado->execute();
        //fetchAll devuelve los registros obtenidos por la consulta en un   array asociativo
		return $resultado->fetchAll(PDO::FETCH_ASSOC);
	}

    //Recibe una consulta con sus un array conteniendo los parámetros indicados en la consulta con "?" y devuelve un array asociativo con los registros obtenidos
	public static function consultaParametros(string $consulta, array $datos): array
	{
        //Prepara la consulta  
		$resultado = Database::getInstance()->getDb()->prepare($consulta);
        //Executa la consulta con los datos enviados al método, estos deben estar ordenados de acuerdo a los símbolos "?" contenidos en la consulta
		$resultado->execute($datos);
        //Retorna los registros obtenidos por la consulta
		return $resultado->fetchAll(PDO::FETCH_ASSOC);
	}

    //Realiza una consulta de Creación, Actualización y Eliminación recibiendo como parámetros una consulta y sus respectivos datos
    public static function consultaCudParametros(string $consulta, array $datos): array
	{
		$resultado = Database::getInstance()->getDb()->prepare($consulta);
        //array de datos, la posicion de los '?' debe ser en el mismo orden de la posición de los elementos del array
		$resultado->execute($datos); 
        //Retorna un array asociativo con la cantidad de registros afectados por la consulta
        return array("registros_afectados" => $resultado->rowCount());
	}

}
