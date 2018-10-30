<?php
require 'session.php';
require 'db.php';
$id = $_GET['id'];
//$sql = "DELETE FROM analyzer WHERE id='".$id."'";
$sql="UPDATE users SET isdisabled=1, analyzerid=0 WHERE id=".$id;
if (mysqli_query($conn, $sql)) {
	header('Location: users_list.php?deleteMsg=success');
	//echo "Record deleted successfully";
	//header("Location: form_builder.php");
    
} else {
	header('Location: users_list.php?deleteMsg=failure');
	//echo "Error deleting record: " . mysqli_error($conn);
	//header("Location: form_builder.php");
    
}