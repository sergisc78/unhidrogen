<?php


$db_user = "usuari000";
$db_password = "Usuari000@";
$db_char = "SET CHARACTER SET UTF8";

try {
    $connection = new PDO("mysql:host=localhost;dbname=blog", $db_user, $db_password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->exec($db_char);
} catch (Exception $e) {
    die("Error" . $e->getMessage());
    echo ("Hi ha un error a la línia" . $e->getLine());
}
