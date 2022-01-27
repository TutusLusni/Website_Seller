<?php 
require 'fungsi.php';
$kode=$_GET["id"];

	if (hapususer($kode)>0) {
		echo "<script type='text/javascript'>
		alert('Data berhasil dihapus....');
		document.location.href='index.php';
		</script>";
	}else{
		echo "<script type='text/javascript'>
		alert('Data Gagal dihapus...');
		document.location.href='index.php';
		</script>";
	}


?>