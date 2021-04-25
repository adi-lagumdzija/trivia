<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once dirname(__FILE__)."/dao/UserDao.class.php";
require_once dirname(__FILE__)."/dao/AccountDao.class.php";
require_once dirname(__FILE__)."/dao/QuestionDao.class.php";



$dao = new UserDao();

/*$dao -> add_user([
  "id" => 5,
  "name" => "Kerim Salić",
  "email" => "kera@gmail.com",
  "password" => "golf1tdi",
  "accounts_id" => 5

]);*/

$user= $dao->get_all_users();
print_r($user);



$dao = new QuestionDao();
$question= $dao->get_question_by_id(1);
print_r($question);
?>
