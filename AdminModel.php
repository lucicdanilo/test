<?php 
class AdminModel{
    function __construct(){
        include 'db.php';
        $this->db = $db;
    }

    public function login(){
        $auth = "";

        foreach($this->db->query('SELECT * from Administrators where username="'. $_POST['username'] . '" and password="'. $_POST['password'] . '"') as $result){
            $auth = $result["username"];
        };

        return $auth;
    }
}

?>