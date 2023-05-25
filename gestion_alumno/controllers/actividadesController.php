<?php

    namespace actividadController;

    use conexionDB\ConexionDBController;
    use baseControler\ActBaseController;
    use actividad\Actividad;
     

    class ActividadController extends ActBaseController{  

        function create($actividad){
            $sql = 'INSERT INTO actividades';
            $sql .= '(id, descripcion, nota, codigoEstudiante) values';
            $sql .= '(';
            $sql .= $actividad->getId(). ',';
            $sql .= '"' . $actividad->getDescripcion() . '",';
            $sql .= $actividad->getNota(). ',';
            $sql .= $actividad->getCodEstudiante(). ')';
            $conexiondb = new ConexionDBController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
        }
    }

?>