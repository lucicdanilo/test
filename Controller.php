<?php 
include 'CommentsModel.php';
class Contoller{
    public function handler(){

        function __construct(){          
			$this->model = new CommentsModel();
        }
        
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
        $list = new CommentsModel();
        $comments = $list->listOfComments();
        include "view/home.php";                                  
    }

    public function postComment(){
        $formData = $_POST;
        if (empty($formData['name']) ||
            empty($formData['email']) ||
            empty($formData['text'])) 
        {    
            echo 'Please fill in all fields. Thanks!';
        }else{
            $obj->name = $formData['name'];
            $obj->email = $formData['email'];
            $obj->text = $formData['text'];

            $postComment = new CommentsModel();
            $postComment->postComment($obj);
        }
    }

    public function dashboard(){
        $dashboard = new CommentsModel();
        $unapprovedComments = $dashboard->dashboard();
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
                echo '
                <div class="alert alert-danger m-3" role="alert">
                    Wrong username or password!
                </div>              
                ';
            }
        }
    }

    public function approveCommets(){

        $approveComments = new CommentsModel();
        $res = $approveComments->approve();
        if($res == 1){
            echo 'You successfully approved comments!
            <a href="/test/index.php?act=dashboard">Go To Dashboard</a>
            ';  
        }

    }    
}

?>