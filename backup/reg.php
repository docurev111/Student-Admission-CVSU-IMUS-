<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
	integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
	crossorigin="anonymous" referrerpolicy="no-referrer"/>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous"
    />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous">
    </script>

	<link rel="stylesheet" href="css/reg.css"/>
	<title>Registration Portal - CVSU Imus</title>
    <!-- <style>
        input[type="date"]::-webkit-inner-spin-button,
        input[type="date"]::-webkit-calendar-picker-indicator {
            display: none;
            -webkit-appearance: none;
        }

        input[type="date"]::before {
            content: attr(placeholder);
            color: #999;
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            pointer-events: none;
        }

        input[type="date"]:focus::before,
        input[type="date"]:valid::before {
            content: '';
        }
    </style> -->
</head>
<body>
<header>
	<div class = "navbar">
		<div class = "logo">
				<a href="#">
					<img src="images/schoolname.png" alt="Cavite State University Logo" style="width: 100x; height: 49px;">
			</a>
		</div>
		<ul class = "links">
		<li><a href="hero">Home</a></li>
		<li><a href="about">About CVSU</a></li>
		<li><a href="admissions">Admissions</a></li>
		<li><a href="academics">Academics</a></li>
		<li><a href="contacts">Contacts</a></li>
		</ul>
	<a href = "#" class = "action_btn">Get Started</a>
	<div class = "toggle_btn">
		<i class="fa-solid fa-bars"></i>
	</div>
	</div>

	<div class = "dropdown_menu">
		<li><a href="hero">Home</a></li>
		<li><a href="about">About CVSU</a></li>
		<li><a href="admissions">Admissions</a></li>
		<li><a href="academics">Academics</a></li>
		<li><a href="contacts">Contacts</a></li>
		<li><a href = "#" class = "action_btn">Get Started</a></li>
	</div>
</header>

