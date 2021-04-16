<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require dirname(__FILE__).'/../vendor/autoload.php';


Flight::route('/', function(){
echo 'first / route matched';
});
Flight::route('/a', function(){
echo 'second a route matched';
});
Flight::start();
 ?>
