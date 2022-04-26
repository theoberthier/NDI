<?php

$uc2 = isset($_GET['uc2']) ? htmlspecialchars($_GET['uc2']) : exit(header('Location: /home'));
switch($uc2) {
    case "person":
        $persons = Person::getBySearch("");
        $include = "admin/person";
        $title = "Personnes";
    break;
    case "saving":
        $include = "admin/saving";
        $title = "Sauvetages";
    break;
    case "boat":
        $include = "admin/boat";
        $title = "Bateaux";
    break;
    case "decoration":
        $include = "admin/decoration";
        $title = "Décorations";
    break;
}