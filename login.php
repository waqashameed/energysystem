<?php
 include('server.php');
if(isset($_REQUEST['errormsg']) && $_REQUEST['errormsg'] == 'disabled'){
	?><script type="text/javascript">
		alert("Your account is disabled, please contact Administrator.")
	</script>
	<?php
}
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>ESMS | Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Email</label>
			<input type="email" name="txtEmail" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="txtPassword">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<!-- <p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p> -->
	</form>


</body>
</html>