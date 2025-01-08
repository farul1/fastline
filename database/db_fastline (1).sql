-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 01:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fastline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `id_payment` int(11) DEFAULT NULL,
  `selected_seats` varchar(255) DEFAULT NULL,
  `nama_penumpang` varchar(255) NOT NULL,
  `id_route` int(11) DEFAULT NULL,
  `id_penumpang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `nik`, `telephone`, `email`, `jumlah_tiket`, `id_payment`, `selected_seats`, `nama_penumpang`, `id_route`, `id_penumpang`) VALUES
(3, '08212121212121', '822212121212', 'syafarul@gmail.com', 1, 36, '5', 'farul', 2, 1),
(4, '12082323', '082257663431', 'ilman@gmail.com', 1, 37, '4', 'ilman', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id_bus` int(11) NOT NULL,
  `Bus_Name` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id_bus`, `Bus_Name`, `no_telp`) VALUES
(1, '(28)FASTLINE EXEC Agen:ALDI', '082257663431'),
(2, '(20)FASTLINE EKONOMI Agen:ILMAN', '0895620085162'),
(10, '(25)FASTLINE BISNIS Agen:RAFLI ', '0895420880007');

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE `kursi` (
  `id_kursi` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `nomor_kursi` varchar(255) NOT NULL,
  `id_payment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nama_penumpang`
--

CREATE TABLE `nama_penumpang` (
  `id_penumpang` int(11) NOT NULL,
  `nama_penumpang` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nama_penumpang`
--

INSERT INTO `nama_penumpang` (`id_penumpang`, `nama_penumpang`, `alamat`, `telephone`) VALUES
(1, 'John Doe', '123 Main St', '555-1234');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `amount` float NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` int(6) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `exp_month` varchar(20) NOT NULL,
  `exp_year` varchar(20) NOT NULL,
  `cvv` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id_payment`, `amount`, `name`, `email`, `address`, `city`, `state`, `zip_code`, `card_name`, `card_number`, `exp_month`, `exp_year`, `cvv`) VALUES
(36, 12, 'yusuf', 'syafarul@gamil.com', 'karanggayam', 'surabaya', 'wa', 12, 'sasa', '121', 'as', '12', 12),
(37, 2, 'yusuf', 'syafarul@gamil.com', 'ketintang', 'surabaya', 'indonesia', 124, 'ilman nafia', '2222535535334', 'mei', '2001', 345);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id_route` int(11) NOT NULL,
  `via_city` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time(6) NOT NULL,
  `cost` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id_route`, `via_city`, `destination`, `bus_name`, `departure_date`, `departure_time`, `cost`) VALUES
(1, 'JAKARTA', 'SURABAYA', '(28)FASTLINE EXEC', '2024-01-04', '12:00:00.000000', '650.000'),
(2, 'SURABAYA', 'JAKARTA', '(28)FASTLINE EXEC', '2024-01-06', '12:00:00.000000', '650.000'),
(3, 'SEMARANG', 'SURABAYA', '(28)FASTLINE EXEC', '2024-01-04', '19:00:00.000000', '350.000'),
(4, 'SEMARANG', 'JAKARTA', '(28)FASTLINE EXEC', '2024-01-06', '19:00:00.000000', '350.000'),
(5, 'JAKARTA ', 'SURABAYA ', '(20)FASTLINE EKONOMI', '2024-01-04', '13:00:00.000000', '450.000'),
(6, 'SURABAYA', 'JAKARTA', '(20)FASTLINE EKONOMI', '2024-01-06', '13:00:00.000000', '450.000'),
(7, 'SEMARANG', 'SURABAYA', '(20)FASTLINE EKONOMI', '2024-01-04', '17:00:00.000000', '250.000'),
(8, 'SEMARANG', 'JAKARTA', '(20)FASTLINE EKONOMI', '2024-01-06', '20:30:00.865000', '250.000'),
(9, 'JAKARTA', 'SURABAYA', '(25)FASTLINE BISNIS', '2024-01-04', '12:30:00.000000', '525.000'),
(10, 'SURABAYA', 'JAKARTA', '(25)FASTLINE BISNIS', '2024-01-06', '12:30:00.000000', '525.000'),
(11, 'SEMARANG', 'SURABAYA', '(25)FASTLINE BISNIS', '2024-01-04', '19:30:00.000000', '325.000'),
(12, 'SEMARANG	', 'JAKARTA', '(25)FASTLINE BISNIS', '2024-01-06', '19:30:00.000000', '325.000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `user_id` bigint(25) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `user_id`, `First_Name`, `Last_Name`, `username`, `email`, `password`) VALUES
(9, 1487230598946082, 'farul', 'farul', 'yusuf', 'syafarul@gamil.com', 'yusuf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_payment` (`id_payment`),
  ADD KEY `booking_ibfk_3` (`id_route`),
  ADD KEY `id_penumpang` (`id_penumpang`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`);

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`id_kursi`),
  ADD KEY `id_booking` (`id_booking`),
  ADD KEY `id_payment` (`id_payment`);

--
-- Indexes for table `nama_penumpang`
--
ALTER TABLE `nama_penumpang`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id_route`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kursi`
--
ALTER TABLE `kursi`
  MODIFY `id_kursi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nama_penumpang`
--
ALTER TABLE `nama_penumpang`
  MODIFY `id_penumpang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id_route` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_payment`) REFERENCES `payment` (`id_payment`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`id_route`) REFERENCES `route` (`id_route`),
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`id_penumpang`) REFERENCES `nama_penumpang` (`id_penumpang`);

--
-- Constraints for table `kursi`
--
ALTER TABLE `kursi`
  ADD CONSTRAINT `kursi_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id_booking`),
  ADD CONSTRAINT `kursi_ibfk_2` FOREIGN KEY (`id_payment`) REFERENCES `payment` (`id_payment`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
