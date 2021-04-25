<?php
require_once dirname(__FILE__)."/../config.php";

class BaseDao {
  protected $connection;
  private $table;

  public function __construct(){

    try {
      $this->connection = new PDO("mysql:host=".Config::DB_HOST.";dbname=".Config::DB_SCHEME, Config::DB_USERNAME, Config::DB_PASSWORD);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      throw $e;
    }
  }

  protected function insert($table, $entity){
          $query = "INSERT INTO $table (";

          foreach ($entity as $column => $value) {
              $query .= "$column, ";
          }
          $query = substr($query, 0, -2) . ") VALUES (";

          foreach ($entity as $column => $value) {
              $query .= ":$column, ";
          }
          $query = substr($query, 0, -2) . ")";

          $stmt = $this->connection->prepare($query);
          $stmt->execute($entity);//prevent sql injection
          $entity["id"] = $this->connection->lastInsertId();
          return $entity;
      }

  protected function update($table, $id, $entity){
    $query = "UPDATE ${table} SET";
    foreach($entity as $name => $value){
      $query .= $name ."= :". $name. ", ";

    }
    $query = substr($query, 0, -2);
    $query .= "WHERE id = :id";
    $stmt= $this->connection->prepare($query);
    $entity['id'] = $id;
      $stmt->execute($entity);
    }



  protected function query($query, $params){
    $stmt = $this->connection->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll();

  }

  protected function query_unique($query, $params){
    $results = $this->query($query, $params);
    return reset($results);
  }


  }
 ?>
