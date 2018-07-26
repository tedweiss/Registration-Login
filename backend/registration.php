<?php

  require_once './includes/db_link.php';
  
  $email = '6me@me.me';//mysqli_real_escape_string($link, $_POST['email']);
  $password = "password1";//mysqli_real_escape_string($link, $_POST['password']);
  echo "You are running PHP ".phpversion();
  $response = "response";
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
      insertIntoDB($link, $email, $password);
    } else {
      echo $response;
    }
  }

function insertIntoDB($link, $email, $password) {
  $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
  $password = hash('sha256', $password . $salt);
  // attempt insert query execution
  $sqlInsert = "INSERT INTO users (email, password, salt) VALUES ('$email', '$password', '$salt')";

  if (mysqli_query($link, $sqlInsert)) {
    echo "<div>Successful insert</div>";
  } else{
    echo "<div>ERROR: Could not execute " . $sqlInsert . " " . mysqli_error($link)."</div>";
  }
}