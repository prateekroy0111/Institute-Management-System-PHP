<?php 
include 'configure.php';
if(isset($_POST['login'])){	
	$username=$_POST['username'];	
	$password=$_POST['password'];			
	$qry=mysqli_query($cont,"SELECT * FROM admin_login WHERE username='$username' AND password='$password'") or die(mysqli_error($cont));
	$count=mysqli_num_rows($qry);
	$fetch=mysqli_fetch_array($qry);
	$db_username=$fetch['username'];
	$db_pass=$fetch['password'];
    
    if($count==1 && $db_username==$username && $db_pass==$password){
        session_start();
		$_SESSION['username']=$username;
		if(isset($_POST['remember_me'])){ // if user check the remember me checkbox
            $twoDays = 60 * 60 * 24 * 2 + time();
            setcookie('username', $_POST['username'], $twoDays);
            setcookie('password', $_POST['password'], $twoDays);
        } else { // if user not check the remember me checkbox
            $twoDaysBack = time() - 60 * 60 * 24 * 2;
            setcookie('username', '', $twoDaysBack);
            setcookie('password', '', $twoDaysBack);
        }
        header("Location:index.php");   
	}else{
		echo "<script>alert('Please enter correct username and password');</script>";
	}  
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
		<div class="row">
			<div class="col-sm-5 mx-auto">
				<div class="login-border">
					<div class="row">
						<div class="col-sm-12 ">
							<img src="logo.png" class="mx-auto d-block mt-sm-2">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-10 mx-auto">
							<form method="post">
								<div class="form-group">
									<label for="usr">Username:</label>
									<input type="text" class="form-control" id="usr" name="username" value="<?php  if(isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>" required>
								</div>
								<div class="form-group">
									<label for="pwd">Password:</label>
									<input type="password" class="form-control" id="pwd" name="password" value="<?php  if(isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>" required>
								</div>
								<div class="form-group">
									<div class="clearfix">
										<input type="submit" class="btn btn-primary float-left" name="login" value="LOGIN">
										<input type="reset" class="btn btn-danger float-right" name="submit" value="RESET">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<input type="checkbox" name="remember_me"> &nbsp;Remember Me
										</div>
									</div>
								</div>
							</form>
							<div class="row">
								<div class="form-group">
									<input type="submit" class="btn btn-warning" name="login" value="LOGIN">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
