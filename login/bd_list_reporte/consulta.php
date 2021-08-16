<?php
include_once '../bd_list_reporte/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id_t,numero, dni, nombres, apellidos, condicion, recibo, cuota_mensual, m_contratados, m_restantes, c_18_meses, resta, modelo, renta, mdm2_5, tipo, total, descripcion, penalidad, f_inicio, f_fin, cargo, cargo, cond_plan
FROM trabajadores  inner JOIN  equiposs  on trabajadores.numero_id=equiposs.id inner JOIN   planess  on trabajadores.equipo=planess.id";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
?>