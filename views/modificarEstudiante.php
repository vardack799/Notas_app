<?php

    require '../models/estudiante.php';
    require '../controllers/conexionDbController.php';
    require '../controllers/baseController.php';
    require '../controllers/estudiantesController.php';
    use estudiante\Estudiante;
    use estudiantesController\estudiantesController;

    $estudiante = new Estudiante();
    $estudiante->setCodigo($_POST['codigo']);
    $estudiante->setNombre($_POST['nombres']);
    $estudiante->setApellido($_POST['apellidos']);

    if($estudiante->getCodigo() == null || empty(trim($estudiante->getNombre())) || empty(trim($estudiante->getApellido()))){
        echo '<script>';
        echo 'alert("Por favor complete los campos correspondientes");';
        echo '</script>';
        }else{
        $estudiantesController = new estudiantesController();
        $resultado = $estudiantesController->update($estudiante->getCodigo(), $estudiante);
        if($resultado){
            echo '<script>';
            echo 'alert("El estudiante ha sido modificado correctamente");';
            echo '</script>';
        }else{
            echo '<script>';
            echo 'alert("El estudiante no se ha podido modificar");';
            echo '</script>';
        }
    }

    echo '<a href="../index.php">Volver al inicio</a><br>'; 

?>
