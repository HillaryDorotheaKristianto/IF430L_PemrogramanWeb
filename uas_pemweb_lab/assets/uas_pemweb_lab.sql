-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 01:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_pemweb_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_user` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nomor_telepon` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jumlah_kamar` int(255) NOT NULL,
  `jumlah_orang` int(11) NOT NULL,
  `check_in` varchar(255) NOT NULL,
  `check_out` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_user`, `id_hotel`, `id_booking`, `nama_lengkap`, `nomor_telepon`, `email`, `jumlah_kamar`, `jumlah_orang`, `check_in`, `check_out`, `harga`) VALUES
(6, 2, 1, 'User User', 2147483647, 'user@gmail.com', 2, 6, '2021-06-13', '2021-06-14', 2800000);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL,
  `nama_hotel` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `harga` int(255) NOT NULL,
  `bintang` int(255) NOT NULL,
  `kamar` int(255) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `nama_hotel`, `alamat`, `telp`, `kota`, `harga`, `bintang`, `kamar`, `foto`) VALUES
(1, 'Four Points by Sheraton Batam', 'Komplek Panorama Nagoya, Jodoh River, Batu Ampar, Batam City, Riau Islands 29432', '(0778) 5708800', 'Batam', 508000, 5, 5, 'four_points.jpg'),
(2, 'Four Seasons Hotel Jakarta', 'Capital Place, Jl. Gatot Subroto No.Kav. 18, Kuningan, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12710', '(021) 22771888', 'Jakarta Selatan', 2800000, 5, 3, 'four_seasons.jpg'),
(3, 'Golden Tulip Galaxy Hotel Banjarmasin', 'Jl. A. Yani No.2, Sungai Baru, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70122', '(0511) 3277777', 'Kalimatan Selatan', 654000, 4, 2, 'golden_tulip.jpg'),
(4, 'Grand Jatra Hotel Pekanbaru', 'Jl. Tengku Zainal Abidin No.1, Kota Tinggi, Kec. Pekanbaru Kota, Kota Pekanbaru, Riau 28116', '(0761) 850888', 'Pekanbaru', 464000, 5, 10, 'grand_jatra.jpg'),
(5, 'JHL Solitaire Gading Serpong', 'Jl. Gading Serpong Boulevard, Curug Sangereng, Kec. Klp. Dua, Tangerang, Banten 15810', '(021) 39503000', 'Tangerang', 1660000, 5, 6, 'jhl_solitaire.jpg'),
(6, 'JW Marriott Hotel Surabaya', 'Jl. Embong Malang No.85-89, Kedungdoro, Kec. Tegalsari, Kota Surabaya, Jawa Timur 60261', '(031) 5458888', 'Surabaya', 1150000, 5, 1, 'jw_marriott.jpg'),
(7, 'Mercure Bandung City Centre', 'Jl. Lengkong Besar No.8, Cikawao, Kec. Lengkong, Kota Bandung, Jawa Barat 40261', '(022) 30008000', 'Bandung', 540000, 4, 12, 'mercure.jpg'),
(8, 'Novotel Lampung', 'Jl. Gatot Subroto No.136, Sukaraja, Bumi Waras, Kota Bandar Lampung, Lampung 35226', '(0721) 477999', 'Lampung', 866000, 4, 3, 'novotel.jpg'),
(9, 'Sudamala Resort Senggigi', 'Jalan Raya, Senggigi, Batu Layar, Kabupaten Lombok Barat, Nusa Tenggara Barat 83355', '(0370) 693111', 'Senggigi', 929000, 5, 4, 'sudamala.jpg'),
(10, 'Ubud Village Hotel', 'Jl. Monkey Forest, Ubud, Kecamatan Ubud, Kabupaten Gianyar, Bali 80571', '(0361) 975571', 'Bali', 885000, 3, 8, 'ubud_village.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `telp`, `birth_date`, `email`, `password`, `keterangan`, `foto`) VALUES
(5, 'Admin', 'Admin', '083471947572', '2001-03-27', 'admin@gmail.com', '$2y$10$46KZWnuYodIc0dkGMXekT.jtzBkQ3rZNPgbeTuwMQaosB6NeyMUhG', 'admin', '60c1096fad'),
(6, 'User', 'User', '082791938429', '2001-08-10', 'user@gmail.com', '$2y$10$80cfXNuNlINXokDXgMoUgOyCOUhMMJUxgqMVxMwMNxtrUIsktiT6W', 'user', '60c109bf78'),
(16, 'Hillary', 'Dorothea', '087392461382', '2002-01-31', 'thea@gmail.com', '$2y$10$lgVNnad./6d/zmPoe7egueTGkKuipPek8gVyP89buI4WqpYbdRsNy', 'user', '60c110967d1f0.png'),
(18, 'Juan', 'Alvito', '081749274326', '2001-09-14', 'juan@gmail.com', '$2y$10$DRHzWSR2izJ.0DhOXCvlR.mH7AqKqsEmcaWXfbQtIMjiBcxWn1Rni', 'admin', '60c1d83f9b0fc.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
