<?php 

class Contoller{
    public function handler(){
        $action = isset($_GET['act']) ? $_GET['act'] : NULL;
		switch ($action) {
            case 'postComment' :                    
				$this->postComment();
                break;	
            case 'dashboard' : 
                $this->dashboard();
                break;	
			case 'approveCommets':
				$this->approveCommets();
                break;
            case 'login':
                $this->login();
                break;
			default:
                $this->list();
        }
            
    }

    public function list(){
        include 'db.php';
    
        $comments = $db->query('SELECT * from Comments WHERE approved = 1');
        include "view/home.php";  
                                              
    }

    public function postComment(){
        include 'db.php';
        $formData = $_POST;


        if (empty($formData['name']) ||
            empty($formData['email']) ||
            empty($formData['text'])) 
        {    
            echo 'Please fill in all fields. Thanks!';
        }else{
            include 'db.php';
            $db->query('INSERT INTO Comments(name, email, text, approved) VALUES ("'.$formData['name'].'", "'.$formData['email'].'", "'.$formData['text'].'", 0)');
            echo 'You added a comment successfully. Thank You for Your time!
            <a href="/test/">Go To Homepage</a>
            ';
        }
    }

    public function dashboard(){
        include 'db.php';  
        $unapprovedComments = $db->query('SELECT * from Comments WHERE approved = 0');  
        include 'view/dashboard.php';                             
    }

    public function login(){
        include 'db.php';   
        $auth = "";

        include "view/admin.php";
           
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            foreach($db->query('SELECT * from Administrators where username="'. $_POST['username'] . '" and password="'. $_POST['password'] . '"') as $result){
                $auth = $result["username"];
            };

            if($auth == $_POST["username"]){
                header('location: /test/index.php?act=dashboard');                
            }else{
                echo 'Wrong username or password!';
            }
        }
    }

    public function approveCommets(){
        include 'db.php';

        $allCommentsId = [];
        $approvedCommentsId = [];
        $unapprovedComments = [];


        if(isset($_POST['submit']))
        {
            foreach($db->query('SELECT * from Comments WHERE approved = 0') as $row){
                array_push($allCommentsId, $row['id']);
            }

            foreach($allCommentsId as $commentId){
                if(isset($_POST[$commentId])){
                    array_push($approvedCommentsId, $commentId);
                }
            }
                
            foreach($approvedCommentsId as $approveId){
                $db->query('UPDATE Comments SET approved = 1 WHERE id = '.$approveId);
            }
            echo 'You successfully approved comments!
            <a href="/test/index.php?act=dashboard">Go To Dashboard</a>
            ';  

        }
    }    
}

?>