-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2023 at 10:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `No_anggota` varchar(20) NOT NULL,
  `Nama_anggota` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Kota` varchar(255) DEFAULT NULL,
  `Kode_pos` varchar(10) DEFAULT NULL,
  `Tempat_lahir` varchar(255) DEFAULT NULL,
  `Tanggal_lahir` date DEFAULT NULL,
  `Umur` varchar(20) DEFAULT NULL,
  `No_KTP` varchar(20) DEFAULT NULL,
  `Jenis_kelamin` varchar(10) DEFAULT NULL,
  `Telepon` varchar(20) DEFAULT NULL,
  `Pendidikan` varchar(255) DEFAULT NULL,
  `Pekerjaan_Jabatan` varchar(255) DEFAULT NULL,
  `Tanggal_masuk` date DEFAULT NULL,
  `Simpanan_pokok` decimal(10,2) DEFAULT NULL,
  `smk` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`No_anggota`, `Nama_anggota`, `Alamat`, `Kota`, `Kode_pos`, `Tempat_lahir`, `Tanggal_lahir`, `Umur`, `No_KTP`, `Jenis_kelamin`, `Telepon`, `Pendidikan`, `Pekerjaan_Jabatan`, `Tanggal_masuk`, `Simpanan_pokok`, `smk`) VALUES
('2113', 'asd', 'asd', 'asd', '234', 'asd', '2023-08-16', '34', '234', '1', '2324', 'asda', 'sdasd', '2023-08-14', '0.00', '0'),
('AG001', 'John Doe', 'Jalan ABC No. 123', 'Jakarta', '12345', 'Jakarta', '1990-01-01', '33', '1234567890', '1', '081234567890', 'S1 Teknik Informatika', 'Pegawai Swasta', '2022-01-01', '1000000.00', '10000'),
('AG002', 'Jany Romince', 'Jalan XYZ No. 456', 'Surabaya', '67890', 'Surabaya', '1995-05-10', '28', '0987654321', '2', '082345678901', 'S1 Akuntansi', 'Karyawan BUMN', '2022-02-15', '500000.00', '5000'),
('awdawd', 'wdwad', 'awdawd', 'awdawd', 'awd', 'awdawd', '2023-08-16', 'e', 'e', '1', 'e', 'e', 'e', '2023-08-23', '0.00', '0'),
('r', 'r', 'r', 'r', 'r', 'r', '2023-08-09', 'r', 'r', '1', 'r', 'r', 'r', '2023-08-25', '0.00', '0'),
('w', 'w', 'w', 'w', 'w', 'w', '2023-08-10', 'w', 'w', '1', 'w', 'w', 'w', '2023-08-08', '0.00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `ID_angsuran` varchar(20) NOT NULL,
  `ID_pinjaman` varchar(20) DEFAULT NULL,
  `No_anggota` varchar(20) DEFAULT NULL,
  `Nama_anggota` varchar(255) DEFAULT NULL,
  `NIK` varchar(20) DEFAULT NULL,
  `Tanggal_angsuran` date DEFAULT NULL,
  `Tanggal_bayar` date DEFAULT NULL,
  `Angsuran_ke` varchar(20) DEFAULT NULL,
  `Jumlah_angsuran` decimal(10,2) DEFAULT NULL,
  `Denda` decimal(10,2) DEFAULT NULL,
  `Total_bayar` decimal(10,2) DEFAULT NULL,
  `Sisa_pinjaman_akhir` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`ID_angsuran`, `ID_pinjaman`, `No_anggota`, `Nama_anggota`, `NIK`, `Tanggal_angsuran`, `Tanggal_bayar`, `Angsuran_ke`, `Jumlah_angsuran`, `Denda`, `Total_bayar`, `Sisa_pinjaman_akhir`) VALUES
('ANS001', 'PIN001', 'AG001', 'John Doe', '1234567890', '2023-05-19', '2023-05-20', '1', '100000.00', '0.00', '100000.00', '900000.00'),
('ANS002', 'PIN002', 'AG002', 'Jany Romince', '0987654321', '2023-05-19', '2023-05-20', '1', '100000.00', '0.00', '100000.00', '400000.00');

-- --------------------------------------------------------

--
-- Table structure for table `bantu_keterangan`
--

CREATE TABLE `bantu_keterangan` (
  `ID` varchar(20) NOT NULL,
  `Keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bantu_keterangan`
--

INSERT INTO `bantu_keterangan` (`ID`, `Keterangan`) VALUES
('KET001', 'Keterangan Pertama'),
('KET002', 'Keterangan Kedua');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `ID` varchar(20) NOT NULL,
  `Jenis_kelamin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`ID`, `Jenis_kelamin`) VALUES
