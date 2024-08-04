<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbregistration";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


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
    $zip_code = isset($_POST['zip_code']) ? $_POST['zip_code'] : null; // Add a default value to avoid undefined array key error
    $cellphone_number = $_POST['cellphone_number'];
    $landline_number = $_POST['landline_number'];
    $civil_status = $_POST['civil_status'];
    $religion = $_POST['religion'];
    $email = $_POST['email'];


    $conn->begin_transaction();

    try {

        $sql1 = $conn->prepare("INSERT INTO personalinformation (firstname, middlename, lastname, suffix, date_of_birth, place_of_birth, sex, region, province, town, barangay, street, zip_code, cellphone_number, landline_number, civil_status, religion, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql1->bind_param("ssssisssssssssssss", $first_name, $middle_name, $last_name, $suffix, $date_of_birth, $place_of_birth, $sex, $region, $province, $town, $barangay, $street, $zip_code, $cellphone_number, $landline_number, $civil_status, $religion, $email);
        $sql1->execute();

        $student_id = $conn->insert_id;

        $conn->commit();
        $sql1->close();

        echo "Records added successfully";
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    $conn->close();
?>