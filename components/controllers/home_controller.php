<?php

$uc1 = isset($_GET['uc1']) ? htmlspecialchars($_GET['uc1']) : "null";
if($_GET['uc1'] == "") $uc1 = "home";
switch($uc1) {
    case "home":
        $include = "home";
        $title = "Home page";
    break;
    case "person":
        require 'person_controller.php';
    break;
    case "boat":
        require 'boat_controller.php';
    break;
    case "saving":
        require 'saving_controller.php';
    break;
    case "decoration":
        require 'decoration_controller.php';
    break;
    case "admin":
        $user = new User();
        //if(!$user->isAdmin()) exit(header('Location: /home'));
        require 'admin_controller.php';
    break;
    case "contributor":
        require 'user_controller.php';
    break;
    case "search":
        $include = "search";
        $title = "search bar";
    break;
    default:
        $include = "errors/404";
        $title = "PAGE NOT FOUND";
    break;
}