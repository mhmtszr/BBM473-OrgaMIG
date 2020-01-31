<?php
    include 'config.php';
    if (isset($_POST["signupButton"])) {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $mail = $_POST["mailAddress"];
        $address = $_POST["address"];
        $phoneNumber = $_POST["phoneNumber"];
        $pass = $_POST["password"];

        $passsha256 = hash('sha256', $pass);

        $sql = "SELECT * FROM customer WHERE mailAddress='$mail';";
        $query = mysqli_query($db, $sql);
        $result = mysqli_fetch_row($query);

        if ($result) {
            echo "<script>
            alert('Mail address is in use.');
            location=\"signup.php\";
            </script>";
        }

        $sql = "SELECT * FROM customer WHERE phoneNumber='$phoneNumber';";
        $query = mysqli_query($db, $sql);
        $result = mysqli_fetch_row($query);

        if ($result) {
            echo "<script>
            alert('Phone number is in use.');
            location=\"signup.php\";
            </script>";
        }

        else{
            $sql = "call insert_customer('$firstName', '$lastName', '$mail', '$passsha256', '$phoneNumber', '$address')";
            mysqli_query($db, $sql);
            header('Location:login.php');
        }
    }
?>