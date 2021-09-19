-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 19, 2021 at 01:16 PM
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

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactid`, `name`, `email`, `mobile`, `details`, `addedBy`, `addedDate`, `active`, `image`, `status`) VALUES
(3, 'Samanta Aufderhar', 'bode.cole@jacobs.com', '+1-681-691-9028', 'Alias ullam unde nihil id qui voluptatem. Architecto non natus mollitia eos. Reiciendis neque excepturi sapiente molestias quia libero placeat. Eligendi eos suscipit natus numquam nesciunt.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(4, 'Alvena Green', 'emmerich.anika@reichel.biz', '+1-563-431-5671', 'Repudiandae et voluptate quos eum blanditiis. Sint totam minus dicta ullam omnis et qui omnis. Impedit cumque dicta minus quod expedita consectetur. Delectus ad odit sit.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(5, 'Wilton Halvorson', 'rosamond.fisher@hagenes.biz', '+1 (385) 469-5372', 'Voluptas ducimus inventore sequi ipsa necessitatibus numquam aut sunt. Quas amet ut in odit corrupti tempora.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(6, 'Tristian Heller', 'major.streich@hartmann.org', '+1-239-617-7826', 'Non voluptatem nemo nihil reiciendis sequi dignissimos. Assumenda cumque vel tempora fuga sint fugiat. Consequuntur non eos repellat sunt dicta velit error.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(7, 'Nola Gusikowski', 'hansen.joelle@corkery.com', '(220) 393-7230', 'Commodi cumque tempore nemo illo alias optio sint aperiam. Ab dolore inventore suscipit ducimus facilis unde voluptas. Cum dolorum non itaque pariatur. Quis ipsum incidunt animi nulla neque.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(8, 'Prof. Kaitlyn Turcotte', 'melyna49@hotmail.com', '484-604-2397', 'Exercitationem saepe nostrum reprehenderit nobis molestiae. Porro rem quo itaque nobis exercitationem.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(9, 'Jamarcus Kertzmann DDS', 'heller.quinton@heller.com', '(253) 282-7371', 'Ad autem ipsam quaerat alias molestias non veniam aspernatur. Ea voluptas dolore eos in odio. Maiores unde voluptate excepturi ullam est natus labore.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(10, 'Prof. Coby Swift V', 'welch.lacy@yahoo.com', '+1-564-998-6741', 'Numquam adipisci possimus quae nam quisquam rem. Qui est animi adipisci itaque. Distinctio voluptatem corporis cum. Impedit et iure aut harum perferendis quos facere.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(11, 'Miss Jayne Mueller V', 'xdurgan@crist.com', '+16193959996', 'Repudiandae officia est aliquid natus et. Itaque magnam eligendi molestiae enim. Omnis consequatur voluptas assumenda quidem officiis at.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(12, 'Dr. Karley Klocko', 'bernadine89@lemke.com', '+1 (562) 982-7688', 'Illo dolores ea alias et maiores. Adipisci et doloribus harum maiores commodi. Libero aut tempora maxime perferendis modi.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(13, 'Dr. Lesley Wunsch DVM', 'berta.rath@yahoo.com', '(816) 936-7859', 'Amet incidunt fugiat necessitatibus perferendis dolores ut. Nobis harum aperiam quasi fugiat reprehenderit aut. Praesentium quia quasi repudiandae odio ipsum numquam consectetur.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(14, 'Dr. Monica Homenick', 'thora.gottlieb@hotmail.com', '234.771.0772', 'Voluptate quia suscipit magnam blanditiis. Consequatur quam mollitia id explicabo. Ullam laboriosam deleniti ducimus ad vitae sit cum. Dolor molestias dolorem iste dolores praesentium autem aut.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(15, 'Archibald Bednar DVM', 'schiller.trenton@oconner.org', '+1 (754) 886-9194', 'Saepe nihil officiis aliquid aut quaerat voluptate blanditiis. Quae qui omnis vitae qui dolorum. Fugiat cum est inventore sed voluptates ut. Et quae quis possimus et.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(16, 'Leilani Torphy', 'kschuster@yahoo.com', '610-839-8759', 'Rem vero inventore dolore minus atque nostrum. Sed est occaecati quia et saepe saepe quibusdam. Ex sint aut dolorem voluptatem. Earum vel est necessitatibus sapiente culpa tenetur.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(17, 'Mr. Fredrick Roberts III', 'von.river@yahoo.com', '570.260.9398', 'Consequuntur sint deserunt rem ratione excepturi possimus. Quaerat quidem voluptatem aut sunt. Voluptatem suscipit dolores quasi et.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(18, 'Pierre Hyatt', 'yvette.grady@conroy.com', '1-502-921-3495', 'Error ut veniam cumque similique velit est qui. Est est facilis alias quidem velit. Exercitationem fugiat quaerat quod numquam. Aut dolores enim qui eius.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(19, 'Era Hermiston', 'nullrich@lowe.biz', '+12696605026', 'Quis voluptates et inventore sit est omnis. Voluptate et tenetur odit aut enim cupiditate. Molestiae velit ab ut explicabo nisi.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(20, 'Miss Neva Murray', 'bdietrich@gmail.com', '+1-313-844-8095', 'Ipsum officia quasi veniam beatae. Fugiat ut nesciunt et et est laborum illo. Ipsam laudantium et ad odit voluptatem perspiciatis quidem.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(21, 'Miss Kattie Ullrich MD', 'cecilia.romaguera@yahoo.com', '+1-727-686-9477', 'Dolores aut recusandae explicabo autem. Est rem omnis ut sint qui aut fuga. Veniam voluptas et ullam nostrum pariatur autem aut vero.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(22, 'Bulah Altenwerth', 'adrain86@mcclure.com', '1-781-983-9210', 'Magni aliquid cumque fuga architecto aut. Dolorem ex labore quam impedit. Numquam a iure inventore officiis magnam debitis odio.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(23, 'Chanel Cassin', 'marielle64@hotmail.com', '+1 (573) 760-3908', 'Tempore sit porro corrupti id tenetur sed nesciunt. Et omnis sunt rerum rem provident. Quibusdam optio voluptas dicta non blanditiis aut.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(24, 'Dr. Armand Kunde DVM', 'rschuppe@fay.com', '(530) 384-3639', 'Dolorem repellendus vitae sint aspernatur qui. Et eligendi alias quis. Placeat sunt iusto in voluptatem nihil.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(25, 'Fannie Legros', 'fkozey@dickens.com', '+1-863-330-0714', 'Voluptatem provident quis omnis fugit est veritatis. Quis qui id autem sit doloribus corrupti rerum. Nesciunt nostrum sint itaque voluptas alias sequi fugit. Id vel repellendus molestiae.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(26, 'Houston Lebsack', 'vwalter@douglas.net', '405-380-4041', 'Ut tenetur voluptatem ut quos ab est. Incidunt optio alias sunt dolore.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(27, 'Harold Wiza', 'pfriesen@gmail.com', '+1.781.435.4425', 'Ratione temporibus harum distinctio ad dolore nisi. Aut illo exercitationem sunt eligendi quibusdam eligendi. Vel quae voluptatem quos sint.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(28, 'Manley Hyatt', 'kertzmann.lorine@gmail.com', '+1-512-466-2567', 'Ex suscipit non ipsum tenetur facilis voluptatem architecto. Nulla dolores non voluptatum voluptas voluptatem. Modi et sed reprehenderit voluptatibus. Accusantium quibusdam aut natus est non et.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(29, 'Dameon Kautzer', 'justus.moore@predovic.com', '336-716-5505', 'Aspernatur et et sint deleniti dolor doloremque quasi. Laudantium assumenda ut quisquam odio officia molestiae asperiores corporis. Itaque ullam amet dicta. Repellat aut qui natus ab excepturi.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(30, 'Brycen Macejkovic', 'xjerde@brown.com', '(848) 382-9305', 'Placeat modi est autem autem inventore architecto. Quod laudantium non sunt dolor quaerat voluptatem. Tempore nihil nihil consequatur et cumque accusantium beatae.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(31, 'Edison O\'Connell', 'flockman@lueilwitz.com', '+1-570-229-6588', 'Quo et perferendis voluptas odit. Aut odio consequatur blanditiis tempora id accusamus omnis. Iure et et tempore ipsam voluptates. Et asperiores in enim nam et.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(32, 'Sierra Kilback', 'schimmel.federico@bartell.org', '+1.646.228.6932', 'Quibusdam et impedit et totam id et enim. Aliquid rem eum consequatur rem aspernatur rem nisi. Voluptas iure quia neque ab fugiat.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(33, 'Dudley Pfeffer', 'karlee.quitzon@yahoo.com', '+1 (978) 700-6219', 'In ut excepturi aperiam dolores. Qui sint fugit sint quibusdam consequuntur nobis soluta. Nostrum ut enim aut eius et et voluptatem. Rerum consequatur soluta molestiae quis voluptatibus qui.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(34, 'Gideon Robel', 'marcel34@gmail.com', '+1 (870) 392-7580', 'Impedit incidunt est harum beatae quia quia. Earum quam quaerat laboriosam. Voluptates qui tenetur dignissimos rem.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(35, 'Mia Gerlach', 'aisha.ferry@hotmail.com', '+1-678-865-9092', 'Odio unde est est nisi autem debitis omnis. Nulla tempore aut velit qui qui. Qui ipsum deleniti in maxime nihil aspernatur sit explicabo. Quia consequuntur et fuga voluptatem atque sed praesentium.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(36, 'Ned Morar', 'elise70@barton.com', '+16696237187', 'Itaque ut aspernatur omnis et. Exercitationem quia occaecati nisi ea tenetur asperiores. Eos accusantium nisi vero quas aut et.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(37, 'Hollie Goldner', 'beahan.lucio@gmail.com', '+1 (901) 272-9285', 'Impedit adipisci esse sapiente omnis temporibus ipsam. Sunt omnis voluptatem amet eligendi quibusdam non et et. Sit ipsa et odio.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(38, 'Lorena Gulgowski', 'kathryne.torphy@gmail.com', '551.320.9628', 'Non consectetur laudantium sit sit. Odio qui occaecati voluptas consequatur. Reprehenderit maiores et voluptatum dolor enim.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(39, 'Kaela Witting II', 'zulauf.ofelia@gmail.com', '+1 (308) 287-8748', 'Amet necessitatibus asperiores quo eaque nulla voluptas. Magni a similique non tempore animi. Aperiam molestiae ea qui iusto omnis. Laborum nesciunt dolores explicabo consequatur.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(40, 'Lisette Shanahan', 'ryan99@hotmail.com', '(559) 559-8514', 'Voluptatem possimus ipsam voluptatum laboriosam. Aspernatur quia facilis dolorem culpa sunt laboriosam vel. Quis ut reprehenderit natus quae sunt voluptates. Non voluptatem corrupti eum dicta.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(41, 'Erwin Schmidt', 'hheathcote@harvey.org', '346.734.2526', 'In nam aliquid autem voluptas quis. Et repudiandae dolores eligendi distinctio. Corporis architecto aut et eum.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(42, 'Abigayle Schmitt', 'mable72@gmail.com', '432.527.1167', 'Nulla vel non modi temporibus et nihil animi. Beatae sint et voluptatem consequatur alias placeat. Odit odio fuga optio laudantium molestiae reiciendis. Voluptatem similique nisi qui dolorum.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(43, 'Prof. Virginie Considine', 'jude10@rowe.com', '(475) 718-3556', 'Magnam mollitia qui omnis ullam. Eum natus sequi et iusto rerum amet. Maiores sed iste officia rerum eum praesentium eum quisquam. Qui facere modi reprehenderit quas facilis aliquam.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(44, 'Vaughn Conn', 'madisyn77@gmail.com', '603.268.2199', 'Saepe architecto ea illo ut harum. Minus minima voluptates esse. Dignissimos perspiciatis nihil a inventore. Quia dolor dolores nisi autem voluptas eius ipsam.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(45, 'Kay Morissette Sr.', 'cole.emilie@yahoo.com', '978-410-9243', 'Molestiae dolor incidunt nihil qui repellendus. Optio rerum non vel beatae saepe vero. Qui laborum praesentium harum esse velit labore quas.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(46, 'Prof. Claude Wiegand MD', 'bhowe@mertz.org', '283-225-4270', 'Magnam esse numquam nam qui placeat placeat dolor. Non et optio iste. Et perspiciatis quas ratione atque.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(47, 'Vernie Von', 'mckenzie.rory@gmail.com', '+1 (925) 671-5223', 'Amet quisquam impedit dolorum. Repudiandae maxime sunt fugiat accusamus architecto. Tenetur hic neque non ratione asperiores. Nulla eaque est eos consequatur quis nihil.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(48, 'Ryley O\'Conner', 'iswaniawski@yahoo.com', '903.771.3436', 'Et est ea necessitatibus quo sed tenetur quam tenetur. Cum iure quo vitae velit.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(49, 'Cara Connelly', 'oral88@gmail.com', '+1.949.810.7843', 'Velit est tenetur autem magnam neque fugiat voluptatem. Deleniti est a iusto vel totam. Error quia adipisci aperiam. Quia velit itaque sed qui.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(50, 'Dr. Reese Ortiz', 'helene49@terry.biz', '1-570-872-7329', 'Quia sit molestiae autem ut. Corporis voluptas rem aut amet et natus. Amet commodi repellat possimus sint nihil. Reiciendis et delectus sunt eius.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(51, 'Ms. Beulah Bosco MD', 'candace45@yahoo.com', '571.740.4768', 'Et aut sed aut aut deleniti quisquam. Praesentium veritatis ipsum sit iusto qui ducimus. Optio velit laborum earum. Quia molestias non consequatur omnis in.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(52, 'Jazmin Botsford PhD', 'tsmith@gmail.com', '+14125955275', 'Numquam molestiae fuga porro autem quibusdam temporibus facilis. Quis et omnis ullam atque. Expedita omnis et sit sequi. Quas repellat libero praesentium.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(53, 'John Braun III', 'korbin75@deckow.org', '+1 (563) 863-1580', 'Commodi dolor nemo quo corporis molestiae eum. Aliquam ratione non consequuntur dolor. Dolores sit deleniti hic. Quas perferendis qui rem fugiat velit rem quidem.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(54, 'Mr. Desmond Rohan', 'qrippin@hotmail.com', '1-405-374-6550', 'Qui consequatur sint sunt. Autem sapiente aspernatur aut ipsa ducimus. Fugit delectus temporibus ipsam impedit optio nam consectetur.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(55, 'Mrs. Madonna Schiller MD', 'qmonahan@yahoo.com', '+1-847-645-4018', 'Rerum odit unde magni vel doloremque sint. Est aperiam quis debitis itaque sapiente. Sapiente nihil sit quis debitis ipsum voluptatum. Ipsa ut non exercitationem soluta quia.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(56, 'Eldora Corwin', 'tbayer@yahoo.com', '240-532-0099', 'Omnis perferendis rerum non aut. Corporis cumque beatae alias consequuntur natus. Et ut enim corrupti fugit velit.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(57, 'Linnie McCullough', 'faustino.padberg@gmail.com', '854.483.9303', 'Sit maxime voluptatem eius dolores consequuntur praesentium. Architecto nostrum expedita quo non. Quod ullam occaecati earum amet quam sint velit.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(58, 'Ulises Hane', 'lesch.jade@hotmail.com', '1-220-646-6344', 'Qui in et eos sapiente doloremque est. Laudantium voluptate et et est labore doloremque ut. Ab quam quibusdam error quas omnis in. Atque id aut ducimus expedita aut dolorem et.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(59, 'Amy Fisher', 'arielle.kirlin@lemke.net', '657-358-8396', 'Placeat iste commodi enim. Nisi nihil voluptatem aliquid aspernatur. Et quasi atque culpa dolor sed asperiores. Accusamus consequatur quaerat facilis aperiam ut ipsum rerum.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(60, 'Mrs. Kaia Dare', 'hzemlak@yahoo.com', '747.462.6649', 'Temporibus ipsum est error non labore in repudiandae. Blanditiis eveniet modi at dolores. Maiores voluptas sed blanditiis. Aut nemo in aperiam neque ratione.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(61, 'Lauretta McLaughlin', 'mclaughlin.eriberto@hyatt.com', '+1 (937) 382-5020', 'Corporis exercitationem rerum sed nihil. Dolor voluptatibus voluptatem earum adipisci qui. Sed qui praesentium labore sit. Libero sunt quibusdam harum molestias aut reprehenderit eos.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(62, 'Abigale Willms', 'wheaney@dare.com', '+1-360-935-1798', 'Ducimus repudiandae quia qui deleniti accusantium. Consequatur accusamus consequatur et quaerat alias. Ab id ut ducimus eum similique. Et maiores aliquid provident nam.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(63, 'Fernando VonRueden I', 'javon.pagac@lebsack.com', '(505) 348-0971', 'Omnis recusandae inventore consequatur esse sapiente. Et non dicta voluptatem illo nemo est sint. Molestiae occaecati quia ut illum velit. Omnis iste ipsam necessitatibus eius voluptatum est ullam.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(64, 'London Keebler III', 'larkin.colten@gmail.com', '1-859-761-2496', 'Laboriosam ratione pariatur et possimus vel. Dolor id quidem pariatur et voluptatem magni placeat. Ipsam quas consequuntur eum velit. Libero inventore aut eum.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(65, 'Sallie Turner', 'xharber@yahoo.com', '+1-662-296-5679', 'Voluptas et veniam iste qui ipsam. Libero magnam impedit fugiat consequuntur corporis necessitatibus deleniti vel.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(66, 'Daryl Dooley', 'grady35@hotmail.com', '+12795019044', 'Nisi sequi quas soluta sit. Sit laborum pariatur est error nostrum assumenda enim. Omnis iusto vero id tenetur.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(67, 'Mrs. Eleanora Anderson', 'sigrid.deckow@gmail.com', '(445) 926-3157', 'Omnis odio fugiat qui voluptates ipsam. Quaerat autem tenetur quia ea neque et. Et architecto unde error illo. Omnis et aut iure odit praesentium et et.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(68, 'Isai Carter', 'morissette.jaydon@connelly.com', '843-280-4438', 'Quaerat accusantium quaerat at. Labore reprehenderit inventore nisi. Nulla similique placeat dicta eius recusandae. Aut vel eveniet deserunt ad.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(69, 'Ms. Christine Bahringer III', 'stella.stracke@gmail.com', '(575) 283-0704', 'Deserunt optio voluptatem in inventore culpa omnis qui quibusdam. Modi nihil consequatur sed ullam sapiente nihil in quos.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(70, 'Jayda Sipes', 'hellen.moen@gmail.com', '1-805-616-4708', 'Pariatur odit accusamus illo fugit ipsum. Doloribus sed culpa velit eum. Odio et repellat assumenda neque quia quis.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(71, 'Prof. Mariela Rosenbaum I', 'simonis.vergie@gottlieb.com', '+1 (661) 394-8590', 'Sint quo aut praesentium nisi quos consectetur modi et. Tempore consequuntur excepturi ea. Esse laudantium autem iste earum facilis ut. Et deserunt facere voluptatem sapiente.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(72, 'Jayde Heidenreich', 'concepcion.becker@gmail.com', '(863) 706-9146', 'Voluptas dolor repudiandae atque atque vitae quas itaque. Eaque animi quo explicabo quisquam.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(73, 'Annie Funk', 'ldoyle@effertz.com', '+1-754-216-3771', 'Et rem harum omnis unde est unde qui. Voluptatum error eligendi dolore ut atque odio. Maiores ipsam vitae odit sed perferendis ab aut. Vero praesentium aut et et ut voluptatem deleniti.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(74, 'Mrs. Aliyah Ebert DDS', 'reynolds.darwin@schaden.biz', '+13418539271', 'Sunt voluptatem et illo eos accusamus. Ut aut possimus sunt architecto dolorem ab. Quisquam eos qui iste ducimus. Aut possimus cum ducimus voluptatibus.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(75, 'Brendon Hettinger', 'jfadel@kuhlman.net', '1-470-639-5013', 'Ratione ut possimus aliquid et eligendi. Officia qui enim necessitatibus praesentium aperiam. Perspiciatis aut nisi excepturi quisquam molestiae.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(76, 'Tyler Beatty', 'ycollier@yahoo.com', '+1.678.437.2583', 'Magni ut illo rerum aut sit voluptate eos facilis. Et asperiores ea ut quos qui. Veritatis autem magnam provident quo. Unde velit aperiam debitis accusamus ut voluptates at.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(77, 'Rylee Beatty', 'xbeahan@von.com', '1-223-625-1731', 'Esse et eaque optio consequuntur in. Voluptatem molestias sit aliquid aut et. Iste et earum atque odio sint ab accusantium. Culpa omnis commodi autem saepe.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(78, 'Maryse Heidenreich', 'ofritsch@yahoo.com', '1-512-767-0771', 'Eaque ipsum ut quam ut. Iste sequi voluptatum quia. Ea tempore sed odit. Provident quia perferendis et aut. Quidem ut fugit sed nobis aperiam. Est tenetur quod cupiditate cumque culpa ex dolor.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(79, 'Rubye Zboncak', 'roderick16@nader.com', '(445) 429-1200', 'Voluptas et omnis quibusdam nihil quia tempora harum. Rerum aliquam dolor molestias eaque amet minus corrupti iusto. Quia animi voluptate itaque voluptates quidem debitis non.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(80, 'Zion Murphy', 'dortha.gaylord@conn.info', '+1-616-356-1559', 'Quo et ut et dolorem. Dolores natus alias consequatur quaerat quas nisi sed. Dolores est eius asperiores inventore et ut. Doloribus recusandae ut ea et eius adipisci sapiente recusandae.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(81, 'Theron Abshire', 'melvin37@maggio.com', '1-726-884-7655', 'Veniam quibusdam fuga ut enim saepe nemo molestias enim. Cum voluptatem eaque hic voluptatem praesentium dicta cumque. Ipsum quibusdam velit consequatur rerum aliquam repudiandae.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(82, 'Glenda Nikolaus II', 'cblick@mosciski.org', '1-830-213-8791', 'At maxime commodi natus maiores. Sunt possimus cumque libero rerum nihil ducimus. Consequatur repellat veniam ipsum deleniti.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(83, 'Prof. Jude Dare Jr.', 'cmayert@yahoo.com', '757.590.9478', 'Et vitae et ex. Consequatur et dolores dolorem facere. Rem est ab enim iusto aut sunt. Aliquid explicabo est a et earum occaecati amet.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(84, 'Sally Padberg', 'derick43@erdman.com', '623-738-9299', 'Explicabo vero assumenda et animi. Autem voluptatem libero soluta ut aspernatur. Quos nihil itaque voluptatem ipsam aut ratione.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(85, 'Bertha Botsford', 'oren.schiller@cummerata.com', '307.292.9393', 'Vero pariatur dolore in adipisci debitis id tempora. Vitae asperiores accusamus repellendus. Cum temporibus quos tempore similique nobis et.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(86, 'Daphnee Lindgren', 'vdavis@cormier.biz', '+1-210-717-2971', 'Quidem qui rerum provident sunt. Sed qui sunt sint sequi. Placeat voluptas velit accusamus autem debitis quidem.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(87, 'Ms. Madilyn Barrows MD', 'santa41@gmail.com', '+1.323.777.2415', 'Numquam aut aut expedita cum. Alias inventore aliquid maxime et architecto. Quasi quis iste maiores.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(88, 'Jose Roberts I', 'alessia.lynch@yahoo.com', '(463) 654-9228', 'Quia optio exercitationem qui porro. Omnis consectetur pariatur nesciunt eaque et et consequatur. Aliquam accusantium tenetur rerum ea.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(89, 'Mrs. Nora Stehr V', 'farrell.lon@hotmail.com', '651-409-6144', 'Dolores a cum nisi voluptas. Et nisi doloremque eius accusamus ea. Voluptatem sed magnam asperiores autem ea illo illum. Illo vero consequatur officia sequi.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(90, 'Maryse Wiza', 'pschamberger@hotmail.com', '667-394-0181', 'Consectetur cum fugit soluta velit ex quo ut. Quia ut voluptatum enim. Qui placeat rem et vel. Aut harum vel animi.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active'),
(91, 'Giovanny Nikolaus MD', 'bvonrueden@yahoo.com', '+1-928-335-0743', 'Dolor dolor perspiciatis voluptatem. Iste voluptatum assumenda rem unde ut aliquam. Possimus debitis enim aliquam earum incidunt neque vel.', NULL, '2021-09-16 00:29:55', 1, NULL, 'Active');

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
(16, 0x4e61666973682041686d6564, 0x77746f732d696d616765732f3836303439395f35323537373135362d322e6a706567, '0000-00-00 00:00:00');

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
(1, 'Home', '', 'Leaf is a PHP framework that helps you create clean, simple but powerful web apps and APIs quickly. Leaf introduces a cleaner and much simpler structure to the PHP language while maintaining it\'s flexibility.', '<h1>Webtrackers4u - Web and Software Solution</h1>\r\n<p>WEBTRACKERS4U is one of the eminent player in the world of&nbsp;web development and web based business.&nbsp;Our main focus centres around the idea of customer satisfactions which is triggered by teamwork and company development.<br /><br />We continuously strive towards quality improvement and learning in the fields of the emerging technologies.<br /><br /></p>\r\n<div>\r\n<p>PRODUCT BILLING &amp; SERVICE MANAGEMENT<br />Awesome software to manage your product billing and servicing</p>\r\n<table border=\"0\" cellspacing=\"2\" cellpadding=\"1\">\r\n<tbody>\r\n<tr>\r\n<td width=\"16\">1</td>\r\n<td width=\"228\">Secure login</td>\r\n<td>12</td>\r\n<td>Unlimited user</td>\r\n</tr>\r\n<tr>\r\n<td>2</td>\r\n<td>Purchase details and records</td>\r\n<td>13</td>\r\n<td>Unlimited product</td>\r\n</tr>\r\n<tr>\r\n<td>3</td>\r\n<td>Billing</td>\r\n<td>14</td>\r\n<td>Unlimited agent</td>\r\n</tr>\r\n<tr>\r\n<td>4</td>\r\n<td>Stock alert</td>\r\n<td>15</td>\r\n<td>Unlimited customer</td>\r\n</tr>\r\n<tr>\r\n<td>5</td>\r\n<td>Service invoice</td>\r\n<td>16</td>\r\n<td>Unlimited vendor</td>\r\n</tr>\r\n<tr>\r\n<td>6</td>\r\n<td>PM CM alert</td>\r\n<td>17</td>\r\n<td>Payment record</td>\r\n</tr>\r\n<tr>\r\n<td>7</td>\r\n<td>Engineers/Agent&nbsp;movement&nbsp;&nbsp;</td>\r\n<td>18</td>\r\n<td>Next service date alert</td>\r\n</tr>\r\n<tr>\r\n<td>8</td>\r\n<td>Product status /&nbsp;MIF Trackers</td>\r\n<td>19</td>\r\n<td>Manage&nbsp;WU UC NC&nbsp;status</td>\r\n</tr>\r\n<tr>\r\n<td>9</td>\r\n<td>Purchase Report</td>\r\n<td>20</td>\r\n<td>Quotation / profoma&nbsp;invoice</td>\r\n</tr>\r\n<tr>\r\n<td>10</td>\r\n<td>Tax invoice report</td>\r\n<td>21</td>\r\n<td>Other reports and search facility</td>\r\n</tr>\r\n<tr>\r\n<td>11</td>\r\n<td>Service report</td>\r\n<td>22</td>\r\n<td>Easy to use</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>Contact 8017477871 to know more about this product</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>We are always motivated towards improving the quality of services we offer. Our main aim is to convert client\'s ideas into reality by enhancing their business and productivity.<br /><br />The biggest asset of&nbsp;&nbsp;WEBTRACKERS4U&nbsp;is our dedicated experienced team who are always focusing on quality services to climb the ladder of success for which WEBTRACKERS4U was formed.<br /><br />The company is formed with a team of experienced programmers and consultants in Kolkata working with some of the most prestigious organisations within the industry throughout the globe.&nbsp;<br /><br />The business strategies followed by us enables the customers to get benefited from the high level of professionalism and technical expertise beyond their expectations.&nbsp;<br /><br />Our primary focus is always on quality although our prices are always competitive. The dedication, knowledge and experience of our team members are our biggest assets.</p>', 1, '', '', 26, 0, '2021-09-19 01:12:06', '0', NULL, NULL, '', '', 0, 'wtOS Content Management System', 1, 0, 0, NULL, 0, 1, '', '', 'Yes', 0, 'template-home.php'),
(2, 'About', 'sign-in', 'There are many ways to install Froala WYSIWYG Editor and we suggest to use NPM. Just type in the following command.\r\n', '<div id=\"install\" class=\"docs-group anchor\">\r\n<h2 class=\"title-left-border text-small\">Step 1. Install</h2>\r\n<p><a href=\"https://froala.com/wysiwyg-editor/download/\" target=\"_blank\" rel=\"noopener\">There are many ways</a>&nbsp;to install Froala WYSIWYG Editor and we suggest to use&nbsp;<a href=\"https://froala.com/wysiwyg-editor/download#install-from-npm\">NPM</a>. Just type in the following command:</p>\r\n<pre class=\"prettyprint hljs coffeescript\"><span class=\"hljs-built_in\">npm</span> install froala-editor</pre>\r\n<p>After the installation process is finished, embed this code inside your HTML file:</p>\r\n<pre class=\"prettyprint hljs xml\"><span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">link</span> <span class=\"hljs-attr\">href</span>=<span class=\"hljs-string\">\"node_modules/froala-editor/css/froala_editor.pkgd.min.css\"</span> <span class=\"hljs-attr\">rel</span>=<span class=\"hljs-string\">\"stylesheet\"</span> <span class=\"hljs-attr\">type</span>=<span class=\"hljs-string\">\"text/css\"</span> /&gt;</span>\r\n<span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">script</span> <span class=\"hljs-attr\">type</span>=<span class=\"hljs-string\">\"text/javascript\"</span> <span class=\"hljs-attr\">src</span>=<span class=\"hljs-string\">\"node_modules/froala-editor/js/froala_editor.pkgd.min.js\"</span>&gt;</span><span class=\"hljs-tag\">script</span>&gt;</pre>\r\n<p>As an alternative, you could use CDN:</p>\r\n<pre class=\"prettyprint hljs xml\"><span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">link</span> <span class=\"hljs-attr\">href</span>=<span class=\"hljs-string\">\"https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css\"</span> <span class=\"hljs-attr\">rel</span>=<span class=\"hljs-string\">\"stylesheet\"</span> <span class=\"hljs-attr\">type</span>=<span class=\"hljs-string\">\"text/css\"</span> /&gt;</span>\r\n<span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">script</span> <span class=\"hljs-attr\">type</span>=<span class=\"hljs-string\">\"text/javascript\"</span> <span class=\"hljs-attr\">src</span>=<span class=\"hljs-string\">\"https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js\"</span>&gt;</span><span class=\"hljs-tag\">script</span>&gt;</pre>\r\n</div>\r\n<div id=\"create\" class=\"docs-group anchor\">\r\n<h2 class=\"title-left-border text-small\">Step 2. Create</h2>\r\n<p>The Froala Editor can be initialized on any DOM element, and we recommend do use a&nbsp;<code>DIV</code>&nbsp;element. Add an empty&nbsp;<code></code></p>\r\n<div id=\"example\"></div>\r\n<p><code></code>&nbsp;element that will be turned into a rich text editor.</p>\r\n</div>\r\n<div id=\"init\" class=\"docs-group anchor\">\r\n<h2 class=\"title-left-border text-small\">Step 3. Initialization</h2>\r\nThe last step consists of initializing the Froala Editor on our previously created empty element.\r\n<pre class=\"prettyprint hljs cs\"><span class=\"hljs-keyword\">var</span> editor = <span class=\"hljs-keyword\">new</span> FroalaEditor(<span class=\"hljs-string\">\'#example\'</span>)</pre>\r\n</div>\r\n<div id=\"display\" class=\"docs-group anchor\">\r\n<h2 class=\"title-left-border text-small\">Step 4. Display Content</h2>\r\n<p>To preserve the look of the edited HTML outside of the rich text editor you have to include the following CSS files.</p>\r\n<pre class=\"prettyprint hljs xml\"><span class=\"hljs-comment\"><!-- CSS rules for styling the element inside the editor such as p, h1, h2, etc. --></span>\r\n<span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">link</span> <span class=\"hljs-attr\">href</span>=<span class=\"hljs-string\">\"../css/froala_style.min.css\"</span> <span class=\"hljs-attr\">rel</span>=<span class=\"hljs-string\">\"stylesheet\"</span> <span class=\"hljs-attr\">type</span>=<span class=\"hljs-string\">\"text/css\"</span> /&gt;</span></pre>\r\n<p>Also, you should make sure that you put the edited content inside an element that has the class&nbsp;<code>fr-view</code>.</p>\r\n<div class=\"hljs-class\">class=<span class=\"hljs-string\">\"fr-view\"</span>&gt; Here comes the HTML edited <span class=\"hljs-keyword\">with</span> the Froala rich text editor. &lt;<span class=\"hljs-regexp\"><span class=\"hljs-regexp\">/div&gt;<br /><br /></span></span></div>\r\n</div>', 1, '', '', 26, 0, '2021-06-18 07:11:12', '0', NULL, NULL, 'about', '', 0, 'About Us', 1, 1, 0, 'wtos-images/614440_our_heritage_logo.png', 1, 1, '', '', NULL, 0, 'template-default.php'),
(5, 'Contact List', 'list', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', 1, 'Contact List', 'Contact List', 26, 0, '2021-09-11 07:05:15', '0', NULL, NULL, 'contact-list', '', 0, 'Contact List', 1, 1, 0, 'wtos-images/281529_55944168_1008028086074102_8132382616415691033_n-2.jpeg', 1, 1, '', 'Contact List', NULL, 0, 'template-default.php'),
(6, 'Gallery', 'image', '', '', 1, 'Gallery', 'Gallery', 26, 0, '2021-09-12 04:26:57', '0', NULL, NULL, 'gallery', '', 0, 'Gallery', 1, 1, 0, NULL, 1, 1, '', 'Gallery', NULL, 0, 'template-default.php');

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
(3, 'yiiyioiouiooi', '', '2021-06-16 14:30:50'),
(2, 'show_header', 'Yes', '2021-06-19 00:07:48'),
(2, 'number', '', '2021-06-19 00:40:13'),
(2, 'password', '', '2021-06-19 00:40:13'),
(2, 'who_are_you', 'Yes', '2021-06-19 00:40:13'),
(2, 'ok_cool', 'a:2:{i:0;s:1:\"T\";i:1;s:1:\"Y\";}', '2021-06-19 00:40:13'),
(5, 'home_title', '', '2021-09-12 00:35:15'),
(5, 'number', '', '2021-09-12 00:35:15'),
(5, 'password', '', '2021-09-12 00:35:15'),
(5, 'saver', '', '2021-09-12 00:35:15'),
(5, 'who_are_you', 'Yes', '2021-09-12 00:35:15');

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

--
-- Dumping data for table `photogallery`
--

INSERT INTO `photogallery` (`photoGalleryId`, `galleryCatagoryId`, `name`, `title`, `addedBy`, `addedDate`, `status`) VALUES
(1, 10, 'wtos-images/787958_228617_a-k-d-pharmacy-berhampore-berhampore-west-bengal-chemists-ouje7dyiv3.webp', 'A.K. Pharmacy', 26, '2021-09-12 04:39:24', 'Active');

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
(15, 'hitCoount', '1191', 1, 0, '0000-00-00 00:00:00');

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
  MODIFY `contactid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

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
  MODIFY `imageId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `pagecontentId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `photogallery`
--
ALTER TABLE `photogallery`
  MODIFY `photoGalleryId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
