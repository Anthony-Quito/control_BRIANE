<?php
    include('database.php');

    $query = "SELECT * FROM planess";
    $result = mysqli_query($connection, $query);

    if(!$result) {
        die('Error en la consulta'. mysqli_error($connection));
    }

    $json = array();

    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'numero' => $row['numero'],
            'renta' => $row['renta'],
            'mdm2_5' => $row['mdm2_5'],
            'total' => $row['total'],
            'tipo' => $row['tipo'],
            'descripcion' => $row['descripcion'],
            'observacion' => $row['observacion'],
            'id' => $row['id']
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;   
?>