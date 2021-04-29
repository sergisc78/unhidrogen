<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
    <script>
        function AgregarMas() {
            $("<div>").load("headerDinamico.php", function() {
                $("#bloque:first").append($(this).html());
            });
        }
    </script>


    <link rel="stylesheet" href="css/formCrud.css">

</head>

<body>
    <?php

   
    
    ?>
    <form action="" method="post" enctype="multipart/form-data">

        <h1>Añadir headers </h1><br>
        <div id="bloque">
            <label>
                <p class="label-txt">Orden</p>
                <input type="number" class="input" name="orden[]" required>
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">Título header</p>
                <input type="text" class="input" name="tituloHeader[]" required>
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>

            <label>
                <p class="label-txt">Texto Header </p><br>
                <textarea id="textHeader" cols="60" rows="10" name="textoHeader[]" required></textarea>
            </label>
            <label>
                <p class="label-txt">Imagen </p><br>
                <input type="file" name="imagen[]" accept="image/*" value="fileupload" id="fileupload">
            </label>
            <label>
                <p class="label-txt">Banner </p><br>
                <input type="file" name="imagenBanner[]" accept="image/*" value="fileupload" id="fileupload">
            </label>
            <label>
                <p class="label-txt">Link lateral </p>
                <input type="text" class="input" name="link[]">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
        </div>
        <input class="btn btn-success" type="button" name="agregar_registros" value="Agregar Mas" onClick="AgregarMas();" />
        <button class="btn btn-primary" type="submit" name="guardar">Enviar</button>
        <div id="enviar"></div>
				<a href="add3"> saltarse este paso<i class="bi bi-arrow-right-square"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
</svg></a>




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
        $linkLateral = $_POST['link'];
       

        //SUBIR IMAGEN A LA BD

        for ($i = 0; $i < count($image_Nombre); $i++) {

            // EXTENSION DE LA IMAGEN
            if (!((strpos($extension_img[$i], "gif") || strpos($extension_img[$i], "jpeg") || strpos($extension_img[$i], "jpg") || strpos($extension_img[$i], "png")) )) {
                echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
             }
             else {
                //Si la imagen es correcta en tamaño y tipo
                //Se intenta subir al servidor
                if (move_uploaded_file($image_Guardar[$i], 'img/'.$image_Nombre[$i])) {
                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                    chmod('img/'.$image_Nombre[$i], 0777);
                    //Mostramos el mensaje de que se ha subido co éxito
                    echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                    //Mostramos la imagen subida
                    echo '<p><img src="img/'.$image_Nombre[$i].'"></p>';
                }
                else {
                   //Si no se ha podido subir la imagen, mostramos un mensaje de error
                   echo '<div><b>Error al subir el fichero. No pudo guardarse.</b></div>';
                }
        }
    }

        // SUBIR BANNER A LA BD

        for ($i = 0; $i < count($banner_Nombre); $i++) {

            // EXTENSION DE LA IMAGEN_BANNER
            if (!((strpos($extension_banner[$i], "gif") || strpos($extension_banner[$i], "jpeg") || strpos($extension_banner[$i], "jpg") || strpos($extension_banner[$i], "png")) )) {
                echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
             }
             else {
                //Si la imagen es correcta en tamaño y tipo
                //Se intenta subir al servidor
                if (move_uploaded_file($banner_Guardar[$i], 'img/'.$banner_Nombre[$i])) {
                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                    chmod('img/'.$banner_Nombre[$i], 0777);
                    //Mostramos el mensaje de que se ha subido co éxito
                    echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                    //Mostramos la imagen subida
                    echo '<p><img src="img/'.$banner_Nombre[$i].'"></p>';
                }
                else {
                   //Si no se ha podido subir la imagen, mostramos un mensaje de error
                   echo '<div><b>Error al subir el fichero. No pudo guardarse.</b></div>';
                }
        }
    }


        $contador = count($tituloHeader);
        $ProContador = 0;
        $query = "INSERT INTO headers (id_post,orden,tituloHeader,textoHeader,imagen,bannerLateral,linkLateral) VALUES ";
        $queryValue = "";
        for ($i = 0; $i < $contador; $i++) {

            $ProContador++;
            if ($queryValue != "") {
                $queryValue .= ",";
            }
            $queryValue .= "('" . $id_post . "', '" . $_POST['orden'][$i] . "', '" . $_POST['tituloHeader'][$i] . "', '" . $_POST['textoHeader'][$i] . "', '" . $_FILES['imagen']['name'][$i] . "', '" . $banner_Nombre[$i] . "', '" . $_POST['link'][$i] .  "')";
        }
        $sql = $query . $queryValue;

        $resultat = $connection->prepare($sql);

        $resultat->execute();
        if ($ProContador != 0) {
            // $resultadocon = mysqli_query($conn, $sql);
            if (!empty($resultadocon)) $resultado = " <br><ul class='list-group' style='margin-top:15px;'>
           <li class='list-group-item'>Registro(s) Agregado Correctamente.</li></ul>";
        }
        
        echo "<br>";
        header("Location:add3");
    }




    /*
    if (isset($_POST['submit'])) {

        $id_post_r = $id_post;
        $tituloHeader = $_POST['tituloHeader'];
        $orden = $_POST['orden'];
        $textoHeader = $_POST['textoHeader'];
        $imagen = $_POST['imagen'];;
        $banner = $_POST['imagenBanner'];
        $linkLateral = $_POST['link'];
       
       

        
        $sql_insert = "INSERT INTO headers (id_post,orden,tituloHeader,textoHeader,imagen,bannerLateral,linkLateral) VALUES ([0],[1],[2],?,?,?,?)";

        $result2 = $connection->prepare($sql_insert);


        // S´ENVIEN PER PARÀMETRE LES DADES 


        $result2->bindParam(1, $id_post_r, PDO::PARAM_INT);
        $result2->bindParam(2, $orden, PDO::PARAM_INT);
        $result2->bindParam(3, $tituloHeader);
        $result2->bindParam(4, $textoHeader);
        $result2->bindParam(5, $imagen);
        $result2->bindParam(6, $banner);
        $result2->bindParam(7, $linkLateral);

        $result2->execute();

        header('Refesh:20,url=admin.php');
    
    }*/

    

    ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>



</body>

</html>