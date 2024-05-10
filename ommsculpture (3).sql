-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 10:46 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ommsculpture`
--

-- --------------------------------------------------------

--
-- Table structure for table `adv_banner`
--

CREATE TABLE `adv_banner` (
  `id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `height` int(11) NOT NULL,
  `cancel` int(1) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `banner_mst`
--

CREATE TABLE `banner_mst` (
  `BAM_BACD` int(11) NOT NULL,
  `BAM_ORCD` int(1) NOT NULL,
  `BAM_ORD` int(1) NOT NULL,
  `BAM_IMG` varchar(255) NOT NULL,
  `BAM_CANC` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner_mst`
--

INSERT INTO `banner_mst` (`BAM_BACD`, `BAM_ORCD`, `BAM_ORD`, `BAM_IMG`, `BAM_CANC`) VALUES
(1, 1, 1, '2024.02.081707384735.jpg', 0),
(2, 1, 2, 'banner-2.png', 0),
(3, 1, 3, 'banner-3.png', 0),
(4, 1, 4, 'banner-4.png', 0),
(5, 1, 5, 'banner-5.png', 0),
(6, 1, 6, '2024.03.041709554182.jpg', 0),
(8, 1, 7, '2024.03.041709554305.jpg', 0),
(10, 1, 8, '2024.03.161710591134.jpg', 0),
(11, 1, 9, '2024.03.231711196254.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_mst`
--

CREATE TABLE `category_mst` (
  `category_id` int(11) NOT NULL,
  `orcd` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_mst`
--

INSERT INTO `category_mst` (`category_id`, `orcd`, `name`, `image`, `description`, `status`) VALUES
(1, 1, 'Goddess', '2024.02.061707203753.png', '<p>OK</p>\r\n', 1),
(2, 1, 'Garden Decorators', '2024.02.061707203872.png', '<p>ok</p>\r\n', 1),
(3, 1, 'Handi Craft', '2024.02.061707203967.png', '<p>ok</p>\r\n', 1),
(4, 1, 'Model And Human Interface', '2024.01.271706342098.png', '<p>ok</p>\r\n', 1),
(5, 1, 'Apsara', '2024.02.081707407237.png', '<p>God</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cat_mst01`
--

CREATE TABLE `cat_mst01` (
  `CAM_CACD` int(10) NOT NULL,
  `CAM_CANM` varchar(60) NOT NULL,
  `CAM_ORCD` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_mst01`
--

INSERT INTO `cat_mst01` (`CAM_CACD`, `CAM_CANM`, `CAM_ORCD`) VALUES
(1, 'Goddess', 1),
(2, 'Garden Decorators', 1),
(3, 'Handi Craft', 1),
(4, 'Model and Human Interface', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `message`, `date_time`) VALUES
(2, 'Anna Wilson', 'annawilson.web@gmail.com', '1201201200', 'Re : Website Design & Development service provider', 'Hello there,\r\n\r\nI am Anna, I first wanted to say that I love what youâ€™re doing at ommsculpture.com !\r\n\r\nSmall businesses can struggle to customize their website design using the limited templates [Squarespace/ Shopify/ Godaddy/ Wix or any custom design ', '2023-02-26 05:30:35'),
(3, 'Anna Wilson', 'annawilson.web@gmail.com', '1201201200', 'Re : Website Design & Development service provider', 'Hello there,\r\n\r\nI am Anna, I first wanted to say that I love what youâ€™re doing at ommsculpture.com !\r\n\r\nSmall businesses can struggle to customize their website design using the limited templates [Squarespace/ Shopify/ Godaddy/ Wix or any custom design ', '2023-02-28 21:29:56'),
(4, 'Felisha Yali', 'yali.felisha@gmail.com', '0489 17 28 13', 'To the ommsculpture.com Admin!', 'Are you the owner of this site: http://ommsculpture.com? I am happy to inform you that you have been approved to place your submission to our free directory. Please go ahead and submit it by clicking on this link: http://freewebsitesubmission.12com.xyz/', '2023-08-03 23:56:14'),
(5, 'Tammara Painter', 'tammara.painter@googlemail.com', '(11) 4784-4546', 'Hello ommsculpture.com Owner!', 'Are you the owner of this site: http://ommsculpture.com? I am happy to inform you that you have been approved to place your submission to our free directory. Please go ahead and submit it by clicking on this link: http://submityoursitefree.12com.xyz/', '2023-08-04 16:17:38'),
(6, 'Anglea Pascal', 'pascal.anglea21@gmail.com', '21-79-14-60', 'Dear ommsculpture.com Webmaster!', 'Let me submit your site to 35 classified ad sites for free. Go ahead and claim your free submission here: http://submityoursitefree.12com.xyz/', '2023-08-05 01:50:46'),
(7, 'Lora Barbee', 'lora.barbee67@gmail.com', '0492 40 75 48', 'To the ommsculpture.com Administrator!', 'I am pleased to inform you that you can now submit your site to our business directory for free. Visit: http://freewebsitesubmission.12com.xyz/', '2023-08-05 04:08:04'),
(8, 'Jim Hooper', 'hooper.clint@yahoo.com', '3125086815', 'Dear ommsculpture.com Admin!', 'Hi there,\r\nMonthly Seo Services - Professional/ Affordable Seo Services\r\nHire the leading seo marketing company and get your website ranked on search engines. Are you looking to rank your website on search engines? Contact us now to get started - https://', '2023-10-04 21:13:09'),
(9, 'Dennis Leslie', 'leslie.dennis@gmail.com', '(92) 4268-7707', 'Revolutionize Your Online Presence with Our Revolutionary Tool!', 'To the ommsculpture.com Admin. This is Dennis, and for a second, imagine thisâ€¦\r\n\r\n- Someone does a lookup and ends up at ommsculpture.com.\r\n\r\n- They stay for a moment to look it over.  â€œI am interestedâ€¦ butâ€¦ maybeâ€¦â€\r\n\r\n- And then they press th', '2023-10-13 14:45:35'),
(10, 'Evelyne Graves', 'graves.evelyne@googlemail.com', '0224-3302540', 'Discover How to Hold Visitors on ommsculpture.com More!', 'To the ommsculpture.com Owner.\r\n\r\nI am Evelyne, and I just came across your site, ommsculpture.com.\r\n\r\nIt really is has much going for it, but Iâ€™ve got an idea to make it even MORE effective.\r\n\r\nCheck out Web Visitors Into Leads â€“ CLICK HERE https://b', '2023-10-18 09:42:18'),
(11, 'nieCqNFNmcnaDkja', 'mrpDjw.qjhbbtt@spinapp.bar', '1', 'sfHYXUmfmSqFpuWnFuBwJlHeLzRtX', 'sfHYXUmfmSqFpuWnFuBwJlHeLzRtX', '2023-11-09 03:06:44'),
(12, 'QLqRtdlnAQU', 'info@007strategies.com', '1', 'NIycofDPaEsjKtMlc', 'NIycofDPaEsjKtMlc', '2023-11-09 23:10:53'),
(13, 'XUmOAkCuXIjxeby', 'info@007strategies.com', '1', 'vupFJwluNPxqTqfpaP', 'vupFJwluNPxqTqfpaP', '2023-11-09 23:18:55'),
(14, 'rjvXPwajtic', 'info@007strategies.com', '1', 'EqMJJKkSfouHqjbMpxjBmdrPtBRIT', 'EqMJJKkSfouHqjbMpxjBmdrPtBRIT', '2023-11-09 23:27:58'),
(15, 'RacwmDANTJLTji', 'info@007strategies.com', '1', 'CUpAajQFrURXQymTkAxPFlWIu', 'CUpAajQFrURXQymTkAxPFlWIu', '2023-11-09 23:43:30'),
(16, 'XiyhoRCQXAKXDjHn', 'info@007strategies.com', '1', 'hEmtkrOEOybENBBxs', 'hEmtkrOEOybENBBxs', '2023-11-10 04:18:21'),
(17, 'YhqLcnANruCc', 'info@007strategies.com', '1', 'hMRNieSmKKpjjyQvtiyAThFfIl', 'hMRNieSmKKpjjyQvtiyAThFfIl', '2023-11-10 04:26:18'),
(18, 'mUswsmuzrlvirnpp', 'info@007strategies.com', '1', 'lnIutjhPvCxiFDCsYKSvtneVzrfxO', 'lnIutjhPvCxiFDCsYKSvtneVzrfxO', '2023-11-10 04:31:50'),
(19, 'nFNRqWdylUfCjw', 'info@007strategies.com', '1', 'QRzpKtdRfeyMblonk', 'QRzpKtdRfeyMblonk', '2023-11-10 04:47:08'),
(20, 'mzrXkuhfrRbdMj', 'info@007strategies.com', '1', 'SzjNpAzislDmbTjjpORVFFjudyF', 'SzjNpAzislDmbTjjpORVFFjudyF', '2023-11-10 04:48:04'),
(21, 'imHVDqpPAaeRi', 'info@007strategies.com', '1', 'kOuJMtDdHplDjssjol', 'kOuJMtDdHplDjssjol', '2023-11-10 05:00:23'),
(22, 'iXacLfIEFm', 'info@007strategies.com', '1', 'BNsTBwBolEXFiNVpPQbJil', 'BNsTBwBolEXFiNVpPQbJil', '2023-11-10 05:08:36'),
(23, 'VXduYTMudJhn', 'info@007strategies.com', '1', 'EFMeoMbACQXHvst', 'EFMeoMbACQXHvst', '2023-11-10 05:34:09'),
(24, 'James Knowlton', 'knowlton.michale@gmail.com', '5195469071', 'Hello ommsculpture.com Administrator.', 'Hi there!\r\nTop Rated SEO Agency. Personalized Service from Dedicated Account Team. ROI Driven. Relationship Focused. Custom SEO Strategy. 95% Client Retention Rate. Services: Analytics, Back-end Development, Competitive Research, Consulting.  Buy now: htt', '2023-11-13 12:39:57'),
(25, 'Kara Loewenthal', 'kara.loewenthal@hotmail.com', '0325 5688617', 'Reveal the Possibilities of Your Webpage with ommsculpture.com!', 'Hi to ommsculpture.com Owner! I am Kara and Iâ€™ve just ran across your website at ommsculpture.com...\r\n\r\nI found it after a quick look, so your SEOâ€™s performing wellâ€¦\r\n\r\nContent seems quite goodâ€¦\r\n\r\nOne thing is absent thoughâ€¦\r\n\r\nA RAPID, SIMPLE ', '2023-11-19 13:56:33'),
(26, 'Whitney Plume', 'whitney.plume87@gmail.com', '08161 51 35 23', 'Amplify Your Conversions with This New Tool!', 'To the ommsculpture.com Manager,\r\n\r\nIâ€™m Whitney and I recently came across your webpage - ommsculpture.com - through the search results\r\n\r\nSo hereâ€™s what that means to meâ€¦\r\n\r\nYour SEOâ€™s doing its job.\r\n\r\nYouâ€™re earning eyeballs â€“ mine at least', '2023-11-20 08:55:50'),
(27, 'IfmYtcpVrHjdyclm', 'cjqEIL.qppbmh@pointel.xyz', '1', 'fhQziRpJmEavHoFEmPUuQ', 'fhQziRpJmEavHoFEmPUuQ', '2023-11-23 10:46:43'),
(28, 'JkRJivUjdVUqivO', 'xlaverroux@gmail.com', '1', 'vUxHSbMLRtIayjQ', 'vUxHSbMLRtIayjQ', '2023-11-24 13:01:26'),
(29, 'itsCWiCvXICpv', 'luckyles87@aol.com', '1', 'qTvRsqhjJEKVCYbumBvkIqsYsLQ', 'qTvRsqhjJEKVCYbumBvkIqsYsLQ', '2023-11-24 14:14:01'),
(30, 'RtFkPYBUmSQQB', 'countryboyheart@gmail.com', '1', 'JsTHonlEzfnUQPbfErTRsEhhaMJCE', 'JsTHonlEzfnUQPbfErTRsEhhaMJCE', '2023-11-24 14:54:01'),
(31, 'VVtNHHjydeyDSivD', 'jlrl@aol.com', '1', 'IckISBJeHdoeNjKA', 'IckISBJeHdoeNjKA', '2023-11-24 16:23:46'),
(32, 'xyzCIrqhVdied', 'williamsonrd38@gmail.com', '1', 'MhEyLcMAsJbqeLFIYzuVFD', 'MhEyLcMAsJbqeLFIYzuVFD', '2023-11-24 18:02:00'),
(33, 'kFPPSSsMNqioXjVJR', 'randycory@gmail.com', '1', 'oNszOehDKjLLjuJEOey', 'oNszOehDKjLLjuJEOey', '2023-11-24 19:02:33'),
(34, 'PyBHxptzYJW', 'heymrsb2@aol.com', '1', 'SWKxehsoqjLjLQMsMxobwSKWL', 'SWKxehsoqjLjLQMsMxobwSKWL', '2023-11-24 20:11:34'),
(35, 'jbKtliJKsLbI', 'heymrsb2@aol.com', '1', 'ElkOLkDoWXJoYrIJRpLlRbCLt', 'ElkOLkDoWXJoYrIJRpLlRbCLt', '2023-11-25 03:33:39'),
(36, 'VuHMbEVXXX', 'dmgraymusic@gmail.com', '1', 'IzSvwFaWPQeFXJTCnJolY', 'IzSvwFaWPQeFXJTCnJolY', '2023-11-25 18:19:06'),
(37, 'EHeDwbFaBvSaJ', 'ravenfridia@yahoo.com', '1', 'tetMNEwwJtjYfzTdMLv', 'tetMNEwwJtjYfzTdMLv', '2023-11-27 02:21:11'),
(38, 'Kia Tabarez', 'kia.tabarez@yahoo.com', '03381 75 94 07', 'Capture Leads Immediately with The Latest Tool!', 'Greetings to ommsculpture.com Admin,\r\n\r\nThis is Kia and I just discovered your website - ommsculpture.com - through the search results.\r\n\r\nHereâ€™s what that means to meâ€¦ to meâ€¦\r\n\r\nYour SEOâ€™s operating.\r\n\r\nYouâ€™re earning eyeballs â€“ at least mine', '2023-11-29 15:08:53'),
(39, 'Aubree', 'eoAPdr.bjptbq@purline.top', '1', 'Judson Zimmerman', 'Judson Zimmerman', '2023-12-02 02:06:17'),
(40, 'Kaiya', 'chowell@thefalcongroup.us', '1', 'Kiaan Harding', 'Kiaan Harding', '2023-12-02 02:08:07'),
(41, 'Barrett', 'ANbHMq.qbhdddw@sandcress.xyz', '1', 'Karim Dougherty', 'Karim Dougherty', '2023-12-03 10:39:17'),
(42, 'Rose', 'kKrsNP.qdpdbbp@rightbliss.beauty', '1', 'Hana Gillespie', 'Hana Gillespie', '2023-12-05 03:39:21'),
(43, 'Phil Stewart', 'noreplyhere@aol.com', '342-123-4456', '??', 'I now offer contact form blasting service. With my DFY service you can either do a targeted blast to only websites that match your criteria or bulk blast large volumes of sites worldwide. Prices start at just $50 to reach 500,000 bulk sites. Contact me at', '2023-12-06 02:34:38'),
(44, 'Noa', 'fQdnOo.htjctdt@brasswire.me', '1', 'Dominic Reeves', 'Dominic Reeves', '2023-12-07 03:40:51'),
(45, 'James Mounts', 'lesli.mounts@yahoo.com', '9568648256', 'Hi ommsculpture.com Admin!', 'Advantages of hiring a Developer:\r\n\r\nSpecialized Expertise\r\nTailored Customization and Control\r\nTime and Cost Efficiency\r\nCustom Plugin Development\r\nSEO Optimization\r\nOngoing Support and Maintenance\r\nSeamless Integration and Migration\r\nScalability for Bus', '2023-12-07 23:41:23'),
(46, 'Clifton Carvosso', 'clifton.carvosso@gmail.com', '944 89 285', 'Reveal the Possibilities of Your Webpage with ommsculpture.com!', 'Hi to ommsculpture.com Webmaster! My nameâ€™s Clifton and Iâ€™ve just found your site at ommsculpture.com...\r\n\r\nI located it after a brief search, so your SEO is doing wellâ€¦\r\n\r\nContent seems goodâ€¦\r\n\r\nOne thing is lacking thoughâ€¦\r\n\r\nA RAPID, EASY met', '2023-12-11 14:30:39'),
(47, 'hvhdDQumhJoh', 'rspDAV.cdbpbhh@scranch.shop', '1', 'PtKLFhbFIJVCcyilmzABLTcV', 'PtKLFhbFIJVCcyilmzABLTcV', '2023-12-11 22:56:52'),
(48, 'EKPbCNdVCkELma', 'heriberto910@gmail.com', '1', 'OAEyyDoHKiBCdfKKxi', 'OAEyyDoHKiBCdfKKxi', '2023-12-11 23:02:13'),
(49, 'CzlBhqqJcbpsl', 'pdilley@stonestreetquarries.com', '1', 'spKYuyCvulxjKeIuNBlJARTN', 'spKYuyCvulxjKeIuNBlJARTN', '2023-12-12 03:29:10'),
(50, 'rtPzzrspJXM', 'soulpower96@gmail.com', '1', 'TEHyjtjsckIjxaDy', 'TEHyjtjsckIjxaDy', '2023-12-12 15:37:11'),
(51, 'oJddOAItTU', 'merribethbond@gmail.com', '1', 'YzHVacecynfhOPkvvXTRhD', 'YzHVacecynfhOPkvvXTRhD', '2023-12-12 18:30:59'),
(52, 'oLwljPyWzMmOQT', 'pdilley@stonestreetquarries.com', '1', 'orXYaCSEOmaYRBe', 'orXYaCSEOmaYRBe', '2023-12-12 21:26:48'),
(53, 'uxMCUHWtJbiXpA', 'info@vdefa.nl', '1', 'yRUQCcRoIPvKIrLFVFLqcsWPOo', 'yRUQCcRoIPvKIrLFVFLqcsWPOo', '2023-12-13 04:23:28'),
(54, 'wRmYfHoLjNOpP', 'CWEYUu.bbptmdq@silesia.life', '1', 'fBlDmFDxOTMidSo', 'fBlDmFDxOTMidSo', '2023-12-13 12:52:02'),
(55, 'ACmjRBAAqabHsqECX', 'info@vdefa.nl', '1', 'SVzCtueIpFmzeFKw', 'SVzCtueIpFmzeFKw', '2023-12-13 12:57:31'),
(56, 'MphHCCtVffVhsy', 'mdevey@ustservicescorp.com', '1', 'neIxcMNOiCOyNQviNsPJP', 'neIxcMNOiCOyNQviNsPJP', '2023-12-13 17:32:51'),
(57, 'yYIJJKvIvFH', 'mdevey@ustservicescorp.com', '1', 'XAwlVRpSolSJetFxfWFEz', 'XAwlVRpSolSJetFxfWFEz', '2023-12-13 18:08:42'),
(58, 'JUpAKteihiEB', 'knchshiva@gmail.com', '1', 'IqQdBBPYjXtABVVnljpWTKJjkWJEB', 'IqQdBBPYjXtABVVnljpWTKJjkWJEB', '2023-12-14 01:45:52'),
(59, 'utWTTBIFEpaIIY', 'bnibali@aptusengineering.com', '1', 'skkdWDHJPVJJvcAEXSoTiLAVpo', 'skkdWDHJPVJJvcAEXSoTiLAVpo', '2023-12-14 03:54:32'),
(60, 'FyeYfXqePUvdSB', '8159@pcexpertservices.com', '1', 'ivlfRzjuCDNIQLcEBwjMAhL', 'ivlfRzjuCDNIQLcEBwjMAhL', '2023-12-14 05:44:05'),
(61, 'rbAEEioEoLBLjL', 'ifuentes@cfhgroup.com', '1', 'IuijKqjmYHhrPbqdXTnWenaYxnYnp', 'IuijKqjmYHhrPbqdXTnWenaYxnYnp', '2023-12-14 10:28:55'),
(62, 'uuMzEoUBcoHlYnLKF', 'clintsmith@a1termitepc.com', '1', 'UPanboSmNwxLVkvWYtSyyPvBSdYak', 'UPanboSmNwxLVkvWYtSyyPvBSdYak', '2023-12-14 11:19:48'),
(63, 'dxxUCuQylqnR', '3024psk121866@gmail.com', '1', 'AIbvLVbCMLFMJrClwqrzIkcVkNv', 'AIbvLVbCMLFMJrClwqrzIkcVkNv', '2023-12-14 15:18:06'),
(64, 'jrSEQHQNzqI', '3024psk121866@gmail.com', '1', 'zftJjnPfQVjewBxFNXJhAw', 'zftJjnPfQVjewBxFNXJhAw', '2023-12-14 15:39:13'),
(65, 'nsFhQNlheyjeM', 'normanhebrewu@yahoo.com', '1', 'eEKoIVkFbaduNVePCTvsT', 'eEKoIVkFbaduNVePCTvsT', '2023-12-15 00:22:04'),
(66, 'Carlo Synan', 'carlo.synan@gmail.com', '078 6665 3697', 'Hello ommsculpture.com Owner.', 'I now offer contact form blasting service. With my DFY service you can either do a targeted blast to only websites that match your criteria or bulk blast large volumes of sites worldwide. Prices start at just $50 to reach 500,000 bulk sites. Contact me at', '2023-12-16 00:13:23'),
(67, 'Simone', 'MaulLI.djppdwm@<html>', '1', 'Koa Mcdaniel', 'Koa Mcdaniel', '2023-12-16 18:09:06'),
(68, 'Anna Wilson', 'annawilson.mkt@gmail.com', '1234567890', 'SEO Service', 'Hello,\r\n\r\nI just wanted to know if you require a better solution to manage SEO, SMO, SMM, PPC Campaigns, keyword research, Reporting etc. We are a leading Digital Marketing Agency, offering marketing solutions at affordable prices.\r\n\r\nWe can manage all as', '2023-12-18 06:14:03'),
(69, 'Patti Egger', 'egger.patti@outlook.com', '0660 574 85 54', 'Have you seen this?', 'People are quitting their jobs with this... Have you seen it?\r\n\r\nhttps://rumble.com/v41owvf-automated-online-income.html', '2023-12-19 10:17:27'),
(70, 'eVUoQtIbuxSlq', 'JuVnHn.mpwcdmd@scranch.shop', '1', 'ckyMTJjbHNCITEtU', 'ckyMTJjbHNCITEtU', '2023-12-23 06:23:55'),
(71, 'CqcCerAlCODBlsC', 'hardik.madlani@gmail.com', '1', 'RRCJlEFTKqwfhKlswcS', 'RRCJlEFTKqwfhKlswcS', '2023-12-23 22:58:48'),
(72, 'lSTqCCPfbuY', 'raedzuhair@yahoo.com', '1', 'YRDOXDMwLxyYzqzJB', 'YRDOXDMwLxyYzqzJB', '2023-12-24 03:30:02'),
(73, 'fnHcOEKKQRWUaH', 'cjohnson@gbssllc.com', '1', 'KQiwKoaeedHPwfp', 'KQiwKoaeedHPwfp', '2023-12-24 04:15:31'),
(74, 'hxSzqYLtJbyX', 'hermanm@cableone.net', '1', 'XTPkHctAuCtssHTwSzf', 'XTPkHctAuCtssHTwSzf', '2023-12-24 04:48:55'),
(75, 'VSLlRwzcJ', 'raedzuhair@yahoo.com', '1', 'jdvyEfLDPWJwxlJHFfj', 'jdvyEfLDPWJwxlJHFfj', '2023-12-24 05:21:48'),
(76, 'OoPwtSVSwIskjN', 'admin@fremontpediatricdental.com', '1', 'WsRmubDuKuACcUMN', 'WsRmubDuKuACcUMN', '2023-12-24 06:08:12'),
(77, 'Winnie', 'aKPTTe.pqdmhqj@chiffon.fun', '1', 'Liana Delacruz', 'Liana Delacruz', '2023-12-28 18:17:09'),
(78, 'Thomas Kerrigan', 'kerrigan.thomas68@gmail.com', '04131 42 54 84', 'Dear ommsculpture.com Webmaster!', 'I now offer contact form blasting service. With my DFY service you can either do a targeted blast to only websites that match your criteria or bulk blast large volumes of sites worldwide. Prices start at just $50 to reach 500,000 bulk sites. Contact me at', '2023-12-29 00:28:55'),
(79, 'Jiraiya', 'VdKahI.bcjqmdm@rottack.autos', '1', 'Rosalyn Peralta', 'Rosalyn Peralta', '2023-12-30 03:27:49'),
(80, 'Ivory', 'seth@smartvoltav.com', '1', 'Juliette Padilla', 'Juliette Padilla', '2023-12-30 03:33:37'),
(81, 'Madilyn', 'stcollins44@gmail.com', '1', 'Violeta Orozco', 'Violeta Orozco', '2023-12-30 05:00:23'),
(82, 'Mckinley', 'martywestby@comcast.net', '1', 'Michaela Winters', 'Michaela Winters', '2023-12-31 08:53:39'),
(83, 'Jordyn', 'chad.stone@gmail.com', '1', 'Clyde Hester', 'Clyde Hester', '2023-12-31 13:54:33'),
(84, 'Scarlette', 'rbertone@dtpd.org', '1', 'Lewis Foley', 'Lewis Foley', '2024-01-02 07:22:59'),
(85, 'Jimmy Mario', 'jo.mario@gmail.com', '7249232357', 'Dear ommsculpture.com Admin.', 'Why choose Our ongoing monthly SEO services?\r\n\r\nSEO is a great addition to your digital marketing plan if you want to help your business reach more valuable traffic and earn new leads. By investing in monthly SEO services, youâ€™ll continue to optimize yo', '2024-01-05 12:59:00'),
(86, 'Matthew', 'CtkLej.ppthqbm@bakling.click', '1', 'Braden Summers', 'Braden Summers', '2024-01-14 13:38:34'),
(87, 'Luciano', 'waYjmw.qqmmqbj@wheelry.boats', '1', 'Sonny Odonnell', 'Sonny Odonnell', '2024-01-15 08:50:56'),
(88, 'Phil Stewart', 'noreplyhere@aol.com', '342-123-4456', '??', 'I just delivered this message to you via your website contact form and I can do the same for your ad message to millions of websites. You can get this service for a fraction of the cost of conventional advertising.If you are interested, you can reach me v', '2024-01-22 17:39:41'),
(89, 'Carmelo', 'HfSPTE.qpqbdt@tonetics.biz', '1', 'Gia Clarke', 'Gia Clarke', '2024-01-27 06:35:45'),
(90, 'Bethany', 'vjaime912@gmail.com', '1', 'Cannon Chandler', 'Cannon Chandler', '2024-01-27 18:24:40'),
(91, 'Edwardo Seyler', 'seyler.edwardo@gmail.com', '(08) 9445 5316', 'To the ommsculpture.com Owner.', 'Are you looking for a dream home in a land of luxury and opportunity? Discover the best Overseas real estate deals in the Arab Emirates, where you can buy directly from the developer and save! Enjoy stunning views, world-class amenities, and tax-free livi', '2024-01-27 18:25:57'),
(92, 'Maximus', 'josealvarez2@gmail.com', '1', 'Kason Little', 'Kason Little', '2024-01-27 18:56:07'),
(93, 'Amina', 'cemdgg@gmail.com', '1', 'Aiden Eaton', 'Aiden Eaton', '2024-01-27 19:50:07'),
(94, 'Jamari', 'neillyx6@verizon.net', '1', 'Augustus Spencer', 'Augustus Spencer', '2024-01-27 20:43:15'),
(95, 'Meadow', 'kevinjbull@verizon.net', '1', 'Michelle Dunn', 'Michelle Dunn', '2024-01-27 21:21:27'),
(96, 'Kahlani', 'akrown@bayousbestburgers.com', '1', 'Daxton Hall', 'Daxton Hall', '2024-01-27 21:41:31'),
(97, 'Colton', 'andrew.gusty@gmail.com', '1', 'Ayden Hall', 'Ayden Hall', '2024-01-27 21:54:56'),
(98, 'Amora', 'kanupatel01@gmail.com', '1', 'Vivienne Clark', 'Vivienne Clark', '2024-01-27 22:07:49'),
(99, 'Aniyah', 'ddepallo@verizon.net', '1', 'Cameron Browning', 'Cameron Browning', '2024-01-27 22:23:10'),
(100, 'Walter', 'dpzandfam@verizon.net', '1', 'Liv Decker', 'Liv Decker', '2024-01-28 13:27:19'),
(101, 'Rio', 'becauseofdreamer@gmail.com', '1', 'Sawyer Smith', 'Sawyer Smith', '2024-01-28 20:59:03'),
(102, 'Phil Stewart', 'noreplyhere@aol.com', '342-123-4456', '??', 'I just delivered this message to you via your website contact form and I can do the same for your ad message to millions of websites. You can get this service for a fraction of the cost of conventional advertising.Contact me by email or skype below if you', '2024-01-31 19:15:29'),
(103, 'Amayah', 'oBQIuM.qptcqhb@kerfuffle.asia', '1', 'Adrian Clarke', 'Adrian Clarke', '2024-02-08 07:27:46'),
(104, 'Phil Stewart', 'noreplyhere@aol.com', '342-123-4456', '??', 'I just delivered this message to you via your website contact form and I can do the same for your ad message to millions of websites. You can get this service for a fraction of the cost of conventional advertising.Contact me by email or skype below if you', '2024-02-10 04:56:49'),
(105, 'Brianna', 'vTvcUb.hpmtqqh@tarboosh.shop', '1', 'Oliver Trevino', 'Oliver Trevino', '2024-02-14 09:13:31'),
(106, 'Phil Stewart', 'noreplyhere@aol.com', '342-123-4456', '??', 'I just delivered this message to you via your website contact form and I can do the same for your ad message to millions of websites. You can get this service for a fraction of the cost of conventional advertising.For more information, please email me or ', '2024-02-19 19:30:02'),
(107, 'jeral', 'cdthmpdt.b@monochord.xyz', '1', 'jeral haithcock', 'jeral haithcock', '2024-02-23 15:25:54'),
(108, 'Harlow', 'kFDTkw.chbmcq@wisefoot.club', '1', 'Tru Chase', 'Tru Chase', '2024-02-25 18:49:11'),
(109, 'Peter Higbee', 'billie.higbee@gmail.com', '40-55-81-00', 'Turbo Charged Backlinks for SEO', 'Get Our Turbo Charged Link Building Plan: https://alwaysdigital.co/lgt/\r\n\r\n1. Brand Awareness\r\n2. Recurring Income\r\n3. Builds Credibility\r\n4. Boosts Online Visibility\r\n5. Opens Better Revenue Opportunities\r\n6. Increase Your Website Traffic\r\n7. Raises Your', '2024-02-27 07:42:40'),
(110, 'Eleanore Lima', 'lima.eleanore@gmail.com', '(02) 6186 5847', 'Hello ommsculpture.com Webmaster.', 'New tech could give Chatgpt a run for its money.  It turns your Youtube videos into video games..keeps people engaged to watch every second.  You can even reward them for watching the whole video and they give you their email to get the reward ;) As seen ', '2024-02-29 03:23:48'),
(111, 'Alexis Agostini', 'agostini.alexis@yahoo.com', '973-264-7754', 'Hi ommsculpture.com Webmaster.', 'Are you okay running your business without much funds? This could slow down growth and delay returns on your business.\r\n\r\nNow you have the Opportunity to Fund your Busineses and Projects without stress and without the burden of repayment as our interest i', '2024-03-04 18:43:44'),
(112, 'Rob Medford', 'medford.francis51@gmail.com', '0379 8457335', 'Hi ommsculpture.com Administrator!', 'GAMIFY your videos and get viewers to happily give you their email and phone number.  \r\n\r\nThere is no other tech like this..itâ€™s the next big thing. As seen on CBS, NBC, FOX, and ABC.  \r\n\r\nSee if you qualify for a free GAMIFICATION of your video.\r\n\r\nCon', '2024-03-12 18:44:18'),
(113, 'Zoila Collazo', 'collazo.zoila@gmail.com', '06-79931122', 'Find the best leads for ommsculpture.com', 'Hi!\r\n\r\nIt is with sad regret to inform you that LeadsFly is shutting down!\r\n\r\nWe have made available all our consumer and business leads for the entire world on our way out.\r\n\r\nWe have the following available worldwide:\r\n\r\nConsumer Records: 294,582,351\r\nB', '2024-03-14 00:12:44'),
(114, 'Phil Stewart', 'noreplyhere@aol.com', '342-123-4456', '??', 'Hey, looking to boost your ad game? Picture your message hitting website contact forms worldwide, grabbing attention from potential customers everywhere! Starting at just under a hundred bucks my budget-friendly packages are designed to make an impact. Dr', '2024-03-17 18:54:51'),
(115, 'Lonny Cumming', 'cumming.lonny@yahoo.com', '9777819289', 'Dear ommsculpture.com Admin.', 'DEADLINE to claim your tax credit: April 15, 2024 \r\nâ€¢	Our company is in Arizona andwill help you claim it; up to $32,220. \r\nâ€¢	There are NO fees unless we get you your check from the IRS. \r\nDonâ€™t miss your COVID tax credit: \r\nCall Kerry at 480-790-91', '2024-03-19 20:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_mst`
--

CREATE TABLE `gallery_mst` (
  `category_id` int(11) NOT NULL,
  `orcd` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `sequence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery_mst`
--

INSERT INTO `gallery_mst` (`category_id`, `orcd`, `name`, `image`, `description`, `status`, `sequence`) VALUES
(1, 1, 'Ganesh', '2024.03.011709298294.png', '<p>ok</p>\r\n', 0, 0),
(2, 1, 'Krishna', '2024.03.011709298318.png', '<p>ok</p>\r\n', 0, 0),
(3, 1, 'Shiva', '2024.03.011709298357.png', '<p>ok</p>\r\n', 0, 0),
(4, 1, 'Shiva', '2024.03.021709380488.png', '<p>ok</p>\r\n', 0, 0),
(5, 1, 'LORD GANESHA ', '2024.03.041709531297.png', '<p>Ganesha or (Ganesh) is&nbsp;the elephant-headed god in Hindu Religion. He is the son of God Shiva and Goddess Parvati. Ganesha is a very popular god in Hindu Religion, and is one of the most worshipped. Hindu tradition states that Ganesha is a god of wisdom, success and good luck.</p>\r\n', 1, 0),
(6, 1, 'LORD BUDDHA ', '2024.03.041709531380.png', '<p>According to Buddhist tradition, he was born in Lumbini, in what is now Nepal, to royal parents of the Shakya clan, but renounced his home life to live as a wandering ascetic (Sanskrit: Å›ramaá¹‡a). After leading a life of mendicancy, asceticism, and meditation, he attained enlightenment at Bodh Gaya in what is now India.</p>\r\n', 1, 0),
(7, 1, 'STANDING BUDDHA ', '2024.03.041709531574.png', '<p>This Buddha image embodies the qualities of radiant inner calm and stillness, the products of supreme wisdom. The figure once raised his right hand (now missing) in the characteristic abhaya-mudra, a gesture dispelling fear and imparting reassurance. The Buddha is robed in the simple, uncut cloth of a monk, and his religiosity is further conveyed by a large halo and auspicious markings (lakshanas), both natural and supernatural, denoting Buddhahood (the state of perfect enlightenment), As the summation of stylistic development in a period of Buddhist expansion, this representation became the benchmark for the Buddha image throughout Asia.</p>\r\n', 1, 0),
(8, 1, 'VISHNU ', '2024.03.041709531722.png', '<p>Vishnu is&nbsp;the god of Preservation, the great maintainer who often appears in various incarnations (avatara) to provide salvation for humanity. Some of his best-known avatars, who are tremendously popular and beloved throughout Hindu India, are the gods Krishna and Rama.</p>\r\n', 0, 0),
(9, 1, 'LORD VISHNU ', '2024.03.041709531969.png', '<p>Vishnu is&nbsp;the god of Preservation, the great maintainer who often appears in various incarnations (avatara) to provide salvation for humanity. Some of his best-known avatars, who are tremendously popular and beloved throughout Hindu India, are the gods Krishna and Rama.</p>\r\n', 1, 0),
(10, 1, 'APSARA', '2024.03.041709532079.png', '<p>Apsaras are&nbsp;beautiful, supernatural female beings. They are youthful and elegant, and superb in the art of dancing. They are often the wives of the Gandharvas, the court musicians of Indra. They dance to the music made by the Gandharvas, usually in the palaces of the gods, entertain and sometimes seduce gods and men.</p>\r\n', 1, 0),
(11, 1, 'LORD HANUMAN ', '2024.03.041709532152.png', '<p>Hanuman is&nbsp;a Hindu god whose shape is half-monkey, half-human. He is the most devoted follower of Prince Rama, so he features a lot in the Ramayana as well as lots of other traditional Hindu stories and artworks. Hanuman has special powers and qualities that he uses to help Rama rescue his wife&nbsp;Sita.</p>\r\n', 1, 0),
(12, 1, 'LORD PARASURAM ', '2024.03.041709532392.png', '<p>He is described as a Brahman, a warrior, and an ascetic with matted locks of hair. Parashurama&#39;s axe, gifted to him by Lord Shiva, is called Parashu, from which his name, Parashurama, Parashuram, Parshuram, or Parasurama, is derived. He is sometimes depicted carrying a warrior&#39;s bow or shield.</p>\r\n', 1, 0),
(13, 1, 'MARBLE WALL ', '2024.03.041709532487.png', '<p>Marble is a timeless material that has been used in architecture and design for centuries. Its beauty and durability make it a popular choice for both indoor and outdoor applications. Marble wall cladding is a great way to add both style and function to your home or business.</p>\r\n', 1, 0),
(14, 1, 'THREE HEAD GANESH ', '2024.03.041709532715.png', '<p>Trimukha Ganapati, the contemplative, three-faced Lord,&nbsp;represents the ganas or the qualities which are sattva, rajas and tamas i.e. goodness, passion and ignorance respectively. Mind is always in sattva, whereas rajas and tamas are the two disturbing elements symbolizing activity and inactivity.</p>\r\n', 1, 0),
(15, 1, 'TAMPLE CONSTRUCTION ', '2024.03.041709532927.png', '<p>In the early stage of temple construction, the roofs were flat (temple Number-17 at Sanchi, Madhya Pradesh). In the next stage of temple construction, the roof became pyramidal. This was the&nbsp;shikhara, a tall spire that tapered at the top. In the later stages, more additions were made to the temple complex.</p>\r\n', 1, 0),
(16, 1, 'DANCING APSARA ', '2024.03.041709533027.png', '<p>Apsaras, often referred to as&nbsp;celestial nymphs or dancers, are divine and ethereal beings found in the mythologies and art of several Southeast Asian cultures, most notably in Khmer culture.</p>\r\n', 1, 0),
(17, 1, 'SITTING BUDDHA ', '2024.03.041709553726.png', '<p>The sitting Buddha is the most common representation of the Buddha. These Buddha statues&nbsp;can represent teaching, meditation, or an attempt to reach enlightenment.</p>\r\n', 1, 0),
(18, 1, 'BAL GANESHA ', '2024.03.041709553841.png', '<p>Ganesha or (Ganesh) is&nbsp;the elephant-headed god in Hindu Religion. He is the son of God Shiva and Goddess Parvati. Ganesha is a very popular god in Hindu Religion, and is one of the most worshipped. Hindu tradition states that Ganesha is a god of wisdom, success and good luck.</p>\r\n', 1, 0),
(19, 1, 'MATSYA AVATAR', '2024.03.041709553941.png', '<p>In the first of his ten incarnations, the god Vishnu took the form of Matsya (a fish) to save primeval man from the deluge that consumed the world. Here&nbsp;Vishnu is shown as a complete fish rather than the more usual interpretation of the god as a human torso with the lower body of a fish.</p>\r\n', 1, 0),
(21, 1, 'HEllo', '2024.03.231711196375.png', '<p>Hello</p>\r\n', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gal_dtl01`
--

CREATE TABLE `gal_dtl01` (
  `GAD_GACD` int(11) NOT NULL,
  `GAD_PGCD` int(11) NOT NULL,
  `GAD_ORCD` int(11) NOT NULL,
  `GAD_CACD` int(11) NOT NULL,
  `GAD_SBCACD` int(11) NOT NULL,
  `GAD_TITL` varchar(255) DEFAULT '',
  `GAD_DESC` longtext DEFAULT NULL,
  `GAD_IMG` varchar(60) NOT NULL,
  `GAD_IMGTP` int(1) DEFAULT 0,
  `GAD_STAT` int(1) NOT NULL,
  `GAD_CANC` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gal_dtl01`
--

INSERT INTO `gal_dtl01` (`GAD_GACD`, `GAD_PGCD`, `GAD_ORCD`, `GAD_CACD`, `GAD_SBCACD`, `GAD_TITL`, `GAD_DESC`, `GAD_IMG`, `GAD_IMGTP`, `GAD_STAT`, `GAD_CANC`) VALUES
(1, 5, 1, 1, 16, 'Ganesha Statue', '<p>Stone Ganesha Statue Seated</p>\r\n', '2023.07.181689669397.png', 1, 1, 0),
(2, 5, 1, 1, 17, 'Durga Statue', '<p>Maa Durga</p>', '2023.07.181689694342.png', 2, 1, 0),
(3, 5, 1, 1, 16, 'Ganesha Statue', '<p>Lord Ganesha</p>', '2023.07.181689694429.png', 2, 1, 0),
(7, 5, 1, 1, 16, 'Ganesha Statue', '<p>Lord Ganesha</p>', '2024.02.061707201925.png', 2, 1, 0),
(8, 5, 1, 1, 16, 'Ganesha Statue', '<p>Lord Ganesha</p>', '2024.02.061707202005.png', 1, 1, 0),
(18, 5, 1, 1, 16, 'Ganesha Statue', '<p>Lord Ganesha</p>', '2024.02.071707313217.png', 1, 1, 0),
(20, 5, 1, 1, 17, 'Budhha Statue', '<p>Lord Budhha</p>', '2024.02.081707384924.png', 1, 1, 0),
(21, 5, 1, 5, 21, 'Apsara Statue', '<p>Apsara Statue</p>\n', '2024.02.081707385022.png', 2, 1, 0),
(22, 5, 1, 5, 21, 'Apsara', '<p>Apsara Statue</p>', '2024.02.081707385055.png', 2, 1, 0),
(23, 0, 1, 2, 27, 'Horse', '<p>Horse</p>', '2024.02.081707385150.png', 1, 1, 0),
(24, 0, 1, 2, 26, 'Snake', '<p>Snake</p>', '2024.02.081707385215.png', 1, 1, 0),
(26, 5, 1, 1, 18, 'Durga', '<p>Durga</p>\r\n', '2024.03.231711196336.png', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

CREATE TABLE `general_setting` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `topbar_bgcolor` varchar(10) NOT NULL,
  `topbar_fontsize` varchar(10) NOT NULL,
  `topbar_fontfamily` varchar(50) NOT NULL,
  `topbar_color` varchar(10) NOT NULL,
  `menubar_bgcolor` varchar(10) NOT NULL,
  `menubar_fontsize` varchar(10) NOT NULL,
  `menubar_fontfamily` varchar(50) NOT NULL,
  `menubar_color` varchar(10) NOT NULL,
  `footer_bgcolor` varchar(10) NOT NULL,
  `footer_fontsize` varchar(10) NOT NULL,
  `footer_fontfamily` varchar(50) NOT NULL,
  `footer_color` varchar(10) NOT NULL,
  `menutitle_fontsize` varchar(10) NOT NULL,
  `menutitle_fontfamily` varchar(50) NOT NULL,
  `menutitle_color` varchar(10) NOT NULL,
  `pagetitle_fontsize` varchar(10) NOT NULL,
  `pagetitle_fontfamily` varchar(50) NOT NULL,
  `pagetitle_color` varchar(10) NOT NULL,
  `pagecontent_fontsize` varchar(10) NOT NULL,
  `pagecontent_fontfamily` varchar(50) NOT NULL,
  `pagecontent_color` varchar(10) NOT NULL,
  `adminmenu_bgcolor` varchar(20) NOT NULL,
  `adminheader_bgcolor` varchar(20) NOT NULL,
  `adminmenu_color` varchar(20) NOT NULL,
  `logo_height` varchar(11) NOT NULL,
  `logo_width` varchar(11) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `sys_name` varchar(160) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id`, `page_id`, `org_id`, `topbar_bgcolor`, `topbar_fontsize`, `topbar_fontfamily`, `topbar_color`, `menubar_bgcolor`, `menubar_fontsize`, `menubar_fontfamily`, `menubar_color`, `footer_bgcolor`, `footer_fontsize`, `footer_fontfamily`, `footer_color`, `menutitle_fontsize`, `menutitle_fontfamily`, `menutitle_color`, `pagetitle_fontsize`, `pagetitle_fontfamily`, `pagetitle_color`, `pagecontent_fontsize`, `pagecontent_fontfamily`, `pagecontent_color`, `adminmenu_bgcolor`, `adminheader_bgcolor`, `adminmenu_color`, `logo_height`, `logo_width`, `created_by`, `ip_address`, `sys_name`, `date_time`) VALUES
(2, 13, 1, '#343b48', '16px', '\'-apple-system,BlinkMacSystemFont,', '#ffffff', '#ffffff', '14px', '\'Open Sans\', sans-serif', '#000000 ', '#1a1c1d', '14px', '\'Open Sans\', sans-serif', '#ffffff', '20px', '\'Roboto\', sans-serif', '#ff00ea', '24px', '\'Roboto\', sans-serif', '#139e81', '', '', '', '#343b48', '#ffffff', '#ffffff', '75px', '100px', 'Omm Stone Art Gallery', '49.37.115.21', 'bom1plzcpnl493958.prod.bom1.secureserver.net', '2024-03-06 18:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `img_typ`
--

CREATE TABLE `img_typ` (
  `IMT_ID` int(11) NOT NULL,
  `IMT_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_typ`
--

INSERT INTO `img_typ` (`IMT_ID`, `IMT_NAME`) VALUES
(1, 'Sitting'),
(2, 'Standing'),
(3, 'Sleeping');

-- --------------------------------------------------------

--
-- Table structure for table `org_mst01`
--

CREATE TABLE `org_mst01` (
  `ORM_ORCD` int(10) NOT NULL,
  `ORM_NAME` varchar(60) NOT NULL,
  `ORM_DMNM` varchar(60) NOT NULL,
  `ORM_CPNM` varchar(60) NOT NULL,
  `ORM_MAIL` varchar(60) NOT NULL,
  `ORM_LOGO` varchar(60) NOT NULL,
  `ORM_PROF` varchar(60) NOT NULL,
  `ORM_CONO` varchar(20) NOT NULL,
  `ORM_PASS` varchar(60) NOT NULL,
  `ORM_FB` varchar(255) NOT NULL,
  `ORM_TW` varchar(255) NOT NULL,
  `ORM_YT` varchar(255) NOT NULL,
  `ORM_PT` varchar(255) NOT NULL,
  `ORM_LI` varchar(255) NOT NULL,
  `ORM_GP` varchar(255) NOT NULL,
  `ORM_STAT` int(1) NOT NULL,
  `ORM_CANC` int(1) NOT NULL,
  `ORM_DTTM` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_mst01`
--

INSERT INTO `org_mst01` (`ORM_ORCD`, `ORM_NAME`, `ORM_DMNM`, `ORM_CPNM`, `ORM_MAIL`, `ORM_LOGO`, `ORM_PROF`, `ORM_CONO`, `ORM_PASS`, `ORM_FB`, `ORM_TW`, `ORM_YT`, `ORM_PT`, `ORM_LI`, `ORM_GP`, `ORM_STAT`, `ORM_CANC`, `ORM_DTTM`) VALUES
(1, 'Omm Stone Art Gallery', 'www.ommsculpture.com', 'Anup kumar Barik', 'ommstoneart@gmail.com', 'Untitled design.png', 'prabhu.jpg', '7504299519', '12345', 'https://www.facebook.com/?stype=lo&jlou=AfexfBc7SX0BLMn49dIbC8BoEGAwgTzL3I-_FsZPKJbv5dLLDSUUIyGIuQrPcyUybrJu49f2g87RQ4-pwPHAuvsPTgpbDBpxqqFndewG-gdpLw&smuh=26049&lh=Ac8hzzW8r6f0T_Q_', 'https://twitter.com/login?lang=en', 'https://accounts.google.com/signin/v2/identifier?service=youtube&uilel=3&passive=true&continue=https%3A%2F%2Fwww.youtube.com%2Fsignin%3Faction_handle_signin%3Dtrue%26app%3Ddesktop%26hl%3Den%26next%3D%252F&hl=en&flowName=GlifWebSignIn&flowEntry=ServiceLogi', 'https://in.pinterest.com/', 'https://in.linkedin.com/', 'https://accounts.google.com/signin/v2/identifier?passive=1209600&continue=https%3A%2F%2Fplay.google.com%2Fstore%2Faccount%3Fhl%3Den&followup=https%3A%2F%2Fplay.google.com%2Fstore%2Faccount%3Fhl%3Den&hl=en&flowName=GlifWebSignIn&flowEntry=ServiceLogin', 1, 0, '2024-03-07 06:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `pag_dtl01`
--

CREATE TABLE `pag_dtl01` (
  `PAD_PGCD` int(10) NOT NULL,
  `PAD_PACD` int(10) NOT NULL,
  `PAD_ORCD` int(10) NOT NULL,
  `PAD_CACD` int(11) NOT NULL,
  `PAD_TITL` varchar(255) NOT NULL,
  `PAD_DESC` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PAD_IMG` varchar(100) NOT NULL,
  `PAD_API` varchar(60) NOT NULL,
  `PAD_ADSO` varchar(200) NOT NULL,
  `PAD_ADST` varchar(200) NOT NULL,
  `PAD_MAIL` varchar(60) NOT NULL,
  `PAD_PHN` varchar(12) NOT NULL,
  `PAD_LAT` varchar(50) NOT NULL,
  `PAD_LNG` varchar(50) NOT NULL,
  `PAD_STAT` int(1) NOT NULL,
  `PAD_CANC` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pag_dtl01`
--

INSERT INTO `pag_dtl01` (`PAD_PGCD`, `PAD_PACD`, `PAD_ORCD`, `PAD_CACD`, `PAD_TITL`, `PAD_DESC`, `PAD_IMG`, `PAD_API`, `PAD_ADSO`, `PAD_ADST`, `PAD_MAIL`, `PAD_PHN`, `PAD_LAT`, `PAD_LNG`, `PAD_STAT`, `PAD_CANC`) VALUES
(1, 1, 1, 0, 'About Company', '<p><span style=\"font-size:24px\"><strong>OMM STONE ART GALLERY is premium organisation making statues and scluptures in stone and marble since last 25 years. we are from western part of ORISHA,INDIA making all type of idols BUDDHAS,GARDEN ornaments,small tamples for customers.we have allso customised items for our premium customers.we have customers from U.S.A,AUSTRALIA,MALAYSIA,SINGAPUR ETC.</strong></span></p>\r\n', '2024.03.041709561659.png', '', '', '', '', '', '', '', 1, 0),
(2, 2, 1, 0, 'Our Company vission', '<h2 style=\"font-style:italic\"><span style=\"color:#c0392b\"><strong><span style=\"font-size:16px\"><span style=\"font-family:Comic Sans MS,cursive\">Dorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur sit amet ante nec vulputatery Nullay aliquam, justo auctor consequat tincidunt, arcu erat mattis lorem, lacinia lacinia dui enim at eros. Pellentesque ut gravida augue.</span></span></strong></span></h2>\r\n\r\n<h2 style=\"font-style:italic\"><span style=\"color:#c0392b\"><strong><span style=\"font-size:16px\"><span style=\"font-family:Comic Sans MS,cursive\">Duis ac dictum tellus Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur sit amet ante nec vulputate. Nulla aliquam, justo auctor consequat tincidunt, arcu erat mattis lorem, lacinia lacinia dui enim at eros. Pellentesque ut gravida augue.</span></span></strong></span></h2>\r\n\r\n<h2 style=\"font-style:italic\"><span style=\"color:#c0392b\"><strong><span style=\"font-size:16px\"><span style=\"font-family:Comic Sans MS,cursive\">Duis ac dictum tellus Pellentesque in mauris placerat, porttitor lorem id, ornare nisl. Pellentesque rhoncus convallis felis, in egestas libero. Donec et nibh dapibus, sodales nisi quis, fringilla augue. Donec dui quam, egestas in varius ut, tincidunt quis ipsum.</span></span></strong></span></h2>\r\n\r\n<h2 style=\"font-style:italic\"><span style=\"color:#c0392b\"><strong><span style=\"font-size:16px\"><span style=\"font-family:Comic Sans MS,cursive\">Nulla nec odio eu nisi imperdiet dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur sit amet ante nec vulputate. Nulla aliquam, justo auctor consequat tincidunt, arcu erat mattis lorem, lacinia lacinia dui enim at eros. Pellentesque ut gravida augue. Duis ac dictum tellusPellentesque in mauris placerat, porttitor lorem id, ornare nisl. Pellentesque rhoncus convallis felis, in egestas liber Donedapibus.</span></span></strong></span></h2>\r\n', '183-1834382_web-development-png.png', '', '', '', '', '', '', '', 1, 0),
(3, 3, 1, 0, 'How can we help?', '', '', '', 'At-Chhatria, Po-Arandua, Via-Basudevpur', 'Dist-Bhadrak, \r\n  Pin-756168', 'ommstoneart@gmail.com', '7504299519', '21.142384032390257', '86.69614663751818', 1, 0),
(16, 9, 1, 1, 'Ganesha', '<p>OK</p>\r\n', '2023.05.111683792089.png', '', '', '', '', '', '', '', 1, 0),
(17, 9, 1, 1, 'Buddha', '<p>OK</p>\r\n', '2023.05.111683809225.png', '', '', '', '', '', '', '', 1, 0),
(18, 9, 1, 1, 'Durga', '<p>OK</p>\r\n', '2023.05.111683809271.png', '', '', '', '', '', '', '', 1, 1),
(19, 9, 1, 1, 'Buddha', '<p>OK</p>\r\n', '2023.05.111683809318.png', '', '', '', '', '', '', '', 1, 0),
(20, 9, 1, 1, 'Krishna and Vishnu', '<p>OK</p>\r\n', '2023.05.111683809346.png', '', '', '', '', '', '', '', 1, 0),
(21, 9, 1, 1, 'Apsara and Decorative', '<p>OK</p>\r\n', '2023.05.111683809369.png', '', '', '', '', '', '', '', 1, 1),
(22, 9, 1, 4, 'Apsara', '<p>apsara statue</p>\r\n', '2024.02.061707204546.png', '', '', '', '', '', '', '', 1, 0),
(23, 9, 1, 2, 'Elephant', '<p>elephant statue</p>\r\n', '2024.02.061707204694.png', '', '', '', '', '', '', '', 1, 1),
(24, 9, 1, 2, 'Elephant', '<p>elephant statue</p>\r\n', '2024.02.061707204694.png', '', '', '', '', '', '', '', 1, 1),
(25, 9, 1, 2, 'TIGER', '<p>tiger</p>\r\n', '2024.02.091707455607.png', '', '', '', '', '', '', '', 1, 1),
(26, 9, 1, 2, 'Snake', '<p>snake</p>\r\n', '2024.03.231711191791.png', '', '', '', '', '', '', '', 1, 0),
(27, 9, 1, 2, 'Horse', '<p>Horse</p>\r\n', '2024.03.231711191831.png', '', '', '', '', '', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pag_mst01`
--

CREATE TABLE `pag_mst01` (
  `PAM_PACD` int(10) NOT NULL,
  `PAM_PANM` varchar(60) NOT NULL,
  `PAM_LINK` varchar(30) NOT NULL,
  `PAM_STAT` int(1) NOT NULL,
  `PAM_ORDER` int(1) NOT NULL,
  `PAM_CANC` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pag_mst01`
--

INSERT INTO `pag_mst01` (`PAM_PACD`, `PAM_PANM`, `PAM_LINK`, `PAM_STAT`, `PAM_ORDER`, `PAM_CANC`) VALUES
(1, 'About Us', 'about_us.php', 1, 1, 0),
(2, 'Vision & Mission', 'vision_mission.php', 1, 2, 0),
(3, 'Contact Us', 'contact_us.php', 1, 3, 0),
(5, 'Art Image', 'artimageupload.php', 2, 2, 0),
(6, 'Gallery', 'img_gallery.php', 2, 3, 0),
(9, 'Art Sub Category', 'services.php', 4, 2, 0),
(10, 'Notice Board', 'noticeboard.php', 0, 4, 1),
(11, 'Latest News', 'latestnews.php', 0, 3, 1),
(12, 'Banner', 'banner.php', 2, 1, 0),
(13, 'General Setting', 'general_setting.php', 0, 1, 0),
(14, 'Art Categories', 'category.php', 4, 1, 0),
(15, 'Menu Setting', 'menu_setting.php', 0, 2, 1),
(16, 'Ganesha', 'art_gallery.php', 3, 1, 0),
(17, 'Buddha', 'art_gallery.php', 3, 2, 0),
(18, 'Durga', 'art_gallery.php', 3, 3, 0),
(19, 'Shiva', 'art_gallery.php', 3, 4, 0),
(20, 'Krishna and Vishnu', 'art_gallery.php', 3, 5, 0),
(21, 'Apsara and Decorative', 'art_gallery.php', 3, 6, 0),
(22, 'Homepage Image', 'gallery_img.php', 2, 3, 0),
(23, 'Gallery', 'gallery.php', 3, 7, 0),
(24, 'Gallery image', 'picture_gal.php', 2, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `picture_gal`
--

CREATE TABLE `picture_gal` (
  `category_id` int(11) NOT NULL,
  `orcd` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `picture_gal`
--

INSERT INTO `picture_gal` (`category_id`, `orcd`, `name`, `image`, `description`, `address`, `status`) VALUES
(0, 1, 'Sohan', '2024.03.231711196424.png', '<p>Good</p>\r\n', 'bbsr', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`, `password`, `date`) VALUES
(1, 'Admin', '7504299519', 'ommstoneart@gmail.com', '12345', '2022-12-27 07:46:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adv_banner`
--
ALTER TABLE `adv_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_mst`
--
ALTER TABLE `banner_mst`
  ADD PRIMARY KEY (`BAM_BACD`);

--
-- Indexes for table `category_mst`
--
ALTER TABLE `category_mst`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cat_mst01`
--
ALTER TABLE `cat_mst01`
  ADD PRIMARY KEY (`CAM_CACD`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_mst`
--
ALTER TABLE `gallery_mst`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `gal_dtl01`
--
ALTER TABLE `gal_dtl01`
  ADD PRIMARY KEY (`GAD_GACD`);

--
-- Indexes for table `general_setting`
--
ALTER TABLE `general_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_typ`
--
ALTER TABLE `img_typ`
  ADD PRIMARY KEY (`IMT_ID`);

--
-- Indexes for table `org_mst01`
--
ALTER TABLE `org_mst01`
  ADD PRIMARY KEY (`ORM_ORCD`);

--
-- Indexes for table `pag_dtl01`
--
ALTER TABLE `pag_dtl01`
  ADD PRIMARY KEY (`PAD_PGCD`);

--
-- Indexes for table `pag_mst01`
--
ALTER TABLE `pag_mst01`
  ADD PRIMARY KEY (`PAM_PACD`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adv_banner`
--
ALTER TABLE `adv_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banner_mst`
--
ALTER TABLE `banner_mst`
  MODIFY `BAM_BACD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category_mst`
--
ALTER TABLE `category_mst`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cat_mst01`
--
ALTER TABLE `cat_mst01`
  MODIFY `CAM_CACD` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `gallery_mst`
--
ALTER TABLE `gallery_mst`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `gal_dtl01`
--
ALTER TABLE `gal_dtl01`
  MODIFY `GAD_GACD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `general_setting`
--
ALTER TABLE `general_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `img_typ`
--
ALTER TABLE `img_typ`
  MODIFY `IMT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `org_mst01`
--
ALTER TABLE `org_mst01`
  MODIFY `ORM_ORCD` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pag_dtl01`
--
ALTER TABLE `pag_dtl01`
  MODIFY `PAD_PGCD` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pag_mst01`
--
ALTER TABLE `pag_mst01`
  MODIFY `PAM_PACD` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
