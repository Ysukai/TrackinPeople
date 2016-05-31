-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2016 at 11:44 PM
-- Server version: 5.6.28
-- PHP Version: 5.5.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracking_people_in_offices`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE IF NOT EXISTS `audit` (
  `audit_id` mediumint(8) unsigned NOT NULL,
  `id` int(11) NOT NULL,
  `changetype` enum('NEW','EDIT','DELETE') NOT NULL,
  `changetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`audit_id`, `id`, `changetype`, `changetime`) VALUES
(1, 13, 'NEW', '2016-04-14 18:54:56'),
(2, 7, 'EDIT', '2016-04-14 20:34:24'),
(3, 7, 'EDIT', '2016-04-14 20:34:31'),
(4, 7, 'EDIT', '2016-04-14 20:34:39'),
(5, 9, 'EDIT', '2016-04-14 20:34:45'),
(6, 9, 'EDIT', '2016-04-14 20:34:48'),
(7, 10, 'EDIT', '2016-04-14 20:34:54'),
(8, 13, 'EDIT', '2016-04-14 20:34:59'),
(9, 14, 'NEW', '2016-05-18 16:21:15'),
(10, 15, 'NEW', '2016-05-18 16:31:21'),
(11, 16, 'NEW', '2016-05-18 16:32:38'),
(12, 17, 'NEW', '2016-05-18 16:33:23'),
(13, 18, 'NEW', '2016-05-19 23:24:35'),
(14, 19, 'NEW', '2016-05-19 23:25:34'),
(16, 7, 'EDIT', '2016-05-25 00:57:05'),
(17, 7, 'EDIT', '2016-05-25 00:57:57'),
(18, 7, 'EDIT', '2016-05-25 01:03:10'),
(19, 7, 'EDIT', '2016-05-25 01:04:29'),
(20, 7, 'EDIT', '2016-05-25 01:04:53'),
(21, 7, 'EDIT', '2016-05-25 01:05:05'),
(22, 7, 'EDIT', '2016-05-25 01:05:15'),
(23, 7, 'EDIT', '2016-05-25 01:05:29'),
(24, 7, 'EDIT', '2016-05-25 01:06:46'),
(25, 7, 'EDIT', '2016-05-25 01:07:08'),
(26, 7, 'EDIT', '2016-05-25 01:08:04'),
(27, 7, 'EDIT', '2016-05-25 01:08:14'),
(28, 14, 'DELETE', '2016-05-25 16:53:18'),
(29, 7, 'EDIT', '2016-05-25 18:29:49'),
(30, 7, 'DELETE', '2016-05-25 18:58:27'),
(31, 7, 'EDIT', '2016-05-25 18:58:57'),
(33, 7, 'DELETE', '2016-05-25 19:00:15'),
(34, 16, 'DELETE', '2016-05-25 19:00:18'),
(35, 19, 'DELETE', '2016-05-25 19:00:19'),
(36, 10, 'DELETE', '2016-05-25 21:06:38'),
(38, 19, 'EDIT', '2016-05-25 21:06:42'),
(39, 18, 'DELETE', '2016-05-25 21:06:45'),
(42, 7, 'EDIT', '2016-05-25 21:06:59'),
(43, 14, 'EDIT', '2016-05-25 21:07:02'),
(44, 16, 'EDIT', '2016-05-25 21:07:03'),
(45, 18, 'EDIT', '2016-05-25 21:07:04'),
(48, 19, 'DELETE', '2016-05-25 21:07:10'),
(50, 18, 'DELETE', '2016-05-25 21:07:14'),
(51, 17, 'DELETE', '2016-05-25 21:07:16'),
(52, 16, 'DELETE', '2016-05-25 21:07:17'),
(53, 15, 'DELETE', '2016-05-25 21:07:19'),
(54, 14, 'DELETE', '2016-05-25 21:07:19'),
(55, 13, 'DELETE', '2016-05-25 21:07:23'),
(56, 9, 'DELETE', '2016-05-25 21:07:24'),
(57, 7, 'DELETE', '2016-05-25 21:07:32'),
(58, 7, 'EDIT', '2016-05-25 21:07:39'),
(59, 9, 'EDIT', '2016-05-25 21:07:40'),
(60, 10, 'EDIT', '2016-05-25 21:07:43'),
(61, 13, 'EDIT', '2016-05-25 21:07:45'),
(62, 7, 'DELETE', '2016-05-25 22:00:49'),
(63, 9, 'DELETE', '2016-05-25 22:00:50'),
(64, 14, 'EDIT', '2016-05-25 22:00:53'),
(65, 15, 'EDIT', '2016-05-25 22:00:55'),
(66, 13, 'EDIT', '2016-05-25 22:01:05'),
(67, 17, 'EDIT', '2016-05-25 22:01:16'),
(68, 7, 'EDIT', '2016-05-25 23:29:55'),
(69, 7, 'EDIT', '2016-05-26 20:58:14'),
(70, 7, 'DELETE', '2016-05-26 20:58:42'),
(71, 10, 'DELETE', '2016-05-26 20:58:46'),
(72, 13, 'DELETE', '2016-05-26 20:58:47'),
(73, 14, 'DELETE', '2016-05-26 20:58:48'),
(74, 15, 'DELETE', '2016-05-26 20:58:49'),
(75, 7, 'EDIT', '2016-05-26 20:58:58'),
(88, 19, 'EDIT', '2016-05-26 22:35:49'),
(89, 33, 'NEW', '2016-05-26 22:36:14'),
(90, 34, 'NEW', '2016-05-26 22:36:27'),
(91, 34, 'EDIT', '2016-05-26 22:39:05'),
(92, 9, 'DELETE', '2016-05-26 22:43:24'),
(93, 9, 'DELETE', '2016-05-26 22:43:29'),
(94, 10, 'EDIT', '2016-05-26 23:21:11'),
(95, 14, 'EDIT', '2016-05-26 23:21:12'),
(96, 15, 'EDIT', '2016-05-26 23:21:13'),
(97, 16, 'EDIT', '2016-05-26 23:21:14'),
(98, 18, 'EDIT', '2016-05-26 23:21:15'),
(99, 13, 'EDIT', '2016-05-26 23:21:16'),
(100, 9, 'EDIT', '2016-05-26 23:21:18'),
(101, 7, 'DELETE', '2016-05-26 23:21:25'),
(102, 7, 'EDIT', '2016-05-27 20:48:53'),
(103, 9, 'DELETE', '2016-05-27 20:48:54'),
(104, 10, 'DELETE', '2016-05-27 20:48:55'),
(105, 13, 'DELETE', '2016-05-27 20:48:56'),
(106, 14, 'DELETE', '2016-05-27 20:48:57'),
(107, 15, 'DELETE', '2016-05-27 20:48:58'),
(108, 16, 'DELETE', '2016-05-27 20:48:59'),
(109, 17, 'DELETE', '2016-05-27 20:49:01'),
(110, 18, 'DELETE', '2016-05-27 20:49:02'),
(111, 19, 'DELETE', '2016-05-27 20:49:03'),
(112, 33, 'DELETE', '2016-05-27 20:49:04'),
(113, 34, 'DELETE', '2016-05-27 20:49:05'),
(114, 13, 'EDIT', '2016-05-27 20:49:15'),
(115, 35, 'NEW', '2016-05-27 20:49:50'),
(116, 9, 'EDIT', '2016-05-27 21:01:05'),
(117, 14, 'EDIT', '2016-05-27 21:01:07'),
(118, 15, 'EDIT', '2016-05-27 21:01:08'),
(119, 7, 'EDIT', '2016-05-27 21:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `People`
--

CREATE TABLE IF NOT EXISTS `People` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Masculin','Feminin') COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_joined_organisation` date NOT NULL,
  `date_left_organisation` date DEFAULT NULL,
  `other_details` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `efface` tinyint(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `People`
--

INSERT INTO `People` (`id`, `name`, `prenom`, `gender`, `email`, `date_of_birth`, `date_joined_organisation`, `date_left_organisation`, `other_details`, `efface`) VALUES
(7, 'Proulx', 'Julie', 'Feminin', 'a@a.a', '2014-02-02', '2015-02-02', NULL, 'test a test a test', 0),
(9, 'stress testing', 'lynx', 'Masculin', 'a@a.cadhsakjhaa', '1999-12-20', '2007-08-22', NULL, 'dfefverferyujhgjhgj', 0),
(10, 'lkdfhlkdj', 'ksdhufsi', 'Feminin', 'test@test.ca', '1990-03-05', '1955-09-08', NULL, 'lksdhlskj', 1),
(13, 'bob', 'Yoann', 'Feminin', 'test@test.ca', '1999-12-20', '1999-02-05', NULL, 'rgrgbr test test', 0),
(14, 'Proulx', 'test', 'Masculin', 'test@test.ca', '1990-03-05', '1990-05-05', '1999-02-24', 'test', 0),
(15, 'Yoann 2', 'yoann', 'Masculin', 'a@a.a', '1990-03-05', '1990-05-05', '1999-02-24', 'tdfg', 0),
(16, 'bob', 'a', 'Masculin', 'yoaproulx22@hotmail.com', '1995-04-24', '1990-05-05', '1999-02-02', 'dvdsfgdfdf', 1),
(17, 'asdasd', 'asasda', 'Masculin', 'a@a.a', '1990-02-01', '2007-08-22', '2015-05-06', 'aaaaaaa', 1),
(18, 'asdasd', 'a', 'Masculin', 'test@test.ca', '1990-05-06', '1999-02-05', '1999-02-24', 'asdasdasda', 1),
(19, 'S,KJDHKSJDBVIK', 'test', 'Masculin', 'yoaproulx22@hotmail.com', '1999-12-20', '2007-08-22', '2004-10-24', 'sdasdasdasdasdasdasda', 1),
(33, 'test2', 'test', 'Masculin', 'S@S.S', '1990-03-05', '1955-09-08', NULL, 'saasdasd', 1),
(34, 'test2', 'test', 'Masculin', 'S@S.S', '1990-03-05', '1955-09-08', '2015-05-06', 'test tes testess', 1),
(35, 'aaa', 'aaa', 'Feminin', 'a@a.com', '1990-03-05', '1955-09-08', '2015-05-06', 'asdasdasdasd', 0);

--
-- Triggers `People`
--
DELIMITER $$
CREATE TRIGGER `person_after_insert` AFTER INSERT ON `people`
 FOR EACH ROW BEGIN
	
		IF NEW.efface THEN
			SET @changetype = 'DELETE';
		ELSE
			SET @changetype = 'NEW';
		END IF;
    
		INSERT INTO audit (id, changetype) VALUES (NEW.id, @changetype);
		
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `person_after_update` AFTER UPDATE ON `people`
 FOR EACH ROW BEGIN
	
		IF NEW.efface THEN
			SET @changetype = 'DELETE';
		ELSE
			SET @changetype = 'EDIT';
		END IF;
    
		INSERT INTO audit (id, changetype) VALUES (NEW.id, @changetype);
		
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Tasks`
--

CREATE TABLE IF NOT EXISTS `Tasks` (
  `Task_id` int(11) NOT NULL,
  `Person_id` int(11) NOT NULL,
  `Task_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Task_Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Other_Details` text COLLATE utf8_unicode_ci,
  `Image_Task` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `efface` tinyint(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Tasks`
--

INSERT INTO `Tasks` (`Task_id`, `Person_id`, `Task_Name`, `Task_Description`, `Other_Details`, `Image_Task`, `efface`) VALUES
(50, 7, 'test 2 crashgyhgyg', 'wdwdc', '', 'images.png', 0),
(51, 7, 'penis', '', '', '', 1),
(52, 13, 'test crashsdf', 'dsgkjrpojw', 'wlkejflwkklf', '', 0),
(53, 7, 'dfgdfgdfgdgf', 'kjbhkjh', 'jhgjhg', 'ddo.png', 1),
(54, 7, 'testtttttt', 'asdasdasd', 'asdasda', NULL, 1),
(55, 7, 'asdasdasdasd', 'test', NULL, NULL, 0),
(56, 7, 'test', 'test', NULL, NULL, 0),
(57, 7, 'lololol', 'this is test', NULL, 'donate-button.jpg', 0),
(58, 7, 'testkajhdksjdha', 'hgfhgfhgfhgf', NULL, NULL, 0),
(59, 7, 'blaH JHGFJHG', 'thhhe', NULL, 'donate.jpg', 0),
(60, 7, 'testtt', 'xzczxc', 'zxczxcz', NULL, 0),
(61, 7, 'testtt', 'sdfsdfsdf', 'fsdfsdfs', NULL, 0),
(62, 7, 'dasdas', 'asdasd', 'sdasdasd', NULL, 0),
(63, 7, 'test', 'test', 'test', 'RoR.jpg', 1),
(64, 7, 'testtt', 'gtgtrtg', 'grtgrtg', NULL, 1),
(65, 7, 'asasd', 'asdasdasd', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE IF NOT EXISTS `Utilisateur` (
  `Util_id` int(11) NOT NULL,
  `Util_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Util_mdp` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Utilisateur`
--

INSERT INTO `Utilisateur` (`Util_id`, `Util_user`, `Util_mdp`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`audit_id`),
  ADD KEY `ix_id` (`id`),
  ADD KEY `ix_changetype` (`changetype`),
  ADD KEY `ix_changetime` (`changetime`);

--
-- Indexes for table `People`
--
ALTER TABLE `People`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Person_ID` (`id`);

--
-- Indexes for table `Tasks`
--
ALTER TABLE `Tasks`
  ADD PRIMARY KEY (`Task_id`),
  ADD KEY `id` (`Person_id`);

--
-- Indexes for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`Util_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `audit_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `People`
--
ALTER TABLE `People`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `Tasks`
--
ALTER TABLE `Tasks`
  MODIFY `Task_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `Util_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit`
--
ALTER TABLE `audit`
  ADD CONSTRAINT `FK_audit_person_id` FOREIGN KEY (`id`) REFERENCES `People` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Tasks`
--
ALTER TABLE `Tasks`
  ADD CONSTRAINT `Tasks_ibfk_1` FOREIGN KEY (`Person_id`) REFERENCES `People` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
