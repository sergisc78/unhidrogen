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
    session_start();
    // hacemos un select de todas las categorias que tenga el post
    //SOBRETODO RELACIONAMOS LA TABLA DE CATEGORIAS CON LA DEL PUENTE (POSTCATEGORIAS)
    //LO QUE HACE POSTCATEGORIAS ES RELACIONAR LA ID DEL POST QUE ESTAEN UNA SESION
    //CON LA IDPOST DE LA TABLA PUENTE Y ASI SACAMOS LAS CATEGORIAS DEL POST.
    $id_post = $_SESSION['id_post'];
	$id_categoria=$_GET['id_categorias'];
    $sql_consult2 = "SELECT * FROM categorias WHERE id_categoria=$id_categoria";


    // PREPARA LA CONSULTA SQL PARA MOSTRAR LAS CATEGORÍAS, LA EJECUTA Y CUENTA LOS RESULTADOS

    $resultat2 = $connection->prepare($sql_consult2);

    $resultat2->execute();

    $categoria = $resultat2->rowCount();
    //Formulario de todas las categorias del post
    ?>
	  <a href="admin3"><button class=" btn btn-outline-primary btn-lg consult-categorias" style="margin-top:20px;margin-left:600px">Volver a todas las categorias</button></a>
    <form action="" method="get">
        <?php
        if ($categoria != 0) {
            $i = 0;

            foreach ($resultat2 as $resultats2) {
        ?>
                <h1>Leer y editar categoría <?php echo $resultats2['id_categoria'] ?></h1><br>

                <input type="hidden" class="input" name="id_categorias" value="<?php echo $resultats2['id_categoria'] ?>">

                <label>
                    <p class="label-txt">descripción categoría: </p>
                    <input type="text" class="input" name="descr_categoria" value="<?php echo $resultats2['descr_categoria'] ?>">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label>
                    <p class="label-txt">Url </p>
                    <input type="text" class="input" name="url" value="<?php echo $resultats2['url_categoria'] ?>">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label>
                <p class="label-txt">Título página: </p>
                <input type="text" class="input" name="titulo_pagina_categoria" value="<?php echo $resultats2['titulo_pagina_categoria'] ?>" >
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">Meta categoría: </p>
                <input type="text" class="input" name="meta_categoria" value="<?php echo $resultats2['meta_categoria'] ?>">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
                <label>
            <?php
            }
        }
            ?>
            <button class="btn btn-danger" type="submit" name="guardar">Guardar</button>
        <div id="enviar"></div>
				
    </form>

    <?php

    try {
        // CONFIG FILE
        include('config.php');

        if (isset($_GET['guardar'])) {
            //sacamos las variables del formulario
            $id_categoria = $_GET['id_categorias'];
            $descr_categoria = $_GET['descr_categoria'];
            $url = $_GET['url'];
            $titulo_pagina_categoria = $_GET['titulo_pagina_categoria'];
            $meta_categoria = $_GET['meta_categoria'];
            $contador = count($id_categoria);
           
                $sql = "UPDATE categorias SET descr_categoria='$descr_categoria',url_categoria='$url',titulo_pagina_categoria='$titulo_pagina_categoria',meta_categoria='$meta_categoria' where id_categoria=$id_categoria";
                $res = $connection->query($sql) or die('Error modificando el registro: ' . $connection->errno . $connection->error);
                echo "Registro modificado con éxito";
            
    ?>
    <?php
    // nos vamos en la pagina principal de administracion
           	?>
					<meta http-equiv="refresh" content="2;admin3" />
					<?php
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