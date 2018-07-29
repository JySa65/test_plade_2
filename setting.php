<?php 

define('BASE_DIR', __DIR__);
session_save_path(BASE_DIR . "/temp");

// config time and places
setlocale(LC_TIME, 'es_VE', 'es_VE.utf-8', 'es_VE.utf8');
date_default_timezone_set('America/Caracas');
// end time


define('NAME_PROJECT', '/' . explode("/", $_SERVER['PHP_SELF'])[1] . '/');
define('APP_DIR', BASE_DIR . "/app/");
define('TEMPLATES_DIR', BASE_DIR . "/public/");
define('STATIC_DIR', NAME_PROJECT . "static/");
define('DB_HOST', "127.0.0.1");
define('DB_USER', 'root');
define('DB_PASSWORD', "root");
define('DB_NAME', "test_plade");
define('DB_CONNECTOR', "mysql");
define('SECRET_KEY', "myllavesecreta");

?>