('1', 'Laki-laki'),
('2', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `NIK` varchar(20) NOT NULL,
  `Nama_karyawan` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Kota` varchar(255) DEFAULT NULL,
  `Kode_pos` varchar(10) DEFAULT NULL,
  `Tempat_lahir` varchar(255) DEFAULT NULL,
  `Tanggal_lahir` date DEFAULT NULL,
  `Umur` varchar(20) DEFAULT NULL,
  `Status_karyawan` varchar(50) DEFAULT NULL,
  `No_telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`NIK`, `Nama_karyawan`, `Alamat`, `Kota`, `Kode_pos`, `Tempat_lahir`, `Tanggal_lahir`, `Umur`, `Status_karyawan`, `No_telepon`) VALUES
('0987654321', 'Jane Smith', 'Jl. Contoh Alamat Lain', 'Kota Lain', '54321', 'Tempat Lahir Lain', '1985-05-10', '38', 'ST002', '087654321098'),
('1234567890', 'John Doe', 'Jl. Contoh Alamat', 'Kota Contoh', '12345', 'Tempat Lahir', '1990-01-01', '33', 'ST001', '081234567890');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `No_akun_kas` varchar(20) NOT NULL,
  `Keterangan_kas` varchar(255) DEFAULT NULL,
  `Saldo_kas_simpanan` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`No_akun_kas`, `Keterangan_kas`, `Saldo_kas_simpanan`) VALUES
('KAS001', 'Penerimaan Simpanan', '1000.00'),
('KAS002', 'Pengeluaran Biaya Administrasi', '-500.00');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `ID_pinjaman` varchar(20) NOT NULL,
  `No_anggota` varchar(20) DEFAULT NULL,
  `NIK` varchar(20) DEFAULT NULL,
  `No_akun_piutang` varchar(20) DEFAULT NULL,
  `Tanggal_pengaju` date DEFAULT NULL,
  `Tanggal_otorisasi` date DEFAULT NULL,
  `Besar_pinjaman` decimal(10,2) DEFAULT NULL,
  `Jangka_waktu` decimal(10,0) NOT NULL,
  `Angsuran_pokok` decimal(10,0) NOT NULL,
  `Bunga/Tahun` decimal(10,0) NOT NULL,
  `Bunga/Bulan` decimal(10,0) NOT NULL,
  `jumlah_angsuran` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`ID_pinjaman`, `No_anggota`, `NIK`, `No_akun_piutang`, `Tanggal_pengaju`, `Tanggal_otorisasi`, `Besar_pinjaman`, `Jangka_waktu`, `Angsuran_pokok`, `Bunga/Tahun`, `Bunga/Bulan`, `jumlah_angsuran`) VALUES
('123', '2113', '1234567890', 'PU003', '2023-08-10', '2023-08-23', '2.00', '2', '2', '2', '2', '2'),
('PIN001', 'AG001', '1234567890', 'PU001', '2023-05-19', '2023-05-20', '1000000.00', '12', '100000', '10', '1', '12'),
('PIN002', 'AG002', '0987654321', 'PU002', '2023-05-19', '2023-05-20', '500000.00', '6', '100000', '8', '0', '6');

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `No_akun_piutang` varchar(20) NOT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  `Saldo_piutang_anggota` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `piutang`
--

