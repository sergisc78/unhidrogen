<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
  


    <link rel="stylesheet" href="css/formCrud.css">

</head>

<body>
	<?php
	include("config.php");
	$id_post=$_GET['id_post'];

	
	
	   $sql_consult = "SELECT * from post_categorias WHERE id_post=$id_post ";

            // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

            $resultat3 = $connection->prepare($sql_consult);

            $resultat3->execute();

            $post_cat = $resultat3->rowCount();
	if ($post_cat!=0){
		$categorias=array();
	foreach ($resultat3 as $resultats3){
		array_push($categorias,$resultats3['id_categoria']);
		
	}
	$categorias_implode=implode(",",$categorias);
     $sql_consult2 = "SELECT * from categorias WHERE id_categoria NOT IN ($categorias_implode)";

            // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

            $resultat2 = $connection->prepare($sql_consult2);

            $resultat2->execute();

            $categorias = $resultat2->rowCount();

	}
		
	
	
	if ($post_cat==0){
	
     $sql_consult2 = "SELECT * from categorias";

            // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

            $resultat2 = $connection->prepare($sql_consult2);

            $resultat2->execute();

            $categorias = $resultat2->rowCount();

	}
	
    ?>
	<a href="<?php echo "getCategoria?id_post=$id_post" ?>"><button class=" btn btn-outline-primary btn-lg consult-categorias"style="margin-left:600px">Volver las categorias de este post</button></a>
    <form action="" method="get" enctype="multipart/form-data">
		<h2>Asignar categoria al post numero: <?php echo $id_post ?></h2>
	 <input type="hidden" class="input" name="id_post" value="<?php echo $id_post ?>" required>
<select name="descr_categoria" id="descr_categoria">
    <?php foreach ($resultat2 as $resultats2){ ?>
        <option value="<?php echo $resultats2['id_categoria']; ?>"><?php echo $resultats2['descr_categoria']; ?></option>
    <?php } ?>
</select>
        
        <button class="btn btn-primary" type="submit" name="guardar">Enviar</button>
        <div id="enviar"></div>





    </form>
<?php
	
    include('config.php');
    if (isset($_GET["guardar"])) {
		$descr_categoria=$_GET['descr_categoria'];
		$id_post=$_GET['id_post'];
		
$sql_insert = "INSERT INTO post_categorias(id_post,id_categoria) VALUES ($id_post,$descr_categoria)";

            $connection->exec($sql_insert);
            $error = $connection->errorInfo();
            if ($error[0] != 0) {
                echo "Error introduciendo el nuevo registro<br>";
            } else {
                echo "El nuevo registro se ha introducido con éxito<br>";
            }
		header("location:getCategoria.php?id_post=$id_post");
		
	}
?>