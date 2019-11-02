<html>

<body>

<?php

$servername = "localhost";
$username = "tester";
$password = "testerpass";
$dbname = "cs3320";
$errors = [];

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

</body>

</html>