-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2018 at 03:58 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_theodora_patkos_php_car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(12) NOT NULL,
  `category` varchar(10) DEFAULT NULL,
  `make` varchar(25) DEFAULT NULL,
  `model` varchar(25) DEFAULT NULL,
  `location` varchar(150) DEFAULT NULL,
  `pick_up` int(10) DEFAULT NULL,
  `drop_off` int(10) DEFAULT NULL,
  `gps_lat` varchar(50) DEFAULT NULL,
  `gps_long` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `category`, `make`, `model`, `location`, `pick_up`, `drop_off`, `gps_lat`, `gps_long`) VALUES
(1, 'A', 'Jeep', 'Cherokee', 'Juchgasse 2', 5, 4, '48.210033', '16.363449'),
(2, 'B', 'Renault', 'Modus', 'Kagranerbrücke 44', 2, 2, '48.210033', '16.363449'),
(3, 'C', 'Fiat', 'Punto', 'Hadekgasse 12', 1, 1, '48.210033', '16.363449'),
(4, 'D', 'Kia', 'Tengo', 'Raningergasse 12', 4, 1, '48.210033', '16.363449'),
(5, 'B', 'Hyundai', 'Elantra', 'Tendergasse 19', 4, 4, '48.210033', '16.363449'),
(6, 'A', 'Audi', 'Q3', 'Kaltenbrunngasse 190', 6, 6, '47.076668', '15.421371	'),
(7, 'A', 'Jaguar', 'Miaori', 'Calaminusweg 50', 5, 5, '48.30639', '14.28611');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `id` int(11) NOT NULL,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zip` int(10) DEFAULT NULL,
  `telephone` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`id`, `street`, `city`, `zip`, `telephone`) VALUES
(1, 'Landstrasse Hauptstrasse 22', 'Vienna', 1030, 15834597),
(2, 'Opernring 5', 'Vienna', 1010, 17894564),
(3, 'Favoritenstrasse 10', 'Vienna', 1100, 19876734),
(4, 'Mariahilferstrasse 320', 'Vienna', 1150, 17964354),
(5, 'Hauptstrasse 22', 'Graz', 8010, 28468446),
(6, 'Wienerstrasse 2', 'Linz', 4020, 34896415);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `userlastname` varchar(30) NOT NULL,
  `useremail` varchar(60) NOT NULL,
  `userpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `userlastname`, `useremail`, `userpass`) VALUES
(4, 'theo', 'patkos', 'tpatkos@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(5, 'ginger', 'rodgers', 'rodgers@test.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(6, 'iris', 'brachi', 'iris@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(7, 'test', 'test', 'test@test.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(8, 'jane', 'mary', 'jane@gmail.com', '127db9b51a69030a60393545185db44c7a2cbfbb95d6c2f521ec77c8ab279e0f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `pick_up` (`pick_up`),
  ADD KEY `drop_off` (`drop_off`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `useremail` (`useremail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`pick_up`) REFERENCES `office` (`id`),
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`drop_off`) REFERENCES `office` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
