<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
    <link rel="stylesheet" href="css/formCrud.css">

</head>

<body>
   <?php
	include('config.php');
$id_post=$_GET['id_post'];
$id_categoria=$_GET['id_categoria'];
	$sql_consult2 = "SELECT * FROM post_categorias WHERE id_post=$id_post AND id_categoria=$id_categoria";

            // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

            $resultat3 = $connection->prepare($sql_consult2);

            $resultat3->execute();

            $post = $resultat3->rowCount();
	
	?>
    <form action="" method="get">

<h1>Asignar Categoría</h1><br>
		<input type="hidden" class="input" name="id_categoria_i" value="<?php echo $_GET['$id_categoria'] ?>" required>

<input type="hidden" class="input" name="id_post" value="<?php echo $_GET['id_post'] ?>" required>
        <div id="bloque">

           <select name="descr_categoria" id="descr_categoria">
		<?php 
			 
     foreach ($resultat2 as $resultats2) {
 ?>
        <option value="<?php echo $resultats2['id_categoria']; ?>"><?php echo $resultats2['descr_categoria']; ?></option>
    <?php 
			}
		
	?>
</select>
			<br>
			<br>
			<br>
        </div>
        <button class="btn btn-danger" type="submit" name="submit">editar categoría</button>
        <div id="enviar"></div>





    </form>
    <?php

    if (isset($_GET['submit'])) {
		include('config.php');
        // VARIABLES
        $descr_categoria = $_GET['descr_categoria'];
		$id_post=$_GET['id_post'];
		$id_categoria_i=$_GET['id_categoria_i'];
		
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