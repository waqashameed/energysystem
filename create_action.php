<?php
require 'db.php';

if (isset($_POST['txtName'])  && isset($_POST['txtDescription']) ) {
$name = $_POST['txtName'];
$description = $_POST['txtDescription'];
$unit = $_POST['txtUnit'];
$sql = "INSERT INTO analyzer(name, description, analyzerunit) VALUES('".$name."', '".$description."', '".$unit."')";
echo $sql;
  if (mysqli_query($conn, $sql)) {
  	header('Location: analyzers_list.php?createMsg=success');
  }
   else {
  	header('Location: analyzers_list.php?createMsg=failure');

    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

 ?>