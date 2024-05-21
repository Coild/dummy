-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 04:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esakip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokumen_user`
--

CREATE TABLE `tbl_dokumen_user` (
  `id` int(11) NOT NULL,
  `opd` varchar(128) NOT NULL,
  `nama_dok` varchar(128) NOT NULL,
  `jenis_dok` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `year` varchar(128) NOT NULL,
  `file_name` varchar(128) NOT NULL,
  `perencanaan` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `triwulan` tinyint(1) NOT NULL,
  `nilai_triwulan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dokumen_user`
--

INSERT INTO `tbl_dokumen_user` (`id`, `opd`, `nama_dok`, `jenis_dok`, `date`, `year`, `file_name`, `perencanaan`, `status`, `triwulan`, `nilai_triwulan`) VALUES
(143, 'Minahasa', 'Renstra 2023', 'Renstra', '2023-04-19', '2023', 'catatan_presentasi5.docx', 1, 0, 0, 0),
(144, 'Minahasa', 'Laporan Kinerja Triwulan 1', 'triwulan1', '2023-04-19', '2023', 'test.docx', 0, 0, 1, 1),
(145, 'Minahasa', 'Laporan Kinerja Triwulan 2', 'triwulan2', '2023-04-19', '2023', 'catatan_presentasi6.docx', 0, 0, 1, 0),
(146, 'Minahasa', 'Laporan Kinerja Triwulan 3', 'triwulan3', '2023-04-19', '2023', 'catatan_presentasi7.docx', 0, 0, 1, 0),
(147, 'Minahasa', 'Laporan Kinerja Triwulan 4', 'triwulan4', '2023-04-19', '2023', 'social_media_strategic_plan.pdf', 0, 0, 1, 0),
(148, 'Minahasa', 'Laporan Kinerja Tahun 2023', 'lakip', '2023-04-19', '2023', 'catatan_presentasi8.docx', 0, 0, 0, 0),
(149, 'Manado', 'Renstra 2023', 'Renstra', '2023-04-19', '2023', 'catatan_presentasi10.docx', 1, 0, 0, 0),
(150, 'Manado', 'Laporan Kinerja Triwulan 1', 'triwulan1', '2023-04-19', '2023', 'Social_Media_Analytics_Strategy_Using_Data_to_Optimize_Business_Performance_by_Alex_Gonçalves_(auth_)_(z-lib_org)_2.pdf', 0, 0, 1, 1),
(151, 'Manado', 'Laporan Kinerja Tahun 2023', 'lakip', '2023-04-19', '2023', 'catatan_presentasi11.docx', 0, 0, 0, 0),
(152, 'Manado', 'IKU', 'IKU', '2023-04-19', '', 'test_id4_(1)31.docx', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_evaluasi`
--

