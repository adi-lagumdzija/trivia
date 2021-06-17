<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once dirname(__FILE__).'/../vendor/autoload.php';
require_once dirname(__FILE__).'/dao/BaseDao.class.php';
require_once dirname(__FILE__).'/dao/UserDao.class.php';
require_once dirname(__FILE__).'/routes/userRoutes.php';

Flight::map('error', function (Exception $ex) {
    // Flight::halt($ex->getCode(), json_encode(["message" => $ex->getMessage()]));
    Flight::json(["message" => $ex->getMessage()], $ex->getCode() ? $ex->getCode() : 500);
});

Flight::route('/hello', function(){
    echo 'second / route matched';
});
Flight::route('GET /swagger', function () {
    $openapi = @\OpenApi\scan(dirname(__FILE__) . "/routes");
    header('Content-Type: application/json');
    echo $openapi->toJson();
});
Flight::route('GET /', function () {
    Flight::redirect('/docs');
});

Flight::register('userDao', 'UserDao');


Flight::start();

 ?>
