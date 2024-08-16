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
$cod=$_POST['cod'];
$razon=$_POST['razon'];
$tipodoc=$_POST['tipodoc'];
$nodoc=$_POST['nodoc'];
$direccion=$_POST['direccion'];
$tel=$_POST['tel'];
$infoa=$_POST['infoa'];
$tela=$_POST['tela'];
$op=$_POST['opcion'];
if($op=="insertar"){
    mysqli_query($conexion,"insert into provedores(razon_social,tipo_documento,no_documento,direccion,telefono,informacion_asesor,telefono_asesor) values ('$razon','$tipodoc','$nodoc','$direccion','$tel','$infoa','$tela')") or die("Problemas en el select".mysqli_error($conexion));
    echo"Registro ingresado correctamente";
}
elseif($op=="listar"){
    $registros=mysqli_query($conexion,"select cod_provedor,razon_social,tipo_documento,no_documento,direccion,telefono_asesor,informacion_asesor,telefono_asesor from provedores") or die("Problemas en el select".mysqli_error($conexion));
    echo"<table border='2'><tr><th>CODIGO DEL PROVEEDORE</th><th>RAZON SOCIAL</th><th>TIPO DE DOCUMENTO</th><th>NUMERO DE DOCUMENTO</th><th>DIRECCION</th><th>TELEFONO DEL ASESOR</th><th>INFORMACION ASESOR</th><th>TELEFONO DEL ASESOR</th></tr><tr>";
    while($reg=mysqli_fetch_array($registros)){
        echo"<td>".$reg['cod_provedor']."</td>";
        echo"<td>".$reg['razon_social']."</td>";
        echo"<td>".$reg['tipo_documento']."</td>";
        echo"<td>".$reg['no_documento']."</td>";
        echo"<td>".$reg['direccion']."</td>";
        echo"<td>".$reg['telefono']."</td>";
        echo"<td>".$reg['informacion_asesor']."</td>";
        echo"<td>".$reg['telefono_asesor']."</td></tr>";
    }
    echo"</table>";
}
elseif($op=="actualizar"){
    $registros=mysqli_query($conexion,"select cod_provedor,razon_social,tipo_documento,no_documento,direccion,telefono_asesor,informacion_asesor,telefono_asesor from provedores where cod_proveedor=$cod") or die("Problemas en el select".mysqli_error($conexion));
    if($reg=mysqli_fetch_array($registros))
    {
        ?>
        </form>
        <form method="POST" action="actualizarprovedores.php">
            <table border="2">
                <tr><th>Codigo del proveedor</th><td><input type="number" name="cod_P" value="<?php echo $reg['cod_provedor'];?>"></td></tr>
                <tr><th>Razon social</th><td><input type="text" name="razon_S" value="<?php echo $reg['razon_social'];?>"></td></tr>
                <tr><th>tipo de documento</th><td><input type="text" name="tipo_d" value="<?php echo $reg['tipo_documento'];?>"></td></tr>
                <tr><th>Numero de documento</th><td><input type="text" name="n_doc" value="<?php echo $reg['no_documento'];?>"></td></tr>
                <tr><th>Direccion</th><td><input type="text" name="direccion" value="<?php echo $reg['direccion'];?>"></td></tr>
                <tr><th>Telefono</th><td><input type="text" name="telefono_A" value="<?php echo $reg['telefono'];?>"></td></tr>
                <tr><th>Informacion asesor</th><td><input type="text" name="nombre_A" value="<?php echo $reg['informacion_asesor'];?>"></td></tr>
                <tr><th>Apellido del Asesor</th><td><input type="text" name="apellido_A" value="<?php echo $reg['telefono_asesor'];?>"></td></tr>
                <tr><th colspan="2"><input type="submit" value="ACTUALIZAR"></th></tr>
            </table>
        </form>  
        <?php
    }
    else
    {
        echo"Registro no existente";
    }
}
elseif ($op=="eliminar") {
    mysqli_query($conexion,"delete from provedores where cod_provedor=$cod")or die("Problemas en el Select".mysqli_error($conexion));
    echo "Se elimino el reguistro exitosamente";
}
mysqli_close($conexion);
?>
</body>
</html>