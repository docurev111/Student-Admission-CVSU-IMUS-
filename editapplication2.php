<?php
session_start();
include 'db_connect.php';
//Check if the user is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: login_process.php");
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
$barangay = $_SESSION['barangay']; $street = $_SESSION['street']; $zip_code = $_SESSION['zip_code'];
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
                <h4>Student Dashboard</h4>
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
               <h4 style="float: right; margin-right:54%;">Attach Files</h4>
              <hr id="line"/>
              <form id="form2" action="includes/fileUpload.php" method="post" enctype="multipart/form-data">
    <input class="form-control" type="text" name="student_id" id="student_id" value="<?php echo htmlspecialchars($_SESSION['student_id']); ?>" readonly>
    <div class="mb-3">
        <label for="formFile" class="form-label">2x2 Picture</label>
        <input class="form-control" type="file" name="id_pic" id="id_pic" accept="image/jpeg, image/png">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Grade 12 - Report Card</label>
        <input class="form-control" type="file" name="card" id="card" accept="application/pdf">
    </div>
    <div class="form-submit-btn">
        <input type="submit" name="submit" value="Save Changes">
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