<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "cs3320";
$errors = [];


// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// sql to create table
$table1 = "CREATE TABLE UserCredentials (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  pass VARCHAR(50) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$table2 = "CREATE TABLE UserInformation (
  userId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(30),
  address1 VARCHAR (50),
  address2 VARCHAR(50),
  city VARCHAR(50),
  state VARCHAR(2),
  zip INT(7)
)";

$table3 = "CREATE TABLE ShippingInformation (
  userId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  address1 VARCHAR (50),
  address2 VARCHAR(50),
  city VARCHAR(50),
  state VARCHAR(2),
  zip INT(7)
)";

$table4 = "CREATE TABLE PaymentInformation (
  userId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  cardType VARCHAR (8),
  cardNumber VARCHAR(20) NOT NULL,
  expDate VARCHAR(10) NOT NULL
)";

$table5 = "CREATE TABLE Products (
  productId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  description VARCHAR (50),
  unitPrice VARCHAR(50)
)";

$table6 = "CREATE TABLE Orders (
  userId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  orderNumber INT(6),
  productId INT(6,
  quantity INT(20),
  totalPrice INT(20),
  zip INT(7)
)";


$tables = [$table1, $table2, $table3, $table4, $table5, $table6];


foreach($tables as $k => $sql){
    $query = @$conn->query($sql);
    if(!$query)
       $errors[] = "Table $k : Creation failed ($conn->error)";
    else
       $errors[] = "Table $k : Creation done";
}

foreach($errors as $msg) {
   echo "$msg <br>";
}


mysqli_close($conn);
?>
