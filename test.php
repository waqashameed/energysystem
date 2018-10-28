<?php
	if (isset($_POST["txt1"])) {
		$name = $_POST["txt1"];
		$other = $_POST["txt2"];
	}
  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p><?=$name;?></p>
	<form method="post" action="test.php">
		<input type="text" name="txt1">
		<br><input type="text" name="txt2">
		<br><input type="submit" name="submit" value="submit">
	</form>
</body>
</html>