<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir header</title>

    <!-- BOOTSTRAP CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>

    <!-- CSS FILE -->
    <link rel="stylesheet" href="css/formCrud.css">


</head>


<body>
	<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
     <?php $id_post = $_GET['id_post'] ?>
	
	<a href="admin"><button class=" btn btn-outline-primary btn-lg consult-categorias" style="margin-top:20px;margin-left:600px">Volver a admin</button></a>
    <form action="" method="post" enctype="multipart/form-data">
		 <input type="hidden" class="input" name="id_post" value="<?php echo $id_post ?>">


        <h1>Añadir header</h1><br>
        <div id="bloque">
                    <label>
                        <p class="label-txt">Orden</p>
                        <input type="text" class="input" name="orden">
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
                
                    <label>
                        <p class="label-txt">Título header</p>
                        <input type="text" class="input" name="tituloHeader" required>
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
				
                    <label>
                        <p class="label-txt">Texto Header </p><br>
                        <textarea id="textHeader" cols="90" rows="20" name="textoHeader" required></textarea>
                    </label>
                    <label>
                        <p class="label-txt">Imagen (Tamaño máximo = 200 kb) </p><br>
                        <input type="file" name="imagen" id="fileupload">
                    </label>
				<label>
                        <p class="label-txt">descripcion del pie de la foto</p>
                        <input type="text" class="input" name="descrp_pie_foto">
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
                    <label>
                        <p class="label-txt">Banner (Tamaño máximo = 200 kb)  </p><br>
                        <input type="file" name="imagenBanner" id="fileupload">
                    </label>
                    <label>
                        <p class="label-txt">Link lateral</p>
                        <input type="text" class="input" name="linkLateral">
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>        
        </div>
        <button class="btn btn-danger" type="submit" name="guardar">añadir header</button>
        <div id="enviar"></div>

    </form>
	
<?php
	
    include('config.php');
    if (isset($_POST["guardar"])) {


        
    session_start();
    $id_post = $_SESSION['id_post'];

        $id_post_r = $id_post;
        $tituloHeader = $_POST['tituloHeader'];
        $orden = $_POST['orden'];
        $textoHeader = $_POST['textoHeader'];
        $extension_img=$_FILES['imagen']['type'];
        $extension_banner=$_FILES['imagenBanner']['type'];
        $image_Nombre = $_FILES['imagen']['name'];
        $image_Guardar = $_FILES['imagen']['tmp_name'];
        $banner_Nombre = $_FILES['imagenBanner']['name'];
        $banner_Guardar = $_FILES['imagenBanner']['tmp_name'];
        $linkLateral = $_POST['linkLateral'];
       $descrp_pie_foto=$_POST['descrp_pie_foto'];
if ($orden==""){
					$orden=999;
					}
        //SUBIR IMAGEN A LA BD
  // EXTENSION DE LA IMAGEN_BANNER
            if (!((strpos($extension_banner, "gif") || strpos($extension_banner, "jpeg") || strpos($extension_banner, "jpg") || strpos($extension_banner, "png")) )) {
                echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
             }
             else {
                //Si la imagen es correcta en tamaño y tipo
                //Se intenta subir al servidor
                if (move_uploaded_file($banner_Guardar, 'img/'.$banner_Nombre)) {
                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                    chmod('img/'.$banner_Nombre, 0777);
                    //Mostramos el mensaje de que se ha subido co éxito
                    echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                    //Mostramos la imagen subida
                    echo '<p><img src="img/'.$banner_Nombre.'"></p>';
                }
                else {
                   //Si no se ha podido subir la imagen, mostramos un mensaje de error
                   echo '<div><b>Error al subir el fichero. No pudo guardarse.</b></div>';
                }
        }
       
            // EXTENSION DE LA IMAGEN
            if (!((strpos($extension_img, "gif") || strpos($extension_img, "jpeg") || strpos($extension_img, "jpg") || strpos($extension_img, "png")) )) {
                echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
             }
             else {
                //Si la imagen es correcta en tamaño y tipo
                //Se intenta subir al servidor
                if (move_uploaded_file($image_Guardar, 'img/'.$image_Nombre)) {
                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                    chmod('img/'.$image_Nombre, 0777);
                    //Mostramos el mensaje de que se ha subido co éxito
                    echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                    //Mostramos la imagen subida
                    echo '<p><img src="img/'.$image_Nombre.'"></p>';
                }
                else {
                   //Si no se ha podido subir la imagen, mostramos un mensaje de error
                   echo '<div><b>Error al subir el fichero. No pudo guardarse.</b></div>';
                }
        }
		
     $query = "INSERT INTO headers (id_post,orden,tituloHeader,textoHeader,imagen,bannerLateral,linkLateral,descrp_pie_foto) VALUES ($id_post_r,$orden,'$tituloHeader','$textoHeader','$image_Nombre','$banner_Nombre','$linkLateral','$descrp_pie_foto') ";
	
            $connection->exec( $query);
            $error = $connection->errorInfo();
            if ($error[0] != 0) {
                echo "Error introduciendo el nuevo registro<br>";
            } else {
                echo "El nuevo registro se ha introducido con éxito<br>";
            }
			header("location:getHeaders?id_post=$id_post_r");
	
	}
?>