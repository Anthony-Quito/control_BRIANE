<?php

    include('database.php');

    if(isset($_POST['imei'])){
        $sim = $_POST['sim'];
        $imei = $_POST['imei'];
        $serial = $_POST['serial'];
        $color = $_POST['color'];
        $modelo = $_POST['modelo'];
        $marca = $_POST['marca'];
        $condicion = $_POST['condicion'];
        $recibo = $_POST['recibo'];
        $m_contratados = $_POST['m_contratados'];
        $m_restantes = $_POST['m_restantes'];
        $c_18_meses = $_POST['c_18_meses'];
        $f_entrega = $_POST['f_entrega'];
        $penalidad = $_POST['penalidad'];
        $f_inicio = $_POST['f_inicio'];
        $f_fin = $_POST['f_fin'];
        $cond_plan = $_POST['cond_plan']; 
        $observacion = $_POST['observacion'];

        $query = "INSERT INTO equiposs (sim, imei, serial, color, modelo, marca, condicion, recibo, m_contratados, m_restantes, c_18_meses, f_entrega, penalidad, f_inicio, f_fin,cond_plan, observacion) 
        VALUES ('$sim', '$imei', '$serial', '$color', '$modelo', '$marca', '$condicion', '$recibo', $m_contratados, $m_restantes, $c_18_meses, '$f_entrega', $penalidad, '$f_inicio', '$f_fin','$cond_plan', '$observacion')";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die('Fallo al insertar ... ');
        }
        echo "Equipo guardado correctamente";
}
    

?>