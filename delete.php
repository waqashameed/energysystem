<?php
	require_once 'db.php';
	$sql= "DELETE FROM `analyzer` WHERE id=37";

	if (mysqli_query($conn, $sql)) {
   		
   		header('Location: analyzers_list.php?deleteMsg=success');
	} 
	else {
    	header('Location: analyzers_list.php?deleteMsg=failure');
	}
?>