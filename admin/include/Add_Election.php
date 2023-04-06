

<?php
if(isset($_GET['added']))
{
?>

<div class="alert alert-success my-3" role="alert">
  ******Election has been added Successfully.******
</div>


<?php
}else if(isset($_GET['delete_id']))
{
    $Delete_id = $_GET['delete_id'];
    mysqli_query($con, "DELETE FROM elections WHERE id = '". $Delete_id."'")
    or die(mysqli_error($con));
    ?>
<div class="alert alert-danger my-3" role="alert">
  ******Election has been Deleted Successfully.******
</div>
    <?php
}
?>



<?php
if(isset($_GET['Updated']))
{
?>

<div class="alert alert-success my-3" role="alert">
  ******Election has been UPDATED Successfully.******
</div>


<?php
}
?>



<div class="row my-3">
    <div class="col-4">
        <h3>Add New Election</h3>
        <form method="POST">
            <div class="form-group">
                <input type="text" name="Election_Topic" placeholder="Enter Election Topic" class="form-control" required />
            </div><br />

            <div class="form-group">
                <input type="number" name="Number_of_candidates" placeholder="Enter Number Of Candidates" class="form-control" required />
            </div> <br />

            <div class="form-group">
                <input type="text" onfocus="this.type='Date'" name="Start_Date" placeholder="Enter Starting Date" class="form-control" required />
            </div><br />

            <div class="form-group">
                <input type="text" onfocus="this.type='Date'" name="End_Date" placeholder="Enter Ending Date" class="form-control" required />
            </div><br />
            <input type="submit" value="Add Election" name="AddElection_Btn" class="btn btn-success" />
        </form>
    </div>
    
    <div class="col-8">
        <h3>Upcoming Elections</h3>
        <table class="table">
            <thead>
            <tr>
             <th scope="col">S.No</th>
             <th scope="col">Election Name</th>
             <th scope="col">No of Candidates</th>
             <th scope="col">Starting Date</th>
             <th scope="col">Ending Date</th>
             <th scope="col">Status</th>
             <th scope="col">Action</th>



            </tr>
            </thead>
                <tbody>
                    <?php
                        $FetchData = mysqli_Query($con, "SELECT * FROM elections") or die(mysqli_error($con));
                        $IsAnyElectionAdded = mysqli_num_rows($FetchData);

                        if($IsAnyElectionAdded > 0)
                        {
                            $sno = 1;
                                while($row = mysqli_fetch_assoc($FetchData))
                                {
                                    $election_id = $row['id'];
                                    ?><tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $row['Election_Topic']; ?></td>
                                        <td><?php echo $row['No_of_Candidates']; ?></td>
                                        <td><?php echo $row['Starting_Date']; ?></td>
                                        <td><?php echo $row['Ending_Date']; ?></td>
                                        <td><?php echo $row['Status']; ?></td>
                                        <td>
                                           <a href="update.php?updateid=<?= $row['id'] ?>" class="btn btn-sm btn-warning"> Edit </a>
                                            <button class="btn btn-sm btn-danger" onclick="DeleteData(<?php echo 
                                            $election_id;?>)"> Delete </button>

                                        </td>




                                        

                                        
                                    
                                    </tr>
                                    <?php
                                 }
                        }else{
                            ?>
                            <tr>
                                <td colspan="7"> No any election is added yet. </td>
                        </tr>
                            <?php
                        }
                        
                    ?>
   
                </tbody>
        </table>
    </div>
</div>
<script>
    const DeleteData = (e_id) =>

    {
        let c = confirm("Do You Really want to Delete it?");

        if(c == true)
        {
            //alert("Data Deleted Successfully!!!");
            location.assign("index.php?AddElectionPage=1&delete_id=" + e_id );
           

        }
        //alert(e_id);
    }
</script>




<?php
if(isset($_POST['AddElection_Btn']))
{
    $Election_Topic = mysqli_real_escape_string($con, $_POST['Election_Topic']);
    $Number_of_candidates = mysqli_real_escape_string($con, $_POST['Number_of_candidates']);
    $Start_Date = mysqli_real_escape_string($con, $_POST['Start_Date']);
    $End_Date  = mysqli_real_escape_string($con, $_POST['End_Date']);
    $Inserted_By = $_SESSION['username'];
    $Inserted_on = date("y-m-d");

    
$date1=date_create($Inserted_on);
$date2=date_create($Start_Date);
$diff=date_diff($date1,$date2);


if((int)$diff->format("%R%a") > 0)
{
    $Status = "InActive";
}else{
    $Status = "Active";
}


// Inserting into Database.
mysqli_query($con, "INSERT INTO elections(Election_Topic,
 No_of_Candidates, Starting_Date, Ending_Date,Status, Inserted_By, Inserted_on) VALUES('". $Election_Topic."', '". $Number_of_candidates."',
  '". $Start_Date."','". $End_Date."', '". $Status."','". $Inserted_By."','".  $Inserted_on."')") or
  die(mysqli_error($con));
  ?>
<script> location.assign("index.php?AddElectionPage=1&added=1");</script>
  <?php
        
}
?>