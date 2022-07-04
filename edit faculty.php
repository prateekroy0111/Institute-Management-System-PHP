<?php
    include 'configure.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:login.php");
    }
    $id=$_REQUEST['id'];
    if(!isset($id))
    {
        header("Location:manage faculty.php");
    }
    $query_display=mysqli_query($cont,"select * from faculty_details where id='$id'");
    $row_display=mysqli_fetch_array($query_display);

    if(isset($_POST['update']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $contact=$_POST['contact'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $pincode=$_POST['pincode'];
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $course_name= implode(',', $_POST['course_name']);
        
      	$query=mysqli_query($cont,"update faculty_details set name='$name',email='$email',contact='$contact',address='$address',city='$city',state='$state',pincode='$pincode',dob='$dob',gender='$gender',course_name='$course_name' where id='$id'");
        if($query)
        {
            echo "<script>alert('FACULTY DETAILS UPDATED SUCCESSFULLY')</script>";
        }
        else
        {
            echo "<script>alert('ERROR')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Edit Faculty Details</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link href="css/style.css?v=1.0" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="container">
		<?php
			require 'header.php';
		?>
		<div class="row heading2 grids">
			<div class="col-sm-6 mx-auto ">
				<center><u>Edit Faculty Details</u></center>
			</div>
		</div>
		<div class="row grids">
			<div class="col-sm-12 mx-auto bold">
				<form method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="name">Name:</label>
								<input type="text" class="form-control" id="name" name="name" value="<?php echo $row_display['name']; ?>">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="email">Email:</label>
								<input type="email" class="form-control" id="email" name="email" value="<?php echo $row_display['email']; ?>">
							</div>

						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="contact">Contact:</label>
								<input type="number" class="form-control" id="contact" name="contact" value="<?php echo $row_display['contact']; ?>">
							</div>

						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="dob">Date of Birth:</label>
								<input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row_display['dob']; ?>">
							</div>

						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="address">Address:</label>
								<textarea class="form-control" id="address" name="address">
									<?php echo $row_display['address']; ?>
								</textarea>
							</div>

						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="city">City:</label>
								<input type="text" class="form-control" id="city" name="city" value="<?php echo $row_display['city']; ?>">
							</div>

						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="state">State:</label>
								<input type="text" class="form-control" id="state" name="state" value="<?php echo $row_display['state']; ?>">
							</div>

						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="pincode">Pincode:</label>
								<input type="number" class="form-control" id="pincode" name="pincode" value="<?php echo $row_display['pincode']; ?>">
							</div>

						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Gender:</label>
								<br>
								<input type="radio" class="form-control-input" name="gender" value="male" <?php if($row_display['gender']=='male') echo 'checked'; ?>>&nbsp;MALE
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" class="form-control-input" name="gender" value="female" <?php if($row_display['gender']=='female') echo 'checked'; ?>>&nbsp;FEMALE
							</div>

						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Course Name:</label>
								<?php
									$chkbox=$row_display['course_name'];
									$course=explode(",",$chkbox);
									$display_course=mysqli_query($cont,"select course_name from course_details");
									while($row_course=mysqli_fetch_array($display_course))
									{                                                    
								?>
								<br>
								<input type="checkbox" name="course_name[]" value="<?php echo $row_course['course_name']; ?>" class="form-control-input" <?php if(in_array($row_course['course_name'],$course)){echo "checked";}?>> &nbsp;<?php echo $row_course['course_name']; ?>
								<?php
									}
								?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="clearfix">
							<input type="submit" class="btn btn-primary float-left" name="update" value="UPDATE">
							<input type="reset" class="btn btn-danger float-right" name="submit" value="RESET">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
		require 'footer.php';
	?>
</body>

</html>
