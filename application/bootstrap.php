<?php
/**
 * My new Zend Framework project
 *
 * @author
 * @version
 */
$root = dirname(dirname(__FILE__));
set_include_path($root . PATH_SEPARATOR . $root . '/library' . PATH_SEPARATOR . $root . '/application/models/' . PATH_SEPARATOR . get_include_path());

require_once 'Initializer.php';
require_once "Zend/Loader.php";

// Set up autoload.
Zend_Loader::registerAutoload();

// Prepare the front controller.
$frontController = Zend_Controller_Front::getInstance();

// Change to 'production' parameter under production environemtn
$frontController->registerPlugin(new Initializer('development'));

// Dispatch the request using the front controller.
$frontController->dispatch();
?>

