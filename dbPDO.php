<?php
	$dsn = 'mysql:host=localhost;dbname=energysystemmanage';
	$username = 'root';
	$password = '';
	$options = [];
	try {
	$connection = new PDO($dsn, $username, $password, $options);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>