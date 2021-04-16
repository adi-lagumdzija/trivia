<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once dirname(__FILE__)."/dao/UserDao.class.php";
require_once dirname(__FILE__)."/dao/AccountDao.class.php";
require_once dirname(__FILE__)."/dao/ScoreDao.class.php";
require_once dirname(__FILE__)."/dao/QuestionDao.class.php";


$dao = new UserDao();
$question = $dao->get_all_users();
//print_r($question);
echo json_encode($question, JSON_PRETTY_PRINT);
?>
