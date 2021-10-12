<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();

header('Content-Type: text/html; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate ");

/* Root Path */
include_once 'paths.php';

/* AutoLoad composer & local */
include_once ROOT_PATH . 'app/utils/funciones.php';
require ROOT_PATH . 'vendor/autoload.php';

/* Carga del DOTENV */
$dotenv = \Dotenv\Dotenv::createImmutable(ROOT_PATH);
$dotenv->load();

/* Modo produccion: true */
define('PROD', $_ENV['PROD'] == 'true' ? true : false);

/* AppID */
define('APPID', PROD ? 64 : 64);

/* Configuracion de URLs */
define('WEBLOGIN', PROD ? 'https://weblogin.muninqn.gov.ar' : 'http://200.85.183.194:90');

define('BASE_FILE_PATH', $_ENV['BASE_FILE_PATH']);
