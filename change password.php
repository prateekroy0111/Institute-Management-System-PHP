<?php
	include 'configure.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:login.php");
    }

    if(isset($_POST['updatepass']))
    {
	   	$usernm=$_POST['username'];
        $oldpass=$_POST['oldpass'];
        $pass=$_POST['newpass'];
        $repass=$_POST['repass'];
        
        $display_query=mysqli_query($cont,"SELECT * FROM admin_login") or die(mysqli_error($cont));
        $display_row=mysqli_fetch_array($display_query);
        $usernmdb=$display_row['username'];
        $passdb=$display_row['password'];
        
        if($usernm==$usernmdb)
        {
			if($oldpass==$passdb)
			{
				if($pass==$repass){
					$query_passupdate=mysqli_query($cont,"update admin_login set password='$pass' where username='$usernm'") or die(mysqli_error($cont));
					echo "<script>alert('Password Successfully Changed')</script>";
				}
				else{
					echo "<script>alert('Password and Re-password Don\'t Match')</script>";
				}
			}
			else{
				echo "<script>alert('Previous Password Don\'t Match')</script>";
			}     
        }
        else{
            echo "<script>alert('Incorrect Username')</script>";
        }
    }

	if(isset($_POST['updateusernm']))
    {
	   	$username=$_POST['username'];
        $newusername=$_POST['newusername'];
        $pass=$_POST['pass'];
        
        $display_query=mysqli_query($cont,"SELECT * FROM admin_login") or die(mysqli_error($cont));
        $display_row=mysqli_fetch_array($display_query);
        $usernmdb=$display_row['username'];
        $passdb=$display_row['password'];
        
        if($username==$usernmdb)
        {
			if($pass==$passdb)
			{
				$query_update=mysqli_query($cont,"update admin_login set username='$newusername' where username='$username'") or die(mysqli_error($cont));
				echo "<script>alert('Username Successfully Changed')</script>";
				
			}
			else{
				echo "<script>alert('Password Don\'t Match')</script>";
			}     
        }
        else{
            echo "<script>alert('Incorrect Username')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Change Username / Password</title>
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
				<center><u>Change Username / Password</u></center>
			</div>
		</div>
		<div class="row grids">
			<div class="col-sm-4 mx-auto bold">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" value="<?php if(isset($usernm)) echo $usernm; ?>">
					</div>
					<div class="form-group">
						<label for="oldpass">Old Password:</label>
						<input type="password" class="form-control" id="oldpass" name="oldpass">
					</div>
					<div class="form-group">
						<label for="newpass">New Password:</label>
						<input type="password" class="form-control" id="newpass" name="newpass">
					</div>
					<div class="form-group">
						<label for="repass">Re-Enter New Password:</label>
						<input type="password" class="form-control" id="repass" name="repass">
					</div>
					<div class="form-group">
						<div class="clearfix">
							<input type="submit" class="btn btn-primary float-left" name="updatepass" value="UPDATE">
							<input type="reset" class="btn btn-danger float-right" name="submit" value="RESET">
						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-4 mx-auto bold">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" value="<?php if(isset($username)) echo $username; ?>">
					</div>
					<div class="form-group">
						<label for="newusername">New Username:</label>
						<input type="text" class="form-control" id="newusername" name="newusername" value="<?php if(isset($newusername)) echo $newusername; ?>">
					</div>
					<div class="form-group">
						<label for="pass">Password:</label>
						<input type="password" class="form-control" id="pass" name="pass">
					</div>
					<div class="form-group">
						<div class="clearfix">
							<input type="submit" class="btn btn-primary float-left" name="updateusernm" value="UPDATE">
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
