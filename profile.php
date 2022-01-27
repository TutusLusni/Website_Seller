<?php 
$page="profile";
include 'template/headeruser.php'; 
$nama=$_SESSION["nama"];
$data=lihat("SELECT * FROM user WHERE user='$nama'")[0];

if (isset($_POST["ubah_user"])) {
/*	var_dump($_POST);
	die();*/
	if (ubahuser($_POST)>0) {
		echo "<script type='text/javascript'>
		alert('Data berhasil di Ubah...');
		document.location.href='admin/logout.php';
		</script>";
	}else{
		echo "<script type='text/javascript'>
		alert('Data Gagal di Ubah..!!!!!');
		document.location.href='index.php';
		</script>";
	}
}
?>
	<div class="banner text-center">
	</div>
	<!-- Submit Ad -->
	<div class="submit-ad main-grid-border">
		<div class="container">
			<h2 class="head">Profile</h2>
			<div class="post-ad-form">
				<form action="" method="post">				
					<div class="personal-details">
						<input type="hidden" name="kategori" value="<?php echo $data["kategori"]; ?>">
						<input type="hidden" name="kode" value="<?php echo $data["kode_user"]; ?>">
						<input type="hidden" name="passwordlama" value="<?php echo $data["pass"]; ?>">
						<label> Username <span>*</span></label>
						<input type="text" name="username" value="<?php echo $data["user"]; ?>">
						<div class="clearfix"></div>
						<label style="padding-bottom: 20px">Password Baru <span>*</span></label>
						<input type="password" name="password1" placeholder="Masukkan Password Baru" style="font-size: 15px; width: 740px; border: 1px solid green; padding: .5em .75em;">
						<div class="clearfix"></div>
						<label style="padding-bottom: 20px">Ulangi Password <span>*</span></label>
						<input type="password" name="password2" placeholder="Ulangi Password" style="font-size: 15px; width: 740px; border: 1px solid green; padding: .5em .75em;">
						<div class="clearfix"></div>
						<label>Alamat<span>*</span></label>
						<input type="text" name="alamat" value="<?php echo $data["alamat"]; ?>">
						<div class="clearfix"></div>
						<label>No. Telephone<span>*</span></label>
						<input type="text" name="no" value="<?php echo $data["no_hp"]; ?>">
						<div class="clearfix"></div>
						<p class="post-terms">Saat Berhasil Mengubah Profile Maka Secara Otomatis Akan <strong>Logout</strong></p>
					<input type="submit" value="Ubah" name="ubah_user">					
					<div class="clearfix"></div>
					</div>
					</form>
			</div>
		</div>	
	</div>
	<!-- // Submit Ad -->
	<!--footer section start-->		
<?php include 'template/footeruser.php'; ?>