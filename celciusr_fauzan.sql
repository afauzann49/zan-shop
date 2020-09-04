-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Sep 2020 pada 03.33
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `celciusr_fauzan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kd_brg` varchar(122) NOT NULL,
  `kd_kategori` varchar(122) NOT NULL,
  `nama_brg` varchar(122) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` double NOT NULL,
  `stok` double NOT NULL,
  `diskon` int(11) NOT NULL,
  `gambar` varchar(122) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kd_brg`, `kd_kategori`, `nama_brg`, `deskripsi`, `harga`, `stok`, `diskon`, `gambar`, `date_created`) VALUES
('BR000001', 'MN', 'Si Strawberry', 'Strawberry yang asam manis di padukan dengan jelly di dalamnya', 10000, 0, 50, 'strawberry.jpg', 1571058333),
('BR000003', 'MN', 'Thai tea', 'green tea di campur jelly kenyal\r\n', 10000, 62, 10, 'greenteaj.jpg', 1571058360),
('BR000004', 'MN', 'Si Mangga', 'Minuman rasa mangga yang di campur jelly yang kenyal\r\n', 10000, 8, 0, 'mangga.jpg', 1573716078),
('BR000005', 'MN', 'Cappuchino', 'Hmmmmm cocok di minum di siang dan sore hari', 10000, 6, 0, 'capucchino.jpg', 1572590438),
('BR000006', 'MN', 'Si Taro', 'Minuman yang sangat segerrr, cobain deh', 10000, 0, 0, 'taro.jpg', 1573106581),
('BR000007', 'MN', 'Si Jeruk', 'Minuman rasa jeruk yang memberikan sensasi berbeda', 10000, 7, 0, 'orange.jpg', 1573271732);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `kd_konsumen` varchar(122) NOT NULL,
  `kd_brg` varchar(122) NOT NULL,
  `nama_brg` varchar(122) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id_cart`, `kd_konsumen`, `kd_brg`, `nama_brg`, `jumlah`, `harga`) VALUES
(11, 'KS000001', 'BR000003', 'Thai tea', 1, 10000),
(12, 'KS000002', 'BR000003', 'Thai tea', 1, 10000),
(13, 'KS000002', 'BR000001', 'Si Strawberry', 1, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_barang`
--

