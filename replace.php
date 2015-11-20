<?php
include('system/bootstrap.php');

$table_name = $_POST['table'];
$old_domain = $_POST['old_domain'];
$domain = $_POST['domain'];

$data = $model->get_domain($table_name);

if (!isset($data->num_rows))
{
  echo 'No domain data was founded.';
}
else
{
  while ($row = $data->fetch_array())
  {
    $full_url = str_replace($old_domain, $domain, $row['result']);

    $update = $model->update_domain($table_name, $full_url, $row['meta_id']);

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
