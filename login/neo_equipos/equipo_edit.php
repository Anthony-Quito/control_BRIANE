<?php
    include('database.php');

        $id = $_POST['id'];
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

        $query = "UPDATE equiposs SET sim = '$sim',
                                      imei = '$imei',
                                      serial = '$serial',
                                      color = '$color',
                                      modelo = '$modelo',
                                      marca = '$marca',
                                      condicion = '$condicion',
                                      recibo = '$recibo',
                                      m_contratados = $m_contratados,
                                      m_restantes = $m_restantes,
                                      c_18_meses = $c_18_meses,
                                      f_entrega = '$f_entrega',
                                      penalidad = $penalidad,
                                      f_inicio = '$f_inicio',
                                      f_fin = '$f_fin',
                                      cond_plan = '$cond_plan',
                                      observacion = '$observacion' 
                                 WHERE id = '$id'";

        $result = mysqli_query($connection , $query);

        if(!$result){
            die('Fallo al actualizar ...');
        }

        echo 'Equipo actualizado correctamente';


?>