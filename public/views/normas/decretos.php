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

<div class="container">
    <div class="card" style="width: 100%; padding: 20px; background-color:#315891">
        <h1 class="subtitle text-light" style="padding-top: 20px; padding-bottom: 30px">Búsqueda de Decretos</h1>
    </div>
</div>

<div class="container" style="width: 75%; margin-top: -80px">
    <div class="card" style="width: 100%; padding: 20px">
        <form method="post">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" id="codigo" placeholder="Número de Decreto" name="codigo" required>
                </div>
                <div class="col">
                    <select class="form-select" name="anio" required>
                        <option value="">Seleccione el Año</option>
                        <?php foreach ($years as $year) { ?>
                            <option value="<?= $year ?>"><?= $year ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col">
                    <div class="col-8" style="width: 100%">
                        <button class="btn btn-primary" type="submit" name="post" style="width: 100%"><i class="fas fa-search"></i> Buscar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php include '../common/error.php' ?>
</div>

<?php if ($ready) { ?>
    <div class="container " style="width: 75%">
        <h1 class="subtitle">Resultado de la búsqueda</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Número de Decreto</th>
                    <th scope="col">Año</th>
                    <th scope="col">Archivo</th>
                    <th scope="col">Descargar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!isset($_SESSION['error']) && $ready) {
                    foreach ($files as $file) { ?>
                        <tr>
                            <td><?= explode('.', $file['name'])[0] ?></td>
                            <td><?= $_POST['anio'] ?></td>
                            <td><?= $file['name'] ?></td>
                            <td><?= $html->downloadForm($file['name'], $file['path']) ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
<?php } ?>


<a href=<?= INDEX_URL ?> class="btn btn-primary back">←</a>

<?php include '../common/footer.php' ?>