<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php

$servername = "localhost";
$username = "tester";
$password = "testerpass";
$dbname = "cs3320";
$errors = [];

    $userId = $address1 = $address2 = $city = $state = $zipcode = "";
    
    // Validate input and arrange SQL INSERT
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $userId = "124144";
        if (empty($_POST["address1"])) {
            $address1 = "missinginput";
        } else {
            $address1 = test_input($_POST["address1"]);
        }
        
        if (empty($_POST["address2"])) {
            $address2 = "missinginput";
        } else {
            $address2 = test_input($_POST["address2"]);
        }
        
        if (empty($_POST["city"])) {
            $city = "missinginput";
        } else {
            $city = test_input($_POST["city"]);
        }
        
        if (empty($_POST["state"])) {
            $state = "xx";
        } else {
            $state = test_input($_POST["state"]);
        }
        
        if (empty($_POST["zipcode"])) {
            $zipcode = "xxxxxx";
        } else {
            $zipcode = test_input($_POST["zipcode"]);
        }
        
        
    }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $sql="INSERT INTO cs3320.ShippingInformation(userId, address1, address2, city, state, zip)
    
        VALUES
        ('$userId', '$address1', '$address2', '$city', '$state', '$zip')";
   
    echo $sql;

//load the database connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
foreach($errors as $msg) {
   echo "$msg <br>";
}

    if (!mysqli_query($conn,$sql))
    {
        die('Error: ' . mysqli_error($conn));
    }
    else {
        echo "<br>1 record added";
        
    }
mysqli_close($conn);

?>
<div class="alert alert-success">
<strong>Success!</strong> You should <a href="http://192.168.64.2/projects/3320/Checkout.html" class="alert-link">click to redirect to Checkout</a>.
</div>
</body>

</html>
