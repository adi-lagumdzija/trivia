<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once dirname(__FILE__)."/dao/UserDao.class.php";
require_once dirname(__FILE__)."/dao/AccountDao.class.php";


$dao = new AccountDao();
$dao -> update_account(1, ["name"=>"FKŽ"]);
$accounts= $dao->get_all_accounts();
print_r($accounts);
?>
