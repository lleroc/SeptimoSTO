<?php
require_once('../Config/conexion.php');
class ModeloRoles{
    public function TodosRoles(){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT `Roles_Id`, `Roles_Detalle` FROM `Roles` ";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
}