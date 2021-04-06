<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once dirname(__FILE__)."/dao/UserDao.class.php";

$user_dao = new UserDao();
//$user = $user_dao->get_user_by_id(2);
//$user = $user_dao->get_user_by_email("adilag@gmail.com");
$user1 = [
  "email" => "ermin.ganic12345678@yahoo.com",
  "accounts_id" => 5,
  "name" => "ermin",
  "password" => "mornar"
];



$user = $user_dao ->add_user($user1);
print_r($user);
?>
