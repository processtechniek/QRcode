-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 02:11 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_procestechniek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id`, `name`) VALUES
(1, 'Procesbeschrijving'),
(2, 'Grondschemas'),
(3, 'P+I'),
(4, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `tb_document`
--

CREATE TABLE `tb_document` (
  `id` int(11) NOT NULL,
  `uuid` varchar(200) NOT NULL,
  `documentname` varchar(200) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_document`
--

INSERT INTO `tb_document` (`id`, `uuid`, `documentname`, `type_id`) VALUES
(1, '4850f5a9-ec4c-4984-abe5-e62f60b411fc', 'uitleg.pdf', 1),
(2, '4850f5a9-ec4c-4984-abe5-e62f60b411fc', 'foto1.png', 2),
(3, '4850f5a9-ec4c-4984-abe5-e62f60b411fc', 'test.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_info`
--

CREATE TABLE `tb_info` (
  `id` int(11) NOT NULL,
  `uuid` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_info`
--

INSERT INTO `tb_info` (`id`, `uuid`, `category_id`, `information`) VALUES
(1, '4850f5a9-ec4c-4984-abe5-e62f60b411fc', 1, 'tekst 1'),
(2, '4850f5a9-ec4c-4984-abe5-e62f60b411fc', 2, 'tekst 2'),
(3, '4850f5a9-ec4c-4984-abe5-e62f60b411fc', 3, 'tekst 3'),
(4, '4850f5a9-ec4c-4984-abe5-e62f60b411fc', 4, 'tekst 4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_part`
--

CREATE TABLE `tb_part` (
  `id` int(11) NOT NULL,
  `uuid` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `qrcode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_part`
--

INSERT INTO `tb_part` (`id`, `uuid`, `name`, `qrcode`) VALUES
(21, '4850f5a9-ec4c-4984-abe5-e62f60b411fc', 'JH-14', 'QR-4850f5a9-ec4c-4984-abe5-e62f60b411fc.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id`, `name`) VALUES
(1, 'Docent'),
(2, 'Beheerder');

-- --------------------------------------------------------

--
-- Table structure for table `tb_type`
--

CREATE TABLE `tb_type` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_type`
--

INSERT INTO `tb_type` (`id`, `name`) VALUES
(4, 'Bestanden'),
(5, 'Afbeeldingen');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `email`, `password`, `role_id`) VALUES
(4, 'Jelle', 'jelle.s3112@gmail.com', '$2y$10$59Z.KdZp.tRP3AkyHmzuMuST2jajGY0ODC1L.04FL6vIQ2d2gG7BC', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_document`
--
ALTER TABLE `tb_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_part`
--
ALTER TABLE `tb_part`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_type`
--
ALTER TABLE `tb_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_document`
--
ALTER TABLE `tb_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_part`
--
ALTER TABLE `tb_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_type`
--
ALTER TABLE `tb_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
