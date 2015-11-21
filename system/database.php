<?php
class Database {

  public $database;
  public $connection;

  public function database($host, $user, $password, $database)
  {
    $this->connection = new mysqli($host, $user, $password, $database);
    $this->database = $database;

    if ($this->connection->errno)
    {
      echo 'Database engine is down or database is not exist.';
      exit;
    }
  }

  public function get_url_data($table_name, $field, $field_id)
  {
    $query = "SELECT $field_id AS record_id, $field AS result FROM $table_name WHERE $field LIKE '%http%'";
    return $this->connection->query($query);
  }

  public function get_tables()
  {
    $query = "SELECT table_name AS result FROM information_schema.tables WHERE TABLE_SCHEMA = '$this->database'";
    return $this->connection->query($query);
  }

  public function update_domain($table_name = null, $field = null, $full_url = null, $field_id = null, $id = null)
  {
    $query = "UPDATE $table_name SET $field = '$full_url' WHERE $field_id = $id";
    return $this->connection->query($query);
  }
}
?>
