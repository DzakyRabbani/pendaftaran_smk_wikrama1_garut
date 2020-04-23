-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2020 pada 22.34
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formulir_pendaftaran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `navigate_button`
--

CREATE TABLE `navigate_button` (
  `button_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `keterangan` int(11) NOT NULL,
  `detail` date NOT NULL,
  `data_bimbingan` int(11) NOT NULL,
  `nama` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pekerjaan` text NOT NULL,
  `pendidikan_terakhir` text NOT NULL,
  `agama_` int(11) NOT NULL,
  `no_hp` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `navigate_button`
--

INSERT INTO `navigate_button` (`button_id`, `room_id`, `keterangan`, `detail`, `data_bimbingan`, `nama`, `tempat_lahir`, `tanggal_lahir`, `pekerjaan`, `pendidikan_terakhir`, `agama_`, `no_hp`) VALUES
(1, 1, 1, '2020-04-24', 1, 'Maryadi', 'Bogor', '1974-01-03', 'BUMN', 'STM', 1, 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `nama_lengkap` varchar(220) NOT NULL,
  `nama_panggilan` varchar(220) NOT NULL,
  `img_source` varchar(100) NOT NULL,
  `jk` int(11) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `agama` int(11) NOT NULL,
  `cita_cita` varchar(100) NOT NULL,
  `hoby` varchar(100) NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `jumlah_bersaudara` int(11) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `golongan_darah` text NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `property`
--

INSERT INTO `property` (`property_id`, `nama_lengkap`, `nama_panggilan`, `img_source`, `jk`, `ttl`, `agama`, `cita_cita`, `hoby`, `anak_ke`, `jumlah_bersaudara`, `berat_badan`, `tinggi_badan`, `golongan_darah`, `modified_at`) VALUES
(1, 'Dzaky Rabbani', 'Bang Jack', 'IMG_20200109_223432_0571.jpg', 1, 'Cianjur,04 Agustus 2003', 1, 'Programmer', 'Ngoding', 1, 3, 49, 169, 'A', '2020-04-23 20:06:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `alamat_rumah` varchar(100) NOT NULL,
  `kelurahan` varchar(200) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kota_kabupaten` varchar(200) NOT NULL,
  `propinsi` varchar(100) NOT NULL,
  `kode_pos` varchar(15) NOT NULL,
  `no_telepon_rumah` int(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tinggal_dengan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `room`
--

INSERT INTO `room` (`room_id`, `property_id`, `alamat_rumah`, `kelurahan`, `kecamatan`, `kota_kabupaten`, `propinsi`, `kode_pos`, `no_telepon_rumah`, `email`, `tinggal_dengan`) VALUES
(1, 1, 'Perumahan Darmaga Pratama blok P7 no.03 Rt04/06', 'Cibadak', 'Ciampea', 'Kab. Bogor', 'Jawa Barat', '16620', 2147483647, 'drabbani28@gmail.com', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`, `hak_akses`) VALUES
(1, 'Admin Pendaftaran Peserta Didik Baru', 'adminpendaftaran', 'YWRtaW5wZW5kYWZ0YXJhbg==', 'Admin'),
(3, 'Peserta Didik Baru', 'smkwikrama', 'cnBsd2FqaWJuZ3VsaWs=', 'Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `version`
--

CREATE TABLE `version` (
  `version_id` int(11) NOT NULL,
  `mata_pelajaran` text NOT NULL,
  `tingkat_kelas` varchar(100) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `nilai` int(100) NOT NULL,
  `prestasi` varchar(100) NOT NULL,
  `informasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `version`
--

INSERT INTO `version` (`version_id`, `mata_pelajaran`, `tingkat_kelas`, `semester`, `nilai`, `prestasi`, `informasi`) VALUES
(1, 'PAI', '9', '1', 85, 'Paskibra', 1),
(2, 'Bahasa Indonesia', '9', '1', 90, 'Paskibra', 1),
(3, 'Bahasa Inggris', '9', '1', 89, 'Paskibra', 1),
(4, 'Matematika', '9', '1', 80, 'Paskibra', 1),
(5, 'IPA', '9', '0', 90, 'Futsal', 0),
(6, 'IPS', '9', '0', 90, 'Futsal', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `navigate_button`
--
ALTER TABLE `navigate_button`
  ADD PRIMARY KEY (`button_id`);

--
-- Indeks untuk tabel `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- Indeks untuk tabel `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`version_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `navigate_button`
--
ALTER TABLE `navigate_button`
  MODIFY `button_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `version`
--
ALTER TABLE `version`
  MODIFY `version_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
