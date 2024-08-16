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
$codigofacturac=$_POST['cod_factura_c'];
$codepmleado=$_POST['cod_empleado'];
$fechaex=$_POST['fecha_ex'];
$fechaen=$_POST['fecha_en'];
$modoen=$_POST['modo_en'];
$guiaenv=$_POST['guia_e'];
$observaciones=$_POST['observaciones'];
if($opcion=="insertar"){
    mysqli_query($conexion,"insert into despachos(cod_factura_c,cod_empleado,fecha_expedicion,fecha_entrega,modo_entrega,guia_envio,observaciones) values ('$codigofacturac','$codepmleado','$fechaex','$fechaen','$modoen','$guiaenv','$observaciones')") or die("problemas en el select".mysqli_error($conexion));
    echo"Registro ingresado correctamente <br><br>";
    $registros=mysqli_query($conexion,"select cod_despachos,cod_factura_c,cod_empleado,fecha_expedicion,fecha_entrega,modo_entrega,guia_envio,observaciones") or die("problemas en el select". mysqli_error($conexion));
    echo "<table border='2' width='80%'><tr><td>Codigo despachos</td><td>codigo factura</td><td>codigo empleado</td><td>fecha entrega</td><td>modo entrega</td><td>Gia de envio</td><td>oservcion</td></tr><tr>";
    while($reg=mysqli_fetch_array($registros))
    {
        echo "<td>".$reg['cod_despachos']."</td>";
        echo "<td>".$reg['cod_factura_c']."</td>";
        echo "<td>".$reg['cod_empleado']."</td>";
        echo "<td>".$reg['fecha_expedicion']."</td>";
        echo "<td>".$reg['fecha_entrega']."</td>";
        echo "<td>".$reg['modo_entrega']."</td>";
        echo "<td>".$reg['guia_envio']."</td>";
        echo "<td>".$reg['observaciones']."</td></tr>";
    }
    echo"</table>";
}
elseif($opcion=="eliminar")
    {
    $buscar=$_POST['cod_factura_c'];
    $tipo=$_POST['opcion'];
    }
    if($tipo=="cod")
    {
        $registros=mysqli_query($conexion,"select (cod_despachos,cod_factura_c,cod_empleado,fecha_expedicion,fecha_entrega,modo_entrega,guia_envio,observaciones where cod_factura_c=$buscar") or die("Problemas en el Select".mysqli_error($conexion));
        if($reg=mysqli_fetch_array($registros))
        {
            mysqli_query($conexion,"delete cod_despachos,cod_factura_c,cod_empleado,fecha_expedicion,fecha_entrega,modo_entrega,guia_envio,observaciones where cod_factura_c=$buscar")or die("Problemas en el Select".mysqli_error($conexion));
            echo "Se efectuo la eliminacion del Cliente <br><br>";
            $registros=mysqli_query($conexion,"select cod_despachos,cod_factura_c,cod_empleado,fecha_expedicion,fecha_entrega,modo_entrega,guia_envio,observaciones where cod_factura_c=$buscar") or die("Problemas en el Select".mysqli_error($conexion));
            echo "<table border='2' width='80%'><tr><td>Codigo despachos</td><td>codigo factura</td><td>codigo empleado</td><td>fecha entrega</td><td>modo entrega</td><td>Gia de envio</td><td>oservcion</td></tr><tr>";
            while($reg=mysqli_fetch_array($registros))
            {
                echo "<td>".$reg['cod_cliente']."</td>";
                echo "<td>".$reg['nombre1']."</td>";
                echo "<td>".$reg['nombre2']."</td>";
                echo "<td>".$reg['apellido1']."</td>";
                echo "<td>".$reg['apellido2']."</td>";
                echo "<td>".$reg['tipo_documento']."</td>";
                echo "<td>".$reg['no_documento']."</td>";
                echo "<td>".$reg['direccion']."</td>";
                echo "<td>".$reg['telefono']."</td>";
                echo "<td>".$reg['correo_electronico']."</td></tr>";
            }
            echo "</table>";
        }
        else
        {
        echo "No existe el cliente Ingresado";
    }
    } 
    mysqli_close($conexion);
?>
</body>
</html>