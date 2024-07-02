<?php
session_start();

// Clear any previous session errors
unset($_SESSION['error']);

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
$email = $_POST['email'];
$password = $_POST['password'];

// Fetching user data from personalinformation table
$sql = "SELECT student_id FROM accountinformation WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($student_id);
    $stmt->fetch();

    // Storing student_id in session
    $_SESSION['student_id'] = $student_id;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;

    // Redirecting to student dashboard
    header("Location: studentdashh.php");
    exit();
} else {
    $error = "Invalid email or password.";
    $_SESSION['error'] = $error;
    header("Location: login.html");
    exit();
}

$stmt->close();
$conn->close();
?>
