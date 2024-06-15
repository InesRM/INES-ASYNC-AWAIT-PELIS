<?php 

try {
    // Leer el archivo JSON
    $peliculasData = json_decode(file_get_contents('../data/peliculas.json'), true);

    // Obtener la lista de películas (asegurándonos de usar la clave correcta)
    $peliculas = $peliculasData['pelicula'];

    // Seleccionar una película aleatoria
    $pelicula = $peliculas[rand(0, count($peliculas) - 1)];

    // Devolver la película en formato JSON
    echo json_encode($pelicula);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>