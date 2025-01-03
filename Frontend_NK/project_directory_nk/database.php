<?php
// database.php
$host = 'localhost';  // Your database host
$username = 'root';   // Your database username
$password = 'root';       // Your database password
$dbname = 'healthcareDB';  // Your database name

// Create a connection
$cons = mysqli_connect($host, $username, $password, $dbname);

// Check the connection
if (!$cons) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
