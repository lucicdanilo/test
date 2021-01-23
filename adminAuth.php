<?php 
include 'db.php';   
$auth = "";

if(empty($_POST['username']) || empty($_POST['password'])){
    echo 'Please fill in input fields!';
}else{
    foreach($db->query('SELECT * from Administrators where username="'. $_POST['username'] . '" and password="'. $_POST['password'] . '"') as $result){
        $auth = $result["username"];
    };

    if($auth == $_POST["username"]){
        include './view/dashboard.php'; 
    }else{
        echo 'Wrong username or password!';
    }




    
}

?>