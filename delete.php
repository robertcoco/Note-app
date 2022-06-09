<?php
    include("conexion.php");
?>
<?php
    $conexion = new conexion();
    $conexion->delete($_POST['id']);
    header("Location:index.php");
?>