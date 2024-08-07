<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="registerfile.php" method="POST">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="middlename">Middle Name</label>
                <input type="text" class="form-control" id="middlename" name="middlename" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="suffix">Suffix</label>
                <input type="text" class="form-control" id="suffix" name="suffix">
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
            </div>
            <div class="form-group">
                <label for="place_of_birth">Place of Birth</label>
                <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" required>
            </div>
            <div class="form-group">
                <label for="sex">Sex</label>
                <select class="form-control" id="sex" name="sex" required>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="region">Region</label>
                <input type="text" class="form-control" id="region" name="region" required>
            </div>
            <div class="form-group">
                <label for="province">Province</label>
                <input type="text" class="form-control" id="province" name="province" required>
            </div>
            <div class="form-group">
                <label for="town">Town</label>
                <input type="text" class="form-control" id="town" name="town" required>
            </div>
            <div class="form-group">
                <label for="barangay">Barangay</label>
                <input type="text" class="form-control" id="barangay" name="barangay" required>
            </div>
            <div class="form-group">
                <label for="street">Street</label>
                <input type="text" class="form-control" id="street" name="street" required>
            </div>
            <div class="form-group">
                <label for="zip_code">Zip Code</label>
                <input type="text" class="form-control" id="zip_code" name="zip_code" required>
            </div>
            <div class="form-group">
                <label for="cellphone_number">Cellphone Number</label>
                <input type="text" class="form-control" id="cellphone_number" name="cellphone_number" required>
            </div>
            <div class="form-group">
                <label for="landline_number">Landline Number</label>
                <input type="text" class="form-control" id="landline_number" name="landline_number">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="civil_status">Civil Status</label>
                <input type="text" class="form-control" id="civil_status" name="civil_status" required>
            </div>
            <div class="form-group">
                <label for="religion">Religion</label>
                <input type="text" class="form-control" id="religion" name="religion" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
</html>
