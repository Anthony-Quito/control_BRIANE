<?php
    include('database.php');

    if(isset($_POST['id'])){

        $id = $_POST['id'];

        $query = "DELETE FROM trabajadores WHERE id_t = $id";

        $result = mysqli_query($connection, $query);

        if(!$result) {
            die('Fallo al eliminar ... ');
        }
        
        echo "Trabajador eliminado correctamente";

    }

    

    
?>