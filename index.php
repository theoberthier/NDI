<?php
session_start();

/**
 * Copyright © Théo Morin - 2021, all right reserved.
 * Template author      : Théo Morin
 * Contact              : contact@theomorin.fr
 * GitHub               : https://github.com/Theo-Morin
 * Personal website     : https://theomorin.fr
 * PHP version          : 7.3
 * 
 * Usage condition :
 *      - Don't extract project methods, algorithms, structures of code, etc.. for another project.
 *      - Non commercial utilisation ONLY
 *      - Leave the above comment without modification
 */


date_default_timezone_set('Europe/Paris');

// Define usuables variables
require getcwd() . "/config/define.php";

// Require function library
require getcwd() . '/config/func.php';

// Require 

// Include your classes
require getcwd() . "/config/classes_require.php";

// Init JS & CSS array
$scripts = [];
$scripts[] = "https://code.jquery.com/jquery-3.6.0";
$scripts[] = VENDORS_PATH . "popper.min";
$scripts[] = JS_PATH . "site";
$stylesheets = [];
$stylesheets[] = CSS_PATH . "root";
$stylesheets[] = VENDORS_PATH . "bootstrap-4.1.3-dist/css/bootstrap.min";
$stylesheets[] = CSS_PATH . "style";

// Default values 404 page
$include = "errors/404";
$title = "ERROR 404 PAGE NOT FOUND";

// Init controllers
require getcwd() . '/components/controllers/home_controller.php';

$title .= " - " . APP_NAME;

include(getcwd() . VIEW_PATH . "partials/header.php");
include(getcwd() . VIEW_PATH . "partials/nav.php");
include(getcwd() . VIEW_PATH . $include . ".php");
include(getcwd() . VIEW_PATH . "partials/footer.php");