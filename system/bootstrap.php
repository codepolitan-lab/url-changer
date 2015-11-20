<?php
include('system/database.php');
include('system/config.php');

// Setup database.
$model = new database($config['host'], $config['user'], $config['password'], $config['database']);
?>
