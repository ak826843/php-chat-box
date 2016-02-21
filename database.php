<?php

//Connect to mySQL
$servername = getenv('IP');
$username = getenv('C9_USER');
$password = "";
$database = "shoutit";
$dbport = 3306;

$db = new mysqli($servername, $username, $password, $database, $dbport);

//Test connection
if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
} 

?>