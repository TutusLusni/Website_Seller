<?php 
include 'template/headeruser.php';

if (isset($_GET["key"])) {
	$kode=$_GET["key"];
	$data=lihat("SELECT * FROM barang,jenis_elektro WHERE jenis_elektro.kode_kategori=barang.kode_kategori AND barang.K_barang='$kode'")[0];
}else{
	$kode="";
}

if (isset($_POST["beli"])) {
	if (!isset($_SESSION["role"])) {
		echo "<script type='text/javascript'>
		alert('Login Dulu Sebelum Belanja ...');
		document.location.href='login.php';
		</script>";
	}else{
/*	var_dump($_POST);
	die();*/
		if ($_POST["jumlah"]==null) {
			echo "<script>
				alert('Tolong Masukkan Jumlah Pembelian');
			</script>";
		}elseif(belanja($_POST)>0) {
			echo "<script type='text/javascript'>
			alert('Belanja Sukses diProses...');
			document.location.href='index.php';
			</script>";
		}else{
			echo "<script type='text/javascript'>
			alert('Belanja Gagal diProses...!!!!');
			document.location.href='index.php';
			</script>";
		}
	}
}
 ?>
	<div class="banner text-center">
	  <div class="container">    
			
	  </div>
	</div>
	<!--single-page-->
	<div class="single-page main-grid-border">
		<div class="container">
			<ol class="breadcrumb" style="margin-bottom: 5px;">
				<li><a href="index.php">Home</a></li>

				<?php if ($data["kategori"]=="alat rumah tangga") : ?>
				<li class="active"><a href="categories.php"><?php echo $data["kategori"]; ?></a></li>	
				<?php endif ?>
				
				<?php if ($data["kategori"]=="Handphone") : ?>
				<li class="active"><a href="categories.php#parentVerticalTab2"><?php echo $data["kategori"]; ?></a></li>	
				<?php endif ?>
				
				<?php if ($data["kategori"]=="komputer") : ?>
				<li class="active"><a href="categories.php#parentVerticalTab3"><?php echo $data["kategori"]; ?></a></li>	
				<?php endif ?>
				
				<!-- <li class="active"><a href="categories.php"><?php echo $data["kategori"]; ?></a></li> -->
				<li class="active"><?php echo $data["N_barang"]; ?></li>
			</ol>
			<div class="product-desc">
				<div class="col-md-7 product-view">
					<h2><?php echo $data["N_barang"]; ?></h2>
					<p> <i class="glyphicon glyphicon-map-marker"></i><a href="#">Nglayur</a>, <a href="#">Trenggalek</a>| Added at 06:55 pm, Ad ID: 987654321</p>
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="upload/<?php echo $data["gambar"]; ?>">
								<img src="upload/<?php echo $data["gambar"]; ?>" />
							
						</ul>
					</div>
					<!-- FlexSlider -->
					  <script defer src="asset/js/jquery.flexslider.js"></script>
					<link rel="stylesheet" href="asset/css/flexslider.css" type="text/css" media="screen" />

						<script>
					// Can also be used with $(document).ready()
					$(window).load(function() {
					  $('.flexslider').flexslider({
						animation: "slide",
						controlNav: "thumbnails"
					  });
					});
					</script>
					<!-- //FlexSlider -->
					<!-- <div class="product-details">
						<h4>Brand : <a href="#">Mandiri Group</a></h4>
						<h4>Views : <strong>150</strong></h4>
						<p><strong>Display (Bentuk)</strong>: bentuk menyerupai Mantili hanya saja lebih lebar dan lebih tebal. </p>					
					</div> -->
				</div>
				<div class="col-md-5 product-details-grid">
					<div class="item-price">
						<div class="product-price">
							<p class="p-price">Harga</p>
							<h4 class="rate" style="padding-top: 10px">Rp <?php echo $data["harga"]; ?></h4>
							<div class="clearfix"></div>
						</div>
						<div class="condition">
							<p class="p-price">kondisi</p>
							<h4>Baru</h4>
							<div class="clearfix"></div>
						</div>
						<div class="itemtype">
							<p class="p-price">Item Type</p>
							<h5><?php echo $data["kategori"]; ?></h5>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="interested text-center">
						<h4>Tertarik dengan Ini?</h4><br>
						<form action="" method="post">
							<input type="hidden" name="user" value="<?php echo $_SESSION["nama"];?>">
							<input type="hidden" name="kode" value="<?php echo $data["K_barang"];?>">
							<input type="text" name="jumlah" placeholder="Masukkan Jumlah Barang">
							<button class="btn btn-danger" type="submit" name="beli">Beli</button>
						</form>
					</div>
				</div>
			<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--//single-page-->
	<!--footer section start-->		
<?php include 'template/footeruser.php' ?>