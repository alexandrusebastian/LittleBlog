-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2015 at 09:23 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `littleblog`
--
CREATE DATABASE IF NOT EXISTS `littleblog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `littleblog`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
`ARTICLEID` int(11) NOT NULL,
  `USERID` int(11) NOT NULL,
  `TITLE` varchar(50) NOT NULL,
  `CONTENT` mediumtext CHARACTER SET utf32 COLLATE utf32_romanian_ci NOT NULL,
  `TAGS` varchar(100) NOT NULL,
  `RATING` int(11) NOT NULL,
  `VIEWS` int(11) NOT NULL,
  `DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`ARTICLEID`, `USERID`, `TITLE`, `CONTENT`, `TAGS`, `RATING`, `VIEWS`, `DATE`) VALUES
(35, 7, 'WikiGalaxy', '<p><strong>Studying computer science in Paris, engineer Owen Cornec is not waiting for the completion of his master&rsquo;s degree to begin creating the projects he dreams about.</strong><span style="color:rgb(0, 0, 0); font-family:arial,tahoma,verdana; font-size:14px">&nbsp;In his free time, outside of his curriculum, he has produced several unique interactive data visualizations. In&nbsp;</span><a href="http://wiki.polyfra.me/" style="color: rgb(0, 0, 0); text-decoration: none; font-family: Arial, Tahoma, Verdana; font-size: 14px; line-height: 22px;">WikiGalaxy</a><span style="color:rgb(0, 0, 0); font-family:arial,tahoma,verdana; font-size:14px">, he invites you to explore Wikipedia as a &ldquo;galaxy of articles and links&rdquo;, where you can fly through the uncharted territory and land on Wikipedia searches you might have never thought of. It turns research and learning into a game and a data visualization. It&rsquo;s easy and fun to get lost in the endless possibilities of WikiGalaxy.</span><br />&nbsp;</p><p><img alt="" src="http://cdn.visualnews.com/wp-content/uploads/2014/12/1-600x516.png" style="height:516px; width:600px" /></p>', 'wiki galaxy wikigalaxy owen cornec', 0, 19, '2014-12-13 10:40:05'),
(36, 7, 'Why do cats purr?', '<p><strong>Leslie A. Lyons, an assistant professor at the School of Veterinary Medicine at the University of California, Davis, explains.</strong></p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img alt="" src="http://www.scientificamerican.com/sciam/cache/file/20B0B07B-0ACD-4AEE-995974DF320327FC_article.jpg?D848B" style="height:278px; width:277px" /></strong></p>\r\n\r\n<p>Over the course of evolution, purring has probably offered some selective advantage to cats. Most felid species produce a &quot;purr-like&quot; vocalization. In domestic cats, purring is most noticeable when an animal is nursing her kittens or when humans provide social contact via petting, stroking or feeding.</p>\r\n\r\n<p>Although we assume that a cat&#39;s purr is an expression of pleasure or is a means of communication with its young, perhaps the reasons for purring can be deciphered from the more stressful moments in a cat&#39;s life. Cats often purr while under duress, such as during a visit to the veterinarian or when recovering from injury. Thus, not all purring cats appear to be content or pleased with their current circumstances. This riddle has lead researchers to investigate how cats purr, which is also still under debate.</p>\r\n\r\n<p>Scientists have demonstrated that cats produce the purr through intermittent signaling of the laryngeal and diaphragmatic muscles. Cats purr during both inhalation and exhalation with a consistent pattern and frequency between 25 and 150 Hertz. Various investigators have shown that sound frequencies in this range can improve bone density and promote healing.</p>\r\n\r\n<p>This association between the frequencies of cats&#39; purrs and improved healing of bones and muscles may provide help for some humans. Bone density loss and muscle atrophy is a serious concern for astronauts during extended periods at zero gravity. Their musculo-skeletal systems do not experience the normal stresses of physical activity, including routine standing or sitting, which requires strength for posture control.</p>\r\n\r\n<p>Because cats have adapted to conserve energy via long periods of rest and sleep, it is possible that purring is a low energy mechanism that stimulates muscles and bones without a lot of energy. The durability of the cat has facilitated the notion that cats have &quot;nine lives&quot; and a common veterinary legend holds that cats are able to reassemble their bones when placed in the same room with all their parts. Purring may provide a basis for this feline mythology. The domestication and breeding of fancy cats occurred relatively recently compared to other pets and domesticated species, thus cats do not display as many muscle and bone abnormalities as their more strongly selected carnivore relative, the domestic dog. Perhaps cats&#39; purring helps alleviate the dysplasia or osteoporotic conditions that are more common in their canid cousins. Although it is tempting to state that cats purr because they are happy, it is more plausible that cat purring is a means of communication and a potential source of self-healing.</p>\r\n', 'Cats Purr Healing', 0, 3, '2015-01-05 20:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `NAME` varchar(60) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `CONTENT` varchar(1200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`UID` int(11) NOT NULL,
  `UNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `FNAME` varchar(10) NOT NULL,
  `LNAME` varchar(20) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `ISADMIN` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `UNAME`, `PASSWORD`, `FNAME`, `LNAME`, `EMAIL`, `ISADMIN`) VALUES
(7, 'sarbu.alexandru', 'MTIzNDU=', 'Sarbu', 'Alexandru', 'sarbu_alexandru_92@yahoo.com', 1),
(8, 'nixi', 'cXdlcnR5', 'Iancu', 'Nicusor', 'nicusormail@iancu.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`ARTICLEID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
MODIFY `ARTICLEID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
