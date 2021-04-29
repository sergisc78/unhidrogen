<?php
$tituloHeader = $_POST['tituloHeader'];
        /*$h1 = $_POST['h1'];
        $textoHeader = $_POST['textoHeader'];*/

        foreach ($tituloHeader as $titulo) {
            echo "titulo: " . $titulo;
        }
    ?>