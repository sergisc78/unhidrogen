<?php
$get_id = $_GET['id_post'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- BOOTSTRAP CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- DATATABLES CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">

    <!-- DATATABLES RESPONSIVE -->


    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap.min.css">

    <!-- CSS FILE -->

    <link rel="stylesheet" href="css/admin.css">


    <style>
        table thead {
            background-color: aqua;
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

            $sql_consult = "SELECT c.id_categoria,descr_categoria,url_categoria FROM post p INNER JOIN post_categorias pc INNER JOIN categorias c WHERE p.id_post=$get_id and pc.id_post=$get_id and pc.id_categoria=c.id_categoria ";

            // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

            $resultat2 = $connection->prepare($sql_consult);

            $resultat2->execute();

            $post = $resultat2->rowCount();


            // SI ENCUENTRA UN POST, LO MUESTRA
            if ($post = !0) {
                $i = 0;

        ?>
                <div class="container">

                    <div class="row">

                        <div class="col-lg-12">


                            <table id="example" class="table table-striped display nowrap" spacecelling="0" width="100%">


                                <thead>


                                    <h1 class="text-center">Categorías del post <?php echo $get_id; ?> </h1><br>
									
									<div class="d-flex justify-content-center">
                            <a href="admin"><button class=" btn btn-outline-secondary btn-lg consult-categorias">Volver a admin</button></a>
                        </div>

                                    <a href="addCategoria.php?id_post=<?php echo urlencode($get_id)?>">
                                        <buttton class="btn btn-info">Añadir categoría</buttton>
                                    </a><br><br>
									
									
									
																												
                                    <tr>
                                        <th>Id_categoria</th>
                                        <th>Descripción categoría</th>
                                        <th>URL categoria</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($resultat2 as $resultats2) {
                                        $i++;


                                    ?>
                                        <tr>
                                            <td> <?php echo $resultats2['id_categoria'] ?></td>
                                            <td> <?php echo $resultats2['descr_categoria'] ?></td>
                                            <td> <?php echo $resultats2['url_categoria'] ?></td>

                                            <td><a href="edit_Post_categoria.php?id_categoria=<?php echo $resultats2['id_categoria'] ?>&id_post=<?php echo $_GET['id_post'] ?>"> <button title="Leer y editar categoría" class=" btn btn-success editar "><i class="bi bi-pencil"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                            </svg></i></button></a>&nbsp;&nbsp;<button class="btn btn-danger deletePostCategoria" data-categoria="<?php echo  $resultats2['id_categoria'] ?>" data-post="<?php echo $get_id ?>" title="desasignar postcategoría"><i class="bi bi-trash"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg></i></button>

                                            </td>


                                        </tr>


                                <?php
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


                $(document).on('click', '.deletePostCategoria', function(e) {
                    e.preventDefault();

                    if (confirm("¿Estás seguro que deseas eliminar este post?")) {

                        //SLECCIONAR ID DEL BOTÓN

                       var id_post = $(this).attr('data-post');
						var id_cat = $(this).attr('data-categoria');
                        //CONSULTA AJAX

                        $.ajax({
                            type: "GET",
                            url: "desasignarPostCategoria.php?id_post="+id_post+"&id_cat="+id_cat,
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