<?php
include '../../../app/config/config.php';

use App\Models\Decreto;

if (isset($_POST) && isset($_POST["post_decreto"])) {
    session_unset();

    //$decreto = new Decreto(1988, 'D0141');
    $decreto = new Decreto($_POST['anio'], $_POST['codigo']);
    $file = $decreto->getFile();
    if (is_array($file)) {
        # code...
    } else {
        $_SESSION['error'] = $file;
    }
}

?>
<?php include '../common/header.php' ?>
<div class="container" style="width: 50%">
    <h1>Busqueda de Decretos</h1>
    <form method="post">
        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" placeholder="D0001" name="codigo" required>
        </div>
        <div class="mb-3">
            <label for="anio" class="form-label">Año</label>
            <input type="number" class="form-control" id="anio" placeholder="1930" name="anio" required />
        </div>
        <div class="mb-3" style="width: 100%">
            <button class="btn btn-primary" type="submit" name="post_decreto" style="width: 100%">Buscar</button>
        </div>
    </form>


    <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['error'] ?>
        </div>
    <?php } ?>

</div>
<?php include '../common/footer.php' ?>