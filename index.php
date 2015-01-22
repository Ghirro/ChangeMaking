<?php
define('ROOT', __DIR__);
include 'src/autoload.php';
include 'vendor/autoload.php';

// Simple Controller mechanism
$HomeController = new HomeController();
$allowableActions = ['calculate' => 'HomeController:calculate', 'home' => 'HomeController:index'];
$actionRequested = $_GET['action'];

// Redirect where necessary
if (!$actionRequested || !isset($allowableActions[$actionRequested])) {
  $actionRequested = 'home';
}

$arr = explode(':', $allowableActions[$actionRequested]);

// Render the "route"
$$arr[0]->{ $arr[1] }();
