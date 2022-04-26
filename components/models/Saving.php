<?php

class Savings {
    public $id;

    function getAll(){

        $req = Database::getInstance()->prepare('SELECT * FROM savings WHERE id = ?');
        $req->execute(array($id));
        return $req->FetchAll();
    }

    function getBoats(){

        $req = Database::getInstance()->prepare('SELECT boats.* FROM crews,boats WHERE crews.savingId = boats.savingId AND savingId = ?');
        $req->execute(array($id));
        return $req->FetchAll();
    }

    function getPersons(){

        $req1 = Database::getInstance()->prepare('SELECT DISTINCT post FROM crews WHERE savingId = ?');
        $req1->execute(array($id));
        $tb1 = $req1->FetchAll();

        for($i = 0; $i < count($tb1); $i++){

            $req2 = Database::getInstance()->prepare('SELECT persons.personId,persons.fullname FROM crews,persons WHERE crews.personId=persons.personId AND savingId = ? AND crews.post = ?' );
            $req2->execute(array($id, $tb2[i]));
            $tb2[i]=(array($tb1[i],$req2->FetchAll()));
        }
        return $tb2;

    }

    function nbDead(){

        $req = Database::getInstance()->prepare('SELECT * FROM crews WHERE savingId = ? AND isDead = true');
        $req->execute(array($id));
        return $req->RowCount();


    }

    function getBySearch($text){

        $req = Database::getInstance()->prepare('SELECT savingId,savingName FROM savings WHERE savingName LIKE ?%');
        $req->execute(array($text));
        return $req->FetchAll();

    }



}

?>