
<?php 
require_once('../../Config/conexion.php');
if(isset($_SESSION['Usuario_IdRoles'])){
?>

<!-- codigo html-->

<?php
}else{
    header('Location:../../index.php');
}

?>