<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir post</title>

    <!-- BOOTSTRAP CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>

    <!-- CSS FILE -->
    <link rel="stylesheet" href="css/formCrud.css">


</head>

<body>

<!-- BOTON VOLVER AL MENÚ -->

    <a href="admin"><button class=" btn btn-outline-primary btn-lg consult-categorias" style="margin-top:20px;margin-left:600px">Volver a admin</button></a>
    <?php

    ?>

    <!-- FORM PARA AÑADIR POST -->

    <form action="add" id="formAdd" method="post">
        <h1>Añadir post</h1><br>
		 <label>
                        <p class="label-txt">Orden del post</p>
                        <input type="number" class="input" name="orden_p">
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
       
			 <label>
                        <p class="label-txt">Orden del post de la categoria</p>
                        <input type="number" class="input" name="orden_p_c">
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
        <label>
            <p class="label-txt">Título: </p><br>
            <input type="text" class="input" name="titulo" id="titulo" required>
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
        <label>
            <p class="label-txt">Fecha:</p><br>
            <input type="date" class="input" name="fecha" id="fecha" required>
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
        <label>
            <p class="label-txt">Introducción: </p><br>
            <textarea id="intro" cols="90" rows="20" name="intro" id="intro" required></textarea>
        </label>
		<h2>SEO</h2>
        <label>
            <p class="label-txt">Url: </p><br>
            <input type="text" class="input" name="url" id="url">
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
        <label>
            <p class="label-txt">Título página:</p><br>
            <input type="text" class="input" name="titulo_pagina_post" id="tPagina" required>
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
        <label>
            <p class="label-txt">Meta post: </p><br>
            <input type="text" class="input" name="meta_post" id="meta" required>
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
        <label>
            <button class="btn btn-danger" type="submit" id="submit" name="submit">Añadir post</button>
		</label>
    </form>
	
    <?php

    try {
        // CONFIG FILE
        include('config.php');

        if (isset($_POST['submit'])) {

            //VARIABLES DEL POST SACADAS DEL FORM
            $titulo = $_POST['titulo'];
            $fecha = $_POST['fecha'];
            $intro = $_POST['intro'];
            $url = $_POST['url'];
			$orden_p=$_POST['orden_p'];
            $fecha_str = strtotime($fecha);
            $fechapro = date('y-m-d', $fecha_str);
            $titulo_pagina_post = $_POST['titulo_pagina_post'];
            $meta_post = $_POST['meta_post'];
			$orden_p_c = $_POST['orden_p_c'];
			if ($orden_p==""){
				$orden_p=999;
			}
			if ($orden_p_c==""){
				$orden_p_c=999;
			}
            //INSERTAR LOS DATOS DEL POST
            $sql_insert = "INSERT INTO post (orden_p,orden_p_c,titulo_post,fecha_post,introduccion_post,url_post,titulo_pagina_post,meta_post) VALUES ($orden_p,$orden_p_c,'$titulo','$fechapro','$intro','$url','$titulo_pagina_post','$meta_post')";

            $connection->exec($sql_insert);
            $error = $connection->errorInfo();
            if ($error[0] != 0) {
                echo "Error introduciendo el nuevo registro<br>";
            } else {
                echo "El nuevo registro se ha introducido con éxito<br>";
            }
            $sql_consult = "SELECT id_post FROM post";

            $resultat = $connection->prepare($sql_consult);

            $resultat->execute();

            $post = $resultat->rowCount();

            while ($fila = $resultat->fetch(PDO::FETCH_ASSOC)) {

                foreach ($fila as $valor_columna) {

                    $lastid = $valor_columna;
                }
            }
			session_start(); // SE INICIA LA SESIÓN EN LA QUE EMAIL ES IGUAL A $POST['EMAIL']

            $_SESSION['id_post'] =$lastid;
            // PROCEDER AL ARCHIVO PARA AGREGAR UN HEADER
            header("Location:admin");
        }
    } catch (Exception $e) {

        die("Error" . $e->getMessage());
        echo " Hi ha un error  a la línia" . $e->getLine();
    }

    ?>


    <!-- BOOTSTRAP JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>



</body>

</html>