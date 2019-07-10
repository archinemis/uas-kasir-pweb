-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2019 at 07:27 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

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
  `qty` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `harga_jual` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `qty`, `kategori`, `harga_beli`, `harga_jual`) VALUES
('B-001', 'Kursi Santai', 6, 'Barang Rumah Tangga', 5000000, 5400000),
('B-002', 'Xiaomi Redmi Pro 3/22', 5, 'Barang Elektronik', 1500000, 1700000),
('B-003', 'RAM Team Elite DDR4 4GB 2400Mhz', 60, 'Komponen Komputer/Laptop', 440000, 480000),
('B-004', 'Mouse Logitech M221', 30, 'Komponen Komputer/Laptop', 150000, 175000);

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
('K190616001', 'Denandra Prasetya Laksma Putra', 'Jl Semampir Tengah 8A', '089507773113', '1998-12-16', 'L', 'S1', 'Direktur', 'nndraa', '123', 0, 0, 0, 0, 0, 0),
('K190618002', 'Bastian', 'Jl. Rungkut', '0858585858', '1999-04-22', 'L', 'SD', 'Karyawan', '', '', 0, 0, 0, 0, 0, 0);

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
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`kode_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
