<!DOCTYPE HTML>
<html languaje="es">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/EstiloBaseDatos.css">
</head>
<body>
    <title>Factura cabeza</title>
</head>
<body>
<?php
$conexion=mysqli_connect("localhost","root","","pasosyhuellas") or die("Problemas de conexion");
$fecha_entrega=$_POST['fecha_entrega'];
$cod_cliente=$_POST['cod_cliente'];
$fecha_expedicion=$_POST['fecha_expedicion'];
$provedor_cod=$_POST['provedor_cod'];
$empleado_cod=$_POST['empleado_cod'];
mysqli_query($conexion,"insert into factura_cabeza(fecha_expedicion,cliente_cod,fecha_entrega,cod_provedor,empleado_cod) values($fecha_expedicion,$cod_cliente,$fecha_entrega,$provedor_cod,$empleado_cod)") or die ("Problemas en el Select".mysqli_error($conexion));
echo "Registro ingresado correctamente <br><br>";
mysqli_close($conexion);
?>
</body>
</html>