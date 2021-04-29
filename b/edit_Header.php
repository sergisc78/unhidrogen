<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/formCrud.css">

</head>

<body>
    <?php
	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	
    include("config.php");
	$id_header=$_GET['id_headers'];
   session_start();
	$_SESSION['id_post']=$_GET['id_post'];
    $sql_consult2 = "SELECT * FROM headers WHERE id_headers= '$id_header' ";

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
	  <a href="getHeaders?id_post=<?php echo urlencode($_GET['id_post']) ?>"><button class=" btn btn-outline-primary btn-lg consult-categorias" style="margin-top:20px;margin-left:600px">Volver a los headers de este post</button></a>
            <form action="" method="post" enctype="multipart/form-data">

                <h1>Leer y editar header <?php echo $resultats2['id_headers'] ?> </h1><br>
				<div class="d-flex justify-content-center">
                          
                        </div>
                <div id="bloque">

                    <input type="hidden" class="input" name="id_headers" value="<?php echo $resultats2['id_headers'] ?>" required>
					<input type="hidden" class="input" name="id_post" value="<?php echo $_GET['id_post'] ?>" required>
                    <label>
                        <p class="label-txt">Orden</p>
                        <input type="text" class="input" name="orden" value="<?php echo $resultats2['orden'] ?>">
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
                
                    <label>
                        <p class="label-txt">Título header</p>
                        <input type="text" class="input" name="tituloHeader" value="<?php echo $resultats2['tituloHeader'] ?>" required>
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>

                    <label>
                        <p class="label-txt">Texto Header </p><br>
                        <textarea id="textHeader" cols="90" rows="20" name="textoHeader" required><?php echo $resultats2['textoHeader'] ?></textarea>
                    </label>
                    <label>
                        <p class="label-txt">Imagen </p><br>
                        <input type="file" name="imagen" id="fileupload">
						<input type="checkbox" name="borrar_imagen" value="borrar_imagen" /> borrar_imagen

						<div>
                             <p><img src= "http://unhidrogen.com/b/img/<?php echo $resultats2['imagen'] ?>" alt="" width="20%"></p>
							<p><?php echo $resultats2['imagen'] ?></p>
                       </div>
						
                    </label>
						 <label>
                        <p class="label-txt">descripcion del pie de la foto</p>
                        <input type="text" class="input" name="descrp_pie_foto" value="<?php echo $resultats2['descrp_pie_foto'] ?>">
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
                    <label>
                        <p class="label-txt">Banner </p><br>
                        <input type="file" name="imagenBanner" id="fileupload">
						<input type="checkbox" name="borrar_Banner" value="borrar_Banner" /> borrar Banner
						<div>
                             <p><img src= "http://unhidrogen.com/b/img/<?php echo $resultats2['bannerLateral'] ?>" alt="" width="20%"></p>
							<p><?php echo $resultats2['bannerLateral'] ?></p>
                       </div>
                    </label>
                    <label>
                        <p class="label-txt">Link lateral</p>
                        <input type="text" class="input" name="linkLateral" value="<?php echo $resultats2['linkLateral'] ?>">
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

                </div>



            </form>

            <?php

            try {
                // CONFIG FILE
                include('config.php');
                if (isset($_POST['submit'])) {
                    
					
                    //VARIABLES DEL HEADER
                    $id_headers = $_POST['id_headers'];
                    $tituloHeader = $_POST['tituloHeader'];
                    $orden = $_POST['orden'];
                    $textoHeader = $_POST['textoHeader'];
                    $image_Nombre = $_FILES['imagen']['name'];
                    $image_Guardar = $_FILES['imagen']['tmp_name'];
                    $banner_Nombre = $_FILES['imagenBanner']['name'];
                    $banner_Guardar = $_FILES['imagenBanner']['tmp_name'];
                    $linkLateral = $_POST['linkLateral'];
                    $extension_img = $_FILES['imagen']['type'];
                    $extension_banner = $_FILES['imagenBanner']['type'];
					$descrp_pie_foto=$_POST['descrp_pie_foto'];
					if ($orden==""){
						$orden=999;
					}
					echo $_SESSION['id_post'];
					
					if (isset($_POST['borrar_imagen'])){
						$borrar_imagen=$_POST['borrar_imagen'];
					}else{
						$borrar_imagen=NULL;
					}
					if (isset($_POST['borrar_Banner'])){
							$borrar_banner=$_POST['borrar_Banner'];

					}else{
						$borrar_banner=NULL;
					}
					
                    //SUBIR IMAGEN A LA BD


                    if (!((strpos($extension_img, "gif") || strpos($extension_img, "jpeg") || strpos($extension_img, "jpg") || strpos($extension_img, "png")))) {
                    } else {
                        //Si la imagen es correcta en tamaño y tipoO
                        //Se intenta subir al servidor
                        if (move_uploaded_file($image_Guardar, 'img/' . $image_Nombre)) {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('img/' . $image_Nombre, 0777);
                            //Mostramos el mensaje de que se ha subido co éxito
                            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                            //Mostramos la imagen subida
                            echo '<p><img src="img/' . $image_Nombre . '"></p>';
                        } else {
                            //Si no se ha podido subir la imagen, mostramos un mensaje de error
                            echo '<div><b>Error al subir el fichero. No pudo guardarse.</b></div>';
                        }
                        }
					

                    // SUBIR BANNER A LA BD

                   
                    if (!((strpos($extension_banner, "gif") || strpos($extension_banner, "jpeg") || strpos($extension_banner, "jpg") || strpos($extension_banner, "png")))) {
                        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                    } else {
                        //Si la imagen es correcta en tamaño y tipo
                        //Se intenta subir al servidor
                        if (move_uploaded_file($banner_Guardar, 'img/' . $banner_Nombre)) {
                            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                            chmod('img/' . $banner_Nombre, 0777);
                            //Mostramos el mensaje de que se ha subido co éxito
                            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                            //Mostramos la imagen subida
                            echo '<p><img src="img/' . $banner_Nombre . '"></p>';
                        } else {
                            //Si no se ha podido subir la imagen, mostramos un mensaje de error
                            echo '<div><b>Error al subir el fichero. No pudo guardarse.</b></div>';
                        }
                    }
					if (is_null($borrar_imagen)){
						echo "la imagen no se borra";
					}else{
						$sql = "UPDATE headers SET imagen='' WHERE id_headers='$id_headers'";
						$res = $connection->query($sql) or die('Error modificando el registro: ' . $connection->errno . $connection->error);
						echo "la imagen se borra";
					}
					if (is_null($borrar_banner)){
						echo "El banner no se borra";
					}else{
						$sql = "UPDATE headers SET bannerLateral='' WHERE id_headers='$id_headers'";
				$res = $connection->query($sql) or die('Error modificando el registro: ' . $connection->errno . $connection->error);
						echo "El banner se borra";

					}
					if ($image_Nombre!='' and $banner_Nombre!=''){
					$sql = "UPDATE headers SET imagen='$image_Nombre',bannerLateral='$banner_Nombre' WHERE id_headers='$id_headers'";
						$res = $connection->query($sql) or die('Error modificando el registro: ' . $connection->errno . $connection->error);
						echo "has actualizado ambas";
					}
					
					if ($image_Nombre=='' and $banner_Nombre!=''){
					$sql = "UPDATE headers SET bannerLateral='$banner_Nombre' WHERE id_headers='$id_headers'";
						$res = $connection->query($sql) or die('Error modificando el registro: ' . $connection->errno . $connection->error);
						echo "has actualizado el banner";
					}
					if ($image_Nombre!='' and $banner_Nombre==''){
					$sql = "UPDATE headers SET imagen='$image_Nombre' WHERE id_headers='$id_headers'";
						$res = $connection->query($sql) or die('Error modificando el registro: ' . $connection->errno . $connection->error);
						echo "has actualizado la imagen";
					}
					
					
					
					
	$sql = "UPDATE headers SET orden='$orden',tituloHeader='$tituloHeader',textoHeader='$textoHeader',linkLateral='$linkLateral',descrp_pie_foto='$descrp_pie_foto' WHERE id_headers='$id_headers'";
					
					$res = $connection->query($sql) or die('Error modificando el registro: ' . $connection->errno . $connection->error);
					$sesion=$_SESSION['id_post'];
					
					
									
						
					
					?>
				<meta http-equiv="refresh" content="2; URL=getHeaders?id_post=<?php echo urlencode($sesion) ?>" />
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