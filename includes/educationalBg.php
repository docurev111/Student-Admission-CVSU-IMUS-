<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbregistration";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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

    $conn->begin_transaction();

    try {
        $sql3 = $conn->prepare("INSERT INTO educationalbackground (student_id, elementary_school_name, elementary_school_address, elementary_year_graduated, elementary_type, high_school_name, high_school_address, high_school_year_graduated, high_school_type, senior_high_school_name, senior_high_school_address, senior_high_school_year_graduated, senior_high_school_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql3->bind_param("isssisssissss", $student_id, $elementary_school_name, $elementary_school_address, $elementary_year_graduated, $elementary_type, $high_school_name, $high_school_address, $high_school_year_graduated, $high_school_type, $senior_high_school_name, $senior_high_school_address, $senior_high_school_year_graduated, $senior_high_school_type);
        $sql3->execute();

        $student_id = $conn->insert_id;

        $conn->commit();
        $sql3->close();


    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
    
    $conn->close();
    
    ?>