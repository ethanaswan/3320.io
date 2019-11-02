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

$sql="INSERT INTO CS3320.UserInformation (name, address1, address2, city, state, zip)

VALUES
("$_POST[fullname]", "$_POST[address1]", "$_POST[address2]", "$_POST[city]", "$_POST[state]", "$_POST[zip]")"

echo $sql;

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
