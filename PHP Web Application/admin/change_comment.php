<?php 
    include 'config.php';
    session_start();

    if(isset($_POST["name"]))
    {
        $search = $_POST['name'];

        $sql = "
            SELECT * FROM commentview 
            WHERE CustomerName LIKE '%".$search."%'
            OR ManufacturerName LIKE '%".$search."%' 
            OR ManufacturerCity LIKE '%".$search."%' 
            OR comment LIKE '%".$search."%' 
            OR commentStar LIKE '%".$search."%' 
        ";
    }
        
    else{
        $sql = "SELECT * FROM commentview ORDER BY commentDate";
    }

    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0){
        $output = '';

        while ($row = mysqli_fetch_assoc($result)){
            $output .= '
                <tr>
                    <td>'.$row['ID'].'</td>
                    <td>'.$row['CustomerName'].'</td>
                    <td>'.$row['ManufacturerID'].'</td>
                    <td>'.$row['ManufacturerName'].'</td>
                    <td>'.$row['ManufacturerCity'].'</td>
                    <td>'.$row['comment'].'</td>
                    <td>'.$row['commentDate'].'</td>
                    <td>'.$row['commentStar'].'</td>
                    <td>
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true"><a style="color: black;" href="deleteComment.php?deletedID='.$row['ID'].'">x</a></span>
                        </button>
                    </td>
                </tr>
            ';
        }

        echo $output;
    }

    else{
        echo 'Data Not Found';
    }

?>