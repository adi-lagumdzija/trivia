<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require dirname(__FILE__).'/../vendor/autoload.php';
require dirname(__FILE__).'/dao/BaseDao.class.php';
require dirname(__FILE__).'/dao/UserDao.class.php';



Flight::route('GET /users', function(){
$dao = new UserDao();
$users = $dao->get_all_users();
Flight::json($users);
});

Flight::route('GET /users/@id', function($id){
$dao = new UserDao();
$users = $dao->get_user_by_id($id);
Flight::json($users);
});

Flight::route('POST /users', function(){
$request = Flight::request();
$data = $request->data->getData();
$dao = new UserDao();
$users->dao->add($data);
print_r($data);
});


Flight::route('/hello', function(){
echo 'second / route matched';
});
Flight::start();

 ?>
