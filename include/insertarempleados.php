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
$codigo=$_POST['cod'];
$nom1=$_POST['nombre1'];
$nom2=$_POST['nombre2'];
$ape1=$_POST['apellido1'];
$ape2=$_POST['apellido2'];
$estado=$_POST['estado'];
$sexo=$_POST['sexo'];
$estudios=$_POST['estudios'];
$rh=$_POST['rh'];
$eps=$_POST['eps'];
$pension=$_POST['pension'];
$arl=$_POST['arl'];
$tipodoc=$_POST['tipdoc'];
$ndoc=$_POST['nodoc'];
$direccion=$_POST['direc'];
$tel=$_POST['tel'];
$correo=$_POST['correo'];;
$codc=$_POST['codc'];

$op=$_POST['opcion'];
if($op=="insertar"){
    mysqli_query($conexion,"insert into empleados(nombre1,nombre2,apellido1,apellido2,estado_civil,sexo,estudios_realizados,rh,eps,pensiones,arl,tipo_documento,no_documento,direccion,telefono,correo_electronico,cargo_cod) values('$nom1','$nom2','$ape1','$ape2','$estado','$sexo','$estudios','$rh','$eps','$pension','$arl','$tipodoc','$ndoc','$direccion','$tel','$correo','$codc')") or die("Problemas en el select".mysqli_error($conexion));
    echo"Registro ingresado correctamente<br><br>";
}
elseif($op=="listar"){
    $registros=mysqli_query($conexion,"select cod_empleado,nombre1,nombre2,apellido1,apellido2,estado_civil,sexo,estudios_realizados,rh,eps,pensiones,arl,tipo_documento,no_documento,direccion,telefono,correo_electronico,cargo_Cod from empleados") or die("Problemas en el select".mysqli_error($conexion));
    echo"<table border='2'><tr><th>cod_Empleado</th><th>Nombre 1</th><th>Nombre 2</th><th>Apellido 1</th><th>Apellido 2</th><th>estado civil</th><th>sexo</th><th>estudios realizados</th><th>rh</th><th>eps</th><th>pensiones</th><th>arl</th><th>tipo documento</th><th>numero documento</th><th>direccion</th><th>telefono</th><th>correo electronico</th><th>cod_cargo</th></tr><tr>";
    while($reg=mysqli_fetch_array($registros))
    {
        echo"<td>".$reg['cod_empleado']."</td>";
        echo"<td>".$reg['nombre1']."</td>";
        echo"<td>".$reg['nombre2']."</td>";
        echo"<td>".$reg['apellido1']."</td>";
        echo"<td>".$reg['apellido2']."</td>";
        echo"<td>".$reg['estado_civil']."</td>";
        echo"<td>".$reg['sexo']."</td>";
        echo"<td>".$reg['estudios_realizados']."</td>";
        echo"<td>".$reg['rh']."</td>";
        echo"<td>".$reg['eps']."</td>";
        echo"<td>".$reg['pensiones']."</td>";
        echo"<td>".$reg['arl']."</td>";
        echo"<td>".$reg['tipo_documento']."</td>";
        echo"<td>".$reg['no_documento']."</td>";
        echo"<td>".$reg['direccion']."</td>";
        echo"<td>".$reg['telefono']."</td>";
        echo"<td>".$reg['correo_electronico']."</td>";
        echo"<td>".$reg['cod_cargo']."</td></tr>";
    }
    echo"</table>";
}
elseif($op=="actualizar"){
    $registros_A=mysqli_query($conexion,"select cod_empleado,nombre1,nombre2,apellido1,apellido2,estado_civil,sexo,estudios_realizados,rh,eps,pensiones,arl,tipo_documento,no_documento,direccion,telefono,correo_electronico,cod_cargo from empleados where cod_empleado=$cod") or die("Problemas en el select".mysqli_error($conexion));
    if($reg=mysqli_fetch_array($registros_A))
    {
        ?>
        </form>
        <form method="POST" action="actualizarempleados.php">
            <table border="2">
                <tr><th>Codigo del empleado</th><td><input type="number" name="cod" value="<?php echo $reg['cod_empleado'];?>"></td></tr>
                <tr><th>Nombre 1</th><td><input type="text" name="nombre1" value="<?php echo $reg['nombre1'];?>"></td></tr>
                <tr><th>Nombre 2</th><td><input type="text" name="nombre2" value="<?php echo $reg['nombre2'];?>"></td></tr>
                <tr><th>Apellido 1</th><td><input type="text" name="apellido1" value="<?php echo $reg['apellido1'];?>"></td></tr>
                <tr><th>Apellido 2</th><td><input type="text" name="apellido2" value="<?php echo $reg['apellido2'];?>"></td></tr>
                <tr><th>estado civil</th><td><input type="text" name="estado" value="<?php echo $reg['estado_civil'];?>"></td></tr>
                <tr><th>sexo</th><td><input type="text" name="sexo" value="<?php echo $reg['sexo'];?>"></td></tr>
                <tr><th>estudios_realizados</th><td><input type="text" name="estudios" value="<?php echo $reg['estudios_realizados'];?>"></td></tr>
                <tr><th>rh</th><td><input type="text" name="rh" value="<?php echo $reg['rh'];?>"></td></tr>
                <tr><th>eps</th><td><input type="text" name="eps" value="<?php echo $reg['eps'];?>"></td></tr>
                <tr><th>pensiones</th><td><input type="text" name="pension" value="<?php echo $reg['pensiones'];?>"></td></tr>
                <tr><th>arl</th><td><input type="text" name="arl" value="<?php echo $reg['arl'];?>"></td></tr>
                <tr><th>tipo documento</th><td><input type="text" name="tipdoc" value="<?php echo $reg['tipo_documento'];?>"></td></tr>
                <tr><th>numero docuemnto</th><td><input type="text" name="nodoc" value="<?php echo $reg['no_docuemnto'];?>"></td></tr>
                <tr><th>direccion</th><td><input type="text" name="direc" value="<?php echo $reg['direccion'];?>"></td></tr>
                <tr><th>telefono</th><td><input type="text" name="tel" value="<?php echo $reg['telefono'];?>"></td></tr>
                <tr><th>correo electronico</th><td><input type="text" name="correo" value="<?php echo $reg['correo_electronico'];?>"></td></tr>
                <tr><th>codigo cargo</th><td><input type="text" name="codc" value="<?php echo $reg['cargo_cod'];?>"></td></tr>
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
    mysqli_query($conexion,"delete from empleados where cod_empleado=$codigo")or die("Problemas en el delete".mysqli_error($conexion));
    echo "Se elimino el reguistro exitosamente";
}
mysqli_close($conexion);
?>
</body>
</html>