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
    <img class="banner" src="./public/assets/banner.svg" alt="banner">
    <div class="container">
        <h1  class="subtitle">Digesto</h1>
        <div class="card-container mx-auto justify-content-center">
            <?= $html->simpleCard('Decretos', 'Ingresa →') ?>
            <?= $html->simpleCard('Resoluciones', 'Ingresa →') ?>
            <?= $html->simpleCard('Odenanzas', 'Ingresa →', 'http://www.cdnqn.gov.ar/inf_legislativa/digesto/cgi-bin/shared/form_ord_search.php') ?>
            <?= $html->simpleCard('Boletin Oficial', 'Ingresa →', 'https://www.neuquencapital.gov.ar/boletin-oficial/') ?>
            <!-- <?= $html->simpleCard('Estatuto', 'Ingresa →') ?>
        <?= $html->simpleCard('Ediciones Especiales', 'Ingresa →') ?>
        <?= $html->simpleCard('Carta Organica', 'Ingresa →') ?>
        <?= $html->simpleCard('Disposiciones', 'Ingresa →') ?>
        <?= $html->simpleCard('Edictos', 'Ingresa →') ?>
        <?= $html->simpleCard('Resoluciones Consejo Deliberante', 'Ingresa →') ?>
        <?= $html->simpleCard('Reglamento Sindicatura Municipal', 'Ingresa →') ?>
        <?= $html->simpleCard('Resolucion IMUH', 'Ingresa →') ?> -->
        </div>
    </div>

</body>

</html>