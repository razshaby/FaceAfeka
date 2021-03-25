-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 27, 2019 at 04:01 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faceafekadata`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `commentID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `PostID` int(10) UNSIGNED NOT NULL,
  `Comment` varchar(255) DEFAULT NULL,
  `Publisher` varchar(45) NOT NULL,
  `Date` datetime NOT NULL,
  `Likes` varchar(255) DEFAULT NULL,
  KEY `commentID` (`commentID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentID`, `PostID`, `Comment`, `Publisher`, `Date`, `Likes`) VALUES
(1, 1, 'very cute!!!!', 'Katy Perry', '2019-07-27 06:42:59', NULL),
(2, 1, 'I love it!!!', 'Natalie Portman', '2019-07-27 06:50:29', NULL),
(3, 5, 'Absolutely yes!', 'Leonardo DiCaprio', '2019-07-27 06:52:43', NULL),
(4, 6, 'yummy!', 'Leonardo DiCaprio', '2019-07-27 06:52:58', NULL),
(5, 8, 'i want you to join', 'Leonardo DiCaprio', '2019-07-27 06:53:50', NULL),
(6, 11, 'Can I eat with you?', 'Katy Perry', '2019-07-27 06:56:07', NULL),
(7, 6, 'Thank Leonardo!', 'Katy Perry', '2019-07-27 06:57:02', NULL),
(8, 5, 'Thanks', 'Katy Perry', '2019-07-27 06:57:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `player1` varchar(100) NOT NULL,
  `player2` varchar(100) NOT NULL,
  `gameCode` varchar(100) NOT NULL,
  `gameID` int(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`gameID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`player1`, `player2`, `gameCode`, `gameID`) VALUES
('Katy Perry', 'Nathan Goshen', '82432', 3);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `PostID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Status` varchar(255) DEFAULT NULL,
  `ImgSrc` varchar(255) DEFAULT NULL,
  `Publisher` varchar(45) NOT NULL,
  `Privacy` varchar(45) NOT NULL,
  `Likes` varchar(255) DEFAULT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY (`PostID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`PostID`, `Status`, `ImgSrc`, `Publisher`, `Privacy`, `Likes`, `Date`) VALUES
(1, 'Look at my cats', '5d3c6e8cb195b.jpg|5d3c6e8cb4a12.jpg|5d3c6e8cb6efc.jpg|', 'Nathan Goshen', 'Public', 'Katy Perry|Natalie Portman|', '2019-07-27 18:32:28'),
(2, 'Me, at home.', '5d3c6ef98af92.jpg|', 'Nathan Goshen', 'Private', NULL, '2019-07-27 18:34:17'),
(5, 'Blonde is beautiful to me?', '5d3c701397be7.jpg|', 'Katy Perry', 'Public', 'Leonardo DiCaprio|Katy Perry|', '2019-07-27 18:38:59'),
(6, 'Looks tasty!', '5d3c70792afc8.jpg|', 'Katy Perry', 'Public', 'Katy Perry|', '2019-07-27 18:40:41'),
(7, 'Near my home\r\n', '5d3c71a4301d2.jpg|', 'Selena Gomez', 'Public', NULL, '2019-07-27 18:45:40'),
(8, 'At berlin', '5d3c7210c8713.jpg|5d3c7210c9ba7.jpg|5d3c7210cb1ac.jpg|5d3c7210cc53d.jpg|5d3c7210cd8d3.jpg|', 'Selena Gomez', 'Public', 'Leonardo DiCaprio|', '2019-07-27 18:47:28'),
(9, 'My babies playing', '5d3c72984b96a.jpg|', 'Natalie Portman', 'Public', NULL, '2019-07-27 18:49:44'),
(11, 'Look what i get!', '5d3c732b57e06.jpg|', 'Leonardo DiCaprio', 'Public', 'Katy Perry|', '2019-07-27 18:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `friends` mediumtext,
  `Img` mediumtext,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `friends`, `Img`) VALUES
(1, 'Katy Perry', '593cc8a5f8854866d70fc5969fa01fbb', 'Nathan Goshen|Leonardo DiCaprio|', '../images/profiles/5d3c6d4d44164.jpg'),
(2, 'Leonardo DiCaprio', '22a96b29395b1ca5109f0209cec472ce', 'Katy Perry|Selena Gomez|', '../images/profiles/5d3c6d1f0065a.jpg'),
(3, 'Natalie Portman', 'dece0922b3d31d9db738bf62c352b283', 'Leonardo DiCaprio|Nathan Goshen|', '../images/profiles/5d3c6d691189a.jpg'),
(4, 'Selena Gomez', '6040a784289d6a3d1bab9a4bdef93e70', 'Katy Perry|Natalie Portman|', '../images/profiles/5d3c6d7c3a50f.jpg'),
(5, 'Nathan Goshen', 'd5d735610102598ae947605f59bdf752', 'Katy Perry|Natalie Portman|', '../images/profiles/5d3c6e256848b.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
