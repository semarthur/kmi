-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jan 2020 pada 06.39
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
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id_account`, `email`, `nama`, `password`, `Jabatan`, `id_jabatan`, `Departemen`, `telepon`) VALUES
(1, 'anggitcr20@gmail.com', 'Anggit Chalilur Rahman', 'qwepoi', 'Staff', 1, 'HRD', '081212227529'),
(2, 'viceheadexternal@gmail.com', 'Vice Head', 'qwepoi', 'Assistant Manager', 2, 'HRD', '081212227529'),
(3, 'fahrezi182@gmail.com', 'Elkaf Fahrezi', 'qwepoi', 'Dept Head', 3, 'HRD', '081212227529'),
(4, 'sem.hutabarat@gmail.com', 'Samuel Arthur', 'qwepoi', 'Staff', 1, 'Information System', '081212227529'),
(5, 'requester5@gmail.com', '', 'test', 'Assistant Manager', 2, 'Information System', '081212227529'),
(6, 'requester6@gmail.com', '', 'qwepoi', 'Dept Head', 3, 'Information System', '0'),
(8, 'indoprydee@gmail.com', 'INDO PRIDE', 'qwepoi', 'Staff', 1, 'Financial & Accounting', '081212227529'),
(9, 'khairulrizal39@gmail.com', 'Khairul Rizal', 'qwepoi', 'Assistant Manager', 2, 'Financial & Accounting', '081212227529'),
(10, 'ilhameve16@gmail.com', 'Ilham Nurmansyah', 'qwepoi', 'Dept Head', 3, 'Financial & Accounting', '081212227529'),
(17, 'aji@gmail.com', 'aji', 'qwepoi', 'Staff', 1, 'HRD', '081212227529');

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
  `systemint` varchar(30) NOT NULL,
  `urgency` varchar(10) NOT NULL,
  `description` varchar(300) NOT NULL,
  `approvalstatus` enum('Pending','Approved by A. Manager','Approved by Dept. Head') NOT NULL,
  `process` enum('Not Processed','On Process','Done','') NOT NULL,
  `startdate` date NOT NULL,
  `starttime` time NOT NULL,
  `finisheddate` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `form`
--

INSERT INTO `form` (`id`, `noticket`, `nama`, `dari`, `e_mail`, `untuk`, `date`, `kasus`, `duty`, `dateoec`, `systemint`, `urgency`, `description`, `approvalstatus`, `process`, `startdate`, `starttime`, `finisheddate`, `created_at`, `update_at`) VALUES
(1, 'KRF000000', 'Anggit Chalilur Rahman', 'HRD', 'anggitcr20@gmail.com', 'ICT', '2020-01-06', 'Order Catridge / Toner', 'Additional / Change / Delete', '2020-01-06', 'no', 'normal', 'tinta habis', 'Approved by Dept. Head', 'Not Processed', '0000-00-00', '00:00:00', '0000-00-00', '2020-01-06 11:14:20', '2020-01-06 11:21:55'),
(2, 'KRF000001', 'Anggit Chalilur Rahman', 'HRD', 'anggitcr20@gmail.com', 'ICT', '2020-01-06', 'Order Catridge / Toner', 'Additional / Change / Delete', '2020-01-06', 'no', 'normal', 'tinta habis', 'Pending', 'Not Processed', '0000-00-00', '00:00:00', '0000-00-00', '2020-01-06 11:14:31', '0000-00-00 00:00:00'),
(3, 'KRF000002', 'Anggit Chalilur Rahman', 'HRD', 'anggitcr20@gmail.com', 'ICT', '2020-01-06', 'Order Catridge / Toner', 'Additional / Change / Delete', '2020-01-06', 'no', 'normal', 'tinta habis', 'Pending', 'Not Processed', '0000-00-00', '00:00:00', '0000-00-00', '2020-01-06 11:14:50', '0000-00-00 00:00:00'),
(4, 'KRF000003', 'Anggit Chalilur Rahman', 'Information System', 'anggitcr20@gmail.com', 'ICT', '2020-01-06', 'Data Communication / Internet', 'Problem Solving', '2020-01-07', 'no', 'immedietly', 'Internet tidak tersambung', 'Pending', 'Not Processed', '0000-00-00', '00:00:00', '0000-00-00', '2020-01-06 11:18:50', '0000-00-00 00:00:00'),
(5, 'KRF000004', 'Anggit Chalilur Rahman', 'Information System', 'anggitcr20@gmail.com', 'ICT', '2020-01-06', 'Data Communication / Internet', 'Problem Solving', '2020-01-07', 'no', 'immedietly', 'Internet tidak tersambung', 'Pending', 'Not Processed', '0000-00-00', '00:00:00', '0000-00-00', '2020-01-06 11:19:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_done`
--

