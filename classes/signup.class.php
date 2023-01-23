<?php

class Signup extends Db {

    protected function setUser($fname, $email, $pwd){
        $stmt = $this->connect()->prepare('INSERT INTO user (full_name, email, password) VALUES (?, ?, ?);');
        $stmt->bindValue(1, $fname, PDO::PARAM_STR);
        $stmt->bindValue(2, $email, PDO::PARAM_STR);
        $stmt->bindValue(3, $pwd, PDO::PARAM_STR);
        if(!$stmt->execute()){
            $stmt = null;
            $_SESSION["serror"] = "Failed to insert user.";
            return false;
        }
        $stmt = null;
        return true;
    }

    protected function checkUserExist($fname, $email){
        $stmt = $this->connect()->prepare('SELECT full_name FROM user WHERE full_name = ? OR email = ?;');
        $stmt->bindValue(1, $fname, PDO::PARAM_STR);
        $stmt->bindValue(2, $email, PDO::PARAM_STR);
        if(!$stmt->execute()){
            $stmt = null;
            $_SESSION["serror"] = "Failed to check user existence.";
            return false;
        }
        if($stmt->rowCount()>0){
            $stmt = null;
            $_SESSION["serror"] = "User already exists.";
            return false;
        }
        $stmt = null;
        return true;
    }
}
