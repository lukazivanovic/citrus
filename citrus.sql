-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2020 at 10:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citrus`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `ID` int(11) NOT NULL,
  `Email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Korisnicko_ime` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lozinka` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`ID`, `Email`, `Korisnicko_ime`, `Lozinka`) VALUES
(1, 'admin@admin.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `ID` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Ime` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`ID`, `Datum`, `Ime`, `Email`, `Text`) VALUES
(5, '2020-03-11', 'robot', 'bot@bot.com', 'testing.... 213456725');

-- --------------------------------------------------------

--
-- Table structure for table `obkomentar`
--

CREATE TABLE `obkomentar` (
  `ID` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Ime` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obkomentar`
--

INSERT INTO `obkomentar` (`ID`, `Datum`, `Ime`, `Email`, `Text`) VALUES
(3, '2020-03-11', 'Zoka', 'zok@meil.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque venenatis dapibus dolor in tristique. Sed imperdiet, magna id consequat iaculis, ipsum est pharetra nibh, ac commodo nibh elit quis nibh.'),
(4, '2020-03-11', 'BOC', 'boc@mail.com', 'ORANGE');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `ID` int(11) NOT NULL,
  `Naziv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Opis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Slika` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`ID`, `Naziv`, `Opis`, `Slika`) VALUES
(1, 'црвена поморанџа', 'Etiam vestibulum risus vel tristique bibendum. Sed interdum, ipsum sed lacinia vulputate, metus lacus consectetur magna, in euismod dolor sem.', '1583926867_7653.jpg'),
(2, 'лимун', 'Sed libero urna, blandit eu metus non, venenatis lacinia nulla. Cras enim massa, vulputate vulputate ornare eu, fringilla.', '1583926910_4854.jpg'),
(3, 'грејпфрут', 'Integer sem ipsum, vulputate sed eleifend luctus, dictum in lacus. Aliquam vel nisi aliquam, dignissim ipsum eget, vehicula turpis. Nulla dolor est.', '1583927066_8121.jpg'),
(4, 'лимета', 'Donec finibus tellus odio, quis bibendum nisl hendrerit eu. Fusce id rhoncus diam. Vestibulum sed auctor dolor. Nullam eu cursus turpis. Cras congue finibus eros faucibus.', '1583927097_5349.jpg'),
(5, 'мандарина', 'Quisque egestas elementum leo, vitae vehicula arcu consequat eu. Morbi laoreet pellentesque varius. Mauris turpis dolor, consequat ac auctor ultricies, consequat et sem. Pellentesque mauris dolor.', '1583927133_1127.jpg'),
(6, 'наранџа', 'Curabitur quis efficitur nunc, et ullamcorper mauris. Proin sed libero sed massa consectetur gravida. Quisque lacinia elementum augue sit amet congue. Pellentesque quis est libero. Nunc eros neque, lacinia eget.', '1583927161_6549.jpg'),
(7, 'помело', 'Aenean eleifend placerat est congue luctus. Mauris in felis quis risus ultricies sagittis a accumsan.', '1583927197_1808.jpg'),
(8, 'цитрон', 'Nulla accumsan feugiat tempus. Maecenas elementum, felis sit amet dapibus interdum, turpis.', '1583927228_4907.jpg'),
(9, 'кумкват', 'Ut consectetur sapien quis mollis finibus. Quisque imperdiet diam at eleifend sagittis. Vestibulum.', '1583927259_8573.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `obkomentar`
--
ALTER TABLE `obkomentar`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `obkomentar`
--
ALTER TABLE `obkomentar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
