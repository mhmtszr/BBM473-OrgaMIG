<?php 
    include 'config.php';
    session_start();

    if(isset($_POST["name"]))
    {
        $search = $_POST['name'];

        $sql = "
            SELECT * FROM manufacturer 
            WHERE name LIKE '%".$search."%'
            OR city LIKE '%".$search."%' 
        ";
    }
        
    else{
        $sql = "SELECT * FROM manufacturer ORDER BY ID";
    }

    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0){
        $output = '';

        while ($row = mysqli_fetch_assoc($result)){
            $output .= '
                <tr>
                    <td>'.$row['ID'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['city'].'</td>
                    <td>'.$row['isDeleted'].'</td>
                    <td><div  data-toggle="modal" data-target="#manuf'.$row['ID'].'" class="btn btn-info ml-auto mr-auto trans_200"><a>UPDATE</a></div></td>
                    <td>
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true"><a style="color: black;" href="deleteManufacturer.php?deletedID='.$row['ID'].'">x</a></span>
                        </button>
			        </td>
					<div class="modal fade" id="manuf'.$row['ID'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog  modal-lg" role="document">
                        <form class="" action="updateManufacturer.php" method="POST">
						    <div class="modal-content bd-example-modal-lg">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">'.$row['name'].'</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
								<div class="modal-body">
									<div class="form-group row">
										<label for="manufID" class="col-md-4">ID:</label>
										<div class="col-md-8">
											<input type="text" class="form-control" id="manufID" name="manufID" value="'.$row['ID'].'" readonly>
										</div>
									</div>
									<div class="form-group row">
										<label for="manufName" class="col-md-4">Manufacturer Name:</label>
										<div class="col-md-8">
											<input type="text" class="form-control" id="manufName" name="manufName" value="'.$row['name'].'">
										</div>
									</div>
									<div class="form-group row">
										<label for="city" class="col-md-4">City:</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="city" name="city" value="'.$row['city'].'">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="updateManufacturer" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
				</div>
			</tr>
            ';
        }

        echo $output;
    }

    else{
        echo 'Data Not Found';
    }

?>