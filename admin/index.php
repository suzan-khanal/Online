<?php
require_once("include/header.php");
require_once("include/navig.php");

if(isset($_GET['Homepage']))
{
    //echo"Welcome to HomePage!!!";
    require_once("include/Homepage.php");
}else if(isset($_GET['AddElectionPage']))
{
    //echo"Welcome to Election Page!!!";
    require_once("include/Add_Election.php");
}else if(isset($_GET['AddCandidatesPage']))
{
    require_once("include/Add_Candidates.php");
}

?>




<?php
require_once("include/footer.php");
?>

