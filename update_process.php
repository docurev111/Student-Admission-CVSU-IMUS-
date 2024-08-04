<?php
session_start();
include 'db_connect.php'; // include your database connection

// Check if the user is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: Loginm.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_SESSION['student_id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $suffix = $_POST['suffix'];
    $date_of_birth = $_POST['date_of_birth'];
    $place_of_birth = $_POST['place_of_birth'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $region = $_POST['region'];
    $province = $_POST['province'];
    $town = $_POST['town'];
    $baranggay = $_POST['baranggay'];
    $street = $_POST['street'];
    $zip_code = $_POST['zip_code'];
    $cellphone_number = $_POST['cellphone_number'];
    $landline_number = $_POST['landline_number'];
    $civil_status = $_POST['civil_status'];
    $religion = $_POST['religion'];
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
    $preferred_course = $_POST['preferred_course'];
    $lrn = $_POST['lrn'];

    // Update personal information
    $sql_personal = "UPDATE personalinformation SET firstname=?, middlename=?, lastname=?, suffix=?, date_of_birth=?, place_of_birth=?, sex=?, email=?, region=?, 
    province=?, town=?, baranggay=?, street=?, zip_code=?, cellphone_number=?, landline_number=?, civil_status=?, religion=? WHERE student_id=?";
    $stmt_personal = $conn->prepare($sql_personal);
    $stmt_personal->bind_param("ssssssssssssssssssi", $firstname, $middlename, $lastname, $suffix, $date_of_birth, $place_of_birth, $sex, $email, $region, $province, $town, $baranggay, $street, $zip_code, $cellphone_number, $landline_number, $civil_status, $religion, $student_id);

    if ($stmt_personal->execute()) {
        header("Location: studentdashh.php");
    } else {
        echo "Error updating personal information: " . $stmt_personal->error;
    }

    $stmt_personal->close();

    // Update family background
    $sql_family = "UPDATE familybackground SET father_name=?, father_contact_number=?, father_occupation=?, mother_name=?, mother_contact_number=?, mother_occupation=?, guardian_name=?, guardian_contact_number=?, guardian_occupation=? WHERE student_id=?";
    $stmt_family = $conn->prepare($sql_family);
    $stmt_family->bind_param("sssssssssi", $father_name, $father_contact_number, $father_occupation, $mother_name, $mother_contact_number, $mother_occupation, $guardian_name, $guardian_contact_number, $guardian_occupation, $student_id);

    if ($stmt_family->execute()) {
        header("Location: studentdashh.php");
    } else {
        echo "Error updating family background: " . $stmt_family->error;
    }

    $stmt_family->close();

    // Update educational background
    $sql_education = "UPDATE educationalbackground SET elementary_school_name=?, elementary_school_address=?, elementary_year_graduated=?, elementary_type=?, high_school_name=?, high_school_address=?, high_school_year_graduated=?, high_school_type=?, senior_high_school_name=?, senior_high_school_address=?, senior_high_school_year_graduated=?, senior_high_school_type=? WHERE student_id=?";
    $stmt_education = $conn->prepare($sql_education);
    $stmt_education->bind_param("ssssssssssssi", $elementary_school_name, $elementary_school_address, $elementary_year_graduated, $elementary_type, $high_school_name, $high_school_address, $high_school_year_graduated, $high_school_type, $senior_high_school_name, $senior_high_school_address, $senior_high_school_year_graduated, $senior_high_school_type, $student_id);

    if ($stmt_education->execute()) {
        header("Location: studentdashh.php");
    } else {
        echo "Error updating educational background: " . $stmt_education->error;
    }

    $stmt_education->close();

    // Update admission information
    $sql_admission = "UPDATE admissioninformation SET preferred_course=?, lrn=? WHERE student_id=?";
    $stmt_admission = $conn->prepare($sql_admission);
    $stmt_admission->bind_param("ssi", $preferred_course, $lrn, $student_id);

    if ($stmt_admission->execute()) {
        header("Location: studentdashh.php");
    } else {
        echo "Error updating admission information: " . $stmt_admission->error;
    }

    $stmt_admission->close();
    header("Location: studentdashh.php");
    if (isset($_POST['file_upload'])){
    }

    $conn->close();
}
?>
