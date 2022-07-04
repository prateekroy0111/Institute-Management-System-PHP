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
	<title>Manage Student Details</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

	<div class="container">
		<?php
			require 'header.php';
		?>
		<div class="row heading2 grids">
			<div class="col-sm-6 mx-auto">
				<u>Manage Student Details</u>
			</div>
		</div>
		<div class="row grids">
			<div class="col-sm-12 mx-auto">
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Contact</th>
							<th>Batch Name</th>
							<th>Manage</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$display_query=mysqli_query($cont,"select * from student_details");
						while($row_display=mysqli_fetch_array($display_query))
						{                                                    
					?>
						<tr>
							<td><?php echo $row_display['student_name']; ?></td>
							<td><?php echo $row_display['email']; ?></td>
							<td><?php echo $row_display['contact']; ?></td>
							<td><?php echo $row_display['batch_name']; ?></td>
							<td>
								<a class="btn btn-warning" href="edit%20student.php?id=<?php echo $row_display['id']; ?>"><i class="fas fa-user-edit"></i></a>
								<a class="btn btn-danger" href="delete%20student.php?id=<?php echo $row_display['id']; ?>"><i class="fa fa-trash-alt"></i></a>
							</td>
						</tr>
					<?php
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php
		require 'footer.php';
	?>
</body>

</html>
