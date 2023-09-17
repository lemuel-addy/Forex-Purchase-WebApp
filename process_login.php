<?php
// Retrieve the email and password values from the form data
$email = $_POST['email'];
$password = $_POST['password'];

// Perform necessary validations on the data
// ...

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

// Prepare the SQL query to check if the email and password match
$sql = "SELECT * FROM Authentic WHERE email = '$email' AND pswd = '$password'";

// Execute the query
$result = $conn->query($sql);

// Check if a matching record was found
if ($result->num_rows > 0) {
  // Authentication successful
  $response = array('authenticated' => true);
} else {
  // Authentication failed
  $response = array('authenticated' => false);
}

// Send the response back to the JavaScript code
header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
