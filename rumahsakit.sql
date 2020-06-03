-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 02 Jun 2020 pada 13.33
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsakit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_obat`
--

CREATE TABLE `detail_obat` (
  `id_rm_obat` int(8) NOT NULL,
  `id_medis` varchar(50) NOT NULL,
  `id_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_obat`
--

INSERT INTO `detail_obat` (`id_rm_obat`, `id_medis`, `id_obat`) VALUES
(71, '5400b1c4-9874-11ea-aaff-ccb0da7ace87', '6ece8ecd-aae2-4ca6-b9df-ebe44ed31ae7'),
(72, '5400b1c4-9874-11ea-aaff-ccb0da7ace87', '8c513b03-94a7-429d-9c89-6e5393f718f1'),
(73, '281e884c-9874-11ea-80fb-ccb0da7ace87', '6ece8ecd-aae2-4ca6-b9df-ebe44ed31ae7'),
(74, '281e884c-9874-11ea-80fb-ccb0da7ace87', '8c513b03-94a7-429d-9c89-6e5393f718f1'),
(75, '03b7939c-9962-11ea-9de9-ccb0da7ace87', '6ece8ecd-aae2-4ca6-b9df-ebe44ed31ae7'),
(76, '03b7939c-9962-11ea-9de9-ccb0da7ace87', '8c513b03-94a7-429d-9c89-6e5393f718f1'),
(77, '1362e60c-9962-11ea-8d14-ccb0da7ace87', '6ece8ecd-aae2-4ca6-b9df-ebe44ed31ae7'),
(78, '1362e60c-9962-11ea-8d14-ccb0da7ace87', '8c513b03-94a7-429d-9c89-6e5393f718f1'),
(79, '25c29fa4-9962-11ea-9071-ccb0da7ace87', '6ece8ecd-aae2-4ca6-b9df-ebe44ed31ae7'),
(80, '25c29fa4-9962-11ea-9071-ccb0da7ace87', '8c513b03-94a7-429d-9c89-6e5393f718f1'),
(82, '5de00c00-9962-11ea-bdd2-ccb0da7ace87', '6ece8ecd-aae2-4ca6-b9df-ebe44ed31ae7'),
(83, '5de00c00-9962-11ea-bdd2-ccb0da7ace87', '8c513b03-94a7-429d-9c89-6e5393f718f1'),
(84, '7883bfca-9962-11ea-ab8c-ccb0da7ace87', '8c513b03-94a7-429d-9c89-6e5393f718f1'),
(85, '89d6207e-9962-11ea-b875-ccb0da7ace87', '8c513b03-94a7-429d-9c89-6e5393f718f1'),
(87, 'd55bd282-9962-11ea-8bce-ccb0da7ace87', '8c513b03-94a7-429d-9c89-6e5393f718f1'),
(88, 'e47d8c9c-9962-11ea-bf3c-ccb0da7ace87', '6ece8ecd-aae2-4ca6-b9df-ebe44ed31ae7'),
(89, 'e47d8c9c-9962-11ea-bf3c-ccb0da7ace87', '8c513b03-94a7-429d-9c89-6e5393f718f1'),
(90, '4d241944-9965-11ea-9425-ccb0da7ace87', '6ece8ecd-aae2-4ca6-b9df-ebe44ed31ae7'),
(91, '4d241944-9965-11ea-9425-ccb0da7ace87', '8c513b03-94a7-429d-9c89-6e5393f718f1'),
(92, '5f1772ae-9965-11ea-ba8d-ccb0da7ace87', '8c513b03-94a7-429d-9c89-6e5393f718f1'),
(96, 'fc50c8de-99e9-11ea-a169-98e7f48a9bd0', '8c513b03-94a7-429d-9c89-6e5393f718f1'),
(98, '9e6ceb30-9962-11ea-b8a6-ccb0da7ace87', '8c513b03-94a7-429d-9c89-6e5393f718f1'),
(99, 'bdb41cca-99e9-11ea-a6a8-98e7f48a9bd0', '8c513b03-94a7-429d-9c89-6e5393f718f1'),
(100, '6dbc0e18-99ed-11ea-a18e-98e7f48a9bd0', '8c513b03-94a7-429d-9c89-6e5393f718f1'),
(101, '381331fc-99d8-11ea-b35e-98e7f48a9bd0', '8c513b03-94a7-429d-9c89-6e5393f718f1'),
(102, '451fc6e2-9962-11ea-bc5f-ccb0da7ace87', '6ece8ecd-aae2-4ca6-b9df-ebe44ed31ae7'),
(103, '3b18cf32-9c7c-11ea-9c4a-98e7f48a9bd0', '69c7db23-d491-4327-bb51-54a110f8a41d'),
(104, '54dc64ec-9c7c-11ea-89a3-98e7f48a9bd0', '69c7db23-d491-4327-bb51-54a110f8a41d'),
(107, '4c8ca46a-a10d-11ea-b9a4-ccb0da7ace87', '8c513b03-94a7-429d-9c89-6e5393f718f1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `spesialis` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `alamat`, `no_telp`) VALUES
('0427d1d3-e984-4851-8783-e89312ee7407', 'Adnan Wijaya', 'Jantung', 'Cisoka', '085717396839'),
('42401cb2-aae4-4d92-a618-2efd9af79e6d', 'Dicky Ramli', 'Umum', 'Cisoka', '085717396839'),
('470795e9-9bd8-4be7-bda0-e60e16b08782', 'Anton Wijaya', 'Urologi', 'Yogyakarta', '085717396839'),
('57d49e36-bfa3-4a08-af1c-b51841127641', 'Fredi Gunawan', 'Paru', 'Balaraja', '085717396839'),
('6115c510-c362-45e5-a547-5ac0587b9cc6', 'Rizki Lestari', 'Gigi', 'Sukabumi', '085717396839'),
('71d0f696-53e9-4742-b303-268a89502286', 'Ahsan Muttaqin', 'Umum', 'Curug Kulon', '085717396839'),
('7cf84a93-86c9-4729-b494-4efa6334ce6a', 'Saeno', 'Umum', 'Curug', '085717396839'),
('ce241296-e93f-42d4-8002-a1cbccf2df87', 'Desi Rea', 'Kandungan', 'Yogyakarta', '085717396839'),
('e7b6ddd2-dd13-4e70-942f-db567f5c70b4', 'Amira Khairunnisa', 'Kulit', 'Curug', '085717396839'),
('f6f01787-928d-45d8-bb5a-918686ea4c0c', 'Karyadi', 'Umum', 'Cisoka', '085717396839');

-- --------------------------------------------------------

--
-- Struktur dari tabel `medis`
--

CREATE TABLE `medis` (
  `id_medis` varchar(50) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `id_poli` varchar(50) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosa` text NOT NULL,
  `id_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `medis`
--

INSERT INTO `medis` (`id_medis`, `id_pasien`, `id_dokter`, `id_poli`, `tgl_periksa`, `keluhan`, `diagnosa`, `id_user`) VALUES
('03b7939c-9962-11ea-9de9-ccb0da7ace87', '818f7998-94e8-11ea-93e6-ccb0da7ace87', '7cf84a93-86c9-4729-b494-4efa6334ce6a', '1b9e936c-9600-11ea-8112-98e7f48a9bd0', '2020-05-19', 'Sering keringat', 'Jantung lemah', '0c9d6fc5-3ad8-11ea-bf25-f337376e844b'),
('1362e60c-9962-11ea-8d14-ccb0da7ace87', 'b86085d4-95fb-11ea-893d-98e7f48a9bd0', '71d0f696-53e9-4742-b303-268a89502286', 'b2279024-95f4-11ea-a38c-98e7f48a9bd0', '2020-05-07', 'Sesak nafas', 'Asma', 'b1404951-3ad7-11ea-bf25-f337376e844b'),
('25c29fa4-9962-11ea-9071-ccb0da7ace87', 'b860e31c-95fb-11ea-b245-98e7f48a9bd0', '57d49e36-bfa3-4a08-af1c-b51841127641', 'a993d2b2-9958-11ea-b74e-ccb0da7ace87', '2020-05-19', 'Telinga berair', 'Infeksi', 'b1404951-3ad7-11ea-bf25-f337376e844b'),
('281e884c-9874-11ea-80fb-ccb0da7ace87', 'b8606cc0-95fb-11ea-98dc-98e7f48a9bd0', 'ce241296-e93f-42d4-8002-a1cbccf2df87', '1b94ed58-9600-11ea-9841-98e7f48a9bd0', '2020-05-17', 'Gusi bengkak', 'Kurang VItamin\r\n', 'b1404951-3ad7-11ea-bf25-f337376e844b'),
('381331fc-99d8-11ea-b35e-98e7f48a9bd0', '818fc9ac-94e8-11ea-9f5e-ccb0da7ace87', '470795e9-9bd8-4be7-bda0-e60e16b08782', 'f1209f44-9975-11ea-9f1d-ccb0da7ace87', '2020-05-19', 'burem', 'minus', '0c9d6fc5-3ad8-11ea-bf25-f337376e844b'),
('3b18cf32-9c7c-11ea-9c4a-98e7f48a9bd0', 'b860b0f4-95fb-11ea-b466-98e7f48a9bd0', '6115c510-c362-45e5-a547-5ac0587b9cc6', 'f1209f44-9975-11ea-9f1d-ccb0da7ace87', '2020-05-23', 'Mata pedih ', 'Iritasi mata', 'b1404951-3ad7-11ea-bf25-f337376e844b'),
('451fc6e2-9962-11ea-bc5f-ccb0da7ace87', '818fc9ac-94e8-11ea-9f5e-ccb0da7ace87', 'f6f01787-928d-45d8-bb5a-918686ea4c0c', 'a9b7543a-9958-11ea-9ab7-ccb0da7ace87', '2020-05-01', 'Pusing', 'Capek', 'b1404951-3ad7-11ea-bf25-f337376e844b'),
('4c8ca46a-a10d-11ea-b9a4-ccb0da7ace87', '818f7998-94e8-11ea-93e6-ccb0da7ace87', 'ce241296-e93f-42d4-8002-a1cbccf2df87', '1b94ed58-9600-11ea-9841-98e7f48a9bd0', '2020-05-28', '<p><strong>Gusi bengkak</strong></p>\r\n', '<p><em>Kurang vitamin</em></p>\r\n', '9acab57a-9a0f-4149-8592-dea6b314e99d'),
('4d241944-9965-11ea-9425-ccb0da7ace87', 'b8606cc0-95fb-11ea-98dc-98e7f48a9bd0', '0427d1d3-e984-4851-8783-e89312ee7407', '1b94ed58-9600-11ea-9841-98e7f48a9bd0', '2020-05-04', 'Gigi tidak rapi', 'Pasang begel', '0c9d6fc5-3ad8-11ea-bf25-f337376e844b'),
('5400b1c4-9874-11ea-aaff-ccb0da7ace87', '818fd3de-94e8-11ea-a70b-ccb0da7ace87', 'e7b6ddd2-dd13-4e70-942f-db567f5c70b4', '1b94ed58-9600-11ea-9841-98e7f48a9bd0', '2020-05-17', 'Sakit gigi', 'Kurang vit', 'b1404951-3ad7-11ea-bf25-f337376e844b'),
('54dc64ec-9c7c-11ea-89a3-98e7f48a9bd0', 'b8606cc0-95fb-11ea-98dc-98e7f48a9bd0', 'ce241296-e93f-42d4-8002-a1cbccf2df87', '1b94ed58-9600-11ea-9841-98e7f48a9bd0', '2020-05-23', 'Gigi ngilu bekas begel', 'Kurang bersih ', 'b1404951-3ad7-11ea-bf25-f337376e844b'),
('5de00c00-9962-11ea-bdd2-ccb0da7ace87', 'b860db1a-95fb-11ea-bd7b-98e7f48a9bd0', 'f6f01787-928d-45d8-bb5a-918686ea4c0c', 'a9b7543a-9958-11ea-9ab7-ccb0da7ace87', '2020-05-07', 'Sakit perut', 'DIare', 'b1404951-3ad7-11ea-bf25-f337376e844b'),
('5f1772ae-9965-11ea-ba8d-ccb0da7ace87', 'b860b0f4-95fb-11ea-b466-98e7f48a9bd0', 'ce241296-e93f-42d4-8002-a1cbccf2df87', 'a9b7543a-9958-11ea-9ab7-ccb0da7ace87', '2020-05-06', 'Men sakit', 'KUrang darah', '0c9d6fc5-3ad8-11ea-bf25-f337376e844b'),
('6dbc0e18-99ed-11ea-a18e-98e7f48a9bd0', 'b85ffc5e-95fb-11ea-90f3-98e7f48a9bd0', 'ce241296-e93f-42d4-8002-a1cbccf2df87', 'f1209f44-9975-11ea-9f1d-ccb0da7ace87', '2020-05-14', 'Mata merah', 'Iritasi debu', 'b1404951-3ad7-11ea-bf25-f337376e844b'),
('7883bfca-9962-11ea-ab8c-ccb0da7ace87', '818fd3de-94e8-11ea-a70b-ccb0da7ace87', 'ce241296-e93f-42d4-8002-a1cbccf2df87', 'a9b7543a-9958-11ea-9ab7-ccb0da7ace87', '2020-05-13', 'Sakit perut atas', 'Infeksi lambung', 'b1404951-3ad7-11ea-bf25-f337376e844b'),
('89d6207e-9962-11ea-b875-ccb0da7ace87', 'b85ffc5e-95fb-11ea-90f3-98e7f48a9bd0', '6115c510-c362-45e5-a547-5ac0587b9cc6', 'a9b7543a-9958-11ea-9ab7-ccb0da7ace87', '2020-05-16', 'Sering Mual', 'Hamil Muda', 'b1404951-3ad7-11ea-bf25-f337376e844b'),
('9e6ceb30-9962-11ea-b8a6-ccb0da7ace87', 'b860b0f4-95fb-11ea-b466-98e7f48a9bd0', '6115c510-c362-45e5-a547-5ac0587b9cc6', '1b94ed58-9600-11ea-9841-98e7f48a9bd0', '2020-04-29', 'Sering Pusing', 'Kurang darah', 'b1404951-3ad7-11ea-bf25-f337376e844b'),
('bdb41cca-99e9-11ea-a6a8-98e7f48a9bd0', 'b860c760-95fb-11ea-993b-98e7f48a9bd0', '42401cb2-aae4-4d92-a618-2efd9af79e6d', 'a9b7543a-9958-11ea-9ab7-ccb0da7ace87', '2020-05-01', 'Sakit punggung', 'Urat kejepit', '0c9d6fc5-3ad8-11ea-bf25-f337376e844b'),
('d55bd282-9962-11ea-8bce-ccb0da7ace87', 'b860e31c-95fb-11ea-b245-98e7f48a9bd0', '7cf84a93-86c9-4729-b494-4efa6334ce6a', 'a993d2b2-9958-11ea-b74e-ccb0da7ace87', '2020-05-19', 'Sakit mata', 'Mata minus', 'b1404951-3ad7-11ea-bf25-f337376e844b'),
('e47d8c9c-9962-11ea-bf3c-ccb0da7ace87', 'b860c760-95fb-11ea-993b-98e7f48a9bd0', '6115c510-c362-45e5-a547-5ac0587b9cc6', 'a9b7543a-9958-11ea-9ab7-ccb0da7ace87', '2020-05-19', 'Kulit alergi', 'Alergi ayam', 'b1404951-3ad7-11ea-bf25-f337376e844b'),
('fc50c8de-99e9-11ea-a169-98e7f48a9bd0', '818f7998-94e8-11ea-93e6-ccb0da7ace87', 'ce241296-e93f-42d4-8002-a1cbccf2df87', '1b94ed58-9600-11ea-9841-98e7f48a9bd0', '2020-05-19', 'Sakit gusi', 'Kurang makan buah', 'b1404951-3ad7-11ea-bf25-f337376e844b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(3) NOT NULL,
  `title` varchar(20) NOT NULL,
  `url` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `title`, `url`, `is_active`) VALUES
(1, 'Dashboard', 'dashboard', 1),
(2, 'Data Pasien', 'pasien', 1),
(3, 'Data Dokter', 'dokter', 1),
(4, 'Data Obat', 'obat', 1),
(5, 'Data Poliklinik', 'poli', 1),
(6, 'Data Medis', 'medis', 1),
(7, 'User Management', 'user', 1),
(8, 'Menu Management', 'menu', 1),
(9, 'Ubah Password', 'password', 1),
(10, 'Role Management', 'role', 1),
(14, 'Home', 'home', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `ket_obat` text NOT NULL,
  `stok` int(5) NOT NULL,
  `unit` enum('tablet','kapsul','botol','box','kantong','lembar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `ket_obat`, `stok`, `unit`) VALUES
('69c7db23-d491-4327-bb51-54a110f8a41d', 'Antibotik', 'Obat anti kuman', 400, 'kapsul'),
('6ece8ecd-aae2-4ca6-b9df-ebe44ed31ae7', 'Oskadon', 'Puyeng', 200, 'lembar'),
('754e2297-7709-4dd1-ace4-900002fcdc10', 'Ambeven', 'Obat Ambien', 50, 'tablet'),
('77e41edf-43e6-4c01-a985-349711360968', 'Diapet', 'Obat sakit perut', 40, 'lembar'),
('86dd1e24-2aeb-41d7-a1a1-5dd56b4d49e6', 'Infus', 'Untuk penambah nutrisi pasien', 200, 'kantong'),
('8c513b03-94a7-429d-9c89-6e5393f718f1', 'Vitamin C', 'Daya tahan', 125, 'tablet'),
('8f7c20d8-73c2-43db-9eb6-aa43f64c2fc8', 'Bodrexinin', 'Obat anak', 150, 'botol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `nomor_identitas` varchar(20) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `nomor_identitas`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
('818f7998-94e8-11ea-93e6-ccb0da7ace87', 'Arina Sabila Hanifa', '987634', 'Perempuan', 'Curug Kulon', '05781452369'),
('818fc9ac-94e8-11ea-9f5e-ccb0da7ace87', 'Susanto', '987636', 'Laki-laki', 'Curug Kulon', '085717396839'),
('818fd3de-94e8-11ea-a70b-ccb0da7ace87', 'Rizki Lestari Basyori', '987637', 'Laki-laki', 'Curug Kulon', '085861282412'),
('b85ffc5e-95fb-11ea-90f3-98e7f48a9bd0', 'Nadia', '987634', 'Laki-laki', 'Curug Kulon', '05781452369'),
('b8606cc0-95fb-11ea-98dc-98e7f48a9bd0', 'Karin', '987635', 'Perempuan', 'Bitung', '085717369'),
('b86085d4-95fb-11ea-893d-98e7f48a9bd0', 'Kanan', '987636', 'Laki-laki', 'Curug', '085717396839'),
('b860b0f4-95fb-11ea-b466-98e7f48a9bd0', 'Sari', '987638', 'Perempuan', 'Kadu', '08571746398'),
('b860c760-95fb-11ea-993b-98e7f48a9bd0', 'Sesil', '987640', 'Perempuan', 'Klaten', '0857179325'),
('b860db1a-95fb-11ea-bd7b-98e7f48a9bd0', 'Syarif', '987642', 'Laki-laki', 'Cikoneng', '02165896'),
('b860e31c-95fb-11ea-b245-98e7f48a9bd0', 'Randy', '987643', 'Laki-laki', 'Jatiuwung', '0859632145');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poliklinik`
--

