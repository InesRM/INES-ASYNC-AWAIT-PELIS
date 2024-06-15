<?php 
header('Content-Type: application/json');

try{

    $data = json_decode(file_get_contents('../data/peliculas.json'), true);

   if (isset($_GET['category'])) {
        $categoria = $_GET['category'];
        $categorias = array_filter($data['category'], function($cat) use ($categoria){
            return $cat['nombre'] === $categoria;
        });
    } else {
        $categorias = $data['clasificaciones'];
    }
    

    echo json_encode($categorias, JSON_PRETTY_PRINT);


}catch(Exception $e){
    echo json_encode(array(
        'error' => $e->getMessage()
    ));
}