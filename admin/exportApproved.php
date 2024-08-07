<?php
    require_once('connect.php');

    $query = $con->query("
        SELECT pi.student_id, pi.firstname, pi.middlename, pi.lastname, pi.sex, pi.cellphone_number, pi.email, ai.lrn, ai.preferred_course, ai.status
        FROM personalinformation pi
        INNER JOIN admissioninformation ai
        ON pi.student_id = ai.student_id
        WHERE status = 'approved'
    ");

    if($query->num_rows > 0){
        $delimiter = ",";
        $filename = "students-data_" . date("Y-m-d")."-". time() . ".csv";

        $f = fopen('php://memory', 'w');

        $header = array('Student ID', 'First Name', 'Middle Name', 'Last Name', 'Sex', 'Cellphone Number', 'Email', 'LRN', 'Preferred Course', 'Status');
        fputcsv($f, $header, $delimiter); 
        
        while($row = $query->fetch_assoc()){  
            $lineData = array($row['student_id'], $row['firstname'], $row['middlename'], $row['lastname'], $row['sex'], $row['cellphone_number'], $row['email'], $row['lrn'], $row['preferred_course'], $row['status']); 
            fputcsv($f, $lineData, $delimiter); 
        }

        fseek($f, 0); 

        header('Content-Type: text/csv'); 
        header('Content-Disposition: attachment; filename="' . $filename . '";'); 

        fpassthru($f); 
    }
    exit;
?>