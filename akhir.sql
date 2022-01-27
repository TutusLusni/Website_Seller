-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jan 2022 pada 02.52
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akhir`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `coba` (INOUT `hasil` VARCHAR(10))  SELECT sum( detail_transaksi.Qty_beli * barang.harga ) into hasil
FROM detail_transaksi , barang
WHERE detail_transaksi.K_barang = barang.K_barang
And detail_transaksi.K_transaksi = hasil$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hake` (IN `he` VARCHAR(20))  NO SQL
SELECT suplair.Nama_suplair, sum( detail_transaksi.Qty_beli * barang.harga ) AS TOTAL
FROM `detail_transaksi` , barang, suplair, master_transaksi
WHERE detail_transaksi.K_barang = barang.K_barang
AND master_transaksi.k_transaksi = detail_transaksi.k_transaksi
AND master_transaksi.k_suplair = suplair.k_suplair
AND suplair.Nama_suplair = he$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `huha` (IN `he` VARCHAR(5))  SELECT suplair.Nama_suplair, sum( detail_transaksi.Qty_beli * barang.harga ) AS TOTAL
FROM `detail_transaksi` , barang, suplair, master_transaksi
WHERE detail_transaksi.K_barang = barang.K_barang
AND master_transaksi.k_transaksi = detail_transaksi.k_transaksi
AND master_transaksi.k_suplair = suplair.k_suplair
AND suplair.k_suplair = he$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `input_suplair` (IN `kode` VARCHAR(5), IN `nama` VARCHAR(30))  insert into suplair values(kode,nama)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `laporan_transaksi` (IN `tanggal` DATE)  NO SQL
select master_transaksi.K_transaksi,pembayaran.jumlah,pembayaran.pembayaran,pembayaran.kembalian
from master_transaksi,pembayaran
where master_transaksi.K_transaksi=pembayaran.K_transaksi
AND master_transaksi.T_transaksi=tanggal$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `panggil_transaksi` (IN `kode` VARCHAR(5))  NO SQL
select detail_transaksi.D_transaksi,barang.N_barang,detail_transaksi.Qty_beli,(detail_transaksi.Qty_beli*barang.harga) as total
from detail_transaksi,barang
where detail_transaksi.K_barang=barang.K_barang
and detail_transaksi.K_transaksi=kode
order by detail_transaksi.D_transaksi ASC$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `K_barang` varchar(5) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `N_barang` varchar(60) NOT NULL,
  `harga` double NOT NULL,
  `stock` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`K_barang`, `kode_kategori`, `N_barang`, `harga`, `stock`, `gambar`) VALUES