CREATE TABLE `poliklinik` (
  `id_poli` varchar(50) NOT NULL,
  `nama_poli` varchar(20) NOT NULL,
  `gedung` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poliklinik`
--

INSERT INTO `poliklinik` (`id_poli`, `nama_poli`, `gedung`) VALUES
('1b94ed58-9600-11ea-9841-98e7f48a9bd0', 'Poli Gigi', 'Gedung Utama Lt.2'),
('1b9e936c-9600-11ea-8112-98e7f48a9bd0', 'Poli Jantung', 'Gedung 2 Lt.1'),
('a993d2b2-9958-11ea-b74e-ccb0da7ace87', 'Poli THT', 'Gedung Utama Lt.1'),
('a9b7543a-9958-11ea-9ab7-ccb0da7ace87', 'Poli Umum', 'Gedung Utama Lt.3'),
('b2279024-95f4-11ea-a38c-98e7f48a9bd0', 'Poli Paru', 'Gd.2 Lt.3'),
('f1209f44-9975-11ea-9f1d-ccb0da7ace87', 'Poli Mata', 'Gedung Utama Lt.1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `role` int(3) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_user`, `role`, `password`, `status`) VALUES
('0c9d6fc5-3ad8-11ea-bf25-f337376e844b', 'ahsan', 'Ahmad Susanto', 1, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
('792f1eb4-c844-4948-a5e2-2ac270abafca', 'kikielbe', 'Kiki Elbe', 2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
('9acab57a-9a0f-4149-8592-dea6b314e99d', 'amira', 'Amira Khairunnisa', 3, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
('b1404951-3ad7-11ea-bf25-f337376e844b', 'admin', 'Administrator', 1, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_acces`
--

CREATE TABLE `user_acces` (
  `id_access` int(20) NOT NULL,
  `id_role` int(3) NOT NULL,
  `id_menu` int(3) NOT NULL,
  `create_data` int(1) DEFAULT NULL,
  `update_data` int(1) DEFAULT NULL,
  `delete_data` int(1) DEFAULT NULL,
  `import_data` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_acces`
--

INSERT INTO `user_acces` (`id_access`, `id_role`, `id_menu`, `create_data`, `update_data`, `delete_data`, `import_data`) VALUES
(217, 1, 1, NULL, NULL, NULL, NULL),
(218, 1, 2, 1, 1, 1, 1),
(219, 1, 3, 1, 1, 1, 1),
(220, 1, 4, 1, 1, 1, 1),
(221, 1, 5, 1, 1, 1, 1),
(222, 1, 6, 1, 1, 1, 1),
(223, 1, 7, NULL, NULL, NULL, NULL),
(224, 1, 8, NULL, NULL, NULL, NULL),
(225, 1, 9, NULL, NULL, NULL, NULL),
(226, 1, 10, NULL, NULL, NULL, NULL),
(314, 2, 2, 1, 1, NULL, NULL),
(315, 2, 3, 1, 1, NULL, NULL),
(316, 2, 4, 1, 1, NULL, NULL),
(317, 2, 5, 1, 1, NULL, NULL),
(318, 2, 6, 1, 1, NULL, NULL),
(319, 2, 9, NULL, NULL, NULL, NULL),
(320, 3, 1, NULL, NULL, NULL, NULL),
(321, 3, 2, NULL, NULL, NULL, NULL),
(322, 3, 3, NULL, NULL, NULL, NULL),
(323, 3, 4, NULL, NULL, NULL, NULL),
(324, 3, 5, NULL, NULL, NULL, NULL),
(325, 3, 6, NULL, NULL, NULL, NULL),
(326, 3, 9, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(3) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Administrator'),
(2, 'User'),
(3, 'Management'),
(19, 'Moderator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_obat`
--
ALTER TABLE `detail_obat`
  ADD PRIMARY KEY (`id_rm_obat`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_rm` (`id_medis`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `medis`
--
ALTER TABLE `medis`
  ADD PRIMARY KEY (`id_medis`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role` (`role`) USING BTREE;

--
-- Indeks untuk tabel `user_acces`
--
ALTER TABLE `user_acces`
  ADD PRIMARY KEY (`id_access`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_obat`
--
ALTER TABLE `detail_obat`
  MODIFY `id_rm_obat` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_acces`
--
ALTER TABLE `user_acces`
  MODIFY `id_access` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_obat`
--
ALTER TABLE `detail_obat`
  ADD CONSTRAINT `detail_obat_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `detail_obat_ibfk_2` FOREIGN KEY (`id_medis`) REFERENCES `medis` (`id_medis`);

--
-- Ketidakleluasaan untuk tabel `medis`
--
ALTER TABLE `medis`
  ADD CONSTRAINT `medis_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `medis_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `medis_ibfk_3` FOREIGN KEY (`id_poli`) REFERENCES `poliklinik` (`id_poli`),
  ADD CONSTRAINT `medis_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `user_role` (`id_role`);

--
-- Ketidakleluasaan untuk tabel `user_acces`
--
ALTER TABLE `user_acces`
  ADD CONSTRAINT `user_acces_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_acces_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
