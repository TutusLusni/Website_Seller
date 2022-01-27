<?php 
require 'fungsi.php';

$bulan=$_GET["bulan"];
$tahun=$_GET["tahun"];

	if (hapustransaksi($bulan,$tahun)>0) {
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