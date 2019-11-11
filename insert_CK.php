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
    $userId = $cardType = $cardNumber = $expDate "";

    // Validate input and arrange SQL INSERT

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["card_type"])) {
            $cardType = "xxxxxx";
        } else {
            $card_type = test_input($_POST["card_type"]);
        }

        if (empty($_POST["card_num"])) {
            $cardNumber = "1111";
        } else {
            $cardNumber = test_input($_POST["card_num"]);
        }

        if (empty($_POST["card_exp"])) {
            $cardExp= "1111";
        } else {
            $cardExp = test_input($_POST["card_exp"]);
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

    $sql="INSERT INTO PaymentInformation (userId, cardType, cardNumber, expDate)

    VALUES
    ('$userId', '$cardType', '$cardNumber', '$expDate')";

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
