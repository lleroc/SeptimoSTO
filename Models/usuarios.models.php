<?php

require_once('../Config/conexion.php');
class ModeloUsuarios
{
    public function loginUsuario($contrasenia, $correo)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Usuarios` WHERE 
        `Usuarios_Contrasenia` = '$contrasenia' and `Usuarios_Correo`='$correo'";
        $datos = mysqli_query($con, $cadena);
        
        return $datos;
    }
}
