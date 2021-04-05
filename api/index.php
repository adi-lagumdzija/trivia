<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__)."/dao/BaseDao.class.php";
$user_dao = new UserDao();

$user = $user_dao->get_user_by_email("adilag@gmail.com");
print_r($user);

echo "Hello from API";

 ?>
