<?php 
include 'db.php';
if(empty($_POST['username']) || empty($_POST['password'])){
    echo 'Please input fields!';
}else{
    $auth = "";

    foreach($db->query('SELECT * from Administrators where username="'. $_POST['username'] . '" and password="'. $_POST['password'] . '"') as $result){
        $auth = $result["username"];
    };

    if($auth == $_POST["username"]){
        echo 'Authenticated';
    }else{
        echo 'Wrong username or password!';
    }




    
}

?>