<?php if (isset($file['name'])) { ?>
    <form action="../download.php" method="POST">
        <div class="mb-3" style="width: 100%">
            <button class="btn btn-primary" style="width: 100%">
                Descargar <?= $file['name'] ?></button>
            <input type="text" value="<?= $file['base64'] ?>" hidden name="base64">
            <input type="text" value="<?= $file['name'] ?>" hidden name="name">
        </div>
    </form>
<?php  } ?>