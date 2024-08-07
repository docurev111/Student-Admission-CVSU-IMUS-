<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: login_process.php");
    exit();
}

$student_id = $_SESSION['student_id'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$middlename = $_SESSION['middlename'];
$status = $_SESSION['status'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/studentdash.css">


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
        <?php include "css/studentdash.css" ?>
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
                    <a href="#"><i class="ri-dashboard-line"><span>Dashboard</span></i></a>
                </li>
                <li class="sidebar-list-items">
                    <a href="editapplication.php"><i class="ri-edit-box-line"><span>Edit Application</span></i></a>
                </li>
                <li class="sidebar-list-items">
                    <a href="Loginm.php"><i class="ri-logout-box-r-line" ><span>LogOut</span></i></a>
                </li>
            </ul>
        </aside>
        <!-- End Sidebar -->
        <!-- MAIN -->
        <main class="main-container">
            <div class="main-content">
                <div class="main">
                    <div class="menu-icon" id="menu-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="status">
                        <div class="status-info">
                            <p>May 28, 2024</p>
                            <h2>Status: <?php echo htmlspecialchars($status); ?></h2>
                            <h3>Welcome back, <?php echo htmlspecialchars($firstname . ' ' . $lastname); ?>!</h3>
                            <p>Always stay updated in your student portal</p>
                        </div>
                        <div class="profile">
                            <div class="profile-info">
                                <h5><?php echo htmlspecialchars($firstname . ' ' . $middlename . ' ' . $lastname);?></h5>
                                <h6>Applicant</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="dashboard-content">
                    <div class="info-box id-number">
                        <h4>ID Number</h4>
                        <p><?php echo htmlspecialchars($student_id); ?></p>
                    </div>
                    <div class="info-box registration-status">
                        <h4>Registration Status</h4>
                        <p><?php echo htmlspecialchars($status); ?></p>
                    </div>
                    <!-- Announcment -->
                    <?php
                    // PHP code to fetch and display announcements
                    require_once('connect.php'); // Include database connection script

                    // Fetch announcements from the database
                    $result = $con->query("SELECT * FROM announcements WHERE deleted=0");

                    // Check if there are announcements
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Output each announcement
                            echo '<div class="full-width-announcement">';
                            echo '<h4>' . htmlspecialchars($row['title']) . '</h4>';
                            echo '<p>' . htmlspecialchars($row['content']) . '</p>';
                            echo '</div>';
                            echo '<br>';
                        }
                    } else {
                        // Handle case when no announcements are available
                        echo '<p>No announcements available.</p>';
                    }

                    // Close database connection
                    $con->close();
                    ?>
                </section>
        </main>
        <!-- End Main -->
    </div>

    <!-- Custom JS -->
    <script src="/css/stud.js"></script>

</body>
</html>