<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cvsuadmissionsystem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collecting form data
$firstName = $_POST['firstName'];
$middlename = $_POST['middlename'];
$lastName = $_POST['lastName'];
$suffix = $_POST['suffix'];
$email = $_POST['email'];
$password = $_POST['password'];

// Inserting data into personalinformation table
$sql = "INSERT INTO personalinformation (firstname, middlename, lastname, suffix) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $firstName, $middlename, $lastName, $suffix, $email);
$stmt->execute();

// Getting the last inserted student_id
$student_id = $stmt->insert_id;

// Inserting data into accountinformation table
$sql = "INSERT INTO accountinformation (student_id, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $student_id, $email, $password);
$stmt->execute();

$stmt->close();
$conn->close();

echo "Registered successfully";
?>