<main>
    <section id="hero">
        <!----------------------- Main Container -------------------------->
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <!----------------------- Login Container -------------------------->
            <div class="row border rounded-5 p-3 bg-white shadow box-area" style="max-width: 1000px; width: 100%;">
                <!--------------------------- Left Box ----------------------------->
                <div class="col-md-7 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #9BA79C; width:400px">
                    <div class="featured-image mb-3">
                        <img src="images/ladycvsu.png" class="img-fluid" style="width: 400px;">
                    </div>
                    <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;"></p>
                    <small class="text-white text-wrap text-center" style="width: 17rem; font-family: 'Courier New', Courier, monospace;"></small>
                </div>
                <!--------------------------- Right Box ----------------------------->
                <div class="container right-box scroll-bg">
                    <div class="row align-items-center scroll-div">
                        <div class="header-text mb-4">
                            <h4 style="float: right; margin-right: 48%;">Personal Information</h4>
                            <hr id="line" />
                        </div>
                        <form action="includes/db.inc.php" method="POST">
                            <div class="main-user-info">
                                <div class="user-input-box">
                                    <label for="firstname">First name</label>
                                    <input type="text" id="firstname" name="firstname" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="middlename">Middle name</label>
                                    <input type="text" id="middlename" name="middlename" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="lastname">Last name</label>
                                    <input type="text" id="lastname" name="lastname" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="suffix">Suffix</label>
                                    <input type="text" id="suffix" name="suffix">
                                </div>
                                <div class="user-input-box">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="place_of_birth">Place of Birth</label>
                                    <input type="text" id="place_of_birth" name="place_of_birth" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="sex">Sex</label>
                                    <input type="text" id="sex" name="sex" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="email">Email Address</label>
                                    <input type="text" id="email" name="email" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="region">Region</label>
                                    <input type="text" id="region" name="region" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="province">Province</label>
                                    <input type="text" id="province" name="province" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="town">Town</label>
                                    <input type="text" id="town" name="town" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="barangay">Barangay</label>
                                    <input type="text" id="barangay" name="barangay" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="street">Street</label>
                                    <input type="text" id="street" name="street" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="zip_code">Zip Code</label>
                                    <input type="text" id="zip_code" name="zip_code" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="cellphone_number">Cellphone Number</label>
                                    <input type="text" id="cellphone_number" name="cellphone_number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="landline_number">Landline Number</label>
                                    <input type="text" id="landline_number" name="landline_number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="civil_status">Civil Status</label>
                                    <input type="text" id="civil_status" name="civil_status" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="religion">Religion</label>
                                    <input type="text" id="religion" name="religion" required>
                                </div>
                            </div>
                            <h4 style="float: right; margin-right: 53%;">Family Background</h4>
                            <hr id="line" />
                            <div class="main-user-info">
                                <div class="user-input-box">
                                    <label for="father_name">Father's Name</label>
                                    <input type="text" id="father_name" name="father_name">
                                </div>
                                <div class="user-input-box">
                                    <label for="father_contact_number">Contact Number</label>
                                    <input type="text" id="father_contact_number" name="father_contact_number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)">
                                </div>
                                <div class="user-input-box">
                                    <label for="father_occupation">Occupation</label>
                                    <input type="text" id="father_occupation" name="father_occupation">
                                </div>
                                <div class="user-input-box">
                                    <label for="mother_name">Mother's Name</label>
                                    <input type="text" id="mother_name" name="mother_name">
                                </div>
                                <div class="user-input-box">
                                    <label for="mother_contact_number">Contact Number</label>
                                    <input type="text" id="mother_contact_number" name="mother_contact_number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)">
                                </div>
                                <div class="user-input-box">
                                    <label for="mother_occupation">Occupation</label>
                                    <input type="text" id="mother_occupation" name="mother_occupation">
                                </div>
                                <div class="user-input-box">
                                    <label for="guardian_name">Guardian</label>
                                    <input type="text" id="guardian_name" name="guardian_name" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="guardian_contact_number">Contact Number</label>
                                    <input type="text" id="guardian_contact_number" name="guardian_contact_number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)" required>
                                </div>
                                <div class="user-input-box">
                                    <label for="guardian_occupation">Occupation</label>
                                    <input type="text" id="guardian_occupation" name="guardian_occupation" required>
                                </div>
                            </div>
                            <h4 style="float: right; margin-right: 41%;">Educational Background</h4>
                            <hr id="line" />
                            <span class="title" style="margin-left: 5px;">Elementary</span>
                            <div class="main-user-info">
                                <div class="input-box">
                                    <label for="elementary_school_name">School Name</label>
                                    <input type="text" id="elementary_school_name" name="elementary_school_name" required>
                                </div>
                                <div class="input-box">
                                    <label for="elementary_school_address">School Address</label>
                                    <input type="text" id="elementary_school_address" name="elementary_school_address" required>
                                </div>
                                <div class="input-box">
                                    <label for="elementary_year_graduated">Year Graduated</label>
                                    <input type="text" id="elementary_year_graduated" name="elementary_year_graduated" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)" required>
                                </div>
                                <div class="input-box">
                                    <label for="elementary_type">Type</label>
                                    <input type="text" id="elementary_type" name="elementary_type" required>
                                </div>
                            </div>
                            <div class="main-user-info">
                                <span class="title" style="margin-left: 5px; margin-top: -50px;">High School</span> 
                                <div class="input-box" style="margin-left: -116px;">
                                    <label for="high_school_name">School Name</label>
                                    <input type="text" id="high_school_name" name="high_school_name" required>
                                </div>
                                <div class="input-box">
                                    <label for="high_school_address">School Address</label>
                                    <input type="text" id="high_school_address" name="high_school_address" required>
                                </div>
                                <div class="input-box">
                                    <label for="high_school_year_graduated">Year Graduated</label>
                                    <input type="text" id="high_school_year_graduated" name="high_school_year_graduated" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)" required>
                                </div>
                                <div class="input-box">
                                    <label for="high_school_type">Type</label>
                                    <input type="text" id="high_school_type" name="high_school_type" required>
                                </div>
                            </div>
                            <div class="main-user-info">
                                <span class="title" style="margin-left: 5px; margin-top: -50px;">Senior High School</span> 
                                <div class="input-box" style="margin-left: -174px;">
                                    <label for="senior_high_school_name">School Name</label>
                                    <input type="text" id="senior_high_school_name" name="senior_high_school_name" required>
                                </div>
                                <div class="input-box">
                                    <label for="senior_high_school_address">School Address</label>
                                    <input type="text" id="senior_high_school_address" name="senior_high_school_address" required>
                                </div>
                                <div class="input-box">
                                    <label for="senior_high_school_year_graduated">Year Graduated</label>
                                    <input type="text" id="senior_high_school_year_graduated" name="senior_high_school_year_graduated" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)" required>
                                </div>
                                <div class="input-box">
                                    <label for="senior_high_school_type">Type</label>
                                    <input type="text" id="senior_high_school_type" name="senior_high_school_type" required>
                                </div>
                            </div>

                                
                            <h4 style="float: right; margin-right: 44%;">Admission Information</h4>
                            <hr id="line" />
                            <div class="user-info">
                                <div class="insert-box">
                                    <label for="course">Preferred Courses</label>
                                    <select id="course" name="course" required>
                                        <option selected></option>
                                        <option value="BAJ">Bachelor Of Arts In Journalism</option>
                                        <option value="BECE">Bachelor Of Early Childhood Education</option>
                                        <option value="BEED">Bachelor Of Elementary Education</option>
                                        <option value="BSBM">Bachelor Of Science In Business Management</option>
                                        <option value="BSCS">Bachelor Of Science In Computer Science</option>
                                        <option value="BSEP">Bachelor Of Science In Entrepreneurship</option>
                                        <option value="BSHM">Bachelor Of Science In Hospitality Management</option>
                                        <option value="BSIT">Bachelor Of Science In Information Technology</option>
                                        <option value="BSOA">Bachelor Of Science In Office Administration</option>
                                        <option value="BSP">Bachelor Of Science In Psychology</option>
                                        <option value="BSED">Bachelor Of Secondary Education</option>
                                    </select>
                                </div>
                                <div class="insert-box">
                                    <label for="lrn">Learner's Reference Number</label>
                                    <input type="text" id="lrn" name="lrn" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12)" required>
                                </div>
                                <div class="button-container">
                                <button type="submit" class="btn-complete">Next</button>
                                </div>
                                
</form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>



<script>
const toggleBtn = document.querySelector('.toggle_btn')
const toggleBtnIcon = document.querySelector('.toggle_btn i')
const dropDownMenu = document.querySelector('.dropdown_menu')

toggleBtn.onclick = function () {
	dropDownMenu.classList.toggle('open')
	const isOpen = dropDownMenu.classlist.contains('open')

	toggleBtnIcon.classlist = isOpen
		? "fa-solid fa-xmark"
		: "fa-solid fa-bars"

}
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>

<!-- file upload -->
<script>
    document.getElementById('uploadForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        fetch('http://localhost:3000/upload', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error('Error:', error));
    });
</script>


</body>
</html>


    








