<?php
// Include database connection
require_once('connect.php');

// Set JSON header
header('Content-Type: application/json');

try {
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

    // Check if there are already 4 announcements
    $result = $con->query("SELECT COUNT(*) as count FROM announcements WHERE deleted = FALSE");
    $row = $result->fetch_assoc();
    if ($row['count'] >= 4) {
        // Shift announcements
        $con->query("UPDATE announcements SET deleted = TRUE WHERE deleted = FALSE ORDER BY created_at ASC LIMIT 1");

        for ($i = 2; $i <= 4; $i++) {
            $con->query("UPDATE announcements SET id = id - 1 WHERE announcement_id = $i AND deleted = FALSE");
        }
    }

    // Prepare SQL statement
    $stmt = $con->prepare("INSERT INTO announcements (title, content, created_at) VALUES (?, ?, NOW())");
    if (!$stmt) {
        throw new Exception('Prepare statement failed: ' . $con->error);
    }

    // Bind parameters and execute statement
    $stmt->bind_param("ss", $title, $content);
    if (!$stmt->execute()) {
        throw new Exception('Execute statement failed: ' . $stmt->error);
    }

    // Close statement
    $stmt->close();

    // Prepare success response
    $response = [
        'success' => true,
        'message' => 'Announcement posted successfully',
        'announcement' => [
            'title' => $title,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s')
        ]
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
