-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 04:10 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `fullname` text NOT NULL,
  `image` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `fullname`, `image`, `password`) VALUES
(1, 'gdamerda', 'I Gede Surya Amerta', '868703 (2).jpg', 'Boboiboy123'),
(2, 'arypradnya', 'Ary Pradnya Dewi', 'anime.jpg', '$2y$10$nbE0X76CWaDU5uu9QULRWuQ0GTYMDprKwlx56A9kGhCAYLG0W0F0.');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `username`, `fullname`, `email`, `image`, `password`) VALUES
(1, 'arypradnya', 'Ary Pradnya Dewi', 'arypradnya@gmail.com', 'Annotation 2020-09-23 201239.jpg', '$2y$10$4YEbUMuMbC2tkXpzisjrUeVgO7FZgAmsi5skjueKG7/QfJlsajVBy'),
(2, 'gdamerda', 'I Gede Surya Amerta', 'amerta213bali@yahoo.com', '868703 (2).jpg', '$2y$10$ONwTQRG/n7VJ4T3IeYlHculdgFstsF4GAPqmgcM9sUdYGALsfTddO');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `judul_buku` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `pdf` varchar(225) NOT NULL,
  `sipnosis` text NOT NULL,
  `fullname` text NOT NULL,
  `rating` float NOT NULL,
  `id_author` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `judul_buku`, `category`, `image`, `pdf`, `sipnosis`, `fullname`, `rating`, `id_author`, `id_user`, `status`, `tanggal`) VALUES
(54, '5cm', 'horror', '20181018_234601.png', '', 'tes', 'I Gede Surya Amerta', 0, 2, 0, 0, '2020-10-07 23:21:05'),
(55, 'MAtematika', 'horror', 'Annotation 2020-09-23 201239.jpg', 'I Gede Surya Amerta_10_XII RPL 1_ DATA BERKELOMPOK.pdf', 'tes', 'I Gede Surya Amerta', 0, 2, 0, 0, '2020-10-08 00:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_category` text NOT NULL,
  `slug` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name_category`, `slug`) VALUES
(1, 'Horror', 'horror'),
(2, 'Comedy', 'comedy'),
(3, 'Anak Anak', 'anak-anak');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `jenis_notif` varchar(225) NOT NULL,
  `tujuan` varchar(225) NOT NULL,
  `id_book` int(11) DEFAULT NULL,
  `id_author` int(11) DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `dibaca` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `deskripsi`, `jenis_notif`, `tujuan`, `id_book`, `id_author`, `tanggal`, `dibaca`) VALUES
(25, 'Author I Gede Surya Amerta has been uploaded book 5cm', 'Buku.Approve', 'Admin', 54, 2, '2020-10-07 23:21:05', '0'),
(26, 'Author I Gede Surya Amerta has been uploaded book MAtematika', 'Buku.Approve', 'Admin', 55, 2, '2020-10-08 00:12:52', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `email`, `password`) VALUES
(1, 'gdamerta', 'amerta213bali@yahoo.com', '$2y$10$v5rqeFnECDoGi6cz.Cm/c.A6sozMfNm/GtZjfck7Sh1kd57ZZUPx2');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `id_book` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
