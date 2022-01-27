<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<?php 
session_start();
require 'admin/fungsi.php';
if (isset($_SESSION["role"])) {
	//if ($_SESSION["role"]=="user") {
	$role=$_SESSION["role"];
	//}
}else{
	$role=null;
}



?>

<style>
            input[type=text] {
                border: 2px solid #bdbdbd;
                font-family: 'Roboto', Arial, Sans-serif;
            	font-size: 13px;
            	font-weight: 400;
                padding: .5em .75em;
                width: 300px;
            }
            input[type=text]:focus {
                border: 2px solid #757575;
            	outline: none;
            }
            .autocomplete-suggestions {
                border: 1px solid #999;
                background: #FFF;
                overflow: auto;
            }
            .autocomplete-suggestion {
                padding: 2px 5px;
                white-space: nowrap;
                overflow: hidden;
            }
            .autocomplete-selected {
                background: #F0F0F0;
            }
            .autocomplete-suggestions strong {
                font-weight: normal;
                color: #3399FF;
            }
            .autocomplete-group {
                padding: 2px 5px;
            }
            .autocomplete-group strong {
                display: block;
                border-bottom: 1px solid #000;
            }
        </style>
<html>
<head>
<title>Mandiri Jaya Store</title>
<link rel="stylesheet" href="asset/css/bootstrap.min.css">
<link rel="stylesheet" href="asset/bootstrap-select.css">
<link href="asset/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="asset/css/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="asset/css/font-awesome.min.css" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- js -->
<script type="text/javascript" src="asset/js/jquery.min.js"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/bootstrap-select.js"></script>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>

<script type="text/javascript" src="asset/js/jquery.leanModal.min.js"></script>
<link href="asset/css/jquery.uls.css" rel="stylesheet"/>
<link href="asset/css/jquery.uls.grid.css" rel="stylesheet"/>
<link href="asset/css/jquery.uls.lcd.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="asset/css/easy-responsive-tabs.css " />
<script src="asset/js/easyResponsiveTabs.js"></script>
<!-- Source -->
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.php"><span>M</span>J</a>
			</div>
			<div class="header-right">


		<div class="logo">
            <form action="cari.php" method="post" style="padding-top: 15px; padding-right: 250px">
                <input type="text" id="buah" name="buah" placeholder="Cari Barang Disini...." value="">
                <button class="btn btn-default" type="submit" name="cari"><i class="fa fa-search"></i></button>
                <!-- <input type="submit" name="cari" value="cari"> -->
            </form>
        </div>

            <?php if (!isset($page)) {
                $page=null;
            } ?>
			<?php if ($page=="about" || $page=="keranjang" ||$page=="profile") {
                echo '<a href="index.php"><span class="active uls-trigger">Home</span</a>';   
            }else{
                 echo '<a class="account" href="index.php">Home</a>';
            } ?>

            <?php if ($page=="about") {
                echo '<a class="account" href="about.php">About</a>';                   
            }else{
                echo '<a href="about.php"><span class="active uls-trigger">About</span</a>'; 
            } ?>
			
            <?php if (!isset($_SESSION["role"])) : ?>
			<a href="login.php"><span class="active uls-trigger">Login</span></a>
			<?php endif ?>
			
            <?php if ($role=="user") : ?>
				
                <?php if ($page=="keranjang") {
                echo '<a class="account" href="keranjang.php">Keranjang</a>';                   
                }else{
                echo '<a href="keranjang.php"><span class="active uls-trigger">Keranjang</span</a>'; 
                } ?>
                
				<div class="dropdown header-right">
    				
                     <?php if ($page=="profile") {
                        echo '<a class="dropdown-toggle account" type="button" data-toggle="dropdown">'.$_SESSION["nama"].'<span class="caret"></span></a>';                   
                    }else{
                        echo '<a class="dropdown-toggle" type="button" data-toggle="dropdown"><span class="active uls-trigger">'.$_SESSION["nama"].'<span class="caret"></span></span></a>'; 
                    } ?>

                    
    				<ul class="dropdown-menu">
    				 	<li><a href="profile.php">Profile</a></li>
      					<li class="divider"></li>
      					<li><a href="admin/logout.php" onclick="return confirm ('Anda yakin Keluar?')">Logout</a></li>
    				</ul>
 				 </div>
			<?php endif ?>
			
            <?php if ($role=="admin") :?>
				<a href="admin/index.php"><span class="active uls-trigger"><?php echo $_SESSION["nama"]; ?></span></a>
			<?php endif ?>
			
            </div>
		</div>
	</div>
    