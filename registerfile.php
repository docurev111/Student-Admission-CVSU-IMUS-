<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cvsuadmissionsystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $suffix = $_POST['suffix'];
    $date_of_birth = $_POST['date_of_birth'];
    $place_of_birth = $_POST['place_of_birth'];
    $sex = $_POST['sex'];
    $region = $_POST['region'];
    $province = $_POST['province'];
    $town = $_POST['town'];
    $barangay = $_POST['barangay'];
    $street = $_POST['street'];
    $zip_code = $_POST['zip_code'];
    $cellphone_number = $_POST['cellphone_number'];
    $landline_number = $_POST['landline_number'];
    $email = $_POST['email'];
    $civil_status = $_POST['civil_status'];
    $religion = $_POST['religion'];
    $password = $_POST['password']; // Plain password, no hashing

    // Insert data into personalinformation table
    $stmt_personal = $conn->prepare("INSERT INTO personalinformation (firstname, middlename, lastname, suffix, date_of_birth, place_of_birth, sex, region, province, town, barangay, street, zip_code, cellphone_number, landline_number, email, civil_status, religion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt_personal->bind_param("ssssssssssssssssss", $firstname, $middlename, $lastname, $suffix, $date_of_birth, $place_of_birth, $sex, $region, $province, $town, $barangay, $street, $zip_code, $cellphone_number, $landline_number, $email, $civil_status, $religion);

    if ($stmt_personal->execute()) {
        // Get the last inserted student_id
        $student_id = $conn->insert_id;

        // Insert data into accountinformation table
        $stmt_account = $conn->prepare("INSERT INTO accountinformation (student_id, email, password) VALUES (?, ?, ?)");
        $stmt_account->bind_param("iss", $student_id, $email, $password);

        if ($stmt_account->execute()) {
            // Insert data into familybackground table
            $stmt_family = $conn->prepare("INSERT INTO familybackground (student_id) VALUES (?)");
            $stmt_family->bind_param("i", $student_id);
            $stmt_family->execute();

            // Insert data into educationalbackground table
            $stmt_educational = $conn->prepare("INSERT INTO educationalbackground (student_id) VALUES (?)");
            $stmt_educational->bind_param("i", $student_id);
            $stmt_educational->execute();

            // Insert data into admissioninformation table (if needed)
            // Example:
            // $stmt_admission = $conn->prepare("INSERT INTO admissioninformation (student_id) VALUES (?)");
            // $stmt_admission->bind_param("i", $student_id);
            // $stmt_admission->execute();

            echo "Registration successful";
        } else {
            echo "Error inserting account information: " . $stmt_account->error;
        }
    } else {
        echo "Error inserting personal information: " . $stmt_personal->error;
    }

    // Close the statements and connection
    $stmt_personal->close();
    $stmt_account->close();
    $stmt_family->close();
    $stmt_educational->close();
    // $stmt_admission->close(); // Uncomment if inserting into admissioninformation

    $conn->close();
}
?>
