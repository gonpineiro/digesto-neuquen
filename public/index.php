<?php
include 'app/config/config.php';

use App\utils\RenderHtml;

$html = new RenderHtml();
?>

<?php include './public/views/common/header.php' ?>

<img src="./public/assets/banner.jpeg" alt="banner" width="50%">
<div class="container">
    <h1>Digesto</h1>
    <div class="card-container mx-auto justify-content-center">
        <?= $html->simpleCard('Estatuto', 'Descripción') ?>
        <?= $html->simpleCard('Decretos', 'Descripción') ?>
        <?= $html->simpleCard('Ediciones Especiales', 'Descripción') ?>
        <?= $html->simpleCard('Odenanzas', 'Descripción') ?>
        <?= $html->simpleCard('Carta Organica', 'Descripción') ?>
        <?= $html->simpleCard('Disposiciones', 'Descripción') ?>
        <?= $html->simpleCard('Edictos', 'Descripción') ?>
        <?= $html->simpleCard('Resoluciones', 'Descripción') ?>
        <?= $html->simpleCard('Boletin Oficial', 'Descripción') ?>
        <?= $html->simpleCard('Resoluciones Consejo Deliberante', 'Descripción') ?>
        <?= $html->simpleCard('Reglamento Sindicatura Municipal', 'Descripción') ?>
        <?= $html->simpleCard('Resolucion IMUH', 'Descripción') ?>
    </div>
</div>

<?php include './public/views/common/footer.php' ?>