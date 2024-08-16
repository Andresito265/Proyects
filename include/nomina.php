<?php
$conexion=mysqli_connect("localhost","root","","pasosyhuellas") or die("Problemas de conexion");
$cod_e=$_POST['cod_e'];
$op=$_POST['opcion'];
if($op="buscar"){
    $registros=mysqli_query($conexion,"SELECT empleados.cod_empleado,empleados.nombre1,empleados.apellido1,cargo.salario FROM empleados INNER JOIN cargo on empleados.cargo_cod=cargo.cod_cargo where empleados.cod_empleado=$cod_e;") or die("Problemas en el select".mysqli_error($conexion));
    if($reg=mysqli_fetch_array($registros))
    {
        ?>
        <form method="POST" action="liquidarNomina.php">
            <table border="2" align="center">
                <tr><th>NOMBRE EMPLEADO</th><td><input type="text" name="nom" value="<?php echo $reg['nombre1'];?>"></td></tr>
                <tr><th>APELLIDO EMPLEADO</th><td><input type="text" name="ape1" value="<?php echo $reg['apellido1']; ?>"></td></tr>
                <tr><th>SALARIO</th><td><input type="number" name="sal" value="<?php echo $reg['salario']; ?>"></td></tr>
                <tr><th>DIAS TRABAJADOS</th><td><input type="number" name="dias_T"></td></tr>
                <tr><th>COMISIONES</th><td><input type="number" name="comisiones"></td></tr>
                <tr><th>NUMERO DE HORAS EXTRA</th><td><input type="number" name="n_horas_E"></td></tr>
                <tr><th>TIPO DE HORAS EXTRA</th><td><select name="tipo_H">
                            <option value="Diurnas">Diurnas</option>
                            <option value="Nocturnas">Nocturnas</option>
                            <option value="Dominicales">Dominicales</option>
                            <option value="Festivos">Festivos</option>
                        </select></td></tr>
                <tr><th>PRESTAMOS</th><td><input type="number" name="prestamos"></td></tr>
                <tr><th colspan="2"><input type="hidden" name="cod_e" value="<?php echo $reg['cod_empleado'];?>"></th></tr>
                <tr><th colspan="2"><input type="submit" value="INSERTAR"></th></tr>
            </table>
        </form>
        <?php
    }
}
?>