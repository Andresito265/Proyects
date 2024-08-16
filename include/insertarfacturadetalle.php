<!DOCTYPE HTML>
<html languaje="es">
<head>
    <meta charset="utf-8">
    <title>Pasos & Huellas</title>
    <link rel="stylesheet" href="../CSS/EstiloBaseDatos.css">
</head>
<body>
<?php
$conexion=mysqli_connect("localhost","root","","pasosyhuellas") or die("Problemas de conexion");
$cod_faca=$_POST['cod_factura_cabeza'];
$forma_pago=$_POST['forma_pago'];
$cod_producto=$_POST['cod_producto'];
$cantidad=$_POST['cantidad'];
$valor_unitario=$_POST['valor_unitario'];
$subtotal=$_POST['subtotal'];
$iva=$_POST['iva'];
$descuento=$_POST['descuento'];
$neto=$_POST['neto'];
$subtotal=$cantidad*$valor_unitario;
if(strlen($forma_pago)=="efectivo")
{    
    $descuento=$subtotal*10/100;
}
elseif($forma_pago=="tarjeta_credito")
{
    $descuento=$subtotal*2.5/100;
}
elseif($forma_pago=="cheque")
{
    $descuento=$subtotal*5/100;
}
    $iva=$subtotal*19/100;
    $neto=$subtotal+$iva-$descuento;
    mysqli_query($conexion,"insert into factura_detalle(cod_factura_c,producto_cod,forma_pago,cantidad,valor_unitario,subtotal,iva,descuento,neto) values ($cod_faca,$cod_producto,'$forma_pago',$cantidad,$valor_unitario,$subtotal,$iva,$descuento,$neto)") or die("Problemas en el insert".mysqli_error($conexion));
    $registros=mysqli_query($conexion,"select cod_factura_detalle,cod_factura_cabeza,cod_producto,forma_pago,cantidad,valor_unitario,subtotal,iva,descuento,neto from factura_detalle");
    echo "<table border='2'> <tr><th>Cod Factura Detalle </th><th>Cod Factura Cabeza </th><th>Cod Producto </th><th>Forma de pago </th><th>Cantidad </th><th>Valor Unitario </th><th>Subtotal </th><th>IVA </th><th> Descuento </th><th>Neto</th></tr> <tr>" ;
while($reg=mysqli_fetch_array($registros))
{
    echo "<td>".$reg['cod_factura_detalle']."</td>";
    echo "<td>".$reg['cod_factura_cabeza']."</td>";
    echo "<td>".$reg['cod_producto']."</td>";
    echo "<td>".$reg['forma_pago']."</td>";
    echo "<td>".$reg['cantidad']."</td>";
    echo "<td>".$reg['valor_unitario']."</td>";
    echo "<td>".$reg['subtotal']."</td></tr>";
    echo "<td>".$reg['iva']."</td></tr>";
    echo "<td>".$reg['descuento']."</td></tr>";
    echo "<td>".$reg['neto']."</td></tr>";
}
        echo "</table>";
mysqli_close($conexion);
?>
</body>
</html>