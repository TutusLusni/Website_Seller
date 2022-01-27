<!DOCTYPE html>
<?php 
session_start();

if ($_SESSION["role"]=="admin") {	
}else{
	header("location:../login.php");
}

?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/datepicker3.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<!-- <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt=""> -->
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $_SESSION["nama"]; ?></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<?php if (!isset($hal)){
				$hal=null;
			} ?>
				
			<?php if ($hal=="index") {
				echo '<li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>';
			}else{
				echo '<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>';
			} ?>
			
			<?php if ($hal=="barang") {
				echo '<li class="active"><a href="barang.php"><em class="fa fa-table">&nbsp;</em>Barang</a></li>';
			}else{
				echo '<li><a href="barang.php"><em class="fa fa-table">&nbsp;</em>Barang</a></li>';
			} ?>

			<?php if ($hal=="user") {
				echo '<li class="active"><a href="user.php"><em class="fa fa-user">&nbsp;</em>User</a></li>';
			}else{
				echo '<li><a href="user.php"><em class="fa fa-user">&nbsp;</em>User</a></li>';
			} ?>

			<?php if ($hal=="transaksi") {
				echo '<li class="active"><a href="transaksi.php"><em class="fa fa-shopping-bag">&nbsp;</em>Transaksi</a></li>';
			}else{
				echo '<li><a href="transaksi.php"><em class="fa fa-shopping-bag">&nbsp;</em>Transaksi</a></li>';
			} ?>
			<!-- <li><a href="barang.php"><em class="fa fa-table">&nbsp;</em>Barang</a></li>
			<li><a href="user.php"><em class="fa fa-user">&nbsp;</em>User</a></li>
			<li><a href="transaksi.php"><em class="fa fa-shopping-bag">&nbsp;</em>Transaksi</a></li> -->
			<li><a href="../index.php"><em class="fa fa-home">&nbsp;</em>Index</a></li>
			<li>
				<a href="logout.php"><em class="fa fa-power-off">&nbsp;</em>Logout</a>
			</li>
		</ul>
	</div><!--/.sidebar-->