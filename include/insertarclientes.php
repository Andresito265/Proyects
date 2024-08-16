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
$nombre1=$_POST['nom1'];
$nombre2=$_POST['nom2'];
$apellido1=$_POST['ape1'];
$apellido2=$_POST['ape2'];
$tipodoc=$_POST['tipdoc'];
$nodoc=$_POST['nodoc'];
$direc=$_POST['direc'];
$tel=$_POST['tel'];
$correo=$_POST['correo'];
$opcion=$_POST['opcion'];

if($opcion=="insertar"){
    mysqli_query($conexion,"insert into clientes(cod_cliente,nombre1,nombre2,apellido1,apellido2,tipo_documento,no_documento,direccion,telefono,correo_electronico) values ('$codigo','$nombre1','$nombre2','$apellido1','$apellido2','$tipodoc',$nodoc,'$direc','$tel','$correo')") or die("problemas en el select".mysqli_error($conexion));
    echo"Registro ingresado correctamente <br><br>";
    $registros=mysqli_query($conexion,"select cod_cliente,nombre1,nombre2,apellido1,apellido2,tipo_documento,no_documento,direccion,telefono,correo_electronico from clientes") or die("problemas en el select". mysqli_error($conexion));
    echo "<table border='2' width='80%'><tr><td>Codigo Cliente</td><td>Nombre 1</td><td>Nombre 2</td><td>Apellido 1 </td><td>Apellido 2</td><td>Tipo documento</td><td>No documento</td><td>direccion</td><td>TELEFONO</td><td>Correo electronico</td></tr><tr>";
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
    echo"</table>";
}
elseif($opcion=="eliminar")
    {
    $buscar=$_POST['cod'];
    $tipo=$_POST['opcion'];
    if($tipo=="cod")
    {
        $registros=mysqli_query($conexion,"select (cod_cliente,nombre1,nombre2,apellido1,apellido2,tipo_documento,no_documento,direccion,telefono,correo_electronico from clientes where nombre1=$buscar") or die("Problemas en el Select".mysqli_error($conexion));
        if($reg=mysqli_fetch_array($registros))
        {
            mysqli_query($conexion,"delete cod_cliente,nombre1,nombre2,apellido1,apellido2,tipo_documento,no_documento,direccion,telefono,correo_electronico from clientes where nombre1=$buscar")or die("Problemas en el Select".mysqli_error($conexion));
            echo "Se efectuo la eliminacion del Cliente <br><br>";
            $registros=mysqli_query($conexion,"select cod_cliente,nombre1,nombre2,apellido1,apellido2,tipo_documento,no_documento,direccion,telefono,correo_electronico from clientes where nombre1=$buscar") or die("Problemas en el Select".mysqli_error($conexion));
            echo "<table border='2' width='80%'><tr><td>Codigo Cliente</td><td>Nombre 1</td><td>Nombre 2</td><td>Apellido 1 </td><td>Apellido 2</td><td>Tipo documento</td><td>No documento</td><td>direccion</td><td>TELEFONO</td><td>Correo electronico</td></tr><tr>";
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
    else
    {
        $registros=mysqli_query($conexion,"select cod_cliente,nombre1,nombre2,apellido1,apellido2,tipo_documento,no_documento,direccion,telefono,correo_electronico from clientes where cod_cliente='$buscar'") or die("Problemas en el Select".mysqli_error($conexion));
        if($reg=mysqli_fetch_array($registros))
        {

            mysqli_query($conexion,"delete from clientes where cod_cliente='$buscar'")or die("Problemas en el Select".mysqli_error($conexion));
            echo "Se efectuo la eliminacion del cliente<br><br>";
            $registros=mysqli_query($conexion,"select cod_cliente,nombre1,nombre2,apellido1,apellido2,tipo_documento,no_documento,direccion,telefono,correo_electronico from clientes where nombre1='$buscar'") or die("Problemas en el Select".mysqli_error($conexion));
            echo "<table border='2' width='80%'><tr><td>Codigo Cliente</td><td>Nombre 1</td><td>Nombre 2</td><td>Apellido 1 </td><td>Apellido 2</td><td>Tipo documento</td><td>No documento</td><td>direccion</td><td>TELEFONO</td><td>Correo electronico</td></tr><tr>";
            while($reg=mysqli_fetch_array($registros))
            {
                echo "<td>".$reg['cod_cliente']."</td>";
                echo "<td>".$reg['nombre1']."</td>";
                echo "<td>".$reg['nombre2']."</td>";
                echo "<td>".$reg['apellido1']."</td>";
                echo "<td>".$reg['apellido2']."</td>";
                echo "<td>".$reg['tipo_documento']."</td>";echo "<td>".$reg['no_documento']."</td>";
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
    }
    elseif($opcion=='actualizar')
    {
        $registros=mysqli_query($conexion,"select cod_cliente,nombre1,nombre2,apellido1,apellido2,tipo_documento,no_documento,direccion,telefono,correo_electronico  from clientes where cod_cliente=cod_cliente") or die("Problemas en el Select".mysqli_error($conexion));
        if($reg=mysqli_fetch_array($registros))
    {
        ?>
        </form>
        <form method="POST" action="actualizarcliente.php">
            <table border="2">
                <tr><td>Codigo cliente</td><td><input type="number" name="cod" value="<?php echo $reg['cod_cliente'];?>"></td></tr>
                <tr><td>Nombre1</td><td><input type="text" name="nom1" value="<?php echo $reg['nombre1'];?>"></td></tr>
                <tr><td>Nombre2</td><td><input type="text" name="nombre2" value="<?php echo $reg['nombre2'];?>"></td></tr>
                <tr><td>Apellido1</td><td><input type="text" name="apellido1" value="<?php echo $reg['apellido1'];?>"></td></tr>
                <tr><td>Apellido2</td><td><input type="text" name="apellido2" value="<?php echo $reg['apellido2'];?>"></td></tr>
                <tr><td>Tipo_documento</td><td><input type="text" name="tipo_documento" value="<?php echo $reg['tipo_documento'];?>"></td></tr>
                <tr><td>No_documento</td><td><input type="text" name="no_documento" value="<?php echo $reg['no_documento'];?>"></td></tr>
                <tr><td>correo</td><td><input type="text" name="correo" value="<?php echo $reg['correo'];?>"></td></tr>
                <tr><td>Telefono</td><td><input type="text" name="telefono" value="<?php echo $reg['telefono'];?>"></td></tr>
                <tr><td>Direccion</td><td><input type="text" name="direccion" value="<?php echo $reg['direccion'];?>"></td></tr>
                <tr><td>Observaciones</td><td><input type="text" name="observaciones" value="<?php echo $reg['observaciones'];?>"></td></tr>
                <tr><td>Ciudad</td><td><input type="text" name="ciudad" value="<?php echo $reg['ciudad'];?>"></td></tr>
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