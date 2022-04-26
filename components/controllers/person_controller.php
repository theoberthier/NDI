<?php

$uc2 = isset($_GET['uc2']) ? htmlspecialchars($_GET['uc2']) : exit(header('Location: /home'));
switch($uc2) {
    case "create":
        $create = 1;
        $include = "person/form";
        $title = "Créér une nouvelle personne";
        $user = new User();
        if($user->isLogged()){
            if(isset($_POST['fullname'])){
                if(!empty($_POST['fullname'])) {
                    $fullname = htmlspecialchars($_POST['fullname']);
                    $grade = htmlspecialchars($_POST['grade']);
                    $content = htmlspecialchars($_POST['content']);
                    $pics = $_FILES['pics'];
                    $birth = htmlspecialchars($_POST['birth']);
                    $death = htmlspecialchars($_POST['death']);
                    $gender = htmlspecialchars($_POST['gender']);
                    Person::create($fullname,$grade,$content,$pics,$birth,$death,$gender);
                }
                else {
                    Notifications::create("warning","tout les champs sont nécessaires");
                }
            }
        }
        else exit(header('Location: /contributor/login'));
    break;
    case "update":
        $uc3 = isset($_GET['uc3']) ? htmlspecialchars($_GET['uc3']) : exit(header('Location: /home'));
        $include = "person/form";
        $title = "mêttre à jour une personne";
        $user = new User();
        if($user->isLogged()){
            if(isset($_POST['fullname']) && isset($_POST['grade']) && isset($_POST['content']) && isset($_POST['birth']) && isset($_POST['death']) && isset($_POST['gender']) && isset($_POST['id'])){
                $fullname = htmlspecialchars($_POST['fullname']);
                $grade = htmlspecialchars($_POST['grade']);
                $content = htmlspecialchars($_POST['content']);
                $pics = ($_FILES['pics']);
                $birth = htmlspecialchars($_POST['birth']);
                $death = htmlspecialchars($_POST['death']);
                $gender = htmlspecialchars($_POST['gender']);
                $id = htmlspecialchars($_POST['id']);
                $personne = new Person($id);
                $personne->update($fullname,$grade,$content,$pics,$birth,$death,$gender);
            }
            else{
                Notifications::create("warning","tout les champs sont nécessaires");
            }
        }
        else{
            Notifications::create("warning","veuillez vous connecter");
            exit(header('Location: /contributor/login'));
        }
    break;
    case "validate":
        $uc3 = isset($_GET['uc3']) ? htmlspecialchars($_GET['uc3']) : exit(header('Location: /home'));
        if(isset($_POST['id']) && isset($_POST['validate'])){
            $id = htmlspecialchars($_POST['id']);
            $personne = new Person($id);
            if($personne->validate()){
                exit(header('Location: /admin/person'));
            }

        }
        else{
            Notifications::create("warning","tout les champs sont nécessaires");
        }

    break;
    case "delete":
        $uc3 = isset($_GET['uc3']) ? htmlspecialchars($_GET['uc3']) : exit(header('Location: /home'));
        if(isset($_POST['id']) && isset($_POST['delete'])){
            $id = htmlspecialchars($_POST['id']);
            $personne = new Person($id);
            if($personne->delete()){
                exit(header('Location: /admin/person'));
            }
        }
        else{
            Notifications::create("warning","tout les champs sont nécessaires");
        }
    break;
    case "page":
        $include = "person/page";
        $title = "";
    break;
}