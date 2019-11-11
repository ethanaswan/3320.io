<html>

<body>

<?php

    // Success popup
    // Send to Shopping Cart

    $servername = "localhost";
    $username = "tester";
    $password = "testerpass";
    $dbname = "cs3320";
    $orderNumber = rand(1,1000000);
    $errors = [];
    $productId = $quantity = $totalPrice = "";

    // Validate input and arrange SQL INSERT

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["item"])) {
            $productId = "missinginput";
        } else {
            $productId = test_input($_POST["item"]);
        }

        if (empty($_POST["quantity"])) {
            $quantity = "missinginput";
        } else {
            $quantity = test_input($_POST["quantity"]);
        }

        if (empty($_POST["total_price"])) {
            $totalPrice = "missinginput";
        } else {
            $totalPrice = test_input($_POST["total_price"]);
        }


    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Load database connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";
    foreach($errors as $msg) {
        echo "$msg <br>";
    }

    // Retrieve userId
    $userId = mysqli_insert_id($conn);

    // populate SQL INSERT
    $sql="INSERT INTO Orders (userId, orderNumber, productId, quantity, totalPrice)

    VALUES
    ('$userId', '$orderNumber', '$productId', '$quantity', '$totalPrice')";

    echo $sql;


    // execute insert
    if (!mysqli_query($conn,$sql))
    {
        die('Error: ' . mysqli_error($conn));
    }
    else {
        echo "<br>1 record added";
    }

mysqli_close($conn);

?>

</body>

</html>
