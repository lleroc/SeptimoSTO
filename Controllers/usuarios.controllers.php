<?php

/**
 * TODO:Clase para realziar acciones con usuarios
 */

require_once('../Models/usuarios.models.php');
require_once('../Models/correo.php');
$usuario = new ModeloUsuarios();
$correo = new EnvioCorreos();
switch ($_GET['op']) {
        //TODO:Procedimeinto para ingreso de usuarios
    case 'login':
        $correo = $_POST['correo'];
        $contrasenia = $_POST['contrasenia'];
        //TODO: Si las variables estab vacias rgersa con error
        if (empty($correo) or  empty($contrasenia)) {
            header("Location:../index.php?op=2");
            exit();
        }
        $datos = array();
        $datos = $usuario->loginUsuario($contrasenia, $correo);
        $res = mysqli_fetch_assoc($datos);
        //TODO:Control de si existe el registro en la base de datos
        if (is_array($res) and count($res) > 0) {
            /*TODO:configurar la variables de session php
            Si exite el usuario esto direcciona al dashboard
            */
            $_SESSION["Usuarios_Nombres"] = $res["Usuarios_Nombres"];
            $_SESSION["Usuarios_Apellidos"] = $res["Usuarios_Apellidos"];
            $_SESSION["Usuarios_Correo"] = $res["Usuarios_Correo"];
            $_SESSION["Usuario_IdRoles"] = $res["Usuario_IdRoles"];
            header("Location:../Views/Dashboard/");
            exit();
        } else {
            header("Location:../index.php?op=1");
            exit();
        }
        break;
        //TODO: Procedimiento para obtener todos los usuarios
    case 'todos':
        $datos = array();
        $datos = $usuario->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case 'insertar':
        $Usuarios_Nombres = $_POST['Usuarios_Nombres'];
        $Usuarios_Apellidos = $_POST['Usuarios_Apellidos'];
        $Usuarios_Correo = $_POST['Usuarios_Correo'];
        $Usuarios_Contrasenia = $_POST['Usuarios_Contrasenia'];
        $Usuario_IdRoles = $_POST['Usuario_IdRoles'];

        $datos = array();
        $datos = $usuario->insertar($Usuarios_Nombres, $Usuarios_Apellidos, $Usuarios_Correo, $Usuarios_Contrasenia, $Usuario_IdRoles);
        echo json_encode($datos);
        break;
    case 'editar':
        $Usuarios_Id = $_POST['Usuarios_Id'];
        $Usuarios_Nombres = $_POST['Usuarios_Nombres'];
        $Usuarios_Apellidos = $_POST['Usuarios_Apellidos'];
        $Usuario_IdRoles = $_POST['Usuario_IdRoles'];
        $Usuarios_Correo = $_POST['Usuarios_Correo'];
        $Usuarios_Contrasenia = $_POST['Usuarios_Contrasenia'];

        $datos = array();
        $datos = $usuario->editar($Usuarios_Id, $Usuarios_Nombres, $Usuarios_Apellidos, $Usuarios_Correo, $Usuarios_Contrasenia, $Usuario_IdRoles);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $Usuarios_Id = $_POST['Usuarios_Id'];
        $datos = array();
        $datos = $usuario->eliminar($Usuarios_Id);
        echo json_encode($datos);
        break;
    case 'uno':
        $Usuarios_Id = $_POST['Usuarios_Id'];
        $datos = array();
        $datos = $usuario->uno($Usuarios_Id);
        while ($fila = mysqli_fetch_assoc($datos)) {
            $uno[] = $fila;
        }
        echo json_encode($uno);
        break;
    case 'cambiar':
        $con1 = $_POST['contrasenia1'];
        $con2 = $_POST['contrasenia2'];
        $correo = $_GET['correo'];
        $clave = $_GET['clave'];
        if ($con1 !== $con2) {
            header("Location:../restablecer.php?op=2");
            exit();
        } else if ($correo == '' || $clave == '') {
            header("Location:../index.php?op=3");
            exit();
        } else {
            $datos = array();
            $datos = $usuario->Cambiar($Usuarios_Correo, $Usuarios_Contrasenia);
            echo $datos;
            if ($datos == 'ok') {
                header("Location:../index.php?op=4");
                exit();
            }
        }
        break;
    case 'verifica':
        $Usuarios_Correo = $_POST['Usuarios_Correo'];
        if (empty($Usuarios_Correo)) {
            header("Location:../contrasenia.php?op=2");
            exit();
        }
        $datos = array();
        $datos = $usuario->verifica($Usuarios_Correo);
        $numero = (mysqli_fetch_assoc($datos));
        if ((int)$numero['numero'] == 0) {
            //no existe el correo en nuestra base de datos
            header('Location:../contrasenia.php?op=1');
            die();
        } else {
            //procedimeinto para enviar el correo
            //cargar el modelo de correo
            $envio = $correo->recuperar($Usuarios_Correo);
            if ((int)$envio == 1) {
                header("Location:../index.php");
                exit();
            }
        }
}
