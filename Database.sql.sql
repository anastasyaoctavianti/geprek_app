-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2023 pada 09.24
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan_ayam_geprek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `merek` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_cabang`, `nama_barang`, `merek`, `stok`, `satuan`) VALUES
(1, 2, 'Beras', 'Pandan', 22, 'Karung'),
(2, 1, 'Beras', 'Pandan', 24, 'Karung'),
(3, 1, 'Minyak Beku', 'Filma', 50, 'Kg'),
(4, 2, 'Minyak Beku', 'Filma', 50, 'Kg'),
(5, 1, 'Ayam Potong', 'Ciomas', 42, 'Ekor'),
(6, 2, 'Ayam Potong', 'Ciomas', 44, 'Ekor'),
(7, 1, 'Bumbu Marinasi', 'Juragan Tepung', 53, 'Pack'),
(8, 2, 'Bumbu Marinasi', 'Juragan Tepung', 41, 'Pack'),
(9, 1, 'Tepung ', 'Segitiga Biru', 13, 'Karung'),
(10, 2, 'Tepung ', 'Segitiga Biru', 17, 'Karung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_list`
--

CREATE TABLE `barang_list` (
  `id_barang_list` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_jual` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `tanggal_jual` date NOT NULL,
  `id_konsumen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `barang_list`
--

INSERT INTO `barang_list` (`id_barang_list`, `id_penjualan`, `id_barang`, `jumlah_jual`, `id_pegawai`, `id_cabang`, `tanggal_jual`, `id_konsumen`) VALUES
(112, 3, 0, 0, 1, 2, '2023-05-30', 0),
(130, 9, 0, 0, 1, 1, '2022-02-18', 4),
(135, 9, 17, 1, 11, 1, '2022-02-18', 1),
(136, 9, 13, 3, 11, 1, '2022-02-18', 1),
(142, 1, 16, 10, 11, 1, '2022-01-15', 1),
(144, 1, 13, 3, 11, 1, '2022-01-15', 1),
(146, 1, 0, 0, 11, 1, '2022-01-15', 1),
(147, 2, 17, 50, 10, 1, '2022-02-05', 1),
(148, 2, 36, 50, 10, 1, '2022-02-05', 1),
(149, 2, 29, 100, 10, 1, '2022-02-05', 1),
(155, 3, 19, 100, 11, 1, '2022-03-03', 1),
(156, 3, 27, 50, 11, 1, '2022-03-03', 1),
(157, 3, 13, 300, 11, 1, '2022-03-03', 1),
(159, 4, 12, 50, 14, 1, '2022-03-27', 1),
(163, 5, 24, 50, 13, 1, '2022-04-05', 1),
(164, 5, 28, 100, 13, 1, '2022-04-05', 1),
(167, 6, 21, 100, 10, 1, '2022-05-09', 1),
(168, 1, 14, 20, 11, 1, '2022-01-15', 1),
(169, 4, 9, 100, 14, 1, '2022-03-27', 1),
(170, 4, 35, 100, 14, 1, '2022-03-27', 1),
(171, 6, 41, 50, 10, 1, '2022-05-09', 1),
(172, 6, 13, 50, 10, 1, '2022-05-09', 1),
(173, 7, 11, 3, 14, 1, '2022-07-30', 1),
(174, 7, 20, 3, 14, 1, '2022-07-30', 1),
(175, 7, 39, 2, 14, 1, '2022-07-30', 1),
(176, 7, 45, 3, 14, 1, '2022-07-30', 1),
(177, 7, 22, 2, 14, 1, '2022-07-30', 1),
(178, 8, 29, 2, 12, 1, '2022-07-23', 1),
(179, 8, 22, 2, 12, 1, '2022-07-23', 1),
(180, 8, 3, 1, 12, 1, '2022-07-23', 1),
(181, 8, 46, 2, 12, 1, '2022-07-23', 1),
(182, 8, 21, 3, 12, 1, '2022-07-23', 1),
(183, 8, 35, 4, 12, 1, '2022-07-23', 1),
(184, 9, 2, 3, 11, 1, '2022-08-18', 1),
(185, 9, 36, 1, 11, 1, '2022-08-18', 1),
(186, 10, 16, 3, 11, 1, '2022-08-26', 1),
(187, 10, 17, 3, 11, 1, '2022-08-26', 1),
(188, 10, 21, 3, 11, 1, '2022-08-26', 1),
(189, 10, 40, 3, 11, 1, '2022-08-26', 1),
(190, 10, 13, 1, 11, 1, '2022-08-26', 1),
(191, 11, 6, 3, 15, 1, '2022-09-17', 1),
(192, 11, 21, 3, 15, 1, '2022-09-17', 1),
(193, 11, 9, 5, 15, 1, '2022-09-17', 1),
(194, 11, 34, 5, 15, 1, '2022-09-17', 1),
(195, 11, 43, 5, 15, 1, '2022-09-17', 1),
(196, 11, 44, 2, 15, 1, '2022-09-17', 1),
(197, 12, 14, 5, 12, 1, '2022-10-14', 1),
(198, 12, 45, 3, 12, 1, '2022-10-14', 1),
(199, 12, 46, 1, 12, 1, '2022-10-14', 1),
(200, 12, 21, 0, 12, 1, '2022-10-14', 1),
(201, 12, 38, 5, 12, 1, '2022-10-14', 1),
(202, 13, 35, 5, 14, 1, '2022-11-23', 1),
(203, 13, 10, 5, 14, 1, '2022-11-23', 1),
(204, 13, 13, 3, 14, 1, '2022-11-23', 1),
(205, 13, 27, 2, 14, 1, '2022-11-23', 1),
(207, 14, 27, 10, 1, 1, '0000-00-00', 4),
(208, 14, 30, 5, 1, 1, '0000-00-00', 4),
(209, 14, 34, 10, 1, 1, '0000-00-00', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_list2`
--

CREATE TABLE `barang_list2` (
  `id_barang_list2` int(11) NOT NULL,
  `id_complement_karyawan` int(11) NOT NULL,
  `id_menu_makanan` int(11) NOT NULL,
  `jumlah_ambil` int(11) NOT NULL,
  `tanggal_ambil` date NOT NULL,
  `id_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_list2`
--

INSERT INTO `barang_list2` (`id_barang_list2`, `id_complement_karyawan`, `id_menu_makanan`, `jumlah_ambil`, `tanggal_ambil`, `id_cabang`) VALUES
(8, 1, 6, 3, '2023-02-02', 0),
(9, 1, 10, 1, '2023-02-02', 0),
(10, 2, 19, 1, '2023-02-02', 0),
(35, 5, 29, 4, '2022-02-04', 1),
(38, 6, 17, 4, '2022-03-05', 1),
(39, 6, 10, 1, '2022-03-05', 1),
(40, 7, 15, 5, '2022-04-06', 1),
(47, 8, 23, 2, '2023-05-07', 2),
(48, 9, 21, 2, '2023-06-08', 2),
(49, 9, 13, 2, '2023-06-08', 2),
(50, 9, 25, 2, '2023-06-08', 2),
(51, 10, 19, 2, '2023-07-09', 2),
(52, 10, 21, 2, '2023-07-09', 2),
(53, 10, 29, 2, '2023-07-09', 2),
(54, 10, 0, 0, '2023-07-09', 2),
(63, 8, 15, 2, '2023-05-07', 2),
(64, 6, 0, 0, '2022-03-05', 1),
(65, 11, 32, 1, '2023-08-10', 2),
(66, 11, 29, 3, '2023-08-10', 2),
(67, 12, 26, 4, '2023-09-11', 2),
(68, 13, 29, 4, '2023-10-12', 2),
(69, 14, 32, 4, '2022-01-01', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `biaya_pengeluaran` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `id_barang`, `id_supplier`, `tanggal_masuk`, `jumlah_masuk`, `biaya_pengeluaran`, `keterangan`) VALUES
(1, 2, 5, '2022-09-05', 2, 300000, ''),
(2, 3, 3, '2022-05-04', 1, 30000, ''),
(3, 7, 1, '2022-01-03', 1, 20000, ''),
(4, 5, 2, '2022-03-07', 2, 150000, ''),
(5, 9, 4, '2022-07-10', 1, 100000, ''),
(6, 2, 5, '2022-10-14', 1, 150000, ''),
(7, 3, 3, '2022-06-16', 5, 150000, ''),
(8, 5, 2, '2022-04-18', 2, 150000, ''),
(9, 7, 1, '2022-02-20', 1, 20000, ''),
(10, 9, 4, '2022-08-25', 2, 200000, ''),
(14, 8, 1, '2023-01-03', 3, 60000, ''),
(15, 8, 1, '2023-02-18', 2, 40000, ''),
(16, 6, 2, '2023-03-28', 3, 225000, ''),
(17, 6, 2, '2023-04-09', 1, 75000, ''),
(18, 4, 3, '2023-06-09', 3, 90000, ''),
(19, 4, 3, '2023-07-11', 5, 150000, ''),
(20, 10, 4, '2023-09-16', 3, 300000, ''),
(21, 10, 4, '2023-10-14', 1, 100000, ''),
(22, 1, 5, '2023-11-28', 1, 150000, ''),
(23, 1, 5, '2023-12-30', 2, 300000, ''),
(25, 2, 5, '2022-11-11', 1, 150000, ''),
(26, 2, 5, '2022-12-12', 3, 450000, ''),
(27, 6, 2, '2023-05-28', 1, 75000, ''),
(28, 4, 3, '2023-08-23', 1, 30000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` int(11) NOT NULL,
  `nama_cabang` varchar(100) NOT NULL,
  `alamat_cabang` text NOT NULL,
  `no_hp_cabang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `nama_cabang`, `alamat_cabang`, `no_hp_cabang`) VALUES
(1, 'Banjarbaru', 'Jl. Karang Anyar 1, Loktabat Utara, Kec. Banjarbaru Utara, Kota Banjar Baru, Kalimantan Selatan 70714', '082169612018'),
(2, 'Banjarmasin', 'Jl. Sungai Baru, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70236', '081334905453');

-- --------------------------------------------------------

--
-- Struktur dari tabel `complement_karyawan`
--

CREATE TABLE `complement_karyawan` (
  `id_complement_karyawan` int(11) NOT NULL,
  `id_menu_makanan` varchar(50) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `jumlah_ambil` int(11) NOT NULL,
  `tanggal_ambil` date NOT NULL,
  `id_menu_makanan1` int(11) NOT NULL,
  `id_menu_makanan2` int(11) NOT NULL,
  `id_menu_makanan3` int(11) NOT NULL,
  `jumlah_ambil1` int(11) NOT NULL,
  `jumlah_ambil2` int(11) NOT NULL,
  `jumlah_ambil3` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `complement_karyawan`
--

INSERT INTO `complement_karyawan` (`id_complement_karyawan`, `id_menu_makanan`, `id_cabang`, `jumlah_ambil`, `tanggal_ambil`, `id_menu_makanan1`, `id_menu_makanan2`, `id_menu_makanan3`, `jumlah_ambil1`, `jumlah_ambil2`, `jumlah_ambil3`, `keterangan`, `total`) VALUES
(1, '6', 0, 3, '2023-02-02', 10, 0, 0, 1, 0, 0, '', 57000),
(2, '19', 0, 1, '2023-02-02', 0, 0, 0, 0, 0, 0, '', 10000),
(5, '29', 1, 4, '2022-02-04', 0, 0, 0, 0, 0, 0, '', 88000),
(6, '17', 1, 4, '2022-03-05', 10, 0, 0, 1, 0, 0, '', 75000),
(7, '15', 1, 5, '2022-04-06', 0, 0, 0, 0, 0, 0, '', 75000),
(8, '23', 2, 2, '2023-05-07', 15, 0, 0, 2, 0, 0, '', 80000),
(9, '21', 2, 2, '2023-06-08', 13, 25, 0, 2, 2, 0, '', 72000),
(10, '19', 2, 2, '2023-07-09', 21, 29, 0, 2, 2, 0, '', 72000),
(11, '32', 2, 1, '2023-08-10', 29, 0, 0, 3, 0, 0, '', 88000),
(12, '26', 2, 4, '2023-09-11', 0, 0, 0, 0, 0, 0, '', 80000),
(13, '29', 2, 4, '2023-10-12', 0, 0, 0, 0, 0, 0, '', 88000),
(14, '32', 1, 4, '2022-01-01', 0, 0, 0, 0, 0, 0, '', 88000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `kode_konsumen` varchar(50) NOT NULL,
  `nama_konsumen` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `kode_konsumen`, `nama_konsumen`, `alamat`, `no_hp`, `password`, `tanggal_lahir`) VALUES
(1, 'K001', 'Anonim', '', '', '', '0000-00-00'),
(2, 'K002', 'Meri Mardianti', 'Jalan Pangeran Antasari no.120b ', '08972832418', '$2y$10$rLQw2M3cYN80JYgEGk1Lv.e0hUkMUV9QJgcgAPwJM8Fh5kCEwyCN.', '1992-05-28'),
(3, 'K003', 'Baihaki', 'Jl Teluk Tiram', '08123456777', '$2y$10$n5UvVKGi8MgKmNEaM8nPYu5Z903md0TTOwrfidTyzVhgvJAFUJxCC', '1998-05-31'),
(4, 'K004', 'Naufal Amauri Athalla', 'Komp. Berlina Jaya Pemai no.05 ', '085820672045', '$2y$10$JxenHDZnimUZbiUQzRNB4eJBygxIRufSR817IbrmLJ14Z.iXiEXdm', '1995-12-19'),
(5, 'K005', 'Nadhira Ayudia Aisyah', 'Jalan Junjung Buih no.50 rt/w : 01/03', '083143650034', '$2y$10$TF7j4La6Ytc743UpcerTS.wLEzMG.hPFY.Wl0z8/PJsOsCikM6/iK', '2000-10-10'),
(6, 'K006', 'Riki Andi Destian ', 'Komp. Kiara Condong rt/w : 11/05', '081289489024', '$2y$10$1vAF8I0O./E7547GWpd4P.Fo/0KRnRw/E8M1wJo82NukIZ2BneGau', '2001-01-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_makanan`
--

CREATE TABLE `menu_makanan` (
  `id_menu_makanan` int(11) NOT NULL,
  `kode_menu` varchar(40) NOT NULL,
  `nama_menu` text NOT NULL,
  `harga` int(11) NOT NULL,
  `harga_ppn` int(11) NOT NULL,
  `foto_makanan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu_makanan`
--

INSERT INTO `menu_makanan` (`id_menu_makanan`, `kode_menu`, `nama_menu`, `harga`, `harga_ppn`, `foto_makanan`) VALUES
(2, '102', 'Fried Chicken Paha Bawah / Sayap', 12000, 0, '8a55b71fa9c7b77195f1aa6c101d7221.png'),
(3, '103', 'Fried Chicken Paha Atas / Dada', 15000, 0, '68c3afda31b351012fffedeb5e17a505.png'),
(6, '104', 'Ayam Geprek Paha Bawah / Sayap', 14000, 0, 'c8f8841b41bd52dfd92fbeb16400cf18.png'),
(8, '105', 'Ayam Geprek Paha Atas / Dada', 17000, 0, 'b3c33328fa790a3b8e7f02cbdaaac825.png'),
(9, '201', 'Nasi Goreng Spesial', 18000, 0, '100764a64c564320d659b089cd206f11.png'),
(10, '202', 'Mie Goreng Spesial', 15000, 0, '6c82de2dc9250c01aaa41e02d486908a.png'),
(11, '203', 'Kwetiaw Goreng Spesial', 17000, 0, '6f0f1457660bf905f8c9dfe7a547aac0.png'),
(12, '301', 'Chicken Steak', 16000, 0, '317d31ab432783a5a0f6520d25846fb5.png'),
(13, '302', 'Chicken Strip', 15000, 0, '9e2f4066b2eb2d348e12606386beb95b.png'),
(14, '303', 'Chicken Cheese Burger', 17000, 0, '089462648b6268719464fd9d2fa82c97.png'),
(15, '304', 'Chicken Teriyaki (Include Nasi)', 15000, 0, 'ef1dfc774c2e14bf5fa1a9add591e8ca.png'),
(16, '401', 'Terong Crispy', 5000, 0, '0e5f24fd02469065ac2e2bb31ed6d2de.png'),
(17, '402', 'Lele Crispy (include nasi)', 15000, 0, 'e3c9ebdda3b8f34131da4fc62821d352.png'),
(18, '403', 'Jamur Crispy', 10000, 0, 'df603c0b6246ad14d13d1f964f5b92a9.png'),
(19, '404', 'Tahu Crispy', 10000, 0, 'eb3fe255b4adaa88ab7283f3b8a3184e.png'),
(20, '501', 'Original / Crispy Saus Kurma', 17000, 0, '7541c09ef419ccfa043dff545e2abcd8.png'),
(21, '502', 'Nasi', 4000, 0, 'b54f8b4092cf3afb60962983799499cb.jpg'),
(22, '503', 'Onion Ring', 8000, 0, '9fbdda1b27e29f633eee2d658a818e0a.png'),
(23, '504', 'Ayam Penyet (include nasi)', 25000, 0, '971bc73eaaa0558536c62de8a14c79a1.png'),
(24, '505', 'Perkedel', 5000, 0, 'd297cb8f24644e691d21e8dfef1a148a.png'),
(25, '901', 'Paket Super Hemat 1 (Fried Chicken Sayap/Paha Bawah + Nasi + Es Teh)', 17000, 0, '6663b0ec8d1c12e41824b8245e9bd3f7.png'),
(26, '902', 'Paket Super Hemat 2 (Fried Chicken Dada/Paha Atas + Nasi + Es Teh)', 20000, 0, '13cd6435a626bc096ad82a7cd57d3213.png'),
(27, '903', 'Paket Super Hemat 3 (Ayam Geprek Sayap/Paha Bawah + Nasi + Es Teh)', 20000, 0, '24f5a0b3adc9e92e5f33cd28e8f9b732.png'),
(28, '904', 'Paket Super Hemat 4 (Ayam Geprek Dada/Paha Atas + Nasi + Es Teh)', 25000, 0, 'efe6ee530071011c233b327dcd6fc3f0.png'),
(29, '905', 'Paket Super Hemat 5 (Ayam Geprek Dada Tanpa Tulang + Nasi + Es Teh)', 22000, 0, '79e939e5465a8c691c0c0f80de8c36ad.png'),
(30, '906', 'Paket Anak Sholeh 1 (Nasi + Paha Bawah + Milo)', 21000, 0, '44975ea95a6182224f04d6ab35144c0e.png'),
(31, '907', 'Paket Anak Sholeh 2 (Nasi Goreng Sayap + Milo)', 25000, 0, '6aaa5a31d9938f794365c336c35e7293.png'),
(32, '908', 'Paket Anak Sholeh 3 (Chicken Cheese Burger + Milo)', 22000, 0, 'db2c5d5248d35ea900612236d8ec15db.png'),
(33, '909', 'Paket Palestina 1 (Chicken Steak + Nasi + Teh Botol)', 25000, 0, '9c6d880aa4dd4569280794781e39a498.png'),
(34, '910', 'Paket Palestina 2 (Chicken Steak + Kentang + Teh Botol)', 23000, 0, 'ffd07bfc88b8fea957682854f062ce78.png'),
(35, '701', 'Teh Panas/Es', 4000, 0, '56c8d3fc88c43d9c54ceaefc21cdcbf1.png'),
(36, '702', 'Jeruk Panas/Es ', 6000, 0, '772517c79b1e40e525a377f14a75aacf.png'),
(37, '703', 'Teh Botol/Tebs/Fruit Tea', 6000, 0, 'ebea6af70810ab8c2ac9d357ec8b8ffe.png'),
(38, '704', 'Air Mineral Botol', 5000, 0, 'bb410cc536ee7f866887f0479db0face.png'),
(39, '705', 'Lemon tea Panas/Es', 6000, 0, '19197a86d7aba6cad6edc0a8099e6109.png'),
(40, '706', 'Milo Panas/Es ', 9000, 0, '0a646bc4301b3c38a2f7b61b2a694663.png'),
(41, '707', 'Cappucino Panas/Es', 10000, 0, '434aaa4866688e673cdde69f2e3b1d94.png'),
(42, '708', 'Milkshake (Cokelat/Vanilla/Strawberry)', 12000, 0, '19da76dc35508a7d7a982bc06773334d.png'),
(43, '709', 'Ice Cream', 4000, 0, '45069d9d35c39616af92a7f279e12171.png'),
(44, '710', 'Aneka Jus', 15000, 0, '7c6cd7de38018a8083124c06d13e9b76.png'),
(45, '801', 'French Fries', 10000, 0, 'ac6d3e77a9aaa5ddb4480c7ce33b566e.png'),
(46, '802', 'Ayam Bersaus', 18000, 0, '39399b02d4642fe13b2129f314c8b70b.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `nomor_hp` text NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `id_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `nomor_hp`, `jabatan`, `id_cabang`) VALUES
(1, 'Dea Nita Ariani', 'Banjarbaru', '1999-12-05', 'Perempuan', '+62 895-7007-16413', 'Supervisor', 2),
(2, 'Akhmad Khusyairi', 'Astambul', '2000-09-13', 'Laki-Laki', '+62 858-4952-8706', 'Supervisor', 1),
(3, 'Jamalludin', 'Kandangan', '1999-06-27', 'Laki-Laki', '+62 857-1532-2693', 'Cook', 1),
(6, 'Fadli Rahman', 'Pingaran', '1999-01-29', 'Laki-Laki', '+62 888-0410-2698', 'Cook', 1),
(7, 'Fajri', 'Martapura', '2000-10-07', 'Laki-Laki', '+62 831-5172-8482', 'Cook', 1),
(8, 'M. Faishal Ali', 'Kalampaian', '2001-11-05', 'Laki-Laki', '+62 816-4978-0966', 'Dishwasher', 1),
(9, 'M. Noor', 'Martapura', '2000-12-30', 'Laki-Laki', '+62 857-0978-2691', 'Dishwasher', 2),
(10, 'Rasita', 'Cindai Alus', '2000-09-23', 'Perempuan', '+62 851-7209-2309', 'Kasir', 2),
(11, 'Norkamalia', 'Kalampaian Ulu', '2000-08-20', 'Perempuan', '+62 895-3385-42781', 'Kasir', 2),
(12, 'Anastasya Octavianti', 'Bandung', '2000-10-14', 'Perempuan', '+62 858-2067-2045', 'Kasir', 1),
(13, 'Dhea', 'Banjarbaru', '2003-04-05', 'Perempuan', '+62 877-7978-5146', 'Server Waitress', 2),
(14, 'Nor Hidayati', 'Martapura', '2001-03-01', 'Perempuan', '+62 821-5212-3417', 'Server Waitress', 2),
(15, 'Betiani', 'Panarukan', '2003-11-05', 'Perempuan', '+62 822-5259-4166', 'Server Waitress', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `nama_pengeluaran` varchar(100) NOT NULL,
  `biaya_pengeluaran` int(11) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL,
  `keterangan_lain` text NOT NULL,
  `id_cabang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `nama_pengeluaran`, `biaya_pengeluaran`, `tanggal_pengeluaran`, `keterangan_lain`, `id_cabang`) VALUES
(67, 'LISTRIK', 200000, '2022-01-15', '', 1),
(68, 'PDAM', 100000, '2022-02-11', '', 1),
(69, 'ATK', 10000, '2022-03-12', '', 1),
(70, 'WIFI', 150000, '2022-04-04', '', 1),
(71, 'PAJAK', 100000, '2022-05-08', '', 1),
(72, 'LISTRIK', 200000, '2023-06-08', '', 2),
(73, 'PDAM', 100000, '2023-07-22', '', 2),
(74, 'ATK', 10000, '2023-08-13', '', 2),
(75, 'WIFI', 150000, '2023-09-05', '', 2),
(76, 'PAJAK', 100000, '2023-10-09', '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggajian`
--

CREATE TABLE `penggajian` (
  `id_penggajian` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal_penggajian` date NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `lembur` int(11) NOT NULL,
  `tunjangan` int(11) NOT NULL,
  `hutang` int(11) NOT NULL,
  `gaji_bersih` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penggajian`
--

INSERT INTO `penggajian` (`id_penggajian`, `id_pegawai`, `tanggal_penggajian`, `gaji_pokok`, `lembur`, `tunjangan`, `hutang`, `gaji_bersih`, `keterangan`) VALUES
(1, 1, '2022-01-25', 2000000, 300000, 0, 100000, 2200000, ''),
(2, 2, '2022-02-05', 2000000, 100000, 0, 0, 2100000, ''),
(3, 3, '2022-03-25', 1800000, 100000, 0, 0, 1900000, ''),
(4, 6, '2022-04-25', 1500000, 0, 100000, 0, 1600000, ''),
(5, 7, '2022-05-25', 1800000, 50000, 0, 0, 1850000, ''),
(6, 8, '2023-06-25', 1700000, 0, 150000, 0, 1850000, ''),
(7, 9, '2023-07-25', 1600000, 0, 50000, 0, 1650000, ''),
(8, 10, '2023-08-25', 1800000, 0, 100000, 0, 1900000, ''),
(9, 11, '2023-09-25', 1800000, 100000, 100000, 0, 2000000, ''),
(10, 12, '2023-10-25', 1700000, 0, 200000, 0, 1900000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(22) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama_lengkap`, `alamat`, `no_hp`, `level`) VALUES
(1, 'kasir', '$2y$10$tGLuQ4nGl/zX1qvoFXIV7.7iBaDhjE/a6Ka08FTepsmqjrblrI/Q2', 'Anastasya octavianti', 'Komplek shafwah al-zafri no 12.\r\nRt 03 rw 13', '085820672045', 'admin'),
(2, 'supervisor', '$2y$10$8FU6ndEriqWLqQKsGI0p0uoGZvEYVmgP5I/oNfxXJ3jRIPzSU5jwK', 'Dea Nita', 'komp permai indah', '0895700716413', 'supervisor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunaan_barang`
--

CREATE TABLE `penggunaan_barang` (
  `id_penggunaan_barang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_penggunaan` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penggunaan_barang`
--

INSERT INTO `penggunaan_barang` (`id_penggunaan_barang`, `id_barang`, `tanggal`, `jumlah_penggunaan`, `keterangan`) VALUES
(1, 2, '2022-01-03', 1, ''),
(2, 3, '2022-03-05', 3, ''),
(3, 5, '2022-05-06', 5, ''),
(4, 7, '2022-08-04', 2, ''),
(5, 9, '2022-05-10', 4, ''),
(6, 2, '2022-02-05', 2, ''),
(7, 3, '2022-04-06', 3, ''),
(8, 5, '2021-06-09', 4, ''),
(9, 7, '2022-09-10', 3, ''),
(10, 9, '2022-11-12', 5, ''),
(11, 5, '2022-07-11', 5, ''),
(12, 9, '2022-12-18', 1, ''),
(13, 1, '2023-01-13', 1, ''),
(14, 4, '2023-03-13', 3, ''),
(15, 6, '2023-05-03', 4, ''),
(16, 8, '2023-08-28', 1, ''),
(17, 10, '2023-11-19', 2, ''),
(18, 1, '2023-02-20', 3, ''),
(19, 4, '2023-04-02', 6, ''),
(20, 6, '2023-06-09', 2, ''),
(21, 8, '2023-09-18', 8, ''),
(22, 6, '2023-07-10', 3, ''),
(23, 8, '2023-10-13', 3, ''),
(24, 10, '2023-12-20', 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `alamat_penerima` text NOT NULL,
  `status_pengiriman` varchar(50) NOT NULL,
  `catatan_kurir` text NOT NULL,
  `foto_bukti_pengiriman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_penjualan`, `id_pegawai`, `tanggal_pengiriman`, `alamat_penerima`, `status_pengiriman`, `catatan_kurir`, `foto_bukti_pengiriman`) VALUES
(7, 14, 6, '2022-12-29', 'Komp. Berlina Jaya Pemai no.05 ', 'Telah Sampai', '', 'be572798fb2b5845f154cd0111038a31.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `jumlah_jual` int(11) NOT NULL,
  `tanggal_jual` date NOT NULL,
  `id_barang1` int(5) NOT NULL,
  `id_barang2` int(5) NOT NULL,
  `id_barang3` int(5) NOT NULL,
  `jumlah_jual1` int(5) NOT NULL,
  `jumlah_jual2` int(5) NOT NULL,
  `jumlah_jual3` int(5) NOT NULL,
  `total` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  `bukti_pembayaran` text NOT NULL,
  `status_pembelian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_barang`, `id_pegawai`, `id_cabang`, `jumlah_jual`, `tanggal_jual`, `id_barang1`, `id_barang2`, `id_barang3`, `jumlah_jual1`, `jumlah_jual2`, `jumlah_jual3`, `total`, `diskon`, `bayar`, `kembalian`, `id_konsumen`, `metode_pembayaran`, `bukti_pembayaran`, `status_pembelian`) VALUES
(1, 16, 11, 1, 10, '2022-01-15', 13, 13, 14, 3, 3, 20, 435000, 0, 450000, 15000, 1, '', '', ''),
(2, 17, 10, 1, 50, '2022-02-05', 36, 29, 0, 50, 100, 0, 3250000, 0, 3300000, 50000, 1, '', '', ''),
(4, 12, 14, 1, 50, '2022-03-27', 9, 35, 42, 100, 100, 100, 3000000, 0, 3000000, 0, 1, '', '', ''),
(5, 24, 13, 1, 50, '2022-04-05', 28, 0, 0, 100, 0, 0, 2750000, 0, 2800000, 50000, 1, '', '', ''),
(6, 21, 10, 1, 100, '2022-05-09', 41, 13, 0, 50, 50, 0, 1650000, 0, 1700000, 50000, 1, '', '', ''),
(7, 11, 14, 1, 3, '2022-06-30', 20, 39, 45, 3, 2, 3, 160000, 0, 200000, 40000, 1, '', '', ''),
(8, 29, 12, 1, 2, '2022-07-23', 22, 3, 46, 2, 1, 2, 139000, 0, 150000, 11000, 1, '', '', ''),
(10, 16, 11, 1, 3, '2022-08-26', 17, 21, 40, 3, 3, 3, 114000, 0, 115000, 1000, 1, '', '', ''),
(11, 6, 15, 1, 3, '2022-09-17', 21, 9, 34, 3, 5, 5, 309000, 0, 350000, 41000, 1, '', '', ''),
(12, 14, 12, 1, 5, '2022-10-14', 45, 46, 21, 3, 1, 0, 158000, 0, 170000, 12000, 1, '', '', ''),
(13, 35, 14, 1, 5, '2022-11-23', 10, 13, 27, 5, 3, 2, 180000, 0, 200000, 20000, 1, '', '', ''),
(14, 27, 1, 1, 10, '2022-12-29', 30, 34, 0, 5, 10, 0, 535000, 0, 535000, 0, 4, 'TRANSFER', '4f9e6a53bcbae12da8fcc42bebd49cfe.png', 'SELESAI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `no_hp_supplier` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `no_hp_supplier`) VALUES
(1, 'PT. Charoen Pokphand Jaya Farm Banjarmasin 1', 'Jl. Datu Insad RT.04 / RW.01, Sambangan, Bati - Bati, Sambangan, Kec. Bati Bati, Kabupaten Tanah Laut, Kalimantan Selatan 70852', '081347371047'),
(2, 'PT Ciomas Adisatwa', 'Jl. Ahmad Yani No.KM. 37, RT.01/RW.01, Ujung Baru, Kec. Bati Bati, Kabupaten Tanah Laut, Kalimantan Selatan 70852', '081345464508'),
(3, 'Gudang Minyak Goreng/Beku H.Hilman (H. Zulkifli)', 'Tlk. Tiram, Kec. Banjarmasin Bar., Kota Banjarmasin, Kalimantan Selatan 70114', '081521728225'),
(4, 'PT. Bogasari Flour Mills', 'Terminal Pelabuhan Trisakti A-101, JL. Barito Hilir, Banjarmasin, 70112, Telaga Biru, Banjarmasin Barat, Banjarmasin City, South Kalimantan 70118', '083150823263'),
(5, 'Beras Mariati', ' Jl. Kemuning, Loktabat Sel., Kec. Banjarbaru Selatan, Kota Banjar Baru, Kalimantan Selatan 70714', '081255567701');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `barang_list`
--
ALTER TABLE `barang_list`
  ADD PRIMARY KEY (`id_barang_list`);

--
-- Indeks untuk tabel `barang_list2`
--
ALTER TABLE `barang_list2`
  ADD PRIMARY KEY (`id_barang_list2`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_barang` (`id_barang`,`id_supplier`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indeks untuk tabel `complement_karyawan`
--
ALTER TABLE `complement_karyawan`
  ADD PRIMARY KEY (`id_complement_karyawan`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indeks untuk tabel `menu_makanan`
--
ALTER TABLE `menu_makanan`
  ADD PRIMARY KEY (`id_menu_makanan`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id_penggajian`),
  ADD KEY `id_karyawan` (`id_pegawai`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `penggunaan_barang`
--
ALTER TABLE `penggunaan_barang`
  ADD PRIMARY KEY (`id_penggunaan_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `barang_list`
--
ALTER TABLE `barang_list`
  MODIFY `id_barang_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT untuk tabel `barang_list2`
--
ALTER TABLE `barang_list2`
  MODIFY `id_barang_list2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `complement_karyawan`
--
ALTER TABLE `complement_karyawan`
  MODIFY `id_complement_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `menu_makanan`
--
ALTER TABLE `menu_makanan`
  MODIFY `id_menu_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `id_penggajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penggunaan_barang`
--
ALTER TABLE `penggunaan_barang`
  MODIFY `id_penggunaan_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  ADD CONSTRAINT `penggajian_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Ketidakleluasaan untuk tabel `penggunaan_barang`
--
ALTER TABLE `penggunaan_barang`
  ADD CONSTRAINT `penggunaan_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
