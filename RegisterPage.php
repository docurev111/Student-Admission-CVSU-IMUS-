<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous"/>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

	<title>Login</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="image/schoolicon.ico">
	<link rel="stylesheet" href="./css/login.css"/>
    <link rel="stylesheet" href="./css/registerpage.css"/>
    <link rel="stylesheet" href="./css/footer.css"/>
</head>
<body>
    <style>
        body {
        background-color: aliceblue;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed; 
        background-position: center;
        min-height: 100vh; 
        display: flex;
        flex-direction: column; 
        }
        .side-image {
        background-image: url("./images/people.png");
        background-position: center;
        background-repeat: no-repeat;
        border-radius: 10px 0 0 10px;
    }

    </style>
    <div class="headerContainer ">
        <header>
            
            <div class="navbar">
                <div class="logo">
                    <img class = "nav_logo"
                    img src="images/schoolnewlogo.png" >CVSU
                    </div>
                <ul class="links">
                    <li><a href="home.html">HOME</a></li>
                    <li><a href="About.html">ABOUT CVSU</a></li>
                    <li><a href="Admissions.html">ADMISSION</a></li>
                    <li><a href="course.html">ACADEMICS</a></li>
                    <li><a href="contact.html">CONTACTS</a></li>
                </ul>
                <a href="Loginm.php" class="action_button">Get Started</a>
                    <!-- <button class="btnLogin-popup"><a href="#">Login</a></button> -->
                <div class="toggle_btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
                
    </div> 
            
    <div class="dropdown_menu">
        <li><a href="home.html">HOME</a></li>
        <li><a href="About.html">ABOUT CVSU</a></li>
        <li><a href="Admissions.html">ADMISSION</a></li>
        <li><a href="course.html">ACADEMICS</a></li>
        <li><a href="contact.html">CONTACTS</a></li>
        <li><a href="Loginm.php" class="action_button">Get Started</a></li>
    </div>
        </header>
        <br>
    <div class = "text-above-boxes" style = "margin-top: 40px;">
        <h3>Application Form for Admission</h3>
    </div>
    <div class="container">
        <div class="title">Admission Form</div>
        <form action="#">
            <div class="user-details">
            <div class="input-box">
                <span class="details">First Name</span>
                <input type="text" placeholder="Enter your first name">
        </div>
        <div class="input-box">
                <span class="details">Middle Name</span>
                <input type="text" placeholder="Enter your first name">
        </div>
        <div class="input-box">
                <span class="details">Last Name</span>
                <input type="text" placeholder="Enter your first name">
        </div>
        <div class="input-box">
                <span class="details">Suffix</span>
                <input type="text" placeholder="Enter your first name">
        </div>
        <div class="input-box">
                <span class="details">Date of Birth</span>
                <input type="text" placeholder="Enter your first name">
        </div>
        </div>
        <div class="input-box">
                <span class="details">Place of Birth</span>
                <input type="text" placeholder="Enter your first name">
        </div>
        <div class="input-box">
                <span class="sex-title">Sex</span>
                <div class="category">
                    <label for="">
                        <span class="dot one">></span>
                        <span class="sex">Male</span>
                    </label> 
                    <label for="">
                        <span class="dot one">></span>
                        <span class="sex">Female</span>
                    </label> 
        </div>
        <div class="input-box">
                <span class="details">Region</span>
                <input type="text" placeholder="Enter your first name">
        </div>
        <div class="input-box">
                <span class="details">Province</span>
                <input type="text" placeholder="Enter your first name">
        </div>
        <div class="input-box">
                <span class="details">Town</span>
                <input type="text" placeholder="Enter your first name">
        </div>
        <div class="input-box">
                <span class="details">Baranggay</span>
                <input type="text" placeholder="Enter your first name">
        </div>
        <div class="input-box">
                <span class="details">Street</span>
                <input type="text" placeholder="Enter your first name">
        </div>
        <div class="input-box">
                <span class="details">Zip Code</span>
                <input type="text" placeholder="Enter your first name">
        </div>
        <div class="input-box">
                <span class="details">Date of Birth</span>
                <input type="text" placeholder="Enter your first name">
        </div>
        <div class="input-box">
                <span class="details">Date of Birth</span>
                <input type="text" placeholder="Enter your first name">
        </div>
        <div class="input-box">
                <span class="details">Date of Birth</span>
                <input type="text" placeholder="Enter your first name">
        </div>
        <div class = "button">
            <input type="submit" value="Register">
        </form>
    </div>