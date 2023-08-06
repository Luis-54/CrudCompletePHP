<?php
include("../../bd.php");

if($_POST){
  $usuario=(isset($_POST["usuario"])?$_POST["usuario"]:"");
  $correo=(isset($_POST["correo"])?$_POST["correo"]:"");
  $password=(isset($_POST["password"])?$_POST["password"]:"");
  $sentencia=$conexion->prepare("INSERT INTO tbl_usuarios(id,usuario,correo,password) VALUES (NULL, :usuario,:correo,:password)");
  $sentencia->bindParam(":usuario",$usuario);
  $sentencia->bindParam(":correo",$correo);
  $sentencia->bindParam(":password",$password);
  $sentencia->execute();
  $mensaje="Registro Creado";
  header("Location:index.php?mensaje=" . $mensaje);
}

?>


<?php include ("../../templates/header.php"); ?>

<br>

<div class="card">
    <div class="card-header">
        datos Usuarios
    </div>
    <div class="card-body">

    <form action="" method="post" enctype="multipart/form-data">

    <div class="mb-3">
      <label for="usuario" class="form-label">Nombre de Usuario</label>
      <input type="text"
        class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Nombre de Usuario">
     </div>

     <div class="mb-3">
      <label for="correo" class="form-label">Correo Electronico</label>
      <input type="email"
        class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Correo Electronico">
     </div>

     <div class="mb-3">
      <label for="password" class="form-label">Contraseña</label>
      <input type="password"
        class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Contraseña">
     </div>

     <button type="submit" class="btn btn-success">Agregar</button>
     <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>


    </form>

    </div>
    <div class="card-footer text-muted"></div:>

</div>

<?php include ("../../templates/footer.php"); ?>