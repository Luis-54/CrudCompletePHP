
<?php include ("templates/header.php"); ?>

  <div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
      <h1 class="display-5 fw-bold">Bienvenido al sistema</h1>
      <p class="col-md-8 fs-4"> Usuario : <?php echo $_SESSION['usuario'];?>.</p>
      <a name="" id="" class="btn btn-primary" href="secciones/empleados/" role="button">Inicio</a>
    </div>
    </div>

<?php include ("templates/footer.php"); ?>
