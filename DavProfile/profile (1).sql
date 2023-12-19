-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 09:12 PM
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
  `file_name` varchar(45) DEFAULT NULL,
  `file_date_created` date DEFAULT NULL,
  `file_uniqID` varchar(45) DEFAULT NULL,
  `projectLink` varchar(1000) DEFAULT NULL,
  `file_Cate` varchar(50) NOT NULL,
  `file_descrip` varchar(4500) DEFAULT NULL,
  `file_uploadcol` varchar(45) DEFAULT NULL,
  `file_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_upload`
--

INSERT INTO `file_upload` (`idfile_upload`, `file_name`, `file_date_created`, `file_uniqID`, `projectLink`, `file_Cate`, `file_descrip`, `file_uploadcol`, `file_title`) VALUES
(94, 'img6.jpg', '0000-00-00', 'olalekan@gmail.com', 'undefined', 'design', 'This is the CEO of the company', NULL, ''),
(95, 'img7.jpg', '2021-05-20', 'olalekan@gmail.com', 'undefined', 'design', 'nextMth_date(myDate)', NULL, ''),
(96, 'img8.jpg', '2021-05-20', 'olalekan@gmail.com', 'techsigma.com.ng', 'design', 'Hello Javascript', NULL, ''),
(97, 'img3.jpg', '2021-05-22', 'olalekan@gmail.com', 'techsigma.com.ng', 'Development', '?	The meaning of the brain\n?	The brain according to Quran\n?	The brain according to Sunnah\n?	The brain according to different groups. Salafiyyah\n?	The brain according to the philosopher\n?	The brain according to the suffis.\n?	The criticism against the brain.\n\nMeaning of the brain.\n?	Brain means an equipment of thinking\n?	The contemporary philosophers (western ones) and some of the Greek ones deny the existing of the brain, and according to them the brain means “list of lot experience information brought together and linked to each other to compass the previous experience to the present one to found the correct answer”.\n?	The majority of the old philosopher like the Maaturidis and the Ash’anriyi say, “it is an independent thing i.e. independent existing”.\n', NULL, ''),
(98, 'img4.jpg', '2021-05-22', 'olalekan@gmail.com', 'techsigma.com.ng', 'Development', '?	Suratul Baqorah verses 72-73 (?????? ?????????? ???????? ???????????????? ?????? ? ????????? ????????? ???? ??????? ???????????,?’ ????????? ?????????? ??????????? ? ????????? ?????? ??????? ??????????? ??????????? ??????????? ??????????? ??????????? )?, \nmeaning. “when you kill one of you, and then you was confused how to do (in terms of finding the killer), but Allah can easily disclose what you are hiding. And then we ordered them to hit the person with some the meat, and that’s how Allah resurrect dead people, and that’s how Allooh shows his proofs to you, so you may use your brain. \n? The subject of the verse is Aqeedah (creed) i.e. brain is inserted in Aqeedah.\n\n?	Suratul Baqorah verses 75-77 \n( ? ??????????????? ??? ??????????? ?????? ?????? ????? ???????? ????????? ??????????? ??????? ??????? ????? ??????????????? ???? ?????? ??? ????????? ?????? ???????????,? ??????? ??????? ????????? ?????????? ????????? ????????? ??????? ????? ?????????? ?????? ??????? ????????? ????????????????? ????? ?????? ??????? ?????????? ??????????????? ????? ????? ????????? ? ??????? ????????????, ??????? ??????????? ????? ??????? ???????? ??? ?????????? ????? ?????????? ?  \nmeaning “will you carry on hoping that they will accept the prophet, even though some of them use to come to the prophet, and after that they use to twist what prophet says after understanding what prophet means. And when they meet the believers, they will say, actually we to believe, and when they stay alone on their own, they will say why are you explaining what is granted to you and not to them, don’t you use your brain?” \n? The subject of the verses is psychology, i.e. brain is useful in psychology.\n', NULL, 'The Brain Episode 01');

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
  MODIFY `idfile_upload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `notepad`
--
ALTER TABLE `notepad`
  MODIFY `idnotePad` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
