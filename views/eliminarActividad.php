<?php

    require '../models/actividad.php';
    require '../controllers/conexionDbController.php';
    require '../controllers/baseController.php';
    require '../controllers/actividadesController.php';

    use actividadController\ActividadController;

    $id = $_GET['id'];
    $codigoEstudiante = $_GET['codigo'];
    $nombreEstudiante = $_GET['nombre'];
    $apellidoEstudiante = $_GET['apellido'];

    $actividadController = new ActividadController();
    $resultado = $actividadController->delete($id);
    if($resultado){
        echo '<script>';
        echo 'alert("La actividad ha sido eliminada correctamente");';
        echo '</script>';
    }else{
        echo '<script>';
        echo 'alert("No se ha podido modificar la actividad");';
        echo '</script>';
    }

    echo '<a href="../actividades.php?codigo=' . $codigoEstudiante . '&nombre=' . $nombreEstudiante . '&apellido=' . $apellidoEstudiante . '">Volver a actividades</a>';
    echo '<br>';
    echo '<a href="../index.php">Volver al inicio</a>';
?>