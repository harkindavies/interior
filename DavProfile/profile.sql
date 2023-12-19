-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 11:44 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profile`
--

-- --------------------------------------------------------

--
-- Table structure for table `acct_create`
--

CREATE TABLE `acct_create` (
  `idacct_create` int(11) NOT NULL,
  `acct_fname` varchar(20) DEFAULT NULL,
  `acct_dob` date DEFAULT NULL,
  `acct_pwd` varchar(300) DEFAULT NULL,
  `acct_username` varchar(20) DEFAULT NULL,
  `acct_email` varchar(50) NOT NULL,
  `acct_website` varchar(45) DEFAULT NULL,
  `acct_phone` varchar(15) DEFAULT NULL,
  `acct_gender` varchar(10) DEFAULT NULL,
  `acct_lname` varchar(20) DEFAULT NULL,
  `acct_uniqID` varchar(45) DEFAULT NULL,
  `acct_dateCreated` date DEFAULT NULL,
  `acct_addr` varchar(105) DEFAULT NULL,
  `acct_verify_id_pic_front` longblob,
  `acct_verify_id_pic_back` longblob,
  `acct_photoCard` longblob,
  `acct_NG_NIN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acct_create`
--

INSERT INTO `acct_create` (`idacct_create`, `acct_fname`, `acct_dob`, `acct_pwd`, `acct_username`, `acct_email`, `acct_website`, `acct_phone`, `acct_gender`, `acct_lname`, `acct_uniqID`, `acct_dateCreated`, `acct_addr`, `acct_verify_id_pic_front`, `acct_verify_id_pic_back`, `acct_photoCard`, `acct_NG_NIN`) VALUES
(1, 'Mikaheel', NULL, 'Abdulhakeem', 'olalekan@gmail.com', 'fatman92@gmail.com', 'this.com', '090300299303', 'female', 'Abdulhakeem', NULL, NULL, NULL, NULL, NULL, NULL, 2147483647),
(2, 'Mikaheel', NULL, 'Abdulhakeem', 'olalekan@gmail', 'fatman92@gmail.com', 'this.com', '09099777766', 'male', 'Abdulhakeem', NULL, NULL, NULL, NULL, NULL, NULL, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `emergencyinfo`
--

CREATE TABLE `emergencyinfo` (
  `idemergencyInfo` int(11) NOT NULL,
  `addr` varchar(125) DEFAULT NULL,
  `bloodType` varchar(45) DEFAULT NULL,
  `medications` varchar(145) DEFAULT NULL,
  `medicalNotes` varchar(1005) DEFAULT NULL,
  `otherInfo` varchar(1005) DEFAULT NULL,
  `emerg_contactID` varchar(45) DEFAULT NULL,
  `emergencyInfo_uniqID` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_upload`
--

