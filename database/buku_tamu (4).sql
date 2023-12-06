-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Nov 2023 pada 03.55
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_tamu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_diri_buku_tamu`
--

CREATE TABLE `data_diri_buku_tamu` (
  `id_tamu` bigint(20) UNSIGNED NOT NULL,
  `nama_tamu` varchar(255) NOT NULL,
  `nik_tamu` varchar(20) DEFAULT NULL,
  `masa_berlaku_ktp` varchar(255) DEFAULT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto_ktp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_surat_1` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_diri_buku_tamu`
--

INSERT INTO `data_diri_buku_tamu` (`id_tamu`, `nama_tamu`, `nik_tamu`, `masa_berlaku_ktp`, `jabatan`, `foto_ktp`, `created_at`, `updated_at`, `id_surat_1`) VALUES
(2, 'Bhara Ayong szdf', '23456785673', 'vdvvrvr', 'fvfvdvd', '', '2023-10-31 20:24:10', '2023-10-31 20:24:10', 0),
(3, 'sfesubfe', '4654567', 'dfgfdrdr', 'dssefefs', '', '2023-10-31 20:26:17', '2023-10-31 20:26:17', 0),
(4, 'rifki', '234567', 'jbchdce', 'asdf', '', '2023-10-31 20:27:59', '2023-10-31 20:27:59', 0),
(5, 'NOPAL', '2345678', 'gdrggrd', 'aswdszas', '', '2023-10-31 21:16:10', '2023-10-31 21:16:10', 0),
(6, 'Bhara Ayong', '2345678', 'gdrggrd', 'aswdszas', '', '2023-10-31 22:43:30', '2023-10-31 22:43:30', 0),
(7, 'Bhara Ayong', '2345678', 'gdrggrd', 'aswdszas', '', '2023-10-31 22:53:40', '2023-10-31 22:53:40', 0),
(8, 'harya', '2345678', 'gdrggrd', 'aswdszas', NULL, '2023-11-01 00:15:37', '2023-11-01 00:15:37', 0),
(9, 'harya22', '2345678', 'gdrggrd', 'aswdszas', NULL, '2023-11-01 00:16:50', '2023-11-01 00:16:50', 0),
(10, 'Bhara Ayong pm', '2345678', 'gdrggrd', 'aswdszas', NULL, '2023-11-01 00:16:50', '2023-11-01 00:16:50', 0),
(11, 'Bhara Ayong pcjn', '2345678', 'gdrggrd', 'aswdszas', NULL, '2023-11-01 00:36:08', '2023-11-01 00:36:08', 0),
(12, 'Bhara Ayong', '2345678', 'gdrggrd', 'aswdszas', NULL, '2023-11-01 00:45:09', '2023-11-01 00:45:09', 0),
(13, 'bismilah coba gambar', '2345678', 'gdrggrd', 'aswdszas', '1698825959.jpg', '2023-11-01 01:05:59', '2023-11-01 01:05:59', 0),
(14, 'rifki', '2345678', 'gdrggrd', 'aswdszas', '1698826228.jpg', '2023-11-01 01:10:28', '2023-11-01 01:10:28', 0),
(15, 'NOPALddsc', '2345678', 'gdrggrd', 'aswdszas', '1698826228.jpg', '2023-11-01 01:10:28', '2023-11-01 01:10:28', 0),
(16, 'Bhara Ayong', '2345678555', 'gdrggrdgg', 'aswdszasrgrg', '1698826443.png', '2023-11-01 01:14:03', '2023-11-01 01:14:03', 0),
(17, 'harya', '2345678', 'gdrggrd', 'aswdszasgegegrege', '1698826443.png', '2023-11-01 01:14:03', '2023-11-01 01:14:03', 0),
(18, 'Bhara Ayong', '2345678', 'gdrggrd', 'aswdszas', '1698828786.jpg', '2023-11-01 01:53:06', '2023-11-01 01:53:06', 0),
(19, 'Bhara Ayong', '2345678', 'gdrggrd', 'aswdszas', '1698828935.png', '2023-11-01 01:55:35', '2023-11-01 01:55:35', 0),
(20, 'Bhara Ayong', '2345678', 'gdrggrd', 'aswdszas', '1698828956.png', '2023-11-01 01:55:56', '2023-11-01 01:55:56', 0),
(21, 'Bhara Ayong pm', '2345678', 'gdrggrd', 'aswdszas', '1698908548.jpg', '2023-11-02 00:02:28', '2023-11-02 00:02:28', 0),
(22, 'Bhara Ayong', '2345678', 'gdrggrd', 'aswdszas', '1698909349.jpg', '2023-11-02 00:15:49', '2023-11-02 00:15:49', 16),
(24, 'NAUFAL', '2345678', 'gdrggrd', 'aswdszas', '1698909885.jpg', '2023-11-02 00:24:45', '2023-11-02 00:24:45', 16),
(26, 'Bhara Ayong', '2345678', 'gdrggrd', 'aswdszas', '1698910846.jpg', '2023-11-02 00:40:46', '2023-11-02 00:40:46', 16),
(27, 'Bhara Ayong', '2345678', 'gdrggrd', 'aswdszas', '1698910888.jpg', '2023-11-02 00:41:28', '2023-11-02 00:41:28', 17),
(28, 'Bhara Ayong efghj', '2345678', 'gdrggrd', 'aswdszas', '1698910930.jpg', '2023-11-02 00:42:10', '2023-11-02 00:42:10', 17),
(29, 'Bhara Ayong', '2345678', 'gdrggrd', 'aswdszas', '1698979372.png', '2023-11-02 19:42:52', '2023-11-02 19:42:52', 17),
(30, 'harya', '2345678', 'gdrggrd', 'aswdszas', '1698979372.png', '2023-11-02 19:42:52', '2023-11-02 19:42:52', 17),
(31, 'Reicha', '2345678', 'Seumur Hidup', 'aswdszas', '1699295004.png', '2023-11-06 11:23:24', '2023-11-06 11:23:24', 22),
(32, 'Bhara Ayong', '2345678', 'Seumur Hidup', 'aswdszas', '1699295004.png', '2023-11-06 11:23:24', '2023-11-06 11:23:24', 22),
(33, 'Bhara Ayong', '2345678', 'Seumur Hidup', 'aswdszas', '1699297454.png', '2023-11-06 12:04:14', '2023-11-06 12:04:14', 25),
(34, 'Reicha', '2345678', 'Seumur Hidup', 'aswdszas', '1699316967.png', '2023-11-06 17:29:27', '2023-11-06 17:29:27', 25),
(35, 'Bhara Ayong', '2345678', 'Seumur Hidup', 'aswdszas', '1699317007.png', '2023-11-06 17:30:07', '2023-11-06 17:30:07', 25),
(36, 'Bhara Ayong', '2345678', 'Seumur Hidup', 'aswdszas', '1699317019.png', '2023-11-06 17:30:19', '2023-11-06 17:30:19', 25),
(37, 'Bhara Ayong', '2345678', 'Seumur Hidup', 'aswdszas', '1699317159.png', '2023-11-06 17:32:39', '2023-11-06 17:32:39', 25),
(38, 'Bhara Ayong', '2345678', 'Seumur Hidup', 'aswewaxds', '1699317656.png', '2023-11-06 17:40:56', '2023-11-06 17:40:56', 25),
(39, 'Bhara Ayong', '2345678', 'Seumur Hidup', 'aswewaxds', '1699318561.png', '2023-11-06 17:56:01', '2023-11-06 17:56:01', 25),
(40, 'Bhara Ayong', '2345678', 'Seumur Hidup', 'aswewaxds', '1699318695.png', '2023-11-06 17:58:15', '2023-11-06 17:58:15', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` bigint(20) UNSIGNED NOT NULL,
  `nilai_feedback` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `id_periode` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan_buku_tamu`
--

CREATE TABLE `kendaraan_buku_tamu` (
  `id_kendaraan` bigint(20) UNSIGNED NOT NULL,
  `pengawalan` tinyint(1) DEFAULT NULL,
  `nama_supir` varchar(255) DEFAULT NULL,
  `masa_berlaku_kir` date DEFAULT NULL,
  `masa_berlaku_sim` date DEFAULT NULL,
  `foto_sim` varchar(255) DEFAULT NULL,
  `foto_kendaraan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_surat_1` bigint(20) UNSIGNED NOT NULL,
  `tipe_mobil` varchar(255) DEFAULT NULL,
  `warna` varchar(255) DEFAULT NULL,
  `nomor_polisi` varchar(255) DEFAULT NULL,
  `masa_berlaku_stnk` varchar(255) DEFAULT NULL,
  `foto_stnk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kendaraan_buku_tamu`
--

INSERT INTO `kendaraan_buku_tamu` (`id_kendaraan`, `pengawalan`, `nama_supir`, `masa_berlaku_kir`, `masa_berlaku_sim`, `foto_sim`, `foto_kendaraan`, `created_at`, `updated_at`, `id_surat_1`, `tipe_mobil`, `warna`, `nomor_polisi`, `masa_berlaku_stnk`, `foto_stnk`) VALUES
(1, NULL, 'SDFGH', '2023-11-02', '2023-11-02', '1698899523_sim.jpg', '1698899523_kendaraan.jpg', '2023-11-01 21:32:03', '2023-11-01 21:32:03', 0, 'aSDFGH', 'SADFG', 'SDFG', '2023-11-03', '1698899523_stnk.jpg'),
(15, NULL, 'ertdyfuio', '2023-11-14', '2023-11-17', '1698976849_sim.png', '1698976849_kendaraan.png', '2023-11-02 19:00:49', '2023-11-02 19:00:49', 16, 'wertyui', 'eretyfugio', 'waerstdyfugiho', '2023-11-16', '1698976849_stnk.png'),
(16, NULL, 'erdtyuiop', '2023-11-28', '2023-11-09', '1698976992_sim.png', '1698976992_kendaraan.png', '2023-11-02 19:03:12', '2023-11-02 19:03:12', 16, 'wqsdefghjk', 'ertdyfuihjo;l\'', 'retyuiop', '2023-11-15', '1698976992_stnk.png'),
(17, NULL, 'esrdtyfgui', '2023-11-14', '2023-11-17', '1698976992_sim.png', '1698976992_kendaraan.png', '2023-11-02 19:03:12', '2023-11-02 19:03:12', 16, 'dfgh', 'erdty', 'dfgtyui', '2023-11-09', '1698976992_stnk.png'),
(18, NULL, 'wertyuiop', '2023-11-29', '2023-11-25', '1698977612_sim.png', '1698977612_kendaraan.png', '2023-11-02 19:13:32', '2023-11-02 19:13:32', 16, 'wertyu', 'ertyui', 'ertyuio', '2023-11-17', '1698977612_stnk.png'),
(19, NULL, 'wertyuiop', '2023-11-29', '2023-11-25', '1698977749_sim.png', '1698977749_kendaraan.png', '2023-11-02 19:15:50', '2023-11-02 19:15:50', 16, 'wertyu', 'ertyui', 'ertyuio', '2023-11-17', '1698977749_stnk.png'),
(20, NULL, 'harya', '2023-11-16', '2023-11-18', '1698979695_sim.png', '1698979695_kendaraan.png', '2023-11-02 19:48:15', '2023-11-02 19:48:15', 17, 'avanza', 'merah', 'b 1090', '2023-11-16', '1698979695_stnk.png'),
(21, NULL, 'rifki', '2023-11-16', '2023-11-18', '1698979695_sim.jpg', '1698979695_kendaraan.png', '2023-11-02 19:48:15', '2023-11-02 19:48:15', 17, 'pajero', 'hitam', 'BH 4 RA', '2023-11-16', '1698979695_stnk.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_tujuan`
--

