<html>
    <head>
        <title>BUSCAR PRODUCTO</title>
    </head>
    <body>
        <h1>ACTUALIZAR PRODUCTO </h1>
<?php
$conexion=mysqli_connect("localhost","root","","pasosyhuellas") or die ("Problemas de conexion");
$codigo=$_POST['cod'];
$tipo=$_POST['tip'];
$linea=$_POST['linea'];
$referencia=$_POST['refere'];
$descripcion=$_POST['descrip'];
$talla=$_POST['talla'];
$cantidad=$_POST['can'];
$precio_c=$_POST['com'];
$precio_v=$_POST['ven'];
mysqli_query($conexion,"update productos set cod_producto='$codigo',TIPO_PRODUCTO='$tipo',LINEA_PRODUCTO='$linea',REFERENCIA_PRODUCTO='$referencia',DESCRIPCION='$descripcion',CANTIDAD='$cantidad',TALLA='$talla',precio_compra='$precio_c',precio_venta='$precio_v' where cod_producto=$codigo")or die("Problemas en el select".mysqli_error($conexion));
echo "Registros actualizados correctamente ";
mysqli_close($conexion);
?>