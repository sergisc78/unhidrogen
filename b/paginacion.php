<?php

// ARCHIVO DE CONFIGURACIÓN

include('config.php');

$url_categoria_concatenar = explode("/", $_SERVER['REQUEST_URI']);
$categoria = end($url_categoria_concatenar);

// MUESTRA EL TÍTULO DE LA PÁGINA SI LA URL EXISTE EN LA BBDD


$sql_consult4 = "SELECT * FROM post p INNER JOIN post_categorias pc INNER JOIN categorias c WHERE p.id_post=pc.id_post and c.id_categoria=pc.id_categoria and c.url_categoria='$categoria'";

// PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

$resultat4 = $connection->prepare($sql_consult4);

$resultat4->execute();

$categoria = $resultat4->rowCount();


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <?php
    foreach ($resultat4 as $resultats4) {


    ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="robots" content="index,follow" />
        <title><?php echo $resultats4['titulo_pagina_categoria']; ?> | UnHidrogen</title>
        <meta name="title" content=" <?php echo $resultats4['titulo_pagina_categoria']; ?>" />
        <meta name="description" content="<?php echo $resultats4['meta_categoria']; ?>"/>

        <meta property="og:title" content=" <?php echo $resultats4['titulo_pagina_categoria']; ?>" />
        <meta property="og:description" content="<?php echo $resultats4['meta_categoria']; ?>"/>
        <meta name=" viewport" content="width=device-width, initial-scale=1.0">
 <?php

    }

    ?>
	
	<!-- JQUERY FILE -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- BOOTSTRAP CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- CSS FILE-->
    <link rel="stylesheet" href='../css/blog.css'>
	<link href="../../css/MENU.css" rel="stylesheet" type="text/css">
	<link href="../../css/FOOTERU.CSS" rel="stylesheet" type="text/css">
	

</head>

<body>
<?php

$url_categoria_concatenar=explode("/",$_SERVER['REQUEST_URI']);
$categoria= end($url_categoria_concatenar);