INSERT INTO `piutang` (`No_akun_piutang`, `Keterangan`, `Saldo_piutang_anggota`) VALUES
('PU001', 'Piutang Anggota A', '5000.00'),
('PU002', 'Piutang Anggota B', '10000.00'),
('PU003', 'angsuran c', '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `ID_simpanan` varchar(20) NOT NULL,
  `No_anggota` varchar(20) DEFAULT NULL,
  `Nama_anggota` varchar(255) DEFAULT NULL,
  `Tgl_simpanan` date DEFAULT NULL,
  `NIK` varchar(20) DEFAULT NULL,
  `Nama_karyawan` varchar(255) DEFAULT NULL,
  `No_akun_kas` varchar(20) DEFAULT NULL,
  `Setoran` decimal(10,2) DEFAULT NULL,
  `Penarikan` decimal(10,2) DEFAULT NULL,
  `Keterangan_simpanan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`ID_simpanan`, `No_anggota`, `Nama_anggota`, `Tgl_simpanan`, `NIK`, `Nama_karyawan`, `No_akun_kas`, `Setoran`, `Penarikan`, `Keterangan_simpanan`) VALUES
('123', 'AG001', NULL, '2023-08-09', '1234567890', NULL, 'KAS001', '2.00', '2.00', 'KET001');

-- --------------------------------------------------------

--
-- Table structure for table `status_karyawan`
--

CREATE TABLE `status_karyawan` (
  `ID` varchar(20) NOT NULL,
  `Status_karyawan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_karyawan`
--

INSERT INTO `status_karyawan` (`ID`, `Status_karyawan`) VALUES
('ST001', 'Karyawan Tetap'),
('ST002', 'Karyawan Kontrak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`No_anggota`),
  ADD KEY `Jenis_kelamin` (`Jenis_kelamin`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`ID_angsuran`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `ID_pinjaman` (`ID_pinjaman`);

--
-- Indexes for table `bantu_keterangan`
--
ALTER TABLE `bantu_keterangan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`NIK`),
  ADD KEY `Status_karyawan` (`Status_karyawan`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`No_akun_kas`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`ID_pinjaman`),
  ADD KEY `No_anggota` (`No_anggota`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `No_akun_piutang` (`No_akun_piutang`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`No_akun_piutang`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`ID_simpanan`),
  ADD KEY `No_anggota` (`No_anggota`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `No_akun_kas` (`No_akun_kas`),
  ADD KEY `Keterangan_simpanan` (`Keterangan_simpanan`);

--
-- Indexes for table `status_karyawan`
--
ALTER TABLE `status_karyawan`
  ADD PRIMARY KEY (`ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`Jenis_kelamin`) REFERENCES `jenis_kelamin` (`ID`);

--
-- Constraints for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `angsuran_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `karyawan` (`NIK`),
  ADD CONSTRAINT `angsuran_ibfk_2` FOREIGN KEY (`ID_pinjaman`) REFERENCES `pinjaman` (`ID_pinjaman`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`Status_karyawan`) REFERENCES `status_karyawan` (`ID`);

--
-- Constraints for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `pinjaman_ibfk_1` FOREIGN KEY (`No_anggota`) REFERENCES `anggota` (`No_anggota`),
  ADD CONSTRAINT `pinjaman_ibfk_2` FOREIGN KEY (`NIK`) REFERENCES `karyawan` (`NIK`),
  ADD CONSTRAINT `pinjaman_ibfk_3` FOREIGN KEY (`No_akun_piutang`) REFERENCES `piutang` (`No_akun_piutang`);

--
-- Constraints for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD CONSTRAINT `simpanan_ibfk_1` FOREIGN KEY (`No_anggota`) REFERENCES `anggota` (`No_anggota`),
  ADD CONSTRAINT `simpanan_ibfk_2` FOREIGN KEY (`NIK`) REFERENCES `karyawan` (`NIK`),
  ADD CONSTRAINT `simpanan_ibfk_3` FOREIGN KEY (`No_akun_kas`) REFERENCES `kas` (`No_akun_kas`),
  ADD CONSTRAINT `simpanan_ibfk_4` FOREIGN KEY (`NIK`) REFERENCES `karyawan` (`NIK`),
  ADD CONSTRAINT `simpanan_ibfk_5` FOREIGN KEY (`No_akun_kas`) REFERENCES `kas` (`No_akun_kas`),
  ADD CONSTRAINT `simpanan_ibfk_6` FOREIGN KEY (`Keterangan_simpanan`) REFERENCES `bantu_keterangan` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
