<?php

$uc2 = isset($_GET['uc2']) ? htmlspecialchars($_GET['uc2']) : exit(header('Location: /home'));

switch($uc2) {
    case "page1":
        // File link after "components/views/"
        $include = "example/page1";
    break;
}