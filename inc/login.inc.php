<?php 

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    
    include "../classes/db.class.php";
    include "../classes/login.class.php";
    include "../classes/logincontr.class.php";
    $login = new LoginContr($email, $pwd);
    $login->loginUser();
    header("location: ../index.php?error=none");
}

?>