('B0001', 'J002', 'Kipas angin Matsunaga ', 120000, 15, '5dbd2aef51f3c.jpg'),
('B0002', 'J002', 'Smart tv cocoa 32 inch', 1990000, 19, '5dbd2b6826792.jpg'),
('B0003', 'J002', 'Magic com cosmos', 500000, 20, '5dbd2bbecfe59.jpg'),
('B0004', 'J001', 'xiaomi 5a', 1500000, 1, '5dbd2b90bbf75.jpg'),
('B0005', 'J003', 'Ram V-gen Tsunami 16 GB (2 x 8 GB)', 1250000, 5, '5dbd2c2ddcad9.jpg'),
('B0006', 'J003', 'Motherboard Gigabyte Z390 socket lga 1151', 3500000, 2, '5dbd02b436d58.jpg'),
('B0007', 'J002', 'Kulkas 2 pintu Aqua', 2750000, 3, '5dbd15bfb0a07.jpg'),
('B0008', 'J002', 'Kulkas 2 pintu LG', 3000000, 2, '5dbd15eac2ce7.jpg'),
('B0009', 'J002', 'Magic com Yong ma', 475000, 15, '5dbd2be7d886c.jpg'),
('B0010', 'J003', 'Ram Hyper x 16 GB (2 x 8 GB)', 1100000, 25, '5dbd2c8e5a306.jpg'),
('B0011', 'J003', 'motherboard', 400000, 4, '5dc8eaf2ee2a4.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coba`
--

CREATE TABLE `coba` (
  `no` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tek` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `coba`
--

INSERT INTO `coba` (`no`, `nama`, `tek`) VALUES
(2, 'redy', 'saya A*****'),
(3, 'deni', 'saya D*** di '),
(4, 'adi', 'saya A***** di kampus'),
(5, 'paijo', 'paijo D*** di kampus'),
(6, 'tutus', 'D***');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_elektro`
--

CREATE TABLE `jenis_elektro` (
  `kode_kategori` varchar(10) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_elektro`
--

INSERT INTO `jenis_elektro` (`kode_kategori`, `kategori`) VALUES
('J001', 'Handphone'),
('J002', 'alat rumah tangga'),
('J003', 'komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `no` int(11) NOT NULL,
  `kode_user` varchar(10) NOT NULL,
  `K_transaksi` varchar(10) NOT NULL,
  `Tanggal` date NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `gambar` varchar(60) NOT NULL,
  `N_barang` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`no`, `kode_user`, `K_transaksi`, `Tanggal`, `jumlah`, `gambar`, `N_barang`) VALUES
(5, 'U0002', 'T0001', '2019-10-31', '2', '', 'kipas'),
(6, 'U0002', 'T0002', '2019-10-31', '1', '', 'radio'),
(7, 'U0002', 'T0003', '2019-11-01', '1', '', 'telev'),
(8, 'U0002', 'T0004', '2019-11-01', '1', '', 'kipas'),
(9, 'U0002', 'T0004', '2019-11-05', '1', '5dbd2b90bbf75.jpg', 'xiaomi 5a'),
(10, 'U0002', 'T0005', '2019-11-11', '1', '5dc8eaf2ee2a4.png', 'motherboard'),
(11, 'U0002', 'T0006', '2019-11-25', '1', '5dbd2b6826792.jpg', 'Smart tv cocoa 32 inch');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `K_transaksi` varchar(10) NOT NULL,
  `K_barang` varchar(10) NOT NULL,
  `kode_user` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `T_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`K_transaksi`, `K_barang`, `kode_user`, `qty`, `T_transaksi`) VALUES
('T0001', 'B0001', 'U0002', 2, '2019-10-31'),
('T0002', 'B0003', 'U0002', 1, '2019-10-31'),
('T0003', 'B0002', 'U0002', 1, '2019-09-09'),
('T0004', 'B0004', 'U0002', 1, '2019-11-05'),
('T0005', 'B0011', 'U0002', 1, '2019-11-11'),
('T0006', 'B0002', 'U0002', 1, '2019-11-25');

--
-- Trigger `transaksi`
--
DELIMITER $$
CREATE TRIGGER `update_sebelum_insert` BEFORE INSERT ON `transaksi` FOR EACH ROW begin
declare stok int;
declare gam varchar(60);
declare nama varchar(60);

select gambar into gam from barang where K_barang=new.K_barang;
select N_barang into nama from barang where K_barang=new.K_barang;

select stock into stok from barang 
where K_barang=new.K_barang;

if new.qty <= stok then
update barang set stock = stock - new.qty
where K_barang =new.K_barang;

insert into log 
values('',new.kode_user,new.K_transaksi,curdate(),new.qty,gam,nama);

else
SIGNAL SQLSTATE '80000'
SET MESSAGE_TEXT='stok tidak mencukupi';

end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `kode_user` varchar(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`kode_user`, `user`, `pass`, `alamat`, `no_hp`, `kategori`) VALUES
('U0001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'trenggalek', '081331269421', 'admin'),
('U0002', 'tutuslusni', 'c4ca4238a0b923820dcc509a6f75849b', 'kediri', '083846615966', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`K_barang`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indeks untuk tabel `coba`
--
ALTER TABLE `coba`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `jenis_elektro`
--
ALTER TABLE `jenis_elektro`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`K_transaksi`),
  ADD KEY `K_barang` (`K_barang`,`kode_user`),
  ADD KEY `kode_user` (`kode_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `coba`
--
ALTER TABLE `coba`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `jenis_elektro` (`kode_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kode_user`) REFERENCES `user` (`kode_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`K_barang`) REFERENCES `barang` (`K_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