CREATE TABLE `det_barang` (
  `kd_brg` varchar(122) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `berat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `det_barang`
--

INSERT INTO `det_barang` (`kd_brg`, `ukuran`, `berat`) VALUES
('BR000001', '80 ml', '10 gr'),
('BR000001', '80 ml', '10 gr'),
('BR000003', '80 ml', '10 gr'),
('BR000004', '80 ml', '10 gr'),
('BR000005', '80 ml', '10 gr'),
('BR000006', '80 ml', '100 gr'),
('BR000007', '80 ml', '10 gr');

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_transaksi`
--

CREATE TABLE `det_transaksi` (
  `kd_trans` varchar(122) NOT NULL,
  `kd_brg` varchar(122) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` double NOT NULL,
  `diskon` double NOT NULL,
  `sub_total` double NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `kd_konsumen` varchar(122) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(40) NOT NULL,
  `kota` varchar(40) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_byr` datetime NOT NULL,
  `kd_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoices`
--

INSERT INTO `invoices` (`id`, `kd_konsumen`, `nama`, `alamat`, `provinsi`, `kota`, `tgl_pesan`, `batas_byr`, `kd_status`) VALUES
(1, 'KS000003', 'Muhammad Faiz', 'Jl. K.H. Hasyim Ashari Gg. Yunus\r\n', '11', 'Kota Tangerang', '2019-11-07 11:36:18', '2019-11-08 11:36:18', 3),
(2, 'KS000003', 'Ihksanul Fikri', 'Jl Keramat', '30', 'Kabupaten Maluku Tengah', '2019-11-07 12:47:33', '2019-11-08 12:47:33', 3),
(3, 'KS000003', 'Muhammad Faiz', 'Jl. K.H Hayim Ahari', '11', 'Kota Tangerang', '2019-11-08 10:22:32', '2019-11-09 10:22:32', 1),
(4, 'KS000005', 'Ihksanul Fikri', 'Jl. K.H. Hasyim ashari Gg. Kramat', '11', 'Kota Tangerang', '2019-11-10 21:21:11', '2019-11-11 21:21:11', 2),
(5, 'KS000006', 'Muhammad Haikal', 'Jl. K.H Hasyim Ashari GG.kramat neroktog pinang', '11', 'Kota Tangerang', '2019-11-11 18:51:45', '2019-11-12 18:51:45', 3),
(6, 'KS000006', 'Muhammad Haikal', 'Jl. K.H. Hasyim ashari', '11', 'Kota Tangerang', '2019-11-11 19:52:34', '2019-11-12 19:52:34', 3),
(7, 'KS000007', 'NIS_Pulga', 'Jl kaki aja ya', '12', 'Kabupaten Sukabumi', '2019-11-12 08:09:41', '2019-11-13 08:09:41', 3),
(8, 'KS000006', 'Muhammad Haikal', 'Jl. K.H. Hasyim ashari Gg.kramat Neroktog pinang ', '11', 'Kota Tangerang', '2019-11-14 16:46:11', '2019-11-15 16:46:11', 3),
(9, 'KS000008', 'Muhammad Faiz', 'JL. Mulu', '23', 'Kota Samarinda', '2020-08-11 10:53:24', '2020-08-12 10:53:24', 1),
(10, 'KS000009', 'John Doe', 'Jl. Damai', '11', 'Kota Tangerang', '2020-08-12 23:40:48', '2020-08-13 23:40:48', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kd_kategori` varchar(122) NOT NULL,
  `nama_kategori` varchar(122) NOT NULL,
  `icon` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nama_kategori`, `icon`) VALUES
('MN', 'Minuman', 'fas fa-tv');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `kd_konsumen` varchar(122) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(122) NOT NULL,
  `kd_prov` varchar(122) NOT NULL,
  `kd_kota` varchar(122) NOT NULL,
  `alamat` text NOT NULL,
  `kd_pos` varchar(122) NOT NULL,
  `telp` varchar(14) NOT NULL,
  `image` varchar(122) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`kd_konsumen`, `email`, `password`, `nama`, `kd_prov`, `kd_kota`, `alamat`, `kd_pos`, `telp`, `image`, `role_id`, `date_created`) VALUES
('KS000002', 'admin@gmail.com', '$2y$10$hEoGVSZjTrR0lrtnY.pKsOAVv6mr1SAMUY9JTZQ3GFcxkW6xVlvFW', 'admin', '32', '1', 'jl. Tempur sana sini', '9900', '087654122', 'default.png', 1, 1572959120),
('KS000003', 'faiz@gmail.com', '$2y$10$hMB/d9aD5eb1Ebj.EYQoZeIRY6ibdkOMvj/AVRhPQ3NuRpzmNmT8S', 'Muhammad Faiz', '11', '7', 'jl. k.h hasyim ashari Gg.kramat', '15145', '021345678', 'IMG20191112205813.jpg', 2, 1572959267),
('KS000004', 'afauzann49@gmail.com', '$2y$10$EcXYEd3xM4Gyp0.wUV0PDOGWNXPDXK17DeQXG.QtdotdIijDvgzh2', 'Ahmad Fauzan', '11', '7', 'jl. k.h hasyim ashari Gg.kramat', '15145', '082111055961', 'default.png', 1, 1573100953),
('KS000005', 'isan@gmail.com', '$2y$10$MkNwWMV3EaQHrKF5t/vn0.0e3Oad2Umyfqo30xlnBPDxDR3CQe36G', 'Ihksanul Fikri', '11', '7', 'jl. k.h hasyim ashari Gg.kramat', '15145', '02133456678', 'default.png', 2, 1573269760),
('KS000006', 'haikal@gmail.com', '$2y$10$AUHwv6JU0taHoLcYlhHujePhwD.Dq3iTK.vdkbPbr/GdWDNJDX78m', 'Muhammad Haikal', '11', '7', 'Jl. K.h Hasyim Ashari GG.kramat', '15145', '02111666848', 'default.png', 2, 1573473017),
('KS000007', 'nauvalsyaputra6@gmail.co', '$2y$10$ohNl9/Xk6o9UGV/gA0IC.evVSE8myBeg9evouvtgDZjTSeyrdmJ2a', 'Nauval', '17', '9', 'jl kaki', '115306', '0895373765042', 'default.png', 2, 1573520893),
('KS000008', 'tes@gmail.com', '$2y$10$h/M0ymo/.x.9.TZ27yYYiuaawVgKvn0c/7EH67xSKoPUZfuMDfFza', 'tes', '12', '15', 'asd', '123', '23425', 'default.png', 2, 1597117963),
('KS000009', 'john@gmail.com', '$2y$10$OZ/i5Hsp59KM8QjutcRTW.LX9RGwGtVMBK/hhXUMixfYooBWcN9xS', 'John Doe', '11', '4', 'Jl. Indah Damai', '14151', '021113131414', 'default.png', 2, 1597250195);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `kd_kota` smallint(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `kd_prov` tinyint(4) NOT NULL,
  `biaya_kirim` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`kd_kota`, `nama_kota`, `kd_prov`, `biaya_kirim`) VALUES
(1, 'Kabupaten Aceh Barat', 1, 10000),
(2, 'Kabupaten Aceh Barat Daya', 1, 10000),
(3, 'Kabupaten Aceh Besar', 1, 10000),
(4, 'Kabupaten Aceh Jaya', 1, 10000),
(5, 'Kabupaten Aceh Selatan', 1, 10000),
(6, 'Kabupaten Aceh Singkil', 1, 10000),
(7, 'Kabupaten Aceh Tamiang', 1, 10000),
(8, 'Kabupaten Aceh Tengah', 1, 10000),
(9, 'Kabupaten Aceh Tenggara', 1, 10000),
(10, 'Kabupaten Aceh Timur', 1, 10000),
(11, 'Kabupaten Aceh Utara', 1, 10000),
(12, 'Kabupaten Bener Meriah', 1, 10000),
(13, 'Kabupaten Bireuen', 1, 10000),
(14, 'Kabupaten Gayo Lues', 1, 10000),
(15, 'Kabupaten Nagan Raya', 1, 10000),
(16, 'Kabupaten Pidie', 1, 10000),
(17, 'Kabupaten Pidie Jaya', 1, 10000),
(18, 'Kabupaten Simeulue', 1, 10000),
(19, 'Kota Banda Aceh', 1, 10000),
(20, 'Kota Langsa', 1, 10000),
(21, 'Kota Lhokseumawe', 1, 10000),
(22, 'Kota Sabang', 1, 10000),
(23, 'Kota Subulussalam', 1, 10000),
(1, 'Kabupaten Asahan', 2, 0),
(2, 'Kabupaten Batu Bara', 2, 0),
(3, 'Kabupaten Dairi', 2, 0),
(4, 'Kabupaten Deli Serdang', 2, 0),
(5, 'Kabupaten Humbang Hasundutan', 2, 0),
(6, 'Kabupaten Karo', 2, 0),
(7, 'Kabupaten Labuhanbatu', 2, 0),
(8, 'Kabupaten Labuhanbatu Selatan', 2, 0),
(9, 'Kabupaten Labuhanbatu Utara', 2, 0),
(10, 'Kabupaten Langkat', 2, 0),
(11, 'Kabupaten Mandailing Natal', 2, 0),
(12, 'Kabupaten Nias', 2, 0),
(13, 'Kabupaten Nias Barat', 2, 0),
(14, 'Kabupaten Nias Selatan', 2, 0),
(15, 'Kabupaten Nias Utara', 2, 0),
(16, 'Kabupaten Padang Lawas', 2, 0),
(17, 'Kabupaten Padang Lawas Utara', 2, 0),
(18, 'Kabupaten Pakpak Bharat', 2, 0),
(19, 'Kabupaten Samosir', 2, 0),
(20, 'Kabupaten Serdang Bedagai', 2, 0),
(21, 'Kabupaten Simalungun', 2, 0),
(22, 'Kabupaten Tapanuli Selatan', 2, 0),
(23, 'Kabupaten Tapanuli Tengah', 2, 0),
(24, 'Kabupaten Tapanuli Utara', 2, 0),
(25, 'Kabupaten Toba Samosir', 2, 0),
(26, 'Kota Binjai', 2, 0),
(27, 'Kota Gunung Sitoli', 2, 0),
(28, 'Kota Medan', 2, 0),
(29, 'Kota Padang Sidempuan', 2, 0),
(30, 'Kota Pematangsiantar', 2, 0),
(31, 'Kota Sibolga', 2, 0),
(32, 'Kota Tanjung Balai', 2, 0),
(33, 'Kota Tebing Tinggi', 2, 0),
(1, 'Kabupaten Bengkulu Selatan', 3, 0),
(2, 'Kabupaten Bengkulu Tengah', 3, 0),
(3, 'Kabupaten Bengkulu Utara', 3, 0),
(4, 'Kabupaten Benteng', 3, 0),
(5, 'Kabupaten Kaur', 3, 0),
(6, 'Kabupaten Kepahiang', 3, 0),
(7, 'Kabupaten Lebong', 3, 0),
(8, 'Kabupaten Mukomuko', 3, 0),
(9, 'Kabupaten Rejang Lebong', 3, 0),
(10, 'Kabupaten Seluma', 3, 0),
(11, 'Kota Bengkulu', 3, 0),
(1, 'Kabupaten Batang Hari', 4, 0),
(2, 'Kabupaten Bungo', 4, 0),
(3, 'Kabupaten Kerinci', 4, 0),
(4, 'Kabupaten Merangin', 4, 0),
(5, 'Kabupaten Muaro Jambi', 4, 0),
(6, 'Kabupaten Sarolangun', 4, 0),
(7, 'Kabupaten Tanjung Jabung Barat', 4, 0),
(8, 'Kabupaten Tanjung Jabung Timur', 4, 0),
(9, 'Kabupaten Tebo', 4, 0),
(10, 'Kota Jambi', 4, 0),
(11, 'Kota Sungai Penuh', 4, 0),
(1, 'Kabupaten Bengkalis', 5, 0),
(2, 'Kabupaten Indragiri Hilir', 5, 0),
(3, 'Kabupaten Indragiri Hulu', 5, 0),
(4, 'Kabupaten Kampar', 5, 0),
(5, 'Kabupaten Kuantan Singingi', 5, 0),
(6, 'Kabupaten Pelalawan', 5, 0),
(7, 'Kabupaten Rokan Hilir', 5, 0),
(8, 'Kabupaten Rokan Hulu', 5, 0),
(9, 'Kabupaten Siak', 5, 0),
(10, 'Kota Pekanbaru', 5, 0),
(11, 'Kota Dumai', 5, 0),
(12, 'Kabupaten Kepulauan Meranti', 5, 0),
(1, 'Kabupaten Agam', 6, 0),
(2, 'Kabupaten Dharmasraya', 6, 0),
(3, 'Kabupaten Kepulauan Mentawai', 6, 0),
(4, 'Kabupaten Lima Puluh Kota', 6, 0),
(5, 'Kabupaten Padang Pariaman', 6, 0),
(6, 'Kabupaten Pasaman', 6, 0),
(7, 'Kabupaten Pasaman Barat', 6, 0),
(8, 'Kabupaten Pesisir Selatan', 6, 0),
(9, 'Kabupaten Sijunjung', 6, 0),
(10, 'Kabupaten Solok', 6, 0),
(11, 'Kabupaten Solok Selatan', 6, 0),
(12, 'Kabupaten Tanah Datar', 6, 0),
(13, 'Kota Bukittinggi', 6, 0),
(14, 'Kota Padang', 6, 0),
(15, 'Kota Padangpanjang', 6, 0),
(16, 'Kota Pariaman', 6, 0),
(17, 'Kota Payakumbuh', 6, 0),
(18, 'Kota Sawahlunto', 6, 0),
(19, 'Kota Solok', 6, 0),
(1, 'Kabupaten Banyuasin', 7, 0),
(2, 'Kabupaten Empat Lawang', 7, 0),
(3, 'Kabupaten Lahat', 7, 0),
(4, 'Kabupaten Muara Enim', 7, 0),
(5, 'Kabupaten Musi Banyuasin', 7, 0),
(6, 'Kabupaten Musi Rawas', 7, 0),
(7, 'Kabupaten Ogan Ilir', 7, 0),
(8, 'Kabupaten Ogan Komering Ilir', 7, 0),
(9, 'Kabupaten Ogan Komering Ulu', 7, 0),
(10, 'Kabupaten Ogan Komering Ulu Selatan', 7, 0),
(11, 'Kabupaten Ogan Komering Ulu Timur', 7, 0),
(12, 'Kota Lubuklinggau', 7, 0),
(13, 'Kota Pagar Alam', 7, 0),
(14, 'Kota Palembang', 7, 0),
(15, 'Kota Prabumulih', 7, 0),
(1, 'Kabupaten Lampung Barat', 8, 0),
(2, 'Kabupaten Lampung Selatan', 8, 0),
(3, 'Kabupaten Lampung Tengah', 8, 0),
(4, 'Kabupaten Lampung Timur', 8, 0),
(5, 'Kabupaten Lampung Utara', 8, 0),
(6, 'Kabupaten Mesuji', 8, 0),
(7, 'Kabupaten Pesawaran', 8, 0),
(8, 'Kabupaten Pringsewu', 8, 0),
(9, 'Kabupaten Tanggamus', 8, 0),
(10, 'Kabupaten Tulang Bawang', 8, 0),
(11, 'Kabupaten Tulang Bawang Barat', 8, 0),
(12, 'Kabupaten Way Kanan', 8, 0),
(13, 'Kota Bandar Lampung', 8, 0),
(14, 'Kota Metro', 8, 0),
(1, 'Kabupaten Bangka', 9, 0),
(2, 'Kabupaten Bangka Barat', 9, 0),
(3, 'Kabupaten Bangka Selatan', 9, 0),
(4, 'Kabupaten Bangka Tengah', 9, 0),
(5, 'Kabupaten Belitung', 9, 0),
(6, 'Kabupaten Belitung Timur', 9, 0),
(7, 'Kota Pangkal Pinang', 9, 0),
(1, 'Kabupaten Bintan', 10, 0),
(2, 'Kabupaten Karimun', 10, 0),
(3, 'Kabupaten Kepulauan Anambas', 10, 0),
(4, 'Kabupaten Lingga', 10, 0),
(5, 'Kabupaten Natuna', 10, 0),
(6, 'Kota Batam', 10, 0),
(7, 'Kota Tanjung Pinang', 10, 0),
(1, 'Kabupaten Lebak', 11, 0),
(2, 'Kabupaten Pandeglang', 11, 0),
(3, 'Kabupaten Serang', 11, 0),
(4, 'Kabupaten Tangerang', 11, 0),
(5, 'Kota Cilegon', 11, 0),
(6, 'Kota Serang', 11, 0),
(7, 'Kota Tangerang', 11, 0),
(8, 'Kota Tangerang Selatan', 11, 0),
(1, 'Kabupaten Bandung', 12, 0),
(2, 'Kabupaten Bandung Barat', 12, 0),
(3, 'Kabupaten Bekasi', 12, 0),
(4, 'Kabupaten Bogor', 12, 0),
(5, 'Kabupaten Ciamis', 12, 0),
(6, 'Kabupaten Cianjur', 12, 0),
(7, 'Kabupaten Cirebon', 12, 0),
(8, 'Kabupaten Garut', 12, 0),
(9, 'Kabupaten Indramayu', 12, 0),
(10, 'Kabupaten Karawang', 12, 0),
(11, 'Kabupaten Kuningan', 12, 0),
(12, 'Kabupaten Majalengka', 12, 0),
(13, 'Kabupaten Purwakarta', 12, 0),
(14, 'Kabupaten Subang', 12, 0),
(15, 'Kabupaten Sukabumi', 12, 0),
(16, 'Kabupaten Sumedang', 12, 0),
(17, 'Kabupaten Tasikmalaya', 12, 0),
(18, 'Kota Bandung', 12, 0),
(19, 'Kota Banjar', 12, 0),
(20, 'Kota Bekasi', 12, 0),
(21, 'Kota Bogor', 12, 0),
(22, 'Kota Cimahi', 12, 0),
(23, 'Kota Cirebon', 12, 0),
(24, 'Kota Depok', 12, 0),
(25, 'Kota Sukabumi', 12, 0),
(26, 'Kota Tasikmalaya', 12, 0),
(1, 'Kabupaten Administrasi Kepulauan Seribu', 13, 0),
(2, 'Kota Administrasi Jakarta Barat', 13, 0),
(3, 'Kota Administrasi Jakarta Pusat', 13, 0),
(4, 'Kota Administrasi Jakarta Selatan', 13, 0),
(5, 'Kota Administrasi Jakarta Timur', 13, 0),
(6, 'Kota Administrasi Jakarta Utara', 13, 0),
(1, 'Kabupaten Banjarnegara', 14, 0),
(2, 'Kabupaten Banyumas', 14, 0),
(3, 'Kabupaten Batang', 14, 0),
(4, 'Kabupaten Blora', 14, 0),
(5, 'Kabupaten Boyolali', 14, 0),
(6, 'Kabupaten Brebes', 14, 0),
(7, 'Kabupaten Cilacap', 14, 0),
(8, 'Kabupaten Demak', 14, 0),
(9, 'Kabupaten Grobogan', 14, 0),
(10, 'Kabupaten Jepara', 14, 0),
(11, 'Kabupaten Karanganyar', 14, 0),
(12, 'Kabupaten Kebumen', 14, 0),
(13, 'Kabupaten Kendal', 14, 0),
(14, 'Kabupaten Klaten', 14, 0),
(15, 'Kabupaten Kudus', 14, 0),
(16, 'Kabupaten Magelang', 14, 0),
(17, 'Kabupaten Pati', 14, 0),
(18, 'Kabupaten Pekalongan', 14, 0),
(19, 'Kabupaten Pemalang', 14, 0),
(20, 'Kabupaten Purbalingga', 14, 0),
(21, 'Kabupaten Purworejo', 14, 0),
(22, 'Kabupaten Rembang', 14, 0),
(23, 'Kabupaten Semarang', 14, 0),
(24, 'Kabupaten Sragen', 14, 0),
(25, 'Kabupaten Sukoharjo', 14, 0),
(26, 'Kabupaten Tegal', 14, 0),
(27, 'Kabupaten Temanggung', 14, 0),
(28, 'Kabupaten Wonogiri', 14, 0),
(29, 'Kabupaten Wonosobo', 14, 0),
(30, 'Kota Magelang', 14, 0),
(31, 'Kota Pekalongan', 14, 0),
(32, 'Kota Salatiga', 14, 0),
(33, 'Kota Semarang', 14, 0),
(34, 'Kota Surakarta', 14, 0),
(35, 'Kota Tegal', 14, 0),
(1, 'Kabupaten Bangkalan', 15, 0),
(2, 'Kabupaten Banyuwangi', 15, 0),
(3, 'Kabupaten Blitar', 15, 0),
(4, 'Kabupaten Bojonegoro', 15, 0),
(5, 'Kabupaten Bondowoso', 15, 0),
(6, 'Kabupaten Gresik', 15, 0),
(7, 'Kabupaten Jember', 15, 0),
(8, 'Kabupaten Jombang', 15, 0),
(9, 'Kabupaten Kediri', 15, 0),
(10, 'Kabupaten Lamongan', 15, 0),
(11, 'Kabupaten Lumajang', 15, 0),
(12, 'Kabupaten Madiun', 15, 0),
(13, 'Kabupaten Magetan', 15, 0),
(14, 'Kabupaten Malang', 15, 0),
(15, 'Kabupaten Mojokerto', 15, 0),
(16, 'Kabupaten Nganjuk', 15, 0),
(17, 'Kabupaten Ngawi', 15, 0),
(18, 'Kabupaten Pacitan', 15, 0),
(19, 'Kabupaten Pamekasan', 15, 0),
(20, 'Kabupaten Pasuruan', 15, 0),
(21, 'Kabupaten Ponorogo', 15, 0),
(22, 'Kabupaten Probolinggo', 15, 0),
(23, 'Kabupaten Sampang', 15, 0),
(24, 'Kabupaten Sidoarjo', 15, 0),
(25, 'Kabupaten Situbondo', 15, 0),
(26, 'Kabupaten Sumenep', 15, 0),
(27, 'Kabupaten Trenggalek', 15, 0),
(28, 'Kabupaten Tuban', 15, 0),
(29, 'Kabupaten Tulungagung', 15, 0),
(30, 'Kota Batu', 15, 0),
(31, 'Kota Blitar', 15, 0),
(32, 'Kota Kediri', 15, 0),
(33, 'Kota Madiun', 15, 0),
(34, 'Kota Malang', 15, 0),
(35, 'Kota Mojokerto', 15, 0),
(36, 'Kota Pasuruan', 15, 0),
(37, 'Kota Probolinggo', 15, 0),
(38, 'Kota Surabaya', 15, 0),
(1, 'Kabupaten Bantul', 16, 0),
(2, 'Kabupaten Gunung Kidul', 16, 0),
(3, 'Kabupaten Kulon Progo', 16, 0),
(4, 'Kabupaten Sleman', 16, 0),
(5, 'Kota Yogyakarta', 16, 0),
(1, 'Kabupaten Badung', 17, 0),
(2, 'Kabupaten Bangli', 17, 0),
(3, 'Kabupaten Buleleng', 17, 0),
(4, 'Kabupaten Gianyar', 17, 0),
(5, 'Kabupaten Jembrana', 17, 0),
(6, 'Kabupaten Karangasem', 17, 0),
(7, 'Kabupaten Klungkung', 17, 0),
(8, 'Kabupaten Tabanan', 17, 0),
(9, 'Kota Denpasar', 17, 0),
(1, 'Kabupaten Bima', 18, 0),
(2, 'Kabupaten Dompu', 18, 0),
(3, 'Kabupaten Lombok Barat', 18, 0),
(4, 'Kabupaten Lombok Tengah', 18, 0),
(5, 'Kabupaten Lombok Timur', 18, 0),
(6, 'Kabupaten Lombok Utara', 18, 0),
(7, 'Kabupaten Sumbawa', 18, 0),
(8, 'Kabupaten Sumbawa Barat', 18, 0),
(9, 'Kota Bima', 18, 0),
(10, 'Kota Mataram', 18, 0),
(1, 'Kabupaten Kupang', 19, 0),
(2, 'Kabupaten Timor Tengah Selatan', 19, 0),
(3, 'Kabupaten Timor Tengah Utara', 19, 0),
(4, 'Kabupaten Belu', 19, 0),
(5, 'Kabupaten Alor', 19, 0),
(6, 'Kabupaten Flores Timur', 19, 0),
(7, 'Kabupaten Sikka', 19, 0),
(8, 'Kabupaten Ende', 19, 0),
(9, 'Kabupaten Ngada', 19, 0),
(10, 'Kabupaten Manggarai', 19, 0),
(11, 'Kabupaten Sumba Timur', 19, 0),
(12, 'Kabupaten Sumba Barat', 19, 0),
(13, 'Kabupaten Lembata', 19, 0),
(14, 'Kabupaten Rote Ndao', 19, 0),
(15, 'Kabupaten Manggarai Barat', 19, 0),
(16, 'Kabupaten Nagekeo', 19, 0),
(17, 'Kabupaten Sumba Tengah', 19, 0),
(18, 'Kabupaten Sumba Barat Daya', 19, 0),
(19, 'Kabupaten Manggarai Timur', 19, 0),
(20, 'Kabupaten Sabu Raijua', 19, 0),
(21, 'Kota Kupang', 19, 0),
(1, 'Kabupaten Bengkayang', 20, 0),
(2, 'Kabupaten Kapuas Hulu', 20, 0),
(3, 'Kabupaten Kayong Utara', 20, 0),
(4, 'Kabupaten Ketapang', 20, 0),
(5, 'Kabupaten Kubu Raya', 20, 0),
(6, 'Kabupaten Landak', 20, 0),
(7, 'Kabupaten Melawi', 20, 0),
(8, 'Kabupaten Pontianak', 20, 0),
(9, 'Kabupaten Sambas', 20, 0),
(10, 'Kabupaten Sanggau', 20, 0),
(11, 'Kabupaten Sekadau', 20, 0),
(12, 'Kabupaten Sintang', 20, 0),
(13, 'Kota Pontianak', 20, 0),
(14, 'Kota Singkawang', 20, 0),
(1, 'Kabupaten Balangan', 21, 0),
(2, 'Kabupaten Banjar', 21, 0),
(3, 'Kabupaten Barito Kuala', 21, 0),
(4, 'Kabupaten Hulu Sungai Selatan', 21, 0),
(5, 'Kabupaten Hulu Sungai Tengah', 21, 0),
(6, 'Kabupaten Hulu Sungai Utara', 21, 0),
(7, 'Kabupaten Kotabaru', 21, 0),
(8, 'Kabupaten Tabalong', 21, 0),
(9, 'Kabupaten Tanah Bumbu', 21, 0),
(10, 'Kabupaten Tanah Laut', 21, 0),
(11, 'Kabupaten Tapin', 21, 0),
(12, 'Kota Banjarbaru', 21, 0),
(13, 'Kota Banjarmasin', 21, 0),
(1, 'Kabupaten Barito Selatan', 22, 0),
(2, 'Kabupaten Barito Timur', 22, 0),
(3, 'Kabupaten Barito Utara', 22, 0),
(4, 'Kabupaten Gunung Mas', 22, 0),
(5, 'Kabupaten Kapuas', 22, 0),
(6, 'Kabupaten Katingan', 22, 0),
(7, 'Kabupaten Kotawaringin Barat', 22, 0),
(8, 'Kabupaten Kotawaringin Timur', 22, 0),
(9, 'Kabupaten Lamandau', 22, 0),
(10, 'Kabupaten Murung Raya', 22, 0),
(11, 'Kabupaten Pulang Pisau', 22, 0),
(12, 'Kabupaten Sukamara', 22, 0),
(13, 'Kabupaten Seruyan', 22, 0),
(14, 'Kota Palangka Raya', 22, 0),
(1, 'Kabupaten Berau', 23, 0),
(2, 'Kabupaten Bulungan', 23, 0),
(3, 'Kabupaten Kutai Barat', 23, 0),
(4, 'Kabupaten Kutai Kartanegara', 23, 0),
(5, 'Kabupaten Kutai Timur', 23, 0),
(6, 'Kabupaten Malinau', 23, 0),
(7, 'Kabupaten Nunukan', 23, 0),
(8, 'Kabupaten Paser', 23, 0),
(9, 'Kabupaten Penajam Paser Utara', 23, 0),
(10, 'Kabupaten Tana Tidung', 23, 0),
(11, 'Kota Balikpapan', 23, 0),
(12, 'Kota Bontang', 23, 0),
(13, 'Kota Samarinda', 23, 0),
(14, 'Kota Tarakan', 23, 0),
(1, 'Kabupaten Boalemo', 24, 0),
(2, 'Kabupaten Bone Bolango', 24, 0),
(3, 'Kabupaten Gorontalo', 24, 0),
(4, 'Kabupaten Gorontalo Utara', 24, 0),
(5, 'Kabupaten Pohuwato', 24, 0),
(6, 'Kota Gorontalo', 24, 0),
(1, 'Kabupaten Bantaeng', 25, 0),
(2, 'Kabupaten Barru', 25, 0),
(3, 'Kabupaten Bone', 25, 0),
(4, 'Kabupaten Bulukumba', 25, 0),
(5, 'Kabupaten Enrekang', 25, 0),
(6, 'Kabupaten Gowa', 25, 0),
(7, 'Kabupaten Jeneponto', 25, 0),
(8, 'Kabupaten Kepulauan Selayar', 25, 0),
(9, 'Kabupaten Luwu', 25, 0),
(10, 'Kabupaten Luwu Timur', 25, 0),
(11, 'Kabupaten Luwu Utara', 25, 0),
(12, 'Kabupaten Maros', 25, 0),
(13, 'Kabupaten Pangkajene dan Kepulauan', 25, 0),
(14, 'Kabupaten Pinrang', 25, 0),
(15, 'Kabupaten Sidenreng Rappang', 25, 0),
(16, 'Kabupaten Sinjai', 25, 0),
(17, 'Kabupaten Soppeng', 25, 0),
(18, 'Kabupaten Takalar', 25, 0),
(19, 'Kabupaten Tana Toraja', 25, 0),
(20, 'Kabupaten Toraja Utara', 25, 0),
(21, 'Kabupaten Wajo', 25, 0),
(22, 'Kota Makassar', 25, 0),
(23, 'Kota Palopo', 25, 0),
(24, 'Kota Parepare', 25, 0),
(1, 'Kabupaten Bombana', 26, 0),
(2, 'Kabupaten Buton', 26, 0),
(3, 'Kabupaten Buton Utara', 26, 0),
(4, 'Kabupaten Kolaka', 26, 0),
(5, 'Kabupaten Kolaka Utara', 26, 0),
(6, 'Kabupaten Konawe', 26, 0),
(7, 'Kabupaten Konawe Selatan', 26, 0),
(8, 'Kabupaten Konawe Utara', 26, 0),
(9, 'Kabupaten Muna', 26, 0),
(10, 'Kabupaten Wakatobi', 26, 0),
(11, 'Kota Bau-Bau', 26, 0),
(12, 'Kota Kendari', 26, 0),
(1, 'Kabupaten Banggai', 27, 0),
(2, 'Kabupaten Banggai Kepulauan', 27, 0),
(3, 'Kabupaten Buol', 27, 0),
(4, 'Kabupaten Donggala', 27, 0),
(5, 'Kabupaten Morowali', 27, 0),
(6, 'Kabupaten Parigi Moutong', 27, 0),
(7, 'Kabupaten Poso', 27, 0),
(8, 'Kabupaten Tojo Una-Una', 27, 0),
(9, 'Kabupaten Toli-Toli', 27, 0),
(10, 'Kabupaten Sigi', 27, 0),
(11, 'Kota Palu', 27, 0),
(1, 'Kabupaten Bolaang Mongondow', 28, 0),
(2, 'Kabupaten Bolaang Mongondow Selatan', 28, 0),
(3, 'Kabupaten Bolaang Mongondow Timur', 28, 0),
(4, 'Kabupaten Bolaang Mongondow Utara', 28, 0),
(5, 'Kabupaten Kepulauan Sangihe', 28, 0),
(6, 'Kabupaten Kepulauan Siau Tagulandang Biaro', 28, 0),
(7, 'Kabupaten Kepulauan Talaud', 28, 0),
(8, 'Kabupaten Minahasa', 28, 0),
(9, 'Kabupaten Minahasa Selatan', 28, 0),
(10, 'Kabupaten Minahasa Tenggara', 28, 0),
(11, 'Kabupaten Minahasa Utara', 28, 0),
(12, 'Kota Bitung', 28, 0),
(13, 'Kota Kotamobagu', 28, 0),
(14, 'Kota Manado', 28, 0),
(15, 'Kota Tomohon', 28, 0),
(1, 'Kabupaten Majene', 29, 0),
(2, 'Kabupaten Mamasa', 29, 0),
(3, 'Kabupaten Mamuju', 29, 0),
(4, 'Kabupaten Mamuju Utara', 29, 0),
(5, 'Kabupaten Polewali Mandar', 29, 0),
(1, 'Kabupaten Buru', 30, 0),
(2, 'Kabupaten Buru Selatan', 30, 0),
(3, 'Kabupaten Kepulauan Aru', 30, 0),
(4, 'Kabupaten Maluku Barat Daya', 30, 0),
(5, 'Kabupaten Maluku Tengah', 30, 0),
(6, 'Kabupaten Maluku Tenggara', 30, 0),
(7, 'Kabupaten Maluku Tenggara Barat', 30, 0),
(8, 'Kabupaten Seram Bagian Barat', 30, 0),
(9, 'Kabupaten Seram Bagian Timur', 30, 0),
(10, 'Kota Ambon', 30, 0),
(11, 'Kota Tual', 30, 0),
(1, 'Kabupaten Halmahera Barat', 31, 0),
(2, 'Kabupaten Halmahera Tengah', 31, 0),
(3, 'Kabupaten Halmahera Utara', 31, 0),
(4, 'Kabupaten Halmahera Selatan', 31, 0),
(5, 'Kabupaten Kepulauan Sula', 31, 0),
(6, 'Kabupaten Halmahera Timur', 31, 0),
(7, 'Kabupaten Pulau Morotai', 31, 0),
(8, 'Kota Ternate', 31, 0),
(9, 'Kota Tidore Kepulauan', 31, 0),
(1, 'Kabupaten Asmat', 32, 0),
(2, 'Kabupaten Biak Numfor', 32, 0),
(3, 'Kabupaten Boven Digoel', 32, 0),
(4, 'Kabupaten Deiyai', 32, 0),
(5, 'Kabupaten Dogiyai', 32, 0),
(6, 'Kabupaten Intan Jaya', 32, 0),
(7, 'Kabupaten Jayapura', 32, 0),
(8, 'Kabupaten Jayawijaya', 32, 0),
(9, 'Kabupaten Keerom', 32, 0),
(10, 'Kabupaten Kepulauan Yapen', 32, 0),
(11, 'Kabupaten Lanny Jaya', 32, 0),
(12, 'Kabupaten Mamberamo Raya', 32, 0),
(13, 'Kabupaten Mamberamo Tengah', 32, 0),
(14, 'Kabupaten Mappi', 32, 0),
(15, 'Kabupaten Merauke', 32, 0),
(16, 'Kabupaten Mimika', 32, 0),
(17, 'Kabupaten Nabire', 32, 0),
(18, 'Kabupaten Nduga', 32, 0),
(19, 'Kabupaten Paniai', 32, 0),
(20, 'Kabupaten Pegunungan Bintang', 32, 0),
(21, 'Kabupaten Puncak', 32, 0),
(22, 'Kabupaten Puncak Jaya', 32, 0),
(23, 'Kabupaten Sarmi', 32, 0),
(24, 'Kabupaten Supiori', 32, 0),
(25, 'Kabupaten Tolikara', 32, 0),
(26, 'Kabupaten Waropen', 32, 0),
(27, 'Kabupaten Yahukimo', 32, 0),
(28, 'Kabupaten Yalimo', 32, 0),
(29, 'Kota Jayapura', 32, 0),
(1, 'Kabupaten Fakfak', 33, 0),
(2, 'Kabupaten Kaimana', 33, 0),
(3, 'Kabupaten Manokwari', 33, 0),
(4, 'Kabupaten Maybrat', 33, 0),
(5, 'Kabupaten Raja Ampat', 33, 0),
(6, 'Kabupaten Sorong', 33, 0),
(7, 'Kabupaten Sorong Selatan', 33, 0),
(8, 'Kabupaten Tambrauw', 33, 0),
(9, 'Kabupaten Teluk Bintuni', 33, 0),
(10, 'Kabupaten Teluk Wondama', 33, 0),
(11, 'Kota Sorong', 33, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_invoices` int(11) NOT NULL,
  `kd_konsumen` varchar(122) NOT NULL,
  `kd_brg` varchar(122) NOT NULL,
  `nama_brg` varchar(55) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_invoices`, `kd_konsumen`, `kd_brg`, `nama_brg`, `jumlah`, `harga`) VALUES
(1, 1, 'KS000003', 'BR000003', 'Thai tea', 4, 9000),
(2, 1, 'KS000003', 'BR000004', 'Si Mangga', 1, 10000),
(3, 2, 'KS000003', 'BR000001', 'Si Strawberry', 1, 5000),
(4, 3, 'KS000003', 'BR000003', 'Thai tea', 1, 9000),
(5, 4, 'KS000005', 'BR000001', 'Si Strawberry', 3, 5000),
(6, 5, 'KS000006', 'BR000003', 'Thai tea', 2, 9000),
(7, 5, 'KS000006', 'BR000007', 'Si Jeruk', 3, 10000),
(8, 6, 'KS000006', 'BR000001', 'Si Strawberry', 1, 5000),
(9, 7, 'KS000007', 'BR000004', 'Si Mangga', 1, 10000),
(10, 8, 'KS000006', 'BR000004', 'Si Mangga', 1, 10000),
(11, 8, 'KS000006', 'BR000005', 'Cappuchino', 2, 10000),
(12, 9, 'KS000008', 'BR000005', 'Cappuchino', 1, 10000),
(13, 10, 'KS000009', 'BR000004', 'Si Mangga', 1, 10000);

--
-- Trigger `pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `pesanan` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok-NEW.jumlah
    WHERE kd_brg = NEW.kd_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `kd_prov` varchar(128) NOT NULL,
  `nama_prov` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`kd_prov`, `nama_prov`) VALUES
('13', 'DKI Jakarta'),
('12', 'Jawa Barat'),
('14', 'Jawa Tengah'),
('16', 'Yogyakarta'),
('15', 'Jawa Timur'),
('1', 'Nangroe Aceh Darussalam'),
('2', 'Sumatera Utara'),
('6', 'Sumatera Barat'),
('9', 'Riau'),
('4', 'Jambi'),
('7', 'Sumatera Selatan'),
('8', 'Lampung'),
('20', 'Kalimantan Barat'),
('22', 'Kalimantan Tengah'),
('21', 'Kalimantan Selatan'),
('23', 'Kalimantan Timur'),
('28', 'Sulawesi Utara'),
('27', 'Sulawesi Tengah'),
('25', 'Sulawesi Selatan'),
('26', 'Sulawesi Tenggara'),
('30', 'Maluku'),
('17', 'Bali'),
('18', 'Nusa Tenggara Barat'),
('19', 'Nusa Tenggara Timur'),
('32', 'Papua'),
('3', 'Bengkulu'),
('31', 'Maluku Utara'),
('11', 'Banten'),
('9', 'Babel'),
('24', 'Gorontalo'),
('5', 'Kepulauan Riau'),
('32', 'Irian Jaya Barat'),
('29', 'Sulawesi Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_trans` varchar(122) NOT NULL,
  `tgl_trans` varchar(122) NOT NULL,
  `kd_konsumen` varchar(122) NOT NULL,
  `biaya_kirim` double NOT NULL,
  `biaya_pemesanan` double NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `no_resi_pengiriman` varchar(60) NOT NULL,
  `kd_prov` varchar(122) NOT NULL,
  `kd_kota` varchar(122) NOT NULL,
  `status` varchar(50) NOT NULL,
  `kd_ip` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `det_transaksi`
--
ALTER TABLE `det_transaksi`
  ADD PRIMARY KEY (`kd_trans`);

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`kd_konsumen`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_trans`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
