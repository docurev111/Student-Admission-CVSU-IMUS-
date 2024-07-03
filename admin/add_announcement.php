<?php
require_once('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Check the number of announcements
    $result = $con->query("SELECT COUNT(*) as count FROM announcements");
    $row = $result->fetch_assoc();
    $count = $row['count'];

    // If there are already 4 announcements, delete the oldest one
    if ($count >= 4) {
        $con->query("DELETE FROM announcements ORDER BY created_at ASC LIMIT 1");
    }

    // Insert the new announcement
    $stmt = $con->prepare("INSERT INTO announcements (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();

    header("Location: AdminAnnouncement.php");
    exit();
}
?>