CREATE TABLE `form_done` (
  `id` int(11) NOT NULL,
  `noticket` varchar(20) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `process` varchar(50) NOT NULL,
  `startdate` date NOT NULL,
  `starttime` time NOT NULL,
  `finisheddate` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `form_done`
--

INSERT INTO `form_done` (`id`, `noticket`, `dari`, `e_mail`, `process`, `startdate`, `starttime`, `finisheddate`, `created_at`) VALUES
(1, 'KRF000003', 'HRD', 'anggitcr20@gmail.com', 'Done', '2020-01-06', '08:00:00', '2020-01-06', '2020-01-06 07:23:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gammu`
--

CREATE TABLE `gammu` (
  `Version` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gammu`
--

INSERT INTO `gammu` (`Version`) VALUES
(17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ReceivingDateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT -1,
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false',
  `Status` int(11) NOT NULL DEFAULT -1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inbox`
--

INSERT INTO `inbox` (`UpdatedInDB`, `ReceivingDateTime`, `Text`, `SenderNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `RecipientID`, `Processed`, `Status`) VALUES
('2019-11-15 07:52:33', '0000-00-00 00:00:00', '004400690073006B006F006E0020003400350025002E0020004100790061006D002B0043006800690063006B0065006E0020005300740072006900700073002B00320020004E006100730069002000680061006E00790061002000320038007200620020006E006500740074002E00200054006B007200200053004D005300200069006E006900200064006900200043004600430020004D0041004C0041004E004700200054004F0057004E0020005300510055004100520045002000680069006E006700670061002000370020004400650073002E002000530074006F006B002000740065007200620061007400610073002E0053004B0042002E002000500072006F006D006F0020002A0036003000360023', 'CFC', 'Default_No_Compression', '', '+62811078801', 1, 'Diskon 45%. Ayam+Chicken Strips+2 Nasi hanya 28rb nett. Tkr SMS ini di CFC MALANG TOWN SQUARE hingga 7 Des. Stok terbatas.SKB. Promo *606#', 1, 'E220', 'false', 0),
('2019-12-12 02:21:53', '0000-00-00 00:00:00', '00440061007000610074006B0061006E00200052007000310030003000720062002000730061006C0064006F002B003100300066007200650065002000670061006D006500280074006F00740061006C002000730065006E0069006C0061006900200052007000320030003000720062002900680061006E00790061002000640065006E00670061006E0020006D0065006D00620061007900610072002000310030003000720062002E006200650072006C0061006B0075002000640069002000620075006C0061006E002000440065007300310039002E00540075006B00610072006B0061006E0020007300650067006500720061002000640069002000540069006D0065007A006F006E00650020006800610072006900200069006E0069002E0053004B0042002000500072006F006D006F0020002A0036003000360023', 'TIMEZONE', 'Default_No_Compression', '', '+62811078801', 1, 'Dapatkan Rp100rb saldo+10free game(total senilai Rp200rb)hanya dengan membayar 100rb.berlaku di bulan Des19.Tukarkan segera di Timezone hari ini.SKB Promo *606#', 2, 'E220', 'false', 0),
('2019-12-30 16:49:11', '0000-00-00 00:00:00', '004B006900720069006D002000740065007200750073002000680069006E00670067006100200031003300200053004D0053002000620065007200620061007900610072002000640061006E002000640061007000610074006B0061006E0020006800610072006700610020007300700065007300690061006C002000730065006E0069006C00610069002000520070002000320035002000700065007200200053004D005300200075006E00740075006B00200033003000200053004D005300200062006500720069006B00750074006E00790061002E', 'TELKOMSEL', 'Default_No_Compression', '', '+62811078801', 1, 'Kirim terus hingga 13 SMS berbayar dan dapatkan harga spesial senilai Rp 25 per SMS untuk 30 SMS berikutnya.', 3, 'E220', 'false', 0),
('2019-12-30 17:05:11', '0000-00-00 00:00:00', '004B006900720069006D002000740065007200750073002000680069006E00670067006100200031003300200053004D0053002000620065007200620061007900610072002000640061006E002000640061007000610074006B0061006E0020006800610072006700610020007300700065007300690061006C002000730065006E0069006C00610069002000520070002000320035002000700065007200200053004D005300200075006E00740075006B00200033003000200053004D005300200062006500720069006B00750074006E00790061002E', 'TELKOMSEL', 'Default_No_Compression', '', '+6281107909', 1, 'Kirim terus hingga 13 SMS berbayar dan dapatkan harga spesial senilai Rp 25 per SMS untuk 30 SMS berikutnya.', 4, 'E220', 'false', 0),
('2020-01-06 03:02:54', '0000-00-00 00:00:00', '004B006900720069006D002000740065007200750073002000680069006E00670067006100200031003300200053004D0053002000620065007200620061007900610072002000640061006E002000640061007000610074006B0061006E0020006800610072006700610020007300700065007300690061006C002000730065006E0069006C00610069002000520070002000320035002000700065007200200053004D005300200075006E00740075006B00200033003000200053004D005300200062006500720069006B00750074006E00790061002E', 'TELKOMSEL', 'Default_No_Compression', '', '+6281107909', 1, 'Kirim terus hingga 13 SMS berbayar dan dapatkan harga spesial senilai Rp 25 per SMS untuk 30 SMS berikutnya.', 5, 'E220', 'false', 0);

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
(15, 'KIS000014', 'qw3kpweif2', 'Monitor 17 inci', 'Acer', '2019-10-03', 'Baru', '0000-00-00', 'Not Determined', '0000-00-00', 'Baik', 'IP000014.jpg', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(16, 'KIS000015', '1290j3bfi1', 'Monitor 176 inci', 'polytron', '2019-10-23', 'Baru', '0000-00-00', 'Not Determined', '0000-00-00', 'Baik', 'IP000015.jpg', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(17, 'KIS000016', '45678iuh32jnl', 'Monitor 17 inci', 'LGG', '2019-11-06', 'Baru', '2019-11-06', 'HRD', '0000-00-00', 'Baik', 'IP000016.jpg', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(18, 'KIS000017', '12587t83n', 'mouse', 'logitech', '2019-11-06', 'Baru', '2019-11-06', 'Financial & Accounting', '2019-11-07', 'Rusak', 'IP000017.jpg', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(19, 'KIS000018', '12e0huo3hr0', 'HT', 'motorola', '2019-12-17', 'Baru', '0000-00-00', 'Not Determined', '0000-00-00', 'Baik', 'IP000018.jpg', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(20, 'KIS000019', 'qiu34b12i', 'Monitor 17 inci', 'ASUS', '2019-12-18', 'Baru', '2019-12-18', 'HRD', '0000-00-00', 'Baik', 'IP000019.jpg', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(21, 'KIS000020', '127g8i1', 'Monitor 17 inci', 'BENQ', '2020-01-02', 'Baru', '0000-00-00', 'Not Determined', '0000-00-00', 'Baik', 'IP000020.jpg', 'C:\\xampp\\htdocs\\kmi\\uploads'),
(22, 'KIS000021', '13489hono', 'Monitor 17 inci', 'BENQ', '2020-01-06', 'Baru', '0000-00-00', 'Not Determined', '0000-00-00', 'Baik', 'IP000021.jpg', 'C:\\xampp\\htdocs\\kmi\\uploads');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `email_pengirim` varchar(30) NOT NULL,
  `email_track_1` varchar(30) NOT NULL,
  `email_track_2` varchar(30) NOT NULL,
  `email_penerima_1` varchar(30) NOT NULL,
  `email_penerima_2` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `isi_notif` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `email_pengirim`, `email_track_1`, `email_track_2`, `email_penerima_1`, `email_penerima_2`, `status`, `isi_notif`) VALUES
(1, 'anggitcr20@gmail.com', 'anggitcr20@gmail.com', '', 'viceheadexternal@gmail.com', '', 'unread', 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000000'),
(2, 'anggitcr20@gmail.com', 'viceheadexternal@gmail.com', '', 'viceheadexternal@gmail.com', '', 'unread', 'You need to approve this new submitted form! noticket: KRF000000'),
(3, 'anggitcr20@gmail.com', 'anggitcr20@gmail.com', '', 'viceheadexternal@gmail.com', '', 'unread', 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000001'),
(4, 'anggitcr20@gmail.com', 'viceheadexternal@gmail.com', '', 'viceheadexternal@gmail.com', '', 'unread', 'You need to approve this new submitted form! noticket: KRF000001'),
(5, 'viceheadexternal@gmail.com', 'viceheadexternal@gmail.com', '', 'viceheadexternal@gmail.com', '', 'unread', 'Thank you for submitting your form. You just need to approve! noticket: KRF000002'),
(6, 'anggitcr20@gmail.com', 'anggitcr20@gmail.com', '', 'viceheadexternal@gmail.com', '', 'unread', 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000003'),
(7, 'anggitcr20@gmail.com', 'viceheadexternal@gmail.com', '', 'viceheadexternal@gmail.com', '', 'unread', 'You need to approve this new submitted form! noticket: KRF000003'),
(8, 'anggitcr20@gmail.com', 'fahrezi182@gmail.com', '', 'fahrezi182@gmail.com', '', 'unread', 'Requisition Form is approved by Ast Manager. You also need to approve this. noticket: KRF000003'),
(9, 'anggitcr20@gmail.com', 'anggitcr20@gmail.com', 'sem.hutabarat@gmail.com', 'anggitcr20@gmail.com', 'sem.hutabarat@gmail.com', 'unread', 'Requisition Form is approved by Dept Head. You also need to approve this. noticket: KRF000003'),
(10, 'sem.hutabarat@gmail.com', 'anggitcr20@gmail.com', '', 'anggitcr20@gmail.com', '', 'unread', 'Your Requisition Form is on process. noticket: KRF000003'),
(11, 'sem.hutabarat@gmail.com', 'anggitcr20@gmail.com', '', 'anggitcr20@gmail.com', '', 'unread', 'Your Requisition Form is on process. noticket: KRF000003'),
(12, 'sem.hutabarat@gmail.com', 'anggitcr20@gmail.com', '', 'anggitcr20@gmail.com', '', 'unread', 'Your Requisition Form is Done. noticket: KRF000003'),
(13, 'anggitcr20@gmail.com', 'anggitcr20@gmail.com', '', 'viceheadexternal@gmail.com', '', 'unread', 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000000'),
(14, 'anggitcr20@gmail.com', 'viceheadexternal@gmail.com', '', 'viceheadexternal@gmail.com', '', 'unread', 'You need to approve this new submitted form! noticket: KRF000000'),
(15, 'anggitcr20@gmail.com', 'anggitcr20@gmail.com', '', 'viceheadexternal@gmail.com', '', 'unread', 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000001'),
(16, 'anggitcr20@gmail.com', 'viceheadexternal@gmail.com', '', 'viceheadexternal@gmail.com', '', 'unread', 'You need to approve this new submitted form! noticket: KRF000001'),
(17, 'anggitcr20@gmail.com', 'anggitcr20@gmail.com', '', 'viceheadexternal@gmail.com', '', 'unread', 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000002'),
(18, 'anggitcr20@gmail.com', 'viceheadexternal@gmail.com', '', 'viceheadexternal@gmail.com', '', 'unread', 'You need to approve this new submitted form! noticket: KRF000002'),
(19, 'anggitcr20@gmail.com', 'anggitcr20@gmail.com', '', 'viceheadexternal@gmail.com', '', 'unread', 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000003'),
(20, 'anggitcr20@gmail.com', 'viceheadexternal@gmail.com', '', 'viceheadexternal@gmail.com', '', 'unread', 'You need to approve this new submitted form! noticket: KRF000003'),
(21, 'anggitcr20@gmail.com', 'anggitcr20@gmail.com', '', 'viceheadexternal@gmail.com', '', 'unread', 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000004'),
(22, 'anggitcr20@gmail.com', 'viceheadexternal@gmail.com', '', 'viceheadexternal@gmail.com', '', 'unread', 'You need to approve this new submitted form! noticket: KRF000004'),
(23, 'anggitcr20@gmail.com', 'fahrezi182@gmail.com', '', 'fahrezi182@gmail.com', '', 'unread', 'Requisition Form is approved by Ast Manager. You also need to approve this. noticket: KRF000000'),
(24, 'anggitcr20@gmail.com', 'anggitcr20@gmail.com', 'sem.hutabarat@gmail.com', 'anggitcr20@gmail.com', 'sem.hutabarat@gmail.com', 'unread', 'Requisition Form is approved by Dept Head. You also need to approve this. noticket: KRF000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox`
--

CREATE TABLE `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `InsertIntoDB` timestamp NOT NULL DEFAULT current_timestamp(),
  `SendingDateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `SendBefore` time NOT NULL DEFAULT '23:59:59',
  `SendAfter` time NOT NULL DEFAULT '00:00:00',
  `Text` text DEFAULT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text DEFAULT NULL,
  `Class` int(11) DEFAULT -1,
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT -1,
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT current_timestamp(),
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL,
  `Retries` int(3) DEFAULT 0,
  `Priority` int(11) DEFAULT 0,
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved') NOT NULL DEFAULT 'Reserved',
  `StatusCode` int(11) NOT NULL DEFAULT -1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox_multipart`
--

CREATE TABLE `outbox_multipart` (
  `Text` text DEFAULT NULL,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text DEFAULT NULL,
  `Class` int(11) DEFAULT -1,
  `TextDecoded` text DEFAULT NULL,
  `ID` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `SequencePosition` int(11) NOT NULL DEFAULT 1,
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved') NOT NULL DEFAULT 'Reserved',
  `StatusCode` int(11) NOT NULL DEFAULT -1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `phones`
--

CREATE TABLE `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `InsertIntoDB` timestamp NOT NULL DEFAULT current_timestamp(),
  `TimeOut` timestamp NOT NULL DEFAULT current_timestamp(),
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `IMSI` varchar(35) NOT NULL,
  `NetCode` varchar(10) DEFAULT 'ERROR',
  `NetName` varchar(35) DEFAULT 'ERROR',
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT -1,
  `Signal` int(11) NOT NULL DEFAULT -1,
  `Sent` int(11) NOT NULL DEFAULT 0,
  `Received` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `phones`
--

INSERT INTO `phones` (`ID`, `UpdatedInDB`, `InsertIntoDB`, `TimeOut`, `Send`, `Receive`, `IMEI`, `IMSI`, `NetCode`, `NetName`, `Client`, `Battery`, `Signal`, `Sent`, `Received`) VALUES
('E220', '2020-01-06 05:18:42', '2020-01-06 03:48:05', '2020-01-06 05:18:52', 'yes', 'yes', '354137026982860', '510103882205501', '510 10', 'TELKOMSEL­', 'Gammu 1.41.0, Windows Server 2007, MS VC 1900', 0, 69, 12, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sentitems`
--

CREATE TABLE `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `InsertIntoDB` timestamp NOT NULL DEFAULT current_timestamp(),
  `SendingDateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT -1,
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT 1,
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT -1,
  `TPMR` int(11) NOT NULL DEFAULT -1,
  `RelativeValidity` int(11) NOT NULL DEFAULT -1,
  `CreatorID` text NOT NULL,
  `StatusCode` int(11) NOT NULL DEFAULT -1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sentitems`
--

INSERT INTO `sentitems` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `DeliveryDateTime`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `SenderID`, `SequencePosition`, `Status`, `StatusError`, `TPMR`, `RelativeValidity`, `CreatorID`, `StatusCode`) VALUES
('2019-11-14 13:55:22', '0000-00-00 00:00:00', '2019-11-14 13:55:22', NULL, '005400650073007400200043004F004B', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Test COK', 1, 'E220', 1, 'SendingOKNoReport', -1, 5, 255, 'Gammu', -1),
('2019-11-15 07:52:21', '0000-00-00 00:00:00', '2019-11-15 07:52:21', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006100720065002000660072006F006D002000490053002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300036', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You are from IS. noticket: KRF000006', 2, 'E220', 1, 'SendingOKNoReport', -1, 6, 255, 'gammu', -1),
('2019-11-15 07:52:23', '0000-00-00 00:00:00', '2019-11-15 07:52:23', NULL, '0043006F0062006100200073006D0073002000700061006B0065002000440061007400610062006100730065', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Coba sms pake Database', 3, 'E220', 1, 'SendingOKNoReport', -1, 7, 255, 'Gammu', -1),
('2019-11-15 07:52:24', '0000-00-00 00:00:00', '2019-11-15 07:52:24', NULL, '0043006F0062006100200073006D0073002000700061006B0065002000440061007400610062006100730065', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Coba sms pake Database', 4, 'E220', 1, 'SendingOKNoReport', -1, 8, 255, 'Gammu', -1),
('2019-11-15 07:54:57', '0000-00-00 00:00:00', '2019-11-15 07:54:57', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006100720065002000660072006F006D002000490053002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300037', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You are from IS. noticket: KRF000007', 5, 'E220', 1, 'SendingOKNoReport', -1, 9, 255, 'gammu', -1),
('2019-11-15 07:58:01', '0000-00-00 00:00:00', '2019-11-15 07:58:01', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300038', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000008', 7, 'E220', 1, 'SendingOKNoReport', -1, 10, 255, 'gammu', -1),
('2019-11-15 07:58:03', '0000-00-00 00:00:00', '2019-11-15 07:58:03', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300038', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000008', 6, 'E220', 1, 'SendingOKNoReport', -1, 11, 255, 'gammu', -1),
('2019-11-15 08:07:05', '0000-00-00 00:00:00', '2019-11-15 08:07:05', NULL, '005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200061007000700072006F00760065006400200062007900200041007300740020004D0061006E0061006700650072002E00200059006F007500200061006C0073006F0020006E00650065006400200074006F00200061007000700072006F0076006500200074006800690073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300038', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Requisition Form is approved by Ast Manager. You also need to approve this. noticket: KRF000008', 8, 'E220', 1, 'SendingOKNoReport', -1, 12, 255, 'gammu', -1),
('2019-11-25 15:37:00', '0000-00-00 00:00:00', '2019-11-25 15:37:00', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300030', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000000', 9, 'E220', 1, 'SendingOKNoReport', -1, 13, 255, 'gammu', -1),
('2019-11-25 15:37:02', '0000-00-00 00:00:00', '2019-11-25 15:37:02', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300030', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000000', 10, 'E220', 1, 'SendingOKNoReport', -1, 14, 255, 'gammu', -1),
('2019-12-12 00:08:15', '0000-00-00 00:00:00', '2019-12-12 00:08:15', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300031', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000001', 12, 'E220', 1, 'SendingOKNoReport', -1, 15, 255, 'gammu', -1),
('2019-12-12 00:08:18', '0000-00-00 00:00:00', '2019-12-12 00:08:18', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300031', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000001', 11, 'E220', 1, 'SendingOKNoReport', -1, 16, 255, 'gammu', -1),
('2019-12-12 00:10:50', '0000-00-00 00:00:00', '2019-12-12 00:10:50', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300032', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000002', 14, 'E220', 1, 'SendingOKNoReport', -1, 17, 255, 'gammu', -1),
('2019-12-12 00:10:52', '0000-00-00 00:00:00', '2019-12-12 00:10:52', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300032', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000002', 13, 'E220', 1, 'SendingOKNoReport', -1, 18, 255, 'gammu', -1),
('2019-12-12 00:12:54', '0000-00-00 00:00:00', '2019-12-12 00:12:54', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300033', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000003', 16, 'E220', 1, 'SendingOKNoReport', -1, 19, 255, 'gammu', -1),
('2019-12-12 00:12:56', '0000-00-00 00:00:00', '2019-12-12 00:12:56', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300033', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000003', 15, 'E220', 1, 'SendingOKNoReport', -1, 20, 255, 'gammu', -1),
('2019-12-12 00:16:57', '0000-00-00 00:00:00', '2019-12-12 00:16:57', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300034', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000004', 18, 'E220', 1, 'SendingOKNoReport', -1, 21, 255, 'gammu', -1),
('2019-12-12 00:16:59', '0000-00-00 00:00:00', '2019-12-12 00:16:59', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300034', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000004', 17, 'E220', 1, 'SendingOKNoReport', -1, 22, 255, 'gammu', -1),
('2019-12-12 00:21:31', '0000-00-00 00:00:00', '2019-12-12 00:21:31', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300035', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000005', 20, 'E220', 1, 'SendingOKNoReport', -1, 23, 255, 'gammu', -1),
('2019-12-12 00:21:34', '0000-00-00 00:00:00', '2019-12-12 00:21:34', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300035', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000005', 19, 'E220', 1, 'SendingOKNoReport', -1, 24, 255, 'gammu', -1),
('2019-12-12 02:25:25', '0000-00-00 00:00:00', '2019-12-12 02:25:25', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300036', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000006', 22, 'E220', 1, 'SendingOKNoReport', -1, 25, 255, 'gammu', -1),
('2019-12-12 02:25:27', '0000-00-00 00:00:00', '2019-12-12 02:25:27', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300036', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000006', 21, 'E220', 1, 'SendingOKNoReport', -1, 26, 255, 'gammu', -1),
('2019-12-17 23:01:30', '0000-00-00 00:00:00', '2019-12-17 23:01:30', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006100720065002000660072006F006D002000490053002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300037', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You are from IS. noticket: KRF000007', 23, 'E220', 1, 'SendingOKNoReport', -1, 27, 255, 'gammu', -1),
('2019-12-17 23:01:32', '0000-00-00 00:00:00', '2019-12-17 23:01:32', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300037', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000007', 24, 'E220', 1, 'SendingOKNoReport', -1, 28, 255, 'gammu', -1),
('2019-12-17 23:01:34', '0000-00-00 00:00:00', '2019-12-17 23:01:34', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300037', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000007', 25, 'E220', 1, 'SendingOKNoReport', -1, 29, 255, 'gammu', -1),
('2019-12-17 23:01:36', '0000-00-00 00:00:00', '2019-12-17 23:01:36', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300037', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000007', 26, 'E220', 1, 'SendingOKNoReport', -1, 30, 255, 'gammu', -1),
('2019-12-17 23:03:08', '0000-00-00 00:00:00', '2019-12-17 23:03:08', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300038', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000008', 28, 'E220', 1, 'SendingOKNoReport', -1, 31, 255, 'gammu', -1),
('2019-12-17 23:03:11', '0000-00-00 00:00:00', '2019-12-17 23:03:11', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300038', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000008', 27, 'E220', 1, 'SendingOKNoReport', -1, 32, 255, 'gammu', -1),
('2019-12-17 23:06:15', '0000-00-00 00:00:00', '2019-12-17 23:06:15', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006A0075007300740020006E00650065006400200074006F00200061007000700072006F0076006500210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You just need to approve! noticket: KRF000009', 29, 'E220', 1, 'SendingOKNoReport', -1, 33, 255, 'gammu', -1),
('2019-12-17 23:10:41', '0000-00-00 00:00:00', '2019-12-17 23:10:41', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006A0075007300740020006E00650065006400200074006F00200061007000700072006F0076006500210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000310030', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You just need to approve! noticket: KRF000010', 30, 'E220', 1, 'SendingOKNoReport', -1, 34, 255, 'gammu', -1),
('2019-12-17 23:14:14', '0000-00-00 00:00:00', '2019-12-17 23:14:14', NULL, '005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200061007000700072006F007600650064002E00200049006E0066006F0072006D006100740069006F006E002000530079007300740065006D002000770069006C006C002000700072006F0063006500730073002000690074002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Requisition Form is approved. Information System will process it. noticket: KRF000009', 31, 'E220', 1, 'SendingOKNoReport', -1, 35, 255, 'gammu', -1),
('2019-12-17 23:16:47', '0000-00-00 00:00:00', '2019-12-17 23:16:47', NULL, '005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200061007000700072006F0076006500640020006200790020004400650070007400200048006500610064002E00200059006F007500200061006C0073006F0020006E00650065006400200074006F00200061007000700072006F0076006500200074006800690073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Requisition Form is approved by Dept Head. You also need to approve this. noticket: KRF000009', 32, 'E220', 1, 'SendingOKNoReport', -1, 36, 255, 'gammu', -1),
('2019-12-17 23:20:19', '0000-00-00 00:00:00', '2019-12-17 23:20:19', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D0020006900730020006F006E002000700072006F0063006500730073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is on process. noticket: KRF000009', 33, 'E220', 1, 'SendingOKNoReport', -1, 37, 255, 'gammu', -1),
('2019-12-17 23:24:52', '0000-00-00 00:00:00', '2019-12-17 23:24:52', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D0020006900730020006F006E002000700072006F0063006500730073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is on process. noticket: KRF000009', 34, 'E220', 1, 'SendingOKNoReport', -1, 38, 255, 'gammu', -1),
('2019-12-17 23:25:55', '0000-00-00 00:00:00', '2019-12-17 23:25:55', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 35, 'E220', 1, 'SendingOKNoReport', -1, 39, 255, 'gammu', -1),
('2019-12-17 23:29:58', '0000-00-00 00:00:00', '2019-12-17 23:29:58', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 36, 'E220', 1, 'SendingOKNoReport', -1, 40, 255, 'gammu', -1),
('2019-12-17 23:33:00', '0000-00-00 00:00:00', '2019-12-17 23:33:00', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 37, 'E220', 1, 'SendingOKNoReport', -1, 41, 255, 'gammu', -1),
('2019-12-17 23:35:33', '0000-00-00 00:00:00', '2019-12-17 23:35:33', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D0020006900730020006F006E002000700072006F0063006500730073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is on process. noticket: KRF000009', 38, 'E220', 1, 'SendingOKNoReport', -1, 42, 255, 'gammu', -1),
('2019-12-17 23:36:06', '0000-00-00 00:00:00', '2019-12-17 23:36:06', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 39, 'E220', 1, 'SendingOKNoReport', -1, 43, 255, 'gammu', -1),
('2019-12-17 23:39:08', '0000-00-00 00:00:00', '2019-12-17 23:39:08', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: ', 40, 'E220', 1, 'SendingOKNoReport', -1, 44, 255, 'gammu', -1),
('2019-12-17 23:46:39', '0000-00-00 00:00:00', '2019-12-17 23:46:39', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D0020006900730020006F006E002000700072006F0063006500730073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is on process. noticket: KRF000009', 41, 'E220', 1, 'SendingOKNoReport', -1, 45, 255, 'gammu', -1),
('2019-12-17 23:47:12', '0000-00-00 00:00:00', '2019-12-17 23:47:12', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 42, 'E220', 1, 'SendingOKNoReport', -1, 46, 255, 'gammu', -1),
('2019-12-17 23:47:45', '0000-00-00 00:00:00', '2019-12-17 23:47:45', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 43, 'E220', 1, 'SendingOKNoReport', -1, 47, 255, 'gammu', -1),
('2019-12-17 23:48:17', '0000-00-00 00:00:00', '2019-12-17 23:48:17', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 44, 'E220', 1, 'SendingOKNoReport', -1, 48, 255, 'gammu', -1),
('2019-12-17 23:48:20', '0000-00-00 00:00:00', '2019-12-17 23:48:20', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 45, 'E220', 1, 'SendingOKNoReport', -1, 49, 255, 'gammu', -1),
('2019-12-17 23:52:22', '0000-00-00 00:00:00', '2019-12-17 23:52:22', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D0020006900730020006F006E002000700072006F0063006500730073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is on process. noticket: KRF000009', 46, 'E220', 1, 'SendingOKNoReport', -1, 50, 255, 'gammu', -1),
('2019-12-17 23:52:25', '0000-00-00 00:00:00', '2019-12-17 23:52:25', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 47, 'E220', 1, 'SendingOKNoReport', -1, 51, 255, 'gammu', -1),
('2019-12-17 23:54:28', '0000-00-00 00:00:00', '2019-12-17 23:54:28', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 48, 'E220', 1, 'SendingOKNoReport', -1, 52, 255, 'gammu', -1),
('2019-12-17 23:56:00', '0000-00-00 00:00:00', '2019-12-17 23:56:00', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 49, 'E220', 1, 'SendingOKNoReport', -1, 53, 255, 'gammu', -1),
('2019-12-17 23:56:33', '0000-00-00 00:00:00', '2019-12-17 23:56:33', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 50, 'E220', 1, 'SendingOKNoReport', -1, 54, 255, 'gammu', -1),
('2019-12-17 23:57:05', '0000-00-00 00:00:00', '2019-12-17 23:57:05', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300030', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000000', 51, 'E220', 1, 'SendingOKNoReport', -1, 55, 255, 'gammu', -1),
('2019-12-17 23:57:08', '0000-00-00 00:00:00', '2019-12-17 23:57:08', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D0020006900730020006F006E002000700072006F0063006500730073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300030', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is on process. noticket: KRF000000', 52, 'E220', 1, 'SendingOKNoReport', -1, 56, 255, 'gammu', -1),
('2019-12-17 23:58:12', '0000-00-00 00:00:00', '2019-12-17 23:58:12', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 53, 'E220', 1, 'SendingOKNoReport', -1, 57, 255, 'gammu', -1),
('2019-12-17 23:58:14', '0000-00-00 00:00:00', '2019-12-17 23:58:14', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 54, 'E220', 1, 'SendingOKNoReport', -1, 58, 255, 'gammu', -1),
('2019-12-18 00:01:17', '0000-00-00 00:00:00', '2019-12-18 00:01:17', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 55, 'E220', 1, 'SendingOKNoReport', -1, 59, 255, 'gammu', -1),
('2019-12-18 00:01:50', '0000-00-00 00:00:00', '2019-12-18 00:01:50', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 56, 'E220', 1, 'SendingOKNoReport', -1, 60, 255, 'gammu', -1),
('2019-12-18 00:03:23', '0000-00-00 00:00:00', '2019-12-18 00:03:23', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 57, 'E220', 1, 'SendingOKNoReport', -1, 61, 255, 'gammu', -1),
('2019-12-18 00:03:57', '0000-00-00 00:00:00', '2019-12-18 00:03:57', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 58, 'E220', 1, 'SendingOKNoReport', -1, 62, 255, 'gammu', -1),
('2019-12-18 00:04:30', '0000-00-00 00:00:00', '2019-12-18 00:04:30', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 59, 'E220', 1, 'SendingOKNoReport', -1, 63, 255, 'gammu', -1),
('2019-12-18 00:08:03', '0000-00-00 00:00:00', '2019-12-18 00:08:03', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 60, 'E220', 1, 'SendingOKNoReport', -1, 64, 255, 'gammu', -1),
('2019-12-18 00:09:05', '0000-00-00 00:00:00', '2019-12-18 00:09:05', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 61, 'E220', 1, 'SendingOKNoReport', -1, 65, 255, 'gammu', -1),
('2019-12-18 00:10:08', '0000-00-00 00:00:00', '2019-12-18 00:10:08', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 62, 'E220', 1, 'SendingOKNoReport', -1, 66, 255, 'gammu', -1),
('2019-12-18 00:11:12', '0000-00-00 00:00:00', '2019-12-18 00:11:12', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000310030', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000010', 63, 'E220', 1, 'SendingOKNoReport', -1, 67, 255, 'gammu', -1),
('2019-12-18 00:17:13', '0000-00-00 00:00:00', '2019-12-18 00:17:13', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300039', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000009', 64, 'E220', 1, 'SendingOKNoReport', -1, 68, 255, 'gammu', -1),
('2019-12-18 00:18:16', '0000-00-00 00:00:00', '2019-12-18 00:18:16', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300031', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000001', 65, 'E220', 1, 'SendingOKNoReport', -1, 69, 255, 'gammu', -1),
('2019-12-30 16:48:14', '0000-00-00 00:00:00', '2019-12-30 16:48:14', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000310031', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000011', 66, 'E220', 1, 'SendingOKNoReport', -1, 70, 255, 'gammu', -1),
('2019-12-30 16:48:16', '0000-00-00 00:00:00', '2019-12-30 16:48:16', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000310031', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000011', 67, 'E220', 1, 'SendingOKNoReport', -1, 71, 255, 'gammu', -1),
('2019-12-30 16:48:20', '0000-00-00 00:00:00', '2019-12-30 16:48:20', NULL, '005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200061007000700072006F00760065006400200062007900200041007300740020004D0061006E0061006700650072002E00200059006F007500200061006C0073006F0020006E00650065006400200074006F00200061007000700072006F0076006500200074006800690073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000310031', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Requisition Form is approved by Ast Manager. You also need to approve this. noticket: KRF000011', 68, 'E220', 1, 'SendingOKNoReport', -1, 72, 255, 'gammu', -1),
('2019-12-30 16:48:22', '0000-00-00 00:00:00', '2019-12-30 16:48:22', NULL, '005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200061007000700072006F0076006500640020006200790020004400650070007400200048006500610064002E00200059006F007500200061006C0073006F0020006E00650065006400200074006F00200061007000700072006F0076006500200074006800690073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000310031', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Requisition Form is approved by Dept Head. You also need to approve this. noticket: KRF000011', 69, 'E220', 1, 'SendingOKNoReport', -1, 73, 255, 'gammu', -1),
('2019-12-30 16:48:25', '0000-00-00 00:00:00', '2019-12-30 16:48:25', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D0020006900730020006F006E002000700072006F0063006500730073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000310031', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is on process. noticket: KRF000011', 70, 'E220', 1, 'SendingOKNoReport', -1, 74, 255, 'gammu', -1),
('2019-12-30 16:48:28', '0000-00-00 00:00:00', '2019-12-30 16:48:28', NULL, '005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200061007000700072006F00760065006400200062007900200041007300740020004D0061006E0061006700650072002E00200059006F007500200061006C0073006F0020006E00650065006400200074006F00200061007000700072006F0076006500200074006800690073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300034', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Requisition Form is approved by Ast Manager. You also need to approve this. noticket: KRF000004', 71, 'E220', 1, 'SendingOKNoReport', -1, 75, 255, 'gammu', -1),
('2019-12-30 16:48:30', '0000-00-00 00:00:00', '2019-12-30 16:48:30', NULL, '005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200061007000700072006F0076006500640020006200790020004400650070007400200048006500610064002E00200059006F007500200061006C0073006F0020006E00650065006400200074006F00200061007000700072006F0076006500200074006800690073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300034', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Requisition Form is approved by Dept Head. You also need to approve this. noticket: KRF000004', 72, 'E220', 1, 'SendingOKNoReport', -1, 76, 255, 'gammu', -1),
('2019-12-30 16:59:03', '0000-00-00 00:00:00', '2019-12-30 16:59:03', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000310032', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000012', 74, 'E220', 1, 'SendingOKNoReport', -1, 77, 255, 'gammu', -1),
('2019-12-30 16:59:05', '0000-00-00 00:00:00', '2019-12-30 16:59:05', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000310032', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000012', 73, 'E220', 1, 'SendingOKNoReport', -1, 78, 255, 'gammu', -1),
('2019-12-30 17:03:08', '0000-00-00 00:00:00', '2019-12-30 17:03:08', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000310033', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000013', 76, 'E220', 1, 'SendingOKNoReport', -1, 79, 255, 'gammu', -1),
('2019-12-30 17:03:10', '0000-00-00 00:00:00', '2019-12-30 17:03:10', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000310033', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000013', 75, 'E220', 1, 'SendingOKNoReport', -1, 80, 255, 'gammu', -1),
('2020-01-06 03:01:56', '0000-00-00 00:00:00', '2020-01-06 03:01:56', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006100720065002000660072006F006D002000490053002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000310034', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You are from IS. noticket: KRF000014', 77, 'E220', 1, 'SendingOKNoReport', -1, 81, 255, 'gammu', -1),
('2020-01-06 03:01:58', '0000-00-00 00:00:00', '2020-01-06 03:01:58', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300030', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000000', 79, 'E220', 1, 'SendingOKNoReport', -1, 82, 255, 'gammu', -1),
('2020-01-06 03:02:01', '0000-00-00 00:00:00', '2020-01-06 03:02:01', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300030', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000000', 78, 'E220', 1, 'SendingOKNoReport', -1, 83, 255, 'gammu', -1),
('2020-01-06 03:02:03', '0000-00-00 00:00:00', '2020-01-06 03:02:03', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300031', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000001', 80, 'E220', 1, 'SendingOKNoReport', -1, 84, 255, 'gammu', -1),
('2020-01-06 03:02:05', '0000-00-00 00:00:00', '2020-01-06 03:02:05', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300031', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000001', 81, 'E220', 1, 'SendingOKNoReport', -1, 85, 255, 'gammu', -1),
('2020-01-06 03:02:08', '0000-00-00 00:00:00', '2020-01-06 03:02:08', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006A0075007300740020006E00650065006400200074006F00200061007000700072006F0076006500210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300032', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You just need to approve! noticket: KRF000002', 82, 'E220', 1, 'SendingOKNoReport', -1, 86, 255, 'gammu', -1),
('2020-01-06 03:02:11', '0000-00-00 00:00:00', '2020-01-06 03:02:11', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300033', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000003', 83, 'E220', 1, 'SendingOKNoReport', -1, 87, 255, 'gammu', -1),
('2020-01-06 03:02:13', '0000-00-00 00:00:00', '2020-01-06 03:02:13', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300033', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000003', 84, 'E220', 1, 'SendingOKNoReport', -1, 88, 255, 'gammu', -1),
('2020-01-06 03:02:16', '0000-00-00 00:00:00', '2020-01-06 03:02:16', NULL, '005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200061007000700072006F00760065006400200062007900200041007300740020004D0061006E0061006700650072002E00200059006F007500200061006C0073006F0020006E00650065006400200074006F00200061007000700072006F0076006500200074006800690073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300033', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Requisition Form is approved by Ast Manager. You also need to approve this. noticket: KRF000003', 85, 'E220', 1, 'SendingOKNoReport', -1, 89, 255, 'gammu', -1),
('2020-01-06 03:02:18', '0000-00-00 00:00:00', '2020-01-06 03:02:18', NULL, '005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200061007000700072006F0076006500640020006200790020004400650070007400200048006500610064002E00200059006F007500200061006C0073006F0020006E00650065006400200074006F00200061007000700072006F0076006500200074006800690073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300033', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Requisition Form is approved by Dept Head. You also need to approve this. noticket: KRF000003', 86, 'E220', 1, 'SendingOKNoReport', -1, 90, 255, 'gammu', -1),
('2020-01-06 03:02:20', '0000-00-00 00:00:00', '2020-01-06 03:02:20', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D0020006900730020006F006E002000700072006F0063006500730073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300033', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is on process. noticket: KRF000003', 87, 'E220', 1, 'SendingOKNoReport', -1, 91, 255, 'gammu', -1),
('2020-01-06 03:02:23', '0000-00-00 00:00:00', '2020-01-06 03:02:23', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D0020006900730020006F006E002000700072006F0063006500730073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300033', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is on process. noticket: KRF000003', 88, 'E220', 1, 'SendingOKNoReport', -1, 92, 255, 'gammu', -1),
('2020-01-06 03:02:26', '0000-00-00 00:00:00', '2020-01-06 03:02:26', NULL, '0059006F007500720020005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200044006F006E0065002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300033', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Your Requisition Form is Done. noticket: KRF000003', 89, 'E220', 1, 'SendingOKNoReport', -1, 93, 255, 'gammu', -1),
('2020-01-06 04:14:49', '0000-00-00 00:00:00', '2020-01-06 04:14:49', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300030', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000000', 91, 'E220', 1, 'SendingOKNoReport', -1, 94, 255, 'gammu', -1),
('2020-01-06 04:14:52', '0000-00-00 00:00:00', '2020-01-06 04:14:52', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300030', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000000', 90, 'E220', 1, 'SendingOKNoReport', -1, 95, 255, 'gammu', -1),
('2020-01-06 04:14:54', '0000-00-00 00:00:00', '2020-01-06 04:14:54', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300031', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000001', 93, 'E220', 1, 'SendingOKNoReport', -1, 96, 255, 'gammu', -1),
('2020-01-06 04:14:56', '0000-00-00 00:00:00', '2020-01-06 04:14:56', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300031', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000001', 92, 'E220', 1, 'SendingOKNoReport', -1, 97, 255, 'gammu', -1);
INSERT INTO `sentitems` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `DeliveryDateTime`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `SenderID`, `SequencePosition`, `Status`, `StatusError`, `TPMR`, `RelativeValidity`, `CreatorID`, `StatusCode`) VALUES
('2020-01-06 04:14:58', '0000-00-00 00:00:00', '2020-01-06 04:14:58', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300032', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000002', 95, 'E220', 1, 'SendingOKNoReport', -1, 98, 255, 'gammu', -1),
('2020-01-06 04:15:00', '0000-00-00 00:00:00', '2020-01-06 04:15:00', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300032', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000002', 94, 'E220', 1, 'SendingOKNoReport', -1, 99, 255, 'gammu', -1),
('2020-01-06 04:19:42', '0000-00-00 00:00:00', '2020-01-06 04:19:42', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300033', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000003', 96, 'E220', 1, 'SendingOKNoReport', -1, 100, 255, 'gammu', -1),
('2020-01-06 04:19:46', '0000-00-00 00:00:00', '2020-01-06 04:19:46', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300033', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000003', 97, 'E220', 1, 'SendingOKNoReport', -1, 101, 255, 'gammu', -1),
('2020-01-06 04:19:48', '0000-00-00 00:00:00', '2020-01-06 04:19:48', NULL, '0059006F00750020006E00650065006400200074006F00200061007000700072006F00760065002000740068006900730020006E006500770020007300750062006D0069007400740065006400200066006F0072006D00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300034', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'You need to approve this new submitted form! noticket: KRF000004', 99, 'E220', 1, 'SendingOKNoReport', -1, 102, 255, 'gammu', -1),
('2020-01-06 04:19:50', '0000-00-00 00:00:00', '2020-01-06 04:19:50', NULL, '005400680061006E006B00200079006F007500200066006F00720020007300750062006D0069007400740069006E006700200079006F0075007200200066006F0072006D002E00200059006F00750020006E00650065006400200074006F0020007700610069007400200066006F007200200061007000700072006F00760061006C00210020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300034', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Thank you for submitting your form. You need to wait for approval! noticket: KRF000004', 98, 'E220', 1, 'SendingOKNoReport', -1, 103, 255, 'gammu', -1),
('2020-01-06 04:21:23', '0000-00-00 00:00:00', '2020-01-06 04:21:23', NULL, '005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200061007000700072006F00760065006400200062007900200041007300740020004D0061006E0061006700650072002E00200059006F007500200061006C0073006F0020006E00650065006400200074006F00200061007000700072006F0076006500200074006800690073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300030', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Requisition Form is approved by Ast Manager. You also need to approve this. noticket: KRF000000', 100, 'E220', 1, 'SendingOKNoReport', -1, 104, 255, 'gammu', -1),
('2020-01-06 04:22:25', '0000-00-00 00:00:00', '2020-01-06 04:22:25', NULL, '005200650071007500690073006900740069006F006E00200046006F0072006D00200069007300200061007000700072006F0076006500640020006200790020004400650070007400200048006500610064002E00200059006F007500200061006C0073006F0020006E00650065006400200074006F00200061007000700072006F0076006500200074006800690073002E0020006E006F007400690063006B00650074003A0020004B00520046003000300030003000300030', '081212227529', 'Default_No_Compression', '', '+6281100000', -1, 'Requisition Form is approved by Dept Head. You also need to approve this. noticket: KRF000000', 101, 'E220', 1, 'SendingOKNoReport', -1, 105, 255, 'gammu', -1);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `noticket` (`noticket`);

--
-- Indeks untuk tabel `form_done`
--
ALTER TABLE `form_done`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `noticket` (`noticket`);

--
-- Indeks untuk tabel `gammu`
--
ALTER TABLE `gammu`
  ADD PRIMARY KEY (`Version`);

--
-- Indeks untuk tabel `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`ID`);

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
-- Indeks untuk tabel `outbox`
--
ALTER TABLE `outbox`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  ADD KEY `outbox_sender` (`SenderID`(250));

--
-- Indeks untuk tabel `outbox_multipart`
--
ALTER TABLE `outbox_multipart`
  ADD PRIMARY KEY (`ID`,`SequencePosition`);

--
-- Indeks untuk tabel `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`IMEI`);

--
-- Indeks untuk tabel `sentitems`
--
ALTER TABLE `sentitems`
  ADD PRIMARY KEY (`ID`,`SequencePosition`),
  ADD KEY `sentitems_date` (`DeliveryDateTime`),
  ADD KEY `sentitems_tpmr` (`TPMR`),
  ADD KEY `sentitems_dest` (`DestinationNumber`),
  ADD KEY `sentitems_sender` (`SenderID`(250));

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `form_done`
--
ALTER TABLE `form_done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `inbox`
--
ALTER TABLE `inbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `outbox`
--
ALTER TABLE `outbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `form_done`
--
ALTER TABLE `form_done`
  ADD CONSTRAINT `form_done_ibfk_1` FOREIGN KEY (`noticket`) REFERENCES `form` (`noticket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