CREATE TABLE `tbl_evaluasi` (
  `id` int(11) NOT NULL,
  `opd` varchar(128) NOT NULL,
  `file_name` varchar(128) NOT NULL,
  `nilai` varchar(128) NOT NULL,
  `year` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_evaluasi`
--

INSERT INTO `tbl_evaluasi` (`id`, `opd`, `file_name`, `nilai`, `year`) VALUES
(35, 'Minahasa', 'catatan_presentasi9.docx', 'A', '2023'),
(36, 'Manado', 'catatan_presentasi10_(2).docx', 'B', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_informasi`
--

CREATE TABLE `tbl_informasi` (
  `id` int(11) NOT NULL,
  `u_tujuan` varchar(150) NOT NULL,
  `informasi` varchar(500) NOT NULL,
  `file` varchar(150) NOT NULL,
  `date_sended` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_informasi`
--

INSERT INTO `tbl_informasi` (`id`, `u_tujuan`, `informasi`, `file`, `date_sended`) VALUES
(44, 'All', 'Segera Kirimkan Progres Kinerja', '', '2023-04-19'),
(45, 'Manado', 'Segera Kirimkan Laporan', 'test_id4_(1)3.docx', '2023-04-19'),
(46, 'All', 'Segera masukan', 'test_id43.docx', '2023-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_dokumen`
--

CREATE TABLE `tbl_jenis_dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jenis_dokumen`
--

INSERT INTO `tbl_jenis_dokumen` (`id_dokumen`, `name`) VALUES
(1, 'Renstra'),
(2, 'RPJMD'),
(3, 'IKU'),
(4, 'Renja'),
(5, 'PK'),
(6, 'Rencana Aksi'),
(8, 'Cascading Kinerja'),
(9, 'Pohon Kinerja'),
(10, 'Crosscutting');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_user`
--

CREATE TABLE `tbl_jenis_user` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jenis_user`
--

INSERT INTO `tbl_jenis_user` (`id`, `name`) VALUES
(1, 'Instansi Pemda'),
(2, 'Organisasi Perangkat Daerah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengukuran_triwulan`
--

CREATE TABLE `tbl_pengukuran_triwulan` (
  `id` int(11) NOT NULL,
  `opd` varchar(128) NOT NULL,
  `year` varchar(128) NOT NULL,
  `ji_t1` varchar(128) NOT NULL,
  `tt_t1` varchar(128) NOT NULL,
  `tc1_t1` varchar(128) NOT NULL,
  `tc2_t1` varchar(128) NOT NULL,
  `tc3_t1` varchar(128) NOT NULL,
  `tc4_t1` varchar(128) NOT NULL,
  `tc5_t1` varchar(128) NOT NULL,
  `t_t1` varchar(128) NOT NULL,
  `mt_t1` varchar(128) NOT NULL,
  `ji_t2` varchar(128) NOT NULL,
  `tt_t2` varchar(128) NOT NULL,
  `tc1_t2` varchar(128) NOT NULL,
  `tc2_t2` varchar(128) NOT NULL,
  `tc3_t2` varchar(128) NOT NULL,
  `tc4_t2` varchar(128) NOT NULL,
  `tc5_t2` varchar(128) NOT NULL,
  `t_t2` varchar(128) NOT NULL,
  `mt_t2` varchar(128) NOT NULL,
  `ji_t3` varchar(128) NOT NULL,
  `tt_t3` varchar(128) NOT NULL,
  `tc1_t3` varchar(128) NOT NULL,
  `tc2_t3` varchar(128) NOT NULL,
  `tc3_t3` varchar(128) NOT NULL,
  `tc4_t3` varchar(128) NOT NULL,
  `tc5_t3` varchar(128) NOT NULL,
  `t_t3` varchar(128) NOT NULL,
  `mt_t3` varchar(128) NOT NULL,
  `ji_t4` varchar(128) NOT NULL,
  `tt_t4` varchar(128) NOT NULL,
  `tc1_t4` varchar(128) NOT NULL,
  `tc2_t4` varchar(128) NOT NULL,
  `tc3_t4` varchar(128) NOT NULL,
  `tc4_t4` varchar(128) NOT NULL,
  `tc5_t4` varchar(128) NOT NULL,
  `t_t4` varchar(128) NOT NULL,
  `mt_t4` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengukuran_triwulan`
--

INSERT INTO `tbl_pengukuran_triwulan` (`id`, `opd`, `year`, `ji_t1`, `tt_t1`, `tc1_t1`, `tc2_t1`, `tc3_t1`, `tc4_t1`, `tc5_t1`, `t_t1`, `mt_t1`, `ji_t2`, `tt_t2`, `tc1_t2`, `tc2_t2`, `tc3_t2`, `tc4_t2`, `tc5_t2`, `t_t2`, `mt_t2`, `ji_t3`, `tt_t3`, `tc1_t3`, `tc2_t3`, `tc3_t3`, `tc4_t3`, `tc5_t3`, `t_t3`, `mt_t3`, `ji_t4`, `tt_t4`, `tc1_t4`, `tc2_t4`, `tc3_t4`, `tc4_t4`, `tc5_t4`, `t_t4`, `mt_t4`) VALUES
(39, 'Minahasa', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(40, 'Minahasa', '2023', '10', '8', '1', '', '', '', '1', '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(41, 'Manado', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(42, 'Manado', '2023', '10', '9', '1', '', '', '', '2', '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile`
--

CREATE TABLE `tbl_profile` (
  `id` int(11) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `gelar_depan` varchar(150) NOT NULL,
  `nama_admin` varchar(150) NOT NULL,
  `golongan` varchar(150) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `no_hp` varchar(40) NOT NULL,
  `gelar_belakang` varchar(150) NOT NULL,
  `unit_kerja` varchar(150) NOT NULL,
  `eselon` varchar(70) NOT NULL,
  `NIP` varchar(100) NOT NULL,
  `no_tlp_kantor` varchar(40) NOT NULL,
  `date_created` date NOT NULL,
  `date_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_profile`
--

INSERT INTO `tbl_profile` (`id`, `user_name`, `gelar_depan`, `nama_admin`, `golongan`, `jabatan`, `no_hp`, `gelar_belakang`, `unit_kerja`, `eselon`, `NIP`, `no_tlp_kantor`, `date_created`, `date_update`) VALUES
(1, 'Geral Manis', 'Dr.', 'AA', 'AA', 'AA', '123456', 'S.KOM', 'Gubernur', 'AA', '123456', '0812345', '2023-04-19', '2023-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_dokumen`
--

CREATE TABLE `tbl_status_dokumen` (
  `id` int(11) NOT NULL,
  `opd` varchar(128) NOT NULL,
  `rpjmd` varchar(128) NOT NULL,
  `renstra` varchar(128) NOT NULL,
  `iku` varchar(128) NOT NULL,
  `renja` varchar(128) NOT NULL,
  `pk` varchar(128) NOT NULL,
  `renaksi` varchar(128) NOT NULL,
  `cascading_kinerja` varchar(128) NOT NULL,
  `pohon_kinerja` varchar(128) NOT NULL,
  `crosscutting` varchar(128) NOT NULL,
  `lakip` varchar(128) NOT NULL,
  `triwulan1` varchar(128) NOT NULL,
  `triwulan2` varchar(128) NOT NULL,
  `triwulan3` varchar(128) NOT NULL,
  `triwulan4` varchar(128) NOT NULL,
  `year` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status_dokumen`
--

INSERT INTO `tbl_status_dokumen` (`id`, `opd`, `rpjmd`, `renstra`, `iku`, `renja`, `pk`, `renaksi`, `cascading_kinerja`, `pohon_kinerja`, `crosscutting`, `lakip`, `triwulan1`, `triwulan2`, `triwulan3`, `triwulan4`, `year`) VALUES
(41, 'Minahasa', '', '1', '', '', '', '', '', '', '', '1', '1', '1', '1', '1', '2023'),
(42, 'Manado', '', '1', '', '', '', '', '', '', '', '1', '1', '', '', '', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_triwulan`
--

CREATE TABLE `tbl_triwulan` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_triwulan`
--

INSERT INTO `tbl_triwulan` (`id`, `name`) VALUES
(1, 'triwulan1'),
(2, 'triwulan2'),
(3, 'triwulan3'),
(4, 'triwulan4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `Jenis_user` varchar(70) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_akses` int(2) NOT NULL,
  `user_status` int(2) NOT NULL,
  `date_created` date NOT NULL,
  `date_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `Jenis_user`, `user_email`, `user_password`, `user_akses`, `user_status`, `date_created`, `date_update`) VALUES
(23, 'admin', 'admin', 'adm.sakipsulut@gmail.com', '475e8bfc152c56f186bbcfcfc9c400bd', 1, 1, '2022-12-13', '2022-12-17'),
(52, 'Minahasa', 'Organisasi Perangkat Daerah', 'minahasa@gmail.com', '6ad14ba9986e3615423dfca256d04e3f', 2, 1, '2023-04-19', '2023-04-19'),
(53, 'Manado', 'Organisasi Perangkat Daerah', 'manado@gmail.com', '6ad14ba9986e3615423dfca256d04e3f', 2, 1, '2023-04-19', '2023-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

CREATE TABLE `tbl_year` (
  `id` int(11) NOT NULL,
  `year` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`id`, `year`) VALUES
(73, '2023'),
(87, '2024'),
(88, '2025'),
(89, '2023'),
(90, '2023'),
(91, '2023'),
(92, '2023'),
(93, '2023'),
(94, '2023'),
(95, '2023'),
(96, '2023'),
(97, '2023'),
(98, '2023'),
(99, '2023'),
(100, '2023'),
(101, '2023'),
(102, '2023'),
(103, '2023'),
(104, '2023'),
(105, '2023'),
(106, '2023'),
(107, '2023'),
(108, '2023'),
(109, '2023'),
(110, '2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dokumen_user`
--
ALTER TABLE `tbl_dokumen_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_evaluasi`
--
ALTER TABLE `tbl_evaluasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jenis_dokumen`
--
ALTER TABLE `tbl_jenis_dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `tbl_pengukuran_triwulan`
--
ALTER TABLE `tbl_pengukuran_triwulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status_dokumen`
--
ALTER TABLE `tbl_status_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_triwulan`
--
ALTER TABLE `tbl_triwulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_year`
--
ALTER TABLE `tbl_year`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dokumen_user`
--
ALTER TABLE `tbl_dokumen_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `tbl_evaluasi`
--
ALTER TABLE `tbl_evaluasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_jenis_dokumen`
--
ALTER TABLE `tbl_jenis_dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_pengukuran_triwulan`
--
ALTER TABLE `tbl_pengukuran_triwulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_status_dokumen`
--
ALTER TABLE `tbl_status_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_triwulan`
--
ALTER TABLE `tbl_triwulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_year`
--
ALTER TABLE `tbl_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
