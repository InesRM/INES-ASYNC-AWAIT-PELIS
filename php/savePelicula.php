<?php 
//Guardar productos en un archivo JSON

//Si no existe el archivo, lo crea

if (!file_exists('../data/newPeliculas.json')) {
    $file = fopen('../data/newPeliculas.json', 'w');
    fclose($file);
}

//Obtener los productos actuales
$peliculas = file_get_contents('../data/newPeliculas.json');
$peliculas = json_decode($peliculas, true);

//Obtener los datos del producto
$pelicula = json_decode(file_get_contents('php://input'), true);

//Agregar el producto al array si no existía previamente
if (!in_array($pelicula, $peliculas)){
    $peliculas[] = $pelicula;
}
else{
    echo "El producto ya existe";
}


//Guardar el array en el archivo
file_put_contents('../data/newPeliculas.json', json_encode($peliculas, JSON_PRETTY_PRINT));

echo json_encode($peliculas, JSON_PRETTY_PRINT);

//Guardar un archivo de texto con el nombre del producto añadido también

$nombre = $pelicula['nombre'];
$archivo = fopen('../data/peliculas.txt', 'a');
//Escribir el nombre, el director y la clasificación de la película
fwrite($archivo, $nombre . " ". "Director: " ." ". $pelicula['director'] ." ". "Clasificación: " . $pelicula['clasificacion'] . "\n");

fclose($archivo);