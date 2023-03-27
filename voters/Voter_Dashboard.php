<?php
require_once("include/header.php");
require_once("include/navigation.php");

?>
<div class="row my-3">
<div class="col-12">
    <h3>Voters Panel</h3>

    <?php
    $FetchingActiveElections = mysqli_query($con, "SELECT * FROM elections WHERE Status = 'Active'") or
     die(mysqli_error($con));
     $TotalActiveElections = mysqli_num_rows($FetchingActiveElections);

     if($TotalActiveElections > 0)
     {
        while($data = mysqli_fetch_assoc($FetchingActiveElections))
        {
            $Election_id = $data['id'];
            $Election_Topic = $data['Election_Topic'];
            ?>

<table class="table ">
    <thead>
        <tr class="bg_green ">
            <th colspan="4" class="text-white"><h4> ELECTION TOPIC: <?php echo strtoupper($Election_Topic);  ?> <h4></th>
        </tr>
        <tr>
            <th> Candidate Photo</th>
            <th> Candidate Details</th>
            <th> Votes</th>
            <th> Action</th>

        </tr>
    </thead>
    <tbody>
        <?php
            $FetchingCandidates = mysqli_query($con, "SELECT * FROM candidate_details WHERE election_id = '". $Election_id."'") or die(mysqli_error($con));
        
        //print_r($FetchingCandidates);
        while($candidateData = mysqli_fetch_assoc($FetchingCandidates))
        {
            $candidate_id = $candidateData['id'];
            $candidate_Photo = $candidateData['Candidate_Photo'];

            // Fetching Candidate Votes.
            $FetchingVotes = mysqli_query($con, "SELECT * FROM votings WHERE candidate_id = '". $candidate_id ."'") or die(mysqli_error($con));
            $TotalVotes = mysqli_num_rows($FetchingVotes);
            ?>
                <tr>
                    <td><img src="<?php echo $candidate_Photo ?> " class="Candidate_photo"></td>
                    <td><?php echo "<b>".$candidateData['Candidate_Name'] ."</b><br />" .$candidateData['Candidate_Details'];  ?></td>
                    <td><?php echo $TotalVotes; ?> </td>
                    <td><button class="btn btn-md btn-success">Vote</button></td>

                </tr>
            <?php
        }
        ?>
     </tbody>

    </table>

            <?php
        }
        
        

     }else{
        echo "No any Active Elections Available";
     }
    ?>

    
</div>

</div>


<?php
require_once("include/footer.php");
?>