?>
	<div class="menu1">
        <nav class="menu1nav" style="margin-top: 8px;">
            <a href="">Contact Us</a>
            <a href="">Login</a>
            <a href="" class="menu1search"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg></a>
        </nav>
    </div>
    <div id="menu2" class="menu2">
        <header>
            <div class="menu_bar">
                <a href="#" class="bt-menu"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                    <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                  </svg><img src="LeanBCN.png" class="menu2logoimg-phone"></a>
            </div>
            <div class="menu2logo">
                <a href="../../">
                    <img src="../../images/unhidrogen logo Blanc.png" class="menu2logoimg">
                </a>
            </div>
            <nav class="menu2nav" style="margin-top: -105px;">
                <ul>
                    <li id="menu2nav1">
                        <a class="menu2-principal">Agua Purificada</a>
                    </li>
                    <li id="menu2nav3"><a class="menu2-principal">Hidrogenación</a></li>
                    <li id="menu2nav2">
                        <a class="menu2-principal">Filtración</a>
                    </li>
                    <li id="menu2nav5"><a href="/b" class="menu2-principal">Blog</a></li>
                    <li><a href="#formulario" class="menu2boton" style="height: 35px;">Contacta!</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="submenu_block">
        <div id="submenu1" class="submenu2navegador">
            <div class="submenu2navegador-content">
                <div class="submenu2navegador-content-inner">
                    <ul class="submenu2-list1">
                        <li><a href="../osmosis-inversa-sin-instalacion-portable"><b>Osmosis Inversa Zero</b></a></li>
                        <li><a>Osmosis Inversa Compact</a></li>
                        <li><a>Sistemas Inversa Instalada</a></li>
                    </ul>
                    <div id="submenu2-divpicture" class="submenu2-divpicture">
                        <img src="../../images/submenu1-img.jpg" class="submenu2-picture">
                    </div>
                </div>
            </div>
        </div>
        <div id="submenu2" class="submenu2navegador">
            <div class="submenu2navegador-content">
                <div class="submenu2navegador-content-inner">
                    <ul class="submenu2-list1">
                        <li><a>Filtración Total Entrada</a></li>
                        <li><a>Filtros Descalcificación</a></li>
                        <li><a>Filtros Vitamina C</a></li>
                    </ul>
                    <div id="submenu2-divpicture" class="submenu2-divpicture">
                        <img src="../../images/submenu3-img.jpg" class="submenu2-picture">
                    </div>
                </div>
            </div>
        </div>
        <div id="submenu3" class="submenu2navegador">
            <div class="submenu2navegador-content">
                <div class="submenu2navegador-content-inner">
                    <ul class="submenu2-list1">
                        <li><a href="../../botella-agua-hidrogenada">Botella 400ml Hidrógeno</a></li>
                        <li><a href="../../maquina-inhalacion-hidrogeno-y-agua-hidrogenada">Instalación Gas Hidrógeno</a></li>
                        <li><a href="../../inhalacion-gas-hidroxi-hho-gas-browns">Instalación Gas HidrOxi</a></li>
                    </ul>
                    <div id="submenu2-divpicture" class="submenu2-divpicture">
                        <img src="../../images/submenu2-img.jpg" class="submenu2-picture">
                    </div>
                </div>
            </div>
        </div>
        <div id="submenu4" class="submenu2navegador">
            <div class="submenu2navegador-content">
                <div class="submenu2navegador-content-inner">
                    <ul class="submenu2-list1">
                        <li><a>Purificadores Aire Portables</a></li>
                        <li><a>Generador iones H+ y O2-</a></li>
                        <li><a>Purificador aire 55</a></li>
                        <li><a>Purificador HULPA</a></li>
                    </ul>
                    <ul class="submenu2-list2">
                        <li><a>Sistema MEGA 10 etapas</a></li>
                    </ul>
                    <div id="submenu2-divpicture" class="submenu2-divpicture">
                        <img src="" class="submenu2-picture">
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
	<?php
	include('config.php');
	 $sql_consult8 = "SELECT * FROM categorias WHERE url_categoria='$categoria'";

            // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

            $resultat8 = $connection->prepare($sql_consult8);

            $resultat8->execute();

            $post = $resultat8->rowCount();
	foreach($resultat8 as $resultats8){
		$categoria_header=$resultats8['descr_categoria'];
	}
	?>
    <header id='blog-header'>
		<div class="titolBlog_Principal" id="ePost">
        	<h2 class="blog"><a href="https://unhidrogen.com/b/">Blog de Salud Natural</a></h2>  
			<a><?php echo $categoria_header ?></a>
		</div>
    </header>
    <?php
    


    // hacer un select de categoria relacionando el valor de categoria


    // CONSULTA SQL PARA ENCONTRAR LA/S CATEGORIA/S. PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

    $sql_consult = "SELECT * FROM post p INNER JOIN post_categorias pc INNER JOIN categorias c WHERE p.id_post=pc.id_post and c.id_categoria=pc.id_categoria and c.url_categoria='$categoria' ORDER BY p.orden_p_c ASC";

    //SELECT * FROM post p INNER JOIN post_categorias pc INNER JOIN categorias c WHERE p.id_post=pc.id_post and c.id_categoria=pc.id_categoria 

    //SELECT * FROM post p INNER JOIN post_categorias pc INNER JOIN categorias c WHERE p.id_post=pc.id_post and c.id_categoria=pc.id_categoria and c.descr_categoria="alimentacion1" 

    $resultat = $connection->prepare($sql_consult);

    $resultat->execute();

    $post = $resultat->rowCount();
   

    if ($post > 0) {

        $i = 0;

        foreach ($resultat as $resultats) {
            $i++;

    ?>       
	<div class='container'>
					<div class='date'>
                        <?php

                        $id_post = $resultats['id_post'];

                        //$sql_consult2 = " SELECT * FROM post p INNER JOIN categorias c WHERE p.$id_categorias";
                        $id_post_r = $resultats['id_post'];
                        $sql_consult2 = "SELECT c.descr_categoria,c.url_categoria FROM categorias c INNER JOIN post_categorias pc WHERE pc.id_post=$id_post_r and pc.id_categoria=c.id_categoria";


                        // PREPARA LA CONSULTA SQL PARA MOSTRAR LAS CATEGORÍAS, LA EJECUTA Y CUENTA LOS RESULTADOS

                        $resultat2 = $connection->prepare($sql_consult2);

                        $resultat2->execute();

                        $categoria = $resultat2->rowCount();

                        if ($categoria != 0) {
                            $i = 0;

                            foreach ($resultat2 as $resultats2) {
                                $i++;
                        ?>

                                <a href="<?php echo urlencode($resultats2['url_categoria']); ?>"><span class="categoria"><b><?php echo $resultats2['descr_categoria'] ?></b></span></a>
                        <?php
                            }
                        }
                        ?>
						<div class="divPostData">
							<?php $fecha=$resultats['fecha_post'] ?>
                        	<span class="spanDate"> <?php echo date('F j, Y',strtotime($fecha)); ?></span>&nbsp;
						</div>
                    </div>
					
					
					<div class="titolPBlog">
						<a class="title" href="http://unhidrogen.com/b/<?php echo urlencode($resultats['url_post']); ?>"><h1 class='title'><?php echo $resultats['titulo_post']?></h1></a>
					</div>


                    <div class='subtitle'>

                        <div class='textPBlog'>
                            <p><?php echo $resultats['introduccion_post'] ?></p>
                        </div>
						<div class='readMore'>
							<a class="readMore" href="http://unhidrogen.com/b/<?php echo urlencode($resultats['url_post']); ?>">+ </a>
						</div>
                    </div>

                </div>
	
	
	 <script src="../../js/HOME.js"></script>
        <?php
        }
		?>
	<br><br><br><br>
                <footer class="footer" style="width: 100%; left: 0;">
                    <div class="footer_partners">
                        <div class="footer_partners_container">
                            <div class="footer_partners_flex_row">
                                <div class="footer_partners_columna1">
                                    <p>Colaboradores</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer_content" style="height: 400px;">
                        <div class="footer_content_container">
                            <div class="footer_content_flex_row">
                                <div class="footer_content_columna1">
                                    <div class="footer_content_columna1_content">
                                        <p class="footer_title_quicklinks3" style="font-size: 18px;">Nosotros</p>
                                        <p style="margin-top: -10px;">Empresa establecida con la pasión por el medioambiente y una dilatada experiencia en negocio. Nuestros valores pasan por preservar los recursos naturales y medioambientales para el beneficio de la salud de nuestra
                                            sociedad.
                                        </p>
                                    </div>
                                </div>
                                <div class="footer_content_columna2">
                                    <div class="footer_content_columna2_content">
                                        <img class="fotofooter" src="../../images/fotofooter.jpg">
                                        <div class="footer_content_quicklinks3">
                                            <p class="footer_title_quicklinks3">UnHidrogen</p>
                                            <div class="footer_content_quicklinks_list3">
                                                <ul>
                                                    <li>salud@unhidrogen.com</li>
                                                    <li>+34 93 250 85 21</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer_content_columna3">
                                    <div class="footer_content_columna3_content">
                                        <div class="footer_content_quicklinks1">
                                            <p class="footer_title_quicklinks">Quiklinks</p>
                                            <div class="footer_content_quicklinks_list">
                                                <ul>
                                                    <li><a href="../../osmosis-inversa-sin-instalacion-portable">RO Zero</a></li>
                                                    <li><a href="../../botella-agua-hidrogenada">H2 Bottle</a></li>
                                                    <li><a href="../../maquina-inhalacion-hidrogeno-y-agua-hidrogenada">Inhalation Systems</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="footer_content_quicklinks2">
                                            <p class="footer_title_quicklinks">Web</p>
                                            <div class="footer_content_quicklinks_list">
                                                <ul>
                                                    <li><a href="../../aviso-legal">Aviso-Legal</a></li>
                                                    <li><a href="../../privacidad">Privacidad</a></li>
                                                    <li><a href="../../envios">Envios y Devoluciones</a></li>
                                                    <br>
                                                </ul>
                                            </div>
                                        </div>
                                        <a href="" class="menuboton_footer">Contacta!</a>
										<img src="../../images/unhidrogen logo Blanc.png" class="footer_logo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer_end" style="margin-top: 10px;">
                        <p>©️ 2021 Unhidrogen</p>
                    </div>
                </footer>
		<?php
    }
    
        
    ?>





</body>

</html>