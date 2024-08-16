<?php
$conexion=mysqli_connect("localhost","root","","pasosyhuellas") or die("Problemas de conexion");

$cod_e=$_POST['cod_e'];
$nombre=$_POST['nom'];
$apellido1=$_POST['ape1'];
$salario=$_POST['sal'];
$dias_T=$_POST['dias_T'];
$comisiones=$_POST['comisiones'];
$n_horas_E=$_POST['n_horas_E'];
$tipo_H=$_POST['tipo_H'];
$prestamos=$_POST['prestamos'];

$base=$salario/30*$dias_T;
if($salario<=1160000){
    $sub_T=(140606/30)*$dias_T;
}
else{
    $sub_T=0;
}
if($tipo_H=="Diurnas"){
    $total_H=($salario/240)*$n_horas_E*1.25;
}
elseif($tipo_H=="Nocturnas"){
    $total_H=($salario/240)*$n_horas_E*1.75;
}
elseif($tipo_H=="Dominicales"){
    $total_H=($salario/240)*$n_horas_E*2.00;
}
elseif($tipo_H=="Festivos"){
    $total_H=($salario/240)*$n_horas_E*2.00;
}

$devengado=$base+$sub_T+$total_H+$comisiones;
$salud=($devengado-$sub_T)*4/100;
$pension=($devengado-$sub_T)*4/100;
$arl=($devengado-$sub_T)*0.516;
$deducido=$salud+$pension+$prestamos;
$neto=$devengado-$deducido;

mysqli_query($conexion,"insert into nomina (cod_empleado,auxilio_trasporte,comisiones_otros,no_horas_extra,tipo_horas,total_horas_extra,dias,salario_base,total_devengado,salud,pension,prestamos,total_deducido,neto) values ($cod_e,$sub_T,$comisiones,$n_horas_E,'$tipo_H',$total_H,$dias_T,$base,$devengado,$salud,$pension,$prestamos,$deducido,$neto)") or die("Problemas en el insert".mysqli_error($conexion));

$registros=mysqli_query($conexion,"select nomina.cod_Nomina,empleados.cod_empleado,empleados.nombre1,empleados.apellido1,cargo.salario,nomina.dias,nomina.salario_base,nomina.auxilio_trasporte,nomina.comisiones_otros,nomina.no_horas_extra,nomina.tipo_horas,nomina.total_horas_extra,nomina.total_devengado,nomina.salud,nomina.pension,nomina.arl,nomina.prestamos,nomina.total_deducido,nomina.neto from nomina inner join empleados on nomina.cod_empleado=empleados.cod_empleado inner join cargo on empleados.cargo_cod=cargo.cod_cargo") or die("Problemas en el select".mysqli_error($conexion));
echo"<table border='2'><caption>DESPRENDIBLE DE NOMINA</caption><tr><th>CONSECUTIVO</th><th>NOMBRE</th><th>APELLIDO</th><th>SALARIO</th><th>DIAS TRABAJADOS</th><th>BASE</th><th>AUXILIO DE TRASPORTE</th><th>COMISIONES / OTROS</th><th>HORAS EXTRA</th><th>TIPO DE HORAS EXTRA</th><th>VALOR DE LAS HORAS EXTRA</th><th>TOTAL DEVENGADO</th><th>SALUD</th><th>PENSION</th><th>PRESTAMOS</th><th>TOTAL DEDUCIDO</th><th>NETO A PAGAR</th><tr></tr>";

while($reg=mysqli_fetch_array($registros)){
    echo"<td>".$reg['cod_Nomina']."</td>";
    echo"<td>".$reg['nombre1']."</td>";
    echo"<td>".$reg['apellido1']."</td>";
    echo"<td>".$reg['salario']."</td>";
    echo"<td>".$reg['dias']."</td>";
    echo"<td>".$reg['salario_base']."</td>";
    echo"<td>".$reg['auxilio_trasporte']."</td>";
    echo"<td>".$reg['comisiones_otros']."</td>";
    echo"<td>".$reg['no_horas_extra']."</td>";
    echo"<td>".$reg['tipo_horas']."</td>";
    echo"<td>".$reg['total_horas_extra']."</td>";
    echo"<td>".$reg['total_devengado']."</td>";
    echo"<td>".$reg['salud']."</td>";
    echo"<td>".$reg['pension']."</td>";
    echo"<td>".$reg['prestamos']."</td>";
    echo"<td>".$reg['total_deducido']."</td>";
    echo"<td>".$reg['neto']."</td></tr>";
}

?>