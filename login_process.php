<?php
session_start();
include 'db_connect.php'; // Ensure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Secure the inputs to prevent SQL injection
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        // Query to fetch user data with joins (using unique table aliases)
        $sql = "SELECT 
            ai.student_id, 
            ai.password,
            pi.firstname, 
            pi.lastname, 
            pi.middlename, 
            pi.suffix, 
            pi.sex, 
            pi.date_of_birth, 
            pi.place_of_birth,
            pi.region,
            pi.province,
            pi.town,
            pi.baranggay,
            pi.street,
            pi.zip_code,
            pi.cellphone_number,
            pi.landline_number,
            pi.civil_status,
            pi.religion,
            fb.father_name,
            fb.guardian_name,
            fb.guardian_contact_number,
            fb.guardian_occupation, 
            fb.father_contact_number, 
            fb.father_occupation, 
            fb.mother_name, 
            fb.mother_contact_number, 
            fb.mother_occupation, 
            fb.guardian_name, 
            fb.guardian_contact_number, 
            fb.guardian_occupation,
            eb.elementary_school_name, 
            eb.elementary_school_address, 
            eb.elementary_year_graduated, 
            eb.elementary_type, 
            eb.high_school_name, 
            eb.high_school_address, 
            eb.high_school_year_graduated, 
            eb.high_school_type, 
            eb.senior_high_school_name, 
            eb.senior_high_school_address, 
            eb.senior_high_school_year_graduated, 
            eb.senior_high_school_type, 
            ad.preferred_course, 
            ad.status, 
            ad.lrn
        FROM accountinformation ai
        JOIN personalinformation pi ON ai.student_id = pi.student_id
        LEFT JOIN familybackground fb ON ai.student_id = fb.student_id
        LEFT JOIN educationalbackground eb ON ai.student_id = eb.student_id
        LEFT JOIN admissioninformation ad ON ai.student_id = ad.student_id
        WHERE ai.email = '$email'";


        $result = mysqli_query($conn, $sql);

        if ($result === false) {
            die('Query failed: ' . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Compare plain text passwords
            if ($password === $row['password']) {
                // Password is correct, start a session and store user info
                $_SESSION['student_id'] = $row['student_id'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['middlename'] = $row['middlename'];
                $_SESSION['suffix'] = $row['suffix'];
                $_SESSION['date_of_birth'] = $row['date_of_birth'];
                $_SESSION['place_of_birth'] = $row['place_of_birth'];
                $_SESSION['sex'] = $row['sex'];
                $_SESSION['email'] = $email; // Store email separately if needed
                $_SESSION['region'] = $row['region'];
                $_SESSION['province'] = $row['province'];
                $_SESSION['town'] = $row['town'];
                $_SESSION['barangay'] = $row['barangay'];
                $_SESSION['street'] = $row['street'];
                $_SESSION['zip_code'] = $row['zip_code'];
                $_SESSION['cellphone_number'] = $row['cellphone_number'];
                $_SESSION['landline_number'] = $row['landline_number'];
                $_SESSION['civil_status'] = $row['civil_status'];
                $_SESSION['religion'] = $row['religion'];
                $_SESSION['father_name'] = $row['father_name'];
                $_SESSION['father_contact_number'] = $row['father_contact_number'];
                $_SESSION['father_occupation'] = $row['father_occupation'];
                $_SESSION['guardian_name'] = $row['guardian_name'];
                $_SESSION['guardian_contact_number'] = $row['guardian_contact_number'];
                $_SESSION['guardian_occupation'] = $row['guardian_occupation'];
                $_SESSION['mother_name'] = $row['mother_name'];
                $_SESSION['mother_contact_number'] = $row['mother_contact_number'];
                $_SESSION['mother_occupation'] = $row['mother_occupation'];
                $_SESSION['elementary_school_name'] = $row['elementary_school_name'];
                $_SESSION['elementary_school_address'] = $row['elementary_school_address'];
                $_SESSION['elementary_year_graduated'] = $row['elementary_year_graduated'];
                $_SESSION['elementary_type'] = $row['elementary_type'];
                $_SESSION['high_school_name'] = $row['high_school_name'];
                $_SESSION['high_school_address'] = $row['high_school_address'];
                $_SESSION['high_school_year_graduated'] = $row['high_school_year_graduated'];
                $_SESSION['high_school_type'] = $row['high_school_type'];
                $_SESSION['senior_high_school_name'] = $row['senior_high_school_name'];
                $_SESSION['senior_high_school_address'] = $row['senior_high_school_address'];
                $_SESSION['senior_high_school_year_graduated'] = $row['senior_high_school_year_graduated'];
                $_SESSION['senior_high_school_type'] = $row['senior_high_school_type'];
                $_SESSION['preferred_course'] = $row['preferred_course'];
                $_SESSION['status'] = $row['status'];
                $_SESSION['lrn'] = $row['lrn'];

                // Redirect to dashboard
                header("Location: studentdashh.php");
                exit();
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "Invalid email.";
        }
    } else {
        echo "Form data not received.";
    }
} else {
    echo "Invalid request method.";
}
?>
