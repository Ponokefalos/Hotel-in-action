<?php
$servername = "83.212.96.13";
$username = "toor";
$password = "toor";
$database = "site";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
    echo "Connected successfully";
}
//echo "Connected successfully";
?>