<!DOCTYPE html>
<html lang="es-es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cambiar contraseña</title>
  <link rel="stylesheet" href="login/login.css">
</head>

<body>

	<form action="registro" method="POST">
    <div id='container'>
      <div class='signup'>
        <form>
          <h1>Cambiar contraseña</h1>
          <input type='email' name="email" placeholder='Email' value="admin@unhidrogen.es" />
          <input type='password' name="clave" placeholder='Password' />
          <button type='submit' name="submit">Cambiar contraseña</button>
        </form>
      </div>
		</div>
	</form>
	<div class="content">
	<?php


include('config.php');

   ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    

/*
obligo a este fichero
a usar mis datos de
acceso a la base de datos
*/
 if (isset($_POST['submit'])) {
include "micript.php";
//antes de nada obtengo la contraseña y la cifro para insertarla
$clave = $_POST["clave"];

//y ahora cifro la clave usando un hash
$hash =$encriptar($clave);  
$hash_des=$desencriptar($hash);

/*
el "cost" lo que indica es la fuerza con la que se cifra la clave
a mayor fuerza mas tiempo de carga requiere la página por eso es
importante que busques un equilibrio

*/
$email=$_POST['email'];
	$ordre_sql = "DELETE FROM admin WHERE email='$email'";
	$res = $connection->query($ordre_sql) or die('Error !' . $connection->errno . $connection->error);
	echo "ya no esta la antigua contraseña";
/*
compruebo que la conexion es correcta
y de ser asi hago el insert
*/
if ($connection == true) {
	
 //preparo el insert...
	$insert = $connection->prepare("INSERT INTO admin (email,password) VALUES (:email,:clave)");

 //asocio los campos del insert a los campos del formulario
 $insert->bindParam(':email', $_POST['email']);
 $insert->bindParam(':clave', $hash);

 $insert->execute();
 echo "<br>";
 echo "email:".$_POST['email'];
 echo "<br>";
 echo "pass ecript: $hash";
 echo "<br>";
 echo "pass no ecript: $hash_des";
 //cierro la conexion

 //redirijo a otro archivo php
 
} 
 }
	?>
	</div>
	</body>


