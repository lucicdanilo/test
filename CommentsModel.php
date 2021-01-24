<?php 
class CommentsModel{
    function __construct(){
        include 'db.php';
        $this->db = $db;
    }

    public function listOfComments(){
        $comments = $this->db->query('SELECT * from Comments WHERE approved = 1');
        return $comments;
    }
    
    public function postComment($obj){
        $this->db->query('INSERT INTO Comments(name, email, text, approved) VALUES ("'.$obj->name.'", "'.$obj->email.'", "'.$obj->text.'", 0)');
        echo 'You added a comment successfully. Thank You for Your time!
        <a href="/test/">Go To Homepage</a>
        ';
    }

    public function dashboard(){  
        $unapprovedComments = $this->db->query('SELECT * from Comments WHERE approved = 0'); 
        return $unapprovedComments;
    }


    public function approve(){
        $allCommentsId = [];
        $approvedCommentsId = [];
        $unapprovedComments = [];


        if(isset($_POST['submit']))
        {
            foreach($this->db->query('SELECT * from Comments WHERE approved = 0') as $row){
                array_push($allCommentsId, $row['id']);
            }

            foreach($allCommentsId as $commentId){
                if(isset($_POST[$commentId])){
                    array_push($approvedCommentsId, $commentId);
                }
            }
                
            foreach($approvedCommentsId as $approveId){
                $this->db->query('UPDATE Comments SET approved = 1 WHERE id = '.$approveId);
            }
            
            return 1;

        }
    }


}

?>