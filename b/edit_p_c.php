<?php

include('config.php');

//CONSULTA DEL POST

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/formCrud.css">

</head>

<body>

    <?php

    // CONSULTA SQL

    $sql_consult = "SELECT * FROM post WHERE  id_post=" . $_GET['id_post'] . "";

    // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

    $resultat = $connection->prepare($sql_consult);

    $resultat->execute();

    $post = $resultat->rowCount();


    //CONSULTA DE LOS HEADERS 

    $sql_consult2 = "SELECT * FROM headers WHERE id_post=" . $_GET['id_post'] . "";

    // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

    $resultat2 = $connection->prepare($sql_consult2);

    $resultat2->execute();

    $headers = $resultat2->rowCount();

    //SQL MUESTRA CATEGORÍAS

    $sql_consult3 = "SELECT * FROM categorias c INNER JOIN post_categorias pc WHERE pc.id_post=" . $_GET['id_post'] . " and pc.id_categoria=c.id_categoria";

    $resultat3 = $connection->prepare($sql_consult3);

    $resultat3->execute();

    $categorias = $resultat3->rowCount();
    
    ?>
	
	 <a href="admin"><button class=" btn btn-outline-primary btn-lg consult-categorias" style="margin-top:20px;margin-left:600px">Volver a admin</button></a>

            <form action="edit_p_c.php" method="get" enctype="multipart/form-data">
				
				 <!-- BOTON VOLVER AL MENÚ -->
			<input type="hidden" class="input" name="id_cat" value="<?php echo $_GET['id_cat'] ?>" required>
			
                <h1>Leer y editar post</h1><br><div class="d-flex justify-content-center">
                            
                        </div>
				<?php
				if ($post != 0) {
        $i = 0;

        foreach ($resultat as $resultats) {
		?>

                <input type="hidden" class="input" name="id_post" value="<?php echo $resultats['id_post'] ?>" required>
				<label>
                        <p class="label-txt">Orden del post</p>
                        <input type="number" class="input" value="<?php echo $resultats['orden_p'] ?>" name="orden_p">
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
       <label>
                        <p class="label-txt">Orden del post de la categoria</p>
                        <input type="number" class="input" value="<?php echo $resultats['orden_p_c'] ?>" name="orden_p_c">
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
                <label>
                    <p class="label-txt">Titulo: </p>
                    <input type="text" class="input" name="titulo" value="<?php echo $resultats['titulo_post'] ?>" required>
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label>
                    <p class="label-txt">Fecha:</p>
                    <input type="text" class="input" name="fecha" value="<?php echo $resultats['fecha_post'] ?>" required>
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
               <label>
                    <p class="label-txt">Introducción: </p><br>
                    <textarea id="intro" cols="80" rows="20" name="intro" value="<?php echo $resultats['introduccion_post'] ?>" required><?php echo $resultats['introduccion_post'] ?></textarea>
                </label>
				<h1>SEO</h1>
				 <label>
                    <p class="label-txt">url</p>
                    <input type="text" class="input" name="url_post" value="<?php echo $resultats['url_post'] ?>">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label>
                    <p class="label-txt">Título pagina post: </p>
                    <input type="text" class="input" name="titulo_pagina_post"  value="<?php echo $resultats['titulo_pagina_post'] ?>" >
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label>
                    <p class="label-txt">Meta descripción post: </p>
                    <input type="text" class="input" name="meta_post"  value="<?php echo $resultats['meta_post'] ?>">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label>
            <?php
        }
    }
            ?>
					
					
					
            <button class="btn btn-danger" type="submit" name="submit">guardar</button>
					
					
					<?php
$id_post=$_GET['id_post'];
					?>
         

            </form>

            <?php

            try {
                // CONFIG FILE
                include('config.php');

                if (isset($_GET['submit'])) {
                    $id_post = $_GET['id_post'];
                    //VARIABLES POST
                    $id_post = $_GET['id_post'];
                    $titulo = $_GET['titulo'];
                    $fecha = $_GET['fecha'];
                    $intro = $_GET['intro'];
                    $url = $_GET['url_post'];
                    $fecha_str = strtotime($fecha);
                    $fechapro = date('y-m-d', $fecha_str);
                    $titulo_pagina_post = $_GET['titulo_pagina_post'];
                    $meta_post = $_GET['meta_post'];
					$orden_p=$_GET['orden_p'];
					$orden_p_c=$_GET['orden_p_c'];
					$id_cat=$_GET['id_cat'];
					if ($orden_p==""){
						$orden_p=999;
					}
					if ($orden_p_c==""){
						$orden_p_c=999;
					}
                    session_start(); // SE INICIA LA SESIÓN EN LA QUE EMAIL ES IGUAL A $POST['EMAIL']

                    $_SESSION['id_post'] = $id_post;
					
                    $sql = "UPDATE post SET orden_p_c=$orden_p_c,orden_p=$orden_p,titulo_post='$titulo',fecha_post='$fechapro',introduccion_post='$intro',url_post='$url',titulo_pagina_post='$titulo_pagina_post',meta_post='$meta_post' WHERE id_post=$id_post";
                    $res = $connection->query($sql) or die('Error modificando el registro: ' . $connection->errno . $connection->error);
                    echo "guardado con exito"
					
					?>
				<meta http-equiv="refresh" content="2;getCategoriaPost?id_categoria=<?php echo $id_cat; ?> " />
					<?php
                }
            } catch (Exception $e) {

                die("Error" . $e->getMessage());
                echo " Hi ha un error  a la línia" . $e->getLine();
            }

            ?>

            <!-- BOOTSTRAP JS FILES -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>



</body>

</html>