<?php

$uc2 = isset($_GET['uc2']) ? htmlspecialchars($_GET['uc2']) : exit(header('Location: /home'));
switch($uc2) {
    case "create":
        $create = 1;
        $include = "boat/form";
        $title = "Créér un nouveau Bateau";
        $user = new User();
        if($user->isLogged()){
            if(isset($_POST['imatriculation'])){
                if(!empty($_POST['imatriculation'])) {
                    $imatriculation = htmlspecialchars($_POST['imatriculation']);
                    $bname = htmlspecialchars($_POST['bname']);
                    $model = htmlspecialchars($_POST['model']);
                    $motor = htmlspecialchars($_POST['motor']);
                    $lauchdate = htmlspecialchars($_POST['launchDate']);
    
                    if(Boat::create($imatriculation,$bname,$model,$motor,$lauchdate)) exit(header('Location: /home'));
                    else Notifications::create("danger", "Impossible de créer le bateau.");
                }
                else {
                    Notifications::create("warning","tout les champs sont nécessaires");
                }
            }
    }
    else{
        Notifications::create("warning","veuillez vous connecter");
        exit(header('Location: /contributor/login'));
    }
    break;
    case "update":
        $uc3 = isset($_GET['uc3']) ? htmlspecialchars($_GET['uc3']) : exit(header('Location: /home'));
        $include = "boat/form";
        $title = "";
        $user = new User();
        if($user->isLogged()){
            if(isset($_POST['imatriculation']) && isset($_POST['bname']) && isset($_POST['model']) && isset($_POST['motor']) && isset($_POST['birth']) && isset($_POST['death']) && isset($_POST['gender']) && isset($_POST['id'])){
                $imatriculation = htmlspecialchars($_POST['imatriculation']);
                $bname = htmlspecialchars($_POST['bname']);
                $model = htmlspecialchars($_POST['model']);
                $motor = htmlspecialchars($_POST['motor']);
                $lauchdate = htmlspecialchars($_POST['launchDate']);
                $id = htmlspecialchars($_POST['id']);
                $boat = new Boat($id);
                if($boat->update($imatriculation,$bname,$model,$motor,$lauchdate)) exit(header('Location: /home'));
                return true;
                
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
    break;
    case "delete":
        $uc3 = isset($_GET['uc3']) ? htmlspecialchars($_GET['uc3']) : exit(header('Location: /home'));
    break;
    case "page":
        //$uc3 = isset($_GET['uc3']) ? htmlspecialchars($_GET['uc3']) : exit(header('Location: /home'));
        $include = "boat/page";
        $title = "";
    break;
}