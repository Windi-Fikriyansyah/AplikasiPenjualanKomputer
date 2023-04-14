-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 01:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmekanik`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id` varchar(12) NOT NULL,
  `nama_bagian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `nama_bagian`) VALUES
('BG001', 'Pemilik'),
('BG002', 'Admin'),
('BG003', 'Mekanik');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(12) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `stok` int(20) NOT NULL,
  `harga` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `harga`, `keterangan`) VALUES
('BRG001', 'Baut 15', 50, 5000, 'untuk semua jenis'),
('BRG002', 'oli seal', 92, 90000, 'all');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(11) NOT NULL,
  `nama_customer` varchar(25) NOT NULL,
  `no_telp` int(13) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `no_telp`, `alamat`, `email`) VALUES
('CS001', 'PT Permata', 5612288, 'Jl. Ayani', 'permata@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `detail_jasa`
--

CREATE TABLE `detail_jasa` (
  `id` int(11) NOT NULL,
  `no_faktur` varchar(20) NOT NULL,
  `id_jasa` varchar(12) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `nofaktur` varchar(20) NOT NULL,
  `id_barang` varchar(12) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `hapus_stokbrg` AFTER DELETE ON `detail_penjualan` FOR EACH ROW BEGIN
UPDATE barang SET stok = stok + OLD.jumlah
WHERE id_barang=OLD.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `penjualan` AFTER INSERT ON `detail_penjualan` FOR EACH ROW BEGIN
UPDATE barang SET stok = stok-NEW.jumlah
WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` varchar(12) NOT NULL,
  `nama_jasa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `nama_jasa`) VALUES
('JS001', 'pemasangan wiper'),
('JS002', 'service kaki-kaki');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_jasa`
--

