<?php 

require_once 'CommentsController.php'; 

$url = $_SERVER['REQUEST_URI'];
$controller = new CommentsContoller();	

$controller->handler();









?>