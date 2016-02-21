<?php
include 'database.php';

if (isset($_POST['submit'])) {
    $user = strip_tags($_POST['user']);
    $message = strip_tags($_POST['message']);
    
    //Set timezone
    date_default_timezone_set('America/Chicago');
    $time = date('h:i:s A', time());
    
    //Validate input
    if (!isset($user) || $user == "" || !isset($message) || $message == "") {
        $error = "Please fill in your name & a message";
        header("Location: index.php?error=" . urlencode($error)); //Redirects to index.php
    }
    else {
        $success = "Message sent!";
        $query = "INSERT INTO shoutit (user, message, time)
                  VALUES ('$user', '$message', '$time')";
        if (!mysqli_query($db, $query)) {
            die('Error: ' . mysqli_error($db));
        }
        else {
            header("Location: index.php?success=" . urlencode($success));
            exit();
        }
    }
}