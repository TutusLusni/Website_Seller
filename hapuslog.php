<?php 
require 'admin/fungsi.php';
$kode=$_GET["id"];

	if (hapuslog($kode)>0) {
		echo "<script type='text/javascript'>
		alert('Data Transaksi berhasil dihapus....');
		document.location.href='index.php';
		</script>";
	}else{
		echo "<script type='text/javascript'>
		alert('Data Transaksi Gagal dihapus...');
		document.location.href='index.php';
		</script>";
	}


?>