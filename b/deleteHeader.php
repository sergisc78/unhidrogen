
<?php
include('config.php');


// BORRAR HEADER POR ID_HEADERS


$id = $_GET['id_headers'];
$ordre_sql = 'DELETE FROM headers WHERE id_headers='.$id.'';
	$res = $connection->query($ordre_sql) or die('Error !' . $connection->errno . $connection->error);
	echo "Header borrado";

?>