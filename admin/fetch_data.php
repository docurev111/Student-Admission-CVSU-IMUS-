<?php
require_once 'connect.php';

header('Content-Type: application/json');

// Fetch data for line chart (example: total counts)
$sql_line_chart = "SELECT 'Total' AS label, COUNT(student_id) AS count FROM admissioninformation";
$result_line_chart = $con->query($sql_line_chart);
$line_chart_data = $result_line_chart->fetch_all(MYSQLI_ASSOC);

// Fetch data for pie chart (based on preferred courses)
$sql_course_chart = "SELECT preferred_course, COUNT(*) AS count FROM admissioninformation GROUP BY preferred_course";
$result_course_chart = $con->query($sql_course_chart);
$course_chart_data = $result_course_chart->fetch_all(MYSQLI_ASSOC);

// Fetch data for pie chart (based on status)
$sql_pie_chart = "SELECT 
    SUM(CASE WHEN status = 'Approved' THEN 1 ELSE 0 END) AS approved,
    SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pending,
    SUM(CASE WHEN status = 'Rejected' THEN 1 ELSE 0 END) AS rejected
    FROM admissioninformation";
$result_pie_chart = $con->query($sql_pie_chart);
$pie_chart_data = $result_pie_chart->fetch_assoc();

$data = array(
    'course_chart' => $course_chart_data, // Include data for course-based pie chart
    'pie_chart' => $pie_chart_data
);

echo json_encode($data);
?>
