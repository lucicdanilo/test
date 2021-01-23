<?php
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
?>