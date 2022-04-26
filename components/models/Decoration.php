<?php

class Decoration {
    public $id;

    function getAll(){

        $req = Database::getInstance()->prepare('SELECT * FROM decorations WHERE id = ?');
        $req->execute(array($id));
        return $req->FetchAll();
    }

    function getPersons(){

        $req = Database::getInstance()->prepare('SELECT persons.* FROM persons,crews WHERE persons.boatId=crews.boatId AND boatId = ?');
        $req->execute(array($id));
        return $req->FetchAll();
    }



    function getBySearch($text){

        $req = Database::getInstance()->prepare('SELECT decoId,label FROM decorations WHERE id LIKE ?%');
        $req->execute(array($text));
        return $req->FetchAll();


    }
}

?>