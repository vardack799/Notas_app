<?php

    require '../models/estudiante.php';
    require '../controllers/conexionDbController.php';
    require '../controllers/baseController.php';
    require '../controllers/usuariosController.php';
    use estudiante\Estudiante;
    use usuarioController\UsuarioController;

    $estudiante = new Estudiante();
    $estudiante->setCode($_POST['codigo']);
    $estudiante->setFirstName($_POST['nombres']);
    $estudiante->setLastName($_POST['apellidos']);

    $usuarioController = new UsuarioController();
    $resultado = $usuarioController->update($estudiante->getCode(), $estudiante);
    if($resultado){
        echo '<h1>Los datos del estudiante han sido modificados</h1>';
    }else{
        echo '<h1>No se han podido modificar los datos del estudiante</h1>';
    }
?>

<br>
<a href="../index.php">Volver</a>