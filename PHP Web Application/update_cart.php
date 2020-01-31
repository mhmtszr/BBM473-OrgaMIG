<?php

    include 'config.php';
    session_start();
    if(!isset($_SESSION['ID'])){
        header('Location:login.php');
    }

    $customerID = $_SESSION['ID'];

    $productID = (int)$_POST["productID"];
    $amount = (int)$_POST["amountOfProduct"];
    $stock = (int)$_POST["stock"];

    $db->begin_transaction();
    $db->autocommit(FALSE);
    $result1 = $db->query("UPDATE ShoppingCart SET amountOfProduct = '$amount' WHERE CustomerID = '$customerID' AND ProductID = '$productID' AND OrderID = 0;");
    $result2 = $db->query("UPDATE Product SET stock = '$stock' WHERE ID = '$productID'");


    if ($result1 && $result2){
        $db->commit();
        $msg = "Cart updated.";
        echo $msg;
    }
    else{
        $db->rollback();
        $msg = "Unexpected error!";
        echo $msg;
    }
?>
