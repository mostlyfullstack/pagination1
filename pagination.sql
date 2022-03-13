-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2019 at 09:42 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pagination`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `details` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `name`, `details`) VALUES
(1, 'first', 'demo details'),
(2, 'Nevine', 'lorem 4234'),
(3, 'Oluwarotimi', 'wqerwrewr'),
(4, 'Dharshani', '324234dwe'),
(5, 'Arumugam', 'werwe'),
(6, 'Yvenide', '2342dfrer'),
(7, 'Praveen', '424efrerer'),
(8, 'Meaghan', '124432fdgd'),
(9, 'Alessia', '32423dsfds'),
(10, 'Cassidee', '423dfsdf'),
(11, 'Cavazos', '3sdfdssf'),
(12, 'Fabrizio', '2134dfdsf'),
(13, 'Cedrone', '34342ed'),
(14, 'Rahul', 'sdfsxvxcv'),
(15, 'Chiem', 'dadsd'),
(16, 'Evander', '3424ddwer'),
(17, 'Vasudha', 'werwe'),
(18, 'Duggirala', 'werwedsfdfg'),
(19, 'Karen', '234fdfsf'),
(20, 'Gleichauf', 'q4r324df'),
(21, 'Karla', '234234'),
(22, 'Magdalena', '567hjjghj'),
(23, 'Gonzalez', 'qerqfdsf'),
(24, 'Boyeong', 'ewrwer evewr'),
(25, 'Nguyen', '1234 v234234'),
(26, 'Genierose', '4v 234234234'),
(27, 'Gurkiran', 'ad vqewrwer'),
(28, 'Onyinyechukwuka', 'cqwerwer'),
(29, 'Dianelys', ' asdasd asd aasd sasdasd'),
(30, 'Sindura', ' daqdewerwer'),
(31, 'Ravichandran', 'qeqe qeqwe'),
(32, 'Rob', ' adasdsasdsas asd asd'),
(33, 'Arthur', ' dadasdsfs sdfs df'),
(34, 'Schopenhauer', ' arwerwe wer wwer wer'),
(35, 'Chanel', 'aada asdasd 234rewr werwer'),
(36, 'Erika', ' qeq4234 234234 234234'),
(37, 'Shyamalan', ' qweqweqw qweqw qweqwe'),
(38, 'Jon', ' eqeqwe qwe qweq q'),
(39, 'Stormonth', ' qweqe qwe qwe qwewq'),
(40, 'Valenzuela', 'dter erterbhfg  gh'),
(41, 'Corinne', '4 fdgtdeg dfgd fg'),
(42, 'Bozhena', 'rty trtrygh ghjghj'),
(43, 'Zoritch', 'tyu y tyutyu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
