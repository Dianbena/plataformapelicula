<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Conecta a la base de datos  con usuario, contraseña y nombre de la BD
$servidor = "localhost"; $usuario = "root"; $contrasenia = ""; $nombreBaseDatos = "plataformapelicula";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos);


// Consulta datos y recepciona una clave para consultar dichos datos con dicha clave
if (isset($_GET["consultar"])){
    $sqlPeliculas = mysqli_query($conexionBD,"SELECT * FROM peliculas WHERE id=".$_GET["consultar"]);
    if(mysqli_num_rows($sqlPeliculas) > 0){
        $peliculas = mysqli_fetch_all($sqlPeliculas,MYSQLI_ASSOC);
        echo json_encode($peliculas);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}

//Inserta un nuevo registro y recepciona en método post 
if(isset($_GET["insertar"])){
    $data = json_decode(file_get_contents("php://input"));
    //$imagen=$data->imagen;
    $titulo=$data->titulo;
    $descripcion=$data->descripcion;
    $duracion=$data->duracion;
    $categoria=$data->categoria;
    $trailer=$data->trailer;
    $fecha_estreno=$data->fecha_estreno;
        if(($titulo!="")&&($descripcion!="") &&($duracion!="")&&($categoria!="")&&($trailer!="")&&($fecha_estreno!="")){
            
    $sqlPeliculas = mysqli_query($conexionBD,"INSERT INTO peliculas (id,imagen, titulo, descripcion, duracion, categoria, trailer, fecha_estreno, clalificacion) VALUES(67, 'imagen', '$titulo', '$descripcion', '$duracion', '$categoria', '$trailer', '$fecha_estreno', '5') ");
    echo json_encode(["success"=>1]);
        }
    exit();
}
// Actualiza datos pero recepciona datos  y una clave para realizar la actualización
if(isset($_GET["actualizar"])){
    
    $data = json_decode(file_get_contents("php://input"));

    $id=(isset($data->id))?$data->id:$_GET["actualizar"];
    $calificacion=$data->calificacion;
    
    $sqlPeliculas = mysqli_query($conexionBD,"UPDATE peliculas SET calificacion='$calificacion' WHERE id='$id'");
    echo json_encode(["success"=>1]);
    exit();
}
// Consulta todos los registros de la tabla empleados
$sqlPeliculas = mysqli_query($conexionBD,"SELECT * FROM peliculas ");
if(mysqli_num_rows($sqlPeliculas) > 0){
    $peliculas = mysqli_fetch_all($sqlPeliculas,MYSQLI_ASSOC);
    echo json_encode($peliculas);
}
else{ echo json_encode([["success"=>0]]); }


?>