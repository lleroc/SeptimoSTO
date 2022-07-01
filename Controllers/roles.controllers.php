<?php
error_reporting(0);
require_once('../Models/roles.models.php');
$roles = new ModeloRoles();
switch ($_GET['op']) {
    case 'TodosRoles':
        $datos = array();
        $datos = $roles->TodosRoles();
        while($fila = mysqli_fetch_assoc($datos)){
            $todos[]=$fila;
        }
        echo json_encode($todos);
        break;
}
