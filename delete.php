<?php
	$agentID=$_GET['agentID'];
	include('config.php');
	$sqlquery = "DELETE FROM agent WHERE agentID='{$agentID}'";
	mysqli_query($db,$sqlquery);
	header('location:agentlist_test.php');
?>