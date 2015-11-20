<?php
class Database {

  public $host;
  public $user;
  public $password;
  public $database;
  public $connection;

  public function database($host, $user, $password, $database)
  {
    $this->connection = new mysqli($host, $user, $password, $database);

    if ($this->connection->errno)
    {
      echo 'Database engine is down or database is not exist.';
      exit;
    }
  }

  public function get_domain($table_name)
  {
    $query = "SELECT meta_id, meta_value AS result FROM $table_name WHERE meta_value LIKE '%http://%'";
    return $this->connection->query($query);
  }

  public function get_tables()
  {
    $query = "SELECT table_name AS result FROM information_schema.tables WHERE TABLE_SCHEMA='hyper.net.id'";
    return $this->connection->query($query);
  }

  public function update_domain($table_name = null, $full_url = null, $id = null)
  {
    $query = "UPDATE $table_name SET meta_value = '$full_url' WHERE meta_id = $id";
    return $this->connection->query($query);
  }
}
?>
