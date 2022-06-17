<?php
class user{
    private $db;

    function __construct($con){
        $this->db = $con;
    }

    public function insertUSer($username, $password)
    {
        try {
            $result = $this->getUserbyUsername($username);

            if($result["num"] > 0){
                return false;
            } else {
                $new_password = md5($password.$username);
                $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(":username", $username);
                $stmt->bindparam(":password", $new_password);

                $stmt->execute();
                return true;
            }
        } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            
        }
    }

    public function getUser($username, $password)
    {
        try {
            $sql = "SELECT * FROM users where username = :username AND password = :password" ;
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":username", $username);
            $stmt->bindparam(":password", $password);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getUserbyUsername($username)
    {
        try {
            $sql = "SELECT COUNT(*) as num FROM users where username = :username" ;
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":username", $username);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}



?>