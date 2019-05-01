-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 01, 2019 at 12:12 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `voter`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `lga` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `npp` varchar(200) NOT NULL,
  `hearus` varchar(200) NOT NULL,
  `town` varchar(200) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `joindate` datetime NOT NULL,
  `vote` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `phone`, `dob`, `email`, `state`, `lga`, `address`, `npp`, `hearus`, `town`, `gender`, `image_url`, `joindate`, `vote`) VALUES
(1, 'joe', '08036798575', '27/02/2019', 'josephibrahi@gmail.com', 'Abia', 'Abia', 'abia', '1', 'abia', 'abia', 'male', 'passport/11729129.png', '2019-02-24 22:33:13', 1),
(2, 'Joe', '08036798575', '11/02/2019', 'josephibrahi@gmail.com', 'AkwaIbom', 'Anambra', 'Home', '1', 'Jsjsj', 'Tag', 'male', 'passport/30047188.jpg', '2019-02-24 22:47:38', 1),
(3, 'Joseph ibrahim', '08036798575', '12/02/2019', 'ibrexbase@gmail.com', 'Jigawa', 'Kaduna', 'Angwan Kampani, Along Maitumbi Bypass Opposite Galaxy Intl. School, Minna Niger State', '1', 'dmdmdmd', 'Minna', 'male', 'passport/11729129.png', '2019-02-26 21:14:03', 1),
(4, 'Akpiri Valentina Freedom', '08066570439', '22/01/2004', 'akpirivalentina@gmail.com', 'Delta', 'Lagos', '1, akwa ibom street', '1', 'facebook', 'lagos', 'female', 'passport/30047188.jpg', '2019-02-26 21:54:42', 0),
(5, 'ghbjn', '+2348036798575', '19/03/2019', 'josephibrahi@gmail.com', 'Niger', 'Adamawa', '1', '', 'hujikl;', 'Minna', 'female', 'passport/9328574.png', '2019-03-02 22:47:07', 1),
(7, 'Adekanbi Richard', '07066355175', '23/06/1999', 'adekanbirichie5683@gmail.com', 'Borno', 'Lagos', '1', '', 'Instagram', 'Lagos', 'female', 'passport/12685777.png', '2019-03-02 23:11:23', 1),
(9, 'EKONG DORCAS', '09057760050', '02/02/1998', 'dorcasekong827@gmail.com', 'Cross River', 'Cross River', '1', '', 'My senior sister told me about it', 'CALABAR', 'female', 'passport/40790633.jpg', '2019-03-30 01:01:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `g` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `valvoters`
--

CREATE TABLE `valvoters` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `vote` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `valvoters`
--

INSERT INTO `valvoters` (`id`, `email`, `vote`) VALUES
(1, 'james@gmail.com', '0'),
(2, 'joe@gmail.com', '0'),
(3, 'cal@gmail.com', '0'),
(4, 'lo@gmail.com', '0'),
(5, 'faf@gmail.com', '0'),
(6, 'josephibrahi@gmail.com', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `valvoters`
--
ALTER TABLE `valvoters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `valvoters`
--
ALTER TABLE `valvoters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
