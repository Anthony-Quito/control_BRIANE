<?php
    include('database.php');

    $search = $_POST['search'];

    if(!empty($search)){
        $query = "SELECT * FROM planess WHERE tipo LIKE '$search%' ";
        $result = mysqli_query($connection, $query);

        if(!$result){
            die('Error en la búsqueda...'. mysqli_error($connection));
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
                'fecha' => $row['fecha'],
                'id' => $row['id']

            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;

    }

?>