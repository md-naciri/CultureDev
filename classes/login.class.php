<?php
class Login extends Db{
    public function getUser($email, $pwd) {
        try {
            $stmt = $this->connect()->prepare('SELECT password FROM user WHERE email = ?');
            $stmt->execute([$email]);

            if ($stmt->rowCount() == 0) {
                throw new Exception("User not found!");
            }

            $hashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!password_verify($pwd, $hashed[0]["password"])) {
                throw new Exception("Wrong password!");
            }

            $stmt = $this->connect()->prepare('SELECT * FROM user WHERE email = ?');
            $stmt->execute([$email]);
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["userid"] = $user[0]["idD"];
            $_SESSION["username"] = $user[0]["full_name"];
            return true;
        } catch (Exception $e) {
            $_SESSION["error"] = $e->getMessage();
            return false;
        }
    }
}
