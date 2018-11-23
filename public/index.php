<?php
define("BARRA", DIRECTORY_SEPARATOR);
define("ROOT", getcwd().BARRA."..".BARRA);
define('VENDOR', ROOT."vendor".BARRA);
define("APP_ROOT", ROOT."application".BARRA);
define("APP_VIEW", APP_ROOT."View".BARRA);
define("CORE", VENDOR."core".BARRA);
define("DB", VENDOR."database".BARRA);
define("VIEW_LAYOUT", APP_VIEW."Layout".BARRA."layout.phtml");

require(CORE . 'AbstractCoreController.php');
require(CORE . 'Router.php');
require(CORE . 'Request.php');
require(CORE . 'Dispatcher.php');
require(DB . 'MySql.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();

