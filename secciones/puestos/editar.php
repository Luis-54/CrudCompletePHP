<?php
include("../../bd.php");

if(isset($_GET["txtID"])){
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";

    $sentencia=$conexion->prepare("SELECT * FROM tbl_puestos WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute(); 
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $nombredepuesto=$registro["nombredepuesto"];
  }   
    if($_POST){
      $txtID=(isset($_POST["txtID"]))?$_GET["txtID"]:"";
      $nombredepuesto=(isset($_POST["nombredepuesto"])?$_POST["nombredepuesto"]:"");
      $sentencia=$conexion->prepare("UPDATE  tbl_puestos SET nombredepuesto=:nombredepuesto WHERE id=:id");
      $sentencia->bindParam(":id",$txtID);
      $sentencia->bindParam(":nombredepuesto",$nombredepuesto);
      $sentencia->execute();
      $mensaje="Registro Actualizado";
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
      <label for="" class="form-label">ID:</label>
      <input type="text"
      value="<?php echo $txtID; ?>"
        class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="">
    </div>

    <div class="mb-3">
      <label for="nombredepuesto" class="form-label">Nombre de Puesto</label>
      <input type="text"
      value="<?php echo $nombredepuesto; ?>"
        class="form-control" name="nombredepuesto" id="nombredepuesto" aria-describedby="helpId" placeholder="Nombre de Puesto">
     </div>

     <button type="submit" class="btn btn-success">Actualizar</button>
     <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>


    </form>

    </div>
    <div class="card-footer text-muted"></div:>

</div>

<?php include ("../../templates/footer.php"); ?>