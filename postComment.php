<?php
include 'db.php';
$formData = $_POST;

if (empty($formData['name']) ||
    empty($formData['email']) ||
    empty($formData['text'])) 
{    
    echo 'Please populate all fields!';
}else{

    echo 'Insert into DB';
    echo $formData['name'];
    echo $formData['email'];
    echo $formData['text']; 

    $db->query('INSERT INTO Comments(name, email, text, approved) VALUES ("'.$formData["name"].'", "'.$formData["email"].'", "'.$formData["text"].'", 0)');

}
?>