-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.26-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for web_assignment
CREATE DATABASE IF NOT EXISTS `web_assignment` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `web_assignment`;

-- Dumping structure for table web_assignment.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(150) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table web_assignment.admin: ~0 rows (approximately)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `username`, `password`) VALUES
	(1, 'admin', '5510d26e1eab01fe52d119b87d787a7a');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table web_assignment.book
CREATE TABLE IF NOT EXISTS `book` (
  `title` varchar(150) NOT NULL,
  `author` varchar(150) NOT NULL,
  `isbn` int(10) unsigned zerofill NOT NULL,
  `description` varchar(3000) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table web_assignment.book: ~11 rows (approximately)
DELETE FROM `book`;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` (`title`, `author`, `isbn`, `description`, `id`) VALUES
	('Bulletproff Web Design', 'Dan Cederholm', 0321509021, 'No matter how visually appealing or content-packed a Web site may be, if it\'s not adaptable to a variety of situations and reaching the widest possible audience, it isn\'t really succeeding. In Bulletproof Web Desing, author and Web designer extraordinaire, Dan Cederholm outlines standards-based strategies for building designs that provide flexibility, readability, and user control--key components of every sucessful site. Each chapter starts out with an example of an unbulletproof site one that employs a traditional HTML-based approach which Dan then deconstructs, pointing out its limitations. He then gives the site a make-over using XHTML and Cascading Style Sheets (CSS), so you can see how to replace bloated code with lean markup and CSS for fast-loading sites that are accessible to all users. Finally, he covers several popular fluid and elastic-width layout techniques and pieces together all of the page components discussed in prior chapters into a single-page template.', 1),
	('Generation X', 'Douglas Coupland', 0349108390, 'Members of Generation X were children during a time of shifting societal values and as children were sometimes called the "latchkey generation", due to reduced adult supervision compared to previous generations, a result of increasing divorce rates and increased\r\n maternal participation in the workforce, prior to widespread availability of childcare options outside the home. As adolescents and young adults, they were dubbed the "MTV Generation" \r\n(a reference to the music video channel of the same name). In the early 1990s they were sometimes characterized as slackers, cynical and disaffected. Some of the cultural influences on Gen X youth were\r\n the musical genres of grunge and hip hop music, and indie films. In midlife, research describes them as active, happy, and achieving a work life balance. The cohort has been credited with entrepreneurial tendencies.', 2),
	('Hacker Culture', 'Douglas Thomas', 0322458832, 'Hacker culture history: Since the 1983 release of the movieWarGames, the figure of the computer hacker has been inextricably linked to the cultural, social, and political history of the computer. That history, however, is fraught with complexity and contradictions that involve mainstream media representations and cultural anxieties about technology.', 3),
	('Hancrafted CSS', 'Dan Cederholm', 0321643380, 'There s a real connection between craftsmanship and Web design. That s the theme running through Handcrafted CSS: More Bulletproof Web Design, by bestselling author Dan Cederholm, with a chapter contributed by renowned Web designer and developer Ethan Marcotte. This book explores CSS3 that works in today s browsers, and you ll be convinced that now s the time to start experimenting with it. Whether you re a Web designer, project manager, or a graphic designer wanting to learn more about the fluidity that s required when designing for the Web, you ll discover the tools to create the most flexible, reliable, and bulletproof Web designs. And you ll finally be able to persuade your clients to adopt innovative and effective techniques that make everyone s life easier while improving the end user', 4),
	('Introducing HTML 5', 'Remy Sharp', 0321687299, 'HTML5 is the longest HTML specification ever written. It is also the most powerful, and in some ways, the most confusing. What do accessible,\r\n content-focused standards-based web designers and front-end developers need to know? And how can we harness the power of HTML5 in todays browsers? \r\nIn this brilliant and entertaining users guide, Jeremy Keith cuts to the chase, with crisp, clear, practical examples, and his patented twinkle and charm', 5),
	('The Art of Computer Programming', 'Donald Knuth', 0321553247, 'The bible of all fundamental algorithms and the work that taught many of today s software developers most of what they know about computer programming.-Byte, September 1995 Countless readers have spoken about the profound personal influence of Knuth s work. Scientists have marveled at the beauty and elegance of his analysis, while ordinary...', 6),
	('The Practice of Programming', 'Brian W. Kernighan', 0332557465, 'With the same insight and authority that made their book The Unix Programming Environment a classic, Brian Kernighan and Rob Pike have written The Practice of Programming to help make individual programmers more effective and productive.', 7),
	('The Tipping Point', 'Malcolm Gladwell', 0349113467, 'The tipping point is that magic moment when an idea, trend, or social behavior crosses a threshold, tips, and spreads like wildfire. Just as a single sick person can start an epidemic of the flu, so too can a small but precisely targeted push cause a fashion trend, the popularity of a new product, or a drop in the crime rate. This widely acclaimed bestseller, in which Malcolm Gladwell explores and brilliantly illuminates the tipping point phenomenon, is already changing the way people throughout the world think about selling products and disseminating ideas.', 8),
	('Get Coding', 'Young Rewired State', 0312445847, 'Learn how to write code and then build your own website, app and game using HTML, CSS and JavaScript in this essential guide to coding for kids from expert organization Young Rewired State. Over 6 fun missions learn the basic concepts of coding or computer programming and help Professor Bairstone and Dr Day keep the Monk Diamond safe from dangerous jewel thieves. In bite-size chunks learn important real-life coding skills and become a technology star of the future. Young Rewired State is a global community that aims to get kids coding and turn them into the technology stars of the future.          ', 11),
	('The Internet of Money', 'Andreas M. Antonopoulos', 0389956455, 'While many books explain the how of bitcoin, The Internet of Money delves into the why of bitcoin. Acclaimed information-security expert and author of Mastering Bitcoin, Andreas M. Antonopoulos examines and contextualizes the significance of bitcoin through a series of essays spanning the exhilarating maturation of this technology. \r\nBitcoin, a technological breakthrough quietly introduced to the world in 2008, is transforming much more than finance. Bitcoin is disrupting antiquated industries to bring financial independence to billions worldwide. In this book, Andreas explains why bitcoin is a financial and technological evolution with potential far exceeding the label digital currency.  ', 12),
	('Dont Make Me Think', 'Steve Krug', 0322221457, 'Since Dont Make Me Think was first published in 2000, hundreds of thousands of Web designers and developers have relied on usability guru Steve Krugs guide to help them understand the principles of intuitive navigation and information design. Witty, commonsensical, and eminently practical, it is one of the best-loved and most recommended books on the subject.', 13);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;

-- Dumping structure for table web_assignment.checkedout
CREATE TABLE IF NOT EXISTS `checkedout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `b_id` int(10) unsigned NOT NULL,
  `s_student_id` int(7) NOT NULL,
  `date_issue` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table web_assignment.checkedout: ~6 rows (approximately)
DELETE FROM `checkedout`;
/*!40000 ALTER TABLE `checkedout` DISABLE KEYS */;
INSERT INTO `checkedout` (`id`, `b_id`, `s_student_id`, `date_issue`) VALUES
	(7, 6, 2016788, 1511098199),
	(9, 8, 2014547, 1512477744),
	(12, 1, 2014575, 1513965343),
	(13, 4, 2014575, 1513965350),
	(14, 5, 2014575, 1513965368);
/*!40000 ALTER TABLE `checkedout` ENABLE KEYS */;

-- Dumping structure for table web_assignment.student
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(7) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table web_assignment.student: ~17 rows (approximately)
DELETE FROM `student`;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`student_id`, `username`, `password`) VALUES
	(1552457, 'lkioo', '2f64c803295e41048bd5f0555eee6050'),
	(2011228, 'julio', '2f64c803295e41048bd5f0555eee6050'),
	(2014333, 'andres', '2f64c803295e41048bd5f0555eee6050'),
	(2014547, 'naco', '2f64c803295e41048bd5f0555eee6050'),
	(2014575, 'asmerb', '2f64c803295e41048bd5f0555eee6050'),
	(2014784, 'maria', '2f64c803295e41048bd5f0555eee6050'),
	(2014785, 'julia', '2f64c803295e41048bd5f0555eee6050'),
	(2014859, 'asmerr', '2f64c803295e41048bd5f0555eee6050'),
	(2015457, 'Elena', '2f64c803295e41048bd5f0555eee6050'),
	(2015478, 'gloria', '2f64c803295e41048bd5f0555eee6050'),
	(2016228, 'asmer', '2f64c803295e41048bd5f0555eee6050'),
	(2016328, 'asmerbt', '2f64c803295e41048bd5f0555eee6050'),
	(2016337, 'johan', '04b4b1367cffb5fb1b4808f0f394378e'),
	(2016589, 'carlo', '$2y$10$W3YontqNp.pyHr4uMX8ytOCxAT9juKaiv2lirOO6L4EBckDCoeZoe'),
	(2016788, 'draco', '2f64c803295e41048bd5f0555eee6050'),
	(2016889, 'irlanda', '2f64c803295e41048bd5f0555eee6050'),
	(2154895, 'pedro', 'a42234a0a85cb72b775cdf923955929c'),
	(4577854, 'ghtllk', '2f64c803295e41048bd5f0555eee6050');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
