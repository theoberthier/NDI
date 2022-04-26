<?php

class Boat {
    public $id;
    private $user;

    function __construct() {
        $this->user = new User();
    }

    function getAll(){

        $req = Database::getInstance()->prepare('SELECT * FROM boats WHERE id = ?');
        $req->execute(array($id));
        return $req->FetchAll();
    }

    function getSaving(){

        $req = Database::getInstance()->prepare('SELECT savings.* FROM crews,savings WHERE crews.boatId = savings.boatId AND boatId = ?');
        $req->execute(array($id));
        return $req->FetchAll();
    }

    function nbPersonSave(){

        $req = Database::getInstance()->prepare('SELECT nbSave FROM crews, savings WHERE crews.savingId = savings.savingId AND boatid = ?');
        $req->execute(array($id));
        $tb=$req->RowCount();
        $req->FetchAll();
        $cmp = 0;
        for($i = 0; $i < $tb; $i++){
            $cmp = $cmp +$req[i];
        }
        return $cmp;

    }

    function getNbSaving(){

        $req = Database::getInstance()->prepare('SELECT nbSave FROM crews, savings WHERE crews.savingId = savings.savingId AND boatid = ?');
        $req->execute(array($id));
        return $req->RowCount();
    }

    function getBySearch($text){

        $req = Database::getInstance()->prepare('SELECT boatId,bname FROM boats WHERE bname LIKE ?%');
        $req->execute(array($text));
        return $req->FetchAll();

    }


    static function create($imat,$name,$model,$motor,$launchDate){
        $user = new User();
        if($user->isLogged()){
            $link = File::upload($pics, "boats");
            $launchDate = stringToDate($launchDate);
            $reqInsert = Database::getInstance()->prepare('INSERT INTO boats(imatriculation,bname,model,motor,launchDate,userId) VALUES (?, ?, ?, ?, ?, ?)');
            $reqInsert->execute(array($imat,$name,$model,$motor,$launchDate,$user->getUserId()));
            Notifications::create("success","Boat was created !");
            if ($user->isAdmin()){
                //$user->validate();
            }
            return true;
        }
        else{
            Notifications::create("warning","you are not login");
            return false;
        }
    }

    function update($imat,$name,$model,$motor,$launchDate){
        if($this->user->isLogged()){
            $link = File::upload($pics, "boats");
            $launchDate = stringToDate($launchDate);

            $reqInsert = Database::getInstance()->prepare('INSERT INTO boats(imatriculation,bname,model,motor,launchDate,confirmed,oldRef,userId) VALUES (?)');
               
            $reqInsert->execute(array($imat,$name,$model,$motor,$launchDate,0,$id,$this->user->getUserId()));
            if ($this->user->isAdmin()){
                $this.validate();
            }
            Notifications::create("success","the update are succesfull");
            return true;
        }
        else{
            Notifications::create("warning","you are not login");
            return false;
        }
    }

    function delete(){
        if($this->user->isLogged()){
            $reqInsert = Database::getInstance()->prepare('DELETE FROM boats WHERE personId=?');
            $reqInsert->execute(array($id));
        }
    }

    function validate(){
        if($this->user->isLogged()){
            $reqInsert = Database::getInstance()->prepare('UPDATE boats SET confirmed=1 WHERE boatId=?');
            $reqInsert->execute(array($id));
            $reqOldRef = Database::getInstance()->prepare('SELECT boats.oldRef WHERE boatId=? ');
            $reqOldRef->execute(array($id));
            if ($reqOldRef->RowCount() >0){
                $reqDelete = Database::getInstance()->prepare('DELETE  FROM boats WHERE boatId=?');
                $reqDelete->execute(array($reqOldRef->Fetch()));
                $reqBlank = Database::getInstance()->prepare(' UPDATE boats SET oldRef=null WHERE boatId=?');
                $reqBlank->execute(array($id));
            }
        }
    }
}

?>
