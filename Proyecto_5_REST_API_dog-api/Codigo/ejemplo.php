<?php
// URL del endpoint de The Dog API para obtener la lista de razas
$url = "https://api.thedogapi.com/v1/breeds";
// Inicializar cURL
$ch = curl_init();
// Configurar opciones de cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Reemplaza YOUR_API_KEY con tu clave de API de The Dog API
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
 'x-api-key:live_x2ZFJhEix0Nuvz5zgAIAaxXkKRXXGDCc5UEtlJHgPXCSR2n5uZkosQXA7KVn6dQL'
));
// Ejecutar la solicitud
$response = curl_exec($ch);
// Verificar si hubo errores
if($response === false) {
 echo 'Error: ' . curl_error($ch);
} else {
 // Decodificar la respuesta JSON
 $data = json_decode($response, true);

 // Imprimir los datos
 echo '<pre>';
 print_r($data);
 echo '</pre>';
}
// Cerrar cURL
curl_close($ch);
?>
