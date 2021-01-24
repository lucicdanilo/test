<?php 

require_once 'Controller.php'; 

$url = $_SERVER['REQUEST_URI'];
$controller = new Contoller();	

$controller->handler();









?>