<?php
include '../../../app/config/config.php';

use App\Models\Resolucion;

if (!PROD) error_reporting(0);

if (isset($_POST) && isset($_POST["post"])) {
    session_unset();

    $resolucion = new Resolucion($_POST['anio'], $_POST['codigo']);
    
    $file = $resolucion->getFile();
    
    if (!is_array($file)) {
        $_SESSION['error'] = $file;
        $ready = false;
    }else{
        $ready = true;
    }
}else{
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
            <input type="number" class="form-control" id="anio" placeholder="1930" name="anio" required />
        </div>
        <?php include '../common/submitBackBtns.php' ?>
    </form>

    <?php include '../common/error.php' ?>

    <?php include '../common/downloadInput.php' ?>

</div>
<?php include '../common/footer.php' ?>