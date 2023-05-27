<?php

    require '../models/estudiante.php';
    require '../controllers/conexionDbController.php';
    require '../controllers/baseController.php';
    require '../controllers/estudiantesController.php';
    use estudiantesController\estudiantesController;

    $estudiantesController = new estudiantesController();
    $resultado = $estudiantesController->delete($_GET['codigo']);
    if($resultado){
        echo '<script>';
        echo 'alert("Estudiante eliminado correctamente");';
        echo '</script>';
    }else{
        echo '<script>';
        echo 'alert("No se ha podido eliminar el estudiante");';
        echo '</script>';
    }

    echo '<br>
    <a href="../index.php">Volver al inicio</a>';

?>

