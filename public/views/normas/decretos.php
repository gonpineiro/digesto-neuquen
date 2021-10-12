<?php
include '../../../app/config/config.php';

use App\Models\Decreto;

if (!PROD) error_reporting(0);

if (isset($_POST) && isset($_POST["post"])) {
    session_unset();
    $decreto = new Decreto($_POST['anio'], $_POST['codigo']);
    $file = $decreto->getFile();

    if (!is_array($file)) {
        $_SESSION['error'] = $file;
        $ready = false;
    }else{
        $ready = true;
    }
}

?>
<?php include '../common/header.php' ?>

<div class="container" style="width: 50%">
    <h1>Busqueda de Decretos</h1>
    <form method="post">
        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" placeholder="0001" pattern="\d{4}" name="codigo" required>
        </div>
        <div class="mb-3">
            <label for="anio" class="form-label">Año</label>
            <input type="number" class="form-control" id="anio" placeholder="1930" name="anio" required />
        </div>
        <?php include '../common/submitBackBtns.php' ?>
    </form>

    <?php include '../common/error.php' ?>

    <?php include '../common/downloadInput.php' ?>

</div>
<?php include '../common/footer.php' ?>