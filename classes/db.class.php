<?php 

class Db {

    protected function connect(){
        try {
            $username = "root";
            $pwd = "";
            $db = new PDO('mysql:host=localhost;dbname=dev', $username, $pwd);
            return $db;

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}