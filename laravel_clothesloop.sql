-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2017 at 10:41 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_clothesloop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nilesh', 'admin@gmail.com', '$2y$10$jzETAt1LIDkLE92LSCJPMOqgS.g7pQ9.nirT56Lm3ZfuXEjnY7xLi', 'wsAIJyDl1YfhgYlxEnGbhOhqGXf0lrI35ZcSXzpySpqKwQ6ioUdEnURWtIAu', '2017-01-17 19:31:59', '2017-01-26 00:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_description` text NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `blog_created_on` datetime NOT NULL,
  `blog_updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_description`, `blog_image`, `blog_created_on`, `blog_updated_on`) VALUES
(1, 'blog', '<p><strong>blog</strong></p>\r\n', 'Tulips1.jpg', '2016-12-21 10:48:53', '2016-12-21 10:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_user_id` int(11) NOT NULL,
  `cart_product_id` int(11) NOT NULL,
  `cart_product_name` varchar(255) NOT NULL,
  `cart_product_price` varchar(164) NOT NULL,
  `cart_product_qty` int(11) NOT NULL,
  `cart_product_img` varchar(255) NOT NULL,
  `cart_product_colour` int(11) NOT NULL,
  `cart_product_size` int(11) NOT NULL,
  `cart_product_total` varchar(164) NOT NULL,
  `cart_order_status` varchar(164) NOT NULL DEFAULT 'pending',
  `cart_created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_user_id`, `cart_product_id`, `cart_product_name`, `cart_product_price`, `cart_product_qty`, `cart_product_img`, `cart_product_colour`, `cart_product_size`, `cart_product_total`, `cart_order_status`, `cart_created_on`) VALUES
(20, 1, 12, 'pen ', '4 ', 1, 'Clothesloop_Website-4.jpg ', 0, 0, '4', 'pending', '2017-01-25 09:06:46'),
(21, 1, 12, 'pen ', '4 ', 2, 'Clothesloop_Website-4.jpg ', 0, 0, '8', 'success', '2017-01-28 08:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_parent_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_created_on` datetime NOT NULL,
  `category_updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_parent_id`, `category_name`, `category_created_on`, `category_updated_on`) VALUES
