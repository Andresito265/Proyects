<html>
    <head>
        <title>Pasos y huellas</title>
    </head>
    <body>
        <h1>ACTUALIZAR CARGO </h1>
<?php
$conexion=mysqli_connect("localhost","root","","pasosyhuellas") or die ("Problemas de conexion");
$cargo=$_POST['car'];
$nombre=$_POST['nomb'];
$salario=$_POST['sal'];
$descripcion_cargo=$_POST['desc'];
mysqli_query($conexion,"update cargo set cod_cargo='$cargo',nombre='$nombre',salario='$salario',descripcion_cargo=$descripcion_cargo where cod_cargo=$cargo")or die("Problemas en el select".mysqli_error($conexion));
echo "Registros actualizados correctamente ";
mysqli_close($conexion);
?>