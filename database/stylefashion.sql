-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 04:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stylefashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm_account`
--

CREATE TABLE `adm_account` (
  `id_adm` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm_account`
--

INSERT INTO `adm_account` (`id_adm`, `username`, `password`, `foto`) VALUES
(1, 'andiari', 'admin1123', 'andiari.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `no_hp` int(20) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_user`, `product`, `penerima`, `no_hp`, `alamat`) VALUES
(2, 4, 10, 'Andi Ari Wardana', 2147483647, 'Jl. Pelita IV Kel. Sambutan'),
(3, 5, 9, 'Ahmad', 812345252, 'Jl. Kemakmuran'),
(4, 4, 11, 'Andi Ari Wardana', 82132132, 'Jl. Pelita IV Kel. Sambutan'),
(5, 5, 12, 'Andi Ari Wardana', 81232313, 'Jl. Pelita IV Kel. Sambutan'),
(6, 5, 6, 'Andi Ari Wardana', 812437848, 'Jl. Pelita IV Kel. Sambutan'),
(7, 6, 14, 'Ashadi', 2147483647, 'Jl. Pelita VII'),
(8, 6, 13, 'Ashadi', 882323111, 'Jl. Pelita VII');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `Deskripsi` varchar(225) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `gambar`, `nama_produk`, `harga`, `Deskripsi`, `kategori`) VALUES
(3, '479b75087540d70ca4234ecaa597e756.jpg', 'Kemeja Hitam Pria', 200000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab adipisci officia amet vitae mollitia, autem quia esse harum aperiam repellendus, quod atque quis, dignissimos quo accusantium laboriosam vero. Illum, mollitia?', 'Baju'),
(4, 'fb020d9ef48144018371fa7b94d4ac42.jpg', 'Blouse Wanita', 230000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab adipisci officia amet vitae mollitia, autem quia esse harum aperiam repellendus, quod atque quis, dignissimos quo accusantium laboriosam vero. Illum, mollitia?', 'Baju'),
(6, '17ba1dff967ac79478481e2fc88ef44e.jpg', 'Sweather dan Cardingan Wanita', 156000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab adipisci officia amet vitae mollitia, autem quia esse harum aperiam repellendus, quod atque quis, dignissimos quo accusantium laboriosam vero. Illum, mollitia?', 'Baju'),
(7, 'cd5a8a025fd8c337c71d7f1ac823afc4.jpg', 'Rok Panjang Wanita', 230000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab adipisci officia amet vitae mollitia, autem quia esse harum aperiam repellendus, quod atque quis, dignissimos quo accusantium laboriosam vero. Illum, mollitia?', 'Celana'),
(8, 'd305be2e8dcf10b6a94088146fb10e2c.jpg', 'Sweather Unisex', 90000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab adipisci officia amet vitae mollitia, autem quia esse harum aperiam repellendus, quod atque quis, dignissimos quo accusantium laboriosam vero. Illum, mollitia?', 'Baju'),
(9, '5e6852de86e8c99907cd0f445b8732c2.jpg', 'Baju atasan Bunga', 200000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab adipisci officia amet vitae mollitia, autem quia esse harum aperiam repellendus, quod atque quis, dignissimos quo accusantium laboriosam vero. Illum, mollitia?', 'Baju'),
(10, 'b7aa9e69e54407b5cd7ac30d5235ea66.jpg', 'Jaket Cudroy Pria', 120000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab adipisci officia amet vitae mollitia, autem quia esse harum aperiam repellendus, quod atque quis, dignissimos quo accusantium laboriosam vero. Illum, mollitia?', 'Baju'),
(11, 'Ventela 70S.jpeg', 'Sepatu Ventela 70S', 150000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab adipisci officia amet vitae mollitia, autem quia esse harum aperiam repellendus, quod atque quis, dignissimos quo accusantium laboriosam vero. Illum, mollitia?', 'sepatu'),
(12, 'converse allstar.jpg', 'Sepatu Konverse Alstar', 170000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab adipisci officia amet vitae mollitia, autem quia esse harum aperiam repellendus, quod atque quis, dignissimos quo accusantium laboriosam vero. Illum, mollitia?', 'sepatu'),
(13, 'sepatu kets wanita pink.jpg', 'Sepatu kets Pink', 90000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab adipisci officia amet vitae mollitia, autem quia esse harum aperiam repellendus, quod atque quis, dignissimos quo accusantium laboriosam vero. Illum, mollitia?', 'sepatu'),
(14, 'Leedo.jpeg', 'Leedo mens sport shoes', 124000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab adipisci officia amet vitae mollitia, autem quia esse harum aperiam repellendus, quod atque quis, dignissimos quo accusantium laboriosam vero. Illum, mollitia?', 'sepatu'),
(16, 'db8d4e18f60dc317783125d806c3d52d.jpg', 'Kemeja Putih Pria', 210000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab adipisci officia amet vitae mollitia, autem quia esse harum aperiam repellendus, quod atque quis, dignissimos quo accusantium laboriosam vero. Illum, mollitia?', 'Baju'),
(18, 'bd102182579632dc9d62132a13edd411.jpg', 'Jaket Kulit ', 1500000, 'Jaket kulit stylish cocok untuk kamu yang cool', 'Baju'),
(19, '7432a55e09a793550071a4d5ddb0b177.jpg', 'Kemeja Cream Wanita', 120000, 'Buat kamu yang manis tambah manis', 'Baju'),
(20, '8fcd6d2e501a60b91d02c3b65a0fd016.jpg', 'Kaos Hitam', 102000, 'Kaos hitam simple', 'Baju'),
(21, '69c26fe1a9be7b3a955315e872327838.jpg', 'Jeans wanita', 130000, 'Celana jeans stylish kekinian', 'Celana');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `username`, `password`) VALUES
(4, 'andiarivan3@gmail.com', 'Andi Ari', '$2y$10$.qtAfrtZAr0p0syeEwmjIecgDyd2rAcYZ0bxzaU2Il3Y1EwVsTS9u'),
(5, 'andiaariww@gmail.com', 'AndyZeno', '$2y$10$gTW3Uwl0QEHqfSH46VqNHuwh1bSy3VS581RWoeQ8TEcGDghsge/7S'),
(6, 'adip9927@gmail.com', 'Adi Permana', '$2y$10$8bxHN3bWvoSKZoruxRpXjOUXCh2oC1Lx.Dk.i.lfouXsPSLhthh/K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_account`
--
ALTER TABLE `adm_account`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `product` (`product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm_account`
--
ALTER TABLE `adm_account`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`product`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `pembelian_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
