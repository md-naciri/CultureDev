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

    public function insert($table,$para=array()){
        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", $para);
        $stmt = $this->connect()->prepare("INSERT INTO $table($table_columns) VALUES('$table_value')");
        $stmt->execute();
    }

    public function update($table,$para=array(),$id){
        $args = array();
        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'"; 
        }
        $sql="UPDATE $table SET " . implode(',', $args);
        $sql .=" WHERE id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

    public function delete($table,$id){
        $stmt = $this->connect()->prepare("DELETE FROM $table WHERE id=?");
        $stmt->execute([$id]);
    }

    public function select($table,$rows,$where){
        if ($where != null) {
            $stmt = $this->connect()->prepare("SELECT $rows FROM $table WHERE $where");
            $stmt->execute();
        }else{
            $stmt = $this->connect()->prepare("SELECT $rows FROM $table");
            $stmt->execute();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}