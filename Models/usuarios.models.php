<?php
error_reporting(0);
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
        $cadena = "INSERT INTO `Usuarios`(`Usuarios_Nombres`, `Usuarios_Apellidos`, ".
        "`Usuarios_Correo`, `Usuarios_Contrasenia`, `Usuario_IdRoles`)  ".
        "VALUES ('$Usuarios_Nombres', '$Usuarios_Apellidos','$Usuarios_Correo','$Usuarios_Contrasenia', $Usuario_IdRoles)";
        
        if (mysqli_query($con, $cadena)) {
            return '1';
        }else{
            return 'error';
        }
    }
    public function editar($Usuarios_Id,$Usuarios_Nombres, $Usuarios_Apellidos,$Usuarios_Correo,$Usuarios_Contrasenia, $Usuario_IdRoles)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `Usuarios` SET 
        `Usuarios_Nombres`='$Usuarios_Nombres',
        `Usuarios_Apellidos`='$Usuarios_Apellidos',
        `Usuarios_Correo`='$Usuarios_Correo',
        `Usuarios_Contrasenia`='$Usuarios_Contrasenia',
        `Usuario_IdRoles`='$Usuario_IdRoles' WHERE 
        `Usuarios_Id`=$Usuarios_Id";
        if (mysqli_query($con, $cadena)) {
            return '1';
        }else{
            return 'error';
        }
    }
    public function eliminar($Usuarios_Id)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM `Usuarios` WHERE `Usuarios_Id`=$Usuarios_Id";
        if (mysqli_query($con, $cadena)) {
            return '1';
        }else{
            return 'error';
        }
       
    }
    public function uno($Usuarios_Id){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Usuarios` WHERE `Usuarios_Id`=$Usuarios_Id ";
        $datos=mysqli_query($con,$cadena);
        return $datos;
    }

    public function Cambiar($Usuarios_Correo,$Usuarios_Contrasenia)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `Usuarios` SET 
        `Usuarios_Contrasenia`='$Usuarios_Contrasenia' 
        WHERE `Usuarios_Correo`='$Usuarios_Correo'";
        if (mysqli_query($con, $cadena)) {
            return  'ok';
        }else{
            return 'error';
        }
    }
    public function verifica($Usuarios_Correo){
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT count(*) as numero FROM `Usuarios` WHERE `Usuarios_Correo` ='$Usuarios_Correo'";
        
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
}
