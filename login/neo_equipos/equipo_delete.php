<?php
    include('database.php');

    if(isset($_POST['id'])){

     $id = $_POST['id'];

     $query = "DELETE FROM equiposs WHERE id = $id";

     $result = mysqli_query($connection, $query);

     if(!$result){
        die('Fallo al eliminar el equipo');
     }
     echo "Equipo eliminado correctamente";

    }


?>