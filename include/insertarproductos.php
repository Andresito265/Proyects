<!DOCTYPE HTML>
<html languaje="es">
<head>
    <meta charset="utf-8">
    <title>Pasos & Huellas</title>
    <link rel="stylesheet" href="../CSS/EstiloBaseDatos.css">
</head>
<body>
<?php
$conexion=mysqli_connect("localhost","root","","pasosyhuellas");
$codigo=$_POST['cod'];
$tipo=$_POST['tip'];
$linea=$_POST['linea'];
$referencia=$_POST['refere'];
$descripcion=$_POST['descrip'];
$talla=$_POST['talla'];
$cantidad=$_POST['can'];
$precio_c=$_POST['com'];
$precio_v=$_POST['ven'];
$opcion=$_POST['opcion'];

if($opcion=="insertar"){
    mysqli_query($conexion,"insert into productos(cod_producto,TIPO_PRODUCTO,LINEA_PRODUCTO,REFERENCIA_PRODUCTO,DESCRIPCION,CANTIDAD,TALLA,PRECIO_COMPRA,PRECIO_VENTA) values ('$codigo','$tipo','$linea','$referencia','$descripcion','$cantidad','$talla','$precio_c','$precio_v')") or die("problemas en el select".mysqli_error($conexion));
    echo"Registro ingresado correctamente <br><br>";
    $registros=mysqli_query($conexion,"select cod_producto,TIPO_PRODUCTO,LINEA_PRODUCTO,REFERENCIA_PRODUCTO,DESCRIPCION,CANTIDAD,TALLA,PRECIO_COMPRA,PRECIO_VENTA from productos") or die("problemas en el select". mysqli_error($conexion));
    echo "<table border='2' width='80%'><tr><td>CODIGO PRODUCTO</td><td>TIPO PRODUCTO</td><td>LINEA PRODUCTO</td><td>REFERENCIA</td><td>DESCRIPCION</td><td>CANTIDAD</td><td>TALLA</td><td>PRECIO_COMPRA</td><td>PRECIO_VENTA</td></tr><tr>";
    while($reg=mysqli_fetch_array($registros))
        {
            echo "<td>".$reg['cod_producto']."</td>";
            echo "<td>".$reg['TIPO_PRODUCTO']."</td>";
            echo "<td>".$reg['LINEA_PRODUCTO']."</td>";
            echo "<td>".$reg['REFERENCIA_PRODUCTO']."</td>";
            echo "<td>".$reg['DESCRIPCION']."</td>";
            echo "<td>".$reg['CANTIDAD']."</td>";
            echo "<td>".$reg['TALLA']."</td>";
            echo "<td>".$reg['PRECIO_COMPRA']."</td>";
            echo "<td>".$reg['PRECIO_VENTA']."</td></tr>";
        }
        echo"</table>";
    }
    elseif($opcion=="eliminar")
        {    
            $buscar=$_POST['cod'];
            $tipo=$_POST['opcion'];
            if($tipo=="cod")
        {
            $registros=mysqli_query($conexion,"select cod_producto,TIPO_PRODUCTO,LINEA_PRODUCTO,REFERENCIA_PRODUCTO,DESCRIPCION,CANTIDAD,TALLA,PRECIO_COMPRA,PRECIO_VENTA from productos where cod_producto=$buscar") or die("Problemas en el Select".mysqli_error($conexion));
            if($reg=mysqli_fetch_array($registros))
        {
            mysqli_query($conexion,"delete cod_producto,TIPO_PRODUCTO,LINEA_PRODUCTO,REFERENCIA_PRODUCTO,DESCRIPCION,CANTIDAD,TALLA,PRECIO_COMPRA,PRECIO_VENTA from productos where cod_producto=$buscar")or die("Problemas en el Select".mysqli_error($conexion));
            echo "Se efectuo la eliminacion del producto <br><br>";
            echo "<table border='2' width='80%'><tr><td>CODIGO PRODUCTO</td><td>TIPO PRODUCTO</td><td>LINEA PRODUCTO</td><td>REFERENCIA</td><td>DESCRIPCION</td><td>CANTIDAD</td><td>TALLA</td><td>PRECIO_COMPRA</td><td>PRECIO_VENTA</td></tr><tr>";
            while($reg=mysqli_fetch_array($registros))
            {
                echo "<td>".$reg['cod_producto']."</td>";
                echo "<td>".$reg['TIPO_PRODUCTO']."</td>";
                echo "<td>".$reg['LINEA_PRODUCTO']."</td>";
                echo "<td>".$reg['REFERENCIA_PRODUCTO']."</td>";
                echo "<td>".$reg['DESCRIPCION,CANTIDAD']."</td>";
                echo "<td>".$reg['CANTIDAD']."</td>";
                echo "<td>".$reg['TALLA']."</td>";
                echo "<td>".$reg['PRECIO_COMPRA']."</td>";
                echo "<td>".$reg['PRECIO_VENTA']."</td></tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "No existe el cliente Ingresado";
        }
        }   
        else
        {
            $registros=mysqli_query($conexion,"select cod_producto,TIPO_PRODUCTO,LINEA_PRODUCTO,REFERENCIA_PRODUCTO,DESCRIPCION,CANTIDAD,TALLA,PRECIO_COMPRA,PRECIO_VENTA from productos where cod_producto='$buscar'") or die("Problemas en el Select".mysqli_error($conexion));
            if($reg=mysqli_fetch_array($registros))
            {
                mysqli_query($conexion,"delete from productos where cod_producto='$buscar'")or die("Problemas en el Select".mysqli_error($conexion));
                echo "Se efectuo la eliminacion del producto<br><br>";
                $registros=mysqli_query($conexion,"select cod_producto,TIPO_PRODUCTO,LINEA_PRODUCTO,REFERENCIA_PRODUCTO,DESCRIPCION,CANTIDAD,TALLA,PRECIO_COMPRA,PRECIO_VENTA from productos where cod_producto='$buscar'") or die("Problemas en el Select".mysqli_error($conexion));
                echo "<table border='2' width='80%'><tr><td>CODIGO PRODUCTO</td><td>TIPO PRODUCTO</td><td>LINEA PRODUCTO</td><td>REFERENCIA</td><td>DESCRIPCION</td><td>CANTIDAD</td><td>TALLA</td><td>PRECIO_COMPRA</td><td>PRECIO_VENTA</td></tr><tr>";
                while($reg=mysqli_fetch_array($registros))
                {
                echo "<td>".$reg['cod_producto']."</td>";
                echo "<td>".$reg['TIPO_PRODUCTO']."</td>";
                echo "<td>".$reg['LINEA_PRODUCTO']."</td>";
                echo "<td>".$reg['REFERENCIA_PRODUCTO']."</td>";
                echo "<td>".$reg['DESCRIPCION,CANTIDAD']."</td>";
                echo "<td>".$reg['CANTIDAD']."</td>";
                echo "<td>".$reg['TALLA']."</td>";
                echo "<td>".$reg['PRECIO_COMPRA']."</td>";
                echo "<td>".$reg['PRECIO_VENTA']."</td></tr>";
            }
            echo "</table>";
            }
            else
            {
                echo "No existe el producto Ingresado";
            }
        }
        }
        elseif($opcion=='actualizar')
        {
            $registros=mysqli_query($conexion,"select cod_producto,TIPO_PRODUCTO,LINEA_PRODUCTO,REFERENCIA_PRODUCTO,DESCRIPCION,CANTIDAD,TALLA,PRECIO_COMPRA,PRECIO_VENTA from productos where cod_producto=cod_producto") or die("Problemas en el Select".mysqli_error($conexion));
            if($reg=mysqli_fetch_array($registros))
            {
                ?>
                </form>
                <form method="POST" action="actualizarproducto.php">
                    <table border="2">
                        <tr><td>Codigo producto</td><td><input type="number" name="cod" value="<?php echo $reg['cod_producto'];?>"></td></tr>
                        <tr><td>Tipo</td><td><input type="text" name="tip" value="<?php echo $reg['TIPO_PRODUCTO'];?>"></td></tr>
                        <tr><td>Linea</td><td><input type="text" name="linea" value="<?php echo $reg['LINEA_PRODUCTO'];?>"></td></tr>
                        <tr><td>Referencia</td><td><input type="text" name="refere" value="<?php echo $reg['REFERENCIA_PRODUCTO'];?>"></td></tr>
                        <tr><td>Descripcion</td><td><input type="text" name="descrip" value="<?php echo $reg['DESCRIPCION'];?>"></td></tr>
                        <tr><td>Cantidad</td><td><input type="number" name="can" value="<?php echo $reg['CANTIDAD'];?>"></td></tr>
                        <tr><td>Talla</td><td><input type="number" name="talla" value="<?php echo $reg['TALLA'];?>"></td></tr>
                        <tr><td>Precio_compra</td><td><input type="text" name="c" value="<?php echo $reg['PRECIO_COMPRA'];?>"></td></tr>
                        <tr><td>Precio_venta</td><td><input type="text" name="v" value="<?php echo $reg['PRECIO_VENTA'];?>"></td></tr>
                        <tr><td colspan="4"><input type="submit" value="actualizar"></th></tr>
                    </table>
                </form>
                <?php
                }
                else
                {
                    echo "registro actualizado";
                }
            }
            mysqli_close($conexion);
            ?>
</body>
</html>