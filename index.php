<?php
    include("header.php");
?>
<?php 
    require("conexion.php");
?>
<?php
    if($_POST){
        session_start();
            $title = $_SESSION['title'] = $_POST['title'];
            $description = $_SESSION['description'] = $_POST['description'];
            $conexion = new conexion();
            $conexion->ejecutar("INSERT INTO `notas`(`id`, `nota`, `descripcion`, `tiempo`) VALUES ('[value-1]','$title','$description','[value-4]')");
        session_destroy();
        header("Location:index.php");
    }
?>

<?php
    $conexion = new conexion();
    $notas = $conexion->consultar("SELECT * FROM `notas`");
?>
<div class="contenedor">
<form class="hola" action="index.php" method="post">
        <input required type="text" name="title" id="title" placeholder="Titulo">
        <textarea required  name="description" id="description" cols="5" rows="5" placeholder="Descripcion"></textarea>
        <input type="submit" class="submit" value="new note">
</form>

<?php foreach($notas as $nota){ ?>
<div class="notes">
    <div class="title"><a href="editar.php?id=<?php echo $nota['id'];?>"><?php echo $nota['nota'] ?></a></div>
    <div class="description"><?php echo $nota['descripcion'] ?></div>
    <div class="date"><?php echo date("Y-m-d")?></div>
    <form action="delete.php" method="post">
    <input type="hidden" name="id" value="<?php echo $nota['id'];?>">
    <button id="button">X</button>
    </form>
</div>
<?php }?>
</div>
<?php
    include("footer.php");
?>