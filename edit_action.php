<?php
/*require 'session.php';
require 'db.php';
$id = $_GET['id'];
$sql = "SELECT * FROM analyzer WHERE id='".$id."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);



if (isset ($_POST['txtName'])  && isset($_POST['txtDescription']) ) {
  $analyzerName = $_POST['txtName'];
  $analyzerDescription = $_POST['txtDescription'];

  $sql = "UPDATE analyzer SET name = '".$analyzerName."', description = '".$analyzerDescription."' WHERE id = '".$id."'";
  echo $sql;
  echo 'ID is : ';
  echo $id;
  die;
 if (mysqli_query($conn, $sql)) {
 	header('Location: form_builder.php?editMsg=success');
  } 
  else {
  	header('Location: form_builder.php?editMsg=failure');
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}*/
 ?>