CREATE TABLE `lokasi_tujuan` (
  `id_lokasi` bigint(20) UNSIGNED NOT NULL,
  `nama_lokasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lokasi_tujuan`
--

INSERT INTO `lokasi_tujuan` (`id_lokasi`, `nama_lokasi`, `created_at`, `updated_at`) VALUES
(1, 'Kantor MCTN Jakarta', '2023-10-26 00:41:08', '2023-10-26 00:41:08'),
(2, 'Kantor MCTN Pekanbaru', '2023-10-26 00:41:08', '2023-10-26 00:41:08'),
(3, 'Ladang Minyak Duri MCTN', '2023-10-26 00:41:08', '2023-10-26 00:41:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_26_020424_create_role_table', 1),
(6, '2023_10_26_021637_modify_users_table', 2),
(7, '2023_10_26_025228_create_status_surat_table', 3),
(8, '2023_10_26_025557_create_periode_tamu_table', 4),
(9, '2023_10_26_025822_create_lokasi_tujuan_table', 5),
(10, '2023_10_26_031701_create_surat_1_buku_tamu_table', 6),
(11, '2023_10_26_040838_create_data_diri_buku_tamu_table', 7),
(12, '2023_10_26_041233_create_mobil_table', 8),
(13, '2023_10_26_041539_create_kendaraan_buku_tamu_table', 9),
(14, '2023_10_26_045251_create_surat_2_buku_tamu_duri_table', 10),
(15, '2023_10_26_063702_add_id_surat_1_to_data_diri_buku_tamu', 11),
(16, '2023_10_26_064152_create_surat_2_buku_tamu', 12),
(17, '2023_10_26_064607_create_feedback_table', 13),
(18, '2023_10_30_024939_add_alasan_surat1_to_surat_1_buku_tamu', 14),
(19, '2023_10_31_024454_add_id_surat1_to_mobil', 15),
(20, '2023_10_31_024744_add_id_surat1_to_kendaraan_buku_tamu', 16),
(21, '2023_11_02_031049_add_columns_to_kendaraan_buku_tamu_table', 17),
(22, '2023_11_03_144548_add_alasan_surat2_to_surat_2_buku_tamu_duri_table', 18),
(23, '2023_11_05_160535_add_pengawalan_to_surat_1_buku_tamu_table', 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` bigint(20) UNSIGNED NOT NULL,
  `tipe_mobil` varchar(255) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `nomor_polisi` varchar(20) DEFAULT NULL,
  `masa_berlaku_stnk` date DEFAULT NULL,
  `foto_stnk` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_surat_1` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode_tamu`
--

CREATE TABLE `periode_tamu` (
  `id_periode` bigint(20) UNSIGNED NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jam_kedatangan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `periode_tamu`
--

INSERT INTO `periode_tamu` (`id_periode`, `tanggal_masuk`, `tanggal_keluar`, `jam_kedatangan`, `created_at`, `updated_at`) VALUES
(1, '2023-10-27', '2023-10-27', '2023-10-27 03:35:00', '2023-10-26 19:35:02', '2023-10-26 19:35:02'),
(2, '2023-10-27', '2023-10-27', '2023-10-27 03:35:00', '2023-10-26 19:57:36', '2023-10-26 19:57:36'),
(3, '2023-10-27', '2023-10-27', '2023-10-27 03:35:00', '2023-10-26 20:01:09', '2023-10-26 20:01:09'),
(4, '2023-10-27', '2023-10-27', '2023-10-27 03:35:00', '2023-10-26 20:05:08', '2023-10-26 20:05:08'),
(5, '2023-10-27', '2023-10-27', '2023-10-27 03:35:00', '2023-10-26 20:07:21', '2023-10-26 20:07:21'),
(6, '2023-10-27', '2023-10-27', '2023-10-27 03:35:00', '2023-10-26 20:09:08', '2023-10-26 20:09:08'),
(7, '2023-10-27', '2023-10-27', '2023-10-27 03:35:00', '2023-10-26 20:12:08', '2023-10-26 20:12:08'),
(8, '2023-11-02', '2023-11-11', '2023-10-27 03:35:00', '2023-10-26 20:13:57', '2023-10-26 20:13:57'),
(9, '2023-11-02', '2023-11-11', '2023-10-27 03:35:00', '2023-10-26 20:24:38', '2023-10-26 20:24:38'),
(10, '2023-11-02', '2023-11-11', '2023-10-27 03:35:00', '2023-10-26 20:31:12', '2023-10-26 20:31:12'),
(11, '2023-10-20', '2023-10-27', '2023-10-27 04:35:00', '2023-10-26 20:35:06', '2023-10-26 20:35:06'),
(12, '2023-10-20', '2023-10-27', '2023-10-27 04:35:00', '2023-10-26 20:42:46', '2023-10-26 20:42:46'),
(13, '2023-10-20', '2023-10-27', '2023-10-27 04:35:00', '2023-10-26 20:45:44', '2023-10-26 20:45:44'),
(14, '2023-10-12', '2023-10-28', '2023-10-27 08:27:00', '2023-10-27 00:27:21', '2023-10-27 00:27:21'),
(15, '2023-10-30', '2023-10-20', '2023-10-30 05:31:00', '2023-10-29 21:31:03', '2023-10-29 21:31:03'),
(16, '2023-10-30', '2023-10-20', '2023-10-30 05:31:00', '2023-10-29 21:31:34', '2023-10-29 21:31:34'),
(17, '2023-10-13', '2023-10-11', '2023-10-30 08:24:00', '2023-10-30 00:24:30', '2023-10-30 00:24:30'),
(18, '2023-10-12', '2023-10-12', '2023-10-30 09:39:00', '2023-10-30 00:37:36', '2023-10-30 00:37:36'),
(19, '2023-10-30', '2023-10-30', '2023-10-30 09:07:00', '2023-10-30 02:07:52', '2023-10-30 02:07:52'),
(20, '2023-10-11', '2023-10-29', '2023-10-30 11:14:00', '2023-10-30 02:12:49', '2023-10-30 02:12:49'),
(21, '2023-10-07', '2023-10-17', '2023-10-30 09:17:00', '2023-10-30 02:15:06', '2023-10-30 02:15:06'),
(22, '2023-10-19', '2023-10-26', '2023-10-30 16:51:00', '2023-10-30 07:49:14', '2023-10-30 07:49:14'),
(23, '2023-10-20', '2023-10-19', '2023-10-31 08:51:00', '2023-10-31 00:50:41', '2023-10-31 00:50:41'),
(24, '2023-11-15', '2023-11-23', '2023-11-02 10:12:00', '2023-11-01 23:09:23', '2023-11-01 23:09:23'),
(25, '2023-11-16', '2023-11-16', '2023-11-02 06:19:00', '2023-11-01 23:13:50', '2023-11-01 23:13:50'),
(26, '2023-11-16', '2023-11-16', '2023-11-02 06:19:00', '2023-11-01 23:32:42', '2023-11-01 23:32:42'),
(27, '2023-11-16', '2023-11-16', '2023-11-02 06:19:00', '2023-11-01 23:33:50', '2023-11-01 23:33:50'),
(28, '2023-11-16', '2023-11-16', '2023-11-02 06:19:00', '2023-11-01 23:34:28', '2023-11-01 23:34:28'),
(29, '2023-11-16', '2023-11-23', '2023-11-03 05:39:00', '2023-11-02 19:36:45', '2023-11-02 19:36:45'),
(30, '2023-11-22', '2023-11-23', '2023-11-03 03:25:00', '2023-11-02 20:21:15', '2023-11-02 20:21:15'),
(31, '2023-11-10', '2023-11-30', '2023-11-05 19:06:00', '2023-11-06 10:02:51', '2023-11-06 10:02:51'),
(32, '2023-11-10', '2023-11-30', '2023-11-05 19:06:00', '2023-11-06 10:34:02', '2023-11-06 10:34:02'),
(33, '2023-11-10', '2023-11-30', '2023-11-05 19:06:00', '2023-11-06 10:42:35', '2023-11-06 10:42:35'),
(34, '2023-11-10', '2023-11-30', '2023-11-05 19:06:00', '2023-11-06 11:05:09', '2023-11-06 11:05:09'),
(35, '2023-11-30', '2023-11-30', '2023-11-05 19:00:00', '2023-11-06 11:59:13', '2023-11-06 11:59:13'),
(36, '2023-11-30', '2023-11-30', '2023-11-05 19:00:00', '2023-11-06 12:00:28', '2023-11-06 12:00:28'),
(37, '2023-11-30', '2023-11-30', '2023-11-05 19:00:00', '2023-11-06 12:01:59', '2023-11-06 12:01:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `nama_role` varchar(255) NOT NULL,
  `keterangan_role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `nama_role`, `keterangan_role`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'Administrator', '2023-10-26 00:37:59', '2023-10-26 00:37:59'),
(2, 'admin_jkt', 'Admin Jakarta', '2023-10-26 00:37:59', '2023-10-26 00:37:59'),
(3, 'tuan_rumah', 'Tuan Rumah', '2023-10-26 00:37:59', '2023-10-26 00:37:59'),
(4, 'phr', 'PHR', '2023-10-26 00:37:59', '2023-10-26 00:37:59'),
(5, 'admin_duri', 'Admin Duri', '2023-10-26 00:37:59', '2023-10-26 00:37:59'),
(6, 'security', 'Security', '2023-10-26 00:37:59', '2023-10-26 00:37:59'),
(7, 'admin_pku', 'Admin Pekanbaru', '2023-10-26 00:37:59', '2023-10-26 00:37:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_surat`
--

CREATE TABLE `status_surat` (
  `id_status_surat` bigint(20) UNSIGNED NOT NULL,
  `nama_status_surat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_surat`
--

INSERT INTO `status_surat` (`id_status_surat`, `nama_status_surat`, `created_at`, `updated_at`) VALUES
(1, 'Menunggu Persetujuan', '2023-10-26 19:57:00', '2023-10-26 19:57:00'),
(2, 'Disetujui', '2023-10-26 19:57:00', '2023-10-26 19:57:00'),
(3, 'Ditolak', '2023-10-26 19:57:00', '2023-10-26 19:57:00'),
(4, ' Menunggu Persetujuan PHR', '2023-10-26 19:57:00', '2023-10-26 19:57:00'),
(5, 'Ditolak PHR', '2023-10-26 19:57:00', '2023-10-26 19:57:00'),
(6, 'Menunggu Persetujuan Admin', '2023-10-26 19:57:00', '2023-10-26 19:57:00'),
(7, 'Ditolak Admin', '2023-10-26 19:57:00', '2023-10-26 19:57:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_1_buku_tamu`
--

CREATE TABLE `surat_1_buku_tamu` (
  `id_surat_1` bigint(20) UNSIGNED NOT NULL,
  `id_lokasi` bigint(20) UNSIGNED NOT NULL,
  `id_periode` bigint(20) UNSIGNED NOT NULL,
  `id_status_surat` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_tamu` varchar(255) NOT NULL,
  `asal_perusahaan` varchar(255) NOT NULL,
  `email_tamu` varchar(255) NOT NULL,
  `no_hp_tamu` int(11) NOT NULL,
  `tujuan_keperluan` varchar(255) DEFAULT NULL,
  `nama_pic` varchar(255) NOT NULL,
  `email_pic` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alasan_surat1` varchar(255) DEFAULT NULL,
  `pengawalan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat_1_buku_tamu`
--

INSERT INTO `surat_1_buku_tamu` (`id_surat_1`, `id_lokasi`, `id_periode`, `id_status_surat`, `id_user`, `nama_tamu`, `asal_perusahaan`, `email_tamu`, `no_hp_tamu`, `tujuan_keperluan`, `nama_pic`, `email_pic`, `created_at`, `updated_at`, `alasan_surat1`, `pengawalan`) VALUES
(3, 1, 13, 2, NULL, 'harya', 'PT BANGKIT', 'palsms@gmail.com', 123456, 'azesxdcfvgbhnjmk,l', 'bhara', 'kanaosatu@gmail.com', '2023-10-26 20:45:44', '2023-10-29 20:45:53', 'gas', ''),
(4, 1, 14, 3, NULL, 'NOPAL', 'PT BANGKIT', 'palsms@gmail.com', 123456, 'qwertyuiolp;[', 'bhara', 'kanaosatu@gmail.com', '2023-10-27 00:27:21', '2023-10-29 20:48:42', 'jelek mas', ''),
(5, 1, 16, 2, NULL, 'obidc', 'PT BANGKIT', 'palsms@gmail.com', 123456, '234567', 'bhara', 'kanaosatu@gmail.com', '2023-10-29 21:31:34', '2023-10-29 21:32:23', '2345678', ''),
(6, 1, 17, 2, NULL, 'Bhara Ayong', 'PT BANGKIT', 'palsms@gmail.com', 123456, 'wqertyuiop', 'bhara', 'kanaosatu@gmail.com', '2023-10-30 00:24:30', '2023-10-30 00:25:03', 'ghjk', ''),
(7, 1, 18, 2, NULL, 'Bhara Ayong', 'PT BANGKIT', 'rifqiakmal2001@gmail.com', 123456, 'wsedrftgyhujiko', 'bhara', 'kanaosatu@gmail.com', '2023-10-30 00:37:36', '2023-10-30 00:37:57', 'wertyui', ''),
(8, 1, 19, 2, NULL, 'Bhara Ayong', 'PT BANGKIT', 'rifqiakmal2001@gmail.com', 123456, 'wertyuiop[]', 'bhara', 'kanaosatu@gmail.com', '2023-10-30 02:07:52', '2023-10-30 02:08:30', 'sdfghjkl', ''),
(9, 1, 20, 2, NULL, 'Bhara Ayong', 'PT BANGKIT', 'rifqiakmal2001@gmail.com', 123456, 'aswdertyuiop[', 'bhara', 'kanaosatu@gmail.com', '2023-10-30 02:12:49', '2023-10-30 02:13:03', 'wertgyhuio', ''),
(10, 1, 21, 2, NULL, 'Bhara Ayong', 'PT BANGKIT', 'rifqiakmal2001@gmail.com', 123456, 'sdfghjki', 'bhara', 'kanaosatu@gmail.com', '2023-10-30 02:15:06', '2023-11-05 23:38:18', 'asdfghjukil;', 'Ya'),
(11, 1, 22, 1, NULL, 'Bhara Ayong', 'PT BANGKIT', 'palsms@gmail.com', 123456, '2rtrt', 'bhara', 'rifqiakmal2001@gmail.com', '2023-10-30 07:49:14', '2023-10-30 07:49:14', NULL, ''),
(12, 1, 23, 1, NULL, 'Bhara Ayong', 'PT BANGKIT', 'rifqiakmal2001@gmail.com', 3555, 'ertyuio', 'bhara', 'rifqiakmal2001@gmail.com', '2023-10-31 00:50:41', '2023-10-31 00:50:41', NULL, ''),
(13, 3, 25, 1, NULL, 'NAUFAL', 'PT BANGKIT', 'mangangmctn@gmail.com', 123456, 'azesxrdctfvygbhunijmk,lp.;', 'bhara', 'mangangmctn@gmail.com', '2023-11-01 23:13:50', '2023-11-01 23:13:50', NULL, ''),
(14, 3, 26, 1, NULL, 'NAUFAL', 'PT BANGKIT', 'mangangmctn@gmail.com', 123456, 'azesxrdctfvygbhunijmk,lp.;dfghjhbgf', 'bhara', 'mangangmctn@gmail.com', '2023-11-01 23:32:42', '2023-11-01 23:32:42', NULL, ''),
(15, 3, 27, 1, NULL, 'NAUFALww', 'PT BANGKIT', 'mangangmctn@gmail.com', 123456, 'azesxrdctfvygbhunijmk,lp.;dfghjhbgf', 'bhara', 'mangangmctn@gmail.com', '2023-11-01 23:33:50', '2023-11-01 23:33:50', NULL, ''),
(16, 3, 28, 2, NULL, 'NAUFALwwwww', 'PT BANGKIT', 'mangangmctn@gmail.com', 123456, 'azesxrdctfvygbhunijmk,lp.;dfghjhbgfww', 'bhara', 'mangangmctn@gmail.com', '2023-11-01 23:34:28', '2023-11-01 23:51:44', 'hbjkl;', ''),
(17, 3, 29, 2, NULL, 'Bhara Ayong PM', 'PT BANGKIT', 'mangangmctn@gmail.com', 123456, 'wertyuiop', 'bhara', 'mangangmctn@gmail.com', '2023-11-02 19:36:45', '2023-11-05 19:05:49', 'dsfebfueufeuf', 'Ya'),
(18, 3, 30, 2, NULL, 'Bhara Ayong', 'PT BANGKIT', 'mangangmctn@gmail.com', 123456, 'werftgyhujikolp;[\'', 'bhara', 'mangangmctn@gmail.com', '2023-11-02 20:21:15', '2023-11-03 02:35:21', 'seamat dtang', ''),
(19, 2, 31, 1, NULL, 'Bhara Ayong', 'PT PLN PERSERO PUSAT', 'mangangmctn@gmail.com', 123456, 'thhthred', 'bhara', 'mangangmctn@gmail.com', '2023-11-06 10:02:51', '2023-11-06 10:02:51', NULL, NULL),
(20, 1, 32, 1, NULL, 'Reicha', 'PT PLN PERSERO PUSAT', 'mangangmctn@gmail.com', 123456, 'thhthred', 'bhara', 'mangangmctn@gmail.com', '2023-11-06 10:34:02', '2023-11-06 10:34:02', NULL, NULL),
(21, 1, 33, 1, NULL, 'Reicha', 'PT PLN PERSERO PUSAT', 'mangangmctn@gmail.com', 123456, 'thhthred', 'bhara', 'mangangmctn@gmail.com', '2023-11-06 10:42:35', '2023-11-06 10:42:35', NULL, NULL),
(22, 1, 34, 2, NULL, 'Reicha', 'PT PLN PERSERO PUSAT', 'mangangmctn@gmail.com', 123456, 'thhthred', 'bhara', 'mangangmctn@gmail.com', '2023-11-06 11:05:09', '2023-11-06 11:13:00', 'gas mabar', NULL),
(23, 1, 35, 1, NULL, 'ANGGA', 'PT BANGKIT', 'mangangmctn@gmail.com', 123456, 'wdawdwadw', 'Bhara Ayong Purna Mustika', 'mangangmctn@gmail.com', '2023-11-06 11:59:13', '2023-11-06 11:59:13', NULL, NULL),
(24, 1, 36, 1, NULL, 'ANGGA', 'PT BANGKIT', 'mangangmctn@gmail.com', 123456, 'wdawdwadw', 'Bhara Ayong Purna Mustika', 'mangangmctn@gmail.com', '2023-11-06 12:00:28', '2023-11-06 12:00:28', NULL, NULL),
(25, 1, 37, 2, NULL, 'ANGGA', 'PT BANGKIT', 'mangangmctn@gmail.com', 123456, 'wdawdwadw', 'Bhara Ayong Purna Mustika', 'mangangmctn@gmail.com', '2023-11-06 12:01:59', '2023-11-06 12:03:44', 'xcacccdf', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_2_buku_tamu`
--

CREATE TABLE `surat_2_buku_tamu` (
  `id_surat_2` bigint(20) UNSIGNED NOT NULL,
  `id_surat_1` bigint(20) UNSIGNED NOT NULL,
  `id_tamu` bigint(20) UNSIGNED DEFAULT NULL,
  `id_ga` bigint(20) UNSIGNED DEFAULT NULL,
  `id_status_surat` bigint(20) UNSIGNED NOT NULL,
  `id_lokasi` bigint(20) UNSIGNED DEFAULT NULL,
  `id_periode` bigint(20) UNSIGNED DEFAULT NULL,
  `kode_unik` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alasan_surat2` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat_2_buku_tamu`
--

INSERT INTO `surat_2_buku_tamu` (`id_surat_2`, `id_surat_1`, `id_tamu`, `id_ga`, `id_status_surat`, `id_lokasi`, `id_periode`, `kode_unik`, `created_at`, `updated_at`, `alasan_surat2`) VALUES
(1, 25, NULL, NULL, 2, NULL, NULL, 'MCTN2023110725', '2023-11-06 17:58:15', '2023-11-06 18:32:06', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_2_buku_tamu_duri`
--

CREATE TABLE `surat_2_buku_tamu_duri` (
  `id_surat_2_duri` bigint(20) UNSIGNED NOT NULL,
  `id_surat_1` bigint(20) UNSIGNED NOT NULL,
  `id_kendaraan` bigint(20) UNSIGNED DEFAULT NULL,
  `id_tamu` bigint(20) UNSIGNED DEFAULT NULL,
  `id_phr` bigint(20) UNSIGNED DEFAULT NULL,
  `id_ga_duri` bigint(20) UNSIGNED DEFAULT NULL,
  `id_status_surat` bigint(20) UNSIGNED NOT NULL,
  `id_lokasi` bigint(20) UNSIGNED DEFAULT NULL,
  `id_periode` bigint(20) UNSIGNED DEFAULT NULL,
  `kode_unik` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alasan_surat2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat_2_buku_tamu_duri`
--

INSERT INTO `surat_2_buku_tamu_duri` (`id_surat_2_duri`, `id_surat_1`, `id_kendaraan`, `id_tamu`, `id_phr`, `id_ga_duri`, `id_status_surat`, `id_lokasi`, `id_periode`, `kode_unik`, `created_at`, `updated_at`, `alasan_surat2`) VALUES
(1, 16, NULL, NULL, 4, NULL, 6, NULL, NULL, 'MCTN2023110316', '2023-11-02 19:15:50', '2023-11-06 01:33:37', NULL),
(2, 17, NULL, NULL, 4, NULL, 2, NULL, NULL, 'MCTN2023110317', '2023-11-02 19:48:15', '2023-11-04 17:06:57', NULL),
(3, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 21:38:54', '2023-11-05 21:38:54', NULL),
(4, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 21:41:16', '2023-11-05 21:41:16', NULL),
(5, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 21:44:04', '2023-11-05 21:44:04', NULL),
(6, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 21:51:18', '2023-11-05 21:51:18', NULL),
(7, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 21:51:28', '2023-11-05 21:51:28', NULL),
(8, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 21:53:57', '2023-11-05 21:53:57', NULL),
(9, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 21:55:58', '2023-11-05 21:55:58', NULL),
(10, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 21:56:24', '2023-11-05 21:56:24', NULL),
(11, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 21:57:20', '2023-11-05 21:57:20', NULL),
(12, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 21:58:11', '2023-11-05 21:58:11', NULL),
(13, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 21:58:57', '2023-11-05 21:58:57', NULL),
(14, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 21:59:07', '2023-11-05 21:59:07', NULL),
(15, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 22:03:48', '2023-11-05 22:03:48', NULL),
(16, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 22:06:06', '2023-11-05 22:06:06', NULL),
(17, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 22:08:00', '2023-11-05 22:08:00', NULL),
(18, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 22:08:08', '2023-11-05 22:08:08', NULL),
(19, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 22:08:23', '2023-11-05 22:08:23', NULL),
(20, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 22:08:40', '2023-11-05 22:08:40', NULL),
(21, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 23:11:47', '2023-11-05 23:11:47', NULL),
(22, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 23:26:58', '2023-11-05 23:26:58', NULL),
(23, 17, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110617', '2023-11-05 23:28:58', '2023-11-05 23:28:58', NULL),
(25, 10, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110610', '2023-11-05 23:29:51', '2023-11-05 23:29:51', NULL),
(26, 10, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110610', '2023-11-05 23:32:10', '2023-11-05 23:32:10', NULL),
(27, 10, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110610', '2023-11-05 23:37:56', '2023-11-05 23:37:56', NULL),
(28, 10, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110610', '2023-11-05 23:41:52', '2023-11-05 23:41:52', NULL),
(29, 10, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110610', '2023-11-05 23:44:03', '2023-11-05 23:44:03', NULL),
(30, 10, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110610', '2023-11-06 00:02:44', '2023-11-06 00:02:44', NULL),
(31, 10, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110610', '2023-11-06 00:02:45', '2023-11-06 00:02:45', NULL),
(32, 10, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110610', '2023-11-06 00:06:15', '2023-11-06 00:06:15', NULL),
(33, 14, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110614', '2023-11-06 02:04:39', '2023-11-06 02:04:39', NULL),
(34, 22, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110622', '2023-11-06 11:33:26', '2023-11-06 11:33:26', NULL),
(35, 25, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'MCTN2023110725', '2023-11-06 17:32:39', '2023-11-06 17:32:39', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `id_role`) VALUES
(1, 'Mangang MCTN', 'mangangmctn@gmail.com', '2023-10-26 21:35:05', '0', 'aU0b6suyoIBLjWwmogH4gHDw0lNhitJJd5E4VDKu0LRt0SndSSfub938tPkY', '2023-10-26 21:35:05', '2023-10-26 21:35:05', 3),
(2, 'Kanao Satu', 'kanaosatu@gmail.com', '2023-10-31 20:22:14', '0', 'wqoKVQnK4Ef6t0j8037S0mR7TvFidt2X6ml0R44OszIkWQ7rcposv12rtCFi', '2023-10-31 20:22:14', '2023-10-31 20:22:14', 5),
(3, 'Alex', 'rifqiakmal2001@gmail.com', NULL, '$2y$10$tfBOwox1KBBr6UijqEE3kO3z4PpeWz3.RASonPsUEFuD23/b7YJwK', NULL, '2023-11-03 02:19:52', '2023-11-03 02:19:52', 3),
(4, 'harya', 'haryavandika@gmail.com', NULL, '$2y$10$g9kPHzmJArmrhqQxF6t7wei7Qm9adgEqoeD/H5nmD1pgdg0KmihKW', NULL, '2023-11-03 02:20:37', '2023-11-03 02:20:37', 4),
(5, 'zidan', 'dimas@gmail.com', NULL, '$2y$10$bNT.IWaxtiIcu9tMXACujeTDUVaM4ACeN2VBtZABbc8GBreO4Hl66', NULL, '2023-11-06 09:03:04', '2023-11-06 09:03:04', 6),
(6, 'Admin JKT', 'adminjkt@gmail.com', NULL, '$2y$10$tkQhYxDzIyIdmQwYnS8oo.gUWAag4d2rbFECmBCUden1xGh71w5Pe', NULL, '2023-11-06 17:37:57', '2023-11-06 17:37:57', 2),
(7, 'adminpku', 'adminpku@gmail.com', NULL, '$2y$10$OeG.uLklOGmBhNx5ykqkTeErvtevlufDbJYbvpRiEps7zLlvKiBhW', NULL, '2023-11-06 17:38:14', '2023-11-06 17:38:14', 7);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_diri_buku_tamu`
--
ALTER TABLE `data_diri_buku_tamu`
  ADD PRIMARY KEY (`id_tamu`),
  ADD KEY `data_diri_buku_tamu_id_surat_1_foreign` (`id_surat_1`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `feedback_id_periode_foreign` (`id_periode`);

--
-- Indeks untuk tabel `kendaraan_buku_tamu`
--
ALTER TABLE `kendaraan_buku_tamu`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `kendaraan_buku_tamu_id_surat_1_foreign` (`id_surat_1`);

--
-- Indeks untuk tabel `lokasi_tujuan`
--
ALTER TABLE `lokasi_tujuan`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `mobil_id_surat_1_foreign` (`id_surat_1`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `periode_tamu`
--
ALTER TABLE `periode_tamu`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `status_surat`
--
ALTER TABLE `status_surat`
  ADD PRIMARY KEY (`id_status_surat`);

--
-- Indeks untuk tabel `surat_1_buku_tamu`
--
ALTER TABLE `surat_1_buku_tamu`
  ADD PRIMARY KEY (`id_surat_1`),
  ADD KEY `surat_1_buku_tamu_id_lokasi_foreign` (`id_lokasi`),
  ADD KEY `surat_1_buku_tamu_id_periode_foreign` (`id_periode`),
  ADD KEY `surat_1_buku_tamu_id_status_surat_foreign` (`id_status_surat`),
  ADD KEY `surat_1_buku_tamu_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `surat_2_buku_tamu`
--
ALTER TABLE `surat_2_buku_tamu`
  ADD PRIMARY KEY (`id_surat_2`),
  ADD KEY `surat_2_buku_tamu_id_surat_1_foreign` (`id_surat_1`),
  ADD KEY `surat_2_buku_tamu_id_tamu_foreign` (`id_tamu`),
  ADD KEY `surat_2_buku_tamu_id_ga_foreign` (`id_ga`),
  ADD KEY `surat_2_buku_tamu_id_status_surat_foreign` (`id_status_surat`),
  ADD KEY `surat_2_buku_tamu_id_lokasi_foreign` (`id_lokasi`),
  ADD KEY `surat_2_buku_tamu_id_periode_foreign` (`id_periode`);

--
-- Indeks untuk tabel `surat_2_buku_tamu_duri`
--
ALTER TABLE `surat_2_buku_tamu_duri`
  ADD PRIMARY KEY (`id_surat_2_duri`),
  ADD KEY `surat_2_buku_tamu_duri_id_surat_1_foreign` (`id_surat_1`),
  ADD KEY `surat_2_buku_tamu_duri_id_kendaraan_foreign` (`id_kendaraan`),
  ADD KEY `surat_2_buku_tamu_duri_id_tamu_foreign` (`id_tamu`),
  ADD KEY `surat_2_buku_tamu_duri_id_phr_foreign` (`id_phr`),
  ADD KEY `surat_2_buku_tamu_duri_id_ga_duri_foreign` (`id_ga_duri`),
  ADD KEY `surat_2_buku_tamu_duri_id_status_surat_foreign` (`id_status_surat`),
  ADD KEY `surat_2_buku_tamu_duri_id_lokasi_foreign` (`id_lokasi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_role_foreign` (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_diri_buku_tamu`
--
ALTER TABLE `data_diri_buku_tamu`
  MODIFY `id_tamu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kendaraan_buku_tamu`
--
ALTER TABLE `kendaraan_buku_tamu`
  MODIFY `id_kendaraan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `lokasi_tujuan`
--
ALTER TABLE `lokasi_tujuan`
  MODIFY `id_lokasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `periode_tamu`
--
ALTER TABLE `periode_tamu`
  MODIFY `id_periode` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `status_surat`
--
ALTER TABLE `status_surat`
  MODIFY `id_status_surat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `surat_1_buku_tamu`
--
ALTER TABLE `surat_1_buku_tamu`
  MODIFY `id_surat_1` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `surat_2_buku_tamu`
--
ALTER TABLE `surat_2_buku_tamu`
  MODIFY `id_surat_2` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `surat_2_buku_tamu_duri`
--
ALTER TABLE `surat_2_buku_tamu_duri`
  MODIFY `id_surat_2_duri` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_diri_buku_tamu`
--
ALTER TABLE `data_diri_buku_tamu`
  ADD CONSTRAINT `data_diri_buku_tamu_id_surat_1_foreign` FOREIGN KEY (`id_surat_1`) REFERENCES `surat_1_buku_tamu` (`id_surat_1`);

--
-- Ketidakleluasaan untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_id_periode_foreign` FOREIGN KEY (`id_periode`) REFERENCES `periode_tamu` (`id_periode`);

--
-- Ketidakleluasaan untuk tabel `kendaraan_buku_tamu`
--
ALTER TABLE `kendaraan_buku_tamu`
  ADD CONSTRAINT `kendaraan_buku_tamu_id_mobil_foreign` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`),
  ADD CONSTRAINT `kendaraan_buku_tamu_id_surat_1_foreign` FOREIGN KEY (`id_surat_1`) REFERENCES `surat_1_buku_tamu` (`id_surat_1`);

--
-- Ketidakleluasaan untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `mobil_id_surat_1_foreign` FOREIGN KEY (`id_surat_1`) REFERENCES `surat_1_buku_tamu` (`id_surat_1`);

--
-- Ketidakleluasaan untuk tabel `surat_1_buku_tamu`
--
ALTER TABLE `surat_1_buku_tamu`
  ADD CONSTRAINT `surat_1_buku_tamu_id_lokasi_foreign` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi_tujuan` (`id_lokasi`),
  ADD CONSTRAINT `surat_1_buku_tamu_id_periode_foreign` FOREIGN KEY (`id_periode`) REFERENCES `periode_tamu` (`id_periode`),
  ADD CONSTRAINT `surat_1_buku_tamu_id_status_surat_foreign` FOREIGN KEY (`id_status_surat`) REFERENCES `status_surat` (`id_status_surat`),
  ADD CONSTRAINT `surat_1_buku_tamu_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `surat_2_buku_tamu`
--
ALTER TABLE `surat_2_buku_tamu`
  ADD CONSTRAINT `surat_2_buku_tamu_id_ga_foreign` FOREIGN KEY (`id_ga`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `surat_2_buku_tamu_id_lokasi_foreign` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi_tujuan` (`id_lokasi`),
  ADD CONSTRAINT `surat_2_buku_tamu_id_periode_foreign` FOREIGN KEY (`id_periode`) REFERENCES `periode_tamu` (`id_periode`),
  ADD CONSTRAINT `surat_2_buku_tamu_id_status_surat_foreign` FOREIGN KEY (`id_status_surat`) REFERENCES `status_surat` (`id_status_surat`),
  ADD CONSTRAINT `surat_2_buku_tamu_id_surat_1_foreign` FOREIGN KEY (`id_surat_1`) REFERENCES `surat_1_buku_tamu` (`id_surat_1`),
  ADD CONSTRAINT `surat_2_buku_tamu_id_tamu_foreign` FOREIGN KEY (`id_tamu`) REFERENCES `data_diri_buku_tamu` (`id_tamu`);

--
-- Ketidakleluasaan untuk tabel `surat_2_buku_tamu_duri`
--
ALTER TABLE `surat_2_buku_tamu_duri`
  ADD CONSTRAINT `surat_2_buku_tamu_duri_id_ga_duri_foreign` FOREIGN KEY (`id_ga_duri`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `surat_2_buku_tamu_duri_id_kendaraan_foreign` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan_buku_tamu` (`id_kendaraan`),
  ADD CONSTRAINT `surat_2_buku_tamu_duri_id_lokasi_foreign` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi_tujuan` (`id_lokasi`),
  ADD CONSTRAINT `surat_2_buku_tamu_duri_id_periode_foreign` FOREIGN KEY (`id_periode`) REFERENCES `periode_tamu` (`id_periode`),
  ADD CONSTRAINT `surat_2_buku_tamu_duri_id_phr_foreign` FOREIGN KEY (`id_phr`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `surat_2_buku_tamu_duri_id_status_surat_foreign` FOREIGN KEY (`id_status_surat`) REFERENCES `status_surat` (`id_status_surat`),
  ADD CONSTRAINT `surat_2_buku_tamu_duri_id_surat_1_foreign` FOREIGN KEY (`id_surat_1`) REFERENCES `surat_1_buku_tamu` (`id_surat_1`),
  ADD CONSTRAINT `surat_2_buku_tamu_duri_id_tamu_foreign` FOREIGN KEY (`id_tamu`) REFERENCES `data_diri_buku_tamu` (`id_tamu`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
