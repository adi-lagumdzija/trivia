<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

require dirname(__FILE__).'/../vendor/autoload.php';
require dirname(__FILE__).'/dao/UserDao.class.php';


Flight::route('/users', function(){
$dao = new UserDao();
$users = $dao->get_user_by_id(1);
Flight::json($users);
});

Flight::route('/hello', function(){
echo 'second / route matched';
});
Flight::start();

 ?>
