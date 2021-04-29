<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
    <link rel="stylesheet" href="css/formCrud.css">

</head>

<body>
   <?php
	include('config.php');
	?>
	<a href="admin3"><button class=" btn btn-outline-primary btn-lg consult-categorias" style="margin-top:20px;margin-left:600px">Volver a todas las categorias</button></a>
    <form action="" method="post">

<h1>Añadir Categoría</h1><br>
        <div id="bloque">

            <label>
                <p class="label-txt">Descripción categoría </p>
                <input type="text" class="input" name="categoria" id="categoria" required>
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">Url </p>
                <input type="text" class="input" name="url" id="url" required>
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">Título página: </p>
                <input type="text" class="input" name="titulo_pagina_categoria" id="pagina" required>
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">Meta categoría: </p>
                <input type="text" class="input" name="meta_categoria" id="meta" required>
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
			</label>
        </div>
        <button class="btn btn-primary" type="submit" name="guardar">añadir categoria</button>
        <div id="enviar"></div>





    </form>
    <?php

    if (isset($_POST["guardar"])) {
		
		 $descr_categoria = $_POST['categoria'];
        $url = $_POST['url'];
		$titulo_pagina_categoria=$_POST['titulo_pagina_categoria'];
		$meta_categoria=$_POST['meta_categoria'];
		$entrada = "INSERT INTO categorias (descr_categoria,url_categoria,titulo_pagina_categoria,meta_categoria) VALUES('$descr_categoria','$url','$titulo_pagina_categoria','$meta_categoria')";
		
        $resultat2 = $connection->prepare($entrada);

        $resultat2->execute();
		header("location:admin3.php");
	}
	
	?>