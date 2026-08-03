<?php
//Track navigation throughout the session to make sure cart items are not lost
session_start();

//Database information to connect to
$host = "localhost";
$user = "moham146_finalProject";
$password = "finalProject104778164";
$dbname = "moham146_finalProject";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>