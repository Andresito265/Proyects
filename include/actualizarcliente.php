<html>
    <head>
        <title>BUSCAR CLIENTES </title>
    </head>
    <body>
        <h1>ACTUALIZAR CLIENTES </h1>
<?php
$conexion=mysqli_connect("localhost","root","","pasosyhuellas") or die ("Problemas de conexion");
$codigo=$_POST['cod'];
$nombre1=$_POST['nom1'];
$nombre2=$_POST['nom2'];
$apellido1=$_POST['ape1'];
$apellido1=$_POST['ape2'];
$tipodoc=$_POST['tipdoc'];
$nodoc=$_POST['nodoc'];
$direc=$_POST['direc'];
$tel=$_POST['tel'];
$correo=$_POST['correo'];
$opcion=$_POST['opcion'];
mysqli_query($conexion,"update clientes set cod_cliente='$codigo',nombre1='$primer',nombre2='$segundo',apellido1='$auno',apellido2='$ados',tipo_documento='$tipo',no_documento=$docu,correo='$e_mail',telefono=$telefono,direccion='$direccion',observaciones='$observaciones',ciudad='$ciudad' where cod_cliente=$codigo")or die("Problemas en el select".mysqli_error($conexion));
echo "Registros actualizados correctamente ";
mysqli_close($conexion);
?>