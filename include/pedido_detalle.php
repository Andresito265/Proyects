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
$cod_pedido_detalle=$_POST['cod_pedido_detalle'];
$pedido_cabeza=$_POST['pedido_cabeza'];
$producto_cod=$_POST['producto_cod'];
$cantidad=$_POST['cantidad'];
$precio_compra=$_POST['precio_compra'];
$subtotal=$_POST['subtotal'];
$subtotal=$cantidad*$precio_compra;
mysqli_query($conexion,"insert into pedido_detalle (pedidocabeza_cod,producto_cod,cantidad,precio_compra,subtotal) values ($pedido_cabeza,$producto_cod,$cantidad,$precio_compra,$subtotal)") or die("Problemas en el insert".mysqli_error($conexion));
$registros=mysqli_query($conexion,"select cod_pedido_detalle,pedidocabeza_cod,producto_cod,cantidad,precio_compra,subtotal from pedido_detalle");
echo "<table border='2' width='%80'> <tr><th>Codigo Pedido Detalle </th><th> Codigo Pedido Cabeza </th><th>Codigo Producto </th><th>Cantidad </th><th> Precio compra </th><th>Subtotal </th></tr> <tr>" ;
while($reg=mysqli_fetch_array($registros))
{
    echo "<td>".$reg['cod_pedido_detalle']."</td>";
    echo "<td>".$reg['pedidocabeza_cod']."</td>";
    echo "<td>".$reg['producto_cod']."</td>";
    echo "<td>".$reg['cantidad']."</td>";
    echo "<td>".$reg['precio_compra']."</td>";
    echo "<td>".$reg['subtotal']."</td> </tr>";
}
echo "</table>";
mysqli_close($conexion);
?>
    </body>
</html>