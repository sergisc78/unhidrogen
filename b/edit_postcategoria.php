<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar post categoria</title>
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
	<h2 class="text-center">Editar post_categoria post número: <?php echo $id_post ?> categoria numero <?php echo $_GET['id_categoria'] ?></h2><br>
	 <a href="admin4"><button class=" btn btn-outline-primary btn-lg consult-categorias" style="margin-left:600px">Volver a  las categorias de los post</button></a>
	<form action="" method="get" enctype="multipart/form-data">
		 <input type="hidden" class="input" name="id_categoria_s" value="<?php echo $_GET['id_categoria'] ?>" required>

	 <input type="hidden" class="input" name="id_post" value="<?php echo $id_post ?>" required>
<select name="descr_categoria" id="descr_categoria">
    <?php foreach ($resultat2 as $resultats2){ ?>
        <option value="<?php echo $resultats2['id_categoria']; ?>"><?php echo $resultats2['descr_categoria']; ?></option>
    <?php } ?>
</select>
        
        <button class="btn btn-danger" type="submit" name="guardar">Guardar</button>
        <div id="enviar"></div>





    </form>
    <?php

    if (isset($_GET['guardar'])) {
        // VARIABLES
		$id_categoria_s=$_GET['id_categoria_s'];
        $descr_categoria = $_GET['descr_categoria'];
		$id_post=$_GET['id_post'];
		 $sql_update = "UPDATE post_categorias SET id_categoria=$descr_categoria WHERE id_categoria=$id_categoria_s AND id_post=$id_post";

            $connection->exec($sql_update);
            $error = $connection->errorInfo();
            if ($error[0] != 0) {
                echo "no se puede asignar<br>";
            } else {
                echo "Se puede asignar<br>";
            }
        header("location:admin4");
    }
    echo "<br>";


    ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>


</body>

</html>