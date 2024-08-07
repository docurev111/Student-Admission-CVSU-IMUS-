<?php
// Include database connection
require_once('connect.php');

// Set JSON header
header('Content-Type: application/json');

try {
    // Check if announcement_id is provided
    if (!isset($_GET['announcement_id'])) {
        throw new Exception('Announcement ID is required');
    }

    $announcement_id = intval($_GET['announcement_id']);

    // Prepare SQL statement
    $stmt = $con->prepare("UPDATE announcements SET deleted = TRUE WHERE announcement_id = ?");
    if (!$stmt) {
        throw new Exception('Prepare statement failed: ' . $con->error);
    }

    // Bind parameters and execute statement
    $stmt->bind_param("i", $announcement_id);
    if (!$stmt->execute()) {
        throw new Exception('Execute statement failed: ' . $stmt->error);
    }

    // Check if any row was updated
    if ($stmt->affected_rows === 0) {
        throw new Exception('No announcement found with the given ID');
    }

    // Close statement
    $stmt->close();

    // Prepare success response
    $response = [
        'success' => true,
        'message' => 'Announcement marked as deleted successfully'
    ];

    // Output JSON response
    echo json_encode($response);

} catch (Exception $e) {
    // Handle errors
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];

    // Output JSON error response
    echo json_encode($response);
}

// Close database connection
$con->close();
?>
