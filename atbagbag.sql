-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 03:36 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atbagbag`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` varchar(7) NOT NULL,
  `nama_pemilik` varchar(30) NOT NULL,
  `bank` varchar(45) DEFAULT NULL,
  `bukti_pembayaran` varchar(100) DEFAULT NULL,
  `kode_pesan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `nama_pemilik`, `bank`, `bukti_pembayaran`, `kode_pesan`) VALUES
('BR0001', 'farid', 'bri', 'assets/images/squishy.jpg', 'ps0034');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(20) NOT NULL,
  `nama_kategori` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('KG0001', 'Bra'),
('KG0002', 'Tas'),
('KG0003', 'Pernak Pernik');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `jumlah` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `id_kostumer_id` int(11) DEFAULT NULL,
  `produk_id_produk` varchar(20) NOT NULL,
  `pesan_id_pesan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`jumlah`, `total`, `id_kostumer_id`, `produk_id_produk`, `pesan_id_pesan`) VALUES
('1', '39800', NULL, 'PR0013', 'PS0039'),
('1', '16000', NULL, 'PR0023', 'PS0039');

--
-- Triggers `keranjang`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `keranjang` FOR EACH ROW BEGIN
	update produk set stok = produk.stok-NEW.jumlah
    WHERE produk.id_produk = NEW.produk_id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kostumer`
--

CREATE TABLE `kostumer` (
  `id_kostumer` int(11) NOT NULL,
  `nama_kostumer` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` int(13) NOT NULL,
  `password` varchar(256) NOT NULL,
  `date_created` int(11) NOT NULL,
  `id_level_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kostumer`
--

