-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 08:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinevoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate_details`
--

CREATE TABLE `candidate_details` (
  `id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL,
  `Candidate_Name` varchar(100) NOT NULL,
  `Candidate_Details` text NOT NULL,
  `Candidate_Photo` text NOT NULL,
  `inserted_by` varchar(255) NOT NULL,
  `inserted_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_details`
--

INSERT INTO `candidate_details` (`id`, `election_id`, `Candidate_Name`, `Candidate_Details`, `Candidate_Photo`, `inserted_by`, `inserted_on`) VALUES
(1, 1, 'ABC', 'Cat', '../assets/images/candidate_photo/38357094963_41697432229olivia.png', 'sujan', '2023-03-25'),
(2, 1, 'bbc', 'two', '../assets/images/candidate_photo/94807269030_47846778327Capture1.PNG', 'sujan', '2023-03-25'),
(3, 2, 'Ram', 'three', '../assets/images/candidate_photo/71047362553_25024723135ccc.PNG', 'sujan', '2023-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `id` int(11) NOT NULL,
  `Election_Topic` varchar(50) NOT NULL,
  `No_of_Candidates` int(11) NOT NULL,
  `Starting_Date` date NOT NULL,
  `Ending_Date` date NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Inserted_By` varchar(50) NOT NULL,
  `Inserted_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `Election_Topic`, `No_of_Candidates`, `Starting_Date`, `Ending_Date`, `Status`, `Inserted_By`, `Inserted_on`) VALUES
(1, 'Football Captain', 2, '2023-03-25', '2023-03-28', 'InActive', 'sujan', '2023-03-22'),
(2, 'Cricket Coach', 2, '2023-03-24', '2023-03-31', 'InActive', 'sujan', '2023-03-22'),
(3, 'MLA', 2, '2023-03-24', '2023-03-25', 'InActive', 'sujan', '2023-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(300) NOT NULL,
  `user_role` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `mobile`, `password`, `user_role`) VALUES
(1, 'sujan', '9888', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'Admin'),
(2, 'admin', '1000', '5cb138284d431abd6a053a56625ec088bfb88912', 'Admin'),
(3, 'admin', '123', 'a056c8d05ae9ac6ca180bc991b93b7ffe37563e0', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate_details`
--
ALTER TABLE `candidate_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate_details`
--
ALTER TABLE `candidate_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
