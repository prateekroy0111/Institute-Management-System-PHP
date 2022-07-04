<?php
   	include 'configure.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>ROY Institutes</title>
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
		<div class="row grids">
			<div class="col-sm-4 icon">
				<div class="clearfix">
					<i class="fas fa-user fa-8x float-left"></i>
					<div class="dropdown float-right box">
						<button type="button" class="btn btn-primary dropdown-toggle pt-sm-1" data-toggle="dropdown">
							Student
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="add%20student.php">Add Student Details</a>
							<a class="dropdown-item" href="manage%20student.php">Manage Student Details</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4 icon">
				<div class="clearfix">
					<i class="fas fa-user-tie fa-8x float-left"></i>
					<div class="dropdown float-right box">
						<button type="button" class="btn btn-primary dropdown-toggle pt-sm-1" data-toggle="dropdown">
							Faculty
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="add%20faculty.php">Add Faculty Details</a>
							<a class="dropdown-item" href="manage%20faculty.php">Manage Faculty Details</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4 icon">
				<div class="clearfix">
					<i class="fas fa-calendar-alt fa-8x float-left"></i>
					<div class="dropdown float-right box">
						<button type="button" class="btn btn-primary dropdown-toggle pt-sm-1" data-toggle="dropdown">
							Student Att.
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="add%20attendance.php">Mark Attendance</a>
							<a class="dropdown-item" href="manage%20attendance.php">View Attendance</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row grids">
			<div class="col-sm-4 icon">
				<div class="clearfix">
					<i class="fas fa-book fa-8x float-left"></i>
					<div class="dropdown float-right box">
						<button type="button" class="btn btn-primary dropdown-toggle pt-sm-1" data-toggle="dropdown">
							Course
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="add%20course.php">Add Course Details</a>
							<a class="dropdown-item" href="manage%20course.php">Manage Course Details</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4 icon">
				<div class="clearfix">
					<i class="fas fa-users fa-8x float-left"></i>
					<div class="dropdown float-right box">
						<button type="button" class="btn btn-primary dropdown-toggle pt-sm-1" data-toggle="dropdown">
							Batch
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="add%20batch.php">Add Batch Details</a>
							<a class="dropdown-item" href="manage%20batch.php">Manage Batch Details</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4 icon">
				<div class="clearfix">
					<i class="fa fa-clock fa-8x float-left"></i>
					<div class="dropdown float-right box">
						<button type="button" class="btn btn-primary dropdown-toggle pt-sm-1" data-toggle="dropdown">
							Class Routine
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="add%20routine.php">Add Class Routine</a>
							<a class="dropdown-item" href="manage%20routine.php">Manage Class Routine</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		require 'footer.php';
	?>
</body>

</html>
