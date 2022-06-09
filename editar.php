<?php 
    require("conexion.php");
?>

<?php
    include("header.php");
?>
<?php
if($_GET){
    $id = $_GET['id'];
}?>
<?php
    if($_POST){
        session_start();
        $title = $_SESSION['title'] = $_POST['title'];
        $descripcion = $_SESSION['descripcion'] = $_POST['description'];
        $conexion = new conexion();
        $conexion->ejecutar("UPDATE `notas` SET `nota`='$title',`descripcion`='$descripcion' WHERE id=$id");
        header("Location:index.php");
        session_destroy();
    }
?>
<?php 
    $conexion = new conexion();
    $notas= $conexion->consultar("SELECT * FROM `notas`");
    foreach($notas as $nota){
        if($nota['id']==$id){
            $ide  = $nota['id'];
            $title = $nota['nota'];
            $description =$nota ['descripcion']; 
        }
    }
?>
<div class="contenedor">
<form class="hola" action="editar.php?id=<?php echo $ide;?>" method="post">
    <input type="text" value="<?php echo $title ?>" name="title" id="title" placeholder="Titulo" >
    <textarea name="description" id="description" cols="5" rows="5" placeholder="Descripcion" ><?php echo $description;?></textarea>
    <input type="submit" class="submit" value="update note">
</form>
<?php
    include("footer.php");
?>
