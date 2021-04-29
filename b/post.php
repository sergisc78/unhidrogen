<!-- CÓDIGO QUE MUESTRA EL TÍTULO DE LA PÁGINA EN LA PESTAÑA DEL NAVEGADOR -->

<?php
include('config.php');
$url_post_concatenar = explode("/", $_SERVER['REQUEST_URI']);
$url = end($url_post_concatenar);


// MUESTRA EL TÍTULO DE LA PÁGINA SI LA URL EXISTE EN LA BBDD

$sql_consult4 = "SELECT titulo_pagina_post,meta_post FROM post WHERE  url_post='$url'";

// PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

$resultat4 = $connection->prepare($sql_consult4);

$resultat4->execute();

$post = $resultat4->rowCount();

?>

<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
    <?php

    // BUCLE QUE LEE LOS DATOS DE LA BBDD Y LOS MUESTRA, PARA CREAR EL TÍTULO EN LA PESTAÑA 

    foreach ($resultat4 as $resultats4) {
    ?>
        <meta name="robots" content="index,follow" />
        <title><?php echo $resultats4['titulo_pagina_post']; ?> | UnHidrogen</title>
        <meta name="title" content=" <?php echo $resultats4['titulo_pagina_post']; ?> "  /> 
        <meta name="description" content="<?php echo $resultats4['meta_post']; ?>" />

        <meta property="og:title" content=" <?php echo $resultats4['titulo_pagina_post']; ?>" />
        <meta property="og:description" content=" <?php echo $resultats4['meta_post']; ?>" />
        <meta name=" viewport" content="width=device-width, initial-scale=1.0">
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-195630937-1"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());

 gtag('config', 'UA-195630937-1');
</script>
		<!-- JavaScript ALERTIFY -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
	<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	
	 <?php

    }

    ?>

<!-- JQUERY JS FILE -->
    

    <!-- BOOTSTRAP CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <!-- CSS FILE-->
<link rel="stylesheet" href='css/blog.css'>
	<link href="../css/MENU.css" rel="stylesheet" type="text/css">
	<link href="../css/FOOTERU.CSS" rel="stylesheet" type="text/css">
</head>

