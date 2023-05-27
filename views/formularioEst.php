<?php

    require '../models/estudiante.php';
    require '../controllers/conexionDbController.php';
    require '../controllers/baseController.php';
    require '../controllers/estudiantesController.php';

    use estudiante\Estudiante;
    use estudiantesController\estudiantesController;

    $code = empty($_GET['codigo'])?'' : $_GET['codigo'];
    $titulo = 'Registrar Estudiante';
    $urlAction = "registrarEstudiante.php";
    $estudiante = new Estudiante();
    if(!empty($code)){
        $titulo = 'Modificar Estudiante';
        $urlAction = "modificarEstudiante.php";
        $estudiantesController = new estudiantesController();
        $estudiante = $estudiantesController->readRow($code);
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro de estudiante</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <h1><?php echo $titulo; ?></h1>
    <form action="<?php echo $urlAction; ?>" method="post" >
        <label>
            <span>Código:</span>
            <input type="number" name="codigo" min="1" value="<?php echo $estudiante->getCodigo(); ?>" require>
        </label>
        <br><br>
        <label>
            <span>Nombre:</span>
            <input type="text" name="nombres" value="<?php echo $estudiante->getNombre(); ?>" require>
        </label>
        <br><br>
        <label>
            <span>Apellido:</span>
            <input type="text" name="apellidos" value="<?php echo $estudiante->getApellido(); ?>" require>
        </label>
        <br><br>
        <button class="btnGuardar" type="submit">Guardar</button>
    </form>


</body>

</html>