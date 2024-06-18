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
        <link rel="stylesheet" href="css/AdminAdmission.css">
        <link rel="stylesheet" href="css/Admintemp.css">
        
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css"/>
        
    </head>
    <body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="top">
                <div class="logo">
                    <i class='bx bxs-cog' style="padding-right: 10px;"></i>
                    <span>Admission System</span>
                </div>
                <i class="bx bx-menu" id="btn" style="font-size: 2rem;"></i>
            </div>
            <div class="user">
                <p>Admin Name</p>
            </div>
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
                    <a href="AdminAnnouncement.html">
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
                    <img src="images/cvsulogo.png" style="width: 50px; height: 50px;">
                    <H2 style="color: white;">CvSU Imus</H2>
                </div>
            </div>
                <div class="container">
                    <p style="font-size: 20px; font-weight: bold; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; margin: 10px 0px 10px 22px ;">Admissions</p>
                    <div class="white-container">
                    <div class="table-container">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone #</th>
                                <th>Course</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "
                                SELECT p.student_id, p.firstname, p.mi, p.lastname, p.email, p.cellphone_number, a.status, a.first_choice_course 
                                FROM 
                                    personalinformation p
                                LEFT JOIN 
                                    admissioninformation a 
                                ON 
                                    p.student_id = a.student_id
                            ";
                            $personinfo = $con->query($sql) or die ($con->error);
                            while($row = $personinfo->fetch_assoc()){;
                        ?>

                            <tr>
                                <td><?php echo $row['student_id'];?></td>
                                <td><?php $fullname =  $row['firstname'] . " " . $row['mi'] . " " . $row['lastname'];
                                    echo $fullname;?></td>  
                                <td><?php echo $row['email'];?></td> 
                                <td><?php echo $row['cellphone_number'];?></td>
                                <td><?php echo $row['first_choice_course'];?></td>
                                <td><?php echo $row['status'];?></td>
                                <!-- modal buttons -->
                                <td>
                                    <button type="button" class="btnview"><i class='bx bx-file-find'></i></button>
                                </td> 
                            </tr>
                        <?php }?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone #</th>
                                <th>Course</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                </div>
                    
                <!-- jQuery -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <!-- Bootstrap JS -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
                <!-- DataTables JS -->
                <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
                <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
                    
                <script>
                    new DataTable('#example', {
                        paging: false,
                        scrollCollapse: true,
                        scrollY: '57vh'
                    });
                </script>
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