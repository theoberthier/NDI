<?php

class Person{

    private $id;
    private $user;

    function __construct($id){
        $this->id = $id;
        $this->user = new User();
    }

    function getAll(){
        $req = Database::getInstance()->prepare('SELECT * FROM persons WHERE id = ?');
        $req->execute(array($this->id));
        return $req->FetchAll();
    }

    function nbEquipages(){
        $req = Database::getInstance()->prepare('SELECT COUNT(id) FROM crews WHERE id = ?');
        $req->execute(array($this->id));
        return $req->Fetch();
    }

    function nbPersonSave(){
        $req = Database::getInstance()->prepare('SELECT nbSave FROM crews, savings WHERE crews.savingId = savings.savingId AND crews.personId = ?');
        $req->execute(array($id));
        $tb=$req->RowCount();
        $req->FetchAll();
        $cmp = 0;
        for($i = 0; $i < $tb; $i++){
            $cmp = $cmp +$req[i];
        }
        return $cmp;
    }

    function getParents(){
        $req = Database::getInstance()->prepare('SELECT persons.* FROM parents, persons WHERE parents.parentId = persons.personId AND parents.personId = ?');
        $req->execute(array($this->id));
        return $req->FetchAll();
    }

    function getAdelphes(){
        $req = Database::getInstance()->prepare('SELECT persons.* FROM siblings ,persons WHERE siblings.siblingId = person.personId AND siblings.personId = ?');
        $req->execute(array($this->id));
        return $req->fetchAll();
    }

    function getEquipages(){
        $req = Database::getInstance()->prepare('SELECT crews.* FROM crews ,persons WHERE crews.personId = person.personId AND person.personId = ?');
        $req->execute(array($this->id));
        return $req->fetchAll();
    }

    function getGrade(){
        $req = Database::getInstance()->prepare('SELECT Grade FROM persons WHERE personId = ?');
        $req->execute(array($this->id));
        return $req->fetchAll();
    }

    static function getBysearch($string){
        $req = Database::getInstance()->prepare('SELECT personId, fullname FROM persons WHERE fullname LIKE ?%');
        $req->execute(array($string));
        return $req->fetchAll();
    }

    function getNbSaving(){
        $req = Database::getInstance()->prepare('SELECT COUNT(savings.savingId) FROM crews,savings WHERE crews.savings = savings.savingId  AND  personId = ?');
        $req->execute(array($this->id));
        return $req->fetch();
    }


    static function create($fullname,$grade,$content,$pics,$birth,$death,$gender){
        $user = new User();
        if($user->isLogged()){
            $link = File::upload($pics, "persons");
            $reqInsert = Database::getInstance()->prepare('INSERT INTO persons(fullname,grade,content,pics,birth,death,gender, userId) VALUES (?,?,?,?,?,?,?,?)');
            $birth = stringToDate($birth);
            $death = stringToDate($death);

            $reqInsert->execute(array($fullname,$grade,$content,$link,$birth,$death,$gender,$user->getUserId()));
            Notifications::create("success","Person was created !");
            if ($user->isAdmin()){
                //$this.validate();
            }
            return true;
        }
        else{
            Notifications::create("warning","you are not login");
            return false;
        }
    }

    function update($fullname,$grade,$content,$pics,$birth,$death,$gender){
        if($this->user->isLogged()){
            $link = File::upload($pics, "persons");
            $reqInsert = Database::getInstance()->prepare('INSERT INTO persons(fullname,grade,content,pics,birth,death,gender,confirmed,oldRef,userId) VALUES (?)');
            
            $reqInsert->execute(array($fullname,$grade,$content,$link,$birth,$deth,$gender,0,$id,$this->user->getUserId()));
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
            $reqInsert = Database::getInstance()->prepare('DELETE FROM persons WHERE personId=?');
            $reqInsert->execute(array($id));
        }
    }

    function validate(){
        if($this->user->isLogged()){
            $reqInsert = Database::getInstance()->prepare('UPDATE persons SET confirmed=1 WHERE personId=?');
            $reqInsert->execute(array($id));
            $reqOldRef = Database::getInstance()->prepare('SELECT persons.oldRef WHERE personId=? ');
            $reqOldRef->execute(array($id));
            if ($reqOldRef->RowCount() >0){
                $reqDelete = Database::getInstance()->prepare('DELETE  FROM persons WHERE personId=?');
                $reqDelete->execute(array($reqOldRef->Fetch()));
                $reqBlank = Database::getInstance()->prepare(' UPDATE persons SET oldRef=null WHERE personId=?');
                $reqBlank->execute(array($id));
            }
        }
    }

}

?>