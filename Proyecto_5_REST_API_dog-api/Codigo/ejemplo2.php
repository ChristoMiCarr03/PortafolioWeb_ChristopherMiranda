<?php
// Función para obtener la lista de razas
function getBreeds($apiKey) {
$url = "https://api.thedogapi.com/v1/breeds";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('x-api-key: ' . $apiKey));
$response = curl_exec($ch);
curl_close($ch);
return json_decode($response, true);
}
// Función para obtener imágenes de una raza específica
function getBreedImages($apiKey, $breedId, $limit = 5) {
$url = "https://api.thedogapi.com/v1/images/search?breed_id={$breedId}&limit={$limit}";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('x-api-key: ' . $apiKey));
$response = curl_exec($ch);
curl_close($ch);
return json_decode($response, true);
}
// Tu clave de API de The Dog API
$apiKey = 'live_x2ZFJhEix0Nuvz5zgAIAaxXkKRXXGDCc5UEtlJHgPXCSR2n5uZkosQXA7KVn6dQL'; // Reemplaza YOUR_API_KEY con tu clave de API
// Obtener la lista de razas
$breeds = getBreeds($apiKey);
// Mostrar la lista de razas
echo '<h1>Lista de Razas de Perros</h1>';
echo '<ul>';
foreach($breeds as $breed) {
echo '<li>' . $breed['name'] . ' (ID: ' . $breed['id'] . ')</li>';
}
echo '</ul>';
// ID de la raza …
$huskyId = 8; // ID de la raza Husky
// Obtener imágenes de la raza Husky
$huskyImages = getBreedImages($apiKey, $huskyId);
// Mostrar las imágenes de la raza Husky
echo '<h1>Imágenes de la raza Husky</h1>';
foreach($huskyImages as $image) {
echo '<img src="' . $image['url'] . '" alt="Husky" style="width:200px;"/><br/>';
}
?>