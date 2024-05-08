-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 03:36 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lssemsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(50) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8979555556, 'adminuser@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-11-29 12:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `Category` varchar(100) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `Category`, `CreationDate`) VALUES
(1, 'Resturent', '2019-11-29 00:42:22'),
(2, 'Hotel', '2019-11-30 05:43:18'),
(3, 'Insurance Company', '2019-11-30 05:43:27'),
(4, 'Broadband Provider', '2019-11-30 05:43:36'),
(5, 'Newspaper Provider', '2019-11-30 05:43:46'),
(6, 'Car Service', '2019-11-30 05:43:58'),
(7, 'Vehicle Service', '2019-11-30 05:44:05'),
(8, 'Tuition Teacher', '2019-11-30 05:44:18'),
(9, 'Gym Instructor', '2019-11-30 05:44:29'),
(11, 'Basketball Instructor', '2019-11-30 05:44:56'),
(12, 'Electrician', '2019-11-30 05:45:30'),
(13, 'Fitting', '2019-11-30 05:45:42'),
(14, 'Carpenter', '2019-11-30 05:45:52'),
(15, 'House Cleaning', '2019-11-30 05:46:05'),
(16, 'Painter', '2019-11-30 05:46:14'),
(17, 'Grocery Shop', '2019-11-30 05:46:24'),
(18, 'Doctor', '2019-11-30 05:46:37'),
(19, 'Physiotherapist', '2019-11-30 05:47:02'),
(20, 'Nurse', '2019-11-30 05:47:12'),
(21, 'Laundry', '2019-11-30 05:47:29'),
(22, 'Gardener', '2019-11-30 05:47:41'),
(23, 'Flower Delivery', '2019-11-30 05:47:55'),
(24, 'Tailor', '2019-11-30 05:48:10'),
(25, 'Other', '2019-11-30 05:48:22'),
(26, 'Mobile Products', '2019-12-10 16:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `Name`, `Email`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(1, 'Kiran', 'kran@gmail.com', 'cost of volvo place pritampura to dwarka', '2021-07-05 07:26:24', 1),
(2, 'Sarita Pandey', 'sar@gmail.com', 'huiyuihhjjkhkjvhknv iyi tuyvuoiup', '2021-07-09 12:48:40', 1),
(3, 'Test', 'test@gmail.com', 'Want to know price of forest cake', '2021-07-16 12:51:06', 1),
(4, 'Shanu', 'shanu@gmail.com', 'hkjhkjhk', '2021-07-17 07:32:14', 1),
(5, 'Taanu Sharma', 'tannu@gmail.com', 'ytjhdjguqwgyugjhbjdsuy\r\nkjhjkwhkd\r\nljkkljwq\r\nmlkjol ', '2021-07-28 12:09:22', 1),
(6, 'Harish Kumar', 'hari@gmail.com', 'rytweiuyeiouoipoipo[po\r\njknkjlkdsflkjflkdjslk;lsdkf;l\r\nn,mn,ncxm.,m.m.,.', '2021-07-31 16:34:16', NULL),
(7, 'test', 'test@gmail.com', 'Test', '2021-08-25 16:56:19', 1),
(8, 'jkhjk', 'kjhjk@abc.com', 'kjhkj', '2021-10-01 10:13:11', NULL),
(9, 'Anuj', 'ak@gmail.com', 'This is for test.', '2021-10-21 17:55:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbllisting`
--

CREATE TABLE `tbllisting` (
  `ID` int(10) NOT NULL,
  `UserID` int(10) DEFAULT NULL,
  `ListingTitle` varchar(200) DEFAULT NULL,
  `Keyword` varchar(200) DEFAULT NULL,
  `Category` int(10) DEFAULT NULL,
  `Website` varchar(200) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `TemporaryAddress` mediumtext DEFAULT NULL,
  `City` varchar(200) DEFAULT NULL,
  `State` varchar(200) DEFAULT NULL,
  `Country` varchar(200) DEFAULT NULL,
  `Zipcode` int(10) DEFAULT NULL,
  `OwnerName` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Phone` bigint(20) DEFAULT NULL,
  `CompanyWebsite` varchar(200) DEFAULT NULL,
  `OwnerDesignation` varchar(200) DEFAULT NULL,
  `Company` varchar(200) DEFAULT NULL,
  `FacebookLink` varchar(200) DEFAULT NULL,
  `TweeterLink` varchar(200) DEFAULT NULL,
  `Googlepluslink` varchar(200) DEFAULT NULL,
  `Linkedinlink` varchar(200) DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `Logo` varchar(200) DEFAULT NULL,
  `ListingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllisting`
--

INSERT INTO `tbllisting` (`ID`, `UserID`, `ListingTitle`, `Keyword`, `Category`, `Website`, `Address`, `TemporaryAddress`, `City`, `State`, `Country`, `Zipcode`, `OwnerName`, `Email`, `Phone`, `CompanyWebsite`, `OwnerDesignation`, `Company`, `FacebookLink`, `TweeterLink`, `Googlepluslink`, `Linkedinlink`, `Description`, `Logo`, `ListingDate`) VALUES
(2, 2, 'Car Service Provider', 'Car Service Provider', 6, 'www.carservice.com', 'K-890 Kunj Vihar Gali no 91 New Delhi', 'K-890 Kunj Vihar Gali no 91 New Delhi', 'Delhi', 'New Delhi', 'India', 110018, 'Mahesh kumar', 'mah@gmail.com', 9878979879, 'www.carservice.com', 'CEO', 'Car Service Pvt Ltd', 'facebook.com/carservices', 'twitter.com/carservices', 'googleplus.com/carservices', 'linkdn.com/carservices', 'At srvice centre we strive to provide the best levels of service to all our customers ensuring they enjoy a safe and pleasant driving experience. We offer an extensive range of car repair services for cars of all makes and models all under one roof. We specialise in car services including wheel alignment service , car body repair , engine repair , denting and painting , brake repair , car grooming , road side assistance and much more.\r\n\r\nOur highly professional and trained mechanics use the best quality products combined with latest techniques for all car repair services.', 'b9fb9d37bdf15a699bc071ce49baea531634714852.jpg', '2021-10-20 07:27:32'),
(3, 2, 'Thai Restaurant', 'Thai Cuisine', 1, 'www.cookbook.com', 'L-0781 Nalanda Apartment Ghaziabad(UP)', 'L-0781 Nalanda Apartment Ghaziabad(UP)', 'Ghaziabad', 'Uttar Pradesh', 'India', 201018, 'Reeema Sing', 'reemi@gmail.com', 6544654654, 'www.cookbook.com', 'CEO', 'Cook Book PVT LTD', 'facebook.com/cookbook', 'twiiter.com/cookbook', 'googleplus/cookbook', 'linkdn/cookbook', 'About\r\nLocal, situated in the heart of the capital, is a colossal beauty for all party lovers. It is the ep...  \r\n\r\n\r\nCUISINE\r\n\r\nTYPE\r\nHappy Hours, Dineout Pay, Casual Dining, Nightlife, Bar, Future Vouchers, Safe To Eat Out, Delhi Operational, Hottest in Town\r\n\r\n\r\nAVERAGE COST\r\n1,800 for two people\r\n\r\n\r\nBESTSELLING ITEMS\r\nGhar Ki Baat, Botalan Sharab Diyanm Paan Cosmo, Local Liit, Chai Ka Punch, Aam Mojito, Punjabi Old Fashon, Lebanese Inhouse,Farmer Vegetable Pizza,Loaded Cheese Nachos,Himachali Tawa Chicken,Murg Keema Makhan Pao,Fish Finger Skewars\r\nFACILITIES & FEATURES\r\n', 'db573b18c834f8e473e8e8dfb0eed53b1633080619.jpg', '2021-10-01 09:30:19'),
(4, 1, 'Car Service Provider', 'Car Service Provider', 6, 'www.service.com', 'p-890 Kunj Vihar Gali no 91 New Delhi', 'p-890 Kunj Vihar Gali no 91 New Delhi', 'Delhi', 'New Delhi', 'India', 110001, 'Yammi', 'y@gmail.com', 8878979879, 'www.service.com', 'CEO', 'Car washing Service Pvt Ltd', 'facebook.com/carservices', 'twitter.com/carservices', 'googleplus.com/carservices', 'linkdn.com/carservices', 'At srvice centre we strive to provide the best levels of service to all our customers ensuring they enjoy a safe and pleasant driving experience. We offer an extensive range of car repair services for cars of all makes and models all under one roof. We specialise in car services including wheel alignment service , car body repair , engine repair , denting and painting , brake repair , car grooming , road side assistance and much more.\r\n\r\nOur highly professional and trained mechanics use the best quality products combined with latest techniques for all car repair services.', '41e76782e33e17a1d9a06b2a833974fe1634714877.jpg', '2021-10-20 07:27:57'),
(5, 1, 'Thai Restaurant', 'Thai Cuisine', 1, 'www.cooknote.com', 'L-0781 VVIP Apartment Ghaziabad(UP)', 'L-0781 VVIP Apartment Ghaziabad(UP)', 'Ghaziabad', 'Uttar Pradesh', 'India', 201018, 'Reetu Sing', 'reetu@gmail.com', 6544654654, 'www.cooknote.com', 'CEO', 'Cook Note PVT LTD', 'facebook.com/cooknote', 'twiiter.com/cooknote', 'googleplus/cooknote', 'linkdn/cooknote', 'About\r\nLocal, situated in the heart of the capital, is a colossal beauty for all party lovers. It is the ep...  \r\n\r\n\r\nCUISINE\r\n\r\nTYPE\r\nHappy Hours, Dineout Pay, Casual Dining, Nightlife, Bar, Future Vouchers, Safe To Eat Out, Delhi Operational, Hottest in Town\r\n\r\n\r\nAVERAGE COST\r\n1,800 for two people\r\n\r\n\r\nBESTSELLING ITEMS\r\nGhar Ki Baat, Botalan Sharab Diyanm Paan Cosmo, Local Liit, Chai Ka Punch, Aam Mojito, Punjabi Old Fashon, Lebanese Inhouse,Farmer Vegetable Pizza,Loaded Cheese Nachos,Himachali Tawa Chicken,Murg Keema Makhan Pao,Fish Finger Skewars\r\nFACILITIES & FEATURES\r\n', 'db573b18c834f8e473e8e8dfb0eed53b1633080619.jpg', '2021-10-01 09:37:07'),
(6, 1, 'Thai Restaurant', 'Thai Cuisine', 1, 'www.cookbook.com', 'L-0781 Nalanda Apartment Ghaziabad(UP)', 'L-0781 Nalanda Apartment Ghaziabad(UP)', 'Ghaziabad', 'Uttar Pradesh', 'India', 201018, 'Reeema Sing', 'reemi@gmail.com', 6544654654, 'www.cookbook.com', 'CEO', 'Cook Book PVT LTD', 'facebook.com/cookbook', 'twiiter.com/cookbook', 'googleplus/cookbook', 'linkdn/cookbook', 'About\r\nLocal, situated in the heart of the capital, is a colossal beauty for all party lovers. It is the ep...  \r\n\r\n\r\nCUISINE\r\n\r\nTYPE\r\nHappy Hours, Dineout Pay, Casual Dining, Nightlife, Bar, Future Vouchers, Safe To Eat Out, Delhi Operational, Hottest in Town\r\n\r\n\r\nAVERAGE COST\r\n1,800 for two people\r\n\r\n\r\nBESTSELLING ITEMS\r\nGhar Ki Baat, Botalan Sharab Diyanm Paan Cosmo, Local Liit, Chai Ka Punch, Aam Mojito, Punjabi Old Fashon, Lebanese Inhouse,Farmer Vegetable Pizza,Loaded Cheese Nachos,Himachali Tawa Chicken,Murg Keema Makhan Pao,Fish Finger Skewars\r\nFACILITIES & FEATURES\r\n', 'db573b18c834f8e473e8e8dfb0eed53b1633080619.jpg', '2021-10-01 09:34:47'),
(7, 6, 'MyMobile Shop', 'Mobile, Electronic Products', 25, 'https://google.com', 'New Delhi India', 'New Delhi India', 'New Delhi', 'Delhi', 'india', 110001, 'Anuj kumar', 'testuser@gmail.com', 1234567890, 'https://google.com', 'CEO', 'GOOGLE LLC', 'https://fb.com/google', 'https://twiiter.com/google', '#', '#', '\"We provide all type os mobile and also all mobile accessories.\"', 'a1d7fccb242eed2bf949155524881f901634838669.jpg', '2021-10-21 17:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(50) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<span style=\"font-weight: bold; color: rgb(106, 106, 106); font-family: arial, sans-serif; font-size: 14px;\">DLMS is local</span><span style=\"color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: 14px;\">&nbsp;search is the use of specialized Internet&nbsp;</span><span style=\"font-weight: bold; color: rgb(106, 106, 106); font-family: arial, sans-serif; font-size: 14px;\">search engines</span><span style=\"color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: 14px;\">&nbsp;that allow users to submit geographically constrained searches against a structured database of&nbsp;</span><span style=\"font-weight: bold; color: rgb(106, 106, 106); font-family: arial, sans-serif; font-size: 14px;\">local business.</span><div><br></div>', NULL, NULL, '2021-10-21 17:55:10'),
(2, 'contactus', 'Contact Us', 'D-204, Hole Town South West,Delhi-110096,India', 'test@gmail.com', 1122334455, '2021-10-21 17:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `tblreview`
--

CREATE TABLE `tblreview` (
  `ID` int(11) NOT NULL,
  `ListingID` int(10) DEFAULT NULL,
  `ReviewTitle` varchar(200) DEFAULT NULL,
  `Review` mediumtext DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `DateofReview` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblreview`
--

INSERT INTO `tblreview` (`ID`, `ListingID`, `ReviewTitle`, `Review`, `Name`, `DateofReview`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 2, 'Good Restaurent', 'Amazing service and staff', 'Manav', '2021-10-21 17:59:13', 'Rejected', 'Review Reject', '2021-10-07 06:48:48'),
(2, 1, 'Great Product', 'nice product I have great expierince', 'manika', '2021-08-12 07:43:48', 'Review Accept', 'Review Accept', '2021-08-12 07:15:07'),
(3, 3, 'Great Expierence', 'nice product', 'manish', '2021-08-12 11:33:42', 'Review Reject', 'Review Reject', '2021-08-12 07:15:07'),
(4, 2, 'test', 'This is for testing Purpose', 'test', '2021-08-25 17:03:31', 'Review Accept', 'Review Accept', '2021-08-25 16:54:56'),
(6, 4, 'Excellent service', 'I am very Happy with the Services', 'Bhanu', '2021-10-21 17:58:50', NULL, NULL, '2021-10-08 06:00:07'),
(7, 7, 'Best Mobile Shop', 'This is the best mobile shop', 'Rahul', '2021-10-21 17:58:36', 'Approved', 'Review Accept', '2021-10-21 17:52:38'),
(8, 7, 'Excellent Service', 'They are providing excellent Service', 'John Doe', '2021-10-22 01:06:08', NULL, NULL, '2021-10-22 01:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `MobileNumber`, `Password`, `RegDate`) VALUES
(1, 'John Doe', 6465465465, '202cb962ac59075b964b07152d234b70', '2021-09-29 05:59:07'),
(2, 'Sarita Pandey', 7987987987, 'f925916e2754e5e03f75dd58a5733251', '2021-09-29 05:59:30'),
(6, 'Anuj kumar Singh', 1234567890, 'f925916e2754e5e03f75dd58a5733251', '2021-10-21 17:47:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Category` (`Category`),
  ADD KEY `CreationDate` (`CreationDate`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbllisting`
--
ALTER TABLE `tbllisting`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userid` (`UserID`),
  ADD KEY `catid` (`Category`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblreview`
--
ALTER TABLE `tblreview`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ListingID` (`ListingID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbllisting`
--
ALTER TABLE `tbllisting`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblreview`
--
ALTER TABLE `tblreview`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbllisting`
--
ALTER TABLE `tbllisting`
  ADD CONSTRAINT `catid` FOREIGN KEY (`Category`) REFERENCES `tblcategory` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `userid` FOREIGN KEY (`UserID`) REFERENCES `tbluser` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblreview`
--
ALTER TABLE `tblreview`
  ADD CONSTRAINT `listingid` FOREIGN KEY (`ListingID`) REFERENCES `tbllisting` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
