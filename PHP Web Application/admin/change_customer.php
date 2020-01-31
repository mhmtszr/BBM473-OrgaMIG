<?php 
    include 'config.php';
    session_start();

    if(isset($_POST["name"]))
    {
        $search = $_POST['name'];

        $sql = "
            SELECT * FROM customer 
            WHERE firstName LIKE '%".$search."%'
            OR lastName LIKE '%".$search."%' 
            OR mailAddress LIKE '%".$search."%' 
            OR phoneNumber LIKE '%".$search."%' 
            OR address LIKE '%".$search."%'
        ";
    }
        
    else{
        $sql = "SELECT * FROM customer ORDER BY ID";
    }

    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0){
        $output = '';

        while ($row = mysqli_fetch_assoc($result)){
            $output .= '
                <tr>
                    <td>'.$row['ID'].'</td>
                    <td>'.$row['firstName'].'</td>
                    <td>'.$row['lastName'].'</td>
                    <td>'.$row['mailAddress'].'</td>
                    <td>'.$row['phoneNumber'].'</td>
                    <td>'.$row['address'].'</td>
                    <td>'.$row['isDeleted'].'</td>
                    <td>
                        <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true"><a style="color: black;" href="deleteCustomer.php?deletedID='.$row['ID'].'">x</a></span>
                        </button>
                    </td>
            ';
        }

        echo $output;
    }

    else{
        echo 'Data Not Found';
    }

?>