CREATE TABLE `file_upload` (
  `idfile_upload` int(11) NOT NULL,
  `file_type` varchar(45) DEFAULT NULL,
  `file_name` varchar(45) DEFAULT NULL,
  `file_date_created` date DEFAULT NULL,
  `file_status` varchar(45) DEFAULT NULL,
  `file_uniqID` varchar(45) DEFAULT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_upload`
--

INSERT INTO `file_upload` (`idfile_upload`, `file_type`, `file_name`, `file_date_created`, `file_status`, `file_uniqID`, `dateCreated`) VALUES
(1, 'application/pdf', 'PayReply.pdf', NULL, NULL, NULL, '0000-00-00'),
(2, 'application/json', 'package.json', NULL, NULL, NULL, '0000-00-00'),
(3, 'application/json', 'package.json', NULL, NULL, NULL, '0000-00-00'),
(4, 'application/octet-stream', 'addhostel.php', NULL, NULL, NULL, '0000-00-00'),
(5, 'application/octet-stream', 'addStaff.php', NULL, NULL, NULL, '0000-00-00'),
(6, 'application/octet-stream', 'css.php', NULL, NULL, NULL, '0000-00-00'),
(7, 'application/octet-stream', 'addstudent.php', NULL, NULL, NULL, '0000-00-00'),
(8, 'application/octet-stream', 'allocated.php', NULL, NULL, NULL, '0000-00-00'),
(9, 'application/octet-stream', 'cartoon.php', NULL, NULL, NULL, '0000-00-00'),
(10, 'application/octet-stream', 'dashboard.php', NULL, NULL, NULL, '0000-00-00'),
(11, 'application/octet-stream', 'db.php', NULL, NULL, NULL, '0000-00-00'),
(12, 'application/octet-stream', 'enquiries.php', NULL, NULL, NULL, '0000-00-00'),
(13, 'application/octet-stream', 'fetch.php', NULL, NULL, NULL, '0000-00-00'),
(14, 'application/octet-stream', 'footer.php', NULL, NULL, NULL, '0000-00-00'),
(15, 'application/octet-stream', 'head.php', NULL, NULL, NULL, '0000-00-00'),
(16, 'application/octet-stream', 'home.php', NULL, NULL, NULL, '0000-00-00'),
(17, 'application/octet-stream', 'home_nav.php', NULL, NULL, NULL, '0000-00-00'),
(18, 'application/octet-stream', 'hostel.sql', NULL, NULL, NULL, '0000-00-00'),
(19, 'application/octet-stream', 'hostels.php', NULL, NULL, NULL, '0000-00-00'),
(20, 'application/octet-stream', 'index.php', NULL, NULL, NULL, '0000-00-00'),
(21, 'text/javascript', 'javascript.js', NULL, NULL, NULL, '0000-00-00'),
(22, 'application/octet-stream', 'js.php', NULL, NULL, NULL, '0000-00-00'),
(23, 'text/css', 'mystyle.css', NULL, NULL, NULL, '0000-00-00'),
(24, 'application/octet-stream', 'nav.php', NULL, NULL, NULL, '0000-00-00'),
(25, 'application/octet-stream', 'print_hostel.php', NULL, NULL, NULL, '0000-00-00'),
(26, 'application/octet-stream', 'registration.php', NULL, NULL, NULL, '0000-00-00'),
(27, 'application/octet-stream', 'registration1.php', NULL, NULL, NULL, '0000-00-00'),
(28, 'application/octet-stream', 'selectHostel.php', NULL, NULL, NULL, '0000-00-00'),
(29, 'application/octet-stream', 'shuffle.php', NULL, NULL, NULL, '0000-00-00'),
(30, 'application/octet-stream', 'staffs.php', NULL, NULL, NULL, '0000-00-00'),
(31, 'application/octet-stream', 'students.php', NULL, NULL, NULL, '0000-00-00'),
(32, 'application/octet-stream', 'testinput.php', NULL, NULL, NULL, '0000-00-00'),
(33, 'text/javascript', 'bootstrap.min.js', NULL, NULL, NULL, '0000-00-00'),
(34, 'application/octet-stream', 'footjs.php', NULL, NULL, NULL, '0000-00-00'),
(35, 'text/javascript', 'jquery-3.2.1.min.js', NULL, NULL, NULL, '0000-00-00'),
(36, 'text/javascript', 'popper.js', NULL, NULL, NULL, '0000-00-00'),
(37, 'text/javascript', 'jquery-3.2.1.js', NULL, NULL, NULL, '0000-00-00'),
(38, 'image/png', 'img2.png', NULL, NULL, NULL, '0000-00-00'),
(39, 'image/jpeg', 'img1.jpg', NULL, NULL, NULL, '0000-00-00'),
(40, 'image/jpeg', 'img3.jpg', NULL, NULL, NULL, '0000-00-00'),
(41, 'image/jpeg', 'img5.jpg', NULL, NULL, NULL, '0000-00-00'),
(42, 'image/jpeg', 'img7.jpg', NULL, NULL, NULL, '0000-00-00'),
(43, 'image/jpeg', 'img4.jpg', NULL, NULL, NULL, '0000-00-00'),
(44, 'image/jpeg', 'img6.jpg', NULL, NULL, NULL, '0000-00-00'),
(45, 'image/png', 'logo.png', NULL, NULL, NULL, '0000-00-00'),
(46, 'image/jpeg', 'img8.jpg', NULL, NULL, NULL, '0000-00-00'),
(47, 'text/css', 'animate.min.css', NULL, NULL, NULL, '0000-00-00'),
(48, 'image/jpeg', 'img1.jpg', NULL, NULL, NULL, '0000-00-00'),
(49, 'image/jpeg', 'img3.jpg', NULL, NULL, NULL, '0000-00-00'),
(50, 'text/css', 'bootstrap.min.css', NULL, NULL, NULL, '0000-00-00'),
(51, 'text/css', 'color1.css', NULL, NULL, NULL, '0000-00-00'),
(52, 'text/css', 'bootstrap.min_1.css', NULL, NULL, NULL, '0000-00-00'),
(53, 'text/css', 'css.css', NULL, NULL, NULL, '0000-00-00'),
(54, 'text/css', 'font-awesome.min.css', NULL, NULL, NULL, '0000-00-00'),
(55, 'text/css', 'jquery.fancybox.min.css', NULL, NULL, NULL, '0000-00-00'),
(56, 'text/css', 'magnific-popup.css', NULL, NULL, NULL, '0000-00-00'),
(57, 'text/css', 'normalize.css', NULL, NULL, NULL, '0000-00-00'),
(58, 'text/css', 'owl.carousel.min.css', NULL, NULL, NULL, '0000-00-00'),
(59, 'text/css', 'owl.theme.default.min.css', NULL, NULL, NULL, '0000-00-00'),
(60, 'text/css', 'preloader.css', NULL, NULL, NULL, '0000-00-00'),
(61, 'text/css', 'responsive.css', NULL, NULL, NULL, '0000-00-00'),
(62, 'text/css', 'slicknav.min.css', NULL, NULL, NULL, '0000-00-00'),
(63, 'text/css', 'style.css', NULL, NULL, NULL, '0000-00-00'),
(64, 'text/css', 'style1.css', NULL, NULL, NULL, '0000-00-00'),
(65, 'text/css', 'style_1.css', NULL, NULL, NULL, '0000-00-00'),
(66, 'image/jpeg', 'img2.jpg', NULL, NULL, NULL, '0000-00-00'),
(67, 'image/jpeg', 'img1.jpg', NULL, NULL, NULL, '0000-00-00'),
(68, 'image/png', 'img2.png', NULL, NULL, NULL, '0000-00-00'),
(69, 'image/jpeg', 'img5.jpg', NULL, NULL, NULL, '0000-00-00'),
(70, 'image/jpeg', 'img3.jpg', NULL, NULL, NULL, '0000-00-00'),
(71, 'image/jpeg', 'img4.jpg', NULL, NULL, NULL, '0000-00-00'),
(72, 'image/jpeg', 'img6.jpg', NULL, NULL, NULL, '0000-00-00'),
(73, 'image/jpeg', 'img7.jpg', NULL, NULL, NULL, '0000-00-00'),
(74, 'image/jpeg', 'img8.jpg', NULL, NULL, NULL, '0000-00-00'),
(75, 'image/png', 'logo.png', NULL, NULL, NULL, '0000-00-00'),
(76, 'image/jpeg', 'img1.jpg', NULL, NULL, NULL, '0000-00-00'),
(77, 'image/jpeg', 'img3.jpg', NULL, NULL, NULL, '0000-00-00'),
(78, 'image/jpeg', 'img2.jpg', NULL, NULL, NULL, '0000-00-00'),
(79, 'image/jpeg', 'img1.jpg', NULL, NULL, NULL, '0000-00-00'),
(80, 'image/jpeg', 'img3.jpg', NULL, NULL, NULL, '0000-00-00'),
(81, 'image/jpeg', 'img2.jpg', NULL, NULL, NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `notepad`
--

CREATE TABLE `notepad` (
  `idnotePad` int(11) NOT NULL,
  `note_content` varchar(40005) DEFAULT NULL,
  `note_attPics` longblob,
  `notePad_uniqID` varchar(45) DEFAULT NULL,
  `notePad_status` varchar(45) DEFAULT NULL,
  `notePad_dateCreated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acct_create`
--
ALTER TABLE `acct_create`
  ADD PRIMARY KEY (`idacct_create`);

--
-- Indexes for table `emergencyinfo`
--
ALTER TABLE `emergencyinfo`
  ADD PRIMARY KEY (`idemergencyInfo`);

--
-- Indexes for table `file_upload`
--
ALTER TABLE `file_upload`
  ADD PRIMARY KEY (`idfile_upload`);

--
-- Indexes for table `notepad`
--
ALTER TABLE `notepad`
  ADD PRIMARY KEY (`idnotePad`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acct_create`
--
ALTER TABLE `acct_create`
  MODIFY `idacct_create` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emergencyinfo`
--
ALTER TABLE `emergencyinfo`
  MODIFY `idemergencyInfo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_upload`
--
ALTER TABLE `file_upload`
  MODIFY `idfile_upload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `notepad`
--
ALTER TABLE `notepad`
  MODIFY `idnotePad` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
