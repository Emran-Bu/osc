-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2021 at 03:52 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_tb`
--

CREATE TABLE `admin_login_tb` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin_login_tb`
--

INSERT INTO `admin_login_tb` (`a_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'Emran', 'admin@osc.com', 'admin'),
(2, 'Eshan', 'eshan@osc.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `asset_tb`
--

CREATE TABLE `asset_tb` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `p_date` date NOT NULL,
  `p_ava` int(11) NOT NULL,
  `p_total` int(11) NOT NULL,
  `p_org_cost` int(11) NOT NULL,
  `p_sell_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `asset_tb`
--

INSERT INTO `asset_tb` (`p_id`, `p_name`, `p_date`, `p_ava`, `p_total`, `p_org_cost`, `p_sell_cost`) VALUES
(4, 'Mobile', '2021-09-04', 8, 13, 10000, 12000),
(5, 'Laptop', '2021-09-03', 11, 15, 38000, 45000),
(6, 'Mic', '2021-09-04', 10, 14, 1500, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `assign_work_tb`
--

CREATE TABLE `assign_work_tb` (
  `assign_id` int(11) NOT NULL,
  `requester_id` int(11) NOT NULL,
  `assign_info` text COLLATE utf8_bin NOT NULL,
  `assign_desc` text COLLATE utf8_bin NOT NULL,
  `assign_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `assign_add1` text COLLATE utf8_bin NOT NULL,
  `assign_add2` text COLLATE utf8_bin NOT NULL,
  `assign_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `assign_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `assign_zip` int(11) NOT NULL,
  `assign_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `assign_mobile` bigint(20) NOT NULL,
  `request_date` varchar(60) COLLATE utf8_bin NOT NULL,
  `assign_tech` varchar(60) COLLATE utf8_bin NOT NULL,
  `assign_date` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assign_work_tb`
--

INSERT INTO `assign_work_tb` (`assign_id`, `requester_id`, `assign_info`, `assign_desc`, `assign_name`, `assign_add1`, `assign_add2`, `assign_city`, `assign_state`, `assign_zip`, `assign_email`, `assign_mobile`, `request_date`, `assign_tech`, `assign_date`) VALUES
(1, 15, 'Laptop Servicing', 'Processor Not Working', 'Emran', 'H-11, R-12, S-12,', 'Uttara,Dhaka', 'Dhaka', 'Bangladesh', 5451, 'admin@osc.com', 17458721, '12-08-2021', 'Nasir', '2021-08-31'),
(11, 16, 'Mobile Servicing', 'Mother board change', 'Ehav', 'h-1,r-12,s-3', 'mirpur, dhaka', 'Dinajpur', 'Bangladesh', 5210, 'ehav@osc.com', 1245875852, '2021-08-25', 'Arman', '2021-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `requester_login_tb`
--

CREATE TABLE `requester_login_tb` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `requester_login_tb`
--

INSERT INTO `requester_login_tb` (`r_id`, `r_name`, `r_email`, `r_password`) VALUES
(38, 'Emran', 'admin@osc.com', 'admin'),
(39, 'Ehav', 'ehav@osc.com', '123456'),
(40, 'Maliha', 'maliha@gmail.com', '123456'),
(42, 'Sayma', 'sayma@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sell_product_tb`
--

CREATE TABLE `sell_product_tb` (
  `s_c_id` int(11) NOT NULL,
  `s_c_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `s_c_add` varchar(60) COLLATE utf8_bin NOT NULL,
  `s_c_mobile` bigint(20) NOT NULL,
  `s_p_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `s_p_quan` int(11) NOT NULL,
  `s_p_each_price` int(11) NOT NULL,
  `s_p_total_price` int(11) NOT NULL,
  `s_p_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sell_product_tb`
--

INSERT INTO `sell_product_tb` (`s_c_id`, `s_c_name`, `s_c_add`, `s_c_mobile`, `s_p_name`, `s_p_quan`, `s_p_each_price`, `s_p_total_price`, `s_p_date`) VALUES
(1, 'Emran Hasan', 'Dinajpur', 1766989707, 'Mic', 2, 2000, 4000, '2021-09-04'),
(2, 'Emran Hasan', 'Dinajpur', 1766989707, 'Laptop', 1, 45000, 45000, '2021-09-03'),
(3, 'Emran Hasan', 'Dinajpur', 1766989707, 'Mobile', 1, 12000, 12000, '2021-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `submit_requester_tb`
--

CREATE TABLE `submit_requester_tb` (
  `requester_id` int(11) NOT NULL,
  `requester_info` text COLLATE utf8_bin NOT NULL,
  `requester_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_add1` text COLLATE utf8_bin NOT NULL,
  `requester_add2` text COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_zip` int(11) NOT NULL,
  `requester_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(20) NOT NULL,
  `requester_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `submit_requester_tb`
--

INSERT INTO `submit_requester_tb` (`requester_id`, `requester_info`, `requester_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `requester_date`) VALUES
(20, 'Mouse Need', 'I need a Mouse', 'Sayma', 'H-11, R-12, ', 'S-13, Uttara, Dhaka-1230', 'Dhaka', 'Bangladesh', 5210, 'sayma@gmail.com', 1545878, '2021-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `technician_tb`
--

CREATE TABLE `technician_tb` (
  `tech_id` int(11) NOT NULL,
  `tech_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `tech_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `tech_mobile` bigint(20) NOT NULL,
  `tech_email` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `technician_tb`
--

INSERT INTO `technician_tb` (`tech_id`, `tech_name`, `tech_city`, `tech_mobile`, `tech_email`) VALUES
(10, 'Nasir', 'Tangail', 123456, 'nasir@gmail.com'),
(11, 'Ishak Ali', 'Bogura', 4514511, 'ishak@gmail.com'),
(12, 'jakir', 'Barisal', 656656, 'jakir@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login_tb`
--
ALTER TABLE `admin_login_tb`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `asset_tb`
--
ALTER TABLE `asset_tb`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `assign_work_tb`
--
ALTER TABLE `assign_work_tb`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `requester_login_tb`
--
ALTER TABLE `requester_login_tb`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `sell_product_tb`
--
ALTER TABLE `sell_product_tb`
  ADD PRIMARY KEY (`s_c_id`);

--
-- Indexes for table `submit_requester_tb`
--
ALTER TABLE `submit_requester_tb`
  ADD PRIMARY KEY (`requester_id`);

--
-- Indexes for table `technician_tb`
--
ALTER TABLE `technician_tb`
  ADD PRIMARY KEY (`tech_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login_tb`
--
ALTER TABLE `admin_login_tb`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `asset_tb`
--
ALTER TABLE `asset_tb`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assign_work_tb`
--
ALTER TABLE `assign_work_tb`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `requester_login_tb`
--
ALTER TABLE `requester_login_tb`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sell_product_tb`
--
ALTER TABLE `sell_product_tb`
  MODIFY `s_c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submit_requester_tb`
--
ALTER TABLE `submit_requester_tb`
  MODIFY `requester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `technician_tb`
--
ALTER TABLE `technician_tb`
  MODIFY `tech_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
