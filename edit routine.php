<?php
    include 'configure.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:login.php");
    }
    $id=$_REQUEST['id'];
    if(!isset($id))
    {
        header("Location:manage routine.php");
    }
    $query_display=mysqli_query($cont,"select * from class_routine where id='$id'");
    $row_display=mysqli_fetch_array($query_display);

    if(isset($_POST['update']))
    {
        $batch_name=$_POST['batch_name'];
        $start_time=$_POST['start_time'];
        $end_time=$_POST['end_time'];
        $days= implode(',', $_POST['days']);
        
        $query=mysqli_query($cont,"update class_routine set batch_name='$batch_name',start_time='$start_time',end_time='$end_time',days='$days' where id='$id'");
        if($query)
        {
            echo "<script>alert('CLASS ROUTINE UPDATED SUCCESSFULLY')</script>";
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
	<title>Edit Class Routine</title>
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
				<center><u>Edit Class Routine Details</u></center>
			</div>
		</div>
		<div class="row grids">
			<div class="col-sm-12 mx-auto bold">
				<form method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Batch Name:</label>
								<select class="form-control" name="batch_name">
									<option value=""><?php echo $row_display['batch_name']; ?></option>
									<option value="">-----Select Batch-----</option>
									<?php
										$display_batch=mysqli_query($cont,"select batch_name from batch_details");
										while($row_batch=mysqli_fetch_array($display_batch))
										{                                                    
									?>
									<option><?php echo $row_batch['batch_name']; ?></option>
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
								<label for="start_time">Start Time (24hr format):</label>
								<input type="time" class="form-control" id="start_time" name="start_time" value="<?php echo $row_display['start_time']; ?>">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="end_time">End Time (24hr format):</label>
								<input type="time" class="form-control" id="end_time" name="end_time" value="<?php echo $row_display['end_time']; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="start_time">Days:</label>
								<br>
								<?php 
									$chkbox=$row_display['days'];
									$days=explode(",",$chkbox);
								?>
								<input type="checkbox" name="days[]" value="Monday" <?php if(in_array( "Monday",$days)){echo "checked";}?> /> Monday &nbsp;
								<br><input type="checkbox" name="days[]" value="Tuesday" <?php if(in_array( "Tuesday",$days)){echo "checked";}?> /> Tuesday &nbsp;
								<br><input type="checkbox" name="days[]" value="Wednesday" <?php if(in_array( "Wednesday",$days)){echo "checked";}?> /> Wednesday &nbsp;
								<br><input type="checkbox" name="days[]" value="Thursday" <?php if(in_array( "Thursday",$days)){echo "checked";}?> /> Thursday &nbsp;
								<br><input type="checkbox" name="days[]" value="Friday" <?php if(in_array( "Friday",$days)){echo "checked";}?> /> Friday &nbsp;
								<br><input type="checkbox" name="days[]" value="Saturday" <?php if(in_array( "Saturday",$days)){echo "checked";}?> /> Saturday &nbsp;
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