(2, 0, 'Men', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 0, 'Women', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 3, 'Tops', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 3, 'Pants-Shorts-Skirts', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 2, 'Jackets', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 2, 'big', '2017-01-10 06:29:14', '2017-01-19 05:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_state_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_state_id`, `city_name`) VALUES
(1, 1, 'Auburn'),
(2, 1, 'Birmingham'),
(3, 1, 'Dothan'),
(4, 1, 'Gadsden'),
(5, 1, 'Huntsville'),
(6, 1, 'Mobile'),
(7, 1, 'Montgomery'),
(8, 1, 'Muscle Shoals'),
(9, 1, 'Tuscaloosa'),
(10, 2, 'Anchorage'),
(11, 2, 'Fairbanks'),
(12, 2, 'Juneau'),
(13, 2, 'Kenai Peninsula'),
(14, 3, 'Flagstaff/Sedona'),
(15, 3, 'Mohave County'),
(16, 3, 'Phoenix'),
(17, 3, 'Prescott'),
(18, 3, 'Show Low'),
(19, 3, 'Sierra Vista'),
(20, 3, 'Tucson'),
(21, 3, 'Yuma'),
(22, 4, 'Fayetteville'),
(23, 4, 'Fort Smith'),
(24, 4, 'Jonesboro'),
(25, 4, 'Little Rock'),
(26, 5, 'Bakersfield'),
(27, 5, 'Chico'),
(28, 5, 'Fresno'),
(29, 5, 'Humboldt County'),
(30, 5, 'Imperial County'),
(31, 5, 'Inland Empire'),
(32, 5, 'Long Beach'),
(33, 5, 'Los Angeles'),
(34, 5, 'Mendocino'),
(35, 5, 'Merced'),
(36, 5, 'Modesto'),
(37, 5, 'Monterey'),
(38, 5, 'North Bay'),
(39, 5, 'Oakland/East Bay'),
(40, 5, 'Orange County'),
(41, 5, 'Palm Springs'),
(42, 5, 'Palmdale/Lancaster'),
(43, 5, 'Redding'),
(44, 5, 'Sacramento'),
(45, 5, 'San Diego'),
(46, 5, 'San Fernando Valley'),
(47, 5, 'San Francisco'),
(48, 5, 'San Gabriel Valley'),
(49, 5, 'San Jose'),
(50, 5, 'San Luis Obispo'),
(51, 5, 'San Mateo'),
(52, 5, 'Santa Barbara'),
(53, 5, 'Santa Cruz'),
(54, 5, 'Santa Maria'),
(55, 5, 'Siskiyou'),
(56, 5, 'Stockton'),
(57, 5, 'Susanville'),
(58, 5, 'Ventura'),
(59, 5, 'Visalia'),
(60, 6, 'Boulder'),
(61, 6, 'Colorado Springs'),
(62, 6, 'Denver'),
(63, 6, 'Fort Collins'),
(64, 6, 'Pueblo'),
(65, 6, 'Rockies'),
(66, 6, 'Western Slope'),
(67, 7, 'Bridgeport'),
(68, 7, 'Eastern Connecticut'),
(69, 7, 'Hartford'),
(70, 7, 'New Haven'),
(71, 7, 'Northwest Connecticut'),
(72, 8, 'Delaware'),
(73, 9, 'Northern Virginia'),
(74, 9, 'Southern Maryland'),
(75, 9, 'Washington D.C.'),
(76, 10, 'Daytona'),
(77, 10, 'Fort Lauderdale'),
(78, 10, 'Fort Myers'),
(79, 10, 'Gainesville'),
(80, 10, 'Jacksonville'),
(81, 10, 'Keys'),
(82, 10, 'Lakeland'),
(83, 10, 'Miami'),
(84, 10, 'Ocala'),
(85, 10, 'Okaloosa'),
(86, 10, 'Orlando'),
(87, 10, 'Panama City'),
(88, 10, 'Pensacola'),
(89, 10, 'Sarasota/Bradenton'),
(90, 10, 'Space Coast'),
(91, 10, 'St. Augustine'),
(92, 10, 'Tallahassee'),
(93, 10, 'Tampa'),
(94, 10, 'Treasure Coast'),
(95, 10, 'West Palm Beach'),
(96, 11, 'Albany'),
(97, 11, 'Athens'),
(98, 11, 'Atlanta'),
(99, 11, 'Augusta'),
(100, 11, 'Brunswick'),
(101, 11, 'Columbus'),
(102, 11, 'Macon'),
(103, 11, 'Northwest Georgia'),
(104, 11, 'Savannah'),
(105, 11, 'Statesboro'),
(106, 11, 'Valdosta'),
(107, 12, 'Big Island'),
(108, 12, 'Honolulu'),
(109, 12, 'Kauai'),
(110, 12, 'Maui'),
(111, 13, 'Boise'),
(112, 13, 'East Idaho'),
(113, 13, 'Lewiston'),
(114, 13, 'Twin Falls'),
(115, 14, 'Bloomington'),
(116, 14, 'Carbondale'),
(117, 14, 'Chambana'),
(118, 14, 'Chicago'),
(119, 14, 'Decatur'),
(120, 14, 'La Salle County'),
(121, 14, 'Mattoon'),
(122, 14, 'Peoria'),
(123, 14, 'Rockford'),
(124, 14, 'Springfield'),
(125, 14, 'Western Illinois'),
(126, 15, 'Bloomington'),
(127, 15, 'Evansville'),
(128, 15, 'Ft Wayne'),
(129, 15, 'Indianapolis'),
(130, 15, 'Kokomo'),
(131, 15, 'Lafayette'),
(132, 15, 'Muncie'),
(133, 15, 'Richmond'),
(134, 15, 'South Bend'),
(135, 15, 'Terre Haute'),
(136, 16, 'Ames'),
(137, 16, 'Cedar Rapids'),
(138, 16, 'Desmoines'),
(139, 16, 'Dubuque'),
(140, 16, 'Fort Dodge'),
(141, 16, 'Iowa City'),
(142, 16, 'Mason City'),
(143, 16, 'Quad Cities'),
(144, 16, 'Sioux City'),
(145, 16, 'Southest Iowa'),
(146, 16, 'Waterloo'),
(147, 17, 'Lawrence'),
(148, 17, 'Manhattan'),
(149, 17, 'Salina'),
(150, 17, 'Topeka'),
(151, 17, 'Wichita'),
(152, 18, 'Bowling Green'),
(153, 18, 'Eastern Kentucky'),
(154, 18, 'Lexington'),
(155, 18, 'Louisville'),
(156, 18, 'Owensboro'),
(157, 18, 'Western Kentucky'),
(158, 19, 'Alexandria'),
(159, 19, 'Baton Rouge'),
(160, 19, 'Houma'),
(161, 19, 'Lafayette'),
(162, 19, 'Lake Charles'),
(163, 19, 'Monroe'),
(164, 19, 'New Orleans'),
(165, 19, 'Shreveport'),
(166, 20, 'Maine'),
(167, 21, 'Annapolis'),
(168, 21, 'Baltimore'),
(169, 21, 'Cumberland Valley'),
(170, 21, 'Eastern Shore'),
(171, 21, 'Frederick'),
(172, 21, 'Western Maryland'),
(173, 22, 'Boston'),
(174, 22, 'Cape Cod'),
(175, 22, 'South Coast'),
(176, 22, 'Springfield'),
(177, 22, 'Worcester'),
(178, 23, 'Ann Arbor'),
(179, 23, 'Battle Creek'),
(180, 23, 'Central Michigan'),
(181, 23, 'Detroit'),
(182, 23, 'Flint'),
(183, 23, 'Grand Rapids'),
(184, 23, 'Holland'),
(185, 23, 'Jackson'),
(186, 23, 'Kalamazoo'),
(187, 23, 'Lansing'),
(188, 23, 'Monroe'),
(189, 23, 'Muskegon'),
(190, 23, 'Northern Michigan'),
(191, 23, 'Port Huron'),
(192, 23, 'Saginaw'),
(193, 23, 'Southwest Michigan'),
(194, 23, 'Upper Peninsula'),
(195, 24, 'Bemidji'),
(196, 24, 'Brainerd'),
(197, 24, 'Duluth'),
(198, 24, 'Mankato'),
(199, 24, 'Minneapolis / St. Paul'),
(200, 24, 'Rochester'),
(201, 24, 'St. Cloud'),
(202, 25, 'Biloxi'),
(203, 25, 'Hattiesburg'),
(204, 25, 'Jackson'),
(205, 25, 'Meridian'),
(206, 25, 'North Mississippi'),
(207, 25, 'Southwest Mississippi'),
(208, 26, 'Columbia/Jeff City'),
(209, 26, 'Joplin'),
(210, 26, 'Kansas City'),
(211, 26, 'Kirksville'),
(212, 26, 'Lake Of The Ozarks'),
(213, 26, 'Southeast Missouri'),
(214, 26, 'Springfield'),
(215, 26, 'St Joseph'),
(216, 26, 'St. Louis'),
(217, 27, 'Billings'),
(218, 27, 'Bozeman'),
(219, 27, 'Butte'),
(220, 27, 'Great Falls'),
(221, 27, 'Helena'),
(222, 27, 'Kalispell'),
(223, 27, 'Missoula'),
(224, 28, 'Grand Island'),
(225, 28, 'Lincoln'),
(226, 28, 'North Platte'),
(227, 28, 'Omaha'),
(228, 28, 'Scottsbluff'),
(229, 29, 'Elko'),
(230, 29, 'Las Vegas'),
(231, 29, 'Reno'),
(232, 30, 'New Hampshire'),
(233, 31, 'Central Jersey'),
(234, 31, 'Jersey Shore'),
(235, 31, 'North Jersey'),
(236, 31, 'South Jersey'),
(237, 32, 'Albuquerque'),
(238, 32, 'Clovis / Portales'),
(239, 32, 'Farmington'),
(240, 32, 'Las Cruces'),
(241, 32, 'Roswell / Carlsbad'),
(242, 32, 'Santa Fe/Taos'),
(243, 33, 'Albany'),
(244, 33, 'Binghamton'),
(245, 33, 'Bronx'),
(246, 33, 'Brooklyn'),
(247, 33, 'Buffalo'),
(248, 33, 'Catskills'),
(249, 33, 'Chautauqua'),
(250, 33, 'Elmira'),
(251, 33, 'Fairfield'),
(252, 33, 'Finger Lakes'),
(253, 33, 'Glens Falls'),
(254, 33, 'Hudson Valley'),
(255, 33, 'Ithaca'),
(256, 33, 'Long Island'),
(257, 33, 'Manhattan'),
(258, 33, 'Oneonta'),
(259, 33, 'Plattsburgh'),
(260, 33, 'Potsdam'),
(261, 33, 'Queens'),
(262, 33, 'Rochester'),
(263, 33, 'Staten Island'),
(264, 33, 'Syracuse'),
(265, 33, 'Twin Tiers'),
(266, 33, 'Utica'),
(267, 33, 'Watertown'),
(268, 33, 'Westchester'),
(269, 34, 'Asheville'),
(270, 34, 'Boone'),
(271, 34, 'Charlotte'),
(272, 34, 'Eastern'),
(273, 34, 'Fayetteville'),
(274, 34, 'Greensboro'),
(275, 34, 'Hickory'),
(276, 34, 'Outer Banks'),
(277, 34, 'Raleigh-Durham'),
(278, 34, 'Wilmington'),
(279, 34, 'Winston-Salem'),
(280, 35, 'Bismarck'),
(281, 35, 'Fargo'),
(282, 35, 'Grand Forks'),
(283, 35, 'Minot'),
(284, 36, 'Akron/Canton'),
(285, 36, 'Ashtabula'),
(286, 36, 'Athens'),
(287, 36, 'Chillicothe'),
(288, 36, 'Cincinnati'),
(289, 36, 'Cleveland'),
(290, 36, 'Columbus'),
(291, 36, 'Dayton'),
(292, 36, 'Huntington/Ashland'),
(293, 36, 'Lima/Findlay'),
(294, 36, 'Mansfield'),
(295, 36, 'Sandusky'),
(296, 36, 'Toledo'),
(297, 36, 'Tuscarawas County'),
(298, 36, 'Youngstown'),
(299, 36, 'Zanesville/Cambridge'),
(300, 37, 'Lawton'),
(301, 37, 'Norman'),
(302, 37, 'Oklahoma City'),
(303, 37, 'Stillwater'),
(304, 37, 'Tulsa'),
(305, 38, 'Bend'),
(306, 38, 'Corvallis'),
(307, 38, 'East Oregon'),
(308, 38, 'Eugene'),
(309, 38, 'Klamath Falls'),
(310, 38, 'Medford'),
(311, 38, 'Oregon Coast'),
(312, 38, 'Portland'),
(313, 38, 'Roseburg'),
(314, 38, 'Salem'),
(315, 39, 'Allentown'),
(316, 39, 'Altoona'),
(317, 39, 'Chambersburg'),
(318, 39, 'Erie'),
(319, 39, 'Harrisburg'),
(320, 39, 'Lancaster'),
(321, 39, 'Meadville'),
(322, 39, 'Penn State'),
(323, 39, 'Philadelphia'),
(324, 39, 'Pittsburgh'),
(325, 39, 'Poconos'),
(326, 39, 'Reading'),
(327, 39, 'Scranton'),
(328, 39, 'Williamsport'),
(329, 39, 'York'),
(330, 40, 'Providence'),
(331, 40, 'Warwick'),
(332, 41, 'Charleston'),
(333, 41, 'Columbia'),
(334, 41, 'Florence'),
(335, 41, 'Greenville'),
(336, 41, 'Hilton Head'),
(337, 41, 'Myrtle Beach'),
(338, 42, 'Aberdeen'),
(339, 42, 'Pierre'),
(340, 42, 'Rapid City'),
(341, 42, 'Sioux Falls'),
(342, 43, 'Chattanooga'),
(343, 43, 'Clarksville'),
(344, 43, 'Cookeville'),
(345, 43, 'Knoxville'),
(346, 43, 'Memphis'),
(347, 43, 'Nashville'),
(348, 43, 'Tri-Cities'),
(349, 44, 'Abilene'),
(350, 44, 'Amarillo'),
(351, 44, 'Austin'),
(352, 44, 'Beaumont'),
(353, 44, 'Brownsville'),
(354, 44, 'College Station'),
(355, 44, 'Corpus Christi'),
(356, 44, 'Dallas'),
(357, 44, 'Del Rio'),
(358, 44, 'Denton'),
(359, 44, 'El Paso'),
(360, 44, 'Fort Worth'),
(361, 44, 'Galveston'),
(362, 44, 'Houston'),
(363, 44, 'Huntsville'),
(364, 44, 'Killeen'),
(365, 44, 'Laredo'),
(366, 44, 'Lubbock'),
(367, 44, 'Mcallen'),
(368, 44, 'Mid Cities'),
(369, 44, 'Odessa'),
(370, 44, 'San Antonio'),
(371, 44, 'San Marcos'),
(372, 44, 'Texarkana'),
(373, 44, 'Texoma'),
(374, 44, 'Tyler'),
(375, 44, 'Victoria'),
(376, 44, 'Waco'),
(377, 44, 'Wichita Falls'),
(378, 45, 'Logan'),
(379, 45, 'Ogden'),
(380, 45, 'Provo'),
(381, 45, 'Salt Lake City'),
(382, 45, 'St. George'),
(383, 46, 'Vermont'),
(384, 47, 'Charlottesville'),
(385, 47, 'Chesapeake'),
(386, 47, 'Danville'),
(387, 47, 'Fredericksburg'),
(388, 47, 'Hampton'),
(389, 47, 'Harrisonburg'),
(390, 47, 'Lynchburg'),
(391, 47, 'New River Valley'),
(392, 47, 'Newport News'),
(393, 47, 'Norfolk'),
(394, 47, 'Portsmouth'),
(395, 47, 'Richmond'),
(396, 47, 'Roanoke'),
(397, 47, 'Southwest Virginia'),
(398, 47, 'Suffolk'),
(399, 47, 'Virginia Beach'),
(400, 48, 'Bellingham'),
(401, 48, 'Everett'),
(402, 48, 'Moses Lake'),
(403, 48, 'Mt. Vernon'),
(404, 48, 'Olympia'),
(405, 48, 'Pullman'),
(406, 48, 'Seattle'),
(407, 48, 'Spokane / Coeur D''Alene'),
(408, 48, 'Tacoma'),
(409, 48, 'Tri-Cities'),
(410, 48, 'Wenatchee'),
(411, 48, 'Yakima'),
(412, 49, 'Charleston'),
(413, 49, 'Huntington'),
(414, 49, 'Martinsburg'),
(415, 49, 'Morgantown'),
(416, 49, 'Parkersburg'),
(417, 49, 'Southern West Virginia'),
(418, 49, 'Wheeling'),
(419, 50, 'Appleton'),
(420, 50, 'Eau Claire'),
(421, 50, 'Green Bay'),
(422, 50, 'Janesville'),
(423, 50, 'La Crosse'),
(424, 50, 'Madison'),
(425, 50, 'Milwaukee'),
(426, 50, 'Racine'),
(427, 50, 'Sheboygan'),
(428, 50, 'Wausau'),
(429, 51, 'Wyoming'),
(430, 52, 'Calgary'),
(431, 52, 'Edmonton'),
(432, 52, 'Ft Mcmurray'),
(433, 52, 'Lethbridge'),
(434, 52, 'Medicine Hat'),
(435, 52, 'Red Deer'),
(436, 53, 'Abbotsford'),
(437, 53, 'Cariboo'),
(438, 53, 'Comox Valley'),
(439, 53, 'Cranbrook'),
(440, 53, 'Kamloops'),
(441, 53, 'Kelowna'),
(442, 53, 'Nanaimo'),
(443, 53, 'Peace River Country'),
(444, 53, 'Prince George'),
(445, 53, 'Skeena'),
(446, 53, 'Sunshine Coast'),
(447, 53, 'Vancouver'),
(448, 53, 'Victoria'),
(449, 53, 'Whistler'),
(450, 54, 'Brandon'),
(451, 54, 'Winnipeg'),
(452, 55, 'New Brunswick'),
(453, 56, 'Newfoundland and Labrador'),
(454, 57, 'Northwest Territories'),
(455, 58, 'Nova Scotia'),
(456, 59, 'Barrie'),
(457, 59, 'Belleville'),
(458, 59, 'Brantford'),
(459, 59, 'Chatham'),
(460, 59, 'Cornwall'),
(461, 59, 'Guelph'),
(462, 59, 'Hamilton'),
(463, 59, 'Kingston'),
(464, 59, 'Kitchener'),
(465, 59, 'London'),
(466, 59, 'Niagara'),
(467, 59, 'Ottawa'),
(468, 59, 'Owen Sound'),
(469, 59, 'Peterborough'),
(470, 59, 'Sarnia'),
(471, 59, 'Sault Ste Marie'),
(472, 59, 'Sudbury'),
(473, 59, 'Thunder Bay'),
(474, 59, 'Toronto'),
(475, 59, 'Windsor'),
(476, 60, 'Montreal'),
(477, 60, 'Quebec City'),
(478, 60, 'Saguenay'),
(479, 60, 'Sherbrooke'),
(480, 60, 'Trois-Rivières'),
(481, 61, 'Prince Albert'),
(482, 61, 'Regina'),
(483, 61, 'Saskatoon'),
(484, 62, 'Yukon'),
(485, 63, 'Tiranë'),
(486, 64, 'Graz'),
(487, 64, 'Innsbruck'),
(488, 64, 'Linz'),
(489, 64, 'Salzburg'),
(490, 64, 'Wien'),
(491, 65, 'Minsk'),
(492, 66, 'Antwerp'),
(493, 66, 'Brussel'),
(494, 66, 'Charleroi'),
(495, 66, 'Ghent'),
(496, 66, 'Liege'),
(497, 67, 'Sarajevo'),
(498, 68, 'Balgariya'),
(499, 69, 'Zagreb'),
(500, 70, 'Nicosia'),
(501, 71, 'Brno'),
(502, 71, '?eské Bud?jovice'),
(503, 71, 'Olomouc'),
(504, 71, 'Ostrava'),
(505, 71, 'Plze?'),
(506, 71, 'Praha'),
(507, 72, 'Aarhus'),
(508, 72, 'København'),
(509, 73, 'Tallinn'),
(510, 74, 'Helsinki'),
(511, 75, 'Bordeaux'),
(512, 75, 'Bretagne'),
(513, 75, 'Corse'),
(514, 75, 'Départements D''Outre Mer'),
(515, 75, 'Grenoble'),
(516, 75, 'Lille'),
(517, 75, 'Loire'),
(518, 75, 'Lyon'),
(519, 75, 'Marseille'),
(520, 75, 'Montpellier'),
(521, 75, 'Nantes'),
(522, 75, 'Nice'),
(523, 75, 'Normandie'),
(524, 75, 'Paris'),
(525, 75, 'Strasbourg'),
(526, 75, 'Toulouse'),
(527, 76, 'Berlin'),
(528, 76, 'Bodensee'),
(529, 76, 'Bremen'),
(530, 76, 'Dortmund'),
(531, 76, 'Dresden'),
(532, 76, 'Düsseldorf'),
(533, 76, 'Essen'),
(534, 76, 'Frankfurt'),
(535, 76, 'Freiburg'),
(536, 76, 'Hamburg'),
(537, 76, 'Hannover'),
(538, 76, 'Heidelberg'),
(539, 76, 'Kaiserslautern'),
(540, 76, 'Karlsruhe'),
(541, 76, 'Kiel'),
(542, 76, 'Köln'),
(543, 76, 'Leipzig'),
(544, 76, 'Lübeck'),
(545, 76, 'Mannheim'),
(546, 76, 'München'),
(547, 76, 'Nürnberg'),
(548, 76, 'Rostock'),
(549, 76, 'Saarbrücken'),
(550, 76, 'Schwerin'),
(551, 76, 'Stuttgart'),
(552, 77, 'Athens'),
(553, 77, 'Thessaloniki'),
(554, 78, 'Budapest'),
(555, 79, 'Iceland'),
(556, 80, 'Cork'),
(557, 80, 'Derry'),
(558, 80, 'Dublin'),
(559, 80, 'Galway'),
(560, 80, 'Limerick'),
(561, 80, 'Lisburn'),
(562, 80, 'Waterford'),
(563, 81, 'Haifa'),
(564, 81, 'Jerusalem'),
(565, 81, 'Rishon Lezion'),
(566, 81, 'Telaviv'),
(567, 81, 'Westbank'),
(568, 82, 'Bari'),
(569, 82, 'Bologna'),
(570, 82, 'Calabria'),
(571, 82, 'Firenze'),
(572, 82, 'Forli-Cesena'),
(573, 82, 'Genova'),
(574, 82, 'Milano'),
(575, 82, 'Napoli'),
(576, 82, 'Perugia'),
(577, 82, 'Roma'),
(578, 82, 'Sardegna'),
(579, 82, 'Sicilia'),
(580, 82, 'Torino'),
(581, 82, 'Trieste'),
(582, 82, 'Venezia'),
(583, 83, 'Prishtinë'),
(584, 84, 'R?ga'),
(585, 85, 'Vilnius'),
(586, 86, 'Luxembourg'),
(587, 87, '??????'),
(588, 88, 'Malta'),
(589, 89, 'Monaco'),
(590, 90, 'Podgorica'),
(591, 91, 'Amsterdam'),
(592, 91, 'Den Haag'),
(593, 91, 'Eindhoven'),
(594, 91, 'Groningen'),
(595, 91, 'Rotterdam'),
(596, 91, 'Utrecht'),
(597, 92, 'Bergen'),
(598, 92, 'Oslo'),
(599, 93, 'Kraków'),
(600, 93, '?ód?'),
(601, 93, 'Pozna?'),
(602, 93, 'Warszawa'),
(603, 93, 'Wroc?aw'),
(604, 94, 'Braga'),
(605, 94, 'Coimbra'),
(606, 94, 'Faro / Algarve'),
(607, 94, 'Lisboa'),
(608, 94, 'Madeira'),
(609, 94, 'Porto'),
(610, 95, 'Bucuresti'),
(611, 96, 'Moskva'),
(612, 96, 'Sankt-Peterburg'),
(613, 97, 'Beograd'),
(614, 98, 'Bratislava'),
(615, 98, 'Košice'),
(616, 99, 'Alicante'),
(617, 99, 'Barcelona'),
(618, 99, 'Bilbao'),
(619, 99, 'Cádiz'),
(620, 99, 'Canarias'),
(621, 99, 'Coruña'),
(622, 99, 'Granada'),
(623, 99, 'Ibiza'),
(624, 99, 'Madrid'),
(625, 99, 'Málaga'),
(626, 99, 'Mallorca'),
(627, 99, 'Murcia'),
(628, 99, 'Oviedo'),
(629, 99, 'Salamanca'),
(630, 99, 'San Sebastián'),
(631, 99, 'Sevilla'),
(632, 99, 'Valencia'),
(633, 99, 'Valladolid'),
(634, 99, 'Zaragoza'),
(635, 100, 'Göteborg'),
(636, 100, 'Malmö'),
(637, 100, 'Örebro'),
(638, 100, 'Stockholm'),
(639, 100, 'Umeå'),
(640, 100, 'Uppsala'),
(641, 100, 'Västerås'),
(642, 101, 'Basel'),
(643, 101, 'Bern'),
(644, 101, 'Genève'),
(645, 101, 'Lausanne'),
(646, 101, 'Lugano'),
(647, 101, 'Zürich'),
(648, 102, 'Dnipropetrovsk'),
(649, 102, 'Kharkiv'),
(650, 102, 'Kyiv'),
(651, 102, 'Lviv'),
(652, 102, 'Odessa'),
(653, 102, 'Zaporizhia'),
(654, 103, 'Aberdeen'),
(655, 103, 'Bath'),
(656, 103, 'Belfast'),
(657, 103, 'Birmingham'),
(658, 103, 'Brighton'),
(659, 103, 'Bristol'),
(660, 103, 'Cambridge'),
(661, 103, 'Devon'),
(662, 103, 'East Anglia'),
(663, 103, 'East Midlands'),
(664, 103, 'Edinburgh'),
(665, 103, 'Essex'),
(666, 103, 'Glasgow'),
(667, 103, 'Hampshire'),
(668, 103, 'Kent'),
(669, 103, 'Leeds'),
(670, 103, 'Liverpool'),
(671, 103, 'London'),
(672, 103, 'Manchester'),
(673, 103, 'Newcastle'),
(674, 103, 'Oxford'),
(675, 103, 'Sheffield'),
(676, 103, 'Wales'),
(677, 104, 'Manama'),
(678, 105, 'Bangladesh'),
(679, 106, 'Beijing'),
(680, 106, 'Chengdu'),
(681, 106, 'Chongqing'),
(682, 106, 'Dalian'),
(683, 106, 'Guangzhou'),
(684, 106, 'Hangzhou'),
(685, 106, 'Nanjing'),
(686, 106, 'Shanghai'),
(687, 106, 'Shenyang'),
(688, 106, 'Shenzhen'),
(689, 106, 'Wuhan'),
(690, 107, 'HK'),
(691, 107, 'Kowloon'),
(692, 107, 'New Territories'),
(693, 108, 'Ahmedabad'),
(694, 108, 'Bangalore'),
(695, 108, 'Bhubaneswar'),
(696, 108, 'Chandigarh'),
(697, 108, 'Chennai'),
(698, 108, 'Delhi'),
(699, 108, 'Goa');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `cms_id` int(11) NOT NULL,
  `cms_title` varchar(255) NOT NULL,
  `cms_description` text NOT NULL,
  `cms_created_on` datetime NOT NULL,
  `cms_updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`cms_id`, `cms_title`, `cms_description`, `cms_created_on`, `cms_updated_on`) VALUES
(1, 'home', '<p>How to use Browse and manage files</p>\r\n\r\n<p>Open the <strong>Image info</strong> tab and click <strong>Browse server</strong>. A new window will open where you see all your uploaded images. Open the preview of a picture by tapping on the image. To use the file click <strong>Use</strong>. To upload a new image open the upload panel in the image browser.</p>\r\n\r\n<p>Change the upload path</p>\r\n\r\n<p>Open the <strong>Image info</strong> tab and click <strong>Browse server</strong>. A new window will open where you see all your uploaded images. Open the <strong>Settings</strong> to choose another upload path.</p>\r\n\r\n<p>Further questions?</p>\r\n\r\n<p>Please read the <a href="http://imageuploaderforckeditor.altervista.org/support/" target="_blank">Plugin FAQ</a>.</p>\r\n\r\n<p>Share</p>\r\n\r\n<p><a href="http://twitter.com/share?url=http://imageuploaderforckeditor.altervista.org&amp;text=Use%20the%20Image%20Uploader%20for%20CKEditor%20for%20free%20now%21%20&amp;hashtags=imageuploaderforckeditor" target="_blank">Tweet</a> or <a href="http://www.facebook.com/sharer.php?u=http://imageuploaderforckeditor.altervista.org" target="_blank">Share on Facebook</a>.</p>\r\n\r\n<p>Support</p>\r\n\r\n<p>The support site can be found <a href="http://ibm.bplaced.com/contact/index.php?cdproject=Image%20Uploader%20and%20Browser%20for%20CKEditor" target="_blank">here</a>. Before submitting a support ticket please read the <a href="http://imageuploaderforckeditor.altervista.org/support/">FAQ</a>.</p>\r\n\r\n<p>License</p>\r\n\r\n<p>Image Uploader and Browser for CKEditor is licensed under the MIT license:<br />\r\n<a href="http://en.wikipedia.org/wiki/MIT_License">http://en.wikipedia.org/wiki/MIT_License</a></p>\r\n', '2016-11-16 13:41:32', '2017-01-19 10:08:45'),
(3, 'contact', '<p>Please read the <a href="http://imageuploaderforckeditor.altervista.org/support/" target="_blank">Plugin FAQ</a> for more information.</p>\r\n', '2016-11-17 05:16:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `colour`
--

CREATE TABLE `colour` (
  `colour_id` int(11) NOT NULL,
  `colour_name` varchar(255) NOT NULL,
  `colour_created_on` datetime NOT NULL,
  `colour_updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colour`
--

INSERT INTO `colour` (`colour_id`, `colour_name`, `colour_created_on`, `colour_updated_on`) VALUES
(2, 'red', '2016-11-17 15:25:15', '0000-00-00 00:00:00'),
(3, 'yellow', '2016-11-17 15:25:24', '0000-00-00 00:00:00'),
(4, 'blue', '2016-11-17 15:25:31', '0000-00-00 00:00:00'),
(5, 'green', '2016-11-17 15:25:43', '0000-00-00 00:00:00'),
(6, 'black', '2016-11-17 15:25:50', '0000-00-00 00:00:00'),
(7, 'white', '2016-11-17 15:25:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'United States'),
(3, 'Canada'),
(4, 'Europe'),
(5, 'Oceania'),
(6, 'Latin America'),
(7, 'Caribbean'),
(8, 'Africa'),
(9, 'Asia');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_product_id` int(11) NOT NULL,
  `gallery_image` varchar(255) NOT NULL,
  `gallery_status` int(1) NOT NULL DEFAULT '1' COMMENT '0=No and 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_product_id`, `gallery_image`, `gallery_status`) VALUES
(12, 12, '1485424236-googlebot-1327931529.jpg', 1),
(13, 12, '1485424261-Desert.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2017_01_07_062443_create_users_table', 1),
('2017_01_07_062735_create_users_table', 2),
('2017_01_07_063629_create_users_table', 3),
('2014_10_12_000000_create_users_table', 4),
('2014_10_12_100000_create_password_resets_table', 4),
('2017_01_18_085352_create_users_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', 'f4ee3ea8e5e4313d956cea6a008577784dbca17b43b92ad7434d7d60796fcbab', '2017-01-18 04:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_type` varchar(164) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `product_status` int(1) NOT NULL DEFAULT '1' COMMENT '0=No and 1=Yes',
  `product_image` varchar(255) NOT NULL,
  `product_created_on` datetime NOT NULL,
  `product_updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_category_id`, `product_type`, `product_qty`, `product_price`, `product_status`, `product_image`, `product_created_on`, `product_updated_on`) VALUES
(12, 'pen', 4, 'Single', 0, '4', 1, 'Clothesloop_Website-4.jpg', '2016-11-23 00:00:00', '2017-01-28 08:21:07'),
(13, 'skirts', 5, 'Multiple', 0, '10', 1, 'Clothesloop_Website-32.jpg', '2016-11-27 00:00:00', '2017-01-26 12:07:47'),
(14, 'Loose Pleated Pants', 7, 'Multiple', 2, '43', 1, 'Clothesloop_Website-2.jpg', '2016-11-28 00:00:00', '2017-01-25 09:06:29'),
(15, 'Loose Pleated Pants', 4, 'Single', 1, '64', 0, 'Clothesloop_Website-5.jpg', '2016-11-28 00:00:00', '2016-12-27 15:11:00'),
(16, 'Loose Pleated Pants', 7, 'Single', 1, '64', 1, 'Clothesloop_Website-6.jpg', '2016-11-28 00:00:00', '2016-12-27 15:10:52'),
(17, 'Loose Pleated Pants', 7, 'Single', 3, '43', 1, 'Clothesloop_Website-31.jpg', '2016-11-28 15:16:03', '2016-12-27 15:10:42'),
(25, 'yellow', 6, 'Single', 5, '25', 1, 'Clothesloop_Website-51.jpg', '2017-01-11 04:56:32', '0000-00-00 00:00:00'),
(32, 'blue', 5, 'Multiple', 0, '0', 1, '1485424788-blue.jpg', '2017-01-26 09:59:48', '2017-01-27 04:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `pd_id` int(11) NOT NULL,
  `pd_product_id` int(11) NOT NULL,
  `pd_product_color` varchar(164) NOT NULL,
  `pd_product_weight` varchar(164) NOT NULL,
  `pd_product_size` varchar(164) NOT NULL,
  `pd_product_price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`pd_id`, `pd_product_id`, `pd_product_color`, `pd_product_weight`, `pd_product_size`, `pd_product_price`) VALUES
(15, 14, '2,7', '5', '4', '5'),
(17, 14, '4,5', '20', '3', '10'),
(19, 30, '2,3', '2', '2', '23'),
(74, 32, '3,4,6,7', '12', '1', '12'),
(75, 32, '5', '11', '1', '11');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `shipping_from` int(11) NOT NULL,
  `shipping_to` int(11) NOT NULL,
  `shipping_amount` int(11) NOT NULL,
  `shipping_created_on` datetime NOT NULL,
  `shipping_updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `shipping_from`, `shipping_to`, `shipping_amount`, `shipping_created_on`, `shipping_updated_on`) VALUES
(1, 0, 499, 50, '2016-11-29 15:28:37', '2016-11-29 15:29:22'),
(2, 500, 999, 40, '2016-11-29 15:30:48', '2016-11-29 15:31:02'),
(3, 1000, 1499, 30, '2016-11-29 15:31:16', '0000-00-00 00:00:00'),
(4, 1500, 1999, 20, '2016-11-29 15:31:45', '0000-00-00 00:00:00'),
(5, 2000, 2499, 10, '2016-11-29 15:32:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_cost`
--

CREATE TABLE `shipping_cost` (
  `sc_id` int(11) NOT NULL,
  `sc_user_id` int(11) NOT NULL,
  `sc_product_id` varchar(164) NOT NULL,
  `sc_sub_total` varchar(164) NOT NULL,
  `sc_shipping_charge` varchar(164) NOT NULL,
  `sc_total` varchar(164) NOT NULL,
  `sc_created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_cost`
--

INSERT INTO `shipping_cost` (`sc_id`, `sc_user_id`, `sc_product_id`, `sc_sub_total`, `sc_shipping_charge`, `sc_total`, `sc_created_on`) VALUES
(11, 1, '12', '4', '50', '54', '2017-01-25 09:06:46'),
(12, 1, '12', '8', '50', '58', '2017-01-28 08:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `size_created_on` datetime NOT NULL,
  `size_updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_name`, `size_created_on`, `size_updated_on`) VALUES
(1, 'XXL', '2016-11-17 09:57:03', '0000-00-00 00:00:00'),
(2, 'XL', '2016-11-17 09:57:21', '0000-00-00 00:00:00'),
(3, 'L', '2016-11-17 09:57:36', '0000-00-00 00:00:00'),
(4, 'M', '2016-11-17 09:57:49', '0000-00-00 00:00:00'),
(5, 'S', '2016-11-17 09:58:01', '0000-00-00 00:00:00'),
(6, 'XS', '2016-11-17 09:58:09', '0000-00-00 00:00:00'),
(7, 'XXS', '2016-11-17 09:58:25', '2016-11-17 10:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `slider_short_description` text NOT NULL,
  `slider_long_description` text NOT NULL,
  `slider_created_on` datetime NOT NULL,
  `slider_updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_image`, `slider_short_description`, `slider_long_description`, `slider_created_on`, `slider_updated_on`) VALUES
(1, 'blank.jpg', 'Quis het a mus orci', 'Phasellus quis neque et ante porta ultricies eu quis est.', '2016-11-26 15:12:00', '2016-12-28 17:29:34'),
(2, 'blank1.jpg', 'Quis het a mus orci', 'Phasellus quis neque et ante porta ultricies eu quis est.', '2016-11-26 15:12:19', '2016-12-24 13:58:19'),
(3, 'blank2.jpg', 'Quis het a mus orci', 'Phasellus quis neque et ante porta ultricies eu quis est.', '2016-11-26 15:12:37', '2016-12-26 10:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_country_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_country_id`, `state_name`) VALUES
(1, 1, 'Alabama'),
(2, 1, 'Alaska'),
(3, 1, 'Arizona'),
(4, 1, 'Arkansas'),
(5, 1, 'California'),
(6, 1, 'Colorado'),
(7, 1, 'Connecticut'),
(8, 1, 'Delaware'),
(9, 1, 'District of Columbia'),
(10, 1, 'Florida'),
(11, 1, 'Georgia'),
(12, 1, 'Hawaii'),
(13, 1, 'Idaho'),
(14, 1, 'Illinois'),
(15, 1, 'Indiana'),
(16, 1, 'Iowa'),
(17, 1, 'Kansas'),
(18, 1, 'Kentucky'),
(19, 1, 'Louisiana'),
(20, 1, 'Maine'),
(21, 1, 'Maryland'),
(22, 1, 'Massachusetts'),
(23, 1, 'Michigan'),
(24, 1, 'Minnesota'),
(25, 1, 'Mississippi'),
(26, 1, 'Missouri'),
(27, 1, 'Montana'),
(28, 1, 'Nebraska'),
(29, 1, 'Nevada'),
(30, 1, 'New Hampshire'),
(31, 1, 'New Jersey'),
(32, 1, 'New Mexico'),
(33, 1, 'New York'),
(34, 1, 'North Carolina'),
(35, 1, 'North Dakota'),
(36, 1, 'Ohio'),
(37, 1, 'Oklahoma'),
(38, 1, 'Oregon'),
(39, 1, 'Pennsylvania'),
(40, 1, 'Rhode Island'),
(41, 1, 'South Carolina'),
(42, 1, 'South Dakota'),
(43, 1, 'Tennessee'),
(44, 1, 'Texas'),
(45, 1, 'Utah'),
(46, 1, 'Vermont'),
(47, 1, 'Virginia'),
(48, 1, 'Washington'),
(49, 1, 'West Virginia'),
(50, 1, 'Wisconsin'),
(51, 1, 'Wyoming'),
(52, 3, 'Alberta'),
(53, 3, 'British Columbia'),
(54, 3, 'Manitoba'),
(55, 3, 'New Brunswick'),
(56, 3, 'Newfoundland and Labrador'),
(57, 3, 'Northwest Territories'),
(58, 3, 'Nova Scotia'),
(59, 3, 'Ontario'),
(60, 3, 'Quebec'),
(61, 3, 'Saskatchewan'),
(62, 3, 'Yukon'),
(63, 4, 'Albania'),
(64, 4, 'Austria'),
(65, 4, 'Belarus'),
(66, 4, 'Belgium'),
(67, 4, 'Bosnia and Herzegovina'),
(68, 4, 'Bulgaria'),
(69, 4, 'Croatia'),
(70, 4, 'Cyprus'),
(71, 4, 'Czech Republic'),
(72, 4, 'Denmark'),
(73, 4, 'Estonia'),
(74, 4, 'Finland'),
(75, 4, 'France'),
(76, 4, 'Germany'),
(77, 4, 'Greece'),
(78, 4, 'Hungary'),
(79, 4, 'Iceland'),
(80, 4, 'Ireland'),
(81, 4, 'Israel'),
(82, 4, 'Italy'),
(83, 4, 'Kosovo'),
(84, 4, 'Latvia'),
(85, 4, 'Lithuania'),
(86, 4, 'Luxembourg'),
(87, 4, 'Macedonia'),
(88, 4, 'Malta'),
(89, 4, 'Monaco'),
(90, 4, 'Montenegro'),
(91, 4, 'Netherlands'),
(92, 4, 'Norway'),
(93, 4, 'Poland'),
(94, 4, 'Portugal'),
(95, 4, 'Romania'),
(96, 4, 'Russia'),
(97, 4, 'Serbia'),
(98, 4, 'Slovakia'),
(99, 4, 'Spain'),
(100, 4, 'Sweden'),
(101, 4, 'Switzerland'),
(102, 4, 'Ukraine'),
(103, 4, 'United Kingdom'),
(104, 9, 'Bahrain'),
(105, 9, 'Bangladesh'),
(106, 9, 'China'),
(107, 9, 'Hong Kong'),
(108, 9, 'India'),
(109, 9, 'Indonesia'),
(110, 9, 'Japan'),
(111, 9, 'Jordan'),
(112, 9, 'Korea'),
(113, 9, 'Kuwait'),
(114, 9, 'Lebanon'),
(115, 9, 'Macau'),
(116, 9, 'Malaysia'),
(117, 9, 'Mongolia'),
(118, 9, 'Oman'),
(119, 9, 'Pakistan'),
(120, 9, 'Philippines'),
(121, 9, 'Qatar'),
(122, 9, 'Singapore'),
(123, 9, 'Taiwan'),
(124, 9, 'Thailand'),
(125, 9, 'Turkey'),
(126, 9, 'United Arab Emirates'),
(127, 9, 'Vietnam'),
(128, 5, 'Australia'),
(129, 5, 'Guam'),
(130, 5, 'New Zealand'),
(131, 6, 'Argentina'),
(132, 6, 'Belize'),
(133, 6, 'Bolivia'),
(134, 6, 'Brazil'),
(135, 6, 'Chile'),
(136, 6, 'Colombia'),
(137, 6, 'Costa Rica'),
(138, 6, 'Ecuador'),
(139, 6, 'El Salvador'),
(140, 6, 'Guatemala'),
(141, 6, 'Guyana'),
(142, 6, 'Honduras'),
(143, 6, 'Mexico'),
(144, 6, 'Nicaragua'),
(145, 6, 'Panama'),
(146, 6, 'Paraguay'),
(147, 6, 'Peru'),
(148, 6, 'Suriname'),
(149, 6, 'Uruguay'),
(150, 6, 'Venezuela'),
(151, 7, 'Caribbean'),
(152, 8, 'Cameroon'),
(153, 8, 'Egypt'),
(154, 8, 'Ivory Coast'),
(155, 8, 'Morocco'),
(156, 8, 'Nigeria'),
(157, 8, 'South Africa');

-- --------------------------------------------------------

--
-- Table structure for table `temp_cart`
--

CREATE TABLE `temp_cart` (
  `tc_id` int(11) NOT NULL,
  `tc_user_id` int(11) NOT NULL,
  `tc_product_id` int(11) NOT NULL,
  `tc_product_name` varchar(255) NOT NULL,
  `tc_product_price` varchar(164) NOT NULL,
  `tc_product_qty` int(11) NOT NULL,
  `tc_product_img` varchar(255) NOT NULL,
  `tc_product_colour` int(11) NOT NULL,
  `tc_product_size` int(11) NOT NULL,
  `tc_product_total` varchar(164) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `testimonial_name` varchar(255) NOT NULL,
  `testimonial_description` text NOT NULL,
  `testimonial_image` varchar(255) NOT NULL,
  `testimonial_created_on` datetime NOT NULL,
  `testimonial_updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `testimonial_name`, `testimonial_description`, `testimonial_image`, `testimonial_created_on`, `testimonial_updated_on`) VALUES
(1, 'Lina Camron', '"I am amazed by the number of quality freelancers we found on the site. It took us very little time to find the right people that we are looking for. I am also very impressed by the professionalism expressed in communication and project planning. This will be my go-to place for any outsourcing needs."', 't1.png', '2016-11-28 10:29:50', '0000-00-00 00:00:00'),
(2, 'icracked', '"With a lot of the larger design and media projects we have that don''t want to weigh our in-house developers with, Freelancer came through in the clutch! Getting any project you need finished is extremely simple and worry-free with Freelancer, as they provide every form of insurance that you''ll find exactly who or what you''re looking for to get the job done. Thanks Freelancer!" ', 't2.jpg', '2016-11-28 10:30:25', '0000-00-00 00:00:00'),
(3, 'Reel Surfer', ' "Freelancer has been a life saver. Their strong pool of outsourced talent has helped us increase productivity and focus solely on building a great product."', 't3.png', '2016-11-28 10:31:06', '0000-00-00 00:00:00'),
(4, 'Terascore', '"Freelancer provided us the opportunity to outsource design tasks to very well-qualified and talented providers. Our experience as "contest holder" was outstanding: all contest participants were courteous, knowledgable and professional. There is just some great talent on this site ready to help at amazing rates with rapid turnaround." ', 't4.jpg', '2016-11-28 10:31:33', '0000-00-00 00:00:00'),
(5, 'Wevorce', '"Freelancer gives amazing access to amazing talent amazingly quickly. The quality of proposals I received blew me away. Within a few hours of posting my project it was already underway, with clear, professional communication at every step."', 't5.jpg', '2016-11-28 10:31:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `introduction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `postcode` int(11) NOT NULL,
  `is_admin` int(11) NOT NULL,
  `activation_pending` int(11) NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `introduction`, `profile_pic`, `mobile`, `address1`, `address2`, `username`, `email`, `password`, `country_id`, `state_id`, `city_id`, `postcode`, `is_admin`, `activation_pending`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Dawn', 'AboutMe required.\r\n', '1485423222-Koala.jpg', '8000617245', '4975 Cambridge Road Miami Gardens, FL 33056 ', '4975 Cambridge Road Miami Gardens, FL 33056 ', '', 'admin@gmail.com', '$2y$10$Eto6lsII1fBnDanuDmeM9e/wv5MnmnTiFXJsWUhenZRyzWMa7siRa', 9, 108, 693, 36569, 1, 1, 'IKSmzkTqR79XoYbz2JbUlwilEaBaB8tFA9DbfKiSv5iHRNVaJyooki2ZBik7', '2017-01-18 03:25:14', '2017-01-28 03:17:21'),
(2, 'chintan bhimani', 'About Me', '1485493593-Tulips.jpg', '4545454545', 'YOUR MAIN ADDRESS LINE 1', 'YOUR MAIN ADDRESS LINE 1', '', 'chintan@gmail.com', '$2y$10$aHEot93jyFoZ2SuE3TKUnev0.fkl/E5iV6e1qmT.7gI8nG0E8sSaW', 1, 29, 229, 0, 0, 0, 'sWZsrn8GKwZfkjimrLzKnqLcPXK978LlHEVIE4f6iUZAykImAh10CmyCd7Vo', '2017-01-26 23:22:30', '2017-01-27 23:03:42'),
(7, 'pratik', '', '', '', '', '', '', 'pratik@gmail.com', '$2y$10$zwyruzyiFrJuNu/mx9e1zOmeo5y3Jn/B26X4sWhMMH.zCN/P38gam', 0, 0, 0, 0, 0, 1, 'Vne1Wy8aW9l31hU3aWhcAO0GjfVJA05BTI4tByq0GeTdwrXYQrA6Jg3PXzZw', '2017-01-27 01:58:21', '2017-01-28 03:28:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`cms_id`);

--
-- Indexes for table `colour`
--
ALTER TABLE `colour`
  ADD PRIMARY KEY (`colour_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `shipping_cost`
--
ALTER TABLE `shipping_cost`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `temp_cart`
--
ALTER TABLE `temp_cart`
  ADD PRIMARY KEY (`tc_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=700;
--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `cms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `colour`
--
ALTER TABLE `colour`
  MODIFY `colour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `shipping_cost`
--
ALTER TABLE `shipping_cost`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `temp_cart`
--
ALTER TABLE `temp_cart`
  MODIFY `tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
