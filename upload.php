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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    
    $id_pic_name = $_FILES['id_pic']['name'];
    $id_pic_tmp = $_FILES['id_pic']['tmp_name'];
    $id_pic = addslashes(file_get_contents($id_pic_tmp));

    $report_card_name = $_FILES['report_card']['name'];
    $report_card_tmp = $_FILES['report_card']['tmp_name'];
    $report_card = addslashes(file_get_contents($report_card_tmp));

    $sql = "INSERT INTO files (student_id, id_pic_name, id_pic_file, report_card_name, report_card_file) 
            VALUES ('$student_id', '$id_pic_name', '$id_pic', '$report_card_name', '$report_card')";

    if ($conn->query($sql) === TRUE) {
        echo "Files uploaded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
