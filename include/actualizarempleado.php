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

mysqli_query($conexion,"update empleados set nombre1='$nom1',nombre2='$nom2',apellido1='$ape1',apellido2='$ape2',estado_civil='$estudios',rh='$rh',eps='$eps',pensiones='$pension',arl='$arl',tipo_documneto=$tipodc,no_documento='$nodoc',direccion='$direc',telefono='$tel',correo_electronico='$correo',cargo_cod='$codc' where cod_empleado=$cod_e") or die("Problemas en el select".mysqli_error($conexion));
echo"Registro actualizado correctamente";
mysqli_close($conexion);
?>