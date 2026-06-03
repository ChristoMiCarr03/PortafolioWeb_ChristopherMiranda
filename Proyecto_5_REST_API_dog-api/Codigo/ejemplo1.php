<?php
    // ID de la raza (por ejemplo, Husky)
    $breed_id = 15; // Puedes obtener el ID de la raza de la respuesta del paso 1
    // URL del endpoint de The Dog API para obtener imágenes de una raza específica
    $url = "https://api.thedogapi.com/v1/images/search?breed_id={$breed_id}&limit=5";
    // Inicializar cURL
    $ch = curl_init();
    // Configurar opciones de cURL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'x-api-key:live_kPgG9nK7Qau81Bj2Yi0LqylMSv4KHDbrSk8v1VxAzxCLrwD5Ec0tneR98fLp9E5S' // Reemplaza YOUR_API_KEY con tu clave de API de The Dog API
    ));
    // Ejecutar la solicitud
    $response = curl_exec($ch);
    // Verificar si hubo errores
    if($response === false) {
    echo 'Error: ' . curl_error($ch);
    } else {
    // Decodificar la respuesta JSON
    $data = json_decode($response, true);
    // Imprimir las URLs de las imágenes
    echo '<h1>Imágenes de la raza Husky</h1>';
    foreach($data as $image) {
    echo '<img src="' . $image['url'] . '" alt="Husky" style="width:200px;"/><br/>';
    }
    }
    // Cerrar cURL
    curl_close($ch);
?>