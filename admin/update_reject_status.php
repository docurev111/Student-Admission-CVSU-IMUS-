<?php
require_once('connect.php');
if (isset($_POST['confirm_reject'])) {
 
    // Get student ID and rejection reasons from POST
    $studentId = $_POST['student_id'];
    $reasons = isset($_POST['reject_reason']) ? $_POST['reject_reason'] : [];

    // Update query
    $query = "UPDATE students SET status = 'Rejected', rejection_reasons = '" . implode(", ", $reasons) . "' WHERE student_id = '$studentId'";

    // Execute the query
    if ($con->query($query) === TRUE) {
        echo "<script>alert('Student status updated to Rejected successfully.');
              window.location.href = 'adminadmission.php';</script>";
    } else {
        echo "<script>alert('Error updating student status: " . $con->error . "');</script>";
    }

    // Close connection
    $con->close();
}
?>