INSERT INTO `kostumer` (`id_kostumer`, `nama_kostumer`, `email`, `no_telp`, `password`, `date_created`, `id_level_id`) VALUES
(3, 'farid', 'farid@gmail.com', 568290093, '$2y$10$IZk0IIYOEvQHH9yQWpVf4uwWImT1Xe.nw9WYNAjkgmY.xZ9oNlD1i', 1580305647, '111'),
(4, 'mega', 'megasilvia5555@gmail.com', 2147483647, '$2y$10$9iH.3Ic.OkDD.MWjKXjmkOzkZ4kqc9kTgOv0.Q6dUe95okz5RdMJi', 1580401824, '111');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` varchar(20) NOT NULL,
  `nama_level` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
('111', 'user'),
('222', 'admin'),
('333', 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_kirim` varchar(20) NOT NULL,
  `nama_pengirim` varchar(30) NOT NULL,
  `provinsi` varchar(45) DEFAULT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `jenis_layanan` varchar(45) DEFAULT NULL,
  `kurir` varchar(30) NOT NULL,
  `harga_kirim` int(20) NOT NULL,
  `kodepos` int(10) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_kirim`, `nama_pengirim`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `jenis_layanan`, `kurir`, `harga_kirim`, `kodepos`, `telp`) VALUES
('S00011', 'we', 'Jawa Timur', 'Jember', 'Panti', 'Suci', 'Paket Kilat Khusus', 'pos', 7000, 56732, '82332062'),
('S00012', 'akbar', 'Bangka Belitung', 'Bangka Barat', 'bangka', 'bangka', 'REG', 'jne', 80000, 89978798, '2147483647'),
('S00013', 'gthth', 'DKI Jakarta', 'Jakarta Barat', 'thhtht', 'hthth', 'Paket Kilat Khusus', 'pos', 18000, 555, '555'),
('S00014', 'grgr', 'Banten', 'Cilegon', 'rgrgr', 'rgrgr', 'Paket Kilat Khusus', 'pos', 20500, 4444, '444'),
('S00015', 'Akuauauau', 'Kalimantan Timur', 'Bontang', 'kn', 'nkk', 'OKE', 'jne', 47000, 8798, '80979'),
('S00016', 'a', 'Bangka Belitung', 'Bangka', 'as', 'sa', 'OKE', 'jne', 45000, 212, '12'),
('S00017', 'as', 'Jambi', 'Batang Hari', 'as', 'sas', 'OKE', 'jne', 43000, 21, '12'),
('S00018', 'asa', 'Bangka Belitung', 'Bangka', 'asa', 'sas', 'OKE', 'jne', 45000, 212, '121'),
('S00019', 'asas', 'Bangka Belitung', 'Bangka', 'asas', 'sas', 'Paket Kilat Khusus', 'pos', 39000, 212, '1212'),
('S00020', 'sas', 'Kalimantan Utara', 'Bulungan (Bulongan)', 'as', 'sas', 'OKE', 'jne', 50000, 212, '121'),
('S00021', 'asas', 'Bangka Belitung', 'Bangka', 'as', 'sas', 'OKE', 'jne', 45000, 212, '1212'),
('S00022', 'sas', 'Bangka Belitung', 'Bangka', 'asas', 'as', 'OKE', 'jne', 45000, 2121, '1212'),
('S00023', 'asas', 'Banten', 'Cilegon', 'as', 'sas', 'YES', 'jne', 46000, 12, '12'),
('S00024', 'asas', 'Bangka Belitung', 'Bangka', 'asa', 'sas', 'OKE', 'jne', 45000, 212, '1212'),
('S00025', 'asa', 'Jambi', 'Batang Hari', 'asa', 'sas', 'REG', 'jne', 47000, 1212, '1212'),
('S00026', 'asa', 'Banten', 'Serang', 'as', 'sas', 'Paket Kilat Khusus', 'pos', 21000, 212, '1221'),
('S00027', 'asa', 'Kalimantan Selatan', 'Balangan', 'asa', 'asa', 'REG', 'jne', 38000, 1212, '1212'),
('S00028', 'assas', 'Kalimantan Selatan', 'Balangan', 'asas', 'sas', 'REG', 'jne', 38000, 212, '1212'),
('S00029', 'asas', 'Kalimantan Timur', 'Balikpapan', 'as', 'sas', 'YES', 'jne', 84000, 1212, '1212'),
('S00030', 'asas', 'Kalimantan Selatan', 'Balangan', 'as', 'sa', 'OKE', 'jne', 34000, 121, '12'),
('S00031', 'asa', 'Bali', 'Badung', 'as', 'sas', 'REG', 'jne', 18000, 1212, '121'),
('S00032', 'nj', 'Bali', 'Badung', 'jjn', 'nn', 'REG', 'jne', 18000, 556, '77'),
('S00033', 'nj', 'Bali', 'Badung', 'jjn', 'nn', 'REG', 'jne', 18000, 556, '77'),
('S00034', 'hg', 'Kalimantan Barat', 'Bengkayang', 'sas', 'as', 'OKE', 'jne', 45000, 212, '1212'),
('S00035', 'asas', 'Jawa Timur', 'Bangkalan', 'asa', 'asas', 'REG', 'jne', 8000, 12, '1212'),
('S00036', 'sas', 'Bengkulu', 'Bengkulu', 'asas', 'sas', 'YES', 'jne', 88000, 1, '1'),
('S00037', 'asas', 'Kalimantan Selatan', 'Balangan', 'as', 'sas', 'REG', 'jne', 38000, 212, '1212'),
('S00038', 'asas', 'Banten', 'Cilegon', 'asa', 'sas', 'YES', 'jne', 46000, 12, '121'),
('S00039', 'asas', 'Bali', 'Badung', 'asa', 'sas', 'REG', 'jne', 18000, 1212, '1212'),
('S00040', 'asa', 'Bangka Belitung', 'Bangka', 'asas', 'sas', 'REG', 'jne', 48000, 1212, '122'),
('S00041', 'aass', 'Jambi', 'Batang Hari', 'asas', 'sas', 'REG', 'jne', 47000, 121, '6283114922935'),
('S00042', 'ass', 'Bangka Belitung', 'Bangka', 'asa', 'sas', 'REG', 'jne', 48000, 1212, '6281515868592'),
('S00043', 'megacntik', 'Jawa Timur', 'Lumajang', 'jdjj', 'jddkj', 'REG', 'jne', 8000, 7889, '628976350128'),
('S00044', 'megasilviacantik', 'Bali', 'Badung', 'cc', 'ff', 'Paket Kilat Khusus', 'pos', 17000, 222, '999'),
('S00045', 'fikal', 'Jawa Timur', 'Nganjuk', 'kertosono', 'kertosono', 'Paket Kilat Khusus', 'pos', 8000, 893647, '09448246433'),
('S00046', 'muhammad', 'Jawa Tengah', 'Klaten', 'klaten', 'klaten', 'YES', 'jne', 31000, 897353, '094748472255'),
('S00047', 'fatihal', 'Jawa Timur', 'Nganjuk', 'kertosono', 'tembarak', 'OKE', 'jne', 7000, 936484, '09464825493'),
('S00048', 'danang', 'Jawa Tengah', 'Grobogan', 'grobogan', 'grobogan', 'Express Next Day Barang', 'pos', 38000, 983760, '93638323240'),
('S00049', 'agung', 'Kalimantan Barat', 'Pontianak', 'pontianak', 'pontianak', 'YES', 'jne', 107000, 760987, '067433276009'),
('S00050', 'danu', 'Bali', 'Denpasar', 'denpasar', 'denpasar', 'REG', 'tiki', 16000, 96865, '087554809876'),
('S00051', 'alfath', 'Nusa Tenggara Timur (NTT)', 'Ngada', 'ngada', 'ngada', 'REG', 'jne', 70000, 93837, '99374643737'),
('S00052', 'feri', 'Jawa Timur', 'Nganjuk', 'gondang', 'baron', 'REG', 'tiki', 8000, 846109, '032467290944'),
('S00053', 'difa', 'Kalimantan Barat', 'Landak', 'landak', 'landak', 'REG', 'tiki', 62000, 678901, '093364579183'),
('S00054', 'lala', 'Kepulauan Riau', 'Batam', 'batam', 'batam', 'YES', 'jne', 60000, 584936, '073838343434'),
('S00055', 'farid', 'Gorontalo', 'Gorontalo', 'gorontalo', 'gorontalo', 'ECO', 'tiki', 88000, 758595, '089986876930'),
('S00056', 'farid', 'Gorontalo', 'Gorontalo', 'gorontalo', 'gorontalo', 'ECO', 'tiki', 88000, 758595, '089986876930'),
('S00057', 'farid', 'Gorontalo', 'Gorontalo', 'gorontalo', 'gorontalo', 'ECO', 'tiki', 88000, 758595, '089986876930'),
('S00058', 'farid', 'Gorontalo', 'Gorontalo', 'gorontalo', 'gorontalo', 'ECO', 'tiki', 88000, 758595, '089986876930'),
('S00059', 'farid', 'Gorontalo', 'Gorontalo', 'gorontalo', 'gorontalo', 'ECO', 'tiki', 88000, 758595, '089986876930'),
('S00060', 'farid', 'Gorontalo', 'Gorontalo', 'gorontalo', 'gorontalo', 'ECO', 'tiki', 88000, 758595, '089986876930'),
('S00061', 'farid', 'Gorontalo', 'Gorontalo', 'gorontalo', 'gorontalo', 'ECO', 'tiki', 88000, 758595, '089986876930'),
('S00062', 'farid', 'Gorontalo', 'Gorontalo', 'gorontalo', 'gorontalo', 'ECO', 'tiki', 88000, 758595, '089986876930'),
('S00063', 'farid', 'Gorontalo', 'Gorontalo', 'gorontalo', 'gorontalo', 'ECO', 'tiki', 88000, 758595, '089986876930'),
('S00064', 'farid', 'Gorontalo', 'Gorontalo', 'gorontalo', 'gorontalo', 'ECO', 'tiki', 88000, 758595, '089986876930'),
('S00065', 'farid', 'Jawa Timur', 'Nganjuk', 'kertosono', 'banaran', 'REG', 'tiki', 8000, 980099, '080036482827'),
('S00066', 'mm', 'Jawa Tengah', 'Banjarnegara', 'dd', 'dd', 'REG', 'jne', 19000, 44, '44'),
('S00067', 'rr', 'Jawa Barat', 'Bandung', 'rr', 'tt', 'Express Next Day Barang', 'pos', 46000, 55, '55'),
('S00068', 'mega', 'Kalimantan Utara', 'Bulungan (Bulongan)', 'ss', 'ss', 'Paket Kilat Khusus', 'pos', 54000, 11, '11');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` varchar(20) NOT NULL,
  `id_kostumer_id` int(11) NOT NULL,
  `tanggal_pesan` datetime DEFAULT NULL,
  `jatuh_tempo` datetime NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `pengiriman_id_kirim` varchar(20) NOT NULL,
  `total_pesan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_kostumer_id`, `tanggal_pesan`, `jatuh_tempo`, `status`, `pengiriman_id_kirim`, `total_pesan`) VALUES
