<?php

    require '../models/actividad.php';
    require '../controllers/conexionDbController.php';
    require '../controllers/baseController.php';
    require '../controllers/actividadesController.php';

    use actividad\Actividad;
    use actividadController\ActividadController;

    $nombreEstudiante = $_POST['nombre'];
    $apellidoEstudiante = $_POST['apellido'];

    $actividad = new Actividad();
    $actividad->setDescripcion($_POST['descripcion']);
    $actividad->setNota($_POST['nota']);
    $actividad->setCodEstudiante($_POST['codigo']);

    if($actividad->getNota() == null || empty(trim($actividad->getDescripcion()))){
        echo '<script>';
        echo 'alert("Por favor complete los campos correspondientes correspondientes");';
        echo '</script>';
        echo '<a href="../actividades.php?codigo=' . $actividad->getCodEstudiante() . '&nombre=' . $nombreEstudiante . '&apellido=' . $apellidoEstudiante . '">Volver a actividades</a>';
    }else {

        $actividadController = new ActividadController();
        $resultado = $actividadController->Create($actividad);
        if($resultado){
            echo '<script>';
            echo 'alert("Actividad registrada correctamente");';
            echo '</script>';
                echo '<a href="../actividades.php?codigo=' . $actividad->getCodEstudiante() . '&nombre=' . $nombreEstudiante . '&apellido=' . $apellidoEstudiante . '">Volver a actividades</a>';
        }else{
            echo '<script>';
            echo 'alert("No se pudo registrar la actividad");';
            echo '</script>';
        }

    }
    echo '<br>
    <a href="index.php" >Volver al inicio</a><br>';

?>
