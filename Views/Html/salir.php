<?php

require_once('../../Config/sesiones.php');
session_destroy();
header('Location:../../index.php');
exit();
