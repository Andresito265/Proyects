<!DOCTYPE HTML>
<html languaje="es">
<head>
    <meta charset="utf-8">
    <title>Pasos & Huellas</title>
    <link rel="stylesheet" href="../CSS/EstiloBaseDatos.css">
</head>
<body>
    <title>Pedido cabeza</title>
</head>
<body>
<?php
$conexion=mysqli_connect("localhost","root","","pasosyhuellas") or die("Problemas de conexion");
$provedor_cod=$_POST['provedor_cod'];
$empleado_cod=$_POST['empleado_cod'];
$fecha_expedicion=$_POST['fecha_expedicion'];
$cod_pedido_cabeza=$_POST['cod_pedido_cabeza'];
mysqli_query($conexion,"insert into pedido_cabeza(provedor_cod,empleado_cod,fecha_expedicion,cod_pedido_cabeza) values($provedor_cod,$empleado_cod,$fecha_expedicion,$cod_pedido_cabeza)") or die ("Problemas en el Select".mysqli_error($conexion));
echo "Registro ingresado correctamente <br><br>";
mysqli_close($conexion);
?>
</body>
</html>