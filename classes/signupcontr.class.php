<?php

class SignupContr extends Signup {

    private $fname;
    private $email;
    private $pwd;

    public function __construct($fname, $email, $pwd)
    {
        $this->fname = htmlspecialchars(strip_tags($fname));
        $this->email = htmlspecialchars(strip_tags($email));
        $this->pwd = password_hash(htmlspecialchars(strip_tags($pwd)), PASSWORD_DEFAULT);
    }

    public function signupUser()
    {
        if($this->emptyInput() == false){
            $_SESSION["serror"] = "Empty input!";
            return false;
        }
        if($this->invalidFname() == false){
            $_SESSION["serror"] = "Invalid name!";
            return false;
        }
        if($this->invalidEmail() == false){
            $_SESSION["serror"] = "Invalid Email!";
            return false;
        }
        if($this->existUser() == false){
            return false;
        }
        return $this->setUser($this->fname, $this->email, $this->pwd);
    } 

    private function emptyInput()
    {
        if(empty($this->fname) || empty($this->email) || empty($this->pwd)) {
            return false;
        }
        return true;
    }

    private function invalidFname()
    {
        if(!preg_match("/^[a-zA-Z0-9 ]*$/", $this->fname)) {
            return false;
        }
        return true;
    }

    private function invalidEmail()
    {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    private function existUser()
    {
        if(!$this->checkUserExist($this->fname, $this->email)) {
            $_SESSION["serror"] = "Username or Email Taken!";
            return false;
        }
        return true;
    }
}
