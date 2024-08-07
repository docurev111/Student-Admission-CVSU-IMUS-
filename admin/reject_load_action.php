<?php

// load_action.php
require_once('connect.php');


// Check if student_id is set in the request
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    // Assume this file receives a student_id parameter via GET request

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // Prepare and execute SQL query
    $sql = "SELECT *
            FROM personalinformation as pi
            INNER JOIN accountinformation as ai ON pi.student_id = ai.student_id
            INNER JOIN admissioninformation as adi ON pi.student_id = adi.student_id
            INNER JOIN educationalbackground as eb ON pi.student_id = eb.student_id
            INNER JOIN familybackground as fb ON pi.student_id = fb.student_id
            WHERE pi.student_id = '$student_id'";
    $result = mysqli_query($con, $sql);

    // Check if query execution was successful
    if ($result) {
        // Fetch data from the result set
        $row = mysqli_fetch_assoc($result);

        // Output the form HTML with fetched data
        ?>

        <form id="edit-form" method="post" action="update_reject_status.php">
        <!-- personal information -->
        <h3>Personal Information</h3 style="padding-top:10px;padding-bottom:200px"><br>
        <div class="input-container">
            <div class="user-input-box">
                <label for="id">Student ID</label>
                <input type="text" id="id" name="id" value="<?php echo $row['student_id']; ?>">
            </div>

            <div class="user-input-box">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="LNAME" value="<?php echo $row['lastname']; ?>">
            </div>

            <div class="user-input-box">
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="FNAME" value="<?php echo $row['firstname']; ?>">
            </div>

            <div class="user-input-box">
                <label for="mname">Middle Name</label>
                <input type="text" id="mname" name="MNAME" value="<?php echo $row['middlename']; ?>">
            </div>

            <div class="user-input-box">
                <label for="suffix">Suffix</label>
                <input type="text" id="suffix" name="MNAME" value="<?php echo $row['suffix']; ?>">
            </div>
        </div>

        <!-- 2nd row -->
        <div class="input-container">
            <div class="user-input-box">
                <label for="dob">Date of Birth</label>
                <input type="text" id="dob" name="LRN" value="<?php echo $row['date_of_birth']; ?>">
            </div>

            <div class="user-input-box">
            <label for="pob">Place of Birth</label>
            <input type="text" id="pob" name="LNAME" value="<?php echo $row['place_of_birth']; ?>">
            </div>

            <div class="user-input-box">
                <label for="fname">Sex</label>
                <input type="text" id="sex" name="FNAME" value="<?php echo $row['sex']; ?>">
            </div>

            <div class="user-input-box">
                <label for="email">Email Address</label>
                <input type="text" id="email" name="MNAME" value="<?php echo $row['email']; ?>">
            </div>

            <div class="user-input-box">
                <label for="region">Region</label>
                <input type="text" id="region" name="MNAME" value="<?php echo $row['region']; ?>">
            </div>
        </div>
        <!-- 3rd row -->
        <div class="input-container">
            
            <div class="user-input-box">
            <label for="province">Province</label>
            <input type="text" id="province" name="LNAME" value="<?php echo $row['province']; ?>">
            </div>

            <div class="user-input-box">
                <label for="town">Town</label>
                <input type="text" id="town" name="FNAME" value="<?php echo $row['town']; ?>">
            </div>

            <div class="user-input-box">
                <label for="baranggay">Baranggay</label>
                <input type="text" id="baranggay" name="MNAME" value="<?php echo $row['baranggay']; ?>">
            </div>

            <div class="user-input-box">
                <label for="street">Street</label>
                <input type="text" id="street" name="MNAME" value="<?php echo $row['street']; ?>">
            </div>

            <div class="user-input-box">
                <label for="zip">Zip Code</label>
                <input type="text" id="zip" name="LRN" value="<?php echo $row['zip_code']; ?>">
            </div>

        </div>

    
        <!-- 4th row -->
        <div class="input-container">
            
            <div class="user-input-box">
            <label for="cellphonenum">Cellphone #</label>
            <input type="text" id="cellphonenum" name="LNAME" value="<?php echo $row['cellphone_number']; ?>">
            </div>

            <div class="user-input-box">
                <label for="landlinenum">Landline #</label>
                <input type="text" id="landlinenum" name="FNAME" value="<?php echo $row['landline_number']; ?>">
            </div>

            <div class="user-input-box">
                <label for="cs">Civil Status</label>
                <input type="text" id="cs" name="MNAME" value="<?php echo $row['civil_status']; ?>">
            </div>

            <div class="user-input-box">
                <label for="religion">Religion</label>
                <input type="text" id="religion" name="MNAME" value="<?php echo $row['religion']; ?>">
            </div>
        </div>  
        <hr>
            <!-- Family Background -->
        <br><h3>Family Background</h3 style="padding-top:10px;padding-bottom:200px"><br>

        <div class="input-container">
            
            <div class="user-input-box">
            <label for="father-name">Father's Name</label>
            <input type="text" id="father-name" name="LNAME" value="<?php echo $row['father_name']; ?>">
            </div>

            <div class="user-input-box">
                <label for="fcontact">Contact #</label>
                <input type="text" id="fcontact" name="FNAME" value="<?php echo $row['father_contact_number']; ?>">
            </div>

            <div class="user-input-box">
                <label for="foccupation">Occupation</label>
                <input type="text" id="foccupation" name="MNAME" value="<?php echo $row['father_occupation']; ?>">
            </div>

        </div> 
        <div class="input-container">
            
            <div class="user-input-box">
            <label for="mother-name">Mother's Name</label>
            <input type="text" id="mother-name" name="LNAME" value="<?php echo $row['mother_name']; ?>">
            </div>

            <div class="user-input-box">
                <label for="mcontact">Contact #</label>
                <input type="text" id="mcontact" name="FNAME" value="<?php echo $row['mother_contact_number']; ?>">
            </div>

            <div class="user-input-box">
                <label for="moccupation">Occupation</label>
                <input type="text" id="moccupation" name="MNAME" value="<?php echo $row['mother_occupation']; ?>">
            </div>

        </div> 

        <div class="input-container">
            
            <div class="user-input-box">
            <label for="gaurdian-name">Gaurdian's Name</label>
            <input type="text" id="gaurdian-name" name="LNAME" value="<?php echo $row['guardian_name']; ?>">
            </div>

            <div class="user-input-box">
                <label for="gcontact">Contact #</label>
                <input type="text" id="gcontact" name="FNAME" value="<?php echo $row['guardian_contact_number']; ?>">
            </div>

            <div class="user-input-box">
                <label for="goccupation">Occupation</label>
                <input type="text" id="goccupation" name="MNAME" value="<?php echo $row['guardian_occupation']; ?>">
            </div>

        </div> 

        <hr>
        <!-- Educational Background -->
        <br><h3>Educational Background</h3 style="padding-top:10px;padding-bottom:200px"><br>
        <br><h4>Elementary</h4 style="padding-top:10px;padding-bottom:200px"><br>
        <div class="input-container">
            
            <div class="user-input-box">
            <label for="eschoolname">School Name</label>
            <input type="text" id="eschoolname" name="LNAME" value="<?php echo $row['elementary_school_name']; ?>">
            </div>

            <div class="user-input-box">
                <label for="eschooladd">School Address</label>
                <input type="text" id="eschooladd" name="FNAME" value="<?php echo $row['elementary_school_address']; ?>">
            </div>

            <div class="user-input-box">
                <label for="eyear">Year Graduated</label>
                <input type="text" id="eyear" name="MNAME" value="<?php echo $row['elementary_year_graduated']; ?>">
            </div>

            <div class="user-input-box">
                <label for="etype">Type</label>
                <input type="text" id="etype" name="MNAME" value="<?php echo $row['elementary_type']; ?>">
            </div>
            
        </div> 
        
        <br><h4>High School</h4 style="padding-top:10px;padding-bottom:200px"><br>
        <div class="input-container">
            
            <div class="user-input-box">
            <label for="hschoolname">School Name</label>
            <input type="text" id="hschoolname" name="LNAME" value="<?php echo $row['high_school_name']; ?>">
            </div>

            <div class="user-input-box">
                <label for="hschooladd">School Address</label>
                <input type="text" id="hschooladd" name="FNAME" value="<?php echo $row['high_school_address']; ?>">
            </div>

            <div class="user-input-box">
                <label for="hyear">Year Graduated</label>
                <input type="text" id="hyear" name="MNAME" value="<?php echo $row['high_school_year_graduated']; ?>">
            </div>

            <div class="user-input-box">
                <label for="htype">Type</label>
                <input type="text" id="htype" name="MNAME" value="<?php echo $row['high_school_type']; ?>">
            </div>
        </div> 

        <br><h4>Senior High School</h4 style="padding-top:10px;padding-bottom:200px"><br>
        <div class="input-container">
            
            <div class="user-input-box">
            <label for="shschoolname">School Name</label>
            <input type="text" id="shschoolname" name="LNAME" value="<?php echo $row['senior_high_school_name']; ?>">
            </div>

            <div class="user-input-box">
                <label for="shschooladd">School Address</label>
                <input type="text" id="shschooladd" name="FNAME" value="<?php echo $row['senior_high_school_address']; ?>">
            </div>

            <div class="user-input-box">
                <label for="shyear">Year Graduated</label>
                <input type="text" id="shyear" name="MNAME" value="<?php echo $row['senior_high_school_year_graduated']; ?>">
            </div>

            <div class="user-input-box">
                <label for="shtype">Type</label>
                <input type="text" id="shtype" name="MNAME" value="<?php echo $row['senior_high_school_type']; ?>">
            </div>
        </div> 
        <hr>
        <!-- Admission Information -->
        <br><h3>Admission Information</h3 style="padding-top:10px;padding-bottom:200px"><br>
        
        <div class="input-container">
            
            <div class="user-input-box">
            <label for="preffered-course">Preffered Course</label>
            <input type="text" id="preffered-course" name="LNAME" value="<?php echo $row['preferred_course']; ?>">
            </div>

            <div class="user-input-box">
                <label for="lrn">Learner's Reference Number</label>
                <input type="text" id="lrn" name="FNAME" value="<?php echo $row['lrn']; ?>">
            </div>
            
        </div> 
        <div class="input-container">
            
            <!-- <div class="user-input-box">
            <label for="lname">Preffered Course</label>
            <input type="text" id="lname" name="LNAME" value="" required>
            </div>

            <div class="user-input-box">
                <label for="fname">Learner's Reference Number</label>
                <input type="text" id="fname" name="FNAME" value="" required>
            </div> -->
            
        </div>


        <!-- Reject modal Modal -->
        <div id="rejectModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeRejectModal()">&times;</span>
                <p>Are you sure you want to reject this student?</p>
                <div class="modal-buttons">
                    <input type="hidden" id="studentId" name="student_id" value="">
                    <button type="submit" name="confirm_reject">Yes, Reject</button>
                    <button type="button" class="closeBtn" onclick="closeRejectModal()">Cancel</button>
                </div>
            </div>
        </div>     
        

        </form>
        <?php
        
        
        // Free result set
        mysqli_free_result($result);
            } else {
                echo "Error: " . mysqli_error($con);
            }

            // Close database connection
            mysqli_close($con);
        }
        
?>
