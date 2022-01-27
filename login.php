<!DOCTYPE html>
<?php 
session_start();
require 'admin/fungsi.php';
if (isset($_SESSION["role"])) {
	if ($_SESSION["role"]=="admin") {
		header("location:admin/index.php");
	}
}


	if(isset($_POST['username'])){
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$passbaru=md5($pass);
	
	$result=mysqli_query($koneksi, "SELECT * FROM user WHERE user='$user'");
	if (mysqli_num_rows($result)===1) {
		$row=mysqli_fetch_array($result);
		$p=$row["pass"];
		if ($passbaru==$p) {
			$_SESSION["role"]=$row["kategori"];
			$_SESSION["nama"]=$user;
			if ($_SESSION["role"]=="admin") {
				echo"<script type='text/javascript'>
				alert('Login sukses....');
				document.location.href='admin/index.php';
				</script>";	
			}else{
				echo"<script type='text/javascript'>
				alert('Login sukses....');
				document.location.href='index.php';
				</script>";	
			}
		}else{
			echo "<script type='text/javascript'>
			alert('username atau password salah.....');</script>";
		}
		
	}else{
		echo "<script type='text/javascript'>
		alert('username atau password salah.....');</script>";
	}
	
	
	
}?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" action="" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<!-- <div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div> -->
							<input type="submit" value="login"></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
