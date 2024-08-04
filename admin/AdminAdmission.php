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
        <link rel="stylesheet" href="../css/AdminAdmission.css">
        <link rel="stylesheet" href="../css/Admintemp.css">
        <link rel="stylesheet" href="../css/actionmodal.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css"/>
        <style>
            .custom-modal-footer {
            display: flex;
            justify-content: flex-end; /* Align items to the end (right side) */
        }

        .custom-modal-footer .btn-approve,
        .custom-modal-footer .btn-reject {
            margin-left: 10px; /* Optional: Add space between buttons */
        }

        /* Modal Styling */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5); /* Semi-transparent background */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 60%;
            max-width: 400px;
            text-align: center;
        }

        .modal-buttons {
            margin-top: 20px;
        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }


        </style>
    </head>
    <body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="top">
            <div class="logo">
                    <h3>Admin <br> Admission<h3>
                </div>
                <i class="bx bx-menu" id="btn" style="font-size: 2rem;"></i>
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
                    <img src="../images/cvsulogo.png" alt="" width="60px" height="50px" >CVSU
                </div>
            </div>
                <div class="container">
                    
                    <div class="white-container">
                    <!-- Modal for student info approve -->
                    
                    <div class="custom-modal" id="custom-modal" tabindex="-1" role="dialog" aria-labelledby="myModallabel">
                        <div class="custom-modal-dialog" role="document">
                            <div class="custom-modal-content">
                                <div class="custom-modal-header">
                                    <h4 class="custom-modal-title" id="myModallabel">Approve Student</h4>
                                    <button type="button" class="custom-close-button">Close</button>
                                </div>
                                <div class="custom-modal-body" id="edit_query"></div>
                                <div class="custom-modal-footer">
                                    <button type="button" class="btn-approve" onclick="openModal()">Approve</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end -->

                    <!-- Modal for rejecting student -->
                    <div class="custom-modal" id="reject-custom-modal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel">
                        <div class="custom-modal-dialog" role="document">
                            <div class="custom-modal-content">
                                <div class="custom-modal-header">
                                    <h4 class="custom-modal-title" id="rejectModalLabel">Reject Student</h4>
                                    <button type="button" class="custom-close-button">Close</button>
                                </div>
                                <div class="custom-modal-body" id="reject_edit_query">
                                    <!-- Content related to rejection will be loaded here -->
                                </div>
                                <div class="custom-modal-footer">
                                    <button type="button" class="btn-reject" onclick="submitReject()">Reject</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "
                                    SELECT p.student_id, p.firstname, p.middlename, p.lastname, p.email, p.cellphone_number, a.status, a.preferred_course 
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
                                    <td><?php $fullname =  $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'];
                                        echo $fullname;?></td>  
                                    <td><?php echo $row['email'];?></td> 
                                    <td><?php echo $row['cellphone_number'];?></td>
                                    <td><?php echo $row['preferred_course'];?></td>
                                    <td><?php echo $row['status'];?></td>
                                    <!-- modal buttons -->
                                    <td>
                                    <!-- Button to trigger the modal -->
                                    <button type="button" class="btn-open-modal" id="btn-open-modal" style="font-size: 1rem" name="<?php echo isset($row['student_id']) ? $row['student_id'] : ''; ?>">
                                    <i class='bx bxs-file-import'></i>
                                    </button>
                                    <button type="button" class="btn-open-reject-modal" id="btn-open-reject-modal" style="font-size: 1rem" name="<?php echo isset($row['student_id']) ? $row['student_id'] : ''; ?>">
                                        <i class='bx bxs-folder-minus'></i>
                                    </button>


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
                                    <th>Action</th>
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

   <!-- Script for modal student info -->
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
    // Select all elements with the class 'btn-open-modal'
    var elements = document.querySelectorAll('.btn-open-modal');

    // Attach a click event listener to each element
    elements.forEach(function(element) {
        element.addEventListener('click', function() {
            // Get the value of the 'name' attribute of the clicked element
            var STUDENT_ID = this.getAttribute('name');

            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Define the callback function to handle the response
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Insert the response into the element with id 'edit_query'
                    document.getElementById('edit_query').innerHTML = xhr.responseText;
                    // Show the modal
                    document.getElementById('custom-modal').style.display = 'block';
                }
            };

            // Open the request
            xhr.open('GET', 'load_action.php?student_id=' + encodeURIComponent(STUDENT_ID), true);

            // Send the request
            xhr.send();
        });
    });

    // Close modal when the close button is clicked
    var closeModalBtn = document.querySelector('.custom-close-button');
    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', function() {
            document.getElementById('custom-modal').style.display = 'none';
        });
    }

    // Close modal when clicking outside the modal content
    window.addEventListener('click', function(event) {
        var modal = document.getElementById('custom-modal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
});

</script>
<!-- rejectcode -->
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
    // Select all elements with the class 'btn-open-modal'
    var elements = document.querySelectorAll('.btn-open-reject-modal');

    // Attach a click event listener to each element
    elements.forEach(function(element) {
        element.addEventListener('click', function() {
            // Get the value of the 'name' attribute of the clicked element
            var STUDENT_ID = this.getAttribute('name');

            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Define the callback function to handle the response
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Insert the response into the element with id 'edit_query'
                    document.getElementById('reject_edit_query').innerHTML = xhr.responseText;
                    // Show the modal
                    document.getElementById('reject-custom-modal').style.display = 'block';
                }
            };

            // Open the request
            xhr.open('GET', 'reject_load_action.php?student_id=' + encodeURIComponent(STUDENT_ID), true);

            // Send the request
            xhr.send();
        });
    });

    // Close modal when the close button is clicked
    var closeModalBtn = document.querySelector('.custom-close-button');
    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', function() {
            document.getElementById('reject-custom-modal').style.display = 'none';
        });
    }

    // Close modal when clicking outside the modal content
    window.addEventListener('click', function(event) {
        var modal = document.getElementById('reject-custom-modal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
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

    <!-- approve code -->

    <script>
        function openModal() {
            var modal = document.getElementById("approveModal");
            modal.style.display = "block";

            // Get the student ID from the input field
            var studentId = document.getElementById("id").value;

            // Set the student ID value dynamically
            document.getElementById("studentId").value = studentId;
        }

        function closeModal() {
            var modal = document.getElementById("approveModal");
            modal.style.display = "none";
        }
    </script>
<!-- reject code -->
    <script>
       function submitReject() {
            var modal = document.getElementById("rejectModal");
            modal.style.display = "block";

            // Get the student ID from the input field
            var studentId = document.getElementById("id").value;

            // Set the student ID value dynamically
            document.getElementById("studentId").value = studentId;
        }

        function closeRejectModal() {
            var modal = document.getElementById("rejectModal");
            modal.style.display = "none";
        }

    </script>
</html>