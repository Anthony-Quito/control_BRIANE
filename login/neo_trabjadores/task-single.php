<?php
    include('database.php');

    $id = $_POST['id'];

    $query = "SELECT * FROM trabajadores WHERE id_t = $id";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die('Fallo en la consulta');
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

    $jsonstring = json_encode($json[0]);
    echo $jsonstring;

?>