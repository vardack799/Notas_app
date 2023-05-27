<?php

    namespace estudiantesController;

    use baseControler\BaseController;
    use conexionDb\ConexionDbController;
    use estudiante\Estudiante;

    class estudiantesController extends BaseController
    {

        function create($estudiante){
            $sql = 'INSERT INTO estudiantes ';
            $sql .= '(codigo, nombres, apellidos) values';
            $sql .= '(';
            $sql .= $estudiante->getCodigo(). ',';
            $sql .= '"' . $estudiante->getNombre(). '",';
            $sql .= '"' . $estudiante->getApellido() . '"';
            $sql .= ')';
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
        }

        function read(){
            $sql = 'SELECT * FROM estudiantes';
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $estudiantes = [];
           while($registro = $resultadoSQL -> fetch_assoc()){
                $estudiante = new Estudiante();
                $estudiante -> setCodigo($registro['codigo']);
                $estudiante -> setNombre($registro['nombres']);
                $estudiante -> setApellido($registro['apellidos']);
                array_push($estudiantes, $estudiante);
           } 
           $conexiondb->close();
           return $estudiantes;
        }

        function readRow($code){
            $sql = 'SELECT * FROM estudiantes';
            $sql .= ' WHERE codigo=' .$code;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $estudiante = new Estudiante();
           while($registro = $resultadoSQL -> fetch_assoc()){
                $estudiante -> setCodigo($registro['codigo']);
                $estudiante -> setNombre($registro['nombres']);
                $estudiante -> setApellido($registro['apellidos']);
           } 
           $conexiondb->close();
           return $estudiante;
        }

        function update($code, $estudiante){
            $sql = 'UPDATE estudiantes SET ';
            $sql .= 'codigo = ' .$estudiante->getCodigo() . ',';
            $sql .= 'nombres = "' . $estudiante->getNombre() . '",';
            $sql .= 'apellidos = "' . $estudiante->getApellido() . '" ';
            $sql .= 'WHERE codigo = ' .$code;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
        }

        function delete($code){
            $sql = 'DELETE FROM estudiantes WHERE codigo=' . $code;
            $conexiondb = new ConexionDbController();
            $resultadoSQL = $conexiondb->execSQL($sql);
            $conexiondb->close();
            return $resultadoSQL;
        }

    }

?>