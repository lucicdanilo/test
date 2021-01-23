<?php
include 'db.php';

$allCommentsId = [];
$approvedCommentsId = [];

foreach($db->query('SELECT * from Comments WHERE approved = 0') as $row){
    echo "
        <div class='approveComments'>
            <div>" . $row['name'] . "</div>
            <div>" . $row['email'] . "</div>
            <div>" . $row['TEXT'] . "</div>
            <div>Approve
                <input class='form-check-input' type='checkbox' name='".$row['id']."'>
            </div>
        </div>
    ";

    array_push($allCommentsId, $row['id']);
}

if(isset($_POST['submit']))
{
    foreach($allCommentsId as $commentId){
        if(isset($_POST[$commentId])){
            array_push($approvedCommentsId, $commentId);
        }
    }
        
    if (isset($_POST['2'])) {
        echo "checked!";
    }

    foreach($approvedCommentsId as $approveId){
        $db->query('UPDATE Comments SET approved = 1 WHERE id = '.$approveId);
    }
} 


?>