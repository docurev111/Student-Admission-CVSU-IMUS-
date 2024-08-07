<?php
session_start();
$student_id = $_SESSION['student_id'];
?>
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
                            <h4 style="float: right; margin-right: 48%;">Attach files</h4>
                            <hr id="line" />
                        </div>
                    
                        <form action="includes/fileUpload.php" method="post" enctype="multipart/form-data">
    <input class="form-control" type="text" name="student_id" id="student_id" value="<?php echo htmlspecialchars($_SESSION['student_id']); ?>" readonly>
    <div class="mb-3">
        <label for="formFile" class="form-label">2x2 Picture</label>
        <input class="form-control" type="file" name="id_pic" id="id_pic" accept="image/jpeg, image/png">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Grade 12 - Report Card</label>
        <input class="form-control" type="file" name="card" id="card" accept="application/pdf">
    </div>
    <div class="button-container">
        <button type="submit" name="submit" class="btn-complete">Upload</button>
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


    








