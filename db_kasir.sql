-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2019 at 02:48 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` char(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `harga_jual` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `satuan`, `kategori`, `harga_beli`, `harga_jual`) VALUES
('B-001', 'Kursi Santai', 'pcs', 'Barang Rumah Tangga', 5000000, 5400000),
('B-002', 'Xiaomi Redmi Pro 3/22', 'pcs', 'Barang Elektronik', 1500000, 1700000),
('B-003', 'RAM Team Elite DDR4 4GB 2400Mhz', 'pcs', 'Komponen Komputer/Laptop', 440000, 480000),
('B-004', 'Mouse Logitech M221', 'pcs', 'Komponen Komputer/Laptop', 150000, 175000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_penjualan`
--

CREATE TABLE `tb_detail_penjualan` (
  `id` int(11) NOT NULL,
  `kode_tr` varchar(20) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `santuan_barang` varchar(20) NOT NULL,
  `jml_barang` int(11) NOT NULL,
  `harga_jual` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_penjualan`
--

INSERT INTO `tb_detail_penjualan` (`id`, `kode_tr`, `kode_barang`, `nama_barang`, `santuan_barang`, `jml_barang`, `harga_jual`, `total`) VALUES
(3, '20190711.222911', 'B', 'Mouse Logitech M221', 'pcs', 1, 175000, 175000),
(4, '20190711.222911', '-', 'RAM Team Elite DDR4 4GB 2400Mhz', 'pcs', 2, 480000, 960000),
(5, '20190711.223122', 'B-004', 'Mouse Logitech M221', 'pcs', 2, 175000, 350000),
(6, '20190711.223122', 'B-003', 'RAM Team Elite DDR4 4GB 2400Mhz', 'pcs', 1, 480000, 480000),
(7, '20190712.023108', '', '', '', 0, 0, 0),
(8, '20190712.023452', '', '', '', 0, 0, 0),
(9, '20190712.023621', '', '', '', 0, 0, 0),
(10, '20190713.150502', 'B-004', 'Mouse Logitech M221', 'pcs', 2, 175000, 350000),
(11, '20190713.150502', 'B-003', 'RAM Team Elite DDR4 4GB 2400Mhz', 'pcs', 1, 480000, 480000),
(12, '20190713.151311', 'B-004', 'Mouse Logitech M221', 'pcs', 1, 175000, 175000),
(13, '20190713.151311', 'B-003', 'RAM Team Elite DDR4 4GB 2400Mhz', 'pcs', 2, 480000, 960000),
(14, '20190713.151538', 'B-003', 'RAM Team Elite DDR4 4GB 2400Mhz', 'pcs', 1, 480000, 480000),
(15, '20190713.151538', 'B-004', 'Mouse Logitech M221', 'pcs', 2, 175000, 350000),
(16, '20190713.153459', 'B-004', 'Mouse Logitech M221', 'pcs', 2, 175000, 350000),
(17, '20190713.153459', 'B-003', 'RAM Team Elite DDR4 4GB 2400Mhz', 'pcs', 1, 480000, 480000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `nik` varchar(10) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `alamat_karyawan` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` char(1) NOT NULL,
  `pendidikan` varchar(25) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `m1` int(11) NOT NULL,
  `m2` int(11) NOT NULL,
  `m3` int(11) NOT NULL,
  `t1` int(11) NOT NULL,
  `t2` int(11) NOT NULL,
  `l1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`nik`, `nama_karyawan`, `alamat_karyawan`, `no_telp`, `tgl_lahir`, `jk`, `pendidikan`, `jabatan`, `username`, `password`, `m1`, `m2`, `m3`, `t1`, `t2`, `l1`) VALUES
('K190616001', 'Denandra Prasetya Laksma Putra', 'Jl Semampir Tengah 8A', '089507773113', '1998-12-16', 'L', 'S1', 'Direktur', 'nndraa', '123', 1, 1, 1, 1, 1, 1),
('K190618002', 'Bastian', 'Jl. Rungkut', '0858585858', '1999-04-22', 'L', 'SD', 'Karyawan', '', '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `kode_tr` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `total` float NOT NULL,
  `ppn` float NOT NULL,
  `diskon` float NOT NULL,
  `grand_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`kode_tr`, `nama`, `alamat`, `no_telp`, `keterangan`, `total`, `ppn`, `diskon`, `grand_total`) VALUES
('20190711.222911', 'qweqwe', 'wew', '2322', '23322332', 1135000, 0, 0, 1135000),
('20190711.223122', 'deann', 'jl', '232323', 'ereeeeeereee', 830000, 0, 0, 830000),
('20190712.023108', '', '', '', '', 0, 0, 0, 0),
('20190712.023452', '', '', '', '', 0, 0, 0, 0),
('20190712.023621', '', '', '', '', 0, 0, 0, 0),
('20190713.150502', 'deann', 'wew', '2322', 'qwwewqqwwq', 830000, 0, 0, 830000),
('20190713.151311', 'qweqwe', 'ewweew', '2322', 'qwwewqqwwq', 1135000, 0, 0, 1135000),
('20190713.151538', 'deann', 'wew', '2322', '23322332', 830000, 0, 0, 830000),
('20190713.153459', 'qweqwe', 'wew', '2322', 'qwwewqqwwq', 830000, 0, 0, 830000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `kode_supplier` varchar(20) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`kode_supplier`, `nama_supplier`, `nama_perusahaan`, `alamat`, `kota`, `no_telp`, `no_handphone`, `email`, `keterangan`) VALUES
('SUP190617001', 'Asekaaaa', 'PT ASEK Multimedia', 'Jl Semampir Tengah 8A', 'Surabaya', '08214292929', '0361339993', 'info@asek.com', 'aseeeeeeeeeeeeek');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tb_detail_penjualan`
--
ALTER TABLE `tb_detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`kode_tr`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_penjualan`
--
ALTER TABLE `tb_detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
