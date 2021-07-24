<?php
//Clase para el manejo de las respuestas a las peticiones HTTP
declare(strict_types=1);
class RESPUESTAS
{
    //Recibe como parámetro la respuesta obtenida por la consulta y devuelve un string en formato JSON con la información de la respuesta
    public static function respuestaAJson(array $respuesta): string
    {
        //Convierte el array en un JSON
        $datos = json_encode(
            array(
                'response' => '200',
                'status' => 'Se obtuvieron los datos correctamente',
                'data' => $respuesta
            )
        );
        //Devuelve el string codificado a formato JSON
        return $datos;
    }

    //Recibe como parámetro una excepción y devuelve un string en formato JSON con los detalles del error
    public static function errorAJson(PDOException $e): string
    {
        $respuestaError = json_encode(
            array(
                //Obtiene el código de respuesta de la excepción
                'response' => $e->getCode(),
                'status' => 'Ocurrió un error, inténtelo mas tarde',
                //Obtiene el mensaje de la excepción
                'data' => $e->getMessage()
            )
        );
        //Devuelve el string codificado a formato JSON
        return $respuestaError;
    }

    //Recibe como parámetros la información de un mensaje personalizado como el código de la consulta, el mensaje y los datos 
    public static function mensajeAJson(string $codigo, string $mensaje, array $data): string
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
    public static function respuestaAObjeto(array $respuesta): object
    {
        //Convierte la respuesta obtenida a un JSON
        $json = self::respuestaAJson($respuesta);
        //Convierte el JSON a ub object por medio del método json_decode()
        $datos = json_decode($json);
        //Devuelve el objeto
        return $datos;
    }

}
