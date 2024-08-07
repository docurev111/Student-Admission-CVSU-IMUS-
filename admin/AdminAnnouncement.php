<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/AdminAnnouncement.css">
    <link rel="stylesheet" href="../css/Admintemp.css">

</head>
<body>
    
    <style>
        <?php include"css/AdminAnnouncement.css"?>
    </style>

    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <h3>Admin <br> Announcement</h3>
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
            <li>
                <a href="AdminAnnouncement.php">
                    <i class='bx bxs-bell-ring'></i>
                    <span class="nav-item">Announcement</span>
                </a>
                <span class="tooltip">Announcement</span>
            </li>   
            <li>
                <a href="../AdminLogin.php" id="logoutLink">
                    <i class='bx bxs-exit'></i>
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
                <div class="card-container">
                    <div class="announcements">
                        <div class="title-div">
                            <p style="font-size: 18px;font-family: 'Times New Roman', Times, serif; padding-bottom: 5px;">Announcements</p>
                            <input type="text" id="title" class="title-box" name="textbox" value="">
                        </div>
                        <div class="content">
                            <input type="text" id="content" class="content-box" name="textbox" value="">
                        </div>
                        <div class="btn-div">
                            <button class="btn btnprev"><b>Previous</b></button>
                            <button class="btn btndel"><b>Delete</b></button>
                            <button class="btn btnup"><b>Update</b></button>
                            <button class="btn btnnext"><b>Next</b></button>
                        </div>
                        <br><hr>
                    </div>
                    <div class="make-announcement">
                        <div class="title-div2">
                            <p style="font-size: 18px;font-family: 'Times New Roman', Times, serif; padding-bottom: 5px;">Make Announcement</p>
                            <input type="text" id="title2" class="title-box" name="textbox" value="Title:">
                        </div>
                        <div class="content">
                            <input type="text" id="content2" class="content-box" name="textbox">
                        </div>
                        <div class="btn-div-mka">
                            <button class="btn btnclear"><b>Clear</b></button>
                            <button class="btn btnpost"><b>Post</b></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let btn = document.querySelector('#btn');
        let sidebar = document.querySelector('.sidebar');

        btn.onclick = function() {
            sidebar.classList.toggle('active');
        };
    </script>

<script>
    let currentAnnouncementIndex = 0;
    const announcements = <?php
        // Fetch announcements from the database
        require_once('connect.php');
        $result = $con->query("SELECT * FROM announcements WHERE deleted = FALSE ORDER BY created_at DESC LIMIT 4");
        $announcements = array();
        while ($row = $result->fetch_assoc()) {
            $announcements[] = $row;
        }
        echo json_encode($announcements);
    ?>;

    function displayAnnouncement(index) {
        if (announcements[index]) {
            document.getElementById('title').value = announcements[index].title;
            document.getElementById('content').value = announcements[index].content;
        } else {
            alert('No announcement found at this index.');
        }
    }

    document.querySelector('.btnprev').onclick = function() {
        if (currentAnnouncementIndex > 0) {
            currentAnnouncementIndex--;
            displayAnnouncement(currentAnnouncementIndex);
        } else {
            alert('No previous announcement.');
        }
    };

    document.querySelector('.btnnext').onclick = function() {
        if (currentAnnouncementIndex < announcements.length - 1) {
            currentAnnouncementIndex++;
            displayAnnouncement(currentAnnouncementIndex);
        } else {
            alert('No next announcement.');
        }
    };

    document.querySelector('.btnpost').onclick = function() {
        const title = document.getElementById('title2').value;
        const content = document.getElementById('content2').value;

        if (!title || !content) {
            alert('Title and content cannot be empty.');
            return;
        }

        fetch('post_announcement.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ title: title, content: content })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Announcement posted successfully.');
                console.log('Announcement posted:', data.announcement);
                // Optionally update UI or perform other actions
            } else {
                alert('Error posting announcement: ' + data.message);
                console.error('Error posting announcement:', data.message);
            }
        })
        .catch(error => {
            alert('Error posting announcement: ' + error.message);
            console.error('Error posting announcement:', error);
        });
    };

    document.querySelector('.btnclear').onclick = function() {
        document.getElementById('title2').value = '';
        document.getElementById('content2').value = '';
    };

    document.querySelector('.btndel').onclick = function() {
        if (announcements[currentAnnouncementIndex]) {
            const id = announcements[currentAnnouncementIndex].announcement_id;
            fetch(`delete_announcement.php?announcement_id=${id}`, {
                method: 'DELETE',
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Announcement deleted successfully.');
                    // Remove the deleted announcement from the array
                    announcements.splice(currentAnnouncementIndex, 1);
                    // Display the next or previous announcement
                    if (currentAnnouncementIndex >= announcements.length) {
                        currentAnnouncementIndex = announcements.length - 1;
                    }
                    displayAnnouncement(currentAnnouncementIndex);
                } else {
                    alert('Error deleting announcement: ' + data.message);
                    console.error('Error deleting announcement:', data.message);
                }
            })
            .catch(error => {
                alert('Error deleting announcement: ' + error.message);
                console.error('Error deleting announcement:', error);
            });
        } else {
            alert('No announcement selected for deletion.');
        }
    };

    document.querySelector('.btnup').onclick = function() {
        const title = document.getElementById('title').value;
        const content = document.getElementById('content').value;

        if (!title || !content) {
            alert('Title and content cannot be empty.');
            return;
        }

        if (announcements[currentAnnouncementIndex]) {
            const id = announcements[currentAnnouncementIndex].announcement_id;
            fetch(`update_announcement.php?announcement_id=${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ title: title, content: content })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Announcement updated successfully.');
                    announcements[currentAnnouncementIndex].title = title;
                    announcements[currentAnnouncementIndex].content = content;
                    // Optionally update UI or perform other actions
                } else {
                    alert('Error updating announcement: ' + data.message);
                    console.error('Error updating announcement:', data.message);
                }
            })
            .catch(error => {
                alert('Error updating announcement: ' + error.message);
                console.error('Error updating announcement:', error);
            });
        } else {
            alert('No announcement selected for update.');
        }
    };

    // Initialize with the first announcement
    if (announcements.length > 0) {
        displayAnnouncement(0);
    }
</script>

</body>
</html>
