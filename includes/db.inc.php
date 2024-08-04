<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cvsuadmissionsystem";

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Start the transaction
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conn->beginTransaction();
        
        // Handle text data submission
        if (isset($_POST['firstname'])) {
            $first_name = $_POST['firstname'];
            $middle_name = $_POST['middlename'];
            $last_name = $_POST['lastname'];
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
            $civil_status = $_POST['civil_status'];
            $religion = $_POST['religion'];
            $email = $_POST['email'];

            $father_name = $_POST['father_name'];
            $father_contact_number = $_POST['father_contact_number'];
            $father_occupation = $_POST['father_occupation'];
            $mother_name = $_POST['mother_name'];
            $mother_contact_number = $_POST['mother_contact_number'];
            $mother_occupation = $_POST['mother_occupation'];
            $guardian_name = $_POST['guardian_name'];
            $guardian_contact_number = $_POST['guardian_contact_number'];
            $guardian_occupation = $_POST['guardian_occupation'];

            $elementary_school_name = $_POST['elementary_school_name'];
            $elementary_school_address = $_POST['elementary_school_address'];
            $elementary_year_graduated = $_POST['elementary_year_graduated'];
            $elementary_type = $_POST['elementary_type'];
            $high_school_name = $_POST['high_school_name'];
            $high_school_address = $_POST['high_school_address'];
            $high_school_year_graduated = $_POST['high_school_year_graduated'];
            $high_school_type = $_POST['high_school_type'];
            $senior_high_school_name = $_POST['senior_high_school_name'];
            $senior_high_school_address = $_POST['senior_high_school_address'];
            $senior_high_school_year_graduated = $_POST['senior_high_school_year_graduated'];
            $senior_high_school_type = $_POST['senior_high_school_type'];

            $course = $_POST['course'];
            $lrn = $_POST['lrn'];

            // Insert into personalinformation table
            $sql1 = $conn->prepare("INSERT INTO personalinformation (firstname, middlename, lastname, suffix, date_of_birth, place_of_birth, sex, region, province, town, barangay, street, zip_code, cellphone_number, landline_number, civil_status, religion, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $sql1->execute([$first_name, $middle_name, $last_name, $suffix, $date_of_birth, $place_of_birth, $sex, $region, $province, $town, $barangay, $street, $zip_code, $cellphone_number, $landline_number, $civil_status, $religion, $email]);
            
            // Retrieve the last inserted ID
            $_SESSION['student_id'] = $conn->lastInsertId();

            // Insert into familybackground table
            $sql2 = $conn->prepare("INSERT INTO familybackground (student_id, father_name, father_contact_number, father_occupation, mother_name, mother_contact_number, mother_occupation, guardian_name, guardian_contact_number, guardian_occupation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $sql2->execute([$_SESSION['student_id'], $father_name, $father_contact_number, $father_occupation, $mother_name, $mother_contact_number, $mother_occupation, $guardian_name, $guardian_contact_number, $guardian_occupation]);

            // Insert into educationalbackground table
            $sql3 = $conn->prepare("INSERT INTO educationalbackground (student_id, elementary_school_name, elementary_school_address, elementary_year_graduated, elementary_type, high_school_name, high_school_address, high_school_year_graduated, high_school_type, senior_high_school_name, senior_high_school_address, senior_high_school_year_graduated, senior_high_school_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $sql3->execute([$_SESSION['student_id'], $elementary_school_name, $elementary_school_address, $elementary_year_graduated, $elementary_type, $high_school_name, $high_school_address, $high_school_year_graduated, $high_school_type, $senior_high_school_name, $senior_high_school_address, $senior_high_school_year_graduated, $senior_high_school_type]);

            // Insert into admissioninformation table
            $sql4 = $conn->prepare("INSERT INTO admissioninformation (student_id, course, lrn) VALUES (?, ?, ?)");
            $sql4->execute([$_SESSION['student_id'], $course, $lrn]);

            $sql5 = $conn->prepare("INSERT INTO id_pic (student_id) VALUES (?)");
            $sql5->execute([$_SESSION['student_id']]);

            $sql6 = $conn->prepare("INSERT INTO report_card (student_id) VALUES (?)");
            $sql6->execute([$_SESSION['student_id']]);


            $conn->commit();
            header("Location: ../reg2.php");
        }
    }
} catch (Exception $e) {
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>