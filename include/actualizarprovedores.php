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

mysqli_query($conexion,"update proveedores set razon_social='$razon',tipo_documento='$tipodoc',no_documento='$nodoc',direccion='$direccion',telefono='$tel',informacion_asesor='$infoa',telefono_asesor='$tela' where cod_provedor=$cod") or die("Problemas en el select".mysqli_error($conexion));
echo"Registro actualizado correctamente";
mysqli_close($conexion);
?>