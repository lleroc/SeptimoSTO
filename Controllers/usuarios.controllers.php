<?php
/**
 * TODO:Clase para realziar acciones con usuarios
 */
error_reporting(0);
require_once('../Models/usuarios.models.php');
$usuario = new ModeloUsuarios();
switch ($_GET['op']) {
    //TODO:Procedimeinto para ingreso de usuarios
    case 'login':
        $correo = $_POST['correo'];
        $contrasenia = $_POST['contrasenia'];
        //TODO: Si las variables estab vacias rgersa con error
        if(empty($correo) or  empty($contrasenia)){
            header("Location:../index.php?op=2");
            exit();
        }
        $datos = array();
        $datos = $usuario->loginUsuario($contrasenia, $correo);
        $res = mysqli_fetch_assoc($datos);
        //TODO:Control de si existe el registro en la base de datos
        if (is_array($res) and count($res)>0) {
            /*TODO:configurar la variables de session php
            Si exite el usuario esto direcciona al dashboard
            */
            $_SESSION["Usuarios_Nombres"] = $res["Usuarios_Nombres"];
            $_SESSION["Usuarios_Apellidos"] = $res["Usuarios_Apellidos"];
            $_SESSION["Usuarios_Correo"] = $res["Usuarios_Correo"];
            $_SESSION["Usuario_IdRoles"] = $res["Usuario_IdRoles"];
            header("Location:../Views/Dashboard/");
            exit();
        }else{
            header("Location:../index.php?op=1");
            exit();
        }
        break;
    //TODO: Procedimiento para obtener todos los usuarios
    case 'todos':
        $datos = array();
        $datos = $usuario->todos();
        while($fila = mysqli_fetch_assoc($datos)){
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case 'insertar':
        $Usuarios_Nombres = $_POST['Usuarios_Nombres'];
        $Usuarios_Apellidos = $_POST['Usuarios_Apellidos'];
        $Usuarios_Correo= $_POST['Usuarios_Correo'];
        $Usuarios_Contrasenia= $_POST['Usuarios_Contrasenia'];
        $Usuario_IdRoles= $_POST['Usuario_IdRoles'];

        $datos = array();
        $datos = $usuario->insertar($Usuarios_Nombres, $Usuarios_Apellidos,$Usuarios_Correo,$Usuarios_Contrasenia, $Usuario_IdRoles);
        echo json_encode($datos);
        break;
}
