<?php
    include 'config.php';
    session_start();

    $city = $_POST["city"]; 

    if ($city == "All"){
        $sql = "SELECT * FROM averagestar";
        $result = mysqli_query($db, $sql); 
        
        $output = '';

        while($row = mysqli_fetch_assoc($result)) { 
            $output .= '
                <tr>
                    <td><a href="comments.php?manufacturer=id'.$row['ID'].'" style="color: inherit; ">'.$row['Manufacturer Name'].'</a></td>
                    <td><a href="comments.php?manufacturer=id'.$row['ID'].'" style="color: inherit; ">'.$row['Manufacturer City'].'</a></td>
                    <td><a href="comments.php?manufacturer=id'.$row['ID'].'" style="color: inherit; ">'.$row['Average Star'].'</a></td>
                </tr>
            ';
        }

        echo $output;
    }

    else{
        $sql = "SELECT * FROM averagestar WHERE `Manufacturer City` = '$city';";
        $query = mysqli_query($db, $sql);
    
        $output = '';
    
        while ($row = mysqli_fetch_assoc($query)) { 
            $output .= '
                <tr>
                    <td><a href="comments.php?manufacturerid='.$row['ID'].'" style="color: inherit; ">'.$row['Manufacturer Name'].'</a></td>
                    <td><a href="comments.php?manufacturerid='.$row['ID'].'" style="color: inherit; ">'.$row['Manufacturer City'].'</a></td>
                    <td><a href="comments.php?manufacturerid='.$row['ID'].'" style="color: inherit; ">'.$row['Average Star'].'</a></td>
                </tr>
                ';
        }
    
        echo $output;
    }  
?>
