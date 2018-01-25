-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2018 at 02:11 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(10, 'Fungsional Umum'),
(11, 'Pembantu Pimpinan'),
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
  `namaPangkat` varchar(255) NOT NULL,
  `gajiPokok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`kdPangkat`, `namaPangkat`, `gajiPokok`) VALUES
(1, 'Pembina Utama Muda, IV/c', 5000),
(2, 'Pembina Tk.I, IV/b', 5000),
(3, 'Pembina, IV/a', 5000),
(4, 'Penata Tk.I, III/d', 4000),
(5, 'Penata, III/c', 4000),
(6, 'Penata Muda Tk.I, III/b', 4000),
(7, 'Penata Muda, III/a', 4000),
(8, 'Pengatur Tk.I, II/d', 3000),
(9, 'Pengatur, II/c', 3000),
(10, 'Pengatur Muda Tk.I, II/b', 3000),
(11, 'Pengatur Muda, II/a', 3000),
(12, 'Juru Tk.I, I/d', 2000),
(13, 'Juru, I/c', 2000),
(14, 'Juru Muda Tk.I, I/b', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `NIP` bigint(18) NOT NULL,
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
  `mulaiJabatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `namaPegawai`, `tempat`, `tglLahir`, `agama`, `alamat`, `jk`, `telepon`, `kdPangkat`, `tmtPangkat`, `kdJabatan`, `tmtJabatan`, `mulaiJabatan`) VALUES
(196506051985032003, 'Rita Parsita, S.Pd.', 'Garut', '1965-06-05', 'Islam', 'Hotel', 'Perempuan', 2147483647, 4, '2010-10-01', 11, '1998-10-01', '1985-03-01'),
(196905151992032009, 'Dr.Hj. Elis Rosdiawati, M.Pd.', 'Garut', '1969-05-15', 'Islam', 'Apartemen', 'Perempuan', 2147483647, 1, '2016-04-01', 1, '2017-05-01', '1992-03-01');

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

INSERT INTO `tunjangan` (`id`, `gajiPokok`, `tjIstri`, `tjAnak`, `tjUpns`, `tjStruk`, `tjFungsi`, `tjDaerah`, `tjPencil`, `tjLain`, `tjKompen`, `tjBeras`, `tjPph`, `pembul`) VALUES
(1, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7),
(2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5);

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
('admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 1);

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
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `kdPangkat` (`kdPangkat`),
  ADD KEY `kdJabatan` (`kdJabatan`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `kdPangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tunjangan`
--
ALTER TABLE `tunjangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`kdPangkat`) REFERENCES `pangkat` (`kdPangkat`),
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`kdJabatan`) REFERENCES `jabatan` (`kdJabatan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
