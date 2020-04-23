-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 Des 2019 pada 09.46
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinarmas4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `navigate_button`
--

CREATE TABLE `navigate_button` (
  `button_id` int(11) NOT NULL,
  `img_source` varchar(100) NOT NULL,
  `detil` varchar(500) NOT NULL,
  `room_id` int(11) NOT NULL,
  `update` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `navigate_button`
--

INSERT INTO `navigate_button` (`button_id`, `img_source`, `detil`, `room_id`, `update`, `status`, `created_at`, `modified_at`) VALUES
(4, 'instagram-png-instagram-png-logo-512.png', 'dsgsAdgsgsdsga', 4, 0, 0, '2019-11-18 08:44:16', '2019-12-02 06:58:15'),
(5, 'line-logo-messenger-png-4.png', 'szsdzgdhsfdadgs', 5, 1, 1, '2019-11-18 08:53:52', '2019-12-03 08:16:23'),
(6, 'Cek_Kuota_indosat.jpg', 'dsGFAASGDDAGS', 2, 1, 1, '2019-12-03 08:13:28', '2019-12-03 08:16:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `name_property` varchar(220) NOT NULL,
  `img_source` varchar(100) NOT NULL,
  `update` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `property`
--

INSERT INTO `property` (`property_id`, `name_property`, `img_source`, `update`, `status`, `created_at`, `modified_at`) VALUES
(1, 'rancamaya', 'Jurus-Sulap-Kamar-di-Rumah-Jadi-Kamar-Hotel.jpg', 0, 1, '2019-11-15 06:49:20', '2019-12-03 08:15:01'),
(2, 'bogor raya', 'Untitled-11.jpg', 0, 1, '2019-11-18 03:05:19', '2019-12-02 06:59:15'),
(3, 'sekolah bogor raya', '3_(199_x_253).jpg', 1, 0, '2019-11-18 07:55:24', '2019-12-02 06:59:05'),
(5, 'dsgdgsa', 'coffee-logos-77.png', 1, 0, '2019-11-18 09:30:02', '2019-12-02 06:59:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `name_room` varchar(220) NOT NULL,
  `img_source` varchar(100) NOT NULL,
  `property_id` int(11) NOT NULL,
  `update` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `room`
--

INSERT INTO `room` (`room_id`, `name_room`, `img_source`, `property_id`, `update`, `status`, `created_at`, `modified_at`) VALUES
(2, 'bath room', 'masjid.jpg', 1, 0, 1, '2019-11-18 07:41:28', '2019-12-02 06:56:21'),
(4, 'kitchen', 'Images-for-wallpapers1.jpg', 1, 0, 1, '2019-11-18 07:55:03', '2019-12-02 06:59:38'),
(5, 'office', '5022957-coffee-wallpaper1.jpg', 5, 0, 0, '2019-11-18 09:30:48', '2019-12-03 08:15:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'YWRtaW4='),
(3, 'rafi', 'rafi', 'cmFmaQ==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `navigate_button`
--
ALTER TABLE `navigate_button`
  ADD PRIMARY KEY (`button_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `navigate_button`
--
ALTER TABLE `navigate_button`
  MODIFY `button_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
