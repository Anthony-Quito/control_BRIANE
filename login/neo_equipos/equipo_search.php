<?php
    include('database.php');

    $search = $_POST['search'];

    if(!empty($search)){
        $query = "SELECT * FROM equiposs WHERE marca LIKE '$search%' ";
        $result = mysqli_query($connection, $query);

        if(!$result){
            die('Error en la consulta'. mysqli_error($connection));
        }

        $json = array();
        while($row = mysqli_fetch_array($result)){
            $json[] = array(
                'imei' => $row['imei'],
                'sim' => $row['sim'],
                'marca' => $row['marca'],
                'id' => $row['id']
            );
        }

        $jsonstring = json_encode($json);
        echo $jsonstring;

    }

?>