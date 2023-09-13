<?php
namespace Services;

class Curl{
    static function callEndpointGET($endpoint){
        $ch = curl_init($endpoint);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Devolver la respuesta en lugar de imprimirla en pantalla
        curl_setopt($ch, CURLOPT_HTTPGET, true); // Especifica que la solicitud es una GET

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error en la consulta cURL: ' . curl_error($ch);
        }

        curl_close($ch);
        return json_decode($response);
    }
}