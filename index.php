<?php
include './app/config/config.php';

use App\Models\Decreto;

$decreto = new Decreto(1988, 'D0141');
$file = $decreto->getFile();
die();
//include './public/index.php';
