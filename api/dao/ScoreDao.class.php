<?php
require_once dirname(__FILE__)."/BaseDao.class.php";
class ScoreDao extends BaseDao{
public function get_score_by_id($id){
return $this->query_unique("SELECT best_score FROM scores WHERE id = :id",["id" => $id]);
}
}
?>
