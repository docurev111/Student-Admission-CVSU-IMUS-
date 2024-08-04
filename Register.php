<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous"/>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

	<title>Register</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="image/schoolicon.ico">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/footer.css"/>
  </head>
  <body>
<style>
    .input-field-wrapper {
    display: flex;
    gap: 20px; /* Adjust the gap between fields as needed */
}
.short-input {
    flex: 0 0 100px; /* Adjust the width as needed */
}
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
.popup{
    width: 400px;
    background: #fff;
    border-radius: 6px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%) scale(0.1);
    text-align: center;
    padding: 0 30px 30px;
    color: #333;
    visibility: hidden;
    transition: transform 0.4s, top 0.4s;
}

.open-popup{
    visibility: visible;
    top: 50%;
    transform: translate(-50%, -50%) scale(1);
}
</style>
    <header>
      <div class="headerContainer">
        <header class="nav-header">
          <div class="navbar">
          <div class="logo">
        <img class="nav_logo" 
        src="images/schoolnewlogo.png" 
        alt="Cavite State University Logo">CVSU
</div>

            <ul class="links">
              <li><a href="home.html">HOME</a></li>
              <li><a href="About.html">ABOUT CVSU</a></li>
              <li><a href="#">ADMISSION</a></li>
              <li><a href="#">ACADEMICS</a></li>
              <li><a href="#">CONTACTS</a></li>
            </ul>
            <a href="" class="action_button">Get Started</a>
            <div class="toggle_btn">
              <i class="fa-solid fa-bars"></i>
            </div>
          </div>
            
          </div> 
    
          <div class="dropdown_menu">
            <li><a href="#">HOME</a></li>
            <li><a href="#">ABOUT CVSU</a></li>
            <li><a href="#">ADMISSION</a></li>
            <li><a href="#">ACADEMICS</a></li>
            <li><a href="#">CONTACTS</a></li>
            <li><a href="" class="action_button">Get Started</a></li>
          </div></div>
  </header>
  <main>
    <br>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                <a href="AdminLogin.php">
                    <img class="logo" src="./images/schoolnewlogo.png" alt="logo-top-left">
                        </a>
                    <div class="text">
                        <p><i></i></p>
                    </div>
                </div>
                <div class="col-md-6 right">
                    <div class="input-box">
                        <header class="login-header">Register</header>
                        <form id="registerForm" method="POST" action="testingregister.php">
                            <div class="input-field-wrapper">
                                <div class="input-field">
                                    <input type="text" class="input" id="firstname" name="firstname" required autocomplete="off">
                                    <label for="firstName">First Name</label>
                                </div>
                                <div class="input-field">
                                    <input type="text" class="input" id="middlename" name="middlename" required autocomplete="off">
                                    <label for="middlename">M. Name</label>
                                </div>
                                <div class="input-field">
                                    <input type="text" class="input" id="lastname" name="lastname" required autocomplete="off">
                                    <label for="lastName">Last Name</label>
                                </div>
                            </div>
                            <div class="input-field-wrapper">
                                <div class="input-field">
                                    <input type="text" class="input" id="suffix" name="suffix" required autocomplete="off">
                                    <label for="suffix">Suffix</label>
                                </div>
                                <div class="input-field">
                                    <input type="email" class="input" id="email" name="email" required autocomplete="off">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" id="password" name="password" required>
                                <label for="pass">Password</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" value="Register">
                            </div>
                        </form>                        
                        <div class="signin">
                            <span>Already have an account? <a href="Loginm.php">Login here</a></span>
                        </div>
                    </div>
                </div>
                <div class="dropdown_menu">
                    <li><a href="hero">Home</a></li>
                    <li><a href="about">About CVSU</a></li>
                    <li><a href="admissions">Admissions</a></li>
                    <li><a href="academics">Academics</a></li>
                    <li><a href="contacts">Contacts</a></li>
                    <li><a href="#" class="action_btn">Get Started</a></li>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="footer">
        <div class="container">
            <div class="footer-row">
                <div class="footer-col">
                    <img class="footer-icon" src="images/gov1.png" alt="Footer Icon">
                </div>
                <div class="footer-col">
                    <h4>GOVERNMENT LINKS</h4>
                    <ul>
                        <li><a href="#">Government PH</a></li>
                        <li><a href="#">CHED</a></li>
                        <li><a href="#">DOST</a></li>
                        <li><a href="#">Cavite PH</a></li>
                        <li><a href="#">Imus City</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>QUICK LINKS</h4>
                    <ul>
                        <li><a href="#">Admission Procedures</a></li>
                        <li><a href="#">Academic Programs</a></li>
                        <li><a href="#">News And Updates</a></li>
                        <li><a href="#">Careers @ CvSU</a></li>
                        <li><a href="#">Downloadable Forms</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>CONTACT INFORMATION</h4>
                    <p style="color: #bbbbbb; margin-left: 23px;">Cavite Civic Center, Palico IV,</p>
                    <p style="color: #bbbbbb; margin-left: 23px;">Imus City, Cavite 4103</p>
                    <p style="color: #bbbbbb; margin-left: 23px;">Admin: (046) 471-6607</p>
                    <p style="color: #bbbbbb; margin-left: 23px;">Registrar: (046) 436-6584</p>
                </div>
</div>
</footer>	
</section>
<script src="css/about.js"></script>
<script>
const toggleBtn = document.querySelector('.toggle_btn')
const toggleBtnIcon = document.querySelector('.toggle_btn i')
const dropDownMenu = document.querySelector('.dropdown_menu')

toggleBtn.onclick = function () {
dropDownMenu.classList.toggle('open')
const isOpen = dropDownMenu.classList.contains('open')

toggleBtnIcon.classlist = isOpen
	? "fa-solid fa-xmark"
	: "fa-solid fa-bars"
}

</script>
<script>
window.addEventListener('scroll', function () {
var header = document.querySelector('.nav-header');
if (window.scrollY > 0) {
	header.classList.add('scrolled');
} else {
	header.classList.remove('scrolled');
}
});
</script>
</body>
</html>
    
  </body>
</html>