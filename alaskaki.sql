-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jan 2021 pada 10.29
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
-- Database: `alaskaki`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `stok` int(5) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `brand`, `harga`, `ukuran`, `stok`, `gambar`) VALUES
(1, 'Sepatu Compass Gazelle Low', 'Sepatu Compass Gazelle Low Warna Hitam', 'Sepatu Vulcanized', ' Compass', 298000, 40, 8, 'sepatu compass gazzele low.jpg'),
(8, 'Sepatu Nah Project Coraggio Astro', 'Sepatu Nah Project Coraggio Astro Running', 'Sepatu Running', 'Nah Project', 405000, 42, 10, 'nah_red_runner.jpg'),
(11, 'Sepatu Ventela Public Black White ', 'Sepatu Ventela Public Black White Low Vulcanized', 'Sepatu Vulcanized', 'Ventela', 350000, 39, 9, 'vtl_bw_low.jpg'),
(13, 'Sepatu Warior Neo Sparta Low', 'Sepatu Warior Neo Sparta Vulcanized Low White Gum', 'Sepatu Vulcanized', 'Warior', 240000, 42, 2, 'WARRIOR-NEO-SPARTA-low-lc-putih-white-GUM-1.jpg'),
(15, 'Sepatu Geoff Max Low', 'Sepatu Geoff Max Low Slip On', 'Sepatu Slip On', 'Geoff Max', 400000, 38, 4, '7198503_51c8bfac-5b24-49da-9786-5f15b52a3450_637_637.jpg'),
(21, 'Sepatu FYC Dwarf Turqoise', 'Sepatu FYC Dwarf Turqoise Slip On', 'Sepatu Slip On', 'Forever Young Crew', 405000, 43, 12, 'fyc_slip_on_blue2.jpg'),
(22, 'Sepatu DBL Yellow', 'Sepatu DBL  Basket Yellow Olahraga High', 'Sepatu Olahraga', 'DBL', 250000, 43, 5, 'AZA_DBL_fundamental_Yellow_2_720x.jpg'),
(24, 'Sepatu Compass Gazelle Hi Vintage', 'Sepatu Compass Gazelle Hi Vintage Low Green', 'Sepatu Vulcanized', 'Compass', 498000, 43, 12, 'WEB-FOTO-VINTAGE-PRODUK-GREEN-HI.jpg'),
(25, 'Sepatu Compass R&D', 'Sepatu Compass R&D Low', 'Sepatu Vulcanized', 'Compass', 408000, 42, 5, '1.jpg'),
(26, 'Sepatu DBL Azza Fundamental', 'Sepatu DBL Azza Fundamental Hi', 'Sepatu Olahraga', 'DBL', 375000, 41, 25, 'AZA_DBL_fundamental_Blue_1_800x.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekening`
--

CREATE TABLE `tb_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(25) NOT NULL,
  `no_rek` varchar(25) NOT NULL,
  `atas_nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rekening`
--

INSERT INTO `tb_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BRI', '3546-4746-8474-8748', 'Mochamad Hafizi'),
(2, 'BCA', '546-232-546-545', 'Mochamad Hafizi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rinci_transaksi`
--

CREATE TABLE `tb_rinci_transaksi` (
  `id_rinci` int(11) NOT NULL,
  `no_order` varchar(25) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rinci_transaksi`
--

INSERT INTO `tb_rinci_transaksi` (`id_rinci`, `no_order`, `id_brg`, `qty`) VALUES
(2, '20210110H7VDAS0G', 0, 1),
(3, '20210110H7VDAS0G', 6, 1),
(4, '20210110H7VDAS0G', 0, 1),
(5, '20210110H7VDAS0G', 0, 1),
(6, '20210110WBXDI5U6', 6, 2),
(7, '20210110WBXDI5U6', 9, 1),
(8, '20210110WBXDI5U6', 0, 2),
(9, '20210110DHPFYNBD', 0, 1),
(10, '20210110DHPFYNBD', 3, 1),
(11, '20210110DHPFYNBD', 9, 1),
(12, '202101101QYFEDKX', 9, 1),
(13, '20210110Q9AJMAYQ', 0, 1),
(14, '20210110STQZDGFW', 0, 1),
(15, '20210110RCJIJUMA', 0, 1),
(16, '20210110RCJIJUMA', 6, 1),
(17, '20210110QUPUCKCR', 6, 1),
(18, '20210110QUPUCKCR', 3, 1),
(19, '20210110QUPUCKCR', 0, 1),
(20, '20210110EVSNHTDT', 0, 1),
(21, '20210110TCSJHNXH', 0, 1),
(22, '20210110TCSJHNXH', 0, 1),
(23, '20210110TCSJHNXH', 9, 1),
(24, '20210111KV9E8ZDP', 0, 1),
(25, '20210112VU0MWJW8', 1, 1),
(26, '20210112VU0MWJW8', 4, 1),
(27, '202101121HAZ9UXE', 0, 1),
(28, '202101121HAZ9UXE', 4, 1),
(29, '202101121HAZ9UXE', 1, 1),
(30, '20210112WARHOHDJ', 6, 1),
(31, '20210115VGLUYM78', 0, 1),
(32, '20210115VGLUYM78', 6, 1),
(33, '20210115VGLUYM78', 4, 1),
(34, '20210115VGLUYM78', 1, 1),
(35, '20210119C8S1JG2T', 9, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(200) NOT NULL,
  `lokasi` int(5) NOT NULL,
  `alamat_toko` text NOT NULL,
  `no_telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_setting`
--

INSERT INTO `tb_setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `no_telepon`) VALUES
(1, 'toko alaskaki', 256, 'jl.Durian No.7, Kota Malang', '083826543765');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_order` varchar(25) NOT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_penerima` varchar(50) DEFAULT NULL,
  `provinsi` varchar(70) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(50) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `expedisi` varchar(200) DEFAULT NULL,
  `paket` varchar(200) DEFAULT NULL,
  `estimasi` varchar(200) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_bayar` int(1) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL,
  `no_resi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `no_order`, `tgl_order`, `nama_penerima`, `provinsi`, `kota`, `alamat`, `kode_pos`, `no_telepon`, `expedisi`, `paket`, `estimasi`, `ongkir`, `grand_total`, `total_bayar`, `status_bayar`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `no_resi`) VALUES
(17, '20210112WARHOHDJ', '2021-01-12', 'Hafizi', 'DKI Jakarta', 'Jakarta Timur', 'JL.Delima No. 7 ', '65392', '089076573546', 'jne', 'OKE', '2-3', 0, 350000, 362000, 1, 'BRIVA-undiksha-melalui-ATM-bukti-pembayaran-1511.jpg', 'Hafizi', 'BRI', '4657-4876-0098-3345', 3, 'MLG56735375327'),
(18, '20210115VGLUYM78', '2021-01-15', 'Mochamad Hafizi', 'Jawa Barat', 'Depok', 'Jalan Imam Bonjol No. 20 ', '65392', '089076573546', 'pos', 'Paket Kilat Khusus', '1-2 HARI', 0, 1521000, 1535000, 1, 'BRIVA-undiksha-melalui-ATM-bukti-pembayaran-153.jpg', 'Hafizi', 'BCA', '4657-4876-0098-3345', 3, 'MLG7Y74384334'),
(19, '20210119C8S1JG2T', '2021-01-19', 'Jiron', 'Jawa Timur', 'Lumajang', 'Jalan Imam Bonjol No. 20 ', '67896', '089076573546', 'pos', 'Express Next Day Barang', '1 HARI', 0, 400000, 413000, 0, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', '123', '1'),
(2, 'user', 'hafizi', 'hafizi', '2'),
(3, 'Mohazi', 'Mohazi', '666', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indeks untuk tabel `tb_rinci_transaksi`
--
ALTER TABLE `tb_rinci_transaksi`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indeks untuk tabel `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tb_rekening`
--
ALTER TABLE `tb_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_rinci_transaksi`
--
ALTER TABLE `tb_rinci_transaksi`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
