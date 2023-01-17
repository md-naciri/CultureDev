<?php

class LoginContr extends Login {

    private $email;
    private $pwd;

    public function __construct($email, $pwd)
    {
        $this->email = $email;
        $this->pwd = $pwd;
    }

    public function loginUser()
    {
        if($this->emptyInput() == false){
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        $loginSuccessful = $this->getUser($this->email, $this->pwd);

        if (!$loginSuccessful) {
            if ($_SESSION["error"] == "Wrong password.") {
                header("location: ../index.php?error=wrongpassword");
            } else if ($_SESSION["error"] == "User not found.") {
                header("location: ../index.php?error=usernotfound");
            }
            exit();
        }

        header("location: ../index.php?error=none");
    } 

    private function emptyInput()
    {
        $result = true;
        if(empty($this->email) || empty($this->pwd)) $result = false;
        return $result;
    }
}
