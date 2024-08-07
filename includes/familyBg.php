<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbregistration";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $father_name = $_POST['father_name'];
    $father_contact_number = $_POST['father_contact_number'];
    $father_occupation = $_POST['father_occupation'];
    $mother_name = $_POST['mother_name'];
    $mother_contact_number = $_POST['mother_contact_number'];
    $mother_occupation = $_POST['mother_occupation'];
    $guardian_name = $_POST['guardian_name'];
    $guardian_contact_number = $_POST['guardian_contact_number'];
    $guardian_occupation = $_POST['guardian_occupation'];

    $conn->begin_transaction();

    try {


    $sql2 = $conn->prepare("INSERT INTO familybackground (student_id, father_name, father_contact_number, father_occupation, mother_name, mother_contact_number, mother_occupation, guardian_name, guardian_contact_number, guardian_occupation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sql2->bind_param("isssssssss", $student_id, $father_name, $father_contact_number, $father_occupation, $mother_name, $mother_contact_number, $mother_occupation, $guardian_name, $guardian_contact_number, $guardian_occupation);
    $sql2->execute();

    $student_id = $conn->insert_id;

    $conn->commit();
    $sql2->close();

    echo "Records added successfully";
} catch (Exception $e) {
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

$conn->close();

?>