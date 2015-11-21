<?php
include('system/bootstrap.php');

$table_name = $_POST['table'];
$old_domain = $_POST['old_domain'];
$field = $_POST['field'];
$field_id = $_POST['field_id'];
$domain = $_POST['domain'];

$data = $model->get_url_data($table_name, $field, $field_id);

if (!isset($data->num_rows))
{
  echo 'No url data was founded.';
}
else
{
  while ($row = $data->fetch_array())
  {
    $full_url = str_replace($old_domain, $domain, $row['result']);

    $update = $model->update_domain($table_name, $field , $full_url, $field_id, $row['record_id']);

    if ($update == false)
    {
      echo 'Gone wrong. <br/>';
    }
    else
    {
      echo $full_url . '(done) <br/>';
    }
  }
}
?>
