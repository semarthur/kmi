-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Okt 2019 pada 17.14
-- Versi server: 10.3.15-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newkmi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `id_account` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `password` varchar(16) NOT NULL,
  `Jabatan` enum('Staff','Assistant Manager','Dept Head','') NOT NULL,
  `id_jabatan` int(1) NOT NULL,
  `Departemen` enum('Financial & Accounting','HRD','PR','Information System','Production') NOT NULL,
  `telepon` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id_account`, `email`, `nama`, `password`, `Jabatan`, `id_jabatan`, `Departemen`, `telepon`) VALUES
(1, 'anggitcr20@gmail.com', 'Anggit Chalilur Rahman', 'qwepoi', 'Staff', 1, 'HRD', 0),
(2, 'viceheadexternal@gmail.com', 'Vice Head', 'qwepoi', 'Assistant Manager', 2, 'HRD', 0),
(3, 'fahrezi182@gmail.com', 'Elkaf Fahrezi', 'qwepoi', 'Dept Head', 3, 'HRD', 0),
(4, 'sem.hutabarat@gmail.com', 'Samuel Arthur', 'qwepoi', 'Staff', 1, 'Information System', 0),
(5, 'requester5@gmail.com', '', 'qwepoi', 'Assistant Manager', 2, 'Information System', 0),
(6, 'requester6@gmail.com', '', 'qwepoi', 'Dept Head', 3, 'Information System', 0),
(8, 'indoprydee@gmail.com', 'INDO PRIDE', 'qwepoi', 'Staff', 1, 'Financial & Accounting', 0),
(9, 'khairulrizal39@gmail.com', 'Khairul Rizal', 'qwepoi', 'Assistant Manager', 2, 'Financial & Accounting', 0),
(10, 'ilhameve16@gmail.com', 'Ilham Nurmansyah', 'qwepoi', 'Dept Head', 3, 'Financial & Accounting', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `noticket` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `untuk` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `kasus` varchar(50) NOT NULL,
  `duty` varchar(50) NOT NULL,
  `dateoec` date NOT NULL,
  `systemint` varchar(300) NOT NULL,
  `urgency` varchar(10) NOT NULL,
  `description` varchar(300) NOT NULL,
  `approvalstatus` enum('Pending','Not Approved','Approved by A. Manager','Approved by Dept. Head') NOT NULL,
  `process` enum('Not Processed','On Process','Done','') NOT NULL,
  `startdate` date NOT NULL,
  `starttime` time NOT NULL,
  `finisheddate` date NOT NULL,
  `reason` varchar(200) NOT NULL DEFAULT 'Not Determined'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `form`
--

INSERT INTO `form` (`id`, `noticket`, `nama`, `dari`, `e_mail`, `untuk`, `date`, `kasus`, `duty`, `dateoec`, `systemint`, `urgency`, `description`, `approvalstatus`, `process`, `startdate`, `starttime`, `finisheddate`, `reason`) VALUES
(1, 'KRF000000', 'Anggit Chalilur Rahman', 'HRD', 'anggitcr20@gmail.com', 'ICT', '2019-07-22', 'Order Catridge / Toner', 'Additional / Change / Delete', '2019-07-24', 'no', 'normal', 'minta tinta untuk printer epson', 'Approved by Dept. Head', 'On Process', '2019-07-31', '00:00:00', '0000-00-00', ''),
(3, 'KRF000002', 'elkaf fahrezi', 'HRD', 'fahrezi182@gmail.com', 'SWD', '2019-07-23', 'Software Package', 'Problem Solving', '2019-08-06', 'yes', 'immedietly', 'butuh software tambahan untuk bisa ambil data keuangan dari app utama kawasaki', 'Pending', 'On Process', '0000-00-00', '00:00:00', '0000-00-00', 'Not Determined'),
(4, 'KRF000003', 'indoprydee', 'Financial & Accounting', 'indoprydee@gmail.com', 'ICT', '2019-07-25', 'Hardware', 'Service / Repair', '2019-08-01', 'no', 'normal', 'Monitor rusak', 'Pending', 'Not Processed', '0000-00-00', '00:00:00', '0000-00-00', 'Not Determined'),
(5, 'KRF000004', 'Khairul Rizal', 'Financial & Accounting', 'khairulrizal39@gmail.com', 'SWD', '2019-07-24', 'Data Communication / Internet', 'Problem Solving', '2019-07-30', 'no', 'immedietly', 'kabel LAN mati pada satu barisan komputer di bagian F&A', 'Pending', 'Not Processed', '0000-00-00', '00:00:00', '0000-00-00', 'Not Determined'),
(6, 'KRF000005', 'Ilham Eve', 'Financial & Accounting', 'ilhameve16@gmail.com', 'SWD', '2019-07-26', 'System Application', 'Problem Solving', '2019-08-09', 'yes', 'normal', 'butuh app untuk bisa print data keuangan dalam format yang rapih dan pdf', 'Pending', 'Not Processed', '0000-00-00', '00:00:00', '0000-00-00', 'Not Determined'),
(9, 'KRF000006', 'Anggit Chalilur Rahman', 'HRD', 'anggitcr20@gmail.com', 'ICT', '2019-07-31', 'Hardware', 'Service / Repair', '2019-08-06', 'no', 'normal', 'Printer rusak', 'Approved by Dept. Head', 'On Process', '2019-07-31', '00:00:00', '0000-00-00', ''),
(10, 'KRF000009', 'Samuel Arthur', 'Information System', 'sem.hutabarat@gmail.com', 'ICT', '2019-09-24', 'Hardware', 'Service / Repair', '2019-09-25', 'no', 'normal', 'monitor rusak', 'Pending', 'Not Processed', '0000-00-00', '00:00:00', '0000-00-00', 'Not Determined'),
(11, 'KRF000010', 'Samuel Arthur', 'Information System', 'sem.hutabarat@gmail.com', 'ICT', '2019-10-09', 'Hardware', 'Service / Repair', '2019-10-11', 'no', 'normal', 'monitor rusak', 'Pending', 'Not Processed', '0000-00-00', '00:00:00', '0000-00-00', 'Not Determined'),
(12, 'KRF000011', 'Anggit Chalilur Rahman', 'HRD', 'anggitcr20@gmail.com', 'ICT', '2019-10-11', 'Order Catridge / Toner', 'Additional / Change / Delete', '2019-10-14', 'no', 'normal', 'tinta habis', 'Pending', 'Not Processed', '0000-00-00', '00:00:00', '0000-00-00', 'Not Determined');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_done`
--

