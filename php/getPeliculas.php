<?php 
header('Content-Type: application/json');

$jsonFile = '../data/peliculas.json';

// Get the content of the file

$jsonData = file_get_contents($jsonFile);

// Decode the JSON into an associative array

$data = json_decode($jsonData, true);

// Buscar si el parámetro nombre está presente en la URL

if (isset($_GET['nombre'])) {
    $peliculaName = $_GET['nombre'];
    $pelicula = null;
    foreach ($data['pelicula'] as $peli) {
        if (strpos(strtolower($peli['nombre']), strtolower($peliculaName)) !== false) {
            $pelicula = $peli;
            break; // Se encuentra el pelicula, se sale del bucle
        }
    }
    if ($pelicula) {
        echo json_encode($pelicula);
    } else {
        echo json_encode(null); // Si no se encuentra el pelicula, devuelve null
        echo json_encode(['error' => 'pelicula no encontrada']);
    }
} 
