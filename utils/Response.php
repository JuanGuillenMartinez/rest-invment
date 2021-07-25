<?php
//Clase para el manejo de las respuestas a las peticiones HTTP
declare(strict_types=1);
class Response
{
    //Recibe como parámetro la respuesta obtenida por la consulta y devuelve un string en formato JSON con la información de la respuesta
    public static function responseToJson(array $respuesta): string
    {
        //Convierte el array en un JSON
        $datos = json_encode(
            array(
                'response' => '200',
                'status' => 'An error ocurred, try later',
                'data' => $respuesta
            )
        );
        //Devuelve el string codificado a formato JSON
        return $datos;
    }

    //Recibe como parámetro una excepción y devuelve un string en formato JSON con los detalles del error
    public static function errorToJson(PDOException $e): string
    {
        $respuestaError = json_encode(
            array(
                //Obtiene el código de respuesta de la excepción
                'response' => $e->getCode(),
                'status' => 'An error ocurred, try later',
                //Obtiene el mensaje de la excepción
                'data' => $e->getMessage()
            )
        );
        //Devuelve el string codificado a formato JSON
        return $respuestaError;
    }

    //Recibe como parámetros la información de un mensaje personalizado como el código de la consulta, el mensaje y los datos 
    public static function messageToJson(string $codigo, string $mensaje, array $data): string
    {
        $mensaje = json_encode(
            array(
                'response' => $codigo,
                'status' => $mensaje,
                'data' => $data
            )
        );
        //Devuelve el string codificado a formato JSON
        return $mensaje;
    }

    //Recibe como parametro un objeto de tipo JSON y devuelve un object
    public static function responseToObject(array $respuesta): object
    {
        //Convierte la respuesta obtenida a un JSON
        $json = self::responseToJson($respuesta);
        //Convierte el JSON a ub object por medio del método json_decode()
        $datos = json_decode($json);
        //Devuelve el objeto
        return $datos;
    }

}
