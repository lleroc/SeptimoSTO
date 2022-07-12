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
    public function todos(){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Usuarios`";
        $datos=mysqli_query($con,$cadena);
        return $datos;
    }
    public function insertar($Usuarios_Nombres, $Usuarios_Apellidos,$Usuarios_Correo,$Usuarios_Contrasenia, $Usuario_IdRoles)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `Usuarios`(`Usuarios_Id`, `Usuarios_Nombres`, `Usuarios_Apellidos`, ".
        "`Usuarios_Correo`, `Usuarios_Contrasenia`, `Usuario_IdRoles`)  ".
        "VALUES ('$Usuarios_Nombres', '$Usuarios_Apellidos','$Usuarios_Correo','$Usuarios_Contrasenia', $Usuario_IdRoles)";
        if (mysqli_query($con, $cadena)) {
            return 'ok';
        }else{
            return 'error';
        }
    }
}
