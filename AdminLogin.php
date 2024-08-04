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
	<link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/footer.css"/>
</head>
<body>
    <style>
        body {
        background-image: url(./images/extra12.jpg);
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
                </ul>
                <a href="" class="action_button">Get Started</a>
                    <!-- <button class="btnLogin-popup"><a href="#">Login</a></button> -->
                <div class="toggle_btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
                
    </div> 
            
    <div class="dropdown_menu">
        <li><a href="home.html">HOME</a></li>
        <li><a href="#">ABOUT CVSU</a></li>
        <li><a href="#">ADMISSION</a></li>
        <li><a href="#">ACADEMICS</a></li>
        <li><a href="#">CONTACTS</a></li>
        <li><a href="" class="action_button">Get Started</a></li>
    </div>
        </header>
        <br>
<main>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <a href="Loginm.php">
                    <img class = "logo" img src="./images/schoolnewlogo.png" alt="logo-top-left" width="80px" height="60px">
                    </a>
                    <div class="text">
                    <p><i></i></p>
                        </div>
                    </div>
                    
                <div class="col-md-6 right">
                    <div class="input-box">
                    <header class="login-header">Login as an admin</header>
                       <form id="loginForm">
                        <label for="email">Username:</label>
                        <input type="text" id="user" name="user" required class="input"><br><br>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required class="input"><br><br>
                        <div class="input-field">
                                <a href="admin/AdminDashboard.php"><input type="button" class="submit" value="Login" style="width: 100%";></a>
                            </div>
                    </form>
                       <div class="signin">
                       </div>
                    </div>
                    </div>
</form>
                    <div class = "dropdown_menu">
                        <li><a href="/home.html">Home</a></li>
                        <li><a href="/About.html">About CVSU</a></li>
                        <li><a href="/Admissions.html">Admissions</a></li>
                        <li><a href="/course.html">Academics</a></li>
                        <li><a href="/contact.html">Contacts</a></li>
                        <li><a href = "/Loginm.php" class = "action_btn">Get Started</a></li>
</div></div>
	</div>
</main>
</div>
</footer>	
</section>
<script>
    window.addEventListener('scroll', function () {
        var header = document.querySelector('header');
        if (window.scrollY > 0) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
    
    const toggleBtn = document.querySelector('.toggle_btn');
    const toggleBtnIcon = document.querySelector('.toggle_btn i');
    const dropDownMenu = document.querySelector('.dropdown_menu');
    
    toggleBtn.onclick = function() {
        dropDownMenu.classList.toggle('open');
        const isOpen = dropDownMenu.classList.contains('open');
        toggleBtnIcon.classList = isOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars';
    };
    
    
</script>
</body>
</html>


