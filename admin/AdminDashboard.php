<!DOCTYPE html>
<?php
    require_once'connect.php';
    session_start();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width", initial-scale="1.0">
        <title>Admin Dashboard</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        
        <link rel="stylesheet" href="../css/AdminDB.css">
        <link rel="stylesheet" href="../css/Admintemp.css">
    </head>
    <body>
        <div class="sidebar">
            <div class="top">
                <div class="logo">
                    <h2>Admin <br> Dashboard</h2>
                </div>
                <i class="bx bx-menu" id="btn" style="font-size: 2rem;"></i>
            </div>
            <!-- <div class="user">
                <p>Admin Name</p>
            </div> -->
            <ul>
                <li>
                    <a href="AdminDashboard.php">
                        <i class='bx bxs-home'></i>
                        <span class="nav-item">Home</span>
                    </a>
                    <span class="tooltip">Home</span>
                </li>
                <li>
                    <a href="AdminAdmission.php">
                        <i class='bx bxs-file-blank'></i>
                        <span class="nav-item">Admission</span>
                    </a>
                    <span class="tooltip">Admission</span>
                </li>
                </li>
                <li>
                    <a href="AdminAnnouncement.php">
                        <i class='bx bxs-bell-ring'></i>
                        <span class="nav-item">Announcement</span>
                    </a>
                    <span class="tooltip">Announcement</span>
                </li>   
                <li>
                    <a href="">
                        <i class='bx bxs-exit' ></i>
                        <span class="nav-item">Logout</span>
                    </a>
                    <span class="tooltip">Logout</span>
                </li>
            </ul>
        </div>
        
        <div class="main-content">
            <div class="tophead">
            
                <div class="toplogo">
                    <img src="../images/cvsulogo.png" alt="" width="60px" height="50px" >CVSU
                </div>
            </div>
                <!-- get data from db -->
                <?php 
                    $sqlcount = "SELECT COUNT(student_id) FROM `admissioninformation`";
                    $sqlpending = "SELECT COUNT(*) FROM `admissioninformation` WHERE status = 'Pending'";
                    $sqlapproved = "SELECT COUNT(*) FROM `admissioninformation` WHERE status = 'Approved'";
                    $sqlrejected = "SELECT COUNT(*) FROM `admissioninformation` WHERE status = 'Rejected'";


                    // Execute the queries
                    $displaycount = $con->query($sqlcount) or die($con->error);
                    $displaypending = $con->query($sqlpending) or die($con->error);
                    $displayapproved = $con->query($sqlapproved) or die($con->error);
                    $displayrejected = $con->query($sqlrejected) or die($con->error);

                    // Fetch the results
                    $count = $displaycount->fetch_assoc()['COUNT(student_id)'];
                    $pending = $displaypending->fetch_assoc()['COUNT(*)'];
                    $approved = $displayapproved->fetch_assoc()['COUNT(*)'];
                    $rejected = $displayrejected->fetch_assoc()['COUNT(*)'];

                ?>
                <div class="container">
                    
                    
                    <div class="card-container">
                        <div class="card card1">
                            <div class="textcontent">
                                <div class="tcheading">Recieved</div>
                                <div class="description"><?php echo $count;?></div>
                            </div>
                            <img src="../images/recieved.png" >
                        </div>

                        <div class="card card2">
                            <div class="textcontent">
                                <div class="tcheading">Pending</div>
                                <div class="description"><?php echo $pending;?></div>
                            </div>
                            <img src="../images/pending.png">
                        </div>

                        <div class="card card3">
                            <div class="textcontent">
                                <div class="tcheading">Approved</div>
                                <div class="description"><?php echo $approved;?></div>
                            </div>
                            <img src="../images/approve.png">
                        </div>

                        <div class="card card4">
                            <div class="textcontent">
                                <div class="tcheading">Pie Chart</div>
                            </div>
                        </div>

                        <div class="card card5">
                            <div class="textcontent">
                                <div class="tcheading">Rejected</div>
                                <div class="description"><?php echo $rejected;?></div>
                            </div>
                            <img src="../images/reject.png">
                        </div>

                        <div class="card card6">
                            <div class="textcontent">
                                <div class="tcheading">Line Graph</div>
                            </div>
                        </div>

                        <div class="card card7">
                            <div class="textcontent">
                                <div class="tcheading">Announcment</div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </body>

    <script>
        let btn = document.querySelector('#btn')
        let sidebar = document.querySelector('.sidebar')

        btn.onclick = function () {
            sidebar.classList.toggle('active');
        };
    </script>
</html>