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

        if (empty($_POST["zip"])) {
            $zip = "xxxxxx";
        } else {
            $zip = test_input($_POST["zip"]);
        }

        if (empty($_POST["phoneNumber"])) {
            $phoneNumber = "1111";
        } else {
            $phoneNumber = test_input($_POST["phoneNumber"]);
        }

        if (empty($_POST["email"])) {
            $email = "missinginput";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email = "Invalid email format";
            }
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
