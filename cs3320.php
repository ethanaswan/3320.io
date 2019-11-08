<?php
$servername = "localhost";
$username = "tester";
$password = "testerpass";
$dbname = "cs3320";
$errors = [];


// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


mysqli_close($conn);
?>
