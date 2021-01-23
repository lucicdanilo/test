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
}
?>