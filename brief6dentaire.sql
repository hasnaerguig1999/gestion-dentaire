-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 10:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brief6dentaire`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `reff` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `reff`) VALUES
(1, 'zouhair', 'begdar', 'hh170073');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `proff` varchar(50) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `reff` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `firstname`, `lastname`, `proff`, `age`, `reff`) VALUES
(7, 'Quo ipsam sunt offic', 'Odio qui quidem sunt', 'Proident sit verit', 45, 'QOP202245'),
(8, 'Dolorum quis non ame', 'Porro in magni volup', 'Qui molestiae qui op', 91, 'DPQ202291'),
(9, 'Atque rerum eum eu o', 'Anim non velit ut vo', 'Reprehenderit ea vel', 39, 'AAR202239'),
(10, 'Est tempora corpori', 'Assumenda officia ve', 'Cumque et beatae ab ', 86, 'EAC202286'),
(11, 'Voluptas iusto adipi', 'Enim consequuntur la', 'Cumque esse dolore r', 8, 'VEC20228'),
(12, 'Quia qui unde exerci', 'Quod ullamco perspic', 'Inventore maiores qu', 11, 'QQI202211'),
(13, 'Non qui et doloremqu', 'Nesciunt in aut aut', 'Quos velit veniam u', 41, 'NNQ202241'),
(14, 'Eligendi aut aute im', 'Architecto adipisci ', 'Consequatur laborum ', 14, 'EAC202214'),
(15, 'jsdh', 'qlsjdf', 'UT', 12, 'jqU202212'),
(16, 'ZOUHAIR', 'BEGDAR', 'Non ', 18, 'ZBN202218');

-- --------------------------------------------------------

--
-- Table structure for table `randezvous`
--

CREATE TABLE `randezvous` (
  `id` int(11) NOT NULL,
  `CRN` varchar(30) DEFAULT NULL,
  `RDV` date DEFAULT NULL,
  `reff` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `randezvous`
--

INSERT INTO `randezvous` (`id`, `CRN`, `RDV`, `reff`) VALUES
(24, '14 h à 14:30h', '2022-05-30', 'EAC202214'),
(25, '10 h à 10:30h', '2022-05-31', 'EAC202214'),
(26, '11 h à 11:30h', '2022-05-31', 'ZBN202218'),
(27, '10 h à 10:30h', '2022-05-30', 'EAC202214');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `randezvous`
--
ALTER TABLE `randezvous`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `randezvous`
--
ALTER TABLE `randezvous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
