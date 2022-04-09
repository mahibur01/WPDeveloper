-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 08:29 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hello_rokto`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_donate_request`
--

CREATE TABLE `blood_donate_request` (
  `request_id` int(15) NOT NULL,
  `request_name` varchar(25) NOT NULL,
  `user_age` int(10) NOT NULL,
  `user_blood_group` varchar(8) NOT NULL,
  `user_address` varchar(60) NOT NULL,
  `user_mobile_no` varchar(15) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `donation_date` varchar(20) NOT NULL,
  `donation_time` varchar(15) NOT NULL,
  `user_message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blood_donate_request`
--

INSERT INTO `blood_donate_request` (`request_id`, `request_name`, `user_age`, `user_blood_group`, `user_address`, `user_mobile_no`, `user_email`, `donation_date`, `donation_time`, `user_message`) VALUES
(18, 'Mahibur Rahman Rakib', 26, 'B-', 'Jatrabari', '01776538639', 'mahibur@gmail.com', '2022-12-04', '17:00', 'Emergency Need'),
(19, 'Mahibur Rahman ', 25, 'B+', 'Dhaka', '01303531282', 'itcl201020@gmail.com', '2022-12-22', '17:06', 'Emergency'),
(20, 'Hasibur Rahman', 36, 'O+', 'Sylhet', '01756366666', 'hasib@gmail.com', '2022-02-05', '14:22', 'Pregnant '),
(21, 'Mahibur Rahman Rakib', 25, 'b+', 'Jatrabari', '017764656', 'itcl201020@gmail.com', '2021-02-22', '05:55', 'Emergency');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donor_list`
--

CREATE TABLE `blood_donor_list` (
  `donor_id` int(15) NOT NULL,
  `donor_name` varchar(20) NOT NULL,
  `donor_age` int(3) NOT NULL,
  `donor_blood_group` varchar(3) NOT NULL,
  `donor_address` varchar(80) NOT NULL,
  `donor_mobile_no` varchar(15) NOT NULL,
  `last_donation_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blood_donor_list`
--

INSERT INTO `blood_donor_list` (`donor_id`, `donor_name`, `donor_age`, `donor_blood_group`, `donor_address`, `donor_mobile_no`, `last_donation_date`) VALUES
(33, 'Mahibur Rahman Rakib', 25, 'B-', 'Dhaka', '01776538639', '2022-02-22'),
(34, 'Karim Khan', 21, 'B+', 'Sylhet', '0165656565', '2021-02-05'),
(35, 'Kashem', 32, 'O+', 'Dhaka', '01855545544', '2021-02-25'),
(36, 'Habibur Rahman', 35, 'B+', 'Dhaka', '0189999565', '2021-02-12'),
(37, 'Limon Khan', 32, 'O+', 'Dhaka', '25656565', '2021-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`) VALUES
(1, 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_donate_request`
--
ALTER TABLE `blood_donate_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `blood_donor_list`
--
ALTER TABLE `blood_donor_list`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_donate_request`
--
ALTER TABLE `blood_donate_request`
  MODIFY `request_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `blood_donor_list`
--
ALTER TABLE `blood_donor_list`
  MODIFY `donor_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
