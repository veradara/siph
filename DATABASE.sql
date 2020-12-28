-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Nov 2020 pada 19.17
-- Versi server: 10.3.24-MariaDB-log-cll-lve
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khoiron1_siph`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL COMMENT 'Id user ya'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `created_at`, `created_by`, `status`) VALUES
(17, 23, '2020-11-10 00:24:15', 23, '0'),
(18, 23, '2020-11-11 10:23:16', 23, '0'),
(19, 23, '2020-11-11 10:36:17', 23, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart_list`
--

CREATE TABLE `cart_list` (
  `id_cart_list` int(11) NOT NULL,
  `id_cart` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cart_list`
--

INSERT INTO `cart_list` (`id_cart_list`, `id_cart`, `id_product`, `quantity`, `created_at`, `created_by`) VALUES
(30, 17, 18, 17, '2020-11-10 00:24:15', 23),
(31, 18, 18, 1, '2020-11-11 10:23:16', 23),
(32, 18, 19, 1, '2020-11-11 10:23:45', 23),
(33, 19, 21, 1, '2020-11-11 10:36:17', 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkouts`
--

CREATE TABLE `checkouts` (
  `id_checkout` int(11) NOT NULL,
  `id_cart` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `payment_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 : belum di bayar, 1 : sudah di bayar, 2 : sudah dikonfirmasi, 3 : di cancel sebelum bayar',
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `checkouts`
--

INSERT INTO `checkouts` (`id_checkout`, `id_cart`, `total_price`, `file`, `payment_status`, `updated_at`) VALUES
(9, 17, 11900000, 'IMG-20180720-WA0006.jpg', '2', '2020-11-10 00:29:01'),
(10, 18, 900000, '9_untuk_pindah_klik_G.png', '2', '2020-11-11 21:23:59'),
(11, 19, 20000, NULL, '0', '2020-11-11 10:36:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_product_categories` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `file` varchar(128) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `purchase_price` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `id_product_categories`, `name`, `quantity`, `file`, `description`, `price`, `created_at`, `updated_at`, `updated_by`, `purchase_price`) VALUES
(18, 1, 'Cake', 2, '1.jpg', '<p>cake</p>\r\n', 700000, '2020-11-10 00:09:18', '2020-11-10 00:09:18', 21, NULL),
(19, 1, 'Roti', 50, NULL, '<p>Roti keju</p>\r\n', 200000, '2020-11-10 20:42:04', '2020-11-10 20:42:04', 21, NULL),
(20, 6, 'make up', 234, '5_cara_ke2.png', '<p>make up</p>\r\n', 120000, '2020-11-11 10:31:33', '2020-11-11 10:31:33', 21, NULL),
(21, 7, 'buah mangga', 20, '6_di_rotasi_90.png', '<p>buah mangga manis</p>\r\n', 20000, '2020-11-11 10:32:51', '2020-11-11 10:32:51', 21, NULL),
(22, 6, 'make up', 50, 'c4f8593698ab563fab1e3e91b9e4d9d0.jpg', '<p>make up bisa di sesuaikan dengan keinginan pelanggan</p>\r\n', 200000, '2020-11-11 10:59:35', '2020-11-11 10:59:35', 21, NULL),
(23, 2, 'tempat cincin', 3, 'Tempat_cincin_perhiasan_seserahan_hantaran_pernikahan__mahar.jpg', '<p>hvvhvaaax</p>\r\n', 100000, '2020-11-11 11:00:47', '2020-11-11 11:00:47', 21, NULL),
(24, 2, 'parcel makanan', 30, 'index.jpg', '<p>pembeli bisa request isi parcel</p>\r\n', 200000, '2020-11-11 11:04:00', '2020-11-11 11:04:00', 21, NULL),
(25, 7, 'buah', 3, 'bc41feddc16d567046d323d4fd18b79a.jpg', '<p>buah</p>\r\n', 150000, '2020-11-11 11:05:30', '2020-11-11 11:05:30', 21, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_categories`
--

CREATE TABLE `product_categories` (
  `id_product_categories` int(11) NOT NULL,
  `name_categories` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_categories`
--

INSERT INTO `product_categories` (`id_product_categories`, `name_categories`) VALUES
(1, 'Wedding Cake'),
(2, 'Parcell'),
(6, 'Makeup & Skin Care'),
(7, 'Buah Buahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `about_us` text NOT NULL,
  `site_name` text NOT NULL,
  `description` text NOT NULL,
  `no_telpon` varchar(255) DEFAULT NULL,
  `email_setting` varchar(255) DEFAULT NULL,
  `alamat_setting` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `about_us`, `site_name`, `description`, `no_telpon`, `email_setting`, `alamat_setting`) VALUES
(1, '<p>SISTEM INFORMASI PEMESANAN HANTARAN ADALAH PLATFORM YANG FOKUS TERHADAP PORODUK HANTARAN PERNIKAHAN</p>\r\n', 'SIPH', 'SISTEM INFORMASI PEMESANAN HANTARAN', '6285643162970', 'verafauzyah@gmail.com', 'Jl. Cempaka 5 Bandung ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `user_type` enum('0','1','2') NOT NULL COMMENT '0 admin, 1 publci users',
  `active` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `birthday` date DEFAULT NULL,
  `code_activation` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `username`, `email`, `file`, `password`, `user_type`, `active`, `created_at`, `updated_at`, `fullname`, `address`, `phone`, `birthday`, `code_activation`) VALUES
(21, 'admin', 'admin.dara@gmail.com', 'admin.png', '827ccb0eea8a706c4c34a16891f84e7b', '0', '1', '0000-00-00 00:00:00', NULL, 'Dara', 'jl. jambu batu', 2147483647, '2020-11-09', NULL),
(22, 'pemilik', 'pemilik.dara@gmail.com', 'admin1.png', '827ccb0eea8a706c4c34a16891f84e7b', '2', '1', '0000-00-00 00:00:00', NULL, 'Pemilik Dara', 'jl. jambu batu', 2147483647, '2020-11-10', NULL),
(23, 'alif', 'alif@gmail.com', 'admin2.png', '827ccb0eea8a706c4c34a16891f84e7b', '1', '1', '0000-00-00 00:00:00', NULL, 'alif ilham', 'jl. jambu batu', 2147483647, '2020-11-10', '11787-099a147c0c6bcd34009896b2cc88633c'),
(24, 'syafri', 'syafri@gmail.com', 'admin3.png', '827ccb0eea8a706c4c34a16891f84e7b', '1', '1', '0000-00-00 00:00:00', NULL, 'syafri ramadhan', 'jl. jambu batu', 2147483647, '2020-11-10', '22784-9687911c620e636cda4c6b7c27f6c263'),
(25, 'neila', 'neilaaaaa@gmail.com', '', '827ccb0eea8a706c4c34a16891f84e7b', '0', '1', '0000-00-00 00:00:00', NULL, 'neila', 'jl gayam', 81234566, '2015-10-10', '1490708166-5c724eca479a6430f109ddd96bd2be1f'),
(26, 'naga', 'beruang@naga.com', '2.png', '827ccb0eea8a706c4c34a16891f84e7b', '1', '1', '0000-00-00 00:00:00', NULL, 'naga', 'jl jambu', 856565656, '2020-11-11', '561170620-def4021bc0cb91cd0bfe422d8044bc0b');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id` (`id_cart`),
  ADD KEY `id_user1` (`id_user`);

--
-- Indeks untuk tabel `cart_list`
--
ALTER TABLE `cart_list`
  ADD PRIMARY KEY (`id_cart_list`),
  ADD KEY `id_cart1` (`id_cart`);

--
-- Indeks untuk tabel `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id_checkout`),
  ADD KEY `id_cart` (`id_cart`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_product_categories` (`id_product_categories`);

--
-- Indeks untuk tabel `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id_product_categories`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `cart_list`
--
ALTER TABLE `cart_list`
  MODIFY `id_cart_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id_product_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `id_user1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`);

--
-- Ketidakleluasaan untuk tabel `cart_list`
--
ALTER TABLE `cart_list`
  ADD CONSTRAINT `id_cart1` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`);

--
-- Ketidakleluasaan untuk tabel `checkouts`
--
ALTER TABLE `checkouts`
  ADD CONSTRAINT `id_cart` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`);

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `id_product_categories` FOREIGN KEY (`id_product_categories`) REFERENCES `product_categories` (`id_product_categories`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
