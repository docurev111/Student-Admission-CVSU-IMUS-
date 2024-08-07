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
        <div class="sidebar dashboard" style="height:128%;">
            <div class="top">
                <div class="logo">
                    <h4>Admin <br> Dashboard</h4>
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
                        <span class="nav-item">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
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
                    <a href="../AdminLogin.php">
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
                    <img src="../images/cvsulogo.png" alt="" width="40px" height="40px" >CVSU
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
                            <img src="../images/recieved.png" width="30rem" height="30rem" >
                        </div>

                        <div class="card card2">
                            <div class="textcontent">
                                <div class="tcheading">Pending</div>
                                <div class="description"><?php echo $pending;?></div>
                            </div>
                            <img src="../images/pending.png" width="30rem" height="30rem">
                        </div>

                        <div class="card card3">
                            <div class="textcontent">
                                <div class="tcheading">Approved</div>
                                <div class="description"><?php echo $approved;?></div>
                            </div>
                            <img src="../images/approve.png" width="30rem" height="30rem">
                        </div>

                        <div class="card card4">
                        <div class="pchart">
                            <canvas id="pieChart" width="220" height="220"></canvas>
                        </div>
                    </div>

                        <div class="card card5">
                            <div class="textcontent">
                                <div class="tcheading">Rejected</div>
                                <div class="description"><?php echo $rejected;?></div>
                            </div>
                            <img src="../images/reject.png" width="30rem" height="30rem" >
                        </div>

                        <div class="card card6">
                            <div class="pchart">
                                <canvas id="coursePieChart" width="150" height="150"></canvas>
                            </div>
                        </div>

                    </div>
                    <div class="anndiv">
                    <?php
                        // Fetch announcements from the database
                        $result = $con->query("SELECT * FROM announcements WHERE deleted=0");

                        // Check if there are announcements
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Output each announcement with CSS containers
                                echo '<div class="announcement-container">';
                                echo '<div class="announcement-title">' . htmlspecialchars($row['title']) . '</div>';
                                echo '<div class="announcement-content">' . htmlspecialchars($row['content']) . '</div>';
                                echo '</div>';
                                echo '<br>';
                            }
                        } else {
                            // Handle case when no announcements are available
                            echo '<p class="no-announcement">No announcements available.</p>';
                        }

                        // Close database connection
                        $con->close();
                        ?>
                        </div>
                </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    
        <script>
        document.addEventListener('DOMContentLoaded', function () {
        fetch('fetch_data.php')
            .then(response => response.json())
            .then(data => {
            // Process data for course pie chart
            const courseLabels = data.course_chart.map(item => item.preferred_course);
            const courseValues = data.course_chart.map(item => item.count);

            const ctxCoursePie = document.getElementById('coursePieChart').getContext('2d');
            const coursePieChart = new Chart(ctxCoursePie, {
                type: 'pie',
                data: {
                labels: courseLabels,
                datasets: [{
                    label: 'Preferred Courses',
                    data: courseValues,
                    backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(54, 162, 235, 0.2)'
                    
                    ],
                    borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
                },
                options: {
                responsive: true,
                maintainAspectRatio: false
                }
            });

            // Initialize the existing pie chart (pieChart) if needed
            const pieData = data.pie_chart;

            const ctxPie = document.getElementById('pieChart').getContext('2d');
            const pieChart = new Chart(ctxPie, {
                type: 'pie',
                data: {
                labels: ['Approved', 'Pending', 'Rejected'],
                datasets: [{
                    label: 'Admission Status',
                    data: [pieData.approved, pieData.pending, pieData.rejected],
                    backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
                },
                options: {
                responsive: true,
                maintainAspectRatio: false
                }
            });
            })
            .catch(error => console.error('Error fetching or parsing data:', error));
        });

</script>




    </body>

    <script>
        let btn = document.querySelector('#btn')
        let sidebar = document.querySelector('.sidebar')

        btn.onclick = function () {
            sidebar.classList.toggle('active');
        };
    </script>
</html>