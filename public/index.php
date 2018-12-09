<?php
define ("BARRA", DIRECTORY_SEPARATOR);
define ("ROOT", getcwd().BARRA."..".BARRA);
define ("CONFIG", ROOT.BARRA."config".BARRA);
define ('VENDOR', ROOT."vendor".BARRA);
define ("APP_ROOT", ROOT."application".BARRA);
define ("APP_VIEW", APP_ROOT."View".BARRA);
define ("CORE", VENDOR."core".BARRA);
define ("PDO", VENDOR."database".BARRA);
define ("VIEW_LAYOUT", APP_VIEW."Layout".BARRA."layout.phtml");

require_once (CONFIG . 'db.php');
require_once (CORE . 'AbstractCoreController.php');
require_once (CORE . 'Router.php');
require_once (CORE . 'Request.php');
require_once (CORE . 'Dispatcher.php');
require_once (PDO . 'PDORepository.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();

