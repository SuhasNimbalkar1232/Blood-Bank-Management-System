<?php session_start(); ?>
<?php include('dbcon.php');
include_once('includes/header.php');
include_once('includes/navbar.php');
?>
<?php
if (isset($_POST['userlogin'])) {
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	$query 		= mysqli_query($con, "SELECT * FROM donor WHERE  password='$password' and username='$username'");
	$row		= mysqli_fetch_array($query);
	$num_row 	= mysqli_num_rows($query);

	if ($num_row > 0) {
		$_SESSION['user_id'] = $row['id'];
		exit(header('location:userlog/userdashboard.php'));
	} else {
		echo '
								<div class="alert alert-danger alert-dismissible">
                                        Invalid Username & Password.
                                    </div> ';
	}
}
?>
<body>
	<div class="container">
		<form action="#" method="post">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<center>User Login</center>
							</h3>
						</div>
						<div class="panel-body">
							<form role="form">
								<fieldset>
									<div class="form-group">
										<input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
									</div>
									<div class="checkbox">
										<label>
											<input name="remember" type="checkbox" value="Remember Me">Remember Me
										</label>
									</div>
									<!-- Change this to a button or input when using this as a form -->
									<input type="submit" class="btn btn-info btn-block" style="border-radius:0%;" title="Log In" name="userlogin" value="User Login"></input>
								</fieldset>

							</form>

						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>

</html>
<?php
include('includes/footer.php');
?>