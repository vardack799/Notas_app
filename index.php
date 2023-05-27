<?php

    require 'models/estudiante.php';
    require 'controllers/conexionDbController.php';
    require 'controllers/baseController.php';
    require 'controllers/estudiantesController.php';

    use estudiantesController\estudiantesController;

    $estudiantesController = new estudiantesController();

    $est = $estudiantesController->read();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>PAGINA PRINCIPAL</title>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
</head>

<body>
    <main>
        <h1><strong>Estudiantes registrados</h1>
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($est as $estudiante){
                    echo '<tr>';
                    echo '<td>' . $estudiante->getcodigo() . '</td>';
                    echo '<td>' . $estudiante->getNombre() . '</td>';
                    echo '<td>' . $estudiante->getApellido() . '</td>';
                    echo '<td>';
                    echo '      <a href="views/formularioEst.php?codigo=' . $estudiante->getcodigo() . '">Modificar</a>';
                    echo '      <a href="views/eliminarEstudiante.php?codigo=' . $estudiante->getcodigo() . '">Eliminar</a>';
                    echo '      <a href="actividades.php?codigo=' . $estudiante->getcodigo() . '&nombre=' . $estudiante->getNombre() . '&apellido=' . $estudiante->getApellido() . '">Notas</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                
                    // if($estudiante -> getCodigo() == "" || empty(trim($estudiante -> getNombre())) || empty(trim($estudiante -> getApellido()))){
                    //     echo '<script>';
                    //     echo 'alert("por favor registre completamente los campos");';
                    //     echo '</script>';
                    // }else{
                    //     $estudiantesController = new estudiantesController();
                    //     $resultado = $estudiantesController->Create($estudiante);
                    //     if($resultado){
                    //         echo '<script>';
                    //         echo 'alert("Estudiante Registrado");';
                    //         echo '</script>';

                    //     }else{
                    //         echo '<script>';
                    //         echo 'alert("no se ha podido registrar el estudiante");';
                    //         echo '</script>';
                            
                    //     }
                    // } 
              
                ?>
            </tbody>
        </table>
        <br>
        <a href="views/formularioEst.php">Agregar estudiante</a>
            </strong></main>
</body>

</html>