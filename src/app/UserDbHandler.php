<?php

class UserDbHandler {
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }


    public function fetchAllUsers() {
        $sql = "SELECT * FROM users
        ";
        $state = $this->pdo->query($sql);
        return $state->fetchAll();
    }


    public function FetchUser(){
        $sql = "
        SELECT * FROM users
        WHERE userid = :userid
        ";
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':userid', $_GET ["userid"]);
        $state->execute();
        return $state->fetch();
    }

    public function FetchObjectUser () {
        $sql = "
        SELECT * FROM objects
        WHERE objectid = :objectid
        ";
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':objectid', $_GET ["objectid"]);
        $state->execute();
        return $state->fetch();
    }


    public function FetchUserByEmail($usermail){
        $sql = "
        SELECT * FROM users
        WHERE usermail = :usermail
        ";
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':usermail', $usermail);
        $state->execute();
        return $state->fetch();
    }

    public function FetchUserByObject($userid){
        $sql = "
        SELECT * FROM users
        WHERE userid = :userid
        ";
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':userid', $userid);
        $state->execute();
        return $state->fetch();
    }


    public function deleteUsers() {
        $sql = "
        DELETE FROM users 
        WHERE userid = :userid
        ";
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':userid', $_POST['userid']);
        $state->execute();
    }


    public function updateUsersFnLn($username) {
        $sql = "
        UPDATE users
        SET
            username = :username
        WHERE userid = :userid
        ";
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':username', $username);
        $state->bindParam(':userid', $_SESSION['userid']);
        $state->execute();
    } 


    public function updateInformation($userphone, $userimg) {
        $sql = "
        UPDATE users
        SET
        userphone = :userphone,
        userimg = :userimg,
        WHERE userid = :userid
        ";
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':userid', $_SESSION['userid']);
        $state->bindParam(':userphone', $userphone);
        $state->bindParam(':userimg', $userimg);
        $state->execute();
    }


    public function UpdateUserPassword($userpass){
        $sql = "
        UPDATE users
        SET userpass = :userpass
        WHERE userid = :id
        ";
        $encryptedPassword = password_hash($userpass, PASSWORD_BCRYPT, ['cost' => 12]);
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':userid', $_SESSION['userid']);
        $state->bindParam(':userpass', $encryptedPassword);
        $state->execute();
        return $state->fetch();
    }


    public function FetchUserBySession(){
        $sql = "
        SELECT * FROM users
        WHERE userid = :userid
        ";
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':userid', $_SESSION['userid']);
        $state->execute();
        return $state->fetch();  
    }


    public function updatePassword ($userpass) {
        $sql = "
            UPDATE users
            SET userpass = :userpass
            WHERE userid = :userid
        ";
        $encryptedPassword = password_hash($userpass, PASSWORD_BCRYPT, ['cost' => 12]);
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':userid', $_SESSION['userid']);
        $state->bindParam(':userpass', $encryptedPassword);
        $state->execute();
        return $state->fetch();
    }


    public function updateUsersAdmin($username, $usermail, $userphone, $usertype, $userimg, $userpass, $confirmPassword){
        $sql = "
        UPDATE users
        SET  
        username = :username, usermail = :usermail, userphone = :userphone, userpass = :userpass
        WHERE userid = :userid 
        ";
        $encryptedPassword = password_hash($userpass, PASSWORD_BCRYPT, ['cost' => 12]);
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':userid', $_GET["userId"]);
        $state->bindParam(':username', $username);
        $state->bindParam(':usermail', $usermail);
        $state->bindParam(':userphone', $userphone);
        $state->bindParam(':userimg', $userimg);
        $state->bindParam(':userpass', $encryptedPassword);
        $state->execute();
    }


    public function insertIntoUser($username, $usermail, $userphone, $usertype, $userimg, $userpass) {
        $sql = "
        INSERT INTO users (username, usermail, userpass, userphone, userimg, usertype)
        VALUES (:username, :usermail, :userpass, :userphone, :userimg, :usertype)
        ";
        $encryptedPassword = password_hash($userpass, PASSWORD_BCRYPT, ['cost' => 12]);
        $stmt = $this->pdo->prepare($sql);
        $state->bindParam(':username', $username);
        $state->bindParam(':usermail', $usermail);
        $state->bindParam(':userphone', $userphone);
        $state->bindParam(':userimg', $userimg);
        $state->bindParam(':usertype', $usertype);
        $state->bindParam(':userpass', $encryptedPassword);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }


    public function newUser($username, $usermail, $userphone, $usertype, $userimg, $userpass) {  
        $sql = "
        INSERT INTO users (username, usermail, userpass, userphone, userimg, usertype)
        VALUES (:username, :usermail, :userpass, :userphone, :userimg, :usertype) ;
        ";
        $encryptedPassword = password_hash($userpass, PASSWORD_BCRYPT, ['cost' => 12]);
        $state = $this->pdo->prepare($sql);
        $state->bindParam(':username', $username);
        $state->bindParam(':usermail', $usermail);
        $state->bindParam(':userphone', $userphone);
        $state->bindParam(':userimg', $userimg);
        $state->bindParam(':usertype', $usertype);
        $state->bindParam(':userpass', $encryptedPassword);
        $state->execute();
    }

}

?>