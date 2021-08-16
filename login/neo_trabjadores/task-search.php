<?php
    include('database.php');

    $search = $_POST['search'];

    if(!empty($search)){
        $query = "SELECT * FROM trabajadores WHERE nombres LIKE '$search%' ";
        $result = mysqli_query($connection, $query);

        if(!$result){
            die('Error en la búsqueda...'. mysqli_error($connection));
        }

        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'nombres' => $row['nombres'],
                'apellidos' => $row['apellidos'],
                'id_t' => $row['id_t']

            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;

    }

?>