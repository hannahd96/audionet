<?php
$servername = "daneel";
//Change the below to your username and password
//by default both are your student ID (with a captial N)
$username = "N00151501";
$password = "N00151501";
$dbname = "N00151501playground";

// Create connection to the DB
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection was created successfully
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST["submitComment"])){
	$name = $_POST["name"];
	$comment = $_POST["comment"];	
	
	// just echo to check if it works
	echo $name;
	echo $comment;
	// makes the string that acces the database
	$sql = "INSERT INTO comments (name, comment) VALUES ('".$name."','".$comment."');";
	$result = $conn->query($sql);
	
}
header('Location: Conclusion.php');
$conn->close();

		
?>