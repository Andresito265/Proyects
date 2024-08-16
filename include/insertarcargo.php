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
$cargo=$_POST['car'];
$nombre=$_POST['nomb'];
$salario=$_POST['sal'];
$descripcion_cargo=$_POST['desc'];
$opcion=$_POST['opcion'];

if($opcion=="insertar"){
    mysqli_query($conexion,"insert into cargo(cod_cargo,nombre,salario,descripcion_cargo) values ('$cargo','$nombre','$salario','$descripcion_cargo')") or die("problemas en el select".mysqli_error($conexion));
    echo"Registro ingresado correctamente <br><br>";
    $registros=mysqli_query($conexion,"select cod_cargo,nombre,salario,descripcion_cargo from cargo") or die("problemas en el select". mysqli_error($conexion));
    echo "<table border='2' width='80%'><tr><th>codgio cargo</th><th>Nombre</th><th>Salario</th><th>Descripcion</th></tr><tr>";
    while($reg=mysqli_fetch_array($registros))
    {
        echo "<td>".$reg['cod_cargo']."</td>";
        echo "<td>".$reg['nombre']."</td>";
        echo "<td>".$reg['salario']."</td>";
        echo "<td>".$reg['descripcion_cargo']."</td></tr>";
    }
    echo"</table>";
    }
    elseif($opcion=="eliminar")
    {
        $buscar=$_POST['car'];
        $tipo=$_POST['opcion'];
        if($tipo=="cod")
        {
            $registros=mysqli_query($conexion,"select cod_cargo,nombre,salario,descripcion_cargo from cargo where cod_cargo=$buscar") or die("Problemas en el Select".mysqli_error($conexion));
            if($reg=mysqli_fetch_array($registros))
            {
                mysqli_query($conexion,"delete from cargo where cod_cargo=$buscar")or die("Problemas en el Select".mysqli_error($conexion));
                echo "Se efectuo la eliminacion del Cargo <br><br>";
                $registros=mysqli_query($conexion,"select cod_cargo,nombre,salario,descripcion_cargo from cargo where cod_cargo=$buscar") or die("Problemas en el Select".mysqli_error($conexion));
                echo "<table border='2' width='80'><tr><th>Codigo Cargo</th><th>Nombre cargo</th><th>salario</th><th>descripcion cargo</th></tr><tr>" ;
                while($reg=mysqli_fetch_array($registros))
                {
                    echo "<td>".$reg['cod_cargo']."</td>";
                    echo "<td>".$reg['nombre']."</td>";
                    echo "<td>".$reg['salario']."</td>";
                    echo "<td>".$reg['descripcion_cargo']."</td></tr>";
                }
                echo "</table>";
            }
            else
            {
                echo "No existe el cargo Ingresado";
            }
        }   
        else
        {
            $registros=mysqli_query($conexion,"select cod_cargo,nombre,salario,descripcion_cargo from cargo where cod_cargo='$buscar'") or die("Problemas en el Select".mysqli_error($conexion));
            if($reg=mysqli_fetch_array($registros))
            {
                mysqli_query($conexion,"delete from cargo where cod_cargo='$buscar'")or die("Problemas en el Select".mysqli_error($conexion));
                echo "Se efectuo la eliminacion del Cargo <br><br>";
                $registros=mysqli_query($conexion,"select cod_cargo,nombre,salario,descripcion_cargo from cargo where cod_cargo='$buscar'") or die("Problemas en el Select".mysqli_error($conexion));
                echo "<table borde='2' width='80'><tr><th>Codigo Cargo</th><th>Nombre</th><th>salario</th><th>descripcion cargo</th></tr> <tr>" ;
                while($reg=mysqli_fetch_array($registros))
                {
                    echo "<td>".$reg['cod_cargo']."</td>";
                    echo "<td>".$reg['nombre']."</td>";
                    echo "<td>".$reg['salario']."</td>";
                    echo "<td>".$reg['descripcion_cargo']."</td></tr>";
                }
                echo "</table>";
            }
            else
            {
                echo "No existe el cargo Ingresado";
            }
        }
    }
    elseif($opcion=='actualizar')
    {
        $registros=mysqli_query($conexion,"select cod_cargo,nombre,salario,descripcion_cargo from cargo where cod_cargo=cod_cargo") or die("Problemas en el Select".mysqli_error($conexion));
        if($reg=mysqli_fetch_array($registros))
        {
            ?>
            </form>
            <form method="POST" action="actualizarcargo.php">
                <table border="2">
                    <tr><td>Codigo cargo</td><td><input type="number" name="car" value="<?php echo $reg['cod_cargo'];?>"></td></tr>
                    <tr><td>Nombre</td><td><input type="text" name="nomb" value="<?php echo $reg['nombre'];?>"></td></tr>
                    <tr><td>Salario</td><td><input type="text" name="sal" value="<?php echo $reg['salario'];?>"></td></tr>
                    <tr><td>Descripcion cargo</td><td><input type="text" name="desc" value="<?php echo $reg['descripcion_cargo'];?>"></td></tr>
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