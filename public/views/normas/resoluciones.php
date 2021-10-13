<?php
include '../../../app/config/config.php';

use App\Models\Resolucion;
use App\utils\RenderHtml;

$resolucion = new Resolucion();
$years = $resolucion->getListYear();
$ready = false;

if (isset($_POST) && isset($_POST["post"])) {
    session_unset();

    $resolucion->setAnio($_POST['anio']);
    $resolucion->setCodigo($_POST['codigo']);

    $html = new RenderHtml();

    $files = $resolucion->getFile();

    if (!is_array($files)) {
        $_SESSION['error'] = $files;
        $ready = false;
    } else {
        $ready = true;
    }
} else {
    session_unset();
}

?>
<?php include '../common/header.php' ?>

<div class="container" style="width: 50%">
    <h1>Busqueda de Resoluciones</h1>
    <form method="post">
        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" placeholder="D0001" name="codigo" required>
        </div>
        <div class="mb-3">
            <label for="anio" class="form-label">Año</label>
            <select class="form-select" name="anio" required>
                <option selected>Seleccione el año</option>
                <?php foreach ($years as $year) { ?>
                    <option value="<?= $year ?>"><?= $year ?></option>
                <?php } ?>
            </select>
        </div>
        <?php include '../common/submitBackBtns.php' ?>
    </form>

    <?php include '../common/error.php' ?>

    <?php
    if (!isset($_SESSION['error']) && $ready) {
        foreach ($files as $file) {
            echo $html->downloadForm($file['name'], $file['path']);
        }
    }
    ?>

</div>
<?php include '../common/footer.php' ?>