<body>
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
                <a href="../">
                    <img src="../images/unhidrogen logo Blanc.png" class="menu2logoimg">
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
                        <img src="../images/submenu1-img.jpg" class="submenu2-picture">
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
                        <img src="../images/submenu3-img.jpg" class="submenu2-picture">
                    </div>
                </div>
            </div>
        </div>
        <div id="submenu3" class="submenu2navegador">
            <div class="submenu2navegador-content">
                <div class="submenu2navegador-content-inner">
                    <ul class="submenu2-list1">
                        <li><a href="../botella-agua-hidrogenada">Botella 400ml Hidrógeno</a></li>
                        <li><a href="../maquina-inhalacion-hidrogeno-y-agua-hidrogenada">Instalación Gas Hidrógeno</a></li>
                        <li><a href="../inhalacion-gas-hidroxi-hho-gas-browns">Instalación Gas HidrOxi</a></li>
                    </ul>
                    <div id="submenu2-divpicture" class="submenu2-divpicture">
                        <img src="../images/submenu2-img.jpg" class="submenu2-picture">
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
                        <img src="https://blob.euruni.photos/Htdocs/Images/IF_Standard/9201.jpg" class="submenu2-picture">
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
	    <?php
   
    
     $url_post_concatenar=explode("/",$_SERVER['REQUEST_URI']);
     $url= end($url_post_concatenar);
   
    try {

        // CONFIG FILE

        include('config.php');


        //VARIABLES ID_POST Y TITULO POST


     

        $url_string='url_post';

        // CONSULTA SQL

        $sql_consult = "SELECT * FROM post WHERE  $url_string='$url'";

        // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

        $resultat = $connection->prepare($sql_consult);

        $resultat->execute();

        $post = $resultat->rowCount();



        // SI ENCUENTRA UN POST, LO MUESTRA

        if ($post != 0) {
            $i = 0;

            foreach ($resultat as $resultats) {
    ?>

    <header id='blog-header'>
		<div class="titolBlog_Principal" id="ePost">
        	<h2 class="blog"><a href="https://unhidrogen.com/b/">Blog de Salud Natural</a></h2>
			<?php
                    
                    $id_post=$resultats['id_post'];
                    
                    $sql_consult2 = "SELECT c.descr_categoria,c.url_categoria FROM categorias c INNER JOIN post_categorias pc WHERE pc.id_post=$id_post and pc.id_categoria=c.id_categoria";

       


                     // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS
             
                     $resultat2 = $connection->prepare($sql_consult2);
             
                     $resultat2->execute();
             
                     $categoria = $resultat2->rowCount();
                     if ($categoria != 0) {
                        $i = 0;
            
                        foreach ($resultat2 as $resultats2) {
                            $i++;
                    ?>
                    
                        <a href="c/<?php echo urlencode($resultats2['url_categoria']); ?>"><span><?php echo $resultats2['descr_categoria'] ?></span></a>
                        <?php
                        }
                    }
                    ?>
		</div>
<!--
        <div class="searchButton">
            <input type='search' id="search" placeholder='Search Post'>
        </div>-->
    </header>
          <div class='container' id="conPost">
			  <!--<div class="divPost-banner">
				  <p>BANNER</p>
			  </div>-->
				<div class="divPost-col" id="ePost">
					<div class="divPost-col-content">
                    <h1 class='title'><?php echo $resultats['titulo_post']  ?></h1>

                    <div class='date'>
                        	<?php $fecha=$resultats['fecha_post'] ?>
						 
                        <span> <?php echo date('F j, Y',strtotime($fecha)); ?></span>&nbsp;
                        <!--<?php
                    
                    $id_post=$resultats['id_post'];
                    
                    $sql_consult2 = "SELECT c.descr_categoria,c.url_categoria FROM categorias c INNER JOIN post_categorias pc WHERE pc.id_post=$id_post and pc.id_categoria=c.id_categoria";

       


                     // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS
             
                     $resultat2 = $connection->prepare($sql_consult2);
             
                     $resultat2->execute();
             
                     $categoria = $resultat2->rowCount();
                     if ($categoria != 0) {
                        $i = 0;
            
                        foreach ($resultat2 as $resultats2) {
                            $i++;
                    ?>
                    
                        <a href="c/<?php echo urlencode($resultats2['url_categoria']); ?>"><span><?php echo $resultats2['url_categoria'] ?></span></a>
                        <?php
                        }
                    }
                    ?>-->
                    </div>

                    <div class='subtitle'>

                        <div class='text-justify' style="margin-bottom: 70px">
                            <p><?php echo $resultats['introduccion_post'] ?></p>
                        </div>
                    <?php
                    $sql_consult3 = "SELECT * FROM post WHERE $url_string='$url'";

                    // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS
        
                    $resultat3 = $connection->prepare($sql_consult3);
        
                    $resultat3->execute();
        
                    $post3 = $resultat3->rowCount();
                    foreach ($resultat3 as $resultats3) {
                        $id_post_get = $resultats3['id_post'];
                    }
                   
                    $sql_consult2 = "SELECT * FROM headers WHERE id_post='$id_post_get' ORDER BY orden ASC";


                    // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS
        
                    $resultat2 = $connection->prepare($sql_consult2);
        
                    $resultat2->execute();
        
                    $headers = $resultat2->rowCount();
        
        
        
                    // SI ENCUENTRA UN HEADER, LO MUESTRA
        
                    if ($headers != 0) {
                        $i = 0;
        
                        foreach ($resultat2 as $resultats2) {
                            $i++;
                            $imagen = $resultats2['imagen'];
                            $banner = $resultats2['bannerLateral'];
                            
                            ?>
                                
        
                                   <div class="divHeadersPost">
                                        <h3><?php echo $resultats2['tituloHeader'] ?></h3>
									   <?php
								   if ($banner!=""){
								?>
                                    <div class="divBanner_cuadre" style="width: 29%; height: 5%; 
																		 position: absolute;
																		 margin-left: -31%;
																		 margin-top: 0%;
																		 padding-left: auto;
																		 padding-right: auto;
																		 "
										  >
                                        
											<?php
									   if ($resultats2['linkLateral']!=""){
									   	?>
											
											<p><a href="<?php echo $resultats2['linkLateral'] ?>"><img src= "http://unhidrogen.com/b/img/<?PHP echo $banner ?>" style="width: 100%; height: 100%;
																												  	border-radius: 0px;
																													position: relative;
																													object-fit: cover;
																													float: right" alt=""></a></p>
        			<?php
										}if ($resultats2['linkLateral']==""){
										?>
										<p><img src= "http://unhidrogen.com/b/img/<?PHP echo $banner ?>" style="width: 100%; height: 100%;
																												  	border-radius: 0px;
																													position: relative;
																													object-fit: cover;
																													float: right" alt=""></p>
										<?php
										
								   }
										?>
                                    </div>
									   <?php
							}
							
                            ?>
                                        <p><?php echo $resultats2['textoHeader'] ?></p>
									   <?php
								if ($imagen!=""){
									?>
                                    <div class="divFoto" style="width: 100%;">
										<div class="divFoto_cuadre" style="width: 100%; height: 50%; 
																		   border: 1px solid rgb(240, 240, 240); 
																		   border-radius: 0px; 
																		   margin-bottom: 10px;">
                                        	<img src= "http://unhidrogen.com/b/img/<?PHP echo $imagen ?>" style=" width: 100%;
    																												height: 100%;
																												  	border-radius: 0px;
																													position: relative;
																													object-fit: cover;" alt="">
										</div>
								
										<?php
										if ($resultats2['descr_pie_foto']!=""){
										?>
										<p class="descripcion_pie_foto"><?PHP echo $resultats2['descrp_pie_foto'] ?></p>
										<?php
										}
										?>
                                    </div>
        						<?php
								}
							?>
								  </div>
                                   
        
                                   
                                
							
        
                    <?php
        
                        }
                    }

                }
            }
        
    } catch (Exception $e) {

        die("Error" . $e->getMessage());
        echo " Hi ha un error  a la línia" . $e->getLine();
    }
            ?>		</div>	
				</div>	
			</div>		
		</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<div class="contacto_formulario">
                        <div class="contacto_formulario_container">
                            <div class="contacto_formulario_row">
                                <h2 class="titol_formulario">Estamos las 24h por ti · 93 250 85 21</h2>
                            </div>
                            <div class="contacto_formulario_row">
                                <div class="contacto_formulario_block">
                                    <div class="contacto_formulario_box">
                                        <form action="" method="POST" name="contact-form">
                                            <div class="div_formulario">
                                                <fieldset>
                                                    <div class="div_formulario_textfield">
                                                        <div class="div_formulario_textfield_content">
                                                            <input name="mail" type="email" placeholder="E-mail*" required>
                                                        </div>
                                                    </div>
                                                    <div class="div_formulario_textfield">
                                                        <div class="div_formulario_textfield_content">
                                                            <input name="name" type="text" placeholder="Producto*">
                                                        </div>
                                                    </div>
													
                                                    <div class="div_formulario_textfield">
                                                        <div class="div_formulario_textfield_content">
                                                            <input name="phone" type="text" placeholder="Teléfono*" required>
                                                        </div>
                                                    </div>
													<div class="div_formulario_textfield">
                                                       
                                                         <input type="checkbox" id="myCheck" name="test" required> aceptar politica de privacidad
                                                       
                                                    </div>
													
                                                </fieldset>
                                                <fieldset>
                                                    <div class="div_formulario_textfield">
                                                        <div class="div_formulario_textfield_content">
                                                            <textarea name="message" placeholder="Mensaje*"></textarea>
                                                        </div>
                                                    </div>
                                                </fieldset>
												
                                            </div>
                                            <div class="div_formulario_button_div">
												
											

												

                                                <button id="btnEnviar" name="send" type="submit" value="enviar" >Envia!</button>
                                            </div>
                                        </form>
										<?php
										
							 if (isset($_POST["send"])) {
								 
								ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Load Composer's autoloader
require 'vendor/autoload.php';
require"PHPMailer-master/src/PHPMailer.php";
require"PHPMailer-master/src/SMTP.php";
require"PHPMailer-master/src/Exception.php";
								 $email=$_POST['mail'];
$message=$_POST['message'];
$phone=$_POST['phone'];
$name=$_POST['name'];
								 $mail =new PHPMailer\PHPMailer\PHPMailer();

try {
    //Server settings

$mail->isSMTP();  // tell the class to use SMTP
$mail->smtpConnect([
   'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    ]
]);
    $mail->Host = 'smtp.unhidrogen.com';
	
    $mail->Username   = 'web@unhidrogen.com';                     //SMTP username
$mail->SMTPAuth = false;
$mail->SMTPAutoTLS = false; 
    $mail->Password   = 'TestLeanBcn2021@';  
	//Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP poret to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
//Recipients
   $mail->setFrom('web@unhidrogen.com','Webmaster');
   //Set an alternative reply-to address
   $mail->addReplyTo('web@unhidrogen.com');
   //Set who the message is to be sent to

   $mail->addAddress('web@unhidrogen.com');
	$mail->isHTML(true);
	$date=date('d/m/Y');
	
   //Set the subject line
   $mail->Subject = "Consulta WEB UNHIDROGEN $date";
	$body="
	
	<p>Email: $email</p>
<p>Producto: $name</p>
<p>Teléfono: $phone</p>
<p>Mensaje: $message</p>";
   $mail->Body =$body;
    //Attachments
  

    //Content
                                  
 
	// Mensaje a enviarr
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
    $mail->send();
	?>
	<script type='text/javascript'>
		 alertify.alert('UnHidrogen !', 'Se ha enviado el mensaje, contactaremos contigo en breve.');
										
										
</script>
		
										
	
										
	<?php
										
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

							 }
										
										?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<br><br><br><br><br>
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
                                        <img class="fotofooter" src="../images/fotofooter.jpg">
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
                                                    <li><a href="../osmosis-inversa-sin-instalacion-portable">RO Zero</a></li>
                                                    <li><a href="../botella-agua-hidrogenada">H2 Bottle</a></li>
                                                    <li><a href="../maquina-inhalacion-hidrogeno-y-agua-hidrogenada">Inhalation Systems</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="footer_content_quicklinks2">
                                            <p class="footer_title_quicklinks">Web</p>
                                            <div class="footer_content_quicklinks_list">
                                                <ul>
                                                    <li><a href="../aviso-legal">Aviso-Legal</a></li>
                                                    <li><a href="../privacidad">Privacidad</a></li>
                                                    <li><a href="../envios">Envios y Devoluciones</a></li>
                                                    <br>
                                                </ul>
                                            </div>
                                        </div>
                                        <a href="" class="menuboton_footer">Contacta!</a>
										<img src="../images/unhidrogen logo Blanc.png" class="footer_logo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer_end" style="margin-top: 10px;">
                        <p>©️ 2021 Unhidrogen</p>
                    </div>
                </footer>
	 <script src="../js/HOME.js"></script>
</body>

</html>