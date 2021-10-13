<?php
include '../../../app/config/config.php';

use App\Models\Ordenanza;
use App\utils\RenderHtml;

if (!PROD) error_reporting(0);

if (isset($_POST) && isset($_POST["post"])) {
    session_unset();

    $ordenanza = new Ordenanza($_POST['codigo']);
    $html = new RenderHtml();

    $files = $ordenanza->getFile();

    if (!is_array($files)) {
        $_SESSION['error'] = $files;
        $ready = false;
    } else {
        $ready = true;
    }
}

?>
<?php include '../common/header.php' ?>

<div class="container" style="width: 50%">
    <h1>Busqueda de Ordenanzas</h1>
    <form method="post">
        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" placeholder="0001" name="codigo" required>
        </div>
        <?php include '../common/submitBackBtns.php' ?>
    </form>

    <?php include '../common/error.php' ?>

    <?php
    if (!isset($_SESSION['error']) && $ready) {
        foreach ($files as $file) {
            echo $html->downloadForm($file['name'], $file['base64']);
        }
    } ?>

</div>
<?php include '../common/footer.php' ?>