
<?php
	include('config.php');
	$agentID=$_GET['agentID'];
	$agentName=$_POST['agentName'];
	$agentEmail=$_POST['agentEmail'];
    $agentAge=$_POST['agentAge'];
	$agentPhone=$_POST['agentPhone'];
	$agentGender=$_POST['agentGender'];
	$agentDOB=$_POST['agentDOB'];
	$agentLocation=$_POST['agentLocation'];
 
	mysqli_query($db,"UPDATE agent SET agentName='$agentName', agentEmail='$agentEmail', agentAge='$agentAge', agentPhone='$agentPhone', agentGender='$agentGender', agentDOB='$agentDOB', agentLocation='$agentLocation' WHERE agentID='{$agentID}'");
    header('location:agentlist_test.php');
?>