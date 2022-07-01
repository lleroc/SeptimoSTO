<?php

require_once('../../Config/conexion.php');
session_destroy();
header('Location:../../index.php');
exit();
