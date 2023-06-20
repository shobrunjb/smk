-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 13 Sep 2022 pada 14.38
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aihrm`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_setting`
--

INSERT INTO `app_setting` (`id_app_setting`, `setting_name`, `is_image`, `value`) VALUES
(1, 'APP-NAME', 0, 'Koperasi TKBM'),
(2, 'APP-NAME-SINGKAT', 0, 'TKBM'),
(3, 'APP-NAME-SINGKATAN', 0, 'TKBM'),
(4, 'Logo', 1, 'Logo.jpg'),
(5, 'Icon', 1, 'Icon.jpg'),
(6, 'ADDRESS', 0, 'JL May Memet Sastrawirya, No. 7 A, Tangga Takat, Kec. Seberang Ulu II, Kota Palembang, Sumatera Selatan 30111 Selengkapnya'),
(7, 'Copyright', 0, 'Copyright {TAHUN} PPID BPOM. All Right Reserved'),
(8, 'MAIN-BACKGROUND', 1, 'MAIN-BACKGROUND.JPG'),
(9, 'ABOUT-APP', 0, 'Aplikasi TKBM'),
(10, 'APP-VERSION', 0, '1.0.0 (Beta)'),
(11, 'APP-RELEASE-DATE', 0, 'Juni 2021'),
(12, 'APP-CONTACT', 0, 'PPID BPOM'),
(13, 'WA-1', 0, '08123456789 (WA belum diset)'),
(14, 'WA-2', 0, '08123456789 (WA belum diset)'),
(15, 'IG', 0, 'IG PPID BPOM (Belum diset)'),
(16, 'WEBSITE', 0, 'https://www.pom.go.id'),
(17, 'EMAIL', 0, 'email.belumdiset@gmail.com'),
(18, 'ABOUT-WEB', 0, 'Sistem PPID BPOM'),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(14, 8, NULL, 'QQQQQ', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0),
(15, 3, NULL, '7856', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0),
(16, 10, NULL, 'SMR-446', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Ini khusus untuk aset diam seperti tanah, gedung';

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
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
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
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
('/diklat-pegawai-kategori/*', 2, NULL, NULL, NULL, 1661353777, 1661353777),
('/diklat-pegawai-list/*', 2, NULL, NULL, NULL, 1661353777, 1661353777),
('/diklat-pegawai-member/*', 2, NULL, NULL, NULL, 1661353870, 1661353870),
('/diklat-pegawai/*', 2, NULL, NULL, NULL, 1661350532, 1661350532),
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
('/hrm-mst-jenis-absensi/*', 2, NULL, NULL, NULL, 1659435606, 1659435606),
('/hrm-pegawai-user/*', 2, NULL, NULL, NULL, 1660626337, 1660626337),
('/hrm-pegawai/*', 2, NULL, NULL, NULL, 1629224181, 1629224181),
('/hrm-status-pegawai/*', 2, NULL, NULL, NULL, 1660547842, 1660547842),
('/image-management/*', 2, NULL, NULL, NULL, 1566440062, 1566440062),
('/image-management/create', 2, NULL, NULL, NULL, 1566440062, 1566440062),
('/image-management/delete', 2, NULL, NULL, NULL, 1566440062, 1566440062),
('/image-management/index', 2, NULL, NULL, NULL, 1566440062, 1566440062),
('/image-management/update', 2, NULL, NULL, NULL, 1566440062, 1566440062),
('/image-management/view', 2, NULL, NULL, NULL, 1566440062, 1566440062),
('/jpembelian/*', 2, NULL, NULL, NULL, 1625442088, 1625442088),
('/jurnal-type/*', 2, NULL, NULL, NULL, 1629223445, 1629223445),
('/jurnal/*', 2, NULL, NULL, NULL, 1629223445, 1629223445),
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
('/mst-order-progres/*', 2, NULL, NULL, NULL, 1659404674, 1659404674),
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
('/perusahaan/*', 2, NULL, NULL, NULL, 1552641592, 1552641592),
('/perusahaan/create', 2, NULL, NULL, NULL, 1552641592, 1552641592),
('/perusahaan/delete', 2, NULL, NULL, NULL, 1552641592, 1552641592),
('/perusahaan/index', 2, NULL, NULL, NULL, 1552641592, 1552641592),
('/perusahaan/update', 2, NULL, NULL, NULL, 1552641592, 1552641592),
('/perusahaan/view', 2, NULL, NULL, NULL, 1552641592, 1552641592),
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
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
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
('admin', '/diklat-pegawai-kategori/*'),
('admin', '/diklat-pegawai-list/*'),
('admin', '/diklat-pegawai-member/*'),
('admin', '/diklat-pegawai/*'),
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
('admin', '/hrm-mst-jenis-absensi/*'),
('admin', '/hrm-pegawai-user/*'),
('admin', '/hrm-pegawai/*'),
('admin', '/hrm-status-pegawai/*'),
('admin', '/image-management/*'),
('admin', '/image-management/create'),
('admin', '/image-management/delete'),
('admin', '/image-management/index'),
('admin', '/image-management/update'),
('admin', '/image-management/view'),
('admin', '/jpembelian/*'),
('admin', '/jurnal-type/*'),
('admin', '/jurnal/*'),
('admin', '/language/*'),
('admin', '/language/create'),
('admin', '/language/delete'),
('admin', '/language/index'),
('admin', '/language/update'),
('admin', '/language/view'),
('admin', '/laporan-kinerja-pegawai-admin/*'),
('admin', '/log-order-pegawai/*'),
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
('admin', '/mst-order-progres/*'),
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
('admin', '/outlet-penjualan/*'),
('admin', '/outsourcing-process-raw/*'),
('admin', '/pallet-gudang/*'),
('admin', '/pembelian-material-support/*'),
('admin', '/pendapatan/*'),
('admin', '/perusahaan/*'),
('admin', '/perusahaan/create'),
('admin', '/perusahaan/delete'),
('admin', '/perusahaan/index'),
('admin', '/perusahaan/update'),
('admin', '/perusahaan/view'),
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
('member', '/diklat-pegawai-kategori/*'),
('member', '/diklat-pegawai-list/*'),
('member', '/diklat-pegawai-member/*'),
('member', '/diklat-pegawai/*'),
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
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank_pembayaran`
--

INSERT INTO `bank_pembayaran` (`id_bank_pembayaran`, `nama_bank`, `nama_bank_short`, `nomor_rekening`, `atas_nama`, `kode`) VALUES
(1, 'BNI', 'BNI', '12', '23', 'ABX');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cpanel_leftmenu`
--

INSERT INTO `cpanel_leftmenu` (`id_leftmenu`, `id_parent_leftmenu`, `has_child`, `menu_name`, `menu_icon`, `value_indo`, `value_eng`, `url`, `is_public`, `auth`, `mobile_display`, `visible`) VALUES
(1000, 0, 1, 'Dashboard', 'handshake', 'Dashboard', 'Dashboard', '#', 0, 'admin, hrd', '', 0),
(2000, 0, 1, 'Keanggotaaan', 'link', 'Keanggotaaan', 'Keanggotaaan', '#', 0, 'admin,member', '', 1),
(2110, 2000, 0, 'Anggota', 'male', 'Anggota', 'Anggota', 'hrm-pegawai/index', 0, 'admin, hrd', 'MOBILE_TOP', 1),
(2120, 2000, 0, 'Order Pegawai', 'book', 'Order Pegawai', 'Order Pegawai', 'order-pegawai/index', 0, 'admin, hrd', 'MOBILE_TOP', 1),
(2130, 2000, 0, 'Order Pegawai List', 'list-alt', 'Order Pegawai List', 'Order Pegawai List', 'order-pegawai-list/index', 0, 'admin', 'MOBILE_TOP', 0),
(2131, 2000, 0, 'Order Pegawai', 'list-alt', 'Order Pegawai', 'Order Pegawai', 'order-pegawai-list-member/index-member', 0, 'hrd,member', 'MOBILE_TOP', 1),
(2132, 2000, 0, 'Laporan Kinerja Pegawai', 'list-alt', 'Laporan Kinerja Pegawai', 'Laporan Kinerja Pegawai', 'laporan-kinerja-pegawai/index', 0, 'member', 'MOBILE_TOP', 1),
(2133, 2000, 0, 'Laporan Kinerja Pegawai', 'list-alt', 'Laporan Kinerja Pegawai', 'Laporan Kinerja Pegawai', 'laporan-kinerja-pegawai-admin/index', 0, 'admin', 'MOBILE_TOP', 1),
(2140, 2000, 0, 'Log Order Pegawai', 'list-alt', 'Log Order Pegawai', 'Log Order Pegawai', 'log-order-pegawai/index', 0, '-', 'MOBILE_TOP', 1),
(3000, 0, 1, 'Data Kapal', 'ship', 'Data Kapal', 'Data Kapal', '#', 0, 'admin', '', 1),
(3001, 3000, 0, 'Kapal', 'anchor', 'Kapal', 'Kapal', 'asset-item-main/index', 0, 'admin', 'MOBILE_TOP', 1),
(3002, 3000, 0, 'Jenis Kendaraan', 'unsorted', 'Jenis Kendaraan', 'Jenis Kendaraan', 'asset-master/index', 0, 'admin', 'MOBILE_TOP', 1),
(4000, 0, 1, 'Data Diklat', 'book', 'Data Diklat', 'Data Diklat', '#', 0, 'admin,member', '', 1),
(4001, 4000, 0, 'Diklat Pegawai', 'calendar', 'Diklat Pegawai', 'Diklat Pegawai', 'diklat-pegawai/index', 0, 'admin', 'MOBILE_TOP', 1),
(4002, 4000, 0, 'Peserta Diklat', 'cube', 'Peserta Diklat', 'Peserta Diklat', 'diklat-pegawai-list/index', 0, 'admin', 'MOBILE_TOP', 0),
(4003, 4000, 0, 'Diklat', 'cube', 'Diklat', 'Diklat', 'diklat-pegawai-member/index', 0, 'member', 'MOBILE_TOP', 1),
(5000, 0, 1, 'Data Master', 'database', 'Data Master', 'Data Master', '#', 0, 'admin', '', 0),
(5001, 5000, 0, 'Jenis Absensi', 'child', 'Jenis Absensi', 'Jenis Absensi', 'hrm-mst-jenis-absensi/index', 0, 'admin', 'MOBILE_TOP', 1),
(5002, 5000, 0, 'Progress Order', 'line-chart', 'Progress Order', 'Progress Order', 'mst-order-progres/index', 0, 'admin', 'MOBILE_TOP', 1),
(5003, 5000, 0, 'Order Kategori', 'cube', 'Order Kategori', 'Order Kategori', 'order-pegawai-kategori/index', 0, 'admin', 'MOBILE_TOP', 1),
(5004, 5000, 0, 'Diklat Kategori', 'cube', 'Diklat Kategori', 'Diklat Kategori', 'diklat-pegawai-kategori/index', 0, 'admin', 'MOBILE_TOP', 1),
(14000, 0, 1, 'Setting', 'cogs', 'Setting', 'Setting', '#', 0, 'admin', '', 1),
(14001, 14000, 0, 'Setting', 'cog', 'Setting', 'Setting', 'app-setting/index', 0, 'admin', 'MOBILE_TOP', 1),
(14002, 14000, 0, 'Home Display', 'file-alt', 'Home Display', 'Home Display', 'home-info/index', 0, 'admin', 'MOBILE_TOP', 0),
(15000, 0, 1, 'User Management', 'users', 'User Management', 'User Management', '#', 0, 'admin', '', 1),
(15001, 15000, 0, 'User', 'user', 'User', 'User', 'user/index', 0, 'admin', 'MOBILE_TOP', 1),
(15002, 15000, 0, 'Buat Akun Pegawai', 'user', 'Buat Akun Pegawai', 'Buat Akun Pegawai', 'hrm-pegawai-user/index', 0, 'admin', 'MOBILE_TOP', 1),
(1100000, 0, 0, 'Logout ', 'sign-out', 'Logout ', 'Logout ', 'site/logout', 0, 'admin, member', '', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat`, `id_kabupaten`, `nomor_telepon`, `email`, `npwp`, `nama_kontak`, `limit_kredit`, `total_kredit`) VALUES
(1, 'Kampung Daun', 'Jl. Gajah', 1112, '09182312', 'kampungdaun@gmail.com', '801238012312', 'Data-data', 90000000, 0),
(2, 'Gani', 'Jl. Alamat', 1112, '08135546', 'gani@gmail.com', '123498765433', '', 50000000, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(9, 'Diklatsar Pelindo3', '2022-09-08', 2, 'Pelindo', 50, 'Memiliki ijazah SMA/Sederajat (Minimal)', 'Diperuntukkan bagi anggota yang memiliki ijazah SMA/Sederajat', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diklat_pegawai_kategori`
--

CREATE TABLE `diklat_pegawai_kategori` (
  `id_diklat_pegawai_kategori` int(10) NOT NULL,
  `Kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(56, 9, 5);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_mst_jenis_absensi`
--

CREATE TABLE `hrm_mst_jenis_absensi` (
  `id_mst_jenis_absensi` int(11) NOT NULL,
  `jenis_absensi` varchar(200) NOT NULL,
  `is_aktif` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hrm_pegawai`
--

INSERT INTO `hrm_pegawai` (`id_pegawai`, `id_perusahaan`, `userid`, `id_user`, `cid`, `no_dossier`, `NIP`, `nama_lengkap`, `foto`, `tempat_lahir`, `tanggal_lahir`, `usia`, `usia_lebih_bulan`, `jenis_kelamin`, `golongan_darah`, `tinggi_badan`, `berat_badan`, `agama`, `status_pernikahan`, `no_identitas_pribadi`, `NPWP`, `no_kartu_kesehatan`, `no_kartu_tenagakerja`, `kartu_kesehatan`, `no_kartu_keluarga`, `scan_ktp`, `scan_bpjs`, `scan_npwp`, `scan_paraf`, `scan_kk`, `scan_tandatangan`, `id_hrm_status_pegawai`, `id_hrm_status_organik`, `status_tenaga_kerja`, `reg_tanggal_masuk`, `reg_tanggal_diangkat`, `reg_tanggal_training`, `reg_status_pegawai`, `tanggal_mpp`, `tanggal_pensiun`, `tanggal_terminasi`, `id_hrm_mst_jenis_terminasi_bi`, `gelar_akademik`, `gelar_profesi`, `pdk_id_tingkatpendidikan`, `pdk_sekolah_terakhir`, `pdk_jurusan_terakhir`, `pdk_ipk_terakhir`, `pdk_tahun_lulus`, `alamat_termutakhir`, `alamat_sesuai_identitas`, `mobilephone1`, `mobilephone2`, `telepon_rumah`, `fax_rumah`, `email1`, `email2`, `id_kk_profil_posisi`, `jbt_id_jabatan`, `jbt_jabatan`, `jbt_id_tingkat_jabatan`, `jbt_no_sk_jabatan`, `jbt_tgl_keputusan`, `jbt_tanggal_berlaku`, `jbt_keterangan_mutasi`, `pkt_id_pangkat`, `pkt_no_sk`, `pkt_tgl_keputusan`, `pkt_tgl_berlaku`, `pkt_gaji_pokok`, `pkt_id_jenis_kenaikan_pangkat`, `pkt_eselon`, `pkt_ruang`, `pos_id_hrm_kantor`, `pos_id_hrm_unit_kerja`, `pos_kantor`, `pos_id_kk_profil_posisi`, `sta_total_hukuman_disiplin`, `sta_total_penghargaan`, `pst_masabakti_20`, `pst_masabakti_25`, `pst_masabakti_30`, `pst_masabakti_35`, `pst_masabakti_40`, `cuti_besar_terakhir_start`, `cuti_besar_terakhir_end`, `cuti_besar_terakhir_ke`, `cuti_besar_plan_1`, `cuti_besar_plan_2`, `cuti_besar_plan_3`, `cuti_besar_plan_4`, `cuti_besar_plan_5`, `cuti_besar_plan_6`, `cuti_besar_plan_7`, `cuti_besar_ambil_1`, `cuti_besar_ambil_2`, `cuti_besar_ambil_3`, `cuti_besar_ambil_4`, `cuti_besar_ambil_5`, `cuti_besar_ambil_6`, `cuti_besar_ambil_7`, `cuti_besar_aktual_1`, `cuti_besar_aktual_2`, `cuti_besar_aktual_3`, `cuti_besar_aktual_4`, `cuti_besar_aktual_5`, `cuti_besar_aktual_6`, `cuti_besar_aktual_7`, `cuti_besar_aktual_end_1`, `cuti_besar_aktual_end_2`, `cuti_besar_aktual_end_3`, `cuti_besar_aktual_end_4`, `cuti_besar_aktual_end_5`, `cuti_besar_aktual_end_6`, `cuti_besar_aktual_end_7`, `reff_id`, `created_date`, `created_user`, `created_ip_address`, `modified_date`, `modified_user`, `modified_ip_address`) VALUES
(3, 0, '196505091993092002', 17, 154698399, 0, '7789', 'Luffy', NULL, 'Soppeng', '1965-05-04', 54, 6, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', '1965-05-09', '1965-05-09', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jl. Gugur Depan', '018292144444', NULL, NULL, NULL, 'depan@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'III', 'IV /B', NULL, NULL, 'BADAN KESATUAN BANGSA DAN POLITIK', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '', '', '2019-11-12', '196505091993092002', '192.168.30.25'),
(4, 201501, '', 18, 30930530, 0, '9999', 'Rosalinda', NULL, '', '0000-00-00', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 4, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jl. Jakarta 28 Jakrta Urta', '8729123', NULL, NULL, NULL, 'sudirman@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-18', 'admin', '::1', '0000-00-00', '', ''),
(5, 201501, '', 23, 123767543, 0, '89111', 'Meli', NULL, '', '2021-08-30', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 4, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jl. Jakarta 28 Jakrta Urta', '87291231', NULL, NULL, NULL, 'sudirman2@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-04', 'admin', '::1', '0000-00-00', '', ''),
(6, 201501, '', 25, 72566225, 0, '1810', 'Putri Handayani', NULL, '', '1982-09-01', 0, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jl. Gajah Mungkur 28', '08192131', NULL, NULL, NULL, 'sinung@ithb.ac.id', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-04', 'admin', '::1', '0000-00-00', '', ''),
(7, 201501, '', 21, 158841851, 0, '3600002', 'Dimas Rizqy Pangestu', NULL, '', '2022-08-16', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'menghills 82', '081295031068', NULL, NULL, NULL, 'dimasrzqy@telkom.ac.id', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-16', 'admin', '::1', '0000-00-00', '', ''),
(8, 201501, '', 20, 31331849, 0, '300001', 'Safinaty', NULL, '', '2000-10-08', 0, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gang soleh solihun', '081234567890', NULL, NULL, NULL, 'fyndy@telkom.ac.id', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-16', 'admin', '::1', '0000-00-00', '', ''),
(9, 201501, '', 22, 129948011, 0, '6518239', 'Bambang Pamungkas', NULL, '', '2000-10-08', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Palembang', '08123445678', NULL, NULL, NULL, 'BP20@email.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-31', 'admin', '::1', '0000-00-00', '', ''),
(10, 201501, '', 24, 104635558, 0, '2394236666666666', 'RANDY', NULL, '', '2022-08-30', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 4, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PGA', '089999999999', NULL, NULL, NULL, 'MAIL@MAIL.COM', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-07', 'admin', '::1', '0000-00-00', '', ''),
(11, 201501, '', 28, 212202157, 0, '082280685058', 'zafir kun', NULL, '', '2022-09-07', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'palembang', '082280695489', NULL, NULL, NULL, 'zafirateambrebes@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-07', 'admin', '::1', '0000-00-00', '', ''),
(12, 201501, '', 26, 105493791, 0, '123465432', 'Firdy', NULL, '', '2000-10-08', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tangerang', '081295035678', NULL, NULL, NULL, 'firdy@mail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-07', 'admin', '::1', '0000-00-00', '', ''),
(13, 201501, '', 27, 214564999, 0, '556677889900', 'Tesam Arifah', NULL, '', '2019-01-26', 0, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Disini dikostan', '0899887766', NULL, NULL, NULL, 'tesam@26.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-07', 'admin', '::1', '0000-00-00', '', ''),
(14, 201501, '', 0, 41635201, 0, '13028888888892', 'TORIQ ', NULL, '', '2033-04-22', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUKABIRUS, PONDOK FIRDAUS A02', '082346890089', NULL, NULL, NULL, 'toriq@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-08', 'admin', '::1', '0000-00-00', '', ''),
(15, 201501, '', 0, 129571153, 0, '12345', 'Kaira', NULL, '', '2018-09-22', 0, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jl.Kemana Ya', '08123456', NULL, NULL, NULL, 'aaa@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-08', 'admin', '::1', '0000-00-00', '', ''),
(16, 201501, '', 29, 87459488, 0, '1234567865432', 'intan', NULL, '', '2000-10-08', 0, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gba', '575573358998', NULL, NULL, NULL, 'intan@mail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-08', 'admin', '::1', '0000-00-00', '', ''),
(17, 201501, '', 30, 72171419, 0, '257473664663434', 'alsha', NULL, '', '2022-09-01', 0, 0, 'WANITA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lacasa', '08675645565', NULL, NULL, NULL, 'alsha@mail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-08', 'admin', '::1', '0000-00-00', '', ''),
(18, 201501, '', 31, 45728998, 0, '15465543424', 'JACK DOE', NULL, '', '1989-07-05', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 2, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Jl. Soekarno Hatta No 123 Bandung Jawa Barat', '08673567434', NULL, NULL, NULL, 'jack@gmail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-08', 'admin', '::1', '0000-00-00', '', ''),
(19, 201501, '', 0, 159785428, 0, '1235654321345', 'Putra', NULL, '', '2000-10-08', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bandung', '0865674457658', NULL, NULL, NULL, 'putra@mail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-11', 'admin', '::1', '0000-00-00', '', ''),
(20, 201501, '', 0, 148607974, 0, '26853981231', 'roni', NULL, '', '2022-09-11', 0, 0, 'PRIA', '-', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 0, 'WNI', NULL, NULL, '0000-00-00', 'AKTIF', NULL, NULL, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bandung', '896914813', NULL, NULL, NULL, 'roni@mail.com', '', 0, NULL, 'Anggota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-11', 'admin', '::1', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hrm_status_pegawai`
--

CREATE TABLE `hrm_status_pegawai` (
  `id_hrm_status_pegawai` int(11) NOT NULL,
  `status_pegawai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `id_struktur_organisasi`, `kode_jabatan`, `nama_jabatan`, `keterangan`) VALUES
(1, 1, 'KPL', 'Kepala Cabang', NULL),
(2, 1, 'VP', 'Vice President', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `id_propinsi` int(11) NOT NULL,
  `nama_kabupaten` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `id_kecamatan`, `nama_kelurahan`, `kodepos`) VALUES
(1, 1, 'Kelurahan Simelua A', 12),
(2, 2, 'Kelurahan Aceh Singkli', 1),
(3, 1, 'ssa asarrr', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `language`
--

CREATE TABLE `language` (
  `id_language` int(11) NOT NULL,
  `language` varchar(150) NOT NULL,
  `short` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(12, 14, 3, 'tidak membantu rekan kerja yang lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_order_pegawai`
--

CREATE TABLE `log_order_pegawai` (
  `id_log_order` int(11) NOT NULL,
  `id_order_pegawai` int(11) NOT NULL,
  `id_mst_order_progress` int(11) NOT NULL,
  `isi_log_order` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(80, 28, 5, 'pembayaran selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `media_identity`
--

CREATE TABLE `media_identity` (
  `id_media_identity` int(11) NOT NULL,
  `media_name` varchar(200) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_link`
--

INSERT INTO `menu_link` (`id_menu_link`, `menu_name`, `menu_name_lang1`, `menu_name_lang2`, `url`, `is_active`) VALUES
(1, 'Home', 'Home', 'Zuhause', 'index', 1),
(2, 'Tentang Kami', 'About Us', 'Über uns', 'company_profile', 1),
(6, 'Contact Us', 'Contact Us', 'Kontaktiere uns', 'Kontak Kami', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_jenjang_pendidikan`
--

CREATE TABLE `mst_jenjang_pendidikan` (
  `id_mst_jenjang_pendidikan` int(11) NOT NULL,
  `jenjang_pendidikan` varchar(250) NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mst_jenjang_pendidikan`
--

INSERT INTO `mst_jenjang_pendidikan` (`id_mst_jenjang_pendidikan`, `jenjang_pendidikan`, `keterangan`) VALUES
(11, 'SD atau Sederajat', NULL),
(12, 'SMP/SLTP atau sederajat', NULL),
(13, 'SMA/SLTA/SMK atau sederejat', NULL),
(20, 'D1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_order_progres`
--

CREATE TABLE `mst_order_progres` (
  `id_mst_order_progres` int(11) NOT NULL,
  `order_progress` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Struktur dari tabel `order_pegawai`
--

CREATE TABLE `order_pegawai` (
  `id_order_pegawai` bigint(20) NOT NULL,
  `tanggal_order` date NOT NULL,
  `nomor_order` varchar(150) NOT NULL,
  `nomor_order_inc` int(11) NOT NULL,
  `id_order_pegawai_kategori` int(11) NOT NULL,
  `id_asset_kendaraan1` bigint(20) NOT NULL,
  `id_asset_kendaraan2` bigint(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_mst_order_progres` int(11) NOT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  `total_biaya` bigint(20) DEFAULT NULL,
  `status_pembayaran` set('BELUM','LUNAS') DEFAULT NULL,
  `status_order` set('OPEN','PENDING','CANCEL','FINISH') NOT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `bukti_pembayaran` varchar(250) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_id_user` int(11) DEFAULT NULL,
  `created_ip_address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_pegawai`
--

INSERT INTO `order_pegawai` (`id_order_pegawai`, `tanggal_order`, `nomor_order`, `nomor_order_inc`, `id_order_pegawai_kategori`, `id_asset_kendaraan1`, `id_asset_kendaraan2`, `jumlah`, `id_mst_order_progres`, `deskripsi`, `total_biaya`, `status_pembayaran`, `status_order`, `tanggal_pembayaran`, `bukti_pembayaran`, `created_date`, `created_id_user`, `created_ip_address`) VALUES
(14, '2022-08-28', 'MT14-2-10', 0, 2, 2, 10, 20, 7, 'Bermuatan semen', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(15, '2022-08-11', 'BK15-2-5', 0, 1, 2, 5, 20, 7, 'Bermuatan semen', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(16, '2022-08-11', 'BK16-3-5', 0, 1, 3, 5, 25, 7, 'TES BARU', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(17, '2022-08-17', 'MT17-2-5', 0, 2, 2, 5, 20, 7, 'TES BARU', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(18, '2022-08-17', 'BM18-2-5', 0, 3, 2, 5, 20, 7, 'TES BARU', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(19, '2022-09-06', 'BK19-14-5', 0, 1, 14, 5, 44, 7, 'bongkar makanan', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(20, '2022-09-07', 'BK20-11-5', 0, 1, 11, 5, 20, 7, 'muatan minyak mudah terbakar', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(21, '2022-09-15', 'MT21-2-5', 0, 2, 2, 5, 25, 6, 'Muatan pupuk', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(22, '2022-09-23', '', 0, 1, 3, 10, 25, 1, 'sedrfyghj', NULL, 'BELUM', '', NULL, NULL, NULL, NULL, NULL),
(23, '2022-09-30', 'BM23-2-5', 0, 3, 2, 5, 100, 7, 'muatan banteng', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(24, '2022-09-23', 'BK24-3-12', 0, 1, 3, 12, 25, 6, 'sedrfyghj', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(25, '2022-09-10', 'MT25-16-12', 0, 2, 16, 12, 44, 2, 'MUATAN IKAN', NULL, 'BELUM', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(26, '2022-09-11', 'BK26-2-5', 0, 1, 2, 5, 11, 7, 'iii', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(27, '2022-09-08', 'BK27-2-10', 0, 1, 2, 10, 25, 6, 'Bermuatan semen', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL),
(28, '2022-09-08', 'BK28-3-5', 0, 1, 3, 5, 28, 6, 'bongkar pupuk', NULL, 'LUNAS', 'OPEN', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_pegawai_kategori`
--

CREATE TABLE `order_pegawai_kategori` (
  `id_order_pegawai_kategori` bigint(20) NOT NULL,
  `kategori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(97, 28, 18);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_asset3`
--

CREATE TABLE `type_asset3` (
  `id_type_asset` int(11) NOT NULL,
  `type_asset` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_asset_item1`
--

CREATE TABLE `type_asset_item1` (
  `id_type_asset_item` int(11) NOT NULL,
  `type_asset_item` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `full_name`, `username`, `email`, `password_hash`, `auth_key`, `status`, `password_reset_token`, `user_level`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@admin.com', '$2y$13$wUP89zDmoJhxVQ55PqilV.K/5e3.K2RSRuhHShtr5zVJzSXZtBFJS', 'GL63CdJxr0wI2BuKh7JNC8rJU7XNUY24', 10, 'asdas', 'admin', 20, 1530780329, 1557132823),
(2, 'amanda', 'amanda', 'amanda@gmail.com', '$2y$13$HOmDlRno1UuYKruSiCCloeFYl42kgo.Xe/YQkhJ7rT5UqzgVOk8km', '_zeXxi6iVr_xs-FqKaD4Gyc6gk1oQPSi', 10, '-eQBpDCsiG-WVNzoR7Na8Np0nPMLgPpr_1633397521', 'sales', 10, 1633397521, 1633397521),
(3, 'Amanda', 'suppliertest1', 'sudirmans@gmail.com', '$2y$13$QiyZkjKge5x9x.UhQZuh0.tM16bG8ZDhcjK.XA7kP6.FiS3vcsFHG', 'HMddwQmHLuiS_Zr4PeXZNFKFTJYmyfAR', 10, 'gXqy7NycH5Llh2TG3gaxo30Ni3J9LCQ5_1633412685', 'sales', 10, 1633412685, 1660628797),
(4, 'badak', 'badak', 'badak@gmail.com', '$2y$13$dGB1UbrwcjR6ia0HINlkIOqWrVsa5MDl2KqWlvaufYGcWT3bKfYue', 'BU11S0MYHqIajs0crfbLGwa6XLP8V2Tm', 10, '9UFEWmCQdTdbzVKgRuNuGdu4mCNryPcc_1633412961', 'sales', 10, 1633412961, 1633412961),
(5, 'cicak', 'cicak', 'badak@gmail.com', '$2y$13$0ix5aSza9TaQe/sTZePRVewqWclltHfOhmmLr6nqvdAz1dGOVYitq', 'E2TwV7p0va1Mx7d_hc0p7kixVe6n8DFI', 10, 'Znib2lA4kDw4Kb0H_E_6_h5Ae5pHIq6j_1633413050', 'sales', 10, 1633413050, 1633413050),
(6, 'dana', 'dana', 'dana@gmail.com', '$2y$13$dpaCW9gZ5VwtiMu6mKaN0.jSEmcVyXeqpCoQ9Hlp/Uw8wQ1OCzuSy', 'x2vAcCIgVx3O2A5CYBrqst_5ZgJvIyjq', 10, 'qlLsauvlCxfCOl9WQf4UTk7NjHxHhG60_1633413126', 'sales', 10, 1633413126, 1633413126),
(7, 'edane', 'edane', 'edane@gmail.com', '$2y$13$hpUJwJbZDhUwargdlP/gPOfbPPg55EGQ8Bg2KbvPPsA16Ele6puNO', 'sd8Vt6rhcpnB0GIrGCPG5DivJXxeL5VJ', 10, 'gKJllGZg69i-x4Ryf_Y7Rxd7sJd5yCEM_1633413155', 'sales', 10, 1633413155, 1637881922),
(8, 'fafa', 'fafa', 'fafa@gmail.com', '$2y$13$QePfjZeow1IT/8nfW6XT1upknZy5JaUI2hJqMFeo7kwDDT0NAidvO', 'i2v3u3b7BSh2th53lx6nF33pXu3eLCQs', 10, 'rKIDO7W-6KjAv3pGjGXNtyjujtnSpUyk_1633420082', 'sales', 10, 1633420082, 1633420082),
(9, 'maria', 'maria', 'maria@gmail.com', '$2y$13$a9gU9aRmYVbAC15gzQG2t.ErV2fIL1sp2a6pFtZ2eTN.fs9BfKYJC', 'KNgle8pr2uCN0yHPzthO5ZkLZWAujtfe', 10, 'KNb7TJdDo0bBp4UyWmZrDpi0UcGHO02b_1633932308', 'sales', 10, 1633932308, 1643874577),
(10, 'dudung', 'dudung', 'dudung@mail.com', '$2y$13$q2p0JKebK0FaNjoSTO8B6u/Zj3u.ZkrMKhEP7kBuJhYPFQqYimdUq', 'CWPbj5JkcMEJ0-zwhikfigXXW2OVF2Qu', 10, 'znQZmKoTvTMKGrFzUsrPGoaCuSZ_jGbN_1637317971', 'produksi', 10, 1637317971, 1637317971),
(11, 'mamaria', 'mamari', 'mamari@mail.com', '$2y$13$6/io6nV/mv9PTLNaKJrNhuhtbSTFyVDEk5h54OCtauXbpt0ISjFci', 'IXQ24vtqjr8-0wSyCpnCO-AWSrZDelmK', 10, 'dExfX_HafUKMdZk-XIspJQ1cbXLhELDA_1638343265', 'sales', 10, 1638343265, 1638343265),
(12, 'Outlet Jakarta', 'jakarta', 'outja@mail.com', '$2y$13$ZMt/apiZ8Q7gIlYoHFedlulorEbT9iVPvwhnBRQZ3FfQCFHgixSL2', 'u3F2t0S5zLwtLaKx8DOKTqxvVct-w2R7', 10, 'O7-VXPcO_1Mixx4dO7hFcy7hOvyHo1de_1639095512', 'sales', 10, 1639095512, 1639095512),
(17, 'Andita Wati', 'andita', 'andita@gmail.com', '$2y$13$AzQbep90NGPC2QCEtmrxsO9Q3X6p2dIO0gBqZoE0pdiryyp8Zr.H.', 'zoLqY-zdRIQuf4oD2usQcv8BOtJtVRJo', 10, 'yDkfYwD4M3I-eiSWCvBu0kLE5EfYZZ4Y_1660626500', 'member', 10, 1660626500, 1662558463),
(18, 'Rosalinda', 'Rosalinda', 'sudirman@gmail.com', '$2y$13$h2FKTpKAlxEp05GuqIXJteSmKtLGuayA8d/yFTPwjCyQQMAg52da6', '0c3QFelu0JT08dAeAfetkP590B_gC8jU', 10, 'V6jAbRlO5OeeYBeZ2-xF_byazESO53-P_1660629541', 'member', 10, 1660629541, 1660629541),
(20, 'Safinaty', 'safi', 'fyndy@telkom.ac.id', '$2y$13$LF0lbQH.qxVLE1D4GJmjv.26JkquNieV5aDgCwjxWnMloJf/4jzn2', 'RXdIjVVXN5GwcgcsMOUg9Hb4sti2Wsoy', 10, '0IHjG-qFeZNxD2LTEfEdsV_v-3v6irZ1_1660631026', 'member', 10, 1660631026, 1660631026),
(21, 'Dimas Rizqy Pangestu', 'DIMAS', 'dimasrzqy@telkom.ac.id', '$2y$13$arW6cZqWfSsk9WTBo8WxGO6gNUsKBAvh3nyWDSPR3HHYZ0q9lGgZW', '_QlKpGyYB47n2rTLfHfeTlB8yH2ufRx2', 10, 'CC3mh5K9UiX_2cbM7UtZRbxF896KtJlH_1660631070', 'member', 10, 1660631070, 1662801365),
(22, 'Bambang Pamungkas', 'BP', 'BP20@email.com', '$2y$13$JQy17f96/v5DIMJjW2DKXOiABbS0d0iJTTliJ63edv40oLd2HMF9q', 'xT71eGCNuBastriEpMWJvOiY6vTFPDma', 10, 'rOU_z2YNfBSn75IdAR52QORvkjxo7nHe_1661968667', 'member', 10, 1661968667, 1661968667),
(23, 'Meli', 'meli', 'sudirman2@gmail.com', '$2y$13$L5jimJBtcYj9U0BuzLUJQuljyb9pDwE2VIo3Lmr8w1IDhU5cXejRi', 'RI1YBd_R7qOmj7FzmAh57FBiUg6XRjYb', 10, 'xqahY93qHypwZCOMiTTVGP8KfwkL_ufm_1662018356', 'member', 10, 1662018356, 1662018356),
(24, 'RANDY', 'randy', 'MAIL@MAIL.COM', '$2y$13$LDGqfy7IOQ2VEvcBjF/rVuNst/bdhrhpum4RvGiDS9Lh9n8GZrKDG', 'crkZ1xUAwJryAnLhXWsMZ_3aUK60mdKJ', 10, 'feXdYA_DSY_6pNWBxo5tmdrkSWlDOaRs_1662554564', 'member', 10, 1662554564, 1662554660),
(25, 'Putri Handayani', 'putri handayani', 'sinung@ithb.ac.id', '$2y$13$E7qsbnoIo/zXBwIPra1IF.DKtxtsNM/OTjb2x6iy/d.3d5Mqg/Lwe', '5Ppb65MLD9GN_kzrIo7c9TKRyThxfuUf', 10, 'IrbLy1iCX3xhsjpaY-53HEbE5M2Pk8fV_1662558357', 'member', 10, 1662558357, 1662558357),
(26, 'Firdy', 'firdy', 'firdy@mail.com', '$2y$13$iUBSRjEuF7FBWIT99L7FWOaMOtiuhZHA2ABPxFyXGN9aXPz88xEoy', '9ikx2hbSbpY2MasJZEcrZU1-3VdOQoBo', 10, 'LwOVOo2rZPGA54yOPNmucoQIxjFEb7rk_1662560528', 'member', 10, 1662560528, 1662560528),
(27, 'Tesam Arifah', 'tesam', 'tesam@26.com', '$2y$13$FltE7Av6sfke1awZDT5VZusE/cxugBkZtrqBzbQm7kmw/4pLi5WiO', 'z23fp5oxlh5pRZ-g1FejAIkuiM-AA7Up', 10, 'rHY--KrZgGsDvCOfLOmIy0_KKe5gcRse_1662566824', 'member', 10, 1662566824, 1662566824),
(28, 'zafir kun', 'zafir', 'zafirateambrebes@gmail.com', '$2y$13$NPU8vDWBkZXs5F6jfxOqzOLLuWtq8i1oDHSYggRuaEelotmgbRF6m', 'guN1woHwabIZiWZrm9tcM9bGpK1RUcb-', 10, 'ut2AAQ2hrSYqf-3kiqbzHjchuwCfeGzT_1662618355', 'member', 10, 1662618355, 1662618397),
(29, 'intan', 'intan123', 'intan@mail.com', '$2y$13$RqlEWiSZerMcWj4apQksQeEDtcdmUX5DQt5D09MNPnwpHw7F0c9Qm', 'A_uyrX_vx3du9m05nKRPWk4evR-fsBLB', 10, '21KvE97dtfzUnlItBfB_CWd39HVJJhlR_1662620976', 'member', 10, 1662620976, 1662621721),
(30, 'alsha', 'alsha', 'alsha@mail.com', '$2y$13$vW4T/YLizu8JDqUbHw2GbeJfRdwG9bNkg9oAEOXt8ObomPv0rlWCC', '1YrvL1mUVm_IakcePxkq_U5_tlto8kQe', 10, 'T3eYzdfFJrfL8fs005dV89TvvyQrA-Z7_1662621451', 'member', 10, 1662621451, 1662621451),
(31, 'JACK DOE', 'jackdoe', 'jack@gmail.com', '$2y$13$HM/NBobJO7Rv6tVZIB1IzOGJQaGGq52.lXQu35a5Q8fL4kjomK8mG', 'D2M-We1kXSo4zRJ7uQy5zx0OMXio5xm5', 10, 'B33yFYJnsdrll_FF-fQZkUq6UrTl8cNZ_1662630737', 'member', 10, 1662630737, 1662630737);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indeks untuk tabel `hrm_mst_jenis_absensi`
--
ALTER TABLE `hrm_mst_jenis_absensi`
  ADD PRIMARY KEY (`id_mst_jenis_absensi`);

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
  MODIFY `id_asset_item` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- AUTO_INCREMENT untuk tabel `diklat_pegawai`
--
ALTER TABLE `diklat_pegawai`
  MODIFY `id_diklat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `diklat_pegawai_kategori`
--
ALTER TABLE `diklat_pegawai_kategori`
  MODIFY `id_diklat_pegawai_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `diklat_pegawai_list`
--
ALTER TABLE `diklat_pegawai_list`
  MODIFY `id_peserta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `hrm_mst_jenis_absensi`
--
ALTER TABLE `hrm_mst_jenis_absensi`
  MODIFY `id_mst_jenis_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `hrm_pegawai`
--
ALTER TABLE `hrm_pegawai`
  MODIFY `id_pegawai` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `hrm_status_pegawai`
--
ALTER TABLE `hrm_status_pegawai`
  MODIFY `id_hrm_status_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT untuk tabel `laporan_kinerja_pegawai`
--
ALTER TABLE `laporan_kinerja_pegawai`
  MODIFY `id_laporan_kinerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `log_order_pegawai`
--
ALTER TABLE `log_order_pegawai`
  MODIFY `id_log_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `mst_jenjang_pendidikan`
--
ALTER TABLE `mst_jenjang_pendidikan`
  MODIFY `id_mst_jenjang_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `mst_order_progres`
--
ALTER TABLE `mst_order_progres`
  MODIFY `id_mst_order_progres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `order_pegawai`
--
ALTER TABLE `order_pegawai`
  MODIFY `id_order_pegawai` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `order_pegawai_kategori`
--
ALTER TABLE `order_pegawai_kategori`
  MODIFY `id_order_pegawai_kategori` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `order_pegawai_list`
--
ALTER TABLE `order_pegawai_list`
  MODIFY `id_order_pegawai_list` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
