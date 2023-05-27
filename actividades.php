<?php

    require 'models/estudiante.php';
    require 'models/actividad.php';
    require 'controllers/conexionDbController.php';
    require 'controllers/baseController.php';
    require 'controllers/estudiantesController.php';
    require 'controllers/actividadesController.php';

    use estudiante\Estudiante;
    use actividad\Actividad;
    use actividadController\ActividadController;

    $cuentaNota = 0;
    $sumN = 0;

    $codigoEstudiante = $_GET['codigo'];
    $nombreEstudiante = $_GET['nombre'];
    $apellidoEstudiante = $_GET['apellido'];
    
    $actividadController = new ActividadController();
    $actividades = $actividadController->read($codigoEstudiante);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Actividades</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    
</body>

    <main>
            <h1>ACTIVIDADES</h1>
            <?php
            echo '<h3>Nombre: ' . $nombreEstudiante . " " . $apellidoEstudiante .'</h3>';
            echo '<h3>Código: ' . $codigoEstudiante . '</h3>';
            ?>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>ID Actividad</th>
                        <th>Actividad</th>
                        <th>Nota</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody><strong>
                    <?php
                    foreach($actividades as $actividad){
                        echo '<tr>';
                        echo '<td>' . $actividad->getId() . '</td>';
                        echo '<td>' . $actividad->getDescripcion() . '</td>';
                        echo '<td>' . $actividad->getNota() . '</td>';
                        echo '<td>';
                        echo '      <a href="views/formularioAct.php?id=' . $actividad->getId() . ' &codigo=' . $codigoEstudiante . '&nombre=' .       $nombreEstudiante . '&apellido=' . $apellidoEstudiante . '">Modificar</a>';
                        echo '      <a href="views/eliminarActividad.php?id=' . $actividad->getId() . '&codigo=' . $codigoEstudiante . '&nombre=' . $nombreEstudiante . '&apellido=' . $apellidoEstudiante . '">Eliminar</a>';
                        echo '</td>';
                        echo '</tr>';
                        $cuentaNota ++;
                        $sumN = $sumN + $actividad->getNota();
                    }

                    //Calcular el prom

                    if ($cuentaNota == 0 || $cuentaNota == "") {
                        echo '<script>';
                        echo 'alert("No hay actividades con notas disponibles");';
                        echo '</script>';
                        $imprimir= "";
                    } else {
                        $prom = $sumN / $cuentaNota;
                    
                        if ($prom >= 3) {
                            $imprimir = "Su promedio actual es: " . number_format($prom, 3);
                        } else if ($prom < 3) {
                            $imprimir = "Su promedio actual es: " . number_format($prom, 3);
                        }
                    }

                    ?>
                </tbody>
            </table>
            <br>
            <?php
            ?>
            <p><?php echo $imprimir ?></p>

                <?php
                // ingresa en un formulario oculto con datos ya anteriormente llenados 
                echo '<form action="views/formularioAct.php" method="post">';
                echo '<input type="hidden" name="codigo" value="' . $codigoEstudiante . '">';
                echo '<input type="hidden" name="nombre" value="' . $nombreEstudiante . '">';
                echo '<input type="hidden" name="apellido" value="' . $apellidoEstudiante . '">';
                echo '<button type="submit">Agregar actividad</button>';
                echo '</form>';

                ?>

            <a href="index.php">Volver al inicio</a>
        </main>

</html>