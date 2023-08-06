<?php
include("../../bd.php");

if($_POST){
  //Recolectamos los datos del metodo Post
  $nombredepuesto=(isset($_POST["nombredepuesto"])?$_POST["nombredepuesto"]:"");
  //Preparar la insercion de los datos
  $sentencia=$conexion->prepare("INSERT INTO tbl_puestos(id,nombredepuesto) VALUES (null, :nombredepuesto)");
  //Asignando los valores que vienen del metodo POST (los que vienen del formulario)
  $sentencia->bindParam(":nombredepuesto",$nombredepuesto);
  $sentencia->execute();
  $mensaje="Registro Creado";
  header("Location:index.php?mensaje=" . $mensaje);
}

?>

<?php include ("../../templates/header.php"); ?>
<br>

<div class="card">
    <div class="card-header">
        Puestos
    </div>
    <div class="card-body">

    <form action="" method="post" enctype="multipart/form-data">

    <div class="mb-3">
      <label for="nombredepuesto" class="form-label">Nombre de Puesto</label>
      <input type="text"
        class="form-control" name="nombredepuesto" id="nombredepuesto" aria-describedby="helpId" placeholder="Nombre de Puesto">
     </div>

     <button type="submit" class="btn btn-success">Agregar</button>
     <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>


    </form>

    </div>
    <div class="card-footer text-muted"></div:>

</div>

<?php include ("../../templates/footer.php"); ?>