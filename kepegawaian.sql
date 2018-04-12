-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2018 at 06:46 AM
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
-- Database: `kepegawaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kdJabatan` int(11) NOT NULL,
  `namaJabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kdJabatan`, `namaJabatan`) VALUES
(1, 'Analis Pengembangan SDM'),
(2, 'Kepala Bidang Pengembangan Sumber Daya'),
(3, 'Kepala Subbagian Umum'),
(4, 'Kepala PP-PAUD dan Dikmas Jawa Barat'),
(5, 'Kepala Seksi Informasi dan Kemitraan'),
(6, 'Kepala Bidang Pengembangan Program dan Informasi'),
(7, 'Kepala Seksi Pengembangan Sumber Daya Manusia'),
(8, 'Kepala Seksi Pengambangan Satuan Pendidikan'),
(9, 'Kepala Seksi Program dan Evaluasi'),
(12, 'Pamong Belajar Pertama'),
(13, 'Pamong Belajar Madya'),
(14, 'Pamong Belajar Muda');

-- --------------------------------------------------------

--
-- Table structure for table `latihanjabatan`
--

CREATE TABLE `latihanjabatan` (
  `NIP` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `kdPangkat` int(11) NOT NULL,
  `namaPangkat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`kdPangkat`, `namaPangkat`) VALUES
(12, 'Juru Muda Tk.I, I/b'),
(13, 'Juru, I/c'),
(14, 'Juru Tk.I, I/d'),
(21, 'Pengatur Muda, II/a'),
(22, 'Pengatur Muda Tk.I, II/b'),
(23, 'Pengatur, II/c'),
(24, 'Pengatur Tk.I, II/d'),
(31, 'Penata Muda, III/a'),
(32, 'Penata Muda Tk.I, III/b'),
(33, 'Penata, III/c'),
(34, 'Penata Tk.I, III/d'),
(41, 'Pembina, IV/a'),
(42, 'Pembina Tk.I, IV/b'),
(43, 'Pembina Utama Muda, IV/c');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` bigint(18) NOT NULL,
  `namaPegawai` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tglLahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `telepon` int(20) NOT NULL,
  `kdPangkat` int(10) NOT NULL,
  `tmtPangkat` date NOT NULL,
  `kdJabatan` int(10) NOT NULL,
  `tmtJabatan` date NOT NULL,
  `mulaiJabatan` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `namaPegawai`, `tempat`, `tglLahir`, `agama`, `alamat`, `jk`, `telepon`, `kdPangkat`, `tmtPangkat`, `kdJabatan`, `tmtJabatan`, `mulaiJabatan`, `status`) VALUES
(196103061991032002, 'Dr. Hj. Uum Suminar', 'Majalengka', '1961-03-06', 'Islam', '', 'Perempuan', 0, 42, '2011-10-01', 2, '2016-01-11', '1993-03-01', 0),
(196905151992032009, 'Dr.Hj. Elis Rosdiawati, M.Pd.', 'Garut', '1969-05-15', 'Islam', '', 'Perempuan', 0, 43, '2016-04-01', 1, '2017-05-15', '1992-03-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pegawainon`
--

CREATE TABLE `pegawainon` (
  `kdPegawai` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawainon`
--

INSERT INTO `pegawainon` (`kdPegawai`, `nama`, `jabatan`) VALUES
('P-001', 'Juda', 'Pengajar');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `NIP` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `ijazah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan`
--

CREATE TABLE `tunjangan` (
  `id` int(11) NOT NULL,
  `kdPangkat` int(11) NOT NULL,
  `gajiPokok` int(10) NOT NULL,
  `tjIstri` int(10) NOT NULL,
  `tjAnak` int(10) NOT NULL,
  `tjUpns` int(10) NOT NULL,
  `tjStruk` int(10) NOT NULL,
  `tjFungsi` int(10) NOT NULL,
  `tjDaerah` int(10) NOT NULL,
  `tjPencil` int(10) NOT NULL,
  `tjLain` int(10) NOT NULL,
  `tjKompen` int(11) NOT NULL,
  `tjBeras` int(11) NOT NULL,
  `tjPph` int(11) NOT NULL,
  `pembul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tunjangan`
--

INSERT INTO `tunjangan` (`id`, `kdPangkat`, `gajiPokok`, `tjIstri`, `tjAnak`, `tjUpns`, `tjStruk`, `tjFungsi`, `tjDaerah`, `tjPencil`, `tjLain`, `tjKompen`, `tjBeras`, `tjPph`, `pembul`) VALUES
(1, 43, 4430400, 443040, 177216, 190000, 0, 0, 0, 0, 0, 0, 289680, 25695, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `role`, `status`) VALUES
('196905151992032009', '0b823b7d9e9cb5216f49c6ead8dde178', '1', 1),
('admin', '21232f297a57a5a743894a0e4a801fc3', '0', 1),
('pegawai', '047aeeb234644b9e2d4138ed3bc7976a', '2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kdJabatan`);

--
-- Indexes for table `latihanjabatan`
--
ALTER TABLE `latihanjabatan`
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`kdPangkat`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `kdPangkat` (`kdPangkat`),
  ADD KEY `kdJabatan` (`kdJabatan`);

--
-- Indexes for table `pegawainon`
--
ALTER TABLE `pegawainon`
  ADD PRIMARY KEY (`kdPegawai`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kdPangkat` (`kdPangkat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `kdJabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `kdPangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tunjangan`
--
ALTER TABLE `tunjangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`kdPangkat`) REFERENCES `pangkat` (`kdPangkat`),
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`kdJabatan`) REFERENCES `jabatan` (`kdJabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
