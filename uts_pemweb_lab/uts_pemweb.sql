-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2021 pada 21.22
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_pemweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `id` int(225) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `keterangan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id`, `first_name`, `last_name`, `gender`, `birth_date`, `email`, `password`, `keterangan`) VALUES
(4, 'Hillary', 'Kristianto', 'female', '2002-01-31', 'thea@gmail.com', '$2y$10$SGVabSY9k9q8EB4t0gjbZ.0Zia9MKk610W15eeKXUOuUEZ3JohjF2', 'admin'),
(5, 'Juan', 'Alvito', 'male', '2001-09-14', 'juan@gmail.com', '$2y$10$vp99okj.6TzJVMOB97B8geCN.OrO12OdTWQEKOZX4oedKm.EES3QW', 'admin'),
(6, 'Leonardo', 'Steven', 'male', '2001-08-14', 'leo@gmail.com', '$2y$10$ueBUstggb6ytEZT4M0i5W.vEiLfzXJnCxns3FXhtar.3VrvC.hfmW', 'admin'),
(7, 'Jason', 'Haryanto', 'male', '2001-11-17', 'jason@gmail.com', '$2y$10$pele9SzyDwH5haFio116guVxxMOz0BAXlTf9i59KK4dbiGJwmUX1e', 'admin'),
(8, 'Unknown', 'User', 'male', '2021-03-22', 'user@gmail.com', '$2y$10$/URPT5qrTPQj7HM6DaKXZ.PAnoxZlBsE3vsT/QcjOILE5olarfpKa', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(1000) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `id_menu`, `nama_menu`, `qty`, `total_harga`) VALUES
(2, 8, 32, 'Sunny Side Up', 3, 96000),
(4, 8, 14, 'Hot/Iced Caramel Macchiato', 9, 288000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(225) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `harga` int(20) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` varchar(10000) DEFAULT NULL,
  `gambar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama`, `harga`, `kategori`, `deskripsi`, `gambar`) VALUES
(4, 'Avocado Toast', 32000, 'Breakfast', 'Creamy, crisp and so satisfying. It\'s a delicious and simple breakfast, snack or light meal! It\'s best consumed immediately, since the avocado browns over time.', 'avocado_toast.jpg'),
(5, 'Choco Berry Toast', 30000, 'Breakfast', 'Transformed in a sweet and cinnamony French Toast served with a drizzle of honey and Nutella.', 'choco_berry_toast.jpg'),
(6, 'Nutella Banana Toast', 35000, 'Breakfast', 'This thing is amazing and worthy of all the adjectives. Bread, banana, and homemade vegan nutella for making a delicious treat.', 'banana_nutella_toast.jpg'),
(7, 'Pretzel French Toast', 43000, 'Breakfast', 'Sweet and salty, crunchy and soft, with a melted sugar crust, this soft pretzel french toast casserole is the perfect make-ahead breakfast.', 'pretzel_french_toast.jpg'),
(8, 'Tiramisu Cake', 30000, 'Dessert', 'A coffee-flavoured Italian dessert. It is made of ladyfingers dipped in coffee.', 'tiramisu_cake.jpg'),
(9, 'Avocado Choco Cake', 30000, 'Dessert', 'Chocolate Avocado Cake with Chocolate Avocado Buttercream Frosting - delicious, moist, rich & healthier.', 'avocado_choco_cake.jpg'),
(10, 'Oreo Cheesecake', 37000, 'Dessert', 'Ssmooth, creamy, and loaded with chunks of Oreos.', 'oreo_cheesecake.jpg'),
(11, 'Cheesecake', 38000, 'Dessert', 'A sweet dessert consisting of one or more layers. The main, and thickest, layer consists of a mixture of a soft, fresh cheese (typically cottage cheese, cream cheese or ricotta), eggs, and sugar.', 'cheesecake.jpg'),
(12, 'Hot/Iced Americano', 27000, 'Coffee', 'A type of coffee drink prepared by diluting an espresso with hot or iced water, giving it a similar strength to, but different flavor from, traditionally brewed coffee.', 'americano.jpg'),
(13, 'Hot/Iced Vanilla Latte', 38000, 'Coffee', ' Made with vanilla syrup, steamed milk, and espresso.', 'vanilla_latte.jpg'),
(14, 'Hot/Iced Caramel Macchiato', 32000, 'Coffee', 'A coffee beverage; the name means stained or marked milk. Marked as in an espresso stain on the milk used. It is a play on “Espresso macchiato” which is an espresso with a drop or two of milk or cream.', 'caramel_macchiato.jpg'),
(15, 'Hot/Iced Cappucino', 36000, 'Coffee', 'An espresso-based coffee drink that originated in Italy, and is traditionally prepared with steamed milk foam. Variations of the drink involve the use of cream instead of milk, using non-dairy milks, and flavoring with cinnamon or chocolate powder.', 'cappucino.jpg'),
(16, 'Hot/Iced Chocolate', 43000, 'Non-Coffee', 'Contains 50-90% cocoa solids, cocoa butter, and sugar, whereas milk chocolate contains anywhere from 10-50% cocoa solids, cocoa butter, milk in some form, and sugar.', 'choco_drink.jpg'),
(17, 'Hot/Iced Red Velvet', 40000, 'Non-Coffee', 'A combination of rose hips, raspberry leaf, cocoa powder and beet juice blended with milk (dairy-free in this case).', 'red_velvet_drink.jpg'),
(18, 'Hot/Iced Lychee Tea', 28000, 'Non-Coffee', 'Lychee infused tea with cuts of lychee fruits giving you the scent of lychee.', 'lychee_tea.jpg'),
(19, 'Hot/Iced Lemon Tea', 26000, 'Non-Coffee', 'A low-sugar, low-calorie way to add a range of vitamins and minerals to your diet. Grating lemon zest into your tea also adds the peel\'s limonene.', 'lemon_tea.jpg'),
(32, 'Sunny Side Up', 32000, 'Breakfast', 'Egg with Toast and Avocado', 'sunny_side_up.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `account`
--
ALTER TABLE `account`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
