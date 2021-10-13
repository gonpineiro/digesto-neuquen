<?php
include 'app/config/config.php';

use App\utils\RenderHtml;

$html = new RenderHtml();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/estilos/estilo.css">
    <title>Digesto - <?= date("Y"); ?></title>
</head>

<body>
    <img class="banner" src="./public/assets/banner.jpeg" alt="banner">
    <div class="container">
        <h1>Digesto</h1>
        <div class="card-container mx-auto justify-content-center">
            <?= $html->simpleCard('Decretos', 'Descripción') ?>
            <?= $html->simpleCard('Resoluciones', 'Descripción') ?>
            <?= $html->simpleCard('Odenanzas', 'Descripción', 'http://www.cdnqn.gov.ar/inf_legislativa/digesto/cgi-bin/shared/form_ord_search.php') ?>
            <?= $html->simpleCard('Boletin Oficial', 'Descripción', 'https://www.neuquencapital.gov.ar/boletin-oficial/') ?>
            <!-- <?= $html->simpleCard('Estatuto', 'Descripción') ?>
        <?= $html->simpleCard('Ediciones Especiales', 'Descripción') ?>
        <?= $html->simpleCard('Carta Organica', 'Descripción') ?>
        <?= $html->simpleCard('Disposiciones', 'Descripción') ?>
        <?= $html->simpleCard('Edictos', 'Descripción') ?>
        <?= $html->simpleCard('Resoluciones Consejo Deliberante', 'Descripción') ?>
        <?= $html->simpleCard('Reglamento Sindicatura Municipal', 'Descripción') ?>
        <?= $html->simpleCard('Resolucion IMUH', 'Descripción') ?> -->
        </div>
    </div>

</body>

</html>