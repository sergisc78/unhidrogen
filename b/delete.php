<?php

include('config.php');

$id = $_GET['id'];


//BORRAR POST POR SU ID

$sql_delete ="DELETE FROM post WHERE id_post=$id";
$result = $connection->prepare($sql_delete);
$result->execute();

if ($result){
    echo "Post borrado correctamente";
}else{
    echo "Error al borrar el post";
}

/*BORRAR HEADERS POR SU ID, RELACIONADA CON LA TABLA POST

$sql_delete1 ="DELETE FROM headers WHERE id_post=$id";
$result1 = $connection->prepare($sql_delete1);
$result1->execute();*/


?>