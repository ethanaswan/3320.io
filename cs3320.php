<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "cs3320";
$errors = [];


// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


foreach($errors as $msg) {
   echo "$msg <br>";
}


mysqli_close($conn);
?>
