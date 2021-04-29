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
        function Agregarcategoria() {
            $("<div>").load("categoriaDinamica.php", function() {
                $("#bloque:first").append($(this).html());
            });
        }
    </script>

<script src="js/add3.js"></script>

    <link rel="stylesheet" href="css/formCrud.css">

</head>

<body>
    <?php
    /* insertamos las categorias que sean del post que hemos creado para eso hemos creado
    una sesion con la id del post que estamos utilizando para asociar las categorias
    creadas con la id de nuestro post.
    Se insertara tambien formularios de categoria dinamica
    para tener mas de una categoria en el post*/
    ?>
    <form action="" method="post">

        <h1>Añadir Categoría</h1><br>
        <div id="bloque">

            <label>
                <p class="label-txt">Descripción categoría </p>
                <input type="text" class="input" name="categoria[]" id="categoria" required>
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">Url </p>
                <input type="text" class="input" name="url[]" id="url" required>
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">Título página: </p>
                <input type="text" class="input" name="titulo_pagina_categoria[]" id="pagina" required>
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
                <p class="label-txt">Meta categoría: </p>
                <input type="text" class="input" name="meta_categoria[]" id="meta" required>
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label>
			</label>
        </div>
        <input class="btn btn-success" type="button" name="agregar_registros" value="Agregar Mas" onClick="Agregarcategoria();" />
        <button class="btn btn-primary" type="submit" name="guardar">Enviar</button>
        <div id="enviar"></div>
		<a href="admin">saltarse este paso<i class="bi bi-arrow-right-square"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
</svg></a>




    </form>


    <header>


    </header>

    <?php

    include('config.php');
    if (isset($_POST["guardar"])) {

        

        // VARIABLES DE CATEGORIA IMPRIMIDAS
        $descr_categoria = $_POST['categoria'];
        $url = $_POST['url'];
        $titulo_pagina_categoria = $_POST['titulo_pagina_categoria'];
        $meta_categoria = $_POST['meta_categoria'];
		
        include('config.php');

        // CONSULTA SQL DE LA TABLA POST

        session_start();
    $id_post = $_SESSION['id_post'];


        $contador = count($descr_categoria);
        $ProContador = 0;

        //INSERTA LAS CATEGORIAS QUE HEMOS AGREGADO

        $query = "INSERT INTO categorias (descr_categoria,url_categoria,titulo_pagina_categoria,meta_categoria) VALUES ";
        $queryValue = "";
        for ($i = 0; $i < $contador; $i++) {

            $ProContador++;
            if ($queryValue != "") {
                $queryValue .= ",";
            }
            $queryValue .= "('" . $descr_categoria[$i] . "', '" . $url[$i] . "', '" . $titulo_pagina_categoria[$i] . "', '" . $meta_categoria[$i] .  "')";
        }
        $sql = $query . $queryValue;
        echo "sentencia1: sql $sql";

        $resultat2 = $connection->prepare($sql);

        $resultat2->execute();
        if ($ProContador != 0) {
        }

        //COJE LA MAXIMA ID DE CATEGORIA PARA LA HORA DE AGREGAR AL POSTCOMPONENT(TABLA PUENTE)

        $array = array();
        $array1 = array();
        for ($i = 0; $i < $contador; $i++) {
            $sql_consult2 = "SELECT id_categoria FROM categorias";
            $resultat2 = $connection->prepare($sql_consult2);

            $resultat2->execute();

            $categoriia = $resultat2->rowCount();
            foreach ($resultat2 as $resultats2) {
                $id_categoria = $resultats2['id_categoria'];
              
            }
        }
        //  AGREGA LAS ID DESDE LA PRIMERA CATEGORIA QUE HEMOS CREADO, HASTA LA ÚLTIMA 

        $num_resta_categoria = $contador - $id_categoria;
        $sql_consult3 = " SELECT * FROM categorias WHERE id_categoria BETWEEN $id_categoria-$contador+1 and $id_categoria";
        $resultat4 = $connection->prepare($sql_consult3);

        $resultat4->execute();

        $categoriia = $resultat4->rowCount();
        foreach ($resultat4 as $resultats4) {
            $id_categoria = $resultats4['id_categoria'];
            array_push($array, $id_categoria);
        }

        //INSERTAMOS EL ARRAY DE ID DE CATEGORIAS PARA QUE SE RELACIONE CON EL POST QUE QUEREMOS AÑADIR

        print_r($array);
        $ProContador = 0;
        $query = "INSERT INTO post_categorias (id_categoria,id_post) VALUES ";
        $queryValue = "";
        for ($i = 0; $i < $contador; $i++) {

            $ProContador++;
            if ($queryValue != "") {
                $queryValue .= ",";
            }
            $queryValue .= "('" . $array[$i] . "', '" . $id_post .  "')";
        }
        $sql = $query . $queryValue;


        $resultat2 = $connection->prepare($sql);

        $resultat2->execute();
        if ($ProContador != 0) {
            // $resultadocon = mysqli_query($conn, $sql);
            if (!empty($resultadocon)) $resultado = " <br><ul class='list-group' style='margin-top:15px;'>
           <li class='list-group-item'>Registro(s) Agregado Correctamente.</li></ul>";
        }
        header('location:admin');
    }
    echo "<br>";


    ?>

    <!-- BOOTSTRAP JS FILES-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>



</body>

</html>