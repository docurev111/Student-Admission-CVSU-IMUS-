<?php
session_start();
include 'db_connect.php';
//Check if the user is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM personalinformation WHERE student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$student_id = $_SESSION['student_id']; $firstname = $_SESSION['firstname']; $lastname = $_SESSION['lastname'];
$middlename = $_SESSION['middlename']; $suffix = $_SESSION['suffix']; $date_of_birth = $_SESSION['date_of_birth'];
$place_of_birth = $_SESSION['place_of_birth']; $sex = $_SESSION['sex']; $email = $_SESSION['email'];
$region = $_SESSION['region']; $province = $_SESSION['province']; $town = $_SESSION['town'];
$baranggay = $_SESSION['baranggay']; $street = $_SESSION['street']; $zip_code = $_SESSION['zip_code'];
$cellphone_number = $_SESSION['cellphone_number'];  
$landline_number = $_SESSION['landline_number']; 
$civil_status = $_SESSION['civil_status'];
$religion = $_SESSION['religion']; 
$father_name = $_SESSION['father_name']; 
$father_contact_number = $_SESSION['father_contact_number']; 
$father_occupation = $_SESSION['father_occupation'];
$guardian_name = $_SESSION['guardian_name'];
$elementary_school_name = $_SESSION['elementary_school_name'];
$elementary_school_address = $_SESSION['elementary_school_address'];
$elementary_year_graduated = $_SESSION['elementary_year_graduated'];
$elementary_type = $_SESSION['elementary_type'];
$high_school_name = $_SESSION['high_school_name'];
$high_school_address = $_SESSION['high_school_address'];
$high_school_year_graduated = $_SESSION['high_school_year_graduated'];
$high_school_type = $_SESSION['high_school_type'];
$senior_high_school_name = $_SESSION['senior_high_school_name'];
$senior_high_school_address = $_SESSION['senior_high_school_address'];
$senior_high_school_year_graduated = $_SESSION['senior_high_school_year_graduated'];
$senior_high_school_type = $_SESSION['senior_high_school_type'];
$preferred_course = $_SESSION['preferred_course'];
$lrn = $_SESSION['lrn'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous"/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>


    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Student Dashboard</title>

</head>
<body>
   <style>
     <?php include "css/editapplication.css" ?>
     <?php include "css/reg.css" ?>
   </style>
    <div class="grid-container">
        <!-- header -->
        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <i class="ri-menu-line"></i>
            </div>
            <div class="header-right">
                <h4 style="padding-left: 250px;">Student Dashboard</h4>
            </div>
        </header>
        <!-- End Header -->
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                    <img src="./images/schoolnewlogo.png" alt="" width="90px" height="80px">
                </div>
                <i class="ri-close-fill" onclick="closeSidebar()"></i>
            </div>
            <ul class="sidebar-list">
                <li class="sidebar-list-items">
                    <a href="studentdashh.php"><i class="ri-dashboard-line"><span>Dashboard</span></i></a>
                </li>
                <li class="sidebar-list-items">
                    <a href="#"><i class="ri-edit-box-line"><span>Edit Application</span></i></a>
                </li>
                <li class="sidebar-list-items">
                    <a href="Loginm.php"><i class="ri-logout-box-r-line" ><span>LogOut</span></i></a>
                </li>
            </ul>
        </aside>
        <!-- End Sidebar -->
        <!-- MAIN -->
        <main class="main-container">
    <main>
        <br><br>
    <section id="hero">
            <!----------------------- Login Container -------------------------->
            <div class="row border rounded-5 p-3 bg-white shadow box-area" style="max-width: 700px; width: 100%; margin-left: 160px;">
                <!--------------------------- Left Box ----------------------------->
                <div class="col-md-7 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                    <div class="featured-image mb-3">
                    </div>
                    <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;"></p>
                    <small class="text-white text-wrap text-center" style="width: 17rem; font-family: 'Courier New', Courier, monospace;"></small>
                </div>
                <!--------------------------- Right Box ----------------------------->
                <div class="container right-box scroll-bg">
                <div class="row align-items-center scroll-div">
               <div class="header-text mb-4">
               <h4 style="float: right; margin-right:54%;">Personal Information</h4>
              <hr id="line"/>
              <form action="update_process.php" method="POST">
               <div class="main-user-info">
               <div class="user-input-box">
              <label for="firstname">First name</label>
              <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($_SESSION['firstname']); ?>" placeholder="Update this" required>
               </div>
        <div class="user-input-box">
            <label for="middlename">Middle name</label>
            <input type="text" id="middlename" name="middlename" value="<?php echo isset($_SESSION['middlename']) ? htmlspecialchars($_SESSION['middlename']) : ''; ?>" required>
        </div>
        <div class="user-input-box">
            <label for="lastname">Last name</label>
            <input type="text" id="lastname" name="lastname" value="<?php echo isset($_SESSION['lastname']) ? htmlspecialchars($_SESSION['lastname']) : ''; ?>" required>
        </div>
        <div class="user-input-box">
            <label for="suffix">Suffix</label>
            <input type="text" id="suffix" name="suffix" value="<?php echo isset($_SESSION['suffix']) ? htmlspecialchars($_SESSION['suffix']) : ''; ?>">
        </div>
        <div class="user-input-box">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo isset($_SESSION['date_of_birth']) ? $_SESSION['date_of_birth'] : ''; ?>" required>
        </div>
        <div class="user-input-box">
            <label for="place_of_birth">Place of Birth</label>
            <input type="text" id="place_of_birth" name="place_of_birth" value="<?php echo $place_of_birth; ?>" required>
        </div>
        <div class="user-input-box">
            <label for="sex">Sex</label>
            <input type="text" id="sex" name="sex" value="<?php echo isset($_SESSION['sex']) ? $_SESSION['sex'] : ''; ?>" required>
        </div>
        <div class="user-input-box">
            <label for="email">Email Address</label>
            <input type="text" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>
        </div>
        <div class="user-input-box">
            <label for="region">Region</label>
            <input type="text" id="region" name="region" value="<?php echo isset($_SESSION['region']) ? $_SESSION['region'] : ''; ?>" required>
        </div>
        <div class="user-input-box">
            <label for="province">Province</label>
            <input type="text" id="province" name="province" value="<?php echo isset($_SESSION['province']) ? $_SESSION['province'] : ''; ?>" required>
        </div>
        <div class="user-input-box">
            <label for="town">Town</label>
            <input type="text" id="town" name="town" value="<?php echo isset($_SESSION['town']) ? $_SESSION['town'] : ''; ?>" required>
        </div>
        <div class="user-input-box">
            <label for="baranggay">Baranggay</label>
            <input type="text" id="baranggay" name="baranggay" value="<?php echo isset($_SESSION['baranggay']) ? $_SESSION['baranggay'] : ''; ?>" required>
        </div>
        <div class="user-input-box">
            <label for="street">Street</label>
            <input type="text" id="street" name="street" value="<?php echo isset($_SESSION['street']) ? $_SESSION['street'] : ''; ?>" required>
        </div>
        <div class="user-input-box">
            <label for="zip_code">Zip Code</label>
            <input type="text" id="zip_code" name="zip_code" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)" value="<?php echo isset($_SESSION['zip_code']) ? $_SESSION['zip_code'] : ''; ?>" required>
        </div>
        <div class="user-input-box">
            <label for="cellphone_number">Cellphone Number</label>
            <input type="text" id="cellphone_number" name="cellphone_number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)" value="<?php echo isset($_SESSION['cellphone_number']) ? $_SESSION['cellphone_number'] : ''; ?>" required>
        </div>
        <div class="user-input-box">
            <label for="landline_number">Landline Number</label>
            <input type="text" id="landline_number" name="landline_number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)" value="<?php echo isset($_SESSION['landline_number']) ? $_SESSION['landline_number'] : ''; ?>" required>
        </div>
        <div class="user-input-box">
            <label for="civil_status">Civil Status</label>
            <input type="text" id="civil_status" name="civil_status" value="<?php echo isset($_SESSION['civil_status']) ? $_SESSION['civil_status'] : ''; ?>" required>
        </div>
        <div class="user-input-box">
            <label for="religion">Religion</label>
            <input type="text" id="religion" name="religion" value="<?php echo isset($_SESSION['religion']) ? $_SESSION['religion'] : ''; ?>" required>
        </div>
    </div>

    <h4 style="float: right; margin-right: 57%;">Family Background</h4>
    <hr id="line" />
    <form action="update_process.php" method="POST">
    <div class="main-user-info">
        <div class="user-input-box">
            <label for="father_name">Father's Name</label>
            <input type="text" id="father_name" style="margin-top: 20px;" name="father_name" value="<?php echo isset($_SESSION['father_name']) ? htmlspecialchars($_SESSION['father_name']) : ''; ?>">
        </div>
        <div class="user-input-box">
            <label for="father_contact_number">Father's Contact Number</label>
            <input type="text" id="father_contact_number" name="father_contact_number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)" value="<?php echo isset($_SESSION['father_contact_number']) ? $_SESSION['father_contact_number'] : ''; ?>">
        </div>
        <div class="user-input-box">
            <label for="father_occupation">Father's Occupation</label>
            <input type="text" id="father_occupation" name="father_occupation" value="<?php echo isset($_SESSION['father_occupation']) ? $_SESSION['father_occupation'] : ''; ?>">
        </div>
        <div class="user-input-box">
            <label for="mother_name">Mother's Name</label>
            <input type="text" id="mother_name" style="margin-top: 20px;" name="mother_name" value="<?php echo isset($_SESSION['mother_name']) ? $_SESSION['mother_name'] : ''; ?>">
        </div>
        <div class="user-input-box">
            <label for="mother_contact_number">Mother's Contact Number</label>
            <input type="text" id="mother_contact_number" name="mother_contact_number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)" value="<?php echo isset($_SESSION['mother_contact_number']) ? $_SESSION['mother_contact_number'] : ''; ?>">
        </div>
        <div class="user-input-box">
            <label for="mother_occupation">Mother's Occupation</label>
            <input type="text" id="mother_occupation" name="mother_occupation" value="<?php echo isset($_SESSION['mother_occupation']) ? $_SESSION['mother_occupation'] : ''; ?>">
        </div>
        <div class="user-input-box">
            <label for="guardian_name">Guardian's Name</label>
            <input type="text" id="guardian_name"  style="margin-top: 20px;" name="guardian_name" value="<?php echo isset($_SESSION['guardian_name']) ? $_SESSION['guardian_name'] : ''; ?>">
        </div>
        <div class="user-input-box">
            <label for="guardian_contact_number">Guardian's Contact Number</label>
            <input type="text" id="guardian_contact_number" name="guardian_contact_number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)" value="<?php echo isset($_SESSION['guardian_contact_number']) ? $_SESSION['guardian_contact_number'] : ''; ?>" required>
        </div>
        <div class="user-input-box">
            <label for="guardian_occupation">Guardian's Occupation</label>
            <input type="text" id="guardian_occupation" name="guardian_occupation" value="<?php echo isset($_SESSION['guardian_occupation']) ? $_SESSION['guardian_occupation'] : ''; ?>">
        </div>
    </div>

    <h4 style="float: right; margin-right: 45%;">Educational Background</h4>
    <hr id="line" />
    <span class="title" style="margin-left: 5px;">Elementary</span>
    <div class="main-user-info">
        <div class="user-input-box">
            <label for="father_name">School Name</label>
            <input type="text" id="elementary_school_name" name="elementary_school_name" value="<?php echo isset($_SESSION['elementary_school_name']) ? $_SESSION['elementary_school_name'] : ''; ?>">
            </div>
        <div class="user-input-box">
            <label for="elementary_school_address">School Address</label>
            <input type="text" id="elementary_school_address" name="elementary_school_address" value="<?php echo isset($_SESSION['elementary_school_address']) ? $_SESSION['elementary_school_address'] : ''; ?>">
            </div>
            <div class="user-input-box" style="margin-left: 11px";>
            <label for="elementary_year_graduated">Year Graduated</label>
            <input type="text" id="elementary_year_graduated" name="elementary_year_graduated" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)" value="<?php echo isset($_SESSION['elementary_year_graduated']) ? $_SESSION['elementary_year_graduated'] : ''; ?>">
            </div>
            </div>
            <div class="user-input-box">
            <label for="elementary_type">Type</label>
            <input type="text" id="elementary_type" name="elementary_type" value="<?php echo isset($_SESSION['elementary_type']) ? $_SESSION['elementary_type'] : ''; ?>">
            </div></div>
        <br>
        <div class="main-user-info">
        <span class="title" style="margin-left: 15px; margin-top: -30px;">High School</span>
         <div class="user-input-box" style="margin-left: -116px;">
            <br>
          <label for="high_school_name">School Name</label>
          <input type="text" id="high_school_name" name="high_school_name" value="<?php echo isset($_SESSION['high_school_name']) ? $_SESSION['high_school_name'] : ''; ?>">
         </div>
          <div class="user-input-box">
            <br>
          <label for="high_school_address">School Address</label>
          <input type="text" id="high_school_address" name="high_school_address" value="<?php echo isset($_SESSION['high_school_address']) ? $_SESSION['high_school_address'] : ''; ?>">
          </div>
          <div class="user-input-box">
            <br>
          <label for="high_school_year_graduated">Year Graduated</label>
          <input type="text" id="high_school_year_graduated" name="high_school_year_graduated" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)" value="<?php echo isset($_SESSION['high_school_year_graduated']) ? $_SESSION['high_school_year_graduated'] : ''; ?>">
        </div>
          <div class="user-input-box">
            <br>
          <label for="high_school_type" style="margin-left: 8px;">Type</label>
         <input type="text" id="high_school_type" name="high_school_type" style="margin-left: 8px;"
         value="<?php echo isset($_SESSION['high_school_type']) ? $_SESSION['high_school_type'] : ''; ?>">
         <br>
        </div></div>
        <br>
        <div class="main-user-info">
        <span class="title" style="margin-left: 15px; margin-top: -30px;">Senior High School</span>
         <div class="user-input-box" style="margin-left: -146px;">
            <br>
          <label for="high_school_name">School Name</label>
          <input type="text" id="senior_high_school_name" name="senior_high_school_name" value="<?php echo isset($_SESSION['senior_high_school_name']) ? $_SESSION['senior_high_school_name'] : ''; ?>">
         </div>
          <div class="user-input-box">
            <br>
          <label for="high_school_address">School Address</label>
          <input type="text" id="senior_high_school_address" name="senior_high_school_address" value="<?php echo isset($_SESSION['senior_high_school_address']) ? $_SESSION['senior_high_school_address'] : ''; ?>">
          </div>
          <div class="user-input-box">
            <br>
          <label for="high_school_year_graduated">Year Graduated</label>
          <input type="text" id="senior_high_school_year_graduated" name="senior_high_school_year_graduated" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)" value="<?php echo isset($_SESSION['senior_high_school_year_graduated']) ? $_SESSION['senior_high_school_year_graduated'] : ''; ?>">
        </div>
          <div class="user-input-box">
            <br>
          <label for="high_school_type" style="margin-left: 8px;">Type</label>
         <input type="text" id="senior_high_school_type" name="senior_high_school_type" style="margin-left: 8px;"
         value="<?php echo isset($_SESSION['senior_high_school_type']) ? $_SESSION['senior_high_school_type'] : ''; ?>">
         <br>
        </div></div>
        <h4 style="float: right; margin-right: 52%;">Admission Information</h4>
