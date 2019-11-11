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
    $total = $tax = $shipping_fees = $final_total = $card_type = $card_num = $card_exp = "";

    // Validate input and arrange SQL INSERT

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["total"])) {
            $total = "missinginput";
        } else {
            $total = test_input($_POST["total"]);
        }

        if (empty($_POST["tax"])) {
            $tax = "missinginput";
        } else {
            $tax = test_input($_POST["tax"]);
        }

        if (empty($_POST["shipping_fees"])) {
            $shipping_fees = "missinginput";
        } else {
            $shipping_fees = test_input($_POST["shipping_fees"]);
        }

        if (empty($_POST["final_total"])) {
            $final_total = "xx";
        } else {
            $final_total = test_input($_POST["fina_total"]);
        }

        if (empty($_POST["card_type"])) {
            $card_type = "xxxxxx";
        } else {
            $card_type = test_input($_POST["card_type"]);
        }

        if (empty($_POST["card_num"])) {
            $card_num = "1111";
        } else {
            $card_num = test_input($_POST["card_num"]);
        }

        if (empty($_POST["card_exp"])) {
            $card_exp = "1111";
        } else {
            $card_exp = test_input($_POST["card_exp"]);
        }

    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $sql="INSERT INTO cs3320.UserInformation (userId, fullname, address1, address2, city, state, zip, phoneNumber, email)

    VALUES
    ('$userId', '$fullname', '$address1', '$address2', '$city', '$state', '$zip', '$phoneNumber', '$email')";

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
