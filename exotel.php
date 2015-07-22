<?php
//content type must be set to text/plain
header('Content-Type: text/plain');

//exotel sends a HEAD request to verify the headers
if ($_SERVER['REQUEST_METHOD'] == 'HEAD') {
	exit();
}

//DB details
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

//Fetching the GET params
$SmsSid = $_GET["SmsSid"];
$From = $_GET["From"];
$To = $_GET["To"];
$Date = $_GET["Date"];
$Body = $_GET["Body"];

$insert_sql = sprintf("insert into tablename values ('%s', '%s', '%s', %s, '%s')", $SmsSid, $From, $To, $Date, $Body);

if ($conn->query($insert_sql) === TRUE) {
    echo "Your message was processed successfully";
} else {
    echo "Some error occured while processing your request"; 
}

$conn->close();

?>