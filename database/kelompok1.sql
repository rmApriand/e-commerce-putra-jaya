-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2025 pada 17.53
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelompok1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kode_barang` varchar(6) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `desc_barang` varchar(30) NOT NULL,
  `stok_barang` int(3) NOT NULL,
  `harga_barang` int(15) NOT NULL,
  `gambar_barang` varchar(120) NOT NULL,
  `kode_kategori` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`kode_barang`, `nama_barang`, `desc_barang`, `stok_barang`, `harga_barang`, `gambar_barang`, `kode_kategori`) VALUES
('B1234', 'Asbes', 'Kuat, kece, waterproof', 199, 58000, '1718318284_14cb6331c9d306579d4e.jpg', 2),
('B1235', 'Batu Asah', 'Asah benda tajam', 19, 29000, '1718318364_7078062a7912fc621dab.jpg', 2),
('B1236', 'Keramik', '60x60', 121, 5000, '1718318689_52bad9b10b17fb7d605a.jpg', 2),
('B1237', 'Pompa Air', '100 jam non stop', 10, 620000, '1718318780_c47c0292cb966f6ce669.jpg', 2),
('O1234', 'Batara', 'Pertisida batara 135 SL', 18, 47000, '1718317781_d3b3dcce6f8f6a2bbdc3.jpg', 1),
('O1235', 'Amon', 'Herbisida ', 40, 48000, '1718317962_07df733a0d208049b8ed.jpg', 1),
('O1236', 'Chalenger', 'Pertisida chalanger 276 SL', 13, 49000, '1718318019_012785235a457ee761a4.jpg', 1),
('O1237', 'Nuclear', 'Herbisida 240 SL', 32, 48000, '1718318086_e25f7cb0c95bc7e12c27.jpg', 1),
('O1238', 'Rajaxone', 'Herbisida 276 SL', 30, 49000, '1718318149_e62f31b38397951efa86.jpg', 1),
('O1239', 'Tuntas', 'Herbisida 300 SL', 26, 49000, '1718318218_50a5cd281bdda5dacb1f.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kode_kategori` int(3) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kode_kategori`, `nama_kategori`) VALUES
(1, 'Obat Rumput'),
(2, 'Bangunan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `kode_keranjang` int(3) NOT NULL,
  `no_order` int(3) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah_order` int(3) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_keranjang`
--

INSERT INTO `tbl_keranjang` (`kode_keranjang`, `no_order`, `kode_barang`, `jumlah_order`, `id_user`) VALUES
(1, 1, 'O1234', 1, 2),
(2, 1, 'B1234', 1, 3),
(3, 2, 'B1235', 1, 3),
(5, 2, 'O1235', 1, 2),
(6, 1, 'O1235', 1, 1),
(7, 1, 'B1234', 1, 2),
(8, 1, 'O1238', 1, 2),
(12, 2, 'O1235', 1, 3),
(13, 3, 'O1237', 3, 3),
(14, 4, 'B1236', 1, 3),
(16, 1, 'B1236', 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(3) NOT NULL,
  `nama_pembayaran` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `nama_pembayaran`) VALUES
(1, 'Cash'),
(2, 'Transfer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `kode_pesanan` int(3) NOT NULL,
  `kode_keranjang` int(3) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `id_pembayaran` int(3) NOT NULL,
  `bukti_pembayaran` varchar(50) NOT NULL,
  `status_pesanan` varchar(25) NOT NULL,
  `id_user` int(5) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`kode_pesanan`, `kode_keranjang`, `kode_barang`, `id_pembayaran`, `bukti_pembayaran`, `status_pesanan`, `id_user`, `tanggal_pemesanan`) VALUES
(1, 1, 'O1234', 1, '1722682622_4f00b12f728660581e95.jpg', 'Validasi pembayaran', 2, '2024-07-02 18:45:07'),
(2, 2, 'B1234', 2, '1721703671_96d9fef18b4d2969b78e.png', 'Telah sampai', 3, '2024-07-02 18:46:12'),
(3, 3, 'B1235', 2, 'Belum dibayar', 'Bayar terlebih dahulu', 3, '2024-07-02 18:46:12'),
(5, 5, 'O1235', 1, '1721702943_1a2dd39b0e43f2e7df74.jpg', 'Validasi pembayaran', 2, '2024-07-09 14:30:04'),
(6, 6, 'O1235', 1, '1722682604_a46796eeafcbf779fa40.jpg', 'Validasi pembayaran', 1, '2024-07-16 16:21:45'),
(7, 7, 'B1234', 2, '1721702413_78cc73d4e1864fb71dc5.jpg', 'Validasi pembayaran', 2, '2024-07-21 20:26:41'),
(8, 8, 'O1238', 2, 'Belum dibayar', 'Bayar terlebih dahulu', 2, '2024-07-21 20:26:41'),
(9, 12, 'O1235', 2, '1721708658_7c6ffeb542276e817fb8.jpg', 'Telah sampai', 3, '2024-07-23 11:23:58'),
(10, 13, 'O1237', 2, 'Belum dibayar', 'Bayar terlebih dahulu', 3, '2024-07-23 11:23:58'),
(11, 14, 'B1236', 2, 'Belum dibayar', 'Bayar terlebih dahulu', 3, '2024-07-23 11:23:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_role`
--

