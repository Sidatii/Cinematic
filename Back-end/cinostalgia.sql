-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 05:27 PM
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
-- Database: `cinostalgia`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `ID` int(11) NOT NULL,
  `ID_movie` int(11) DEFAULT NULL,
  `ID_room` int(11) NOT NULL,
  `ID_user` int(255) DEFAULT NULL,
  `place` int(11) DEFAULT NULL,
  `booked_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`ID`, `ID_movie`, `ID_room`, `ID_user`, `place`, `booked_at`) VALUES
(10, 2, 0, 1, 2, '2023-02-14 14:34:48'),
(11, 2, 2, 1, 2, '2023-02-14 14:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `release_date` year(4) NOT NULL,
  `broadcast_date` date DEFAULT NULL,
  `broadcast_time` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`ID`, `name`, `image`, `release_date`, `broadcast_date`, `broadcast_time`, `room_id`, `added_at`) VALUES
(15, 'Source Code', 'image.jpeg', 2011, '2023-03-08', 1, 1, '2023-02-27'),
(16, 'Dont look up', 'image.jpeg', 2022, '2023-03-08', 1, 2, '2023-02-27'),
(17, 'Limitless', 'image.jpeg', 2009, '2023-03-08', 1, 3, '2023-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`ID`, `name`) VALUES
(1, 'Alan TURING'),
(2, 'Margerit  HAMILTON'),
(3, 'Ada LOVERANCE');

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `ID` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`ID`, `time`) VALUES
(1, '20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `token`, `firstName`, `lastName`, `email`, `role`) VALUES
(1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.W3siZmlyc3ROYW1lIjoidmpoaHZqaHNkaGhoaHZ2ZHN2IiwibGFzdE5hbWUiOiJoamJzcXZzaGR2amJjaiIsImVtYWlsIjoiaGpic2NzQGpidmRzYnFqanMudm9tIn1d.9Qpkzd12IlIESXtf7WgTTP0e85Xc7xhuldPU8Dape-A', 'vjhhvjhsdhhhhvvdsv', 'hjbsqvshdvjbcj', 'hjbscs@jbvdsbqjjs.vom', 1),
(2, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.W3siZmlyc3ROYW1lIjoidmpoaHZqaHNkdnZkc3YiLCJsYXN0TmFtZSI6ImhqYnNxdnNkdmpiY2oiLCJlbWFpbCI6ImhqYnNjc0BqYnZkc2Jxcy52b20ifV0.aNthlRjV46M0oXBw9bc27BQQOFpkGDfLM80VEXuv4QA', 'vjhhvjhsdvvdsv', 'hjbsqvsdvjbcj', 'hjbscs@jbvdsbqs.vom', 1),
(3, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.W3siZmlyc3ROYW1lIjoiYW5hIiwibGFzdE5hbWUiOiJ3aHdhIiwiZW1haWwiOiJhbmFAaHdhLmNvbSJ9XQ.FNLPuLUI7z6sQ8veg370sZw5pjf66BaOgNOS9Z8xNU4', 'ana', 'whwa', 'ana@hwa.com', 1),
(4, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.W3siZmlyc3ROYW1lIjoiamhqamgiLCJsYXN0TmFtZSI6ImhqIGpoIiwiZW1haWwiOiJjcXNjc3FAY3Njc3FqIn1d.9hCQI_oN7JehoyqZhCJ_WogNI4i5tWynr7X6Ra2MGpM', 'jhjjh', 'hj jh', 'cqscsq@cscsqj', 1),
(5, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.W3siZmlyc3ROYW1lIjoidGF6aSIsImxhc3ROYW1lIjoibGhiaWIiLCJlbWFpbCI6InRhemlAaHNoaHMueGlrIn1d.9W-UzvkQREMxVKQ-tSEW8EJNmtLaAUxBOlNmUI7Aj3s', 'tazi', 'lhbib', 'tazi@hshhs.xik', 1),
(57, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.W3siZmlyc3ROYW1lIjoibmFuYSIsImxhc3ROYW1lIjoiYmFiYSIsImVtYWlsIjoic2lkYXRAZ21haWwuY29tIn1d.PWwibgCKhuBbUluXlPdJQ6mFJ3Ij0Jco2SkJ-ONmUDU', 'nana', 'baba', 'sidat@gmail.com', 1),
(58, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.W3siZmlyc3ROYW1lIjoiY2hhaGlkIiwibGFzdE5hbWUiOiIzYXlhbiIsImVtYWlsIjoic2lkaGlAZ21haWwuY29tIn1d.rZy3wD9VNqcrIfmXx686Tg7rP_0yUCjEJxYk_1NMrIo', 'chahid', '3ayan', 'sidhi@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `time` (`broadcast_time`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time` FOREIGN KEY (`broadcast_time`) REFERENCES `timeline` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
