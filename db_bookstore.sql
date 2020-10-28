-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2020 at 06:14 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

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
  `password` varchar(255) NOT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `username`, `fullname`, `email`, `image`, `password`, `tanggal`) VALUES
(1, 'arypradnya', 'Ary Pradnya Dewi', 'arypradnya@gmail.com', 'Annotation 2020-09-23 201239.jpg', '$2y$10$4YEbUMuMbC2tkXpzisjrUeVgO7FZgAmsi5skjueKG7/QfJlsajVBy', NULL),
(2, 'gdamerda', 'I Gede Surya Amerta', 'amerta213bali@yahoo.com', '868703 (2).jpg', '$2y$10$ONwTQRG/n7VJ4T3IeYlHculdgFstsF4GAPqmgcM9sUdYGALsfTddO', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `judul_buku` varchar(225) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `pdf` varchar(225) NOT NULL,
  `sipnosis` text NOT NULL,
  `fullname` text NOT NULL,
  `id_author` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `premium` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `judul_buku`, `slug`, `category`, `image`, `pdf`, `sipnosis`, `fullname`, `id_author`, `status`, `premium`, `tanggal`) VALUES
(57, 'Amerta Ganteng', 'amerta-ganteng', 'anak-anak', '868703 (2).jpg', '10_I Gede Surya Amerta_OFFERING HELP.pdf', 'Tesss', 'I Gede Surya Amerta', 2, 1, 1, '2020-10-11 00:24:29'),
(58, 'Melancaran', 'melancaran', 'anak-anak', 'qoryGore Ngelak.jpg', '02 Dasar-dasar Thread.pdf', 'esss', 'I Gede Surya Amerta', 2, 1, 2, '2020-10-22 13:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_category` text NOT NULL,
  `slug_category` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name_category`, `slug_category`) VALUES
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
(25, 'Admin I Gede Surya Amerta has been publish book ', 'Buku.Approve', 'Author', 54, 2, '2020-10-07 23:21:05', '1'),
(26, 'Admin I Gede Surya Amerta has been publish book ', 'Buku.Approve', 'Author', 55, 2, '2020-10-08 00:12:52', '1'),
(27, 'Author I Gede Surya Amerta has been uploaded book Amerta Ganteng', 'Buku.Approve', 'Admin', 56, 2, '2020-10-11 00:22:29', '0'),
(28, 'Admin I Gede Surya Amerta has been publish book ', 'Buku.Approve', 'Author', 57, 2, '2020-10-11 00:24:29', '1'),
(29, 'Admin I Gede Surya Amerta has been publish book ', 'Buku.Approve', 'Author', 58, 2, '2020-10-22 13:27:46', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `email`, `password`, `package_id`, `tanggal`) VALUES
(1, 'gdamerta', 'amerta213bali@yahoo.com', '$2y$10$v5rqeFnECDoGi6cz.Cm/c.A6sozMfNm/GtZjfck7Sh1kd57ZZUPx2', 0, NULL),
(2, 'arypradnya', 'arypradnya@gmail.com', '$2y$10$IRNiuk.HsM7NZuZdni39IOngvR5iAAVKPNqRFeEfDEtJW13Oi5OtO', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `premium_package`
--

CREATE TABLE `premium_package` (
  `id` int(11) NOT NULL,
  `type_package` text NOT NULL,
  `price` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `premium_package`
--

INSERT INTO `premium_package` (`id`, `type_package`, `price`, `tanggal`, `waktu`) VALUES
(1, 'Standard Package', 40000, NULL, NULL),
(2, 'Premium Package', 115000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `id_book`, `id_user`, `rating`) VALUES
(15, 57, 1, 4),
(16, 57, 2, 5);

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

-- --------------------------------------------------------

--
-- Table structure for table `users_bill`
--

CREATE TABLE `users_bill` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_books`
--

CREATE TABLE `users_books` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_books`
--

INSERT INTO `users_books` (`id`, `id_user`, `id_book`, `tanggal`) VALUES
(1, 1, 57, '2020-10-12 09:48:52'),
(2, 2, 57, '2020-10-18 01:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `users_premium`
--

CREATE TABLE `users_premium` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `struk` varchar(255) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `after_pay_user` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_premium`
--

INSERT INTO `users_premium` (`id`, `username`, `email`, `no_telp`, `struk`, `package_id`, `after_pay_user`, `tanggal`, `id_user`, `status`) VALUES
(1, 'arypradnya', 'arypradnya@gmail.com', '081-338-103-073', 'struk.jpg', 2, 85000, '2020-10-22 13:07:01', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `watcher`
--

CREATE TABLE `watcher` (
  `id` int(11) NOT NULL,
  `ipusers` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watcher`
--

INSERT INTO `watcher` (`id`, `ipusers`, `id_user`, `id_book`, `tanggal`, `waktu`) VALUES
(10, '127.0.0.1', 1, 57, '2020-10-19', '23:06:38'),
(11, '127.0.0.1', 2, 57, '2020-10-19', '23:07:10'),
(12, '127.0.0.1', 1, 57, '2020-10-20', '07:29:14'),
(13, '127.0.0.1', 2, 57, '2020-10-22', '12:06:32');

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
-- Indexes for table `premium_package`
--
ALTER TABLE `premium_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating` (`rating`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_bill`
--
ALTER TABLE `users_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_books`
--
ALTER TABLE `users_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_premium`
--
ALTER TABLE `users_premium`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `watcher`
--
ALTER TABLE `watcher`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `premium_package`
--
ALTER TABLE `premium_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_bill`
--
ALTER TABLE `users_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_books`
--
ALTER TABLE `users_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_premium`
--
ALTER TABLE `users_premium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `watcher`
--
ALTER TABLE `watcher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