<hr id="line" />
<div class="user-info">
    <form id="uploadForm" method="POST" action="update_process.php" enctype="multipart/form-data">
    <div class="insert-box">
        <label for="preferred_course">Preferred Courses</label>
        <select name="preferred_course" id="preferred_course">
            <option value="Bachelor Of Arts In Journalism" <?php if ($preferred_course == "Bachelor Of Arts In Journalism") echo "selected"; ?>>Bachelor Of Arts In Journalism</option>
            <option value="Bachelor Of Early Childhood Education" <?php if ($preferred_course == "Bachelor Of Early Childhood Education") echo "selected"; ?>>Bachelor Of Early Childhood Education</option>
            <option value="Bachelor Of Elementary Education" <?php if ($preferred_course == "Bachelor Of Elementary Education") echo "selected"; ?>>Bachelor Of Elementary Education</option>
            <option value="Bachelor Of Science In Business Management" <?php if ($preferred_course == "Bachelor Of Science In Business Management") echo "selected"; ?>>Bachelor Of Science In Business Management</option>
            <option value="Bachelor Of Science In Computer Science" <?php if ($preferred_course == "Bachelor Of Science In Computer Science") echo "selected"; ?>>Bachelor Of Science In Computer Science</option>
            <option value="Bachelor Of Science In Entrepreneurship" <?php if ($preferred_course == "Bachelor Of Science In Entrepreneurship") echo "selected"; ?>>Bachelor Of Science In Entrepreneurship</option>
            <option value="Bachelor Of Science In Hospitality Management" <?php if ($preferred_course == "Bachelor Of Science In Hospitality Management") echo "selected"; ?>>Bachelor Of Science In Hospitality Management</option>
            <option value="Bachelor Of Science In Information Technology" <?php if ($preferred_course == "Bachelor Of Science In Information Technology") echo "selected"; ?>>Bachelor Of Science In Information Technology</option>
            <option value="Bachelor Of Science In Office Administration" <?php if ($preferred_course == "Bachelor Of Science In Office Administration") echo "selected"; ?>>Bachelor Of Science In Office Administration</option>
            <option value="Bachelor Of Science In Psychology" <?php if ($preferred_course == "Bachelor Of Science In Psychology") echo "selected"; ?>>Bachelor Of Science In Psychology</option>
            <option value="Bachelor Of Secondary Education" <?php if ($preferred_course == "Bachelor Of Secondary Education") echo "selected"; ?>>Bachelor Of Secondary Education</option>
        </select>
    </div>
    <div class="insert-box">
        <label for="lrn">Learner's Reference Number</label>
        <input type="text" id="lrn" name="lrn" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12)" value="<?php echo isset($_SESSION['lrn']) ? $_SESSION['lrn'] : ''; ?>">
    </div>
    <br>
    <form action="includes/fileUpload.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
    </div>
    <div class="mb-3">
    </div>
    <div class="button-container">
    </div>
        <div class="form-submit-btn" style="margin-left: 200px; width: 150px; height: 40px;">
            <input type="submit" value="Save Changes">
        </div>
    </form>
</div>
</div>
</div>
</div>
</section>
</main>
<!-- End Main -->

<!-- Custom JS -->
<script src="/css/stud.js"></script>

</body>
</html>
