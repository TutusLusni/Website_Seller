<?php 
	
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "akhir";

    $koneksi = mysqli_connect("$servername","$username","$password","$dbname") or die("gagal");

function lihat($query){
	global $koneksi;
	$hasil=mysqli_query($koneksi,$query);
	$rows=[];
	while ($baris=mysqli_fetch_assoc($hasil)) {
		$rows[]=$baris;
	}
	return $rows;
}

function kode($query,$huruf){
	global $koneksi;
	//$query = "SELECT max(kode_barang) as maxKode FROM tbl_barang";
	$hasil = mysqli_query($koneksi,$query);
	$data = mysqli_fetch_array($hasil);
	$kodeBarang = $data['maxKode'];
 
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
	$noUrut = (int) substr($kodeBarang, 2);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$noUrut++;
 
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
	$char = $huruf;
	$kodeBarang = $char . sprintf("%04s", $noUrut);
	return $kodeBarang;
}

function tambahbarang($data){
	global $koneksi;
	$k=kode('SELECT max(K_barang) as maxKode FROM barang','B');
	$nama_barang=$data["nama"];
	$harga=$data["harga"];
	$stok=$data["stok"];
	$kategori=$data["kategori"];

	$gambar=upload();
	if (!$gambar) {
		return false;
	}

	$query=mysqli_query($koneksi,"INSERT INTO barang (K_barang,kode_kategori,N_barang,harga,stock,gambar) VALUES ('$k', '$kategori','$nama_barang','$harga','$stok','$gambar')");
	return mysqli_affected_rows($koneksi);
}

function hapus($id){
	global $koneksi;
	$data=lihat("SELECT * FROM barang WHERE K_barang='$id'")[0];
	$gambar=$data["gambar"];
	$query=mysqli_query($koneksi,"DELETE FROM barang WHERE K_barang='$id'");
	unlink("../upload/$gambar");
	return mysqli_affected_rows($koneksi);
}

function ubahbarang($data){
	global $koneksi;
	$k=$data["kode"];
	$nama_barang=$data["nama"];
	$harga=$data["harga"];
	$stok=$data["stok"];
	$kategori=$data["kategori"];
	$gambarlama=$data["gambarlama"];

	if ($_FILES['gambar']['error']===4) {
		$gambar=$gambarlama;
	}else{
		$gambar=upload();
		if (file_exists("../upload/$gambarlama")) {
			unlink("../upload/$gambarlama");
		}
	}

	$query=mysqli_query($koneksi,"UPDATE barang SET K_barang='$k', kode_kategori='$kategori', N_barang='$nama_barang', harga='$harga', stock='$stok', gambar='$gambar' WHERE K_barang='$k'");
	
	return mysqli_affected_rows($koneksi);
}

function upload(){
	$namafile=$_FILES['gambar']['name'];
	$tmp=$_FILES['gambar']['tmp_name'];
	$eror=$_FILES['gambar']['error'];
	$ukuran=$_FILES['gambar']['size'];

	//apakah file gambar dipilih atau tidak
	if ($eror===4) {
		echo "<script type='text/javascript'>
		alert('file gambar tidak ada...');</script>";
		return false;
	}

	//bentuk file
	$ekstensi=['jpg','jpeg','png'];
	$ekstensigambar=explode('.', $namafile);
	$ekstensigambar=strtolower(end($ekstensigambar));

	if (!in_array($ekstensigambar, $ekstensi)) {
		echo "<script type='text/javascript'>
		alert('yang diupload bukan gambar...');</script>";
		return false;
	}

	//ukuran file
	if ($ukuran>1000000) {
		echo "<script type='text/javascript'>
		alert('file gambar terlalu besar...');</script>";
		return false;
	}

	//proses upload gambar
	$namabaru=uniqid();
	$namabaru .='.';
	$namabaru .=$ekstensigambar;
	move_uploaded_file($tmp, '../upload/'.$namabaru);

	return $namabaru;
}

function ubahuser($data){
	global $koneksi;
	$k=$data["kode"];
	$user=$data["username"];
	$passwordlama=$data["passwordlama"];
	$password1=$data["password1"];
	$password2=$data["password2"];
	$alamat=$data["alamat"];
	$no=$data["no"];
	$kategori=$data["kategori"];

	if ($password1!=$password2) {
		echo "<script>
				alert('konfirmasi password tidak sama!');
			</script>";
		return false;
	}
	//pass
	if (empty($password1)) {
		$password = $passwordlama;
	}else{
		$password = md5($password1);
	}

	$query=mysqli_query($koneksi,"UPDATE user SET kode_user='$k', user='$user', pass='$password', alamat='$alamat', no_hp='$no', kategori='$kategori' WHERE kode_user='$k'");

	return mysqli_affected_rows($koneksi);
}

function tambahuser($data){
	global $koneksi;
	$k=kode('SELECT max(kode_user) as maxKode FROM user','U');
	$username=$data["username"];
	$password1=$data["password1"];
	$password2=$data["password2"];
	$alamat=$data["alamat"];
	$no=$data["no"];
	$kategori=$data["kategori"];

	if ($password1!=$password2 ||empty($password1) || empty($password2) ) {
		echo "<script>
				alert('konfirmasi password tidak sama atau kosong!');
			</script>";
		return false;
	}
	
	$password=md5($password1);

	$query=mysqli_query($koneksi,"INSERT INTO user (kode_user,user,pass,alamat,no_hp,kategori) VALUES ('$k', '$username','$password','$alamat','$no','$kategori')");
	return mysqli_affected_rows($koneksi);
}

function hapususer($id){
	global $koneksi;
	$query=mysqli_query($koneksi,"DELETE FROM user WHERE kode_user='$id'");
	return mysqli_affected_rows($koneksi);
}

function belanja($data){
	global $koneksi;
	$k=kode('SELECT max(K_transaksi) as maxKode FROM transaksi','T');
	$kodebarang=$data["kode"];
	$user=$data["user"];
	$result=lihat("SELECT kode_user FROM user WHERE user='$user'")[0];
	$kodeuser=$result["kode_user"];
	$jumlah=$data["jumlah"];

	$query=mysqli_query($koneksi,"INSERT INTO transaksi (K_transaksi,K_barang,kode_user,qty,T_transaksi) VALUES ('$k', '$kodebarang','$kodeuser','$jumlah',curdate())");
	return mysqli_affected_rows($koneksi);
	/*var_dump($kodeuser);
	die();*/
}

function hapuslog($id){
	global $koneksi;
	$query=mysqli_query($koneksi,"DELETE FROM log WHERE no='$id'");
	return mysqli_affected_rows($koneksi);
}

function hapustransaksi($bulan,$tahun){
	global $koneksi;
	$query=mysqli_query($koneksi,"DELETE FROM transaksi WHERE MONTH(T_transaksi)=$bulan AND YEAR(T_transaksi)=$tahun");
	return mysqli_affected_rows($koneksi);
}

?>