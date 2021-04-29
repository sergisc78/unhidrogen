<?php
include('config.php');


// BORRAR CATEGORÍA POR ID

$id = $_GET['id'];

$query="SELECT * FROM post_categorias WHERE id_categoria='.$id.'";
$result = $connection->prepare($query);
$result->execute();
$post_categoria = $result->rowCount();

if ($post_categoria>0){
	echo "No se puede borrar la categoría";

}else{
$ordre_sql = 'DELETE FROM categorias WHERE id_categoria='.$id.'';
	$res = $connection->query($ordre_sql) or die('Error !' . $connection->errno . $connection->error);
	echo "Categoría borrada";
}
?>