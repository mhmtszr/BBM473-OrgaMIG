<?php
    include 'config.php';
    session_start();

    if(!isset($_SESSION['ID'])){
        header('Location:login.php');
    }
    
    $code = (string)$_POST["code"];
    $customerID = $_SESSION['ID'];
    $sql = "SELECT * FROM DiscountCodes WHERE Code = '$code'";
    $query = mysqli_query($db, $sql);
    $result = mysqli_fetch_assoc($query);
    $date = date("Y-m-d H:i:s");
    $total = (float)$_POST["total"];
    
    if ($result){

        if ($result['numberOfUsage'] == 0){
            $message = "The number of coupon code has been expired.";
            $boolean = "Number Expired";

            echo json_encode(array('message'=>$message, 'boolean'=>$boolean));
        } 

        else if ($date > $result['expireTime']){
            $message = "The last day of coupon code has been expired.";
            $boolean = "Day Expired";

            echo json_encode(array('message'=>$message, 'boolean'=>$boolean));
        }

        else{
            $sql = "SELECT COUNT(*) as 'count' FROM CustomerUsesDiscount WHERE DiscountCode = '$code' AND CustomerID = '$customerID'";
            $query2 = mysqli_query($db, $sql);
            $result2 = mysqli_fetch_assoc($query2);

            if ($result2['count'] == 1){
                $message = "Code has been used before.";
                $boolean = "Used Before";

                echo json_encode(array('message'=>$message, 'boolean'=>$boolean));
            }

            else{
                $sql = "call insert_customer_uses_discount('$customerID', '$code', '$date')";
                $query2 = mysqli_query($db, $sql);
                $total = ($total * 0.9);
                $boolean = "Used";

                $sql = "call update_discount_codes('$code', '$result[numberOfUsage] - 1', '')";
                mysqli_query($db, $sql);

                echo json_encode( array('total'=>$total, 'boolean'=>$boolean) );
            } 
        }
    }

    else{
        $message = "Invalid code";
        $boolean = "No Code";

        echo json_encode(array('message'=>$message, 'boolean'=>$boolean));
    }

?>