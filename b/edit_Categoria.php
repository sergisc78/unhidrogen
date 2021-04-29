<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/formCrud.css">

</head>

<body>
    <?php

    include("config.php");
	$id_categoria=$_GET['id_categoria'];
   
    $sql_consult2 = "SELECT * FROM categorias WHERE id_categoria= '$id_categoria' ";

    // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

    $resultat2 = $connection->prepare($sql_consult2);

    $resultat2->execute();

    $headers = $resultat2->rowCount();

    // FORMULARIO EDITAR HEADER
    ?>
    
    <?php
    if ($headers != 0) {
        $i = 0;

        foreach ($resultat2 as $resultats2) {

    ?>
            <form action="edit_Categoria.php" method="get" >


                <h1>Leer y editar categoria <?php echo $resultats2['id_categoria'] ?> </h1><br>
                <div id="bloque">
                    <input type="hidden" class="input" name="id_categoria" value="<?php echo $resultats2['id_categoria'] ?>" required>
                   
                    <label>
                        <p class="label-txt">descr_categoria</p>
                        <input type="text" class="input" name="descr_categoria" value="<?php echo $resultats2['descr_categoria'] ?>" required>
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
					 <label>
                        <p class="label-txt">url_categoria</p>
                        <input type="text" class="input" name="url_categoria" value="<?php echo $resultats2['url_categoria'] ?>" required>
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
                    <label>
                        <p class="label-txt">titulo_pagina_categoria</p>
                        <input type="text" class="input" name="titulo_pagina_categoria" value="<?php echo $resultats2['titulo_pagina_categoria'] ?>" required>
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
					<label>
                        <p class="label-txt">meta_categoria</p>
                        <input type="text" class="input" name="meta_categoria" value="<?php echo $resultats2['meta_categoria'] ?>" required>
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
                    <label>
					</label>
                <?php
            }
        }

                ?>
                <button class="btn btn-danger" type="submit" name="submit">Guardarr</button>

                </div>



            </form>

            <?php

            try {
                // CONFIG FILE
                include('config.php');
                if (isset($_GET['submit'])) {
                    $descr_categoria=$_GET['descr_categoria'];
					$url_categoria=$_GET['url_categoria'];
					$titulo_pagina_categoria=$_GET['titulo_pagina_categoria'];
					$meta_categoria=$_GET['meta_categoria'];
                  	$id_categoria=$_GET['id_categoria'];
                   $sql = "UPDATE categorias SET descr_categoria='$descr_categoria',url_categoria='$url_categoria',titulo_pagina_categoria='$titulo_pagina_categoria',meta_categoria='$meta_categoria'  WHERE id_categoria='$id_categoria'";
                    $res = $connection->query($sql) or die('Error modificando el registro: ' . $connection->errno . $connection->error);
					session_start();
					$id_post=$_SESSION['id_post'];
					$id_post_urlencode=urlencode($id_post);
					header("location:getCategoria.php?id_post=$id_post_urlencode");
            }
			} catch (Exception $e) {

                die("Error" . $e->getMessage());
                echo " Hi ha un error  a la línia" . $e->getLine();
            }

         

            ?>




            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>



</body>

</html>