<?php
include("../../bd.php");

if(isset($_GET["txtID"])){
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";

    $sentencia=$conexion->prepare("SELECT * FROM tbl_usuarios WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute(); 
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $usuario=$registro["usuario"];
    $correo=$registro["correo"];
    $password=$registro["password"];
  }   
    if($_POST){
      $txtID=(isset($_POST["txtID"]))?$_GET["txtID"]:"";
      $usuario=(isset($_POST["usuario"])?$_POST["usuario"]:"");
      $correo=(isset($_POST["correo"])?$_POST["correo"]:"");
      $password=(isset($_POST["password"])?$_POST["password"]:"");
      $sentencia=$conexion->prepare("UPDATE tbl_usuarios SET usuario=:usuario, correo=:correo, password=:password WHERE id=:id");
      $sentencia->bindParam(":id",$txtID);
      $sentencia->bindParam(":usuario",$usuario);
      $sentencia->bindParam(":correo",$correo);
      $sentencia->bindParam(":password",$password);
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
      <label for="usuario" class="form-label">Nombre de Usuario</label>
      <input type="text"
      value="<?php echo $usuario; ?>"
        class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Nombre de Usuario">
     </div>

     <div class="mb-3">
      <label for="correo" class="form-label">Correo Electronico</label>
      <input type="email"
      value="<?php echo $correo; ?>"
        class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Correo Electronico">
     </div>

     <div class="mb-3">
      <label for="password" class="form-label">Contraseña</label>
      <input type="text"
      value="<?php echo $password; ?>"
        class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Contraseña">
     </div>

     <button type="submit" class="btn btn-success">Actualizar</button>
     <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>


    </form>

    </div>
    <div class="card-footer text-muted"></div:>

</div>

<?php include ("../../templates/footer.php"); ?>