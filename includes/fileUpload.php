<?php
session_start();

if (isset($_POST['submit'])) {

    // Check if student_id is set in the form
    if (isset($_POST['student_id']) && !empty($_POST['student_id'])) {
        $student_id = $_POST['student_id'];

        // Include the PDO connection file
        require_once "connPDO.php";  // Ensure this file contains your PDO connection details

        echo "Form submitted. Student ID: " . htmlspecialchars($student_id) . "<br>"; // Debugging line

        // Handle the 2x2 picture upload
        if (isset($_FILES['id_pic']) && $_FILES['id_pic']['error'] === UPLOAD_ERR_OK) {
            echo "2x2 picture file uploaded.<br>"; // Debugging line
            $id_picName = basename($_FILES['id_pic']['name']);
            $id_picPath = $_FILES['id_pic']['tmp_name'];
            $id_picType = mime_content_type($id_picPath);

            // Check file type
            if ($id_picType == 'image/jpeg' || $id_picType == 'image/png') {
                $id_picContents = file_get_contents($id_picPath);
                echo "2x2 picture name: $id_picName, type: $id_picType<br>";  // Debugging line

                try {
                    $sql = 'INSERT INTO files (student_id, id_pic_name, id_pic_file) VALUES (:student_id, :name, :pic_file)
                            ON DUPLICATE KEY UPDATE id_pic_name = VALUES(id_pic_name), id_pic_file = VALUES(id_pic_file)';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
                    $stmt->bindParam(':name', $id_picName);
                    $stmt->bindParam(':pic_file', $id_picContents, PDO::PARAM_LOB);
                    $stmt->execute();
                    echo "2x2 picture uploaded successfully.<br>";  // Debugging line
                } catch (PDOException $e) {
                    echo 'Database error: ' . $e->getMessage() . "<br>";
                }
            } else {
                echo 'Error: Invalid file type for 2x2 picture.<br>';
            }
        } else {
            echo 'Error: Failed to upload 2x2 picture. Error code: ' . $_FILES['id_pic']['error'] . '<br>';
        }

        // Handle the report card upload
        if (isset($_FILES['card']) && $_FILES['card']['error'] === UPLOAD_ERR_OK) {
            echo "Report card file uploaded.<br>"; // Debugging line
            $cardName = basename($_FILES['card']['name']);
            $cardPath = $_FILES['card']['tmp_name'];
            $cardType = mime_content_type($cardPath);

            // Check file type
            if ($cardType == 'application/pdf') {
                $cardContents = file_get_contents($cardPath);
                echo "Report card name: $cardName, type: $cardType<br>";  // Debugging line

                try {
                    $sql = 'INSERT INTO files (student_id, report_card_name, report_card_file) VALUES (:student_id, :name, :pdf_file)
                            ON DUPLICATE KEY UPDATE report_card_name = VALUES(report_card_name), report_card_file = VALUES(report_card_file)';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
                    $stmt->bindParam(':name', $cardName);
                    $stmt->bindParam(':pdf_file', $cardContents, PDO::PARAM_LOB);
                    $stmt->execute();
                    echo "Report card uploaded successfully.<br>";  // Debugging line
                } catch (PDOException $e) {
                    echo 'Database error: ' . $e->getMessage() . "<br>";
                }
            } else {
                echo 'Error: Invalid file type for report card.<br>';
            }
        } else {
            echo 'Error: Failed to upload report card. Error code: ' . $_FILES['card']['error'] . '<br>';
        }

        // Redirect to the main page to show the table
        header("Location: ../studentdashh.php");
        exit;
    } else {
        echo 'Error: student_id not set.<br>';
    }
} else {
    echo 'Error: No form submission detected.<br>';
}
?>
