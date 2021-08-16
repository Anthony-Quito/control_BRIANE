<?php
    include('database.php');

    $query = "SELECT * FROM trabajadores";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die('Fallo al listar'. mysqli_error($connection));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'dni' => $row['dni'],
            'nombres' => $row['nombres'],
            'apellidos' => $row['apellidos'],
            'cargo' => $row['cargo'],
            'plan' => $row['plan'],
            'equipo' => $row['equipo'],
            'numero_id' => $row['numero_id'],
            'cargador' => $row['cargador'],
            'audifono' => $row['audifono'],
            'caja' => $row['caja'],
            'id_t' => $row['id_t']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>