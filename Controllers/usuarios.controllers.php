<?php
error_reporting(0);
require_once('../Models/usuarios.models.php');
$usuario = new ModeloUsuarios();
switch ($_GET['op']) {
    case 'login':
        $correo = $_POST['correo'];
        $contrasenia = $_POST['contrasenia'];
        if(empty($correo) or  empty($contrasenia)){
            header("Location:../index.php?op=2");
            exit();
        }
        $datos = array();
        $datos = $usuario->loginUsuario($contrasenia, $correo);
        $res = mysqli_fetch_assoc($datos);
        if (is_array($res) and count($res)>0) {
            //configurar la variables de session php
            $_SESSION["Usuarios_Nombres"] = $res["Usuarios_Nombres"];
            $_SESSION["Usuarios_Apellidos"] = $res["Usuarios_Apellidos"];
            $_SESSION["Usuarios_Correo"] = $res["Usuarios_Correo"];
            header("Location:../Views/Dashboard/");
            exit();
        }else{
            header("Location:../index.php?op=1");
            exit();
        }
        break;
}
