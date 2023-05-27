<?php

    require '../models/actividad.php';
    require '../controllers/conexionDbController.php';
    require '../controllers/baseController.php';
    require '../controllers/actividadesController.php';

    use actividad\Actividad;
    use actividadController\ActividadController;

    $id = empty($_GET['id'])?'' : $_GET['id'];
    $actividad = new Actividad();

    if(!empty($id)){ //id enviada por url
        $codigoEstudiante = $_GET['codigo'];
        $nombreEstudiante = $_GET['nombre'];
        $apellidoEstudiante = $_GET['apellido'];
        $titulo = 'Modificar Actividad';
        $urlAction = "modificarActividad.php";
        $actividadController = new ActividadController();
        $actividad = $actividadController->readRow($id);
    }else{ //por si no hay id
        $codigoEstudiante = $_POST['codigo'];
        $nombreEstudiante = $_POST['nombre'];
        $apellidoEstudiante = $_POST['apellido'];
        $titulo = 'Registrar Actividad';
        $urlAction = "registrarActividad.php";
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro de actividad</title>
</head>

<body>
    <h1><?php echo $titulo; ?></h1>
        <form action="<?php echo $urlAction; ?>" method="post">
        <label>
            <span>Nombre: <?php echo $nombreEstudiante . " " . $apellidoEstudiante?></span><br>
            <span>Código: <?php echo $codigoEstudiante ?></span>
            <input type="hidden" name="codigo" value="<?php echo $codigoEstudiante ?>">
            <br>
        </label>
        <label>
            <input type="hidden" name="nombre" value="<?php echo $nombreEstudiante ?>">
            <br>
        </label>
            <input type="hidden" name="apellido" value="<?php echo $apellidoEstudiante ?>">
        <label>
            <span>Descripción: </span>
            <input name="descripcion" value="<?php echo $actividad->getDescripcion(); ?>" ></input>
            <br><br>
        </label>
        <label>
            <span>Nota: </span>
            <input type="number" name="nota" min="0" step="0.01" max = "5"  value="<?php echo $actividad->getNota(); ?>" require>
            <br>
        </label>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <br>
        <button class="btnGuardar" type="submit">Guardar</button>
        </form>
</body>

</html>