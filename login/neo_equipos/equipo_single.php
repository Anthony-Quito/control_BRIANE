<?php
    include('database.php');

    $id = $_POST['id'];

    $query = "SELECT * FROM equiposs WHERE id = $id";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die('Fallo en la consulta ...');
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'sim' => $row['sim'],
            'imei' => $row['imei'],
            'serial' => $row['serial'],
            'color' => $row['color'],
            'modelo' => $row['modelo'],
            'marca' => $row['marca'],
            'condicion' => $row['condicion'],
            'recibo' => $row['recibo'],
            'm_contratados' => $row['m_contratados'],
            'm_restantes' => $row['m_restantes'],
            'c_18_meses' => $row['c_18_meses'],
            'f_entrega' => $row['f_entrega'],
            'penalidad' => $row['penalidad'],
            'f_inicio' => $row['f_inicio'],
            'f_fin' => $row['f_fin'],
            'cond_plan' => $row['cond_plan'],
            'observacion' => $row['observacion'],
            'id' => $row['id']
        );
    }

    $jsonstring = json_encode($json[0]);
    echo $jsonstring;





?>