('PS0034', 0, '2020-01-29 22:54:48', '2020-01-30 03:54:48', 'Proses', 'S00064', 2088000),
('PS0035', 0, '2020-01-30 18:52:12', '2020-01-30 23:52:13', 'Proses', 'S00065', 2008000),
('PS0038', 0, '2020-01-30 23:32:34', '2020-01-31 04:32:34', 'Proses', 'S00066', 61900),
('PS0039', 0, '2020-02-01 12:20:17', '2020-02-01 17:20:17', 'Proses', 'S00068', 109800);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(45) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `kategori_id_kategori` varchar(20) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `gambar` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `keterangan`, `kategori_id_kategori`, `stok`, `harga`, `gambar`) VALUES
('PR0006', 'Bra 1pcs', 'Bra 1pcs', 'KG0001', 190, 219000, 'assets/images/1pcs2.jpg'),
('PR0007', 'Bra 2pcs', 'Bra 2pcs', 'KG0001', 200, 398000, 'assets/images/2pcs2.jpg'),
('PR0008', 'Bra 3pcs', 'Bra 3pcs', 'KG0001', 590, 498000, 'assets/images/3pcs2.jpg'),
('PR0009', '1 set (bra + panty)', '1 set (bra + panty)', 'KG0001', 780, 289000, 'assets/images/1set2.jpg'),
('PR0010', '2 set (bra + panty)', '2 set (bra + panty)', 'KG0001', 690, 449000, 'assets/images/2set2.jpg'),
('PR0011', '3 set (bra + panty)', '3 set (bra + panty)', 'KG0001', 456, 559000, 'assets/images/3set2.jpg'),
('PR0012', 'Tas Selempang Waioder Homme', 'bahan import', 'KG0002', 760, 28900, 'assets/images/0813.jpg'),
('PR0013', 'Tas Lacoste Mono premium', 'bahan import', 'KG0002', 656, 39800, 'assets/images/tas411.jpg'),
('PR0014', 'LOVA MILA - tas wanita', 'bahan import', 'KG0002', 543, 54000, 'assets/images/tas52.jpg'),
('PR0015', 'IMPORT CP 233 Tas Wanita', 'bahan import', 'KG0002', 343, 65000, 'assets/images/tas111.jpg'),
('PR0016', 'tas fashion wanita mv_marvelouz', 'bahan import', 'KG0002', 333, 42000, 'assets/images/tas61.jpg'),
('PR0017', 'IMPORT TR 970 Tas Wanita', 'bahan import', 'KG0002', 211, 45900, 'assets/images/tas102.jpg'),
('PR0018', 'Eco Lunch Box', 'harga termurah', 'KG0003', 345, 59000, 'assets/images/pernik62.jpg'),
('PR0019', 'Toples Bunga', 'harga termurah', 'KG0003', 333, 45900, 'assets/images/pernik42.jpg'),
('PR0020', 'Panino Lunch Box', 'harga termurah', 'KG0003', 455, 42900, 'assets/images/pernik511.jpg'),
('PR0021', 'Bunny Mirror', 'harga termurah', 'KG0003', 330, 21900, 'assets/images/pernik102.jpg'),
('PR0022', 'Tootbrush character', 'harga termurah', 'KG0003', 655, 19000, 'assets/images/pernik92.jpg'),
('PR0023', 'Mirror LED pig', 'harga termurah', 'KG0003', 221, 16000, 'assets/images/pernik82.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_user` varchar(45) DEFAULT NULL,
  `no_telp` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `level_id_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `password`, `nama_user`, `no_telp`, `alamat`, `kode_pos`, `email`, `level_id_level`) VALUES
('100000', 'owner', 'owner', '098454637289', 'jember', 950846, 'owner@gmail.com', '333'),
('100001', 'saya', 'saya', '0923762476384', 'nganjuk', 38403, 'saya@gmail.com', '222'),
('100002', 'fikal', 'fikal', '0987678986679', 'nganjuk', 98979, 'fikal@gmail.com', '222'),
('100003', 'mega', 'mega', '0083478473463', 'jember', 974938, 'mega@gmail.com', '222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD KEY `fk_keranjang_produk1` (`produk_id_produk`),
  ADD KEY `id_kostumer_id` (`id_kostumer_id`),
  ADD KEY `pesan_id_pesan` (`pesan_id_pesan`);

--
-- Indexes for table `kostumer`
--
ALTER TABLE `kostumer`
  ADD PRIMARY KEY (`id_kostumer`),
  ADD KEY `id_level_id` (`id_level_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_kirim`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `fk_pesan_pengiriman1_idx` (`pengiriman_id_kirim`),
  ADD KEY `id_kostumer_id` (`id_kostumer_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `fk_produk_kategori1_idx` (`kategori_id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_user_level_idx` (`level_id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kostumer`
--
ALTER TABLE `kostumer`
  MODIFY `id_kostumer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_keranjang_produk1` FOREIGN KEY (`produk_id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_kostumer_id`) REFERENCES `kostumer` (`id_kostumer`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`pesan_id_pesan`) REFERENCES `pesan` (`id_pesan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kostumer`
--
ALTER TABLE `kostumer`
  ADD CONSTRAINT `kostumer_ibfk_1` FOREIGN KEY (`id_level_id`) REFERENCES `level` (`id_level`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_kategori1` FOREIGN KEY (`kategori_id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_level` FOREIGN KEY (`level_id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
