<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous"/>
</head>
<body>
    <header>
        <!-- Your existing header code -->
    </header>

    <main>
        <div class="container">
            <h1>Welcome, <?php echo htmlspecialchars($firstname . ' ' . $lastname); ?>!</h1>
            <p>This is your student dashboard.</p>
        </div>
    </main>

    <footer class="footer">
        <!-- Your existing footer code -->
    </footer> 
</body>
</html>
