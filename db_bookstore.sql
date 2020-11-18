-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2020 at 11:34 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.12

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
(2, 'arypradnya', 'Ary Pradnya Dewi', 'anime.jpg', '$2y$10$nbE0X76CWaDU5uu9QULRWuQ0GTYMDprKwlx56A9kGhCAYLG0W0F0.'),
(3, 'admin', 'Putu Admin', 'Annotation 2020-08-25 084827.jpg', '$2y$10$PYPx93wFWvZ2h6Sdl8MWVukWOpkgYUNn5nncQl4D7QMo35.F.6FAy');

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
(2, 'gdamerda', 'I Gede Surya Amerta', 'amerta213bali@yahoo.com', '868703 (2).jpg', '$2y$10$ONwTQRG/n7VJ4T3IeYlHculdgFstsF4GAPqmgcM9sUdYGALsfTddO', NULL),
(3, 'admin', 'Putu Admin', 'admin@gmail.com', 'Annotation 2020-08-25 084827.jpg', '$2y$10$6PbXqJeqyfX1bLnQYhiqBe1.KhBImcboh2Ic/WTuXAiSi8ZUfpPAO', NULL);

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
(1, 'Melancaran', 'melancaran', 'comedy', 'lurder 86.jpg', 'I Gede Surya Amerta_10_XII RPL 1_ Atur Piuning.pdf', 'trerasdas', 'I Gede Surya Amerta', 2, 2, 1, '2020-11-06 20:22:28'),
(2, 'Melancaran Jani', 'melancaran-jani', 'anak-anak', 'lurder 86.jpg', 'I Gede Surya Amerta_10_XII RPL 1_ Atur Piuning.pdf', 'staer', 'I Gede Surya Amerta', 2, 2, 2, '2020-11-06 20:22:47'),
(3, 'Melancaran', 'melancaran', 'horror', 'lurder 86.jpg', 'I Gede Surya Amerta_10_XII RPL 1_ Atur Piuning.pdf', 'tessrer', 'I Gede Surya Amerta', 2, 1, 1, '2020-11-06 22:45:08'),
(4, 'Test Buku', 'test-buku', 'horror', 'lurder 86.jpg', 'I Gede Surya Amerta_10_XII RPL 1_ Atur Piuning.pdf', 'aeaewrasd', 'I Gede Surya Amerta', 2, 1, 1, '2020-11-06 22:45:35'),
(5, 'asdasd', 'asdasd', 'comedy', 'lurder 86.jpg', 'I Gede Surya Amerta_10_XII RPL 1_ Atur Piuning.pdf', 'qwe', 'I Gede Surya Amerta', 2, 2, 1, '2020-11-13 11:54:21'),
(6, 'apa aja deh', 'apa-aja-deh', 'anak-anak', 'lurder 86.jpg', 'I Gede Surya Amerta_10_XII RPL 1_ Atur Piuning.pdf', 'asdasdasd', 'I Gede Surya Amerta', 2, 2, 1, '2020-11-13 11:56:39'),
(7, 'Amerta Ganteng', 'amerta-ganteng', 'anak-anak', 'lurder 86.jpg', 'I Gede Surya Amerta_10_XII RPL 1_ Atur Piuning.pdf', 'asdqwq', 'I Gede Surya Amerta', 2, 2, 2, '2020-11-13 12:02:12'),
(8, 'Amerta jelek', 'amerta-jelek', 'horror', 'lurder 86.jpg', 'I Gede Surya Amerta_10_XII RPL 1_ Atur Piuning.pdf', 'asd212', 'I Gede Surya Amerta', 2, 1, 1, '2020-11-13 12:04:48');

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
(1, 'Admin I Gede Surya Amerta has been publish book ', 'Buku.Approve', 'Author', 1, 2, '2020-11-06 20:22:28', '1'),
(2, 'Admin I Gede Surya Amerta has been publish book ', 'Buku.Approve', 'Author', 2, 2, '2020-11-06 20:22:47', '1'),
(3, 'Admin I Gede Surya Amerta has been publish book ', 'Buku.Approve', 'Author', 3, 2, '2020-11-06 22:45:08', '1'),
(4, 'Admin I Gede Surya Amerta has been publish book ', 'Buku.Approve', 'Author', 4, 2, '2020-11-06 22:45:35', '1'),
(5, 'Admin I Gede Surya Amerta has been publish book ', 'Buku.Approve', 'Author', 5, 2, '2020-11-13 11:54:21', '1'),
(6, 'Admin I Gede Surya Amerta has been publish book ', 'Buku.Approve', 'Author', 6, 2, '2020-11-13 11:56:39', '1'),
(7, 'Admin I Gede Surya Amerta has been publish book ', 'Buku.Approve', 'Author', 7, 2, '2020-11-13 12:02:12', '1'),
(8, 'Admin I Gede Surya Amerta has been publish book Amerta jelek', 'Buku.Approve', 'Author', 8, 2, '2020-11-13 12:04:48', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(225) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `struk` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `status_package` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `premium_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `email`, `no_telp`, `struk`, `password`, `package_id`, `status_package`, `tanggal`, `premium_date`) VALUES
(1, 'gdamerta', 'amerta213bali@yahoo.com', '', 'struk.jpg', '$2y$10$v5rqeFnECDoGi6cz.Cm/c.A6sozMfNm/GtZjfck7Sh1kd57ZZUPx2', 1, 1, NULL, NULL),
(2, 'arypradnya', 'arypradnya@gmail.com', '', 'struk.jpg', '$2y$10$IRNiuk.HsM7NZuZdni39IOngvR5iAAVKPNqRFeEfDEtJW13Oi5OtO', 2, 2, NULL, NULL),
(3, 'admin', 'admin@gmail.com', '081-150-202-203', 'struk.jpg', '$2y$10$LijISKpnecga9dSgK2HkOe9Y8FLfwIjKT2WvxoN7Rpn0W6ZhS7M.q', 2, 2, '2020-10-28 21:46:55', '2020-11-13 22:09:40');

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
(1, 2, 1, 2),
(2, 1, 2, 3),
(3, 4, 2, 3);

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
-- Table structure for table `users_books`
--

CREATE TABLE `users_books` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_books`
--

INSERT INTO `users_books` (`id`, `id_user`, `id_book`, `status`, `tanggal`) VALUES
(1, 2, 4, NULL, '2020-11-13 08:21:12');

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
(13, '127.0.0.1', 2, 57, '2020-10-22', '12:06:32'),
(14, '127.0.0.1', 1, 58, '2020-10-27', '19:29:18'),
(15, '127.0.0.1', 1, 57, '2020-10-28', '20:47:46'),
(16, '127.0.0.1', 1, 60, '2020-11-04', '00:11:09'),
(17, '127.0.0.1', 1, 58, '2020-11-05', '14:15:16'),
(18, '127.0.0.1', 3, 60, '2020-11-05', '21:31:55'),
(19, '127.0.0.1', 1, 2, '2020-11-06', '20:23:30'),
(20, '127.0.0.1', 2, 3, '2020-11-07', '00:03:38'),
(21, '127.0.0.1', 2, 3, '2020-11-13', '00:35:50');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_author` (`id_author`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_book` (`id_book`),
  ADD KEY `id_author` (`id_author`);

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
  ADD KEY `rating` (`rating`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_book` (`id_book`),
  ADD KEY `id_author` (`id_author`);

--
-- Indexes for table `users_books`
--
ALTER TABLE `users_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_book` (`id_book`);

--
-- Indexes for table `watcher`
--
ALTER TABLE `watcher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_book` (`id_book`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `premium_package`
--
ALTER TABLE `premium_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_books`
--
ALTER TABLE `users_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `watcher`
--
ALTER TABLE `watcher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `authors` (`id`);

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_2` FOREIGN KEY (`id_author`) REFERENCES `authors` (`id`);

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pengguna` (`id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`id_author`) REFERENCES `authors` (`id`);

--
-- Constraints for table `users_books`
--
ALTER TABLE `users_books`
  ADD CONSTRAINT `users_books_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pengguna` (`id`);

--
-- Constraints for table `watcher`
--
ALTER TABLE `watcher`
  ADD CONSTRAINT `watcher_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pengguna` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
