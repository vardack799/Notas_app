<?php

    require '../models/actividad.php';
    require '../controllers/conexionDbController.php';
    require '../controllers/baseController.php';
    require '../controllers/estudiantesController.php';
    require '../controllers/actividadesController.php';

    use actividad\Actividad;
    use actividadController\ActividadController;

    $nombreEstudiante = $_POST['nombre'];
    $apellidoEstudiante = $_POST['apellido'];

    $actividad = new Actividad();
    $actividad->setId($_POST['id']);
    $actividad->setDescripcion($_POST['descripcion']);
    $actividad->setNota($_POST['nota']);
    $actividad->setCodEstudiante($_POST['codigo']);

    if($actividad->getNota() == null || empty(trim($actividad->getDescripcion()))){
        echo '<script>';
        echo 'alert("Por favor complete los campos correspondientes");';
        echo '</script>';
    }else{
        $actividadController = new ActividadController();
        $resultado = $actividadController->update($actividad->getId(), $actividad);
        if($resultado){
            echo '<script>';
            echo 'alert("La actividad ha sido modificada correctamente");';
            echo '</script>';
            
        }else{
            echo '<script>';
            echo 'alert("No se ha podido modificar la actividad");';
            echo '</script>';
        }
    }
    echo '<a href="../actividades.php?codigo=' . $actividad->getCodEstudiante() . '&nombre=' . $nombreEstudiante . '&apellido=' . $apellidoEstudiante . '">Volver a actividades</a>';

    echo '<br>';
    echo '<a href="../index.php">Volver al inicio</a>';

?>

