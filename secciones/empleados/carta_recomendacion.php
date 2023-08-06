<?php
include("../../bd.php");

if(isset($_GET["txtID"])){
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";

    $sentencia=$conexion->prepare("SELECT *,(SELECT nombredepuesto
    FROM tbl_puestos
    WHERE tbl_puestos.id=tbl_empleados.idpuesto limit 1 ) as puesto FROM tbl_empleados WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute(); 
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $primernombre=$registro["primernombre"]; 
    $segundonombre=$registro["segundonombre"];
    $primerapellido=$registro["primerapellido"];
    $segundoapellido=$registro["segundoapellido"];

    $nombreCompleto=$primernombre." ".$segundonombre." ".$primerapellido." ".$segundoapellido;

    $foto=$registro["foto"];
    $cv=$registro["cv"];
    $idpuesto=$registro["idpuesto"];
    $puesto=$registro["puesto"];

    $fechadeingreso=$registro["fechadeingreso"];

    $fechaInicio= new DateTime($fechadeingreso);
    $fechaFin=new DateTime(date('Y-m-d'));
    $difrencia=date_diff($fechaInicio,$fechaFin);
}
ob_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carta de Recomendacion</title>
</head>
<body>
    <h1>Carta Recomdacion Laboral</h1>

    <br><br>
    Bogota, Colombia a <strong><?php echo date('d/m/y');?></strong>
    <br><br>
    A quien pueda interesar:
    <br><br>
    Reciba un cordias y respetuoso salu.document.
    <br><br>
    A traves de la presente deseo hacer de su conocimiento que el/la Sr(a) <strong><?php echo $nombreCompleto?></strong>,
    quien laboro en mi organizacion durante <strong> <?php echo $difrencia->y?> año(s) </strong>
    es un ciudadano con una conducta intachable. Ha demostrado ser un exelente trabajador,
    comprometido, resposable y fiel cumplidor de sus tareas.
    Siempre ha manifestado preocupacion por mejorar, capacitarse y actualizar sus conocimientos.
    <br><br>
    Durante estos años se ha desempeñado como: <strong> <?php echo $puesto?> </strong>
    Considere esta recomendacion, con la confianza de que estara siempre a la altura de sus compromisos y responsabilidades.
    <br><br>
    Sin mas nada a que referirme y, esperando que esta misiva sea tomada en cuenta, dejo mi numero de contacto para cualquier informacion de interes.
    <br><br><br><br><b></b><br><br>
    __________________________________________
    <br>
    Atentamente,
    <br>
    Ing Juan Martinez Uh
</body>
</html>


<?php
$HTML =ob_get_clean();
require_once("../../libs/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$opciones= $dompdf -> getOptions();
$opciones ->set(array("isRemoteEnabled"=>true));
$dompdf -> setOptions($opciones);
$dompdf -> loadHTML($HTML);
$dompdf -> setPaper('letter');
$dompdf -> render();
$dompdf -> stream("archivo.pdf", array("attachement"=>false));

?>