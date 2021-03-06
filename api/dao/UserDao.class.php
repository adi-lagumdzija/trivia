<?php
require_once dirname(__FILE__)."/BaseDao.class.php";
class UserDao extends BaseDao{

  public function __construct()
    {
        parent::__construct("users");
    }


  public function get_user_by_email($email){
    return $this->query_unique("SELECT * FROM users WHERE email = :email",["email" => $email]);
  }


public function get_user_by_id($id){
  return $this->query_unique("SELECT * FROM users WHERE id = :id", ['id' => $id]);
}


public function add_user($user){
  return $this->insert("users", $user);
}

public function update_user($id, $user){
  $this->update("users", $id, $user);

}
public function update_user_by_email($email, $user){
   $this->update("users", $email, $user, "email");
 }

public function get_all_users(){
  return $this->query("SELECT * FROM users", []);
}

public function get_by_id($id)
    {
        return $this->query_unique("SELECT DISTINCT FROM " . $this->table . " WHERE id = :id", ["id" => $id]);
    }
}



 ?>
