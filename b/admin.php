<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- BOOTSTRAP CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- DATATABLES CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">

    <!-- DATATABLES RESPONSIVEe -->


    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap.min.css">

    <!-- CSS FILE -->

    <link rel="stylesheet" href="css/admin.css">


    <style>
        table thead {
            background-color: aqua;
        }
		.no_published{
font-weight: bold;
color:red;
}
.published{
	font-weight: bold;
color:green;
}
    </style>

</head>

<body>

    <?php

    session_start();


    if (!isset($_SESSION['email'])) {
        echo "Inicia sesion como admin para poder ver este contenido....";

    ?>
        <META HTTP-EQUIV="REFRESH" CONTENT="6;URL=https://unhidrogen.com/b/login/login">
        <?php
    }
    if (isset($_SESSION['email'])) {



        try {

            // CONFIG FILE

            include('config.php');


            // CONSULTA SQL

            $sql_consult = "SELECT * FROM post";

            // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

            $resultat = $connection->prepare($sql_consult);

            $resultat->execute();

            $post = $resultat->rowCount();


            // SI ENCUENTRA UN POST, LO MUESTRA
            if ($post = !0) {
                $i = 0;

        ?>



                <div class="dropdown">
                    <button type="button" class="btn btn-info dropdown-toggle" id="sessio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo " " . $_SESSION["email"]; ?><span class="caret"></span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="index">Exit</a>
                    </div><br>

                    <div class="container">
						 <h1 class="text-center">Administración del blog </h1><br>

						<div class="d-flex" style="margin-left:120px">
                        <div id="minicontainer" class="d-flex justify-content-left">
                            <a href="admin2"><button class=" btn btn-outline-secondary btn-lg consult-headers">Consultar todos los headers de todos los post</button></a>&nbsp;&nbsp;
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="admin3"><button class=" btn btn-outline-secondary btn-lg consult-categorias">Consultar todas las categorías</button></a>&nbsp;&nbsp;
                        </div><br>
						
						 <div class="d-flex justify-content-right">
                            <a href="admin4"><button class=" btn btn-outline-secondary btn-lg consult-categorias">Consultar todas las categorías de los post</button></a>
                        </div>
						</div>
						<br>
						<br>
                        <div class="row">

                            <div class="col-lg-12">
                                <a href="add"><button class="btn btn-primary" id='add' data-toggle="modal">Crear post&nbsp;&nbsp;<i class="bi bi-plus-circle-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                            </svg></i></button></a><br><br><br>

                                <table id="example" class="table table-striped display nowrap" spacecelling="0" width="100%">


                                    <thead>



                                        <tr>
                                            <th>ID</th>
											<th>nr</th>
											<th>nrC</th>
											 <th>Acciones</th>
											
                                            <th>Título del post</th>
                                            <th>Fecha</th>
                                            <th>Pb</th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($resultat as $resultats) {
										$_SESSION['id_post']=$resultats['id_post']; 

                                        ?>
                                            <tr>
                                                <td> <?php echo $resultats['id_post'] ?></td>
												<td> <?php echo $resultats['orden_p'] ?></td>
												<td> <?php echo $resultats['orden_p_c'] ?></td>
												 <td><a href="edit?id_post=<?php echo urlencode($resultats['id_post']); ?>"> <button title="Leer y editar post" class=" btn btn-success editar "><i class="bi bi-book"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                                                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                                                                </svg>&nbsp;&nbsp;<i class="bi bi-pencil"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                                    </svg></i></i></button></a>&nbsp;&nbsp;<button class="btn btn-danger delete" data-id="<?php echo  $resultats['id_post'] ?>" title="Borrar post"><i class="bi bi-trash"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                            </svg></i></button>
                                                    <a href="getHeaders?id_post=<?php echo urlencode($resultats['id_post']); ?>"><button type="button" class="btn btn-info">Headers de este post</button></a>
                                                    <a href="getCategoria?id_post=<?php echo urlencode($resultats['id_post']); ?>"><button type="button" class="btn btn-info">Categorias de este post</button></a>

                                                </td>
												
												
                                                <td> <?php echo $resultats['titulo_post'] ?></td>
                                                <td> <?php echo $resultats['fecha_post'] ?></td>


                                              <?php
												if ($resultats['url_post']==""){
													?>
												<td class="no_published">NO</td>
													<?php
												}else{
													?>
													<td class="published">SI</td>
												<?php
												}
											
												?>


                                            </tr>


                                    <?php

                                            // DESTRUIR TODAS LAS VARIABLES DE SESIÓN
                                            //$_SESSION = array();
                                        }
                                    }

                                    ?>

                                    </tbody>
                                    <!-- <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Fecha</th>
                                    <th>Categoria1</th>
                                    <th>Categoria2</th>
                                    <th>Acciones</th>

                                </tr>
                            </tfoot>-->
                                </table>

                            </div>
                        </div>
                    </div>

                    <?php



                    ?>




            <?php





        } catch (Exception $e) {

            die("Error" . $e->getMessage());
            echo " Hi ha un error  a la línia" . $e->getLine();
        }
    }
            ?>

            <!-- JQUERY -->

            <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


            <!-- BOOTSTRAP JS-->

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
            </script>


            <!-- DATATABLES JS -->
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js">
            </script>


            <!-- DATATABLES JS RESPONSIVE  -->

            <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>


            <!-- SCRIPTS JQUERY-->

            <script>
                $(document).ready(function() {

                    // CARGAR DATATABLES

                    $('#example').DataTable({
                        responsive: true,
                    });


                    /*AL HACER CLICK EN BORRAR, SE PREGUNTA SI DESEA HACERLO. 
                    SI ES SÍ, SE ELIMINA EL POST MEDIANTE AJAX.

                    */

                    $(document).on('click', '.delete', function(e) {

                        e.preventDefault();

                        if (confirm("¿Estás seguro que deseas eliminar completamente este post?")) {

                            //SLECCIONAR ID DEL BOTÓN

                            var id = $(this).attr('data-id');

                            //CONSULTA AJAX

                            $.ajax({
                                type: "GET",
                                url: "delete.php?id="+id,
                                
                                success: function(data) {
                                    alert(data);
                                    window.location.reload();
                                }

                            });

                        }
                    });



                    $('.dropdown-toggle').dropdown();

                });
            </script>


            <!-- 

    create TABLE users(
    id int (100) AUTO_INCREMENT PRIMARY KEY,
    nom varchar (50) NOT null,
    cognoms varchar (50) NOT null,
    dni varchar (9) NOT null,
    localitat varchar (30) NOT null,
    sou int (20) not null );
-->


            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>


</body>

</html>