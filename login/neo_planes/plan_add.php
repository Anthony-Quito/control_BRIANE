<?php
    include('database.php');

    if(isset($_POST['numero'])){
        $numero =  $_POST['numero'];
        $renta =  $_POST['renta'];
        $mdm2_5 = $_POST['mdm2_5'];
        $tipo = $_POST['tipo'];
        $descripcion =  $_POST['descripcion'];
        $observacion =  $_POST['observacion'];

        $query = "INSERT INTO planess (numero, renta, mdm2_5, tipo, descripcion, observacion)
                  VALUES ('$numero', $renta, $mdm2_5, '$tipo', '$descripcion', '$observacion')";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die('Error al insertar plan ...');
        }
        echo 'Plan insertado correctamente';
        
    }
?>