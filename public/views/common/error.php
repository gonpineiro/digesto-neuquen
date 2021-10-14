<?php if (isset($_SESSION['error'])) { ?>
    <div class="alert alert-danger mt-4" role="alert">
        <?= $_SESSION['error'] ?>
    </div>
<?php } ?>