-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2016 at 11:11 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wtos11`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `adminType` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobileNo` int(10) NOT NULL,
  `addedDate` datetime NOT NULL,
  `active` varchar(10) NOT NULL,
  `addedBy` int(10) NOT NULL,
  `modifyBy` int(10) NOT NULL,
  `modifyDate` datetime NOT NULL,
  `access` varchar(200) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `name`, `adminType`, `username`, `password`, `address`, `email`, `mobileNo`, `addedDate`, `active`, `addedBy`, `modifyBy`, `modifyDate`, `access`) VALUES
(26, 'webhouse', 'Super Admin', '123', '123', '', '456456456', 123456789, '2012-12-15 12:09:37', 'Active', 0, 26, '2016-01-27 01:49:32', ''),
(32, 'jack', 'Admin', '555', '555', '27', 'wtos-images/295840_image6.PNG', 4444, '2016-02-25 10:23:15', 'Active', 26, 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `contactid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `details` text NOT NULL,
  `addedBy` varchar(10) NOT NULL,
  `addedDate` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'New',
  PRIMARY KEY (`contactid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactid`, `name`, `email`, `mobile`, `details`, `addedBy`, `addedDate`, `active`, `image`, `status`) VALUES
(8, 'Mizanur Rahaman', 'mizanur82@gmail.com', '5555555555555', 'techno test', '', '2013-01-06 01:45:13', 0, 'wtos-images/822096_testattachment.txt', ''),
(9, 'xdfsdfsd', 'fdfsd', 'fsdfsdfsfs', '', '', '2013-02-08 05:38:36', 0, '', ''),
(10, '111111', '2222222', '', '', '', '2016-03-03 10:07:36', 0, '', ''),
(11, '111111', '2222222', '', '', '', '2016-03-03 10:08:54', 0, '', ''),
(12, '111111', '2222222', '', '', '', '2016-03-03 10:10:07', 0, '', ''),
(13, '111111', '2222222', '', '', '', '2016-03-03 10:11:00', 0, '', ''),
(14, 'dddd', 'dddddd', '', '', '', '2016-03-03 10:28:34', 0, '', ''),
(15, 'dddd', 'dddddd', '', '', '', '2016-03-03 10:28:53', 0, '', ''),
(16, 'fffff', 'dddd', '4444', '4', '', '2016-03-03 11:33:10', 0, '', 'New Message'),
(17, 'fdg', 'grgr', 'gg', 'f', '', '2016-03-03 11:53:46', 0, '', 'New Message'),
(18, 'fdg', 'grgr', 'gg', 'f', '', '2016-03-03 11:56:02', 0, '', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `gallerycatagory`
--

CREATE TABLE IF NOT EXISTS `gallerycatagory` (
  `galleryCatagoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL DEFAULT '1',
  `addedBy` int(10) NOT NULL,
  `addedDate` datetime NOT NULL,
  PRIMARY KEY (`galleryCatagoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `gallerycatagory`
--

INSERT INTO `gallerycatagory` (`galleryCatagoryId`, `categoryName`, `active`, `addedBy`, `addedDate`) VALUES
(10, '2014', 'Inactive', 0, '0000-00-00 00:00:00'),
(11, '2013', 'Active', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `imageuploader`
--

CREATE TABLE IF NOT EXISTS `imageuploader` (
  `imageId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `addedDate` datetime NOT NULL,
  PRIMARY KEY (`imageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `imageuploader`
--

INSERT INTO `imageuploader` (`imageId`, `title`, `image`, `addedDate`) VALUES
(14, '', 'wtos-images/744579_732307_20150819_135423.jpg', '0000-00-00 00:00:00'),
(15, 's', 'wtos-images/151301_1.png', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `langId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `code` varchar(20) NOT NULL,
  `defaultLang` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `addedBy` int(10) NOT NULL,
  `addedDate` datetime NOT NULL,
  PRIMARY KEY (`langId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`langId`, `title`, `code`, `defaultLang`, `active`, `addedBy`, `addedDate`) VALUES
(1, 'English', 'en', 1, 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE IF NOT EXISTS `noticeboard` (
  `noticeboardId` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `link` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL,
  `priority` int(5) NOT NULL,
  `status` varchar(10) NOT NULL,
  `addedBy` int(10) NOT NULL,
  `addedDate` datetime NOT NULL,
  PRIMARY KEY (`noticeboardId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`noticeboardId`, `title`, `link`, `file`, `priority`, `status`, `addedBy`, `addedDate`) VALUES
(1, 'The Vijay Mallya story: How the King of Good Times made bakras of 17 banks', '1', 'wtos-images/507725_adminstructureindia.jpg', 5, 'Inactive', 26, '2016-03-10 07:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `pagecontent`
--

CREATE TABLE IF NOT EXISTS `pagecontent` (
  `pagecontentId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET latin1 NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `metaTag` varchar(200) CHARACTER SET latin1 NOT NULL,
  `metaDescription` varchar(255) CHARACTER SET latin1 NOT NULL,
  `addedBy` int(11) NOT NULL,
  `editedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `parentPage` varchar(10) CHARACTER SET latin1 NOT NULL,
  `preInclude` varchar(50) CHARACTER SET latin1 NOT NULL,
  `postInclude` varchar(50) CHARACTER SET latin1 NOT NULL,
  `seoId` varchar(250) CHARACTER SET latin1 NOT NULL,
  `externalLink` varchar(255) CHARACTER SET latin1 NOT NULL,
  `priority` int(4) NOT NULL,
  `heading` varchar(255) CHARACTER SET latin1 NOT NULL,
  `onHead` tinyint(1) NOT NULL,
  `onBottom` tinyint(1) NOT NULL,
  `openNewTab` tinyint(1) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `showImage` tinyint(1) NOT NULL,
  `langId` int(5) NOT NULL,
  `pageCss` text COLLATE utf8_unicode_ci NOT NULL,
  `metaTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isHome` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pagecontentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=75 ;

--
-- Dumping data for table `pagecontent`
--

INSERT INTO `pagecontent` (`pagecontentId`, `title`, `content`, `active`, `metaTag`, `metaDescription`, `addedBy`, `editedBy`, `addedDate`, `parentPage`, `preInclude`, `postInclude`, `seoId`, `externalLink`, `priority`, `heading`, `onHead`, `onBottom`, `openNewTab`, `image`, `showImage`, `langId`, `pageCss`, `metaTitle`, `isHome`) VALUES
(26, 'HOME', '<p>wtbox-Network-wtbox</p>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', 1, 'Home', 'Home', 26, 0, '2016-03-10 09:06:45', '0', '', '', 'homepage', '', 1, 'vuuuu', 1, 0, 0, '', 0, 1, '<style>.re{color:red;}</style>\r\n<div class="re">This s testing style </div>', '', 'No'),
(27, 'ABOUT US', '<p><span style="color: #008000;"><strong>&nbsp;&nbsp;wtbox-about us bengali -wtbox</strong><strong> <img src="../wtos-images/443785_Copy-of-photo-059.jpg" alt="" width="600" height="300" /></strong></span></p>\r\n<p style="text-align: justify;"><span style="color: #008000;"><strong>&nbsp;<br /></strong><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">TECHNO ENVIRON ENGINEERS (TEE) is consultancy organization entirely by specialized team of expertise that positioned industrial growth on the frontier of the Indian economy, in the engineering &amp; environmental map.</span></em></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">TECHNO ENVIRON ENGINEERS (TEE) is established for providing consulting engineering and Environment Clearance with EIA Studies services in India. The company offers integrated design and engineering consultancy services from concept to completion for a wide range of projects like </span><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">:<br /></span></em></span><br /><strong><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Integrated steel plant, which consists of Steel Plant, Power Plant, Sponge Iron, Blast Furnace, &nbsp;Rolling Mill, Ferro alloys, Cement Beneficiation.</span></em></span></strong><br /><strong><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Project Management activities like monitoring of present Environmental status and site selection as per the rules of MOEF, CPCB for different Industries.</span></em></span></strong><br /><br /><br /><br /><strong><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">OUR STRENGTHS</span></em></span></strong><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">&nbsp;</span></em></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">A tradition of excellence.</span></em></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Dedication to achieve goals.<br /></span></em></span><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">To obey the Rules &amp; Regulations of MOEF,&nbsp; CPCB &amp; State P.C.B</span></em></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">A team of qualified Engineers / Executives.</span></em></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Always towards commitment and solutions</span></em></span><br /><span style="color: #008000;"><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Assurance and working towards customers&rsquo; satisfaction.</span></em><br /><br /><br /><strong><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Services being provided by the Organisation are-</span></em></strong></span></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Environment Impact Assessment</span></em></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Design of Effluent Treatment Plant</span></em></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Operation and Maintenance of Effluent Treatment Plant, Water Treatment Plant and Sewage Treatment Plant</span></em></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Waste Water reuse Plan</span></em></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Waste Management Plan</span></em></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Air pollution control device supply &amp; commissioning</span></em></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Stack Monitoring</span></em></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Ambient Air Monitoring</span></em></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Air Dispersion Modeling</span></em></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Land use Preparation</span></em></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Quarry building through GIS System</span></em></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">Forest Diversion Plan</span></em></span><br /><span style="color: #008000;"><em><span style="font-size: medium; font-family: arial, helvetica, sans-serif;">&nbsp;</span></em></span><br /><br /><span style="color: #008000;">&nbsp;</span></p>', 1, 'About Us', 'About Us', 26, 0, '2014-03-23 06:08:55', '0', '', '', 'About Us', '', 2, 'ABOUT TECHNO ENVIRON ENGINEERS', 1, 0, 0, 'wtos-images/359009_about-us.png', 0, 1, '', '', 'Yes'),
(31, 'CONTACT US', '<p style="text-align: left;"><img src="../wtos-images/740981_732307_20150819_135423.jpg" alt="" /><img src="../wtos-images/714936_logo%20(1).png" alt="" /><br /><br /><span style="font-size: medium; color: #008000;"><em><span style="font-family: arial, helvetica, sans-serif;">TECHNO ENVIRON ENGINEERS</span></em></span><br /><span style="font-size: medium; color: #008000;"><em><span style="font-family: arial, helvetica, sans-serif;">At/Po - NILGUNGE BAZAR, BARASAT</span></em></span><br /><span style="font-size: medium; color: #008000;"><em><span style="font-family: arial, helvetica, sans-serif;">BARRACKPORE ROAD</span></em></span><br /><span style="font-size: medium; color: #008000;"><em><span style="font-family: arial, helvetica, sans-serif;">KOLKATA- 700121</span></em></span><br /><span style="font-size: medium; color: #008000;"><em><span style="font-family: arial, helvetica, sans-serif;">TELE/FAX 033-64178869</span></em></span><br /><span style="font-size: medium; color: #008000;"><em><span style="font-family: arial, helvetica, sans-serif;">MOB: 09088919330</span></em></span><br /><span style="color: #008000;">&nbsp;wtpage-contact-us.php-wtpage</span></p>', 0, 'Contact', 'Contact', 26, 0, '2016-02-26 01:16:47', '0', '', '', 'Contact', '', 4, 'Contact', 1, 0, 0, '', 0, 1, '', '', 'No'),
(42, 'SERVICES', '<p><br /><img src="../wtos-images/151301_1.png" alt="" width="600" height="350" /><br /><br /><br /><br /></p>\r\n<ul>\r\n<li><em><span style="color: #008000; font-size: medium; font-family: arial, helvetica, sans-serif;">Environment Impact Assessment</span></em></li>\r\n<li><em><span style="color: #008000; font-size: medium; font-family: arial, helvetica, sans-serif;">Design of Effluent Treatment Plant</span></em></li>\r\n<li><em><span style="color: #008000; font-size: medium; font-family: arial, helvetica, sans-serif;">Operation and Maintenance of Effluent Treatment Plant, Water Treatment Plant and Sewage Treatment Plant</span></em></li>\r\n<li><em><span style="color: #008000; font-size: medium; font-family: arial, helvetica, sans-serif;">Waste Water reuse Plan</span></em></li>\r\n<li><em><span style="color: #008000; font-size: medium; font-family: arial, helvetica, sans-serif;">Waste Management Plan</span></em></li>\r\n<li><em><span style="color: #008000; font-size: medium; font-family: arial, helvetica, sans-serif;">Air pollution control device supply &amp; commissioning</span></em></li>\r\n<li><em><span style="color: #008000; font-size: medium; font-family: arial, helvetica, sans-serif;">Stack Monitoring</span></em></li>\r\n<li><em><span style="color: #008000; font-size: medium; font-family: arial, helvetica, sans-serif;">Ambient Air Monitoring</span></em></li>\r\n<li><em><span style="color: #008000; font-size: medium; font-family: arial, helvetica, sans-serif;">Air Dispersion Modeling</span></em></li>\r\n<li><em><span style="color: #008000; font-size: medium; font-family: arial, helvetica, sans-serif;">Land use Preparation</span></em></li>\r\n<li><em><span style="color: #008000; font-size: medium; font-family: arial, helvetica, sans-serif;">Quarry building through GIS System</span></em></li>\r\n<li><em><span style="color: #008000; font-size: medium; font-family: arial, helvetica, sans-serif;">Forest Diversion Plan.</span></em></li>\r\n</ul>\r\n<p>&nbsp;</p>', 1, 'SERVICES', 'SERVICES', 26, 0, '2016-03-02 10:03:30', '0', '', '', 'services', '', 2, 'SERVICES BEING PROVIDED BY THE ORGANISATION ', 1, 0, 0, '', 0, 1, '', '', 'No'),
(46, '123', '<p>33333</p>', 0, 'zssfgr', 'zssfgr', 26, 0, '2016-03-02 10:07:40', '0', '333', '33', '123', 'https://devot-ee.com/articles/item/simple-htaccess-for-expressionengine-sites', 10, 'zssfgr', 1, 0, 1, 'wtos-images/571016_21.png', 0, 1, '9', '333', 'No'),
(47, 'rfqwet3rt', '', 0, 'rfqwet3rt', 'rfqwet3rt', 26, 0, '2016-01-05 06:24:16', '0', '', '', 'rfqtwer', '', 10, 'rfqwet3rt', 1, 0, 0, '', 0, 1, '', '', 'No'),
(48, 'df333333333333333', '', 0, 'df', 'df', 26, 0, '2016-01-21 06:55:44', '0', '', '', 'dftf', '', 10, 'df', 1, 0, 0, '', 0, 1, '', '', 'No'),
(50, '&#2438;&#2478;&#2494;&#2470;&#2503;&#2480; ', '<p>?????? ???????? ?????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ?????????????? ????????</p>', 0, '&#2438;&#2478;&#2494;&#2470;&#2503;&#2480; ', '&#2438;&#2478;&#2494;&#2470;&#2503;&#2480; ', 26, 0, '2016-02-12 05:39:04', '0', '', '', 'amara-ke', '', 10, '&#2438;&#2478;&#2494;&#2470;&#2503;&#2480; ', 1, 0, 0, 'wtos-images/508792_1-1-1sr228dr-heena-1000x1000-imae6brafq2bjzrq.jpeg', 0, 2, '<style></style>', '', 'No'),
(73, '12344444555', '', 0, '', '', 26, 0, '2016-03-01 01:25:41', '0', '', '', '', '', 10, '', 0, 0, 0, '', 0, 1, '', '', 'No'),
(74, 'ddddddddd', '<p><img src="../wtos-images/740981_732307_20150819_135423.jpg" alt="" /></p>', 1, '', '', 26, 0, '2016-03-10 07:01:45', '0', '', '', 'ddddddddd', '', 3, 'ddddddddd', 1, 0, 0, '', 0, 1, '', '', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `photogallery`
--

CREATE TABLE IF NOT EXISTS `photogallery` (
  `photoGalleryId` int(10) NOT NULL AUTO_INCREMENT,
  `galleryCatagoryId` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `addedBy` int(10) NOT NULL,
  `addedDate` datetime NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`photoGalleryId`),
  KEY `photoGalleryId` (`photoGalleryId`),
  KEY `galleryCatagoryId` (`galleryCatagoryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=205 ;

--
-- Dumping data for table `photogallery`
--

INSERT INTO `photogallery` (`photoGalleryId`, `galleryCatagoryId`, `name`, `title`, `addedBy`, `addedDate`, `status`) VALUES
(200, 10, 'wtos-images/998353_adminstructureindia.jpg', 'hi', 0, '0000-00-00 00:00:00', 'Active'),
(201, 11, 'wtos-images/867381_ok.jpg', 'yy', 0, '0000-00-00 00:00:00', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `settingsId` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(200) NOT NULL,
  `value` text NOT NULL,
  `system` tinyint(1) NOT NULL DEFAULT '0',
  `addedBy` int(10) NOT NULL,
  `addedDate` datetime NOT NULL,
  PRIMARY KEY (`settingsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settingsId`, `keyword`, `value`, `system`, `addedBy`, `addedDate`) VALUES
(1, 'email', 'admin@webtrackers.co.in', 0, 0, '0000-00-00 00:00:00'),
(2, 'metaKey', '', 0, 0, '0000-00-00 00:00:00'),
(3, 'metaDescription', '', 0, 0, '0000-00-00 00:00:00'),
(4, 'siteTitle', '', 0, 0, '0000-00-00 00:00:00'),
(5, 'pageCount', '9', 1, 0, '0000-00-00 00:00:00'),
(7, 'Deactivate Site', '0', 0, 0, '0000-00-00 00:00:00'),
(8, 'Deactivate Message', 'Site Temporarily Under Construction . Please contact admin@webtrtackerts.co.in', 1, 0, '0000-00-00 00:00:00'),
(9, 'Validate Wtos', 'not in use', 1, 0, '0000-00-00 00:00:00'),
(10, 'Validate WtosMessage', 'Please contact admin@webtrackers.co.in to enjoy uninterrupted service.', 1, 0, '0000-00-00 00:00:00'),
(11, 'Validate WtosDate', '==gMwEzNtAzNtAzM', 1, 0, '0000-00-00 00:00:00'),
(12, 'Deactivate Date', '2017-07-02', 1, 0, '0000-00-00 00:00:00'),
(13, 'language', '2', 1, 0, '0000-00-00 00:00:00'),
(14, 'Styles', '<style> </style>', 0, 0, '0000-00-00 00:00:00'),
(15, 'hitCoount', '1927', 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wtbox`
--

CREATE TABLE IF NOT EXISTS `wtbox` (
  `wtboxId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `accessKey` varchar(20) NOT NULL,
  `langId` int(11) NOT NULL,
  `css` text NOT NULL,
  `container` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `tinymce` varchar(10) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `addedDate` datetime NOT NULL,
  `active` varchar(10) NOT NULL,
  `system` varchar(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`wtboxId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wtbox`
--

INSERT INTO `wtbox` (`wtboxId`, `title`, `accessKey`, `langId`, `css`, `container`, `content`, `tinymce`, `addedBy`, `addedDate`, `active`, `system`) VALUES
(1, 'Network', 'Network', 1, 'border:2px solid #000000;padding:10px;', '', 'hi network hi network hi network hi \r\n', 'No', 26, '2014-03-23 06:08:25', 'Active', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
