<?php
    include('database.php');

    $id = $_POST['id'];

    $query = "SELECT * FROM planess WHERE id = $id";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die('Fallo en la consulta');
    }

    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'numero' => $row['numero'],
            'renta' => $row['renta'],
            'mdm2_5' => $row['mdm2_5'],
            'tipo' => $row['tipo'],
            'descripcion' => $row['descripcion'],
            'observacion' => $row['observacion'],
            'id' => $row['id']
        );
    }

    $jsonstring = json_encode($json[0]);
    echo $jsonstring;

?>