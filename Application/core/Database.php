<?php

namespace Application\core;

use PDO;
class Database extends PDO
{
  private $DB_NAME = 'u375395381_numerar';
  private $DB_USER = 'u375395381_root';
  private $DB_PASSWORD = 'Server-123';
  private $DB_HOST = 'srv1082.hstgr.io';
  private $DB_PORT = 3306;
  private $conn;

  public function __construct()
  {
    $this->conn = new PDO("mysql:host=$this->DB_HOST;dbname=$this->DB_NAME", $this->DB_USER, $this->DB_PASSWORD);
  }

  private function setParameters($stmt, $key, $value)
  {
    $stmt->bindParam($key, $value);
  }

  private function mountQuery($stmt, $parameters)
  {
    foreach( $parameters as $key => $value ) {
      $this->setParameters($stmt, $key, $value);
    }
  }

  public function executeQuery(string $query, array $parameters = [])
  {
    $stmt = $this->conn->prepare($query);
    $this->mountQuery($stmt, $parameters);
    $stmt->execute();
    return $stmt;
  }

}
