<?php

require_once 'db_config.php';
 
$link = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if($link === false){
  die("ERROR: Could not connect. "/* . mysqli_connect_error()*/);
}