<?php
// Retrieve the email and password values from the form data
$email = $_POST['email'];
$password = $_POST['password'];

// Connect to your database (replace placeholders with actual values)
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'SecondStax';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}


// Insert the email and password into the database
$sql = "INSERT INTO Authentic (email, pswd) VALUES ('{$email}', '{$password}')";

if ($conn->query($sql) === true) {
  echo 'Data inserted successfully.';
} else {
  echo 'Error: ' . $conn->error;
}

$conn->close();
?>
