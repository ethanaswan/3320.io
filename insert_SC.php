<html>

<body>

<?php

    // Success popup
    // Send to Shopping Cart

    $servername = "localhost";
    $username = "tester";
    $password = "testerpass";
    $dbname = "cs3320";
    $errors = [];
    $item = $quantity = $unit_price = $total_price = "";

    // Validate input and arrange SQL INSERT

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $userId = "124144";

        if (empty($_POST["item"])) {
            $item = "missinginput";
        } else {
            $item = test_input($_POST["item"]);
        }

        if (empty($_POST["quantity"])) {
            $quantity = "missinginput";
        } else {
            $quantity = test_input($_POST["quantity"]);
        }

        if (empty($_POST["unit_price"])) {
            $unit_price = "missinginput";
        } else {
            $unit_price = test_input($_POST["unit_price"]);
        }

        if (empty($_POST["total_price"])) {
            $total_price = "missinginput";
        } else {
            $total_price = test_input($_POST["total_price"]);
        }


    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $sql="INSERT INTO cs3320.UserInformation (item, quantity, unit_price, total_price)

    VALUES
    ('$item', '$quantity', '$unit_price', '$total_price')";

    echo $sql;


    // Load database connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "Connected successfully";
    foreach($errors as $msg) {
        echo "$msg <br>";
    }

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