CREATE TABLE `tbl_role` (
  `kode_role` int(2) NOT NULL,
  `nama_role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_role`
--

INSERT INTO `tbl_role` (`kode_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(5) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat_user` varchar(100) NOT NULL,
  `no_hp_user` varchar(20) NOT NULL,
  `email_user` varchar(25) NOT NULL,
  `password_user` varchar(25) NOT NULL,
  `kode_role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `alamat_user`, `no_hp_user`, `email_user`, `password_user`, `kode_role`) VALUES
(1, 'Rama Apriando', 'Umko', '081122334455', 'rama@gmail.com', 'rama', 1),
(2, 'pelanggan1', 'Jl. Hasan Kepala Ratu No.1052, Sindang Sari', '081122334459', 'pelanggan1@gmail.com', 'pelanggan1', 2),
(3, 'pelanggan2', 'JL. Perwakilan, No. 10, Cempedak Kotabumi', '081122334457', 'pelanggan2@gmail.com', 'pelanggan2', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `kategori` (`kode_kategori`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`kode_keranjang`),
  ADD KEY `barang2` (`kode_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`kode_pesanan`),
  ADD KEY `barang4` (`kode_barang`),
  ADD KEY `pembayaran2` (`id_pembayaran`),
  ADD KEY `keranjang` (`kode_keranjang`),
  ADD KEY `user2` (`id_user`);

--
-- Indeks untuk tabel `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`kode_role`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role` (`kode_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kode_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `kode_keranjang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `kode_pesanan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `kategori` FOREIGN KEY (`kode_kategori`) REFERENCES `tbl_kategori` (`kode_kategori`);

--
-- Ketidakleluasaan untuk tabel `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD CONSTRAINT `barang2` FOREIGN KEY (`kode_barang`) REFERENCES `tbl_barang` (`kode_barang`),
  ADD CONSTRAINT `user6` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD CONSTRAINT `barang4` FOREIGN KEY (`kode_barang`) REFERENCES `tbl_barang` (`kode_barang`),
  ADD CONSTRAINT `keranjang` FOREIGN KEY (`kode_keranjang`) REFERENCES `tbl_keranjang` (`kode_keranjang`),
  ADD CONSTRAINT `pembayaran2` FOREIGN KEY (`id_pembayaran`) REFERENCES `tbl_pembayaran` (`id_pembayaran`),
  ADD CONSTRAINT `user2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `role` FOREIGN KEY (`kode_role`) REFERENCES `tbl_role` (`kode_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
