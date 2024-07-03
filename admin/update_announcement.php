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

    // Retrieve POST data
    $data = json_decode(file_get_contents('php://input'), true);

    // Validate input
    if (!$data || !isset($data['title']) || !isset($data['content'])) {
        throw new Exception('Invalid input data');
    }

    // Sanitize input data
    $title = trim($data['title']);
    $content = trim($data['content']);

    // Validate if title and content are not empty
    if (empty($title) || empty($content)) {
        throw new Exception('Title and content cannot be empty');
    }

    // Prepare SQL statement
    $stmt = $con->prepare("UPDATE announcements SET title = ?, content = ? WHERE announcement_id = ?");
    if (!$stmt) {
        throw new Exception('Prepare statement failed: ' . $con->error);
    }

    // Bind parameters and execute statement
    $stmt->bind_param("ssi", $title, $content, $announcement_id);
    if (!$stmt->execute()) {
        throw new Exception('Execute statement failed: ' . $stmt->error);
    }

    // Close statement
    $stmt->close();

    // Prepare success response
    $response = [
        'success' => true,
        'message' => 'Announcement updated successfully'
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
