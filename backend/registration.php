<?php

  require_once './includes/db_link.php';
  
  $email = '4me@me.me';//mysqli_real_escape_string($link, $_POST['email']);
$response = "";
  $sql = "SELECT email FROM users";
  // check if email already exists
  if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        if ($row['email'] == $email) {
          $response = "Duplicate email";
        }
      }
    }
    if ($response != "Duplicate email") {
      insertIntoDB($link);
    } else {
      echo $response;
    }
  }

function insertIntoDB($link) {
  $password = mysqli_real_escape_string($link, $_POST['password']);
  $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 

  // attempt insert query execution
  $sqlInsert = "INSERT INTO users (email, password, salt) VALUES ('4me@me.me', 'ABCdef123', '$salt')";

  if (mysqli_query($link, $sqlInsert)) {
    echo "<div>Successful insert</div>";
  } else{
    echo "<div>ERROR: Could not execute " . $sqlInsert . " " . mysqli_error($link)."</div>";
  }
}