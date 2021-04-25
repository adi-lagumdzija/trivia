<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require dirname(__FILE__).'/../vendor/autoload.php';
require dirname(__FILE__).'/dao/BaseDao.class.php';
require dirname(__FILE__).'/dao/UserDao.class.php';

Flight::register('userDao', 'UserDao');

Flight::route('GET /users', function(){
Flight::json(Flight::userDao()->get_all_users());
});

Flight::route('GET /users/@id', function($id){
Flight::json(Flight::userDao()->get_user_by_id($id););
});

Flight::route('POST /users', function(){
$request = Flight::request()->data->getData();;
Flight::json(Flight::userDao()->add($data));
});


Flight::route('PUT /users/@id', function($id){
$dao = new UserDao();
$request = Flight::request();
$data = $request->data->getData();
$dao->update($id, $data);
$users = $dao->get_user_by_id($id);
Flight::json($users);


});

Flight::route('/hello', function(){
echo 'second / route matched';
});
Flight::start();

 ?>
