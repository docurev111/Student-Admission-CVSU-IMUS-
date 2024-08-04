<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbregistration";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $course = isset ($_POST['course']) ? $_POST['course'] : null;
    $lrn = $_POST['lrn'];

    $conn->begin_transaction();

    try {
        $sql4 = $conn->prepare("INSERT INTO admissioninformation (student_id, course, lrn) VALUES (?, ?, ?)");
        $sql4->bind_param("iss", $student_id, $course, $lrn);
        $sql4->execute();
        
        $student_id = $conn->insert_id;

        $conn->commit();
        $sql4->close();

    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
    
    $conn->close();
    
    ?>