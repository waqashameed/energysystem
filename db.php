<?php
/*

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
*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "energysystemmanage";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "energysystemmanage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

*/

?>