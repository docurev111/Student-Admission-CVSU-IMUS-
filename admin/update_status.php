<?php
require_once('connect.php'); // Include database connection

if (isset($_POST['confirm_approve'])) {
    $studentId = $_POST['student_id'];

    // Perform database update query
    $sql = "UPDATE `admissioninformation` SET status = 'Approved' WHERE student_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $studentId);

    if ($stmt->execute()) {
        header("Location: adminadmission.php");
        echo "<script>alert('Student status updated successfully.');</script>";
    } else {
        echo "<script>alert('Error updating student status.');</script>";
    }

    $stmt->close();
    $con->close();
}
?>
