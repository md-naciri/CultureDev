<?php

class Db
{

    protected function connect()
    {
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

    public function insert($table, $para = array())
    {
        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", $para);
        $stmt = $this->connect()->prepare("INSERT INTO $table($table_columns) VALUES('$table_value')");
        $stmt->execute();
    }

    public function update($table, $para = array(), $id)
    {
        $args = array();
        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'";
        }
        $sql = "UPDATE $table SET " . implode(',', $args);
        $sql .= " WHERE $id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }

    public function delete($table, $id, $a)
    {
        if ($a == null){
            $stmt = $this->connect()->prepare("DELETE FROM $table WHERE $id");
            $stmt->execute();
        }
        else {
            $stmt = $this->connect()->prepare("SELECT COUNT(*) FROM $a WHERE category_id=?");
            $stmt->execute([filter_var($id, FILTER_SANITIZE_NUMBER_INT)]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result['COUNT(*)']>0){
                session_start();
                $_SESSION["error"] = "Cannot delete a category that is related to an article";
            } else {
                $stmt = $this->connect()->prepare("DELETE FROM $table WHERE $id");
                $stmt->execute();
            }
        }
    }

    // public function select($table, $rows, $where)
    // {
    //     if ($where != null) {
    //         $stmt = $this->connect()->prepare("SELECT $rows FROM $table WHERE id=?");
    //         $stmt->execute([$where]);
    //     } else {
    //         $stmt = $this->connect()->prepare("SELECT $rows FROM $table");
    //         $stmt->execute();
    //     }
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function select($table, $rows, $where)
    {
        if ($where != null) {
            $stmt = $this->connect()->prepare("SELECT $rows FROM $table WHERE $where");
            $stmt->execute();
        } else {
            $stmt = $this->connect()->prepare("SELECT $rows FROM $table");
            $stmt->execute();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function count($table, $distinct)
    {
        if ($distinct == null) {
            $stmt = $this->connect()->prepare("SELECT COUNT(*) FROM $table");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['COUNT(*)'];
        } else {
            $stmt = $this->connect()->prepare("SELECT COUNT(DISTINCT $distinct) FROM $table");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result["COUNT(DISTINCT $distinct)"];
        }
    }
}
