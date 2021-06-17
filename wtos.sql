-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2021 at 06:38 PM
-- Server version: 8.0.22
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wtosv20`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessdetails`
--

CREATE TABLE `accessdetails` (
  `accessdetailsId` int NOT NULL,
  `name` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `url` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `details` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `addedDate` datetime NOT NULL,
  `provider` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedBy` int NOT NULL,
  `company` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cName` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cPhone` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `note` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `activestatus` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `domainExp` datetime NOT NULL,
  `softwareExp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int NOT NULL,
  `name` varbinary(50) DEFAULT NULL,
  `adminType` varbinary(20) DEFAULT NULL,
  `username` varbinary(50) DEFAULT NULL,
  `password` varbinary(50) DEFAULT NULL,
  `address` blob,
  `email` varbinary(50) DEFAULT NULL,
  `mobileNo` int NOT NULL,
  `addedDate` datetime NOT NULL,
  `active` varbinary(10) DEFAULT NULL,
  `addedBy` int NOT NULL,
  `modifyBy` int NOT NULL,
  `modifyDate` datetime NOT NULL,
  `access` varbinary(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `name`, `adminType`, `username`, `password`, `address`, `email`, `mobileNo`, `addedDate`, `active`, `addedBy`, `modifyBy`, `modifyDate`, `access`) VALUES
(26, 0x776562686f757365, 0x53757065722041646d696e, 0x303031, 0x303031, '', 0x343536343536343536, 123456789, '2012-12-15 12:09:37', 0x416374697665, 0, 26, '2016-01-27 01:49:32', 0x4163636573732c436f6e74616374732c52656d696e6465722c4461696c792041637469766974792c466f6c6c6f777570),
(27, 0x53756d616e2042657261, 0x41646d696e, 0x73756d616e, 0x31323373756d616e, '', '', 0, '2016-12-07 08:50:57', 0x416374697665, 26, 0, '0000-00-00 00:00:00', 0x7b2261646d696e4c6973742e706870223a5b22414444222c2244454c455445222c2245444954222c2256494557225d7d);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactid` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `mobile` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `details` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `addedBy` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedDate` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `followupcategory`
--

CREATE TABLE `followupcategory` (
  `catId` int NOT NULL,
  `title` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `parentId` int NOT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` mediumint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `followupcontact`
--

CREATE TABLE `followupcontact` (
  `id` int NOT NULL,
  `name` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `phone` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `shortNote` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `followStatus` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedDate` datetime NOT NULL,
  `catId` int NOT NULL,
  `addedBy` mediumint NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `date` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `priority` int NOT NULL DEFAULT '10',
  `company` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `appDate` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `productName` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `assignTo` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `source` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nextFollowDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `followuphistory`
--

CREATE TABLE `followuphistory` (
  `followuphistoryId` int NOT NULL,
  `dated` datetime NOT NULL,
  `remarks` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedBy` int NOT NULL,
  `addedDate` datetime NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gallerycatagory`
--

CREATE TABLE `gallerycatagory` (
  `galleryCatagoryId` int NOT NULL,
  `categoryName` varbinary(255) DEFAULT NULL,
  `active` varbinary(10) DEFAULT NULL,
  `addedBy` int NOT NULL,
  `addedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallerycatagory`
--

INSERT INTO `gallerycatagory` (`galleryCatagoryId`, `categoryName`, `active`, `addedBy`, `addedDate`) VALUES
(10, 0x32303134, 0x496e616374697665, 0, '0000-00-00 00:00:00'),
(11, 0x32303133, 0x416374697665, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `imageuploader`
--

CREATE TABLE `imageuploader` (
  `imageId` int NOT NULL,
  `title` varbinary(255) DEFAULT NULL,
  `image` varbinary(255) DEFAULT NULL,
  `addedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imageuploader`
--

INSERT INTO `imageuploader` (`imageId`, `title`, `image`, `addedDate`) VALUES
(14, '', 0x77746f732d696d616765732f3734343537395f3733323330375f32303135303831395f3133353432332e6a7067, '0000-00-00 00:00:00'),
(15, 0x73, 0x77746f732d696d616765732f3135313330315f312e706e67, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE `lang` (
  `langId` int NOT NULL,
  `title` varbinary(255) DEFAULT NULL,
  `code` varbinary(20) DEFAULT NULL,
  `defaultLang` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `addedBy` int NOT NULL,
  `addedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`langId`, `title`, `code`, `defaultLang`, `active`, `addedBy`, `addedDate`) VALUES
(1, 0x456e676c697368, 0x656e, 1, 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mobilebills`
--

CREATE TABLE `mobilebills` (
  `mobilebillsId` int NOT NULL,
  `mobile` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `relationshipno` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `bilno` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `billdate` datetime NOT NULL,
  `billperiod` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `duedate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `amount` varchar(9) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `bill` float(10,2) NOT NULL,
  `paidamount` varchar(9) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `paiddate` datetime NOT NULL,
  `transno` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `accno` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `noteId` int NOT NULL,
  `catId` int NOT NULL,
  `subject` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `details` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `active` tinyint NOT NULL DEFAULT '1',
  `addedDate` datetime NOT NULL,
  `addedBy` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE `noticeboard` (
  `noticeboardId` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `link` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `file` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `priority` int NOT NULL,
  `status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedBy` int NOT NULL,
  `addedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`noticeboardId`, `title`, `link`, `file`, `priority`, `status`, `addedBy`, `addedDate`) VALUES
(1, 'The Vijay Mallya story: How the King of Good Times made bakras of 17 banks', '1', 'wtos-images/507725_adminstructureindia.jpg', 5, 'Inactive', 26, '2016-03-10 07:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `pagecontent`
--

CREATE TABLE `pagecontent` (
  `pagecontentId` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `active` tinyint NOT NULL DEFAULT '1',
  `metaTag` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `metaDescription` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedBy` int NOT NULL,
  `editedBy` int NOT NULL,
  `addedDate` datetime NOT NULL,
  `parentPage` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `preInclude` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `postInclude` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `seoId` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `externalLink` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `priority` int NOT NULL,
  `heading` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `onHead` tinyint(1) NOT NULL,
  `onBottom` tinyint(1) NOT NULL,
  `openNewTab` tinyint(1) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `showImage` tinyint(1) NOT NULL,
  `langId` int NOT NULL,
  `pageCss` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `metaTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `isHome` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `loginRequired` int DEFAULT '0',
  `template` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pagecontent`
--

INSERT INTO `pagecontent` (`pagecontentId`, `title`, `icon`, `excerpt`, `content`, `active`, `metaTag`, `metaDescription`, `addedBy`, `editedBy`, `addedDate`, `parentPage`, `preInclude`, `postInclude`, `seoId`, `externalLink`, `priority`, `heading`, `onHead`, `onBottom`, `openNewTab`, `image`, `showImage`, `langId`, `pageCss`, `metaTitle`, `isHome`, `loginRequired`, `template`) VALUES
(1, 'Home', '', 'Leaf is a PHP framework that helps you create clean, simple but powerful web apps and APIs quickly. Leaf introduces a cleaner and much simpler structure to the PHP language while maintaining it\'s flexibility.', '<section>\r\n<h2 id=\"what-is-leaf\"><span>What is Leaf</span></h2>\r\n<p>Leaf is a PHP framework that helps you create clean, simple but powerful web apps and APIs quickly. Leaf introduces a cleaner and much simpler structure to the PHP language while maintaining it\'s flexibility.</p>\r\n<p>With a simple structure and a shallow learning curve, it\'s an excellent way to rapidly build powerful and high performant web apps and APIs.</p>\r\n<p>To get started, simply install Leaf, and you\'re good to go.</p>\r\n<h2 id=\"?-installation\"><span>Installation</span></h2>\r\n<p>There are 2 main ways available. Using composer makes everything a lot easier, but if you want more control and customization, you might want to download the source code and setup an autoloader. This way, you can directly edit leaf\'s files to behave the way you decide.</p>\r\n<h3 id=\"composer-installation\"><span>Composer installation</span></h3>\r\n<p>Composer is a dependency manager for PHP, just like npm for javascript and ruby gems. Therefore, you need to have PHP installed on your system. If you don\'t already have composer installed, you can download it&nbsp;<a href=\"https://getcomposer.org/\" target=\"_blank\" rel=\"noopener\">here</a></p>\r\n<p>After downloading composer, you can run this command to install leaf in your project folder.</p>\r\n<pre data-lang=\"bash\"><code class=\"lang-bash\">composer require leafs/leaf</code></pre>\r\n<h3 id=\"github-clone\"><span>Github clone</span></h3>\r\n<p>You can also clone the repo and setup your autoloader.</p>\r\n<div class=\"download-alert\">\r\n<h3>Setup</h3>\r\n<p>You can directly download the v2.5.0 release here.</p>\r\n<a href=\"https://github.com/leafsphp/leaf/archive/v2.5.0.zip\">Download Repo</a></div>\r\n<p><span>Example autoloader:&nbsp;<code>autoloader.php</code></span></p>\r\n<pre data-lang=\"php\"><code class=\"lang-php\"><span class=\"token php language-php\"><span class=\"token delimiter important\">&lt;?php</span>\r\n<span class=\"token function\">spl_autoload_register</span><span class=\"token punctuation\">(</span><span class=\"token keyword\">function</span> <span class=\"token punctuation\">(</span><span class=\"token variable\">$class</span><span class=\"token punctuation\">)</span> <span class=\"token punctuation\">{</span>\r\n  <span class=\"token variable\">$file</span> <span class=\"token operator\">=</span> <span class=\"token function\">str_replace</span><span class=\"token punctuation\">(</span><span class=\"token string single-quoted-string\">\'\'</span><span class=\"token punctuation\">,</span> <span class=\"token string single-quoted-string\">\'/\'</span><span class=\"token punctuation\">,</span> <span class=\"token variable\">$class</span><span class=\"token punctuation\">)</span><span class=\"token punctuation\">;</span>\r\n\r\n  <span class=\"token keyword\">if</span> <span class=\"token punctuation\">(</span><span class=\"token operator\">!</span><span class=\"token function\">file_exists</span><span class=\"token punctuation\">(</span><span class=\"token string double-quoted-string\">\"leaf/src/<span class=\"token interpolation\"><span class=\"token variable\">$file</span></span>.php\"</span><span class=\"token punctuation\">)</span><span class=\"token punctuation\">)</span> <span class=\"token keyword\">return</span><span class=\"token punctuation\">;</span>\r\n\r\n  <span class=\"token keyword\">require</span> <span class=\"token string double-quoted-string\">\"leaf/src/<span class=\"token interpolation\"><span class=\"token variable\">$file</span></span>.php\"</span><span class=\"token punctuation\">;</span>\r\n<span class=\"token punctuation\">}</span><span class=\"token punctuation\">)</span><span class=\"token punctuation\">;</span></span></code></pre>\r\n<p>The autoloader will allow you use leaf files without having to&nbsp;<code>require</code>&nbsp;or&nbsp;<code>include</code>&nbsp;them first. So straight up using&nbsp;<code>LeafAuth</code>&nbsp;will load&nbsp;<code>leafsrcauth.php</code>.</p>\r\n<p><span>This is only required if you downloaded the repo.</span></p>\r\n<h2 id=\"?-deploying-leaf-apps\"><span>Deploying Leaf Apps</span></h2>\r\n<p>Leaf is created and configured to work right out of the box, even in a production environment. No matter what you use: shared hosting, vps, ... with any web server of your choice, if your app works on localhost, it works in production. This is also true for Leaf MVC, Leaf API and skeleton.</p>\r\n<p>This simply means you can use Leaf for projects of all sizes, no matter the environment it\'s going to be deployed in.</p>\r\n</section>', 1, '', '', 26, 0, '2021-06-15 06:05:45', '0', NULL, NULL, '', '', 0, 'wtOS Content Management System', 1, 0, 0, NULL, 0, 1, '', '', 'Yes', 0, 'template-home.php'),
(2, 'About', 'sign-in', 'There are many ways to install Froala WYSIWYG Editor and we suggest to use NPM. Just type in the following command.\r\n', '<div id=\"install\" class=\"docs-group anchor\">\r\n<h2 class=\"title-left-border text-small\">Step 1. Install</h2>\r\n<p><a href=\"https://froala.com/wysiwyg-editor/download/\" target=\"_blank\" rel=\"noopener\">There are many ways</a>&nbsp;to install Froala WYSIWYG Editor and we suggest to use&nbsp;<a href=\"https://froala.com/wysiwyg-editor/download#install-from-npm\">NPM</a>. Just type in the following command:</p>\r\n<pre class=\"prettyprint hljs coffeescript\"><span class=\"hljs-built_in\">npm</span> install froala-editor</pre>\r\n<p>After the installation process is finished, embed this code inside your HTML file:</p>\r\n<pre class=\"prettyprint hljs xml\"><span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">link</span> <span class=\"hljs-attr\">href</span>=<span class=\"hljs-string\">\"node_modules/froala-editor/css/froala_editor.pkgd.min.css\"</span> <span class=\"hljs-attr\">rel</span>=<span class=\"hljs-string\">\"stylesheet\"</span> <span class=\"hljs-attr\">type</span>=<span class=\"hljs-string\">\"text/css\"</span> /&gt;</span>\r\n<span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">script</span> <span class=\"hljs-attr\">type</span>=<span class=\"hljs-string\">\"text/javascript\"</span> <span class=\"hljs-attr\">src</span>=<span class=\"hljs-string\">\"node_modules/froala-editor/js/froala_editor.pkgd.min.js\"</span>&gt;</span><span class=\"hljs-tag\">script</span>&gt;</pre>\r\n<p>As an alternative, you could use CDN:</p>\r\n<pre class=\"prettyprint hljs xml\"><span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">link</span> <span class=\"hljs-attr\">href</span>=<span class=\"hljs-string\">\"https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css\"</span> <span class=\"hljs-attr\">rel</span>=<span class=\"hljs-string\">\"stylesheet\"</span> <span class=\"hljs-attr\">type</span>=<span class=\"hljs-string\">\"text/css\"</span> /&gt;</span>\r\n<span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">script</span> <span class=\"hljs-attr\">type</span>=<span class=\"hljs-string\">\"text/javascript\"</span> <span class=\"hljs-attr\">src</span>=<span class=\"hljs-string\">\"https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js\"</span>&gt;</span><span class=\"hljs-tag\">script</span>&gt;</pre>\r\n</div>\r\n<div id=\"create\" class=\"docs-group anchor\">\r\n<h2 class=\"title-left-border text-small\">Step 2. Create</h2>\r\n<p>The Froala Editor can be initialized on any DOM element, and we recommend do use a&nbsp;<code>DIV</code>&nbsp;element. Add an empty&nbsp;<code></code></p>\r\n<div id=\"example\"></div>\r\n<p><code></code>&nbsp;element that will be turned into a rich text editor.</p>\r\n</div>\r\n<div id=\"init\" class=\"docs-group anchor\">\r\n<h2 class=\"title-left-border text-small\">Step 3. Initialization</h2>\r\nThe last step consists of initializing the Froala Editor on our previously created empty element.\r\n<pre class=\"prettyprint hljs cs\"><span class=\"hljs-keyword\">var</span> editor = <span class=\"hljs-keyword\">new</span> FroalaEditor(<span class=\"hljs-string\">\'#example\'</span>)</pre>\r\n</div>\r\n<div id=\"display\" class=\"docs-group anchor\">\r\n<h2 class=\"title-left-border text-small\">Step 4. Display Content</h2>\r\n<p>To preserve the look of the edited HTML outside of the rich text editor you have to include the following CSS files.</p>\r\n<pre class=\"prettyprint hljs xml\"><span class=\"hljs-comment\"><!-- CSS rules for styling the element inside the editor such as p, h1, h2, etc. --></span>\r\n<span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">link</span> <span class=\"hljs-attr\">href</span>=<span class=\"hljs-string\">\"../css/froala_style.min.css\"</span> <span class=\"hljs-attr\">rel</span>=<span class=\"hljs-string\">\"stylesheet\"</span> <span class=\"hljs-attr\">type</span>=<span class=\"hljs-string\">\"text/css\"</span> /&gt;</span></pre>\r\n<p>Also, you should make sure that you put the edited content inside an element that has the class&nbsp;<code>fr-view</code>.</p>\r\n<div class=\"hljs-class\">class=<span class=\"hljs-string\">\"fr-view\"</span>&gt; Here comes the HTML edited <span class=\"hljs-keyword\">with</span> the Froala rich text editor. &lt;<span class=\"hljs-regexp\"><span class=\"hljs-regexp\">/div&gt;<br /><br /></span></span></div>\r\n</div>', 1, '', '', 26, 0, '2021-06-16 03:53:48', '0', NULL, NULL, 'about', '', 0, 'About Us', 1, 1, 0, 'wtos-images/614440_our_heritage_logo.png', 1, 1, '', '', NULL, 0, 'template-default.php'),
(3, 'Team', 'home', 'Meet the team behind wtOS', '<div class=\"col-sm-6 col-md-4 padd-team\">\r\n<div class=\"portfolio-el view view-team text-center\">\r\n<h3>Why Choose CakeDC</h3>\r\n<h4>On-Demand Management</h4>\r\n<p>We\'ve learned that transparency is key to successful collaborations, so all of our communication is out in the open, with evidence of our progress and results readily available.</p>\r\n<h4>Milestone-Driven Development</h4>\r\n<p>Our agile development cycles are based on milestones, which are designed to always be objective, focused and aim to provide a deliverable so you see your product in the making.</p>\r\n<h4>Full QA Process</h4>\r\n<p>We provide a QA process which is integrated directly into our development iterations, and that\'s based upon clear specifications and acceptance criteria which define our goals.</p>\r\n<h4>Unit Testing</h4>\r\n<p>All of our work is fully testable by default, meaning that everything we deliver is provided in-hand with unit tests to validate our efforts and guarantee it\'s functionality.</p>\r\n<h4>Live Deployment</h4>\r\n<p>During the development we offer a full continuous integration of your project to our private staging servers, which provides us essential insight into code quality, test coverage and impact areas.</p>\r\n</div>\r\n</div>', 1, '', '', 26, 0, '2021-06-16 02:55:00', '0', NULL, NULL, 'team', '', 0, 'Our Team', 1, 1, 0, NULL, 0, 1, '', '', NULL, 0, 'template-default.php');

-- --------------------------------------------------------

--
-- Table structure for table `pagecontentmeta`
--

CREATE TABLE `pagecontentmeta` (
  `pagecontentId` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `dated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pagecontentmeta`
--

INSERT INTO `pagecontentmeta` (`pagecontentId`, `name`, `value`, `dated`) VALUES
(3, 'home_title', 'My name is cool', '2021-06-16 10:07:48'),
(3, 'saver', 'Where is cool', '2021-06-16 10:07:48'),
(2, 'home_title', '', '2021-06-16 12:04:47'),
(2, 'saver', '', '2021-06-16 12:04:47'),
(3, 'yiiyioiouiooi', '', '2021-06-16 14:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `photogallery`
--

CREATE TABLE `photogallery` (
  `photoGalleryId` int NOT NULL,
  `galleryCatagoryId` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedBy` int NOT NULL,
  `addedDate` datetime NOT NULL,
  `status` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rbassessinfo`
--

CREATE TABLE `rbassessinfo` (
  `rbassessinfo` int NOT NULL,
  `refCode` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `url` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `rbcountryId` int NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `person` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `details` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedBy` int NOT NULL,
  `addedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rbcategory`
--

CREATE TABLE `rbcategory` (
  `rbcategoryId` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cateStatus` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedBy` int NOT NULL,
  `addedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rbcontact`
--

CREATE TABLE `rbcontact` (
  `rbcontactId` int NOT NULL,
  `refCode` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `person` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `rbcategoryId` int NOT NULL,
  `rblocationId` int NOT NULL,
  `contactStatus` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `websiteUrl` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `refferBy` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `postcode` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `remarks` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `priority` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedBy` int NOT NULL,
  `addedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rbcountry`
--

CREATE TABLE `rbcountry` (
  `rbcountryId` int NOT NULL,
  `countryCode` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `countryStatus` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedBy` int NOT NULL,
  `addedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rbcountry`
--

INSERT INTO `rbcountry` (`rbcountryId`, `countryCode`, `name`, `countryStatus`, `addedBy`, `addedDate`) VALUES
(99, 'IN', 'India', 'Active', 26, '2016-10-05 06:39:28'),
(229, 'GB', 'United Kingdom', 'Active', 26, '2016-10-05 06:39:28'),
(230, 'US', 'United States', 'Active', 26, '2016-10-05 06:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `rblocation`
--

CREATE TABLE `rblocation` (
  `rblocationId` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `locationStatus` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedBy` int NOT NULL,
  `addedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rblocation`
--

INSERT INTO `rblocation` (`rblocationId`, `name`, `locationStatus`, `addedBy`, `addedDate`) VALUES
(2, 'Kolkata', 'Active', 26, '2016-10-05 11:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `rbpayment`
--

CREATE TABLE `rbpayment` (
  `rbpaymentId` int NOT NULL,
  `rbreminderId` int NOT NULL,
  `paidAmount` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `paidDate` datetime NOT NULL,
  `method` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `details` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `remarks` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedBy` int NOT NULL,
  `addedDate` datetime NOT NULL,
  `systemNo` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rbproduct`
--

CREATE TABLE `rbproduct` (
  `rbproductId` int NOT NULL,
  `refCode` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `productCode` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `model` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedBy` int NOT NULL,
  `addedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rbreminder`
--

CREATE TABLE `rbreminder` (
  `rbreminderId` int NOT NULL,
  `rbcontactId` int NOT NULL,
  `refCode` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `reminderType` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `frequency` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `priorDays` int NOT NULL,
  `registerDate` datetime NOT NULL,
  `fromDate` datetime NOT NULL,
  `expiryDate` datetime NOT NULL,
  `reminderStartDate` datetime NOT NULL,
  `amount` float(7,2) NOT NULL,
  `taxPercent` float(5,2) NOT NULL,
  `taxAmount` float(7,2) NOT NULL,
  `arrearAmount` float(7,2) NOT NULL,
  `totalPayableAmount` float(7,2) NOT NULL,
  `totalPaid` float(7,2) NOT NULL,
  `dueAmount` float(7,2) NOT NULL,
  `paymentStatus` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `inOutStatus` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `bvSubject` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `bvDate` datetime NOT NULL,
  `bvNo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `reminderStatus` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `docketNo` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `url` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `remarks` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `doucument1` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `document2` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `rbproductId` int NOT NULL,
  `rbserviceId` int NOT NULL,
  `ipAddress` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedBy` int NOT NULL,
  `addedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rbservice`
--

CREATE TABLE `rbservice` (
  `rbserviceId` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `serviceCode` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedBy` int NOT NULL,
  `addedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rbservice`
--

INSERT INTO `rbservice` (`rbserviceId`, `name`, `serviceCode`, `addedBy`, `addedDate`) VALUES
(1, 'amc', '', 26, '2016-10-06 09:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settingsId` int NOT NULL,
  `keyword` varchar(200) DEFAULT NULL,
  `value` text,
  `system` tinyint(1) NOT NULL DEFAULT '0',
  `addedBy` int NOT NULL,
  `addedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settingsId`, `keyword`, `value`, `system`, `addedBy`, `addedDate`) VALUES
(1, 'email', 'admin@webtrackers.co.in', 0, 0, '0000-00-00 00:00:00'),
(2, 'metaKey', '', 0, 0, '0000-00-00 00:00:00'),
(3, 'metaDescription', '', 0, 0, '0000-00-00 00:00:00'),
(4, 'siteTitle', 'WTOS CMS', 0, 0, '0000-00-00 00:00:00'),
(5, 'pageCount', '9', 1, 0, '0000-00-00 00:00:00'),
(7, 'Deactivate Site', '0', 0, 0, '0000-00-00 00:00:00'),
(8, 'Deactivate Message', 'Site Temporarily Under Construction . Please contact admin@webtrtackerts.co.in', 1, 0, '0000-00-00 00:00:00'),
(9, 'Validate Wtos', 'not in use', 1, 0, '0000-00-00 00:00:00'),
(10, 'Validate WtosMessage', 'Please contact admin@webtrackers.co.in to enjoy uninterrupted service.', 1, 0, '0000-00-00 00:00:00'),
(11, 'Validate WtosDate', '==gMwITMtEDMtEzN', 1, 0, '0000-00-00 00:00:00'),
(12, 'Deactivate Date', '2030-07-02', 1, 0, '0000-00-00 00:00:00'),
(13, 'language', '2', 1, 0, '0000-00-00 00:00:00'),
(14, 'Styles', '<style> </style>', 0, 0, '0000-00-00 00:00:00'),
(15, 'hitCoount', '449', 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscriptionId` int NOT NULL,
  `accessdetailsId` int NOT NULL,
  `fromDate` datetime NOT NULL,
  `toDate` datetime NOT NULL,
  `keySalt` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `paid` tinyint NOT NULL,
  `note` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `addedDate` datetime NOT NULL,
  `addedBy` int NOT NULL,
  `modifyDate` datetime NOT NULL,
  `modifyBy` int NOT NULL,
  `active` tinyint NOT NULL,
  `amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessdetails`
--
ALTER TABLE `accessdetails`
  ADD PRIMARY KEY (`accessdetailsId`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactid`);

--
-- Indexes for table `followupcategory`
--
ALTER TABLE `followupcategory`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `followupcontact`
--
ALTER TABLE `followupcontact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followuphistory`
--
ALTER TABLE `followuphistory`
  ADD PRIMARY KEY (`followuphistoryId`);

--
-- Indexes for table `gallerycatagory`
--
ALTER TABLE `gallerycatagory`
  ADD PRIMARY KEY (`galleryCatagoryId`);

--
-- Indexes for table `imageuploader`
--
ALTER TABLE `imageuploader`
  ADD PRIMARY KEY (`imageId`);

--
-- Indexes for table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`langId`);

--
-- Indexes for table `mobilebills`
--
ALTER TABLE `mobilebills`
  ADD PRIMARY KEY (`mobilebillsId`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`noteId`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`noticeboardId`);

--
-- Indexes for table `pagecontent`
--
ALTER TABLE `pagecontent`
  ADD PRIMARY KEY (`pagecontentId`);

--
-- Indexes for table `photogallery`
--
ALTER TABLE `photogallery`
  ADD PRIMARY KEY (`photoGalleryId`),
  ADD KEY `photoGalleryId` (`photoGalleryId`),
  ADD KEY `galleryCatagoryId` (`galleryCatagoryId`);

--
-- Indexes for table `rbassessinfo`
--
ALTER TABLE `rbassessinfo`
  ADD PRIMARY KEY (`rbassessinfo`);

--
-- Indexes for table `rbcategory`
--
ALTER TABLE `rbcategory`
  ADD PRIMARY KEY (`rbcategoryId`);

--
-- Indexes for table `rbcontact`
--
ALTER TABLE `rbcontact`
  ADD PRIMARY KEY (`rbcontactId`);

--
-- Indexes for table `rbcountry`
--
ALTER TABLE `rbcountry`
  ADD PRIMARY KEY (`rbcountryId`);

--
-- Indexes for table `rblocation`
--
ALTER TABLE `rblocation`
  ADD PRIMARY KEY (`rblocationId`);

--
-- Indexes for table `rbpayment`
--
ALTER TABLE `rbpayment`
  ADD PRIMARY KEY (`rbpaymentId`);

--
-- Indexes for table `rbproduct`
--
ALTER TABLE `rbproduct`
  ADD PRIMARY KEY (`rbproductId`);

--
-- Indexes for table `rbreminder`
--
ALTER TABLE `rbreminder`
  ADD PRIMARY KEY (`rbreminderId`);

--
-- Indexes for table `rbservice`
--
ALTER TABLE `rbservice`
  ADD PRIMARY KEY (`rbserviceId`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settingsId`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscriptionId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessdetails`
--
ALTER TABLE `accessdetails`
  MODIFY `accessdetailsId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followupcategory`
--
ALTER TABLE `followupcategory`
  MODIFY `catId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followupcontact`
--
ALTER TABLE `followupcontact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followuphistory`
--
ALTER TABLE `followuphistory`
  MODIFY `followuphistoryId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallerycatagory`
--
ALTER TABLE `gallerycatagory`
  MODIFY `galleryCatagoryId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `imageuploader`
--
ALTER TABLE `imageuploader`
  MODIFY `imageId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lang`
--
ALTER TABLE `lang`
  MODIFY `langId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mobilebills`
--
ALTER TABLE `mobilebills`
  MODIFY `mobilebillsId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `noteId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `noticeboardId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pagecontent`
--
ALTER TABLE `pagecontent`
  MODIFY `pagecontentId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photogallery`
--
ALTER TABLE `photogallery`
  MODIFY `photoGalleryId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rbassessinfo`
--
ALTER TABLE `rbassessinfo`
  MODIFY `rbassessinfo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rbcategory`
--
ALTER TABLE `rbcategory`
  MODIFY `rbcategoryId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rbcontact`
--
ALTER TABLE `rbcontact`
  MODIFY `rbcontactId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rbcountry`
--
ALTER TABLE `rbcountry`
  MODIFY `rbcountryId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `rblocation`
--
ALTER TABLE `rblocation`
  MODIFY `rblocationId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rbpayment`
--
ALTER TABLE `rbpayment`
  MODIFY `rbpaymentId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rbproduct`
--
ALTER TABLE `rbproduct`
  MODIFY `rbproductId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rbreminder`
--
ALTER TABLE `rbreminder`
  MODIFY `rbreminderId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rbservice`
--
ALTER TABLE `rbservice`
  MODIFY `rbserviceId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settingsId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscriptionId` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
