<?php
// Load Composer's autoloader
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cvsuadmissionsystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to generate random control number
function generateControlNumber($length = 10) {
    return substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

// Function to check if control number exists
function controlNumberExists($conn, $control_number) {
    $sql = "SELECT control_number FROM accountinformation WHERE control_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $control_number);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->num_rows > 0;
}

// Generate a unique control number
do {
    $control_number = generateControlNumber();
} while (controlNumberExists($conn, $control_number));

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $suffix = $_POST['suffix'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Plain password, no hashing

     // Check if email already exists
     $stmt_check_email = $conn->prepare("SELECT email FROM accountinformation WHERE email = ?");
     $stmt_check_email->bind_param("s", $email);
     $stmt_check_email->execute();
     $stmt_check_email->store_result();
 
     if ($stmt_check_email->num_rows > 0) {
        echo "<script>
        alert('Error: The email address is already in use.');
        window.location.href = 'Register.php'; // Redirect to registration page
        </script>";
     } else {

    // Insert data into personalinformation table
    $stmt_personal = $conn->prepare("INSERT INTO personalinformation (firstname, middlename, lastname, suffix, email) VALUES (?, ?, ?, ?, ?)");
    $stmt_personal->bind_param("sssss", $firstname, $middlename, $lastname, $suffix, $email);

    if ($stmt_personal->execute()) {
        // Get the last inserted student_id
        $student_id = $conn->insert_id;

        // Insert data into accountinformation table
        $stmt_account = $conn->prepare("INSERT INTO accountinformation (student_id, email, password, control_number) VALUES (?, ?, ?, ?)");
        $stmt_account->bind_param("isss", $student_id, $email, $password, $control_number);

        if ($stmt_account->execute()) {
            // Insert data into familybackground table
            $stmt_family = $conn->prepare("INSERT INTO familybackground (student_id) VALUES (?)");
            $stmt_family->bind_param("i", $student_id);
            if ($stmt_family->execute()) {
                echo "Inserted into familybackground successfully<br>";
            } else {
                echo "Error inserting into familybackground: " . $stmt_family->error . "<br>";
            }

            // Insert data into educationalbackground table
            $stmt_educational = $conn->prepare("INSERT INTO educationalbackground (student_id) VALUES (?)");
            $stmt_educational->bind_param("i", $student_id);
            if ($stmt_educational->execute()) {
                echo "Inserted into educationalbackground successfully<br>";
            } else {
                echo "Error inserting into educationalbackground: " . $stmt_educational->error . "<br>";
            }

            // Insert data into id_pic table
            $stmt_id_pic = $conn->prepare("INSERT INTO id_pic (student_id) VALUES (?)");
            $stmt_id_pic->bind_param("i", $student_id);
            if ($stmt_id_pic->execute()) {
                echo "Inserted into id_pic successfully<br>";
            } else {
                echo "Error inserting into id_pic: " . $stmt_id_pic->error . "<br>";
            }

            // Insert data into admissioninformation table
            $stmt_admission = $conn->prepare("INSERT INTO admissioninformation (student_id) VALUES (?)");
            $stmt_admission->bind_param("i", $student_id);
            if ($stmt_admission->execute()) {
                echo "Inserted into admissioninformation successfully<br>";
            } else {
                echo "Error inserting into admissioninformation: " . $stmt_admission->error . "<br>";
            }

             // PHPMailer setup and send email
             $mail = new PHPMailer(true);
             try {
                 // Server settings
                 $mail->isSMTP();
                 $mail->Host = 'in-v3.mailjet.com'; // Mailjet SMTP server
                 $mail->SMTPAuth = true;
                 $mail->Username = 'b563129b60700b10ec8c653e20b1697b'; // Mailjet API Key
                 $mail->Password = '5fcca40e9a0eeae5eec2939908eedd66'; // Mailjet API Secret
                 $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                 $mail->Port = 587; // Mailjet SMTP port
 
                 // Recipients
                 $mail->setFrom('deanalcober@gmail.com', 'CVSU Office of Registration');
                 $mail->addAddress($email, $firstname . ' ' . $lastname);
 
                 // Content
                 $mail->isHTML(true);
                 $mail->Subject = 'Registration Successful';
                 $mail->Body    = "Hello, you are successfully registered! Here is your control number: <b>$control_number</b>. <br> Please wait until further notice.
                 Additional information will be provided once you have been accepted.
                 <br>
                 How will you know if you are accepted? You will get an email from us that indicates that you have been successfully admitted to this school.
                 <br><br><br>
                 Regards, CVSU Office of Registration";
 
                 $mail->send();
                 echo 'Message has been sent';
             } catch (Exception $e) {
                 echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
             }
 

            // Show success message with control number
            $registration_success = true;
        } else {
            echo "Error inserting account information: " . $stmt_account->error . "<br>";
        }
    } else {
        echo "Error inserting personal information: " . $stmt_personal->error . "<br>";
    }

    // Close the statements and connection
    $stmt_personal->close();
    $stmt_account->close();
    $stmt_family->close();
    $stmt_educational->close();
    $stmt_id_pic->close();
    $stmt_admission->close();
}
    $stmt_check_email->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
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

<!-- Modal structure -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Successfully registered, here is your control number: <span id="control-number"></span></p>
  </div>
</div>

<script>
<?php if (isset($registration_success) && $registration_success): ?>
    // Display modal with control number
    document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById('myModal');
        var span = document.getElementsByClassName('close')[0];
        document.getElementById('control-number').textContent = '<?php echo $control_number; ?>';
        modal.style.display = 'block';

        // Close modal when user clicks on the close button
        span.onclick = function() {
            modal.style.display = 'none';
            window.location.href = 'Loginm.php'; // Redirect to registration form or desired page
        }

        // Close modal when user clicks outside of the modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
                window.location.href = 'Loginm.php'; // Redirect to registration form or desired page
            }
        }
    });
<?php endif; ?>
</script>

</body>
</html>
