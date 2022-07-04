<!DOCTYPE html>
<html lang="en">

<head>
	<title>View Student Details</title>
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
			<div class="col-sm-6 mx-auto">
				<u>Enter Student Details</u>
			</div>
		</div>
		<div class="row grids">
			<div class="col-sm-4 mx-auto bold">
				<form method="post">
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="contact">Contact:</label>
						<input type="number" class="form-control" id="contact" name="contact">
					</div>
					<div class="form-group">
						<label for="dob">Date of Birth:</label>
						<input type="date" class="form-control" id="dob" name="dob">
					</div>
					<div class="form-group">
						<label for="address">Address:</label>
						<textarea class="form-control" id="address" name="address"></textarea>
					</div>
					<div class="form-group">
						<label for="city">City:</label>
						<input type="text" class="form-control" id="city" name="city">
					</div>
					<div class="form-group">
						<label for="state">State:</label>
						<input type="text" class="form-control" id="state" name="state">
					</div>
					<div class="form-group">
						<label for="pincode">Pincode:</label>
						<input type="number" class="form-control" id="pincode" name="pincode">
					</div>

					<div class="form-group">
						<label>Gender:</label>
						<br>
						<input type="radio" class="form-control-input" name="gender" value="male" checked>&nbsp;MALE
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" class="form-control-input" name="gender" value="female">&nbsp;FEMALE
					</div>

					<div class="form-group">
						<label>Course Name:</label>
						<br>
						<select class="form-control" name="course">
							<option>asd</option>
							<option>asd</option>
							<option>asd</option>
						</select>
					</div>

					<div class="form-group">
						<label>Batch Name:</label>
						<br>
						<select class="form-control" name="batch">
							<option>asd</option>
							<option>asd</option>
							<option>asd</option>
						</select>
					</div>

					<div class="form-group">
						<label for="photo">Student Image:</label>
						<input type="file" class="form-control" id="photo" name="photo">
					</div>

					<div class="form-group">
						<input type="submit" class="btn btn-primary" name="submit" value="SUBMIT">
						<input type="reset" class="btn btn-danger" name="submit" value="RESET">
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
