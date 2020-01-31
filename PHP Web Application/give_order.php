<?php
    include 'config.php';
    session_start();

    if(!isset($_SESSION['ID'])){
        header('Location:login.php');
    }

    $customerID = $_SESSION['ID'];
    $total = $_POST['total'];
    $total = (float)ltrim($total, '₺');
    $address = $_POST['address'];
    $paymentType = $_POST['paymentType'];
    $date = date("Y-m-d H:i:s");

    $sql = "SELECT increment_insert_orders FROM sequences WHERE ID=1";
    $query = mysqli_query($db, $sql);
    $result = mysqli_fetch_assoc($query);
    $orderID = $result['increment_insert_orders'];

    $db->begin_transaction();
    $db->autocommit(FALSE);
    $result1 = $db->query("call insert_orders('$customerID', '$date', '$address', '$paymentType', '$total')");
    $result2 = $db->query("UPDATE ShoppingCart SET OrderID = '$orderID' WHERE CustomerID = '$customerID' AND OrderID = 0");

    if ($result1 && $result2){
        $db->commit();
        $msg = "Your order has been successfully completed.";
        echo $msg;
    }
    else{
        $db->rollback();
        $msg = "Unexpected error!";
        echo $msg;
    }

?>
