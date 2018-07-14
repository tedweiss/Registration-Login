<?php

	require_once './includes/db_link.php';

// attempt insert query execution
    $sql = "INSERT INTO users (email, password, salt) VALUES ('me@me.me', 'ABCdef123', 'salt')";

    if(mysqli_query($link, $sql)){
    	echo "<div>Successful insert</div>";
    } else{
    	echo "<div>ERROR: Could not execute " . $sql . " " . mysqli_error($link)."</div>";
    }
