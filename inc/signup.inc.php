<?php 
session_start();
if(isset($_POST["submit"])){
    //taking data from user
    $fname = htmlspecialchars(strip_tags($_POST["fname"]));
    $email = htmlspecialchars(strip_tags($_POST["email"]));
    $pwd = htmlspecialchars(strip_tags($_POST["pwd"]));

    //instantiating signupcontr class
    include "../classes/db.class.php";
    include "../classes/signup.class.php";
    include "../classes/signupcontr.class.php";
    $signup = new SignupContr($fname, $email, $pwd);

    //error handler and signup
    if($signup->signupUser() == true){
        header("location: ../index.php?error=none");
    }else{
        // echo $_SESSION["error"];
        // unset($_SESSION["error"]);
        header("location: ../index.php");
    }
}
?>
