<?php

$uc2 = isset($_GET['uc2']) ? htmlspecialchars($_GET['uc2']) : exit(header('Location: /home'));
switch($uc2) {
    case "create":
        $include = "decoration/form";
        $title = "Créér un nouveau Bateau";
    break;
    case "update":
        $uc3 = isset($_GET['uc3']) ? htmlspecialchars($_GET['uc3']) : exit(header('Location: /home'));
        $include = "decoration/form";
        $title = "";
    break;
    case "validate":
        $uc3 = isset($_GET['uc3']) ? htmlspecialchars($_GET['uc3']) : exit(header('Location: /home'));
    break;
    case "delete":
        $uc3 = isset($_GET['uc3']) ? htmlspecialchars($_GET['uc3']) : exit(header('Location: /home'));
    break;
    default:
        $uc3 = isset($_GET['uc3']) ? htmlspecialchars($_GET['uc3']) : exit(header('Location: /home'));
        $include = "decoration/page";
        $title = "";
    break;
}