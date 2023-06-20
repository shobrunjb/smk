-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2023 pada 09.19
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aihrm_pjpepo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `kode_akun` varchar(30) NOT NULL,
  `nama_akun` varchar(250) NOT NULL,
  `debet_kredit` set('DEBET','KREDIT') DEFAULT NULL,
  `kategori` set('NR','LR') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `id_parent`, `kode_akun`, `nama_akun`, `debet_kredit`, `kategori`) VALUES
(1000, 0, '1-000', 'AKTIVA', '', 'NR'),
(1100, 1000, '1-100', 'AKTIVA LANCAR', NULL, 'NR'),
(1111, 1100, '1-111', 'Kas', 'DEBET', 'NR'),
(1114, 1100, '1-114', 'Piutang Usaha', 'DEBET', 'NR'),
(1200, 1000, '1-200', 'AKTIVA TETAP', NULL, 'NR'),
(2000, 0, '2-000', 'KEWAJIBAN', NULL, 'NR'),
(2100, 2000, '2-100', 'KEWAJIBAN LANCAR', NULL, 'NR'),
(2200, 2000, '2-200', 'KEWAJIBAN JANGKA PANJANG', NULL, 'NR'),
(3000, 0, '3-000', 'EKUITAS', NULL, 'NR'),
(3100, 3000, '3-100', 'Modal Saham', 'KREDIT', 'NR'),
(3200, 3000, '3-200', 'Laba Ditahan', 'KREDIT', 'NR'),
(4000, 0, '4-000', 'PENDAPATAN', NULL, 'LR'),
(4100, 4000, '4-100', 'Pendapatan Jasa', 'KREDIT', 'LR'),
(6000, 0, '6-000', 'BIAYA USAHA', NULL, 'LR'),
(6011, 6000, '6-011', 'Gaji', 'DEBET', 'LR'),
(6012, 6000, '6-012', 'Perlengkapan', 'DEBET', 'LR'),
(6014, 6000, '6-014', 'Listrik, Telepon, Internet, Biaya Lain', 'DEBET', 'LR'),
(6016, 6000, '6016', 'Biaya Sewa', 'DEBET', 'LR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_field_config`
--

CREATE TABLE `app_field_config` (
  `id_app_field_config` int(11) NOT NULL,
  `classname` varchar(250) NOT NULL,
  `varian_group` varchar(150) NOT NULL,
  `fieldname` varchar(250) NOT NULL,
  `label` varchar(250) NOT NULL,
  `no_order` int(11) NOT NULL,
  `is_visible` int(1) NOT NULL,
  `is_required` int(1) NOT NULL,
  `is_unique` int(11) DEFAULT 0,
  `is_safe` int(11) DEFAULT 0,
  `is_readonly` int(1) NOT NULL DEFAULT 0,
  `type_field` int(11) DEFAULT 0,
  `max_field` int(4) NOT NULL,
  `default_value` varchar(250) DEFAULT NULL,
  `hide_in_grid` int(1) NOT NULL,
  `pattern` varchar(250) DEFAULT NULL,
  `image_extensions` varchar(250) NOT NULL,
  `image_max_size` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `app_field_config`
--

INSERT INTO `app_field_config` (`id_app_field_config`, `classname`, `varian_group`, `fieldname`, `label`, `no_order`, `is_visible`, `is_required`, `is_unique`, `is_safe`, `is_readonly`, `type_field`, `max_field`, `default_value`, `hide_in_grid`, `pattern`, `image_extensions`, `image_max_size`) VALUES
(1, 'asset_master', '', 'asset_name', 'Nama', 1, 1, 1, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(2, 'asset_master', '', 'asset_code', 'Kode Master Barang', 2, 1, 1, 0, 0, 0, 1, 40, NULL, 0, NULL, '', ''),
(3, 'asset_master', '', 'id_type_asset1', 'Jenis Aset', 3, 1, 1, 0, 0, 0, 2, 12, NULL, 0, NULL, '', ''),
(6, 'asset_master', '', 'id_type_asset2', 'Type Asset 2', 0, 0, 0, 0, 0, 0, 2, 12, NULL, 0, NULL, '', ''),
(7, 'asset_master', '', 'attribute1', 'TEST', 0, 0, 0, 0, 0, 0, 2, 12, NULL, 0, NULL, '', ''),
(20, 'type_asset_item1', '', 'type_asset_item', 'Embuh', 0, 1, 1, 0, 0, 0, 1, 0, NULL, 0, NULL, '', ''),
(21, 'type_asset_item1', '', 'description', 'description', 0, 1, 0, 0, 0, 0, 1, 0, NULL, 0, NULL, '', ''),
(22, 'type_asset_item1', '', 'is_active', 'is active', 0, 1, 1, 0, 0, 0, 2, 0, NULL, 0, NULL, '', ''),
(23, 'kelurahan', '', 'id_kecamatan', 'Kecamatan', 0, 1, 1, 0, 0, 0, 2, 0, NULL, 0, NULL, '', ''),
(24, 'kelurahan', '', 'nama_kelurahan', 'nama kelurahan', 0, 1, 1, 0, 0, 0, 1, 0, NULL, 0, NULL, '', ''),
(25, 'kelurahan', '', 'kodepos', 'kodepos', 0, 0, 0, 0, 0, 0, 2, 0, NULL, 0, NULL, '', ''),
(26, 'asset_item_location', '', 'id_asset_master', 'id asset master', 1, 1, 1, 0, 0, 0, 2, 20, NULL, 0, NULL, '', ''),
(27, 'asset_item_location', '', 'latitude', 'latitude', 2, 1, 1, 0, 0, 0, 1, 60, NULL, 0, NULL, '', ''),
(28, 'asset_item_location', '', 'longitude', 'longitude', 3, 1, 1, 0, 0, 0, 1, 60, NULL, 0, NULL, '', ''),
(29, 'asset_item_location', '', 'address', 'address', 4, 1, 1, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(30, 'asset_item_location', '', 'desa', 'desa', 5, 1, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(31, 'asset_item_location', '', 'kecamatan', 'kecamatan', 6, 1, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(32, 'asset_item_location', '', 'kabupaten', 'kabupaten', 7, 1, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(33, 'asset_item_location', '', 'provinsi', 'provinsi', 8, 1, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(34, 'asset_item_location', '', 'kodepos', 'kodepos', 9, 1, 1, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(35, 'asset_item_location', '', 'id_kabupaten', 'id kabupaten', 10, 1, 0, 0, 0, 0, 2, 11, NULL, 0, NULL, '', ''),
(36, 'asset_item_location', '', 'id_propinsi', 'id propinsi', 11, 1, 0, 0, 0, 0, 2, 11, NULL, 0, NULL, '', ''),
(37, 'asset_item_location', '', 'id_kecamatan', 'id kecamatan', 12, 1, 0, 0, 0, 0, 2, 11, NULL, 0, NULL, '', ''),
(38, 'asset_item_location', '', 'id_kelurahan', 'id kelurahan', 13, 1, 0, 0, 0, 0, 2, 11, NULL, 0, NULL, '', ''),
(39, 'asset_item_location', '', 'batas_utara', 'batas utara', 14, 1, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(40, 'asset_item_location', '', 'batas_selatan', 'batas selatan', 15, 1, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(41, 'asset_item_location', '', 'batas_timur', 'batas timur', 16, 1, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(42, 'asset_item_location', '', 'batas_barat', 'batas barat', 17, 1, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(43, 'asset_item_location', '', 'luas', 'luas', 18, 1, 1, 0, 0, 0, 4, 18, NULL, 0, NULL, '', ''),
(44, 'asset_item_location', '', 'keterangan1', 'keterangan1', 19, 1, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(45, 'asset_item_location', '', 'keterangan2', 'keterangan2', 20, 1, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(46, 'asset_item_location', '', 'keterangan3', 'keterangan3', 21, 1, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(47, 'asset_item', '', 'id_asset_master', 'Jenis Barang', 1, 1, 0, 0, 0, 0, 2, 20, NULL, 0, NULL, '', ''),
(48, 'asset_item', '', 'number1', 'Nomor Inventaris', 2, 1, 1, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(49, 'asset_item', '', 'number2', 'number2', 3, 0, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(50, 'asset_item', '', 'number3', 'number3', 4, 0, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(51, 'asset_item', '', 'picture1', 'Foto', 5, 1, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(52, 'asset_item', '', 'picture2', 'picture2', 6, 0, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(53, 'asset_item', '', 'picture3', 'picture3', 7, 0, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(54, 'asset_item', '', 'picture4', 'picture4', 8, 0, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(55, 'asset_item', '', 'picture5', 'picture5', 9, 0, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(56, 'asset_item', '', 'caption_picture1', 'caption picture1', 10, 0, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(57, 'asset_item', '', 'caption_picture2', 'caption picture2', 11, 0, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(58, 'asset_item', '', 'caption_picture3', 'caption picture3', 12, 0, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(59, 'asset_item', '', 'caption_picture4', 'caption picture4', 13, 0, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(60, 'asset_item', '', 'caption_picture5', 'caption picture5', 14, 0, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(61, 'asset_item', '', 'id_asset_received', 'id asset received', 15, 0, 0, 0, 0, 0, 2, 20, NULL, 0, NULL, '', ''),
(62, 'asset_item', '', 'id_asset_item_location', 'id asset item location', 16, 0, 0, 0, 0, 0, 2, 20, NULL, 0, NULL, '', ''),
(63, 'asset_item', '', 'id_type_asset_item1', 'id type asset item1', 17, 0, 0, 0, 0, 0, 2, 11, NULL, 0, NULL, '', ''),
(64, 'asset_item', '', 'id_type_asset_item2', 'id type asset item2', 18, 0, 0, 0, 0, 0, 2, 11, NULL, 0, NULL, '', ''),
(65, 'asset_item', '', 'id_type_asset_item3', 'id type asset item3', 19, 0, 0, 0, 0, 0, 2, 11, NULL, 0, NULL, '', ''),
(66, 'asset_item', '', 'id_type_asset_item4', 'id type asset item4', 20, 0, 0, 0, 0, 0, 2, 11, NULL, 0, NULL, '', ''),
(67, 'asset_item', '', 'id_type_asset_item5', 'id type asset item5', 21, 0, 0, 0, 0, 0, 2, 11, NULL, 0, NULL, '', ''),
(68, 'asset_item', '', 'file1', 'file1', 22, 0, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(69, 'asset_item', '', 'file2', 'file2', 23, 0, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(70, 'asset_item', '', 'file3', 'file3', 24, 0, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(71, 'asset_item', '', 'label1', 'NO.INVENTARIS', 1, 1, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(72, 'asset_item', '', 'label2', 'Barcode number', 26, 1, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(73, 'asset_item', '', 'label3', 'label3', 27, 0, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(74, 'asset_item', '', 'label4', 'label4', 28, 0, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', ''),
(75, 'asset_item', '', 'label5', 'Keterangan', 29, 1, 0, 0, 0, 0, 1, 250, NULL, 0, NULL, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_setting`
--

CREATE TABLE `app_setting` (
  `id_app_setting` int(11) NOT NULL,
  `setting_name` varchar(1500) NOT NULL,
  `is_image` int(1) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `app_setting`
--

INSERT INTO `app_setting` (`id_app_setting`, `setting_name`, `is_image`, `value`) VALUES
(1, 'APP-NAME', 0, 'SmartHR'),
(2, 'APP-NAME-SINGKAT', 0, 'SmartHR'),
(3, 'APP-NAME-SINGKATAN', 0, 'Knowing Your Potential'),
(4, 'Logo', 1, 'Logo.png'),
(5, 'Icon', 1, 'Icon.png'),
(6, 'ADDRESS', 0, 'Jl. Raya Ace Tabrani No.423, Kalong I, Kec. Leuwisadeng, Kabupaten Bogor, Jawa Barat 16640'),
(7, 'Copyright', 0, 'Copyright 2023 KUM Bogor. All Right Reserved'),
(8, 'MAIN-BACKGROUND', 1, 'MAIN-BACKGROUND.jpg'),
(9, 'ABOUT-APP', 0, 'Aplikasi SmartHR berfungsi untuk melakukan pengujian person-job matching, person-organization matching, dan person-environment matching'),
(10, 'APP-VERSION', 0, '1.0.0 (Beta)'),
(11, 'APP-RELEASE-DATE', 0, 'Januari 2023'),
(12, 'APP-CONTACT', 0, 'Karya Usaha Mandiri Bogor'),
(13, 'WA-1', 0, '+62 251 8680154'),
(14, 'WA-2', 0, '+62 251 8681475'),
(15, 'IG', 0, '@kumsyariah'),
(16, 'WEBSITE', 0, 'https://www.kumsyariah.com/'),
(17, 'EMAIL', 0, 'office@kumsyariah.com'),
(18, 'ABOUT-WEB', 0, 'Sistem Smart HR'),
(19, 'GUDANG-DEFAULT', 0, '1'),
(20, 'LANDING-PAGE', 0, '0'),
(100, 'API-KEY', 0, 'LzloRzRtWjh0S3d3ZitTMko0UENYQT09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_vocabulary`
--

CREATE TABLE `app_vocabulary` (
  `id_app_vocabulary` bigint(20) NOT NULL,
  `master_vocab` varchar(150) NOT NULL,
  `vocab_lang1` varchar(250) NOT NULL,
  `vocab_lang2` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `app_vocabulary`
--

INSERT INTO `app_vocabulary` (`id_app_vocabulary`, `master_vocab`, `vocab_lang1`, `vocab_lang2`) VALUES
(1, 'Type Asset Item 1', 'Kode Aset', ''),
(2, 'Type Asset Item 2', 'Status SIMAK', NULL),
(3, 'Data Aset', 'Data Aset Tanah', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `asset_item`
--

CREATE TABLE `asset_item` (
  `id_asset_item` bigint(20) NOT NULL,
  `id_asset_master` bigint(20) NOT NULL,
  `number1` varchar(250) DEFAULT NULL,
  `number2` varchar(250) DEFAULT NULL,
  `number3` varchar(250) DEFAULT NULL,
  `kode_barcode` varchar(50) DEFAULT NULL,
  `qrcode` varchar(250) DEFAULT NULL,
  `link_code` varchar(500) DEFAULT NULL,
  `id_customer` bigint(20) NOT NULL,
  `picture1` varchar(250) DEFAULT NULL,
  `picture2` varchar(250) DEFAULT NULL,
  `picture3` varchar(250) DEFAULT NULL,
  `picture4` varchar(250) NOT NULL,
  `picture5` varchar(250) NOT NULL,
  `caption_picture1` varchar(250) DEFAULT NULL,
  `caption_picture2` varchar(250) DEFAULT NULL,
  `caption_picture3` varchar(250) DEFAULT NULL,
  `caption_picture4` varchar(250) DEFAULT NULL,
  `caption_picture5` varchar(250) DEFAULT NULL,
  `id_asset_received` bigint(20) NOT NULL,
  `id_asset_item_location` bigint(20) NOT NULL,
  `id_type_asset_item1` int(11) NOT NULL,
  `id_type_asset_item2` int(11) NOT NULL,
  `id_type_asset_item3` int(11) NOT NULL,
  `id_type_asset_item4` int(11) NOT NULL,
  `id_type_asset_item5` int(11) NOT NULL,
  `label1` varchar(50) NOT NULL,
  `label2` varchar(50) NOT NULL,
  `label3` varchar(50) NOT NULL,
  `label4` varchar(50) NOT NULL,
  `label5` varchar(50) NOT NULL,
  `file1` varchar(50) NOT NULL,
  `file2` varchar(50) NOT NULL,
  `file3` varchar(50) NOT NULL,
  `status_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `asset_item`
--

INSERT INTO `asset_item` (`id_asset_item`, `id_asset_master`, `number1`, `number2`, `number3`, `kode_barcode`, `qrcode`, `link_code`, `id_customer`, `picture1`, `picture2`, `picture3`, `picture4`, `picture5`, `caption_picture1`, `caption_picture2`, `caption_picture3`, `caption_picture4`, `caption_picture5`, `id_asset_received`, `id_asset_item_location`, `id_type_asset_item1`, `id_type_asset_item2`, `id_type_asset_item3`, `id_type_asset_item4`, `id_type_asset_item5`, `label1`, `label2`, `label3`, `label4`, `label5`, `file1`, `file2`, `file3`, `status_active`) VALUES
(2, 1, '2', 'KK30-1', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0),
(3, 1, '3', 'KK30-3', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0),
(4, 2, '4\r\n', 'KK550-1', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0),
(5, 3, '5', 'TP-1', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0),
(7, 1, '1202184337', '55015', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0),
(9, 1, 'KK30-1511', '1356790', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0),
(10, 6, NULL, '0348', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0),
(11, 2, NULL, 'KK550-452', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0),
(12, 3, NULL, 'TP-1511', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0),
(15, 3, NULL, '7856', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0),
(17, 3, NULL, 'tbbbbb', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `asset_item_location`
--

CREATE TABLE `asset_item_location` (
  `id_asset_item_location` bigint(20) NOT NULL,
  `id_asset_master` bigint(20) NOT NULL,
  `latitude` varchar(60) NOT NULL,
  `longitude` varchar(60) NOT NULL,
  `address` varchar(250) NOT NULL,
  `desa` varchar(250) DEFAULT NULL,
  `kecamatan` varchar(250) DEFAULT NULL,
  `kabupaten` varchar(250) DEFAULT NULL,
  `provinsi` varchar(250) DEFAULT NULL,
  `kodepos` varchar(250) NOT NULL,
  `id_kabupaten` int(11) DEFAULT NULL,
  `id_propinsi` int(11) DEFAULT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `id_kelurahan` int(11) DEFAULT NULL,
  `batas_utara` varchar(250) DEFAULT NULL,
  `batas_selatan` varchar(250) DEFAULT NULL,
  `batas_timur` varchar(250) DEFAULT NULL,
  `batas_barat` varchar(250) DEFAULT NULL,
  `luas` double(18,3) NOT NULL,
  `keterangan1` varchar(250) DEFAULT NULL,
  `keterangan2` varchar(250) DEFAULT NULL,
  `keterangan3` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Ini khusus untuk aset diam seperti tanah, gedung';

--
-- Dumping data untuk tabel `asset_item_location`
--

INSERT INTO `asset_item_location` (`id_asset_item_location`, `id_asset_master`, `latitude`, `longitude`, `address`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kodepos`, `id_kabupaten`, `id_propinsi`, `id_kecamatan`, `id_kelurahan`, `batas_utara`, `batas_selatan`, `batas_timur`, `batas_barat`, `luas`, `keterangan1`, `keterangan2`, `keterangan3`) VALUES
(1, 1, '-7.975293', '110.923327', 'Ds Baturetno, Baturetno, Kb Wonogiri', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 'Gn. Wd. Wonogiri', '', '', '', 132000.000, '', NULL, NULL),
(2, 1, '-7.936381', '110.90587', 'Ds Pulung, Baturetno, Wonogiri', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 'Gn. Wd. Wonogiri', '', '', '', 0.000, 'Bukti Milik saya', NULL, NULL),
(3, 2, 'ds', 's', 's', NULL, NULL, NULL, NULL, 'ss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.000, NULL, NULL, NULL),
(4, 1, '123', '3', 'Banjarnegara', NULL, NULL, NULL, NULL, '3123', 1113, 36, NULL, NULL, NULL, NULL, NULL, NULL, 0.000, NULL, NULL, NULL),
(5, 1, 'd', 'd', 'df', NULL, NULL, NULL, NULL, '', 1101, 11, NULL, NULL, NULL, NULL, NULL, NULL, 0.000, NULL, NULL, NULL),
(6, 1, '89,821', '90sa', 'Bandung raya', NULL, NULL, NULL, NULL, '', 1116, NULL, NULL, NULL, 'Utara Jaya', 'Selatan Paling Ujung', 'Timur ', 'barat', 0.000, NULL, NULL, NULL),
(7, 1, '54', '56', 'df', NULL, NULL, NULL, NULL, '', 1102, 13, NULL, NULL, '', '', '', '', 0.000, NULL, NULL, NULL),
(8, 1, 'south', 'east', '', NULL, NULL, NULL, NULL, '', 1111, NULL, NULL, NULL, 'Embuh', 'Nyoh', 'Batas Timur', 'Batas Barat', 0.000, NULL, NULL, NULL),
(9, 1, 'd', 'd', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', '', '', 0.000, NULL, NULL, NULL),
(10, 3, 'Ini Baru Loh', 'Ini lebih Baru', '', NULL, NULL, NULL, NULL, '', 1115, NULL, NULL, NULL, 'u', 's', 't', 'b', 0.000, NULL, NULL, NULL),
(11, 1, 's', 't', '', NULL, NULL, NULL, NULL, '', 1111, NULL, NULL, NULL, 'u', 's', 't', 'b', 0.000, '', NULL, NULL),
(12, 1, 'd', '12', '', NULL, NULL, NULL, NULL, '', 1116, NULL, NULL, NULL, 'u', 's', 'Timur ', 'barat', 0.000, 'Bukti Milik', NULL, NULL),
(13, 1, '12.33', '43.1232', '', NULL, NULL, NULL, NULL, '', 1101, NULL, 1, 1, '', '', '', '', 0.000, 'YA', NULL, NULL),
(14, 1, '123', '231', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', '', '', 12.000, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `asset_master`
--

CREATE TABLE `asset_master` (
  `id_asset_master` bigint(20) NOT NULL,
  `asset_name` varchar(250) NOT NULL,
  `id_asset_code` bigint(20) DEFAULT NULL,
  `asset_code` varchar(150) NOT NULL,
  `id_account_code` int(11) DEFAULT NULL,
  `id_mst_accrual` int(11) DEFAULT NULL,
  `id_type_asset1` int(11) DEFAULT NULL,
  `id_type_asset2` int(11) DEFAULT NULL,
  `id_type_asset3` int(11) DEFAULT NULL,
  `id_type_asset4` int(11) DEFAULT NULL,
  `id_type_asset5` int(11) DEFAULT NULL,
  `attribute1` varchar(250) DEFAULT NULL,
  `attribute2` varchar(250) DEFAULT NULL,
  `attribute3` varchar(250) DEFAULT NULL,
  `attribute4` varchar(250) DEFAULT NULL,
  `attribute5` varchar(250) DEFAULT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `number_series` bigint(20) DEFAULT NULL,
  `date` date NOT NULL,
  `id_supplier` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `asset_master`
--

INSERT INTO `asset_master` (`id_asset_master`, `asset_name`, `id_asset_code`, `asset_code`, `id_account_code`, `id_mst_accrual`, `id_type_asset1`, `id_type_asset2`, `id_type_asset3`, `id_type_asset4`, `id_type_asset5`, `attribute1`, `attribute2`, `attribute3`, `attribute4`, `attribute5`, `deskripsi`, `status`, `number_series`, `date`, `id_supplier`) VALUES
(1, 'Kapal Kargo 30 ', NULL, '1231', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2022-08-01', 1),
(2, 'Kapal Kargo 550', NULL, '550', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test', NULL, NULL, '2022-08-01', 1),
(3, 'Tongkang Pertamina', NULL, '1112', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2022-08-03', 1),
(6, 'Tongkang Maersk', NULL, 'TM-01', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tongkang pabrikan Maersk', NULL, NULL, '2022-08-23', 1),
(7, 'Kapal Kargo 44', NULL, 'KK44', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kapal kargo tipe 44', NULL, NULL, '2022-08-24', 0),
(8, 'Kapal randy', NULL, 'RND7788', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ffffffff', NULL, NULL, '2022-09-06', 0),
(9, 'tongkang batubara', NULL, '363', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'besar menampung 50ton', NULL, NULL, '2022-09-07', 0),
(10, 'SUBMARINE446', NULL, 'MRN-446', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'KAPAL SELAM TIPE 446', NULL, NULL, '2022-09-08', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1542014079),
('admin', '13', 1660621569),
('admin', '7', 1552641965),
('member', '0', 1660555775),
('member', '13', 1563241503),
('member', '14', 1547712959),
('member', '15', 1660621671),
('member', '16', 1660621746),
('member', '17', 1660626500),
('member', '18', 1660629541),
('member', '20', 1660631026),
('member', '21', 1660631070),
('member', '22', 1661968667),
('member', '23', 1662018356),
('member', '24', 1662554564),
('member', '25', 1662558357),
('member', '26', 1662560528),
('member', '27', 1662566824),
('member', '28', 1662618355),
('member', '29', 1662620976),
('member', '30', 1662621451),
('member', '31', 1662630737),
('member', '32', 1663333676),
('member', '33', 1664434865),
('member', '34', 1666255287),
('member', '35', NULL),
('member', '36', 2023),
('produksi', '10', 1637317971),
('sales', '11', 1638343265),
('sales', '12', 1639095512),
('sales', '2', 1633397521),
('sales', '5', 1633413050),
('sales', '7', 1633413155),
('sales', '8', 1633420082),
('sales', '9', 1633932308);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1569471203, 1569471203),
('/admin/assignment/*', 2, NULL, NULL, NULL, 1552641503, 1552641503),
('/admin/assignment/assign', 2, NULL, NULL, NULL, 1552641510, 1552641510),
('/admin/assignment/index', 2, NULL, NULL, NULL, 1552641510, 1552641510),
('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1552641510, 1552641510),
('/admin/assignment/view', 2, NULL, NULL, NULL, 1552641510, 1552641510),
('/admin/default/*', 2, NULL, NULL, NULL, 1552641513, 1552641513),
('/admin/default/index', 2, NULL, NULL, NULL, 1552641513, 1552641513),
('/admin/permission/*', 2, NULL, NULL, NULL, 1552641517, 1552641517),
('/admin/permission/assign', 2, NULL, NULL, NULL, 1552641517, 1552641517),
('/admin/permission/create', 2, NULL, NULL, NULL, 1552641517, 1552641517),
('/admin/permission/delete', 2, NULL, NULL, NULL, 1552641517, 1552641517),
('/admin/permission/index', 2, NULL, NULL, NULL, 1552641517, 1552641517),
('/admin/permission/remove', 2, NULL, NULL, NULL, 1552641517, 1552641517),
('/admin/permission/update', 2, NULL, NULL, NULL, 1552641517, 1552641517),
('/admin/permission/view', 2, NULL, NULL, NULL, 1552641517, 1552641517),
('/admin/role/*', 2, NULL, NULL, NULL, 1552641520, 1552641520),
('/admin/role/assign', 2, NULL, NULL, NULL, 1552641520, 1552641520),
('/admin/role/create', 2, NULL, NULL, NULL, 1552641520, 1552641520),
('/admin/role/delete', 2, NULL, NULL, NULL, 1552641520, 1552641520),
('/admin/role/index', 2, NULL, NULL, NULL, 1552641520, 1552641520),
('/admin/role/remove', 2, NULL, NULL, NULL, 1552641520, 1552641520),
('/admin/role/update', 2, NULL, NULL, NULL, 1552641520, 1552641520),
('/admin/role/view', 2, NULL, NULL, NULL, 1552641520, 1552641520),
('/admin/route/*', 2, NULL, NULL, NULL, 1552641523, 1552641523),
('/admin/route/assign', 2, NULL, NULL, NULL, 1552641523, 1552641523),
('/admin/route/create', 2, NULL, NULL, NULL, 1552641523, 1552641523),
('/admin/route/index', 2, NULL, NULL, NULL, 1552641523, 1552641523),
('/admin/route/refresh', 2, NULL, NULL, NULL, 1552641523, 1552641523),
('/admin/route/remove', 2, NULL, NULL, NULL, 1552641523, 1552641523),
('/admin/rule/*', 2, NULL, NULL, NULL, 1552641527, 1552641527),
('/admin/rule/create', 2, NULL, NULL, NULL, 1552641527, 1552641527),
('/admin/rule/delete', 2, NULL, NULL, NULL, 1552641527, 1552641527),
('/admin/rule/index', 2, NULL, NULL, NULL, 1552641527, 1552641527),
('/admin/rule/update', 2, NULL, NULL, NULL, 1552641527, 1552641527),
('/admin/rule/view', 2, NULL, NULL, NULL, 1552641527, 1552641527),
('/admin/user/delete', 2, NULL, NULL, NULL, 1552641538, 1552641538),
('/admin/user/index', 2, NULL, NULL, NULL, 1552641538, 1552641538),
('/admin/user/view', 2, NULL, NULL, NULL, 1552641538, 1552641538),
('/akun/*', 2, NULL, NULL, NULL, 1624525994, 1624525994),
('/app-setting/*', 2, NULL, NULL, NULL, 1623558891, 1623558891),
('/asset-item-main/*', 2, NULL, NULL, NULL, 1659407789, 1659407789),
('/asset-item-vehicle/*', 2, NULL, NULL, NULL, 1660210546, 1660210546),
('/asset-item/*', 2, NULL, NULL, NULL, 1659407789, 1659407789),
('/asset-master-vehicle/*', 2, NULL, NULL, NULL, 1660211044, 1660211044),
('/asset-master/*', 2, NULL, NULL, NULL, 1659408288, 1659408288),
('/base-pendapatan/*', 2, NULL, NULL, NULL, 1629223425, 1629223425),
('/base-pendapatan/create', 2, NULL, NULL, NULL, 1629223437, 1629223437),
('/base-pendapatan/delete', 2, NULL, NULL, NULL, 1629223437, 1629223437),
('/base-pendapatan/index', 2, NULL, NULL, NULL, 1629223437, 1629223437),
('/base-pendapatan/update', 2, NULL, NULL, NULL, 1629223437, 1629223437),
('/base-pendapatan/view', 2, NULL, NULL, NULL, 1629223437, 1629223437),
('/base-salary/*', 2, NULL, NULL, NULL, 1629223429, 1629223429),
('/base-salary/create', 2, NULL, NULL, NULL, 1629223437, 1629223437),
('/base-salary/delete', 2, NULL, NULL, NULL, 1629223437, 1629223437),
('/base-salary/index', 2, NULL, NULL, NULL, 1629223437, 1629223437),
('/base-salary/update', 2, NULL, NULL, NULL, 1629223437, 1629223437),
('/base-salary/view', 2, NULL, NULL, NULL, 1629223437, 1629223437),
('/basic-packing-item/*', 2, NULL, NULL, NULL, 1625442083, 1625442083),
('/basic-packing/*', 2, NULL, NULL, NULL, 1625442065, 1625442065),
('/bd-mutasi-stock/*', 2, NULL, NULL, NULL, 1635771083, 1635771083),
('/bei-compentecy-question/*', 2, NULL, NULL, NULL, 1670490476, 1670490476),
('/bei-interview-bacth/*', 2, NULL, NULL, NULL, 1670489887, 1670489887),
('/bei-interview-peserta/*', 2, NULL, NULL, NULL, 1670478906, 1670478906),
('/bei-interview-sequence/*', 2, NULL, NULL, NULL, 1670489890, 1670489890),
('/bei-interview-session/*', 2, NULL, NULL, NULL, 1670489892, 1670489892),
('/bei-kar-asses-jawaban/*', 2, NULL, NULL, NULL, 1670489895, 1670489895),
('/bei-mst-category-predef-quest/*', 2, NULL, NULL, NULL, 1670489899, 1670489899),
('/bei-predefined-question/*', 2, NULL, NULL, NULL, 1670489900, 1670489900),
('/bei-sequence/*', 2, NULL, NULL, NULL, 1670489904, 1670489904),
('/chat-interview/*', 2, NULL, NULL, NULL, 1670557672, 1670557672),
('/chat-interview/interview', 2, NULL, NULL, NULL, 1670557913, 1670557913),
('/chat-interview/open-interview', 2, NULL, NULL, NULL, 1670557913, 1670557913),
('/chat-interview/start-interview', 2, NULL, NULL, NULL, 1670557913, 1670557913),
('/contact-us/*', 2, NULL, NULL, NULL, 1566445209, 1566445209),
('/contact-us/create', 2, NULL, NULL, NULL, 1566445209, 1566445209),
('/contact-us/delete', 2, NULL, NULL, NULL, 1566445209, 1566445209),
('/contact-us/index', 2, NULL, NULL, NULL, 1566445209, 1566445209),
('/contact-us/update', 2, NULL, NULL, NULL, 1566445209, 1566445209),
('/contact-us/view', 2, NULL, NULL, NULL, 1566445209, 1566445209),
('/content/*', 2, NULL, NULL, NULL, 1566440059, 1566440059),
('/content/create', 2, NULL, NULL, NULL, 1566440059, 1566440059),
('/content/delete', 2, NULL, NULL, NULL, 1566440059, 1566440059),
('/content/index', 2, NULL, NULL, NULL, 1566440059, 1566440059),
('/content/reset-default-image', 2, NULL, NULL, NULL, 1570060236, 1570060236),
('/content/update', 2, NULL, NULL, NULL, 1566440059, 1566440059),
('/content/upload-image', 2, NULL, NULL, NULL, 1570060235, 1570060235),
('/content/view', 2, NULL, NULL, NULL, 1566440059, 1566440059),
('/cpanel-leftmenu/*', 2, NULL, NULL, NULL, 1552641574, 1552641574),
('/cpanel-leftmenu/create', 2, NULL, NULL, NULL, 1552641574, 1552641574),
('/cpanel-leftmenu/delete', 2, NULL, NULL, NULL, 1552641574, 1552641574),
('/cpanel-leftmenu/index', 2, NULL, NULL, NULL, 1552641574, 1552641574),
('/cpanel-leftmenu/update', 2, NULL, NULL, NULL, 1552641574, 1552641574),
('/cpanel-leftmenu/view', 2, NULL, NULL, NULL, 1552641574, 1552641574),
('/customer-sales/*', 2, NULL, NULL, NULL, 1635321990, 1635321990),
('/customer/*', 2, NULL, NULL, NULL, 1633408135, 1633408135),
('/dashboard/*', 2, NULL, NULL, NULL, 1552641577, 1552641577),
('/dashboard/main', 2, NULL, NULL, NULL, 1552641577, 1552641577),
('/data-jurusan/*', 2, NULL, NULL, NULL, 1672631196, 1672631196),
('/data-sekolah/*', 2, NULL, NULL, NULL, 1672631212, 1672631212),
('/diklat-pegawai-kategori/*', 2, NULL, NULL, NULL, 1661353777, 1661353777),
('/diklat-pegawai-list/*', 2, NULL, NULL, NULL, 1661353777, 1661353777),
('/diklat-pegawai-member/*', 2, NULL, NULL, NULL, 1661353870, 1661353870),
('/diklat-pegawai/*', 2, NULL, NULL, NULL, 1661350532, 1661350532),
('/environment-attribute/*', 2, NULL, NULL, NULL, 1684814853, 1684814853),
('/frontend-topnav-parent/*', 2, NULL, NULL, NULL, 1624284213, 1624284213),
('/frontend-topnav/*', 2, NULL, NULL, NULL, 1567558594, 1567558594),
('/frontend-topnav/create', 2, NULL, NULL, NULL, 1567558594, 1567558594),
('/frontend-topnav/delete', 2, NULL, NULL, NULL, 1567558594, 1567558594),
('/frontend-topnav/index', 2, NULL, NULL, NULL, 1567558594, 1567558594),
('/frontend-topnav/reset-default-image', 2, NULL, NULL, NULL, 1570060236, 1570060236),
('/frontend-topnav/update', 2, NULL, NULL, NULL, 1567558594, 1567558594),
('/frontend-topnav/upload-image', 2, NULL, NULL, NULL, 1570060236, 1570060236),
('/frontend-topnav/view', 2, NULL, NULL, NULL, 1567558594, 1567558594),
('/gii/*', 2, NULL, NULL, NULL, 1552641560, 1552641560),
('/gridview/*', 2, NULL, NULL, NULL, 1628789886, 1628789886),
('/gridview/export/*', 2, NULL, NULL, NULL, 1629223476, 1629223476),
('/gudang/*', 2, NULL, NULL, NULL, 1629614431, 1629614431),
('/home-info/*', 2, NULL, NULL, NULL, 1623560246, 1623560246),
('/hrm-absensi-pegawai/*', 2, NULL, NULL, NULL, 1659435606, 1659435606),
('/hrm-competency-dimension/*', 2, NULL, NULL, NULL, 1670491001, 1670491001),
('/hrm-cv-asuransi/*', 2, NULL, NULL, NULL, 1672740808, 1672740808),
('/hrm-cv-keluarga/*', 2, NULL, NULL, NULL, 1672804619, 1672804619),
('/hrm-cv-kesehatan/*', 2, NULL, NULL, NULL, 1672740504, 1672740504),
('/hrm-cv-language-skill/*', 2, NULL, NULL, NULL, 1672804612, 1672804612),
('/hrm-cv-riwayat-pekerjaan/*', 2, NULL, NULL, NULL, 1672740341, 1672740341),
('/hrm-cv-riwayat-pendidikan/*', 2, NULL, NULL, NULL, 1672631217, 1672631217),
('/hrm-mst-bahasa/*', 2, NULL, NULL, NULL, 1672739538, 1672739538),
('/hrm-mst-jenis-absensi/*', 2, NULL, NULL, NULL, 1659435606, 1659435606),
('/hrm-mst-jenis-asuransi/*', 2, NULL, NULL, NULL, 1672740964, 1672740964),
('/hrm-mst-jenis-tunjangan-kesehatan/*', 2, NULL, NULL, NULL, 1672804632, 1672804632),
('/hrm-pegawai-user/*', 2, NULL, NULL, NULL, 1660626337, 1660626337),
('/hrm-pegawai/*', 2, NULL, NULL, NULL, 1629224181, 1629224181),
('/hrm-perusahaan-asuransi/*', 2, NULL, NULL, NULL, 1672804640, 1672804640),
('/hrm-status-pegawai/*', 2, NULL, NULL, NULL, 1660547842, 1660547842),
('/image-management/*', 2, NULL, NULL, NULL, 1566440062, 1566440062),
('/image-management/create', 2, NULL, NULL, NULL, 1566440062, 1566440062),
('/image-management/delete', 2, NULL, NULL, NULL, 1566440062, 1566440062),
('/image-management/index', 2, NULL, NULL, NULL, 1566440062, 1566440062),
('/image-management/update', 2, NULL, NULL, NULL, 1566440062, 1566440062),
('/image-management/view', 2, NULL, NULL, NULL, 1566440062, 1566440062),
('/jabatan-attribute/*', 2, NULL, NULL, NULL, 1680162222, 1680162222),
('/jabatan/*', 2, NULL, NULL, NULL, 1680162208, 1680162208),
('/jpembelian/*', 2, NULL, NULL, NULL, 1625442088, 1625442088),
('/jurnal-type/*', 2, NULL, NULL, NULL, 1629223445, 1629223445),
('/jurnal/*', 2, NULL, NULL, NULL, 1629223445, 1629223445),
('/kabupaten/*', 2, NULL, NULL, NULL, 1684814821, 1684814821),
('/landing-asset/*', 2, NULL, NULL, NULL, 1668816593, 1668816593),
('/landing-home/*', 2, NULL, NULL, NULL, 1668901000, 1668901000),
('/language/*', 2, NULL, NULL, NULL, 1566440066, 1566440066),
('/language/create', 2, NULL, NULL, NULL, 1566440066, 1566440066),
('/language/delete', 2, NULL, NULL, NULL, 1566440066, 1566440066),
('/language/index', 2, NULL, NULL, NULL, 1566440065, 1566440065),
('/language/update', 2, NULL, NULL, NULL, 1566440066, 1566440066),
('/language/view', 2, NULL, NULL, NULL, 1566440066, 1566440066),
('/laporan-kinerja-pegawai-admin/*', 2, NULL, NULL, NULL, 1662525607, 1662525607),
('/laporan-kinerja-pegawai/*', 2, NULL, NULL, NULL, 1662525607, 1662525607),
('/laporan/*', 2, NULL, NULL, NULL, 1552641588, 1552641588),
('/laporan/bulanan', 2, NULL, NULL, NULL, 1552641588, 1552641588),
('/laporan/captcha', 2, NULL, NULL, NULL, 1552641588, 1552641588),
('/laporan/error', 2, NULL, NULL, NULL, 1552641588, 1552641588),
('/laporan/harian', 2, NULL, NULL, NULL, 1552641588, 1552641588),
('/laporan/scan', 2, NULL, NULL, NULL, 1552641588, 1552641588),
('/log-order-pegawai/*', 2, NULL, NULL, NULL, 1660459147, 1660459147),
('/matching-personal-environment/*', 2, NULL, NULL, NULL, 1686639397, 1686639397),
('/matching-personal-jabatan/*', 2, NULL, NULL, NULL, 1680242308, 1680242308),
('/matching-personal-organization/*', 2, NULL, NULL, NULL, 1683737330, 1683737330),
('/material-finish-gudang/*', 2, NULL, NULL, NULL, 1642482756, 1642482756),
('/material-finish-outlet/*', 2, NULL, NULL, NULL, 1635154053, 1635154053),
('/material-finish/*', 2, NULL, NULL, NULL, 1629866367, 1629866367),
('/material-in-item-proc/*', 2, NULL, NULL, NULL, 1625442097, 1625442097),
('/material-in/*', 2, NULL, NULL, NULL, 1625442097, 1625442097),
('/material-kategori1/*', 2, NULL, NULL, NULL, 1629613758, 1629613758),
('/material-kategori2/*', 2, NULL, NULL, NULL, 1629613758, 1629613758),
('/material-kategori3/*', 2, NULL, NULL, NULL, 1629613758, 1629613758),
('/material-konsolidasi/*', 2, NULL, NULL, NULL, 1644404195, 1644404195),
('/material-raw-kategori1/*', 2, NULL, NULL, NULL, 1640234467, 1640234467),
('/material-sales/*', 2, NULL, NULL, NULL, 1633393905, 1633393905),
('/material-sampel/*', 2, NULL, NULL, NULL, 1640235773, 1640235773),
('/material-support/*', 2, NULL, NULL, NULL, 1625442097, 1625442097),
('/material/*', 2, NULL, NULL, NULL, 1624525185, 1624525185),
('/media-identity/*', 2, NULL, NULL, NULL, 1568270276, 1568270276),
('/media-identity/create', 2, NULL, NULL, NULL, 1568270276, 1568270276),
('/media-identity/delete', 2, NULL, NULL, NULL, 1568270276, 1568270276),
('/media-identity/index', 2, NULL, NULL, NULL, 1568270275, 1568270275),
('/media-identity/update', 2, NULL, NULL, NULL, 1568270276, 1568270276),
('/media-identity/view', 2, NULL, NULL, NULL, 1568270275, 1568270275),
('/menu-link/*', 2, NULL, NULL, NULL, 1568270278, 1568270278),
('/menu-link/create', 2, NULL, NULL, NULL, 1568270277, 1568270277),
('/menu-link/delete', 2, NULL, NULL, NULL, 1568270277, 1568270277),
('/menu-link/index', 2, NULL, NULL, NULL, 1568270276, 1568270276),
('/menu-link/update', 2, NULL, NULL, NULL, 1568270277, 1568270277),
('/menu-link/view', 2, NULL, NULL, NULL, 1568270277, 1568270277),
('/mst-environment-attribute-grade/*', 2, NULL, NULL, NULL, 1680162421, 1680162421),
('/mst-environment-attribute/*', 2, NULL, NULL, NULL, 1680162411, 1680162411),
('/mst-jabatan-attribute-grade/*', 2, NULL, NULL, NULL, 1680162374, 1680162374),
('/mst-jabatan-attribute/*', 2, NULL, NULL, NULL, 1680162272, 1680162272),
('/mst-jenis-penyakit/*', 2, NULL, NULL, NULL, 1672740668, 1672740668),
('/mst-order-progres/*', 2, NULL, NULL, NULL, 1659404674, 1659404674),
('/mst-organization-attribute-grade/*', 2, NULL, NULL, NULL, 1680162473, 1680162473),
('/mst-organization-attribute/*', 2, NULL, NULL, NULL, 1680162462, 1680162462),
('/mst-personal-attribute-grade/*', 2, NULL, NULL, NULL, 1672712265, 1672712265),
('/mst-personal-attribute/*', 2, NULL, NULL, NULL, 1671877695, 1671877695),
('/mst-tingkat-pendidikan/*', 2, NULL, NULL, NULL, 1666254649, 1666254649),
('/mutasi-stock-item/*', 2, NULL, NULL, NULL, 1643277686, 1643277686),
('/mutasi-stock/*', 2, NULL, NULL, NULL, 1630612972, 1630612972),
('/news/*', 2, NULL, NULL, NULL, 1566440068, 1566440068),
('/news/create', 2, NULL, NULL, NULL, 1566440068, 1566440068),
('/news/delete', 2, NULL, NULL, NULL, 1566440068, 1566440068),
('/news/index', 2, NULL, NULL, NULL, 1566440068, 1566440068),
('/news/list', 2, NULL, NULL, NULL, 1568270278, 1568270278),
('/news/reset-default-image', 2, NULL, NULL, NULL, 1570060236, 1570060236),
('/news/update', 2, NULL, NULL, NULL, 1566440068, 1566440068),
('/news/upload-image', 2, NULL, NULL, NULL, 1570060236, 1570060236),
('/news/view', 2, NULL, NULL, NULL, 1566440068, 1566440068),
('/office-region/*', 2, NULL, NULL, NULL, 1568345553, 1568345553),
('/office-region/create', 2, NULL, NULL, NULL, 1568345553, 1568345553),
('/office-region/delete', 2, NULL, NULL, NULL, 1568345553, 1568345553),
('/office-region/index', 2, NULL, NULL, NULL, 1568345553, 1568345553),
('/office-region/reset-default-image', 2, NULL, NULL, NULL, 1570060236, 1570060236),
('/office-region/update', 2, NULL, NULL, NULL, 1568345553, 1568345553),
('/office-region/upload-image', 2, NULL, NULL, NULL, 1570060236, 1570060236),
('/office-region/view', 2, NULL, NULL, NULL, 1568345553, 1568345553),
('/order-pegawai-kategori/*', 2, NULL, NULL, NULL, 1659404686, 1659404686),
('/order-pegawai-list-member/*', 2, NULL, NULL, NULL, 1660640827, 1660640827),
('/order-pegawai-list/*', 2, NULL, NULL, NULL, 1659404652, 1659404652),
('/order-pegawai-list/index-member', 2, NULL, NULL, NULL, 1660557517, 1660557517),
('/order-pegawai/*', 2, NULL, NULL, NULL, 1659404652, 1659404652),
('/organization-attribute/*', 2, NULL, NULL, NULL, 1683466296, 1683466296),
('/outlet-penjualan/*', 2, NULL, NULL, NULL, 1633395620, 1633395620),
('/outsourcing-process-raw/*', 2, NULL, NULL, NULL, 1640235706, 1640235706),
('/pallet-gudang/*', 2, NULL, NULL, NULL, 1642481886, 1642481886),
('/pembelian-material-support/*', 2, NULL, NULL, NULL, 1629223462, 1629223462),
('/pembelian-material-support/create', 2, NULL, NULL, NULL, 1629223462, 1629223462),
('/pembelian-material-support/delete', 2, NULL, NULL, NULL, 1629223462, 1629223462),
('/pembelian-material-support/index', 2, NULL, NULL, NULL, 1629223462, 1629223462),
('/pembelian-material-support/update', 2, NULL, NULL, NULL, 1629223462, 1629223462),
('/pembelian-material-support/view', 2, NULL, NULL, NULL, 1629223462, 1629223462),
('/pendapatan/*', 2, NULL, NULL, NULL, 1629227877, 1629227877),
('/personal-attribute/*', 2, NULL, NULL, NULL, 1672710875, 1672710875),
('/perusahaan/*', 2, NULL, NULL, NULL, 1552641592, 1552641592),
('/perusahaan/create', 2, NULL, NULL, NULL, 1552641592, 1552641592),
('/perusahaan/delete', 2, NULL, NULL, NULL, 1552641592, 1552641592),
('/perusahaan/index', 2, NULL, NULL, NULL, 1552641592, 1552641592),
('/perusahaan/update', 2, NULL, NULL, NULL, 1552641592, 1552641592),
('/perusahaan/view', 2, NULL, NULL, NULL, 1552641592, 1552641592),
('/pro-environment-attribute/*', 2, NULL, NULL, NULL, 1680162396, 1680162396),
('/pro-organization-attribute/*', 2, NULL, NULL, NULL, 1680162449, 1680162449),
('/pro-personal-attribute/*', 2, NULL, NULL, NULL, 1672710434, 1672710434),
('/product/*', 2, NULL, NULL, NULL, 1566440072, 1566440072),
('/product/create', 2, NULL, NULL, NULL, 1566440072, 1566440072),
('/product/delete', 2, NULL, NULL, NULL, 1566440072, 1566440072),
('/product/index', 2, NULL, NULL, NULL, 1566440072, 1566440072),
('/product/reset-default-file', 2, NULL, NULL, NULL, 1570060236, 1570060236),
('/product/reset-default-image', 2, NULL, NULL, NULL, 1570060236, 1570060236),
('/product/update', 2, NULL, NULL, NULL, 1566440072, 1566440072),
('/product/upload-file', 2, NULL, NULL, NULL, 1569976553, 1569976553),
('/product/upload-image', 2, NULL, NULL, NULL, 1569976553, 1569976553),
('/product/view', 2, NULL, NULL, NULL, 1566440072, 1566440072),
('/purchase-raw-item/*', 2, NULL, NULL, NULL, 1639473944, 1639473944),
('/purchase-raw/*', 2, NULL, NULL, NULL, 1639473807, 1639473807),
('/request-product-info/*', 2, NULL, NULL, NULL, 1566440077, 1566440077),
('/request-product-info/create', 2, NULL, NULL, NULL, 1566440077, 1566440077),
('/request-product-info/delete', 2, NULL, NULL, NULL, 1566440077, 1566440077),
('/request-product-info/index', 2, NULL, NULL, NULL, 1566440077, 1566440077),
('/request-product-info/update', 2, NULL, NULL, NULL, 1566440077, 1566440077),
('/request-product-info/view', 2, NULL, NULL, NULL, 1566440077, 1566440077),
('/salary-monthly/*', 2, NULL, NULL, NULL, 1629223462, 1629223462),
('/salary-monthly/create', 2, NULL, NULL, NULL, 1629223462, 1629223462),
('/salary-monthly/delete', 2, NULL, NULL, NULL, 1629223462, 1629223462),
('/salary-monthly/index', 2, NULL, NULL, NULL, 1629223462, 1629223462),
('/salary-monthly/update', 2, NULL, NULL, NULL, 1629223462, 1629223462),
('/salary-monthly/view', 2, NULL, NULL, NULL, 1629223462, 1629223462),
('/sales-custom/*', 2, NULL, NULL, NULL, 1635321980, 1635321980),
('/sales-invoice/*', 2, NULL, NULL, NULL, 1633925876, 1633925876),
('/sales-jurnal/*', 2, NULL, NULL, NULL, 1635077684, 1635077684),
('/sales-order/*', 2, NULL, NULL, NULL, 1633395214, 1633395214),
('/sales-pembayaran/*', 2, NULL, NULL, NULL, 1633927807, 1633927807),
('/sales-retur-cancel/*', 2, NULL, NULL, NULL, 1634855595, 1634855595),
('/sales-surat-jalan/*', 2, NULL, NULL, NULL, 1633946399, 1633946399),
('/section-content/*', 2, NULL, NULL, NULL, 1566440080, 1566440080),
('/section-content/create', 2, NULL, NULL, NULL, 1566440080, 1566440080),
('/section-content/delete', 2, NULL, NULL, NULL, 1566440080, 1566440080),
('/section-content/index', 2, NULL, NULL, NULL, 1566440079, 1566440079),
('/section-content/update', 2, NULL, NULL, NULL, 1566440080, 1566440080),
('/section-content/view', 2, NULL, NULL, NULL, 1566440080, 1566440080),
('/site/*', 2, NULL, NULL, NULL, 1552641595, 1552641595),
('/site/about', 2, NULL, NULL, NULL, 1552641595, 1552641595),
('/site/captcha', 2, NULL, NULL, NULL, 1552641595, 1552641595),
('/site/change-password', 2, NULL, NULL, NULL, 1637881688, 1637881688),
('/site/contact', 2, NULL, NULL, NULL, 1552641595, 1552641595),
('/site/error', 2, NULL, NULL, NULL, 1552641595, 1552641595),
('/site/index', 2, NULL, NULL, NULL, 1552641595, 1552641595),
('/site/login', 2, NULL, NULL, NULL, 1552641595, 1552641595),
('/site/logout', 2, NULL, NULL, NULL, 1552641595, 1552641595),
('/site/scan', 2, NULL, NULL, NULL, 1552641595, 1552641595),
('/stock-opname-item/*', 2, NULL, NULL, NULL, 1644831808, 1644831808),
('/stock-opname/*', 2, NULL, NULL, NULL, 1644831808, 1644831808),
('/struktur-material-mapping/*', 2, NULL, NULL, NULL, 1642485791, 1642485791),
('/struktur-material/*', 2, NULL, NULL, NULL, 1640234489, 1640234489),
('/subcontractor/*', 2, NULL, NULL, NULL, 1640235463, 1640235463),
('/supplier-delivery-order/*', 2, NULL, NULL, NULL, 1628735626, 1628735626),
('/supplier-do-item/*', 2, NULL, NULL, NULL, 1628735626, 1628735626),
('/supplier-raw/*', 2, NULL, NULL, NULL, 1640235153, 1640235153),
('/supplier/*', 2, NULL, NULL, NULL, 1628735619, 1628735619),
('/sustainability-impl-category/*', 2, NULL, NULL, NULL, 1569976554, 1569976554),
('/sustainability-impl-category/create', 2, NULL, NULL, NULL, 1569976554, 1569976554),
('/sustainability-impl-category/delete', 2, NULL, NULL, NULL, 1569976554, 1569976554),
('/sustainability-impl-category/index', 2, NULL, NULL, NULL, 1569976553, 1569976553),
('/sustainability-impl-category/update', 2, NULL, NULL, NULL, 1569976554, 1569976554),
('/sustainability-impl-category/view', 2, NULL, NULL, NULL, 1569976554, 1569976554),
('/sustainability-impl-news/*', 2, NULL, NULL, NULL, 1569976554, 1569976554),
('/sustainability-impl-news/create', 2, NULL, NULL, NULL, 1569976554, 1569976554),
('/sustainability-impl-news/delete', 2, NULL, NULL, NULL, 1569976554, 1569976554),
('/sustainability-impl-news/index', 2, NULL, NULL, NULL, 1569976554, 1569976554),
('/sustainability-impl-news/reset-default-image', 2, NULL, NULL, NULL, 1570060236, 1570060236),
('/sustainability-impl-news/update', 2, NULL, NULL, NULL, 1569976554, 1569976554),
('/sustainability-impl-news/upload-image', 2, NULL, NULL, NULL, 1569976554, 1569976554),
('/sustainability-impl-news/view', 2, NULL, NULL, NULL, 1569976554, 1569976554),
('/sustainability-report/*', 2, NULL, NULL, NULL, 1569471203, 1569471203),
('/sustainability-report/create', 2, NULL, NULL, NULL, 1569471203, 1569471203),
('/sustainability-report/delete', 2, NULL, NULL, NULL, 1569471203, 1569471203),
('/sustainability-report/index', 2, NULL, NULL, NULL, 1569471203, 1569471203),
('/sustainability-report/update', 2, NULL, NULL, NULL, 1569471203, 1569471203),
('/sustainability-report/view', 2, NULL, NULL, NULL, 1569471203, 1569471203),
('/unit-produksi/*', 2, NULL, NULL, NULL, 1625105212, 1625105212),
('/unit-produksi/create', 2, NULL, NULL, NULL, 1625105212, 1625105212),
('/unit-produksi/delete', 2, NULL, NULL, NULL, 1625105212, 1625105212),
('/unit-produksi/index', 2, NULL, NULL, NULL, 1625105212, 1625105212),
('/unit-produksi/update', 2, NULL, NULL, NULL, 1625105212, 1625105212),
('/unit-produksi/view', 2, NULL, NULL, NULL, 1625105212, 1625105212),
('/user-outlet/*', 2, NULL, NULL, NULL, 1633396116, 1633396116),
('/user-perusahaan/*', 2, NULL, NULL, NULL, 1552641605, 1552641605),
('/user-perusahaan/create', 2, NULL, NULL, NULL, 1552641604, 1552641604),
('/user-perusahaan/delete', 2, NULL, NULL, NULL, 1552641605, 1552641605),
('/user-perusahaan/index', 2, NULL, NULL, NULL, 1552641604, 1552641604),
('/user-perusahaan/update', 2, NULL, NULL, NULL, 1552641605, 1552641605),
('/user-perusahaan/view', 2, NULL, NULL, NULL, 1552641604, 1552641604),
('/user/*', 2, NULL, NULL, NULL, 1552641600, 1552641600),
('/user/create', 2, NULL, NULL, NULL, 1552641600, 1552641600),
('/user/delete', 2, NULL, NULL, NULL, 1552641600, 1552641600),
('/user/index', 2, NULL, NULL, NULL, 1552641600, 1552641600),
('/user/reset-password', 2, NULL, NULL, NULL, 1637883636, 1637883636),
('/user/update', 2, NULL, NULL, NULL, 1552641600, 1552641600),
('/user/view', 2, NULL, NULL, NULL, 1552641600, 1552641600),
('/web-page/*', 2, NULL, NULL, NULL, 1570060236, 1570060236),
('/web-page/create', 2, NULL, NULL, NULL, 1570060236, 1570060236),
('/web-page/delete', 2, NULL, NULL, NULL, 1570060236, 1570060236),
('/web-page/index', 2, NULL, NULL, NULL, 1570060236, 1570060236),
('/web-page/update', 2, NULL, NULL, NULL, 1570060236, 1570060236),
('/web-page/view', 2, NULL, NULL, NULL, 1570060236, 1570060236),
('/web-vocabulary/*', 2, NULL, NULL, NULL, 1568270282, 1568270282),
('/web-vocabulary/create', 2, NULL, NULL, NULL, 1568270282, 1568270282),
('/web-vocabulary/delete', 2, NULL, NULL, NULL, 1568270282, 1568270282),
('/web-vocabulary/index', 2, NULL, NULL, NULL, 1568270281, 1568270281),
('/web-vocabulary/update', 2, NULL, NULL, NULL, 1568270282, 1568270282),
('/web-vocabulary/view', 2, NULL, NULL, NULL, 1568270282, 1568270282),
('admin', 1, 'Application Admin', NULL, NULL, 1542013792, 1565583564),
('cpanel-leftmenu/create', 2, 'Create a menu', NULL, NULL, 1547712959, 1547712959),
('cpanel-leftmenu/delete', 2, 'delete a menu', NULL, NULL, 1547712959, 1547712959),
('cpanel-leftmenu/index', 2, 'Create a index', NULL, NULL, 1547712959, 1547712959),
('cpanel-leftmenu/update', 2, 'Update a menu', NULL, NULL, 1547713493, 1547713493),
('cpanel-leftmenu/view', 2, 'View a menu', NULL, NULL, 1547712959, 1547712959),
('grievance-list-request/index', 2, 'View Grievance List', NULL, NULL, 1563228150, 1563228150),
('member', 1, 'Member or supplier', NULL, NULL, 1563240747, 1563240747),
('owner', 1, 'Owner Account', NULL, NULL, 1542013792, 1552641921),
('produksi', 1, 'koordinator', NULL, NULL, 1563240797, 1623560370),
('sales', 1, 'writer', NULL, NULL, 1563240780, 1623560355),
('user/create', 2, 'Create a user', NULL, NULL, 1542013422, 1542013422),
('user/delete', 2, 'Delete a user', NULL, NULL, 1542013422, 1548749079),
('user/index', 2, 'Create a index', NULL, NULL, 1542013422, 1548749389),
('user/update', 2, 'Update a user', NULL, NULL, 1542013422, 1542013422),
('user/view', 2, 'View a user', NULL, NULL, 1542013422, 1548749426);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', '/admin/assignment/*'),
('admin', '/admin/assignment/assign'),
('admin', '/admin/assignment/index'),
('admin', '/admin/assignment/revoke'),
('admin', '/admin/assignment/view'),
('admin', '/admin/default/*'),
('admin', '/admin/default/index'),
('admin', '/admin/permission/*'),
('admin', '/admin/permission/assign'),
('admin', '/admin/permission/create'),
('admin', '/admin/permission/delete'),
('admin', '/admin/permission/index'),
('admin', '/admin/permission/remove'),
('admin', '/admin/permission/update'),
('admin', '/admin/permission/view'),
('admin', '/admin/role/*'),
('admin', '/admin/role/assign'),
('admin', '/admin/role/create'),
('admin', '/admin/role/delete'),
('admin', '/admin/role/index'),
('admin', '/admin/role/remove'),
('admin', '/admin/role/update'),
('admin', '/admin/role/view'),
('admin', '/admin/route/*'),
('admin', '/admin/route/assign'),
('admin', '/admin/route/create'),
('admin', '/admin/route/index'),
('admin', '/admin/route/refresh'),
('admin', '/admin/route/remove'),
('admin', '/admin/rule/*'),
('admin', '/admin/rule/create'),
('admin', '/admin/rule/delete'),
('admin', '/admin/rule/index'),
('admin', '/admin/rule/update'),
('admin', '/admin/rule/view'),
('admin', '/admin/user/delete'),
('admin', '/admin/user/index'),
('admin', '/admin/user/view'),
('admin', '/akun/*'),
('admin', '/app-setting/*'),
('admin', '/asset-item-main/*'),
('admin', '/asset-item-vehicle/*'),
('admin', '/asset-item/*'),
('admin', '/asset-master-vehicle/*'),
('admin', '/asset-master/*'),
('admin', '/base-pendapatan/*'),
('admin', '/base-salary/*'),
('admin', '/basic-packing-item/*'),
('admin', '/basic-packing/*'),
('admin', '/bd-mutasi-stock/*'),
('admin', '/bei-compentecy-question/*'),
('admin', '/bei-interview-bacth/*'),
('admin', '/bei-interview-peserta/*'),
('admin', '/bei-interview-sequence/*'),
('admin', '/bei-interview-session/*'),
('admin', '/bei-kar-asses-jawaban/*'),
('admin', '/bei-mst-category-predef-quest/*'),
('admin', '/bei-predefined-question/*'),
('admin', '/bei-sequence/*'),
('admin', '/chat-interview/*'),
('admin', '/chat-interview/interview'),
('admin', '/chat-interview/open-interview'),
('admin', '/chat-interview/start-interview'),
('admin', '/contact-us/*'),
('admin', '/contact-us/create'),
('admin', '/contact-us/delete'),
('admin', '/contact-us/index'),
('admin', '/contact-us/update'),
('admin', '/contact-us/view'),
('admin', '/content/*'),
('admin', '/content/create'),
('admin', '/content/delete'),
('admin', '/content/index'),
('admin', '/content/update'),
('admin', '/content/view'),
('admin', '/cpanel-leftmenu/*'),
('admin', '/cpanel-leftmenu/create'),
('admin', '/cpanel-leftmenu/delete'),
('admin', '/cpanel-leftmenu/index'),
('admin', '/cpanel-leftmenu/update'),
('admin', '/cpanel-leftmenu/view'),
('admin', '/data-jurusan/*'),
('admin', '/data-sekolah/*'),
('admin', '/diklat-pegawai-kategori/*'),
('admin', '/diklat-pegawai-list/*'),
('admin', '/diklat-pegawai-member/*'),
('admin', '/diklat-pegawai/*'),
('admin', '/environment-attribute/*'),
('admin', '/frontend-topnav-parent/*'),
('admin', '/frontend-topnav/*'),
('admin', '/frontend-topnav/create'),
('admin', '/frontend-topnav/delete'),
('admin', '/frontend-topnav/index'),
('admin', '/frontend-topnav/update'),
('admin', '/frontend-topnav/view'),
('admin', '/gii/*'),
('admin', '/gridview/*'),
('admin', '/gudang/*'),
('admin', '/home-info/*'),
('admin', '/hrm-absensi-pegawai/*'),
('admin', '/hrm-competency-dimension/*'),
('admin', '/hrm-cv-asuransi/*'),
('admin', '/hrm-cv-keluarga/*'),
('admin', '/hrm-cv-kesehatan/*'),
('admin', '/hrm-cv-language-skill/*'),
('admin', '/hrm-cv-riwayat-pekerjaan/*'),
('admin', '/hrm-cv-riwayat-pendidikan/*'),
('admin', '/hrm-mst-bahasa/*'),
('admin', '/hrm-mst-jenis-absensi/*'),
('admin', '/hrm-mst-jenis-asuransi/*'),
('admin', '/hrm-mst-jenis-tunjangan-kesehatan/*'),
('admin', '/hrm-pegawai-user/*'),
('admin', '/hrm-pegawai/*'),
('admin', '/hrm-perusahaan-asuransi/*'),
('admin', '/hrm-status-pegawai/*'),
('admin', '/image-management/*'),
('admin', '/image-management/create'),
('admin', '/image-management/delete'),
('admin', '/image-management/index'),
('admin', '/image-management/update'),
('admin', '/image-management/view'),
('admin', '/jabatan-attribute/*'),
('admin', '/jabatan/*'),
('admin', '/jpembelian/*'),
('admin', '/jurnal-type/*'),
('admin', '/jurnal/*'),
('admin', '/kabupaten/*'),
('admin', '/landing-asset/*'),
('admin', '/landing-home/*'),
('admin', '/language/*'),
('admin', '/language/create'),
('admin', '/language/delete'),
('admin', '/language/index'),
('admin', '/language/update'),
('admin', '/language/view'),
('admin', '/laporan-kinerja-pegawai-admin/*'),
('admin', '/log-order-pegawai/*'),
('admin', '/matching-personal-environment/*'),
('admin', '/matching-personal-jabatan/*'),
('admin', '/matching-personal-organization/*'),
('admin', '/material-finish-gudang/*'),
('admin', '/material-finish/*'),
('admin', '/material-in-item-proc/*'),
('admin', '/material-in/*'),
('admin', '/material-kategori1/*'),
('admin', '/material-kategori2/*'),
('admin', '/material-kategori3/*'),
('admin', '/material-konsolidasi/*'),
('admin', '/material-raw-kategori1/*'),
('admin', '/material-sales/*'),
('admin', '/material-sampel/*'),
('admin', '/material-support/*'),
('admin', '/material/*'),
('admin', '/media-identity/*'),
('admin', '/media-identity/create'),
('admin', '/media-identity/delete'),
('admin', '/media-identity/index'),
('admin', '/media-identity/update'),
('admin', '/media-identity/view'),
('admin', '/menu-link/*'),
('admin', '/menu-link/create'),
('admin', '/menu-link/delete'),
('admin', '/menu-link/index'),
('admin', '/menu-link/update'),
('admin', '/menu-link/view'),
('admin', '/mst-environment-attribute-grade/*'),
('admin', '/mst-environment-attribute/*'),
('admin', '/mst-jabatan-attribute-grade/*'),
('admin', '/mst-jabatan-attribute/*'),
('admin', '/mst-jenis-penyakit/*'),
('admin', '/mst-order-progres/*'),
('admin', '/mst-organization-attribute-grade/*'),
('admin', '/mst-organization-attribute/*'),
('admin', '/mst-personal-attribute-grade/*'),
('admin', '/mst-personal-attribute/*'),
('admin', '/mst-tingkat-pendidikan/*'),
('admin', '/mutasi-stock-item/*'),
('admin', '/mutasi-stock/*'),
('admin', '/news/*'),
('admin', '/news/create'),
('admin', '/news/delete'),
('admin', '/news/index'),
('admin', '/news/update'),
('admin', '/news/view'),
('admin', '/office-region/*'),
('admin', '/office-region/create'),
('admin', '/office-region/delete'),
('admin', '/office-region/index'),
('admin', '/office-region/update'),
('admin', '/office-region/view'),
('admin', '/order-pegawai-kategori/*'),
('admin', '/order-pegawai-list-member/*'),
('admin', '/order-pegawai-list/*'),
('admin', '/order-pegawai/*'),
('admin', '/organization-attribute/*'),
('admin', '/outlet-penjualan/*'),
('admin', '/outsourcing-process-raw/*'),
('admin', '/pallet-gudang/*'),
('admin', '/pembelian-material-support/*'),
('admin', '/pendapatan/*'),
('admin', '/personal-attribute/*'),
('admin', '/perusahaan/*'),
('admin', '/perusahaan/create'),
('admin', '/perusahaan/delete'),
('admin', '/perusahaan/index'),
('admin', '/perusahaan/update'),
('admin', '/perusahaan/view'),
('admin', '/pro-environment-attribute/*'),
('admin', '/pro-organization-attribute/*'),
('admin', '/pro-personal-attribute/*'),
('admin', '/product/*'),
('admin', '/product/create'),
('admin', '/product/delete'),
('admin', '/product/index'),
('admin', '/product/update'),
('admin', '/product/view'),
('admin', '/purchase-raw-item/*'),
('admin', '/purchase-raw/*'),
('admin', '/request-product-info/*'),
('admin', '/request-product-info/create'),
('admin', '/request-product-info/delete'),
('admin', '/request-product-info/index'),
('admin', '/request-product-info/update'),
('admin', '/request-product-info/view'),
('admin', '/salary-monthly/*'),
('admin', '/sales-invoice/*'),
('admin', '/sales-jurnal/*'),
('admin', '/sales-order/*'),
('admin', '/sales-pembayaran/*'),
('admin', '/section-content/*'),
('admin', '/section-content/create'),
('admin', '/section-content/delete'),
('admin', '/section-content/index'),
('admin', '/section-content/update'),
('admin', '/section-content/view'),
('admin', '/site/error'),
('admin', '/site/index'),
('admin', '/site/login'),
('admin', '/site/logout'),
('admin', '/stock-opname-item/*'),
('admin', '/stock-opname/*'),
('admin', '/struktur-material-mapping/*'),
('admin', '/struktur-material/*'),
('admin', '/subcontractor/*'),
('admin', '/supplier-delivery-order/*'),
('admin', '/supplier-do-item/*'),
('admin', '/supplier-raw/*'),
('admin', '/supplier/*'),
('admin', '/sustainability-impl-category/*'),
('admin', '/sustainability-impl-category/create'),
('admin', '/sustainability-impl-category/delete'),
('admin', '/sustainability-impl-category/index'),
('admin', '/sustainability-impl-category/update'),
('admin', '/sustainability-impl-category/view'),
('admin', '/sustainability-impl-news/*'),
('admin', '/sustainability-impl-news/create'),
('admin', '/sustainability-impl-news/delete'),
('admin', '/sustainability-impl-news/index'),
('admin', '/sustainability-impl-news/update'),
('admin', '/sustainability-impl-news/upload-image'),
('admin', '/sustainability-impl-news/view'),
('admin', '/sustainability-report/*'),
('admin', '/sustainability-report/create'),
('admin', '/sustainability-report/delete'),
('admin', '/sustainability-report/index'),
('admin', '/sustainability-report/update'),
('admin', '/sustainability-report/view'),
('admin', '/unit-produksi/*'),
('admin', '/user-outlet/*'),
('admin', '/user-perusahaan/*'),
('admin', '/user-perusahaan/create'),
('admin', '/user-perusahaan/delete'),
('admin', '/user-perusahaan/index'),
('admin', '/user-perusahaan/update'),
('admin', '/user-perusahaan/view'),
('admin', '/user/*'),
('admin', '/user/create'),
('admin', '/user/delete'),
('admin', '/user/index'),
('admin', '/user/reset-password'),
('admin', '/user/update'),
('admin', '/user/view'),
('admin', '/web-page/*'),
('admin', '/web-page/create'),
('admin', '/web-page/delete'),
('admin', '/web-page/index'),
('admin', '/web-page/update'),
('admin', '/web-page/view'),
('admin', '/web-vocabulary/*'),
('admin', '/web-vocabulary/create'),
('admin', '/web-vocabulary/delete'),
('admin', '/web-vocabulary/index'),
('admin', '/web-vocabulary/update'),
('admin', '/web-vocabulary/view'),
('admin', 'cpanel-leftmenu/create'),
('admin', 'cpanel-leftmenu/delete'),
('admin', 'cpanel-leftmenu/index'),
('admin', 'cpanel-leftmenu/update'),
('admin', 'cpanel-leftmenu/view'),
('admin', 'user/create'),
('admin', 'user/delete'),
('admin', 'user/index'),
('admin', 'user/update'),
('admin', 'user/view'),
('member', '/chat-interview/*'),
('member', '/diklat-pegawai-kategori/*'),
('member', '/diklat-pegawai-list/*'),
('member', '/diklat-pegawai-member/*'),
('member', '/diklat-pegawai/*'),
('member', '/hrm-cv-asuransi/*'),
('member', '/hrm-cv-keluarga/*'),
('member', '/hrm-cv-kesehatan/*'),
('member', '/hrm-cv-language-skill/*'),
('member', '/hrm-cv-riwayat-pekerjaan/*'),
('member', '/hrm-cv-riwayat-pendidikan/*'),
('member', '/hrm-pegawai-user/*'),
('member', '/laporan-kinerja-pegawai/*'),
('member', '/order-pegawai-list-member/*'),
('member', '/order-pegawai-list/*'),
('member', '/order-pegawai/*'),
('member', '/site/index'),
('member', 'cpanel-leftmenu/create'),
('member', 'cpanel-leftmenu/delete'),
('member', 'cpanel-leftmenu/index'),
('member', 'cpanel-leftmenu/update'),
('member', 'cpanel-leftmenu/view'),
('member', 'grievance-list-request/index'),
('member', 'user/create'),
('member', 'user/delete'),
('member', 'user/index'),
('member', 'user/update'),
('member', 'user/view'),
('owner', '/dashboard/*'),
('owner', '/dashboard/main'),
('owner', '/laporan/*'),
('owner', '/laporan/bulanan'),
('owner', '/laporan/captcha'),
('owner', '/laporan/error'),
('owner', '/laporan/harian'),
('owner', '/laporan/scan'),
('owner', '/site/error'),
('owner', '/site/index'),
('owner', '/site/login'),
('owner', '/site/logout'),
('owner', '/site/scan'),
('produksi', '/material-in/*'),
('produksi', '/material/*'),
('sales', '/customer-sales/*'),
('sales', '/customer/*'),
('sales', '/material-finish-outlet/*'),
('sales', '/sales-custom/*'),
('sales', '/sales-invoice/*'),
('sales', '/sales-order/*'),
('sales', '/sales-pembayaran/*'),
('sales', '/sales-retur-cancel/*'),
('sales', '/sales-surat-jalan/*'),
('sales', '/site/change-password');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_pembayaran`
--

CREATE TABLE `bank_pembayaran` (
  `id_bank_pembayaran` int(11) NOT NULL,
  `nama_bank` varchar(250) NOT NULL,
  `nama_bank_short` varchar(20) NOT NULL,
  `nomor_rekening` varchar(100) NOT NULL,
  `atas_nama` varchar(250) NOT NULL,
  `kode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `bank_pembayaran`
--

INSERT INTO `bank_pembayaran` (`id_bank_pembayaran`, `nama_bank`, `nama_bank_short`, `nomor_rekening`, `atas_nama`, `kode`) VALUES
(1, 'BNI', 'BNI', '12', '23', 'ABX');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bei_compentecy_question`
--

CREATE TABLE `bei_compentecy_question` (
  `id_bei_compentecy_question` bigint(20) NOT NULL,
  `id_hrm_competency_dimension` int(11) NOT NULL,
  `question_ind` varchar(250) NOT NULL,
  `question_eng` varchar(250) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `bei_compentecy_question`
--

INSERT INTO `bei_compentecy_question` (`id_bei_compentecy_question`, `id_hrm_competency_dimension`, `question_ind`, `question_eng`, `number`) VALUES
(1, 1, 'Ceritakan suatu kejadian dimana Anda menjadi pendorong keberhasilan tim kerja di instansi  Anda?', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bei_interview_batch`
--

CREATE TABLE `bei_interview_batch` (
  `id_bei_interview_batch` bigint(20) NOT NULL,
  `nama_batch` varchar(250) NOT NULL,
  `jumlah_peserta` int(11) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL,
  `created_user` varchar(64) NOT NULL,
  `created_ip_address` varchar(64) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_user` varchar(64) NOT NULL,
  `modified_ip_address` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `bei_interview_batch`
--

INSERT INTO `bei_interview_batch` (`id_bei_interview_batch`, `nama_batch`, `jumlah_peserta`, `keterangan`, `tanggal_mulai`, `tanggal_selesai`, `is_active`, `created_date`, `created_user`, `created_ip_address`, `modified_date`, `modified_user`, `modified_ip_address`) VALUES
(1, 'Batch Latihan / Testing', 20, 'Keterangan', '2022-12-01', '2022-12-30', 0, '2022-12-08 16:30:05', 'admin', '::1', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bei_interview_peserta`
--

CREATE TABLE `bei_interview_peserta` (
  `id_bei_interview_peserta` bigint(20) NOT NULL,
  `id_bei_interview_batch` bigint(20) NOT NULL,
  `id_pegawai` bigint(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(64) NOT NULL,
  `created_ip_address` varchar(64) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_user` varchar(64) NOT NULL,
  `modified_ip_address` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bei_interview_session`
--

CREATE TABLE `bei_interview_session` (
  `id_bei_interview_session` bigint(20) NOT NULL,
  `id_pegawai` bigint(20) NOT NULL,
  `id_bei_interview_batch` bigint(20) NOT NULL,
  `session_date` date NOT NULL,
  `id_bei_interview_sequence` bigint(20) NOT NULL,
  `last_position` int(11) DEFAULT NULL,
  `last_question` text DEFAULT NULL,
  `last_hit` bigint(20) DEFAULT 0,
  `actual_start` datetime NOT NULL,
  `actual_end` datetime DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL COMMENT 'menit',
  `status` set('NOTYET','START','END','PROBLEM') NOT NULL DEFAULT 'NOTYET',
  `last_submit` datetime DEFAULT NULL,
  `stat_total_number_question` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` varchar(64) NOT NULL,
  `created_ip_address` varchar(64) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_user` varchar(64) NOT NULL,
  `modified_ip_address` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `bei_interview_session`
--

INSERT INTO `bei_interview_session` (`id_bei_interview_session`, `id_pegawai`, `id_bei_interview_batch`, `session_date`, `id_bei_interview_sequence`, `last_position`, `last_question`, `last_hit`, `actual_start`, `actual_end`, `durasi`, `status`, `last_submit`, `stat_total_number_question`, `created_date`, `created_user`, `created_ip_address`, `modified_date`, `modified_user`, `modified_ip_address`) VALUES
(1, 4, 0, '2022-12-09', 0, NULL, NULL, 0, '2022-12-09 10:57:44', NULL, NULL, 'NOTYET', NULL, 0, '2022-12-09 10:57:44', '', '::1', '0000-00-00 00:00:00', '', ''),
(2, 4, 0, '2022-12-09', 0, NULL, NULL, 0, '2022-12-09 10:57:46', NULL, NULL, 'NOTYET', NULL, 0, '2022-12-09 10:57:46', '', '::1', '0000-00-00 00:00:00', '', ''),
(3, 4, 0, '2022-12-09', 0, NULL, NULL, 0, '2022-12-09 10:58:41', NULL, NULL, 'NOTYET', NULL, 0, '2022-12-09 10:58:41', '', '::1', '0000-00-00 00:00:00', '', ''),
(4, 4, 0, '2022-12-09', 0, NULL, NULL, 0, '2022-12-09 11:00:15', NULL, NULL, 'NOTYET', NULL, 0, '2022-12-09 11:00:15', '', '::1', '0000-00-00 00:00:00', '', ''),
(5, 4, 0, '2022-12-09', 0, NULL, NULL, 0, '2022-12-09 11:27:30', NULL, NULL, 'NOTYET', NULL, 0, '2022-12-09 11:27:30', '', '::1', '0000-00-00 00:00:00', '', ''),
(6, 4, 0, '2022-12-09', 0, NULL, NULL, 0, '2022-12-09 11:28:03', NULL, NULL, 'NOTYET', NULL, 0, '2022-12-09 11:28:03', '', '::1', '0000-00-00 00:00:00', '', ''),
(7, 4, 0, '2022-12-09', 0, NULL, NULL, 0, '2022-12-09 11:31:29', NULL, NULL, 'NOTYET', NULL, 0, '2022-12-09 11:31:29', '', '::1', '0000-00-00 00:00:00', '', ''),
(8, 4, 0, '2022-12-09', 0, NULL, NULL, 0, '2022-12-09 11:31:57', NULL, NULL, 'NOTYET', NULL, 0, '2022-12-09 11:31:57', '', '::1', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bei_kar_asses_jawaban`
--

CREATE TABLE `bei_kar_asses_jawaban` (
  `id_bei_kar_asses_jawaban` bigint(20) NOT NULL,
  `id_kompetensi_dasar` int(11) NOT NULL,
  `id_bei_compentecy_question` bigint(20) NOT NULL,
  `id_hrm_competency_dimension` bigint(20) NOT NULL,
  `id_bei_interview_session` bigint(20) NOT NULL,
  `id_pegawai` bigint(20) NOT NULL,
  `soal` varchar(1000) DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `score_by_machine` decimal(8,2) NOT NULL,
  `score_by_asesor` decimal(8,2) DEFAULT NULL,
  `key_verb` varchar(1000) DEFAULT NULL,
  `key_time` varchar(1000) DEFAULT NULL,
  `key_location` varchar(1000) DEFAULT NULL,
  `r_st` varchar(1000) DEFAULT NULL,
  `r_ar` varchar(1000) NOT NULL,
  `modified_time` datetime NOT NULL,
  `modified_user` varchar(64) NOT NULL,
  `modified_ip_address` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bei_mst_category_predef_quest`
--

CREATE TABLE `bei_mst_category_predef_quest` (
  `id_bei_mst_category_predef_quest` int(11) NOT NULL,
  `category_predef_quest` varchar(250) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `bei_mst_category_predef_quest`
--

INSERT INTO `bei_mst_category_predef_quest` (`id_bei_mst_category_predef_quest`, `category_predef_quest`, `is_active`) VALUES
(1, 'Salam Pembuka', 1),
(2, 'Penjelasan Tujuan', 1),
(3, 'Salam Penutup', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bei_pegawai_chat`
--

CREATE TABLE `bei_pegawai_chat` (
  `id_bei_pegawai_chat` bigint(20) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_bei_interview_session` bigint(20) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `message` varchar(250) NOT NULL,
  `time_log` datetime NOT NULL,
  `ipaddress_log` varchar(64) DEFAULT NULL,
  `is_read` int(1) NOT NULL DEFAULT 0,
  `read_user_id` int(11) NOT NULL,
  `id_bei_interview_sequence` bigint(20) DEFAULT NULL,
  `id_bei_sequence` int(11) DEFAULT NULL,
  `id_reference` bigint(20) DEFAULT NULL,
  `number_order` int(11) DEFAULT NULL,
  `is_finish_sequence` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bei_predefined_question`
--

CREATE TABLE `bei_predefined_question` (
  `id_bei_predefined_question` bigint(20) NOT NULL,
  `question_ind` varchar(250) NOT NULL,
  `question_eng` varchar(250) NOT NULL,
  `number` int(11) NOT NULL,
  `id_bei_mst_category_predef_quest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `bei_predefined_question`
--

INSERT INTO `bei_predefined_question` (`id_bei_predefined_question`, `question_ind`, `question_eng`, `number`, `id_bei_mst_category_predef_quest`) VALUES
(1, 'Hallo, Selamat datang', '', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bei_sequence`
--

CREATE TABLE `bei_sequence` (
  `id_bei_sequence` int(11) NOT NULL,
  `sequence_name` varchar(250) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `bei_sequence`
--

INSERT INTO `bei_sequence` (`id_bei_sequence`, `sequence_name`, `is_active`) VALUES
(1, 'PREDEF_QUESTION', 1),
(2, 'COMPETENCY QUESTION', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_us`
--

CREATE TABLE `contact_us` (
  `id_contact_us` bigint(20) NOT NULL,
  `id_office_region` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `request_date` date DEFAULT NULL,
  `request_time` datetime DEFAULT NULL,
  `registered_ip_address` varchar(64) DEFAULT NULL,
  `status` set('OPEN','CLOSE') DEFAULT NULL,
  `action_date` date DEFAULT NULL,
  `action_by` varchar(150) DEFAULT NULL,
  `action_notes` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `contact_us`
--

INSERT INTO `contact_us` (`id_contact_us`, `id_office_region`, `name`, `email`, `subject`, `message`, `request_date`, `request_time`, `registered_ip_address`, `status`, `action_date`, `action_by`, `action_notes`) VALUES
(1, 0, 'Rizky', 'rizky@gmail,com', 'Tanya Produk', 'Produk ini tentang apa sih ya?', '2019-08-14', '2019-08-14 04:33:00', '1', 'OPEN', NULL, NULL, NULL),
(2, 1, 'Amanda', 'sudirman@gmail.com', 'ddd', 'ddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, 'Amanda', 'sudirman@gmail.com', 'ddd', 'ddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 'Nanda', 'nanda@gmail.com', 'Tanya Apa saja', 'Saya mau nanya dong kalau ini dan itu gimana ya?', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 'sss', 'sss', 'ssds', 'asdasdasdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, 'ss', 'rzk@gmail.com', 'sss', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, 'Amanda 5', 'sudirman@gmail.com', 'ddd', 'dfsdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 2, 's', 'sudirman@gmail.com', 'ss', 'sdasda ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1, 'ssda', 'sda', 'sda', 'sdasdas', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, 'ssda', 'sda@gmail.com', 'sda', 'sdasdas', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 2, 'aASas', 'as@ss.com', 'AS', 'asAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE `content` (
  `id_content` bigint(20) NOT NULL,
  `keyname` varchar(100) NOT NULL,
  `id_section_content` int(11) NOT NULL,
  `id_frontend_topnav` int(11) NOT NULL,
  `content_lang1` text NOT NULL,
  `content_lang2` text NOT NULL,
  `have_image` int(1) DEFAULT 0,
  `image_filename` varchar(250) DEFAULT NULL,
  `have_colorbox` int(1) NOT NULL DEFAULT 0,
  `color_box` varchar(20) DEFAULT NULL,
  `have_info1` int(1) DEFAULT 0,
  `info1` text DEFAULT NULL,
  `have_info2` int(1) DEFAULT 0,
  `info2` text DEFAULT NULL,
  `have_info3` int(1) DEFAULT 0,
  `info3` text DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_user` int(11) DEFAULT NULL,
  `updated_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `content`
--

INSERT INTO `content` (`id_content`, `keyname`, `id_section_content`, `id_frontend_topnav`, `content_lang1`, `content_lang2`, `have_image`, `image_filename`, `have_colorbox`, `color_box`, `have_info1`, `info1`, `have_info2`, `info2`, `have_info3`, `info3`, `updated_date`, `updated_user`, `updated_ip_address`) VALUES
(1, 'About Us-Group Policy-logo-1', 2, 1000, '<p>Profil</p>', '<p>Implementieren Sie integrierte Unternehmensmanagementsysteme und verbessern Sie die Wettbewerbsf&auml;higkeit</p>', 0, NULL, 0, '', 0, NULL, 0, NULL, 0, NULL, '2019-08-22 04:00:00', 1, '1:1:1:1'),
(10001, 'Home-Heading-1', 1, 100, '<p><span style=\"font-weight: bold; color: #9f191f;\">PPID BPOM </span>memberikan informasi terlengkap kepada masyarakat</p>', '<p>-</p>', 1, 'image_content_10001.png', 0, '', 0, NULL, 0, NULL, 0, NULL, '2019-08-22 04:00:00', 1, '1:1:1:1'),
(10002, 'Home-Heading-2', 1, 100, '<p><span style=\"font-weight: bold; color: #9f191f;\">Piagram Anugerah BPOM<br /></span></p>', '<p>Die weltweit f&uuml;hrenden Hersteller von nat&uuml;rlichen Fettalkoholen (2)</p>', 1, 'image_content_10002.png', 0, '', 0, NULL, 0, NULL, 0, NULL, '2019-08-22 04:00:00', 1, '1:1:1:1'),
(10003, 'Home-Heading-3', 1, 100, '<p><span style=\"font-weight: bold; color: #9f191f;\"> The Leading Producers</span> of Natural Fatty Alcohols in The World (3)</p>', '<p>Die weltweit f&uuml;hrenden Hersteller von nat&uuml;rlichen Fettalkoholen (3)</p>', 1, 'image_content_10003.jpg', 0, '', 0, NULL, 0, NULL, 0, NULL, '2019-08-22 04:00:00', 1, '1:1:1:1'),
(10004, 'Home-Heading-4', 1, 100, '<p><span style=\"font-weight: bold; color: #9f191f;\"> The Leading Producers</span> of Natural Fatty Alcohols in The World (3)</p>', '<p>Die weltweit f&uuml;hrenden Hersteller von nat&uuml;rlichen Fettalkoholen (3)</p>', 1, '', 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL),
(10005, 'Home-Heading-5', 1, 100, '<p><span style=\"font-weight: bold; color: #9f191f;\"> The Leading Producers</span> of Natural Fatty Alcohols in The World (3)</p>', '<p>Die weltweit f&uuml;hrenden Hersteller von nat&uuml;rlichen Fettalkoholen (3)</p>', 1, '', 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL),
(10010, 'Our Location', 1, 100, '--', '--', 1, '', 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL),
(100410, 'About Us-Vission, Mission and Values-Mission', 2, 1004, 'Our vision is a landmark of direction to grow profitability through delivery of high quality products competitively to customers and develop high skill of our people in the oleochemicals industry.', 'Unsere Vision ist ein Meilenstein in der Richtung, die Rentabilität durch wettbewerbsfähige Lieferung hochwertiger Produkte an Kunden zu steigern und die Fähigkeiten unserer Mitarbeiter in der Oleochemieindustrie zu entwickeln.', 0, '', 0, '', 0, NULL, 0, NULL, 0, NULL, '2019-08-22 04:00:00', 1, '1:1:1:1'),
(100602, 'About Us-Group Commitment-2', 2, 1006, '<p>Gambar Komitment 2</p>', '<p>Engagement Bild 2</p>', 0, '', 0, '', 0, NULL, 0, NULL, 0, NULL, '2019-08-22 04:00:00', 1, '1:1:1:1'),
(200200, 'Application', 3, 2002, 'Ecogreen Oleochemicals products are easily found in a wide range of applications from Personal Care, Household Care, Food, Pharmaceuticals, Lubricants, up to Industrial and Technical Applications. The wide ranges of products used in our daily life that contain oleochemicals are quite important.', 'Ecogreen Oleochemicals products are easily found in a wide range of applications from Personal Care, Household Care, Food, Pharmaceuticals, Lubricants, up to Industrial and Technical Applications. The wide ranges of products used in our daily life that contain oleochemicals are quite important.', 1, '', 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL),
(200201, 'Application-Image-1', 3, 2002, '--', '--', 1, '', 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL),
(300534, 'Corporate Social Responsibility-4', 4, 3004, '<p><strong>2. Mangrove for Sustainable Livelihood</strong></p>\r\n<p>Global warming has decreased the number of fish and sea creatures in Batam water and caused local fishers change to be sand miner. In addition, threat of coastal abrasion is also become other concern for surrounding community.</p>\r\n<p>On April 2019, Ecogreen Oleochemical, with Kampung Kelembak and Aliansi Rehab Bumi together initiated to plant 1000 mangroves at Kampung Kelembak coastal line. Ecogreen is committed to continuously plant mangroves as well as monitor the mangrove plantation. We believe that the initiatives would bring constructive impacts to the environment quality in Kampung Kelembak and vision for tourist village in the future.</p>', '<p><strong>2. Mangrove for Sustainable Livelihood</strong></p>\r\n<p>Global warming has decreased the number of fish and sea creatures in Batam water and caused local fishers change to be sand miner. In addition, threat of coastal abrasion is also become other concern for surrounding community.</p>\r\n<p>On April 2019, Ecogreen Oleochemical, with Kampung Kelembak and Aliansi Rehab Bumi together initiated to plant 1000 mangroves at Kampung Kelembak coastal line. Ecogreen is committed to continuously plant mangroves as well as monitor the mangrove plantation. We believe that the initiatives would bring constructive impacts to the environment quality in Kampung Kelembak and vision for tourist village in the future.</p>', 0, '', 0, '', 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cpanel_leftmenu`
--

CREATE TABLE `cpanel_leftmenu` (
  `id_leftmenu` int(11) NOT NULL,
  `id_parent_leftmenu` int(11) NOT NULL,
  `has_child` int(1) NOT NULL,
  `menu_name` varchar(200) NOT NULL,
  `menu_icon` varchar(100) NOT NULL,
  `value_indo` varchar(250) NOT NULL,
  `value_eng` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `is_public` int(1) NOT NULL DEFAULT 0,
  `auth` text NOT NULL,
  `mobile_display` set('NONE','MOBILE_TOP','MOBILE_BOTTOM') NOT NULL,
  `visible` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `cpanel_leftmenu`
--

INSERT INTO `cpanel_leftmenu` (`id_leftmenu`, `id_parent_leftmenu`, `has_child`, `menu_name`, `menu_icon`, `value_indo`, `value_eng`, `url`, `is_public`, `auth`, `mobile_display`, `visible`) VALUES
(1300, 0, 1, 'CV', 'file-o', 'CV', 'CV', '#', 0, 'member', '', 1),
(1301, 1300, 0, 'Riwayat Pendidikan', 'comments-o', 'Riwayat Pendidikan', 'Riwayat Pendidikan', 'hrm-cv-riwayat-pendidikan/index', 0, 'member', 'MOBILE_TOP', 1),
(1302, 1300, 0, 'Riwayat Pekerjaan', 'comments-o', 'Riwayat Pekerjaan', 'Riwayat Pekerjaan', 'hrm-cv-riwayat-pekerjaan/index', 0, 'member', 'MOBILE_TOP', 1),
(1303, 1300, 0, 'Riwayat Kesehatan', 'comments-o', 'Riwayat Kesehatan', 'Riwayat Kesehatan', 'hrm-cv-kesehatan/index', 0, 'member', 'MOBILE_TOP', 1),
(1304, 1300, 0, 'Anggota Keluarga', 'comments-o', 'Anggota Keluarga', 'Anggota Keluarga', 'hrm-cv-keluarga/index', 0, 'member', 'MOBILE_TOP', 1),
(1305, 1300, 0, 'Kepemilikan Asuransi', 'comments-o', 'Kepemilikan Asuransi', 'Kepemilikan Asuransi', 'hrm-cv-asuransi/index', 0, 'member', 'MOBILE_TOP', 1),
(1306, 1300, 0, 'Keahlian Bahasa', 'comments-o', 'Keahlian Bahasa', 'Keahlian Bahasa', 'hrm-cv-language-skill/index', 0, 'member', 'MOBILE_TOP', 1),
(12000, 0, 1, 'Data Pegawai', 'users', 'Data Pegawai', 'Data Pegawai', '#', 0, 'admin', '', 1),
(12001, 12000, 0, 'Data Pegawai', 'user', 'Data Pegawai', 'Data Pegawai', 'hrm-pegawai/index', 0, 'admin', 'MOBILE_TOP', 1),
(13000, 0, 1, 'Konfigurasi Atribut Pegawai', 'sliders', 'Konfigurasi Atribut Pegawai', 'Konfigurasi Atribut Pegawai', '#', 0, 'admin', '', 1),
(13001, 13000, 0, 'Atribut Pegawai', 'file-o', 'Atribut Pegawai', 'Atribut Pegawai', 'personal-attribute/index', 0, 'admin', 'MOBILE_TOP', 1),
(13002, 13000, 0, 'Master Personal Atribut', 'database', 'Master Personal Atribut', 'Master Personal Atribut', 'mst-personal-attribute/index', 0, 'admin', 'MOBILE_TOP', 1),
(13003, 13000, 0, 'Master Personal Grade', 'database', 'Master Personal Grade', 'Master Personal Grade', 'mst-personal-attribute-grade/index', 0, 'admin', 'MOBILE_TOP', 1),
(14000, 0, 1, 'Konfigurasi Atribut Jabatan', 'sliders', 'Konfigurasi Atribut Jabatan', 'Konfigurasi Atribut Jabatan', '#', 0, 'admin', '', 1),
(14001, 14000, 0, 'Master Jabatan', 'file-o', 'Master Jabatan', 'Master Jabatan', 'jabatan/index', 0, 'admin', 'MOBILE_TOP', 1),
(14002, 14000, 0, 'Atribut Jabatan', 'file-o', 'Atribut Jabatan', 'Atribut Jabatan', 'jabatan-attribute/index', 0, 'admin', 'MOBILE_TOP', 1),
(14003, 14000, 0, 'Master Atribut Jabatan', 'database', 'Master Atribut Jabatan', 'Master Atribut Jabatan', 'mst-jabatan-attribute/index', 0, 'admin', 'MOBILE_TOP', 1),
(14004, 14000, 0, 'Master Grade Jabatan', 'database', 'Master Grade Jabatan', 'Master Grade Jabatan', 'mst-jabatan-attribute-grade/index', 0, 'admin', 'MOBILE_TOP', 1),
(15000, 0, 1, 'Konfigurasi Atribut Environment', 'sliders', 'Konfigurasi Atribut Environment', 'Konfigurasi Atribut Environment', '#', 0, 'admin', '', 1),
(15001, 15000, 0, 'Master Environment', 'file-o', 'Master Environment', 'Master Environment', 'kabupaten/index', 0, 'admin', 'MOBILE_TOP', 1),
(15002, 15000, 0, 'Atribut Environment', 'file-o', 'Atribut Environment', 'Atribut Environment', 'environment-attribute/index', 0, 'admin', 'MOBILE_TOP', 1),
(15003, 15000, 0, 'Master Atribut Environment', 'database', 'Master Atribut Environment', 'Master Atribut Environment', 'mst-environment-attribute/index', 0, 'admin', 'MOBILE_TOP', 1),
(15004, 15000, 0, 'Master Grade Environment', 'database', 'Master Grade Environment', 'Master Grade Environment', 'mst-environment-attribute-grade/index', 0, 'admin', 'MOBILE_TOP', 1),
(16000, 0, 1, 'Konfigurasi Atribut Organization', 'sliders', 'Konfigurasi Atribut Organization', 'Konfigurasi Atribut Organization', '#', 0, 'admin', '', 1),
(16001, 16000, 0, 'Master Organization', 'file-o', 'Master Organization', 'Master Organization', 'perusahaan/index', 0, 'admin', 'MOBILE_TOP', 1),
(16002, 16000, 0, 'Atribut Organization', 'file-o', 'Atribut Organization', 'Atribut Organization', 'organization-attribute/index', 0, 'admin', 'MOBILE_TOP', 1),
(16003, 16000, 0, 'Master Atribut Organization', 'database', 'Master Atribut Organization', 'Master Atribut Organization', 'mst-organization-attribute/index', 0, 'admin', 'MOBILE_TOP', 1),
(16004, 16000, 0, 'Master Grade Organization', 'database', 'Master Grade Organization', 'Master Grade Organization', 'mst-organization-attribute-grade/index', 0, 'admin', 'MOBILE_TOP', 1),
(17000, 0, 1, 'Matching Atribut ', 'sliders', 'Matching Atribut ', 'Matching Atribut ', '#', 0, 'admin', '', 1),
(17001, 17000, 0, 'Matching Jabatan', 'check', 'Matching Jabatan', 'Matching Jabatan', 'matching-personal-jabatan/index', 0, 'admin', 'MOBILE_TOP', 1),
(17002, 17000, 0, 'Matching Organization', 'check', 'Matching Organization', 'Matching Organization', 'matching-personal-organization/index', 0, 'admin', 'MOBILE_TOP', 1),
(17003, 17000, 0, 'Matching Environment', 'check', 'Matching Environment', 'Matching Environment', 'matching-personal-environment/index', 0, 'admin', 'MOBILE_TOP', 1),
(34000, 0, 1, 'Master Data', 'database', 'Master Data', 'Master Data', '#', 0, 'admin', '', 1),
(34001, 34000, 0, 'Tingkat Pendidikan', 'graduation-cap', 'Tingkat Pendidikan', 'Tingkat Pendidikan', 'mst-tingkat-pendidikan/index', 0, 'admin', 'MOBILE_TOP', 1),
(34002, 34000, 0, 'Sekolah', 'building', 'Sekolah', 'Sekolah', 'data-sekolah/index', 0, 'admin', 'MOBILE_TOP', 1),
(34003, 34000, 0, 'Jurusan', 'list-alt', 'Jurusan', 'Jurusan', 'data-jurusan/index', 0, 'admin', 'MOBILE_TOP', 1),
(34004, 34000, 0, 'Bahasa', 'language', 'Bahasa', 'Bahasa', 'hrm-mst-bahasa/index', 0, 'admin', 'MOBILE_TOP', 1),
(34005, 34000, 0, 'Jenis Tunjangan Kesehatan', 'money', 'Jenis Tunjangan Kesehatan', 'Jenis Tunjangan Kesehatan', 'hrm-mst-jenis-tunjangan-kesehatan/index', 0, 'admin', 'MOBILE_TOP', 1),
(34006, 34000, 0, 'Jenis Penyakit', 'heartbeat', 'Jenis Penyakit', 'Jenis Penyakit', 'mst-jenis-penyakit/index', 0, 'admin', 'MOBILE_TOP', 1),
(34007, 34000, 0, 'Jenis Asuransi', 'wheelchair', 'Jenis Asuransi', 'Jenis Asuransi', 'hrm-mst-jenis-asuransi/index', 0, 'admin', 'MOBILE_TOP', 1),
(34008, 34000, 0, 'Perusahaan Asuransi', 'hospital-o', 'Perusahaan Asuransi', 'Perusahaan Asuransi', 'hrm-perusahaan-asuransi/index', 0, 'admin', 'MOBILE_TOP', 1),
(35000, 0, 1, 'Setting', 'cogs', 'Setting', 'Setting', '#', 0, 'admin', '', 1),
(35001, 35000, 0, 'Setting Aplikasi', 'gear', 'Setting Aplikasi', 'Setting Aplikasi', 'app-setting/index', 0, 'admin', 'MOBILE_TOP', 1),
(36000, 0, 1, 'Manajemen User', 'users', 'Manajemen User', 'User Management', '#', 0, 'admin', '', 1),
(36001, 36000, 0, 'User Perusahaan', 'users', 'User Perusahaan', 'User Perusahaan', 'user-perusahaan/index', 0, 'admin', 'MOBILE_TOP', 0),
(36002, 36000, 0, 'User', 'user', 'User', 'User', 'user/index', 0, 'admin', 'MOBILE_TOP', 1),
(36003, 36000, 0, 'RBAC', 'user', 'RBAC', 'RBAC', 'admin/assignment', 0, 'admin', 'MOBILE_TOP', 0),
(36004, 36000, 0, 'Generate User', 'user-circle-o', 'Generate User', 'Generate User', 'hrm-pegawai/generatepegawai', 0, 'admin', '', 1),
(100000, 0, 1, 'Management RBAC', 'gear', 'Management RBAC', 'Management RBAC', '', 0, 'super', '', 0),
(100001, 100000, 0, 'Assignments', 'circle', 'Assignments', 'Assignments', 'admin/assignment', 0, 'super', 'MOBILE_TOP', 1),
(100002, 100000, 0, 'Roles', 'circle', 'Roles', 'Roles', 'admin/role', 0, 'super', 'MOBILE_TOP', 0),
(100003, 100000, 0, 'Permissions', 'circle', 'Permissions', 'Permissions', 'admin/permission', 0, 'super', 'MOBILE_TOP', 0),
(100004, 100000, 0, 'Routes', 'circle', 'Routes', 'Routes', 'admin/route', 0, 'super', 'MOBILE_TOP', 0),
(100005, 100000, 0, 'Rules', 'circle', 'Rules', 'Rules', 'admin/rule', 0, 'super', 'MOBILE_TOP', 0),
(1100000, 0, 0, 'Logout ', 'sign-out', 'Logout ', 'Logout ', 'site/logout', 0, 'admin, member, super', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` bigint(20) NOT NULL,
  `nama_customer` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nomor_telepon` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `npwp` varchar(250) DEFAULT NULL,
  `nama_kontak` varchar(250) DEFAULT NULL,
  `limit_kredit` bigint(20) DEFAULT 0,
  `total_kredit` bigint(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat`, `id_kabupaten`, `nomor_telepon`, `email`, `npwp`, `nama_kontak`, `limit_kredit`, `total_kredit`) VALUES
(1, 'Kampung Daun', 'Jl. Gajah', 1112, '09182312', 'kampungdaun@gmail.com', '801238012312', 'Data-data', 90000000, 0),
(2, 'Gani', 'Jl. Alamat', 1112, '08135546', 'gani@gmail.com', '123498765433', '', 50000000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jurusan`
--

CREATE TABLE `data_jurusan` (
  `id_jurusan` bigint(20) NOT NULL,
  `nama_jurusan_id` varchar(250) NOT NULL,
  `nama_jurusan_en` varchar(250) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `data_jurusan`
--

INSERT INTO `data_jurusan` (`id_jurusan`, `nama_jurusan_id`, `nama_jurusan_en`, `status`) VALUES
(1, 'Sistem Informasi', 'Information System', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_sekolah`
--

CREATE TABLE `data_sekolah` (
  `id_sekolah` bigint(21) NOT NULL,
  `code_id` bigint(20) NOT NULL,
  `nama_sekolah` varchar(250) NOT NULL,
  `nama_sekolah_short` varchar(50) DEFAULT NULL,
  `alamat_sekolah` varchar(250) DEFAULT NULL,
  `is_valid` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `data_sekolah`
--

INSERT INTO `data_sekolah` (`id_sekolah`, `code_id`, `nama_sekolah`, `nama_sekolah_short`, `alamat_sekolah`, `is_valid`) VALUES
(1, 1, 'Telkom School Buah Batu', 'SD Telkom', 'Jl. BKR No.11, Cijagra, Kec. Lengkong, Kota Bandung, Jawa Barat 40265', 1),
(2, 2, 'SMAN 8 Bandung', 'SMAN8', 'Jl Buah Batu', 1),
(4, 0, 'SMAN 3 Bandung', 'SMAN3', 'Jl. Belitung No. 45', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `diklat_pegawai`
--

CREATE TABLE `diklat_pegawai` (
  `id_diklat` int(10) NOT NULL,
  `nama_diklat` varchar(250) NOT NULL,
  `tanggal_diklat` date NOT NULL,
  `id_diklat_pegawai_kategori` int(10) NOT NULL,
  `penyelenggara` varchar(50) NOT NULL,
  `jumlah_peserta` int(50) NOT NULL,
  `syarat` varchar(250) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `diklat_pegawai`
--

INSERT INTO `diklat_pegawai` (`id_diklat`, `nama_diklat`, `tanggal_diklat`, `id_diklat_pegawai_kategori`, `penyelenggara`, `jumlah_peserta`, `syarat`, `deskripsi`, `status`) VALUES
(1, 'Diklatsar Pelindo', '2022-08-24', 2, 'Pelindo', 50, 'Telah menguasai keahlian dasar membongkar dan memuat', 'Pelatihan lanjutan untuk penanganan untuk membongkar dan memuat barang', 'selesai'),
(3, 'Diklat Alat Ringan', '2022-08-28', 2, 'PT. Makmur Sentosa Sejahtera Abadi', 200, 'Memiliki ijazah SMA/Sederajat (Minimal)', 'Diperuntukkan bagi anggota yang memiliki ijazah SMA/Sederajat', 'selesai'),
(4, 'Diklatsar Pelindo', '2022-08-24', 2, 'Pelindo', 200, 'Telah menguasai keahlian dasar membongkar dan memuat', 'Pelatihan lanjutan untuk penanganan untuk membongkar dan memuat barang', 'selesai'),
(5, 'Diklat Perindo', '2022-09-07', 2, 'PT. Selamat Datang', 200, 'punya ijazah', 'Pelatihan lanjutan untuk penanganan untuk membongkar dan memuat barang', ''),
(6, 'pakde jojo', '2022-09-07', 1, 'PT. Makmur Sentosa Sejahtera Abadi', 50, 'Memiliki ijazah SMA/Sederajat (Minimal)', 'Pelatihan lanjutan untuk penanganan untuk membongkar dan memuat barang', 'selesai'),
(7, 'DIKLAT MADS', '2022-09-14', 2, 'PT. MADS', 150, 'Memiliki ijazah SMA/Sederajat (Minimal)', 'Diperuntukkan bagi anggota yang memiliki ijazah SMA/Sederajat', ''),
(8, 'Diklat Memasak', '2022-09-11', 2, 'PT.XYZ', 50, 'Sehat', 'Diklat memasak untuk pemula', 'selesai'),
(9, 'Diklatsar Pelindo3', '2022-09-08', 2, 'Pelindo', 50, 'Memiliki ijazah SMA/Sederajat (Minimal)', 'Diperuntukkan bagi anggota yang memiliki ijazah SMA/Sederajat', ''),
(10, 'Diklatsar Bongkar Muat Kapal', '2022-10-28', 1, 'Koperasi TKBM', 100, 'Memiliki ijazah SMA/Sederajat (Minimal)', 'Diklat dimulai pada pukul 07.00 sampai dengan 17.00', 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diklat_pegawai_kategori`
--

CREATE TABLE `diklat_pegawai_kategori` (
  `id_diklat_pegawai_kategori` int(10) NOT NULL,
  `Kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `diklat_pegawai_kategori`
--

INSERT INTO `diklat_pegawai_kategori` (`id_diklat_pegawai_kategori`, `Kategori`) VALUES
(1, 'INTERNAL'),
(2, 'EKSTERNAL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diklat_pegawai_list`
--

CREATE TABLE `diklat_pegawai_list` (
  `id_peserta` int(10) NOT NULL,
  `id_diklat` int(10) NOT NULL,
  `id_pegawai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `diklat_pegawai_list`
--

INSERT INTO `diklat_pegawai_list` (`id_peserta`, `id_diklat`, `id_pegawai`) VALUES
(33, 1, 4),
(38, 1, 6),
(43, 4, 5),
(45, 3, 5),
(46, 3, 7),
(47, 3, 8),
(52, 6, 11),
(53, 7, 10),
(54, 7, 4),
(55, 8, 11),
(56, 9, 5),
(57, 10, 11),
(58, 10, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `frontend_topnav`
--

CREATE TABLE `frontend_topnav` (
  `id_frontend_topnav` int(11) NOT NULL,
  `id_parent_topnav` int(11) NOT NULL,
  `is_expanded` int(1) NOT NULL DEFAULT 0,
  `menu_name_lang1` varchar(250) DEFAULT NULL,
  `menu_name_lang2` varchar(250) DEFAULT NULL,
  `description_lang1` varchar(250) DEFAULT NULL,
  `description_lang2` varchar(250) DEFAULT NULL,
  `link_url` varchar(250) NOT NULL,
  `file_image` varchar(250) DEFAULT NULL,
  `is_visible` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `frontend_topnav`
--

INSERT INTO `frontend_topnav` (`id_frontend_topnav`, `id_parent_topnav`, `is_expanded`, `menu_name_lang1`, `menu_name_lang2`, `description_lang1`, `description_lang2`, `link_url`, `file_image`, `is_visible`) VALUES
(100, 0, 0, 'Beranda', 'Zuhause', '', '', 'index', '', 1),
(1000, 0, 1, 'Profil', 'Über uns', '<p>Profil PPID BPOM dapat dilihat di sini. Informasi seperti sejarah, tugas dan fungsi serta struktur organisasi</p>', '', '', 'topnav_1000.jpg', 1),
(1001, 1000, 0, 'Sejarah', 'Firmenlogo', '', '', 'sejarah', '', 1),
(1002, 1000, 0, 'Tugas dan Fungsi', 'Firmenprofil', '', '', 'tugas_dan_fungsi', '', 1),
(1003, 1000, 0, 'Stuktur Organisasi', 'Unsere Position', '', '', 'struktur_organisasi', '', 1),
(1004, 1000, 0, 'Galeri', 'Vision, Mission und Werte', '', '', 'galeri', '', 1),
(2000, 0, 0, 'Regulasi', '', '', '', 'regulasi', '', 1),
(3000, 0, 1, 'Informasi Publik', 'Nachhaltigkeit', '<p>Anda dapat melihat beberapa informasi publik seperti informasi berkala, informasi serta merta dan informasi setiap saat.</p>', '', '', 'topnav_3000.jpeg', 1),
(3001, 3000, 0, 'Informasi Secara Berkala', 'Nachhaltigkeits-Dashboard', NULL, NULL, 'informasi-berkala', '', 1),
(3002, 3000, 0, 'Informasi Serta Merta', 'Nachhaltigkeitsverpflichtung', '', '', 'informasi-serta-merta', '', 1),
(3003, 3000, 0, 'Informasi Setiap Saat', 'Beschwerde', '', '', 'informasi-setiap-saat', '', 1),
(4000, 0, 0, 'Laporan', '', '', '', 'laporan', '', 1),
(5000, 0, 1, 'Standard Layanan', '', '<p>Anda dapat memperoleh informasi terkait standard layanan seperti SOP, Media, Permohonan Informasi, pengajuan keberatan, dsb.</p>', '', '', 'topnav_5000.jpg', 1),
(5001, 5000, 0, 'SOP Layanan', 'Kontaktiere uns', '', '', 'sop-layanan', '', 1),
(5002, 5000, 0, 'Media Layanan', NULL, NULL, NULL, 'media-layanan', NULL, 1),
(5003, 5000, 0, 'Maklumat Layanan', NULL, NULL, NULL, 'maklumat-layanan', NULL, 1),
(5004, 5000, 0, 'Permohonan Informasi', NULL, NULL, NULL, 'permohonan-informasi', NULL, 1),
(5005, 5000, 0, 'Biaya Layanan', NULL, NULL, NULL, 'biaya-layanan', NULL, 1),
(5006, 5000, 0, 'Jadwal Layanan', NULL, NULL, NULL, 'jadwal-layanan', NULL, 1),
(5007, 5000, 0, 'Pengajuan Keberatan', NULL, NULL, NULL, 'pengajuan-keberatan', NULL, 1),
(5008, 5000, 0, 'Permohonan Penyelesaian Sengketa Informasi', NULL, NULL, NULL, 'penyelesaian-sengketa', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `home_info`
--

CREATE TABLE `home_info` (
  `id_home_info` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `home_info`
--

INSERT INTO `home_info` (`id_home_info`, `no`, `judul`, `deskripsi`) VALUES
(1, 1, 'Smart Farming', 'Smart Farming merupakan sebuah sistem yang digunakan untuk... (silakan diisi)'),
(2, 2, 'Drone & Sensor', 'Salah satu teknologi yang digunakan dalam smart farming ini adalah penggunaan teknologi drone dan sensor.'),
(3, 3, 'Aktif Monitoring', 'Anda sebagai pemilik lahan ataupun pengelola lahan (mandor / petani) dapat melakukan monitoring lahan pertanian secara aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_absensi_pegawai`
--

CREATE TABLE `hrm_absensi_pegawai` (
  `id_hrm_absensi_pegawai` bigint(20) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal_absen` date NOT NULL,
  `id_mst_jenis_absensi` int(11) NOT NULL,
  `waktu_login` datetime DEFAULT NULL,
  `waktu_logout` datetime DEFAULT NULL,
  `izin_antara_logout` datetime DEFAULT NULL,
  `izin_antara_login` datetime DEFAULT NULL,
  `total_menit_kerja` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_id_user` int(11) DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_id_user` int(11) DEFAULT NULL,
  `modified_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_competency_dimension`
--

CREATE TABLE `hrm_competency_dimension` (
  `id_hrm_competency_dimension` bigint(20) NOT NULL,
  `id_hrm_competency_cluster` int(11) NOT NULL,
  `id_hrm_competency_category` int(11) NOT NULL,
  `competeny_dimension_eng` varchar(250) NOT NULL,
  `no` int(11) NOT NULL,
  `abbr_eng` varchar(20) NOT NULL,
  `description_eng` text NOT NULL,
  `keywords_eng` varchar(250) NOT NULL,
  `competeny_dimension_ind` varchar(250) NOT NULL,
  `abbr_ind` varchar(20) NOT NULL,
  `description_ind` text NOT NULL,
  `keywords_ind` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hrm_competency_dimension`
--

INSERT INTO `hrm_competency_dimension` (`id_hrm_competency_dimension`, `id_hrm_competency_cluster`, `id_hrm_competency_category`, `competeny_dimension_eng`, `no`, `abbr_eng`, `description_eng`, `keywords_eng`, `competeny_dimension_ind`, `abbr_ind`, `description_ind`, `keywords_ind`) VALUES
(30101, 301, 30101, '', 1, '', '', '', 'Integritas', 'INTEG', 'Konsisten berperilaku selaras dengan nilai, norma dan/atau etika organisasi, dan jujur dalam hubungan dengan manajemen, rekan kerja, bawahan langsung, dan pemangku kepentingan, menciptakan budaya etika tinggi, bertanggungjawab atas tindakan atau keputusan beserta risiko yang menyertainya.', ''),
(30102, 301, 30101, '', 2, '', '', '', 'Kerjasama', 'KS', 'Kemampuan menjalin, membina, mempertahankan hubungan kerja yang efektif, memiliki komitmen saling membantu dalam penyelesaian tugas, dan mengoptimalkan segala sumberdaya untuk mencapai tujuan strategis organisasi', ''),
(30103, 301, 30101, '', 3, '', '', '', 'Komunikasi', 'KOM', 'Kemampuan untuk menerangkan pandangan dan gagasan secara jelas, sistematis disertai argumentasi yang logis dengan cara-cara yang sesuai baik secara lisan maupun tertulis; memastikan pemahaman; mendengarkan secara aktif dan efektif; mempersuasi, meyakinkan dan membujuk orang lain dalam rangka mencapai tujuan organisasi', ''),
(30104, 301, 30101, '', 4, '', '', '', 'Orientasi pada Hasil', 'OPH', 'Kemampuan mempertahankan komitmen pribadi yang tinggi untuk menyelesaikan tugas, dapat diandalkan, bertanggung jawab, mampu secara sistimatis mengidentifikasi risiko dan peluang dengan memperhatikan keterhubungan antara perencanaan dan hasil, untuk keberhasilan organisasi.', ''),
(30105, 301, 30101, '', 5, '', '', '', 'Pelayanan Publik', 'PP', 'Kemampuan dalam melaksanakan tugas-tugas pemerintahan, pembangunan dan kegiatan pemenuhan kebutuhan pelayanan publik secara profesional, transparan, mengikuti standar pelayanan yang objektif, netral, tidak memihak, tidak diskriminatif, serta tidak terpengaruh kepentingan pribadi/kelompok/golongan/partai politik', ''),
(30106, 301, 30101, '', 6, '', '', '', 'Pengembangan Diri dan Orang Lain', 'PDOL', 'Kemampuan untuk meningkatkan pengetahuan dan menyempurnakan keterampilan diri; menginspirasi orang lain untuk mengembangkan dan menyempurnakan pengetahuan dan keterampilan yang relevan dengan pekerjaan dan pengembangan karir jangka panjang, mendorong kemauan belajar sepanjang hidup, memberikan saran/bantuan, umpan balik, bimbingan untuk membantu orang lain untuk mengembangkan potensi dirinya.', ''),
(30107, 301, 30101, '', 7, '', '', '', 'Mengelola Perubahan', 'MP', 'Kemampuan dalam menyesuaikan diri dengan situasi yang baru atau berubah dan  tidak  bergantung secara berlebihan pada metode dan proses lama, mengambil tindakan  untuk mendukung dan melaksanakan insiatif perubahan, memimpin usaha perubahan, mengambil tanggung jawab pribadi untuk memastikan  perubahan berhasil diimplementasikan secara efektif.', ''),
(30108, 301, 30101, '', 8, '', '', '', 'Pengambilan Keputusan.', 'PK', 'Kemampuan membuat keputusan yang baik secara tepat waktu dan dengan keyakinan diri setelah mempertimbangkan prinsip kehati-hatian, dirumuskan secara sistematis dan seksama berdasarkan berbagai informasi, alternatif pemecahan masalah dan konsekuensinya, serta bertanggung jawab atas keputusan yang diambil.', ''),
(30111, 301, 30102, '', 9, '', '', '', 'Perekat Bangsa', 'PB', 'Kemampuan dalam mempromosikan sikap toleransi, keterbukaan, peka terhadap perbedaan individu/kelompok masyarakat; mampu menjadi perpanjangan tangan pemerintah dalam mempersatukan masyarakat dan membangun hubungan sosial psikologis dengan masyarakat di tengah kemajemukan Indonesia sehingga menciptakan kelekatan yang kuat antara ASN dan para pemangku kepentingan serta diantara para pemangku kepentingan itu sendiri; menjaga, mengembangkan, dan mewujudkan rasa persatuan dan kesatuan dalam kehidupan bermasyarakat, berbangsa dan bernegara Indonesia', ''),
(2010101, 201, 20101, '', 1, '', '', '', 'Fleksibilitas Berpikir', 'FB', 'Kemampuan menggunakan berbagai sudut pandang dalam menghadapi tuntutan perubahan', 'Mampu menggunakan berbagai sudut pandang'),
(2010102, 201, 20101, '', 2, '', '', '', 'Inovasi', 'Inov', 'Kemampuan memunculkan ide / gagasan dan pemikiran baru dalam rangka meningkatkan efektivitas kerja', 'Mampu membuat ide / gagasan dan pemikiran baru'),
(2010103, 201, 20101, '', 3, '', '', '', 'Berpikir Analitis', 'BA', 'Kemampuan menguraikan permasalahan berdasarkan informasi yang relevan dari berbagai sumber secara komprehensif untuk mengidentifikasi penyebab dan dampak terhadap organisasi', 'Mampu menganalisis permasalahan atau mengurai permasalahan'),
(2010104, 201, 20101, '', 4, '', '', '', 'Berpikir Konseptual', 'BK', 'Kemampuan menghubungkan pola menjadi hubungan dalam suatu rangkaian informasi untuk membentuk pemahaman baru terhadap informasi tersebut', 'Mampu menghubungkan pola menjadi hubungan suatu informasi'),
(2010205, 201, 20102, '', 5, '', '', '', 'Adaptasi terhadap Perubahan', 'AtP', 'Kemampuan menyesuaikan diri terhadap perubahan sehingga tetap dapat mempertahankan efektivitas kerja', 'Mampu menyesuaikan terhadap perubahan situasi dalam lingkungan kerja'),
(2010206, 201, 20102, '', 6, '', '', '', 'Integritas', 'Int', 'Kemampuan bertindak secara konsisten dan transparan dalam segala situasi dan kondisi sesuai dengan nilai - nilai, norma atau etika yang berlaku di lingkungan kerja', 'Mempu bertindak secara konsisten'),
(2010207, 201, 20102, '', 7, '', '', '', 'Keuletan', 'Keu', 'Kemampuan untuk mau bekerja keras dan tidak mudah putus asa dalam berusaha mencapai tujuan dan mampu mempertahankannya', 'Mampu bekerja keras dan tidak mudah putus asa'),
(2010208, 201, 20102, '', 8, '', '', '', 'Pengendalian Diri', 'PD', 'Kemampuan untuk mengendalikan diri pada saat menghadapi masalah yang sulit, kritik dari orang lain ', 'Mampu mengendalikan diri pada saat bekerja di bawah tekanan'),
(2010209, 201, 20102, '', 9, '', '', '', 'Komitmen terhadap Organisasi', 'KtO', 'Komitmen terhadap Organisasi (KtO) Kemampuan untuk menyelaraskan perilaku pribadi dengan kepentingan organisasi dalam rangka mewujudkan visi dan misi', 'Mampu menyelaraskan perilaku diri dengan melibatkan diri dalam kepentingan organisasi'),
(2010210, 201, 20102, '', 10, '', '', '', 'Inisiatif', 'Ini', 'Kemampuan mengambil langkah-langkah aktif tanpa menunggu perintah untuk tujuan organisasi', 'Mampu mengambil langkah aktif tanpa menunggu perintah'),
(2010211, 201, 20102, '', 11, '', '', '', 'Semangat Berprestasi ', 'SB', 'Kemampuan untuk selalu meningkatkan kinerja dengan lebih baik di atas standar secara terus-menerus', 'Mampu meningkatkan Kinerja'),
(2010312, 201, 20103, '', 12, '', '', '', 'Kerja Sama ', 'KS', 'Kemampuan menyelesaikan pekerjaan secara bersama-sama dengan menjadi bagian dari suatu kelompok untuk mencapai tujuan unit / organisasi', 'Mampu bekerja dalam kelompok untuk mencapai tujuan organisasi'),
(2010313, 201, 20103, '', 13, '', '', '', 'Mengembangkan Orang Lain ', 'MOL', 'Kemampuan melakukan upaya untuk mendorong pengembangan potensi orang lain agar dapat bekerja lebih baik', 'Mampu mengembangkan potensi orang lain'),
(2010314, 201, 20103, '', 14, '', '', '', 'Kepemimpinan', 'Kp', 'Kemampuan meyakinkan, mempengaruhi dan memotivasi orang lain dengan tujuan agar mereka mengikuti dan melaksanakan rencana kerja unit / organisasi', 'Mampu meyakinkan, mempengaruhi dan memotivasi orang'),
(2010315, 201, 20103, '', 15, '', '', '', 'Membimbing', 'M', 'Kemampuan memberikan bimbingan dan umpan balik secara teratur terhadap bawahan agar bekerja secara terarah sesuai dengan rencana', 'Mampu membimbing dan memberikan umpan balik kepada bawahan'),
(2010416, 201, 20104, '', 16, '', '', '', 'Berorientasi Pada Pelayanan', 'BpP', 'Kemampuan melakukan upaya untuk mengetahui, memahami, dan memenuhi kebutuhan pelanggan dalam setiap aktivitas pekerjaannya', 'Mampu memberikan kepuasan pelanggan'),
(2010417, 201, 20104, '', 17, '', '', '', 'Kesadaran Akan Keselamatan Kerja ', 'K3', 'Kemampuan untuk sadar dan tanggap, serta perduli terhadap kondisi-kondisi yang dapat mempengaruhi keselamatan pegawai', 'Mampu untuk tanggap, sadar dan perduli terhadap keselamatan kerja'),
(2010418, 201, 20104, '', 18, '', '', '', 'Membangun Hubungan Kerja', 'MHK', 'Kemampuan menjalin dan membina hubungan kerja dengan pihak-pihak yang terkait dalam rangka pencapaian tujuan organisasi', 'Mampu menjalin dan membina hubungan kerja'),
(2010419, 201, 20104, '', 19, '', '', '', 'Negosiasi', 'Nego', 'Kemampuan untuk menemukan berbagai alternatif dalam rangka membuat kesepakatan dengan mengakomodir kepentingan semua pihak', 'Mampu membuat kesepakatan yang menguntungkan'),
(2010420, 201, 20104, '', 20, '', '', '', 'Kewirausahaan', 'Ke', 'Kemampuan mencari, menciptakan serta menerapkan cara kerja, teknologi dan produk baru untuk memberdayakan organisasi dalam rangka meningkatkan kualitas pelayanan', 'Mampu memberdayakan organisasi'),
(2010421, 201, 20104, '', 21, '', '', '', 'Pencarian Informasi ', 'PI', 'Kemampuan mengumpulkan data/informasi yang dibutuhkan secara sistematik untuk menunjang kelancaran pelaksanaan pekerjaan dan pengambilan keputusan', 'Mampu menggali berbagai data/informasi secara sistematik'),
(2010422, 201, 20104, '', 22, '', '', '', 'Perhatian terhadap Keteraturan ', 'PtK', 'Kemampuan untuk memastikan/mengu-rangi ketidakpastian khususnya berkaitan dengan penugasan, kualitas, dan ketepatan/ketelitian data serta informasi di tempat kerja', 'Mampu melaksanakan keteraturan sesuai dengan standar pekerjaan'),
(2010423, 201, 20104, '', 23, '', '', '', 'Komunikasi Lisan', 'Komlis', 'Kemampuan menyampaikan pendapat/ide/informasi secara lisan dengan menggunakan kata/kalimat yang mudah dimengerti', 'Mampu berkomunikasi lisan yang mudah dimengerti'),
(2010424, 201, 20104, '', 24, '', '', '', 'Komunikasi Tertulis ', 'Komtul', 'Kemampuan menyampaikan pendapat/ide/informasi secara jelas dengan menggunakan tulisan dan tata bahasa dengan baik dan benar', 'Mampu menyampaikan gagasan yang mudah diterima pembaca'),
(2010425, 201, 20104, '', 25, '', '', '', 'Pengambilan Keputusan ', 'PK', 'Kemampuan mengambil tindakan secara cepat dan tepat dengan mempertimbangkan dampak serta bertanggung jawab dengan keputusannya', 'Mampu bertindak cepat dan tepat dalam keputusan'),
(2010426, 201, 20104, '', 26, '', '', '', 'Pengorganisasian', 'P', 'Kemampuan mengkoordinasikan pelaksanaan pekerjaan agar berjalan sesuai dengan rencana yang telah ditetapkan', 'Mampu mengkoordinasikan kegiatan'),
(2010427, 201, 20104, '', 27, '', '', '', 'Perencanaan', 'Per', 'Kemampuan menyusun rencana kerja yang spesifik, realistis, dan terukur sesuai dengan visi, misi dan tujuan jangka panjang organisasi', 'Mampu menyusun rencana kerja'),
(2010428, 201, 20104, '', 28, '', '', '', 'Manajemen Perubahan ', 'MP', 'Kemampuan mengelola sumber daya untuk menghadapi tuntutan perubahan dalam rangka mencapai tujuan organisasi dengan kinerja yang lebih baik', 'Mampu merespon dinamika perubahan'),
(2010429, 201, 20104, '', 29, '', '', '', 'Berorientasi pada Kualitas', 'BpK', 'Kemampuan melaksanakan tugas-tugas dengan mempertimbangkan semua aspek pekerjaan secara detil untuk mencapai mutu yang lebih baik', 'Mampu mencapai mutu pada semua aspek pekerjaan'),
(2010430, 201, 20104, '', 30, '', '', '', 'Manajemen Konflik ', 'MK', 'Kemampuan mengambil langkah-langkah untuk mengelola perselisihan menuju arah yang produktif', 'Mampu penyelesaian konflik'),
(2010531, 201, 20105, '', 31, '', '', '', 'Tanggap Terhadap Pengaruh Budaya ', 'TPB', 'Kemampuan menghargai keragaman budaya dan perbedaannya yang menjadi latar belakang individu pegawai dan lingkungan masyarakat di sekitarnya', 'Mampu menghargai keragaman budaya pegawai dan lingkungan masyarakat'),
(2010532, 201, 20105, '', 32, '', '', '', 'Empati', 'E', 'Kemampuan untuk mendengarkan dan memahami pikiran, perasaan, atau masalah orang lain yang tidak terucapkan atau tidak sepenuhnya disampaikan', 'Mampu perduli terhadap orang lain'),
(2010533, 201, 20105, '', 33, '', '', '', 'Interaksi Sosial ', 'Is', 'Kemampuan Membangun kontak atau hubungan timbal balik yang menghasilkan suatu proses pengaruh mempengaruhi atau individu, antara kelompok atau antar individu dan kelompok', 'Mampu membangun keterikatan dan hubungan timbal balik'),
(2010541, 202, 20106, '', 1, '', '', '', 'Kebijakan Pembangunan Daerah', 'KPD', 'Kemampuan untuk merumuskan kebijakan pembangunan daerah yang bersifat jangka pendek, menengah, dan panjang', ''),
(2010542, 202, 20106, '', 2, '', '', '', 'Pengelolaan Keuangan Daerah \r\n', 'PKD', 'Kemampuan dalam  proses penyusunan APBD,  pencairan anggaran, pertanggungjawaban laporan keuangan', ''),
(2010543, 202, 20106, '', 3, '', '', '', 'Pengelolaan SDA', 'PSDA', 'Kemampuan dalam pengelolaan sumber daya aparatur  pemerintah', ''),
(2010544, 202, 20106, '', 4, '', '', '', 'Pengelolaan Barang / Jasa dan Aset Dinas ', 'PBJ', 'Kemampuan dalam pengelolaan barang/jasa dan aset dinas', ''),
(2010545, 202, 20106, '', 5, '', '', '', 'Data dan Statistik', 'Dat', 'Analisa Data Urusan Pemerintahan dan Kerjasama', ''),
(2010546, 202, 20106, '', 6, '', '', '', 'Teknologi Informasi', 'TI', 'Kemampuan  mengoperasikan dan  memanfaatkan sistm informasi dan teknologi yang mendukung pekerjaan', ''),
(2010547, 202, 20107, '', 1, '', '', '', 'Perumusan Kebijakan Urusan Pertanahan', 'Tanah', 'Kemampuan untuk merumuskan kebijakan urusan pertanahan ', ''),
(2010548, 202, 20107, '', 2, '', '', '', 'Perumusan Kebijakan Lingkungan Hidup, Kehutanan dan Perkebunan', 'LH', 'Kemampuan untuk merumuskan Kebijakan Lingkungan Hidup, Kehutanan dan Perkebunan', ''),
(2010549, 202, 20107, '', 3, '', '', '', 'Perumusan Kebijakan Urusan Industri, Perdagangan dan Pariwisata', '', 'Kemampuan untuk merumuskan Kebijakan Urusan Industri, Perdagangan dan Pariwisata', ''),
(2010550, 202, 20107, '', 4, '', '', '', 'Perumusan Kebijakan Urusan Kelautan dan Perikanan', '', 'Kemampuan untuk merumuskan Kebijakan Urusan Kelautan dan Perikanan', ''),
(2010551, 202, 20108, '', 1, '', '', '', 'Wawasan Hukum', '', 'Pengetahuan tentang isu-isu di bidang hukum yang mempengaruhi secara tidak langsung tugas pokok dan fungsi organisasi ', ''),
(2010552, 202, 20108, '', 2, '', '', '', 'Wawasan Ekonomi', '', 'Pengetahuan tentang isu-isu di bidang ekonomi yang mempengaruhi secara tidak langsung tugas pokok dan fungsi organisasi ', ''),
(2010553, 202, 20108, '', 3, '', '', '', 'Wawasan Ekonomi\r\n\r\n\r\n\r\n\r\n\r\nWawasan Lingkungan Hidup', '', 'Pengetahuan tentang isu-isu di bidang lingkungan hidup yang mempengaruhi secara tidak langsung tugas pokok dan fungsi organisasi ', ''),
(2010554, 202, 20108, '', 4, '', '', '', 'Wawasan Tata Ruang', '', 'Pengetahuan tentang isu-isu di bidang tata ruang yang mempengaruhi secara tidak langsung tugas pokok dan fungsi organisasi ', ''),
(2010555, 202, 20108, '', 5, '', '', '', 'Wawasan Sosiologi', '', 'Pengetahuan tentang isu-isu di bidang sosiologi yang mempengaruhi secara tidak langsung tugas pokok dan fungsi organisasi ', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_competency_dimension_level`
--

CREATE TABLE `hrm_competency_dimension_level` (
  `id_hrm_competency_dimension_level` bigint(20) NOT NULL,
  `id_hrm_competency_cluster` int(11) NOT NULL,
  `id_hrm_competency_category` int(11) NOT NULL,
  `id_hrm_competency_dimension` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `description_eng` text NOT NULL,
  `description_ind` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hrm_competency_dimension_level`
--

INSERT INTO `hrm_competency_dimension_level` (`id_hrm_competency_dimension_level`, `id_hrm_competency_cluster`, `id_hrm_competency_category`, `id_hrm_competency_dimension`, `level`, `description_eng`, `description_ind`) VALUES
(3010101, 301, 30101, 30101, 1, 'Mampu bertindak sesuai nilai, norma, etika organisasi dalam kapasitas pribadi', 'Mampu bertindak sesuai nilai, norma, etika organisasi dalam kapasitas pribadi'),
(3010102, 301, 30101, 30101, 2, 'Mampu mengingatkan, mengajak rekan kerja untuk bertindak sesuai nilai, norma, dan etika organisasi', 'Mampu mengingatkan, mengajak rekan kerja untuk bertindak sesuai nilai, norma, dan etika organisasi'),
(3010103, 301, 30101, 30101, 3, 'Mampu memastikan, menanamkan keyakinan bersama agar anggota yang dipimpin bertindak sesuai nilai, norma, dan etika organisasi, dalam lingkup formal', 'Mampu memastikan, menanamkan keyakinan bersama agar anggota yang dipimpin bertindak sesuai nilai, norma, dan etika organisasi, dalam lingkup formal'),
(3010104, 301, 30101, 30101, 4, 'Mampu menciptakan situasi kerja yang mendorong kepatuhan pada nilai, norma, dan etika organisasi', 'Mampu menciptakan situasi kerja yang mendorong kepatuhan pada nilai, norma, dan etika organisasi'),
(3010105, 301, 30101, 30101, 5, 'Mampu menjadi role model dalam penerapan standar keadilan dan etika di tingkat nasional', 'Mampu menjadi role model dalam penerapan standar keadilan dan etika di tingkat nasional'),
(3010201, 301, 30101, 30102, 1, 'Berpartisipasi dalam kelompok kerja', 'Berpartisipasi dalam kelompok kerja'),
(3010202, 301, 30101, 30102, 2, 'Menumbuhkan tim kerja yang partisipatif dan efektif', 'Menumbuhkan tim kerja yang partisipatif dan efektif'),
(3010203, 301, 30101, 30102, 3, 'Efektif membangun tim kerja untuk peningkatan kinerja organisasi', 'Efektif membangun tim kerja untuk peningkatan kinerja organisasi'),
(3010204, 301, 30101, 30102, 4, 'Membangun komitmen tim, sinergi', 'Membangun komitmen tim, sinergi'),
(3010205, 301, 30101, 30102, 5, 'Menciptakan situasi kerja sama secara konsisten, baik di dalam maupun di luar instansi', 'Menciptakan situasi kerja sama secara konsisten, baik di dalam maupun di luar instansi'),
(3010301, 301, 30101, 30103, 1, 'Menyampaikan informasi dengan jelas, lengkap, pemahaman yang sama', 'Menyampaikan informasi dengan jelas, lengkap, pemahaman yang sama'),
(3010302, 301, 30101, 30103, 2, 'Aktif menjalankan komunikasi secara formal dan informal; Bersedia mendengarkan orang lain, menginterpretasikan pesan dengan respon yang sesuai, mampu menyusun materi presentasi, pidato, naskah, laporan, dll', 'Aktif menjalankan komunikasi secara formal dan informal; Bersedia mendengarkan orang lain, menginterpretasikan pesan dengan respon yang sesuai, mampu menyusun materi presentasi, pidato, naskah, laporan, dll'),
(3010303, 301, 30101, 30103, 3, 'Berkomunikasi secara asertif, terampil berkomunikasilisan/ tertulis untuk menyampaikan informasi yang sensitif/ rumit/ kompleks', 'Berkomunikasi secara asertif, terampil berkomunikasilisan/ tertulis untuk menyampaikan informasi yang sensitif/ rumit/ kompleks'),
(3010304, 301, 30101, 30103, 4, 'Mampu mengemukakan pemikiran multidimensi secara lisan dan tertulis untuk mendorong kesepakatan dengan tujuan meningkatkan kinerja secara keseluruhan', 'Mampu mengemukakan pemikiran multidimensi secara lisan dan tertulis untuk mendorong kesepakatan dengan tujuan meningkatkan kinerja secara keseluruhan'),
(3010305, 301, 30101, 30103, 5, 'Menggagas sistem komunikasi yang terbuka secara strategis untuk mencari solusi dengan tujuan meningkatkan kinerja.', 'Menggagas sistem komunikasi yang terbuka secara strategis untuk mencari solusi dengan tujuan meningkatkan kinerja.'),
(3010401, 301, 30101, 30104, 1, 'Betanggung jawab untuk memenuhi standar kerja', 'Betanggung jawab untuk memenuhi standar kerja'),
(3010402, 301, 30101, 30104, 2, 'Berupaya meningkatkan hasil kerja pribadi yang lebih tinggi dari standar yang ditetapkan, mencari, mencoba metode alternatif untuk peningkatan kinerja', 'Berupaya meningkatkan hasil kerja pribadi yang lebih tinggi dari standar yang ditetapkan, mencari, mencoba metode alternatif untuk peningkatan kinerja'),
(3010403, 301, 30101, 30104, 3, 'Menetapkan target kerja yang menantang bagi unit kerja, memberi apresiasi dan teguran untuk mendorong kinerja', 'Menetapkan target kerja yang menantang bagi unit kerja, memberi apresiasi dan teguran untuk mendorong kinerja'),
(3010404, 301, 30101, 30104, 4, 'Mendorong unit kerja mencapai target yang ditetapkan atau melebihi hasil kerja sebelumnya', 'Mendorong unit kerja mencapai target yang ditetapkan atau melebihi hasil kerja sebelumnya'),
(3010405, 301, 30101, 30104, 5, 'Meningkatkan mutu pencapaian kerja organisasi', 'Meningkatkan mutu pencapaian kerja organisasi'),
(3010501, 301, 30101, 30105, 1, 'Menjalankan tugas mengikuti standar pelayanan.', 'Menjalankan tugas mengikuti standar pelayanan.'),
(3010502, 301, 30101, 30105, 2, 'Mampu mensupervisi/mengawasi/menyelia dan menjelaskan proses pelaksanaan tugas tugas pemerintahan/pelayanan publik secara transparan', 'Mampu mensupervisi/mengawasi/menyelia dan menjelaskan proses pelaksanaan tugas tugas pemerintahan/pelayanan publik secara transparan'),
(3010503, 301, 30101, 30105, 3, 'Mampu memanfaatkan kekuatan kelompok serta memperbaiki standar pelayanan publik di lingkup unit kerja', 'Mampu memanfaatkan kekuatan kelompok serta memperbaiki standar pelayanan publik di lingkup unit kerja'),
(3010504, 301, 30101, 30105, 4, 'Mampu memonitor, mengevaluasi, memperhitungkan dan mengantisipasi dampak dari isu-isu jangka panjang, kesempatan, atau kekuatan politik dalam hal pelayanan kebutuhan pemangku kepentingan yang transparan, objektif, dan profesional', 'Mampu memonitor, mengevaluasi, memperhitungkan dan mengantisipasi dampak dari isu-isu jangka panjang, kesempatan, atau kekuatan politik dalam hal pelayanan kebutuhan pemangku kepentingan yang transparan, objektif, dan profesional'),
(3010505, 301, 30101, 30105, 5, 'Mampu memastikan kebijakan kebijakan pelayanan publik yang menjamin terselenggaranya pelayanan publik yang objektif, netral, tidak memihak, tidak diskriminatif,serta tidak terpengaruh kepentingan pribadi/kelompok/partai politik.', 'Mampu memastikan kebijakan kebijakan pelayanan publik yang menjamin terselenggaranya pelayanan publik yang objektif, netral, tidak memihak, tidak diskriminatif,serta tidak terpengaruh kepentingan pribadi/kelompok/partai politik.'),
(3010601, 301, 30101, 30106, 1, 'Pengembangan diri', 'Pengembangan diri'),
(3010602, 301, 30101, 30106, 2, 'Meningkatkan kemampuan bawahan dengan memberikan contoh dan penjelasan cara melaksanakan suatu pekerjaan', 'Meningkatkan kemampuan bawahan dengan memberikan contoh dan penjelasan cara melaksanakan suatu pekerjaan'),
(3010603, 301, 30101, 30106, 3, 'Memberikan umpan balik, membimbing', 'Memberikan umpan balik, membimbing'),
(3010604, 301, 30101, 30106, 4, 'Menyusun program pengembangan jangka panjang dalam rangka mendorong manajemen pembelajaran.', 'Menyusun program pengembangan jangka panjang dalam rangka mendorong manajemen pembelajaran.'),
(3010605, 301, 30101, 30106, 5, 'Menciptakan situasi yang mendorong organisasi untuk mengembangkan kemampuan belajar secara berkelanjutan dalam rangka mendukung pencapaian hasil.', 'Menciptakan situasi yang mendorong organisasi untuk mengembangkan kemampuan belajar secara berkelanjutan dalam rangka mendukung pencapaian hasil.'),
(3010701, 301, 30101, 30107, 1, 'Mengikuti perubahan dengan arahan.', 'Mengikuti perubahan dengan arahan.'),
(3010702, 301, 30101, 30107, 2, 'Proaktif beradaptasi mengikuti perubahan', 'Proaktif beradaptasi mengikuti perubahan'),
(3010703, 301, 30101, 30107, 3, 'Membantu orang lain mengikuti perubahan, mengantisipasi perubahan secara tepat.', 'Membantu orang lain mengikuti perubahan, mengantisipasi perubahan secara tepat.'),
(3010704, 301, 30101, 30107, 4, 'Memimpin perubahan pada unit kerja.', 'Memimpin perubahan pada unit kerja.'),
(3010705, 301, 30101, 30107, 5, 'Memimpin, menggalang dan menggerakkan dukungan pemangku kepentingan untuk menjalankan perubahan secara berkelanjutan pada tingkat instansi /nasional', 'Memimpin, menggalang dan menggerakkan dukungan pemangku kepentingan untuk menjalankan perubahan secara berkelanjutan pada tingkat instansi /nasional'),
(3010801, 301, 30101, 30108, 1, 'Mengumpulkan informasi untuk bertindak sesuai kewenangan', 'Mengumpulkan informasi untuk bertindak sesuai kewenangan'),
(3010802, 301, 30101, 30108, 2, 'Menganalisis masalah secara mendalam', 'Menganalisis masalah secara mendalam'),
(3010803, 301, 30101, 30108, 3, 'Membandingkan berbagai alternatif, menyeimbangkan risiko keberhasilan dalam implementasi', 'Membandingkan berbagai alternatif, menyeimbangkan risiko keberhasilan dalam implementasi'),
(3010804, 301, 30101, 30108, 4, 'Menyelesaikan masalah yang mengandung risiko tinggi, mengantisipasi dampak keputusan, membuat tindakan pengamanan; mitigasi risiko', 'Menyelesaikan masalah yang mengandung risiko tinggi, mengantisipasi dampak keputusan, membuat tindakan pengamanan; mitigasi risiko'),
(3010805, 301, 30101, 30108, 5, 'Menghasilkan solusi dan mengambil keputusan untuk mengatasi permasalahan jangka panjang/strategis, berdampak nasional.', 'Menghasilkan solusi dan mengambil keputusan untuk mengatasi permasalahan jangka panjang/strategis, berdampak nasional.'),
(3011101, 301, 30102, 30111, 1, 'Peka memahami dan menerima kemajemukan', 'Peka memahami dan menerima kemajemukan'),
(3011102, 301, 30102, 30111, 2, 'Aktif mengembangkan sikap saling menghargai, menekankan persamaan dan persatuan.', 'Aktif mengembangkan sikap saling menghargai, menekankan persamaan dan persatuan.'),
(3011103, 301, 30102, 30111, 3, 'Mempromosikan, mengembangkan sikap toleransi dan persatuan.', 'Mempromosikan, mengembangkan sikap toleransi dan persatuan.'),
(3011104, 301, 30102, 30111, 4, 'Mendayagunakan perbedaan secara konstruktif dan kreatif untuk meningkatkan efektifitas organisasi.', 'Mendayagunakan perbedaan secara konstruktif dan kreatif untuk meningkatkan efektifitas organisasi.'),
(3011105, 301, 30102, 30111, 5, 'Wakil pemerintah untuk membangun hubungan sosial psikologis', 'Wakil pemerintah untuk membangun hubungan sosial psikologis'),
(201010100, 201, 20101, 2010101, 0, '', 'Mengetahui adanya perbedaan sudut pandang'),
(201010101, 201, 20101, 2010101, 1, '', 'Mengenali sudut pandang orang lain yang berbeda'),
(201010102, 201, 20101, 2010101, 2, '', 'Menyadari sudut pandang orang lain yang berbeda'),
(201010103, 201, 20101, 2010101, 3, '', 'Menyelaraskan sudut pandang pribadinya dengan sudut pandang orang lain'),
(201010104, 201, 20101, 2010101, 4, '', 'Mengakui kebenaran sudut pandang orang lain'),
(201010105, 201, 20101, 2010101, 5, '', 'Mengakomodir berbagai perbedaan sudut pandang sesuai dengan tuntutan perbahan'),
(201010106, 201, 20101, 2010101, 6, '', 'Mendayagunakan berbagai sudut pandang orang lain untuk mengoptimalkan kemampuan berfikir'),
(201010200, 201, 20101, 2010102, 0, '', 'Menggunakan gagasan / pemikiran yang sudah ada'),
(201010201, 201, 20101, 2010102, 1, '', 'Mengenali adanya gagasan baru'),
(201010202, 201, 20101, 2010102, 2, '', 'Mengidentifikasi alternatif ide / gagasan baru yang mungkin dapat diterapkan'),
(201010203, 201, 20101, 2010102, 3, '', 'Menentukan alternatif ide yang mungkin dapat diterapkan'),
(201010204, 201, 20101, 2010102, 4, '', 'Mengadopsi ide / pemikiran yang cocok diterapkan dalam lingkungan kerja'),
(201010205, 201, 20101, 2010102, 5, '', 'Mengadaptasi ide / pemikiran untuk efektivitas organisasi'),
(201010206, 201, 20101, 2010102, 6, '', 'Menciptakan ide / pemikiran yang orisinil yang bermanfaat bagi organisasi'),
(201010300, 201, 20101, 2010103, 0, '', 'Mengetahui permasalahan yang terjadi dalam pekerjaan'),
(201010301, 201, 20101, 2010103, 1, '', 'Memahami permasalahan yang terjadi dalam pekerjaannya'),
(201010302, 201, 20101, 2010103, 2, '', 'Menguraikan faktor-faktor penyebab dan dampak dari permasalahan terkait dengan pekerjaannya'),
(201010303, 201, 20101, 2010103, 3, '', 'Mengidentifikasi faktor-faktor potensial permasalahan yang berdampak kepada keberlangsungan organisasi'),
(201010304, 201, 20101, 2010103, 4, '', 'Menguraikan dampak jangka panjang dari permasalahan yang muncul terhadap kelangsungan kegiatan organisasi'),
(201010305, 201, 20101, 2010103, 5, '', 'Merumuskan pendekatan komprehensif yang dapat dilakukan organisasi untuk mengatasi permasalahan organisasi'),
(201010306, 201, 20101, 2010103, 6, '', 'Memproyeksikan situasi / dampak jangka panjang dari suatu fenomena umum dari sudut pandang kepentingan organisasi'),
(201010400, 201, 20101, 2010104, 0, '', 'Membuat kesimpulan dari suatu hal berdasarkan informasi parsial'),
(201010401, 201, 20101, 2010104, 1, '', 'Mengidentifikasi pola/hubungan dari data/informasi yang sudah tersedia berdasarkan suatu konsep yang konkret dan sederhana'),
(201010402, 201, 20101, 2010104, 2, '', 'Menyimpulkan keterkaitan pola/hubungan dari informasi yang ada menjadi suatu rumusan yang jelas dan komprehensif'),
(201010403, 201, 20101, 2010104, 3, '', 'Mengkaji proses pengambilan kesimpulan / formulasi - formulasi pola hubungan informasi'),
(201010404, 201, 20101, 2010104, 4, '', 'Merumuskan konsep berdasarkan pola hubungan informasi yang ada'),
(201010405, 201, 20101, 2010104, 5, '', 'Mengembangkan suatu konsep baru sesuai dengan kebutuhan nyata organisasi'),
(201010406, 201, 20101, 2010104, 6, '', 'Mengembangkan suatu konsep baru sesuai dengan kebutuhan organisasi ke depan'),
(201020500, 201, 20102, 2010205, 0, '', 'Menganggap perubahan bukan suatu hal yang penting'),
(201020501, 201, 20102, 2010205, 1, '', 'Mengikuti perubahan sesuai dengan tuntutan kebijakan organisasi'),
(201020502, 201, 20102, 2010205, 2, '', 'Menyesuaikan diri terhadap perubahan yang terjadi atas kesadaran dan inisiatif sendiri'),
(201020503, 201, 20102, 2010205, 3, '', 'Mencari alternatif dan pendekatan diri untuk memenuhi kebutuhan dari situasi yang berbeda/baru'),
(201020504, 201, 20102, 2010205, 4, '', 'Mengembangkan kemampan diri untuk menghadapi tuntutan atau dinamika perubahan'),
(201020505, 201, 20102, 2010205, 5, '', 'Mengantisipasi perubahan dan membuat penyesuaian jangka panjang dalam organisasi sebagai respon terhadap situasi'),
(201020506, 201, 20102, 2010205, 6, '', 'Membuat pola-pola atau pendekatan baru dalam penyesuaian dirinya dengan dinamika tuntutan perubahan baik jangka pendek maupun jangka panjang'),
(201020600, 201, 20102, 2010206, 0, '', 'Menyadari tentang pentingnya norma dan etika bagi organisasi'),
(201020601, 201, 20102, 2010206, 1, '', 'Menerapkan norma dan etika organisasi sebatas memenuhi kewajiban'),
(201020602, 201, 20102, 2010206, 2, '', 'Menerapkan norma dan etika organisasi sebatas pada dirinya dalam segala situasi dan kondisi'),
(201020603, 201, 20102, 2010206, 3, '', 'Mengingatkan orang lain untuk bertindak sesuai dengan nilai, norma dan etika organisasi dalam segala situasi dan kondisi'),
(201020604, 201, 20102, 2010206, 4, '', 'Mengupayakan orang lain untuk bertindak sesuai dengan nilai, norma dan etika organisasi dalam segala situasi dan kondisi'),
(201020605, 201, 20102, 2010206, 5, '', 'Menciptakan situasi kerja yang membuat rekan kerja mematuhi nilai, norma dan etika organisasi dalam segala situasi dan kondisi'),
(201020606, 201, 20102, 2010206, 6, '', 'Memberi teladan dalam menerapkan nilai, norma dan etika organisasi pada segala situasi dan kondisi'),
(201020700, 201, 20102, 2010207, 0, '', 'Mengubah tujuan karena adanya hambatan'),
(201020701, 201, 20102, 2010207, 1, '', 'Mempertahankan untuk tetap fokus pada pencapaian tujuan walaupun harus berhadapan dengan berbagai kesulitan'),
(201020702, 201, 20102, 2010207, 2, '', 'Mencari upaya-upaya untuk mengatasi rintangan dengan mengubah strategi/pendekatan/cara'),
(201020703, 201, 20102, 2010207, 3, '', 'Mencoba alternatif lain sampai tujuan utama tercapai atau tidak mungkin lagi dapat dicapai'),
(201020704, 201, 20102, 2010207, 4, '', 'Mempertahankan irama kerja untuk mencapai tujuan pekerjaan meskipun hanya memiliki sedikit kemajuan'),
(201020705, 201, 20102, 2010207, 5, '', 'Menelaah kegagalan-kegagalan untuk perbaikan dalam pelaksanaan pekerjaan'),
(201020706, 201, 20102, 2010207, 6, '', 'Mencari alternatif lain dalam menghadapi kegagalan pelaksanaan pencapaian tujuan'),
(201020800, 201, 20102, 2010208, 0, '', 'Melakukan tindakan yang sesuai dengan suasana hatinya'),
(201020801, 201, 20102, 2010208, 1, '', 'Menjauhi hal-hal yang menimbulkan emosi negatif'),
(201020802, 201, 20102, 2010208, 2, '', 'Mengekspresikan perasaan atau emosi negatif melalui tindakan yang tidak merugikan orang lain'),
(201020803, 201, 20102, 2010208, 3, '', 'Menghadapi tekanan dengan tindakan yang tenang'),
(201020804, 201, 20102, 2010208, 4, '', 'Menggunakan cara-cara tertentu untuk mengatasi reaksi yang berlebihan terhadap tekanan'),
(201020805, 201, 20102, 2010208, 5, '', 'Menghadapi situasi tekanan atau permasalahan dengan berpikir positif'),
(201020806, 201, 20102, 2010208, 6, '', 'Melakukan tindakan-tindakan untuk mencairkan suasana yang penuh tekanan'),
(201020900, 201, 20102, 2010209, 0, '', 'Melaksanakan tugas-tugas sesuai dengan keinginan dan kepentingan diri sendiri'),
(201020901, 201, 20102, 2010209, 1, '', 'Memahami pentingnya pelaksanaan pekerjaan sesuai tugas dan tanggung jawab'),
(201020902, 201, 20102, 2010209, 2, '', 'Melaksanakan pekerjaan sebatas tuntutan tugas dan tanggungjawabnya'),
(201020903, 201, 20102, 2010209, 3, '', 'Melaksanakan tugas yang melebihi tanggung jawabnya'),
(201020904, 201, 20102, 2010209, 4, '', 'Mengambil peran aktif ketika terjadi hambatan agar tujuan organisasi tetap tercapai'),
(201020905, 201, 20102, 2010209, 5, '', 'Mengorbankan kepentingan diri sendiri untuk tercapainya visi dan misi organisasi'),
(201020906, 201, 20102, 2010209, 6, '', 'Melakukan berbagai upaya untuk menjaga citra organisasi'),
(201021000, 201, 20102, 2010210, 0, '', 'Melakukan pekerjaan dengan menunggu perintah'),
(201021001, 201, 20102, 2010210, 1, '', 'Menyelesaikan tugas sebagai rutinitas sesuai dengan prosedur apa adanya'),
(201021002, 201, 20102, 2010210, 2, '', 'Melakukan langkah aktif dalam proses penyelesaian pekerjaan'),
(201021003, 201, 20102, 2010210, 3, '', 'Melakukan tindakan konstruktif untuk mendukung situasi kerja yang kondusif'),
(201021004, 201, 20102, 2010210, 4, '', 'Melakukan berbagai tindakan penyelesaian masalah yang dihadapi'),
(201021005, 201, 20102, 2010210, 5, '', 'Mengidentifikasi upaya penyelesaian masalah yang akan muncul di masa depan'),
(201021006, 201, 20102, 2010210, 6, '', 'Mengembangkan ide baru untuk menyelesaikan tugas yang lebih baik'),
(201021100, 201, 20102, 2010211, 0, '', 'Melaksanakan tugas tanpa mempertimbangkan tuntutan standar'),
(201021101, 201, 20102, 2010211, 1, '', 'Menyelesaikan tugas berdasarkan standar rata-rata'),
(201021102, 201, 20102, 2010211, 2, '', 'Menyelesaikan tugas dengan standar di atas rata-rata'),
(201021103, 201, 20102, 2010211, 3, '', 'Melakukan pembelajaran terhadap proses dan hasil pekerjaan untuk pencapaian hasil kerja lebih baik'),
(201021104, 201, 20102, 2010211, 4, '', 'Melakukan langkah-langkah perbaikan untuk mencapai kinerja yang optimal'),
(201021105, 201, 20102, 2010211, 5, '', 'Melakukan monitoring terhadap proses kerja untuk pencapaian efektivitas kerja'),
(201021106, 201, 20102, 2010211, 6, '', 'Membuat cara atau pendekatan baru dalam meningkatkan kualitas dan kuantitas hasil pekerjaan'),
(201031200, 201, 20103, 2010312, 0, '', 'Menanggapi penyelesaian pekerjaan dalam kelompok dengan sikap yang pasif'),
(201031201, 201, 20103, 2010312, 1, '', 'Menjaga hubungan kerja yang baik tanpa melibatkan perasaan suka atau tidak suka yang bersifat personal'),
(201031202, 201, 20103, 2010312, 2, '', 'Menghargai masukan dan keahlian orang lain dan bersedia untuk belajar dari orang lain'),
(201031203, 201, 20103, 2010312, 3, '', 'Menjunjung tinggi keputusan kelompok dengan cara menyelesaikan pekerjaan yang menjadi bebannya'),
(201031204, 201, 20103, 2010312, 4, '', 'Memberikan pujian yang obyektif secara terbuka kepada orang lain yang berkinerja baik dalam kelompok'),
(201031205, 201, 20103, 2010312, 5, '', 'Membantu rekan kerja/anggota tim yang mengalami kesulitan'),
(201031206, 201, 20103, 2010312, 6, '', 'Menciptakan suasana kerjasama yang akrab dengan menanamkan moral kerja yang baik dalam kelompok'),
(201031300, 201, 20103, 2010313, 0, '', 'Menganggap semua orang mampu melakukan pekerjaan apapun'),
(201031301, 201, 20103, 2010313, 1, '', 'Menggali potensi orang lain untuk pemanfaatan dalam pekerjaan'),
(201031302, 201, 20103, 2010313, 2, '', 'Memanfaatkan potensi orang lain untuk mengoptimalkan pelaksanaan pekerjaan'),
(201031303, 201, 20103, 2010313, 3, '', 'Memberikan umpan balik kepada orang lain untuk pengembangan diri'),
(201031304, 201, 20103, 2010313, 4, '', 'Membimbing orang lain untuk melakukan pengembangan diri sesuai minat dan keahlian'),
(201031305, 201, 20103, 2010313, 5, '', 'Memberi peluang/kesempatan pada orang lain untuk melakukan pekerjaan yang menantang'),
(201031306, 201, 20103, 2010313, 6, '', 'Menginspirasi seluruh komponen sumber daya manusia dalam organisasi untuk mampu mengembangkan diri secara mandiri'),
(201031400, 201, 20103, 2010314, 0, '', 'Membiarkan keadaan setiap orang bekerja tanpa pengarahan'),
(201031401, 201, 20103, 2010314, 1, '', 'Meyakinkan orang lain tentang pentingnya pencapaian tujuan organisasi'),
(201031402, 201, 20103, 2010314, 2, '', 'Membina bawahan dalam penyelesaian pekerjaan'),
(201031403, 201, 20103, 2010314, 3, '', 'Mendelegasikan pekerjaan dan wewenang sesuai kompetensi dan potensi bawahan'),
(201031404, 201, 20103, 2010314, 4, '', 'Mengorganisir sumber daya yang tersedia untuk optimalisasi pencapaian tujuan organisasi'),
(201031405, 201, 20103, 2010314, 5, '', 'Membangun situasi kerja yang kondusif'),
(201031406, 201, 20103, 2010314, 6, '', 'Menggunakan strategi atau perilaku tertentu yang dapat mempengaruhi orang lain untuk mencapai tujuan'),
(201031500, 201, 20103, 2010315, 0, '', 'Menginformasikan tugas-tugas yang harus dilakukan oleh bawahan secara tersirat'),
(201031501, 201, 20103, 2010315, 1, '', 'Menjelaskan tugas secara rinci agar bawahan dapat melakukan tugas-tugasnya dengan baik'),
(201031502, 201, 20103, 2010315, 2, '', 'Menentukan target kerja yang harus dicapai oleh bawahan'),
(201031503, 201, 20103, 2010315, 3, '', 'Mengkomunikasikan hal-hal yang harus dilakukan bawahan agar target kerja yang telah ditentukan dapat tercapai'),
(201031504, 201, 20103, 2010315, 4, '', 'Membantu bawahan saat menghadapi kendala sehingga pelaksanaan tugas dapat berjalan optimal'),
(201031505, 201, 20103, 2010315, 5, '', 'Memberikan umpan balik terhadap hasil pekerjaan bawahan sebagai upaya untuk meningkatkan kinerja'),
(201031506, 201, 20103, 2010315, 6, '', 'Menentukan faktor-faktor potensial yang berpengaruh pada pencapaian dan kegagalan pekerjaan'),
(201041600, 201, 20104, 2010416, 0, '', 'Memberikan pelayanan tergantung pada situasi dan kondisi pribadinya'),
(201041601, 201, 20104, 2010416, 1, '', 'Mengidentifikasi faktor-faktor yang menjadi kebutuhan pelanggan'),
(201041602, 201, 20104, 2010416, 2, '', 'Memenuhi kebutuhan pelanggan sesuai sumber daya organisasi yang tersedia'),
(201041603, 201, 20104, 2010416, 3, '', 'Meningkatkan kemampuan organisasi untuk memenuhi kebutuhan pelanggan'),
(201041604, 201, 20104, 2010416, 4, '', 'Melakukan upaya perbaikan pelayanan kepada pelanggan secara terus menerus'),
(201041605, 201, 20104, 2010416, 5, '', 'Mencari alternatif pelayanan terbaik untuk memuaskan kebutuhan pelanggan'),
(201041606, 201, 20104, 2010416, 6, '', 'Menginternalisasikan nilai dan semangat pelayanan ke setiap individu di lingkungan organisasi'),
(201041700, 201, 20104, 2010417, 0, '', 'Menentukan pentingnya faktor dan prosedur keselamatan Kerja'),
(201041701, 201, 20104, 2010417, 1, '', 'Mematuhi prosedur K3 karena adanya tuntutan dari organisasi'),
(201041702, 201, 20104, 2010417, 2, '', 'Mematuhi prosedur K3 atas kesadaran diri sendiri'),
(201041703, 201, 20104, 2010417, 3, '', 'Menggunakan peralatan atau perlengkapan K3 tambahan yang dirasakan perlu'),
(201041704, 201, 20104, 2010417, 4, '', 'Melaporkan kondisi-kondisi yang berpengaruh terhadap Keselamatan kerja'),
(201041705, 201, 20104, 2010417, 5, '', 'Mengajak orang lain untuk bekerja sesuai dengan prosedur keselamatan kerja'),
(201041706, 201, 20104, 2010417, 6, '', 'Mengusulkan sistem keselamatan kerja yang sesuai dengan kondisi dan lingkungan kerja'),
(201041800, 201, 20104, 2010418, 0, '', 'Menanggapi tawaran kerja sama dengan sikap yang pasif'),
(201041801, 201, 20104, 2010418, 1, '', 'Menjalin hubungan kerja antar unit dalam satu organisasi yang berdampak pada pencapaian tujuan organisasi'),
(201041802, 201, 20104, 2010418, 2, '', 'Menjalin hubungan kerja antar instansi dan antar daerah dalam rangka efektifitas kerja organisasi'),
(201041803, 201, 20104, 2010418, 3, '', 'Membentuk jaringan kerjasama yang bersifat bilateral yang dapat meningkatkan keberhasilan organisasi'),
(201041804, 201, 20104, 2010418, 4, '', 'Membentuk jaringan kerjasama yang bersifat multilateral yang dapat meningkatkan keberhasilan organisasi'),
(201041805, 201, 20104, 2010418, 5, '', 'Mengevaluasi bentuk kerjasama yang bersifat bilateral dan multilateral yang ada dalam rangka memelihara efektivitasnya'),
(201041806, 201, 20104, 2010418, 6, '', 'Mengembangkan hubungan kerjasama, bilateral dan multilateral yang berdampak jangka panjang bagi kepentingan nasional'),
(201041900, 201, 20104, 2010419, 0, '', 'Menerima tawaran apa adanya sesuai dengan usulan pihak lain'),
(201041901, 201, 20104, 2010419, 1, '', 'Menerima tawaran kerjasama berdasarkan informasi parsial'),
(201041902, 201, 20104, 2010419, 2, '', 'Mengumpulkan informasi yang relevan terkait dengan tujuan yang ingin dicapai dengan pihak-pihak yang terlibat'),
(201041903, 201, 20104, 2010419, 3, '', 'Mengajukan alternatif penawaran dengan mempelajari risiko yang mungkin timbul'),
(201041904, 201, 20104, 2010419, 4, '', 'Melakukan tawar menawar kepentingan dengan mempertimbangkan fakta, data, dan risiko'),
(201041905, 201, 20104, 2010419, 5, '', 'Membangun dukungan bagi alternatif pilihan dengan cara bertukar pikiran dan menggunakan strategi yang relevan/tertentu'),
(201041906, 201, 20104, 2010419, 6, '', 'Membuat kesepakatan yang saling menguntungkan dan mengakomodir kepentingan semua pihak'),
(201042000, 201, 20104, 2010420, 0, '', 'Menerima kondisi organisasi apa adanya'),
(201042001, 201, 20104, 2010420, 1, '', 'Mempelajari setiap kondisi untuk melihat kemungkinan optimalisasi organisasi'),
(201042002, 201, 20104, 2010420, 2, '', 'Memanfaatkan peluang dalam rangka optimalisasi organisasi'),
(201042003, 201, 20104, 2010420, 3, '', 'Merumuskan konsep dasar optimalisasi organisasi'),
(201042004, 201, 20104, 2010420, 4, '', 'Mendorong dan mengembangkan sumber daya yang ada untuk mendukung konsep optimalisasi organisasi'),
(201042005, 201, 20104, 2010420, 5, '', 'Melakukan upaya untuk mencari sumber daya yang dibutuhkan guna mewujudkan idenya'),
(201042006, 201, 20104, 2010420, 6, '', 'Membangun budaya kemandirian dalam organisasi'),
(201042100, 201, 20104, 2010421, 0, '', 'Mengumpulkan data/informasi tanpa mempertimbangkan kesahihannya'),
(201042101, 201, 20104, 2010421, 1, '', 'Melakukan upaya untuk mengumpulkan informasi dari orang lain atau berbagai media yang terpercaya'),
(201042102, 201, 20104, 2010421, 2, '', 'Menggali informasi melalui pertanyaan pada orang lain yang terlibat baik secara langsung maupun tidak langsung untuk menemukan akar permasalahan'),
(201042103, 201, 20104, 2010421, 3, '', 'Menguji kesahihan data/informasi yang terkumpul'),
(201042104, 201, 20104, 2010421, 4, '', 'Menyusun data atau informasi dalam suatu paparan informasi yang baru'),
(201042105, 201, 20104, 2010421, 5, '', 'Menentukan data / informasi yang relevan untuk mendukung pengambilan kesimpulan maupun penyelesaian pekerjaan'),
(201042106, 201, 20104, 2010421, 6, '', 'Membuat kesimpulan berdasarkan informasi yang relevan dan akurat'),
(201042200, 201, 20104, 2010422, 0, '', 'Mengabaikan pelaksanaan tugas sesuai dengan standar pelaksanaan pekerjaan'),
(201042201, 201, 20104, 2010422, 1, '', 'Mempelajari prosedur kerja yang terkait dengan pelaksanaan pekerjaan diri sendiri'),
(201042202, 201, 20104, 2010422, 2, '', 'Memelihara lingkungan kerja seperti meja, berkas-berkas, perkakas, dan lain-lain dalam susunan yang baik dan teratur'),
(201042203, 201, 20104, 2010422, 3, '', 'Memeriksa ulang akurasi pelaksanaan tugas dan hasil yang diharapkan dan standar yang ditetapkan'),
(201042204, 201, 20104, 2010422, 4, '', 'Menggunakan sistem untuk mengelola dan melacak setiap informasi secara sistimatis'),
(201042205, 201, 20104, 2010422, 5, '', 'Memantau kualitas pekerjaan untuk meyakinkan bahwa pelaksanaan tugas telah sesuai prosedur'),
(201042206, 201, 20104, 2010422, 6, '', 'Mengembangkan suatu sistem yang baru untuk meningkatkan keteraturan untuk meningkatkan kualitas pelaksanaan pekerjaan'),
(201042300, 201, 20104, 2010423, 0, '', 'Menanggapi secara pasif kegiatan komunikasi lisan/ diskusi'),
(201042301, 201, 20104, 2010423, 1, '', 'Menjelaskan suatu hal/permasalahan dengan bahasa yang kurang runtut/sistimatis'),
(201042302, 201, 20104, 2010423, 2, '', 'Memberikan tanggapan atas pertanyaan orang lain dengan menggunakan kalimat sederhana'),
(201042303, 201, 20104, 2010423, 3, '', 'Mengungkapkan pendapat/ide/ informasi dengan kalimat yang sistematis dan dimengerti orang lain'),
(201042304, 201, 20104, 2010423, 4, '', 'Mengajukan pertanyaan untuk menggali informasi dari orang lain'),
(201042305, 201, 20104, 2010423, 5, '', 'Menggunakan gaya bahasa yang dapat dimengerti orang lain secara sistematis kepada orang lain yang berbeda latar belakangnya'),
(201042306, 201, 20104, 2010423, 6, '', 'Mengarahkan orang lain untuk memahami maksud pembicaraan agar mendukung idenya'),
(201042400, 201, 20104, 2010424, 0, '', 'Menuangkan ide dan gagasan dalam bentuk tulisan yang susah dipahami'),
(201042401, 201, 20104, 2010424, 1, '', 'Menyampaikan ide dan gagasan dengan menerapkan kaidah atau tatacara menulis dengan benar dan terstruktur'),
(201042402, 201, 20104, 2010424, 2, '', 'Menuangkan ide dan gagasan ke dalam bentuk tulisan dengan alur berpikir yang logis'),
(201042403, 201, 20104, 2010424, 3, '', 'Menyederhanakan permasalahan yang rumit dengan menggunakan bahasa tulis yang efisien'),
(201042404, 201, 20104, 2010424, 4, '', 'Menkontekstualisasikan gagasan dan ide dalam bentuk tulisan dengan data dan contoh yang aplikatif'),
(201042405, 201, 20104, 2010424, 5, '', 'Membuat tulisan yang dapat dijadikan rujukan bagi penyelesaian permasalahan'),
(201042406, 201, 20104, 2010424, 6, '', 'Membuat tulisan yang dapat menginspirasi orang untuk mengikuti gagasannya'),
(201042500, 201, 20104, 2010425, 0, '', 'Membuat keputusan yang bersifat subyektif'),
(201042501, 201, 20104, 2010425, 1, '', 'Mengidentifikasi permasalahan yang terjadi sebelum pengambilan keputusan'),
(201042502, 201, 20104, 2010425, 2, '', 'Membuat keputusan yang responsif berdasarkan data/informasi dan sesuai keadaan lingkungan'),
(201042503, 201, 20104, 2010425, 3, '', 'Membuat keputusan yang dapat mengakomodir kepentingan semua pihak'),
(201042504, 201, 20104, 2010425, 4, '', 'Membuat keputusan yang sulit/dilematis dan cepat dengan mempertimbangkan konsekuensinya'),
(201042505, 201, 20104, 2010425, 5, '', 'Memastikan pelaksanaan keputusan dengan memantau hasilnya dengan membuat penyesuaian-penyesuaian yang diperlukan'),
(201042506, 201, 20104, 2010425, 6, '', 'Membuat keputusan strategis dan berdampak jangka panjang dengan didukung data/informasi yang komprehensif dan akurat'),
(201042600, 201, 20104, 2010426, 0, '', 'Menyerahkan penyelesaian pekerjaan kepada orang lain'),
(201042601, 201, 20104, 2010426, 1, '', 'Membagi tugas sesuai kemampuan pegawai'),
(201042602, 201, 20104, 2010426, 2, '', 'Melakukan monitoring dan evaluasi secara berkala selama kegiatan berlangsung'),
(201042603, 201, 20104, 2010426, 3, '', 'Mengkoordinasikan penggunaan sumberdaya yang terbatas secara efektif'),
(201042604, 201, 20104, 2010426, 4, '', 'Mengkoordinasikan aktivitas yang beragam antar unit kerja/kelompok kerja secara berkala'),
(201042605, 201, 20104, 2010426, 5, '', 'Menyiapkan penyelesaian permasalahan secara efesien sesuai dengan prediksi permasalahan yang mungkin timbul dalam pelaksanaan suatu kegiatan/program'),
(201042606, 201, 20104, 2010426, 6, '', 'Menentukan sumberdaya yang dibutuhkan dalam jangka panjang sesuai dengan rencana strategis organisasi'),
(201042700, 201, 20104, 2010427, 0, '', 'Melaksanakan kegiatan kerja tanpa perencanaan'),
(201042701, 201, 20104, 2010427, 1, '', 'Mengidentifikasi efektivitas pelaksanaan tugas sebagai bahan perencanaan ke depan'),
(201042702, 201, 20104, 2010427, 2, '', 'Menyusun rencana kegiatan sesuai dengan rencana operasional'),
(201042703, 201, 20104, 2010427, 3, '', 'Menyusun rencana operasional sesuai program kerja'),
(201042704, 201, 20104, 2010427, 4, '', 'Menyusun program kerja sesuai dengan rencana strategis'),
(201042705, 201, 20104, 2010427, 5, '', 'Menyusun rencana strategis sesuai dengan visi, misi, nilai-nilai dan tujuan organisasi'),
(201042706, 201, 20104, 2010427, 6, '', 'Menyusun visi, misi, nilai-nilai dan tujuan unit kerja/organisasi'),
(201042800, 201, 20104, 2010428, 0, '', 'Melakukan pekerjaan tanpa mempertimbangkan dinamika tuntutan perubahan'),
(201042801, 201, 20104, 2010428, 1, '', 'Mengidentifikasi tuntutan perubahan yang dihadapi organisasi'),
(201042802, 201, 20104, 2010428, 2, '', 'Mengkomunikasikan perubahan yang terjadi kepada seluruh komponen organisasi'),
(201042803, 201, 20104, 2010428, 3, '', 'Melakukan berbagai upaya yang dibutuhkan organisasi dalam menghadapi perubahan'),
(201042804, 201, 20104, 2010428, 4, '', 'Mengevaluasi pelaksanaan program-program perubahan organisasi untuk jangka panjang'),
(201042805, 201, 20104, 2010428, 5, '', 'Menanamkan nilai-nilai, sikap dan budaya sesuai dengan dinamika perubahan'),
(201042806, 201, 20104, 2010428, 6, '', 'Mengembangkan sistem nilai dan budaya organisasi sesuai dengan kecenderungan tuntutan organisasi ke depan'),
(201042900, 201, 20104, 2010429, 0, '', 'Melaksanakan pekerjaan dengan mengabaikan prosedur yang ditentukan'),
(201042901, 201, 20104, 2010429, 1, '', 'Melakukan pelaksanaan tugas sesuai prosedur dan sumberdaya yang standar'),
(201042902, 201, 20104, 2010429, 2, '', 'Mengamati proses kerja untuk mengantisipasi masalah yang tidak sesuai standar kerja'),
(201042903, 201, 20104, 2010429, 3, '', 'Memperbaiki/menelaah ulang proses kerja untuk mendapatkan hasil kerja lebih baik'),
(201042904, 201, 20104, 2010429, 4, '', 'Melakukan telahaan terhadap seluruh sumber daya dan standar yang ada serta aspek lain yang terkait secara komprehensif untuk hasil kerja yang inovatif'),
(201042905, 201, 20104, 2010429, 5, '', 'Menentukan sumberdaya dan standar yang sesuai untuk mendapatkan mutu kerja yang diharapkan'),
(201042906, 201, 20104, 2010429, 6, '', 'Menentukan proses kerja dan standar kerja baru sesuai dengan kecenderungan tuntutan mutu ke depan'),
(201043000, 201, 20104, 2010430, 0, '', 'Menyelesaikan konflik dengan Menghindarkan konflik sebagai tindakan negatif'),
(201043001, 201, 20104, 2010430, 1, '', 'Mengidentifikasi sumber-sumber konflik berdasarkan jenis konflik'),
(201043002, 201, 20104, 2010430, 2, '', 'Meletakan berbagai sudut pandang/kepentingan dalam konteks yang tepat'),
(201043003, 201, 20104, 2010430, 3, '', 'Mengupayakan berbagai pihak untuk bersikap terbuka dan objektif dalam penyelesaian konflik'),
(201043004, 201, 20104, 2010430, 4, '', 'Memberikan alternatif solusi dengan berbagai konsekuensinya'),
(201043005, 201, 20104, 2010430, 5, '', 'Menyelesaikan konflik menjadi hal yang positif dan produktif'),
(201043006, 201, 20104, 2010430, 6, '', 'Menumbuhkan kondisi yang kondusif untuk berbagi pandangan yang terbuka dan objektif serta kreatif'),
(201053100, 201, 20105, 2010531, 0, '', 'Menganggap perbedaan latar belakang budaya dan hidup berdampingan dengan masyarakat tidak memiliki relevansi dengan keberhasilan organisasi'),
(201053101, 201, 20105, 2010531, 1, '', 'Menentukan perbedaan budaya dapat mempengaruhi efektivitas pencapaian tujuan organisasi dan harmoni masyarakat'),
(201053102, 201, 20105, 2010531, 2, '', 'Menghimpun masukan berbagai sudut pandang yang berbeda sesuai dengan latar belakang budaya yang ada'),
(201053103, 201, 20105, 2010531, 3, '', 'Melakukan tindakan yang sesuai dengan norma budaya yang berlaku'),
(201053104, 201, 20105, 2010531, 4, '', 'Mengarahkan orang lain untuk menghargai perbedaan budaya'),
(201053105, 201, 20105, 2010531, 5, '', 'Mendayagunakan perbedaan budaya untuk menunjang kelancaran pencapaian tujuan organisasi dan penerimaan organisasi di lingkungan masyarakat sekitarnya'),
(201053106, 201, 20105, 2010531, 6, '', 'Menciptakan suasana interaksi setiap individu untuk bekerjasama dalam lingkungan internal organsisasi dan lingkungan eksternal di masyarakat sehingga dirasakan keberadaannya secara positif'),
(201053200, 201, 20105, 2010532, 0, '', 'Mengabaikan pikiran, perasaan, dan permasalahan orang lain'),
(201053201, 201, 20105, 2010532, 1, '', 'Mendengarkan keluhan / ungkapan perasaan orang lain.'),
(201053202, 201, 20105, 2010532, 2, '', 'Menyediakan diri untuk selalu mendengarkan keluhan/ungkapan perasaan orang lain'),
(201053203, 201, 20105, 2010532, 3, '', 'Merasakan perasaan dan permasalahan orang lain yang tidak terungkapkan'),
(201053204, 201, 20105, 2010532, 4, '', 'Menolong orang lain pada saat seseorang mengalami kesulitan/kesusahan'),
(201053205, 201, 20105, 2010532, 5, '', 'Mengajak orang lain untuk turut serta dalam membantu orang lain yang dalam kesusahan'),
(201053206, 201, 20105, 2010532, 6, '', 'Melakukan tindakan secara aktif untuk membantu orang-orang yang berkesusahan / kurang beruntung'),
(201053300, 201, 20105, 2010533, 0, '', 'Mengabaikan hubungan dengan lingkungan sekitar'),
(201053301, 201, 20105, 2010533, 1, '', 'Menerima perbedaan adanya pola pikir,perilaku adat yang berbeda'),
(201053302, 201, 20105, 2010533, 2, '', 'Membangun keterbukaan dalam menjalin hubungan antar individu maupun kelompok'),
(201053303, 201, 20105, 2010533, 3, '', 'Menghargai dengan melakukan toleransi antar individu maupun antar kelompok'),
(201053304, 201, 20105, 2010533, 4, '', 'Menyesuaikan diri dengan pola pikir, perilaku dan adat yang berbeda dengan dirinva'),
(201053305, 201, 20105, 2010533, 5, '', 'Membangun keterikatan atas dasar saling percaya antar individu maupun kelompok'),
(201053306, 201, 20105, 2010533, 6, '', 'Memadukan perbedaan dengan membentuk kebiasaan baru tanpa menghilangkan ciri kepribadian/ adat masing-masing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_cv_asuransi`
--

CREATE TABLE `hrm_cv_asuransi` (
  `id_cv_asuransi` bigint(20) NOT NULL,
  `code_id` bigint(20) DEFAULT NULL,
  `id_pegawai` bigint(20) NOT NULL,
  `id_hrm_perusahaan_asuransi` bigint(20) NOT NULL,
  `id_hrm_mst_jenis_asuransi` int(11) NOT NULL,
  `ditanggung_perusahaan` int(1) DEFAULT NULL,
  `tanggal_mulai_asuransi` date DEFAULT NULL,
  `tanggal_jatuh_tempo` date DEFAULT NULL,
  `durasi_asuransi` int(11) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(64) DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(64) DEFAULT NULL,
  `modified_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hrm_cv_asuransi`
--

INSERT INTO `hrm_cv_asuransi` (`id_cv_asuransi`, `code_id`, `id_pegawai`, `id_hrm_perusahaan_asuransi`, `id_hrm_mst_jenis_asuransi`, `ditanggung_perusahaan`, `tanggal_mulai_asuransi`, `tanggal_jatuh_tempo`, `durasi_asuransi`, `keterangan`, `created_date`, `created_user`, `created_ip_address`, `modified_date`, `modified_user`, `modified_ip_address`) VALUES
(1, NULL, 16, 1, 1, 1, '2023-01-29', '2023-02-04', 2, '--', NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 16, 1, 1, 1, '2023-01-29', '2023-02-04', 2, '--', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_cv_keluarga`
--

CREATE TABLE `hrm_cv_keluarga` (
  `id_keluarga` bigint(20) NOT NULL,
  `code_id` bigint(20) DEFAULT NULL,
  `id_pegawai` bigint(20) NOT NULL,
  `kategori` set('SUAMI/ISTRI','ANAK') NOT NULL,
  `id_mst_jenis_hub_keluarga` int(11) NOT NULL,
  `nama_lengkap` varchar(250) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `tempat_lahir` varchar(250) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `usia` int(4) DEFAULT NULL,
  `usia_lebih_bulan` int(2) DEFAULT NULL,
  `jenis_kelamin` set('PRIA','WANITA') NOT NULL,
  `status` set('BEKERJA','KULIAH','SEKOLAH','BELUM SEKOLAH') NOT NULL,
  `pekerjaan` varchar(250) DEFAULT NULL,
  `tanggal_menikah` date DEFAULT NULL,
  `tanggal_bercerai` date DEFAULT NULL,
  `tanggal_meninggal` date DEFAULT NULL,
  `golongan_darah` set('A','B','AB','O','-') DEFAULT NULL,
  `agama` set('ISLAM','KRISTEN','KATOLIK','HINDU','BUDHA') DEFAULT NULL,
  `status_pernikahan` set('BELUM MENIKAH','MENIKAH','DUDA/JANDA','-') DEFAULT NULL,
  `status_tunjangan` int(1) DEFAULT NULL,
  `tanggal_tunjangan` date DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(64) DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(64) DEFAULT NULL,
  `modified_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_cv_kesehatan`
--

CREATE TABLE `hrm_cv_kesehatan` (
  `id_cv_kesehatan` bigint(20) NOT NULL,
  `code_id` bigint(20) DEFAULT NULL,
  `id_pegawai` bigint(20) NOT NULL,
  `id_mst_jenis_tunjangan_kesehatan` int(11) NOT NULL,
  `penyakit_diderita` varchar(150) DEFAULT NULL,
  `id_mst_jenis_penyakit` int(11) NOT NULL,
  `deskripsi_penyakit` varchar(250) NOT NULL,
  `tingkat` set('BIASA','SEDANG','PARAH') DEFAULT NULL,
  `lama_sakit` int(11) DEFAULT NULL,
  `ditanggung_perusahaan` int(1) DEFAULT NULL,
  `tanggal_penggantian` date DEFAULT NULL,
  `biaya_ditanggung` decimal(20,2) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(64) DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(64) DEFAULT NULL,
  `modified_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hrm_cv_kesehatan`
--

INSERT INTO `hrm_cv_kesehatan` (`id_cv_kesehatan`, `code_id`, `id_pegawai`, `id_mst_jenis_tunjangan_kesehatan`, `penyakit_diderita`, `id_mst_jenis_penyakit`, `deskripsi_penyakit`, `tingkat`, `lama_sakit`, `ditanggung_perusahaan`, `tanggal_penggantian`, `biaya_ditanggung`, `created_date`, `created_user`, `created_ip_address`, `modified_date`, `modified_user`, `modified_ip_address`) VALUES
(1, NULL, 16, 1, 'Typus', 1, 'tidak', '', NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_cv_language_skill`
--

CREATE TABLE `hrm_cv_language_skill` (
  `id_language_skill` bigint(20) NOT NULL,
  `code_id` bigint(20) NOT NULL,
  `id_pegawai` bigint(20) NOT NULL,
  `bahasa` varchar(150) DEFAULT NULL,
  `id_mst_bahasa` int(11) NOT NULL,
  `tingkat_keahlian` varchar(150) NOT NULL,
  `punya_sertifikat` int(1) NOT NULL DEFAULT 0,
  `sertifikat` varchar(150) DEFAULT NULL,
  `foto_sertifikat` varchar(150) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(64) DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(64) DEFAULT NULL,
  `modified_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hrm_cv_language_skill`
--

INSERT INTO `hrm_cv_language_skill` (`id_language_skill`, `code_id`, `id_pegawai`, `bahasa`, `id_mst_bahasa`, `tingkat_keahlian`, `punya_sertifikat`, `sertifikat`, `foto_sertifikat`, `created_date`, `created_user`, `created_ip_address`, `modified_date`, `modified_user`, `modified_ip_address`) VALUES
(1, 2309525, 16, 'Inggris', 1, 'Basic', 1, 'sertfikat', 'foto', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_cv_riwayat_pekerjaan`
--

CREATE TABLE `hrm_cv_riwayat_pekerjaan` (
  `id_riwayat_pekerjaan` bigint(20) NOT NULL,
  `code_id` bigint(20) DEFAULT NULL,
  `id_pegawai` bigint(20) NOT NULL,
  `nama_perusahaan` varchar(250) NOT NULL,
  `jenis_pekerjaan` varchar(250) NOT NULL,
  `jabatan_terakhir` varchar(250) NOT NULL,
  `tahun_mulai` int(4) NOT NULL,
  `tahun_selesai` int(4) NOT NULL,
  `gaji_bruto` decimal(20,2) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_user` varchar(64) DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_user` varchar(64) DEFAULT NULL,
  `modified_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hrm_cv_riwayat_pekerjaan`
--

INSERT INTO `hrm_cv_riwayat_pekerjaan` (`id_riwayat_pekerjaan`, `code_id`, `id_pegawai`, `nama_perusahaan`, `jenis_pekerjaan`, `jabatan_terakhir`, `tahun_mulai`, `tahun_selesai`, `gaji_bruto`, `keterangan`, `created_date`, `created_user`, `created_ip_address`, `modified_date`, `modified_user`, `modified_ip_address`) VALUES
(1, NULL, 16, 'Astra', 'Programmer', 'Programmer CI', 2019, 2022, '100000.00', 'ini keterangan', NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 16, 'Astra', 'Programmer', 'Programmer CI', 2019, 2022, '100000.00', 'ini keterangan', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_cv_riwayat_pendidikan`
--

CREATE TABLE `hrm_cv_riwayat_pendidikan` (
  `id_riwayat_pendidikan` bigint(20) NOT NULL,
  `code_id` bigint(20) DEFAULT NULL,
  `id_pegawai` bigint(20) NOT NULL,
  `id_mst_tingkat_pendidikan` int(11) NOT NULL,
  `id_sekolah` bigint(20) NOT NULL,
  `dari` int(4) NOT NULL,
  `sampai` int(4) NOT NULL,
  `id_jurusan` bigint(20) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `foto_ijazah` varchar(150) NOT NULL,
  `foto_transkrip` varchar(150) NOT NULL,
  `created_date` date NOT NULL,
  `created_user` varchar(64) NOT NULL,
  `created_ip_address` varchar(64) NOT NULL,
  `modified_date` date NOT NULL,
  `modified_user` varchar(64) NOT NULL,
  `modified_ip_address` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_mst_bahasa`
--

CREATE TABLE `hrm_mst_bahasa` (
  `id_mst_bahasa` int(11) NOT NULL,
  `id_perusahaan` bigint(20) DEFAULT NULL,
  `bahasa` varchar(250) NOT NULL,
  `is_used` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hrm_mst_bahasa`
--

INSERT INTO `hrm_mst_bahasa` (`id_mst_bahasa`, `id_perusahaan`, `bahasa`, `is_used`) VALUES
(1, 201501, 'ENGLISH', 1),
(2, 201501, 'JEPANG', 1),
(3, 201501, 'PERANCIS', 1),
(4, 201501, 'SPANYOL', 1),
(5, 201501, 'ARAB', 1),
(6, 201501, 'JERMAN', 1),
(7, 201501, 'MANDARIN', 1),
(8, NULL, 'JEPANG', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_mst_jenis_absensi`
--

CREATE TABLE `hrm_mst_jenis_absensi` (
  `id_mst_jenis_absensi` int(11) NOT NULL,
  `jenis_absensi` varchar(200) NOT NULL,
  `is_aktif` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hrm_mst_jenis_absensi`
--

INSERT INTO `hrm_mst_jenis_absensi` (`id_mst_jenis_absensi`, `jenis_absensi`, `is_aktif`) VALUES
(1, 'MASUK', 1),
(2, 'SAKIT', 1),
(3, 'IZIN', 1),
(4, 'CUTI', 1),
(5, 'ALPHA', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_mst_jenis_asuransi`
--

CREATE TABLE `hrm_mst_jenis_asuransi` (
  `id_hrm_mst_jenis_asuransi` bigint(20) NOT NULL,
  `jenis_asuransi` varchar(250) NOT NULL,
  `active_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hrm_mst_jenis_asuransi`
--

INSERT INTO `hrm_mst_jenis_asuransi` (`id_hrm_mst_jenis_asuransi`, `jenis_asuransi`, `active_status`) VALUES
(1, 'jiwa', 1),
(2, 'kesehatan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_mst_jenis_tunjangan_kesehatan`
--

CREATE TABLE `hrm_mst_jenis_tunjangan_kesehatan` (
  `id_mst_jenis_tunjangan_kesehatan` int(11) NOT NULL,
  `id_perusahaan` bigint(20) DEFAULT NULL,
  `jenis_tunjangan_kesehatan` varchar(250) NOT NULL,
  `is_used` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hrm_mst_jenis_tunjangan_kesehatan`
--

INSERT INTO `hrm_mst_jenis_tunjangan_kesehatan` (`id_mst_jenis_tunjangan_kesehatan`, `id_perusahaan`, `jenis_tunjangan_kesehatan`, `is_used`) VALUES
(1, 201501, 'RAWAT JALAN', 1),
(2, 201501, 'RAWAT INAP', 1),
(3, 201501, 'PENGGANTIAN KACAMATA', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_pegawai`
--

CREATE TABLE `hrm_pegawai` (
  `id_pegawai` bigint(20) NOT NULL,
  `id_perusahaan` bigint(20) NOT NULL,
  `userid` varchar(45) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `cid` bigint(20) NOT NULL,
  `no_dossier` int(11) NOT NULL,
  `NIP` varchar(100) NOT NULL,
  `nama_lengkap` varchar(250) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `tempat_lahir` varchar(250) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` int(4) DEFAULT 0,
  `usia_lebih_bulan` int(2) NOT NULL,
  `jenis_kelamin` set('PRIA','WANITA') NOT NULL,
  `golongan_darah` set('A','B','AB','O','-') DEFAULT '-',
  `tinggi_badan` int(5) DEFAULT NULL,
  `berat_badan` int(5) DEFAULT NULL,
  `agama` set('ISLAM','KRISTEN','KATOLIK','HINDU','BUDHA','KONGHUCU','LAINNYA','-') DEFAULT '-',
  `status_pernikahan` set('BELUM MENIKAH','MENIKAH','DUDA/JANDA','-') DEFAULT '-',
  `no_identitas_pribadi` varchar(250) DEFAULT NULL,
  `NPWP` varchar(150) DEFAULT NULL,
  `no_kartu_kesehatan` varchar(150) DEFAULT NULL,
  `no_kartu_tenagakerja` varchar(150) DEFAULT NULL,
  `kartu_kesehatan` set('BPJS','ASURANSI') DEFAULT NULL,
  `no_kartu_keluarga` varchar(150) DEFAULT NULL,
  `scan_ktp` varchar(150) DEFAULT NULL,
  `scan_bpjs` varchar(150) DEFAULT NULL,
  `scan_npwp` varchar(150) DEFAULT NULL,
  `scan_paraf` varchar(150) DEFAULT NULL,
  `scan_kk` varchar(250) NOT NULL,
  `scan_tandatangan` varchar(150) DEFAULT NULL,
  `no_bpjs` varchar(250) NOT NULL,
  `id_hrm_status_pegawai` int(11) NOT NULL DEFAULT 0,
  `id_hrm_status_organik` int(11) NOT NULL DEFAULT 0,
  `status_tenaga_kerja` set('WNI','WNA') NOT NULL DEFAULT 'WNI',
  `reg_tanggal_masuk` date DEFAULT NULL,
  `reg_tanggal_diangkat` date DEFAULT NULL,
  `reg_tanggal_training` date NOT NULL,
  `reg_status_pegawai` set('AKTIF','TIDAK AKTIF','PENSIUN','MPP') NOT NULL DEFAULT 'AKTIF',
  `tanggal_mpp` date DEFAULT NULL,
  `tanggal_pensiun` date DEFAULT NULL,
  `tanggal_terminasi` date NOT NULL,
  `id_hrm_mst_jenis_terminasi_bi` int(11) NOT NULL,
  `gelar_akademik` varchar(250) DEFAULT NULL,
  `gelar_profesi` varchar(250) DEFAULT NULL,
  `pdk_id_tingkatpendidikan` int(11) DEFAULT NULL,
  `pdk_sekolah_terakhir` varchar(250) DEFAULT NULL,
  `pdk_jurusan_terakhir` varchar(250) DEFAULT NULL,
  `pdk_ipk_terakhir` varchar(30) DEFAULT NULL,
  `pdk_tahun_lulus` int(4) DEFAULT NULL,
  `alamat_termutakhir` text DEFAULT NULL,
  `alamat_sesuai_identitas` text DEFAULT NULL,
  `mobilephone1` varchar(250) DEFAULT NULL,
  `mobilephone2` varchar(250) DEFAULT NULL,
  `telepon_rumah` varchar(250) DEFAULT NULL,
  `fax_rumah` varchar(250) DEFAULT NULL,
  `email1` varchar(200) NOT NULL,
  `email2` varchar(200) NOT NULL,
  `id_kk_profil_posisi` int(20) NOT NULL,
  `jbt_id_jabatan` bigint(20) DEFAULT NULL,
  `jbt_jabatan` varchar(250) DEFAULT NULL,
  `jbt_id_tingkat_jabatan` bigint(20) DEFAULT NULL,
  `jbt_no_sk_jabatan` varchar(250) DEFAULT NULL,
  `jbt_tgl_keputusan` date DEFAULT NULL,
  `jbt_tanggal_berlaku` date DEFAULT NULL,
  `jbt_keterangan_mutasi` varchar(250) DEFAULT NULL,
  `pkt_id_pangkat` int(11) DEFAULT NULL,
  `pkt_no_sk` varchar(250) DEFAULT NULL,
  `pkt_tgl_keputusan` date DEFAULT NULL,
  `pkt_tgl_berlaku` date DEFAULT NULL,
  `pkt_gaji_pokok` double(20,2) DEFAULT NULL,
  `pkt_id_jenis_kenaikan_pangkat` int(11) DEFAULT NULL,
  `pkt_eselon` varchar(64) NOT NULL,
  `pkt_ruang` varchar(64) NOT NULL,
  `pos_id_hrm_kantor` bigint(20) DEFAULT NULL,
  `pos_id_hrm_unit_kerja` bigint(20) DEFAULT NULL,
  `pos_kantor` varchar(250) NOT NULL,
  `pos_id_kk_profil_posisi` bigint(20) DEFAULT NULL,
  `sta_total_hukuman_disiplin` int(11) NOT NULL,
  `sta_total_penghargaan` int(11) NOT NULL,
  `pst_masabakti_20` date DEFAULT NULL,
  `pst_masabakti_25` date DEFAULT NULL,
  `pst_masabakti_30` date DEFAULT NULL,
  `pst_masabakti_35` date DEFAULT NULL,
  `pst_masabakti_40` date DEFAULT NULL,
  `cuti_besar_terakhir_start` date NOT NULL,
  `cuti_besar_terakhir_end` date NOT NULL,
  `cuti_besar_terakhir_ke` int(10) NOT NULL,
  `cuti_besar_plan_1` date DEFAULT NULL,
  `cuti_besar_plan_2` date DEFAULT NULL,
  `cuti_besar_plan_3` date DEFAULT NULL,
  `cuti_besar_plan_4` date DEFAULT NULL,
  `cuti_besar_plan_5` date DEFAULT NULL,
  `cuti_besar_plan_6` date DEFAULT NULL,
  `cuti_besar_plan_7` date DEFAULT NULL,
  `cuti_besar_ambil_1` int(1) DEFAULT NULL,
  `cuti_besar_ambil_2` int(1) DEFAULT NULL,
  `cuti_besar_ambil_3` int(1) DEFAULT NULL,
  `cuti_besar_ambil_4` int(1) DEFAULT NULL,
  `cuti_besar_ambil_5` int(1) DEFAULT NULL,
  `cuti_besar_ambil_6` int(1) DEFAULT NULL,
  `cuti_besar_ambil_7` int(1) DEFAULT NULL,
  `cuti_besar_aktual_1` date DEFAULT NULL,
  `cuti_besar_aktual_2` date DEFAULT NULL,
  `cuti_besar_aktual_3` date DEFAULT NULL,
  `cuti_besar_aktual_4` date DEFAULT NULL,
  `cuti_besar_aktual_5` date DEFAULT NULL,
  `cuti_besar_aktual_6` date DEFAULT NULL,
  `cuti_besar_aktual_7` date DEFAULT NULL,
  `cuti_besar_aktual_end_1` date DEFAULT NULL,
  `cuti_besar_aktual_end_2` date DEFAULT NULL,
  `cuti_besar_aktual_end_3` date DEFAULT NULL,
  `cuti_besar_aktual_end_4` date DEFAULT NULL,
  `cuti_besar_aktual_end_5` date DEFAULT NULL,
  `cuti_besar_aktual_end_6` date DEFAULT NULL,
  `cuti_besar_aktual_end_7` date DEFAULT NULL,
  `reff_id` varchar(100) DEFAULT NULL,
  `created_date` date NOT NULL,
  `created_user` varchar(64) NOT NULL,
  `created_ip_address` varchar(64) NOT NULL,
  `modified_date` date NOT NULL,
  `modified_user` varchar(64) NOT NULL,
  `modified_ip_address` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hrm_pegawai`
--

INSERT INTO `hrm_pegawai` (`id_pegawai`, `id_perusahaan`, `userid`, `id_user`, `cid`, `no_dossier`, `NIP`, `nama_lengkap`, `foto`, `tempat_lahir`, `tanggal_lahir`, `usia`, `usia_lebih_bulan`, `jenis_kelamin`, `golongan_darah`, `tinggi_badan`, `berat_badan`, `agama`, `status_pernikahan`, `no_identitas_pribadi`, `NPWP`, `no_kartu_kesehatan`, `no_kartu_tenagakerja`, `kartu_kesehatan`, `no_kartu_keluarga`, `scan_ktp`, `scan_bpjs`, `scan_npwp`, `scan_paraf`, `scan_kk`, `scan_tandatangan`, `no_bpjs`, `id_hrm_status_pegawai`, `id_hrm_status_organik`, `status_tenaga_kerja`, `reg_tanggal_masuk`, `reg_tanggal_diangkat`, `reg_tanggal_training`, `reg_status_pegawai`, `tanggal_mpp`, `tanggal_pensiun`, `tanggal_terminasi`, `id_hrm_mst_jenis_terminasi_bi`, `gelar_akademik`, `gelar_profesi`, `pdk_id_tingkatpendidikan`, `pdk_sekolah_terakhir`, `pdk_jurusan_terakhir`, `pdk_ipk_terakhir`, `pdk_tahun_lulus`, `alamat_termutakhir`, `alamat_sesuai_identitas`, `mobilephone1`, `mobilephone2`, `telepon_rumah`, `fax_rumah`, `email1`, `email2`, `id_kk_profil_posisi`, `jbt_id_jabatan`, `jbt_jabatan`, `jbt_id_tingkat_jabatan`, `jbt_no_sk_jabatan`, `jbt_tgl_keputusan`, `jbt_tanggal_berlaku`, `jbt_keterangan_mutasi`, `pkt_id_pangkat`, `pkt_no_sk`, `pkt_tgl_keputusan`, `pkt_tgl_berlaku`, `pkt_gaji_pokok`, `pkt_id_jenis_kenaikan_pangkat`, `pkt_eselon`, `pkt_ruang`, `pos_id_hrm_kantor`, `pos_id_hrm_unit_kerja`, `pos_kantor`, `pos_id_kk_profil_posisi`, `sta_total_hukuman_disiplin`, `sta_total_penghargaan`, `pst_masabakti_20`, `pst_masabakti_25`, `pst_masabakti_30`, `pst_masabakti_35`, `pst_masabakti_40`, `cuti_besar_terakhir_start`, `cuti_besar_terakhir_end`, `cuti_besar_terakhir_ke`, `cuti_besar_plan_1`, `cuti_besar_plan_2`, `cuti_besar_plan_3`, `cuti_besar_plan_4`, `cuti_besar_plan_5`, `cuti_besar_plan_6`, `cuti_besar_plan_7`, `cuti_besar_ambil_1`, `cuti_besar_ambil_2`, `cuti_besar_ambil_3`, `cuti_besar_ambil_4`, `cuti_besar_ambil_5`, `cuti_besar_ambil_6`, `cuti_besar_ambil_7`, `cuti_besar_aktual_1`, `cuti_besar_aktual_2`, `cuti_besar_aktual_3`, `cuti_besar_aktual_4`, `cuti_besar_aktual_5`, `cuti_besar_aktual_6`, `cuti_besar_aktual_7`, `cuti_besar_aktual_end_1`, `cuti_besar_aktual_end_2`, `cuti_besar_aktual_end_3`, `cuti_besar_aktual_end_4`, `cuti_besar_aktual_end_5`, `cuti_besar_aktual_end_6`, `cuti_besar_aktual_end_7`, `reff_id`, `created_date`, `created_user`, `created_ip_address`, `modified_date`, `modified_user`, `modified_ip_address`) VALUES
(3, 201501, '196505091993092002', 17, 154698399, 0, '7789', 'Luffy', NULL, 'Soppeng', '1965-05-04', 54, 6, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', '1965-05-09', '1965-05-09', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jl. Gugur Depan', '018292144444', NULL, NULL, NULL, 'depan@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'III', 'IV /B', NULL, NULL, 'BADAN KESATUAN BANGSA DAN POLITIK', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', '', '2019-11-12', '196505091993092002', '192.168.30.25'),
(4, 201501, '9999', 35, 30930530, 0, '9999', 'Rosalinda', NULL, '', '0000-00-00', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 4, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jl. Jakarta 28 Jakrta Urta', '8729123', NULL, NULL, NULL, 'sudirman@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-18', 'admin', '::1', '0000-00-00', '', ''),
(5, 201501, '', 23, 123767543, 0, '89111', 'Meli', NULL, '', '2021-08-30', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 4, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jl. Jakarta 28 Jakrta Urta', '87291231', NULL, NULL, NULL, 'sudirman2@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-04', 'admin', '::1', '0000-00-00', '', ''),
(6, 201501, '', 25, 72566225, 0, '1810', 'Putri Handayani', NULL, '', '1982-09-01', 0, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jl. Gajah Mungkur 28', '08192131', NULL, NULL, NULL, 'sinung@ithb.ac.id', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-04', 'admin', '::1', '0000-00-00', '', ''),
(7, 201501, '', 21, 158841851, 0, '3600002', 'Dimas Rizqy Pangestu', NULL, '', '2022-08-16', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'menghills 82', '081295031068', NULL, NULL, NULL, 'dimasrzqy@telkom.ac.id', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-16', 'admin', '::1', '0000-00-00', '', ''),
(8, 201501, '', 20, 31331849, 0, '300001', 'Safinaty', NULL, '', '2000-10-08', 0, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gang soleh solihun', '081234567890', NULL, NULL, NULL, 'fyndy@telkom.ac.id', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-16', 'admin', '::1', '0000-00-00', '', ''),
(9, 201501, '', 22, 129948011, 0, '6518239', 'Bambang Pamungkas', NULL, '', '2000-10-08', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Palembang', '08123445678', NULL, NULL, NULL, 'BP20@email.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-31', 'admin', '::1', '0000-00-00', '', ''),
(10, 201501, '', 24, 104635558, 0, '2394236666666666', 'RANDY', NULL, '', '2022-08-30', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 4, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PGA', '089999999999', NULL, NULL, NULL, 'MAIL@MAIL.COM', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-07', 'admin', '::1', '0000-00-00', '', ''),
(11, 201501, '', 28, 212202157, 0, '082280685058', 'zafir kun', NULL, '', '2022-09-07', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 1, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'palembang', '082280695489', NULL, NULL, NULL, 'zafirateambrebes@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-07', 'admin', '::1', '0000-00-00', '', ''),
(12, 201501, '', 26, 105493791, 0, '123465432', 'Firdy', NULL, '', '2000-10-08', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tangerang', '081295035678', NULL, NULL, NULL, 'firdy@mail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-07', 'admin', '::1', '0000-00-00', '', ''),
(13, 201501, '', 27, 214564999, 0, '556677889900', 'Tesam Arifah', NULL, '', '2019-01-26', 0, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Disini dikostan', '0899887766', NULL, NULL, NULL, 'tesam@26.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-07', 'admin', '::1', '0000-00-00', '', ''),
(14, 201501, '', 0, 41635201, 0, '13028888888892', 'TORIQ ', NULL, '', '2033-04-22', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUKABIRUS, PONDOK FIRDAUS A02', '082346890089', NULL, NULL, NULL, 'toriq@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-08', 'admin', '::1', '0000-00-00', '', ''),
(15, 201501, '', 0, 129571153, 0, '12345', 'Kaira', NULL, '', '2018-09-22', 0, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jl.Kemana Ya', '08123456', NULL, NULL, NULL, 'aaa@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-08', 'admin', '::1', '0000-00-00', '', ''),
(16, 201501, '1234567865432', 36, 87459488, 0, '1234567865432', 'intan', NULL, '', '2000-10-08', 0, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gba', '575573358998', NULL, NULL, NULL, 'intan@mail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-08', 'admin', '::1', '0000-00-00', '', ''),
(17, 201501, '', 30, 72171419, 0, '257473664663434', 'alsha', NULL, '', '2022-09-01', 0, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lacasa', '08675645565', NULL, NULL, NULL, 'alsha@mail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-08', 'admin', '::1', '0000-00-00', '', ''),
(18, 201501, '', 31, 45728998, 0, '15465543424', 'JACK DOE', NULL, '', '1989-07-05', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jl. Soekarno Hatta No 123 Bandung Jawa Barat', '08673567434', NULL, NULL, NULL, 'jack@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-08', 'admin', '::1', '0000-00-00', '', ''),
(21, 201501, '', 34, 105027307, 0, '5436437466464765', 'Susi ', NULL, '', '2000-12-10', 0, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jalan Selamet 10 sukabirus', '081233456789', NULL, NULL, NULL, 'susi@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-16', 'admin', '::1', '0000-00-00', '', ''),
(22, 201501, '', 0, 94107076, 0, '1234567890123456', 'Ruben Setiadi', NULL, '', '2000-10-08', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandung', '08126735896093', NULL, NULL, NULL, 'Ruse@mail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-16', 'admin', '::1', '0000-00-00', '', ''),
(23, 201501, '', 32, 45920433, 0, '3467892364823765', 'Rojak Saepudin Taufik', NULL, '', '2000-10-26', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 1, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandung', '081237544232596', NULL, NULL, NULL, 'Rosa@mail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-16', 'admin', '::1', '0000-00-00', '', ''),
(24, 201501, '', 33, 65132925, 0, '1671060511910006', 'M.ikhsan', NULL, '', '2022-09-01', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 1, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jl.vetran', '081332565', NULL, NULL, NULL, 'nvdddjjmm@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-29', 'admin', '::1', '0000-00-00', '', ''),
(25, 201501, '', 0, 87283827, 0, '23912492359252', 'Yenny', NULL, '', '1998-12-27', 0, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '934853090095839', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 12, NULL, NULL, NULL, NULL, NULL, 'Jl. Telkomunikasi 01', '086723468372', NULL, NULL, NULL, 'yenny@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-14', 'admin', '::1', '0000-00-00', '', ''),
(27, 3, '', 0, 99193946, 0, '0987654321', 'KL', NULL, '', '1993-07-01', 0, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, 'Jl. Sudirman', '081223345612', NULL, NULL, NULL, 'test@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(28, 3, '', 0, 58431118, 0, '1122334456', 'Isti', NULL, '', '1993-06-01', 0, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, 'Jl. Sudirman', '081166622342', NULL, NULL, NULL, 'test2@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(29, 3, '', 0, 71382556, 0, '1122334457', 'NF', NULL, '', '1993-05-01', 0, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '087766554433', NULL, NULL, NULL, 'test3@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(30, 3, '', 0, 170396196, 0, '1122334459', 'EKO PUTRO RAHMANTO', NULL, '', '1996-05-01', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, 'Jl. Sudirman', '08123123123', NULL, NULL, NULL, 'test4@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(31, 3, '', 0, 200787864, 0, '1122334441', 'Dimyati Supriyadi ', NULL, '', '1988-04-30', 35, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '08123456789', NULL, NULL, NULL, 'tes1@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(32, 3, '', 0, 175441689, 0, '1122334442', 'A.', NULL, '', '1988-04-01', 35, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, 'jl.sudirman', '0811223344564', NULL, NULL, NULL, 'tes2@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(33, 3, '', 0, 175850311, 0, '112233444211', 'SHD', NULL, '', '1980-01-01', 43, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl. Sudirman', '0987654321', NULL, NULL, NULL, 'tes@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(34, 3, '', 0, 127257731, 0, '1122334443', 'Dede Fitriani', NULL, '', '1987-01-01', 36, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl. Sudirman', '081122334457', NULL, NULL, NULL, 'tes22@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(35, 3, '', 0, 132234411, 0, '1122334454', 'dedy irawan', NULL, '', '1991-01-01', 32, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, 'Jl. Sudirman', '081122321334', NULL, NULL, NULL, 'tes99@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(36, 3, '', 0, 71943956, 0, '11223344577', 'Ricky', NULL, '', '1978-01-01', 45, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '09887762513', NULL, NULL, NULL, 'tes44@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(37, 3, '', 0, 126574831, 0, '1122334458', 'Sopian', NULL, '', '1993-01-01', 30, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl. Sudirman', '08776654321', NULL, NULL, NULL, 'tes11@gmail.com', '', 0, 4, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(38, 3, '', 0, 178218085, 0, '11223344332', 'Ikuy', NULL, '', '1995-01-01', 28, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 22, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '081192834722', NULL, NULL, NULL, 'test99@gmail.com', '', 0, 4, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(39, 3, '', 0, 136966448, 0, '33442211567', 'Viki Amirullah', NULL, '', '1994-01-01', 29, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl. Sudirman', '081177652432', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(40, 3, '', 0, 129421837, 0, '112233445922', 'MYB', NULL, '', '1992-01-02', 31, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl. Sudirman', '08776542317', NULL, NULL, NULL, 'test556@gmail.com', '', 0, 4, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(41, 3, '', 0, 66664745, 0, '876543356892', 'Dadi', NULL, '', '1987-01-03', 36, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl. Sudirman', '098877643251', NULL, NULL, NULL, '', '', 0, 5, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(42, 3, '', 0, 197956468, 0, '1122334467', 'Fitria', NULL, '', '1997-01-05', 26, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl. Sudirman', '0877642315', NULL, NULL, NULL, '', '', 0, 5, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(43, 3, '', 0, 90941871, 0, '0987654322', 'Guntur Jumantoro', NULL, '', '1986-09-09', 37, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 23, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '087765432435', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(44, 3, '', 0, 194878536, 0, '1122334448', 'CT', NULL, '', '1989-08-08', 34, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '087654327789', NULL, NULL, NULL, '', '', 0, 3, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(45, 3, '', 0, 212747527, 0, '1122334445', 'ZH. A.183', NULL, '', '1990-09-09', 33, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '087765434577', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(46, 3, '', 0, 166549514, 0, '09876543255', 'tds', NULL, '', '1985-09-09', 38, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 1, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '087654231527', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(48, 3, '', 0, 183151838, 0, '09876543288', 'muhamad hery', NULL, '', '1981-01-01', 42, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '098877654325', NULL, NULL, NULL, '', '', 0, 3, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(49, 3, '', 0, 43219399, 0, '1122334434', 'Myp', NULL, '', '1983-09-09', 40, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '099876432517', NULL, NULL, NULL, '', '', 0, 4, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(50, 3, '', 0, 85937996, 0, '123647382910', 'GB', NULL, '', '1989-02-02', 34, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '087654262819', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(51, 3, '', 0, 183666099, 0, '1122334439', 'Tubagus Dasep', NULL, '', '1988-02-02', 35, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '0877678987', NULL, NULL, NULL, '', '', 0, 5, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(52, 3, '', 0, 191394186, 0, '1122334469', 'Widarma', NULL, '', '1991-01-01', 32, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 23, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '087765432146', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(53, 3, '', 0, 201904612, 0, '112233445654', 'Andi permana', NULL, '', '1992-09-09', 31, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '087654231378', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(54, 3, '', 0, 90153898, 0, '11223344400', 'Ahmad', NULL, '', '1991-09-09', 32, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '08765432719', NULL, NULL, NULL, '', '', 0, 5, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(55, 3, '', 0, 169741147, 0, '09876543567', 'MUHAMAD EKOYADIN', NULL, '', '1993-02-04', 30, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '087654325189', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(56, 3, '', 0, 35864556, 0, '112233444764', 'Aditya Ibnu Khoiri', NULL, '', '1993-09-08', 30, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 23, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '08654327189', NULL, NULL, NULL, '', '', 0, 3, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(57, 3, '', 0, 156077232, 0, '56388291029', 'MHD', NULL, '', '1979-02-02', 44, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl. Sudirman', '098876542578', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(58, 3, '', 0, 202516930, 0, '09876543232', 'Ilham Maulana', NULL, '', '1992-09-09', 31, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 23, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '0988765435', NULL, NULL, NULL, '', '', 0, 3, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(59, 3, '', 0, 33534387, 0, '1122334458765', 'Wahyu Firmansyah ', NULL, '', '1991-09-09', 32, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '0876534261718', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(60, 3, '', 0, 93980531, 0, '1236482910382', 'Indih surya', NULL, '', '1989-08-07', 34, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '08765372819', NULL, NULL, NULL, '', '', 0, 5, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(61, 3, '', 0, 149035611, 0, '1122334444', 'IP', NULL, '', '1986-09-09', 37, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 23, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '0876542361728', NULL, NULL, NULL, '', '', 0, 3, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(62, 3, '', 0, 209382191, 0, '1122334345', 'IS/A.079', NULL, '', '1991-09-09', 32, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '087765245261', NULL, NULL, NULL, '', '', 0, 5, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(63, 3, '', 0, 132900202, 0, '11223344654', 'ME', NULL, '', '1990-08-07', 33, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl. Sudirman', '087625362717', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(64, 3, '', 0, 81086788, 0, '1122335467', 'Hendra irawan', NULL, '', '1976-01-02', 47, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 22, NULL, NULL, NULL, NULL, NULL, 'Jl. Sudirman', '08372919389', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(65, 3, '', 0, 34740180, 0, '098765543289', 'IM', NULL, '', '1987-09-09', 36, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '0872635271939', NULL, NULL, NULL, '', '', 0, 3, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', '');
INSERT INTO `hrm_pegawai` (`id_pegawai`, `id_perusahaan`, `userid`, `id_user`, `cid`, `no_dossier`, `NIP`, `nama_lengkap`, `foto`, `tempat_lahir`, `tanggal_lahir`, `usia`, `usia_lebih_bulan`, `jenis_kelamin`, `golongan_darah`, `tinggi_badan`, `berat_badan`, `agama`, `status_pernikahan`, `no_identitas_pribadi`, `NPWP`, `no_kartu_kesehatan`, `no_kartu_tenagakerja`, `kartu_kesehatan`, `no_kartu_keluarga`, `scan_ktp`, `scan_bpjs`, `scan_npwp`, `scan_paraf`, `scan_kk`, `scan_tandatangan`, `no_bpjs`, `id_hrm_status_pegawai`, `id_hrm_status_organik`, `status_tenaga_kerja`, `reg_tanggal_masuk`, `reg_tanggal_diangkat`, `reg_tanggal_training`, `reg_status_pegawai`, `tanggal_mpp`, `tanggal_pensiun`, `tanggal_terminasi`, `id_hrm_mst_jenis_terminasi_bi`, `gelar_akademik`, `gelar_profesi`, `pdk_id_tingkatpendidikan`, `pdk_sekolah_terakhir`, `pdk_jurusan_terakhir`, `pdk_ipk_terakhir`, `pdk_tahun_lulus`, `alamat_termutakhir`, `alamat_sesuai_identitas`, `mobilephone1`, `mobilephone2`, `telepon_rumah`, `fax_rumah`, `email1`, `email2`, `id_kk_profil_posisi`, `jbt_id_jabatan`, `jbt_jabatan`, `jbt_id_tingkat_jabatan`, `jbt_no_sk_jabatan`, `jbt_tgl_keputusan`, `jbt_tanggal_berlaku`, `jbt_keterangan_mutasi`, `pkt_id_pangkat`, `pkt_no_sk`, `pkt_tgl_keputusan`, `pkt_tgl_berlaku`, `pkt_gaji_pokok`, `pkt_id_jenis_kenaikan_pangkat`, `pkt_eselon`, `pkt_ruang`, `pos_id_hrm_kantor`, `pos_id_hrm_unit_kerja`, `pos_kantor`, `pos_id_kk_profil_posisi`, `sta_total_hukuman_disiplin`, `sta_total_penghargaan`, `pst_masabakti_20`, `pst_masabakti_25`, `pst_masabakti_30`, `pst_masabakti_35`, `pst_masabakti_40`, `cuti_besar_terakhir_start`, `cuti_besar_terakhir_end`, `cuti_besar_terakhir_ke`, `cuti_besar_plan_1`, `cuti_besar_plan_2`, `cuti_besar_plan_3`, `cuti_besar_plan_4`, `cuti_besar_plan_5`, `cuti_besar_plan_6`, `cuti_besar_plan_7`, `cuti_besar_ambil_1`, `cuti_besar_ambil_2`, `cuti_besar_ambil_3`, `cuti_besar_ambil_4`, `cuti_besar_ambil_5`, `cuti_besar_ambil_6`, `cuti_besar_ambil_7`, `cuti_besar_aktual_1`, `cuti_besar_aktual_2`, `cuti_besar_aktual_3`, `cuti_besar_aktual_4`, `cuti_besar_aktual_5`, `cuti_besar_aktual_6`, `cuti_besar_aktual_7`, `cuti_besar_aktual_end_1`, `cuti_besar_aktual_end_2`, `cuti_besar_aktual_end_3`, `cuti_besar_aktual_end_4`, `cuti_besar_aktual_end_5`, `cuti_besar_aktual_end_6`, `cuti_besar_aktual_end_7`, `reff_id`, `created_date`, `created_user`, `created_ip_address`, `modified_date`, `modified_user`, `modified_ip_address`) VALUES
(66, 3, '', 0, 68105806, 0, '11223345436', 'SUNANDAR', NULL, '', '1991-09-08', 32, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '09871625178', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(67, 3, '', 0, 133817826, 0, '087625182819', 'Heri Septian,S.E.', NULL, '', '1988-09-09', 35, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 23, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '087362719392', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(68, 3, '', 0, 94665265, 0, '098226372819', 'AJS', NULL, '', '1992-09-02', 31, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '0872615718', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(69, 3, '', 0, 196505108, 0, '112233445372', 'MH (A.1239)', NULL, '', '1990-09-09', 33, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '086515378192', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(71, 3, '', 0, 199304863, 0, '123484939201', 'As - A.269', NULL, '', '1994-08-07', 29, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '086353728181', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', ''),
(72, 3, '', 0, 209959527, 0, '12332839481', 'Abdul kohar ', NULL, '', '1993-09-07', 30, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, 13, NULL, NULL, NULL, NULL, NULL, 'Jl.Sudirman', '0862728192', NULL, NULL, NULL, '', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16', 'admin', '::1', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_perusahaan_asuransi`
--

CREATE TABLE `hrm_perusahaan_asuransi` (
  `id_hrm_perusahaan_asuransi` bigint(20) NOT NULL,
  `perusahaan_asuransi` varchar(250) NOT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  `alamat_kontak` varchar(250) DEFAULT NULL,
  `telepon_kontak` varchar(250) DEFAULT NULL,
  `email_kontak` varchar(250) DEFAULT NULL,
  `active_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hrm_perusahaan_asuransi`
--

INSERT INTO `hrm_perusahaan_asuransi` (`id_hrm_perusahaan_asuransi`, `perusahaan_asuransi`, `deskripsi`, `alamat_kontak`, `telepon_kontak`, `email_kontak`, `active_status`) VALUES
(1, 'AXA', '', NULL, NULL, NULL, 1),
(2, 'Lippo', '', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_status_pegawai`
--

CREATE TABLE `hrm_status_pegawai` (
  `id_hrm_status_pegawai` int(11) NOT NULL,
  `status_pegawai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `hrm_status_pegawai`
--

INSERT INTO `hrm_status_pegawai` (`id_hrm_status_pegawai`, `status_pegawai`) VALUES
(1, 'Tersedia'),
(2, 'Bekerja'),
(3, 'Sakit'),
(4, 'Pelatihan'),
(5, 'Istirahat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `image_management`
--

CREATE TABLE `image_management` (
  `id_image_management` bigint(20) NOT NULL,
  `keyname` varchar(100) NOT NULL,
  `id_section_content` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_user` int(11) DEFAULT NULL,
  `updated_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` bigint(20) NOT NULL,
  `id_struktur_organisasi` int(11) NOT NULL,
  `kode_jabatan` varchar(50) NOT NULL,
  `nama_jabatan` varchar(250) NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `id_struktur_organisasi`, `kode_jabatan`, `nama_jabatan`, `keterangan`) VALUES
(3, 3, 'WKC', 'Wakil Kepala Cabang', 'wakil kepala dari suatu cabang'),
(4, 3, 'IDT', 'Input Data', 'Divisi Penginputan Data'),
(5, 3, 'KSR', 'Kasir', ''),
(6, 3, 'PLG', 'Petugas Lapangan', ''),
(7, 3, 'KLP', 'Koordinator Lapangan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_landing_asset`
--

CREATE TABLE `jenis_landing_asset` (
  `id_jenis_landing_asset` int(11) NOT NULL,
  `jenis_landing_asset` varchar(250) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `icon` varchar(250) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `jenis_landing_asset`
--

INSERT INTO `jenis_landing_asset` (`id_jenis_landing_asset`, `jenis_landing_asset`, `deskripsi`, `icon`, `is_active`) VALUES
(1, 'css', 'css', NULL, 1),
(2, 'js', 'javscript', NULL, 1),
(3, 'image', 'images', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `id_propinsi` int(11) NOT NULL,
  `nama_kabupaten` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `id_propinsi`, `nama_kabupaten`) VALUES
(1101, 11, 'Kab. Simeulue'),
(1102, 11, 'Kab. Aceh Singkil'),
(1103, 11, 'Kab. Aceh Selatan'),
(1104, 11, 'Kab. Aceh Tenggara'),
(1105, 11, 'Kab. Aceh Timur'),
(1106, 11, 'Kab. Aceh Tengah'),
(1107, 11, 'Kab. Aceh Barat'),
(1108, 11, 'Kab. Aceh Besar'),
(1109, 11, 'Kab. Pidie'),
(1110, 11, 'Kab. Bireuen'),
(1111, 11, 'Kab. Aceh Utara'),
(1112, 11, 'Kab. Aceh Barat Daya'),
(1113, 11, 'Kab. Gayo Lues'),
(1114, 11, 'Kab. Aceh Tamiang'),
(1115, 11, 'Kab. Nagan Raya'),
(1116, 11, 'Kab. Aceh Jaya'),
(1117, 11, 'Kab. Bener Meriah'),
(1118, 11, 'Kab. Pidie Jaya'),
(1171, 11, 'Kota Banda Aceh'),
(1172, 11, 'Kota Sabang'),
(1173, 11, 'Kota Langsa'),
(1174, 11, 'Kota Lhokseumawe'),
(1175, 11, 'Kota Subulussalam'),
(1201, 12, 'Kab. Nias'),
(1202, 12, 'Kab. Mandailing Natal'),
(1203, 12, 'Kab. Tapanuli Selatan'),
(1204, 12, 'Kab. Tapanuli Tengah'),
(1205, 12, 'Kab. Tapanuli Utara'),
(1206, 12, 'Kab. Toba Samosir'),
(1207, 12, 'Kab. Labuhan Batu'),
(1208, 12, 'Kab. Asahan'),
(1209, 12, 'Kab. Simalungun'),
(1210, 12, 'Kab. Dairi'),
(1211, 12, 'Kab. Karo'),
(1212, 12, 'Kab. Deli Serdang'),
(1213, 12, 'Kab. Langkat'),
(1214, 12, 'Kab. Nias Selatan'),
(1215, 12, 'Kab. Humbang Hasundutan'),
(1216, 12, 'Kab. Pakpak Bharat'),
(1217, 12, 'Kab. Samosir'),
(1218, 12, 'Kab. Serdang Bedagai'),
(1219, 12, 'Kab. Batu Bara'),
(1220, 12, 'Kab. Padang Lawas Utara'),
(1221, 12, 'Kab. Padang Lawas'),
(1222, 12, 'Kab. Labuhan Batu Selatan'),
(1223, 12, 'Kab. Labuhan Batu Utara'),
(1224, 12, 'Kab. Nias Utara'),
(1225, 12, 'Kab. Nias Barat'),
(1271, 12, 'Kota Sibolga'),
(1272, 12, 'Kota Tanjung Balai'),
(1273, 12, 'Kota Pematang Siantar'),
(1274, 12, 'Kota Tebing Tinggi'),
(1275, 12, 'Kota Medan'),
(1276, 12, 'Kota Binjai'),
(1277, 12, 'Kota Padangsidimpuan'),
(1278, 12, 'Kota Gunungsitoli'),
(1301, 13, 'Kab. Kepulauan Mentawai'),
(1302, 13, 'Kab. Pesisir Selatan'),
(1303, 13, 'Kab. Solok'),
(1304, 13, 'Kab. Sijunjung'),
(1305, 13, 'Kab. Tanah Datar'),
(1306, 13, 'Kab. Padang Pariaman'),
(1307, 13, 'Kab. Agam'),
(1308, 13, 'Kab. Lima Puluh Kota'),
(1309, 13, 'Kab. Pasaman'),
(1310, 13, 'Kab. Solok Selatan'),
(1311, 13, 'Kab. Dharmasraya'),
(1312, 13, 'Kab. Pasaman Barat'),
(1371, 13, 'Kota Padang'),
(1372, 13, 'Kota Solok'),
(1373, 13, 'Kota Sawah Lunto'),
(1374, 13, 'Kota Padang Panjang'),
(1375, 13, 'Kota Bukittinggi'),
(1376, 13, 'Kota Payakumbuh'),
(1377, 13, 'Kota Pariaman'),
(1401, 14, 'Kab. Kuantan Singingi'),
(1402, 14, 'Kab. Indragiri Hulu'),
(1403, 14, 'Kab. Indragiri Hilir'),
(1404, 14, 'Kab. Pelalawan'),
(1405, 14, 'Kab. S I A K'),
(1406, 14, 'Kab. Kampar'),
(1407, 14, 'Kab. Rokan Hulu'),
(1408, 14, 'Kab. Bengkalis'),
(1409, 14, 'Kab. Rokan Hilir'),
(1410, 14, 'Kab. Kepulauan Meranti'),
(1471, 14, 'Kota Pekanbaru'),
(1473, 14, 'Kota D U M A I'),
(1501, 15, 'Kab. Kerinci'),
(1502, 15, 'Kab. Merangin'),
(1503, 15, 'Kab. Sarolangun'),
(1504, 15, 'Kab. Batang Hari'),
(1505, 15, 'Kab. Muaro Jambi'),
(1506, 15, 'Kab. Tanjung Jabung Timur'),
(1507, 15, 'Kab. Tanjung Jabung Barat'),
(1508, 15, 'Kab. Tebo'),
(1509, 15, 'Kab. Bungo'),
(1571, 15, 'Kota Jambi'),
(1572, 15, 'Kota Sungai Penuh'),
(1601, 16, 'Kab. Ogan Komering Ulu'),
(1602, 16, 'Kab. Ogan Komering Ilir'),
(1603, 16, 'Kab. Muara Enim'),
(1604, 16, 'Kab. Lahat'),
(1605, 16, 'Kab. Musi Rawas'),
(1606, 16, 'Kab. Musi Banyuasin'),
(1607, 16, 'Kab. Banyu Asin'),
(1608, 16, 'Kab. Ogan Komering Ulu Selatan'),
(1609, 16, 'Kab. Ogan Komering Ulu Timur'),
(1610, 16, 'Kab. Ogan Ilir'),
(1611, 16, 'Kab. Empat Lawang'),
(1671, 16, 'Kota Palembang'),
(1672, 16, 'Kota Prabumulih'),
(1673, 16, 'Kota Pagar Alam'),
(1674, 16, 'Kota Lubuklinggau'),
(1701, 17, 'Kab. Bengkulu Selatan'),
(1702, 17, 'Kab. Rejang Lebong'),
(1703, 17, 'Kab. Bengkulu Utara'),
(1704, 17, 'Kab. Kaur'),
(1705, 17, 'Kab. Seluma'),
(1706, 17, 'Kab. Mukomuko'),
(1707, 17, 'Kab. Lebong'),
(1708, 17, 'Kab. Kepahiang'),
(1709, 17, 'Kab. Bengkulu Tengah'),
(1771, 17, 'Kota Bengkulu'),
(1801, 18, 'Kab. Lampung Barat'),
(1802, 18, 'Kab. Tanggamus'),
(1803, 18, 'Kab. Lampung Selatan'),
(1804, 18, 'Kab. Lampung Timur'),
(1805, 18, 'Kab. Lampung Tengah'),
(1806, 18, 'Kab. Lampung Utara'),
(1807, 18, 'Kab. Way Kanan'),
(1808, 18, 'Kab. Tulangbawang'),
(1809, 18, 'Kab. Pesawaran'),
(1810, 18, 'Kab. Pringsewu'),
(1811, 18, 'Kab. Mesuji'),
(1812, 18, 'Kab. Tulang Bawang Barat'),
(1813, 18, 'Kab. Pesisir Barat'),
(1871, 18, 'Kota Bandar Lampung'),
(1872, 18, 'Kota Metro'),
(1901, 19, 'Kab. Bangka'),
(1902, 19, 'Kab. Belitung'),
(1903, 19, 'Kab. Bangka Barat'),
(1904, 19, 'Kab. Bangka Tengah'),
(1905, 19, 'Kab. Bangka Selatan'),
(1906, 19, 'Kab. Belitung Timur'),
(1971, 19, 'Kota Pangkal Pinang'),
(2101, 21, 'Kab. Karimun'),
(2102, 21, 'Kab. Bintan'),
(2103, 21, 'Kab. Natuna'),
(2104, 21, 'Kab. Lingga'),
(2105, 21, 'Kab. Kepulauan Anambas'),
(2171, 21, 'Kota B A T A M'),
(2172, 21, 'Kota Tanjung Pinang'),
(3101, 31, 'Kab. Kepulauan Seribu'),
(3171, 31, 'Kota Jakarta Selatan'),
(3172, 31, 'Kota Jakarta Timur'),
(3173, 31, 'Kota Jakarta Pusat'),
(3174, 31, 'Kota Jakarta Barat'),
(3175, 31, 'Kota Jakarta Utara'),
(3201, 32, 'Kab. Bogor'),
(3202, 32, 'Kab. Sukabumi'),
(3203, 32, 'Kab. Cianjur'),
(3204, 32, 'Kab. Bandung'),
(3205, 32, 'Kab. Garut'),
(3206, 32, 'Kab. Tasikmalaya'),
(3207, 32, 'Kab. Ciamis'),
(3208, 32, 'Kab. Kuningan'),
(3209, 32, 'Kab. Cirebon'),
(3210, 32, 'Kab. Majalengka'),
(3211, 32, 'Kab. Sumedang'),
(3212, 32, 'Kab. Indramayu'),
(3213, 32, 'Kab. Subang'),
(3214, 32, 'Kab. Purwakarta'),
(3215, 32, 'Kab. Karawang'),
(3216, 32, 'Kab. Bekasi'),
(3217, 32, 'Kab. Bandung Barat'),
(3218, 32, 'Kab. Pangandaran'),
(3271, 32, 'Kota Bogor'),
(3272, 32, 'Kota Sukabumi'),
(3273, 32, 'Kota Bandung'),
(3274, 32, 'Kota Cirebon'),
(3275, 32, 'Kota Bekasi'),
(3276, 32, 'Kota Depok'),
(3277, 32, 'Kota Cimahi'),
(3278, 32, 'Kota Tasikmalaya'),
(3279, 32, 'Kota Banjar'),
(3301, 33, 'Kab. Cilacap'),
(3302, 33, 'Kab. Banyumas'),
(3303, 33, 'Kab. Purbalingga'),
(3304, 33, 'Kab. Banjarnegara'),
(3305, 33, 'Kab. Kebumen'),
(3306, 33, 'Kab. Purworejo'),
(3307, 33, 'Kab. Wonosobo'),
(3308, 33, 'Kab. Magelang'),
(3309, 33, 'Kab. Boyolali'),
(3310, 33, 'Kab. Klaten'),
(3311, 33, 'Kab. Sukoharjo'),
(3312, 33, 'Kab. Wonogiri'),
(3313, 33, 'Kab. Karanganyar'),
(3314, 33, 'Kab. Sragen'),
(3315, 33, 'Kab. Grobogan'),
(3316, 33, 'Kab. Blora'),
(3317, 33, 'Kab. Rembang'),
(3318, 33, 'Kab. Pati'),
(3319, 33, 'Kab. Kudus'),
(3320, 33, 'Kab. Jepara'),
(3321, 33, 'Kab. Demak'),
(3322, 33, 'Kab. Semarang'),
(3323, 33, 'Kab. Temanggung'),
(3324, 33, 'Kab. Kendal'),
(3325, 33, 'Kab. Batang'),
(3326, 33, 'Kab. Pekalongan'),
(3327, 33, 'Kab. Pemalang'),
(3328, 33, 'Kab. Tegal'),
(3329, 33, 'Kab. Brebes'),
(3371, 33, 'Kota Magelang'),
(3372, 33, 'Kota Surakarta'),
(3373, 33, 'Kota Salatiga'),
(3374, 33, 'Kota Semarang'),
(3375, 33, 'Kota Pekalongan'),
(3376, 33, 'Kota Tegal'),
(3401, 34, 'Kab. Kulon Progo'),
(3402, 34, 'Kab. Bantul'),
(3403, 34, 'Kab. Gunung Kidul'),
(3404, 34, 'Kab. Sleman'),
(3471, 34, 'Kota Yogyakarta'),
(3501, 35, 'Kab. Pacitan'),
(3502, 35, 'Kab. Ponorogo'),
(3503, 35, 'Kab. Trenggalek'),
(3504, 35, 'Kab. Tulungagung'),
(3505, 35, 'Kab. Blitar'),
(3506, 35, 'Kab. Kediri'),
(3507, 35, 'Kab. Malang'),
(3508, 35, 'Kab. Lumajang'),
(3509, 35, 'Kab. Jember'),
(3510, 35, 'Kab. Banyuwangi'),
(3511, 35, 'Kab. Bondowoso'),
(3512, 35, 'Kab. Situbondo'),
(3513, 35, 'Kab. Probolinggo'),
(3514, 35, 'Kab. Pasuruan'),
(3515, 35, 'Kab. Sidoarjo'),
(3516, 35, 'Kab. Mojokerto'),
(3517, 35, 'Kab. Jombang'),
(3518, 35, 'Kab. Nganjuk'),
(3519, 35, 'Kab. Madiun'),
(3520, 35, 'Kab. Magetan'),
(3521, 35, 'Kab. Ngawi'),
(3522, 35, 'Kab. Bojonegoro'),
(3523, 35, 'Kab. Tuban'),
(3524, 35, 'Kab. Lamongan'),
(3525, 35, 'Kab. Gresik'),
(3526, 35, 'Kab. Bangkalan'),
(3527, 35, 'Kab. Sampang'),
(3528, 35, 'Kab. Pamekasan'),
(3529, 35, 'Kab. Sumenep'),
(3571, 35, 'Kota Kediri'),
(3572, 35, 'Kota Blitar'),
(3573, 35, 'Kota Malang'),
(3574, 35, 'Kota Probolinggo'),
(3575, 35, 'Kota Pasuruan'),
(3576, 35, 'Kota Mojokerto'),
(3577, 35, 'Kota Madiun'),
(3578, 35, 'Kota Surabaya'),
(3579, 35, 'Kota Batu'),
(3601, 36, 'Kab. Pandeglang'),
(3602, 36, 'Kab. Lebak'),
(3603, 36, 'Kab. Tangerang'),
(3604, 36, 'Kab. Serang'),
(3671, 36, 'Kota Tangerang'),
(3672, 36, 'Kota Cilegon'),
(3673, 36, 'Kota Serang'),
(3674, 36, 'Kota Tangerang Selatan'),
(5101, 51, 'Kab. Jembrana'),
(5102, 51, 'Kab. Tabanan'),
(5103, 51, 'Kab. Badung'),
(5104, 51, 'Kab. Gianyar'),
(5105, 51, 'Kab. Klungkung'),
(5106, 51, 'Kab. Bangli'),
(5107, 51, 'Kab. Karang Asem'),
(5108, 51, 'Kab. Buleleng'),
(5171, 51, 'Kota Denpasar'),
(5201, 52, 'Kab. Lombok Barat'),
(5202, 52, 'Kab. Lombok Tengah'),
(5203, 52, 'Kab. Lombok Timur'),
(5204, 52, 'Kab. Sumbawa'),
(5205, 52, 'Kab. Dompu'),
(5206, 52, 'Kab. Bima'),
(5207, 52, 'Kab. Sumbawa Barat'),
(5208, 52, 'Kab. Lombok Utara'),
(5271, 52, 'Kota Mataram'),
(5272, 52, 'Kota Bima'),
(5301, 53, 'Kab. Sumba Barat'),
(5302, 53, 'Kab. Sumba Timur'),
(5303, 53, 'Kab. Kupang'),
(5304, 53, 'Kab. Timor Tengah Selatan'),
(5305, 53, 'Kab. Timor Tengah Utara'),
(5306, 53, 'Kab. Belu'),
(5307, 53, 'Kab. Alor'),
(5308, 53, 'Kab. Lembata'),
(5309, 53, 'Kab. Flores Timur'),
(5310, 53, 'Kab. Sikka'),
(5311, 53, 'Kab. Ende'),
(5312, 53, 'Kab. Ngada'),
(5313, 53, 'Kab. Manggarai'),
(5314, 53, 'Kab. Rote Ndao'),
(5315, 53, 'Kab. Manggarai Barat'),
(5316, 53, 'Kab. Sumba Tengah'),
(5317, 53, 'Kab. Sumba Barat Daya'),
(5318, 53, 'Kab. Nagekeo'),
(5319, 53, 'Kab. Manggarai Timur'),
(5320, 53, 'Kab. Sabu Raijua'),
(5371, 53, 'Kota Kupang'),
(6101, 61, 'Kab. Sambas'),
(6102, 61, 'Kab. Bengkayang'),
(6103, 61, 'Kab. Landak'),
(6104, 61, 'Kab. Pontianak'),
(6105, 61, 'Kab. Sanggau'),
(6106, 61, 'Kab. Ketapang'),
(6107, 61, 'Kab. Sintang'),
(6108, 61, 'Kab. Kapuas Hulu'),
(6109, 61, 'Kab. Sekadau'),
(6110, 61, 'Kab. Melawi'),
(6111, 61, 'Kab. Kayong Utara'),
(6112, 61, 'Kab. Kubu Raya'),
(6171, 61, 'Kota Pontianak'),
(6172, 61, 'Kota Singkawang'),
(6201, 62, 'Kab. Kotawaringin Barat'),
(6202, 62, 'Kab. Kotawaringin Timur'),
(6203, 62, 'Kab. Kapuas'),
(6204, 62, 'Kab. Barito Selatan'),
(6205, 62, 'Kab. Barito Utara'),
(6206, 62, 'Kab. Sukamara'),
(6207, 62, 'Kab. Lamandau'),
(6208, 62, 'Kab. Seruyan'),
(6209, 62, 'Kab. Katingan'),
(6210, 62, 'Kab. Pulang Pisau'),
(6211, 62, 'Kab. Gunung Mas'),
(6212, 62, 'Kab. Barito Timur'),
(6213, 62, 'Kab. Murung Raya'),
(6271, 62, 'Kota Palangka Raya'),
(6301, 63, 'Kab. Tanah Laut'),
(6302, 63, 'Kab. Kota Baru'),
(6303, 63, 'Kab. Banjar'),
(6304, 63, 'Kab. Barito Kuala'),
(6305, 63, 'Kab. Tapin'),
(6306, 63, 'Kab. Hulu Sungai Selatan'),
(6307, 63, 'Kab. Hulu Sungai Tengah'),
(6308, 63, 'Kab. Hulu Sungai Utara'),
(6309, 63, 'Kab. Tabalong'),
(6310, 63, 'Kab. Tanah Bumbu'),
(6311, 63, 'Kab. Balangan'),
(6371, 63, 'Kota Banjarmasin'),
(6372, 63, 'Kota Banjar Baru'),
(6401, 64, 'Kab. Paser'),
(6402, 64, 'Kab. Kutai Barat'),
(6403, 64, 'Kab. Kutai Kartanegara'),
(6404, 64, 'Kab. Kutai Timur'),
(6405, 64, 'Kab. Berau'),
(6409, 64, 'Kab. Penajam Paser Utara'),
(6471, 64, 'Kota Balikpapan'),
(6472, 64, 'Kota Samarinda'),
(6474, 64, 'Kota Bontang'),
(6501, 65, 'Kab. Malinau'),
(6502, 65, 'Kab. Bulungan'),
(6503, 65, 'Kab. Tana Tidung'),
(6504, 65, 'Kab. Nunukan'),
(6571, 65, 'Kota Tarakan'),
(7101, 71, 'Kab. Bolaang Mongondow'),
(7102, 71, 'Kab. Minahasa'),
(7103, 71, 'Kab. Kepulauan Sangihe'),
(7104, 71, 'Kab. Kepulauan Talaud'),
(7105, 71, 'Kab. Minahasa Selatan'),
(7106, 71, 'Kab. Minahasa Utara'),
(7107, 71, 'Kab. Bolaang Mongondow Utara'),
(7108, 71, 'Kab. Siau Tagulandang Biaro'),
(7109, 71, 'Kab. Minahasa Tenggara'),
(7110, 71, 'Kab. Bolaang Mongondow Selatan'),
(7111, 71, 'Kab. Bolaang Mongondow Timur'),
(7171, 71, 'Kota Manado'),
(7172, 71, 'Kota Bitung'),
(7173, 71, 'Kota Tomohon'),
(7174, 71, 'Kota Kotamobagu'),
(7201, 72, 'Kab. Banggai Kepulauan'),
(7202, 72, 'Kab. Banggai'),
(7203, 72, 'Kab. Morowali'),
(7204, 72, 'Kab. Poso'),
(7205, 72, 'Kab. Donggala'),
(7206, 72, 'Kab. Toli-toli'),
(7207, 72, 'Kab. Buol'),
(7208, 72, 'Kab. Parigi Moutong'),
(7209, 72, 'Kab. Tojo Una-una'),
(7210, 72, 'Kab. Sigi'),
(7271, 72, 'Kota Palu'),
(7301, 73, 'Kab. Kepulauan Selayar'),
(7302, 73, 'Kab. Bulukumba'),
(7303, 73, 'Kab. Bantaeng'),
(7304, 73, 'Kab. Jeneponto'),
(7305, 73, 'Kab. Takalar'),
(7306, 73, 'Kab. Gowa'),
(7307, 73, 'Kab. Sinjai'),
(7308, 73, 'Kab. Maros'),
(7309, 73, 'Kab. Pangkajene Dan Kepulauan'),
(7310, 73, 'Kab. Barru'),
(7311, 73, 'Kab. Bone'),
(7312, 73, 'Kab. Soppeng'),
(7313, 73, 'Kab. Wajo'),
(7314, 73, 'Kab. Sidenreng Rappang'),
(7315, 73, 'Kab. Pinrang'),
(7316, 73, 'Kab. Enrekang'),
(7317, 73, 'Kab. Luwu'),
(7318, 73, 'Kab. Tana Toraja'),
(7322, 73, 'Kab. Luwu Utara'),
(7325, 73, 'Kab. Luwu Timur'),
(7326, 73, 'Kab. Toraja Utara'),
(7371, 73, 'Kota Makassar'),
(7372, 73, 'Kota Parepare'),
(7373, 73, 'Kota Palopo'),
(7401, 74, 'Kab. Buton'),
(7402, 74, 'Kab. Muna'),
(7403, 74, 'Kab. Konawe'),
(7404, 74, 'Kab. Kolaka'),
(7405, 74, 'Kab. Konawe Selatan'),
(7406, 74, 'Kab. Bombana'),
(7407, 74, 'Kab. Wakatobi'),
(7408, 74, 'Kab. Kolaka Utara'),
(7409, 74, 'Kab. Buton Utara'),
(7410, 74, 'Kab. Konawe Utara'),
(7471, 74, 'Kota Kendari'),
(7472, 74, 'Kota Baubau'),
(7501, 75, 'Kab. Boalemo'),
(7502, 75, 'Kab. Gorontalo'),
(7503, 75, 'Kab. Pohuwato'),
(7504, 75, 'Kab. Bone Bolango'),
(7505, 75, 'Kab. Gorontalo Utara'),
(7571, 75, 'Kota Gorontalo'),
(7601, 76, 'Kab. Majene'),
(7602, 76, 'Kab. Polewali Mandar'),
(7603, 76, 'Kab. Mamasa'),
(7604, 76, 'Kab. Mamuju'),
(7605, 76, 'Kab. Mamuju Utara'),
(8101, 81, 'Kab. Maluku Tenggara Barat'),
(8102, 81, 'Kab. Maluku Tenggara'),
(8103, 81, 'Kab. Maluku Tengah'),
(8104, 81, 'Kab. Buru'),
(8105, 81, 'Kab. Kepulauan Aru'),
(8106, 81, 'Kab. Seram Bagian Barat'),
(8107, 81, 'Kab. Seram Bagian Timur'),
(8108, 81, 'Kab. Maluku Barat Daya'),
(8109, 81, 'Kab. Buru Selatan'),
(8171, 81, 'Kota Ambon'),
(8172, 81, 'Kota Tual'),
(8201, 82, 'Kab. Halmahera Barat'),
(8202, 82, 'Kab. Halmahera Tengah'),
(8203, 82, 'Kab. Kepulauan Sula'),
(8204, 82, 'Kab. Halmahera Selatan'),
(8205, 82, 'Kab. Halmahera Utara'),
(8206, 82, 'Kab. Halmahera Timur'),
(8207, 82, 'Kab. Pulau Morotai'),
(8271, 82, 'Kota Ternate'),
(8272, 82, 'Kota Tidore Kepulauan'),
(9101, 91, 'Kab. Fakfak'),
(9102, 91, 'Kab. Kaimana'),
(9103, 91, 'Kab. Teluk Wondama'),
(9104, 91, 'Kab. Teluk Bintuni'),
(9105, 91, 'Kab. Manokwari'),
(9106, 91, 'Kab. Sorong Selatan'),
(9107, 91, 'Kab. Sorong'),
(9108, 91, 'Kab. Raja Ampat'),
(9109, 91, 'Kab. Tambrauw'),
(9110, 91, 'Kab. Maybrat'),
(9171, 91, 'Kota Sorong'),
(9401, 94, 'Kab. Merauke'),
(9402, 94, 'Kab. Jayawijaya'),
(9403, 94, 'Kab. Jayapura'),
(9404, 94, 'Kab. Nabire'),
(9408, 94, 'Kab. Kepulauan Yapen'),
(9409, 94, 'Kab. Biak Numfor'),
(9410, 94, 'Kab. Paniai'),
(9411, 94, 'Kab. Puncak Jaya'),
(9412, 94, 'Kab. Mimika'),
(9413, 94, 'Kab. Boven Digoel'),
(9414, 94, 'Kab. Mappi'),
(9415, 94, 'Kab. Asmat'),
(9416, 94, 'Kab. Yahukimo'),
(9417, 94, 'Kab. Pegunungan Bintang'),
(9418, 94, 'Kab. Tolikara'),
(9419, 94, 'Kab. Sarmi'),
(9420, 94, 'Kab. Keerom'),
(9426, 94, 'Kab. Waropen'),
(9427, 94, 'Kab. Supiori'),
(9428, 94, 'Kab. Mamberamo Raya'),
(9429, 94, 'Kab. Nduga'),
(9430, 94, 'Kab. Lanny Jaya'),
(9431, 94, 'Kab. Mamberamo Tengah'),
(9432, 94, 'Kab. Yalimo'),
(9433, 94, 'Kab. Puncak'),
(9434, 94, 'Kab. Dogiyai'),
(9435, 94, 'Kab. Intan Jaya'),
(9436, 94, 'Kab. Deiyai'),
(9471, 94, 'Kota Jayapura');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kantor`
--

CREATE TABLE `kantor` (
  `id_kantor` int(11) NOT NULL,
  `nama_kantor` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `id_kabupaten` bigint(20) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_negara` int(11) NOT NULL,
  `longitude` varchar(150) DEFAULT NULL,
  `latitude` varchar(150) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kantor`
--

INSERT INTO `kantor` (`id_kantor`, `nama_kantor`, `alamat`, `id_kabupaten`, `id_provinsi`, `id_negara`, `longitude`, `latitude`, `keterangan`) VALUES
(1, 'Jakarta HQ', 'Jl. Sudirman', 1, 1, 1, NULL, NULL, NULL),
(2, 'Cabang Jayapura - Papua', 'Jl. Merdeka 26 Papua Barat', 100, 10, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nama_kecamatan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `id_kabupaten`, `nama_kecamatan`) VALUES
(1, 1101, 'Simelue A'),
(2, 1102, 'Aceh Singkil A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` bigint(20) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_kelurahan` varchar(250) NOT NULL,
  `kodepos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `id_kecamatan`, `nama_kelurahan`, `kodepos`) VALUES
(1, 1, 'Kelurahan Simelua A', 12),
(2, 2, 'Kelurahan Aceh Singkli', 1),
(3, 1, 'ssa asarrr', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` bigint(32) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `nama_singkat` varchar(250) NOT NULL,
  `nama_panjang` varchar(250) NOT NULL,
  `id_perusahaan` bigint(20) NOT NULL,
  `Alamat` text NOT NULL,
  `Phone1` varchar(250) NOT NULL,
  `Phone2` varchar(250) NOT NULL,
  `fax_number` varchar(250) NOT NULL,
  `nama_aplikasi` varchar(250) NOT NULL,
  `tahun_implementasi_pertama` int(4) DEFAULT NULL,
  `Email` varchar(250) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama_perusahaan`, `nama_singkat`, `nama_panjang`, `id_perusahaan`, `Alamat`, `Phone1`, `Phone2`, `fax_number`, `nama_aplikasi`, `tahun_implementasi_pertama`, `Email`, `pin`, `logo`) VALUES
(1, 'KUM', 'Karya Usaha Mandiri', 'PT. BANK PEMBANGUNAN DAERAH KALIMANTAN TENGAH', 201501, 'Kantor Pusat\r\nJl. RTA Milono No.12 Palangka Raya 73111\r\n', 'Telp. (0536) 3225602, 3226812, 3226813, 3226815, 3226891', '(024) 3554025', 'Fax. (0536) 3224066, 32230522, 3226893, 3226237', 'Sistem Informasi Kepegawaian', 2015, 'dsdm@bankkalteng.co.id', '-', 'logo1_20151124131829_1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `landing_asset`
--

CREATE TABLE `landing_asset` (
  `id_landing_asset` bigint(20) NOT NULL,
  `id_jenis_landing_asset` int(11) NOT NULL,
  `id_parent` bigint(20) DEFAULT NULL,
  `has_child` int(1) DEFAULT NULL,
  `judul` varchar(250) NOT NULL,
  `nomor` varchar(150) DEFAULT NULL,
  `icon` varchar(250) DEFAULT NULL,
  `triwulan` int(4) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  `type` set('FILE','URL') DEFAULT 'FILE',
  `link_url` varchar(500) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  `id_bagian` int(11) DEFAULT 0,
  `created_id_user` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL,
  `count_view` bigint(20) DEFAULT 0,
  `count_download` bigint(20) DEFAULT 0,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `landing_asset`
--

INSERT INTO `landing_asset` (`id_landing_asset`, `id_jenis_landing_asset`, `id_parent`, `has_child`, `judul`, `nomor`, `icon`, `triwulan`, `tahun`, `type`, `link_url`, `file`, `id_bagian`, `created_id_user`, `created_date`, `created_ip_address`, `count_view`, `count_download`, `is_active`) VALUES
(1, 1, NULL, 0, 'bootstrap.min', '', '--', NULL, NULL, 'FILE', '', 'bootstrap.min.css', 0, NULL, NULL, NULL, 0, 0, 1),
(2, 1, NULL, 0, 'bootstrap-icons', '', '--', NULL, NULL, 'FILE', '', 'bootstrap-icons.css', 0, NULL, NULL, NULL, 0, 0, 1),
(3, 1, NULL, 0, 'aos.css', '', '--', NULL, NULL, 'FILE', '', 'aos.css.css', 0, NULL, NULL, NULL, 0, 0, 1),
(4, 1, NULL, 0, 'glightbox.css', '', '--', NULL, NULL, 'FILE', '', 'glightbox.css.css', 0, NULL, NULL, NULL, 0, 0, 1),
(5, 1, NULL, 0, 'swipper.css', '', '--', NULL, NULL, 'FILE', '', 'swipper.css.css', 0, NULL, NULL, NULL, 0, 0, 1),
(6, 1, NULL, 0, 'variable', '', '--', NULL, NULL, 'FILE', '', 'variable.css', 0, NULL, NULL, NULL, 0, 0, 1),
(8, 3, NULL, 0, 'Horizontal', '', '--', NULL, NULL, 'FILE', '', 'Horizontal.png', 0, NULL, NULL, NULL, 0, 0, 1),
(9, 2, NULL, 0, 'bootstrap.bundle', '', '--', NULL, NULL, 'FILE', '', 'bootstrap.bundle.js', 0, NULL, NULL, NULL, 0, 0, 1),
(10, 2, NULL, 0, 'aos.js', '', '--', NULL, NULL, 'FILE', '', 'aos.js.js', 0, NULL, NULL, NULL, 0, 0, 1),
(11, 2, NULL, 0, 'glightbox.js', '', '--', NULL, NULL, 'FILE', '', 'glightbox.js.js', 0, NULL, NULL, NULL, 0, 0, 1),
(12, 2, NULL, 0, 'isotop', '', '--', NULL, NULL, 'FILE', '', 'isotop.js', 0, NULL, NULL, NULL, 0, 0, 1),
(13, 2, NULL, 0, 'swiper', '', '--', NULL, NULL, 'FILE', '', 'swiper.js', 0, NULL, NULL, NULL, 0, 0, 1),
(14, 2, NULL, 0, 'main', '', '--', NULL, NULL, 'FILE', '', 'main.js', 0, NULL, NULL, NULL, 0, 0, 1),
(15, 1, NULL, 0, 'main', '', '--', NULL, NULL, 'FILE', '', 'main.css', 0, NULL, NULL, NULL, 0, 0, 0),
(16, 3, NULL, 0, 'hero-fullscreen-bg', '12', '--', NULL, NULL, 'FILE', '', 'hero-fullscreen-bg.jpg', 0, NULL, NULL, NULL, 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `landing_home`
--

CREATE TABLE `landing_home` (
  `id_landing_home` int(11) NOT NULL,
  `page_number` int(1) DEFAULT 0,
  `page_name` varchar(250) DEFAULT NULL,
  `source_html` longtext DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `landing_home`
--

INSERT INTO `landing_home` (`id_landing_home`, `page_number`, `page_name`, `source_html`, `is_active`) VALUES
(1, 2, 'MAIN ALL', '<!DOCTYPE html>\r\n<html lang=\"en\">\r\n\r\n<head>\r\n  <meta charset=\"utf-8\">\r\n  <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">\r\n\r\n  <title>Sirana</title>\r\n  <meta content=\"\" name=\"description\">\r\n  <meta content=\"\" name=\"keywords\">\r\n\r\n  <!-- Favicons -->\r\n  <link href=\"assets/img/Only.png\" rel=\"icon\">\r\n  <!-- <link href=\"assets/img/apple-touch-icon.png\" rel=\"apple-touch-icon\"> -->\r\n\r\n  <!-- Google Fonts -->\r\n  <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">\r\n  <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>\r\n  <link href=\"https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap\" rel=\"stylesheet\">\r\n\r\n  <!-- Vendor CSS Files -->\r\n  <link href=\"assets/vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">\r\n  <link href=\"assets/vendor/bootstrap-icons/bootstrap-icons.css\" rel=\"stylesheet\">\r\n  <link href=\"assets/vendor/aos/aos.css\" rel=\"stylesheet\">\r\n  <link href=\"assets/vendor/glightbox/css/glightbox.min.css\" rel=\"stylesheet\">\r\n  <link href=\"assets/vendor/swiper/swiper-bundle.min.css\" rel=\"stylesheet\">\r\n\r\n  <!-- Variables CSS Files. Uncomment your preferred color scheme -->\r\n  <link href=\"assets/css/variables.css\" rel=\"stylesheet\">\r\n  <!-- <link href=\"assets/css/variables-blue.css\" rel=\"stylesheet\"> -->\r\n  <!-- <link href=\"assets/css/variables-green.css\" rel=\"stylesheet\"> -->\r\n  <!-- <link href=\"assets/css/variables-orange.css\" rel=\"stylesheet\"> -->\r\n  <!-- <link href=\"assets/css/variables-purple.css\" rel=\"stylesheet\"> -->\r\n  <!-- <link href=\"assets/css/variables-red.css\" rel=\"stylesheet\"> -->\r\n  <!-- <link href=\"assets/css/variables-pink.css\" rel=\"stylesheet\"> -->\r\n\r\n  <!-- Template Main CSS File -->\r\n  <link href=\"assets/css/main.css\" rel=\"stylesheet\">\r\n\r\n  <!-- =======================================================\r\n  * Template Name: HeroBiz - v2.3.1\r\n  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/\r\n  * Author: BootstrapMade.com\r\n  * License: https://bootstrapmade.com/license/\r\n  ======================================================== -->\r\n</head>\r\n\r\n<body>\r\n\r\n  <!-- ======= Header ======= -->\r\n  <header id=\"header\" class=\"header fixed-top\" data-scrollto-offset=\"0\">\r\n    <div class=\"container-fluid d-flex align-items-center justify-content-between\">\r\n\r\n      <a href=\"index.html\" class=\"logo d-flex align-items-center scrollto me-auto me-lg-0\">\r\n        <!-- Uncomment the line below if you also wish to use an image logo -->\r\n        <!-- <img src=\"assets/img/logo.png\" alt=\"\"> -->\r\n        <!-- <h1>HeroBiz<span>.</span></h1> -->\r\n        <img src=\"landing_asset/Horizontal.png\" alt=\"\">\r\n      </a>\r\n      <!-- <a href=\"index.html\" class=\"logo d-flex align-items-center scrollto me-auto me-lg-0\"> -->\r\n        <!-- Uncomment the line below if you also wish to use an image logo -->\r\n        <!-- <img src=\"assets/img/logo.png\" alt=\"\"> -->\r\n        <!-- <h1>Sirana<span>.</span></h1> -->\r\n      <!-- </a> -->\r\n\r\n      <nav id=\"navbar\" class=\"navbar\">\r\n        <ul>\r\n\r\n          <!-- <li><a href=\"index.html\"><span>Home</span></a>\r\n          </li> -->\r\n\r\n          <li><a class=\"nav-link scrollto\" href=\"index.html#about\">Tentang Kami</a></li>\r\n          <!-- <li><a class=\"nav-link scrollto\" href=\"index.html#services\">Services</a></li>\r\n          <li><a class=\"nav-link scrollto\" href=\"index.html#portfolio\">Portfolio</a></li>\r\n          <li><a class=\"nav-link scrollto\" href=\"index.html#team\">Team</a></li> -->\r\n          <!-- <li><a href=\"blog.html\">Blog</a></li>\r\n          <li class=\"dropdown megamenu\"><a href=\"#\"><span>Mega Menu</span> <i class=\"bi bi-chevron-down dropdown-indicator\"></i></a>\r\n            <ul>\r\n              <li>\r\n                <a href=\"#\">Column 1 link 1</a>\r\n                <a href=\"#\">Column 1 link 2</a>\r\n                <a href=\"#\">Column 1 link 3</a>\r\n              </li>\r\n              <li>\r\n                <a href=\"#\">Column 2 link 1</a>\r\n                <a href=\"#\">Column 2 link 2</a>\r\n                <a href=\"#\">Column 3 link 3</a>\r\n              </li>\r\n              <li>\r\n                <a href=\"#\">Column 3 link 1</a>\r\n                <a href=\"#\">Column 3 link 2</a>\r\n                <a href=\"#\">Column 3 link 3</a>\r\n              </li>\r\n              <li>\r\n                <a href=\"#\">Column 4 link 1</a>\r\n                <a href=\"#\">Column 4 link 2</a>\r\n                <a href=\"#\">Column 4 link 3</a>\r\n              </li>\r\n            </ul>\r\n          </li> -->\r\n          <!-- <li class=\"dropdown\"><a href=\"#\"><span>Drop Down</span> <i class=\"bi bi-chevron-down dropdown-indicator\"></i></a>\r\n            <ul>\r\n              <li><a href=\"#\">Drop Down 1</a></li>\r\n              <li class=\"dropdown\"><a href=\"#\"><span>Deep Drop Down</span> <i class=\"bi bi-chevron-down dropdown-indicator\"></i></a>\r\n                <ul>\r\n                  <li><a href=\"#\">Deep Drop Down 1</a></li>\r\n                  <li><a href=\"#\">Deep Drop Down 2</a></li>\r\n                  <li><a href=\"#\">Deep Drop Down 3</a></li>\r\n                  <li><a href=\"#\">Deep Drop Down 4</a></li>\r\n                  <li><a href=\"#\">Deep Drop Down 5</a></li>\r\n                </ul>\r\n              </li>\r\n              <li><a href=\"#\">Drop Down 2</a></li>\r\n              <li><a href=\"#\">Drop Down 3</a></li>\r\n              <li><a href=\"#\">Drop Down 4</a></li>\r\n            </ul>\r\n          </li>\r\n          <li><a class=\"nav-link scrollto\" href=\"index.html#contact\">Contact</a></li>\r\n        </ul>\r\n        <i class=\"bi bi-list mobile-nav-toggle d-none\"></i> -->\r\n      </nav><!-- .navbar -->\r\n\r\n      <a class=\"btn-getstarted scrollto\" href=\"index.html#about\">Login</a>\r\n\r\n    </div>\r\n  </header><!-- End Header -->\r\n\r\n  <section id=\"hero-fullscreen\" class=\"hero-fullscreen d-flex align-items-center\">\r\n    <div class=\"container d-flex flex-column align-items-center position-relative\" data-aos=\"zoom-out\">\r\n      <h2>Selamat Datang di <span>SIRANA</span></h2>\r\n      <p>Aplikasi Penyaluran Tenaga Kerja berbasis web yang kini dapat kamu gunakan.</p>\r\n      <div class=\"d-flex\">\r\n        <a href=\"#about\" class=\"btn-get-started scrollto\">Login</a>\r\n        <a href=\"https://youtu.be/NBhC9alV5Sg\" class=\"glightbox btn-watch-video d-flex align-items-center\"><i class=\"bi bi-play-circle\"></i><span>Watch Video</span></a>\r\n      </div>\r\n    </div>\r\n  </section>\r\n\r\n  <main id=\"main\">\r\n\r\n    <!-- ======= Featured Services Section ======= -->\r\n    <section id=\"featured-services\" class=\"featured-services\">\r\n      <div class=\"container \">\r\n\r\n        <div class=\"row gy-4\">\r\n\r\n          <div class=\"col-xl-3 col-md-6 d-flex\" data-aos=\"zoom-out\">\r\n            <div class=\"service-item position-relative\">\r\n              <div class=\"icon\"><i class=\"bi bi-activity icon\"></i></div>\r\n              <h4><a href=\"\" class=\"stretched-link\">Order Pegawai</a></h4>\r\n              <p>Proses order pegawai untuk kegiatan bongkar muat menjadi lebih mudah</p>\r\n            </div>\r\n          </div>\r\n          <!-- End Service Item -->\r\n\r\n          <div class=\"col-xl-3 col-md-6 d-flex\" data-aos=\"zoom-out\" data-aos-delay=\"200\">\r\n            <div class=\"service-item position-relative\">\r\n              <div class=\"icon\"><i class=\"bi bi-bounding-box-circles icon\"></i></div>\r\n              <h4><a href=\"\" class=\"stretched-link\">Diklat</a></h4>\r\n              <p>Pendataan peserta diklat bagi pekerja menjadi lebih efisien</p>\r\n            </div>\r\n          </div>\r\n          <!-- End Service Item -->\r\n\r\n          <!-- <div class=\"col-xl-3 col-md-6 d-flex\" data-aos=\"zoom-out\" data-aos-delay=\"400\">\r\n            <div class=\"service-item position-relative\">\r\n              <div class=\"icon\"><i class=\"bi bi-calendar4-week icon\"></i></div>\r\n              <h4><a href=\"\" class=\"stretched-link\">Magni Dolores</a></h4>\r\n              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>\r\n            </div>\r\n          </div> -->\r\n          <!-- End Service Item -->\r\n\r\n          <!-- <div class=\"col-xl-3 col-md-6 d-flex\" data-aos=\"zoom-out\" data-aos-delay=\"600\">\r\n            <div class=\"service-item position-relative\">\r\n              <div class=\"icon\"><i class=\"bi bi-broadcast icon\"></i></div>\r\n              <h4><a href=\"\" class=\"stretched-link\">Nemo Enim</a></h4>\r\n              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>\r\n            </div>\r\n          </div>  -->\r\n          <!-- End Service Item -->\r\n\r\n        </div>\r\n\r\n      </div>\r\n    </section>\r\n    <!-- End Featured Services Section -->\r\n\r\n    <!-- ======= About Section ======= -->\r\n    <section id=\"about\" class=\"about\">\r\n      <div class=\"container\" data-aos=\"fade-up\">\r\n\r\n        <div class=\"section-header\">\r\n          <h2>Tentang Kami</h2>\r\n          <p>SIRANA merupakan sebuah aplikasi berbasis web yang membantu koperasi TKBM dalam proses penyaluran tenaga Kerja</p>\r\n        </div>\r\n\r\n\r\n      </div>\r\n    </section><!-- End About Section -->\r\n\r\n  </main><!-- End #main -->\r\n\r\n  <!-- ======= Footer ======= -->\r\n  <footer id=\"footer\" class=\"footer\">\r\n\r\n    <div class=\"footer-content\">\r\n      <div class=\"container\">\r\n        <div class=\"row\">\r\n\r\n          <div class=\"col-lg-3 col-md-6\">\r\n            <div class=\"footer-info\">\r\n              <h3>SIRANA</h3>\r\n              <p>\r\n                Palembang, Indonesia<br><br>\r\n                <strong>Phone:</strong> 08234509839<br>\r\n                <strong>Email:</strong> info@example.com<br>\r\n              </p>\r\n            </div>\r\n          </div>\r\n\r\n          <div class=\"col-lg-2 col-md-6 footer-links\">\r\n            <h4>Useful Links</h4>\r\n            <ul>\r\n              <!-- <li><i class=\"bi bi-chevron-right\"></i> <a href=\"#\">Home</a></li> -->\r\n              <li><i class=\"bi bi-chevron-right\"></i> <a href=\"#\">Tentang Kami</a></li>\r\n              <!-- <li><i class=\"bi bi-chevron-right\"></i> <a href=\"#\">Services</a></li>\r\n              <li><i class=\"bi bi-chevron-right\"></i> <a href=\"#\">Terms of service</a></li>\r\n              <li><i class=\"bi bi-chevron-right\"></i> <a href=\"#\">Privacy policy</a></li> -->\r\n            </ul>\r\n          </div>\r\n\r\n\r\n        </div>\r\n      </div>\r\n    </div>\r\n\r\n    <div class=\"footer-legal text-center\">\r\n      <div class=\"container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center\">\r\n\r\n        <div class=\"d-flex flex-column align-items-center align-items-lg-start\">\r\n          <div class=\"copyright\">\r\n            &copy; Copyright <strong><span>SIRANA</span></strong>. All Rights Reserved\r\n          </div>\r\n          <div class=\"credits\">\r\n            <!-- All the links in the footer should remain intact. -->\r\n            <!-- You can delete the links only if you purchased the pro version. -->\r\n            <!-- Licensing information: https://bootstrapmade.com/license/ -->\r\n            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->\r\n            Designed by <a href=\"https://bootstrapmade.com/\">BootstrapMade</a>\r\n          </div>\r\n        </div>\r\n\r\n        <div class=\"social-links order-first order-lg-last mb-3 mb-lg-0\">\r\n          <a href=\"#\" class=\"twitter\"><i class=\"bi bi-twitter\"></i></a>\r\n          <a href=\"#\" class=\"facebook\"><i class=\"bi bi-facebook\"></i></a>\r\n          <a href=\"#\" class=\"instagram\"><i class=\"bi bi-instagram\"></i></a>\r\n          <a href=\"#\" class=\"google-plus\"><i class=\"bi bi-skype\"></i></a>\r\n          <a href=\"#\" class=\"linkedin\"><i class=\"bi bi-linkedin\"></i></a>\r\n        </div>\r\n\r\n      </div>\r\n    </div>\r\n\r\n  </footer><!-- End Footer -->\r\n\r\n  <a href=\"#\" class=\"scroll-top d-flex align-items-center justify-content-center\"><i class=\"bi bi-arrow-up-short\"></i></a>\r\n\r\n  <div id=\"preloader\"></div>\r\n\r\n  <!-- Vendor JS Files -->\r\n  <script src=\"assets/vendor/bootstrap/js/bootstrap.bundle.min.js\"></script>\r\n  <script src=\"assets/vendor/aos/aos.js\"></script>\r\n  <script src=\"assets/vendor/glightbox/js/glightbox.min.js\"></script>\r\n  <script src=\"assets/vendor/isotope-layout/isotope.pkgd.min.js\"></script>\r\n  <script src=\"assets/vendor/swiper/swiper-bundle.min.js\"></script>\r\n  <script src=\"assets/vendor/php-email-form/validate.js\"></script>\r\n\r\n  <!-- Template Main JS File -->\r\n  <script src=\"assets/js/main.js\"></script>\r\n\r\n</body>\r\n\r\n</html>', 0);
INSERT INTO `landing_home` (`id_landing_home`, `page_number`, `page_name`, `source_html`, `is_active`) VALUES
(2, 1, 'main.css', '<style type=\"text/css\">\r\n/**\r\n* Template Name: HeroBiz - v2.3.1\r\n* Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/\r\n* Author: BootstrapMade.com\r\n* License: https://bootstrapmade.com/license/\r\n*/\r\n\r\n/**\r\n* Check out variables.css for easy customization of colors, typography, and other repetitive properties\r\n*/\r\n/*--------------------------------------------------------------\r\n# General\r\n--------------------------------------------------------------*/\r\n:root {\r\n  scroll-behavior: smooth;\r\n}\r\n\r\na {\r\n  color: var(--color-links);\r\n  text-decoration: none;\r\n}\r\n\r\na:hover {\r\n  color: var(--color-links-hover);\r\n  text-decoration: none;\r\n}\r\n\r\nh1,\r\nh2,\r\nh3,\r\nh4,\r\nh5,\r\nh6 {\r\n  font-family: var(--font-primary);\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Preloader\r\n--------------------------------------------------------------*/\r\n#preloader {\r\n  position: fixed;\r\n  inset: 0;\r\n  z-index: 9999;\r\n  overflow: hidden;\r\n  background: var(--color-white);\r\n  transition: all 0.6s ease-out;\r\n  width: 100%;\r\n  height: 100vh;\r\n}\r\n\r\n#preloader:before,\r\n#preloader:after {\r\n  content: \"\";\r\n  position: absolute;\r\n  border: 4px solid var(--color-primary);\r\n  border-radius: 50%;\r\n  -webkit-animation: animate-preloader 2s cubic-bezier(0, 0.2, 0.8, 1) infinite;\r\n  animation: animate-preloader 2s cubic-bezier(0, 0.2, 0.8, 1) infinite;\r\n}\r\n\r\n#preloader:after {\r\n  -webkit-animation-delay: -0.5s;\r\n  animation-delay: -0.5s;\r\n}\r\n\r\n@-webkit-keyframes animate-preloader {\r\n  0% {\r\n    width: 10px;\r\n    height: 10px;\r\n    top: calc(50% - 5px);\r\n    left: calc(50% - 5px);\r\n    opacity: 1;\r\n  }\r\n\r\n  100% {\r\n    width: 72px;\r\n    height: 72px;\r\n    top: calc(50% - 36px);\r\n    left: calc(50% - 36px);\r\n    opacity: 0;\r\n  }\r\n}\r\n\r\n@keyframes animate-preloader {\r\n  0% {\r\n    width: 10px;\r\n    height: 10px;\r\n    top: calc(50% - 5px);\r\n    left: calc(50% - 5px);\r\n    opacity: 1;\r\n  }\r\n\r\n  100% {\r\n    width: 72px;\r\n    height: 72px;\r\n    top: calc(50% - 36px);\r\n    left: calc(50% - 36px);\r\n    opacity: 0;\r\n  }\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Sections & Section Header\r\n--------------------------------------------------------------*/\r\nsection {\r\n  padding: 60px 0;\r\n  overflow: hidden;\r\n}\r\n\r\n.section-header {\r\n  text-align: center;\r\n  padding-bottom: 40px;\r\n}\r\n\r\n.section-header h2 {\r\n  font-size: 48px;\r\n  font-weight: 300;\r\n  margin-bottom: 20px;\r\n  color: var(--color-secondary);\r\n}\r\n\r\n.section-header p {\r\n  margin: 0 auto;\r\n  color: var(--color-secondary-light);\r\n}\r\n\r\n@media (min-width: 1280px) {\r\n  .section-header p {\r\n    max-width: 80%;\r\n  }\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Breadcrumbs\r\n--------------------------------------------------------------*/\r\n.breadcrumbs {\r\n  padding: 15px 0;\r\n  background: rgba(var(--color-secondary-rgb), 0.05);\r\n  min-height: 40px;\r\n  margin-top: 76px;\r\n}\r\n\r\n.breadcrumbs h2 {\r\n  font-size: 30px;\r\n  font-weight: 300;\r\n  margin: 0;\r\n}\r\n\r\n.breadcrumbs ol {\r\n  display: flex;\r\n  flex-wrap: wrap;\r\n  list-style: none;\r\n  padding: 0;\r\n  margin: 0;\r\n  font-size: 14px;\r\n}\r\n\r\n.breadcrumbs ol li+li {\r\n  padding-left: 10px;\r\n}\r\n\r\n.breadcrumbs ol li+li::before {\r\n  display: inline-block;\r\n  padding-right: 10px;\r\n  color: var(--color-secondary-light);\r\n  content: \"/\";\r\n}\r\n\r\n@media (max-width: 992px) {\r\n  .breadcrumbs .d-flex {\r\n    display: block !important;\r\n  }\r\n\r\n  .breadcrumbs h2 {\r\n    margin-bottom: 10px;\r\n    font-size: 24px;\r\n  }\r\n\r\n  .breadcrumbs ol {\r\n    display: block;\r\n  }\r\n\r\n  .breadcrumbs ol li {\r\n    display: inline-block;\r\n  }\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Scroll top button\r\n--------------------------------------------------------------*/\r\n.scroll-top {\r\n  position: fixed;\r\n  visibility: hidden;\r\n  opacity: 0;\r\n  right: 15px;\r\n  bottom: 15px;\r\n  z-index: 995;\r\n  background: var(--color-primary);\r\n  width: 40px;\r\n  height: 40px;\r\n  border-radius: 4px;\r\n  transition: all 0.4s;\r\n}\r\n\r\n.scroll-top i {\r\n  font-size: 24px;\r\n  color: var(--color-white);\r\n  line-height: 0;\r\n}\r\n\r\n.scroll-top:hover {\r\n  background: rgba(var(--color-primary-rgb), 0.85);\r\n  color: var(--color-white);\r\n}\r\n\r\n.scroll-top.active {\r\n  visibility: visible;\r\n  opacity: 1;\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Disable aos animation delay on mobile devices\r\n--------------------------------------------------------------*/\r\n@media screen and (max-width: 768px) {\r\n  [data-aos-delay] {\r\n    transition-delay: 0 !important;\r\n  }\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Header\r\n--------------------------------------------------------------*/\r\n.header {\r\n  padding: 15px 0;\r\n  transition: all 0.5s;\r\n  z-index: 997;\r\n}\r\n\r\n.header.sticked {\r\n  background: var(--color-white);\r\n  box-shadow: 0px 2px 20px rgba(var(--color-secondary-rgb), 0.1);\r\n}\r\n\r\n.header .logo img {\r\n  max-height: 40px;\r\n  margin-right: 6px;\r\n}\r\n\r\n.header .logo h1 {\r\n  font-size: 32px;\r\n  font-weight: 300;\r\n  color: var(--color-secondary);\r\n  font-family: var(--font-secondary);\r\n}\r\n\r\n.header .logo h1 span {\r\n  color: var(--color-primary);\r\n  font-weight: 500;\r\n}\r\n\r\n.header .btn-getstarted,\r\n.header .btn-getstarted:focus {\r\n  font-size: 16px;\r\n  color: var(--color-white);\r\n  background: var(--color-primary);\r\n  padding: 8px 23px;\r\n  border-radius: 4px;\r\n  transition: 0.3s;\r\n  font-family: var(--font-secondary);\r\n}\r\n\r\n.header .btn-getstarted:hover,\r\n.header .btn-getstarted:focus:hover {\r\n  color: var(--color-white);\r\n  background: rgba(var(--color-primary-rgb), 0.85);\r\n}\r\n\r\n@media (max-width: 1279px) {\r\n\r\n  .header .btn-getstarted,\r\n  .header .btn-getstarted:focus {\r\n    margin-right: 50px;\r\n  }\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Desktop Navigation \r\n--------------------------------------------------------------*/\r\n@media (min-width: 1280px) {\r\n  .navbar {\r\n    padding: 0;\r\n    position: relative;\r\n  }\r\n\r\n  .navbar ul {\r\n    margin: 0;\r\n    padding: 0;\r\n    display: flex;\r\n    list-style: none;\r\n    align-items: center;\r\n  }\r\n\r\n  .navbar li {\r\n    position: relative;\r\n  }\r\n\r\n  .navbar>ul>li {\r\n    white-space: nowrap;\r\n  }\r\n\r\n  .navbar a,\r\n  .navbar a:focus {\r\n    display: flex;\r\n    align-items: center;\r\n    justify-content: space-between;\r\n    padding: 14px 20px;\r\n    font-family: var(--font-secondary);\r\n    font-size: 16px;\r\n    font-weight: 400;\r\n    color: rgba(var(--color-secondary-dark-rgb), 0.7);\r\n    white-space: nowrap;\r\n    transition: 0.3s;\r\n    position: relative;\r\n  }\r\n\r\n  .navbar a i,\r\n  .navbar a:focus i {\r\n    font-size: 12px;\r\n    line-height: 0;\r\n    margin-left: 5px;\r\n  }\r\n\r\n  .navbar>ul>li>a:before {\r\n    content: \"\";\r\n    position: absolute;\r\n    width: 100%;\r\n    height: 2px;\r\n    bottom: 0;\r\n    left: 0;\r\n    background-color: var(--color-primary);\r\n    visibility: hidden;\r\n    transition: all 0.3s ease-in-out 0s;\r\n    transform: scaleX(0);\r\n    transition: all 0.3s ease-in-out 0s;\r\n  }\r\n\r\n  .navbar a:hover:before,\r\n  .navbar li:hover>a:before,\r\n  .navbar .active:before {\r\n    visibility: visible;\r\n    transform: scaleX(0.7);\r\n  }\r\n\r\n  .navbar a:hover,\r\n  .navbar .active,\r\n  .navbar .active:focus,\r\n  .navbar li:hover>a {\r\n    color: var(--color-primary);\r\n  }\r\n\r\n  .navbar .dropdown a:hover:before,\r\n  .navbar .dropdown:hover>a:before,\r\n  .navbar .dropdown .active:before {\r\n    visibility: hidden;\r\n  }\r\n\r\n  .navbar .dropdown a:hover,\r\n  .navbar .dropdown .active,\r\n  .navbar .dropdown .active:focus,\r\n  .navbar .dropdown:hover>a {\r\n    color: var(--color-white);\r\n    background: var(--color-secondary);\r\n  }\r\n\r\n  .navbar .dropdown ul {\r\n    display: block;\r\n    position: absolute;\r\n    left: 0;\r\n    top: 100%;\r\n    margin: 0;\r\n    padding: 0 0 10px 0;\r\n    z-index: 99;\r\n    opacity: 0;\r\n    visibility: hidden;\r\n    background: var(--color-secondary);\r\n    transition: 0.3s;\r\n  }\r\n\r\n  .navbar .dropdown ul li {\r\n    min-width: 200px;\r\n  }\r\n\r\n  .navbar .dropdown ul a {\r\n    padding: 10px 20px;\r\n    font-size: 15px;\r\n    text-transform: none;\r\n    font-weight: 400;\r\n    color: rgba(var(--color-white-rgb), 0.5);\r\n  }\r\n\r\n  .navbar .dropdown ul a i {\r\n    font-size: 12px;\r\n  }\r\n\r\n  .navbar .dropdown ul a:hover,\r\n  .navbar .dropdown ul .active,\r\n  .navbar .dropdown ul .active:hover,\r\n  .navbar .dropdown ul li:hover>a {\r\n    color: var(--color-white);\r\n    background: var(--color-primary);\r\n  }\r\n\r\n  .navbar .dropdown:hover>ul {\r\n    opacity: 1;\r\n    visibility: visible;\r\n  }\r\n\r\n  .navbar .megamenu {\r\n    position: static;\r\n  }\r\n\r\n  .navbar .megamenu ul {\r\n    right: 0;\r\n    padding: 10px;\r\n    display: flex;\r\n  }\r\n\r\n  .navbar .megamenu ul li {\r\n    flex: 1;\r\n  }\r\n\r\n  .navbar .megamenu ul li a,\r\n  .navbar .megamenu ul li:hover>a {\r\n    color: rgba(var(--color-white-rgb), 0.5);\r\n    background: none;\r\n  }\r\n\r\n  .navbar .megamenu ul li a:hover,\r\n  .navbar .megamenu ul li .active,\r\n  .navbar .megamenu ul li .active:hover {\r\n    color: var(--color-white);\r\n    background: var(--color-primary);\r\n  }\r\n\r\n  .navbar .dropdown .dropdown ul {\r\n    top: 0;\r\n    left: calc(100% - 30px);\r\n    visibility: hidden;\r\n  }\r\n\r\n  .navbar .dropdown .dropdown:hover>ul {\r\n    opacity: 1;\r\n    top: 0;\r\n    left: 100%;\r\n    visibility: visible;\r\n  }\r\n}\r\n\r\n@media (min-width: 1280px) and (max-width: 1366px) {\r\n  .navbar .dropdown .dropdown ul {\r\n    left: -90%;\r\n  }\r\n\r\n  .navbar .dropdown .dropdown:hover>ul {\r\n    left: -100%;\r\n  }\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Mobile Navigation\r\n--------------------------------------------------------------*/\r\n@media (max-width: 1279px) {\r\n  .navbar {\r\n    position: fixed;\r\n    top: 0;\r\n    left: -100%;\r\n    width: calc(100% - 70px);\r\n    bottom: 0;\r\n    transition: 0.3s;\r\n    z-index: 9997;\r\n  }\r\n\r\n  .navbar ul {\r\n    position: absolute;\r\n    inset: 0;\r\n    padding: 10px 0;\r\n    margin: 0;\r\n    background: rgba(var(--color-secondary-rgb), 0.9);\r\n    overflow-y: auto;\r\n    transition: 0.3s;\r\n    z-index: 9998;\r\n  }\r\n\r\n  .navbar a,\r\n  .navbar a:focus {\r\n    display: flex;\r\n    align-items: center;\r\n    justify-content: space-between;\r\n    padding: 12px 20px;\r\n    font-size: 16px;\r\n    font-weight: 500;\r\n    color: rgba(var(--color-white-rgb), 0.7);\r\n    white-space: nowrap;\r\n    transition: 0.3s;\r\n  }\r\n\r\n  .navbar a i,\r\n  .navbar a:focus i {\r\n    font-size: 12px;\r\n    line-height: 0;\r\n    margin-left: 5px;\r\n  }\r\n\r\n  .navbar a:hover,\r\n  .navbar .active,\r\n  .navbar .active:focus,\r\n  .navbar li:hover>a {\r\n    color: var(--color-white);\r\n  }\r\n\r\n  .navbar .dropdown ul,\r\n  .navbar .dropdown .dropdown ul {\r\n    position: static;\r\n    display: none;\r\n    padding: 10px 0;\r\n    margin: 10px 20px;\r\n    transition: all 0.5s ease-in-out;\r\n    border: 1px solid rgba(var(--color-secondary-light-rgb), 0.3);\r\n  }\r\n\r\n  .navbar .dropdown>.dropdown-active,\r\n  .navbar .dropdown .dropdown>.dropdown-active {\r\n    display: block;\r\n  }\r\n\r\n  .mobile-nav-toggle {\r\n    display: block !important;\r\n    color: var(--color-secondary);\r\n    font-size: 28px;\r\n    cursor: pointer;\r\n    line-height: 0;\r\n    transition: 0.5s;\r\n    position: fixed;\r\n    top: 20px;\r\n    z-index: 9999;\r\n    right: 20px;\r\n  }\r\n\r\n  .mobile-nav-toggle.bi-x {\r\n    color: var(--color-white);\r\n  }\r\n\r\n  .mobile-nav-active {\r\n    overflow: hidden;\r\n    z-index: 9995;\r\n    position: relative;\r\n  }\r\n\r\n  .mobile-nav-active .navbar {\r\n    left: 0;\r\n  }\r\n\r\n  .mobile-nav-active .navbar:before {\r\n    content: \"\";\r\n    position: fixed;\r\n    inset: 0;\r\n    background: rgba(var(--color-secondary-rgb), 0.8);\r\n    z-index: 9996;\r\n  }\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Index Page\r\n--------------------------------------------------------------*/\r\n/*--------------------------------------------------------------\r\n# Animated Hero Section\r\n--------------------------------------------------------------*/\r\n.hero-animated {\r\n  width: 100%;\r\n  min-height: 50vh;\r\n  background: url(\"landing_asset/hero-bg.png\") center center;\r\n  background-size: cover;\r\n  position: relative;\r\n  padding: 120px 0 60px;\r\n}\r\n\r\n.hero-animated h2 {\r\n  margin: 0 0 10px 0;\r\n  font-size: 48px;\r\n  font-weight: 300;\r\n  color: var(--color-secondary);\r\n  font-family: var(--font-secondary);\r\n}\r\n\r\n.hero-animated h2 span {\r\n  color: var(--color-primary);\r\n}\r\n\r\n.hero-animated p {\r\n  color: rgba(var(--color-secondary-rgb), 0.8);\r\n  margin: 0 0 30px 0;\r\n  font-size: 20px;\r\n  font-weight: 400;\r\n}\r\n\r\n.hero-animated .animated {\r\n  margin-bottom: 60px;\r\n  animation: up-down 2s ease-in-out infinite alternate-reverse both;\r\n}\r\n\r\n@media (min-width: 992px) {\r\n  .hero-animated .animated {\r\n    max-width: 45%;\r\n  }\r\n}\r\n\r\n@media (max-width: 991px) {\r\n  .hero-animated .animated {\r\n    max-width: 60%;\r\n  }\r\n}\r\n\r\n@media (max-width: 575px) {\r\n  .hero-animated .animated {\r\n    max-width: 80%;\r\n  }\r\n}\r\n\r\n.hero-animated .btn-get-started {\r\n  font-size: 16px;\r\n  font-weight: 400;\r\n  display: inline-block;\r\n  padding: 10px 28px;\r\n  border-radius: 4px;\r\n  transition: 0.5s;\r\n  color: var(--color-white);\r\n  background: var(--color-primary);\r\n  font-family: var(--font-secondary);\r\n}\r\n\r\n.hero-animated .btn-get-started:hover {\r\n  background: rgba(var(--color-primary-rgb), 0.8);\r\n}\r\n\r\n.hero-animated .btn-watch-video {\r\n  font-size: 16px;\r\n  transition: 0.5s;\r\n  margin-left: 25px;\r\n  font-family: var(--font-secondary);\r\n  color: var(--color-secondary);\r\n  font-weight: 600;\r\n}\r\n\r\n.hero-animated .btn-watch-video i {\r\n  color: var(--color-primary);\r\n  font-size: 32px;\r\n  transition: 0.3s;\r\n  line-height: 0;\r\n  margin-right: 8px;\r\n}\r\n\r\n.hero-animated .btn-watch-video:hover {\r\n  color: var(--color-primary);\r\n}\r\n\r\n.hero-animated .btn-watch-video:hover i {\r\n  color: rgba(var(--color-primary-rgb), 0.8);\r\n}\r\n\r\n@media (max-width: 640px) {\r\n  .hero-animated h2 {\r\n    font-size: 32px;\r\n  }\r\n\r\n  .hero-animated p {\r\n    font-size: 18px;\r\n    margin-bottom: 30px;\r\n  }\r\n\r\n  .hero-animated .btn-get-started,\r\n  .hero-animated .btn-watch-video {\r\n    font-size: 14px;\r\n  }\r\n}\r\n\r\n@-webkit-keyframes up-down {\r\n  0% {\r\n    transform: translateY(10px);\r\n  }\r\n\r\n  100% {\r\n    transform: translateY(-10px);\r\n  }\r\n}\r\n\r\n@keyframes up-down {\r\n  0% {\r\n    transform: translateY(10px);\r\n  }\r\n\r\n  100% {\r\n    transform: translateY(-10px);\r\n  }\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Carousel Hero Section\r\n--------------------------------------------------------------*/\r\n.hero {\r\n  width: 100%;\r\n  min-height: 60vh;\r\n  padding: 0;\r\n  background: var(--color-black);\r\n  background: url(\"landing_asset/hero-bg.png\") center center;\r\n  background-size: cover;\r\n  background-position: center;\r\n  background-repeat: no-repeat;\r\n  position: relative;\r\n  display: flex;\r\n  flex-direction: column;\r\n  justify-content: center;\r\n  padding: 140px 0 60px 0;\r\n}\r\n\r\n@media (max-width: 640px) {\r\n  .hero .container {\r\n    padding: 0 60px;\r\n  }\r\n}\r\n\r\n.hero h2 {\r\n  color: var(--color-secondary);\r\n  margin-bottom: 25px;\r\n  font-size: 48px;\r\n  font-weight: 300;\r\n  -webkit-animation: fadeInDown 1s both 0.2s;\r\n  animation: fadeInDown 1s both 0.2s;\r\n}\r\n\r\n@media (max-width: 768px) {\r\n  .hero h2 {\r\n    font-size: 30px;\r\n  }\r\n}\r\n\r\n.hero p {\r\n  color: var(--color-secondary-light);\r\n  -webkit-animation: fadeInDown 1s both 0.4s;\r\n  animation: fadeInDown 1s both 0.4s;\r\n  font-weight: 500;\r\n  margin-bottom: 30px;\r\n}\r\n\r\n.hero .img {\r\n  margin-bottom: 40px;\r\n  -webkit-animation: fadeInDownLite 1s both;\r\n  animation: fadeInDownLite 1s both;\r\n}\r\n\r\n.hero .btn-get-started {\r\n  font-family: var(--font-secondary);\r\n  font-weight: 400;\r\n  font-size: 16px;\r\n  letter-spacing: 1px;\r\n  display: inline-block;\r\n  padding: 8px 32px;\r\n  border-radius: 5px;\r\n  transition: 0.5s;\r\n  -webkit-animation: fadeInUp 1s both 0.6s;\r\n  animation: fadeInUp 1s both 0.6s;\r\n  color: var(--color-primary);\r\n  border: 2px solid var(--color-primary);\r\n}\r\n\r\n.hero .btn-get-started:hover {\r\n  background: var(--color-primary);\r\n  color: var(--color-white);\r\n}\r\n\r\n.hero .carousel-control-prev {\r\n  justify-content: start;\r\n}\r\n\r\n@media (min-width: 640px) {\r\n  .hero .carousel-control-prev {\r\n    padding-left: 15px;\r\n  }\r\n}\r\n\r\n.hero .carousel-control-next {\r\n  justify-content: end;\r\n}\r\n\r\n@media (min-width: 640px) {\r\n  .hero .carousel-control-next {\r\n    padding-right: 15px;\r\n  }\r\n}\r\n\r\n.hero .carousel-control-next-icon,\r\n.hero .carousel-control-prev-icon {\r\n  background: none;\r\n  font-size: 26px;\r\n  line-height: 0;\r\n  background: rgba(var(--color-secondary-rgb), 0.4);\r\n  color: rgba(var(--color-white-rgb), 0.98);\r\n  border-radius: 50px;\r\n  width: 54px;\r\n  height: 54px;\r\n  display: flex;\r\n  align-items: center;\r\n  justify-content: center;\r\n}\r\n\r\n.hero .carousel-control-next-icon {\r\n  padding-left: 3px;\r\n}\r\n\r\n.hero .carousel-control-prev-icon {\r\n  padding-right: 3px;\r\n}\r\n\r\n.hero .carousel-control-prev,\r\n.hero .carousel-control-next {\r\n  transition: 0.3s;\r\n}\r\n\r\n.hero .carousel-control-prev:focus,\r\n.hero .carousel-control-next:focus {\r\n  opacity: 0.5;\r\n}\r\n\r\n.hero .carousel-control-prev:hover,\r\n.hero .carousel-control-next:hover {\r\n  opacity: 0.9;\r\n}\r\n\r\n.hero .carousel-indicators li {\r\n  cursor: pointer;\r\n  background: rgba(var(--color-secondary-rgb), 0.5);\r\n  overflow: hidden;\r\n  border: 0;\r\n  width: 12px;\r\n  height: 12px;\r\n  border-radius: 50px;\r\n  opacity: 0.6;\r\n  transition: 0.3s;\r\n}\r\n\r\n.hero .carousel-indicators li.active {\r\n  opacity: 1;\r\n  background: var(--color-primary);\r\n}\r\n\r\n@-webkit-keyframes fadeIn {\r\n  from {\r\n    opacity: 0;\r\n  }\r\n\r\n  to {\r\n    opacity: 1;\r\n  }\r\n}\r\n\r\n@keyframes fadeIn {\r\n  from {\r\n    opacity: 0;\r\n  }\r\n\r\n  to {\r\n    opacity: 1;\r\n  }\r\n}\r\n\r\n@-webkit-keyframes fadeInUp {\r\n  from {\r\n    opacity: 0;\r\n    transform: translate3d(0, 100%, 0);\r\n  }\r\n\r\n  to {\r\n    opacity: 1;\r\n    transform: translate3d(0, 0, 0);\r\n  }\r\n}\r\n\r\n@keyframes fadeInUp {\r\n  from {\r\n    opacity: 0;\r\n    transform: translate3d(0, 100%, 0);\r\n  }\r\n\r\n  to {\r\n    opacity: 1;\r\n    transform: translate3d(0, 0, 0);\r\n  }\r\n}\r\n\r\n@-webkit-keyframes fadeInDown {\r\n  from {\r\n    opacity: 0;\r\n    transform: translate3d(0, -100%, 0);\r\n  }\r\n\r\n  to {\r\n    opacity: 1;\r\n    transform: translate3d(0, 0, 0);\r\n  }\r\n}\r\n\r\n@keyframes fadeInDown {\r\n  from {\r\n    opacity: 0;\r\n    transform: translate3d(0, -100%, 0);\r\n  }\r\n\r\n  to {\r\n    opacity: 1;\r\n    transform: translate3d(0, 0, 0);\r\n  }\r\n}\r\n\r\n@-webkit-keyframes fadeInDownLite {\r\n  from {\r\n    opacity: 0;\r\n    transform: translate3d(0, -10%, 0);\r\n  }\r\n\r\n  to {\r\n    opacity: 1;\r\n    transform: translate3d(0, 0, 0);\r\n  }\r\n}\r\n\r\n@keyframes fadeInDownLite {\r\n  from {\r\n    opacity: 0;\r\n    transform: translate3d(0, -10%, 0);\r\n  }\r\n\r\n  to {\r\n    opacity: 1;\r\n    transform: translate3d(0, 0, 0);\r\n  }\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Fullscreen Hero Section\r\n--------------------------------------------------------------*/\r\n.hero-fullscreen {\r\n  width: 100%;\r\n  min-height: 100vh;\r\n  background-image: url(\"http://localhost/aihrm/landing_asset/hero-fullscreen-bg.jpg\") center center;\r\n  background-color:red;\r\n  background-size: cover;\r\n  position: relative;\r\n  padding: 120px 0 60px;\r\n}\r\n\r\n.hero-fullscreen:before {\r\n  content: \"\";\r\n  background: rgba(var(--color-white-rgb), 0.85);\r\n  position: absolute;\r\n  inset: 0;\r\n}\r\n\r\n@media (min-width: 1365px) {\r\n  .hero-fullscreen {\r\n    background-attachment: fixed;\r\n  }\r\n}\r\n\r\n.hero-fullscreen h2 {\r\n  margin: 0 0 10px 0;\r\n  font-size: 48px;\r\n  font-weight: 300;\r\n  color: var(--color-secondary);\r\n  font-family: var(--font-secondary);\r\n}\r\n\r\n.hero-fullscreen h2 span {\r\n  color: var(--color-primary);\r\n}\r\n\r\n.hero-fullscreen p {\r\n  color: rgba(var(--color-secondary-rgb), 0.8);\r\n  margin: 0 0 30px 0;\r\n  font-size: 20px;\r\n  font-weight: 400;\r\n}\r\n\r\n.hero-fullscreen .btn-get-started {\r\n  font-size: 16px;\r\n  font-weight: 400;\r\n  display: inline-block;\r\n  padding: 10px 28px;\r\n  border-radius: 4px;\r\n  transition: 0.5s;\r\n  color: var(--color-white);\r\n  background: var(--color-primary);\r\n  font-family: var(--font-secondary);\r\n}\r\n\r\n.hero-fullscreen .btn-get-started:hover {\r\n  background: rgba(var(--color-primary-rgb), 0.8);\r\n}\r\n\r\n.hero-fullscreen .btn-watch-video {\r\n  font-size: 16px;\r\n  transition: 0.5s;\r\n  margin-left: 25px;\r\n  font-family: var(--font-secondary);\r\n  color: var(--color-secondary);\r\n  font-weight: 600;\r\n}\r\n\r\n.hero-fullscreen .btn-watch-video i {\r\n  color: var(--color-primary);\r\n  font-size: 32px;\r\n  transition: 0.3s;\r\n  line-height: 0;\r\n  margin-right: 8px;\r\n}\r\n\r\n.hero-fullscreen .btn-watch-video:hover {\r\n  color: var(--color-primary);\r\n}\r\n\r\n.hero-fullscreen .btn-watch-video:hover i {\r\n  color: rgba(var(--color-primary-rgb), 0.8);\r\n}\r\n\r\n@media (max-width: 640px) {\r\n  .hero-fullscreen h2 {\r\n    font-size: 32px;\r\n  }\r\n\r\n  .hero-fullscreen p {\r\n    font-size: 18px;\r\n    margin-bottom: 30px;\r\n  }\r\n\r\n  .hero-fullscreen .btn-get-started,\r\n  .hero-fullscreen .btn-watch-video {\r\n    font-size: 14px;\r\n  }\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Static Hero Section\r\n--------------------------------------------------------------*/\r\n.hero-static {\r\n  width: 100%;\r\n  min-height: 50vh;\r\n  background: url(\"landing_asset/hero-bg.png\") center center;\r\n  background-size: cover;\r\n  position: relative;\r\n  padding: 120px 0 60px;\r\n}\r\n\r\n.hero-static h2 {\r\n  margin: 0 0 10px 0;\r\n  font-size: 48px;\r\n  font-weight: 300;\r\n  color: var(--color-secondary);\r\n  font-family: var(--font-secondary);\r\n}\r\n\r\n.hero-static h2 span {\r\n  color: var(--color-primary);\r\n}\r\n\r\n.hero-static p {\r\n  color: rgba(var(--color-secondary-rgb), 0.8);\r\n  margin: 0 0 30px 0;\r\n  font-size: 20px;\r\n  font-weight: 400;\r\n}\r\n\r\n.hero-static .btn-get-started {\r\n  font-size: 16px;\r\n  font-weight: 400;\r\n  display: inline-block;\r\n  padding: 10px 28px;\r\n  border-radius: 4px;\r\n  transition: 0.5s;\r\n  color: var(--color-white);\r\n  background: var(--color-primary);\r\n  font-family: var(--font-secondary);\r\n}\r\n\r\n.hero-static .btn-get-started:hover {\r\n  background: rgba(var(--color-primary-rgb), 0.8);\r\n}\r\n\r\n.hero-static .btn-watch-video {\r\n  font-size: 16px;\r\n  transition: 0.5s;\r\n  margin-left: 25px;\r\n  font-family: var(--font-secondary);\r\n  color: var(--color-secondary);\r\n  font-weight: 600;\r\n}\r\n\r\n.hero-static .btn-watch-video i {\r\n  color: var(--color-primary);\r\n  font-size: 32px;\r\n  transition: 0.3s;\r\n  line-height: 0;\r\n  margin-right: 8px;\r\n}\r\n\r\n.hero-static .btn-watch-video:hover {\r\n  color: var(--color-primary);\r\n}\r\n\r\n.hero-static .btn-watch-video:hover i {\r\n  color: rgba(var(--color-primary-rgb), 0.8);\r\n}\r\n\r\n@media (max-width: 640px) {\r\n  .hero-static h2 {\r\n    font-size: 32px;\r\n  }\r\n\r\n  .hero-static p {\r\n    font-size: 18px;\r\n    margin-bottom: 30px;\r\n  }\r\n\r\n  .hero-static .btn-get-started,\r\n  .hero-static .btn-watch-video {\r\n    font-size: 14px;\r\n  }\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Featured Services Section\r\n--------------------------------------------------------------*/\r\n.featured-services .service-item {\r\n  padding: 30px;\r\n  transition: all ease-in-out 0.4s;\r\n  background: var(--color-white);\r\n  height: 100%;\r\n}\r\n\r\n.featured-services .service-item .icon {\r\n  margin-bottom: 10px;\r\n}\r\n\r\n.featured-services .service-item .icon i {\r\n  color: var(--color-primary);\r\n  font-size: 36px;\r\n  transition: 0.3s;\r\n}\r\n\r\n.featured-services .service-item h4 {\r\n  font-weight: 600;\r\n  margin-bottom: 15px;\r\n  font-size: 24px;\r\n}\r\n\r\n.featured-services .service-item h4 a {\r\n  color: var(--color-secondary);\r\n  transition: ease-in-out 0.3s;\r\n}\r\n\r\n.featured-services .service-item p {\r\n  line-height: 24px;\r\n  font-size: 14px;\r\n  margin-bottom: 0;\r\n}\r\n\r\n.featured-services .service-item:hover {\r\n  transform: translateY(-10px);\r\n  box-shadow: 0px 0 60px 0 rgba(var(--color-secondary-rgb), 0.1);\r\n}\r\n\r\n.featured-services .service-item:hover h4 a {\r\n  color: var(--color-primary);\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# About Section\r\n--------------------------------------------------------------*/\r\n.about .about-img {\r\n  position: relative;\r\n  margin: 60px 0 0 60px;\r\n}\r\n\r\n.about .about-img:before {\r\n  position: absolute;\r\n  inset: -60px 0 0 -60px;\r\n  z-index: -1;\r\n  content: \"\";\r\n  background: url(\"landing_asset/about-bg.png\") top left;\r\n  background-repeat: no-repeat;\r\n}\r\n\r\n@media (max-width: 575px) {\r\n  .about .about-img {\r\n    margin: 30px 0 0 30px;\r\n  }\r\n\r\n  .about .about-img:before {\r\n    inset: -30px 0 0 -30px;\r\n  }\r\n}\r\n\r\n.about h3 {\r\n  color: var(--color-secondary);\r\n  font-family: var(--font-secondary);\r\n  font-weight: 300;\r\n  font-size: 32px;\r\n  margin-bottom: 20px;\r\n}\r\n\r\n@media (max-width: 768px) {\r\n  .about h3 {\r\n    font-size: 28px;\r\n  }\r\n}\r\n\r\n.about .nav-pills {\r\n  border-bottom: 1px solid rgba(var(--color-secondary-rgb), 0.2);\r\n}\r\n\r\n.about .nav-pills li+li {\r\n  margin-left: 40px;\r\n}\r\n\r\n.about .nav-link {\r\n  background: none;\r\n  font-size: 18px;\r\n  font-weight: 400;\r\n  color: var(--color-secondary);\r\n  padding: 12px 0;\r\n  margin-bottom: -2px;\r\n  border-radius: 0;\r\n  font-family: var(--font-secondary);\r\n}\r\n\r\n.about .nav-link.active {\r\n  color: var(--color-primary);\r\n  background: none;\r\n  border-bottom: 3px solid var(--color-primary);\r\n}\r\n\r\n@media (max-width: 575px) {\r\n  .about .nav-link {\r\n    font-size: 16px;\r\n  }\r\n}\r\n\r\n.about .tab-content h4 {\r\n  font-size: 18px;\r\n  margin: 0;\r\n  font-weight: 700;\r\n  color: var(--color-secondary);\r\n}\r\n\r\n.about .tab-content i {\r\n  font-size: 22px;\r\n  line-height: 0;\r\n  margin-right: 8px;\r\n  color: var(--color-primary);\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Clients Section\r\n--------------------------------------------------------------*/\r\n.clients {\r\n  padding: 0 0 60px 0;\r\n}\r\n\r\n.clients .swiper-slide img {\r\n  opacity: 0.5;\r\n  transition: 0.3s;\r\n  filter: grayscale(100);\r\n}\r\n\r\n.clients .swiper-slide img:hover {\r\n  filter: none;\r\n  opacity: 1;\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Call To Action Section\r\n--------------------------------------------------------------*/\r\n.cta {\r\n  padding: 0;\r\n  margin-bottom: 60px;\r\n}\r\n\r\n.cta .container {\r\n  padding: 80px;\r\n  background: rgba(var(--color-secondary-rgb), 0.1);\r\n  border-radius: 15px;\r\n}\r\n\r\n@media (max-width: 992px) {\r\n  .cta .container {\r\n    padding: 60px;\r\n  }\r\n}\r\n\r\n.cta .content h3 {\r\n  color: var(--color-secondary);\r\n  font-size: 48px;\r\n  font-weight: 700;\r\n}\r\n\r\n.cta .content h3 em {\r\n  font-style: normal;\r\n  position: relative;\r\n}\r\n\r\n.cta .content h3 em:after {\r\n  content: \"\";\r\n  position: absolute;\r\n  left: 0;\r\n  right: 0;\r\n  bottom: 10px;\r\n  height: 10px;\r\n  background: rgba(var(--color-primary-rgb), 0.5);\r\n  z-index: -1;\r\n}\r\n\r\n.cta .content p {\r\n  color: var(--color-secondary);\r\n  font-weight: 600;\r\n  font-size: 18px;\r\n}\r\n\r\n.cta .content .cta-btn {\r\n  color: var(--color-white);\r\n  font-weight: 500;\r\n  font-size: 16px;\r\n  display: inline-block;\r\n  padding: 12px 40px;\r\n  border-radius: 5px;\r\n  transition: 0.5s;\r\n  margin-top: 10px;\r\n  background: rgba(var(--color-primary-dark-rgb), 0.9);\r\n}\r\n\r\n.cta .content .cta-btn:hover {\r\n  background: var(--color-primary);\r\n}\r\n\r\n.cta .img {\r\n  position: relative;\r\n}\r\n\r\n.cta .img:before {\r\n  content: \"\";\r\n  position: absolute;\r\n  inset: 0;\r\n  background: rgba(var(--color-white-rgb), 0.5);\r\n  border-radius: 15px;\r\n  transform: rotate(12deg);\r\n}\r\n\r\n.cta .img:after {\r\n  content: \"\";\r\n  position: absolute;\r\n  inset: 0;\r\n  background: rgba(var(--color-white-rgb), 0.9);\r\n  border-radius: 15px;\r\n  transform: rotate(6deg);\r\n}\r\n\r\n.cta .img img {\r\n  position: relative;\r\n  z-index: 3;\r\n  border-radius: 15px;\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# On Focus Section\r\n--------------------------------------------------------------*/\r\n.onfocus {\r\n  padding: 0;\r\n}\r\n\r\n.onfocus .video-play {\r\n  min-height: 400px;\r\n  background: linear-gradient(rgba(var(--color-black-rgb), 0.4), rgba(var(--color-black-rgb), 0.7)), url(\"landing_asset/onfocus-video-bg.jpg\") center center;\r\n  background-size: cover;\r\n}\r\n\r\n.onfocus .content {\r\n  background: linear-gradient(rgba(var(--color-secondary-rgb), 0.5), rgba(var(--color-secondary-rgb), 0.8)), url(\"landing_asset/onfocus-content-bg.jpg\") center center;\r\n  background-size: cover;\r\n  color: rgba(var(--color-white-rgb), 0.8);\r\n  padding: 40px;\r\n}\r\n\r\n@media (min-width: 768px) {\r\n  .onfocus .content {\r\n    padding: 80px;\r\n  }\r\n}\r\n\r\n.onfocus .content h3 {\r\n  font-weight: 600;\r\n  font-size: 32px;\r\n  color: var(--color-white);\r\n}\r\n\r\n.onfocus .content ul {\r\n  list-style: none;\r\n  padding: 0;\r\n}\r\n\r\n.onfocus .content ul li {\r\n  padding-bottom: 10px;\r\n}\r\n\r\n.onfocus .content ul i {\r\n  font-size: 20px;\r\n  padding-right: 4px;\r\n  color: var(--color-primary);\r\n}\r\n\r\n.onfocus .content p:last-child {\r\n  margin-bottom: 0;\r\n}\r\n\r\n.onfocus .content .read-more {\r\n  font-family: var(--font-primary);\r\n  font-weight: 500;\r\n  font-size: 16px;\r\n  letter-spacing: 1px;\r\n  padding: 12px 24px;\r\n  border-radius: 5px;\r\n  transition: 0.3s;\r\n  display: -nline-flex;\r\n  align-items: center;\r\n  justify-content: center;\r\n  color: var(--color-white);\r\n  background: var(--color-primary);\r\n}\r\n\r\n.onfocus .content .read-more i {\r\n  font-size: 18px;\r\n  margin-left: 5px;\r\n  line-height: 0;\r\n  transition: 0.3s;\r\n}\r\n\r\n.onfocus .content .read-more:hover {\r\n  background: rgba(var(--color-primary-rgb), 0.9);\r\n  padding-right: 19px;\r\n}\r\n\r\n.onfocus .content .read-more:hover i {\r\n  margin-left: 10px;\r\n}\r\n\r\n.onfocus .play-btn {\r\n  width: 94px;\r\n  height: 94px;\r\n  background: radial-gradient(var(--color-primary) 50%, rgba(var(--color-primary-rgb), 0.4) 52%);\r\n  border-radius: 50%;\r\n  display: block;\r\n  position: absolute;\r\n  left: calc(50% - 47px);\r\n  top: calc(50% - 47px);\r\n  overflow: hidden;\r\n}\r\n\r\n.onfocus .play-btn:before {\r\n  content: \"\";\r\n  position: absolute;\r\n  width: 120px;\r\n  height: 120px;\r\n  -webkit-animation-delay: 0s;\r\n  animation-delay: 0s;\r\n  -webkit-animation: pulsate-btn 2s;\r\n  animation: pulsate-btn 2s;\r\n  -webkit-animation-direction: forwards;\r\n  animation-direction: forwards;\r\n  -webkit-animation-iteration-count: infinite;\r\n  animation-iteration-count: infinite;\r\n  -webkit-animation-timing-function: steps;\r\n  animation-timing-function: steps;\r\n  opacity: 1;\r\n  border-radius: 50%;\r\n  border: 5px solid rgba(var(--color-primary-rgb), 0.7);\r\n  top: -15%;\r\n  left: -15%;\r\n  background: rgba(198, 16, 0, 0);\r\n}\r\n\r\n.onfocus .play-btn:after {\r\n  content: \"\";\r\n  position: absolute;\r\n  left: 50%;\r\n  top: 50%;\r\n  transform: translateX(-40%) translateY(-50%);\r\n  width: 0;\r\n  height: 0;\r\n  border-top: 10px solid transparent;\r\n  border-bottom: 10px solid transparent;\r\n  border-left: 15px solid var(--color-white);\r\n  z-index: 100;\r\n  transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);\r\n}\r\n\r\n.onfocus .play-btn:hover:before {\r\n  content: \"\";\r\n  position: absolute;\r\n  left: 50%;\r\n  top: 50%;\r\n  transform: translateX(-40%) translateY(-50%);\r\n  width: 0;\r\n  height: 0;\r\n  border: none;\r\n  border-top: 10px solid transparent;\r\n  border-bottom: 10px solid transparent;\r\n  border-left: 15px solid var(--color-white);\r\n  z-index: 200;\r\n  -webkit-animation: none;\r\n  animation: none;\r\n  border-radius: 0;\r\n}\r\n\r\n.onfocus .play-btn:hover:after {\r\n  border-left: 15px solid var(--color-primary);\r\n  transform: scale(20);\r\n}\r\n\r\n@-webkit-keyframes pulsate-btn {\r\n  0% {\r\n    transform: scale(0.6, 0.6);\r\n    opacity: 1;\r\n  }\r\n\r\n  100% {\r\n    transform: scale(1, 1);\r\n    opacity: 0;\r\n  }\r\n}\r\n\r\n@keyframes pulsate-btn {\r\n  0% {\r\n    transform: scale(0.6, 0.6);\r\n    opacity: 1;\r\n  }\r\n\r\n  100% {\r\n    transform: scale(1, 1);\r\n    opacity: 0;\r\n  }\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Features Section\r\n--------------------------------------------------------------*/\r\n.features .nav-tabs {\r\n  border: 0;\r\n}\r\n\r\n.features .nav-link {\r\n  border: 0;\r\n  padding: 25px 20px;\r\n  color: var(--color-secondary);\r\n  box-shadow: 5px 5px 25px rgba(var(--color-secondary-rgb), 0.15);\r\n  border-radius: 0;\r\n  display: flex;\r\n  align-items: center;\r\n  justify-content: center;\r\n  flex-direction: column;\r\n  transition: 0s;\r\n  cursor: pointer;\r\n  height: 100%;\r\n}\r\n\r\n.features .nav-link i {\r\n  font-size: 32px;\r\n  line-height: 0;\r\n}\r\n\r\n.features .nav-link h4 {\r\n  font-size: 20px;\r\n  font-weight: 600;\r\n  margin: 10px 0 0 0;\r\n  color: var(--color-secondary);\r\n}\r\n\r\n.features .nav-link:hover {\r\n  color: var(--color-primary);\r\n}\r\n\r\n.features .nav-link.active {\r\n  transition: 0.3s;\r\n  background: var(--color-secondary) linear-gradient(rgba(var(--color-primary-rgb), 0.95), rgba(var(--color-primary-rgb), 0.6));\r\n  border-color: var(--color-primary);\r\n}\r\n\r\n.features .nav-link.active h4 {\r\n  color: var(--color-white);\r\n}\r\n\r\n.features .nav-link.active i {\r\n  color: var(--color-white) !important;\r\n}\r\n\r\n.features .tab-content {\r\n  margin-top: 30px;\r\n}\r\n\r\n.features .tab-pane.active {\r\n  -webkit-animation: fadeIn 0.5s ease-out;\r\n  animation: fadeIn 0.5s ease-out;\r\n}\r\n\r\n.features .tab-pane h3 {\r\n  font-weight: 600;\r\n  font-size: 36px;\r\n  color: var(--color-secondary);\r\n}\r\n\r\n.features .tab-pane ul {\r\n  list-style: none;\r\n  padding: 0;\r\n}\r\n\r\n.features .tab-pane ul li {\r\n  padding-bottom: 10px;\r\n}\r\n\r\n.features .tab-pane ul i {\r\n  font-size: 24px;\r\n  margin-right: 4px;\r\n  color: var(--color-primary);\r\n}\r\n\r\n.features .tab-pane p:last-child {\r\n  margin-bottom: 0;\r\n}\r\n\r\n@keyframes fadeIn {\r\n  0% {\r\n    opacity: 0;\r\n  }\r\n\r\n  100% {\r\n    opacity: 1;\r\n  }\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Services Section\r\n--------------------------------------------------------------*/\r\n.services .img {\r\n  border-radius: 8px;\r\n  overflow: hidden;\r\n}\r\n\r\n.services .img img {\r\n  transition: 0.6s;\r\n}\r\n\r\n.services .details {\r\n  padding: 50px 30px;\r\n  margin: -100px 30px 0 30px;\r\n  transition: all ease-in-out 0.3s;\r\n  background: var(--color-white);\r\n  position: relative;\r\n  background: rgba(var(--color-white-rgb), 0.9);\r\n  text-align: center;\r\n  border-radius: 8px;\r\n  box-shadow: 0px 0 25px rgba(var(--color-black-rgb), 0.1);\r\n}\r\n\r\n.services .details .icon {\r\n  margin: 0;\r\n  width: 72px;\r\n  height: 72px;\r\n  background: var(--color-primary);\r\n  border-radius: 50px;\r\n  display: flex;\r\n  align-items: center;\r\n  justify-content: center;\r\n  margin-bottom: 20px;\r\n  color: var(--color-white);\r\n  font-size: 28px;\r\n  transition: ease-in-out 0.3s;\r\n  position: absolute;\r\n  top: -36px;\r\n  left: calc(50% - 36px);\r\n  border: 6px solid var(--color-white);\r\n}\r\n\r\n.services .details h3 {\r\n  color: var(--color-default);\r\n  font-weight: 700;\r\n  margin: 10px 0 15px 0;\r\n  font-size: 22px;\r\n  transition: ease-in-out 0.3s;\r\n}\r\n\r\n.services .details p {\r\n  line-height: 24px;\r\n  font-size: 14px;\r\n  margin-bottom: 0;\r\n}\r\n\r\n.services .service-item:hover .details h3 {\r\n  color: var(--color-primary);\r\n}\r\n\r\n.services .service-item:hover .details .icon {\r\n  background: var(--color-white);\r\n  border: 2px solid var(--color-primary);\r\n}\r\n\r\n.services .service-item:hover .details .icon i {\r\n  color: var(--color-primary);\r\n}\r\n\r\n.services .service-item:hover .img img {\r\n  transform: scale(1.2);\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Testimonials Section\r\n--------------------------------------------------------------*/\r\n.testimonials {\r\n  padding: 80px 0;\r\n  background: url(\"landing_asset/testimonials-bg.jpg\") no-repeat;\r\n  background-position: center center;\r\n  background-size: cover;\r\n  position: relative;\r\n}\r\n\r\n.testimonials::before {\r\n  content: \"\";\r\n  position: absolute;\r\n  inset: 0;\r\n  background: rgba(var(--color-secondary-dark-rgb), 0.8);\r\n}\r\n\r\n.testimonials .section-header {\r\n  margin-bottom: 40px;\r\n}\r\n\r\n.testimonials .testimonials-carousel,\r\n.testimonials .testimonials-slider {\r\n  overflow: hidden;\r\n}\r\n\r\n.testimonials .testimonial-item {\r\n  text-align: center;\r\n  color: var(--color-white);\r\n}\r\n\r\n.testimonials .testimonial-item .testimonial-img {\r\n  width: 100px;\r\n  border-radius: 50%;\r\n  border: 6px solid rgba(var(--color-white-rgb), 0.15);\r\n  margin: 0 auto;\r\n}\r\n\r\n.testimonials .testimonial-item h3 {\r\n  font-size: 20px;\r\n  font-weight: bold;\r\n  margin: 10px 0 5px 0;\r\n  color: var(--color-white);\r\n}\r\n\r\n.testimonials .testimonial-item h4 {\r\n  font-size: 14px;\r\n  color: rgba(var(--color-white-rgb), 0.6);\r\n  margin: 0 0 15px 0;\r\n}\r\n\r\n.testimonials .testimonial-item .stars {\r\n  margin-bottom: 15px;\r\n}\r\n\r\n.testimonials .testimonial-item .stars i {\r\n  color: var(--color-yellow);\r\n  margin: 0 1px;\r\n}\r\n\r\n.testimonials .testimonial-item .quote-icon-left,\r\n.testimonials .testimonial-item .quote-icon-right {\r\n  color: rgba(var(--color-white-rgb), 0.6);\r\n  font-size: 26px;\r\n  line-height: 0;\r\n}\r\n\r\n.testimonials .testimonial-item .quote-icon-left {\r\n  display: inline-block;\r\n  left: -5px;\r\n  position: relative;\r\n}\r\n\r\n.testimonials .testimonial-item .quote-icon-right {\r\n  display: inline-block;\r\n  right: -5px;\r\n  position: relative;\r\n  top: 10px;\r\n  transform: scale(-1, -1);\r\n}\r\n\r\n.testimonials .testimonial-item p {\r\n  font-style: italic;\r\n  margin: 0 auto 15px auto;\r\n}\r\n\r\n.testimonials .swiper-pagination {\r\n  margin-top: 20px;\r\n  position: relative;\r\n}\r\n\r\n.testimonials .swiper-pagination .swiper-pagination-bullet {\r\n  width: 12px;\r\n  height: 12px;\r\n  background-color: rgba(var(--color-white-rgb), 0.4);\r\n  opacity: 0.5;\r\n}\r\n\r\n.testimonials .swiper-pagination .swiper-pagination-bullet-active {\r\n  background-color: var(--color-white);\r\n  opacity: 1;\r\n}\r\n\r\n@media (min-width: 992px) {\r\n  .testimonials .testimonial-item p {\r\n    width: 80%;\r\n  }\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Pricing Section\r\n--------------------------------------------------------------*/\r\n.pricing {\r\n  background: rgba(var(--color-secondary-rgb), 0.04);\r\n}\r\n\r\n.pricing .pricing-item {\r\n  padding: 60px 40px;\r\n  box-shadow: 0 3px 20px -2px rgba(var(--color-gray-rgb), 0.15);\r\n  background: var(--color-white);\r\n  height: 100%;\r\n  display: flex;\r\n  flex-direction: column;\r\n  border: 4px solid var(--color-white);\r\n  border-radius: 10px;\r\n  overflow: hidden;\r\n}\r\n\r\n.pricing .pricing-header {\r\n  background: linear-gradient(rgba(var(--color-secondary-rgb), 0.9), rgba(var(--color-secondary-rgb), 0.9)), url(\"landing_asset/pricing-bg.jpg\") center center;\r\n  background-size: cover;\r\n  text-align: center;\r\n  padding: 40px;\r\n  margin: -60px -40px 0;\r\n}\r\n\r\n.pricing h3 {\r\n  font-weight: 600;\r\n  margin-bottom: 5px;\r\n  font-size: 36px;\r\n  color: var(--color-white);\r\n}\r\n\r\n.pricing h4 {\r\n  font-size: 48px;\r\n  color: var(--color-white);\r\n  font-weight: 400;\r\n  font-family: var(--font-primary);\r\n  margin-bottom: 0;\r\n}\r\n\r\n.pricing h4 sup {\r\n  font-size: 28px;\r\n}\r\n\r\n.pricing h4 span {\r\n  color: rgba(var(--color-white-rgb), 0.6);\r\n  font-size: 24px;\r\n}\r\n\r\n.pricing ul {\r\n  padding: 30px 0;\r\n  list-style: none;\r\n  color: var(--color-gray);\r\n  text-align: left;\r\n  line-height: 20px;\r\n}\r\n\r\n.pricing ul li {\r\n  padding: 10px 0;\r\n  display: flex;\r\n  align-items: center;\r\n}\r\n\r\n.pricing ul i {\r\n  color: var(--color-primary);\r\n  font-size: 36px;\r\n  padding-right: 3px;\r\n  line-height: 0;\r\n}\r\n\r\n.pricing ul .na {\r\n  color: rgba(var(--color-gray-rgb), 0.5);\r\n}\r\n\r\n.pricing ul .na i {\r\n  color: rgba(var(--color-gray-rgb), 0.5);\r\n  font-size: 24px;\r\n  padding-left: 4px;\r\n}\r\n\r\n.pricing ul .na span {\r\n  text-decoration: line-through;\r\n}\r\n\r\n.pricing .buy-btn {\r\n  display: inline-block;\r\n  padding: 12px 40px;\r\n  border-radius: 6px;\r\n  color: var(--color-primary);\r\n  transition: none;\r\n  font-size: 16px;\r\n  font-weight: 700;\r\n  transition: 0.3s;\r\n  border: 1px solid var(--color-primary);\r\n}\r\n\r\n.pricing .buy-btn:hover {\r\n  background: var(--color-primary);\r\n  color: var(--color-white);\r\n}\r\n\r\n.pricing .featured {\r\n  border-color: var(--color-primary);\r\n}\r\n\r\n.pricing .featured .pricing-header {\r\n  background: linear-gradient(rgba(var(--color-primary-rgb), 0.9), rgba(var(--color-primary-rgb), 0.9)), url(\"landing_asset/pricing-bg.jpg\") center center;\r\n}\r\n\r\n.pricing .featured .buy-btn {\r\n  background: var(--color-primary);\r\n  color: var(--color-white);\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# F.A.Q Section\r\n--------------------------------------------------------------*/\r\n@media (max-width: 991px) {\r\n  .faq {\r\n    padding: 0;\r\n  }\r\n}\r\n\r\n.faq .content h3 {\r\n  font-weight: 400;\r\n  font-size: 34px;\r\n  color: var(--color-secondary);\r\n}\r\n\r\n.faq .content h4 {\r\n  font-size: 20px;\r\n  font-weight: 700;\r\n  margin-top: 5px;\r\n}\r\n\r\n.faq .content p {\r\n  font-size: 15px;\r\n  color: var(--color-gray);\r\n}\r\n\r\n.faq .img {\r\n  background-size: cover;\r\n  background-repeat: no-repeat;\r\n  background-position: center center;\r\n  min-height: 400px;\r\n}\r\n\r\n.faq .accordion-item {\r\n  border: 0;\r\n  margin-top: 15px;\r\n  box-shadow: 0px 5px 25px 0px rgba(var(--color-black-rgb), 0.06);\r\n}\r\n\r\n.faq .accordion-collapse {\r\n  border: 0;\r\n}\r\n\r\n.faq .accordion-button {\r\n  padding: 15px 40px 20px 60px;\r\n  font-weight: 600;\r\n  border: 0;\r\n  font-size: 18px;\r\n  color: var(--color-default);\r\n  text-align: left;\r\n  background: var(--color-white);\r\n  box-shadow: none;\r\n  border-radius: 5px;\r\n}\r\n\r\n.faq .accordion-button:not(.collapsed) {\r\n  color: var(--color-primary);\r\n  border-bottom: 0;\r\n  box-shadow: none;\r\n}\r\n\r\n.faq .question-icon {\r\n  position: absolute;\r\n  top: 14px;\r\n  left: 25px;\r\n  font-size: 20px;\r\n  color: var(--color-primary);\r\n}\r\n\r\n.faq .accordion-button:after {\r\n  position: absolute;\r\n  right: 15px;\r\n  top: 15px;\r\n  color: var(--color-primary);\r\n}\r\n\r\n.faq .accordion-body {\r\n  padding: 0 30px 25px 60px;\r\n  border: 0;\r\n  border-radius: 5px;\r\n  background: var(--color-white);\r\n  box-shadow: none;\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Portfolio Section\r\n--------------------------------------------------------------*/\r\n.portfolio .portfolio-flters {\r\n  padding: 0;\r\n  margin: 0 auto 30px auto;\r\n  list-style: none;\r\n  text-align: center;\r\n}\r\n\r\n.portfolio .portfolio-flters li {\r\n  cursor: pointer;\r\n  display: inline-block;\r\n  padding: 0;\r\n  font-size: 18px;\r\n  font-weight: 300;\r\n  margin: 0 10px;\r\n  line-height: 1;\r\n  margin-bottom: 5px;\r\n  transition: all 0.3s ease-in-out;\r\n}\r\n\r\n.portfolio .portfolio-flters li:hover,\r\n.portfolio .portfolio-flters li.filter-active {\r\n  color: var(--color-primary);\r\n}\r\n\r\n.portfolio .portfolio-flters li:first-child {\r\n  margin-left: 0;\r\n}\r\n\r\n.portfolio .portfolio-flters li:last-child {\r\n  margin-right: 0;\r\n}\r\n\r\n@media (max-width: 575px) {\r\n  .portfolio .portfolio-flters li {\r\n    font-size: 14px;\r\n    margin: 0 5px;\r\n  }\r\n}\r\n\r\n.portfolio .portfolio-item {\r\n  position: relative;\r\n  border: 1px solid var(--color-white);\r\n  overflow: hidden;\r\n  z-index: 1;\r\n}\r\n\r\n.portfolio .portfolio-item img {\r\n  transition: all 0.3s;\r\n}\r\n\r\n.portfolio .portfolio-item:before {\r\n  content: \"\";\r\n  inset: 0;\r\n  position: absolute;\r\n  background: rgba(var(--color-secondary-rgb), 0.8);\r\n  z-index: 2;\r\n  transition: 0.5s;\r\n  visibility: hidden;\r\n  opacity: 0;\r\n}\r\n\r\n.portfolio .portfolio-item .portfolio-info {\r\n  opacity: 0;\r\n  position: absolute;\r\n  inset: auto 40px 40px 40px;\r\n  z-index: 3;\r\n  transition: all ease-in-out 0.3s;\r\n  padding: 20px;\r\n}\r\n\r\n.portfolio .portfolio-item .portfolio-info h4 {\r\n  font-size: 18px;\r\n  font-weight: 600;\r\n  color: var(--color-white);\r\n  padding-right: 50px;\r\n}\r\n\r\n.portfolio .portfolio-item .portfolio-info .preview-link,\r\n.portfolio .portfolio-item .portfolio-info .details-link {\r\n  position: absolute;\r\n  right: 50px;\r\n  font-size: 24px;\r\n  top: calc(50% - 14px);\r\n  color: rgba(var(--color-white-rgb), 0.7);\r\n  transition: 0.3s;\r\n  line-height: 0;\r\n}\r\n\r\n.portfolio .portfolio-item .portfolio-info .preview-link:hover,\r\n.portfolio .portfolio-item .portfolio-info .details-link:hover {\r\n  color: var(--color-white);\r\n}\r\n\r\n.portfolio .portfolio-item .portfolio-info .details-link {\r\n  right: 14px;\r\n  font-size: 28px;\r\n}\r\n\r\n.portfolio .portfolio-item:hover:before {\r\n  visibility: visible;\r\n  opacity: 1;\r\n}\r\n\r\n.portfolio .portfolio-item:hover img {\r\n  transform: scale(1.2);\r\n}\r\n\r\n.portfolio .portfolio-item:hover .portfolio-info {\r\n  opacity: 1;\r\n  inset: auto 10px 0 10px;\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Team Section\r\n--------------------------------------------------------------*/\r\n.team .team-member .member-img {\r\n  border-radius: 8px;\r\n  overflow: hidden;\r\n}\r\n\r\n.team .team-member .social {\r\n  position: absolute;\r\n  left: 0;\r\n  top: -18px;\r\n  right: 0;\r\n  opacity: 0;\r\n  transition: ease-in-out 0.3s;\r\n  display: flex;\r\n  align-items: center;\r\n  justify-content: center;\r\n}\r\n\r\n.team .team-member .social a {\r\n  transition: color 0.3s;\r\n  color: var(--color-white);\r\n  background: var(--color-primary);\r\n  margin: 0 5px;\r\n  display: inline-flex;\r\n  align-items: center;\r\n  justify-content: center;\r\n  width: 36px;\r\n  height: 36px;\r\n  border-radius: 50%;\r\n  transition: 0.3s;\r\n}\r\n\r\n.team .team-member .social a i {\r\n  line-height: 0;\r\n  font-size: 16px;\r\n}\r\n\r\n.team .team-member .social a:hover {\r\n  background: var(--color-primary-light);\r\n}\r\n\r\n.team .team-member .social i {\r\n  font-size: 18px;\r\n  margin: 0 2px;\r\n}\r\n\r\n.team .team-member .member-info {\r\n  padding: 30px 15px;\r\n  text-align: center;\r\n  box-shadow: 0px 2px 15px rgba(var(--color-black-rgb), 0.1);\r\n  background: var(--color-white);\r\n  margin: -50px 20px 0 20px;\r\n  position: relative;\r\n  border-radius: 8px;\r\n}\r\n\r\n.team .team-member .member-info h4 {\r\n  font-weight: 400;\r\n  margin-bottom: 5px;\r\n  font-size: 24px;\r\n  color: var(--color-secondary);\r\n}\r\n\r\n.team .team-member .member-info span {\r\n  display: block;\r\n  font-size: 16px;\r\n  font-weight: 400;\r\n  color: var(--color-gray);\r\n}\r\n\r\n.team .team-member .member-info p {\r\n  font-style: italic;\r\n  font-size: 14px;\r\n  line-height: 26px;\r\n  color: var(--color-gray);\r\n}\r\n\r\n.team .team-member:hover .social {\r\n  opacity: 1;\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Recent Blog Posts\r\n--------------------------------------------------------------*/\r\n.recent-blog-posts .post-box {\r\n  transition: 0.3s;\r\n  height: 100%;\r\n  overflow: hidden;\r\n  position: relative;\r\n  display: flex;\r\n  flex-direction: column;\r\n}\r\n\r\n.recent-blog-posts .post-box .post-img {\r\n  overflow: hidden;\r\n  position: relative;\r\n  border-radius: 10px;\r\n}\r\n\r\n.recent-blog-posts .post-box .post-img img {\r\n  transition: 0.5s;\r\n}\r\n\r\n.recent-blog-posts .post-box .meta {\r\n  margin-top: 15px;\r\n}\r\n\r\n.recent-blog-posts .post-box .meta .post-date {\r\n  font-size: 15px;\r\n  font-weight: 400;\r\n  color: var(--color-primary);\r\n}\r\n\r\n.recent-blog-posts .post-box .meta .post-author {\r\n  font-size: 15px;\r\n  font-weight: 400;\r\n  color: var(--color-secondary);\r\n}\r\n\r\n.recent-blog-posts .post-box .post-title {\r\n  font-size: 24px;\r\n  color: var(--color-secondary);\r\n  font-weight: 700;\r\n  margin: 15px 0 0 0;\r\n  position: relative;\r\n  transition: 0.3s;\r\n}\r\n\r\n.recent-blog-posts .post-box p {\r\n  margin: 15px 0 0 0;\r\n  color: rgba(var(--color-secondary-dark-rgb), 0.7);\r\n}\r\n\r\n.recent-blog-posts .post-box .readmore {\r\n  display: flex;\r\n  align-items: center;\r\n  font-weight: 600;\r\n  line-height: 1;\r\n  transition: 0.3s;\r\n  margin-top: 15px;\r\n}\r\n\r\n.recent-blog-posts .post-box .readmore i {\r\n  line-height: 0;\r\n  margin-left: 4px;\r\n  font-size: 18px;\r\n}\r\n\r\n.recent-blog-posts .post-box:hover .post-title {\r\n  color: var(--color-primary);\r\n}\r\n\r\n.recent-blog-posts .post-box:hover .post-img img {\r\n  transform: scale(1.1);\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Contact Section\r\n--------------------------------------------------------------*/\r\n.contact .map {\r\n  margin-bottom: 40px;\r\n}\r\n\r\n.contact .map iframe {\r\n  border: 0;\r\n  width: 100%;\r\n  height: 400px;\r\n}\r\n\r\n.contact .info {\r\n  padding: 40px;\r\n  box-shadow: 0px 2px 15px rgba(var(--color-black-rgb), 0.1);\r\n  overflow: hidden;\r\n}\r\n\r\n.contact .info h3 {\r\n  font-weight: 600;\r\n  font-size: 24px;\r\n}\r\n\r\n.contact .info p {\r\n  color: var(--color-secondary-light);\r\n  margin-bottom: 30px;\r\n  font-size: 15px;\r\n}\r\n\r\n.contact .info-item+.info-item {\r\n  padding-top: 20px;\r\n  margin-top: 20px;\r\n  border-top: 1px solid rgba(var(--color-secondary-rgb), 0.15);\r\n}\r\n\r\n.contact .info-item i {\r\n  font-size: 24px;\r\n  color: var(--color-primary);\r\n  transition: all 0.3s ease-in-out;\r\n  margin-right: 20px;\r\n}\r\n\r\n.contact .info-item h4 {\r\n  padding: 0;\r\n  font-size: 18px;\r\n  font-weight: 600;\r\n  margin-bottom: 5px;\r\n  color: var(--color-secondary);\r\n}\r\n\r\n.contact .info-item p {\r\n  padding: 0;\r\n  margin-bottom: 0;\r\n  font-size: 14px;\r\n  color: var(--color-secondary-light);\r\n}\r\n\r\n.contact .php-email-form {\r\n  width: 100%;\r\n  background: var(--color-white);\r\n}\r\n\r\n.contact .php-email-form .form-group {\r\n  padding-bottom: 8px;\r\n}\r\n\r\n.contact .php-email-form .error-message {\r\n  display: none;\r\n  color: var(--color-white);\r\n  background: var(--color-red);\r\n  text-align: left;\r\n  padding: 15px;\r\n  font-weight: 600;\r\n}\r\n\r\n.contact .php-email-form .error-message br+br {\r\n  margin-top: 25px;\r\n}\r\n\r\n.contact .php-email-form .sent-message {\r\n  display: none;\r\n  color: var(--color-white);\r\n  background: var(--color-green);\r\n  text-align: center;\r\n  padding: 15px;\r\n  font-weight: 600;\r\n}\r\n\r\n.contact .php-email-form .loading {\r\n  display: none;\r\n  background: var(--color-white);\r\n  text-align: center;\r\n  padding: 15px;\r\n}\r\n\r\n.contact .php-email-form .loading:before {\r\n  content: \"\";\r\n  display: inline-block;\r\n  border-radius: 50%;\r\n  width: 24px;\r\n  height: 24px;\r\n  margin: 0 10px -6px 0;\r\n  border: 3px solid var(--color-green);\r\n  border-top-color: var(--color-white);\r\n  -webkit-animation: animate-loading 1s linear infinite;\r\n  animation: animate-loading 1s linear infinite;\r\n}\r\n\r\n.contact .php-email-form input[type=text],\r\n.contact .php-email-form input[type=email],\r\n.contact .php-email-form textarea {\r\n  border-radius: 0px;\r\n  box-shadow: none;\r\n  font-size: 14px;\r\n}\r\n\r\n.contact .php-email-form input[type=text]:focus,\r\n.contact .php-email-form input[type=email]:focus,\r\n.contact .php-email-form textarea:focus {\r\n  border-color: var(--color-secondary-light);\r\n}\r\n\r\n.contact .php-email-form input[type=text],\r\n.contact .php-email-form input[type=email] {\r\n  height: 48px;\r\n  padding: 10px 15px;\r\n}\r\n\r\n.contact .php-email-form textarea {\r\n  padding: 10px 12px;\r\n  height: 290px;\r\n}\r\n\r\n.contact .php-email-form button[type=submit] {\r\n  background: var(--color-primary);\r\n  border: 0;\r\n  padding: 13px 50px;\r\n  color: var(--color-white);\r\n  transition: 0.4s;\r\n  border-radius: 0;\r\n}\r\n\r\n.contact .php-email-form button[type=submit]:hover {\r\n  background: rgba(var(--color-primary-rgb), 0.85);\r\n}\r\n\r\n@-webkit-keyframes animate-loading {\r\n  0% {\r\n    transform: rotate(0deg);\r\n  }\r\n\r\n  100% {\r\n    transform: rotate(360deg);\r\n  }\r\n}\r\n\r\n@keyframes animate-loading {\r\n  0% {\r\n    transform: rotate(0deg);\r\n  }\r\n\r\n  100% {\r\n    transform: rotate(360deg);\r\n  }\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Portfolio Details\r\n--------------------------------------------------------------*/\r\n.portfolio-details {\r\n  padding-top: 40px;\r\n}\r\n\r\n.portfolio-details .portfolio-details-slider img {\r\n  width: 100%;\r\n}\r\n\r\n.portfolio-details .portfolio-details-slider .swiper-pagination {\r\n  margin-top: 20px;\r\n  position: relative;\r\n}\r\n\r\n.portfolio-details .portfolio-details-slider .swiper-pagination .swiper-pagination-bullet {\r\n  width: 12px;\r\n  height: 12px;\r\n  background-color: var(--color-white);\r\n  opacity: 1;\r\n  border: 1px solid var(--color-primary);\r\n}\r\n\r\n.portfolio-details .portfolio-details-slider .swiper-pagination .swiper-pagination-bullet-active {\r\n  background-color: var(--color-primary);\r\n}\r\n\r\n.portfolio-details .portfolio-info {\r\n  padding: 30px;\r\n  box-shadow: 0px 0 30px rgba(var(--color-secondary-rgb), 0.15);\r\n}\r\n\r\n.portfolio-details .portfolio-info h3 {\r\n  font-size: 22px;\r\n  font-weight: 700;\r\n  margin-bottom: 20px;\r\n  padding-bottom: 20px;\r\n  border-bottom: 1px solid var(--color-secondary-light);\r\n}\r\n\r\n.portfolio-details .portfolio-info ul {\r\n  list-style: none;\r\n  padding: 0;\r\n  font-size: 15px;\r\n}\r\n\r\n.portfolio-details .portfolio-info ul li+li {\r\n  margin-top: 10px;\r\n}\r\n\r\n.portfolio-details .portfolio-description {\r\n  padding-top: 30px;\r\n}\r\n\r\n.portfolio-details .portfolio-description h2 {\r\n  font-size: 26px;\r\n  font-weight: 700;\r\n  margin-bottom: 20px;\r\n}\r\n\r\n.portfolio-details .portfolio-description p {\r\n  padding: 0;\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Blog Stylings\r\n--------------------------------------------------------------*/\r\n/*--------------------------------------------------------------\r\n# Blog Home Posts List\r\n--------------------------------------------------------------*/\r\n.blog .posts-list article {\r\n  box-shadow: 0 4px 16px rgba(var(--color-black-rgb), 0.1);\r\n  padding: 30px;\r\n  height: 100%;\r\n}\r\n\r\n.blog .posts-list article+article {\r\n  margin-top: 60px;\r\n}\r\n\r\n.blog .posts-list .post-img {\r\n  max-height: 240px;\r\n  margin: -30px -30px 0 -30px;\r\n  overflow: hidden;\r\n}\r\n\r\n.blog .posts-list .title {\r\n  font-size: 24px;\r\n  font-weight: 700;\r\n  padding: 0;\r\n  margin: 20px 0 0 0;\r\n}\r\n\r\n.blog .posts-list .title a {\r\n  color: var(--color-secondary);\r\n  transition: 0.3s;\r\n}\r\n\r\n.blog .posts-list .title a:hover {\r\n  color: var(--color-primary);\r\n}\r\n\r\n.blog .posts-list .meta-top {\r\n  margin-top: 20px;\r\n  color: var(--color-gray);\r\n}\r\n\r\n.blog .posts-list .meta-top ul {\r\n  display: flex;\r\n  flex-wrap: wrap;\r\n  list-style: none;\r\n  align-items: center;\r\n  padding: 0;\r\n  margin: 0;\r\n}\r\n\r\n.blog .posts-list .meta-top ul li+li {\r\n  padding-left: 20px;\r\n}\r\n\r\n.blog .posts-list .meta-top i {\r\n  font-size: 16px;\r\n  margin-right: 8px;\r\n  line-height: 0;\r\n  color: rgba(var(--color-primary-rgb), 0.8);\r\n}\r\n\r\n.blog .posts-list .meta-top a {\r\n  color: var(--color-gray);\r\n  font-size: 14px;\r\n  display: inline-block;\r\n  line-height: 1;\r\n}\r\n\r\n.blog .posts-list .content {\r\n  margin-top: 20px;\r\n}\r\n\r\n.blog .posts-list .read-more a {\r\n  display: inline-block;\r\n  background: var(--color-primary);\r\n  color: var(--color-white);\r\n  padding: 8px 30px;\r\n  transition: 0.3s;\r\n  font-size: 14px;\r\n  border-radius: 4px;\r\n}\r\n\r\n.blog .posts-list .read-more a:hover {\r\n  background: rgba(var(--color-primary-rgb), 0.8);\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Blog Details Page\r\n--------------------------------------------------------------*/\r\n.blog .blog-details {\r\n  box-shadow: 0 4px 16px rgba(var(--color-black-rgb), 0.1);\r\n  padding: 30px;\r\n}\r\n\r\n.blog .blog-details .post-img {\r\n  margin: -30px -30px 20px -30px;\r\n  overflow: hidden;\r\n}\r\n\r\n.blog .blog-details .title {\r\n  font-size: 28px;\r\n  font-weight: 700;\r\n  padding: 0;\r\n  margin: 20px 0 0 0;\r\n  color: var(--color-secondary);\r\n}\r\n\r\n.blog .blog-details .content {\r\n  margin-top: 20px;\r\n}\r\n\r\n.blog .blog-details .content h3 {\r\n  font-size: 22px;\r\n  margin-top: 30px;\r\n  font-weight: bold;\r\n}\r\n\r\n.blog .blog-details .content blockquote {\r\n  overflow: hidden;\r\n  background-color: rgba(var(--color-secondary-rgb), 0.06);\r\n  padding: 60px;\r\n  position: relative;\r\n  text-align: center;\r\n  margin: 20px 0;\r\n}\r\n\r\n.blog .blog-details .content blockquote p {\r\n  color: var(--color-default);\r\n  line-height: 1.6;\r\n  margin-bottom: 0;\r\n  font-style: italic;\r\n  font-weight: 500;\r\n  font-size: 22px;\r\n}\r\n\r\n.blog .blog-details .content blockquote:after {\r\n  content: \"\";\r\n  position: absolute;\r\n  left: 0;\r\n  top: 0;\r\n  bottom: 0;\r\n  width: 3px;\r\n  background-color: var(--color-secondary);\r\n  margin-top: 20px;\r\n  margin-bottom: 20px;\r\n}\r\n\r\n.blog .blog-details .meta-top {\r\n  margin-top: 20px;\r\n  color: var(--color-gray);\r\n}\r\n\r\n.blog .blog-details .meta-top ul {\r\n  display: flex;\r\n  flex-wrap: wrap;\r\n  list-style: none;\r\n  align-items: center;\r\n  padding: 0;\r\n  margin: 0;\r\n}\r\n\r\n.blog .blog-details .meta-top ul li+li {\r\n  padding-left: 20px;\r\n}\r\n\r\n.blog .blog-details .meta-top i {\r\n  font-size: 16px;\r\n  margin-right: 8px;\r\n  line-height: 0;\r\n  color: rgba(var(--color-primary-rgb), 0.8);\r\n}\r\n\r\n.blog .blog-details .meta-top a {\r\n  color: var(--color-gray);\r\n  font-size: 14px;\r\n  display: inline-block;\r\n  line-height: 1;\r\n}\r\n\r\n.blog .blog-details .meta-bottom {\r\n  padding-top: 10px;\r\n  border-top: 1px solid rgba(var(--color-secondary-rgb), 0.15);\r\n}\r\n\r\n.blog .blog-details .meta-bottom i {\r\n  color: var(--color-secondary-light);\r\n  display: inline;\r\n}\r\n\r\n.blog .blog-details .meta-bottom a {\r\n  color: rgba(var(--color-secondary-rgb), 0.8);\r\n  transition: 0.3s;\r\n}\r\n\r\n.blog .blog-details .meta-bottom a:hover {\r\n  color: var(--color-primary);\r\n}\r\n\r\n.blog .blog-details .meta-bottom .cats {\r\n  list-style: none;\r\n  display: inline;\r\n  padding: 0 20px 0 0;\r\n  font-size: 14px;\r\n}\r\n\r\n.blog .blog-details .meta-bottom .cats li {\r\n  display: inline-block;\r\n}\r\n\r\n.blog .blog-details .meta-bottom .tags {\r\n  list-style: none;\r\n  display: inline;\r\n  padding: 0;\r\n  font-size: 14px;\r\n}\r\n\r\n.blog .blog-details .meta-bottom .tags li {\r\n  display: inline-block;\r\n}\r\n\r\n.blog .blog-details .meta-bottom .tags li+li::before {\r\n  padding-right: 6px;\r\n  color: var(--color-default);\r\n  content: \",\";\r\n}\r\n\r\n.blog .blog-details .meta-bottom .share {\r\n  font-size: 16px;\r\n}\r\n\r\n.blog .blog-details .meta-bottom .share i {\r\n  padding-left: 5px;\r\n}\r\n\r\n.blog .post-author {\r\n  padding: 20px;\r\n  margin-top: 30px;\r\n  box-shadow: 0 4px 16px rgba(var(--color-black-rgb), 0.1);\r\n}\r\n\r\n.blog .post-author img {\r\n  max-width: 120px;\r\n  margin-right: 20px;\r\n}\r\n\r\n.blog .post-author h4 {\r\n  font-weight: 600;\r\n  font-size: 22px;\r\n  margin-bottom: 0px;\r\n  padding: 0;\r\n  color: var(--color-secondary);\r\n}\r\n\r\n.blog .post-author .social-links {\r\n  margin: 0 10px 10px 0;\r\n}\r\n\r\n.blog .post-author .social-links a {\r\n  color: rgba(var(--color-secondary-rgb), 0.5);\r\n  margin-right: 5px;\r\n}\r\n\r\n.blog .post-author p {\r\n  font-style: italic;\r\n  color: rgba(var(--color-gray-rgb), 0.8);\r\n  margin-bottom: 0;\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Blog Sidebar\r\n--------------------------------------------------------------*/\r\n.blog .sidebar {\r\n  padding: 30px;\r\n  box-shadow: 0 4px 16px rgba(var(--color-black-rgb), 0.1);\r\n}\r\n\r\n.blog .sidebar .sidebar-title {\r\n  font-size: 20px;\r\n  font-weight: 700;\r\n  padding: 0;\r\n  margin: 0;\r\n  color: var(--color-secondary);\r\n}\r\n\r\n.blog .sidebar .sidebar-item+.sidebar-item {\r\n  margin-top: 40px;\r\n}\r\n\r\n.blog .sidebar .search-form form {\r\n  background: var(--color-white);\r\n  border: 1px solid rgba(var(--color-secondary-rgb), 0.3);\r\n  padding: 3px 10px;\r\n  position: relative;\r\n}\r\n\r\n.blog .sidebar .search-form form input[type=text] {\r\n  border: 0;\r\n  padding: 4px;\r\n  border-radius: 4px;\r\n  width: calc(100% - 40px);\r\n}\r\n\r\n.blog .sidebar .search-form form input[type=text]:focus {\r\n  outline: none;\r\n}\r\n\r\n.blog .sidebar .search-form form button {\r\n  position: absolute;\r\n  top: 0;\r\n  right: 0;\r\n  bottom: 0;\r\n  border: 0;\r\n  background: none;\r\n  font-size: 16px;\r\n  padding: 0 15px;\r\n  margin: -1px;\r\n  background: var(--color-primary);\r\n  color: var(--color-white);\r\n  transition: 0.3s;\r\n  border-radius: 0 4px 4px 0;\r\n  line-height: 0;\r\n}\r\n\r\n.blog .sidebar .search-form form button i {\r\n  line-height: 0;\r\n}\r\n\r\n.blog .sidebar .search-form form button:hover {\r\n  background: rgba(var(--color-primary-rgb), 0.8);\r\n}\r\n\r\n.blog .sidebar .categories ul {\r\n  list-style: none;\r\n  padding: 0;\r\n}\r\n\r\n.blog .sidebar .categories ul li+li {\r\n  padding-top: 10px;\r\n}\r\n\r\n.blog .sidebar .categories ul a {\r\n  color: var(--color-secondary);\r\n  transition: 0.3s;\r\n}\r\n\r\n.blog .sidebar .categories ul a:hover {\r\n  color: var(--color-default);\r\n}\r\n\r\n.blog .sidebar .categories ul a span {\r\n  padding-left: 5px;\r\n  color: rgba(var(--color-default-rgb), 0.4);\r\n  font-size: 14px;\r\n}\r\n\r\n.blog .sidebar .recent-posts .post-item {\r\n  display: flex;\r\n}\r\n\r\n.blog .sidebar .recent-posts .post-item+.post-item {\r\n  margin-top: 15px;\r\n}\r\n\r\n.blog .sidebar .recent-posts img {\r\n  width: 80px;\r\n  margin-right: 15px;\r\n}\r\n\r\n.blog .sidebar .recent-posts h4 {\r\n  font-size: 18px;\r\n  font-weight: 400;\r\n}\r\n\r\n.blog .sidebar .recent-posts h4 a {\r\n  color: var(--color-secondary);\r\n  transition: 0.3s;\r\n}\r\n\r\n.blog .sidebar .recent-posts h4 a:hover {\r\n  color: var(--color-primary);\r\n}\r\n\r\n.blog .sidebar .recent-posts time {\r\n  display: block;\r\n  font-style: italic;\r\n  font-size: 14px;\r\n  color: rgba(var(--color-default-rgb), 0.4);\r\n}\r\n\r\n.blog .sidebar .tags {\r\n  margin-bottom: -10px;\r\n}\r\n\r\n.blog .sidebar .tags ul {\r\n  list-style: none;\r\n  padding: 0;\r\n}\r\n\r\n.blog .sidebar .tags ul li {\r\n  display: inline-block;\r\n}\r\n\r\n.blog .sidebar .tags ul a {\r\n  color: var(--color-secondary-light);\r\n  font-size: 14px;\r\n  padding: 6px 14px;\r\n  margin: 0 6px 8px 0;\r\n  border: 1px solid rgba(var(--color-secondary-light-rgb), 0.8);\r\n  display: inline-block;\r\n  transition: 0.3s;\r\n}\r\n\r\n.blog .sidebar .tags ul a:hover {\r\n  color: var(--color-white);\r\n  border: 1px solid var(--color-primary);\r\n  background: var(--color-primary);\r\n}\r\n\r\n.blog .sidebar .tags ul a span {\r\n  padding-left: 5px;\r\n  color: rgba(var(--color-secondary-light-rgb), 0.8);\r\n  font-size: 14px;\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Blog Comments\r\n--------------------------------------------------------------*/\r\n.blog .comments {\r\n  margin-top: 30px;\r\n}\r\n\r\n.blog .comments .comments-count {\r\n  font-weight: bold;\r\n}\r\n\r\n.blog .comments .comment {\r\n  margin-top: 30px;\r\n  position: relative;\r\n}\r\n\r\n.blog .comments .comment .comment-img {\r\n  margin-right: 14px;\r\n}\r\n\r\n.blog .comments .comment .comment-img img {\r\n  width: 60px;\r\n}\r\n\r\n.blog .comments .comment h5 {\r\n  font-size: 16px;\r\n  margin-bottom: 2px;\r\n}\r\n\r\n.blog .comments .comment h5 a {\r\n  font-weight: bold;\r\n  color: var(--color-default);\r\n  transition: 0.3s;\r\n}\r\n\r\n.blog .comments .comment h5 a:hover {\r\n  color: var(--color-primary);\r\n}\r\n\r\n.blog .comments .comment h5 .reply {\r\n  padding-left: 10px;\r\n  color: var(--color-secondary);\r\n}\r\n\r\n.blog .comments .comment h5 .reply i {\r\n  font-size: 20px;\r\n}\r\n\r\n.blog .comments .comment time {\r\n  display: block;\r\n  font-size: 14px;\r\n  color: rgba(var(--color-secondary-rgb), 0.8);\r\n  margin-bottom: 5px;\r\n}\r\n\r\n.blog .comments .comment.comment-reply {\r\n  padding-left: 40px;\r\n}\r\n\r\n.blog .comments .reply-form {\r\n  margin-top: 30px;\r\n  padding: 30px;\r\n  box-shadow: 0 4px 16px rgba(var(--color-black-rgb), 0.1);\r\n}\r\n\r\n.blog .comments .reply-form h4 {\r\n  font-weight: bold;\r\n  font-size: 22px;\r\n}\r\n\r\n.blog .comments .reply-form p {\r\n  font-size: 14px;\r\n}\r\n\r\n.blog .comments .reply-form input {\r\n  border-radius: 4px;\r\n  padding: 10px 10px;\r\n  font-size: 14px;\r\n}\r\n\r\n.blog .comments .reply-form input:focus {\r\n  box-shadow: none;\r\n  border-color: rgba(var(--color-primary-rgb), 0.8);\r\n}\r\n\r\n.blog .comments .reply-form textarea {\r\n  border-radius: 4px;\r\n  padding: 10px 10px;\r\n  font-size: 14px;\r\n}\r\n\r\n.blog .comments .reply-form textarea:focus {\r\n  box-shadow: none;\r\n  border-color: rgba(var(--color-primary-rgb), 0.8);\r\n}\r\n\r\n.blog .comments .reply-form .form-group {\r\n  margin-bottom: 25px;\r\n}\r\n\r\n.blog .comments .reply-form .btn-primary {\r\n  border-radius: 4px;\r\n  padding: 10px 20px;\r\n  border: 0;\r\n  background-color: var(--color-secondary);\r\n}\r\n\r\n.blog .comments .reply-form .btn-primary:hover {\r\n  background-color: rgba(var(--color-secondary-rgb), 0.8);\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Blog Home Pagination\r\n--------------------------------------------------------------*/\r\n.blog .blog-pagination {\r\n  margin-top: 30px;\r\n  color: var(--color-secondary-light);\r\n}\r\n\r\n.blog .blog-pagination ul {\r\n  display: flex;\r\n  padding: 0;\r\n  margin: 0;\r\n  list-style: none;\r\n}\r\n\r\n.blog .blog-pagination li {\r\n  margin: 0 5px;\r\n  transition: 0.3s;\r\n}\r\n\r\n.blog .blog-pagination li a {\r\n  color: var(--color-secondary);\r\n  padding: 7px 16px;\r\n  display: flex;\r\n  align-items: center;\r\n  justify-content: center;\r\n}\r\n\r\n.blog .blog-pagination li.active,\r\n.blog .blog-pagination li:hover {\r\n  background: var(--color-primary);\r\n}\r\n\r\n.blog .blog-pagination li.active a,\r\n.blog .blog-pagination li:hover a {\r\n  color: var(--color-white);\r\n}\r\n\r\n/*--------------------------------------------------------------\r\n# Footer\r\n--------------------------------------------------------------*/\r\n.footer {\r\n  color: var(--color-white);\r\n  font-size: 14px;\r\n}\r\n\r\n.footer .footer-content {\r\n  background: var(--color-secondary);\r\n  padding: 60px 0 30px 0;\r\n}\r\n\r\n.footer .footer-content .footer-info {\r\n  margin-bottom: 30px;\r\n}\r\n\r\n.footer .footer-content .footer-info h3 {\r\n  font-size: 28px;\r\n  margin: 0 0 20px 0;\r\n  padding: 2px 0 2px 0;\r\n  line-height: 1;\r\n  font-weight: 700;\r\n  text-transform: uppercase;\r\n}\r\n\r\n.footer .footer-content .footer-info h3 span {\r\n  color: var(--color-primary);\r\n}\r\n\r\n.footer .footer-content .footer-info p {\r\n  font-size: 14px;\r\n  line-height: 24px;\r\n  margin-bottom: 0;\r\n  font-family: var(--font-primary);\r\n  color: var(--color-white);\r\n}\r\n\r\n.footer .footer-content h4 {\r\n  font-size: 16px;\r\n  font-weight: 600;\r\n  color: var(--color-white);\r\n  position: relative;\r\n  padding-bottom: 12px;\r\n  margin-bottom: 15px;\r\n}\r\n\r\n.footer .footer-content h4::after {\r\n  content: \"\";\r\n  position: absolute;\r\n  display: block;\r\n  width: 20px;\r\n  height: 2px;\r\n  background: var(--color-primary);\r\n  bottom: 0;\r\n  left: 0;\r\n}\r\n\r\n.footer .footer-content .footer-links {\r\n  margin-bottom: 30px;\r\n}\r\n\r\n.footer .footer-content .footer-links ul {\r\n  list-style: none;\r\n  padding: 0;\r\n  margin: 0;\r\n}\r\n\r\n.footer .footer-content .footer-links ul i {\r\n  padding-right: 2px;\r\n  color: var(--color-white);\r\n  font-size: 12px;\r\n  line-height: 1;\r\n}\r\n\r\n.footer .footer-content .footer-links ul li {\r\n  padding: 10px 0;\r\n  display: flex;\r\n  align-items: center;\r\n}\r\n\r\n.footer .footer-content .footer-links ul li:first-child {\r\n  padding-top: 0;\r\n}\r\n\r\n.footer .footer-content .footer-links ul a {\r\n  color: rgba(var(--color-white-rgb), 0.7);\r\n  transition: 0.3s;\r\n  display: inline-block;\r\n  line-height: 1;\r\n}\r\n\r\n.footer .footer-content .footer-links ul a:hover {\r\n  color: var(--color-white);\r\n}\r\n\r\n.footer .footer-content .footer-newsletter form {\r\n  margin-top: 30px;\r\n  background: var(--color-white);\r\n  padding: 6px 10px;\r\n  position: relative;\r\n  border-radius: 4px;\r\n}\r\n\r\n.footer .footer-content .footer-newsletter form input[type=email] {\r\n  border: 0;\r\n  padding: 4px;\r\n  width: calc(100% - 110px);\r\n}\r\n\r\n.footer .footer-content .footer-newsletter form input[type=email]:focus-visible {\r\n  outline: none;\r\n}\r\n\r\n.footer .footer-content .footer-newsletter form input[type=submit] {\r\n  position: absolute;\r\n  top: 0;\r\n  right: -2px;\r\n  bottom: 0;\r\n  border: 0;\r\n  background: none;\r\n  font-size: 16px;\r\n  padding: 0 20px;\r\n  background: var(--color-primary);\r\n  color: var(--color-white);\r\n  transition: 0.3s;\r\n  border-radius: 0 4px 4px 0;\r\n}\r\n\r\n.footer .footer-content .footer-newsletter form input[type=submit]:hover {\r\n  background: rgba(var(--color-primary-rgb), 0.85);\r\n}\r\n\r\n.footer .footer-legal {\r\n  padding: 30px 0;\r\n  background: var(--color-secondary-dark);\r\n}\r\n\r\n.footer .footer-legal .credits {\r\n  padding-top: 4px;\r\n  font-size: 13px;\r\n  color: var(--color-white);\r\n}\r\n\r\n.footer .footer-legal .credits a {\r\n  color: var(--color-primary-light);\r\n}\r\n\r\n.footer .footer-legal .social-links a {\r\n  font-size: 18px;\r\n  display: inline-block;\r\n  background: rgba(var(--color-white-rgb), 0.1);\r\n  color: var(--color-white);\r\n  line-height: 1;\r\n  padding: 8px 0;\r\n  margin-right: 4px;\r\n  border-radius: 4px;\r\n  text-align: center;\r\n  width: 36px;\r\n  height: 36px;\r\n  transition: 0.3s;\r\n}\r\n\r\n.footer .footer-legal .social-links a:hover {\r\n  background: var(--color-primary);\r\n  text-decoration: none;\r\n}\r\n</style>', 1);
INSERT INTO `landing_home` (`id_landing_home`, `page_number`, `page_name`, `source_html`, `is_active`) VALUES
(3, 3, 'Head', '<head>\r\n  <meta charset=\"utf-8\">\r\n  <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">\r\n\r\n  <title>Sirana</title>\r\n  <meta content=\"\" name=\"description\">\r\n  <meta content=\"\" name=\"keywords\">\r\n\r\n  <!-- Favicons -->\r\n  <link href=\"assets/img/Only.png\" rel=\"icon\">\r\n  <!-- <link href=\"assets/img/apple-touch-icon.png\" rel=\"apple-touch-icon\"> -->\r\n\r\n  <!-- Google Fonts -->\r\n  <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">\r\n  <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>\r\n  <link href=\"https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap\" rel=\"stylesheet\">\r\n\r\n  <!-- Vendor CSS Files -->\r\n  <link href=\"assets/vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">\r\n  <link href=\"assets/vendor/bootstrap-icons/bootstrap-icons.css\" rel=\"stylesheet\">\r\n  <link href=\"assets/vendor/aos/aos.css\" rel=\"stylesheet\">\r\n  <link href=\"assets/vendor/glightbox/css/glightbox.min.css\" rel=\"stylesheet\">\r\n  <link href=\"assets/vendor/swiper/swiper-bundle.min.css\" rel=\"stylesheet\">\r\n\r\n  <!-- Variables CSS Files. Uncomment your preferred color scheme -->\r\n  <link href=\"assets/css/variables.css\" rel=\"stylesheet\">\r\n  <!-- <link href=\"assets/css/variables-blue.css\" rel=\"stylesheet\"> -->\r\n  <!-- <link href=\"assets/css/variables-green.css\" rel=\"stylesheet\"> -->\r\n  <!-- <link href=\"assets/css/variables-orange.css\" rel=\"stylesheet\"> -->\r\n  <!-- <link href=\"assets/css/variables-purple.css\" rel=\"stylesheet\"> -->\r\n  <!-- <link href=\"assets/css/variables-red.css\" rel=\"stylesheet\"> -->\r\n  <!-- <link href=\"assets/css/variables-pink.css\" rel=\"stylesheet\"> -->\r\n\r\n  <!-- Template Main CSS File -->\r\n  <link href=\"assets/css/main.css\" rel=\"stylesheet\">\r\n<link href=\"//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css\" rel=\"stylesheet\">\r\n<link href=\"//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css\" rel=\"stylesheet\">\r\n  <!-- =======================================================\r\n  * Template Name: HeroBiz - v2.3.1\r\n  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/\r\n  * Author: BootstrapMade.com\r\n  * License: https://bootstrapmade.com/license/\r\n  ======================================================== -->\r\n</head>', 1),
(4, 4, 'Header Page', '  <!-- ======= Header ======= -->\r\n  <header id=\"header\" class=\"header fixed-top\" data-scrollto-offset=\"0\">\r\n    <div class=\"container-fluid d-flex align-items-center justify-content-between\">\r\n\r\n      <a href=\"index.html\" class=\"logo d-flex align-items-center scrollto me-auto me-lg-0\">\r\n        <!-- Uncomment the line below if you also wish to use an image logo -->\r\n        <!-- <img src=\"assets/img/logo.png\" alt=\"\"> -->\r\n        <!-- <h1>HeroBiz<span>.</span></h1> -->\r\n        <img src=\"landing_asset/Horizontal.png\" alt=\"\">\r\n      </a>\r\n      <!-- <a href=\"index.html\" class=\"logo d-flex align-items-center scrollto me-auto me-lg-0\"> -->\r\n        <!-- Uncomment the line below if you also wish to use an image logo -->\r\n        <!-- <img src=\"assets/img/logo.png\" alt=\"\"> -->\r\n        <!-- <h1>Sirana<span>.</span></h1> -->\r\n      <!-- </a> -->\r\n\r\n      <nav id=\"navbar\" class=\"navbar\">\r\n        <ul>\r\n\r\n          <!-- <li><a href=\"index.html\"><span>Home</span></a>\r\n          </li> -->\r\n\r\n          <li><a class=\"nav-link scrollto\" href=\"index.html#about\">Tentang Kami</a></li>\r\n          <!-- <li><a class=\"nav-link scrollto\" href=\"index.html#services\">Services</a></li>\r\n          <li><a class=\"nav-link scrollto\" href=\"index.html#portfolio\">Portfolio</a></li>\r\n          <li><a class=\"nav-link scrollto\" href=\"index.html#team\">Team</a></li> -->\r\n          <!-- <li><a href=\"blog.html\">Blog</a></li>\r\n          <li class=\"dropdown megamenu\"><a href=\"#\"><span>Mega Menu</span> <i class=\"bi bi-chevron-down dropdown-indicator\"></i></a>\r\n            <ul>\r\n              <li>\r\n                <a href=\"#\">Column 1 link 1</a>\r\n                <a href=\"#\">Column 1 link 2</a>\r\n                <a href=\"#\">Column 1 link 3</a>\r\n              </li>\r\n              <li>\r\n                <a href=\"#\">Column 2 link 1</a>\r\n                <a href=\"#\">Column 2 link 2</a>\r\n                <a href=\"#\">Column 3 link 3</a>\r\n              </li>\r\n              <li>\r\n                <a href=\"#\">Column 3 link 1</a>\r\n                <a href=\"#\">Column 3 link 2</a>\r\n                <a href=\"#\">Column 3 link 3</a>\r\n              </li>\r\n              <li>\r\n                <a href=\"#\">Column 4 link 1</a>\r\n                <a href=\"#\">Column 4 link 2</a>\r\n                <a href=\"#\">Column 4 link 3</a>\r\n              </li>\r\n            </ul>\r\n          </li> -->\r\n          <!-- <li class=\"dropdown\"><a href=\"#\"><span>Drop Down</span> <i class=\"bi bi-chevron-down dropdown-indicator\"></i></a>\r\n            <ul>\r\n              <li><a href=\"#\">Drop Down 1</a></li>\r\n              <li class=\"dropdown\"><a href=\"#\"><span>Deep Drop Down</span> <i class=\"bi bi-chevron-down dropdown-indicator\"></i></a>\r\n                <ul>\r\n                  <li><a href=\"#\">Deep Drop Down 1</a></li>\r\n                  <li><a href=\"#\">Deep Drop Down 2</a></li>\r\n                  <li><a href=\"#\">Deep Drop Down 3</a></li>\r\n                  <li><a href=\"#\">Deep Drop Down 4</a></li>\r\n                  <li><a href=\"#\">Deep Drop Down 5</a></li>\r\n                </ul>\r\n              </li>\r\n              <li><a href=\"#\">Drop Down 2</a></li>\r\n              <li><a href=\"#\">Drop Down 3</a></li>\r\n              <li><a href=\"#\">Drop Down 4</a></li>\r\n            </ul>\r\n          </li>\r\n          <li><a class=\"nav-link scrollto\" href=\"index.html#contact\">Contact</a></li>\r\n        </ul>\r\n        <i class=\"bi bi-list mobile-nav-toggle d-none\"></i> -->\r\n      </nav><!-- .navbar -->\r\n\r\n      <a class=\"btn-getstarted scrollto\" href=\"administrator/\">Login</a>\r\n\r\n    </div>\r\n  </header><!-- End Header -->', 1),
(5, 5, 'Page 1', '  <section id=\"hero-fullscreen\" class=\"hero-fullscreen d-flex align-items-center\" style=\"background-image: url(\'landing_asset/hero-fullscreen-bg.jpg\'); background-color:blue\">\r\n    <div class=\"container d-flex flex-column align-items-center position-relative\" data-aos=\"zoom-out\">\r\n      <h2>Selamat Datang di <span>SIRANA</span></h2>\r\n      <p>Aplikasi Penyaluran Tenaga Kerja berbasis web yang kini dapat kamu gunakan.</p>\r\n      <div class=\"d-flex\">\r\n        <a href=\"administrator/\" class=\"btn-get-started scrollto\">Login</a>\r\n        <a href=\"https://youtu.be/NBhC9alV5Sg\" class=\"glightbox btn-watch-video d-flex align-items-center\"><i class=\"fa fa-clock-o\"></i><span>Watch Video</span></a>\r\n      </div>\r\n    </div>\r\n  </section>', 1),
(6, 6, 'Page 2', '    <section id=\"featured-services\" class=\"featured-services\" style=\"background-image: url(\'https://asset.kompas.com/crops/KeVS-zp8wmKhW1xIzAiWY7DjK3E=/0x0:0x0/750x500/data/photo/2022/11/27/6382c3cf13a00.jpeg\') center center; background-color:yellow\">\r\n      <div class=\"container \">\r\n\r\n        <div class=\"row gy-4\">\r\n\r\n          <div class=\"col-xl-3 col-md-6 d-flex\" data-aos=\"zoom-out\">\r\n            <div class=\"service-item position-relative\">\r\n              <div class=\"icon\"><i class=\"bi bi-activity icon\"></i></div>\r\n              <h4><a href=\"\" class=\"stretched-link\">Order Pegawai</a></h4>\r\n              <p>Proses order pegawai untuk kegiatan bongkar muat menjadi lebih mudah</p>\r\n            </div>\r\n          </div>\r\n          <!-- End Service Item -->\r\n\r\n          <div class=\"col-xl-3 col-md-6 d-flex\" data-aos=\"zoom-out\" data-aos-delay=\"200\">\r\n            <div class=\"service-item position-relative\">\r\n              <div class=\"icon\"><i class=\"bi bi-bounding-box-circles icon\"></i></div>\r\n              <h4><a href=\"\" class=\"stretched-link\">Diklat</a></h4>\r\n              <p>Pendataan peserta diklat bagi pekerja menjadi lebih efisien</p>\r\n            </div>\r\n          </div>\r\n          <!-- End Service Item -->\r\n\r\n          <!-- <div class=\"col-xl-3 col-md-6 d-flex\" data-aos=\"zoom-out\" data-aos-delay=\"400\">\r\n            <div class=\"service-item position-relative\">\r\n              <div class=\"icon\"><i class=\"bi bi-calendar4-week icon\"></i></div>\r\n              <h4><a href=\"\" class=\"stretched-link\">Magni Dolores</a></h4>\r\n              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>\r\n            </div>\r\n          </div> -->\r\n          <!-- End Service Item -->\r\n\r\n          <!-- <div class=\"col-xl-3 col-md-6 d-flex\" data-aos=\"zoom-out\" data-aos-delay=\"600\">\r\n            <div class=\"service-item position-relative\">\r\n              <div class=\"icon\"><i class=\"bi bi-broadcast icon\"></i></div>\r\n              <h4><a href=\"\" class=\"stretched-link\">Nemo Enim</a></h4>\r\n              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>\r\n            </div>\r\n          </div>  -->\r\n          <!-- End Service Item -->\r\n\r\n        </div>\r\n\r\n      </div>\r\n    </section>', 1),
(7, 10, 'Page 10 - About', '    <!-- ======= About Section ======= -->\r\n    <section id=\"about\" class=\"about\">\r\n      <div class=\"container\" data-aos=\"fade-up\">\r\n\r\n        <div class=\"section-header\">\r\n          <h2>Tentang Kami</h2>\r\n<i class=\"fa-solid fa-user\"></i>\r\n          <p>SIRANA merupakan sebuah aplikasi berbasis web yang membantu koperasi TKBM dalam proses penyaluran tenaga Kerja</p>\r\n<img src=\"landing_asset/hero-fullscreen-bg.jpg\">\r\n        </div>\r\n\r\n\r\n      </div>\r\n    </section', 1),
(8, 99, 'Footer', '  <!-- ======= Footer ======= -->\r\n  <footer id=\"footer\" class=\"footer\">\r\n\r\n    <div class=\"footer-content\">\r\n      <div class=\"container\">\r\n        <div class=\"row\">\r\n\r\n          <div class=\"col-lg-3 col-md-6\">\r\n            <div class=\"footer-info\">\r\n              <h3>SIRANA</h3>\r\n              <p>\r\n                Palembang, Indonesia<br><br>\r\n                <strong>Phone:</strong> 08234509839<br>\r\n                <strong>Email:</strong> info@example.com<br>\r\n              </p>\r\n            </div>\r\n          </div>\r\n\r\n          <div class=\"col-lg-2 col-md-6 footer-links\">\r\n            <h4>Useful Links</h4>\r\n            <ul>\r\n              <!-- <li><i class=\"bi bi-chevron-right\"></i> <a href=\"#\">Home</a></li> -->\r\n              <li><i class=\"bi bi-chevron-right\"></i> <a href=\"#\">Tentang Kami</a></li>\r\n              <!-- <li><i class=\"bi bi-chevron-right\"></i> <a href=\"#\">Services</a></li>\r\n              <li><i class=\"bi bi-chevron-right\"></i> <a href=\"#\">Terms of service</a></li>\r\n              <li><i class=\"fa fa-male bi bi-chevron-right\"></i> <a href=\"#\">Privacy policy</a></li> -->\r\n            </ul>\r\n          </div>\r\n\r\n\r\n        </div>\r\n      </div>\r\n    </div>\r\n\r\n    <div class=\"footer-legal text-center\">\r\n      <div class=\"container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center\">\r\n\r\n        <div class=\"d-flex flex-column align-items-center align-items-lg-start\">\r\n          <div class=\"copyright\">\r\n            &copy; Copyright <strong><span>SIRANA</span></strong>. All Rights Reserved<br>\r\nDikembangkan oleh Lab. ESD - Sistem Informasi - FRI - Telkom University\r\n          </div>\r\n          <div class=\"credits\">\r\n            <!-- All the links in the footer should remain intact. -->\r\n            <!-- You can delete the links only if you purchased the pro version. -->\r\n            <!-- Licensing information: https://bootstrapmade.com/license/ -->\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n\r\n        <div class=\"social-links order-first order-lg-last mb-3 mb-lg-0\">\r\n          <a href=\"#\" class=\"twitter\"><i class=\"bi bi-twitter\"></i></a>\r\n          <a href=\"#\" class=\"facebook\"><i class=\"bi bi-facebook\"></i></a>\r\n          <a href=\"#\" class=\"instagram\"><i class=\"bi bi-instagram\"></i></a>\r\n          <a href=\"#\" class=\"google-plus\"><i class=\"bi bi-skype\"></i></a>\r\n          <a href=\"#\" class=\"linkedin\"><i class=\"bi bi-linkedin\"></i></a>\r\n        </div>\r\n\r\n      </div>\r\n    </div>\r\n\r\n  </footer>', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `language`
--

CREATE TABLE `language` (
  `id_language` int(11) NOT NULL,
  `language` varchar(150) NOT NULL,
  `short` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `language`
--

INSERT INTO `language` (`id_language`, `language`, `short`) VALUES
(1, 'English', 'EN'),
(2, 'Indonesia', 'ID');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_kinerja_pegawai`
--

CREATE TABLE `laporan_kinerja_pegawai` (
  `id_laporan_kinerja` int(11) NOT NULL,
  `id_order_pegawai` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `laporan_kinerja_pegawai`
--

INSERT INTO `laporan_kinerja_pegawai` (`id_laporan_kinerja`, `id_order_pegawai`, `id_pegawai`, `deskripsi`) VALUES
(3, 14, 3, 'tidak becus'),
(4, 14, 3, 'tidak becus'),
(5, 14, 3, 'tidak ramah'),
(6, 15, 9, 'tidak membantu rekan kerja yang lain'),
(7, 21, 12, 'saya sangat pintar tidak ada masalah'),
(8, 23, 13, 'ez'),
(9, 26, 16, 'tidak mandi'),
(10, 28, 9, 'bekerja dengan baik dan giat'),
(11, 15, 7, 'tidak membantu rekan kerja yang lain'),
(12, 14, 3, 'tidak membantu rekan kerja yang lain'),
(13, 31, 11, 'kinerja kurang dalam melaksanakan tugas'),
(14, 34, 11, 'Kerjanya bagus dan teladan buat semuanya ya. Nanti ke depan dapat digunakan lagi. Test test'),
(15, 34, 11, 'Siap'),
(16, 34, 21, 'Kerjanya males-malesan. Dan nanti ke depan jangan dipakai lagi ya. Sepertinya tidak begitu bagus untuk masa depan kita.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_order_pegawai`
--

CREATE TABLE `log_order_pegawai` (
  `id_log_order` int(11) NOT NULL,
  `id_order_pegawai` int(11) NOT NULL,
  `id_mst_order_progress` int(11) NOT NULL,
  `isi_log_order` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `log_order_pegawai`
--

INSERT INTO `log_order_pegawai` (`id_log_order`, `id_order_pegawai`, `id_mst_order_progress`, `isi_log_order`) VALUES
(58, 14, 1, 'Order telah divalidasi'),
(59, 19, 2, 'Anggota TKBM telah dipilih'),
(60, 19, 2, 'tiket order dipending dikarenakan anggota tidak cukup'),
(61, 19, 3, 'ada hambatan ujan'),
(62, 19, 3, 'kurang tali'),
(63, 19, 3, '2 orang celaka'),
(64, 20, 1, 'Order telah divalidasi'),
(65, 21, 1, 'Order telah divalidasi'),
(66, 21, 2, 'Anggota TKBM telah dipilih'),
(67, 21, 3, 'anggota sedang melaksanakan persiapan'),
(68, 21, 4, 'anggota melakukan tugas '),
(69, 23, 3, 'lagi siap-siap'),
(70, 23, 4, 'sabar, otw'),
(71, 24, 2, 'Anggota telah dipilih'),
(72, 24, 3, 'tes'),
(73, 24, 4, 'Order telah divalidasi'),
(74, 25, 1, 'Order ditangguhkan karena keanggotaan kurang cukup'),
(75, 26, 1, 'Kerja keras bagai quda'),
(76, 26, 3, 'apa aja'),
(77, 26, 4, 'sedang tugas'),
(78, 27, 3, 'Anggota telah memulai tugas'),
(79, 28, 1, 'Order telah divalidasi'),
(80, 28, 5, 'pembayaran selesai'),
(81, 30, 1, 'Order pending karena petugas sedang tidak mencukupi\r\n'),
(82, 31, 1, 'order akan di lanjut, karena tenaga bongkar muat mencukupi'),
(83, 31, 2, 'anggota telah ditambahkan ke dalam order yang akan dikerjakan'),
(88, 31, 3, 'anggota sedang melakukan persiapan'),
(89, 31, 4, 'anggota sedang melaksanakan tugas\r\n'),
(90, 31, 4, 'tugas bongkar telah selesai, sekarang sedang melanjutkan tugas muat barang'),
(91, 31, 5, 'pembayaran telah dilakukan'),
(92, 32, 1, 'testing'),
(93, 34, 3, 'Tim sudah siap'),
(94, 34, 4, 'Kami sudah bekerja dengan sungguh-sungguh'),
(95, 35, 3, 'Persiapan sudah berlangsung dengan baik'),
(96, 35, 3, 'Persiapan masih ada kendala'),
(97, 35, 3, 'Persiapan sudah baik'),
(98, 35, 3, 'Persiapan sudah baik'),
(99, 35, 3, 'Mantaps'),
(100, 35, 3, 'Siap silakan dikerjakan'),
(101, 35, 3, 'Awas hati2 dikerjakan'),
(102, 35, 4, 'Mulai tugas'),
(103, 35, 4, 'Siap mulai tugas'),
(104, 35, 3, 'Test kok gitu yo?'),
(105, 35, 4, 'Siap pakbos'),
(106, 35, 5, 'asdfgh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matching_environment_result`
--

CREATE TABLE `matching_environment_result` (
  `id_matching_environment_result` bigint(20) NOT NULL,
  `id_pegawai` bigint(20) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `fit_value` double(8,2) NOT NULL,
  `acknowledge_individul_fit_label` varchar(250) NOT NULL,
  `acknowledge_individul_fit_grade` int(11) DEFAULT 0,
  `check` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `matching_jabatan_result`
--

CREATE TABLE `matching_jabatan_result` (
  `id_matching_jabatan_result` bigint(20) NOT NULL,
  `id_pegawai` bigint(20) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `fit_value` double(8,2) NOT NULL,
  `acknowledge_individul_fit_label` varchar(250) NOT NULL,
  `acknowledge_individul_fit_grade` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matching_jabatan_result`
--

INSERT INTO `matching_jabatan_result` (`id_matching_jabatan_result`, `id_pegawai`, `id_jabatan`, `fit_value`, `acknowledge_individul_fit_label`, `acknowledge_individul_fit_grade`) VALUES
(17, 44, 3, 79.71, 'Sangat Cocok / Sangat Tepat', 48),
(18, 48, 3, 71.18, 'Kurang Cocok / Kurang Tepat', 48),
(19, 56, 3, 82.65, 'Kurang Cocok / Kurang Tepat', 48),
(20, 58, 3, 80.29, 'Sangat Cocok / Sangat Tepat', 48),
(21, 61, 3, 82.94, 'Sangat Cocok / Sangat Tepat', 48),
(22, 65, 3, 82.94, 'Kurang Cocok / Kurang Tepat', 48),
(23, 37, 4, 71.33, 'Sangat Cocok / Sangat Tepat', 48),
(24, 38, 4, 80.67, 'Sangat Cocok / Sangat Tepat', 48),
(25, 40, 4, 84.00, 'Sangat Cocok / Sangat Tepat', 48);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matching_organization_result`
--

CREATE TABLE `matching_organization_result` (
  `id_matching_organization_result` bigint(20) NOT NULL,
  `id_pegawai` bigint(20) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `fit_value` double(8,2) NOT NULL,
  `acknowledge_individul_fit_label` varchar(250) NOT NULL,
  `acknowledge_individul_fit_grade` int(11) DEFAULT 0,
  `check` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matching_organization_result`
--

INSERT INTO `matching_organization_result` (`id_matching_organization_result`, `id_pegawai`, `id_perusahaan`, `fit_value`, `acknowledge_individul_fit_label`, `acknowledge_individul_fit_grade`, `check`) VALUES
(112, 27, 3, 81.51, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(113, 28, 3, 91.58, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(114, 29, 3, 90.38, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(115, 30, 3, 91.89, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(116, 31, 3, 80.02, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(117, 32, 3, 80.25, 'Kurang Cocok / Sesuai', 48, 'Tidak Wajar'),
(118, 33, 3, 77.17, 'Sangat Cocok / Sesuai', 48, 'Tidak Wajar'),
(119, 34, 3, 79.61, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(120, 35, 3, 76.68, 'Sangat Cocok / Sesuai', 48, 'Tidak Wajar'),
(121, 36, 3, 86.82, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(122, 41, 3, 69.91, 'Sangat Cocok / Sesuai', 48, 'Tidak Wajar'),
(123, 40, 3, 80.94, 'Kurang Cocok / Sesuai', 48, 'Tidak Wajar'),
(124, 37, 3, 80.82, 'Kurang Cocok / Sesuai', 48, 'Tidak Wajar'),
(125, 38, 3, 67.37, 'Kurang Cocok / Sesuai', 48, 'Wajar'),
(126, 39, 3, 80.79, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(127, 42, 3, 87.39, 'Kurang Cocok / Sesuai', 48, 'Tidak Wajar'),
(128, 43, 3, 80.71, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(129, 44, 3, 90.44, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(130, 45, 3, 79.42, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(131, 46, 3, 89.25, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(132, 48, 3, 81.04, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(133, 49, 3, 90.18, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(134, 50, 3, 79.78, 'Kurang Cocok / Sesuai', 48, 'Tidak Wajar'),
(135, 51, 3, 90.92, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(136, 52, 3, 88.48, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(137, 53, 3, 70.33, 'Kurang Cocok / Sesuai', 48, 'Wajar'),
(138, 54, 3, 89.26, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(139, 55, 3, 90.84, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(140, 56, 3, 89.41, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(141, 57, 3, 79.54, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(142, 58, 3, 90.88, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(143, 59, 3, 91.09, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(144, 60, 3, 80.98, 'Kurang Cocok / Sesuai', 48, 'Tidak Wajar'),
(145, 61, 3, 81.19, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(146, 62, 3, 91.93, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(147, 63, 3, 75.98, 'Kurang Cocok / Sesuai', 48, 'Wajar'),
(148, 64, 3, 90.17, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(149, 65, 3, 80.35, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(150, 66, 3, 88.30, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(151, 67, 3, 80.14, 'Kurang Cocok / Sesuai', 48, 'Tidak Wajar'),
(152, 68, 3, 77.31, 'Sangat Cocok / Sesuai', 48, 'Tidak Wajar'),
(153, 69, 3, 90.89, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(154, 71, 3, 79.73, 'Sangat Cocok / Sesuai', 48, 'Wajar'),
(155, 72, 3, 80.53, 'Sangat Cocok / Sesuai', 48, 'Wajar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `media_identity`
--

CREATE TABLE `media_identity` (
  `id_media_identity` int(11) NOT NULL,
  `media_name` varchar(200) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `media_identity`
--

INSERT INTO `media_identity` (`id_media_identity`, `media_name`, `icon`, `url`) VALUES
(1, 'Facebook', 'fa fa-facebook', 'http://www.facebook.com/'),
(2, 'Linkedin', 'fa fa-linkedin-square ', 'https://www.linkedin.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_link`
--

CREATE TABLE `menu_link` (
  `id_menu_link` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_name_lang1` varchar(50) DEFAULT NULL,
  `menu_name_lang2` varchar(50) DEFAULT NULL,
  `url` varchar(250) NOT NULL,
  `is_active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `menu_link`
--

INSERT INTO `menu_link` (`id_menu_link`, `menu_name`, `menu_name_lang1`, `menu_name_lang2`, `url`, `is_active`) VALUES
(1, 'Home', 'Home', 'Zuhause', 'index', 1),
(2, 'Tentang Kami', 'About Us', 'Über uns', 'company_profile', 1),
(6, 'Contact Us', 'Contact Us', 'Kontaktiere uns', 'Kontak Kami', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_environment_attribute`
--

CREATE TABLE `mst_environment_attribute` (
  `id_mst_environment_attribute` bigint(11) NOT NULL,
  `environment_attribute` varchar(250) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_environment_attribute`
--

INSERT INTO `mst_environment_attribute` (`id_mst_environment_attribute`, `environment_attribute`, `is_active`) VALUES
(1, 'jenis_kelamin', 1),
(2, 'usia', 1),
(3, 'status_perkawinan', 1),
(7, 'ditempatkan', 1),
(17, 'type_pekerjaan', 1),
(19, 'remote/onsite', 1),
(26, 'jenis_kepribadian', 1),
(30, 'kecocokan_diri_berinteraksi', 1),
(32, 'tipe_kepribadian', 1),
(33, 'kesesuaian_gaji', 1),
(35, 'kesesuaian_lokasi', 1),
(48, 'kesesuaian_kota', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_environment_attribute_grade`
--

CREATE TABLE `mst_environment_attribute_grade` (
  `id_mst_environment_attribute_grade` bigint(20) NOT NULL,
  `id_mst_environment_attribute` int(11) NOT NULL,
  `grade_label` varchar(250) NOT NULL,
  `grade_value` int(11) NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_environment_attribute_grade`
--

INSERT INTO `mst_environment_attribute_grade` (`id_mst_environment_attribute_grade`, `id_mst_environment_attribute`, `grade_label`, `grade_value`, `keterangan`) VALUES
(1, 1, 'PRIA', 1, NULL),
(2, 1, 'WANITA', 2, NULL),
(3, 2, '20-25 Tahun', 1, ''),
(4, 2, '26-30 Tahun', 2, ''),
(5, 2, '30-35 Tahun', 3, ''),
(6, 3, 'Belum Berkeluarga / Belum Menikah', 1, NULL),
(7, 3, 'Sudah Berkeluarga dan Belum Memiliki Anak', 3, NULL),
(8, 3, 'Sudah Berkeluarga dan Memiliki Anak', 3, NULL),
(30, 7, 'Kebanyakan waktu kerja ada di Kantor Pusat / Headquarter', 1, NULL),
(31, 7, 'Kebanyakan waktu kerja ada di Cabang', 2, NULL),
(79, 17, 'Indoor di dalam kantor / ruangan', 1, NULL),
(80, 17, 'Indoor tetapi dalam pabrik / ruang produksi', 2, NULL),
(81, 17, 'Outdoor (Banyak kerja di lapangan atau di luar kantor)', 3, NULL),
(82, 17, 'Mixed (Indoor dan Outdoor)', 4, NULL),
(86, 19, 'WFH - Work From Home - Bekerja dari rumah', 1, NULL),
(87, 19, 'WFO - Work From Office - Bekerja di kantor', 2, NULL),
(88, 19, 'Mixed (WFF dan WFO)', 3, NULL),
(102, 26, 'Sanguinis', 1, 'Orang dengan kepribadian sanguinis sering dikaitkan dengan sikap mereka yang suka bersosialisasi, berpetualang, mencari kesenangan juga tantangan.'),
(103, 26, 'Melankolis', 2, 'Orang dengan karakter yang cenderung privat, analitis, dan faktual dalam berkomunikasi. Seseorang dengan tipe ini membutuhkan informasi, waktu untuk berpikir dan rencana yang detail agar bisa berfungsi secara efektif.'),
(104, 26, 'Plegmatis', 3, 'Orang dengan tipe ini cenderung lebih relaks, tenang, dan bisa dibilang easy going. Mereka juga punya niat yang baik dalam hal simpati dan peduli dengan orang-orang sekitar. Tapi mereka cenderung menyembunyikan emosi dan mudah berkompromi'),
(105, 26, 'Koleris', 4, 'Orang yang mudah dilihat dari seseorang yang ambisius, kompetitif, dan fokus dengan tujuannya. Orang dengan kepribadian ini juga dikenal sebagai orang yang sangat tegas.'),
(112, 30, 'Judging', 1, 'Lebih menyukai membuat perencanaan, lebih teratur, sistematis, dan terjadwal'),
(113, 30, 'Perceiving', 2, 'Lebih suka menerima dan terbuka terhadap pilihan-pilihan baru. Lebih suka spontan dan fleksibel'),
(119, 32, 'Individu yang senang dengan lingkungan yang melibatkan kegiatan fisik, objektif, dan konkret', 1, NULL),
(120, 32, 'Individu yang senang dengan lingkungan kerja yang melibatkan akal, manipulasi ide, kata, serta simbol', 2, NULL),
(121, 32, 'Individu yang senang dengan lingkungan kerja yang berkaitan dengan seni, contoh memproduksi bentuk-bentuk seni.', 3, NULL),
(122, 32, 'Individu yang senang dengan lingkungan kerja yang berhubungan dengan orang lain', 4, NULL),
(123, 32, 'Individu yang senang dengan lingkungan yang mempengaruhi dan memberikan dukungan positif', 5, NULL),
(124, 32, 'Individu yang senang dengan lingkungan yang terorganisir dan terencana', 6, NULL),
(125, 33, 'Lebih suka gaji besar meskipun lokasi kantor jauh dari keluarga', 1, NULL),
(126, 33, 'Lebih memilih dekat dengan keluarga meskipun gaji tidak besar', 2, NULL),
(129, 35, 'Lebih suka berpetualang dan tidak masalah dipindahkan lokasi', 1, NULL),
(130, 35, 'Lebih suka stay atau memilih di kota yang sama dalam waktu yang lama', 2, NULL),
(155, 48, 'Lebih suka gaji besar meskipun tinggal di kota kecil atau daerah terpencil dan fasilitas terbatas', 1, NULL),
(156, 48, 'Lebih suka tinggal di kota besar atau kota yang memadai meskipun diberikan gaji yang lebih kecil', 2, NULL),
(160, 2, '36-40 Tahun', 4, ''),
(161, 2, '41-45 Tahun', 5, ''),
(162, 2, '46-50 Tahun', 6, ''),
(163, 2, '51-55', 7, ''),
(164, 2, '> 55 Tahun', 7, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_jabatan_attribute`
--

CREATE TABLE `mst_jabatan_attribute` (
  `id_mst_jabatan_attribute` bigint(11) NOT NULL,
  `jabatan_attribute` varchar(250) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_jabatan_attribute`
--

INSERT INTO `mst_jabatan_attribute` (`id_mst_jabatan_attribute`, `jabatan_attribute`, `is_active`) VALUES
(1, 'Jenis Kelamin', 1),
(2, 'usia', 1),
(3, 'status_perkawinan', 1),
(6, 'pendidikan_terakhir', 1),
(28, 'kecocokan_diri_mencari_informasi', 1),
(29, 'kecocokan_diri_mengambil_keputusan', 1),
(30, 'kecocokan_diri_berinteraksi', 1),
(31, 'kecocokan_kepribadian_diri', 1),
(32, 'tipe_kepribadian', 1),
(35, 'kesesuaian_lokasi', 1),
(36, 'kesesuaian_jamkantor', 1),
(37, 'kesesuaian_tugas', 1),
(38, 'kesesuaian_pekerjaan', 1),
(39, 'kesesuaian_penyelesaian_pekerjaan', 1),
(41, 'kesesuaian_keaktifan', 1),
(47, 'kesesuaian_lama_kontrak', 1),
(48, 'kesesuaian_kota', 1),
(52, 'kecocokan_diri', 1),
(53, 'jenis_kepribadian', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_jabatan_attribute_grade`
--

CREATE TABLE `mst_jabatan_attribute_grade` (
  `id_mst_jabatan_attribute_grade` bigint(20) NOT NULL,
  `id_mst_jabatan_attribute` int(11) NOT NULL,
  `grade_label` varchar(250) NOT NULL,
  `grade_value` int(11) NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_jabatan_attribute_grade`
--

INSERT INTO `mst_jabatan_attribute_grade` (`id_mst_jabatan_attribute_grade`, `id_mst_jabatan_attribute`, `grade_label`, `grade_value`, `keterangan`) VALUES
(1, 1, 'PRIA', 1, NULL),
(2, 1, 'WANITA', 2, NULL),
(3, 2, '20-25 Tahun', 1, ''),
(4, 2, '26-30 Tahun', 2, ''),
(5, 2, '30-35 Tahun', 3, ''),
(6, 3, 'Belum Berkeluarga / Belum Menikah', 1, NULL),
(7, 3, 'Sudah Berkeluarga dan Belum Memiliki Anak', 3, NULL),
(8, 3, 'Sudah Berkeluarga dan Memiliki Anak', 3, NULL),
(11, 4, 'CEO', 1, 'Chief Executive Officer'),
(12, 4, 'Founder', 1, ''),
(13, 4, 'COO', 2, 'Chief Operation Officer'),
(14, 4, 'CMO', 2, 'Chief Marketing Officer'),
(15, 4, 'CFO', 2, 'Chief Finance Officer'),
(16, 4, 'Direktur', 1, ''),
(17, 4, 'Pegawai Swasta', 4, ''),
(18, 4, 'PNS', 4, ''),
(19, 4, 'Kepala Divisi', 3, ''),
(20, 4, 'Programmer', 4, ''),
(21, 4, 'UI/UX Designer', 4, ''),
(22, 4, 'Data Scientist', 4, ''),
(23, 4, 'Business Analysis', 4, ''),
(24, 6, 'SMA', 1, 'Sekolah Menengah Atas'),
(25, 6, 'SMK', 1, 'Sekolah Menengah Kejuruan'),
(26, 6, 'Diploma', 2, NULL),
(27, 6, 'Sarjana ', 3, 'Strata 1'),
(28, 6, 'Magister', 4, NULL),
(29, 6, 'Program Doktor', 5, NULL),
(30, 7, 'Kebanyakan waktu kerja ada di Kantor Pusat / Headquarter', 1, NULL),
(31, 7, 'Kebanyakan waktu kerja ada di Cabang', 2, NULL),
(32, 9, 'Ya', 1, 'Sudah mengalami perpindahan jabatan di perusahaan tempat Anda bekerja'),
(33, 9, 'Tidak', 2, 'Belum pernah mengalami perpindahan jabatan di perusahaan tempat Anda bekerja'),
(34, 10, '<1 Tahun', 1, 'Kurang dari 1 tahun'),
(35, 10, '1-3 Tahun', 2, NULL),
(36, 10, '4-6 tahun', 3, ''),
(37, 10, '7-10 Tahun', 4, NULL),
(38, 10, '>10 Tahun', 5, 'Kurang dari 5 tahun'),
(41, 11, 'Sangat Cocok / Sangat Tepat', 1, 'Kemampuan, keterampilan, dan bakat saya sangat tepat untuk pekerjaan ini'),
(42, 11, 'Kurang Cocok / Kurang Tepat', 2, 'Kemampuan, keterampilan, dan bakat saya kurang tepat untuk pekerjaan ini'),
(43, 11, 'Kemampuan, keterampilan, dan bakat saya tidak tepat untuk pekerjaan ini', 3, 'Tidak Cocok / Tidak Tepat'),
(44, 12, 'Jabatan kurang sesuai', 1, NULL),
(45, 12, 'Kurang cocok dengan atasan', 2, NULL),
(46, 12, 'Kurang cocok dengan tim internal / rekan satu tim', 3, NULL),
(47, 12, 'Kurang cocok dengan bawahan (jika memiliki bawahan)', 4, NULL),
(48, 12, 'Jobdesc kurang jelas', 5, NULL),
(49, 12, 'Jobdesc ganti-ganti atau diubah-ubah', 6, NULL),
(50, 12, 'Beban Kerja Tinggi', 7, NULL),
(51, 12, 'Waktu kerja yang berlebihan (suka lembur)', 8, NULL),
(52, 12, 'Waktu kerja yang terlalu santai / terlalu banyak longgarnya', 9, NULL),
(53, 13, 'Sangat Cocok / Sesuai', 1, 'Sangat cocok dengan perusahaan tempat anda kerja saat ini'),
(54, 13, 'Kurang Cocok / Sesuai', 2, 'Kurang cocok dengan perusahaan tempat anda kerja saat ini'),
(55, 13, 'Tidak Cocok / Sesuai', 3, 'Tidak cocok dengan perusahaan tempat anda kerja saat ini'),
(56, 14, 'Gaji Kurang Sesuai', 1, NULL),
(57, 14, 'Jenjang Karir tidak jelas', 2, NULL),
(58, 14, 'Stagnan di posisi / jabatan sekarang', 3, NULL),
(59, 14, 'Kurangnya fasilitas yang diberikan (asuransi, kendaraan, dll)', 4, NULL),
(60, 14, 'Kurangnya penghargaan dari perusahaan', 5, NULL),
(61, 14, 'Kurang cocok dengan kontrak kerja yang diberikan', 6, NULL),
(62, 14, 'Kurang diberikan insentif, bonus, dll', 7, NULL),
(63, 14, 'Kurang cocok dengan filosofi perusahaan (budaya, core values, dll)', 8, NULL),
(64, 14, 'Terlalu kaku dengan aturan-aturan perusahaan', 9, NULL),
(65, 15, 'Sangat Cocok / Sesuai', 1, 'Sangat cocok dengan kota atau lingkungan tempat dimana anda bekerja saat ini'),
(66, 15, 'Kurang Cocok / Sesuai', 2, 'Kurang cocok dengan kota atau lingkungan tempat dimana anda bekerja saat ini'),
(67, 15, 'Tidak Cocok / Sesuai', 3, 'Tidak cocok dengan kota atau lingkungan tempat dimana anda bekerja saat ini'),
(68, 16, 'Jauh dari tempat tinggal (rumah/kost) saat ini', 1, NULL),
(69, 16, 'Jauh dari keluarga (jika anda tidak satu tempat dengan istri/anak)', 2, NULL),
(70, 16, 'Kurang cocok dengan kota tempat perusahaan berada', 3, NULL),
(71, 16, 'Kurang cocok dengan biaya hidup (terlalu mahal)', 4, NULL),
(72, 16, 'Kurang cocok dengan gaya hidup (style) di kota tersebut', 5, NULL),
(73, 16, 'Kurang cocok dengan kondisi cuaca di kota tersebut', 6, NULL),
(74, 16, 'Di kota tersebut kurang ada fasilitas pendidikan terutama untuk anak-anak', 7, NULL),
(75, 16, 'Di kota tersebut kurang ada fasilitas kesehatan', 8, NULL),
(76, 16, 'Di kota tersebut kurang ada fasilitas hiburan (mall, tempat wisata, cafe, rumah makan, dll)', 9, NULL),
(77, 16, 'Di kota tersebut sulit mengakses teknologi', 10, NULL),
(78, 16, 'Di kota tersebut sulit mendapatkan air bersih', 11, NULL),
(79, 17, 'Indoor di dalam kantor / ruangan', 1, NULL),
(80, 17, 'Indoor tetapi dalam pabrik / ruang produksi', 2, NULL),
(81, 17, 'Outdoor (Banyak kerja di lapangan atau di luar kantor)', 3, NULL),
(82, 17, 'Mixed (Indoor dan Outdoor)', 4, NULL),
(83, 18, 'Sangat Cocok dan bisa menikmati', 1, NULL),
(84, 18, 'Kurang cocok', 2, NULL),
(85, 18, 'Tidak cocok / Cenderung memilih kebalikannya', 3, NULL),
(86, 19, 'WFH - Work From Home - Bekerja dari rumah', 1, NULL),
(87, 19, 'WFO - Work From Office - Bekerja di kantor', 2, NULL),
(88, 19, 'Mixed (WFF dan WFO)', 3, NULL),
(89, 20, 'Cocok dan sangat menikmati', 1, NULL),
(90, 20, 'Kurang cocok', 2, NULL),
(91, 20, 'Tidak cocok dan lebih menyukai kondisi sebaliknya', 3, NULL),
(92, 21, 'Ya', 1, 'Saya merasa bahwa tujuan dan kebutuhan saya terpenuhi dalam pekerjaan ini'),
(93, 21, 'Tidak', 2, 'Saya tidak merasa bahwa tujuan dan kebutuhan saya terpenuhi dalam pekerjaan ini'),
(94, 22, 'Setuju', 1, 'Saya diizinkan untuk bekerja secara kreatif pada pekerjaan/jabatan saya saat ini'),
(95, 22, 'Tidak setuju', 2, 'Saya tidak diizinkan untuk bekerja secara kreatif pada pekerjaan/jabatan saya saat ini'),
(96, 23, 'Setuju', 1, 'Saya memiliki kendali atas hal-hal dalam pekerjaan saya saat ini'),
(97, 23, 'Tidak Setuju', 2, 'Saya tidak memiliki kendali atas hal-hal dalam pekerjaan saya saat ini'),
(98, 24, 'Setuju', 1, 'Merasa cocok dengan rekan kerja anda'),
(99, 24, 'Tidak Setuju', 2, 'Merasa tidak cocok dengan rekan kerja anda'),
(100, 25, 'Setuju', 1, 'Saya yakin ada pekerjaan lain yang lebih cocok untuk saya dari pada pekerjaan saya saat ini'),
(101, 25, 'Tidak Setuju', 2, 'Saya tidak yakin ada pekerjaan lain yang lebih cocok untuk saya dari pada pekerjaan saya saat ini'),
(102, 26, 'Sanguinis', 1, 'Orang dengan kepribadian sanguinis sering dikaitkan dengan sikap mereka yang suka bersosialisasi, berpetualang, mencari kesenangan juga tantangan.'),
(103, 26, 'Melankolis', 2, 'Orang dengan karakter yang cenderung privat, analitis, dan faktual dalam berkomunikasi. Seseorang dengan tipe ini membutuhkan informasi, waktu untuk berpikir dan rencana yang detail agar bisa berfungsi secara efektif.'),
(104, 26, 'Plegmatis', 3, 'Orang dengan tipe ini cenderung lebih relaks, tenang, dan bisa dibilang easy going. Mereka juga punya niat yang baik dalam hal simpati dan peduli dengan orang-orang sekitar. Tapi mereka cenderung menyembunyikan emosi dan mudah berkompromi'),
(105, 26, 'Koleris', 4, 'Orang yang mudah dilihat dari seseorang yang ambisius, kompetitif, dan fokus dengan tujuannya. Orang dengan kepribadian ini juga dikenal sebagai orang yang sangat tegas.'),
(106, 27, 'Ekstrovert', 1, 'Anda suka menghabiskan waktu bersama orang lain'),
(107, 27, 'Introvert', 2, 'Anda lebih suka menyendiri untuk memulihkan energi'),
(108, 28, 'Sensing', 1, 'Anda biasa mencari informasi melalui pengalaman atau apa yang anda rasakan (lewat pancaindera)'),
(109, 28, 'Intution', 2, 'Anda melihat sesuatu dari keterkaitan dan hubungan antara pola-pola yang ada. Anda lebih suka mengumpulkan ide-ide dan kemungkinan di masa depan.'),
(110, 29, 'Feeling', 1, 'Anda lebih suka mengambil keputusan berdasakan feel atau perasaan anda atau perasaan empati anda untuk menjaga harmoni dengan orang lain'),
(111, 29, 'Thinking', 2, 'Anda lebih suka mengambil keputusan berdasarkan logika dan analisa agar lebih obyektif'),
(112, 30, 'Judging', 1, 'Lebih menyukai membuat perencanaan, lebih teratur, sistematis, dan terjadwal'),
(113, 30, 'Perceiving', 2, 'Lebih suka menerima dan terbuka terhadap pilihan-pilihan baru. Lebih suka spontan dan fleksibel'),
(114, 31, 'Openness', 1, 'Dapat bertoleransi, fokus, dan mudah menyerap informasi'),
(115, 31, 'Extraversion', 2, 'Ambisius, tertantang, termotivasi, dan mudah bosan'),
(116, 31, 'Conscientiousness', 3, 'Bertanggung jawab, teratur, dapat diandalkan dan berhati-hati dalam bertindak '),
(117, 31, 'Neuroticism', 4, 'Mudah gugup, tegang, cemas dan sensitif '),
(118, 31, 'Agreeableness', 5, 'Ramah, dapat bekerja sama dan mudah percaya '),
(119, 32, 'Individu yang senang dengan lingkungan yang melibatkan kegiatan fisik, objektif, dan konkret', 1, NULL),
(120, 32, 'Individu yang senang dengan lingkungan kerja yang melibatkan akal, manipulasi ide, kata, serta simbol', 2, NULL),
(121, 32, 'Individu yang senang dengan lingkungan kerja yang berkaitan dengan seni, contoh memproduksi bentuk-bentuk seni.', 3, NULL),
(122, 32, 'Individu yang senang dengan lingkungan kerja yang berhubungan dengan orang lain', 4, NULL),
(123, 32, 'Individu yang senang dengan lingkungan yang mempengaruhi dan memberikan dukungan positif', 5, NULL),
(124, 32, 'Individu yang senang dengan lingkungan yang terorganisir dan terencana', 6, NULL),
(125, 33, 'Lebih suka gaji besar meskipun lokasi kantor jauh dari keluarga', 1, NULL),
(126, 33, 'Lebih memilih dekat dengan keluarga meskipun gaji tidak besar', 2, NULL),
(127, 34, 'Lebih suka jabatan tidak sesuai dengan preferensi pribadi asal gaji besar', 1, NULL),
(128, 34, 'Lebih memilih jabatan / pekerjaan yang sesuai dengan gaji kecil dibandingkan memilih jabatan yang tidak sesuai tetapi gaji besar', 2, NULL),
(129, 35, 'Lebih suka berpetualang dan tidak masalah dipindahkan lokasi', 1, NULL),
(130, 35, 'Lebih suka stay atau memilih di kota yang sama dalam waktu yang lama', 2, NULL),
(131, 36, 'Lebih suka bekerja dalam jam kantor (Misal jam 8 sampai jam 5)', 1, NULL),
(132, 36, 'Lebih suka bekerja tidak diatur dalam jam kantor dan bebas kapan saja mengerjakan (baik itu malam hari maupun pagi hari)', 2, NULL),
(133, 37, 'Lebih suka diberikan job desc / task / diberikan tugas dengan jelas setiap harinya', 1, NULL),
(134, 37, 'Lebih suka mencari atau memilih tugas atau penugasan yang sesuai dengan keinginan', 2, NULL),
(135, 38, 'Lebih suka jenis pekerjaan yang sama / rutinitas yang berulang', 1, NULL),
(136, 38, 'Lebih suka pekerjaan yang dinamis, berganti-ganti atau penuh tantangan. Misal beda proyek, beda tantangan, dsb', 2, NULL),
(137, 39, 'Lebih suka menyelesaikan pekerjaan sendiri dibandingkan harus dikerjakan bersama rekan kerja', 1, NULL),
(138, 39, 'Lebih suka menyelesaikan pekerjaan bareng dengan rekan kerja dibandingkan harus sendiri', 2, NULL),
(139, 40, 'Lebih suka mandiri atau mencari solusi dari internet dibandingkan bertanya ke rekan atau atasan', 1, NULL),
(140, 40, 'Lebih suka mencari solusi/jawaban dengan bertanya ke rekan kerja atau atasan\'', 2, NULL),
(141, 41, 'Lebih suka menunggu perintah dan akan bekerja jika ada perintah', 1, NULL),
(142, 41, 'Lebih suka proaktif dan mencari hal-hal untuk dikerjakan meskipun tidak ada perintah dari atasan atau rekan kerja', 2, NULL),
(143, 42, 'Lebih suka menunggu masukan dan melaksanakan masukan dari pihak lain', 1, NULL),
(144, 42, 'Lebih suka memberikan masukan kepada tim', 2, NULL),
(145, 43, 'Lebih suka dengan pekerjaan yang membutuhkan upgrading pengetahuan dan skill', 1, NULL),
(146, 43, 'Lebih suka dengan pekerjaan yang tidak banyak berubah (konstan) dan tidak banyak tuntutan perubahan (perubahan teknis, perubahan teknologi, dll)', 2, NULL),
(147, 44, 'Lebih senang bekerja agar mendapatkan penghargaan, pengakuan dari rekan kerja atau atasan', 1, NULL),
(148, 44, 'Lebih senang bekerja normal tanpa harus mengejar penghargaan dan pengakuan', 2, NULL),
(149, 45, 'Jenjang karir adalah hal yang penting meskipun naik karir tidak menjamin kenaikan gaji yang signifikan', 1, NULL),
(150, 45, 'Jenjang karir tidak terlalu penting, yang penting ada kejelasan kenaikan gaji dan kenaikan fasilitas yang diberikan perusahaan', 2, NULL),
(151, 46, 'Lebih suka belajar mandiri atau dari sumber-sumber pembelajaran online di internet', 1, NULL),
(152, 46, 'Lebih suka diajarin orang lain atau ikut seminar / pelatihan yang ada pembicara/pelatihnya', 2, NULL),
(153, 47, 'Lebih suka dengan kontrak jangka pendek agar bisa mencari tantangan baru', 1, NULL),
(154, 47, 'Lebih suka dengan kontrak jangka panjang dan kemapanan', 2, NULL),
(155, 48, 'Lebih suka gaji besar meskipun tinggal di kota kecil atau daerah terpencil dan fasilitas terbatas', 1, NULL),
(156, 48, 'Lebih suka tinggal di kota besar atau kota yang memadai meskipun diberikan gaji yang lebih kecil', 2, NULL),
(157, 8, 'PEKERJA MUDA (< 5 tahun)', 1, ''),
(158, 8, 'PEKERJA MIDLE (5-10 tahun)', 2, ''),
(159, 8, 'PEKERJA SENIOR (Masa Kerja > 10 tahun)', 3, ''),
(160, 2, '36-40 Tahun', 4, ''),
(161, 2, '41-45 Tahun', 5, ''),
(162, 2, '46-50 Tahun', 6, ''),
(163, 2, '51-55', 7, ''),
(164, 2, '> 55 Tahun', 7, ''),
(165, 4, 'SDM', 5, ''),
(166, 4, 'Staff', 5, ''),
(167, 4, 'Manager Cabang', 6, ''),
(168, 4, 'IT', 7, ''),
(169, 4, 'Editor & programmer', 8, ''),
(170, 4, 'Input Data', 9, ''),
(171, 4, 'Koordinator Lapangan', 5, ''),
(172, 4, 'Kasir', 10, ''),
(173, 4, 'Checker', 10, ''),
(174, 4, 'Petugas Lapangan', 9, ''),
(175, 4, 'Wakil Kepala Cabang', 9, ''),
(176, 4, 'Finance', 7, ''),
(177, 4, 'Kepala Divisi', 7, ''),
(178, 52, 'Ekstrovert', 2, ''),
(179, 52, 'Introvert', 1, ''),
(180, 53, 'Sanguinis', 1, ''),
(181, 53, 'Melankolis', 2, ''),
(182, 53, 'Plegmatis', 3, ''),
(183, 53, 'Koleris', 3, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_jenis_penyakit`
--

CREATE TABLE `mst_jenis_penyakit` (
  `id_mst_jenis_penyakit` int(11) NOT NULL,
  `jenis_penyakit` varchar(250) NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_jenis_penyakit`
--

INSERT INTO `mst_jenis_penyakit` (`id_mst_jenis_penyakit`, `jenis_penyakit`, `keterangan`) VALUES
(1, 'Jantung', NULL),
(2, 'Cancer', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_jenjang_pendidikan`
--

CREATE TABLE `mst_jenjang_pendidikan` (
  `id_mst_jenjang_pendidikan` int(11) NOT NULL,
  `jenjang_pendidikan` varchar(250) NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_jenjang_pendidikan`
--

INSERT INTO `mst_jenjang_pendidikan` (`id_mst_jenjang_pendidikan`, `jenjang_pendidikan`, `keterangan`) VALUES
(11, 'SD atau Sederajat', NULL),
(12, 'SMP/SLTP atau sederajat', NULL),
(13, 'SMA/SLTA/SMK atau sederejat', NULL),
(20, 'D1', NULL),
(21, 'D2', 'Diploma 2'),
(22, 'D3', 'Diploma 3'),
(23, 'S1', 'Strata 1'),
(24, 'S2', 'Strata 2'),
(25, 'S3', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_order_progres`
--

CREATE TABLE `mst_order_progres` (
  `id_mst_order_progres` int(11) NOT NULL,
  `order_progress` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_order_progres`
--

INSERT INTO `mst_order_progres` (`id_mst_order_progres`, `order_progress`) VALUES
(1, 'VALIDASI\r\n'),
(2, 'PILIH TKBM'),
(3, 'PERSIAPAN'),
(4, 'MULAI TUGAS'),
(5, 'SELESAI TUGAS'),
(6, 'TUTUP TIKET'),
(7, 'ORDER SELESAI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_organization_attribute`
--

CREATE TABLE `mst_organization_attribute` (
  `id_mst_organization_attribute` bigint(11) NOT NULL,
  `organization_attribute` varchar(250) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_organization_attribute`
--

INSERT INTO `mst_organization_attribute` (`id_mst_organization_attribute`, `organization_attribute`, `is_active`) VALUES
(1, 'Jenis Kelamin', 1),
(2, 'Usia', 1),
(3, 'Status Perkawinan', 1),
(6, 'Pendidikan Terakhir', 1),
(8, 'Pengalaman Bekerja', 1),
(17, 'Type pekerjaan', 1),
(19, 'Dapat Bekerja Secara WFO atau WFH', 1),
(21, 'Apakah visi dan misi yang terdapat pada perusahaan ini sesuai dengan Anda', 1),
(22, 'Bekerja Secara Kreatif', 1),
(26, 'Jenis Kepribadian Anda (Sanguinis/Plegmatis/Melankonis/Koleris', 1),
(27, 'Tipe Kepribadian (Introvert/Ekstrovert)', 1),
(28, 'Tipe Kepribadian Diri Dalam Mencari Informasi', 1),
(29, 'Tipe Kepribadian Diri Dalam Mengambil Keputusan', 1),
(30, 'Tipe Kepribadian Diri Dalam Berinteraksi', 1),
(31, 'Tipe Kecocokan Dengan Kepribadian Diri', 1),
(32, 'Tipe Kepribadian Anda', 1),
(33, 'Kesesuaian Gaji yang Diinginkan', 1),
(35, 'Bersedia ditempatkan diseluruh wilayah', 1),
(36, 'Jam Kerja yang Diinginkan', 1),
(39, 'Dapat Bekerja Secara Individu/Tim', 1),
(41, 'Kecocokan Terkait Keaktifan Bekerja', 1),
(47, 'Status Kerja', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_organization_attribute_grade`
--

CREATE TABLE `mst_organization_attribute_grade` (
  `id_mst_organization_attribute_grade` bigint(20) NOT NULL,
  `id_mst_organization_attribute` int(11) NOT NULL,
  `grade_label` varchar(250) NOT NULL,
  `grade_value` int(11) NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_organization_attribute_grade`
--

INSERT INTO `mst_organization_attribute_grade` (`id_mst_organization_attribute_grade`, `id_mst_organization_attribute`, `grade_label`, `grade_value`, `keterangan`) VALUES
(1, 1, 'PRIA', 1, NULL),
(2, 1, 'WANITA', 2, NULL),
(3, 2, '20-25 Tahun', 1, ''),
(4, 2, '26-30 Tahun', 2, ''),
(5, 2, '30-35 Tahun', 3, ''),
(6, 3, 'Belum Berkeluarga / Belum Menikah', 1, NULL),
(7, 3, 'Sudah Berkeluarga dan Belum Memiliki Anak', 3, NULL),
(8, 3, 'Sudah Berkeluarga dan Memiliki Anak', 3, NULL),
(24, 6, 'SMA', 1, 'Sekolah Menengah Atas'),
(25, 6, 'SMK', 1, 'Sekolah Menengah Kejuruan'),
(26, 6, 'Diploma', 2, NULL),
(27, 6, 'Sarjana ', 3, 'Strata 1'),
(28, 6, 'Magister', 4, NULL),
(29, 6, 'Program Doktor', 5, NULL),
(79, 17, 'Indoor di dalam kantor / ruangan', 1, NULL),
(80, 17, 'Indoor tetapi dalam pabrik / ruang produksi', 2, NULL),
(81, 17, 'Outdoor (Banyak kerja di lapangan atau di luar kantor)', 3, NULL),
(82, 17, 'Mixed (Indoor dan Outdoor)', 4, NULL),
(86, 19, 'WFH - Work From Home - Bekerja dari rumah', 1, NULL),
(87, 19, 'WFO - Work From Office - Bekerja di kantor', 2, NULL),
(88, 19, 'Mixed (WFF dan WFO)', 3, NULL),
(92, 21, 'Ya', 1, 'Saya merasa bahwa tujuan dan kebutuhan saya terpenuhi dalam pekerjaan ini'),
(93, 21, 'Tidak', 2, 'Saya tidak merasa bahwa tujuan dan kebutuhan saya terpenuhi dalam pekerjaan ini'),
(94, 22, 'Setuju', 1, 'Saya diizinkan untuk bekerja secara kreatif pada pekerjaan/jabatan saya saat ini'),
(95, 22, 'Tidak setuju', 2, 'Saya tidak diizinkan untuk bekerja secara kreatif pada pekerjaan/jabatan saya saat ini'),
(102, 26, 'Sanguinis', 1, 'Orang dengan kepribadian sanguinis sering dikaitkan dengan sikap mereka yang suka bersosialisasi, berpetualang, mencari kesenangan juga tantangan.'),
(103, 26, 'Melankolis', 2, 'Orang dengan karakter yang cenderung privat, analitis, dan faktual dalam berkomunikasi. Seseorang dengan tipe ini membutuhkan informasi, waktu untuk berpikir dan rencana yang detail agar bisa berfungsi secara efektif.'),
(104, 26, 'Plegmatis', 3, 'Orang dengan tipe ini cenderung lebih relaks, tenang, dan bisa dibilang easy going. Mereka juga punya niat yang baik dalam hal simpati dan peduli dengan orang-orang sekitar. Tapi mereka cenderung menyembunyikan emosi dan mudah berkompromi'),
(105, 26, 'Koleris', 4, 'Orang yang mudah dilihat dari seseorang yang ambisius, kompetitif, dan fokus dengan tujuannya. Orang dengan kepribadian ini juga dikenal sebagai orang yang sangat tegas.'),
(106, 27, 'Ekstrovert', 1, 'Anda suka menghabiskan waktu bersama orang lain'),
(107, 27, 'Introvert', 2, 'Anda lebih suka menyendiri untuk memulihkan energi'),
(108, 28, 'Sensing', 1, 'Anda biasa mencari informasi melalui pengalaman atau apa yang anda rasakan (lewat pancaindera)'),
(109, 28, 'Intution', 2, 'Anda melihat sesuatu dari keterkaitan dan hubungan antara pola-pola yang ada. Anda lebih suka mengumpulkan ide-ide dan kemungkinan di masa depan.'),
(110, 29, 'Feeling', 1, 'Anda lebih suka mengambil keputusan berdasakan feel atau perasaan anda atau perasaan empati anda untuk menjaga harmoni dengan orang lain'),
(111, 29, 'Thinking', 2, 'Anda lebih suka mengambil keputusan berdasarkan logika dan analisa agar lebih obyektif'),
(112, 30, 'Judging', 1, 'Lebih menyukai membuat perencanaan, lebih teratur, sistematis, dan terjadwal'),
(113, 30, 'Perceiving', 2, 'Lebih suka menerima dan terbuka terhadap pilihan-pilihan baru. Lebih suka spontan dan fleksibel'),
(114, 31, 'Openness', 1, 'Dapat bertoleransi, fokus, dan mudah menyerap informasi'),
(115, 31, 'Extraversion', 2, 'Ambisius, tertantang, termotivasi, dan mudah bosan'),
(116, 31, 'Conscientiousness', 3, 'Bertanggung jawab, teratur, dapat diandalkan dan berhati-hati dalam bertindak '),
(117, 31, 'Neuroticism', 4, 'Mudah gugup, tegang, cemas dan sensitif '),
(118, 31, 'Agreeableness', 5, 'Ramah, dapat bekerja sama dan mudah percaya '),
(119, 32, 'Individu yang senang dengan lingkungan yang melibatkan kegiatan fisik, objektif, dan konkret', 1, NULL),
(120, 32, 'Individu yang senang dengan lingkungan kerja yang melibatkan akal, manipulasi ide, kata, serta simbol', 2, NULL),
(121, 32, 'Individu yang senang dengan lingkungan kerja yang berkaitan dengan seni, contoh memproduksi bentuk-bentuk seni.', 3, NULL),
(122, 32, 'Individu yang senang dengan lingkungan kerja yang berhubungan dengan orang lain', 4, NULL),
(123, 32, 'Individu yang senang dengan lingkungan yang mempengaruhi dan memberikan dukungan positif', 5, NULL),
(124, 32, 'Individu yang senang dengan lingkungan yang terorganisir dan terencana', 6, NULL),
(125, 33, 'Lebih suka gaji besar meskipun lokasi kantor jauh dari keluarga', 1, NULL),
(126, 33, 'Lebih memilih dekat dengan keluarga meskipun gaji tidak besar', 2, NULL),
(129, 35, 'Ya', 1, 'Lebih suka berpetualang dan tidak masalah dipindahkan lokasi'),
(130, 35, 'Tidak', 2, 'Lebih suka stay atau memilih di kota yang sama dalam waktu yang lama'),
(131, 36, 'Lebih suka bekerja dalam jam kantor (Misal jam 8 sampai jam 5)', 1, NULL),
(132, 36, 'Lebih suka bekerja tidak diatur dalam jam kantor dan bebas kapan saja mengerjakan (baik itu malam hari maupun pagi hari)', 2, NULL),
(137, 39, 'Individu', 1, 'Lebih suka menyelesaikan pekerjaan sendiri dibandingkan harus dikerjakan bersama rekan kerja'),
(138, 39, 'Tim', 2, 'Lebih suka menyelesaikan pekerjaan bareng dengan rekan kerja dibandingkan harus sendiri'),
(141, 41, 'Lebih suka menunggu perintah dan akan bekerja jika ada perintah', 1, NULL),
(142, 41, 'Lebih suka proaktif dan mencari hal-hal untuk dikerjakan meskipun tidak ada perintah dari atasan atau rekan kerja', 2, NULL),
(153, 47, 'Lebih suka dengan kontrak jangka pendek agar bisa mencari tantangan baru', 1, NULL),
(154, 47, 'Lebih suka dengan kontrak jangka panjang dan kemapanan', 2, NULL),
(157, 8, 'PEKERJA MUDA (< 5 tahun)', 1, ''),
(158, 8, 'PEKERJA MIDLE (5-10 tahun)', 2, ''),
(159, 8, 'PEKERJA SENIOR (Masa Kerja > 10 tahun)', 3, ''),
(160, 2, '36-40 Tahun', 4, ''),
(161, 2, '41-45 Tahun', 5, ''),
(162, 2, '46-50 Tahun', 6, ''),
(163, 2, '51-55', 7, ''),
(164, 2, '> 55 Tahun', 7, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_personal_attribute`
--

CREATE TABLE `mst_personal_attribute` (
  `id_mst_personal_attribute` bigint(11) NOT NULL,
  `personal_attribute` varchar(250) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_personal_attribute`
--

INSERT INTO `mst_personal_attribute` (`id_mst_personal_attribute`, `personal_attribute`, `is_active`) VALUES
(1, 'jenis_kelamin', 1),
(2, 'usia', 1),
(3, 'status_perkawinan', 1),
(4, 'profesi/jabatan', 1),
(6, 'pendidikan_terakhir', 1),
(7, 'ditempatkan', 1),
(8, 'lama_bekerja', 1),
(9, 'perpindahan_jabatan', 1),
(10, 'lama_posisi', 1),
(11, 'kecocokan_jabatan', 1),
(12, 'alasan_kurangcocok_jabatan', 1),
(13, 'kecocokan_perusahaan', 1),
(14, 'alasan_kurangcocok_perusahaan', 1),
(15, 'kecocokan_lingkungan', 1),
(16, 'alasan_kurangcocok_lingkungan', 1),
(17, 'type_pekerjaan', 1),
(18, 'kecocokan_typepekerjaan', 1),
(19, 'remote/onsite', 1),
(20, 'kecocokan_carabekerja', 1),
(21, 'tujuan_dan_kebutuhan_pekerjaan', 1),
(22, 'bekerja_kreatif', 1),
(23, 'kendali_pekerjaan', 1),
(24, 'kecocokan_rekankerja', 1),
(25, 'kecocokan_pekerjaanlain', 1),
(26, 'jenis_kepribadian', 1),
(27, 'kecocokan_diri', 1),
(28, 'kecocokan_diri_mencari_informasi', 1),
(29, 'kecocokan_diri_mengambil_keputusan', 1),
(30, 'kecocokan_diri_berinteraksi', 1),
(31, 'kecocokan_kepribadian_diri', 1),
(32, 'tipe_kepribadian', 1),
(33, 'kesesuaian_gaji', 1),
(34, 'kesesuaian_jabatan', 1),
(35, 'kesesuaian_lokasi', 1),
(36, 'kesesuaian_jamkantor', 1),
(37, 'kesesuaian_tugas', 1),
(38, 'kesesuaian_pekerjaan', 1),
(39, 'kesesuaian_penyelesaian_pekerjaan', 1),
(40, 'kesesuaian_mencari_solusi', 1),
(41, 'kesesuaian_keaktifan', 1),
(42, 'kesesuaian_masukan', 1),
(43, 'kesesuaian_upgrading', 1),
(44, 'kesesuaian_penghargaan', 1),
(45, 'kesesuaian_jenjang_karir', 1),
(46, 'kesesuaian_belajar', 1),
(47, 'kesesuaian_lama_kontrak', 1),
(48, 'kesesuaian_kota', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_personal_attribute_grade`
--

CREATE TABLE `mst_personal_attribute_grade` (
  `id_mst_personal_attribute_grade` bigint(20) NOT NULL,
  `id_mst_personal_attribute` int(11) NOT NULL,
  `grade_label` varchar(250) NOT NULL,
  `grade_value` int(11) NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_personal_attribute_grade`
--

INSERT INTO `mst_personal_attribute_grade` (`id_mst_personal_attribute_grade`, `id_mst_personal_attribute`, `grade_label`, `grade_value`, `keterangan`) VALUES
(1, 1, 'PRIA', 1, NULL),
(2, 1, 'WANITA', 2, NULL),
(3, 2, '20-25 Tahun', 1, ''),
(4, 2, '26-30 Tahun', 2, ''),
(5, 2, '30-35 Tahun', 3, ''),
(6, 3, 'Belum Berkeluarga / Belum Menikah', 1, NULL),
(7, 3, 'Sudah Berkeluarga dan Belum Memiliki Anak', 3, NULL),
(8, 3, 'Sudah Berkeluarga dan Memiliki Anak', 3, NULL),
(11, 4, 'CEO', 1, 'Chief Executive Officer'),
(12, 4, 'Founder', 1, ''),
(13, 4, 'COO', 2, 'Chief Operation Officer'),
(14, 4, 'CMO', 2, 'Chief Marketing Officer'),
(15, 4, 'CFO', 2, 'Chief Finance Officer'),
(16, 4, 'Direktur', 1, ''),
(17, 4, 'Pegawai Swasta', 4, ''),
(18, 4, 'PNS', 4, ''),
(19, 4, 'Kepala Divisi', 3, ''),
(20, 4, 'Programmer', 4, ''),
(21, 4, 'UI/UX Designer', 4, ''),
(22, 4, 'Data Scientist', 4, ''),
(23, 4, 'Business Analysis', 4, ''),
(24, 6, 'SMA', 1, 'Sekolah Menengah Atas'),
(25, 6, 'SMK', 1, 'Sekolah Menengah Kejuruan'),
(26, 6, 'Diploma', 2, NULL),
(27, 6, 'Sarjana ', 3, 'Strata 1'),
(28, 6, 'Magister', 4, NULL),
(29, 6, 'Program Doktor', 5, NULL),
(30, 7, 'Kebanyakan waktu kerja ada di Kantor Pusat / Headquarter', 1, NULL),
(31, 7, 'Kebanyakan waktu kerja ada di Cabang', 2, NULL),
(32, 9, 'Ya', 1, 'Sudah mengalami perpindahan jabatan di perusahaan tempat Anda bekerja'),
(33, 9, 'Tidak', 2, 'Belum pernah mengalami perpindahan jabatan di perusahaan tempat Anda bekerja'),
(34, 10, '<1 Tahun', 1, 'Kurang dari 1 tahun'),
(35, 10, '1-3 Tahun', 2, NULL),
(36, 10, '4-6 tahun', 3, ''),
(37, 10, '7-10 Tahun', 4, NULL),
(38, 10, '>10 Tahun', 5, 'Kurang dari 5 tahun'),
(41, 11, 'Sangat Cocok / Sangat Tepat', 1, 'Kemampuan, keterampilan, dan bakat saya sangat tepat untuk pekerjaan ini'),
(42, 11, 'Kurang Cocok / Kurang Tepat', 2, 'Kemampuan, keterampilan, dan bakat saya kurang tepat untuk pekerjaan ini'),
(43, 11, 'Kemampuan, keterampilan, dan bakat saya tidak tepat untuk pekerjaan ini', 3, 'Tidak Cocok / Tidak Tepat'),
(44, 12, 'Jabatan kurang sesuai', 1, NULL),
(45, 12, 'Kurang cocok dengan atasan', 2, NULL),
(46, 12, 'Kurang cocok dengan tim internal / rekan satu tim', 3, NULL),
(47, 12, 'Kurang cocok dengan bawahan (jika memiliki bawahan)', 4, NULL),
(48, 12, 'Jobdesc kurang jelas', 5, NULL),
(49, 12, 'Jobdesc ganti-ganti atau diubah-ubah', 6, NULL),
(50, 12, 'Beban Kerja Tinggi', 7, NULL),
(51, 12, 'Waktu kerja yang berlebihan (suka lembur)', 8, NULL),
(52, 12, 'Waktu kerja yang terlalu santai / terlalu banyak longgarnya', 9, NULL),
(53, 13, 'Sangat Cocok / Sesuai', 1, 'Sangat cocok dengan perusahaan tempat anda kerja saat ini'),
(54, 13, 'Kurang Cocok / Sesuai', 2, 'Kurang cocok dengan perusahaan tempat anda kerja saat ini'),
(55, 13, 'Tidak Cocok / Sesuai', 3, 'Tidak cocok dengan perusahaan tempat anda kerja saat ini'),
(56, 14, 'Gaji Kurang Sesuai', 1, NULL),
(57, 14, 'Jenjang Karir tidak jelas', 2, NULL),
(58, 14, 'Stagnan di posisi / jabatan sekarang', 3, NULL),
(59, 14, 'Kurangnya fasilitas yang diberikan (asuransi, kendaraan, dll)', 4, NULL),
(60, 14, 'Kurangnya penghargaan dari perusahaan', 5, NULL),
(61, 14, 'Kurang cocok dengan kontrak kerja yang diberikan', 6, NULL),
(62, 14, 'Kurang diberikan insentif, bonus, dll', 7, NULL),
(63, 14, 'Kurang cocok dengan filosofi perusahaan (budaya, core values, dll)', 8, NULL),
(64, 14, 'Terlalu kaku dengan aturan-aturan perusahaan', 9, NULL),
(65, 15, 'Sangat Cocok / Sesuai', 1, 'Sangat cocok dengan kota atau lingkungan tempat dimana anda bekerja saat ini'),
(66, 15, 'Kurang Cocok / Sesuai', 2, 'Kurang cocok dengan kota atau lingkungan tempat dimana anda bekerja saat ini'),
(67, 15, 'Tidak Cocok / Sesuai', 3, 'Tidak cocok dengan kota atau lingkungan tempat dimana anda bekerja saat ini'),
(68, 16, 'Jauh dari tempat tinggal (rumah/kost) saat ini', 1, NULL),
(69, 16, 'Jauh dari keluarga (jika anda tidak satu tempat dengan istri/anak)', 2, NULL),
(70, 16, 'Kurang cocok dengan kota tempat perusahaan berada', 3, NULL),
(71, 16, 'Kurang cocok dengan biaya hidup (terlalu mahal)', 4, NULL),
(72, 16, 'Kurang cocok dengan gaya hidup (style) di kota tersebut', 5, NULL),
(73, 16, 'Kurang cocok dengan kondisi cuaca di kota tersebut', 6, NULL),
(74, 16, 'Di kota tersebut kurang ada fasilitas pendidikan terutama untuk anak-anak', 7, NULL),
(75, 16, 'Di kota tersebut kurang ada fasilitas kesehatan', 8, NULL),
(76, 16, 'Di kota tersebut kurang ada fasilitas hiburan (mall, tempat wisata, cafe, rumah makan, dll)', 9, NULL),
(77, 16, 'Di kota tersebut sulit mengakses teknologi', 10, NULL),
(78, 16, 'Di kota tersebut sulit mendapatkan air bersih', 11, NULL),
(79, 17, 'Indoor di dalam kantor / ruangan', 1, NULL),
(80, 17, 'Indoor tetapi dalam pabrik / ruang produksi', 2, NULL),
(81, 17, 'Outdoor (Banyak kerja di lapangan atau di luar kantor)', 3, NULL),
(82, 17, 'Mixed (Indoor dan Outdoor)', 4, NULL),
(83, 18, 'Sangat Cocok dan bisa menikmati', 1, NULL),
(84, 18, 'Kurang cocok', 2, NULL),
(85, 18, 'Tidak cocok / Cenderung memilih kebalikannya', 3, NULL),
(86, 19, 'WFH - Work From Home - Bekerja dari rumah', 1, NULL),
(87, 19, 'WFO - Work From Office - Bekerja di kantor', 2, NULL),
(88, 19, 'Mixed (WFF dan WFO)', 3, NULL),
(89, 20, 'Cocok dan sangat menikmati', 1, NULL),
(90, 20, 'Kurang cocok', 2, NULL),
(91, 20, 'Tidak cocok dan lebih menyukai kondisi sebaliknya', 3, NULL),
(92, 21, 'Ya', 1, 'Saya merasa bahwa tujuan dan kebutuhan saya terpenuhi dalam pekerjaan ini'),
(93, 21, 'Tidak', 2, 'Saya tidak merasa bahwa tujuan dan kebutuhan saya terpenuhi dalam pekerjaan ini'),
(94, 22, 'Setuju', 1, 'Saya diizinkan untuk bekerja secara kreatif pada pekerjaan/jabatan saya saat ini'),
(95, 22, 'Tidak setuju', 2, 'Saya tidak diizinkan untuk bekerja secara kreatif pada pekerjaan/jabatan saya saat ini'),
(96, 23, 'Setuju', 1, 'Saya memiliki kendali atas hal-hal dalam pekerjaan saya saat ini'),
(97, 23, 'Tidak Setuju', 2, 'Saya tidak memiliki kendali atas hal-hal dalam pekerjaan saya saat ini'),
(98, 24, 'Setuju', 1, 'Merasa cocok dengan rekan kerja anda'),
(99, 24, 'Tidak Setuju', 2, 'Merasa tidak cocok dengan rekan kerja anda'),
(100, 25, 'Setuju', 1, 'Saya yakin ada pekerjaan lain yang lebih cocok untuk saya dari pada pekerjaan saya saat ini'),
(101, 25, 'Tidak Setuju', 2, 'Saya tidak yakin ada pekerjaan lain yang lebih cocok untuk saya dari pada pekerjaan saya saat ini'),
(102, 26, 'Sanguinis', 1, 'Orang dengan kepribadian sanguinis sering dikaitkan dengan sikap mereka yang suka bersosialisasi, berpetualang, mencari kesenangan juga tantangan.'),
(103, 26, 'Melankolis', 2, 'Orang dengan karakter yang cenderung privat, analitis, dan faktual dalam berkomunikasi. Seseorang dengan tipe ini membutuhkan informasi, waktu untuk berpikir dan rencana yang detail agar bisa berfungsi secara efektif.'),
(104, 26, 'Plegmatis', 3, 'Orang dengan tipe ini cenderung lebih relaks, tenang, dan bisa dibilang easy going. Mereka juga punya niat yang baik dalam hal simpati dan peduli dengan orang-orang sekitar. Tapi mereka cenderung menyembunyikan emosi dan mudah berkompromi'),
(105, 26, 'Koleris', 4, 'Orang yang mudah dilihat dari seseorang yang ambisius, kompetitif, dan fokus dengan tujuannya. Orang dengan kepribadian ini juga dikenal sebagai orang yang sangat tegas.'),
(106, 27, 'Ekstrovert', 1, 'Anda suka menghabiskan waktu bersama orang lain'),
(107, 27, 'Introvert', 2, 'Anda lebih suka menyendiri untuk memulihkan energi'),
(108, 28, 'Sensing', 1, 'Anda biasa mencari informasi melalui pengalaman atau apa yang anda rasakan (lewat pancaindera)'),
(109, 28, 'Intution', 2, 'Anda melihat sesuatu dari keterkaitan dan hubungan antara pola-pola yang ada. Anda lebih suka mengumpulkan ide-ide dan kemungkinan di masa depan.'),
(110, 29, 'Feeling', 1, 'Anda lebih suka mengambil keputusan berdasakan feel atau perasaan anda atau perasaan empati anda untuk menjaga harmoni dengan orang lain'),
(111, 29, 'Thinking', 2, 'Anda lebih suka mengambil keputusan berdasarkan logika dan analisa agar lebih obyektif'),
(112, 30, 'Judging', 1, 'Lebih menyukai membuat perencanaan, lebih teratur, sistematis, dan terjadwal'),
(113, 30, 'Perceiving', 2, 'Lebih suka menerima dan terbuka terhadap pilihan-pilihan baru. Lebih suka spontan dan fleksibel'),
(114, 31, 'Openness', 1, 'Dapat bertoleransi, fokus, dan mudah menyerap informasi'),
(115, 31, 'Extraversion', 2, 'Ambisius, tertantang, termotivasi, dan mudah bosan'),
(116, 31, 'Conscientiousness', 3, 'Bertanggung jawab, teratur, dapat diandalkan dan berhati-hati dalam bertindak '),
(117, 31, 'Neuroticism', 4, 'Mudah gugup, tegang, cemas dan sensitif '),
(118, 31, 'Agreeableness', 5, 'Ramah, dapat bekerja sama dan mudah percaya '),
(119, 32, 'Individu yang senang dengan lingkungan yang melibatkan kegiatan fisik, objektif, dan konkret', 1, NULL),
(120, 32, 'Individu yang senang dengan lingkungan kerja yang melibatkan akal, manipulasi ide, kata, serta simbol', 2, NULL),
(121, 32, 'Individu yang senang dengan lingkungan kerja yang berkaitan dengan seni, contoh memproduksi bentuk-bentuk seni.', 3, NULL),
(122, 32, 'Individu yang senang dengan lingkungan kerja yang berhubungan dengan orang lain', 4, NULL),
(123, 32, 'Individu yang senang dengan lingkungan yang mempengaruhi dan memberikan dukungan positif', 5, NULL),
(124, 32, 'Individu yang senang dengan lingkungan yang terorganisir dan terencana', 6, NULL),
(125, 33, 'Lebih suka gaji besar meskipun lokasi kantor jauh dari keluarga', 1, NULL),
(126, 33, 'Lebih memilih dekat dengan keluarga meskipun gaji tidak besar', 2, NULL),
(127, 34, 'Lebih suka jabatan tidak sesuai dengan preferensi pribadi asal gaji besar', 1, NULL),
(128, 34, 'Lebih memilih jabatan / pekerjaan yang sesuai dengan gaji kecil dibandingkan memilih jabatan yang tidak sesuai tetapi gaji besar', 2, NULL),
(129, 35, 'Lebih suka berpetualang dan tidak masalah dipindahkan lokasi', 1, NULL),
(130, 35, 'Lebih suka stay atau memilih di kota yang sama dalam waktu yang lama', 2, NULL),
(131, 36, 'Lebih suka bekerja dalam jam kantor (Misal jam 8 sampai jam 5)', 1, NULL),
(132, 36, 'Lebih suka bekerja tidak diatur dalam jam kantor dan bebas kapan saja mengerjakan (baik itu malam hari maupun pagi hari)', 2, NULL),
(133, 37, 'Lebih suka diberikan job desc / task / diberikan tugas dengan jelas setiap harinya', 1, NULL),
(134, 37, 'Lebih suka mencari atau memilih tugas atau penugasan yang sesuai dengan keinginan', 2, NULL),
(135, 38, 'Lebih suka jenis pekerjaan yang sama / rutinitas yang berulang', 1, NULL),
(136, 38, 'Lebih suka pekerjaan yang dinamis, berganti-ganti atau penuh tantangan. Misal beda proyek, beda tantangan, dsb', 2, NULL),
(137, 39, 'Lebih suka menyelesaikan pekerjaan sendiri dibandingkan harus dikerjakan bersama rekan kerja', 1, NULL),
(138, 39, 'Lebih suka menyelesaikan pekerjaan bareng dengan rekan kerja dibandingkan harus sendiri', 2, NULL),
(139, 40, 'Lebih suka mandiri atau mencari solusi dari internet dibandingkan bertanya ke rekan atau atasan', 1, NULL),
(140, 40, 'Lebih suka mencari solusi/jawaban dengan bertanya ke rekan kerja atau atasan\'', 2, NULL),
(141, 41, 'Lebih suka menunggu perintah dan akan bekerja jika ada perintah', 1, NULL),
(142, 41, 'Lebih suka proaktif dan mencari hal-hal untuk dikerjakan meskipun tidak ada perintah dari atasan atau rekan kerja', 2, NULL),
(143, 42, 'Lebih suka menunggu masukan dan melaksanakan masukan dari pihak lain', 1, NULL),
(144, 42, 'Lebih suka memberikan masukan kepada tim', 2, NULL),
(145, 43, 'Lebih suka dengan pekerjaan yang membutuhkan upgrading pengetahuan dan skill', 1, NULL),
(146, 43, 'Lebih suka dengan pekerjaan yang tidak banyak berubah (konstan) dan tidak banyak tuntutan perubahan (perubahan teknis, perubahan teknologi, dll)', 2, NULL),
(147, 44, 'Lebih senang bekerja agar mendapatkan penghargaan, pengakuan dari rekan kerja atau atasan', 1, NULL),
(148, 44, 'Lebih senang bekerja normal tanpa harus mengejar penghargaan dan pengakuan', 2, NULL),
(149, 45, 'Jenjang karir adalah hal yang penting meskipun naik karir tidak menjamin kenaikan gaji yang signifikan', 1, NULL),
(150, 45, 'Jenjang karir tidak terlalu penting, yang penting ada kejelasan kenaikan gaji dan kenaikan fasilitas yang diberikan perusahaan', 2, NULL),
(151, 46, 'Lebih suka belajar mandiri atau dari sumber-sumber pembelajaran online di internet', 1, NULL),
(152, 46, 'Lebih suka diajarin orang lain atau ikut seminar / pelatihan yang ada pembicara/pelatihnya', 2, NULL),
(153, 47, 'Lebih suka dengan kontrak jangka pendek agar bisa mencari tantangan baru', 1, NULL),
(154, 47, 'Lebih suka dengan kontrak jangka panjang dan kemapanan', 2, NULL),
(155, 48, 'Lebih suka gaji besar meskipun tinggal di kota kecil atau daerah terpencil dan fasilitas terbatas', 1, NULL),
(156, 48, 'Lebih suka tinggal di kota besar atau kota yang memadai meskipun diberikan gaji yang lebih kecil', 2, NULL),
(157, 8, 'PEKERJA MUDA (< 5 tahun)', 1, ''),
(158, 8, 'PEKERJA MIDLE (5-10 tahun)', 2, ''),
(159, 8, 'PEKERJA SENIOR (Masa Kerja > 10 tahun)', 3, ''),
(160, 2, '36-40 Tahun', 4, ''),
(161, 2, '41-45 Tahun', 5, ''),
(162, 2, '46-50 Tahun', 6, ''),
(163, 2, '51-55', 7, ''),
(164, 2, '> 55 Tahun', 7, ''),
(165, 4, 'SDM', 5, ''),
(166, 4, 'Staff', 5, ''),
(167, 4, 'Manager Cabang', 6, ''),
(168, 4, 'IT', 7, ''),
(169, 4, 'Editor & programmer', 8, ''),
(170, 4, 'Input Data', 9, ''),
(171, 4, 'Koordinator Lapangan', 5, ''),
(172, 4, 'Kasir', 10, ''),
(173, 4, 'Checker', 10, ''),
(174, 4, 'Petugas Lapangan', 9, ''),
(175, 4, 'Wakil Kepala Cabang', 9, ''),
(176, 4, 'Finance', 7, ''),
(177, 4, 'Kepala Divisi', 7, ''),
(178, 4, 'Kepala Cabang', 7, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_tingkat_pendidikan`
--

CREATE TABLE `mst_tingkat_pendidikan` (
  `id_mst_tingkat_pendidikan` int(11) NOT NULL,
  `tingkat_pendidikan` varchar(250) NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_tingkat_pendidikan`
--

INSERT INTO `mst_tingkat_pendidikan` (`id_mst_tingkat_pendidikan`, `tingkat_pendidikan`, `keterangan`) VALUES
(11, 'SD atau Sederajat', NULL),
(12, 'SMP/SLTP atau sederajat', NULL),
(13, 'SMA/SLTA/SMK atau sederejat', NULL),
(20, 'D1', NULL),
(21, 'D2', 'Diploma 2'),
(22, 'D3', 'Diploma 3'),
(23, 'S1', 'Strata 1'),
(24, 'S2', 'Strata 2'),
(25, 'S3', 'Strata 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_pegawai`
--

CREATE TABLE `order_pegawai` (
  `id_order_pegawai` bigint(20) NOT NULL,
  `tanggal_order` date NOT NULL,
  `nomor_order` varchar(150) DEFAULT NULL,
  `nomor_order_inc` int(11) DEFAULT NULL,
  `id_order_pegawai_kategori` int(11) NOT NULL,
  `id_asset_kendaraan1` bigint(20) NOT NULL,
  `id_asset_kendaraan2` bigint(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_mst_order_progres` int(11) NOT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  `total_biaya` bigint(20) DEFAULT NULL,
  `status_pembayaran` set('BELUM','LUNAS') DEFAULT NULL,
  `status_order` set('OPEN','PENDING','CANCEL','FINISH') DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `bukti_pembayaran` varchar(250) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_id_user` int(11) DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_pegawai`
--

INSERT INTO `order_pegawai` (`id_order_pegawai`, `tanggal_order`, `nomor_order`, `nomor_order_inc`, `id_order_pegawai_kategori`, `id_asset_kendaraan1`, `id_asset_kendaraan2`, `jumlah`, `id_mst_order_progres`, `deskripsi`, `total_biaya`, `status_pembayaran`, `status_order`, `tanggal_pembayaran`, `bukti_pembayaran`, `created_date`, `created_id_user`, `created_ip_address`) VALUES
(14, '2022-08-28', 'MT14-2-10', 0, 2, 2, 10, 20, 7, 'Bermuatan semen', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(15, '2022-08-11', 'BK15-2-5', 0, 1, 2, 5, 20, 7, 'Bermuatan semen', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(16, '2022-08-11', 'BK16-3-5', 0, 1, 3, 5, 25, 7, 'TES BARU', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(17, '2022-08-17', 'MT17-2-5', 0, 2, 2, 5, 20, 7, 'TES BARU', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(18, '2022-08-17', 'BM18-2-5', 0, 3, 2, 5, 20, 7, 'TES BARU', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(20, '2022-09-07', 'BK20-11-5', 0, 1, 11, 5, 20, 7, 'muatan minyak mudah terbakar', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(23, '2022-09-30', 'BM23-2-5', 0, 3, 2, 5, 100, 7, 'muatan banteng', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(24, '2022-09-23', 'BK24-3-12', 0, 1, 3, 12, 25, 6, 'sedrfyghj', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(26, '2022-09-11', 'BK26-2-5', 0, 1, 2, 5, 11, 7, 'iii', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(27, '2022-09-08', 'BK27-2-10', 0, 1, 2, 10, 25, 6, 'Bermuatan semen', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(28, '2022-09-08', 'BK28-3-5', 0, 1, 3, 5, 28, 6, 'bongkar pupuk', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(31, '2022-09-16', 'BM31-11-10', 0, 3, 11, 10, 40, 7, 'Kapal bermuatan semen dan akan memuat semen', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(32, '2022-09-27', 'MT32-2-10', 0, 2, 2, 10, 20, 3, 'testing', NULL, 'BELUM', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(33, '2022-10-20', 'BK33-2-5', NULL, 1, 2, 5, 20, 3, '', NULL, 'BELUM', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(34, '2022-10-20', 'BK34-3-10', NULL, 1, 3, 10, 21, 7, '', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(35, '2022-11-25', 'BK35-2-5', NULL, 1, 4, 5, 20, 7, '', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(36, '2022-11-23', 'BK36-3-10', NULL, 1, 3, 10, 12, 3, '', NULL, 'BELUM', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(37, '2022-11-27', 'BM37-3-12', NULL, 3, 3, 12, 15, 2, '', NULL, 'BELUM', 'OPEN', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_pegawai_kategori`
--

CREATE TABLE `order_pegawai_kategori` (
  `id_order_pegawai_kategori` bigint(20) NOT NULL,
  `kategori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_pegawai_kategori`
--

INSERT INTO `order_pegawai_kategori` (`id_order_pegawai_kategori`, `kategori`) VALUES
(1, 'BONGKAR'),
(2, 'MUAT'),
(3, 'BONGKAR & MUAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_pegawai_list`
--

CREATE TABLE `order_pegawai_list` (
  `id_order_pegawai_list` bigint(20) NOT NULL,
  `id_order_pegawai` bigint(20) NOT NULL,
  `id_pegawai` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_pegawai_list`
--

INSERT INTO `order_pegawai_list` (`id_order_pegawai_list`, `id_order_pegawai`, `id_pegawai`) VALUES
(64, 14, 3),
(65, 14, 7),
(75, 15, 7),
(76, 15, 9),
(77, 16, 5),
(78, 17, 3),
(79, 17, 4),
(80, 18, 3),
(81, 18, 5),
(82, 19, 3),
(83, 19, 10),
(84, 20, 9),
(85, 21, 12),
(86, 23, 13),
(87, 24, 6),
(88, 24, 7),
(89, 24, 13),
(91, 25, 3),
(90, 25, 14),
(93, 26, 16),
(92, 26, 17),
(94, 27, 16),
(95, 27, 17),
(96, 28, 9),
(97, 28, 18),
(99, 31, 8),
(98, 31, 11),
(100, 31, 22),
(101, 31, 23),
(102, 32, 8),
(103, 32, 8),
(104, 33, 15),
(106, 34, 11),
(105, 34, 21),
(112, 35, 11),
(111, 35, 21),
(109, 35, 22),
(116, 36, 21),
(115, 36, 22),
(117, 37, 21),
(118, 37, 22),
(119, 37, 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` bigint(20) NOT NULL,
  `perusahaan` varchar(250) NOT NULL,
  `kode` varchar(30) DEFAULT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  `alamat_kontak` varchar(250) DEFAULT NULL,
  `telepon_kontak` varchar(250) DEFAULT NULL,
  `email_kontak` varchar(250) DEFAULT NULL,
  `active_status` int(1) NOT NULL DEFAULT 1,
  `created_date` datetime DEFAULT NULL,
  `created_id_user` int(11) DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `perusahaan`, `kode`, `deskripsi`, `alamat_kontak`, `telepon_kontak`, `email_kontak`, `active_status`, `created_date`, `created_id_user`, `created_ip_address`) VALUES
(3, 'Karya Usaha Mandiri', '', 'Menjadi Lembaga Keuangan yang meningkatkan kesejahteraan masyarakat miskin dan menengah bawah terutama wanita di wilayah Indonesia, berdasarkan prinsip-prinsip syariah', 'Jl. Raya Leuwiliang Km. 09 Desa Kolong I Kec. Leuwisadeng Kab. Bogor 16640', '+62 251 8681475', 'office@kumsyariah.com', 1, NULL, NULL, NULL),
(4, 'LAN', '', 'Lembaga Administrasi Negara ', 'Jl. Veteran No.10, Jakarta 10110', '021 3455024', 'humas@lan.go.id', 1, NULL, NULL, NULL),
(5, 'PT. WINN TEKNOLOGI NUSANTARA', '4b5-18d5', 'Winn Teknologi Nusantara', 'Infiniti Office, Arcade Business Center, Jl. Pantai Indah Utara 2 No.03, Kapuk Muara, Kec. Penjaringan, Jkt Utara, Daerah Khusus Ibukota Jakarta 14460', '0878-8788-1111', 'marketing@wintera.co.id', 1, NULL, NULL, NULL),
(6, 'DreamHouseLab', '566-b2dc', ' an emerging software firm in Jakarta producing world-class quality software for its clients since 2015', 'Jakarta', '08571-7540-988', 'dreamhouselab.com', 1, NULL, NULL, NULL),
(7, 'Perusahaan Swasta', '617-2543', 'Kumpulan perusahaan-perusahaan swasta', 'Bandung-Jakarta', '-', 'swasta@gmail.com', 1, NULL, NULL, NULL),
(8, 'Dinas Pemerintahan', '6w8-236d', 'Kumpulan perusahaan-perusahaan yang bekerja di pemerintahan', 'Pemerintah Indonesia', '-', 'pemerintah@gmail.com', 1, NULL, NULL, NULL),
(9, 'PT TDK ELECTRONICS INDONESIA', '7r9-ad26', 'TDK Electronics mengembangkan, memproduksi, dan memasarkan komponen dan sistem elektronik, dengan fokus pada pasar teknologi terdepan yang berkembang pesat.', 'Jalan EPCOS Jaya, Blok B1-10 Kawasan Industri Panbil Muka Kuning, Kabil, Kecamatan Nongsa, Pulau Batam, Kepulauan Riau 29433', '(0778) 4040100', 'tdk@gmail.com', 1, NULL, NULL, NULL),
(10, 'Infomedia', '8ma-e820', 'perusahaan penyedia jasa dibidang informasi', 'Jl. Terusan Buah Batu No.33', '(022) 87308860', 'infomedia@gmail.com', 1, NULL, NULL, NULL),
(11, 'Glints Indonesia', '9hb-2dca', 'Ekosistem talenta terdepan di kawasan Asia Tenggara', 'Sahid Sudirman Centre, Jl. Jenderal Sudirman No.10, RW.11, Karet Tengsin, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10250', '(021) 27936480', 'glints.com', 1, NULL, NULL, NULL),
(12, 'Rumah Sakit', 'acc-6710', 'Kumpulan perusahaan-perusahaan rumah sakit', '-', '-', '-', 1, NULL, NULL, NULL),
(13, 'PT. Teravin Technovations', 'b7d-af39', 'Indonesian company focusing on financial technology services', 'Jl. Cikini Raya No.9, RT.16/RW.1, Cikini, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10330', '(021) 39899259', 'prospects@teravintech.com', 1, NULL, NULL, NULL),
(14, 'AXA Mandiri Insurance', 'c2e-dc56', 'a French multinational insurance firm ', 'Jl. Soekarno Hatta No.486 ', '(022) 7506242', 'service@bhartiaxa.com', 1, NULL, NULL, NULL),
(15, 'Sagara Technology', 'cxf-2ff3', 'sebuah perusahaan teknologi asal Indonesia yang bergerak di bidang produksi dan pengembangan software', 'Summarecon Bandung, Magna Commercial No MA03 Summarecon Bandung, Rancabolang, Kec. Gedebage, Kota Bandung, Jawa Barat 40286', '0812-9253-8899', 'consult@sagara.asia', 1, NULL, NULL, NULL),
(16, 'Bintang Toejdo', 'dsg-7baf', 'Perusahaan Kesehatan Konsumen dan anak perusahaan dari PT Kalbe Farma', 'Jl. Jend. Ahmad Yani No. 2 Pulomas Jakarta 13210', '(021) 475 7777', '-', 1, NULL, NULL, NULL),
(17, 'MMS GROUP INDONESIA', 'enh-55fb', 'perusahaan energi berkelanjutan yang mempunyai 3 pilar bisnis utama yaitu MMS Resources, MMS Land dan MMS Solution ', 'TCC Batavia Tower One, Jl. K.H. Mas Mansyur No.126, Karet Tengsin, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10250', '(021) 29529473', 'info@mmsgroup.co.id', 1, NULL, NULL, NULL),
(18, 'PT Jasaraharja Putera', 'fii-6d23', 'Layanan asuransi yang luas kepada masyarakat', 'Jl. TB Simatupang Jl. Wisma Raharja No.Kav.1, RT.3/RW.1, Cilandak Tim., Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12560', '(021) 78844444', 'jasaraharja@gmail.com', 1, NULL, NULL, NULL),
(19, 'Skyshi Digital Indonesia', 'gdj-ffc4', 'Leading Software Engineers to Scale Up Your Tech Business', 'Jl. Tampomas Raya No.9, Mayaan, Trihanggo, Kec. Gamping, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55291', '(0274) 4547428', 'skyshi.com', 1, NULL, NULL, NULL),
(20, 'PT Integrasi Logistik Cipta Solusi', 'h8k-3b84', 'Perusahaan yang memberikan layanan informasi, pertukaran dokumen serta pembayaran elektronik ', 'Jalan Laksamana Yos Sudarso No.23 - 24, RT.16/RW.6, Kb. Bawang, Jakarta Utara, Jkt Utara, Daerah Khusus Ibukota Jakarta 14320', '(021) 80678250', '', 1, NULL, NULL, NULL),
(21, 'PT. Davel Surya Cipta', 'i3l-d079', 'Platform Live Interaction dengan pengalaman Social Networking 2.0', 'Jl. Muara No 116 RT 001/003 Kel. Tanjung Barat, Kec. Jagakarsa, Jakarta Selatan, 12530', '02122787382', 'halo@dinotis.com', 1, NULL, NULL, NULL),
(22, 'PrivyID', 'iym-0cb9', 'perusahaan Penyelenggara Sertifikat Elektronik Tersertifikasi dan Penyelenggara Tanda Tangan Elektronik yang didirikan di Jakarta pada tahun 2016.', 'Jl. Kemang Raya No.34, RT.12/RW.5, Bangka, Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12730', '(021) 22715509', 'assist@privy.id ', 1, NULL, NULL, NULL),
(23, 'PT. AMCo MultiTech', 'jtn-aacd', 'perusahaan general trading yang memiliki spesifikasi kerja sebagai penyedia barang kebutuhan industri yang dibutuhkan.', 'Jl. Bharata Raya No.16, Sukaharja, Telukjambe Timur, Karawang, Jawa Barat 41361', '081210307474', 'admin@amcomultitech.id', 1, NULL, NULL, NULL),
(201501, 'TELKOM', '', 'Penyedia Layanan Telekomunikasi', 'Jl. Supratman No.66A, Cihaur Geulis, Kec. Cibeunying Kaler, Kota Bandung, Jawa Barat 40122', '(022) 4532211', 'corporate_comm@telkom.co.id', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pro_environment_attribute`
--

CREATE TABLE `pro_environment_attribute` (
  `id_pro_environment_attribute` bigint(20) NOT NULL,
  `id_environment` bigint(20) NOT NULL,
  `id_mst_environment_attribute` bigint(20) NOT NULL,
  `id_mst_environment_attribute_grade` bigint(20) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_id_user` int(11) DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pro_jabatan_attribute`
--

CREATE TABLE `pro_jabatan_attribute` (
  `id_pro_jabatan_attribute` bigint(20) NOT NULL,
  `id_jabatan` bigint(20) NOT NULL,
  `id_mst_jabatan_attribute` bigint(20) NOT NULL,
  `id_mst_jabatan_attribute_grade` bigint(20) NOT NULL,
  `fitting_value` int(11) DEFAULT 0,
  `bobot_in_normalisasi` int(11) DEFAULT NULL,
  `bobot_in_persen` double(8,2) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_id_user` int(11) DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pro_jabatan_attribute`
--

INSERT INTO `pro_jabatan_attribute` (`id_pro_jabatan_attribute`, `id_jabatan`, `id_mst_jabatan_attribute`, `id_mst_jabatan_attribute_grade`, `fitting_value`, `bobot_in_normalisasi`, `bobot_in_persen`, `created_date`, `created_id_user`, `created_ip_address`) VALUES
(1, 1, 1, 1, 90, 1, NULL, NULL, NULL, NULL),
(2, 1, 2, 4, 30, 2, NULL, NULL, NULL, NULL),
(3, 1, 3, 6, 0, NULL, NULL, NULL, NULL, NULL),
(4, 1, 1, 2, 100, 1, NULL, NULL, NULL, NULL),
(5, 1, 2, 3, 20, 2, NULL, NULL, NULL, NULL),
(6, 1, 2, 5, 40, 2, NULL, NULL, NULL, NULL),
(7, 1, 2, 160, 50, 2, NULL, NULL, NULL, NULL),
(8, 1, 2, 161, 0, 2, NULL, NULL, NULL, NULL),
(9, 1, 2, 162, 0, 2, NULL, NULL, NULL, NULL),
(10, 1, 2, 163, 0, 2, NULL, NULL, NULL, NULL),
(11, 1, 2, 164, 0, 2, NULL, NULL, NULL, NULL),
(12, 1, 3, 7, 0, NULL, NULL, NULL, NULL, NULL),
(13, 1, 3, 8, 0, NULL, NULL, NULL, NULL, NULL),
(14, 1, 4, 11, 0, NULL, NULL, NULL, NULL, NULL),
(15, 1, 4, 12, 0, NULL, NULL, NULL, NULL, NULL),
(16, 1, 4, 13, 0, NULL, NULL, NULL, NULL, NULL),
(17, 1, 4, 14, 0, NULL, NULL, NULL, NULL, NULL),
(18, 1, 4, 15, 0, NULL, NULL, NULL, NULL, NULL),
(19, 1, 4, 16, 0, NULL, NULL, NULL, NULL, NULL),
(20, 1, 4, 17, 0, NULL, NULL, NULL, NULL, NULL),
(21, 1, 4, 18, 0, NULL, NULL, NULL, NULL, NULL),
(22, 1, 4, 19, 0, NULL, NULL, NULL, NULL, NULL),
(23, 1, 4, 20, 0, NULL, NULL, NULL, NULL, NULL),
(24, 1, 4, 21, 0, NULL, NULL, NULL, NULL, NULL),
(25, 1, 4, 22, 0, NULL, NULL, NULL, NULL, NULL),
(26, 1, 4, 23, 0, NULL, NULL, NULL, NULL, NULL),
(27, 1, 4, 165, 0, NULL, NULL, NULL, NULL, NULL),
(28, 1, 4, 166, 0, NULL, NULL, NULL, NULL, NULL),
(29, 1, 4, 167, 0, NULL, NULL, NULL, NULL, NULL),
(30, 1, 4, 168, 0, NULL, NULL, NULL, NULL, NULL),
(31, 1, 4, 169, 0, NULL, NULL, NULL, NULL, NULL),
(32, 1, 4, 170, 0, NULL, NULL, NULL, NULL, NULL),
(33, 1, 4, 171, 0, NULL, NULL, NULL, NULL, NULL),
(34, 1, 4, 172, 0, NULL, NULL, NULL, NULL, NULL),
(35, 1, 4, 173, 0, NULL, NULL, NULL, NULL, NULL),
(36, 1, 4, 174, 0, NULL, NULL, NULL, NULL, NULL),
(37, 1, 4, 175, 0, NULL, NULL, NULL, NULL, NULL),
(38, 1, 4, 176, 0, NULL, NULL, NULL, NULL, NULL),
(39, 1, 4, 177, 0, NULL, NULL, NULL, NULL, NULL),
(40, 1, 6, 24, 0, NULL, NULL, NULL, NULL, NULL),
(41, 1, 6, 25, 0, NULL, NULL, NULL, NULL, NULL),
(42, 1, 6, 26, 0, NULL, NULL, NULL, NULL, NULL),
(43, 1, 6, 27, 0, NULL, NULL, NULL, NULL, NULL),
(44, 1, 6, 28, 0, NULL, NULL, NULL, NULL, NULL),
(45, 1, 6, 29, 0, NULL, NULL, NULL, NULL, NULL),
(46, 1, 7, 30, 0, NULL, NULL, NULL, NULL, NULL),
(47, 1, 7, 31, 0, NULL, NULL, NULL, NULL, NULL),
(48, 1, 8, 157, 0, NULL, NULL, NULL, NULL, NULL),
(49, 1, 8, 158, 0, NULL, NULL, NULL, NULL, NULL),
(50, 1, 8, 159, 0, NULL, NULL, NULL, NULL, NULL),
(51, 1, 9, 32, 0, NULL, NULL, NULL, NULL, NULL),
(52, 1, 9, 33, 0, NULL, NULL, NULL, NULL, NULL),
(53, 1, 10, 34, 0, NULL, NULL, NULL, NULL, NULL),
(54, 1, 10, 35, 0, NULL, NULL, NULL, NULL, NULL),
(55, 1, 10, 36, 0, NULL, NULL, NULL, NULL, NULL),
(56, 1, 10, 37, 0, NULL, NULL, NULL, NULL, NULL),
(57, 1, 10, 38, 0, NULL, NULL, NULL, NULL, NULL),
(58, 1, 11, 41, 0, NULL, NULL, NULL, NULL, NULL),
(59, 1, 11, 42, 0, NULL, NULL, NULL, NULL, NULL),
(60, 1, 11, 43, 0, NULL, NULL, NULL, NULL, NULL),
(61, 1, 12, 44, 0, NULL, NULL, NULL, NULL, NULL),
(62, 1, 12, 45, 0, NULL, NULL, NULL, NULL, NULL),
(63, 1, 12, 46, 0, NULL, NULL, NULL, NULL, NULL),
(64, 1, 12, 47, 0, NULL, NULL, NULL, NULL, NULL),
(65, 1, 12, 48, 0, NULL, NULL, NULL, NULL, NULL),
(66, 1, 12, 49, 0, NULL, NULL, NULL, NULL, NULL),
(67, 1, 12, 50, 0, NULL, NULL, NULL, NULL, NULL),
(68, 1, 12, 51, 0, NULL, NULL, NULL, NULL, NULL),
(69, 1, 12, 52, 0, NULL, NULL, NULL, NULL, NULL),
(70, 1, 13, 53, 0, NULL, NULL, NULL, NULL, NULL),
(71, 1, 13, 54, 0, NULL, NULL, NULL, NULL, NULL),
(72, 1, 13, 55, 0, NULL, NULL, NULL, NULL, NULL),
(73, 1, 14, 56, 0, NULL, NULL, NULL, NULL, NULL),
(74, 1, 14, 57, 0, NULL, NULL, NULL, NULL, NULL),
(75, 1, 14, 58, 0, NULL, NULL, NULL, NULL, NULL),
(76, 1, 14, 59, 0, NULL, NULL, NULL, NULL, NULL),
(77, 1, 14, 60, 0, NULL, NULL, NULL, NULL, NULL),
(78, 1, 14, 61, 0, NULL, NULL, NULL, NULL, NULL),
(79, 1, 14, 62, 0, NULL, NULL, NULL, NULL, NULL),
(80, 1, 14, 63, 0, NULL, NULL, NULL, NULL, NULL),
(81, 1, 14, 64, 0, NULL, NULL, NULL, NULL, NULL),
(82, 1, 15, 65, 0, NULL, NULL, NULL, NULL, NULL),
(83, 1, 15, 66, 0, NULL, NULL, NULL, NULL, NULL),
(84, 1, 15, 67, 0, NULL, NULL, NULL, NULL, NULL),
(85, 1, 16, 68, 0, NULL, NULL, NULL, NULL, NULL),
(86, 1, 16, 69, 0, NULL, NULL, NULL, NULL, NULL),
(87, 1, 16, 70, 0, NULL, NULL, NULL, NULL, NULL),
(88, 1, 16, 71, 0, NULL, NULL, NULL, NULL, NULL),
(89, 1, 16, 72, 0, NULL, NULL, NULL, NULL, NULL),
(90, 1, 16, 73, 0, NULL, NULL, NULL, NULL, NULL),
(91, 1, 16, 74, 0, NULL, NULL, NULL, NULL, NULL),
(92, 1, 16, 75, 0, NULL, NULL, NULL, NULL, NULL),
(93, 1, 16, 76, 0, NULL, NULL, NULL, NULL, NULL),
(94, 1, 16, 77, 0, NULL, NULL, NULL, NULL, NULL),
(95, 1, 16, 78, 0, NULL, NULL, NULL, NULL, NULL),
(96, 1, 17, 79, 0, NULL, NULL, NULL, NULL, NULL),
(97, 1, 17, 80, 0, NULL, NULL, NULL, NULL, NULL),
(98, 1, 17, 81, 0, NULL, NULL, NULL, NULL, NULL),
(99, 1, 17, 82, 0, NULL, NULL, NULL, NULL, NULL),
(100, 1, 18, 83, 0, NULL, NULL, NULL, NULL, NULL),
(101, 1, 18, 84, 0, NULL, NULL, NULL, NULL, NULL),
(102, 1, 18, 85, 0, NULL, NULL, NULL, NULL, NULL),
(103, 1, 19, 86, 0, NULL, NULL, NULL, NULL, NULL),
(104, 1, 19, 87, 0, NULL, NULL, NULL, NULL, NULL),
(105, 1, 19, 88, 0, NULL, NULL, NULL, NULL, NULL),
(106, 1, 20, 89, 0, NULL, NULL, NULL, NULL, NULL),
(107, 1, 20, 90, 0, NULL, NULL, NULL, NULL, NULL),
(108, 1, 20, 91, 0, NULL, NULL, NULL, NULL, NULL),
(109, 1, 21, 92, 0, NULL, NULL, NULL, NULL, NULL),
(110, 1, 21, 93, 0, NULL, NULL, NULL, NULL, NULL),
(111, 1, 22, 94, 0, NULL, NULL, NULL, NULL, NULL),
(112, 1, 22, 95, 0, NULL, NULL, NULL, NULL, NULL),
(113, 1, 23, 96, 0, NULL, NULL, NULL, NULL, NULL),
(114, 1, 23, 97, 0, NULL, NULL, NULL, NULL, NULL),
(115, 1, 24, 98, 0, NULL, NULL, NULL, NULL, NULL),
(116, 1, 24, 99, 0, NULL, NULL, NULL, NULL, NULL),
(117, 1, 25, 100, 0, NULL, NULL, NULL, NULL, NULL),
(118, 1, 25, 101, 0, NULL, NULL, NULL, NULL, NULL),
(119, 1, 26, 102, 0, NULL, NULL, NULL, NULL, NULL),
(120, 1, 26, 103, 0, NULL, NULL, NULL, NULL, NULL),
(121, 1, 26, 104, 0, NULL, NULL, NULL, NULL, NULL),
(122, 1, 26, 105, 0, NULL, NULL, NULL, NULL, NULL),
(123, 1, 27, 106, 0, NULL, NULL, NULL, NULL, NULL),
(124, 1, 27, 107, 0, NULL, NULL, NULL, NULL, NULL),
(125, 1, 28, 108, 0, NULL, NULL, NULL, NULL, NULL),
(126, 1, 28, 109, 0, NULL, NULL, NULL, NULL, NULL),
(127, 1, 29, 110, 0, NULL, NULL, NULL, NULL, NULL),
(128, 1, 29, 111, 0, NULL, NULL, NULL, NULL, NULL),
(129, 1, 30, 112, 0, NULL, NULL, NULL, NULL, NULL),
(130, 1, 30, 113, 0, NULL, NULL, NULL, NULL, NULL),
(131, 1, 31, 114, 0, NULL, NULL, NULL, NULL, NULL),
(132, 1, 31, 115, 0, NULL, NULL, NULL, NULL, NULL),
(133, 1, 31, 116, 0, NULL, NULL, NULL, NULL, NULL),
(134, 1, 31, 117, 0, NULL, NULL, NULL, NULL, NULL),
(135, 1, 31, 118, 0, NULL, NULL, NULL, NULL, NULL),
(136, 1, 32, 119, 0, NULL, NULL, NULL, NULL, NULL),
(137, 1, 32, 120, 0, NULL, NULL, NULL, NULL, NULL),
(138, 1, 32, 121, 0, NULL, NULL, NULL, NULL, NULL),
(139, 1, 32, 122, 0, NULL, NULL, NULL, NULL, NULL),
(140, 1, 32, 123, 0, NULL, NULL, NULL, NULL, NULL),
(141, 1, 32, 124, 0, NULL, NULL, NULL, NULL, NULL),
(142, 1, 33, 125, 0, NULL, NULL, NULL, NULL, NULL),
(143, 1, 33, 126, 0, NULL, NULL, NULL, NULL, NULL),
(144, 1, 34, 127, 0, NULL, NULL, NULL, NULL, NULL),
(145, 1, 34, 128, 0, NULL, NULL, NULL, NULL, NULL),
(146, 1, 35, 129, 0, NULL, NULL, NULL, NULL, NULL),
(147, 1, 35, 130, 0, NULL, NULL, NULL, NULL, NULL),
(148, 1, 36, 131, 0, NULL, NULL, NULL, NULL, NULL),
(149, 1, 36, 132, 0, NULL, NULL, NULL, NULL, NULL),
(150, 1, 37, 133, 0, NULL, NULL, NULL, NULL, NULL),
(151, 1, 37, 134, 0, NULL, NULL, NULL, NULL, NULL),
(152, 1, 38, 135, 0, NULL, NULL, NULL, NULL, NULL),
(153, 1, 38, 136, 0, NULL, NULL, NULL, NULL, NULL),
(154, 1, 39, 137, 0, NULL, NULL, NULL, NULL, NULL),
(155, 1, 39, 138, 0, NULL, NULL, NULL, NULL, NULL),
(156, 1, 40, 139, 0, NULL, NULL, NULL, NULL, NULL),
(157, 1, 40, 140, 0, NULL, NULL, NULL, NULL, NULL),
(158, 1, 41, 141, 0, NULL, NULL, NULL, NULL, NULL),
(159, 1, 41, 142, 0, NULL, NULL, NULL, NULL, NULL),
(160, 1, 42, 143, 0, NULL, NULL, NULL, NULL, NULL),
(161, 1, 42, 144, 0, NULL, NULL, NULL, NULL, NULL),
(162, 1, 43, 145, 0, NULL, NULL, NULL, NULL, NULL),
(163, 1, 43, 146, 0, NULL, NULL, NULL, NULL, NULL),
(164, 1, 44, 147, 0, NULL, NULL, NULL, NULL, NULL),
(165, 1, 44, 148, 0, NULL, NULL, NULL, NULL, NULL),
(166, 1, 45, 149, 0, NULL, NULL, NULL, NULL, NULL),
(167, 1, 45, 150, 0, NULL, NULL, NULL, NULL, NULL),
(168, 1, 46, 151, 0, NULL, NULL, NULL, NULL, NULL),
(169, 1, 46, 152, 0, NULL, NULL, NULL, NULL, NULL),
(170, 1, 47, 153, 0, NULL, NULL, NULL, NULL, NULL),
(171, 1, 47, 154, 0, NULL, NULL, NULL, NULL, NULL),
(172, 1, 48, 155, 0, NULL, NULL, NULL, NULL, NULL),
(173, 1, 48, 156, 0, NULL, NULL, NULL, NULL, NULL),
(174, 3, 1, 1, 100, 1, NULL, NULL, NULL, NULL),
(175, 3, 1, 2, 100, 1, NULL, NULL, NULL, NULL),
(176, 3, 2, 3, 65, 1, NULL, NULL, NULL, NULL),
(177, 3, 2, 4, 75, 1, NULL, NULL, NULL, NULL),
(178, 3, 2, 5, 85, 1, NULL, NULL, NULL, NULL),
(179, 3, 2, 160, 90, 1, NULL, NULL, NULL, NULL),
(180, 3, 2, 161, 100, 1, NULL, NULL, NULL, NULL),
(181, 3, 2, 162, 100, 1, NULL, NULL, NULL, NULL),
(182, 3, 2, 163, 90, 1, NULL, NULL, NULL, NULL),
(183, 3, 2, 164, 85, 1, NULL, NULL, NULL, NULL),
(184, 3, 3, 6, 0, 0, NULL, NULL, NULL, NULL),
(185, 3, 3, 7, 0, 0, NULL, NULL, NULL, NULL),
(186, 3, 3, 8, 0, 0, NULL, NULL, NULL, NULL),
(187, 3, 6, 24, 0, 2, NULL, NULL, NULL, NULL),
(188, 3, 6, 25, 0, 2, NULL, NULL, NULL, NULL),
(189, 3, 6, 26, 80, 2, NULL, NULL, NULL, NULL),
(190, 3, 6, 27, 100, 2, NULL, NULL, NULL, NULL),
(191, 3, 6, 28, 100, 2, NULL, NULL, NULL, NULL),
(192, 3, 6, 29, 85, 2, NULL, NULL, NULL, NULL),
(193, 3, 7, 30, 0, 0, NULL, NULL, NULL, NULL),
(194, 3, 7, 31, 0, 0, NULL, NULL, NULL, NULL),
(195, 3, 28, 108, 70, 1, NULL, NULL, NULL, NULL),
(196, 3, 28, 109, 100, 1, NULL, NULL, NULL, NULL),
(197, 3, 29, 110, 60, 1, NULL, NULL, NULL, NULL),
(198, 3, 29, 111, 100, 1, NULL, NULL, NULL, NULL),
(199, 3, 30, 112, 100, 1, NULL, NULL, NULL, NULL),
(200, 3, 30, 113, 70, 1, NULL, NULL, NULL, NULL),
(201, 3, 31, 114, 70, 1, NULL, NULL, NULL, NULL),
(202, 3, 31, 115, 100, 1, NULL, NULL, NULL, NULL),
(203, 3, 31, 116, 80, 1, NULL, NULL, NULL, NULL),
(204, 3, 31, 117, 0, 1, NULL, NULL, NULL, NULL),
(205, 3, 31, 118, 70, 1, NULL, NULL, NULL, NULL),
(206, 3, 32, 119, 80, 1, NULL, NULL, NULL, NULL),
(207, 3, 32, 120, 80, 1, NULL, NULL, NULL, NULL),
(208, 3, 32, 121, 0, 1, NULL, NULL, NULL, NULL),
(209, 3, 32, 122, 90, 1, NULL, NULL, NULL, NULL),
(210, 3, 32, 123, 70, 1, NULL, NULL, NULL, NULL),
(211, 3, 32, 124, 100, 1, NULL, NULL, NULL, NULL),
(212, 3, 33, 125, 0, 0, NULL, NULL, NULL, NULL),
(213, 3, 33, 126, 0, 0, NULL, NULL, NULL, NULL),
(214, 3, 34, 127, 0, 0, NULL, NULL, NULL, NULL),
(215, 3, 34, 128, 0, 0, NULL, NULL, NULL, NULL),
(216, 3, 35, 129, 100, 1, NULL, NULL, NULL, NULL),
(217, 3, 35, 130, 70, 1, NULL, NULL, NULL, NULL),
(218, 3, 36, 131, 70, 1, NULL, NULL, NULL, NULL),
(219, 3, 36, 132, 100, 1, NULL, NULL, NULL, NULL),
(220, 3, 37, 133, 60, 1, NULL, NULL, NULL, NULL),
(221, 3, 37, 134, 100, 1, NULL, NULL, NULL, NULL),
(222, 3, 38, 135, 80, 1, NULL, NULL, NULL, NULL),
(223, 3, 38, 136, 100, 1, NULL, NULL, NULL, NULL),
(224, 3, 39, 137, 60, 1, NULL, NULL, NULL, NULL),
(225, 3, 39, 138, 100, 1, NULL, NULL, NULL, NULL),
(226, 3, 40, 139, 0, 0, NULL, NULL, NULL, NULL),
(227, 3, 40, 140, 0, 0, NULL, NULL, NULL, NULL),
(228, 3, 41, 141, 0, 1, NULL, NULL, NULL, NULL),
(229, 3, 41, 142, 100, 1, NULL, NULL, NULL, NULL),
(230, 3, 42, 143, 0, 0, NULL, NULL, NULL, NULL),
(231, 3, 42, 144, 0, 0, NULL, NULL, NULL, NULL),
(232, 3, 43, 145, 0, 0, NULL, NULL, NULL, NULL),
(233, 3, 43, 146, 0, 0, NULL, NULL, NULL, NULL),
(234, 3, 44, 147, 0, 0, NULL, NULL, NULL, NULL),
(235, 3, 44, 148, 0, 0, NULL, NULL, NULL, NULL),
(236, 3, 45, 149, 0, 0, NULL, NULL, NULL, NULL),
(237, 3, 45, 150, 0, 0, NULL, NULL, NULL, NULL),
(238, 3, 46, 151, 0, 0, NULL, NULL, NULL, NULL),
(239, 3, 46, 152, 0, 0, NULL, NULL, NULL, NULL),
(240, 3, 47, 153, 0, 0, NULL, NULL, NULL, NULL),
(241, 3, 47, 154, 0, 0, NULL, NULL, NULL, NULL),
(242, 3, 48, 155, 100, 2, NULL, NULL, NULL, NULL),
(243, 3, 48, 156, 60, 2, NULL, NULL, NULL, NULL),
(244, 3, 52, 178, 90, 1, NULL, NULL, NULL, NULL),
(245, 3, 52, 179, 70, 1, NULL, NULL, NULL, NULL),
(246, 3, 53, 180, 80, 1, NULL, NULL, NULL, NULL),
(247, 3, 53, 181, 70, 1, NULL, NULL, NULL, NULL),
(248, 3, 53, 182, 60, 1, NULL, NULL, NULL, NULL),
(249, 3, 53, 183, 100, 1, NULL, NULL, NULL, NULL),
(250, 4, 1, 1, 80, 1, NULL, NULL, NULL, NULL),
(251, 4, 1, 2, 100, 1, NULL, NULL, NULL, NULL),
(252, 4, 2, 3, 100, 2, NULL, NULL, NULL, NULL),
(253, 4, 2, 4, 90, 2, NULL, NULL, NULL, NULL),
(254, 4, 2, 5, 80, 2, NULL, NULL, NULL, NULL),
(255, 4, 2, 160, 80, 2, NULL, NULL, NULL, NULL),
(256, 4, 2, 161, 60, 2, NULL, NULL, NULL, NULL),
(257, 4, 2, 162, 60, 2, NULL, NULL, NULL, NULL),
(258, 4, 2, 163, 50, 2, NULL, NULL, NULL, NULL),
(259, 4, 2, 164, 0, 2, NULL, NULL, NULL, NULL),
(260, 4, 3, 6, 0, 0, NULL, NULL, NULL, NULL),
(261, 4, 3, 7, 0, 0, NULL, NULL, NULL, NULL),
(262, 4, 3, 8, 0, 0, NULL, NULL, NULL, NULL),
(263, 4, 6, 24, 80, 1, NULL, NULL, NULL, NULL),
(264, 4, 6, 25, 80, 1, NULL, NULL, NULL, NULL),
(265, 4, 6, 26, 90, 1, NULL, NULL, NULL, NULL),
(266, 4, 6, 27, 100, 1, NULL, NULL, NULL, NULL),
(267, 4, 6, 28, 70, 1, NULL, NULL, NULL, NULL),
(268, 4, 6, 29, 50, 1, NULL, NULL, NULL, NULL),
(269, 4, 28, 108, 70, 1, NULL, NULL, NULL, NULL),
(270, 4, 28, 109, 100, 1, NULL, NULL, NULL, NULL),
(271, 4, 29, 110, 80, 1, NULL, NULL, NULL, NULL),
(272, 4, 29, 111, 100, 1, NULL, NULL, NULL, NULL),
(273, 4, 30, 112, 100, 1, NULL, NULL, NULL, NULL),
(274, 4, 30, 113, 80, 1, NULL, NULL, NULL, NULL),
(275, 4, 31, 114, 90, 1, NULL, NULL, NULL, NULL),
(276, 4, 31, 115, 60, 1, NULL, NULL, NULL, NULL),
(277, 4, 31, 116, 100, 1, NULL, NULL, NULL, NULL),
(278, 4, 31, 117, 0, 1, NULL, NULL, NULL, NULL),
(279, 4, 31, 118, 70, 1, NULL, NULL, NULL, NULL),
(280, 4, 32, 119, 70, 2, NULL, NULL, NULL, NULL),
(281, 4, 32, 120, 100, 2, NULL, NULL, NULL, NULL),
(282, 4, 32, 121, 0, 2, NULL, NULL, NULL, NULL),
(283, 4, 32, 122, 70, 2, NULL, NULL, NULL, NULL),
(284, 4, 32, 123, 70, 2, NULL, NULL, NULL, NULL),
(285, 4, 32, 124, 90, 2, NULL, NULL, NULL, NULL),
(286, 4, 35, 129, 0, 0, NULL, NULL, NULL, NULL),
(287, 4, 35, 130, 0, 0, NULL, NULL, NULL, NULL),
(288, 4, 36, 131, 100, 1, NULL, NULL, NULL, NULL),
(289, 4, 36, 132, 0, 1, NULL, NULL, NULL, NULL),
(290, 4, 37, 133, 100, 1, NULL, NULL, NULL, NULL),
(291, 4, 37, 134, 70, 1, NULL, NULL, NULL, NULL),
(292, 4, 38, 135, 100, 1, NULL, NULL, NULL, NULL),
(293, 4, 38, 136, 70, 1, NULL, NULL, NULL, NULL),
(294, 4, 39, 137, 0, 0, NULL, NULL, NULL, NULL),
(295, 4, 39, 138, NULL, 0, NULL, NULL, NULL, NULL),
(296, 4, 41, 141, 100, 1, NULL, NULL, NULL, NULL),
(297, 4, 41, 142, 70, 1, NULL, NULL, NULL, NULL),
(298, 4, 47, 153, 0, 0, NULL, NULL, NULL, NULL),
(299, 4, 47, 154, 0, 0, NULL, NULL, NULL, NULL),
(300, 4, 48, 155, 100, 1, NULL, NULL, NULL, NULL),
(301, 4, 48, 156, 70, 1, NULL, NULL, NULL, NULL),
(302, 4, 52, 178, 0, 0, NULL, NULL, NULL, NULL),
(303, 4, 52, 179, 0, 0, NULL, NULL, NULL, NULL),
(304, 4, 53, 180, 70, 1, NULL, NULL, NULL, NULL),
(305, 4, 53, 181, 90, 1, NULL, NULL, NULL, NULL),
(306, 4, 53, 182, 80, 1, NULL, NULL, NULL, NULL),
(307, 4, 53, 183, 70, 1, NULL, NULL, NULL, NULL),
(308, 5, 1, 1, 70, 1, NULL, NULL, NULL, NULL),
(309, 5, 1, 2, 100, 1, NULL, NULL, NULL, NULL),
(310, 5, 2, 3, 100, 2, NULL, NULL, NULL, NULL),
(311, 5, 2, 4, 90, 2, NULL, NULL, NULL, NULL),
(312, 5, 2, 5, 80, 2, NULL, NULL, NULL, NULL),
(313, 5, 2, 160, 70, 2, NULL, NULL, NULL, NULL),
(314, 5, 2, 161, 60, 2, NULL, NULL, NULL, NULL),
(315, 5, 2, 162, 50, 2, NULL, NULL, NULL, NULL),
(316, 5, 2, 163, 40, 2, NULL, NULL, NULL, NULL),
(317, 5, 2, 164, 0, 2, NULL, NULL, NULL, NULL),
(318, 5, 3, 6, 0, 0, NULL, NULL, NULL, NULL),
(319, 5, 3, 7, 0, 0, NULL, NULL, NULL, NULL),
(320, 5, 3, 8, 0, 0, NULL, NULL, NULL, NULL),
(321, 5, 6, 24, 100, 2, NULL, NULL, NULL, NULL),
(322, 5, 6, 25, 100, 2, NULL, NULL, NULL, NULL),
(323, 5, 6, 26, 90, 2, NULL, NULL, NULL, NULL),
(324, 5, 6, 27, 70, 2, NULL, NULL, NULL, NULL),
(325, 5, 6, 28, 0, 2, NULL, NULL, NULL, NULL),
(326, 5, 6, 29, 0, 2, NULL, NULL, NULL, NULL),
(327, 5, 28, 108, 100, 1, NULL, NULL, NULL, NULL),
(328, 5, 28, 109, 80, 1, NULL, NULL, NULL, NULL),
(329, 5, 29, 110, 100, 1, NULL, NULL, NULL, NULL),
(330, 5, 29, 111, 70, 1, NULL, NULL, NULL, NULL),
(331, 5, 30, 112, 60, 1, NULL, NULL, NULL, NULL),
(332, 5, 30, 113, 100, 1, NULL, NULL, NULL, NULL),
(333, 5, 31, 114, 80, 1, NULL, NULL, NULL, NULL),
(334, 5, 31, 115, 70, 1, NULL, NULL, NULL, NULL),
(335, 5, 31, 116, 100, 1, NULL, NULL, NULL, NULL),
(336, 5, 31, 117, 0, 1, NULL, NULL, NULL, NULL),
(337, 5, 31, 118, 90, 1, NULL, NULL, NULL, NULL),
(338, 5, 32, 119, 70, 1, NULL, NULL, NULL, NULL),
(339, 5, 32, 120, 90, 1, NULL, NULL, NULL, NULL),
(340, 5, 32, 121, 0, 1, NULL, NULL, NULL, NULL),
(341, 5, 32, 122, 100, 1, NULL, NULL, NULL, NULL),
(342, 5, 32, 123, 80, 1, NULL, NULL, NULL, NULL),
(343, 5, 32, 124, 80, 1, NULL, NULL, NULL, NULL),
(344, 5, 35, 129, 100, 1, NULL, NULL, NULL, NULL),
(345, 5, 35, 130, 70, 1, NULL, NULL, NULL, NULL),
(346, 5, 36, 131, 100, 1, NULL, NULL, NULL, NULL),
(347, 5, 36, 132, 0, 1, NULL, NULL, NULL, NULL),
(348, 5, 37, 133, 100, 1, NULL, NULL, NULL, NULL),
(349, 5, 37, 134, 0, 1, NULL, NULL, NULL, NULL),
(350, 5, 38, 135, 100, 1, NULL, NULL, NULL, NULL),
(351, 5, 38, 136, 0, 1, NULL, NULL, NULL, NULL),
(352, 5, 39, 137, 100, 1, NULL, NULL, NULL, NULL),
(353, 5, 39, 138, 70, 1, NULL, NULL, NULL, NULL),
(354, 5, 41, 141, 100, 1, NULL, NULL, NULL, NULL),
(355, 5, 41, 142, 70, 1, NULL, NULL, NULL, NULL),
(356, 5, 47, 153, 0, 0, NULL, NULL, NULL, NULL),
(357, 5, 47, 154, 0, 0, NULL, NULL, NULL, NULL),
(358, 5, 48, 155, 0, 0, NULL, NULL, NULL, NULL),
(359, 5, 48, 156, 0, 0, NULL, NULL, NULL, NULL),
(360, 5, 52, 178, 0, 0, NULL, NULL, NULL, NULL),
(361, 5, 52, 179, 0, 0, NULL, NULL, NULL, NULL),
(362, 5, 53, 180, 100, 1, NULL, NULL, NULL, NULL),
(363, 5, 53, 181, 90, 1, NULL, NULL, NULL, NULL),
(364, 5, 53, 182, 80, 1, NULL, NULL, NULL, NULL),
(365, 5, 53, 183, 70, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pro_organization_attribute`
--

CREATE TABLE `pro_organization_attribute` (
  `id_pro_organization_attribute` bigint(20) NOT NULL,
  `id_organization` bigint(20) NOT NULL,
  `id_mst_organization_attribute` bigint(20) NOT NULL,
  `id_mst_organization_attribute_grade` bigint(20) NOT NULL,
  `fitting_value` int(11) DEFAULT 0,
  `bobot_in_normalisasi` double(8,2) DEFAULT NULL,
  `bobot_in_persen` double(8,2) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_id_user` int(11) DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pro_organization_attribute`
--

INSERT INTO `pro_organization_attribute` (`id_pro_organization_attribute`, `id_organization`, `id_mst_organization_attribute`, `id_mst_organization_attribute_grade`, `fitting_value`, `bobot_in_normalisasi`, `bobot_in_persen`, `created_date`, `created_id_user`, `created_ip_address`) VALUES
(1, 1, 1, 0, 0, 0.00, NULL, NULL, NULL, NULL),
(2, 1, 2, 0, 0, NULL, NULL, NULL, NULL, NULL),
(3, 1, 3, 0, 0, NULL, NULL, NULL, NULL, NULL),
(4, 1, 6, 0, 0, NULL, NULL, NULL, NULL, NULL),
(5, 1, 8, 0, 0, NULL, NULL, NULL, NULL, NULL),
(6, 1, 10, 0, 0, NULL, NULL, NULL, NULL, NULL),
(7, 1, 17, 0, 0, NULL, NULL, NULL, NULL, NULL),
(8, 1, 19, 0, 0, NULL, NULL, NULL, NULL, NULL),
(9, 1, 21, 0, 0, NULL, NULL, NULL, NULL, NULL),
(10, 1, 22, 0, 0, NULL, NULL, NULL, NULL, NULL),
(11, 1, 26, 0, 0, NULL, NULL, NULL, NULL, NULL),
(12, 1, 27, 0, 0, NULL, NULL, NULL, NULL, NULL),
(13, 1, 28, 0, 0, NULL, NULL, NULL, NULL, NULL),
(14, 1, 29, 0, 0, NULL, NULL, NULL, NULL, NULL),
(15, 1, 30, 0, 0, NULL, NULL, NULL, NULL, NULL),
(16, 1, 31, 0, 0, NULL, NULL, NULL, NULL, NULL),
(17, 1, 32, 0, 0, NULL, NULL, NULL, NULL, NULL),
(18, 1, 33, 0, 0, NULL, NULL, NULL, NULL, NULL),
(19, 1, 35, 0, 0, NULL, NULL, NULL, NULL, NULL),
(20, 1, 36, 0, 0, NULL, NULL, NULL, NULL, NULL),
(21, 1, 39, 0, 0, NULL, NULL, NULL, NULL, NULL),
(22, 1, 41, 0, 0, NULL, NULL, NULL, NULL, NULL),
(23, 1, 47, 0, 0, NULL, NULL, NULL, NULL, NULL),
(24, 1, 1, 1, 100, 0.00, NULL, NULL, NULL, NULL),
(25, 1, 1, 2, 100, 0.00, NULL, NULL, NULL, NULL),
(26, 1, 2, 3, 0, 1.00, NULL, NULL, NULL, NULL),
(27, 1, 2, 4, 0, 1.00, NULL, NULL, NULL, NULL),
(28, 1, 2, 5, 0, 1.00, NULL, NULL, NULL, NULL),
(29, 1, 2, 160, 0, 1.00, NULL, NULL, NULL, NULL),
(30, 1, 2, 161, 0, 1.00, NULL, NULL, NULL, NULL),
(31, 1, 2, 162, 0, 1.00, NULL, NULL, NULL, NULL),
(32, 1, 2, 163, 0, 1.00, NULL, NULL, NULL, NULL),
(33, 1, 2, 164, 0, 1.00, NULL, NULL, NULL, NULL),
(34, 1, 3, 6, 0, NULL, NULL, NULL, NULL, NULL),
(35, 1, 3, 7, 0, NULL, NULL, NULL, NULL, NULL),
(36, 1, 3, 8, 0, NULL, NULL, NULL, NULL, NULL),
(37, 1, 6, 24, 0, NULL, NULL, NULL, NULL, NULL),
(38, 1, 6, 25, 0, NULL, NULL, NULL, NULL, NULL),
(39, 1, 6, 26, 0, NULL, NULL, NULL, NULL, NULL),
(40, 1, 6, 27, 0, NULL, NULL, NULL, NULL, NULL),
(41, 1, 6, 28, 0, NULL, NULL, NULL, NULL, NULL),
(42, 1, 6, 29, 0, NULL, NULL, NULL, NULL, NULL),
(43, 1, 8, 157, 0, NULL, NULL, NULL, NULL, NULL),
(44, 1, 8, 158, 0, NULL, NULL, NULL, NULL, NULL),
(45, 1, 8, 159, 0, NULL, NULL, NULL, NULL, NULL),
(46, 1, 10, 34, 0, NULL, NULL, NULL, NULL, NULL),
(47, 1, 10, 35, 0, NULL, NULL, NULL, NULL, NULL),
(48, 1, 10, 36, 0, NULL, NULL, NULL, NULL, NULL),
(49, 1, 10, 37, 0, NULL, NULL, NULL, NULL, NULL),
(50, 1, 10, 38, 0, NULL, NULL, NULL, NULL, NULL),
(51, 1, 17, 79, 0, NULL, NULL, NULL, NULL, NULL),
(52, 1, 17, 80, 0, NULL, NULL, NULL, NULL, NULL),
(53, 1, 17, 81, 0, NULL, NULL, NULL, NULL, NULL),
(54, 1, 17, 82, 0, NULL, NULL, NULL, NULL, NULL),
(55, 1, 19, 86, 0, NULL, NULL, NULL, NULL, NULL),
(56, 1, 19, 87, 0, NULL, NULL, NULL, NULL, NULL),
(57, 1, 19, 88, 0, NULL, NULL, NULL, NULL, NULL),
(58, 1, 21, 92, 0, NULL, NULL, NULL, NULL, NULL),
(59, 1, 21, 93, 0, NULL, NULL, NULL, NULL, NULL),
(60, 1, 22, 94, 0, NULL, NULL, NULL, NULL, NULL),
(61, 1, 22, 95, 0, NULL, NULL, NULL, NULL, NULL),
(62, 1, 26, 102, 0, NULL, NULL, NULL, NULL, NULL),
(63, 1, 26, 103, 0, NULL, NULL, NULL, NULL, NULL),
(64, 1, 26, 104, 0, NULL, NULL, NULL, NULL, NULL),
(65, 1, 26, 105, 0, NULL, NULL, NULL, NULL, NULL),
(66, 1, 27, 106, 0, NULL, NULL, NULL, NULL, NULL),
(67, 1, 27, 107, 0, NULL, NULL, NULL, NULL, NULL),
(68, 1, 28, 108, 0, NULL, NULL, NULL, NULL, NULL),
(69, 1, 28, 109, 0, NULL, NULL, NULL, NULL, NULL),
(70, 1, 29, 110, 0, NULL, NULL, NULL, NULL, NULL),
(71, 1, 29, 111, 0, NULL, NULL, NULL, NULL, NULL),
(72, 1, 30, 112, 0, NULL, NULL, NULL, NULL, NULL),
(73, 1, 30, 113, 0, NULL, NULL, NULL, NULL, NULL),
(74, 1, 31, 114, 0, NULL, NULL, NULL, NULL, NULL),
(75, 1, 31, 115, 0, NULL, NULL, NULL, NULL, NULL),
(76, 1, 31, 116, 0, NULL, NULL, NULL, NULL, NULL),
(77, 1, 31, 117, 0, NULL, NULL, NULL, NULL, NULL),
(78, 1, 31, 118, 0, NULL, NULL, NULL, NULL, NULL),
(79, 1, 32, 119, 0, NULL, NULL, NULL, NULL, NULL),
(80, 1, 32, 120, 0, NULL, NULL, NULL, NULL, NULL),
(81, 1, 32, 121, 0, NULL, NULL, NULL, NULL, NULL),
(82, 1, 32, 122, 0, NULL, NULL, NULL, NULL, NULL),
(83, 1, 32, 123, 0, NULL, NULL, NULL, NULL, NULL),
(84, 1, 32, 124, 0, NULL, NULL, NULL, NULL, NULL),
(85, 1, 33, 125, 0, NULL, NULL, NULL, NULL, NULL),
(86, 1, 33, 126, 0, NULL, NULL, NULL, NULL, NULL),
(87, 1, 35, 129, 0, NULL, NULL, NULL, NULL, NULL),
(88, 1, 35, 130, 0, NULL, NULL, NULL, NULL, NULL),
(89, 1, 36, 131, 0, NULL, NULL, NULL, NULL, NULL),
(90, 1, 36, 132, 0, NULL, NULL, NULL, NULL, NULL),
(91, 1, 39, 137, 0, NULL, NULL, NULL, NULL, NULL),
(92, 1, 39, 138, 0, NULL, NULL, NULL, NULL, NULL),
(93, 1, 41, 141, 0, NULL, NULL, NULL, NULL, NULL),
(94, 1, 41, 142, 0, NULL, NULL, NULL, NULL, NULL),
(95, 1, 47, 153, 0, NULL, NULL, NULL, NULL, NULL),
(96, 1, 47, 154, 0, NULL, NULL, NULL, NULL, NULL),
(97, 3, 1, 1, 100, 0.00, NULL, NULL, NULL, NULL),
(98, 3, 1, 2, 100, 0.00, NULL, NULL, NULL, NULL),
(99, 3, 2, 3, 100, 0.25, NULL, NULL, NULL, NULL),
(100, 3, 2, 4, 90, 0.25, NULL, NULL, NULL, NULL),
(101, 3, 2, 5, 89, 0.25, NULL, NULL, NULL, NULL),
(102, 3, 2, 160, 80, 0.25, NULL, NULL, NULL, NULL),
(103, 3, 2, 161, 75, 0.25, NULL, NULL, NULL, NULL),
(104, 3, 2, 162, 60, 0.25, NULL, NULL, NULL, NULL),
(105, 3, 2, 163, 65, 0.25, NULL, NULL, NULL, NULL),
(106, 3, 2, 164, 60, 0.25, NULL, NULL, NULL, NULL),
(107, 3, 3, 6, 100, 0.67, NULL, NULL, NULL, NULL),
(108, 3, 3, 7, 97, 0.67, NULL, NULL, NULL, NULL),
(109, 3, 3, 8, 95, 0.67, NULL, NULL, NULL, NULL),
(110, 3, 6, 24, 89, 0.67, NULL, NULL, NULL, NULL),
(111, 3, 6, 25, 91, 0.67, NULL, NULL, NULL, NULL),
(112, 3, 6, 26, 94, 0.67, NULL, NULL, NULL, NULL),
(113, 3, 6, 27, 100, 0.67, NULL, NULL, NULL, NULL),
(114, 3, 6, 28, 100, 0.67, NULL, NULL, NULL, NULL),
(115, 3, 6, 29, 0, 0.67, NULL, NULL, NULL, NULL),
(116, 3, 8, 157, 82, 0.67, NULL, NULL, NULL, NULL),
(117, 3, 8, 158, 92, 0.67, NULL, NULL, NULL, NULL),
(118, 3, 8, 159, 100, 0.67, NULL, NULL, NULL, NULL),
(119, 3, 10, 34, 0, 0.00, NULL, NULL, NULL, NULL),
(120, 3, 10, 35, 0, 0.00, NULL, NULL, NULL, NULL),
(121, 3, 10, 36, 0, 0.00, NULL, NULL, NULL, NULL),
(122, 3, 10, 37, 0, 0.00, NULL, NULL, NULL, NULL),
(123, 3, 10, 38, 0, 0.00, NULL, NULL, NULL, NULL),
(124, 3, 17, 79, 98, 0.50, NULL, NULL, NULL, NULL),
(125, 3, 17, 80, 0, 0.50, NULL, NULL, NULL, NULL),
(126, 3, 17, 81, 100, 0.50, NULL, NULL, NULL, NULL),
(127, 3, 17, 82, 100, 0.50, NULL, NULL, NULL, NULL),
(128, 3, 19, 86, 20, 1.00, NULL, NULL, NULL, NULL),
(129, 3, 19, 87, 99, 1.00, NULL, NULL, NULL, NULL),
(130, 3, 19, 88, 89, 1.00, NULL, NULL, NULL, NULL),
(131, 3, 21, 92, 100, 2.50, NULL, NULL, NULL, NULL),
(132, 3, 21, 93, 20, 2.50, NULL, NULL, NULL, NULL),
(133, 3, 22, 94, 80, 1.00, NULL, NULL, NULL, NULL),
(134, 3, 22, 95, 55, 1.00, NULL, NULL, NULL, NULL),
(135, 3, 26, 102, 92, 0.75, NULL, NULL, NULL, NULL),
(136, 3, 26, 103, 84, 0.75, NULL, NULL, NULL, NULL),
(137, 3, 26, 104, 69, 0.75, NULL, NULL, NULL, NULL),
(138, 3, 26, 105, 97, 0.75, NULL, NULL, NULL, NULL),
(139, 3, 27, 106, 100, 2.00, NULL, NULL, NULL, NULL),
(140, 3, 27, 107, 82, 2.00, NULL, NULL, NULL, NULL),
(141, 3, 28, 108, 89, 1.00, NULL, NULL, NULL, NULL),
(142, 3, 28, 109, 100, 1.00, NULL, NULL, NULL, NULL),
(143, 3, 29, 110, 96, 1.00, NULL, NULL, NULL, NULL),
(144, 3, 29, 111, 89, 1.00, NULL, NULL, NULL, NULL),
(145, 3, 30, 112, 78, 2.50, NULL, NULL, NULL, NULL),
(146, 3, 30, 113, 89, 2.50, NULL, NULL, NULL, NULL),
(147, 3, 31, 114, 95, 0.20, NULL, NULL, NULL, NULL),
(148, 3, 31, 115, 88, 0.20, NULL, NULL, NULL, NULL),
(149, 3, 31, 116, 95, 0.20, NULL, NULL, NULL, NULL),
(150, 3, 31, 117, 86, 0.20, NULL, NULL, NULL, NULL),
(151, 3, 31, 118, 75, 0.20, NULL, NULL, NULL, NULL),
(152, 3, 32, 119, 99, 0.33, NULL, NULL, NULL, NULL),
(153, 3, 32, 120, 93, 0.33, NULL, NULL, NULL, NULL),
(154, 3, 32, 121, 55, 0.33, NULL, NULL, NULL, NULL),
(155, 3, 32, 122, 97, 0.33, NULL, NULL, NULL, NULL),
(156, 3, 32, 123, 82, 0.33, NULL, NULL, NULL, NULL),
(157, 3, 32, 124, 98, 0.33, NULL, NULL, NULL, NULL),
(158, 3, 33, 125, 99, 1.00, NULL, NULL, NULL, NULL),
(159, 3, 33, 126, 82, 1.00, NULL, NULL, NULL, NULL),
(160, 3, 35, 129, 100, 2.00, NULL, NULL, NULL, NULL),
(161, 3, 35, 130, 0, 2.00, NULL, NULL, NULL, NULL),
(162, 3, 36, 131, 100, 1.00, NULL, NULL, NULL, NULL),
(163, 3, 36, 132, 80, 1.00, NULL, NULL, NULL, NULL),
(164, 3, 39, 137, 70, 1.00, NULL, NULL, NULL, NULL),
(165, 3, 39, 138, 100, 1.00, NULL, NULL, NULL, NULL),
(166, 3, 41, 141, 81, 1.50, NULL, NULL, NULL, NULL),
(167, 3, 41, 142, 100, 1.50, NULL, NULL, NULL, NULL),
(168, 3, 47, 153, 85, 0.50, NULL, NULL, NULL, NULL),
(169, 3, 47, 154, 100, 0.50, NULL, NULL, NULL, NULL),
(170, 201501, 1, 1, 80, 1.00, NULL, NULL, NULL, NULL),
(171, 201501, 1, 2, 70, 1.00, NULL, NULL, NULL, NULL),
(172, 201501, 2, 3, 80, 2.00, NULL, NULL, NULL, NULL),
(173, 201501, 2, 4, 90, 2.00, NULL, NULL, NULL, NULL),
(174, 201501, 2, 5, 100, 2.00, NULL, NULL, NULL, NULL),
(175, 201501, 2, 160, 100, 2.00, NULL, NULL, NULL, NULL),
(176, 201501, 2, 161, 90, 2.00, NULL, NULL, NULL, NULL),
(177, 201501, 2, 162, 80, 2.00, NULL, NULL, NULL, NULL),
(178, 201501, 2, 163, 70, 2.00, NULL, NULL, NULL, NULL),
(179, 201501, 2, 164, 50, 2.00, NULL, NULL, NULL, NULL),
(180, 201501, 3, 6, 100, 2.00, NULL, NULL, NULL, NULL),
(181, 201501, 3, 7, 90, 2.00, NULL, NULL, NULL, NULL),
(182, 201501, 3, 8, 90, 2.00, NULL, NULL, NULL, NULL),
(183, 201501, 6, 24, 40, 1.00, NULL, NULL, NULL, NULL),
(184, 201501, 6, 25, 20, 1.00, NULL, NULL, NULL, NULL),
(185, 201501, 6, 26, 90, 1.00, NULL, NULL, NULL, NULL),
(186, 201501, 6, 27, 100, 1.00, NULL, NULL, NULL, NULL),
(187, 201501, 6, 28, 100, 1.00, NULL, NULL, NULL, NULL),
(188, 201501, 6, 29, 100, 1.00, NULL, NULL, NULL, NULL),
(189, 201501, 8, 157, 80, 1.00, NULL, NULL, NULL, NULL),
(190, 201501, 8, 158, 90, 1.00, NULL, NULL, NULL, NULL),
(191, 201501, 8, 159, 100, 1.00, NULL, NULL, NULL, NULL),
(192, 201501, 10, 34, 0, 0.00, NULL, NULL, NULL, NULL),
(193, 201501, 10, 35, 0, 0.00, NULL, NULL, NULL, NULL),
(194, 201501, 10, 36, 0, 0.00, NULL, NULL, NULL, NULL),
(195, 201501, 10, 37, 0, 0.00, NULL, NULL, NULL, NULL),
(196, 201501, 10, 38, 0, 0.00, NULL, NULL, NULL, NULL),
(197, 201501, 17, 79, 0, 0.00, NULL, NULL, NULL, NULL),
(198, 201501, 17, 80, 0, 0.00, NULL, NULL, NULL, NULL),
(199, 201501, 17, 81, 0, 0.00, NULL, NULL, NULL, NULL),
(200, 201501, 17, 82, 0, 0.00, NULL, NULL, NULL, NULL),
(201, 201501, 19, 86, 60, 1.00, NULL, NULL, NULL, NULL),
(202, 201501, 19, 87, 90, 1.00, NULL, NULL, NULL, NULL),
(203, 201501, 19, 88, 100, 1.00, NULL, NULL, NULL, NULL),
(204, 201501, 21, 92, 100, 1.00, NULL, NULL, NULL, NULL),
(205, 201501, 21, 93, 0, 1.00, NULL, NULL, NULL, NULL),
(206, 201501, 22, 94, 100, 1.00, NULL, NULL, NULL, NULL),
(207, 201501, 22, 95, 90, 1.00, NULL, NULL, NULL, NULL),
(208, 201501, 26, 102, 80, 1.00, NULL, NULL, NULL, NULL),
(209, 201501, 26, 103, 90, 1.00, NULL, NULL, NULL, NULL),
(210, 201501, 26, 104, 70, 1.00, NULL, NULL, NULL, NULL),
(211, 201501, 26, 105, 80, 1.00, NULL, NULL, NULL, NULL),
(212, 201501, 27, 106, 100, 1.00, NULL, NULL, NULL, NULL),
(213, 201501, 27, 107, 90, 1.00, NULL, NULL, NULL, NULL),
(214, 201501, 28, 108, 0, 0.00, NULL, NULL, NULL, NULL),
(215, 201501, 28, 109, 0, 0.00, NULL, NULL, NULL, NULL),
(216, 201501, 29, 110, 0, 0.00, NULL, NULL, NULL, NULL),
(217, 201501, 29, 111, 0, 0.00, NULL, NULL, NULL, NULL),
(218, 201501, 30, 112, 0, 0.00, NULL, NULL, NULL, NULL),
(219, 201501, 30, 113, 0, 0.00, NULL, NULL, NULL, NULL),
(220, 201501, 31, 114, 0, 0.00, NULL, NULL, NULL, NULL),
(221, 201501, 31, 115, 0, 0.00, NULL, NULL, NULL, NULL),
(222, 201501, 31, 116, 0, 0.00, NULL, NULL, NULL, NULL),
(223, 201501, 31, 117, 0, 0.00, NULL, NULL, NULL, NULL),
(224, 201501, 31, 118, 0, 0.00, NULL, NULL, NULL, NULL),
(225, 201501, 32, 119, 0, 0.00, NULL, NULL, NULL, NULL),
(226, 201501, 32, 120, 0, 0.00, NULL, NULL, NULL, NULL),
(227, 201501, 32, 121, 0, 0.00, NULL, NULL, NULL, NULL),
(228, 201501, 32, 122, 0, 0.00, NULL, NULL, NULL, NULL),
(229, 201501, 32, 123, 0, 0.00, NULL, NULL, NULL, NULL),
(230, 201501, 32, 124, 0, 0.00, NULL, NULL, NULL, NULL),
(231, 201501, 33, 125, 0, 0.00, NULL, NULL, NULL, NULL),
(232, 201501, 33, 126, 0, 0.00, NULL, NULL, NULL, NULL),
(233, 201501, 35, 129, 0, 0.00, NULL, NULL, NULL, NULL),
(234, 201501, 35, 130, 0, 0.00, NULL, NULL, NULL, NULL),
(235, 201501, 36, 131, 0, 0.00, NULL, NULL, NULL, NULL),
(236, 201501, 36, 132, 0, 0.00, NULL, NULL, NULL, NULL),
(237, 201501, 39, 137, 0, NULL, NULL, NULL, NULL, NULL),
(238, 201501, 39, 138, 0, NULL, NULL, NULL, NULL, NULL),
(239, 201501, 41, 141, 0, NULL, NULL, NULL, NULL, NULL),
(240, 201501, 41, 142, 0, NULL, NULL, NULL, NULL, NULL),
(241, 201501, 47, 153, 0, NULL, NULL, NULL, NULL, NULL),
(242, 201501, 47, 154, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pro_personal_attribute`
--

CREATE TABLE `pro_personal_attribute` (
  `id_pro_personal_attribute` bigint(20) NOT NULL,
  `id_pegawai` bigint(20) NOT NULL,
  `id_mst_personal_attribute` bigint(20) NOT NULL,
  `id_mst_personal_attribute_grade` bigint(20) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_id_user` int(11) DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pro_personal_attribute`
--

INSERT INTO `pro_personal_attribute` (`id_pro_personal_attribute`, `id_pegawai`, `id_mst_personal_attribute`, `id_mst_personal_attribute_grade`, `created_date`, `created_id_user`, `created_ip_address`) VALUES
(1, 3, 2, 4, '2022-12-26 03:56:14', 1, '1:1:1'),
(2, 3, 1, 1, NULL, NULL, NULL),
(3, 3, 3, 7, NULL, NULL, NULL),
(4, 3, 4, 166, NULL, NULL, NULL),
(5, 27, 1, 2, NULL, NULL, NULL),
(6, 27, 2, 4, NULL, NULL, NULL),
(7, 27, 3, 8, NULL, NULL, NULL),
(8, 31, 1, 1, NULL, NULL, NULL),
(9, 31, 2, 5, NULL, NULL, NULL),
(10, 31, 3, 8, NULL, NULL, NULL),
(11, 31, 4, 19, NULL, NULL, NULL),
(12, 31, 5, 0, NULL, NULL, NULL),
(13, 31, 6, 24, NULL, NULL, NULL),
(14, 31, 7, 31, NULL, NULL, NULL),
(15, 31, 8, 158, NULL, NULL, NULL),
(16, 31, 9, 32, NULL, NULL, NULL),
(17, 31, 10, 36, NULL, NULL, NULL),
(18, 31, 11, 42, NULL, NULL, NULL),
(19, 31, 12, 50, NULL, NULL, NULL),
(20, 31, 13, 53, NULL, NULL, NULL),
(21, 31, 14, 0, NULL, NULL, NULL),
(22, 31, 15, 65, NULL, NULL, NULL),
(23, 31, 16, 0, NULL, NULL, NULL),
(24, 31, 17, 81, NULL, NULL, NULL),
(25, 31, 18, 83, NULL, NULL, NULL),
(26, 31, 19, 87, NULL, NULL, NULL),
(27, 31, 20, 89, NULL, NULL, NULL),
(28, 31, 21, 93, NULL, NULL, NULL),
(29, 31, 22, 94, NULL, NULL, NULL),
(30, 31, 23, 97, NULL, NULL, NULL),
(31, 31, 24, 98, NULL, NULL, NULL),
(32, 31, 25, 100, NULL, NULL, NULL),
(33, 31, 26, 102, NULL, NULL, NULL),
(34, 31, 27, 106, NULL, NULL, NULL),
(35, 31, 28, 108, NULL, NULL, NULL),
(36, 31, 29, 111, NULL, NULL, NULL),
(37, 31, 30, 112, NULL, NULL, NULL),
(38, 31, 31, 114, NULL, NULL, NULL),
(39, 31, 32, 122, NULL, NULL, NULL),
(40, 31, 33, 125, NULL, NULL, NULL),
(41, 31, 34, 127, NULL, NULL, NULL),
(42, 31, 35, 129, NULL, NULL, NULL),
(43, 31, 36, 131, NULL, NULL, NULL),
(44, 31, 37, 133, NULL, NULL, NULL),
(45, 31, 38, 135, NULL, NULL, NULL),
(46, 31, 39, 138, NULL, NULL, NULL),
(47, 31, 40, 140, NULL, NULL, NULL),
(48, 31, 41, 141, NULL, NULL, NULL),
(49, 31, 42, 144, NULL, NULL, NULL),
(50, 31, 43, 145, NULL, NULL, NULL),
(51, 31, 44, 148, NULL, NULL, NULL),
(52, 31, 45, 150, NULL, NULL, NULL),
(53, 31, 46, 151, NULL, NULL, NULL),
(54, 31, 47, 154, NULL, NULL, NULL),
(55, 31, 48, 156, NULL, NULL, NULL),
(56, 27, 4, 165, NULL, NULL, NULL),
(57, 27, 6, 27, NULL, NULL, NULL),
(58, 27, 7, 30, NULL, NULL, NULL),
(59, 27, 8, 158, NULL, NULL, NULL),
(60, 27, 9, 33, NULL, NULL, NULL),
(61, 27, 10, 37, NULL, NULL, NULL),
(62, 27, 11, 41, NULL, NULL, NULL),
(63, 27, 12, NULL, NULL, NULL, NULL),
(64, 27, 13, 53, NULL, NULL, NULL),
(65, 27, 14, NULL, NULL, NULL, NULL),
(66, 27, 15, 65, NULL, NULL, NULL),
(67, 27, 16, NULL, NULL, NULL, NULL),
(68, 27, 17, 82, NULL, NULL, NULL),
(69, 27, 18, 83, NULL, NULL, NULL),
(70, 27, 19, 87, NULL, NULL, NULL),
(71, 27, 20, 89, NULL, NULL, NULL),
(72, 27, 21, 92, NULL, NULL, NULL),
(73, 27, 22, 94, NULL, NULL, NULL),
(74, 27, 23, 96, NULL, NULL, NULL),
(75, 27, 24, 98, NULL, NULL, NULL),
(76, 27, 25, 101, NULL, NULL, NULL),
(77, 27, 26, 105, NULL, NULL, NULL),
(78, 27, 27, 107, NULL, NULL, NULL),
(79, 27, 28, 108, NULL, NULL, NULL),
(80, 27, 29, 111, NULL, NULL, NULL),
(81, 27, 30, 112, NULL, NULL, NULL),
(82, 27, 31, 115, NULL, NULL, NULL),
(83, 27, 32, 122, NULL, NULL, NULL),
(84, 27, 33, 126, NULL, NULL, NULL),
(85, 27, 34, 128, NULL, NULL, NULL),
(86, 27, 35, 129, NULL, NULL, NULL),
(87, 27, 36, 131, NULL, NULL, NULL),
(88, 27, 37, 133, NULL, NULL, NULL),
(89, 27, 38, 135, NULL, NULL, NULL),
(90, 27, 39, 137, NULL, NULL, NULL),
(91, 27, 40, 139, NULL, NULL, NULL),
(92, 27, 41, 142, NULL, NULL, NULL),
(93, 27, 42, 144, NULL, NULL, NULL),
(94, 27, 43, 145, NULL, NULL, NULL),
(95, 27, 44, 148, NULL, NULL, NULL),
(96, 27, 45, 149, NULL, NULL, NULL),
(97, 27, 46, 151, NULL, NULL, NULL),
(98, 27, 47, 154, NULL, NULL, NULL),
(99, 27, 48, 156, NULL, NULL, NULL),
(100, 32, 1, 1, NULL, NULL, NULL),
(101, 32, 2, 5, NULL, NULL, NULL),
(102, 32, 3, 8, NULL, NULL, NULL),
(103, 32, 4, 167, NULL, NULL, NULL),
(104, 32, 6, 27, NULL, NULL, NULL),
(105, 32, 7, 31, NULL, NULL, NULL),
(106, 32, 8, 159, NULL, NULL, NULL),
(107, 32, 9, 32, NULL, NULL, NULL),
(108, 32, 10, 37, NULL, NULL, NULL),
(109, 32, 11, 42, NULL, NULL, NULL),
(110, 32, 12, 44, NULL, NULL, NULL),
(111, 32, 13, 54, NULL, NULL, NULL),
(112, 32, 14, 56, NULL, NULL, NULL),
(113, 32, 15, 66, NULL, NULL, NULL),
(114, 32, 16, 69, NULL, NULL, NULL),
(115, 32, 17, 82, NULL, NULL, NULL),
(116, 32, 18, 83, NULL, NULL, NULL),
(117, 32, 19, 87, NULL, NULL, NULL),
(118, 32, 20, 89, NULL, NULL, NULL),
(119, 32, 21, 93, NULL, NULL, NULL),
(120, 32, 22, 94, NULL, NULL, NULL),
(121, 32, 23, 96, NULL, NULL, NULL),
(122, 32, 24, 98, NULL, NULL, NULL),
(123, 32, 25, 100, NULL, NULL, NULL),
(124, 32, 26, 105, NULL, NULL, NULL),
(125, 32, 27, 107, NULL, NULL, NULL),
(126, 32, 28, 109, NULL, NULL, NULL),
(127, 32, 29, 111, NULL, NULL, NULL),
(128, 32, 30, 112, NULL, NULL, NULL),
(129, 32, 31, 114, NULL, NULL, NULL),
(130, 32, 32, 121, NULL, NULL, NULL),
(131, 32, 33, 125, NULL, NULL, NULL),
(132, 32, 34, 127, NULL, NULL, NULL),
(133, 32, 35, 130, NULL, NULL, NULL),
(134, 32, 36, 132, NULL, NULL, NULL),
(135, 32, 37, 133, NULL, NULL, NULL),
(136, 32, 38, 136, NULL, NULL, NULL),
(137, 32, 39, 138, NULL, NULL, NULL),
(138, 32, 40, 140, NULL, NULL, NULL),
(139, 32, 41, 142, NULL, NULL, NULL),
(140, 32, 42, 144, NULL, NULL, NULL),
(141, 32, 43, 145, NULL, NULL, NULL),
(142, 32, 44, 148, NULL, NULL, NULL),
(143, 32, 45, 150, NULL, NULL, NULL),
(144, 32, 46, 151, NULL, NULL, NULL),
(145, 32, 47, 154, NULL, NULL, NULL),
(146, 32, 48, 155, NULL, NULL, NULL),
(147, 33, 1, 1, NULL, NULL, NULL),
(148, 33, 2, 161, NULL, NULL, NULL),
(149, 33, 3, 8, NULL, NULL, NULL),
(150, 33, 4, 168, NULL, NULL, NULL),
(151, 33, 6, 24, NULL, NULL, NULL),
(152, 33, 7, 30, NULL, NULL, NULL),
(153, 33, 8, 159, NULL, NULL, NULL),
(154, 33, 9, 33, NULL, NULL, NULL),
(155, 33, 10, 38, NULL, NULL, NULL),
(156, 33, 11, 41, NULL, NULL, NULL),
(157, 33, 12, NULL, NULL, NULL, NULL),
(158, 33, 13, 53, NULL, NULL, NULL),
(159, 33, 14, NULL, NULL, NULL, NULL),
(160, 33, 15, 65, NULL, NULL, NULL),
(161, 33, 16, NULL, NULL, NULL, NULL),
(162, 33, 17, 79, NULL, NULL, NULL),
(163, 33, 18, 83, NULL, NULL, NULL),
(164, 33, 19, 87, NULL, NULL, NULL),
(165, 33, 20, 89, NULL, NULL, NULL),
(166, 33, 21, 92, NULL, NULL, NULL),
(167, 33, 22, 94, NULL, NULL, NULL),
(168, 33, 23, 97, NULL, NULL, NULL),
(169, 33, 24, 98, NULL, NULL, NULL),
(170, 33, 25, 101, NULL, NULL, NULL),
(171, 33, 26, 103, NULL, NULL, NULL),
(172, 33, 27, 107, NULL, NULL, NULL),
(173, 33, 28, 108, NULL, NULL, NULL),
(174, 33, 29, 110, NULL, NULL, NULL),
(175, 33, 30, 112, NULL, NULL, NULL),
(176, 33, 31, 118, NULL, NULL, NULL),
(177, 33, 32, 119, NULL, NULL, NULL),
(178, 33, 33, 126, NULL, NULL, NULL),
(179, 33, 34, 128, NULL, NULL, NULL),
(180, 33, 35, 130, NULL, NULL, NULL),
(181, 33, 36, 132, NULL, NULL, NULL),
(182, 33, 37, 134, NULL, NULL, NULL),
(183, 33, 38, 135, NULL, NULL, NULL),
(184, 33, 39, 137, NULL, NULL, NULL),
(185, 33, 40, 139, NULL, NULL, NULL),
(186, 33, 41, 142, NULL, NULL, NULL),
(187, 33, 42, 143, NULL, NULL, NULL),
(188, 33, 43, 145, NULL, NULL, NULL),
(189, 33, 44, 148, NULL, NULL, NULL),
(190, 33, 45, 149, NULL, NULL, NULL),
(191, 33, 46, 151, NULL, NULL, NULL),
(192, 33, 47, 154, NULL, NULL, NULL),
(193, 33, 48, 155, NULL, NULL, NULL),
(194, 39, 1, 1, NULL, NULL, NULL),
(195, 39, 2, 4, NULL, NULL, NULL),
(196, 39, 3, 7, NULL, NULL, NULL),
(197, 39, 4, 171, NULL, NULL, NULL),
(198, 39, 6, 24, NULL, NULL, NULL),
(199, 39, 7, 31, NULL, NULL, NULL),
(200, 39, 8, 158, NULL, NULL, NULL),
(201, 39, 9, 32, NULL, NULL, NULL),
(202, 39, 10, 36, NULL, NULL, NULL),
(203, 39, 11, 41, NULL, NULL, NULL),
(204, 39, 12, NULL, NULL, NULL, NULL),
(205, 39, 13, 53, NULL, NULL, NULL),
(206, 39, 14, NULL, NULL, NULL, NULL),
(207, 39, 15, 66, NULL, NULL, NULL),
(208, 39, 16, 68, NULL, NULL, NULL),
(209, 39, 17, 82, NULL, NULL, NULL),
(210, 39, 18, 83, NULL, NULL, NULL),
(211, 39, 19, 87, NULL, NULL, NULL),
(212, 39, 20, 89, NULL, NULL, NULL),
(213, 39, 21, 93, NULL, NULL, NULL),
(214, 39, 22, 94, NULL, NULL, NULL),
(215, 39, 23, 96, NULL, NULL, NULL),
(216, 39, 24, 98, NULL, NULL, NULL),
(217, 39, 25, 100, NULL, NULL, NULL),
(218, 39, 26, 104, NULL, NULL, NULL),
(219, 39, 27, 106, NULL, NULL, NULL),
(220, 39, 28, 108, NULL, NULL, NULL),
(221, 39, 29, 111, NULL, NULL, NULL),
(222, 39, 30, 113, NULL, NULL, NULL),
(223, 39, 31, 116, NULL, NULL, NULL),
(224, 39, 32, 123, NULL, NULL, NULL),
(225, 39, 33, 126, NULL, NULL, NULL),
(226, 39, 34, 127, NULL, NULL, NULL),
(227, 39, 35, 130, NULL, NULL, NULL),
(228, 39, 36, 132, NULL, NULL, NULL),
(229, 39, 37, 133, NULL, NULL, NULL),
(230, 39, 38, 136, NULL, NULL, NULL),
(231, 39, 39, 138, NULL, NULL, NULL),
(232, 39, 40, 140, NULL, NULL, NULL),
(233, 39, 41, 142, NULL, NULL, NULL),
(234, 39, 42, 144, NULL, NULL, NULL),
(235, 39, 43, 145, NULL, NULL, NULL),
(236, 39, 44, 148, NULL, NULL, NULL),
(237, 39, 45, 149, NULL, NULL, NULL),
(238, 39, 46, 152, NULL, NULL, NULL),
(239, 39, 47, 154, NULL, NULL, NULL),
(240, 39, 48, 155, NULL, NULL, NULL),
(241, 28, 1, 2, NULL, NULL, NULL),
(242, 28, 2, 5, NULL, NULL, NULL),
(243, 28, 3, 8, NULL, NULL, NULL),
(244, 28, 4, 166, NULL, NULL, NULL),
(245, 28, 6, 26, NULL, NULL, NULL),
(246, 28, 7, 30, NULL, NULL, NULL),
(247, 28, 8, 157, NULL, NULL, NULL),
(248, 28, 9, 32, NULL, NULL, NULL),
(249, 28, 10, 35, NULL, NULL, NULL),
(250, 28, 11, 41, NULL, NULL, NULL),
(251, 28, 12, NULL, NULL, NULL, NULL),
(252, 28, 13, 53, NULL, NULL, NULL),
(253, 28, 14, NULL, NULL, NULL, NULL),
(254, 28, 15, 65, NULL, NULL, NULL),
(255, 28, 16, NULL, NULL, NULL, NULL),
(256, 28, 17, 79, NULL, NULL, NULL),
(257, 28, 18, 83, NULL, NULL, NULL),
(258, 28, 19, 87, NULL, NULL, NULL),
(259, 28, 20, 89, NULL, NULL, NULL),
(260, 28, 21, 92, NULL, NULL, NULL),
(261, 28, 22, 94, NULL, NULL, NULL),
(262, 28, 23, 96, NULL, NULL, NULL),
(263, 28, 24, 98, NULL, NULL, NULL),
(264, 28, 25, 100, NULL, NULL, NULL),
(265, 28, 26, 103, NULL, NULL, NULL),
(266, 28, 27, 106, NULL, NULL, NULL),
(267, 28, 28, 108, NULL, NULL, NULL),
(268, 28, 29, 110, NULL, NULL, NULL),
(269, 28, 30, 112, NULL, NULL, NULL),
(270, 28, 31, 116, NULL, NULL, NULL),
(271, 28, 32, 119, NULL, NULL, NULL),
(272, 28, 33, 126, NULL, NULL, NULL),
(273, 28, 34, 128, NULL, NULL, NULL),
(274, 28, 35, 130, NULL, NULL, NULL),
(275, 28, 36, 131, NULL, NULL, NULL),
(276, 28, 37, 134, NULL, NULL, NULL),
(277, 28, 38, 136, NULL, NULL, NULL),
(278, 28, 39, 138, NULL, NULL, NULL),
(279, 28, 40, 140, NULL, NULL, NULL),
(280, 28, 41, 142, NULL, NULL, NULL),
(281, 28, 42, 144, NULL, NULL, NULL),
(282, 28, 43, 145, NULL, NULL, NULL),
(283, 28, 44, 148, NULL, NULL, NULL),
(284, 28, 45, 149, NULL, NULL, NULL),
(285, 28, 46, 151, NULL, NULL, NULL),
(286, 28, 47, 154, NULL, NULL, NULL),
(287, 28, 48, 156, NULL, NULL, NULL),
(288, 29, 1, 2, NULL, NULL, NULL),
(289, 29, 2, 5, NULL, NULL, NULL),
(290, 29, 3, 8, NULL, NULL, NULL),
(291, 29, 4, 166, NULL, NULL, NULL),
(292, 29, 6, 24, NULL, NULL, NULL),
(293, 29, 7, 30, NULL, NULL, NULL),
(294, 29, 8, 158, NULL, NULL, NULL),
(295, 29, 9, 32, NULL, NULL, NULL),
(296, 29, 10, 36, NULL, NULL, NULL),
(297, 29, 11, 41, NULL, NULL, NULL),
(298, 29, 12, NULL, NULL, NULL, NULL),
(299, 29, 13, 53, NULL, NULL, NULL),
(300, 29, 14, NULL, NULL, NULL, NULL),
(301, 29, 15, 65, NULL, NULL, NULL),
(302, 29, 16, NULL, NULL, NULL, NULL),
(303, 29, 17, 79, NULL, NULL, NULL),
(304, 29, 18, 83, NULL, NULL, NULL),
(305, 29, 19, 87, NULL, NULL, NULL),
(306, 29, 20, 89, NULL, NULL, NULL),
(307, 29, 21, 92, NULL, NULL, NULL),
(308, 29, 22, 94, NULL, NULL, NULL),
(309, 29, 23, 96, NULL, NULL, NULL),
(310, 29, 24, 98, NULL, NULL, NULL),
(311, 29, 25, 101, NULL, NULL, NULL),
(312, 29, 26, 104, NULL, NULL, NULL),
(313, 29, 27, 106, NULL, NULL, NULL),
(314, 29, 28, 109, NULL, NULL, NULL),
(315, 29, 29, 111, NULL, NULL, NULL),
(316, 29, 30, 112, NULL, NULL, NULL),
(317, 29, 31, 116, NULL, NULL, NULL),
(318, 29, 32, 122, NULL, NULL, NULL),
(319, 29, 33, 126, NULL, NULL, NULL),
(320, 29, 34, 128, NULL, NULL, NULL),
(321, 29, 35, 130, NULL, NULL, NULL),
(322, 29, 36, 131, NULL, NULL, NULL),
(323, 29, 37, 134, NULL, NULL, NULL),
(324, 29, 38, 136, NULL, NULL, NULL),
(325, 29, 39, 138, NULL, NULL, NULL),
(326, 29, 40, 140, NULL, NULL, NULL),
(327, 29, 41, 142, NULL, NULL, NULL),
(328, 29, 42, 144, NULL, NULL, NULL),
(329, 29, 43, 145, NULL, NULL, NULL),
(330, 29, 44, 148, NULL, NULL, NULL),
(331, 29, 45, 149, NULL, NULL, NULL),
(332, 29, 46, 151, NULL, NULL, NULL),
(333, 29, 47, 154, NULL, NULL, NULL),
(334, 29, 48, 156, NULL, NULL, NULL),
(335, 30, 1, 1, NULL, NULL, NULL),
(336, 30, 2, 5, NULL, NULL, NULL),
(337, 30, 3, 8, NULL, NULL, NULL),
(338, 30, 4, 166, NULL, NULL, NULL),
(339, 30, 6, 27, NULL, NULL, NULL),
(340, 30, 7, 30, NULL, NULL, NULL),
(341, 30, 8, 158, NULL, NULL, NULL),
(342, 30, 9, 32, NULL, NULL, NULL),
(343, 30, 10, 36, NULL, NULL, NULL),
(344, 30, 11, 41, NULL, NULL, NULL),
(345, 30, 12, NULL, NULL, NULL, NULL),
(346, 30, 13, 53, NULL, NULL, NULL),
(347, 30, 14, NULL, NULL, NULL, NULL),
(348, 30, 15, 65, NULL, NULL, NULL),
(349, 30, 16, NULL, NULL, NULL, NULL),
(350, 30, 17, 82, NULL, NULL, NULL),
(351, 30, 18, 83, NULL, NULL, NULL),
(352, 30, 19, 87, NULL, NULL, NULL),
(353, 30, 20, 89, NULL, NULL, NULL),
(354, 30, 21, 92, NULL, NULL, NULL),
(355, 30, 22, 94, NULL, NULL, NULL),
(356, 30, 23, 96, NULL, NULL, NULL),
(357, 30, 24, 98, NULL, NULL, NULL),
(358, 30, 25, 100, NULL, NULL, NULL),
(359, 30, 26, 102, NULL, NULL, NULL),
(360, 30, 27, 106, NULL, NULL, NULL),
(361, 30, 28, 109, NULL, NULL, NULL),
(362, 30, 29, 111, NULL, NULL, NULL),
(363, 30, 30, 113, NULL, NULL, NULL),
(364, 30, 31, 118, NULL, NULL, NULL),
(365, 30, 32, 122, NULL, NULL, NULL),
(366, 30, 33, 125, NULL, NULL, NULL),
(367, 30, 34, 127, NULL, NULL, NULL),
(368, 30, 35, 130, NULL, NULL, NULL),
(369, 30, 36, 132, NULL, NULL, NULL),
(370, 30, 37, 133, NULL, NULL, NULL),
(371, 30, 38, 136, NULL, NULL, NULL),
(372, 30, 39, 137, NULL, NULL, NULL),
(373, 30, 40, 139, NULL, NULL, NULL),
(374, 30, 41, 141, NULL, NULL, NULL),
(375, 30, 42, 143, NULL, NULL, NULL),
(376, 30, 43, 145, NULL, NULL, NULL),
(377, 30, 44, 148, NULL, NULL, NULL),
(378, 30, 45, 150, NULL, NULL, NULL),
(379, 30, 46, 152, NULL, NULL, NULL),
(380, 30, 47, 154, NULL, NULL, NULL),
(381, 30, 48, 155, NULL, NULL, NULL),
(382, 34, 1, 2, NULL, NULL, NULL),
(383, 34, 2, 160, NULL, NULL, NULL),
(384, 34, 3, 8, NULL, NULL, NULL),
(385, 34, 4, 166, NULL, NULL, NULL),
(386, 34, 6, 24, NULL, NULL, NULL),
(387, 34, 7, 30, NULL, NULL, NULL),
(388, 34, 8, 159, NULL, NULL, NULL),
(389, 34, 9, 33, NULL, NULL, NULL),
(390, 34, 10, NULL, NULL, NULL, NULL),
(391, 34, 11, 41, NULL, NULL, NULL),
(392, 34, 12, NULL, NULL, NULL, NULL),
(393, 34, 13, 53, NULL, NULL, NULL),
(394, 34, 14, NULL, NULL, NULL, NULL),
(395, 34, 15, 65, NULL, NULL, NULL),
(396, 34, 16, NULL, NULL, NULL, NULL),
(397, 34, 17, 79, NULL, NULL, NULL),
(398, 34, 18, 83, NULL, NULL, NULL),
(399, 34, 19, 87, NULL, NULL, NULL),
(400, 34, 20, 89, NULL, NULL, NULL),
(401, 34, 21, 92, NULL, NULL, NULL),
(402, 34, 22, 94, NULL, NULL, NULL),
(403, 34, 23, 97, NULL, NULL, NULL),
(404, 34, 24, 98, NULL, NULL, NULL),
(405, 34, 25, 101, NULL, NULL, NULL),
(406, 34, 26, 103, NULL, NULL, NULL),
(407, 34, 27, 106, NULL, NULL, NULL),
(408, 34, 28, 108, NULL, NULL, NULL),
(409, 34, 29, 111, NULL, NULL, NULL),
(410, 34, 30, 113, NULL, NULL, NULL),
(411, 34, 31, 117, NULL, NULL, NULL),
(412, 34, 32, 119, NULL, NULL, NULL),
(413, 34, 33, 126, NULL, NULL, NULL),
(414, 34, 34, 128, NULL, NULL, NULL),
(415, 34, 35, 129, NULL, NULL, NULL),
(416, 34, 36, 132, NULL, NULL, NULL),
(417, 34, 37, 133, NULL, NULL, NULL),
(418, 34, 38, 135, NULL, NULL, NULL),
(419, 34, 39, 138, NULL, NULL, NULL),
(420, 34, 40, 140, NULL, NULL, NULL),
(421, 34, 41, 142, NULL, NULL, NULL),
(422, 34, 42, 143, NULL, NULL, NULL),
(423, 34, 43, 146, NULL, NULL, NULL),
(424, 34, 44, 148, NULL, NULL, NULL),
(425, 34, 45, 150, NULL, NULL, NULL),
(426, 34, 46, 152, NULL, NULL, NULL),
(427, 34, 47, 154, NULL, NULL, NULL),
(428, 34, 48, 156, NULL, NULL, NULL),
(429, 35, 1, 1, NULL, NULL, NULL),
(430, 35, 2, 5, NULL, NULL, NULL),
(431, 35, 3, 8, NULL, NULL, NULL),
(432, 35, 4, 169, NULL, NULL, NULL),
(433, 35, 6, 26, NULL, NULL, NULL),
(434, 35, 7, 30, NULL, NULL, NULL),
(435, 35, 8, 157, NULL, NULL, NULL),
(436, 35, 9, 33, NULL, NULL, NULL),
(437, 35, 10, NULL, NULL, NULL, NULL),
(438, 35, 11, 41, NULL, NULL, NULL),
(439, 35, 12, NULL, NULL, NULL, NULL),
(440, 35, 13, 53, NULL, NULL, NULL),
(441, 35, 14, NULL, NULL, NULL, NULL),
(442, 35, 15, 66, NULL, NULL, NULL),
(443, 35, 16, 68, NULL, NULL, NULL),
(444, 35, 17, 79, NULL, NULL, NULL),
(445, 35, 18, 83, NULL, NULL, NULL),
(446, 35, 19, 86, NULL, NULL, NULL),
(447, 35, 20, 89, NULL, NULL, NULL),
(448, 35, 21, 92, NULL, NULL, NULL),
(449, 35, 22, 94, NULL, NULL, NULL),
(450, 35, 23, 96, NULL, NULL, NULL),
(451, 35, 24, 98, NULL, NULL, NULL),
(452, 35, 25, 100, NULL, NULL, NULL),
(453, 35, 26, 104, NULL, NULL, NULL),
(454, 35, 27, 106, NULL, NULL, NULL),
(455, 35, 28, 109, NULL, NULL, NULL),
(456, 35, 29, 111, NULL, NULL, NULL),
(457, 35, 30, 112, NULL, NULL, NULL),
(458, 35, 31, 116, NULL, NULL, NULL),
(459, 35, 32, 120, NULL, NULL, NULL),
(460, 35, 33, 126, NULL, NULL, NULL),
(461, 35, 34, 127, NULL, NULL, NULL),
(462, 35, 35, 130, NULL, NULL, NULL),
(463, 35, 36, 132, NULL, NULL, NULL),
(464, 35, 37, 134, NULL, NULL, NULL),
(465, 35, 38, 136, NULL, NULL, NULL),
(466, 35, 39, 138, NULL, NULL, NULL),
(467, 35, 40, 139, NULL, NULL, NULL),
(468, 35, 41, 142, NULL, NULL, NULL),
(469, 35, 42, 144, NULL, NULL, NULL),
(470, 35, 43, 145, NULL, NULL, NULL),
(471, 35, 44, 148, NULL, NULL, NULL),
(472, 35, 45, 150, NULL, NULL, NULL),
(473, 35, 46, 151, NULL, NULL, NULL),
(474, 35, 47, 153, NULL, NULL, NULL),
(475, 35, 48, 156, NULL, NULL, NULL),
(476, 36, 1, 1, NULL, NULL, NULL),
(477, 36, 2, 161, NULL, NULL, NULL),
(478, 36, 3, 8, NULL, NULL, NULL),
(479, 36, 4, 166, NULL, NULL, NULL),
(480, 36, 6, 24, NULL, NULL, NULL),
(481, 36, 7, 30, NULL, NULL, NULL),
(482, 36, 8, 159, NULL, NULL, NULL),
(483, 36, 9, 32, NULL, NULL, NULL),
(484, 36, 10, 35, NULL, NULL, NULL),
(485, 36, 11, 41, NULL, NULL, NULL),
(486, 36, 12, NULL, NULL, NULL, NULL),
(487, 36, 13, 53, NULL, NULL, NULL),
(488, 36, 14, NULL, NULL, NULL, NULL),
(489, 36, 15, 65, NULL, NULL, NULL),
(490, 36, 16, NULL, NULL, NULL, NULL),
(491, 36, 17, 82, NULL, NULL, NULL),
(492, 36, 18, 83, NULL, NULL, NULL),
(493, 36, 19, 87, NULL, NULL, NULL),
(494, 36, 20, 89, NULL, NULL, NULL),
(495, 36, 21, 92, NULL, NULL, NULL),
(496, 36, 22, 94, NULL, NULL, NULL),
(497, 36, 23, 97, NULL, NULL, NULL),
(498, 36, 24, 99, NULL, NULL, NULL),
(499, 36, 25, 101, NULL, NULL, NULL),
(500, 36, 26, 104, NULL, NULL, NULL),
(501, 36, 27, 107, NULL, NULL, NULL),
(502, 36, 28, 109, NULL, NULL, NULL),
(503, 36, 29, 111, NULL, NULL, NULL),
(504, 36, 30, 112, NULL, NULL, NULL),
(505, 36, 31, 116, NULL, NULL, NULL),
(506, 36, 32, 124, NULL, NULL, NULL),
(507, 36, 33, 126, NULL, NULL, NULL),
(508, 36, 34, 128, NULL, NULL, NULL),
(509, 36, 35, 130, NULL, NULL, NULL),
(510, 36, 36, 131, NULL, NULL, NULL),
(511, 36, 37, 134, NULL, NULL, NULL),
(512, 36, 38, 135, NULL, NULL, NULL),
(513, 36, 39, 138, NULL, NULL, NULL),
(514, 36, 40, 140, NULL, NULL, NULL),
(515, 36, 41, 142, NULL, NULL, NULL),
(516, 36, 42, 143, NULL, NULL, NULL),
(517, 36, 43, 145, NULL, NULL, NULL),
(518, 36, 44, 148, NULL, NULL, NULL),
(519, 36, 45, 149, NULL, NULL, NULL),
(520, 36, 46, 151, NULL, NULL, NULL),
(521, 36, 47, 154, NULL, NULL, NULL),
(522, 36, 48, 156, NULL, NULL, NULL),
(523, 37, 1, 1, NULL, NULL, NULL),
(524, 37, 2, 5, NULL, NULL, NULL),
(525, 37, 3, 7, NULL, NULL, NULL),
(526, 37, 4, 170, NULL, NULL, NULL),
(527, 37, 6, 24, NULL, NULL, NULL),
(528, 37, 7, 31, NULL, NULL, NULL),
(529, 37, 8, 158, NULL, NULL, NULL),
(530, 37, 9, 32, NULL, NULL, NULL),
(531, 37, 10, 35, NULL, NULL, NULL),
(532, 37, 11, 41, NULL, NULL, NULL),
(533, 37, 12, NULL, NULL, NULL, NULL),
(534, 37, 13, 54, NULL, NULL, NULL),
(535, 37, 14, 56, NULL, NULL, NULL),
(536, 37, 15, 66, NULL, NULL, NULL),
(537, 37, 16, 69, NULL, NULL, NULL),
(538, 37, 17, 81, NULL, NULL, NULL),
(539, 37, 18, 83, NULL, NULL, NULL),
(540, 37, 19, 87, NULL, NULL, NULL),
(541, 37, 20, 89, NULL, NULL, NULL),
(542, 37, 21, 93, NULL, NULL, NULL),
(543, 37, 22, 94, NULL, NULL, NULL),
(544, 37, 23, 96, NULL, NULL, NULL),
(545, 37, 24, 98, NULL, NULL, NULL),
(546, 37, 25, 101, NULL, NULL, NULL),
(547, 37, 26, 104, NULL, NULL, NULL),
(548, 37, 27, 106, NULL, NULL, NULL),
(549, 37, 28, 109, NULL, NULL, NULL),
(550, 37, 29, 110, NULL, NULL, NULL),
(551, 37, 30, 113, NULL, NULL, NULL),
(552, 37, 31, 117, NULL, NULL, NULL),
(553, 37, 32, 124, NULL, NULL, NULL),
(554, 37, 33, 126, NULL, NULL, NULL),
(555, 37, 34, 128, NULL, NULL, NULL),
(556, 37, 35, 130, NULL, NULL, NULL),
(557, 37, 36, 132, NULL, NULL, NULL),
(558, 37, 37, 134, NULL, NULL, NULL),
(559, 37, 38, 136, NULL, NULL, NULL),
(560, 37, 39, 138, NULL, NULL, NULL),
(561, 37, 40, 140, NULL, NULL, NULL),
(562, 37, 41, 142, NULL, NULL, NULL),
(563, 37, 42, 143, NULL, NULL, NULL),
(564, 37, 43, 146, NULL, NULL, NULL),
(565, 37, 44, 148, NULL, NULL, NULL),
(566, 37, 45, 150, NULL, NULL, NULL),
(567, 37, 46, 152, NULL, NULL, NULL),
(568, 37, 47, 154, NULL, NULL, NULL),
(569, 37, 48, 155, NULL, NULL, NULL),
(570, 40, 1, 1, NULL, NULL, NULL),
(571, 40, 2, 5, NULL, NULL, NULL),
(572, 40, 3, 6, NULL, NULL, NULL),
(573, 40, 4, 170, NULL, NULL, NULL),
(574, 40, 6, 24, NULL, NULL, NULL),
(575, 40, 7, 31, NULL, NULL, NULL),
(576, 40, 8, 158, NULL, NULL, NULL),
(577, 40, 9, 32, NULL, NULL, NULL),
(578, 40, 10, 34, NULL, NULL, NULL),
(579, 40, 11, 41, NULL, NULL, NULL),
(580, 40, 12, NULL, NULL, NULL, NULL),
(581, 40, 13, 54, NULL, NULL, NULL),
(582, 40, 14, 60, NULL, NULL, NULL),
(583, 40, 15, 65, NULL, NULL, NULL),
(584, 40, 16, NULL, NULL, NULL, NULL),
(585, 40, 17, 82, NULL, NULL, NULL),
(586, 40, 18, 83, NULL, NULL, NULL),
(587, 40, 19, 87, NULL, NULL, NULL),
(588, 40, 20, 89, NULL, NULL, NULL),
(589, 40, 21, 93, NULL, NULL, NULL),
(590, 40, 22, 94, NULL, NULL, NULL),
(591, 40, 23, 97, NULL, NULL, NULL),
(592, 40, 24, 98, NULL, NULL, NULL),
(593, 40, 25, 100, NULL, NULL, NULL),
(594, 40, 26, 105, NULL, NULL, NULL),
(595, 40, 27, 107, NULL, NULL, NULL),
(596, 40, 28, 109, NULL, NULL, NULL),
(597, 40, 29, 110, NULL, NULL, NULL),
(598, 40, 30, 113, NULL, NULL, NULL),
(599, 40, 31, 116, NULL, NULL, NULL),
(600, 40, 32, 122, NULL, NULL, NULL),
(601, 40, 33, 126, NULL, NULL, NULL),
(602, 40, 34, 127, NULL, NULL, NULL),
(603, 40, 35, 130, NULL, NULL, NULL),
(604, 40, 36, 131, NULL, NULL, NULL),
(605, 40, 37, 133, NULL, NULL, NULL),
(606, 40, 38, 136, NULL, NULL, NULL),
(607, 40, 39, 138, NULL, NULL, NULL),
(608, 40, 40, 140, NULL, NULL, NULL),
(609, 40, 41, 142, NULL, NULL, NULL),
(610, 40, 42, 143, NULL, NULL, NULL),
(611, 40, 43, 145, NULL, NULL, NULL),
(612, 40, 44, 148, NULL, NULL, NULL),
(613, 40, 45, 150, NULL, NULL, NULL),
(614, 40, 46, 152, NULL, NULL, NULL),
(615, 40, 47, 154, NULL, NULL, NULL),
(616, 40, 48, 155, NULL, NULL, NULL),
(617, 44, 1, 1, NULL, NULL, NULL),
(618, 44, 2, 5, NULL, NULL, NULL),
(619, 44, 3, 8, NULL, NULL, NULL),
(620, 44, 4, 175, NULL, NULL, NULL),
(621, 44, 6, 24, NULL, NULL, NULL),
(622, 44, 7, 31, NULL, NULL, NULL),
(623, 44, 8, 158, NULL, NULL, NULL),
(624, 44, 9, 32, NULL, NULL, NULL),
(625, 44, 10, 35, NULL, NULL, NULL),
(626, 44, 11, 41, NULL, NULL, NULL),
(627, 44, 12, NULL, NULL, NULL, NULL),
(628, 44, 13, 53, NULL, NULL, NULL),
(629, 44, 14, NULL, NULL, NULL, NULL),
(630, 44, 15, 65, NULL, NULL, NULL),
(631, 44, 16, NULL, NULL, NULL, NULL),
(632, 44, 17, 82, NULL, NULL, NULL),
(633, 44, 18, 83, NULL, NULL, NULL),
(634, 44, 19, 87, NULL, NULL, NULL),
(635, 44, 20, 89, NULL, NULL, NULL),
(636, 44, 21, 92, NULL, NULL, NULL),
(637, 44, 22, 94, NULL, NULL, NULL),
(638, 44, 23, 96, NULL, NULL, NULL),
(639, 44, 24, 98, NULL, NULL, NULL),
(640, 44, 25, 101, NULL, NULL, NULL),
(641, 44, 26, 104, NULL, NULL, NULL),
(642, 44, 27, 106, NULL, NULL, NULL),
(643, 44, 28, 108, NULL, NULL, NULL),
(644, 44, 29, 111, NULL, NULL, NULL),
(645, 44, 30, 112, NULL, NULL, NULL),
(646, 44, 31, 116, NULL, NULL, NULL),
(647, 44, 32, 122, NULL, NULL, NULL),
(648, 44, 33, 125, NULL, NULL, NULL),
(649, 44, 34, 127, NULL, NULL, NULL),
(650, 44, 35, 129, NULL, NULL, NULL),
(651, 44, 36, 131, NULL, NULL, NULL),
(652, 44, 37, 133, NULL, NULL, NULL),
(653, 44, 38, 136, NULL, NULL, NULL),
(654, 44, 39, 138, NULL, NULL, NULL),
(655, 44, 40, 140, NULL, NULL, NULL),
(656, 44, 41, 142, NULL, NULL, NULL),
(657, 44, 42, 144, NULL, NULL, NULL),
(658, 44, 43, 145, NULL, NULL, NULL),
(659, 44, 44, 147, NULL, NULL, NULL),
(660, 44, 45, 149, NULL, NULL, NULL),
(661, 44, 46, 152, NULL, NULL, NULL),
(662, 44, 47, 154, NULL, NULL, NULL),
(663, 44, 48, 155, NULL, NULL, NULL),
(664, 45, 1, 1, NULL, NULL, NULL),
(665, 45, 2, 5, NULL, NULL, NULL),
(666, 45, 3, 8, NULL, NULL, NULL),
(667, 45, 4, 171, NULL, NULL, NULL),
(668, 45, 6, 24, NULL, NULL, NULL),
(669, 45, 7, 31, NULL, NULL, NULL),
(670, 45, 8, 158, NULL, NULL, NULL),
(671, 45, 9, 32, NULL, NULL, NULL),
(672, 45, 10, 35, NULL, NULL, NULL),
(673, 45, 11, 41, NULL, NULL, NULL),
(674, 45, 12, NULL, NULL, NULL, NULL),
(675, 45, 13, 53, NULL, NULL, NULL),
(676, 45, 14, NULL, NULL, NULL, NULL),
(677, 45, 15, 65, NULL, NULL, NULL),
(678, 45, 16, NULL, NULL, NULL, NULL),
(679, 45, 17, 81, NULL, NULL, NULL),
(680, 45, 18, 83, NULL, NULL, NULL),
(681, 45, 19, 87, NULL, NULL, NULL),
(682, 45, 20, 89, NULL, NULL, NULL),
(683, 45, 21, 93, NULL, NULL, NULL),
(684, 45, 22, 94, NULL, NULL, NULL),
(685, 45, 23, 96, NULL, NULL, NULL),
(686, 45, 24, 98, NULL, NULL, NULL),
(687, 45, 25, 101, NULL, NULL, NULL),
(688, 45, 26, 104, NULL, NULL, NULL),
(689, 45, 27, 106, NULL, NULL, NULL),
(690, 45, 28, 109, NULL, NULL, NULL),
(691, 45, 29, 111, NULL, NULL, NULL),
(692, 45, 30, 112, NULL, NULL, NULL),
(693, 45, 31, 114, NULL, NULL, NULL),
(694, 45, 32, 122, NULL, NULL, NULL),
(695, 45, 33, 126, NULL, NULL, NULL),
(696, 45, 34, 128, NULL, NULL, NULL),
(697, 45, 35, 130, NULL, NULL, NULL),
(698, 45, 36, 132, NULL, NULL, NULL),
(699, 45, 37, 133, NULL, NULL, NULL),
(700, 45, 38, 136, NULL, NULL, NULL),
(701, 45, 39, 138, NULL, NULL, NULL),
(702, 45, 40, 140, NULL, NULL, NULL),
(703, 45, 41, 142, NULL, NULL, NULL),
(704, 45, 42, 143, NULL, NULL, NULL),
(705, 45, 43, 145, NULL, NULL, NULL),
(706, 45, 44, 147, NULL, NULL, NULL),
(707, 45, 45, 149, NULL, NULL, NULL),
(708, 45, 46, 152, NULL, NULL, NULL),
(709, 45, 47, 154, NULL, NULL, NULL),
(710, 45, 48, 155, NULL, NULL, NULL),
(711, 46, 1, 1, NULL, NULL, NULL),
(712, 46, 2, 160, NULL, NULL, NULL),
(713, 46, 3, 8, NULL, NULL, NULL),
(714, 46, 4, 166, NULL, NULL, NULL),
(715, 46, 6, 24, NULL, NULL, NULL),
(716, 46, 7, 30, NULL, NULL, NULL),
(717, 46, 8, 159, NULL, NULL, NULL),
(718, 46, 9, 32, NULL, NULL, NULL),
(719, 46, 10, 38, NULL, NULL, NULL),
(720, 46, 11, 41, NULL, NULL, NULL),
(721, 46, 12, NULL, NULL, NULL, NULL),
(722, 46, 13, 53, NULL, NULL, NULL),
(723, 46, 14, NULL, NULL, NULL, NULL),
(724, 46, 15, 65, NULL, NULL, NULL),
(725, 46, 16, NULL, NULL, NULL, NULL),
(726, 46, 17, 82, NULL, NULL, NULL),
(727, 46, 18, 83, NULL, NULL, NULL),
(728, 46, 19, 87, NULL, NULL, NULL),
(729, 46, 20, 89, NULL, NULL, NULL),
(730, 46, 21, 92, NULL, NULL, NULL),
(731, 46, 22, 94, NULL, NULL, NULL),
(732, 46, 23, 97, NULL, NULL, NULL),
(733, 46, 24, 98, NULL, NULL, NULL),
(734, 46, 25, 101, NULL, NULL, NULL),
(735, 46, 26, 104, NULL, NULL, NULL),
(736, 46, 27, 107, NULL, NULL, NULL),
(737, 46, 28, 108, NULL, NULL, NULL),
(738, 46, 29, 110, NULL, NULL, NULL),
(739, 46, 30, 113, NULL, NULL, NULL),
(740, 46, 31, 117, NULL, NULL, NULL),
(741, 46, 32, 123, NULL, NULL, NULL),
(742, 46, 33, 125, NULL, NULL, NULL),
(743, 46, 34, 128, NULL, NULL, NULL),
(744, 46, 35, 129, NULL, NULL, NULL),
(745, 46, 36, 131, NULL, NULL, NULL),
(746, 46, 37, 133, NULL, NULL, NULL),
(747, 46, 38, 136, NULL, NULL, NULL),
(748, 46, 39, 138, NULL, NULL, NULL),
(749, 46, 40, 140, NULL, NULL, NULL),
(750, 46, 41, 142, NULL, NULL, NULL),
(751, 46, 42, 143, NULL, NULL, NULL),
(752, 46, 43, 145, NULL, NULL, NULL),
(753, 46, 44, 147, NULL, NULL, NULL),
(754, 46, 45, 149, NULL, NULL, NULL),
(755, 46, 46, 152, NULL, NULL, NULL),
(756, 46, 47, 154, NULL, NULL, NULL),
(757, 46, 48, 155, NULL, NULL, NULL),
(758, 48, 1, 1, NULL, NULL, NULL),
(759, 48, 2, 161, NULL, NULL, NULL),
(760, 48, 3, 8, NULL, NULL, NULL),
(761, 48, 4, 175, NULL, NULL, NULL),
(762, 48, 6, 24, NULL, NULL, NULL),
(763, 48, 7, 31, NULL, NULL, NULL),
(764, 48, 8, 159, NULL, NULL, NULL),
(765, 48, 9, 32, NULL, NULL, NULL),
(766, 48, 10, 36, NULL, NULL, NULL),
(767, 48, 11, 42, NULL, NULL, NULL),
(768, 48, 12, 50, NULL, NULL, NULL),
(769, 48, 13, 53, NULL, NULL, NULL),
(770, 48, 14, NULL, NULL, NULL, NULL),
(771, 48, 15, 66, NULL, NULL, NULL),
(772, 48, 16, 69, NULL, NULL, NULL),
(773, 48, 17, 82, NULL, NULL, NULL),
(774, 48, 18, 83, NULL, NULL, NULL),
(775, 48, 19, 87, NULL, NULL, NULL),
(776, 48, 20, 89, NULL, NULL, NULL),
(777, 48, 21, 93, NULL, NULL, NULL),
(778, 48, 22, 94, NULL, NULL, NULL),
(779, 48, 23, 97, NULL, NULL, NULL),
(780, 48, 24, 98, NULL, NULL, NULL),
(781, 48, 25, 100, NULL, NULL, NULL),
(782, 48, 26, 104, NULL, NULL, NULL),
(783, 48, 27, 106, NULL, NULL, NULL),
(784, 48, 28, 109, NULL, NULL, NULL),
(785, 48, 29, 111, NULL, NULL, NULL),
(786, 48, 30, 113, NULL, NULL, NULL),
(787, 48, 31, 114, NULL, NULL, NULL),
(788, 48, 32, 123, NULL, NULL, NULL),
(789, 48, 33, 126, NULL, NULL, NULL),
(790, 48, 34, 128, NULL, NULL, NULL),
(791, 48, 35, 130, NULL, NULL, NULL),
(792, 48, 36, 131, NULL, NULL, NULL),
(793, 48, 37, 133, NULL, NULL, NULL),
(794, 48, 38, 135, NULL, NULL, NULL),
(795, 48, 39, 138, NULL, NULL, NULL),
(796, 48, 40, 140, NULL, NULL, NULL),
(797, 48, 41, 142, NULL, NULL, NULL),
(798, 48, 42, 144, NULL, NULL, NULL),
(799, 48, 43, 145, NULL, NULL, NULL),
(800, 48, 44, 148, NULL, NULL, NULL),
(801, 48, 45, 150, NULL, NULL, NULL),
(802, 48, 46, 151, NULL, NULL, NULL),
(803, 48, 47, 154, NULL, NULL, NULL),
(804, 48, 48, 156, NULL, NULL, NULL),
(805, 50, 1, 1, NULL, NULL, NULL),
(806, 50, 2, 5, NULL, NULL, NULL),
(807, 50, 3, 8, NULL, NULL, NULL),
(808, 50, 4, 174, NULL, NULL, NULL),
(809, 50, 6, 24, NULL, NULL, NULL),
(810, 50, 7, 31, NULL, NULL, NULL),
(811, 50, 8, 158, NULL, NULL, NULL),
(812, 50, 9, 32, NULL, NULL, NULL),
(813, 50, 10, 36, NULL, NULL, NULL),
(814, 50, 11, 42, NULL, NULL, NULL),
(815, 50, 12, 44, NULL, NULL, NULL),
(816, 50, 13, 54, NULL, NULL, NULL),
(817, 50, 14, 61, NULL, NULL, NULL),
(818, 50, 15, 66, NULL, NULL, NULL),
(819, 50, 16, 68, NULL, NULL, NULL),
(820, 50, 17, 82, NULL, NULL, NULL),
(821, 50, 18, 83, NULL, NULL, NULL),
(822, 50, 19, 87, NULL, NULL, NULL),
(823, 50, 20, 89, NULL, NULL, NULL),
(824, 50, 21, 93, NULL, NULL, NULL),
(825, 50, 22, 94, NULL, NULL, NULL),
(826, 50, 23, 96, NULL, NULL, NULL),
(827, 50, 24, 98, NULL, NULL, NULL),
(828, 50, 25, 100, NULL, NULL, NULL),
(829, 50, 26, 103, NULL, NULL, NULL),
(830, 50, 27, 107, NULL, NULL, NULL),
(831, 50, 28, 109, NULL, NULL, NULL),
(832, 50, 29, 111, NULL, NULL, NULL),
(833, 50, 30, 113, NULL, NULL, NULL),
(834, 50, 31, 114, NULL, NULL, NULL),
(835, 50, 32, 123, NULL, NULL, NULL),
(836, 50, 33, 126, NULL, NULL, NULL),
(837, 50, 34, 128, NULL, NULL, NULL),
(838, 50, 35, 130, NULL, NULL, NULL),
(839, 50, 36, 131, NULL, NULL, NULL),
(840, 50, 37, 133, NULL, NULL, NULL),
(841, 50, 38, 136, NULL, NULL, NULL),
(842, 50, 39, 138, NULL, NULL, NULL),
(843, 50, 40, 140, NULL, NULL, NULL),
(844, 50, 41, 141, NULL, NULL, NULL),
(845, 50, 42, 143, NULL, NULL, NULL),
(846, 50, 43, 145, NULL, NULL, NULL),
(847, 50, 44, 148, NULL, NULL, NULL),
(848, 50, 45, 150, NULL, NULL, NULL),
(849, 50, 46, 152, NULL, NULL, NULL),
(850, 50, 47, 154, NULL, NULL, NULL),
(851, 50, 48, 155, NULL, NULL, NULL),
(852, 38, 1, 2, NULL, NULL, NULL),
(853, 38, 2, 4, NULL, NULL, NULL),
(854, 38, 3, 6, NULL, NULL, NULL),
(855, 38, 4, 170, NULL, NULL, NULL),
(856, 38, 6, 26, NULL, NULL, NULL),
(857, 38, 7, 31, NULL, NULL, NULL),
(858, 38, 8, 158, NULL, NULL, NULL),
(859, 38, 9, 33, NULL, NULL, NULL),
(860, 38, 10, NULL, NULL, NULL, NULL),
(861, 38, 11, 41, NULL, NULL, NULL),
(862, 38, 12, NULL, NULL, NULL, NULL),
(863, 38, 13, 54, NULL, NULL, NULL),
(864, 38, 14, 57, NULL, NULL, NULL),
(865, 38, 15, 66, NULL, NULL, NULL),
(866, 38, 16, 68, NULL, NULL, NULL),
(867, 38, 17, 82, NULL, NULL, NULL),
(868, 38, 18, 84, NULL, NULL, NULL),
(869, 38, 19, 87, NULL, NULL, NULL),
(870, 38, 20, 90, NULL, NULL, NULL),
(871, 38, 21, 93, NULL, NULL, NULL),
(872, 38, 22, 95, NULL, NULL, NULL),
(873, 38, 23, 96, NULL, NULL, NULL),
(874, 38, 24, 99, NULL, NULL, NULL),
(875, 38, 25, 100, NULL, NULL, NULL),
(876, 38, 26, 103, NULL, NULL, NULL),
(877, 38, 27, 107, NULL, NULL, NULL),
(878, 38, 28, 109, NULL, NULL, NULL),
(879, 38, 29, 110, NULL, NULL, NULL),
(880, 38, 30, 112, NULL, NULL, NULL),
(881, 38, 31, 114, NULL, NULL, NULL),
(882, 38, 32, 121, NULL, NULL, NULL),
(883, 38, 33, 125, NULL, NULL, NULL),
(884, 38, 34, 128, NULL, NULL, NULL),
(885, 38, 35, 129, NULL, NULL, NULL),
(886, 38, 36, 131, NULL, NULL, NULL),
(887, 38, 37, 133, NULL, NULL, NULL),
(888, 38, 38, 136, NULL, NULL, NULL),
(889, 38, 39, 137, NULL, NULL, NULL),
(890, 38, 40, 139, NULL, NULL, NULL),
(891, 38, 41, 141, NULL, NULL, NULL),
(892, 38, 42, 143, NULL, NULL, NULL),
(893, 38, 43, 145, NULL, NULL, NULL),
(894, 38, 44, 148, NULL, NULL, NULL),
(895, 38, 45, 149, NULL, NULL, NULL),
(896, 38, 46, 151, NULL, NULL, NULL),
(897, 38, 47, 154, NULL, NULL, NULL),
(898, 38, 48, 155, NULL, NULL, NULL),
(899, 41, 1, 1, NULL, NULL, NULL),
(900, 41, 2, 160, NULL, NULL, NULL),
(901, 41, 3, 6, NULL, NULL, NULL),
(902, 41, 4, 172, NULL, NULL, NULL),
(903, 41, 6, 24, NULL, NULL, NULL),
(904, 41, 7, 31, NULL, NULL, NULL),
(905, 41, 8, 158, NULL, NULL, NULL),
(906, 41, 9, 33, NULL, NULL, NULL),
(907, 41, 10, NULL, NULL, NULL, NULL),
(908, 41, 11, 41, NULL, NULL, NULL),
(909, 41, 12, NULL, NULL, NULL, NULL),
(910, 41, 13, 53, NULL, NULL, NULL),
(911, 41, 14, NULL, NULL, NULL, NULL),
(912, 41, 15, 65, NULL, NULL, NULL),
(913, 41, 16, NULL, NULL, NULL, NULL),
(914, 41, 17, 82, NULL, NULL, NULL),
(915, 41, 18, 83, NULL, NULL, NULL),
(916, 41, 19, 87, NULL, NULL, NULL),
(917, 41, 20, 89, NULL, NULL, NULL),
(918, 41, 21, 93, NULL, NULL, NULL),
(919, 41, 22, 94, NULL, NULL, NULL),
(920, 41, 23, 97, NULL, NULL, NULL),
(921, 41, 24, 98, NULL, NULL, NULL),
(922, 41, 25, 101, NULL, NULL, NULL),
(923, 41, 26, 103, NULL, NULL, NULL),
(924, 41, 27, 107, NULL, NULL, NULL),
(925, 41, 28, 109, NULL, NULL, NULL),
(926, 41, 29, 110, NULL, NULL, NULL),
(927, 41, 30, 113, NULL, NULL, NULL),
(928, 41, 31, 117, NULL, NULL, NULL),
(929, 41, 32, 122, NULL, NULL, NULL),
(930, 41, 33, 125, NULL, NULL, NULL),
(931, 41, 34, 127, NULL, NULL, NULL),
(932, 41, 35, 130, NULL, NULL, NULL),
(933, 41, 36, 131, NULL, NULL, NULL),
(934, 41, 37, 133, NULL, NULL, NULL),
(935, 41, 38, 135, NULL, NULL, NULL),
(936, 41, 39, 138, NULL, NULL, NULL),
(937, 41, 40, 140, NULL, NULL, NULL),
(938, 41, 41, 142, NULL, NULL, NULL),
(939, 41, 42, 144, NULL, NULL, NULL),
(940, 41, 43, 145, NULL, NULL, NULL),
(941, 41, 44, 148, NULL, NULL, NULL),
(942, 41, 45, 150, NULL, NULL, NULL),
(943, 41, 46, 151, NULL, NULL, NULL),
(944, 41, 47, 154, NULL, NULL, NULL),
(945, 41, 48, 155, NULL, NULL, NULL),
(946, 42, 1, 2, NULL, NULL, NULL),
(947, 42, 2, 4, NULL, NULL, NULL),
(948, 42, 3, 8, NULL, NULL, NULL),
(949, 42, 4, 172, NULL, NULL, NULL),
(950, 42, 6, 24, NULL, NULL, NULL),
(951, 42, 7, 31, NULL, NULL, NULL),
(952, 42, 8, 158, NULL, NULL, NULL),
(953, 42, 9, 32, NULL, NULL, NULL),
(954, 42, 10, 36, NULL, NULL, NULL),
(955, 42, 11, 41, NULL, NULL, NULL),
(956, 42, 12, NULL, NULL, NULL, NULL),
(957, 42, 13, 54, NULL, NULL, NULL),
(958, 42, 14, 56, NULL, NULL, NULL),
(959, 42, 15, 66, NULL, NULL, NULL),
(960, 42, 16, 68, NULL, NULL, NULL),
(961, 42, 17, 81, NULL, NULL, NULL),
(962, 42, 18, 83, NULL, NULL, NULL),
(963, 42, 19, 86, NULL, NULL, NULL),
(964, 42, 20, 89, NULL, NULL, NULL),
(965, 42, 21, 92, NULL, NULL, NULL),
(966, 42, 22, 94, NULL, NULL, NULL),
(967, 42, 23, 96, NULL, NULL, NULL),
(968, 42, 24, 98, NULL, NULL, NULL),
(969, 42, 25, 101, NULL, NULL, NULL),
(970, 42, 26, 103, NULL, NULL, NULL),
(971, 42, 27, 106, NULL, NULL, NULL),
(972, 42, 28, 108, NULL, NULL, NULL),
(973, 42, 29, 110, NULL, NULL, NULL),
(974, 42, 30, 112, NULL, NULL, NULL),
(975, 42, 31, 118, NULL, NULL, NULL),
(976, 42, 32, 122, NULL, NULL, NULL),
(977, 42, 33, 126, NULL, NULL, NULL),
(978, 42, 34, 128, NULL, NULL, NULL),
(979, 42, 35, 130, NULL, NULL, NULL),
(980, 42, 36, 131, NULL, NULL, NULL),
(981, 42, 37, 133, NULL, NULL, NULL),
(982, 42, 38, 136, NULL, NULL, NULL),
(983, 42, 39, 137, NULL, NULL, NULL),
(984, 42, 40, 140, NULL, NULL, NULL),
(985, 42, 41, 142, NULL, NULL, NULL),
(986, 42, 42, 144, NULL, NULL, NULL),
(987, 42, 43, 146, NULL, NULL, NULL),
(988, 42, 44, 148, NULL, NULL, NULL),
(989, 42, 45, 149, NULL, NULL, NULL),
(990, 42, 46, 152, NULL, NULL, NULL),
(991, 42, 47, 154, NULL, NULL, NULL),
(992, 42, 48, 155, NULL, NULL, NULL),
(993, 43, 1, 1, NULL, NULL, NULL),
(994, 43, 2, 160, NULL, NULL, NULL),
(995, 43, 3, 8, NULL, NULL, NULL),
(996, 43, 4, 173, NULL, NULL, NULL),
(997, 43, 6, 27, NULL, NULL, NULL),
(998, 43, 7, 31, NULL, NULL, NULL),
(999, 43, 8, 158, NULL, NULL, NULL),
(1000, 43, 9, 32, NULL, NULL, NULL),
(1001, 43, 10, 35, NULL, NULL, NULL),
(1002, 43, 11, 41, NULL, NULL, NULL),
(1003, 43, 12, NULL, NULL, NULL, NULL),
(1004, 43, 13, 53, NULL, NULL, NULL),
(1005, 43, 14, NULL, NULL, NULL, NULL),
(1006, 43, 15, 65, NULL, NULL, NULL),
(1007, 43, 16, NULL, NULL, NULL, NULL),
(1008, 43, 17, 82, NULL, NULL, NULL),
(1009, 43, 18, 83, NULL, NULL, NULL),
(1010, 43, 19, 87, NULL, NULL, NULL),
(1011, 43, 20, 89, NULL, NULL, NULL),
(1012, 43, 21, 93, NULL, NULL, NULL),
(1013, 43, 22, 94, NULL, NULL, NULL),
(1014, 43, 23, 96, NULL, NULL, NULL),
(1015, 43, 24, 98, NULL, NULL, NULL),
(1016, 43, 25, 100, NULL, NULL, NULL),
(1017, 43, 26, 104, NULL, NULL, NULL),
(1018, 43, 27, 106, NULL, NULL, NULL),
(1019, 43, 28, 108, NULL, NULL, NULL),
(1020, 43, 29, 111, NULL, NULL, NULL),
(1021, 43, 30, 112, NULL, NULL, NULL),
(1022, 43, 31, 116, NULL, NULL, NULL),
(1023, 43, 32, 122, NULL, NULL, NULL),
(1024, 43, 33, 125, NULL, NULL, NULL),
(1025, 43, 34, 128, NULL, NULL, NULL),
(1026, 43, 35, 129, NULL, NULL, NULL),
(1027, 43, 36, 132, NULL, NULL, NULL),
(1028, 43, 37, 133, NULL, NULL, NULL),
(1029, 43, 38, 136, NULL, NULL, NULL),
(1030, 43, 39, 138, NULL, NULL, NULL),
(1031, 43, 40, 140, NULL, NULL, NULL),
(1032, 43, 41, 142, NULL, NULL, NULL),
(1033, 43, 42, 143, NULL, NULL, NULL),
(1034, 43, 43, 145, NULL, NULL, NULL),
(1035, 43, 44, 148, NULL, NULL, NULL),
(1036, 43, 45, 150, NULL, NULL, NULL),
(1037, 43, 46, 152, NULL, NULL, NULL),
(1038, 43, 47, 154, NULL, NULL, NULL),
(1039, 43, 48, 155, NULL, NULL, NULL),
(1040, 49, 1, 1, NULL, NULL, NULL),
(1041, 49, 2, 160, NULL, NULL, NULL),
(1042, 49, 3, 8, NULL, NULL, NULL),
(1043, 49, 4, 170, NULL, NULL, NULL),
(1044, 49, 6, 24, NULL, NULL, NULL),
(1045, 49, 7, 31, NULL, NULL, NULL),
(1046, 49, 8, 158, NULL, NULL, NULL),
(1047, 49, 9, 32, NULL, NULL, NULL),
(1048, 49, 10, 36, NULL, NULL, NULL),
(1049, 49, 11, 42, NULL, NULL, NULL),
(1050, 49, 12, 44, NULL, NULL, NULL),
(1051, 49, 13, 53, NULL, NULL, NULL),
(1052, 49, 14, NULL, NULL, NULL, NULL),
(1053, 49, 15, 65, NULL, NULL, NULL),
(1054, 49, 16, NULL, NULL, NULL, NULL),
(1055, 49, 17, 81, NULL, NULL, NULL),
(1056, 49, 18, 83, NULL, NULL, NULL),
(1057, 49, 19, 87, NULL, NULL, NULL),
(1058, 49, 20, 89, NULL, NULL, NULL),
(1059, 49, 21, 92, NULL, NULL, NULL),
(1060, 49, 22, 94, NULL, NULL, NULL),
(1061, 49, 23, 96, NULL, NULL, NULL),
(1062, 49, 24, 98, NULL, NULL, NULL),
(1063, 49, 25, 100, NULL, NULL, NULL),
(1064, 49, 26, 105, NULL, NULL, NULL),
(1065, 49, 27, 107, NULL, NULL, NULL),
(1066, 49, 28, 108, NULL, NULL, NULL),
(1067, 49, 29, 111, NULL, NULL, NULL),
(1068, 49, 30, 112, NULL, NULL, NULL),
(1069, 49, 31, 118, NULL, NULL, NULL),
(1070, 49, 32, 124, NULL, NULL, NULL),
(1071, 49, 33, 126, NULL, NULL, NULL),
(1072, 49, 34, 128, NULL, NULL, NULL),
(1073, 49, 35, 130, NULL, NULL, NULL),
(1074, 49, 36, 131, NULL, NULL, NULL),
(1075, 49, 37, 134, NULL, NULL, NULL),
(1076, 49, 38, 136, NULL, NULL, NULL),
(1077, 49, 39, 137, NULL, NULL, NULL),
(1078, 49, 40, 140, NULL, NULL, NULL),
(1079, 49, 41, 142, NULL, NULL, NULL),
(1080, 49, 42, 144, NULL, NULL, NULL),
(1081, 49, 43, 145, NULL, NULL, NULL),
(1082, 49, 44, 147, NULL, NULL, NULL),
(1083, 49, 45, 149, NULL, NULL, NULL),
(1084, 49, 46, 152, NULL, NULL, NULL),
(1085, 49, 47, 154, NULL, NULL, NULL),
(1086, 49, 48, 156, NULL, NULL, NULL),
(1087, 51, 1, 1, NULL, NULL, NULL),
(1088, 51, 2, 5, NULL, NULL, NULL),
(1089, 51, 3, 8, NULL, NULL, NULL),
(1090, 51, 4, 172, NULL, NULL, NULL),
(1091, 51, 6, 24, NULL, NULL, NULL),
(1092, 51, 7, 31, NULL, NULL, NULL),
(1093, 51, 8, 158, NULL, NULL, NULL),
(1094, 51, 9, 32, NULL, NULL, NULL),
(1095, 51, 10, 35, NULL, NULL, NULL),
(1096, 51, 11, 41, NULL, NULL, NULL),
(1097, 51, 12, NULL, NULL, NULL, NULL),
(1098, 51, 13, 53, NULL, NULL, NULL),
(1099, 51, 14, NULL, NULL, NULL, NULL),
(1100, 51, 15, 65, NULL, NULL, NULL),
(1101, 51, 16, NULL, NULL, NULL, NULL),
(1102, 51, 17, 82, NULL, NULL, NULL),
(1103, 51, 18, 83, NULL, NULL, NULL),
(1104, 51, 19, 87, NULL, NULL, NULL),
(1105, 51, 20, 89, NULL, NULL, NULL),
(1106, 51, 21, 92, NULL, NULL, NULL),
(1107, 51, 22, 94, NULL, NULL, NULL),
(1108, 51, 23, 96, NULL, NULL, NULL),
(1109, 51, 24, 98, NULL, NULL, NULL),
(1110, 51, 25, 100, NULL, NULL, NULL),
(1111, 51, 26, 104, NULL, NULL, NULL),
(1112, 51, 27, 106, NULL, NULL, NULL),
(1113, 51, 28, 108, NULL, NULL, NULL),
(1114, 51, 29, 110, NULL, NULL, NULL),
(1115, 51, 30, 112, NULL, NULL, NULL),
(1116, 51, 31, 118, NULL, NULL, NULL),
(1117, 51, 32, 119, NULL, NULL, NULL),
(1118, 51, 33, 126, NULL, NULL, NULL),
(1119, 51, 34, 128, NULL, NULL, NULL),
(1120, 51, 35, 129, NULL, NULL, NULL),
(1121, 51, 36, 131, NULL, NULL, NULL),
(1122, 51, 37, 134, NULL, NULL, NULL),
(1123, 51, 38, 136, NULL, NULL, NULL),
(1124, 51, 39, 138, NULL, NULL, NULL),
(1125, 51, 40, 140, NULL, NULL, NULL),
(1126, 51, 41, 142, NULL, NULL, NULL),
(1127, 51, 42, 144, NULL, NULL, NULL),
(1128, 51, 43, 146, NULL, NULL, NULL),
(1129, 51, 44, 148, NULL, NULL, NULL),
(1130, 51, 45, 149, NULL, NULL, NULL),
(1131, 51, 46, 151, NULL, NULL, NULL),
(1132, 51, 47, 154, NULL, NULL, NULL),
(1133, 51, 48, 155, NULL, NULL, NULL),
(1134, 52, 1, 1, NULL, NULL, NULL),
(1135, 52, 2, 5, NULL, NULL, NULL),
(1136, 52, 3, 8, NULL, NULL, NULL),
(1137, 52, 4, 178, NULL, NULL, NULL),
(1138, 52, 6, 27, NULL, NULL, NULL),
(1139, 52, 7, 31, NULL, NULL, NULL),
(1140, 52, 8, 158, NULL, NULL, NULL),
(1141, 52, 9, 32, NULL, NULL, NULL),
(1142, 52, 10, 35, NULL, NULL, NULL),
(1143, 52, 11, 41, NULL, NULL, NULL),
(1144, 52, 12, NULL, NULL, NULL, NULL),
(1145, 52, 13, 53, NULL, NULL, NULL),
(1146, 52, 14, NULL, NULL, NULL, NULL),
(1147, 52, 15, 65, NULL, NULL, NULL),
(1148, 52, 16, NULL, NULL, NULL, NULL),
(1149, 52, 17, 82, NULL, NULL, NULL),
(1150, 52, 18, 83, NULL, NULL, NULL),
(1151, 52, 19, 88, NULL, NULL, NULL),
(1152, 52, 20, 89, NULL, NULL, NULL),
(1153, 52, 21, 92, NULL, NULL, NULL),
(1154, 52, 22, 94, NULL, NULL, NULL),
(1155, 52, 23, 97, NULL, NULL, NULL),
(1156, 52, 24, 98, NULL, NULL, NULL),
(1157, 52, 25, 100, NULL, NULL, NULL),
(1158, 52, 26, 104, NULL, NULL, NULL),
(1159, 52, 27, 107, NULL, NULL, NULL),
(1160, 52, 28, 108, NULL, NULL, NULL),
(1161, 52, 29, 111, NULL, NULL, NULL),
(1162, 52, 30, 113, NULL, NULL, NULL),
(1163, 52, 31, 116, NULL, NULL, NULL),
(1164, 52, 32, 122, NULL, NULL, NULL),
(1165, 52, 33, 126, NULL, NULL, NULL),
(1166, 52, 34, 127, NULL, NULL, NULL),
(1167, 52, 35, 129, NULL, NULL, NULL),
(1168, 52, 36, 132, NULL, NULL, NULL),
(1169, 52, 37, 134, NULL, NULL, NULL),
(1170, 52, 38, 136, NULL, NULL, NULL),
(1171, 52, 39, 138, NULL, NULL, NULL),
(1172, 52, 40, 140, NULL, NULL, NULL),
(1173, 52, 41, 142, NULL, NULL, NULL),
(1174, 52, 42, 144, NULL, NULL, NULL),
(1175, 52, 43, 145, NULL, NULL, NULL),
(1176, 52, 44, 148, NULL, NULL, NULL),
(1177, 52, 45, 150, NULL, NULL, NULL),
(1178, 52, 46, 152, NULL, NULL, NULL),
(1179, 52, 47, 154, NULL, NULL, NULL),
(1180, 52, 48, 155, NULL, NULL, NULL),
(1181, 53, 1, 1, NULL, NULL, NULL),
(1182, 53, 2, 5, NULL, NULL, NULL),
(1183, 53, 3, 8, NULL, NULL, NULL),
(1184, 53, 4, 171, NULL, NULL, NULL),
(1185, 53, 6, 24, NULL, NULL, NULL),
(1186, 53, 7, 31, NULL, NULL, NULL),
(1187, 53, 8, 158, NULL, NULL, NULL),
(1188, 53, 9, 33, NULL, NULL, NULL),
(1189, 53, 10, NULL, NULL, NULL, NULL),
(1190, 53, 11, 42, NULL, NULL, NULL),
(1191, 53, 12, 50, NULL, NULL, NULL),
(1192, 53, 13, 54, NULL, NULL, NULL),
(1193, 53, 14, 59, NULL, NULL, NULL),
(1194, 53, 15, 65, NULL, NULL, NULL),
(1195, 53, 16, NULL, NULL, NULL, NULL),
(1196, 53, 17, 82, NULL, NULL, NULL),
(1197, 53, 18, 83, NULL, NULL, NULL),
(1198, 53, 19, 88, NULL, NULL, NULL),
(1199, 53, 20, 89, NULL, NULL, NULL),
(1200, 53, 21, 93, NULL, NULL, NULL),
(1201, 53, 22, 94, NULL, NULL, NULL),
(1202, 53, 23, 96, NULL, NULL, NULL),
(1203, 53, 24, 98, NULL, NULL, NULL),
(1204, 53, 25, 100, NULL, NULL, NULL),
(1205, 53, 26, 103, NULL, NULL, NULL),
(1206, 53, 27, 106, NULL, NULL, NULL),
(1207, 53, 28, 109, NULL, NULL, NULL),
(1208, 53, 29, 111, NULL, NULL, NULL),
(1209, 53, 30, 112, NULL, NULL, NULL),
(1210, 53, 31, 116, NULL, NULL, NULL),
(1211, 53, 32, 121, NULL, NULL, NULL),
(1212, 53, 33, 126, NULL, NULL, NULL),
(1213, 53, 34, 128, NULL, NULL, NULL),
(1214, 53, 35, 130, NULL, NULL, NULL),
(1215, 53, 36, 131, NULL, NULL, NULL),
(1216, 53, 37, 133, NULL, NULL, NULL),
(1217, 53, 38, 136, NULL, NULL, NULL),
(1218, 53, 39, 138, NULL, NULL, NULL),
(1219, 53, 40, 140, NULL, NULL, NULL),
(1220, 53, 41, 142, NULL, NULL, NULL),
(1221, 53, 42, 144, NULL, NULL, NULL),
(1222, 53, 43, 145, NULL, NULL, NULL),
(1223, 53, 44, 148, NULL, NULL, NULL),
(1224, 53, 45, 149, NULL, NULL, NULL),
(1225, 53, 46, 152, NULL, NULL, NULL),
(1226, 53, 47, 154, NULL, NULL, NULL),
(1227, 53, 48, 155, NULL, NULL, NULL),
(1228, 54, 1, 1, NULL, NULL, NULL),
(1229, 54, 2, 5, NULL, NULL, NULL),
(1230, 54, 3, 8, NULL, NULL, NULL),
(1231, 54, 4, 172, NULL, NULL, NULL),
(1232, 54, 6, 24, NULL, NULL, NULL),
(1233, 54, 7, 31, NULL, NULL, NULL),
(1234, 54, 8, 158, NULL, NULL, NULL),
(1235, 54, 9, 32, NULL, NULL, NULL),
(1236, 54, 10, 36, NULL, NULL, NULL),
(1237, 54, 11, 41, NULL, NULL, NULL),
(1238, 54, 12, NULL, NULL, NULL, NULL),
(1239, 54, 13, 53, NULL, NULL, NULL),
(1240, 54, 14, NULL, NULL, NULL, NULL),
(1241, 54, 15, 65, NULL, NULL, NULL),
(1242, 54, 16, NULL, NULL, NULL, NULL),
(1243, 54, 17, 82, NULL, NULL, NULL),
(1244, 54, 18, 83, NULL, NULL, NULL),
(1245, 54, 19, 87, NULL, NULL, NULL),
(1246, 54, 20, 89, NULL, NULL, NULL),
(1247, 54, 21, 92, NULL, NULL, NULL),
(1248, 54, 22, 94, NULL, NULL, NULL),
(1249, 54, 23, 96, NULL, NULL, NULL),
(1250, 54, 24, 99, NULL, NULL, NULL),
(1251, 54, 25, 101, NULL, NULL, NULL),
(1252, 54, 26, 102, NULL, NULL, NULL),
(1253, 54, 27, 107, NULL, NULL, NULL),
(1254, 54, 28, 109, NULL, NULL, NULL),
(1255, 54, 29, 111, NULL, NULL, NULL),
(1256, 54, 30, 113, NULL, NULL, NULL),
(1257, 54, 31, 117, NULL, NULL, NULL),
(1258, 54, 32, 123, NULL, NULL, NULL),
(1259, 54, 33, 126, NULL, NULL, NULL),
(1260, 54, 34, 128, NULL, NULL, NULL),
(1261, 54, 35, 129, NULL, NULL, NULL),
(1262, 54, 36, 131, NULL, NULL, NULL),
(1263, 54, 37, 133, NULL, NULL, NULL),
(1264, 54, 38, 136, NULL, NULL, NULL),
(1265, 54, 39, 138, NULL, NULL, NULL),
(1266, 54, 40, 140, NULL, NULL, NULL),
(1267, 54, 41, 142, NULL, NULL, NULL),
(1268, 54, 42, 143, NULL, NULL, NULL),
(1269, 54, 43, 145, NULL, NULL, NULL),
(1270, 54, 44, 148, NULL, NULL, NULL),
(1271, 54, 45, 150, NULL, NULL, NULL),
(1272, 54, 46, 151, NULL, NULL, NULL),
(1273, 54, 47, 154, NULL, NULL, NULL),
(1274, 54, 48, 155, NULL, NULL, NULL),
(1275, 55, 1, 1, NULL, NULL, NULL),
(1276, 55, 2, 5, NULL, NULL, NULL),
(1277, 55, 3, 7, NULL, NULL, NULL),
(1278, 55, 4, 174, NULL, NULL, NULL),
(1279, 55, 6, 24, NULL, NULL, NULL),
(1280, 55, 7, 31, NULL, NULL, NULL),
(1281, 55, 8, 158, NULL, NULL, NULL),
(1282, 55, 9, 32, NULL, NULL, NULL),
(1283, 55, 10, 37, NULL, NULL, NULL),
(1284, 55, 11, 41, NULL, NULL, NULL),
(1285, 55, 12, NULL, NULL, NULL, NULL),
(1286, 55, 13, 53, NULL, NULL, NULL),
(1287, 55, 14, NULL, NULL, NULL, NULL),
(1288, 55, 15, 65, NULL, NULL, NULL),
(1289, 55, 16, NULL, NULL, NULL, NULL),
(1290, 55, 17, 81, NULL, NULL, NULL),
(1291, 55, 18, 83, NULL, NULL, NULL),
(1292, 55, 19, 87, NULL, NULL, NULL),
(1293, 55, 20, 89, NULL, NULL, NULL),
(1294, 55, 21, 92, NULL, NULL, NULL),
(1295, 55, 22, 94, NULL, NULL, NULL),
(1296, 55, 23, 96, NULL, NULL, NULL),
(1297, 55, 24, 98, NULL, NULL, NULL),
(1298, 55, 25, 101, NULL, NULL, NULL),
(1299, 55, 26, 102, NULL, NULL, NULL),
(1300, 55, 27, 106, NULL, NULL, NULL),
(1301, 55, 28, 108, NULL, NULL, NULL),
(1302, 55, 29, 110, NULL, NULL, NULL),
(1303, 55, 30, 112, NULL, NULL, NULL),
(1304, 55, 31, 114, NULL, NULL, NULL),
(1305, 55, 32, 120, NULL, NULL, NULL),
(1306, 55, 33, 125, NULL, NULL, NULL),
(1307, 55, 34, 128, NULL, NULL, NULL),
(1308, 55, 35, 129, NULL, NULL, NULL),
(1309, 55, 36, 132, NULL, NULL, NULL),
(1310, 55, 37, 133, NULL, NULL, NULL),
(1311, 55, 38, 136, NULL, NULL, NULL),
(1312, 55, 39, 138, NULL, NULL, NULL),
(1313, 55, 40, 140, NULL, NULL, NULL),
(1314, 55, 41, 142, NULL, NULL, NULL),
(1315, 55, 42, 143, NULL, NULL, NULL),
(1316, 55, 43, 146, NULL, NULL, NULL),
(1317, 55, 44, 148, NULL, NULL, NULL),
(1318, 55, 45, 150, NULL, NULL, NULL),
(1319, 55, 46, 151, NULL, NULL, NULL),
(1320, 55, 47, 154, NULL, NULL, NULL),
(1321, 55, 48, 155, NULL, NULL, NULL),
(1322, 56, 1, 1, NULL, NULL, NULL),
(1323, 56, 2, 5, NULL, NULL, NULL),
(1324, 56, 3, 8, NULL, NULL, NULL),
(1325, 56, 4, 175, NULL, NULL, NULL),
(1326, 56, 6, 27, NULL, NULL, NULL),
(1327, 56, 7, 31, NULL, NULL, NULL),
(1328, 56, 8, 159, NULL, NULL, NULL),
(1329, 56, 9, 32, NULL, NULL, NULL),
(1330, 56, 10, 36, NULL, NULL, NULL),
(1331, 56, 11, 42, NULL, NULL, NULL),
(1332, 56, 12, 46, NULL, NULL, NULL),
(1333, 56, 13, 53, NULL, NULL, NULL),
(1334, 56, 14, NULL, NULL, NULL, NULL),
(1335, 56, 15, 66, NULL, NULL, NULL),
(1336, 56, 16, 69, NULL, NULL, NULL),
(1337, 56, 17, 81, NULL, NULL, NULL),
(1338, 56, 18, 84, NULL, NULL, NULL),
(1339, 56, 19, 87, NULL, NULL, NULL),
(1340, 56, 20, 89, NULL, NULL, NULL),
(1341, 56, 21, 92, NULL, NULL, NULL),
(1342, 56, 22, 94, NULL, NULL, NULL),
(1343, 56, 23, 96, NULL, NULL, NULL),
(1344, 56, 24, 99, NULL, NULL, NULL),
(1345, 56, 25, 100, NULL, NULL, NULL),
(1346, 56, 26, 104, NULL, NULL, NULL),
(1347, 56, 27, 107, NULL, NULL, NULL),
(1348, 56, 28, 108, NULL, NULL, NULL),
(1349, 56, 29, 110, NULL, NULL, NULL),
(1350, 56, 30, 113, NULL, NULL, NULL),
(1351, 56, 31, 114, NULL, NULL, NULL),
(1352, 56, 32, 123, NULL, NULL, NULL),
(1353, 56, 33, 126, NULL, NULL, NULL),
(1354, 56, 34, 128, NULL, NULL, NULL),
(1355, 56, 35, 129, NULL, NULL, NULL),
(1356, 56, 36, 132, NULL, NULL, NULL),
(1357, 56, 37, 133, NULL, NULL, NULL),
(1358, 56, 38, 136, NULL, NULL, NULL),
(1359, 56, 39, 138, NULL, NULL, NULL),
(1360, 56, 40, 140, NULL, NULL, NULL),
(1361, 56, 41, 142, NULL, NULL, NULL),
(1362, 56, 42, 143, NULL, NULL, NULL),
(1363, 56, 43, 145, NULL, NULL, NULL),
(1364, 56, 44, 148, NULL, NULL, NULL),
(1365, 56, 45, 150, NULL, NULL, NULL),
(1366, 56, 46, 151, NULL, NULL, NULL),
(1367, 56, 47, 154, NULL, NULL, NULL),
(1368, 56, 48, 156, NULL, NULL, NULL),
(1369, 57, 1, 1, NULL, NULL, NULL),
(1370, 57, 2, 161, NULL, NULL, NULL),
(1371, 57, 3, 8, NULL, NULL, NULL),
(1372, 57, 4, 177, NULL, NULL, NULL),
(1373, 57, 6, 24, NULL, NULL, NULL),
(1374, 57, 7, 31, NULL, NULL, NULL),
(1375, 57, 8, 158, NULL, NULL, NULL),
(1376, 57, 9, 33, NULL, NULL, NULL),
(1377, 57, 10, NULL, NULL, NULL, NULL),
(1378, 57, 11, 41, NULL, NULL, NULL),
(1379, 57, 12, NULL, NULL, NULL, NULL),
(1380, 57, 13, 53, NULL, NULL, NULL),
(1381, 57, 14, NULL, NULL, NULL, NULL),
(1382, 57, 15, 65, NULL, NULL, NULL),
(1383, 57, 16, NULL, NULL, NULL, NULL),
(1384, 57, 17, 82, NULL, NULL, NULL),
(1385, 57, 18, 83, NULL, NULL, NULL),
(1386, 57, 19, 87, NULL, NULL, NULL),
(1387, 57, 20, 89, NULL, NULL, NULL),
(1388, 57, 21, 92, NULL, NULL, NULL),
(1389, 57, 22, 94, NULL, NULL, NULL),
(1390, 57, 23, 96, NULL, NULL, NULL),
(1391, 57, 24, 98, NULL, NULL, NULL),
(1392, 57, 25, 101, NULL, NULL, NULL),
(1393, 57, 26, 104, NULL, NULL, NULL),
(1394, 57, 27, 106, NULL, NULL, NULL),
(1395, 57, 28, 108, NULL, NULL, NULL),
(1396, 57, 29, 110, NULL, NULL, NULL),
(1397, 57, 30, 112, NULL, NULL, NULL);
INSERT INTO `pro_personal_attribute` (`id_pro_personal_attribute`, `id_pegawai`, `id_mst_personal_attribute`, `id_mst_personal_attribute_grade`, `created_date`, `created_id_user`, `created_ip_address`) VALUES
(1398, 57, 31, 116, NULL, NULL, NULL),
(1399, 57, 32, 123, NULL, NULL, NULL),
(1400, 57, 33, 126, NULL, NULL, NULL),
(1401, 57, 34, 128, NULL, NULL, NULL),
(1402, 57, 35, 130, NULL, NULL, NULL),
(1403, 57, 36, 131, NULL, NULL, NULL),
(1404, 57, 37, 133, NULL, NULL, NULL),
(1405, 57, 38, 135, NULL, NULL, NULL),
(1406, 57, 39, 138, NULL, NULL, NULL),
(1407, 57, 40, 139, NULL, NULL, NULL),
(1408, 57, 41, 142, NULL, NULL, NULL),
(1409, 57, 42, 144, NULL, NULL, NULL),
(1410, 57, 43, 146, NULL, NULL, NULL),
(1411, 57, 44, 148, NULL, NULL, NULL),
(1412, 57, 45, 150, NULL, NULL, NULL),
(1413, 57, 46, 151, NULL, NULL, NULL),
(1414, 57, 47, 154, NULL, NULL, NULL),
(1415, 57, 48, 156, NULL, NULL, NULL),
(1416, 58, 1, 1, NULL, NULL, NULL),
(1417, 58, 2, 5, NULL, NULL, NULL),
(1418, 58, 3, 7, NULL, NULL, NULL),
(1419, 58, 4, 175, NULL, NULL, NULL),
(1420, 58, 6, 27, NULL, NULL, NULL),
(1421, 58, 7, 31, NULL, NULL, NULL),
(1422, 58, 8, 159, NULL, NULL, NULL),
(1423, 58, 9, 32, NULL, NULL, NULL),
(1424, 58, 10, 36, NULL, NULL, NULL),
(1425, 58, 11, 41, NULL, NULL, NULL),
(1426, 58, 12, NULL, NULL, NULL, NULL),
(1427, 58, 13, 53, NULL, NULL, NULL),
(1428, 58, 14, NULL, NULL, NULL, NULL),
(1429, 58, 15, 65, NULL, NULL, NULL),
(1430, 58, 16, NULL, NULL, NULL, NULL),
(1431, 58, 17, 82, NULL, NULL, NULL),
(1432, 58, 18, 83, NULL, NULL, NULL),
(1433, 58, 19, 87, NULL, NULL, NULL),
(1434, 58, 20, 89, NULL, NULL, NULL),
(1435, 58, 21, 92, NULL, NULL, NULL),
(1436, 58, 22, 94, NULL, NULL, NULL),
(1437, 58, 23, 96, NULL, NULL, NULL),
(1438, 58, 24, 98, NULL, NULL, NULL),
(1439, 58, 25, 100, NULL, NULL, NULL),
(1440, 58, 26, 103, NULL, NULL, NULL),
(1441, 58, 27, 106, NULL, NULL, NULL),
(1442, 58, 28, 109, NULL, NULL, NULL),
(1443, 58, 29, 111, NULL, NULL, NULL),
(1444, 58, 30, 112, NULL, NULL, NULL),
(1445, 58, 31, 114, NULL, NULL, NULL),
(1446, 58, 32, 123, NULL, NULL, NULL),
(1447, 58, 33, 126, NULL, NULL, NULL),
(1448, 58, 34, 128, NULL, NULL, NULL),
(1449, 58, 35, 130, NULL, NULL, NULL),
(1450, 58, 36, 131, NULL, NULL, NULL),
(1451, 58, 37, 133, NULL, NULL, NULL),
(1452, 58, 38, 135, NULL, NULL, NULL),
(1453, 58, 39, 137, NULL, NULL, NULL),
(1454, 58, 40, 140, NULL, NULL, NULL),
(1455, 58, 41, 141, NULL, NULL, NULL),
(1456, 58, 42, 144, NULL, NULL, NULL),
(1457, 58, 43, 145, NULL, NULL, NULL),
(1458, 58, 44, 148, NULL, NULL, NULL),
(1459, 58, 45, 150, NULL, NULL, NULL),
(1460, 58, 46, 151, NULL, NULL, NULL),
(1461, 58, 47, 154, NULL, NULL, NULL),
(1462, 58, 48, 155, NULL, NULL, NULL),
(1463, 59, 1, 1, NULL, NULL, NULL),
(1464, 59, 2, 5, NULL, NULL, NULL),
(1465, 59, 3, 8, NULL, NULL, NULL),
(1466, 59, 4, 171, NULL, NULL, NULL),
(1467, 59, 6, 24, NULL, NULL, NULL),
(1468, 59, 7, 31, NULL, NULL, NULL),
(1469, 59, 8, 158, NULL, NULL, NULL),
(1470, 59, 9, 32, NULL, NULL, NULL),
(1471, 59, 10, 36, NULL, NULL, NULL),
(1472, 59, 11, 41, NULL, NULL, NULL),
(1473, 59, 12, NULL, NULL, NULL, NULL),
(1474, 59, 13, 53, NULL, NULL, NULL),
(1475, 59, 14, NULL, NULL, NULL, NULL),
(1476, 59, 15, 65, NULL, NULL, NULL),
(1477, 59, 16, NULL, NULL, NULL, NULL),
(1478, 59, 17, 81, NULL, NULL, NULL),
(1479, 59, 18, 83, NULL, NULL, NULL),
(1480, 59, 19, 87, NULL, NULL, NULL),
(1481, 59, 20, 89, NULL, NULL, NULL),
(1482, 59, 21, 92, NULL, NULL, NULL),
(1483, 59, 22, 94, NULL, NULL, NULL),
(1484, 59, 23, 96, NULL, NULL, NULL),
(1485, 59, 24, 98, NULL, NULL, NULL),
(1486, 59, 25, 101, NULL, NULL, NULL),
(1487, 59, 26, 104, NULL, NULL, NULL),
(1488, 59, 27, 106, NULL, NULL, NULL),
(1489, 59, 28, 108, NULL, NULL, NULL),
(1490, 59, 29, 111, NULL, NULL, NULL),
(1491, 59, 30, 113, NULL, NULL, NULL),
(1492, 59, 31, 114, NULL, NULL, NULL),
(1493, 59, 32, 122, NULL, NULL, NULL),
(1494, 59, 33, 126, NULL, NULL, NULL),
(1495, 59, 34, 128, NULL, NULL, NULL),
(1496, 59, 35, 130, NULL, NULL, NULL),
(1497, 59, 36, 131, NULL, NULL, NULL),
(1498, 59, 37, 133, NULL, NULL, NULL),
(1499, 59, 38, 135, NULL, NULL, NULL),
(1500, 59, 39, 137, NULL, NULL, NULL),
(1501, 59, 40, 140, NULL, NULL, NULL),
(1502, 59, 41, 142, NULL, NULL, NULL),
(1503, 59, 42, 144, NULL, NULL, NULL),
(1504, 59, 43, 146, NULL, NULL, NULL),
(1505, 59, 44, 148, NULL, NULL, NULL),
(1506, 59, 45, 150, NULL, NULL, NULL),
(1507, 59, 46, 151, NULL, NULL, NULL),
(1508, 59, 47, 154, NULL, NULL, NULL),
(1509, 59, 48, 155, NULL, NULL, NULL),
(1510, 60, 1, 1, NULL, NULL, NULL),
(1511, 60, 2, 5, NULL, NULL, NULL),
(1512, 60, 3, 8, NULL, NULL, NULL),
(1513, 60, 4, 172, NULL, NULL, NULL),
(1514, 60, 6, 24, NULL, NULL, NULL),
(1515, 60, 7, 31, NULL, NULL, NULL),
(1516, 60, 8, 157, NULL, NULL, NULL),
(1517, 60, 9, 32, NULL, NULL, NULL),
(1518, 60, 10, 35, NULL, NULL, NULL),
(1519, 60, 11, 41, NULL, NULL, NULL),
(1520, 60, 12, NULL, NULL, NULL, NULL),
(1521, 60, 13, 54, NULL, NULL, NULL),
(1522, 60, 14, 56, NULL, NULL, NULL),
(1523, 60, 15, 67, NULL, NULL, NULL),
(1524, 60, 16, 68, NULL, NULL, NULL),
(1525, 60, 17, 79, NULL, NULL, NULL),
(1526, 60, 18, 84, NULL, NULL, NULL),
(1527, 60, 19, 87, NULL, NULL, NULL),
(1528, 60, 20, 89, NULL, NULL, NULL),
(1529, 60, 21, 93, NULL, NULL, NULL),
(1530, 60, 22, 94, NULL, NULL, NULL),
(1531, 60, 23, 96, NULL, NULL, NULL),
(1532, 60, 24, 98, NULL, NULL, NULL),
(1533, 60, 25, 100, NULL, NULL, NULL),
(1534, 60, 26, 103, NULL, NULL, NULL),
(1535, 60, 27, 106, NULL, NULL, NULL),
(1536, 60, 28, 108, NULL, NULL, NULL),
(1537, 60, 29, 111, NULL, NULL, NULL),
(1538, 60, 30, 112, NULL, NULL, NULL),
(1539, 60, 31, 116, NULL, NULL, NULL),
(1540, 60, 32, 119, NULL, NULL, NULL),
(1541, 60, 33, 126, NULL, NULL, NULL),
(1542, 60, 34, 128, NULL, NULL, NULL),
(1543, 60, 35, 130, NULL, NULL, NULL),
(1544, 60, 36, 131, NULL, NULL, NULL),
(1545, 60, 37, 133, NULL, NULL, NULL),
(1546, 60, 38, 136, NULL, NULL, NULL),
(1547, 60, 39, 138, NULL, NULL, NULL),
(1548, 60, 40, 140, NULL, NULL, NULL),
(1549, 60, 41, 142, NULL, NULL, NULL),
(1550, 60, 42, 144, NULL, NULL, NULL),
(1551, 60, 43, 145, NULL, NULL, NULL),
(1552, 60, 44, 148, NULL, NULL, NULL),
(1553, 60, 45, 150, NULL, NULL, NULL),
(1554, 60, 46, 152, NULL, NULL, NULL),
(1555, 60, 47, 154, NULL, NULL, NULL),
(1556, 60, 48, 156, NULL, NULL, NULL),
(1557, 61, 1, 1, NULL, NULL, NULL),
(1558, 61, 2, 160, NULL, NULL, NULL),
(1559, 61, 3, 8, NULL, NULL, NULL),
(1560, 61, 4, 175, NULL, NULL, NULL),
(1561, 61, 6, 27, NULL, NULL, NULL),
(1562, 61, 7, 31, NULL, NULL, NULL),
(1563, 61, 8, 159, NULL, NULL, NULL),
(1564, 61, 9, 33, NULL, NULL, NULL),
(1565, 61, 10, 37, NULL, NULL, NULL),
(1566, 61, 11, 41, NULL, NULL, NULL),
(1567, 61, 12, NULL, NULL, NULL, NULL),
(1568, 61, 13, 53, NULL, NULL, NULL),
(1569, 61, 14, NULL, NULL, NULL, NULL),
(1570, 61, 15, 66, NULL, NULL, NULL),
(1571, 61, 16, 69, NULL, NULL, NULL),
(1572, 61, 17, 82, NULL, NULL, NULL),
(1573, 61, 18, 83, NULL, NULL, NULL),
(1574, 61, 19, 87, NULL, NULL, NULL),
(1575, 61, 20, 89, NULL, NULL, NULL),
(1576, 61, 21, 92, NULL, NULL, NULL),
(1577, 61, 22, 94, NULL, NULL, NULL),
(1578, 61, 23, 96, NULL, NULL, NULL),
(1579, 61, 24, 98, NULL, NULL, NULL),
(1580, 61, 25, 100, NULL, NULL, NULL),
(1581, 61, 26, 103, NULL, NULL, NULL),
(1582, 61, 27, 107, NULL, NULL, NULL),
(1583, 61, 28, 108, NULL, NULL, NULL),
(1584, 61, 29, 111, NULL, NULL, NULL),
(1585, 61, 30, 113, NULL, NULL, NULL),
(1586, 61, 31, 116, NULL, NULL, NULL),
(1587, 61, 32, 119, NULL, NULL, NULL),
(1588, 61, 33, 126, NULL, NULL, NULL),
(1589, 61, 34, 128, NULL, NULL, NULL),
(1590, 61, 35, 130, NULL, NULL, NULL),
(1591, 61, 36, 131, NULL, NULL, NULL),
(1592, 61, 37, 133, NULL, NULL, NULL),
(1593, 61, 38, 136, NULL, NULL, NULL),
(1594, 61, 39, 138, NULL, NULL, NULL),
(1595, 61, 40, 140, NULL, NULL, NULL),
(1596, 61, 41, 142, NULL, NULL, NULL),
(1597, 61, 42, 144, NULL, NULL, NULL),
(1598, 61, 43, 145, NULL, NULL, NULL),
(1599, 61, 44, 148, NULL, NULL, NULL),
(1600, 61, 45, 149, NULL, NULL, NULL),
(1601, 61, 46, 152, NULL, NULL, NULL),
(1602, 61, 47, 154, NULL, NULL, NULL),
(1603, 61, 48, 156, NULL, NULL, NULL),
(1604, 62, 1, 1, NULL, NULL, NULL),
(1605, 62, 2, 5, NULL, NULL, NULL),
(1606, 62, 3, 8, NULL, NULL, NULL),
(1607, 62, 4, 172, NULL, NULL, NULL),
(1608, 62, 6, 24, NULL, NULL, NULL),
(1609, 62, 7, 31, NULL, NULL, NULL),
(1610, 62, 8, 159, NULL, NULL, NULL),
(1611, 62, 9, 32, NULL, NULL, NULL),
(1612, 62, 10, 37, NULL, NULL, NULL),
(1613, 62, 11, 41, NULL, NULL, NULL),
(1614, 62, 12, NULL, NULL, NULL, NULL),
(1615, 62, 13, 53, NULL, NULL, NULL),
(1616, 62, 14, NULL, NULL, NULL, NULL),
(1617, 62, 15, 65, NULL, NULL, NULL),
(1618, 62, 16, NULL, NULL, NULL, NULL),
(1619, 62, 17, 82, NULL, NULL, NULL),
(1620, 62, 18, 83, NULL, NULL, NULL),
(1621, 62, 19, 87, NULL, NULL, NULL),
(1622, 62, 20, 89, NULL, NULL, NULL),
(1623, 62, 21, 92, NULL, NULL, NULL),
(1624, 62, 22, 94, NULL, NULL, NULL),
(1625, 62, 23, 96, NULL, NULL, NULL),
(1626, 62, 24, 98, NULL, NULL, NULL),
(1627, 62, 25, 100, NULL, NULL, NULL),
(1628, 62, 26, 102, NULL, NULL, NULL),
(1629, 62, 27, 107, NULL, NULL, NULL),
(1630, 62, 28, 109, NULL, NULL, NULL),
(1631, 62, 29, 110, NULL, NULL, NULL),
(1632, 62, 30, 113, NULL, NULL, NULL),
(1633, 62, 31, 118, NULL, NULL, NULL),
(1634, 62, 32, 124, NULL, NULL, NULL),
(1635, 62, 33, 126, NULL, NULL, NULL),
(1636, 62, 34, 128, NULL, NULL, NULL),
(1637, 62, 35, 129, NULL, NULL, NULL),
(1638, 62, 36, 131, NULL, NULL, NULL),
(1639, 62, 37, 133, NULL, NULL, NULL),
(1640, 62, 38, 135, NULL, NULL, NULL),
(1641, 62, 39, 138, NULL, NULL, NULL),
(1642, 62, 40, 140, NULL, NULL, NULL),
(1643, 62, 41, 142, NULL, NULL, NULL),
(1644, 62, 42, 143, NULL, NULL, NULL),
(1645, 62, 43, 145, NULL, NULL, NULL),
(1646, 62, 44, 148, NULL, NULL, NULL),
(1647, 62, 45, 149, NULL, NULL, NULL),
(1648, 62, 46, 151, NULL, NULL, NULL),
(1649, 62, 47, 154, NULL, NULL, NULL),
(1650, 62, 48, 156, NULL, NULL, NULL),
(1651, 63, 1, 1, NULL, NULL, NULL),
(1652, 63, 2, 5, NULL, NULL, NULL),
(1653, 63, 3, 8, NULL, NULL, NULL),
(1654, 63, 4, 174, NULL, NULL, NULL),
(1655, 63, 6, 24, NULL, NULL, NULL),
(1656, 63, 7, 31, NULL, NULL, NULL),
(1657, 63, 8, 158, NULL, NULL, NULL),
(1658, 63, 9, 32, NULL, NULL, NULL),
(1659, 63, 10, 36, NULL, NULL, NULL),
(1660, 63, 11, 41, NULL, NULL, NULL),
(1661, 63, 12, NULL, NULL, NULL, NULL),
(1662, 63, 13, 54, NULL, NULL, NULL),
(1663, 63, 14, 56, NULL, NULL, NULL),
(1664, 63, 15, 66, NULL, NULL, NULL),
(1665, 63, 16, 68, NULL, NULL, NULL),
(1666, 63, 17, 82, NULL, NULL, NULL),
(1667, 63, 18, 84, NULL, NULL, NULL),
(1668, 63, 19, 86, NULL, NULL, NULL),
(1669, 63, 20, 89, NULL, NULL, NULL),
(1670, 63, 21, 93, NULL, NULL, NULL),
(1671, 63, 22, 94, NULL, NULL, NULL),
(1672, 63, 23, 96, NULL, NULL, NULL),
(1673, 63, 24, 98, NULL, NULL, NULL),
(1674, 63, 25, 100, NULL, NULL, NULL),
(1675, 63, 26, 104, NULL, NULL, NULL),
(1676, 63, 27, 107, NULL, NULL, NULL),
(1677, 63, 28, 109, NULL, NULL, NULL),
(1678, 63, 29, 111, NULL, NULL, NULL),
(1679, 63, 30, 112, NULL, NULL, NULL),
(1680, 63, 31, 118, NULL, NULL, NULL),
(1681, 63, 32, 123, NULL, NULL, NULL),
(1682, 63, 33, 126, NULL, NULL, NULL),
(1683, 63, 34, 128, NULL, NULL, NULL),
(1684, 63, 35, 130, NULL, NULL, NULL),
(1685, 63, 36, 131, NULL, NULL, NULL),
(1686, 63, 37, 133, NULL, NULL, NULL),
(1687, 63, 38, 135, NULL, NULL, NULL),
(1688, 63, 39, 138, NULL, NULL, NULL),
(1689, 63, 40, 139, NULL, NULL, NULL),
(1690, 63, 41, 142, NULL, NULL, NULL),
(1691, 63, 42, 144, NULL, NULL, NULL),
(1692, 63, 43, 145, NULL, NULL, NULL),
(1693, 63, 44, 148, NULL, NULL, NULL),
(1694, 63, 45, 149, NULL, NULL, NULL),
(1695, 63, 46, 152, NULL, NULL, NULL),
(1696, 63, 47, 154, NULL, NULL, NULL),
(1697, 63, 48, 156, NULL, NULL, NULL),
(1698, 64, 1, 1, NULL, NULL, NULL),
(1699, 64, 2, 162, NULL, NULL, NULL),
(1700, 64, 3, 8, NULL, NULL, NULL),
(1701, 64, 4, 178, NULL, NULL, NULL),
(1702, 64, 6, 26, NULL, NULL, NULL),
(1703, 64, 7, 31, NULL, NULL, NULL),
(1704, 64, 8, 159, NULL, NULL, NULL),
(1705, 64, 9, 32, NULL, NULL, NULL),
(1706, 64, 10, 37, NULL, NULL, NULL),
(1707, 64, 11, 42, NULL, NULL, NULL),
(1708, 64, 12, NULL, NULL, NULL, NULL),
(1709, 64, 13, 53, NULL, NULL, NULL),
(1710, 64, 14, NULL, NULL, NULL, NULL),
(1711, 64, 15, 66, NULL, NULL, NULL),
(1712, 64, 16, 69, NULL, NULL, NULL),
(1713, 64, 17, 82, NULL, NULL, NULL),
(1714, 64, 18, 83, NULL, NULL, NULL),
(1715, 64, 19, 87, NULL, NULL, NULL),
(1716, 64, 20, 89, NULL, NULL, NULL),
(1717, 64, 21, 92, NULL, NULL, NULL),
(1718, 64, 22, 94, NULL, NULL, NULL),
(1719, 64, 23, 96, NULL, NULL, NULL),
(1720, 64, 24, 98, NULL, NULL, NULL),
(1721, 64, 25, 100, NULL, NULL, NULL),
(1722, 64, 26, 102, NULL, NULL, NULL),
(1723, 64, 27, 106, NULL, NULL, NULL),
(1724, 64, 28, 108, NULL, NULL, NULL),
(1725, 64, 29, 111, NULL, NULL, NULL),
(1726, 64, 30, 112, NULL, NULL, NULL),
(1727, 64, 31, 117, NULL, NULL, NULL),
(1728, 64, 32, 123, NULL, NULL, NULL),
(1729, 64, 33, 126, NULL, NULL, NULL),
(1730, 64, 34, 127, NULL, NULL, NULL),
(1731, 64, 35, 129, NULL, NULL, NULL),
(1732, 64, 36, 132, NULL, NULL, NULL),
(1733, 64, 37, 133, NULL, NULL, NULL),
(1734, 64, 38, 136, NULL, NULL, NULL),
(1735, 64, 39, 138, NULL, NULL, NULL),
(1736, 64, 40, 140, NULL, NULL, NULL),
(1737, 64, 41, 142, NULL, NULL, NULL),
(1738, 64, 42, 144, NULL, NULL, NULL),
(1739, 64, 43, 145, NULL, NULL, NULL),
(1740, 64, 44, 148, NULL, NULL, NULL),
(1741, 64, 45, 149, NULL, NULL, NULL),
(1742, 64, 46, 152, NULL, NULL, NULL),
(1743, 64, 47, 153, NULL, NULL, NULL),
(1744, 64, 48, 156, NULL, NULL, NULL),
(1745, 65, 1, 1, NULL, NULL, NULL),
(1746, 65, 2, 160, NULL, NULL, NULL),
(1747, 65, 3, 8, NULL, NULL, NULL),
(1748, 65, 4, 175, NULL, NULL, NULL),
(1749, 65, 6, 24, NULL, NULL, NULL),
(1750, 65, 7, 31, NULL, NULL, NULL),
(1751, 65, 8, 158, NULL, NULL, NULL),
(1752, 65, 9, 32, NULL, NULL, NULL),
(1753, 65, 10, 36, NULL, NULL, NULL),
(1754, 65, 11, 42, NULL, NULL, NULL),
(1755, 65, 12, 46, NULL, NULL, NULL),
(1756, 65, 13, 53, NULL, NULL, NULL),
(1757, 65, 14, NULL, NULL, NULL, NULL),
(1758, 65, 15, 66, NULL, NULL, NULL),
(1759, 65, 16, 69, NULL, NULL, NULL),
(1760, 65, 17, 81, NULL, NULL, NULL),
(1761, 65, 18, 83, NULL, NULL, NULL),
(1762, 65, 19, 87, NULL, NULL, NULL),
(1763, 65, 20, 89, NULL, NULL, NULL),
(1764, 65, 21, 93, NULL, NULL, NULL),
(1765, 65, 22, 94, NULL, NULL, NULL),
(1766, 65, 23, 96, NULL, NULL, NULL),
(1767, 65, 24, 99, NULL, NULL, NULL),
(1768, 65, 25, 100, NULL, NULL, NULL),
(1769, 65, 26, 104, NULL, NULL, NULL),
(1770, 65, 27, 106, NULL, NULL, NULL),
(1771, 65, 28, 109, NULL, NULL, NULL),
(1772, 65, 29, 111, NULL, NULL, NULL),
(1773, 65, 30, 113, NULL, NULL, NULL),
(1774, 65, 31, 118, NULL, NULL, NULL),
(1775, 65, 32, 119, NULL, NULL, NULL),
(1776, 65, 33, 126, NULL, NULL, NULL),
(1777, 65, 34, 128, NULL, NULL, NULL),
(1778, 65, 35, 129, NULL, NULL, NULL),
(1779, 65, 36, 132, NULL, NULL, NULL),
(1780, 65, 37, 134, NULL, NULL, NULL),
(1781, 65, 38, 136, NULL, NULL, NULL),
(1782, 65, 39, 138, NULL, NULL, NULL),
(1783, 65, 40, 140, NULL, NULL, NULL),
(1784, 65, 41, 142, NULL, NULL, NULL),
(1785, 65, 42, 143, NULL, NULL, NULL),
(1786, 65, 43, 146, NULL, NULL, NULL),
(1787, 65, 44, 148, NULL, NULL, NULL),
(1788, 65, 45, 149, NULL, NULL, NULL),
(1789, 65, 46, 151, NULL, NULL, NULL),
(1790, 65, 47, 154, NULL, NULL, NULL),
(1791, 65, 48, 155, NULL, NULL, NULL),
(1792, 66, 1, 1, NULL, NULL, NULL),
(1793, 66, 2, 5, NULL, NULL, NULL),
(1794, 66, 3, 8, NULL, NULL, NULL),
(1795, 66, 4, 170, NULL, NULL, NULL),
(1796, 66, 6, 24, NULL, NULL, NULL),
(1797, 66, 7, 31, NULL, NULL, NULL),
(1798, 66, 8, 158, NULL, NULL, NULL),
(1799, 66, 9, 32, NULL, NULL, NULL),
(1800, 66, 10, 36, NULL, NULL, NULL),
(1801, 66, 11, 41, NULL, NULL, NULL),
(1802, 66, 12, NULL, NULL, NULL, NULL),
(1803, 66, 13, 53, NULL, NULL, NULL),
(1804, 66, 14, NULL, NULL, NULL, NULL),
(1805, 66, 15, 66, NULL, NULL, NULL),
(1806, 66, 16, 73, NULL, NULL, NULL),
(1807, 66, 17, 82, NULL, NULL, NULL),
(1808, 66, 18, 83, NULL, NULL, NULL),
(1809, 66, 19, 87, NULL, NULL, NULL),
(1810, 66, 20, 89, NULL, NULL, NULL),
(1811, 66, 21, 92, NULL, NULL, NULL),
(1812, 66, 22, 94, NULL, NULL, NULL),
(1813, 66, 23, 96, NULL, NULL, NULL),
(1814, 66, 24, 98, NULL, NULL, NULL),
(1815, 66, 25, 101, NULL, NULL, NULL),
(1816, 66, 26, 104, NULL, NULL, NULL),
(1817, 66, 27, 107, NULL, NULL, NULL),
(1818, 66, 28, 108, NULL, NULL, NULL),
(1819, 66, 29, 111, NULL, NULL, NULL),
(1820, 66, 30, 112, NULL, NULL, NULL),
(1821, 66, 31, 116, NULL, NULL, NULL),
(1822, 66, 32, 124, NULL, NULL, NULL),
(1823, 66, 33, 126, NULL, NULL, NULL),
(1824, 66, 34, 128, NULL, NULL, NULL),
(1825, 66, 35, 130, NULL, NULL, NULL),
(1826, 66, 36, 131, NULL, NULL, NULL),
(1827, 66, 37, 133, NULL, NULL, NULL),
(1828, 66, 38, 135, NULL, NULL, NULL),
(1829, 66, 39, 138, NULL, NULL, NULL),
(1830, 66, 40, 140, NULL, NULL, NULL),
(1831, 66, 41, 142, NULL, NULL, NULL),
(1832, 66, 42, 143, NULL, NULL, NULL),
(1833, 66, 43, 145, NULL, NULL, NULL),
(1834, 66, 44, 148, NULL, NULL, NULL),
(1835, 66, 45, 149, NULL, NULL, NULL),
(1836, 66, 46, 152, NULL, NULL, NULL),
(1837, 66, 47, 154, NULL, NULL, NULL),
(1838, 66, 48, 156, NULL, NULL, NULL),
(1839, 67, 1, 1, NULL, NULL, NULL),
(1840, 67, 2, 5, NULL, NULL, NULL),
(1841, 67, 3, 8, NULL, NULL, NULL),
(1842, 67, 4, 174, NULL, NULL, NULL),
(1843, 67, 6, 27, NULL, NULL, NULL),
(1844, 67, 7, 31, NULL, NULL, NULL),
(1845, 67, 8, 157, NULL, NULL, NULL),
(1846, 67, 9, 33, NULL, NULL, NULL),
(1847, 67, 10, NULL, NULL, NULL, NULL),
(1848, 67, 11, 41, NULL, NULL, NULL),
(1849, 67, 12, NULL, NULL, NULL, NULL),
(1850, 67, 13, 54, NULL, NULL, NULL),
(1851, 67, 14, 56, NULL, NULL, NULL),
(1852, 67, 15, 65, NULL, NULL, NULL),
(1853, 67, 16, NULL, NULL, NULL, NULL),
(1854, 67, 17, 81, NULL, NULL, NULL),
(1855, 67, 18, 83, NULL, NULL, NULL),
(1856, 67, 19, 87, NULL, NULL, NULL),
(1857, 67, 20, 89, NULL, NULL, NULL),
(1858, 67, 21, 92, NULL, NULL, NULL),
(1859, 67, 22, 94, NULL, NULL, NULL),
(1860, 67, 23, 96, NULL, NULL, NULL),
(1861, 67, 24, 98, NULL, NULL, NULL),
(1862, 67, 25, 100, NULL, NULL, NULL),
(1863, 67, 26, 104, NULL, NULL, NULL),
(1864, 67, 27, 107, NULL, NULL, NULL),
(1865, 67, 28, 108, NULL, NULL, NULL),
(1866, 67, 29, 110, NULL, NULL, NULL),
(1867, 67, 30, 112, NULL, NULL, NULL),
(1868, 67, 31, 116, NULL, NULL, NULL),
(1869, 67, 32, 123, NULL, NULL, NULL),
(1870, 67, 33, 125, NULL, NULL, NULL),
(1871, 67, 34, 127, NULL, NULL, NULL),
(1872, 67, 35, 130, NULL, NULL, NULL),
(1873, 67, 36, 131, NULL, NULL, NULL),
(1874, 67, 37, 133, NULL, NULL, NULL),
(1875, 67, 38, 135, NULL, NULL, NULL),
(1876, 67, 39, 137, NULL, NULL, NULL),
(1877, 67, 40, 140, NULL, NULL, NULL),
(1878, 67, 41, 142, NULL, NULL, NULL),
(1879, 67, 42, 144, NULL, NULL, NULL),
(1880, 67, 43, 145, NULL, NULL, NULL),
(1881, 67, 44, 148, NULL, NULL, NULL),
(1882, 67, 45, 150, NULL, NULL, NULL),
(1883, 67, 46, 152, NULL, NULL, NULL),
(1884, 67, 47, 154, NULL, NULL, NULL),
(1885, 67, 48, 155, NULL, NULL, NULL),
(1886, 68, 1, 1, NULL, NULL, NULL),
(1887, 68, 2, 5, NULL, NULL, NULL),
(1888, 68, 3, 8, NULL, NULL, NULL),
(1889, 68, 4, 19, NULL, NULL, NULL),
(1890, 68, 6, 24, NULL, NULL, NULL),
(1891, 68, 7, 31, NULL, NULL, NULL),
(1892, 68, 8, 158, NULL, NULL, NULL),
(1893, 68, 9, 32, NULL, NULL, NULL),
(1894, 68, 10, 36, NULL, NULL, NULL),
(1895, 68, 11, 41, NULL, NULL, NULL),
(1896, 68, 12, NULL, NULL, NULL, NULL),
(1897, 68, 13, 53, NULL, NULL, NULL),
(1898, 68, 14, NULL, NULL, NULL, NULL),
(1899, 68, 15, 65, NULL, NULL, NULL),
(1900, 68, 16, NULL, NULL, NULL, NULL),
(1901, 68, 17, 82, NULL, NULL, NULL),
(1902, 68, 18, 83, NULL, NULL, NULL),
(1903, 68, 19, 87, NULL, NULL, NULL),
(1904, 68, 20, 89, NULL, NULL, NULL),
(1905, 68, 21, 93, NULL, NULL, NULL),
(1906, 68, 22, 94, NULL, NULL, NULL),
(1907, 68, 23, 97, NULL, NULL, NULL),
(1908, 68, 24, 98, NULL, NULL, NULL),
(1909, 68, 25, 101, NULL, NULL, NULL),
(1910, 68, 26, 104, NULL, NULL, NULL),
(1911, 68, 27, 107, NULL, NULL, NULL),
(1912, 68, 28, 108, NULL, NULL, NULL),
(1913, 68, 29, 111, NULL, NULL, NULL),
(1914, 68, 30, 113, NULL, NULL, NULL),
(1915, 68, 31, 117, NULL, NULL, NULL),
(1916, 68, 32, 122, NULL, NULL, NULL),
(1917, 68, 33, 126, NULL, NULL, NULL),
(1918, 68, 34, 128, NULL, NULL, NULL),
(1919, 68, 35, 130, NULL, NULL, NULL),
(1920, 68, 36, 132, NULL, NULL, NULL),
(1921, 68, 37, 133, NULL, NULL, NULL),
(1922, 68, 38, 136, NULL, NULL, NULL),
(1923, 68, 39, 137, NULL, NULL, NULL),
(1924, 68, 40, 140, NULL, NULL, NULL),
(1925, 68, 41, 142, NULL, NULL, NULL),
(1926, 68, 42, 144, NULL, NULL, NULL),
(1927, 68, 43, 145, NULL, NULL, NULL),
(1928, 68, 44, 148, NULL, NULL, NULL),
(1929, 68, 45, 149, NULL, NULL, NULL),
(1930, 68, 46, 152, NULL, NULL, NULL),
(1931, 68, 47, 154, NULL, NULL, NULL),
(1932, 68, 48, 155, NULL, NULL, NULL),
(1933, 69, 1, 1, NULL, NULL, NULL),
(1934, 69, 2, 5, NULL, NULL, NULL),
(1935, 69, 3, 8, NULL, NULL, NULL),
(1936, 69, 4, 171, NULL, NULL, NULL),
(1937, 69, 6, 24, NULL, NULL, NULL),
(1938, 69, 7, 31, NULL, NULL, NULL),
(1939, 69, 8, 157, NULL, NULL, NULL),
(1940, 69, 9, 32, NULL, NULL, NULL),
(1941, 69, 10, 35, NULL, NULL, NULL),
(1942, 69, 11, 41, NULL, NULL, NULL),
(1943, 69, 12, NULL, NULL, NULL, NULL),
(1944, 69, 13, 53, NULL, NULL, NULL),
(1945, 69, 14, NULL, NULL, NULL, NULL),
(1946, 69, 15, 65, NULL, NULL, NULL),
(1947, 69, 16, NULL, NULL, NULL, NULL),
(1948, 69, 17, 81, NULL, NULL, NULL),
(1949, 69, 18, 83, NULL, NULL, NULL),
(1950, 69, 19, 87, NULL, NULL, NULL),
(1951, 69, 20, 89, NULL, NULL, NULL),
(1952, 69, 21, 92, NULL, NULL, NULL),
(1953, 69, 22, 94, NULL, NULL, NULL),
(1954, 69, 23, 97, NULL, NULL, NULL),
(1955, 69, 24, 98, NULL, NULL, NULL),
(1956, 69, 25, 101, NULL, NULL, NULL),
(1957, 69, 26, 102, NULL, NULL, NULL),
(1958, 69, 27, 106, NULL, NULL, NULL),
(1959, 69, 28, 108, NULL, NULL, NULL),
(1960, 69, 29, 111, NULL, NULL, NULL),
(1961, 69, 30, 113, NULL, NULL, NULL),
(1962, 69, 31, 116, NULL, NULL, NULL),
(1963, 69, 32, 122, NULL, NULL, NULL),
(1964, 69, 33, 125, NULL, NULL, NULL),
(1965, 69, 34, 127, NULL, NULL, NULL),
(1966, 69, 35, 129, NULL, NULL, NULL),
(1967, 69, 36, 131, NULL, NULL, NULL),
(1968, 69, 37, 133, NULL, NULL, NULL),
(1969, 69, 38, 135, NULL, NULL, NULL),
(1970, 69, 39, 138, NULL, NULL, NULL),
(1971, 69, 40, 140, NULL, NULL, NULL),
(1972, 69, 41, 142, NULL, NULL, NULL),
(1973, 69, 42, 143, NULL, NULL, NULL),
(1974, 69, 43, 145, NULL, NULL, NULL),
(1975, 69, 44, 148, NULL, NULL, NULL),
(1976, 69, 45, 150, NULL, NULL, NULL),
(1977, 69, 46, 152, NULL, NULL, NULL),
(1978, 69, 47, 153, NULL, NULL, NULL),
(1979, 69, 48, 155, NULL, NULL, NULL),
(1980, 71, 1, 1, NULL, NULL, NULL),
(1981, 71, 2, 4, NULL, NULL, NULL),
(1982, 71, 3, 8, NULL, NULL, NULL),
(1983, 71, 4, 19, NULL, NULL, NULL),
(1984, 71, 6, 24, NULL, NULL, NULL),
(1985, 71, 7, 31, NULL, NULL, NULL),
(1986, 71, 8, 158, NULL, NULL, NULL),
(1987, 71, 9, 33, NULL, NULL, NULL),
(1988, 71, 10, NULL, NULL, NULL, NULL),
(1989, 71, 11, 41, NULL, NULL, NULL),
(1990, 71, 12, NULL, NULL, NULL, NULL),
(1991, 71, 13, 53, NULL, NULL, NULL),
(1992, 71, 14, NULL, NULL, NULL, NULL),
(1993, 71, 15, 65, NULL, NULL, NULL),
(1994, 71, 16, NULL, NULL, NULL, NULL),
(1995, 71, 17, 82, NULL, NULL, NULL),
(1996, 71, 18, 83, NULL, NULL, NULL),
(1997, 71, 19, 87, NULL, NULL, NULL),
(1998, 71, 20, 89, NULL, NULL, NULL),
(1999, 71, 21, 92, NULL, NULL, NULL),
(2000, 71, 22, 94, NULL, NULL, NULL),
(2001, 71, 23, 97, NULL, NULL, NULL),
(2002, 71, 24, 98, NULL, NULL, NULL),
(2003, 71, 25, 101, NULL, NULL, NULL),
(2004, 71, 26, 102, NULL, NULL, NULL),
(2005, 71, 27, 107, NULL, NULL, NULL),
(2006, 71, 28, 109, NULL, NULL, NULL),
(2007, 71, 29, 111, NULL, NULL, NULL),
(2008, 71, 30, 113, NULL, NULL, NULL),
(2009, 71, 31, 118, NULL, NULL, NULL),
(2010, 71, 32, 123, NULL, NULL, NULL),
(2011, 71, 33, 125, NULL, NULL, NULL),
(2012, 71, 34, 127, NULL, NULL, NULL),
(2013, 71, 35, 130, NULL, NULL, NULL),
(2014, 71, 36, 131, NULL, NULL, NULL),
(2015, 71, 37, 133, NULL, NULL, NULL),
(2016, 71, 38, 136, NULL, NULL, NULL),
(2017, 71, 39, 138, NULL, NULL, NULL),
(2018, 71, 40, 140, NULL, NULL, NULL),
(2019, 71, 41, 142, NULL, NULL, NULL),
(2020, 71, 42, 143, NULL, NULL, NULL),
(2021, 71, 43, 145, NULL, NULL, NULL),
(2022, 71, 44, 148, NULL, NULL, NULL),
(2023, 71, 45, 149, NULL, NULL, NULL),
(2024, 71, 46, 151, NULL, NULL, NULL),
(2025, 71, 47, 154, NULL, NULL, NULL),
(2026, 71, 48, 155, NULL, NULL, NULL),
(2027, 72, 1, 1, NULL, NULL, NULL),
(2028, 72, 2, 4, NULL, NULL, NULL),
(2029, 72, 3, 8, NULL, NULL, NULL),
(2030, 72, 4, 178, NULL, NULL, NULL),
(2031, 72, 6, 24, NULL, NULL, NULL),
(2032, 72, 7, 31, NULL, NULL, NULL),
(2033, 72, 8, 158, NULL, NULL, NULL),
(2034, 72, 9, 32, NULL, NULL, NULL),
(2035, 72, 10, 35, NULL, NULL, NULL),
(2036, 72, 11, 41, NULL, NULL, NULL),
(2037, 72, 12, NULL, NULL, NULL, NULL),
(2038, 72, 13, 53, NULL, NULL, NULL),
(2039, 72, 14, NULL, NULL, NULL, NULL),
(2040, 72, 15, 65, NULL, NULL, NULL),
(2041, 72, 16, NULL, NULL, NULL, NULL),
(2042, 72, 17, 81, NULL, NULL, NULL),
(2043, 72, 18, 83, NULL, NULL, NULL),
(2044, 72, 19, 87, NULL, NULL, NULL),
(2045, 72, 20, 89, NULL, NULL, NULL),
(2046, 72, 21, 93, NULL, NULL, NULL),
(2047, 72, 22, 94, NULL, NULL, NULL),
(2048, 72, 23, 96, NULL, NULL, NULL),
(2049, 72, 24, 98, NULL, NULL, NULL),
(2050, 72, 25, 100, NULL, NULL, NULL),
(2051, 72, 26, 104, NULL, NULL, NULL),
(2052, 72, 27, 107, NULL, NULL, NULL),
(2053, 72, 28, 109, NULL, NULL, NULL),
(2054, 72, 29, 111, NULL, NULL, NULL),
(2055, 72, 30, 112, NULL, NULL, NULL),
(2056, 72, 31, 116, NULL, NULL, NULL),
(2057, 72, 32, 122, NULL, NULL, NULL),
(2058, 72, 33, 125, NULL, NULL, NULL),
(2059, 72, 34, 128, NULL, NULL, NULL),
(2060, 72, 35, 129, NULL, NULL, NULL),
(2061, 72, 36, 131, NULL, NULL, NULL),
(2062, 72, 37, 134, NULL, NULL, NULL),
(2063, 72, 38, 135, NULL, NULL, NULL),
(2064, 72, 39, 138, NULL, NULL, NULL),
(2065, 72, 40, 140, NULL, NULL, NULL),
(2066, 72, 41, 142, NULL, NULL, NULL),
(2067, 72, 42, 144, NULL, NULL, NULL),
(2068, 72, 43, 146, NULL, NULL, NULL),
(2069, 72, 44, 148, NULL, NULL, NULL),
(2070, 72, 45, 150, NULL, NULL, NULL),
(2071, 72, 46, 152, NULL, NULL, NULL),
(2072, 72, 47, 154, NULL, NULL, NULL),
(2073, 72, 48, 155, NULL, NULL, NULL),
(2074, 3, 6, 24, NULL, NULL, NULL),
(2075, 3, 7, 30, NULL, NULL, NULL),
(2076, 3, 8, 157, NULL, NULL, NULL),
(2077, 3, 9, 32, NULL, NULL, NULL),
(2078, 3, 10, 35, NULL, NULL, NULL),
(2079, 3, 11, 42, NULL, NULL, NULL),
(2080, 3, 12, 44, NULL, NULL, NULL),
(2081, 3, 13, 54, NULL, NULL, NULL),
(2082, 3, 14, 62, NULL, NULL, NULL),
(2083, 3, 15, NULL, NULL, NULL, NULL),
(2084, 3, 16, NULL, NULL, NULL, NULL),
(2085, 3, 17, NULL, NULL, NULL, NULL),
(2086, 3, 18, NULL, NULL, NULL, NULL),
(2087, 3, 19, 87, NULL, NULL, NULL),
(2088, 3, 20, NULL, NULL, NULL, NULL),
(2089, 3, 21, 93, NULL, NULL, NULL),
(2090, 3, 22, NULL, NULL, NULL, NULL),
(2091, 3, 23, NULL, NULL, NULL, NULL),
(2092, 3, 24, NULL, NULL, NULL, NULL),
(2093, 3, 25, NULL, NULL, NULL, NULL),
(2094, 3, 26, NULL, NULL, NULL, NULL),
(2095, 3, 27, NULL, NULL, NULL, NULL),
(2096, 3, 28, NULL, NULL, NULL, NULL),
(2097, 3, 29, NULL, NULL, NULL, NULL),
(2098, 3, 30, NULL, NULL, NULL, NULL),
(2099, 3, 31, NULL, NULL, NULL, NULL),
(2100, 3, 32, NULL, NULL, NULL, NULL),
(2101, 3, 33, NULL, NULL, NULL, NULL),
(2102, 3, 34, NULL, NULL, NULL, NULL),
(2103, 3, 35, NULL, NULL, NULL, NULL),
(2104, 3, 36, NULL, NULL, NULL, NULL),
(2105, 3, 37, NULL, NULL, NULL, NULL),
(2106, 3, 38, NULL, NULL, NULL, NULL),
(2107, 3, 39, NULL, NULL, NULL, NULL),
(2108, 3, 40, NULL, NULL, NULL, NULL),
(2109, 3, 41, NULL, NULL, NULL, NULL),
(2110, 3, 42, NULL, NULL, NULL, NULL),
(2111, 3, 43, NULL, NULL, NULL, NULL),
(2112, 3, 44, NULL, NULL, NULL, NULL),
(2113, 3, 45, NULL, NULL, NULL, NULL),
(2114, 3, 46, NULL, NULL, NULL, NULL),
(2115, 3, 47, NULL, NULL, NULL, NULL),
(2116, 3, 48, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_jabatan`
--

CREATE TABLE `riwayat_jabatan` (
  `id_riwayat_jabatan` bigint(20) NOT NULL,
  `id_pegawai` bigint(20) NOT NULL,
  `id_jabatan` bigint(20) NOT NULL,
  `id_kantor` int(11) NOT NULL DEFAULT 0,
  `tanggal_mulai` date NOT NULL,
  `tahun_mulai` int(4) DEFAULT NULL,
  `tanggal_berakhir` date DEFAULT NULL,
  `tahun_berakhir` int(4) DEFAULT NULL,
  `nomor_sk` varchar(250) DEFAULT NULL,
  `bukti_sk` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `id_riwayat_pendidikan` bigint(20) NOT NULL,
  `id_pegawai` bigint(20) NOT NULL,
  `id_jenjang_pendidikan` int(11) NOT NULL,
  `nama_sekolah` varchar(250) NOT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `tahun_masuk` int(4) DEFAULT NULL,
  `tahun_lulus` int(4) DEFAULT NULL,
  `bidang` varchar(250) DEFAULT NULL,
  `gpa` double(8,2) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `salary_monthly`
--

CREATE TABLE `salary_monthly` (
  `id_salary_monthly` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `gaji_pokok` bigint(20) NOT NULL,
  `tunjangan1` bigint(20) DEFAULT NULL,
  `tunjangan2` int(11) DEFAULT NULL,
  `tunjangan3` int(11) DEFAULT NULL,
  `tunjangan4` int(11) DEFAULT NULL,
  `tunjangan5` int(11) DEFAULT NULL,
  `jml_lembur` int(11) DEFAULT 0,
  `jml_kehadiran` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `salary_monthly`
--

INSERT INTO `salary_monthly` (`id_salary_monthly`, `id_pegawai`, `bulan`, `tahun`, `gaji_pokok`, `tunjangan1`, `tunjangan2`, `tunjangan3`, `tunjangan4`, `tunjangan5`, `jml_lembur`, `jml_kehadiran`) VALUES
(1, 3, 2, 2021, 650000, 250000, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `section_content`
--

CREATE TABLE `section_content` (
  `id_section_content` int(11) NOT NULL,
  `section_content` varchar(250) NOT NULL,
  `is_active` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `section_content`
--

INSERT INTO `section_content` (`id_section_content`, `section_content`, `is_active`) VALUES
(1, 'HOME', 1),
(2, 'ABOUT US', 1),
(3, 'PRODUCT', 1),
(5, 'CONTACT US', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `smk_aspek_penilaian`
--

CREATE TABLE `smk_aspek_penilaian` (
  `id_aspek_penilaian` int(11) NOT NULL,
  `id_smk_skenario` int(11) NOT NULL,
  `id_perusahaan` bigint(20) NOT NULL,
  `aspek_penilaian` varchar(250) NOT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  `kategori` set('UTAMA','TAMBAHAN') NOT NULL,
  `mode` int(11) DEFAULT NULL,
  `is_used` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `smk_aspek_penilaian`
--

INSERT INTO `smk_aspek_penilaian` (`id_aspek_penilaian`, `id_smk_skenario`, `id_perusahaan`, `aspek_penilaian`, `deskripsi`, `kategori`, `mode`, `is_used`) VALUES
(1, 1, 201501, 'KEUANGAN', 'KEUANGAN', 'UTAMA', 1, 1),
(2, 1, 201501, 'PELANGGAN', 'PELANGGAN', 'UTAMA', 1, 1),
(3, 1, 201501, 'PROSES BISNIS', 'PROSES BISNIS', 'UTAMA', 1, 1),
(4, 1, 201501, 'KOMPETENSI', 'KOMPETENSI', 'UTAMA', 2, 1),
(10, 1, 201501, 'INOVASI', 'INOVASI', 'TAMBAHAN', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subcontractor`
--

CREATE TABLE `subcontractor` (
  `id_subcontractor` bigint(20) NOT NULL,
  `nama_subcontractor` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nomor_telepon` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `npwp` varchar(250) DEFAULT NULL,
  `nama_kontak` varchar(250) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_user_id` int(11) DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `subcontractor`
--

INSERT INTO `subcontractor` (`id_subcontractor`, `nama_subcontractor`, `alamat`, `id_kabupaten`, `nomor_telepon`, `email`, `npwp`, `nama_kontak`, `created_date`, `created_user_id`, `created_ip_address`) VALUES
(1, 'Bagas', 'Jl. Jakarta 28 Utara', 1112, '', '', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` bigint(20) NOT NULL,
  `nama_supplier` varchar(200) NOT NULL,
  `alamat_supplier` varchar(200) NOT NULL,
  `pic_nama` varchar(200) NOT NULL,
  `no_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `pic_nama`, `no_phone`) VALUES
(1, 'Maersk', 'Denmark', '-', '-'),
(2, 'Huawei', 'Tangerang Selatan ', 'Mr Ant Thi', '0821321123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_asset1`
--

CREATE TABLE `type_asset1` (
  `id_type_asset` int(11) NOT NULL,
  `type_asset` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `type_asset1`
--

INSERT INTO `type_asset1` (`id_type_asset`, `type_asset`, `description`, `is_active`) VALUES
(1, 'Kapal', NULL, 1),
(2, 'Tongkang', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_asset2`
--

CREATE TABLE `type_asset2` (
  `id_type_asset` int(11) NOT NULL,
  `type_asset` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_asset3`
--

CREATE TABLE `type_asset3` (
  `id_type_asset` int(11) NOT NULL,
  `type_asset` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `type_asset3`
--

INSERT INTO `type_asset3` (`id_type_asset`, `type_asset`, `description`, `is_active`) VALUES
(100, 'ASet Bergerak', NULL, 1),
(200, 'Aset Tidak Bergerak', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_asset4`
--

CREATE TABLE `type_asset4` (
  `id_type_asset` int(11) NOT NULL,
  `type_asset` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `type_asset4`
--

INSERT INTO `type_asset4` (`id_type_asset`, `type_asset`, `description`, `is_active`) VALUES
(100, 'Not-Tracked', NULL, 1),
(200, 'GPS-Tracked', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_asset5`
--

CREATE TABLE `type_asset5` (
  `id_type_asset` int(11) NOT NULL,
  `type_asset` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_asset_item1`
--

CREATE TABLE `type_asset_item1` (
  `id_type_asset_item` int(11) NOT NULL,
  `type_asset_item` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `type_asset_item1`
--

INSERT INTO `type_asset_item1` (`id_type_asset_item`, `type_asset_item`, `description`, `is_active`) VALUES
(10, 'Bergerak', NULL, 1),
(20, 'Tidak Bergerak', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_asset_item2`
--

CREATE TABLE `type_asset_item2` (
  `id_type_asset_item` int(11) NOT NULL,
  `type_asset_item` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `type_asset_item2`
--

INSERT INTO `type_asset_item2` (`id_type_asset_item`, `type_asset_item`, `description`, `is_active`) VALUES
(100, 'Terpelihara', NULL, 1),
(200, 'Tidak Terpelihara', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_asset_item3`
--

CREATE TABLE `type_asset_item3` (
  `id_type_asset_item` int(11) NOT NULL,
  `type_asset_item` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `type_asset_item3`
--

INSERT INTO `type_asset_item3` (`id_type_asset_item`, `type_asset_item`, `description`, `is_active`) VALUES
(1000, 'MANGGA', NULL, 1),
(1001, 'PETE', NULL, 1),
(1002, 'NANGKA', NULL, 1),
(1003, 'MAHONI', NULL, 1),
(1004, 'RENGAS', NULL, 1),
(1005, 'ARENG', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_asset_item4`
--

CREATE TABLE `type_asset_item4` (
  `id_type_asset_item` int(11) NOT NULL,
  `type_asset_item` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `type_asset_item4`
--

INSERT INTO `type_asset_item4` (`id_type_asset_item`, `type_asset_item`, `description`, `is_active`) VALUES
(201, 'BESAR', NULL, 1),
(202, 'SEDANG', NULL, 1),
(203, 'KECIL', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_asset_item5`
--

CREATE TABLE `type_asset_item5` (
  `id_type_asset_item` int(11) NOT NULL,
  `type_asset_item` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_produksi`
--

CREATE TABLE `unit_produksi` (
  `id_unit_produksi` bigint(20) NOT NULL,
  `nama_unit` varchar(250) NOT NULL,
  `lokasi` varchar(250) DEFAULT NULL,
  `foto1` varchar(250) NOT NULL,
  `desc_fungsi` varchar(250) DEFAULT NULL,
  `desc_material_in` varchar(250) DEFAULT NULL,
  `desc_proses` varchar(500) DEFAULT NULL,
  `desc_material_out` varchar(250) DEFAULT NULL,
  `jumlah_operator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `unit_produksi`
--

INSERT INTO `unit_produksi` (`id_unit_produksi`, `nama_unit`, `lokasi`, `foto1`, `desc_fungsi`, `desc_material_in`, `desc_proses`, `desc_material_out`, `jumlah_operator`) VALUES
(10, 'UNIT PACKING KAIN', 'Pabrik 2 - TAMAN KOPO INDAH 3 E5 Blok 00 No-1 Kel. MEKAR RAHAYU Kec. MARGAASIH Kota BANDUNG', '', '1) Menghitung ulang kain yang datang (yard ulang)\r\n2) Melaporkan hasil hitungan dan berapa yang dibuang\r\n3) Mengemas ulang dengan plastik baru, cone baru dan label baru', 'Kain yang sudah dimakloon dari pihak ketiga', 'Menghitung ulang kain, menghitung BS, mengemas (packing) dengan yang baru', 'Kain yang sudah dipacking dengan potongan atau ukuran tertentu', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_key` varchar(250) NOT NULL,
  `status` smallint(6) NOT NULL,
  `password_reset_token` varchar(250) NOT NULL,
  `user_level` enum('admin','member','produksi','sales','management (ST)','ADM') NOT NULL DEFAULT 'ADM',
  `role` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `pass_cnf` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `full_name`, `username`, `email`, `password_hash`, `auth_key`, `status`, `password_reset_token`, `user_level`, `role`, `created_at`, `updated_at`, `pass_cnf`) VALUES
(1, 'Admin', 'admin', 'admin@admin.com', '$2y$13$wUP89zDmoJhxVQ55PqilV.K/5e3.K2RSRuhHShtr5zVJzSXZtBFJS', 'GL63CdJxr0wI2BuKh7JNC8rJU7XNUY24', 10, 'asdas', 'admin', 20, 1530780329, 1557132823, ''),
(2, 'amanda', 'amanda', 'amanda@gmail.com', '$2y$13$HOmDlRno1UuYKruSiCCloeFYl42kgo.Xe/YQkhJ7rT5UqzgVOk8km', '_zeXxi6iVr_xs-FqKaD4Gyc6gk1oQPSi', 10, '-eQBpDCsiG-WVNzoR7Na8Np0nPMLgPpr_1633397521', 'sales', 10, 1633397521, 1633397521, ''),
(3, 'Amanda', 'suppliertest1', 'sudirmans@gmail.com', '$2y$13$QiyZkjKge5x9x.UhQZuh0.tM16bG8ZDhcjK.XA7kP6.FiS3vcsFHG', 'HMddwQmHLuiS_Zr4PeXZNFKFTJYmyfAR', 10, 'gXqy7NycH5Llh2TG3gaxo30Ni3J9LCQ5_1633412685', 'sales', 10, 1633412685, 1660628797, ''),
(4, 'badak', 'badak', 'badak@gmail.com', '$2y$13$dGB1UbrwcjR6ia0HINlkIOqWrVsa5MDl2KqWlvaufYGcWT3bKfYue', 'BU11S0MYHqIajs0crfbLGwa6XLP8V2Tm', 10, '9UFEWmCQdTdbzVKgRuNuGdu4mCNryPcc_1633412961', 'sales', 10, 1633412961, 1633412961, ''),
(5, 'cicak', 'cicak', 'badak@gmail.com', '$2y$13$0ix5aSza9TaQe/sTZePRVewqWclltHfOhmmLr6nqvdAz1dGOVYitq', 'E2TwV7p0va1Mx7d_hc0p7kixVe6n8DFI', 10, 'Znib2lA4kDw4Kb0H_E_6_h5Ae5pHIq6j_1633413050', 'sales', 10, 1633413050, 1633413050, ''),
(6, 'dana', 'dana', 'dana@gmail.com', '$2y$13$dpaCW9gZ5VwtiMu6mKaN0.jSEmcVyXeqpCoQ9Hlp/Uw8wQ1OCzuSy', 'x2vAcCIgVx3O2A5CYBrqst_5ZgJvIyjq', 10, 'qlLsauvlCxfCOl9WQf4UTk7NjHxHhG60_1633413126', 'sales', 10, 1633413126, 1633413126, ''),
(7, 'edane', 'edane', 'edane@gmail.com', '$2y$13$hpUJwJbZDhUwargdlP/gPOfbPPg55EGQ8Bg2KbvPPsA16Ele6puNO', 'sd8Vt6rhcpnB0GIrGCPG5DivJXxeL5VJ', 10, 'gKJllGZg69i-x4Ryf_Y7Rxd7sJd5yCEM_1633413155', 'sales', 10, 1633413155, 1637881922, ''),
(8, 'fafa', 'fafa', 'fafa@gmail.com', '$2y$13$QePfjZeow1IT/8nfW6XT1upknZy5JaUI2hJqMFeo7kwDDT0NAidvO', 'i2v3u3b7BSh2th53lx6nF33pXu3eLCQs', 10, 'rKIDO7W-6KjAv3pGjGXNtyjujtnSpUyk_1633420082', 'sales', 10, 1633420082, 1633420082, ''),
(9, 'maria', 'maria', 'maria@gmail.com', '$2y$13$a9gU9aRmYVbAC15gzQG2t.ErV2fIL1sp2a6pFtZ2eTN.fs9BfKYJC', 'KNgle8pr2uCN0yHPzthO5ZkLZWAujtfe', 10, 'KNb7TJdDo0bBp4UyWmZrDpi0UcGHO02b_1633932308', 'sales', 10, 1633932308, 1643874577, ''),
(10, 'dudung', 'dudung', 'dudung@mail.com', '$2y$13$q2p0JKebK0FaNjoSTO8B6u/Zj3u.ZkrMKhEP7kBuJhYPFQqYimdUq', 'CWPbj5JkcMEJ0-zwhikfigXXW2OVF2Qu', 10, 'znQZmKoTvTMKGrFzUsrPGoaCuSZ_jGbN_1637317971', 'produksi', 10, 1637317971, 1637317971, ''),
(11, 'mamaria', 'mamari', 'mamari@mail.com', '$2y$13$6/io6nV/mv9PTLNaKJrNhuhtbSTFyVDEk5h54OCtauXbpt0ISjFci', 'IXQ24vtqjr8-0wSyCpnCO-AWSrZDelmK', 10, 'dExfX_HafUKMdZk-XIspJQ1cbXLhELDA_1638343265', 'sales', 10, 1638343265, 1638343265, ''),
(12, 'Outlet Jakarta', 'jakarta', 'outja@mail.com', '$2y$13$ZMt/apiZ8Q7gIlYoHFedlulorEbT9iVPvwhnBRQZ3FfQCFHgixSL2', 'u3F2t0S5zLwtLaKx8DOKTqxvVct-w2R7', 10, 'O7-VXPcO_1Mixx4dO7hFcy7hOvyHo1de_1639095512', 'sales', 10, 1639095512, 1639095512, ''),
(17, 'Andita Wati', 'andita', 'andita@gmail.com', '$2y$13$AzQbep90NGPC2QCEtmrxsO9Q3X6p2dIO0gBqZoE0pdiryyp8Zr.H.', 'zoLqY-zdRIQuf4oD2usQcv8BOtJtVRJo', 10, 'yDkfYwD4M3I-eiSWCvBu0kLE5EfYZZ4Y_1660626500', 'member', 10, 1660626500, 1662558463, ''),
(18, 'Rosalinda', 'Rosalinda', 'sudirman@gmail.com', '$2y$13$h2FKTpKAlxEp05GuqIXJteSmKtLGuayA8d/yFTPwjCyQQMAg52da6', '0c3QFelu0JT08dAeAfetkP590B_gC8jU', 10, 'V6jAbRlO5OeeYBeZ2-xF_byazESO53-P_1660629541', 'member', 10, 1660629541, 1660629541, ''),
(20, 'Safinaty', 'safi', 'fyndy@telkom.ac.id', '$2y$13$LF0lbQH.qxVLE1D4GJmjv.26JkquNieV5aDgCwjxWnMloJf/4jzn2', 'RXdIjVVXN5GwcgcsMOUg9Hb4sti2Wsoy', 10, '0IHjG-qFeZNxD2LTEfEdsV_v-3v6irZ1_1660631026', 'member', 10, 1660631026, 1660631026, ''),
(21, 'Dimas Rizqy Pangestu', 'DIMAS', 'dimasrzqy@telkom.ac.id', '$2y$13$arW6cZqWfSsk9WTBo8WxGO6gNUsKBAvh3nyWDSPR3HHYZ0q9lGgZW', '_QlKpGyYB47n2rTLfHfeTlB8yH2ufRx2', 10, 'CC3mh5K9UiX_2cbM7UtZRbxF896KtJlH_1660631070', 'member', 10, 1660631070, 1662801365, ''),
(22, 'Bambang Pamungkas', 'BP', 'BP20@email.com', '$2y$13$JQy17f96/v5DIMJjW2DKXOiABbS0d0iJTTliJ63edv40oLd2HMF9q', 'xT71eGCNuBastriEpMWJvOiY6vTFPDma', 10, 'rOU_z2YNfBSn75IdAR52QORvkjxo7nHe_1661968667', 'member', 10, 1661968667, 1661968667, ''),
(23, 'Meli', 'meli', 'sudirman2@gmail.com', '$2y$13$L5jimJBtcYj9U0BuzLUJQuljyb9pDwE2VIo3Lmr8w1IDhU5cXejRi', 'RI1YBd_R7qOmj7FzmAh57FBiUg6XRjYb', 10, 'xqahY93qHypwZCOMiTTVGP8KfwkL_ufm_1662018356', 'member', 10, 1662018356, 1662018356, ''),
(24, 'RANDY', 'randy', 'MAIL@MAIL.COM', '$2y$13$LDGqfy7IOQ2VEvcBjF/rVuNst/bdhrhpum4RvGiDS9Lh9n8GZrKDG', 'crkZ1xUAwJryAnLhXWsMZ_3aUK60mdKJ', 10, 'feXdYA_DSY_6pNWBxo5tmdrkSWlDOaRs_1662554564', 'member', 10, 1662554564, 1662554660, ''),
(25, 'Putri Handayani', 'putri handayani', 'sinung@ithb.ac.id', '$2y$13$E7qsbnoIo/zXBwIPra1IF.DKtxtsNM/OTjb2x6iy/d.3d5Mqg/Lwe', '5Ppb65MLD9GN_kzrIo7c9TKRyThxfuUf', 10, 'IrbLy1iCX3xhsjpaY-53HEbE5M2Pk8fV_1662558357', 'member', 10, 1662558357, 1662558357, ''),
(26, 'Firdy', 'firdy', 'firdy@mail.com', '$2y$13$iUBSRjEuF7FBWIT99L7FWOaMOtiuhZHA2ABPxFyXGN9aXPz88xEoy', '9ikx2hbSbpY2MasJZEcrZU1-3VdOQoBo', 10, 'LwOVOo2rZPGA54yOPNmucoQIxjFEb7rk_1662560528', 'member', 10, 1662560528, 1662560528, ''),
(27, 'Tesam Arifah', 'tesam', 'tesam@26.com', '$2y$13$FltE7Av6sfke1awZDT5VZusE/cxugBkZtrqBzbQm7kmw/4pLi5WiO', 'z23fp5oxlh5pRZ-g1FejAIkuiM-AA7Up', 10, 'rHY--KrZgGsDvCOfLOmIy0_KKe5gcRse_1662566824', 'member', 10, 1662566824, 1662566824, ''),
(28, 'zafir kun', 'zafir', 'zafirateambrebes@gmail.com', '$2y$13$NPU8vDWBkZXs5F6jfxOqzOLLuWtq8i1oDHSYggRuaEelotmgbRF6m', 'guN1woHwabIZiWZrm9tcM9bGpK1RUcb-', 10, 'ut2AAQ2hrSYqf-3kiqbzHjchuwCfeGzT_1662618355', 'member', 10, 1662618355, 1662618397, ''),
(29, 'intan', 'intan123', 'intan@mail.com', '$2y$13$RqlEWiSZerMcWj4apQksQeEDtcdmUX5DQt5D09MNPnwpHw7F0c9Qm', 'A_uyrX_vx3du9m05nKRPWk4evR-fsBLB', 10, '21KvE97dtfzUnlItBfB_CWd39HVJJhlR_1662620976', 'member', 10, 1662620976, 1662621721, ''),
(30, 'alsha', 'alsha', 'alsha@mail.com', '$2y$13$vW4T/YLizu8JDqUbHw2GbeJfRdwG9bNkg9oAEOXt8ObomPv0rlWCC', '1YrvL1mUVm_IakcePxkq_U5_tlto8kQe', 10, 'T3eYzdfFJrfL8fs005dV89TvvyQrA-Z7_1662621451', 'member', 10, 1662621451, 1662621451, ''),
(31, 'JACK DOE', 'jackdoe', 'jack@gmail.com', '$2y$13$HM/NBobJO7Rv6tVZIB1IzOGJQaGGq52.lXQu35a5Q8fL4kjomK8mG', 'D2M-We1kXSo4zRJ7uQy5zx0OMXio5xm5', 10, 'B33yFYJnsdrll_FF-fQZkUq6UrTl8cNZ_1662630737', 'member', 10, 1662630737, 1662630737, ''),
(32, 'Rojak Saepudin Taufik', 'rojak', 'Rosa@mail.com', '$2y$13$VHC6cV8aptYAIuv0xWcCU.GP61Idr.45kSDoYat/VvZK.n75doreq', 'gD-L1YqbMDx8WF6frYsXc76WPV_FaDOB', 10, 'Xnw-kkom8dovvFyx51dapIjXnPGel42l_1663333676', 'member', 10, 1663333676, 1663333676, ''),
(33, 'M.ikhsan', 'ikhsannoviandani', 'nvdddjjmm@gmail.com', '$2y$13$lTkyPPA8/6rxh3UPdLi3zeelnHTWLVlCNHUNzJ/egPL35XhBCJIIK', 'bJEVA4a4-l8ksgdP7l24N3c7CxsGOxUX', 10, '1pvakOWBeZXoK1PzmwbiXXn1Mz5zxKCE_1664434865', 'member', 10, 1664434865, 1664434865, ''),
(34, 'Susi ', 'susi', 'susi@gmail.com', '$2y$13$QMn1.Ydk.y0g17gQAFQw4uB1DIuPY66sEfAUYecswieqt7ubrPkrC', '9GtojWetFYDkJbKFMRi6xcRRzWtgUHf6', 10, 'clAnkmfOB9_1CSPY3JfoKVWH-yw9dp4K_1666255287', 'member', 10, 1666255287, 1669280246, ''),
(35, 'Rosalinda', '9999', '', '$2y$13$m.1PljG4P2ifVdWR45xyIuhmmFlQtu2wm4GS1W5fZ7zKJLeyeVsYu', 'VjU4xBeYWvYW23cX5ztruLYxivrgWlh-', 10, 'NefxljIBLJYucteCJp-1Ykf3t5ujG5FU_1670557408', 'member', 10, 1670557408, 1670557495, 'e66055e8e308770492a44bf16e875127'),
(36, 'intan', '1234567865432', '', '$2y$13$gIneuMg041FDzy3Kef3lH.M.gezC0FcnZ78Sp3RaNu6YwymdNIM2S', 'ymS0URMW25poTUVU4Iz4s5rsUL-Skknw', 10, 'ZkuLRFZ72utA1kip1rjyPeGtN8lt4Po6_1672632369', 'member', 10, 1672632369, 1672632369, '25df72eb261afb97ce54f4a41d1350b9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_outlet`
--

CREATE TABLE `user_outlet` (
  `id_user_outlet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_outlet_penjualan` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_user_id` int(11) DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_outlet`
--

INSERT INTO `user_outlet` (`id_user_outlet`, `id_user`, `id_outlet_penjualan`, `created_date`, `created_user_id`, `created_ip_address`) VALUES
(1, 7, 2, NULL, NULL, NULL),
(2, 8, 1, NULL, NULL, NULL),
(3, 9, 1, NULL, NULL, NULL),
(4, 11, 1, NULL, NULL, NULL),
(5, 12, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_perusahaan`
--

CREATE TABLE `user_perusahaan` (
  `id_user_perusahaan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_ip_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_perusahaan`
--

INSERT INTO `user_perusahaan` (`id_user_perusahaan`, `id_user`, `id_perusahaan`, `created_date`, `created_user`, `created_ip_address`) VALUES
(1, 5, 1, '0000-00-00 00:00:00', 0, ''),
(2, 8, 15, '0000-00-00 00:00:00', 0, ''),
(3, 1, 2, '0000-00-00 00:00:00', 0, ''),
(4, 10, 1, '2019-02-25 06:14:48', 0, '::1'),
(5, 12, 99, '2019-03-08 04:20:19', 0, '::1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_system`
--

CREATE TABLE `user_system` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `user_systemname` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_key` varchar(250) NOT NULL,
  `status` smallint(6) NOT NULL,
  `password_reset_token` varchar(250) NOT NULL,
  `user_system_level` enum('admin','member','produksi','sales','management (ST)','ADM') NOT NULL DEFAULT 'ADM',
  `role` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_system`
--

INSERT INTO `user_system` (`id`, `full_name`, `user_systemname`, `email`, `password_hash`, `auth_key`, `status`, `password_reset_token`, `user_system_level`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@admin.com', '$2y$13$wUP89zDmoJhxVQ55PqilV.K/5e3.K2RSRuhHShtr5zVJzSXZtBFJS', 'GL63CdJxr0wI2BuKh7JNC8rJU7XNUY24', 10, 'asdas', 'admin', 20, 1530780329, 1557132823),
(2, 'amanda', 'amanda', 'amanda@gmail.com', '$2y$13$HOmDlRno1UuYKruSiCCloeFYl42kgo.Xe/YQkhJ7rT5UqzgVOk8km', '_zeXxi6iVr_xs-FqKaD4Gyc6gk1oQPSi', 10, '-eQBpDCsiG-WVNzoR7Na8Np0nPMLgPpr_1633397521', 'sales', 10, 1633397521, 1633397521),
(3, 'Amanda', 'suppliertest1', 'sudirmans@gmail.com', '$2y$13$CSMzk9sQ8oRHAnjpmxKq7.pwwX6PdqfR.zo5Wl9kS7Uaazac.43zW', 'HMddwQmHLuiS_Zr4PeXZNFKFTJYmyfAR', 10, 'gXqy7NycH5Llh2TG3gaxo30Ni3J9LCQ5_1633412685', 'sales', 10, 1633412685, 1633412685),
(4, 'badak', 'badak', 'badak@gmail.com', '$2y$13$dGB1UbrwcjR6ia0HINlkIOqWrVsa5MDl2KqWlvaufYGcWT3bKfYue', 'BU11S0MYHqIajs0crfbLGwa6XLP8V2Tm', 10, '9UFEWmCQdTdbzVKgRuNuGdu4mCNryPcc_1633412961', 'sales', 10, 1633412961, 1633412961),
(5, 'cicak', 'cicak', 'badak@gmail.com', '$2y$13$0ix5aSza9TaQe/sTZePRVewqWclltHfOhmmLr6nqvdAz1dGOVYitq', 'E2TwV7p0va1Mx7d_hc0p7kixVe6n8DFI', 10, 'Znib2lA4kDw4Kb0H_E_6_h5Ae5pHIq6j_1633413050', 'sales', 10, 1633413050, 1633413050),
(6, 'dana', 'dana', 'dana@gmail.com', '$2y$13$dpaCW9gZ5VwtiMu6mKaN0.jSEmcVyXeqpCoQ9Hlp/Uw8wQ1OCzuSy', 'x2vAcCIgVx3O2A5CYBrqst_5ZgJvIyjq', 10, 'qlLsauvlCxfCOl9WQf4UTk7NjHxHhG60_1633413126', 'sales', 10, 1633413126, 1633413126),
(7, 'edane', 'edane', 'edane@gmail.com', '$2y$13$hpUJwJbZDhUwargdlP/gPOfbPPg55EGQ8Bg2KbvPPsA16Ele6puNO', 'sd8Vt6rhcpnB0GIrGCPG5DivJXxeL5VJ', 10, 'gKJllGZg69i-x4Ryf_Y7Rxd7sJd5yCEM_1633413155', 'sales', 10, 1633413155, 1637881922),
(8, 'fafa', 'fafa', 'fafa@gmail.com', '$2y$13$QePfjZeow1IT/8nfW6XT1upknZy5JaUI2hJqMFeo7kwDDT0NAidvO', 'i2v3u3b7BSh2th53lx6nF33pXu3eLCQs', 10, 'rKIDO7W-6KjAv3pGjGXNtyjujtnSpUyk_1633420082', 'sales', 10, 1633420082, 1633420082),
(9, 'maria', 'maria', 'maria@gmail.com', '$2y$13$oQ/ysg5HWdhzCQZKN3tfd.KQBys0UtLQMeyycey4tPCeGcX2U/pLG', 'KNgle8pr2uCN0yHPzthO5ZkLZWAujtfe', 10, 'KNb7TJdDo0bBp4UyWmZrDpi0UcGHO02b_1633932308', 'sales', 10, 1633932308, 1633932308),
(10, 'dudung', 'dudung', 'dudung@mail.com', '$2y$13$q2p0JKebK0FaNjoSTO8B6u/Zj3u.ZkrMKhEP7kBuJhYPFQqYimdUq', 'CWPbj5JkcMEJ0-zwhikfigXXW2OVF2Qu', 10, 'znQZmKoTvTMKGrFzUsrPGoaCuSZ_jGbN_1637317971', 'produksi', 10, 1637317971, 1637317971),
(11, 'mamaria', 'mamari', 'mamari@mail.com', '$2y$13$6/io6nV/mv9PTLNaKJrNhuhtbSTFyVDEk5h54OCtauXbpt0ISjFci', 'IXQ24vtqjr8-0wSyCpnCO-AWSrZDelmK', 10, 'dExfX_HafUKMdZk-XIspJQ1cbXLhELDA_1638343265', 'sales', 10, 1638343265, 1638343265),
(12, 'Outlet Jakarta', 'jakarta', 'outja@mail.com', '$2y$13$ZMt/apiZ8Q7gIlYoHFedlulorEbT9iVPvwhnBRQZ3FfQCFHgixSL2', 'u3F2t0S5zLwtLaKx8DOKTqxvVct-w2R7', 10, 'O7-VXPcO_1Mixx4dO7hFcy7hOvyHo1de_1639095512', 'sales', 10, 1639095512, 1639095512);

-- --------------------------------------------------------

--
-- Struktur dari tabel `web_page`
--

CREATE TABLE `web_page` (
  `id_web_page` bigint(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `with_banner` int(1) NOT NULL,
  `content_lang1` text NOT NULL,
  `content_lang2` text DEFAULT NULL,
  `created_id_user` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `web_page`
--

INSERT INTO `web_page` (`id_web_page`, `title`, `with_banner`, `content_lang1`, `content_lang2`, `created_id_user`, `created_date`, `created_ip_address`, `is_active`) VALUES
(1, 'custom-page', 1, '<h2 class=\"featurette-heading\">COMPANY INTRODUCTION</h2>\r\n<hr />\r\n<p class=\"lead\">Founded in 1990, Ecogreen Oleochemicals is one of the leading producers of Natural Fatty Alcohols in the world. Ecogreen Oleochemicals has production facilities in Indonesia which producing various cuts of Saturated Fatty Alcohols (from C8 to C18). Unsaturated Fatty Alcohols (Oleyl Alcohols), Oleic Acid, Refined Glycerin and Specialty Esters such as Medium Chain Triglycerides (MCT for Food, Cosmetics, Pharmaceutical and Lubricant application).</p>\r\n<p class=\"lead\">Ecogreen Oleochemicals has also Ethoxylation Plant (EMPL) in Singapore producing Fatty Alcohol Ethoxylates (downstream of fatty alcohol). In Germany, Ecogreen Oleochemicals (DHW Deutsche Hydrierwerke GmbH Rodleben) has production facilities to produce Unsaturated Fatty Alcohols (Oleyl Alcohols), Primary Fatty Amines, Specialty Esters, Sorbitol powder. In France, Ecogreen Oleochemicals (E&amp;S Chimie) has production facilities to produce Fatty Alcohol Ethoxylates, Fatty Alcohol Esther Sulfates, Fatty Alcohol Sulfates and Specialty Esters. Currently Ecogreen Oleochemicals employs about 1,300 people globally.</p>\r\n<p class=\"lead\">To serve customers globally, Ecogreen Oleochemicals establishes marketing offices in Singapore, Germany and USA.</p>', '<h2 class=\"featurette-heading\">COMPANY INTRODUCTION</h2>\r\n<hr />\r\n<p class=\"lead\">Founded in 1990, Ecogreen Oleochemicals is one of the leading producers of Natural Fatty Alcohols in the world. Ecogreen Oleochemicals has production facilities in Indonesia which producing various cuts of Saturated Fatty Alcohols (from C8 to C18). Unsaturated Fatty Alcohols (Oleyl Alcohols), Oleic Acid, Refined Glycerin and Specialty Esters such as Medium Chain Triglycerides (MCT for Food, Cosmetics, Pharmaceutical and Lubricant application).</p>\r\n<p class=\"lead\">Ecogreen Oleochemicals has also Ethoxylation Plant (EMPL) in Singapore producing Fatty Alcohol Ethoxylates (downstream of fatty alcohol). In Germany, Ecogreen Oleochemicals (DHW Deutsche Hydrierwerke GmbH Rodleben) has production facilities to produce Unsaturated Fatty Alcohols (Oleyl Alcohols), Primary Fatty Amines, Specialty Esters, Sorbitol powder. In France, Ecogreen Oleochemicals (E&amp;S Chimie) has production facilities to produce Fatty Alcohol Ethoxylates, Fatty Alcohol Esther Sulfates, Fatty Alcohol Sulfates and Specialty Esters. Currently Ecogreen Oleochemicals employs about 1,300 people globally.</p>\r\n<p class=\"lead\">To serve customers globally, Ecogreen Oleochemicals establishes marketing offices in Singapore, Germany and USA.</p>', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `web_vocabulary`
--

CREATE TABLE `web_vocabulary` (
  `id_web_vocabulary` bigint(20) NOT NULL,
  `vocab_lang1` varchar(250) NOT NULL,
  `vocab_lang2` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `web_vocabulary`
--

INSERT INTO `web_vocabulary` (`id_web_vocabulary`, `vocab_lang1`, `vocab_lang2`) VALUES
(1, 'Read More', 'Baca Lagi'),
(2, 'Berita', 'Berita'),
(3, 'Our Vission', 'Unsere Vision'),
(4, 'Our Mission', 'Unsere Aufgabe'),
(5, 'Our Values', 'Unsere Werte'),
(6, 'Corporate News', 'Unternehmensnachrichten'),
(7, 'Back', 'Zurück'),
(8, 'Create', 'Buat');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `id_parent` (`id_parent`);

--
-- Indeks untuk tabel `app_field_config`
--
ALTER TABLE `app_field_config`
  ADD PRIMARY KEY (`id_app_field_config`),
  ADD KEY `classname` (`classname`,`fieldname`),
  ADD KEY `varian_group` (`varian_group`);

--
-- Indeks untuk tabel `app_setting`
--
ALTER TABLE `app_setting`
  ADD PRIMARY KEY (`id_app_setting`);

--
-- Indeks untuk tabel `app_vocabulary`
--
ALTER TABLE `app_vocabulary`
  ADD PRIMARY KEY (`id_app_vocabulary`),
  ADD KEY `master_vocab` (`master_vocab`);

--
-- Indeks untuk tabel `asset_item`
--
ALTER TABLE `asset_item`
  ADD PRIMARY KEY (`id_asset_item`),
  ADD KEY `id_asset_master` (`id_asset_master`),
  ADD KEY `id_asset_received` (`id_asset_received`),
  ADD KEY `id_asset_item_location` (`id_asset_item_location`),
  ADD KEY `kode_barcode` (`kode_barcode`),
  ADD KEY `qrcode` (`qrcode`),
  ADD KEY `link_code` (`link_code`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indeks untuk tabel `asset_item_location`
--
ALTER TABLE `asset_item_location`
  ADD PRIMARY KEY (`id_asset_item_location`),
  ADD KEY `id_asset_master` (`id_asset_master`),
  ADD KEY `id_kabupaten` (`id_kabupaten`,`id_propinsi`,`id_kecamatan`,`id_kelurahan`);

--
-- Indeks untuk tabel `asset_master`
--
ALTER TABLE `asset_master`
  ADD PRIMARY KEY (`id_asset_master`),
  ADD KEY `supplier_id` (`id_supplier`);

--
-- Indeks untuk tabel `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Indeks untuk tabel `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indeks untuk tabel `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indeks untuk tabel `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indeks untuk tabel `bank_pembayaran`
--
ALTER TABLE `bank_pembayaran`
  ADD PRIMARY KEY (`id_bank_pembayaran`);

--
-- Indeks untuk tabel `bei_compentecy_question`
--
ALTER TABLE `bei_compentecy_question`
  ADD PRIMARY KEY (`id_bei_compentecy_question`),
  ADD KEY `number` (`number`),
  ADD KEY `id_hrm_competency_dimension` (`id_hrm_competency_dimension`);

--
-- Indeks untuk tabel `bei_interview_batch`
--
ALTER TABLE `bei_interview_batch`
  ADD PRIMARY KEY (`id_bei_interview_batch`);

--
-- Indeks untuk tabel `bei_interview_peserta`
--
ALTER TABLE `bei_interview_peserta`
  ADD PRIMARY KEY (`id_bei_interview_peserta`),
  ADD KEY `id_bei_interview_batch` (`id_bei_interview_batch`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `bei_interview_session`
--
ALTER TABLE `bei_interview_session`
  ADD PRIMARY KEY (`id_bei_interview_session`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_bei_interview_batch` (`id_bei_interview_batch`),
  ADD KEY `id_bei_interview_batch_2` (`id_bei_interview_batch`);

--
-- Indeks untuk tabel `bei_kar_asses_jawaban`
--
ALTER TABLE `bei_kar_asses_jawaban`
  ADD PRIMARY KEY (`id_bei_kar_asses_jawaban`),
  ADD KEY `id_ccat_jenis_ujian` (`id_bei_compentecy_question`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_ccat_assesment_batch_sessi` (`id_bei_interview_session`),
  ADD KEY `id_ccat_jenis_sub_ujian` (`id_hrm_competency_dimension`),
  ADD KEY `id_kompetensi_dasar` (`id_kompetensi_dasar`);

--
-- Indeks untuk tabel `bei_mst_category_predef_quest`
--
ALTER TABLE `bei_mst_category_predef_quest`
  ADD PRIMARY KEY (`id_bei_mst_category_predef_quest`);

--
-- Indeks untuk tabel `bei_pegawai_chat`
--
ALTER TABLE `bei_pegawai_chat`
  ADD PRIMARY KEY (`id_bei_pegawai_chat`),
  ADD KEY `id_pegawai` (`id_pegawai`,`from_user_id`,`to_user_id`,`time_log`),
  ADD KEY `id_bei_interview_session` (`id_bei_interview_session`),
  ADD KEY `number_order` (`number_order`);

--
-- Indeks untuk tabel `bei_predefined_question`
--
ALTER TABLE `bei_predefined_question`
  ADD PRIMARY KEY (`id_bei_predefined_question`),
  ADD KEY `number` (`number`,`id_bei_mst_category_predef_quest`);

--
-- Indeks untuk tabel `bei_sequence`
--
ALTER TABLE `bei_sequence`
  ADD PRIMARY KEY (`id_bei_sequence`);

--
-- Indeks untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id_contact_us`),
  ADD KEY `id_office_region` (`id_office_region`);

--
-- Indeks untuk tabel `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id_content`),
  ADD KEY `keyname` (`keyname`),
  ADD KEY `id_section_content` (`id_section_content`),
  ADD KEY `id_frontend_topnav` (`id_frontend_topnav`);

--
-- Indeks untuk tabel `cpanel_leftmenu`
--
ALTER TABLE `cpanel_leftmenu`
  ADD PRIMARY KEY (`id_leftmenu`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_kabupaten` (`id_kabupaten`);

--
-- Indeks untuk tabel `data_jurusan`
--
ALTER TABLE `data_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `data_sekolah`
--
ALTER TABLE `data_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indeks untuk tabel `diklat_pegawai`
--
ALTER TABLE `diklat_pegawai`
  ADD PRIMARY KEY (`id_diklat`);

--
-- Indeks untuk tabel `diklat_pegawai_kategori`
--
ALTER TABLE `diklat_pegawai_kategori`
  ADD PRIMARY KEY (`id_diklat_pegawai_kategori`);

--
-- Indeks untuk tabel `diklat_pegawai_list`
--
ALTER TABLE `diklat_pegawai_list`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indeks untuk tabel `frontend_topnav`
--
ALTER TABLE `frontend_topnav`
  ADD PRIMARY KEY (`id_frontend_topnav`);

--
-- Indeks untuk tabel `home_info`
--
ALTER TABLE `home_info`
  ADD PRIMARY KEY (`id_home_info`);

--
-- Indeks untuk tabel `hrm_competency_dimension`
--
ALTER TABLE `hrm_competency_dimension`
  ADD PRIMARY KEY (`id_hrm_competency_dimension`),
  ADD KEY `id_hrm_competency_cluster` (`id_hrm_competency_cluster`),
  ADD KEY `id_hrm_competency_category` (`id_hrm_competency_category`);

--
-- Indeks untuk tabel `hrm_competency_dimension_level`
--
ALTER TABLE `hrm_competency_dimension_level`
  ADD PRIMARY KEY (`id_hrm_competency_dimension_level`),
  ADD KEY `id_hrm_competency_cluster` (`id_hrm_competency_cluster`),
  ADD KEY `id_hrm_competency_category` (`id_hrm_competency_category`),
  ADD KEY `id_hrm_competency_dimension` (`id_hrm_competency_dimension`);

--
-- Indeks untuk tabel `hrm_cv_asuransi`
--
ALTER TABLE `hrm_cv_asuransi`
  ADD PRIMARY KEY (`id_cv_asuransi`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_mst_jenis_asuransi` (`id_hrm_mst_jenis_asuransi`);

--
-- Indeks untuk tabel `hrm_cv_keluarga`
--
ALTER TABLE `hrm_cv_keluarga`
  ADD PRIMARY KEY (`id_keluarga`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_mst_jenis_hub_keluarga` (`id_mst_jenis_hub_keluarga`);

--
-- Indeks untuk tabel `hrm_cv_kesehatan`
--
ALTER TABLE `hrm_cv_kesehatan`
  ADD PRIMARY KEY (`id_cv_kesehatan`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_mst_jenis_tunjangan_kesehatan` (`id_mst_jenis_tunjangan_kesehatan`),
  ADD KEY `id_mst_jenis_penyakit` (`id_mst_jenis_penyakit`);

--
-- Indeks untuk tabel `hrm_cv_language_skill`
--
ALTER TABLE `hrm_cv_language_skill`
  ADD PRIMARY KEY (`id_language_skill`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `hrm_cv_riwayat_pekerjaan`
--
ALTER TABLE `hrm_cv_riwayat_pekerjaan`
  ADD PRIMARY KEY (`id_riwayat_pekerjaan`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `code_id` (`code_id`);

--
-- Indeks untuk tabel `hrm_cv_riwayat_pendidikan`
--
ALTER TABLE `hrm_cv_riwayat_pendidikan`
  ADD PRIMARY KEY (`id_riwayat_pendidikan`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `code_id` (`code_id`),
  ADD KEY `id_mst_tingkat_pendidikan` (`id_mst_tingkat_pendidikan`,`id_sekolah`,`id_jurusan`);

--
-- Indeks untuk tabel `hrm_mst_bahasa`
--
ALTER TABLE `hrm_mst_bahasa`
  ADD PRIMARY KEY (`id_mst_bahasa`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indeks untuk tabel `hrm_mst_jenis_absensi`
--
ALTER TABLE `hrm_mst_jenis_absensi`
  ADD PRIMARY KEY (`id_mst_jenis_absensi`);

--
-- Indeks untuk tabel `hrm_mst_jenis_asuransi`
--
ALTER TABLE `hrm_mst_jenis_asuransi`
  ADD PRIMARY KEY (`id_hrm_mst_jenis_asuransi`);

--
-- Indeks untuk tabel `hrm_mst_jenis_tunjangan_kesehatan`
--
ALTER TABLE `hrm_mst_jenis_tunjangan_kesehatan`
  ADD PRIMARY KEY (`id_mst_jenis_tunjangan_kesehatan`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indeks untuk tabel `hrm_pegawai`
--
ALTER TABLE `hrm_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `jenis_kelamin` (`jenis_kelamin`),
  ADD KEY `NIP` (`NIP`),
  ADD KEY `agama` (`agama`),
  ADD KEY `status_pernikahan` (`status_pernikahan`),
  ADD KEY `golongan_darah` (`golongan_darah`),
  ADD KEY `cid` (`cid`),
  ADD KEY `id_hrm_status_pegawai` (`id_hrm_status_pegawai`),
  ADD KEY `id_hrm_status_organik` (`id_hrm_status_organik`),
  ADD KEY `pdk_id_tingkatpendidikan` (`pdk_id_tingkatpendidikan`),
  ADD KEY `reg_status_pegawai` (`reg_status_pegawai`),
  ADD KEY `id_perusahaan` (`id_perusahaan`),
  ADD KEY `userid` (`userid`),
  ADD KEY `pos_id_kk_profil_posisi` (`pos_id_kk_profil_posisi`);

--
-- Indeks untuk tabel `hrm_perusahaan_asuransi`
--
ALTER TABLE `hrm_perusahaan_asuransi`
  ADD PRIMARY KEY (`id_hrm_perusahaan_asuransi`);

--
-- Indeks untuk tabel `hrm_status_pegawai`
--
ALTER TABLE `hrm_status_pegawai`
  ADD PRIMARY KEY (`id_hrm_status_pegawai`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jenis_landing_asset`
--
ALTER TABLE `jenis_landing_asset`
  ADD PRIMARY KEY (`id_jenis_landing_asset`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`),
  ADD KEY `id_propinsi` (`id_propinsi`),
  ADD KEY `id_propinsi_2` (`id_propinsi`);

--
-- Indeks untuk tabel `kantor`
--
ALTER TABLE `kantor`
  ADD PRIMARY KEY (`id_kantor`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_kabupaten` (`id_kabupaten`);

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `kodepos` (`kodepos`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `landing_asset`
--
ALTER TABLE `landing_asset`
  ADD PRIMARY KEY (`id_landing_asset`),
  ADD KEY `id_jenis_informasi` (`id_jenis_landing_asset`,`id_parent`,`triwulan`,`tahun`);

--
-- Indeks untuk tabel `landing_home`
--
ALTER TABLE `landing_home`
  ADD PRIMARY KEY (`id_landing_home`);

--
-- Indeks untuk tabel `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id_language`);

--
-- Indeks untuk tabel `laporan_kinerja_pegawai`
--
ALTER TABLE `laporan_kinerja_pegawai`
  ADD PRIMARY KEY (`id_laporan_kinerja`);

--
-- Indeks untuk tabel `log_order_pegawai`
--
ALTER TABLE `log_order_pegawai`
  ADD PRIMARY KEY (`id_log_order`);

--
-- Indeks untuk tabel `matching_environment_result`
--
ALTER TABLE `matching_environment_result`
  ADD PRIMARY KEY (`id_matching_environment_result`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_environment` (`id_kabupaten`);

--
-- Indeks untuk tabel `matching_jabatan_result`
--
ALTER TABLE `matching_jabatan_result`
  ADD PRIMARY KEY (`id_matching_jabatan_result`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `matching_organization_result`
--
ALTER TABLE `matching_organization_result`
  ADD PRIMARY KEY (`id_matching_organization_result`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_organization` (`id_perusahaan`);

--
-- Indeks untuk tabel `media_identity`
--
ALTER TABLE `media_identity`
  ADD PRIMARY KEY (`id_media_identity`);

--
-- Indeks untuk tabel `menu_link`
--
ALTER TABLE `menu_link`
  ADD PRIMARY KEY (`id_menu_link`);

--
-- Indeks untuk tabel `mst_environment_attribute`
--
ALTER TABLE `mst_environment_attribute`
  ADD PRIMARY KEY (`id_mst_environment_attribute`);

--
-- Indeks untuk tabel `mst_environment_attribute_grade`
--
ALTER TABLE `mst_environment_attribute_grade`
  ADD PRIMARY KEY (`id_mst_environment_attribute_grade`);

--
-- Indeks untuk tabel `mst_jabatan_attribute`
--
ALTER TABLE `mst_jabatan_attribute`
  ADD PRIMARY KEY (`id_mst_jabatan_attribute`);

--
-- Indeks untuk tabel `mst_jabatan_attribute_grade`
--
ALTER TABLE `mst_jabatan_attribute_grade`
  ADD PRIMARY KEY (`id_mst_jabatan_attribute_grade`);

--
-- Indeks untuk tabel `mst_jenis_penyakit`
--
ALTER TABLE `mst_jenis_penyakit`
  ADD PRIMARY KEY (`id_mst_jenis_penyakit`);

--
-- Indeks untuk tabel `mst_jenjang_pendidikan`
--
ALTER TABLE `mst_jenjang_pendidikan`
  ADD PRIMARY KEY (`id_mst_jenjang_pendidikan`);

--
-- Indeks untuk tabel `mst_order_progres`
--
ALTER TABLE `mst_order_progres`
  ADD PRIMARY KEY (`id_mst_order_progres`);

--
-- Indeks untuk tabel `mst_organization_attribute`
--
ALTER TABLE `mst_organization_attribute`
  ADD PRIMARY KEY (`id_mst_organization_attribute`);

--
-- Indeks untuk tabel `mst_organization_attribute_grade`
--
ALTER TABLE `mst_organization_attribute_grade`
  ADD PRIMARY KEY (`id_mst_organization_attribute_grade`);

--
-- Indeks untuk tabel `mst_personal_attribute`
--
ALTER TABLE `mst_personal_attribute`
  ADD PRIMARY KEY (`id_mst_personal_attribute`);

--
-- Indeks untuk tabel `mst_personal_attribute_grade`
--
ALTER TABLE `mst_personal_attribute_grade`
  ADD PRIMARY KEY (`id_mst_personal_attribute_grade`),
  ADD KEY `id_mst_personal_attribute` (`id_mst_personal_attribute`);

--
-- Indeks untuk tabel `mst_tingkat_pendidikan`
--
ALTER TABLE `mst_tingkat_pendidikan`
  ADD PRIMARY KEY (`id_mst_tingkat_pendidikan`);

--
-- Indeks untuk tabel `order_pegawai`
--
ALTER TABLE `order_pegawai`
  ADD PRIMARY KEY (`id_order_pegawai`),
  ADD KEY `tanggal_order` (`tanggal_order`,`id_order_pegawai_kategori`,`id_asset_kendaraan1`,`id_asset_kendaraan2`,`id_mst_order_progres`);

--
-- Indeks untuk tabel `order_pegawai_kategori`
--
ALTER TABLE `order_pegawai_kategori`
  ADD PRIMARY KEY (`id_order_pegawai_kategori`);

--
-- Indeks untuk tabel `order_pegawai_list`
--
ALTER TABLE `order_pegawai_list`
  ADD PRIMARY KEY (`id_order_pegawai_list`),
  ADD KEY `id_order_pegawai` (`id_order_pegawai`,`id_pegawai`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indeks untuk tabel `pro_environment_attribute`
--
ALTER TABLE `pro_environment_attribute`
  ADD PRIMARY KEY (`id_pro_environment_attribute`),
  ADD KEY `id_environment` (`id_environment`,`id_mst_environment_attribute`,`id_mst_environment_attribute_grade`);

--
-- Indeks untuk tabel `pro_jabatan_attribute`
--
ALTER TABLE `pro_jabatan_attribute`
  ADD PRIMARY KEY (`id_pro_jabatan_attribute`),
  ADD KEY `id_jabatan` (`id_jabatan`,`id_mst_jabatan_attribute`,`id_mst_jabatan_attribute_grade`);

--
-- Indeks untuk tabel `pro_organization_attribute`
--
ALTER TABLE `pro_organization_attribute`
  ADD PRIMARY KEY (`id_pro_organization_attribute`),
  ADD KEY `id_organization` (`id_organization`,`id_mst_organization_attribute`,`id_mst_organization_attribute_grade`);

--
-- Indeks untuk tabel `pro_personal_attribute`
--
ALTER TABLE `pro_personal_attribute`
  ADD PRIMARY KEY (`id_pro_personal_attribute`),
  ADD KEY `id_pegawai` (`id_pegawai`,`id_mst_personal_attribute`,`id_mst_personal_attribute_grade`);

--
-- Indeks untuk tabel `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  ADD PRIMARY KEY (`id_riwayat_jabatan`),
  ADD KEY `id_pegawai` (`id_pegawai`,`id_jabatan`,`id_kantor`);

--
-- Indeks untuk tabel `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD PRIMARY KEY (`id_riwayat_pendidikan`),
  ADD KEY `id_pegawai` (`id_pegawai`,`id_jenjang_pendidikan`,`id_sekolah`);

--
-- Indeks untuk tabel `salary_monthly`
--
ALTER TABLE `salary_monthly`
  ADD PRIMARY KEY (`id_salary_monthly`);

--
-- Indeks untuk tabel `section_content`
--
ALTER TABLE `section_content`
  ADD PRIMARY KEY (`id_section_content`);

--
-- Indeks untuk tabel `smk_aspek_penilaian`
--
ALTER TABLE `smk_aspek_penilaian`
  ADD PRIMARY KEY (`id_aspek_penilaian`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indeks untuk tabel `subcontractor`
--
ALTER TABLE `subcontractor`
  ADD PRIMARY KEY (`id_subcontractor`),
  ADD KEY `id_kabupaten` (`id_kabupaten`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `type_asset1`
--
ALTER TABLE `type_asset1`
  ADD PRIMARY KEY (`id_type_asset`);

--
-- Indeks untuk tabel `type_asset2`
--
ALTER TABLE `type_asset2`
  ADD PRIMARY KEY (`id_type_asset`);

--
-- Indeks untuk tabel `type_asset3`
--
ALTER TABLE `type_asset3`
  ADD PRIMARY KEY (`id_type_asset`);

--
-- Indeks untuk tabel `type_asset4`
--
ALTER TABLE `type_asset4`
  ADD PRIMARY KEY (`id_type_asset`);

--
-- Indeks untuk tabel `type_asset5`
--
ALTER TABLE `type_asset5`
  ADD PRIMARY KEY (`id_type_asset`);

--
-- Indeks untuk tabel `type_asset_item1`
--
ALTER TABLE `type_asset_item1`
  ADD PRIMARY KEY (`id_type_asset_item`);

--
-- Indeks untuk tabel `type_asset_item2`
--
ALTER TABLE `type_asset_item2`
  ADD PRIMARY KEY (`id_type_asset_item`);

--
-- Indeks untuk tabel `type_asset_item3`
--
ALTER TABLE `type_asset_item3`
  ADD PRIMARY KEY (`id_type_asset_item`);

--
-- Indeks untuk tabel `type_asset_item4`
--
ALTER TABLE `type_asset_item4`
  ADD PRIMARY KEY (`id_type_asset_item`);

--
-- Indeks untuk tabel `type_asset_item5`
--
ALTER TABLE `type_asset_item5`
  ADD PRIMARY KEY (`id_type_asset_item`);

--
-- Indeks untuk tabel `unit_produksi`
--
ALTER TABLE `unit_produksi`
  ADD PRIMARY KEY (`id_unit_produksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `email` (`email`),
  ADD KEY `password_reset_token` (`password_reset_token`);

--
-- Indeks untuk tabel `user_outlet`
--
ALTER TABLE `user_outlet`
  ADD PRIMARY KEY (`id_user_outlet`);

--
-- Indeks untuk tabel `user_perusahaan`
--
ALTER TABLE `user_perusahaan`
  ADD PRIMARY KEY (`id_user_perusahaan`);

--
-- Indeks untuk tabel `user_system`
--
ALTER TABLE `user_system`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_systemname` (`user_systemname`),
  ADD KEY `email` (`email`),
  ADD KEY `password_reset_token` (`password_reset_token`);

--
-- Indeks untuk tabel `web_page`
--
ALTER TABLE `web_page`
  ADD PRIMARY KEY (`id_web_page`);

--
-- Indeks untuk tabel `web_vocabulary`
--
ALTER TABLE `web_vocabulary`
  ADD PRIMARY KEY (`id_web_vocabulary`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6017;

--
-- AUTO_INCREMENT untuk tabel `app_field_config`
--
ALTER TABLE `app_field_config`
  MODIFY `id_app_field_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `app_setting`
--
ALTER TABLE `app_setting`
  MODIFY `id_app_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `app_vocabulary`
--
ALTER TABLE `app_vocabulary`
  MODIFY `id_app_vocabulary` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `asset_item`
--
ALTER TABLE `asset_item`
  MODIFY `id_asset_item` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `asset_item_location`
--
ALTER TABLE `asset_item_location`
  MODIFY `id_asset_item_location` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `asset_master`
--
ALTER TABLE `asset_master`
  MODIFY `id_asset_master` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `bei_compentecy_question`
--
ALTER TABLE `bei_compentecy_question`
  MODIFY `id_bei_compentecy_question` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bei_interview_batch`
--
ALTER TABLE `bei_interview_batch`
  MODIFY `id_bei_interview_batch` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bei_interview_peserta`
--
ALTER TABLE `bei_interview_peserta`
  MODIFY `id_bei_interview_peserta` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bei_interview_session`
--
ALTER TABLE `bei_interview_session`
  MODIFY `id_bei_interview_session` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `bei_kar_asses_jawaban`
--
ALTER TABLE `bei_kar_asses_jawaban`
  MODIFY `id_bei_kar_asses_jawaban` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bei_mst_category_predef_quest`
--
ALTER TABLE `bei_mst_category_predef_quest`
  MODIFY `id_bei_mst_category_predef_quest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bei_pegawai_chat`
--
ALTER TABLE `bei_pegawai_chat`
  MODIFY `id_bei_pegawai_chat` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bei_predefined_question`
--
ALTER TABLE `bei_predefined_question`
  MODIFY `id_bei_predefined_question` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bei_sequence`
--
ALTER TABLE `bei_sequence`
  MODIFY `id_bei_sequence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_jurusan`
--
ALTER TABLE `data_jurusan`
  MODIFY `id_jurusan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_sekolah`
--
ALTER TABLE `data_sekolah`
  MODIFY `id_sekolah` bigint(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `diklat_pegawai`
--
ALTER TABLE `diklat_pegawai`
  MODIFY `id_diklat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `diklat_pegawai_kategori`
--
ALTER TABLE `diklat_pegawai_kategori`
  MODIFY `id_diklat_pegawai_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `diklat_pegawai_list`
--
ALTER TABLE `diklat_pegawai_list`
  MODIFY `id_peserta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `hrm_competency_dimension`
--
ALTER TABLE `hrm_competency_dimension`
  MODIFY `id_hrm_competency_dimension` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2010556;

--
-- AUTO_INCREMENT untuk tabel `hrm_competency_dimension_level`
--
ALTER TABLE `hrm_competency_dimension_level`
  MODIFY `id_hrm_competency_dimension_level` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201053307;

--
-- AUTO_INCREMENT untuk tabel `hrm_cv_asuransi`
--
ALTER TABLE `hrm_cv_asuransi`
  MODIFY `id_cv_asuransi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `hrm_cv_keluarga`
--
ALTER TABLE `hrm_cv_keluarga`
  MODIFY `id_keluarga` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `hrm_cv_kesehatan`
--
ALTER TABLE `hrm_cv_kesehatan`
  MODIFY `id_cv_kesehatan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `hrm_cv_language_skill`
--
ALTER TABLE `hrm_cv_language_skill`
  MODIFY `id_language_skill` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `hrm_cv_riwayat_pekerjaan`
--
ALTER TABLE `hrm_cv_riwayat_pekerjaan`
  MODIFY `id_riwayat_pekerjaan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `hrm_cv_riwayat_pendidikan`
--
ALTER TABLE `hrm_cv_riwayat_pendidikan`
  MODIFY `id_riwayat_pendidikan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `hrm_mst_bahasa`
--
ALTER TABLE `hrm_mst_bahasa`
  MODIFY `id_mst_bahasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `hrm_mst_jenis_absensi`
--
ALTER TABLE `hrm_mst_jenis_absensi`
  MODIFY `id_mst_jenis_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `hrm_mst_jenis_asuransi`
--
ALTER TABLE `hrm_mst_jenis_asuransi`
  MODIFY `id_hrm_mst_jenis_asuransi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `hrm_mst_jenis_tunjangan_kesehatan`
--
ALTER TABLE `hrm_mst_jenis_tunjangan_kesehatan`
  MODIFY `id_mst_jenis_tunjangan_kesehatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `hrm_pegawai`
--
ALTER TABLE `hrm_pegawai`
  MODIFY `id_pegawai` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `hrm_perusahaan_asuransi`
--
ALTER TABLE `hrm_perusahaan_asuransi`
  MODIFY `id_hrm_perusahaan_asuransi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `hrm_status_pegawai`
--
ALTER TABLE `hrm_status_pegawai`
  MODIFY `id_hrm_status_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenis_landing_asset`
--
ALTER TABLE `jenis_landing_asset`
  MODIFY `id_jenis_landing_asset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kantor`
--
ALTER TABLE `kantor`
  MODIFY `id_kantor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` bigint(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `landing_asset`
--
ALTER TABLE `landing_asset`
  MODIFY `id_landing_asset` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `landing_home`
--
ALTER TABLE `landing_home`
  MODIFY `id_landing_home` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `laporan_kinerja_pegawai`
--
ALTER TABLE `laporan_kinerja_pegawai`
  MODIFY `id_laporan_kinerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `log_order_pegawai`
--
ALTER TABLE `log_order_pegawai`
  MODIFY `id_log_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT untuk tabel `matching_environment_result`
--
ALTER TABLE `matching_environment_result`
  MODIFY `id_matching_environment_result` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT untuk tabel `matching_jabatan_result`
--
ALTER TABLE `matching_jabatan_result`
  MODIFY `id_matching_jabatan_result` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `matching_organization_result`
--
ALTER TABLE `matching_organization_result`
  MODIFY `id_matching_organization_result` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT untuk tabel `mst_environment_attribute`
--
ALTER TABLE `mst_environment_attribute`
  MODIFY `id_mst_environment_attribute` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `mst_environment_attribute_grade`
--
ALTER TABLE `mst_environment_attribute_grade`
  MODIFY `id_mst_environment_attribute_grade` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT untuk tabel `mst_jabatan_attribute`
--
ALTER TABLE `mst_jabatan_attribute`
  MODIFY `id_mst_jabatan_attribute` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `mst_jabatan_attribute_grade`
--
ALTER TABLE `mst_jabatan_attribute_grade`
  MODIFY `id_mst_jabatan_attribute_grade` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT untuk tabel `mst_jenis_penyakit`
--
ALTER TABLE `mst_jenis_penyakit`
  MODIFY `id_mst_jenis_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mst_jenjang_pendidikan`
--
ALTER TABLE `mst_jenjang_pendidikan`
  MODIFY `id_mst_jenjang_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `mst_order_progres`
--
ALTER TABLE `mst_order_progres`
  MODIFY `id_mst_order_progres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mst_organization_attribute`
--
ALTER TABLE `mst_organization_attribute`
  MODIFY `id_mst_organization_attribute` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `mst_personal_attribute`
--
ALTER TABLE `mst_personal_attribute`
  MODIFY `id_mst_personal_attribute` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `mst_personal_attribute_grade`
--
ALTER TABLE `mst_personal_attribute_grade`
  MODIFY `id_mst_personal_attribute_grade` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT untuk tabel `mst_tingkat_pendidikan`
--
ALTER TABLE `mst_tingkat_pendidikan`
  MODIFY `id_mst_tingkat_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `order_pegawai`
--
ALTER TABLE `order_pegawai`
  MODIFY `id_order_pegawai` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `order_pegawai_kategori`
--
ALTER TABLE `order_pegawai_kategori`
  MODIFY `id_order_pegawai_kategori` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `order_pegawai_list`
--
ALTER TABLE `order_pegawai_list`
  MODIFY `id_order_pegawai_list` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201503;

--
-- AUTO_INCREMENT untuk tabel `pro_environment_attribute`
--
ALTER TABLE `pro_environment_attribute`
  MODIFY `id_pro_environment_attribute` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pro_jabatan_attribute`
--
ALTER TABLE `pro_jabatan_attribute`
  MODIFY `id_pro_jabatan_attribute` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT untuk tabel `pro_organization_attribute`
--
ALTER TABLE `pro_organization_attribute`
  MODIFY `id_pro_organization_attribute` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT untuk tabel `pro_personal_attribute`
--
ALTER TABLE `pro_personal_attribute`
  MODIFY `id_pro_personal_attribute` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2117;

--
-- AUTO_INCREMENT untuk tabel `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  MODIFY `id_riwayat_jabatan` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  MODIFY `id_riwayat_pendidikan` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `smk_aspek_penilaian`
--
ALTER TABLE `smk_aspek_penilaian`
  MODIFY `id_aspek_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `type_asset1`
--
ALTER TABLE `type_asset1`
  MODIFY `id_type_asset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `type_asset2`
--
ALTER TABLE `type_asset2`
  MODIFY `id_type_asset` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `type_asset3`
--
ALTER TABLE `type_asset3`
  MODIFY `id_type_asset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT untuk tabel `type_asset4`
--
ALTER TABLE `type_asset4`
  MODIFY `id_type_asset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT untuk tabel `type_asset5`
--
ALTER TABLE `type_asset5`
  MODIFY `id_type_asset` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `type_asset_item1`
--
ALTER TABLE `type_asset_item1`
  MODIFY `id_type_asset_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `type_asset_item2`
--
ALTER TABLE `type_asset_item2`
  MODIFY `id_type_asset_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT untuk tabel `type_asset_item3`
--
ALTER TABLE `type_asset_item3`
  MODIFY `id_type_asset_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT untuk tabel `type_asset_item4`
--
ALTER TABLE `type_asset_item4`
  MODIFY `id_type_asset_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT untuk tabel `type_asset_item5`
--
ALTER TABLE `type_asset_item5`
  MODIFY `id_type_asset_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
