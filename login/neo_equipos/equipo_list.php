<?php
    include('database.php');
    $query = "SELECT * FROM equiposs";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die('Fallo al listar equipos'. mysqli_error($connection));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'imei' => $row['imei'],
            'modelo' => $row['modelo'],
            'marca' => $row['marca'],
            'c_18_meses' => $row['c_18_meses'],
            'cuota_mensual' => $row['cuota_mensual'],
            'cond_plan' => $row['cond_plan'],
            'observacion' => $row['observacion'],
            'id' => $row['id']
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;

?>
