<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
   
    <link rel="stylesheet" href="css/formCrud.css">

</head>

<body>
       <?php
	$id_post=$_GET['id_post'];
	 include('config.php');

            $sql_consult = "SELECT * FROM categorias";

            // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

            $resultat2 = $connection->prepare($sql_consult);

            $resultat2->execute();

            $post = $resultat2->rowCount();
	
	?>
    <form action="" method="post">
		 <table id="example" class="table table-striped display nowrap" spacecelling="0" width="100%">


                                <thead>


                                    <h1 class="text-center">Categoria</h1><br>
                                    <tr>
                                        <th>id_categoria</th>
                                        <th>Descripcion categoria</th>
                                        <th>Url</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($resultat2 as $resultats2) {
									
                                    ?>
                                        <tr>
                                            <td> <?php echo $resultats2['id_categoria'] ?></td>
                                            <td> <?php echo $resultats2['descr_categoria'] ?></td>
                                            <td> <?php echo $resultats2['url_categoria'] ?></td>
											<td> <?php echo $resultats2['titulo_post_categoria'] ?></td>
											<td> <?php echo $resultats2['meta_categoria'] ?></td>
									</tr>
			 				</tbody>
		</table>
	   <button class="btn btn-primary" type="submit" name="guardar">Enviar</button>



    </form>

    <?php

    include('config.php');
    if (isset($_POST["guardar"])) {
	}