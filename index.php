<?php 
require 'vendor/autoload.php';


// // Create an instance of MyClass
// $myClass = new \Iorp\Cluster\Api\MyClass("China");

// // Call the sayHello method
// echo $myClass->sayHello(); // Output: Hello, World

use \Iorp\Cluster\App;
$app = new App();
 



$app->route('GET', '/', function () {  App::res((object)['result'=>true],false);});

$app->route('POST', '/submit', function () {return 'Data submitted successfully.';});

// Listen for incoming requests
$app->listen();


?>