CREATE TABLE `keranjang_jasa` (
  `id` int(11) NOT NULL,
  `id_jasa` varchar(11) NOT NULL,
  `jasa` varchar(25) NOT NULL,
  `harga` double NOT NULL,
  `user_id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_jual`
--

CREATE TABLE `keranjang_jual` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` int(10) NOT NULL,
  `subtotal` double NOT NULL,
  `user_id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` int(13) NOT NULL,
  `id_bagian` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `alamat`, `no_telp`, `id_bagian`) VALUES
('PG001', 'Rico', 'Jl. Jenderal Ahmad Yani', 2147483647, 'BG001'),
('PG002', 'Agus', 'podomoro', 1221212, 'BG002'),
('PG003', 'Teguh', 'pancasila', 213213, 'BG003');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `no_faktur` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` varchar(13) NOT NULL,
  `id_customer` varchar(13) NOT NULL,
  `total_harga` double NOT NULL,
  `total_bayar` double NOT NULL,
  `kembalian` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_jasa`
--

CREATE TABLE `transaksi_jasa` (
  `no_faktur` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pegawai` varchar(12) NOT NULL,
  `id_user` varchar(12) NOT NULL,
  `id_customer` varchar(12) NOT NULL,
  `status` varchar(11) NOT NULL,
  `total_harga` double NOT NULL,
  `total_bayar` double NOT NULL,
  `kembalian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `id_pegawai`) VALUES
('USR001', 'owner', '579233b2c479241523cba5e3af55d0f50f2d6414', 1, 'PG001'),
('USR002', 'Agus', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2, 'PG002'),
('USR003', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2, 'PG002');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_detail_jasa`
-- (See below for the actual view)
--
CREATE TABLE `v_detail_jasa` (
`id` int(11)
,`no_faktur` varchar(20)
,`id_jasa` varchar(12)
,`harga` double
,`nama_jasa` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_detail_penjualan`
-- (See below for the actual view)
--
CREATE TABLE `v_detail_penjualan` (
`id` int(11)
,`nofaktur` varchar(20)
,`id_barang` varchar(12)
,`harga` double
,`jumlah` double
,`subtotal` double
,`nama_barang` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pegawai`
-- (See below for the actual view)
--
CREATE TABLE `v_pegawai` (
`id_pegawai` varchar(12)
,`nama` varchar(30)
,`alamat` text
,`no_telp` int(13)
,`id` varchar(12)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_penjualan`
-- (See below for the actual view)
--
CREATE TABLE `v_penjualan` (
`no_faktur` varchar(20)
,`tanggal` date
,`id_user` varchar(13)
,`id_customer` varchar(13)
,`total_harga` double
,`total_bayar` double
,`kembalian` double
,`id_barang` varchar(12)
,`harga` double
,`jumlah` double
,`subtotal` double
,`username` varchar(50)
,`nama_customer` varchar(25)
,`nama_barang` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi_jasa`
-- (See below for the actual view)
--
CREATE TABLE `v_transaksi_jasa` (
`no_faktur` varchar(20)
,`tanggal` date
,`id_pegawai` varchar(12)
,`id_user` varchar(12)
,`id_customer` varchar(12)
,`status` varchar(11)
,`total_harga` double
,`total_bayar` double
,`kembalian` varchar(30)
,`id_jasa` varchar(12)
,`harga` double
,`nama_jasa` varchar(30)
,`username` varchar(50)
,`nama` varchar(30)
,`nama_customer` varchar(25)
,`no_telp` int(13)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user`
-- (See below for the actual view)
--
CREATE TABLE `v_user` (
`id_user` varchar(20)
,`username` varchar(50)
,`password` varchar(50)
,`level` int(1)
,`id_pegawai` varchar(20)
,`nama` varchar(30)
);

-- --------------------------------------------------------

--
-- Structure for view `v_detail_jasa`
--
DROP TABLE IF EXISTS `v_detail_jasa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_jasa`  AS  (select `detail_jasa`.`id` AS `id`,`detail_jasa`.`no_faktur` AS `no_faktur`,`jasa`.`id_jasa` AS `id_jasa`,`detail_jasa`.`harga` AS `harga`,`jasa`.`nama_jasa` AS `nama_jasa` from (`jasa` join `detail_jasa`) where `detail_jasa`.`id_jasa` = `jasa`.`id_jasa`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_detail_penjualan`
--
DROP TABLE IF EXISTS `v_detail_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_penjualan`  AS  (select `detail_penjualan`.`id` AS `id`,`detail_penjualan`.`nofaktur` AS `nofaktur`,`barang`.`id_barang` AS `id_barang`,`detail_penjualan`.`harga` AS `harga`,`detail_penjualan`.`jumlah` AS `jumlah`,`detail_penjualan`.`subtotal` AS `subtotal`,`barang`.`nama_barang` AS `nama_barang` from (`detail_penjualan` join `barang`) where `detail_penjualan`.`id_barang` = `barang`.`id_barang`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pegawai`
--
DROP TABLE IF EXISTS `v_pegawai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pegawai`  AS  (select `pegawai`.`id_pegawai` AS `id_pegawai`,`pegawai`.`nama` AS `nama`,`pegawai`.`alamat` AS `alamat`,`pegawai`.`no_telp` AS `no_telp`,`bagian`.`id` AS `id` from (`bagian` join `pegawai`) where `pegawai`.`id_bagian` = `bagian`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_penjualan`
--
DROP TABLE IF EXISTS `v_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penjualan`  AS  (select `penjualan`.`no_faktur` AS `no_faktur`,`penjualan`.`tanggal` AS `tanggal`,`penjualan`.`id_user` AS `id_user`,`penjualan`.`id_customer` AS `id_customer`,`penjualan`.`total_harga` AS `total_harga`,`penjualan`.`total_bayar` AS `total_bayar`,`penjualan`.`kembalian` AS `kembalian`,`detail_penjualan`.`id_barang` AS `id_barang`,`detail_penjualan`.`harga` AS `harga`,`detail_penjualan`.`jumlah` AS `jumlah`,`detail_penjualan`.`subtotal` AS `subtotal`,`user`.`username` AS `username`,`customer`.`nama_customer` AS `nama_customer`,`barang`.`nama_barang` AS `nama_barang` from ((((`barang` join `customer`) join `user`) join `penjualan`) join `detail_penjualan`) where `penjualan`.`no_faktur` = `detail_penjualan`.`nofaktur` and `penjualan`.`id_user` = `user`.`id_user` and `detail_penjualan`.`id_barang` = `barang`.`id_barang` and `penjualan`.`id_customer` = `customer`.`id_customer`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi_jasa`
--
DROP TABLE IF EXISTS `v_transaksi_jasa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi_jasa`  AS  (select `transaksi_jasa`.`no_faktur` AS `no_faktur`,`transaksi_jasa`.`tanggal` AS `tanggal`,`transaksi_jasa`.`id_pegawai` AS `id_pegawai`,`transaksi_jasa`.`id_user` AS `id_user`,`transaksi_jasa`.`id_customer` AS `id_customer`,`transaksi_jasa`.`status` AS `status`,`transaksi_jasa`.`total_harga` AS `total_harga`,`transaksi_jasa`.`total_bayar` AS `total_bayar`,`transaksi_jasa`.`kembalian` AS `kembalian`,`detail_jasa`.`id_jasa` AS `id_jasa`,`detail_jasa`.`harga` AS `harga`,`jasa`.`nama_jasa` AS `nama_jasa`,`user`.`username` AS `username`,`pegawai`.`nama` AS `nama`,`customer`.`nama_customer` AS `nama_customer`,`customer`.`no_telp` AS `no_telp` from (((((`detail_jasa` join `transaksi_jasa`) join `user`) join `pegawai`) join `customer`) join `jasa`) where `transaksi_jasa`.`no_faktur` = `detail_jasa`.`no_faktur` and `transaksi_jasa`.`id_customer` = `customer`.`id_customer` and `transaksi_jasa`.`id_pegawai` = `pegawai`.`id_pegawai` and `transaksi_jasa`.`id_user` = `user`.`id_user` and `detail_jasa`.`id_jasa` = `jasa`.`id_jasa`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user`  AS  (select `user`.`id_user` AS `id_user`,`user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`level` AS `level`,`user`.`id_pegawai` AS `id_pegawai`,`pegawai`.`nama` AS `nama` from (`user` join `pegawai`) where `user`.`id_pegawai` = `pegawai`.`id_pegawai`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_jasa`
--
ALTER TABLE `detail_jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indexes for table `keranjang_jasa`
--
ALTER TABLE `keranjang_jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang_jual`
--
ALTER TABLE `keranjang_jual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `transaksi_jasa`
--
ALTER TABLE `transaksi_jasa`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_jasa`
--
ALTER TABLE `detail_jasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keranjang_jasa`
--
ALTER TABLE `keranjang_jasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keranjang_jual`
--
ALTER TABLE `keranjang_jual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
