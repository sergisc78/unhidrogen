<?php
include('config.php');


// BORRAR CATEGORÍA POR ID

$id_post = $_GET['id_post'];
$id_categoria = $_GET['id_cat'];


// CONSULTAR SI LA CATEGORÍA ESTÁ ASIGNADA A UN POST

$ordre_sql = 'DELETE FROM post_categorias WHERE id_post='.$id_post.' AND id_categoria='.$id_categoria.'';
	$res = $connection->query($ordre_sql) or die('Error ! ' . $connection->errno . $connection->error);
	

$result = $connection->prepare($ordre_sql);

$result->execute();

$post_categoria = $result->rowCount();

if ($post_categoria >0){
echo "No se puede desasignar la  categoría";

}else{

	echo "Categoría desasignada";
}
?>