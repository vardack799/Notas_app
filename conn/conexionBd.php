<?php

//conectar abase de datos 

$servidor = "localhost"; //127.0.0.1
$usuario = "root";
$contrasena = ""; 

try{
    //pdo permite conectar a la base de datos
    $conexion= new PDO("mysql:host=$servidor;dbname=notas_bd", $usuario,$contrasena );
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     
    echo "conexion establecida";


    
}catch(PDOException $error){
    echo "conexion erronea".$error;
    die();


}

?>