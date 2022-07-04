<?php
    include 'configure.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:login.php");
    }
    $id=$_REQUEST['id'];
    if(!isset($id))
    {
        header("Location:manage batch.php");
    }
    $query_display=mysqli_query($cont,"select * from batch_details where id='$id'");
    $row_display=mysqli_fetch_array($query_display);

    if(isset($_POST['update']))
    {
        $batch_name=$_POST['batch_name'];
        $course_name=$_POST['course_name'];
        $start_date=$_POST['start_date'];
        $end_date=$_POST['end_date'];
        
        $query_register=mysqli_query($cont,"update batch_details set batch_name='$batch_name',course_name='$course_name',start_date='$start_date',end_date='$end_date' where id='$id'");
        if($query_register)
        {
            echo "<script>alert('BATCH DETAILS UPDATED SUCCESSFULLY')</script>";
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
	<title>Edit Batch Details</title>
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
				<center><u>Edit Batch Details</u></center>
			</div>
		</div>
		<div class="row grids">
			<div class="col-sm-12 mx-auto bold">
				<form method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="batch_name">Batch Name:</label>
								<input type="text" class="form-control" id="batch_name" name="batch_name" value="<?php echo $row_display['batch_name']; ?>">
							</div>

						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Course Name:</label>
								<br>
								<select class="form-control" name="course_name">
									<option value=""><?php echo $row_display['course_name']; ?></option>
									<option value="">Select Course Name</option>
									<?php
										$display_course=mysqli_query($cont,"select course_name from course_details");
										while($row_course=mysqli_fetch_array($display_course))
										{                                                    
									?>
									<option><?php echo $row_course['course_name']; ?></option>
									<?php
										}
									?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="startdate">Starting Date:</label>
								<input type="date" class="form-control" id="startdate" name="start_date" value="<?php echo $row_display['start_date']; ?>">
							</div>

						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="enddate">Ending Date:</label>
								<input type="date" class="form-control" id="enddate" name="end_date" value="<?php echo $row_display['end_date']; ?>">
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
