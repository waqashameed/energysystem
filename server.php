<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'energysystemmanage');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$analyzerid = $_POST['analyzer'];

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$currentDate = date("Y/m/d");
			$query = "INSERT INTO users (username, email, password,creationdate,analyzerid) 
					  VALUES('".$username."', '".$email."', '".$password."', '".$currentDate."',".$analyzerid." )";
			mysqli_query($db, $query);

			
		
			header('location: users_list.php');
				$_SESSION['success'] = "User created successfully ";
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$userEmail = mysqli_real_escape_string($db, $_POST['txtEmail']);
		$password = mysqli_real_escape_string($db, $_POST['txtPassword']);

		if (empty($userEmail)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		$_SESSION['isadmin'] = 0;
		$_SESSION['analyzerid'] = 0;
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE email='".$userEmail."' AND password='".$password."'";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) == 1) {
				$rows=mysqli_fetch_assoc($results);
				$status = $rows['isdisabled'];
				if ($status != 0) {
					header('location: login.php?errormsg=disabled');
					//Don't remove 2 line below, functionalty fails otherwise.
					echo "here";
					die;
				}
				$_SESSION['username'] = $userEmail;
				$_SESSION['isadmin'] = $rows['isadmin'];
				$_SESSION['analyzerid'] = $rows['analyzerid'];
				header('location: index.php');
						//$_SESSION['success'] = "You are now logged in almost";
			}else {
				array_push($errors, "Wrong email/password combination");
			}
		}
	}

?>