CREATE TABLE `form_done` (
  `id` int(11) NOT NULL,
  `noticket` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `untuk` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `kasus` varchar(50) NOT NULL,
  `duty` varchar(50) NOT NULL,
  `dateoec` date NOT NULL,
  `systemint` varchar(300) NOT NULL,
  `urgency` varchar(10) NOT NULL,
  `description` varchar(300) NOT NULL,
  `approvalstatus` varchar(50) NOT NULL,
  `process` varchar(50) NOT NULL,
  `startdate` date NOT NULL,
  `starttime` time NOT NULL,
  `finisheddate` date NOT NULL,
  `reason` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `form_done`
--

INSERT INTO `form_done` (`id`, `noticket`, `nama`, `dari`, `e_mail`, `untuk`, `date`, `kasus`, `duty`, `dateoec`, `systemint`, `urgency`, `description`, `approvalstatus`, `process`, `startdate`, `starttime`, `finisheddate`, `reason`) VALUES
(2, 'KRF000001', 'vice head', 'HRD', 'viceheadexternal@gmail.com', 'ICT', '2019-07-25', 'Hardware', 'Service / Repair', '2019-07-30', 'no', 'normal', 'Laptop kantor rusak butuh diservice', 'Approved by Dept. Head', 'Done', '2019-07-31', '00:00:00', '2019-07-31', ''),
(8, 'KRF000006', 'Anggit Chalilur Rahman', 'HRD', 'anggitcr20@gmail.com', 'ICT', '2019-07-25', 'Hardware', 'Service / Repair', '2019-07-30', 'no', 'normal', 'printer rusak', 'Approved by Dept. Head', 'Done', '2019-07-26', '10:00:00', '2019-07-30', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_na`
--

CREATE TABLE `form_na` (
  `id` int(11) NOT NULL,
  `noticket` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `untuk` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `kasus` varchar(50) NOT NULL,
  `duty` varchar(50) NOT NULL,
  `dateoec` date NOT NULL,
  `systemint` varchar(300) NOT NULL,
  `urgency` varchar(10) NOT NULL,
  `description` varchar(300) NOT NULL,
  `approvalstatus` varchar(50) NOT NULL,
  `process` varchar(50) NOT NULL,
  `startdate` date NOT NULL,
  `starttime` time NOT NULL,
  `finisheddate` date NOT NULL,
  `reason` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id_barang` int(11) NOT NULL,
  `noinventaris` varchar(50) NOT NULL,
  `noseribarang` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `tgl_beli` date NOT NULL,
  `kond_beli` varchar(50) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `tmpt_pasang` varchar(50) NOT NULL DEFAULT 'Not Determined',
  `tgl_rusak` date NOT NULL,
  `kond_barang` varchar(50) NOT NULL DEFAULT 'Not Determined',
  `foto` varchar(50) NOT NULL,
  `pathfoto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id_barang`, `noinventaris`, `noseribarang`, `nama`, `merk`, `tgl_beli`, `kond_beli`, `tgl_keluar`, `tmpt_pasang`, `tgl_rusak`, `kond_barang`, `foto`, `pathfoto`) VALUES
(1, 'KIS000000', '88099080989080', 'Monitor 17\" SDG1087', 'LG', '2019-07-24', 'Baru', '2019-07-26', 'HRD', '2019-08-23', 'Baik', 'IP000000.jpg', 'C:\\xampp\\htdocs\\belajar\\uploads'),
(2, 'KIS000001', '89097098900', 'Monitor 17 inci', 'Acer', '2019-07-24', 'Baru', '0000-00-00', 'Not Determined', '0000-00-00', 'Baik', 'IP000001.jpg', 'C:\\xampp\\htdocs\\belajar\\uploads'),
(3, 'KIS000002', '2345678', 'prointer', 'epson', '2019-07-31', 'Baru', '2019-07-31', 'HRD', '0000-00-00', 'Baik', 'IP000002.jpg', 'C:\\xampp\\htdocs\\belajar\\uploads'),
(4, 'KIS000003', 'aoir1236789', 'Monitor 17 inci', 'Acer', '2019-10-03', 'Baru', '0000-00-00', 'Not Determined', '0000-00-00', 'Baik', 'IP000003.', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(5, 'KIS000004', 'aoir1236789', 'Monitor 17 inci', 'Acer', '2019-10-03', 'Baru', '0000-00-00', 'Not Determined', '0000-00-00', 'Baik', 'IP000004.', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(6, 'KIS000005', 'aoir1236789', 'Monitor 17 inci', 'Acer', '2019-10-03', 'Baru', '0000-00-00', 'Not Determined', '0000-00-00', 'Baik', 'IP000005.', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(7, 'KIS000006', '123f', 'asd', 'qef', '1212-12-13', 'Baru', '0000-00-00', 'Not Determined', '0000-00-00', 'Baik', 'IP000006.', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(8, 'KIS000007', 'ae124f', 'Monitor 17 inci', 'Acer', '2019-10-03', 'Baru', '0000-00-00', 'Not Determined', '0000-00-00', 'Baik', 'IP000007.', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(9, 'KIS000008', 'qeioi12', 'Monitor 17 inci', 'Acer', '2019-10-03', 'Baru', '0000-00-00', 'Not Determined', '0000-00-00', 'Baik', 'IP000008.', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(10, 'KIS000009', 'qeioi12', 'Monitor 17 inci', 'Acer', '2019-10-03', 'Baru', '0000-00-00', 'Not Determined', '0000-00-00', 'Baik', 'IP000009.', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(11, 'KIS000010', 'qeioi12', 'Monitor 17 inci', 'Acer', '2019-10-03', 'Baru', '0000-00-00', 'Not Determined', '0000-00-00', 'Baik', 'IP000010.', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(12, 'KIS000011', 'qeioi12', 'Monitor 17 inci', 'Acer', '2019-10-03', 'Baru', '0000-00-00', 'Not Determined', '0000-00-00', 'Baik', 'IP000011.', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(13, 'KIS000012', 'qeioi12', 'Monitor 17 inci', 'Acer', '2019-10-03', 'Baru', '0000-00-00', 'Not Determined', '0000-00-00', 'Baik', 'IP000012.', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(14, 'KIS000013', 'qeioi12', 'Monitor 17 inci', 'Acer', '2019-10-03', 'Baru', '2019-10-07', 'Information System', '0000-00-00', 'Baik', 'IP000013.jpg', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(15, 'KIS000014', 'qw3kpweif2', 'Monitor 17 inci', 'Acer', '2019-10-03', 'Baru', '0000-00-00', 'Not Determined', '0000-00-00', 'Baik', 'IP000014.jpg', 'C:\\xampp\\htdocs\\kmi\\uploads');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `isi_notif` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- Indeks untuk tabel `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_done`
--
ALTER TABLE `form_done`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_na`
--
ALTER TABLE `form_na`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
