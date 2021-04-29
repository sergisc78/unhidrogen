<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
</head>

<body>




    <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "config.php";

    $email = $_POST['email'];
    $pass = $_POST['password'];
    // $pass_hash=password_hash($pass,PASSWORD_DEFAULT);



    if (isset($_POST['submit'])) {
    include "micript.php";
		   $email = $_POST['email'];
    $pass = $_POST['password'];
		$hash =$encriptar($pass);  

        $sql_consult = "SELECT * FROM admin WHERE password='$hash'";

            // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

            $resultat = $connection->prepare($sql_consult);

            $resultat->execute();

            $post = $resultat->rowCount();
		foreach ($resultat as $resultats){
		$pass_obt=$resultats['password'];
			
		}
		$pass_obt_descript=$desencriptar($pass_obt);
		
        /*
		
  si el while ha tenido exito evitdendemente hara lo que le pidas
  en este caso yo voy a comprobar la variable contador, si es verdad
  que ha encontrado un usuario con la clave correcta y lo ha incrementado
  entonces existe en caso contrario no existe
  $hash =$encriptar($pass);  

        $sql_consult = "SELECT * FROM admin WHERE password=$hash";

            // PREPARA LA CONSULTA SQL, LA EJECUTA Y CUENTA LOS RESULTADOS

            $resultat = $connection->prepare($sql_consult);

            $resultat->execute();

            $post = $resultat->rowCount();
		foreach ($resultat as $resultats){
		echo $resultats['password'];
		}
 */
        if ($email=='admin@unhidrogen.es' && $pass==$pass_obt_descript) {
            session_start(); // SE INICIA LA SESIÓN EN LA QUE EMAIL ES IGUAL A $POST['EMAIL']

            $_SESSION["email"] = $email;

            echo "<div class='alert alert-success' role='alert'>
          <button type='button' class='close' data-dismiss='alert'>&times;</button>
          <h3 id='message'>Bienvenido $email!</h3>
          
          </div>
          ";

            header("refresh:5;url=https://unhidrogen.com/b/admin");
        } else { // EL USUARIO NO EXISTE O LOS DATOS SON INCORRECTOS 

            echo "<div class='alert alert-danger' role='alert'>
         <button type='button' class='close' data-dismiss='alert'>&times;</button>
         <h3 id='message'>Email o password incorrecto !</h3>
         </div>
         ";

            header("refresh:35;url=login");
        }
    } else {
        echo "el usuario no existe";
    }









    ?>

    <!--BOOTSTRAP JS Y JQUERY-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>