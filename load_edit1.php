<?php
	require_once('connect.php');
	$sql = $con->query("SELECT * FROM `personalinformation` WHERE `student_id` = '$_REQUEST[student_id]'") or die(mysqli_error($con));
	$row = $sql->fetch_array();
?>

<style>
        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scrolling if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
            max-width: 600px; /* Maximum width */
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            border-radius: 10px;
        }

        /* Close Button */
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

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>

<!-- Modal Content -->
<div id="editStudentModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <form method="POST" action="edit_student_query.php?STUDENT_ID=<?php echo $row['student_id']?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="LRN">LRN</label>
            <input type="text" name="LRN" value="<?php echo htmlspecialchars($row['student_id']); ?>" required id="LRN">
        </div>
        <div class="form-group">
            <label for="LNAME">Last Name</label>
            <input type="text" name="LNAME" value="<?php echo htmlspecialchars($row['lastname']); ?>" required id="LNAME">
        </div>
        <div class="form-group">
            <label for="FNAME">First Name</label>
            <input type="text" name="FNAME" value="<?php echo htmlspecialchars($row['firstname']); ?>" required id="FNAME">
        </div>
        <div class="form-group">
            <label for="MNAME">Middle Initial</label>
            <input type="text" name="MNAME" value="<?php echo htmlspecialchars($row['mi']); ?>" required id="MNAME">
        </div>
        <div class="form-group">
            <label for="SEX">Sex</label>
            <input type="text" name="SEX" value="<?php echo htmlspecialchars($row['sex']); ?>" required id="SEX">
        </div>
        <button type="submit" class="btn btn-primary" name="admin_save">Save</button>
    </form>
  </div>
</div>

<!-- Bootstrap JS and Popper.js from jsDelivr CDN (at the end of body for faster loading) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

<script>
    // Function to open modal
    function openModal() {
        document.getElementById("editStudentModal").style.display = "block";
    }

    // Function to close modal
    function closeModal() {
        document.getElementById("editStudentModal").style.display = "none";
    }

    // Close modal when clicking outside of it
    window.onclick = function(event) {
        var modal = document.getElementById("editStudentModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<script>
    // Optional: You can use JavaScript to handle modal events if needed
    var myModal = document.getElementById('edit_student');
    myModal.addEventListener('shown.bs.modal', function () {
        // Optional: Code to run when the modal is shown
    });
</script>