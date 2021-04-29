<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('config.php');

//CONSULTA DEL POST

?>
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
 <!-- BOTON VOLVER AL MENÚ -->

            <a href="admin.php"><i class="bi bi-arrow-left-square" style="float:right;margin-right:30px;" title="Volver al menú"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg></i></a>
    <?php

    // CONSULTA SQL
	
	$id_post=$_GET['id_post'];
	echo $id_post;
    $sql_consult = "SELECT * FROM post WHERE  id_post=$id_post";

    // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

    $resultat = $connection->prepare($sql_consult);

    $resultat->execute();

    $post = $resultat->rowCount();


    //CONSULTA DE LOS HEADERS 

    $sql_consult2 = "SELECT * FROM headers WHERE id_post=$id_post";

    // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

    $resultat2 = $connection->prepare($sql_consult2);

    $resultat2->execute();

    $headers = $resultat2->rowCount();

    //SQL MUESTRA CATEGORÍAS

    $sql_consult3 = "SELECT * FROM categorias c INNER JOIN post_categorias pc WHERE pc.id_post=$id_post and pc.id_categoria=c.id_categoria";

    $resultat3 = $connection->prepare($sql_consult3);

    $resultat3->execute();

    $categorias = $resultat3->rowCount();
    if ($post != 0) {
        $i = 0;

       

    ?>
	
	
      

			<?php
		 foreach ($resultat2 as $resultats2) {
			 ?>
            <form action="edit2.php" method="get" enctype="multipart/form-data">
				                    <input type="hidden" class="input" name="id_post" value="<?php echo $id_post ?>" required>

                <h1>Leer y editar header <?php echo $resultats2['id_headers'] ?> </h1><br>
                <div id="bloque">
                    <input type="hidden" class="input" name="id_headers[]" value="<?php echo $resultats2['id_headers'] ?>" required>
                    <label>
                        <p class="label-txt">Orden</p>
                        <input type="number" class="input" name="orden[]" value="<?php echo $resultats2['orden'] ?>" required>
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
                
                    <label>
                        <p class="label-txt">Título header</p>
                        <input type="text" class="input" name="tituloHeader[]" value="<?php echo $resultats2['tituloHeader'] ?>" required>
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>

                    <label>
                        <p class="label-txt">Texto Header </p><br>
                        <textarea id="textHeader" cols="60" rows="10" name="textoHeader[]" required><?php echo $resultats2['textoHeader'] ?></textarea>
                    </label>
                    <label>
                        <p class="label-txt">Imagen </p><br>
                        <input type="file" name="imagen[]" id="fileupload" value="<?php echo $resultats2['imagen'] ?>" >
						<p><img src= "http://unhidrogen.com/b/img/<?php echo $resultats2['imagen'] ?>" alt="" width="20%"></p>

                    </label>
                    <label>
                        <p class="label-txt">Banner </p><br>
                        <input type="file" name="imagenBanner[]" id="fileupload" value="<?php echo $resultats2['imagenBanner'] ?>" >
						  <p><img src= "http://unhidrogen.com/b/img/<?php echo $resultats2['imagenBanner'] ?>" alt="" width="20%"></p>

                    </label>
                    <label>
                        <p class="label-txt">Link lateral</p>
                        <input type="text" class="input" name="linkLateral[]" value="<?php echo $resultats2['linkLateral'] ?>" required>
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
                	<label>
						
					<button class="btn btn-primary" type="submit" name="guardar">Guardar</button>
					</label>
				</div>
				<?php
		 }
		?>
			</form>
            <?php
        
    }
            ?>
				
					<!-- BOTON IR A EDIT2.PHP -->

            <a href="edit3.php"><i class="bi bi-arrow-right-square" style="float:left;margin-right:30px;"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                    </svg></i></a>
-->
            

            <?php

            try {
                // CONFIG FILE
                include('config.php');

                if (isset($_GET['guardar'])) {
                     $id_post_r = $_GET['id_post'];
        $tituloHeader = $_GET['tituloHeader'];
        $orden = $_GET['orden'];
        $textoHeader = $_GET['textoHeader'];
        $extension_img=$_FILES['imagen']['type'];
        $extension_banner=$_FILES['imagenBanner']['type'];
        $image_Nombre = $_FILES['imagen']['name'];
        $image_Guardar = $_FILES['imagen']['tmp_name'];
        $banner_Nombre = $_FILES['imagenBanner']['name'];
        $banner_Guardar = $_FILES['imagenBanner']['tmp_name'];
        $linkLateral = $_GET['link'];
					echo $_GET['id_post'];
					
           for ($i = 0; $i < count( $image_Nombre); $i++) {

                    if (!((strpos($extension_img[$i], "gif") || strpos($extension_img[$i], "jpeg") || strpos($extension_img[$i], "jpg") || strpos($extension_img[$i], "png")))) {
                    } else {
                        //Si la imagen es correcta en tamaño y tipo
                        //Se intenta subir al servidor
                        if (move_uploaded_file($image_Guardar[$i], 'img/' . $image_Nombre[$i])) {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('img/' . $image_Nombre[$i], 0777);
                            //Mostramos el mensaje de que se ha subido co éxito
                            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                            //Mostramos la imagen subida
                            echo '<p><img src="img/' . $image_Nombre[$i] . '"></p>';
                        } else {
                            //Si no se ha podido subir la imagen, mostramos un mensaje de error
                            echo '<div><b>Error al subir el fichero. No pudo guardarse.</b></div>';
                        }
                        }
                    }

                    // SUBIR BANNER A LA BD

                    for ($i = 0; $i < count($banner_Nombre); $i++) {
                    if (!((strpos($extension_banner[$i], "gif") || strpos($extension_banner[$i], "jpeg") || strpos($extension_banner[$i], "jpg") || strpos($extension_banner[$i], "png")))) {
                        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                    } else {
                        //Si la imagen es correcta en tamaño y tipo
                        //Se intenta subir al servidor
                        if (move_uploaded_file($banner_Guardar[$i], 'img/' . $banner_Nombre[$i])) {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('img/' . $banner_Nombre[$i], 0777);
                            //Mostramos el mensaje de que se ha subido co éxito
                            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                            //Mostramos la imagen subida
                            echo '<p><img src="img/' . $banner_Nombre[$i] . '"></p>';
                        } else {
                            //Si no se ha podido subir la imagen, mostramos un mensaje de error
                            echo '<div><b>Error al subir el fichero. No pudo guardarse.</b></div>';
                        }
                    }
                }          
                  for ($i = 0; $i < count($id_headers); $i++) {
                    $id_headers_i = $id_headers[$i];
                    $tituloHeader_i = $tituloHeader[$i];
                    $orden_i= $orden[$i];
                    $textoHeader_i = $textoHeader[$i];
                    $image_Nombre_i =$image_Nombre[$i];
                    $image_Guardar_i = $image_Guardar[$i];
                    $banner_Nombre_i = $banner_Nombre[$i];
                    $banner_Guardar_i =$banner_Guardar[$i];
                    $linkLateral_i = $linkLateral[$i];
                    $extension_img_i =$extension_img[$i];
                    $extension_banner_i = $extension_banner[$i];



                    $sql = "UPDATE headers SET orden='$orden_i',tituloHeader='$tituloHeader_i',textoHeader='$textoHeader_i',imagen='$image_Nombre_i' ,bannerLateral='$banner_Nombre_i' ,linkLateral='$linkLateral_i' WHERE id_headers='$id_headers_i'";
                    $res = $connection->query($sql) or die('Error modificando el registro: ' . $connection->errno . $connection->error);
                    }
				
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