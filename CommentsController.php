<?php 

class CommentsContoller{
    public function handler(){
        $action = isset($_GET['act']) ? $_GET['act'] : NULL;
		switch ($action) {
            case 'postComment' :                    
				$this->postComment();
				break;						
			case 'approveComments':
				$this->approveCommets();
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

            echo 'You added a comment successfully. Thank You for Your time!';

            $db->query('INSERT INTO Comments(name, email, text, approved) VALUES ("'.$formData["name"].'", "'.$formData["email"].'", "'.$formData["text"].'", 0)');
        }
    }

    public function approveCommets(){
        include 'db.php';

        $allCommentsId = [];
        $approvedCommentsId = [];
        $unapprovedComments = [];

        if(isset($_POST['submit']))
        {
            foreach($allCommentsId as $commentId){
                if(isset($_POST[$commentId])){
                    array_push($approvedCommentsId, $commentId);
                }
            }
                
            foreach($approvedCommentsId as $approveId){
                $db->query('UPDATE Comments SET approved = 1 WHERE id = '.$approveId);
            }

            echo 'You successfully approved comments!';  

        }else{
            $unapprovedComments = $db->query('SELECT * from Comments WHERE approved = 0');
             
        }

        $unapprovedComments;
        include "view/dashboard.php"; 

        
    }
    
}

?>