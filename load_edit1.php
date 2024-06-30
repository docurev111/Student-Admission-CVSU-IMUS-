<?php
	require_once('connect.php');
	$sql = $con->query("SELECT * FROM `personalinformation` WHERE `student_id` = '$_REQUEST[student_id]'") or die(mysqli_error($con));
	$row = $sql->fetch_array();
?>

<form method = "POST" action = "edit_student_query.php?STUDENT_ID=<?php echo $row['student_id']?>" enctype = "multipart/form-data">
	<div class  = "modal-body" id="addstudentbody">
		<div class = "form-group" id="form-group">
			<input type = "text" name = "LRN" value="<?php echo $row['student_id']?>" required = "required" id="form-control1" class = "form-control" />
			<div class="form-text" id="form-text">Student_id</div>	
		</div>
		<div class="row" id="name">
		<div class="col" id="name">
			<div class = "form-group" id="form-group">
				<input type = "text" name = "LNAME" value="<?php echo $row['lastname'];?>" required = "required" id="form-control1" class = "form-control" />
				<div class="form-text" id="form-text">Last Name</div>
			</div>
			</div>
			<div class="col" id="name">
			<div class = "form-group" id="form-group">
				<input type = "text" name = "FNAME" value="<?php echo $row['firstname'];?>" required = "required" id="form-control1" class = "form-control" />
				<div class="form-text" id="form-text">First Name</div>
			</div>
			</div>
			<div class="col" id="name">
			<div class = "form-group" id="form-group">
				<input type = "text" name = "MNAME" value="<?php echo $row['mi'];?>" required = "required" id="form-control1" class = "form-control" />
				<div class="form-text" id="form-text">Middle Initial</div>
			</div>
			</div>
		</div>
		<div class="row" id="name">
			<div class="col" id="name">
			<div class = "form-group" id="form-group">
				<input name = "SEX" value="<?php echo $row['sex'];?>" required = "required" id="form-control1" class = "form-control">
				<div class="form-text" id="form-text">Sex</div>
			</div>
			</div>
		</div>
		</div>
		<div id="savebutton1" class="text-center">
			<button  class = "btn btn-primary" id="save-student" name = "admin_save"><span class = "glyphicon glyphicon-save"></span> Save</button>
	</div>
</form>

<script type="text/javascript">
    $(function(){
        $('#save-student').click(function(){
            Swal.fire({
                'icon' : 'success',
                'title': 'The student record has been changed successfully!',
                'type': 'success',
                'showCancelButton': false,
                'showConfirmButton': false,
            });
        });
      });
</script>


