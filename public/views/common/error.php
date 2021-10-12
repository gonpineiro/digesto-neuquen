<?php if (isset($_SESSION['error'])) { ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['error'] ?>
    </div>
<?php } ?>