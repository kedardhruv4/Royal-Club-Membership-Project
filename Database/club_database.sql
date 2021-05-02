-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 06:33 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `club_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `u_name` text NOT NULL,
  `u_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`u_name`, `u_password`) VALUES
('adhruv', '1234'),
('adhruv', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE IF NOT EXISTS `country_master` (
  `c_id` int(5) NOT NULL,
  `c_name` text NOT NULL,
  `t_id` int(5) NOT NULL,
  PRIMARY KEY (`c_id`),
  KEY `t_id` (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`c_id`, `c_name`, `t_id`) VALUES
(1001, 'India', 102),
(1002, 'USA', 101),
(1003, 'Dubai', 101),
(1004, 'china', 101),
(1005, 'swiitchserland', 101),
(1006, 'UK', 101),
(1007, 'Finland', 101);

-- --------------------------------------------------------

--
-- Table structure for table `employe_master`
--

CREATE TABLE IF NOT EXISTS `employe_master` (
  `e_id` int(5) NOT NULL,
  `e_name` text NOT NULL,
  `e_designation` text NOT NULL,
  `e_contact` int(10) NOT NULL,
  `e_emailid` text NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employe_master`
--

INSERT INTO `employe_master` (`e_id`, `e_name`, `e_designation`, `e_contact`, `e_emailid`) VALUES
(30, 'Vimal', 'Manager', 2147483647, 'vimala@gmail.com'),
(31, 'anirud', 'senior manager', 2147483647, 'anirud@gmail.com'),
(32, 'Risu', 'Aynalist', 1111111111, 'risu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `membership_master`
--

CREATE TABLE IF NOT EXISTS `membership_master` (
  `ms_id` int(5) NOT NULL,
  `ms_name` text NOT NULL,
  PRIMARY KEY (`ms_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_master`
--

INSERT INTO `membership_master` (`ms_id`, `ms_name`) VALUES
(1, 'Platinum'),
(2, 'Gold'),
(3, 'Sliver'),
(4, 'Bronze');

-- --------------------------------------------------------

--
-- Table structure for table `member_login`
--

CREATE TABLE IF NOT EXISTS `member_login` (
  `u_name` text NOT NULL,
  `u_password` text NOT NULL,
  `ms_id` int(5) NOT NULL,
  `m_id` int(10) NOT NULL,
  `security_que` text NOT NULL,
  `security_ans` text NOT NULL,
  KEY `ms_id` (`ms_id`),
  KEY `m_id` (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_login`
--

INSERT INTO `member_login` (`u_name`, `u_password`, `ms_id`, `m_id`, `security_que`, `security_ans`) VALUES
('uyash', '12345', 2, 1, 'fav movie?', 'Dilwale'),
('udhruv', '12345', 1, 2, 'fav movie?', 'yjhd');

-- --------------------------------------------------------

--
-- Table structure for table `res`
--

CREATE TABLE IF NOT EXISTS `res` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resort_id` int(5) NOT NULL,
  `room_id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `no_of_room` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `res`
--

INSERT INTO `res` (`id`, `resort_id`, `room_id`, `username`, `checkin_date`, `checkout_date`, `no_of_room`, `amount`) VALUES
(20, 213456, 101, 'uyash', '2020-06-15', '2020-06-17', '3', '15000'),
(21, 213456, 103, 'udhruv', '2020-06-15', '2020-06-25', '5', '12500'),
(22, 213456, 101, 'udhruv', '2020-06-19', '2020-06-30', '3', '15000'),
(23, 213456, 101, 'udhruv', '2020-06-29', '2020-06-30', '5', '25000'),
(24, 213456, 101, 'uyash', '2020-06-22', '2020-06-30', '3', '15000'),
(25, 213456, 102, 'uyash', '2020-06-22', '2020-06-26', '3', '1800'),
(26, 213456, 103, 'uyash', '2020-07-09', '2020-07-22', '5', '12500'),
(27, 213456, 102, 'uyash', '2020-08-13', '2020-08-18', '1', '600'),
(28, 213456, 101, 'uyash', '2020-06-23', '2020-06-24', '5', '25000'),
(29, 213456, 102, 'uyash', '2020-06-17', '2020-06-25', '5', '3000'),
(30, 213456, 103, 'uyash', '2020-06-16', '2020-06-17', '3', '7500'),
(31, 213456, 102, 'uyash', '2020-06-17', '2020-06-18', '4', '2400'),
(32, 213456, 103, 'uyash', '2020-06-16', '2020-06-17', '2', '5000'),
(33, 213456, 101, 'udhruv', '2020-06-29', '2020-06-30', '5', '25000'),
(34, 213456, 101, 'udhruv', '2020-06-29', '2020-06-30', '5', '25000'),
(35, 213456, 101, 'udhruv', '2020-06-16', '2020-06-18', '4', '20000'),
(36, 213456, 101, 'udhruv', '2020-06-24', '2020-06-30', '2', '10000'),
(37, 213462, 126, 'udhruv', '2020-06-25', '2020-06-30', '5', '25000');

-- --------------------------------------------------------

--
-- Table structure for table `resgister_master`
--

CREATE TABLE IF NOT EXISTS `resgister_master` (
  `m_id` int(10) NOT NULL,
  `m_name` text NOT NULL,
  `m_child` int(5) NOT NULL,
  `m_adult` int(5) NOT NULL,
  `m_address` text NOT NULL,
  `m_contact` varchar(10) NOT NULL,
  `m_emailid` text NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resgister_master`
--

INSERT INTO `resgister_master` (`m_id`, `m_name`, `m_child`, `m_adult`, `m_address`, `m_contact`, `m_emailid`) VALUES
(1, 'yash', 2, 2, 'Ramvadi,valsad', '2147483647', 'yash@gmail.com'),
(2, 'dhruv', 4, 3, 'Nanikhatriwad,valsad', '7984927843', 'dhruv@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `resort_detail`
--

CREATE TABLE IF NOT EXISTS `resort_detail` (
  `resort_id` int(10) NOT NULL,
  `1bhk` longtext NOT NULL,
  `2bhk` longtext NOT NULL,
  `studio` longtext NOT NULL,
  `hotel_unit` longtext NOT NULL,
  `video` longtext NOT NULL,
  `local_food` longtext NOT NULL,
  KEY `resort_id` (`resort_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resort_detail`
--

INSERT INTO `resort_detail` (`resort_id`, `1bhk`, `2bhk`, `studio`, `hotel_unit`, `video`, `local_food`) VALUES
(213456, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `resort_master`
--

CREATE TABLE IF NOT EXISTS `resort_master` (
  `resort_id` int(10) NOT NULL,
  `resort_name` text NOT NULL,
  `resort_contact` int(10) NOT NULL,
  `resort_image` varchar(100) NOT NULL,
  `rt_id` int(5) NOT NULL,
  `s_id` int(5) NOT NULL,
  `e_id` int(5) NOT NULL,
  `n_city` text NOT NULL,
  `n_airport` text NOT NULL,
  `n_railway` text NOT NULL,
  `r_description` longtext NOT NULL,
  PRIMARY KEY (`resort_id`),
  KEY `rt_id` (`rt_id`,`s_id`,`e_id`),
  KEY `s_id` (`s_id`),
  KEY `e_id` (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resort_master`
--

INSERT INTO `resort_master` (`resort_id`, `resort_name`, `resort_contact`, `resort_image`, `rt_id`, `s_id`, `e_id`, `n_city`, `n_airport`, `n_railway`, `r_description`) VALUES
(213456, 'Paradise', 989874787, 'resortimage/goaresort.jpg', 1, 10001, 30, 'Panjim', 'Goa Air', 'Goa Rail', 'beach resort with wonderfull view'),
(213457, 'Panorama', 2147483647, 'resortimage/panaroresort.jpg', 2, 10002, 31, 'Califonia Downtown', 'califonia Air', 'california Metro', 'free of cost wifi,city area ,good view'),
(213458, 'Fountain', 1232345654, 'resortimage/hill-view-resortguj.jpg', 4, 10004, 30, 'Gandhinagar', 'Ahmedabad Air', 'Ahmedabad Rail', 'Hill Satation Resort With Fantastic View and Amzing Fesities'),
(213459, 'Desert Safari', 2147483647, 'resortimage/deserthotel.jpg', 3, 10006, 30, 'Dubai', 'Dubai Air', 'Dubai Metro', 'Full AC Rooms With Fantastic Welcome Drinks in the middle of Desert,WIFI,Swimming Pool'),
(213460, 'Cherai', 2147483647, 'resortimage/thumbimg.jfif', 1, 10005, 32, 'Kerela', 'Cochin Airport', 'Cochin Railway', 'Cherai Beach Resorts is exquisitely landscaped with lagoons and canals meandering in and around a number of cottages built around picturesque greenery overlooking the clean long beach at the front and serene backwaters behind. The property has been exquisitely landscaped with numerous canals,lagoons, single arch bridges meandering in and around 66 villas. '),
(213461, 'The Oberoi Udaivilas', 2147483647, 'resortimage/1920-X-819-new.jpg', 2, 10007, 32, 'Udaipur', 'Maharana Pratap Airport', 'Udaipur Railway', 'Falling in love with the charm of the â€œCity of Lakesâ€ is easy when you are staying at the best hotel in Udaipur: The Oberoi Udaivilas. Located on the banks of Lake Pichola, our 5 star hotel is spread over 30 acres of luxuriant gardens, with an intricate layout of interconnecting domes and corridors that reflect the layout of Udaipur itself; whose seven lakes are linked by canals.'),
(213462, 'Kandaghat', 2147483647, 'resortimage/62718817.jpg', 4, 10008, 31, 'Shimla', 'Chandigarh Airport', 'Kandaghat Railway', 'Sitting at an altitude of 1530 metres, Club Mahindra Kandhaghat is surrounded by lush greenery and features 19th century colonial architecture. It houses 2 dining options, a fitness centre and a terrace garden.\r\n\r\nThe property is 2 km from Kamna Devi Temple and 5 km from Kandaghat Railway Station. Jaku Temple and Shimla Airport are 30 km away, while Chandigarh is a 2-hour drive away.'),
(213463, 'Ganpatipule ', 2147483647, 'resortimage/Courtyard-The-Resort-Ganpa.jpg', 1, 10003, 31, 'Mumbai & Pune', 'Ratnagiri Airport', 'Ratnagiri Railway', 'Green Leaf The Resort & Spa at Ganpatipule (an associate Club Mahindra property) is perched on a hill with a superb view of the beach. The resort in Ganpatipule is ideally situated to explore the region. Located just 28 kms from Ratnagiri, our resort in Ganpatipule is within driving distance of Mumbai (333 kms), Pune (326 kms) and Goa (280 kms). The route is picturesque, offering you a glimpse of the verdant Konkan landscape.The environmentally sensitive resort in Ganpatipule gives you the true experience of Konkani hospitality with all comforts and luxuries designed to make your stay a memorable one. '),
(213464, 'Holiday Club Caribia', 2147483647, 'resortimage/caribia.jpg', 2, 10009, 32, 'Turku', 'Turku Airport', 'Turku Central Railway', 'Situated near the River Aurajoki, 1.5 km from central Turku, Holiday Club Caribia offers 3 restaurants, a spa and wellness center, a gym and meeting facilities. An indoor activity park for the whole family is also found on site.\r\n\r\nAll guest rooms at Holiday Club Caribia feature a flat-screen TV and a private bathroom with shower. WiFi is free throughout the building.'),
(213465, 'Sterling Gantok', 2147483647, 'resortimage/gan.jpg', 4, 10010, 32, 'Gangtok', 'Bagdogra Airport', 'New Jalpaiguri Railway', 'Located in Gangtok, 2.6 km from Do Drul Chorten Monastery, Sterling Gangtok Orange Village provides accommodation with a restaurant, free private parking, a fitness centre and a bar. With free WiFi, this 4-star hotel offers a 24-hour front desk and room service. Guests can make use of a garden.');

-- --------------------------------------------------------

--
-- Table structure for table `resort_type_master`
--

CREATE TABLE IF NOT EXISTS `resort_type_master` (
  `rt_id` int(5) NOT NULL,
  `rt_name` text NOT NULL,
  PRIMARY KEY (`rt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resort_type_master`
--

INSERT INTO `resort_type_master` (`rt_id`, `rt_name`) VALUES
(1, 'Beach'),
(2, 'City'),
(3, 'Desert'),
(4, 'Hill Station');

-- --------------------------------------------------------

--
-- Table structure for table `room_master`
--

CREATE TABLE IF NOT EXISTS `room_master` (
  `room_code` int(5) NOT NULL,
  `room_name` text NOT NULL,
  PRIMARY KEY (`room_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_master`
--

INSERT INTO `room_master` (`room_code`, `room_name`) VALUES
(11, '1BHK'),
(22, '2BHK'),
(33, 'Studio'),
(44, 'Hotel Unit');

-- --------------------------------------------------------

--
-- Table structure for table `room_type_detail`
--

CREATE TABLE IF NOT EXISTS `room_type_detail` (
  `room_id` int(5) NOT NULL,
  `room_code` int(5) NOT NULL,
  `capacity` int(10) NOT NULL,
  `image` longtext NOT NULL,
  PRIMARY KEY (`room_id`),
  KEY `room_code` (`room_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type_detail`
--

INSERT INTO `room_type_detail` (`room_id`, `room_code`, `capacity`, `image`) VALUES
(2001, 33, 11, '');

-- --------------------------------------------------------

--
-- Table structure for table `room_type_master`
--

CREATE TABLE IF NOT EXISTS `room_type_master` (
  `room_id` int(10) NOT NULL,
  `resort_id` int(10) NOT NULL,
  `room_code` int(5) NOT NULL,
  `capacity` int(5) NOT NULL,
  `price` int(5) NOT NULL,
  `room_detail` text NOT NULL,
  `room_image` varchar(100) NOT NULL,
  PRIMARY KEY (`room_id`),
  KEY `room_code` (`room_code`),
  KEY `resort_id` (`resort_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type_master`
--

INSERT INTO `room_type_master` (`room_id`, `resort_id`, `room_code`, `capacity`, `price`, `room_detail`, `room_image`) VALUES
(101, 213456, 11, 30, 5000, '1bhk room with AC', 'roomimage/goa1bhk.jpeg'),
(102, 213456, 22, 25, 600, '2 bhk room', 'roomimage/goa2bhk.jpeg'),
(103, 213456, 33, 23, 2500, 'Studio Type Room With AC', 'roomimage/studiopara.jpg'),
(104, 213456, 44, 30, 7000, 'Hotel Unit room with AC & WIFI', 'roomimage/paradicehtunit.jfif'),
(105, 213457, 11, 40, 10000, '1BHK Fully AC with WIFI Rooms', 'roomimage/1bhkcalifornia.jpg'),
(106, 213457, 22, 20, 15000, '2BHK Fully AC with WIFI Rooms', 'roomimage/2bhkcal.jfif'),
(107, 213457, 33, 30, 20000, 'Stdio Fully AC with WIFI Rooms and Gallery View', 'roomimage/stdiocal.jfif'),
(108, 213457, 44, 12, 25000, 'Hotel Unit room with AC & WIFI', 'roomimage/unitcal.jpg'),
(109, 213458, 11, 20, 2000, '1BHK Fully AC with WIFI Rooms', 'roomimage/1bk_1.jfif'),
(110, 213458, 22, 20, 5000, '2BHK Fully AC with WIFI Rooms', 'roomimage/2bhk_1.jpg'),
(111, 213458, 33, 12, 7000, 'Stdio Fully AC with WIFI Rooms and Gallery View', 'roomimage/stdio_1.jfif'),
(112, 213458, 44, 20, 10000, 'Hotel Unit room with AC & WIFI', 'roomimage/htunit_1.jpg'),
(113, 213459, 11, 23, 5000, '1BHK Fully AC with WIFI Rooms', 'roomimage/1bhk_2.jpg'),
(114, 213459, 22, 30, 10000, '2BHK Fully AC with WIFI Rooms', 'roomimage/2bhk_2.jpg'),
(115, 213459, 33, 30, 15000, 'Stdio Fully AC with WIFI Rooms and Gallery View', 'roomimage/stdio_2.jpg'),
(116, 213459, 44, 12, 20000, 'Hotel Unit room with AC & WIFI', 'roomimage/htunit_2.jpg'),
(117, 213460, 11, 15, 2500, '1BHK Fully AC with WIFI Rooms', 'roomimage/1bhk_3.jpg'),
(118, 213460, 22, 30, 5000, '2BHK Fully AC with WIFI Rooms', 'roomimage/2bhk_3.jpg'),
(119, 213460, 33, 20, 7000, 'Studio Type Room With AC', 'roomimage/stdio_3.jpg'),
(120, 213460, 44, 12, 15000, 'Hotel Unit room with AC & WIFI', 'roomimage/htunit_3.jpg'),
(121, 213461, 11, 40, 2500, '1BHK Fully AC with WIFI Rooms', 'roomimage/1bhk_4.jpg'),
(122, 213461, 22, 20, 5000, '2BHK Fully AC with WIFI Rooms', 'roomimage/2bhk_4.jpg'),
(123, 213461, 33, 25, 7000, 'Studio Type Room With AC', 'roomimage/stdio_4.jfif'),
(124, 213461, 44, 10, 10000, 'Hotel Unit room with AC & WIFI', 'roomimage/htunit_4.jpg'),
(125, 213462, 11, 35, 2500, '1bhk room with AC', 'roomimage/1bhk_5.jpg'),
(126, 213462, 22, 100, 5000, '2BHK Fully AC with WIFI Rooms', 'roomimage/2bhk_5.jpg'),
(127, 213462, 33, 30, 7000, 'Stdio Fully AC with WIFI Rooms and Gallery View', 'roomimage/stdio_5.jpg'),
(128, 213462, 44, 15, 10000, 'Hotel Unit room with AC & WIFI', 'roomimage/htunit_5.jpg'),
(129, 213463, 11, 20, 5000, '1bhk room with AC', 'roomimage/1bhk_6.jpg'),
(130, 213463, 22, 30, 7000, '2BHK Fully AC with WIFI Rooms', 'roomimage/2bhk_6.jpeg'),
(131, 213463, 33, 12, 10000, 'Stdio Fully AC with WIFI Rooms and Gallery View', 'roomimage/stdio_6.jpg'),
(132, 213463, 44, 30, 15000, 'Hotel Unit room with AC & WIFI', 'roomimage/htunit_6.jpg'),
(133, 213464, 11, 30, 5000, '1bhk room with AC', 'roomimage/1bhk_7.jpg'),
(134, 213464, 22, 20, 10000, '2BHK Fully AC with WIFI Rooms', 'roomimage/2bhk_7.jpg'),
(135, 213464, 33, 12, 15000, 'Stdio Fully AC with WIFI Rooms and Gallery View', 'roomimage/stdio_7.jpg'),
(136, 213464, 44, 15, 20000, 'Hotel Unit room with AC & WIFI', 'roomimage/htunit_7.jpg'),
(137, 213465, 11, 30, 2500, '1bhk room with AC', 'roomimage/1bhk_8.jpg'),
(138, 213465, 22, 20, 5000, '2BHK Fully AC with WIFI Rooms', 'roomimage/2bhk_8.jpg'),
(139, 213465, 33, 30, 7000, 'Studio Type Room With AC', 'roomimage/stdio_8.jfif'),
(140, 213465, 44, 12, 10000, 'Hotel Unit room with AC & WIFI', 'roomimage/htunit_8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE IF NOT EXISTS `state_master` (
  `s_id` int(5) NOT NULL,
  `s_name` text NOT NULL,
  `c_id` int(5) NOT NULL,
  PRIMARY KEY (`s_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`s_id`, `s_name`, `c_id`) VALUES
(10001, 'Goa', 1001),
(10002, 'California', 1002),
(10003, 'Maharastra', 1001),
(10004, 'gujarat', 1001),
(10005, 'Kerela', 1001),
(10006, 'Dhera', 1003),
(10007, 'Rajasthan', 1001),
(10008, 'Himachal Pradesh', 1001),
(10009, 'Turku', 1007),
(10010, 'Sikkim', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `trip_master`
--

CREATE TABLE IF NOT EXISTS `trip_master` (
  `t_id` int(5) NOT NULL,
  `t_name` text NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_master`
--

INSERT INTO `trip_master` (`t_id`, `t_name`) VALUES
(101, 'Internatinational'),
(102, 'National');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
