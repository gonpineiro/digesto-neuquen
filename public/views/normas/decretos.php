<?php
include '../../../app/config/config.php';

use App\Models\Decreto;
use App\utils\RenderHtml;

$decreto = new Decreto();
$years = $decreto->getListYear();
$ready = false;

if (isset($_POST) && isset($_POST["post"])) {
    session_unset();

    $decreto->setAnio($_POST['anio']);
    $decreto->setCodigo($_POST['codigo']);

    $html = new RenderHtml();

    $files = $decreto->getFile();

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

<div class="container" style="width: 100%">
    <div class="row">
        <div class="col">
            <h1 class="subtitle">Busqueda de Decretos</h1>
            <form method="post">
                <div class="mb-3">
                    <label for="codigo" class="form-label">Código</label>
                    <input type="text" class="form-control" id="codigo" placeholder="0001" name="codigo" required>
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


        </div>
        <div class="col">
            <h1 class="subtitle">Listado</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descargar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!isset($_SESSION['error']) && $ready) {
                        foreach ($files as $file) { ?>
                            <tr>
                                <td><?= $file['name'] ?></td>
                                <td><?= $html->downloadForm($file['name'], $file['path']) ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <?php
            if (!isset($_SESSION['error']) && $ready) {
                foreach ($files as $file) {
                    echo $html->downloadForm($file['name'], $file['path']);
                }
            }
            ?>

        </div>

    </div>


</div>
<?php include '../common/footer.php' ?>