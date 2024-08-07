<?php
require_once('connect.php'); // Include database connection

if (isset($_POST['confirm_reject'])) {
    $studentId = $_POST['student_id'];

    // Perform database update query
    $sql = "UPDATE `admissioninformation` SET status = 'Rejected' WHERE student_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $studentId);

    if ($stmt->execute()) {
        echo "<script>alert('Student status updated successfully.');</script>";
        header("Location: AdminAdmission.php");
    } else {
        echo "<script>alert('Error updating student status.');</script>";
    }

    $stmt->close();
    $con->close();
}
?>
