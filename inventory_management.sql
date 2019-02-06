-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2019 at 03:31 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(10) NOT NULL,
  `purchase_receipt_id` int(11) NOT NULL,
  `batch_product_id` int(10) NOT NULL,
  `product_unit` varchar(100) NOT NULL,
  `product_rate` int(100) NOT NULL,
  `product_sale_rate` text NOT NULL,
  `product_mrp` int(11) NOT NULL,
  `product_quantity` int(100) NOT NULL,
  `product_expiry` date NOT NULL,
  `product_barcode_no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `purchase_receipt_id`, `batch_product_id`, `product_unit`, `product_rate`, `product_sale_rate`, `product_mrp`, `product_quantity`, `product_expiry`, `product_barcode_no`) VALUES
(25, 18, 6, '12 gm', 25, '', 30, 44, '2018-12-31', '62018123112gm'),
(26, 18, 10, '100 ml', 200, '', 250, 41, '2018-12-31', '1020181231100ml'),
(27, 19, 6, '100 gm', 20, '', 25, 21, '2018-12-31', '620181231100gm'),
(28, 20, 6, '10 gm', 10, '', 12, 29, '2018-12-31', '62018123110gm'),
(29, 20, 7, '20 gm', 29, '', 35, 9, '2018-12-31', '72018123120gm'),
(30, 21, 10, '10 gm', 20, '', 22, 10, '2018-12-31', '102018123110gm'),
(31, 22, 7, '10 gm', 10, '', 10, 1, '2018-12-31', '72018123110gm'),
(32, 1, 6, '10 gm', 10, '', 10, 0, '2019-12-31', '62019123110gm'),
(33, 1, 7, '20 gm', 20, '', 10, 0, '2019-12-31', '72019123120gm');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_company_name` varchar(100) NOT NULL,
  `customer_contact_no` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_gst_no` varchar(100) NOT NULL,
  `customer_pan_no` varchar(100) NOT NULL,
  `customer_credit_days` int(100) NOT NULL,
  `customer_credit_limit` int(100) NOT NULL,
  `customer_credit_amount` int(100) NOT NULL,
  `customer_delete_flag` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_company_name`, `customer_contact_no`, `customer_email`, `customer_address`, `customer_gst_no`, `customer_pan_no`, `customer_credit_days`, `customer_credit_limit`, `customer_credit_amount`, `customer_delete_flag`) VALUES
(1, 'junaid khan', 'sun pharma', '9987037474', 'junaid@gmail.com', 'tilaknagar,sakinak,mumbai-72', 'aaxp254678cn', 'abcdegf123455', 30, 10000, 0, 0),
(2, 'rakesh yadav', 'milkman.com', '9000000001', 'rakesh@gmail.com', 'chiragnagar,ghatkopar-west mumbai-400070', 'axo1223456pnbv', 'qwervfshgdfst', 60, 50000, 0, 0),
(3, 'saif shaikh', 'travels pvt ltd', '9000000002', 'saif@gmail.com', 'room no 2, chiraganagar, ghatkopar west-400072', 'gnjkjh12345q', 'gcbvxv1234x', 15, 5000, 0, 0),
(4, 'asif khan', 'taxiwala pvt ltd', '9000000003', 'asif@gmail.com', 'ghatkopar west', 'gts12134xvz', 'fgzxx3223', 30, 15, 0, 0),
(5, 'arman khan', 'doctor pvt ltd', '9000000004', 'arman@gmail.com', 'sakinaka', 'fghg121m', 'hfghg123', 90, 50000000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(100) NOT NULL,
  `employee_first_name` varchar(100) NOT NULL,
  `employee_last_name` varchar(100) NOT NULL,
  `employee_email` varchar(100) NOT NULL,
  `employee_contact_no` varchar(100) NOT NULL,
  `employee_password` varchar(100) NOT NULL,
  `employee_designation` varchar(100) NOT NULL,
  `employee_joining_date` date NOT NULL,
  `employee_salary` int(100) NOT NULL,
  `employee_address` varchar(100) NOT NULL,
  `employee_aadhar` bigint(100) NOT NULL,
  `employee_delete_flag` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_first_name`, `employee_last_name`, `employee_email`, `employee_contact_no`, `employee_password`, `employee_designation`, `employee_joining_date`, `employee_salary`, `employee_address`, `employee_aadhar`, `employee_delete_flag`) VALUES
(1, 'rajdeep', 'rana', 'rajdeep@gmail.com', '8000000001', '12345', 'admin', '2018-08-16', 20000, 'asalpha mumbai', 12344567, 0),
(2, 'imran', 'shaikh', 'imran@gmail.com', '8000000002', '12345', 'Executive', '2018-08-16', 10000, 'sakinaka mumbai', 23456, 0),
(3, 'mohid', 'kazi', 'mohid@gmail.com', '8000000003', '12345', 'Executive', '2018-08-16', 10000, 'vashi navi mumbai', 9876543, 0),
(4, 'rehan', 'idrisi', 'rehan@gmail.com', '8000000004', '12345', 'Manager', '2018-08-16', 10000, 'dongri mumbai', 8765431, 0),
(5, 'saqib', 'ghatte', 'saqib@gmail.com', '8000000005', '12345', 'Senior Executive', '2018-08-16', 10000, 'dongri mumbai', 4567890, 0);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(100) NOT NULL,
  `expense_employee_id` int(100) NOT NULL,
  `expense_type` varchar(100) NOT NULL,
  `expense_name` varchar(100) NOT NULL,
  `expense_comment` text NOT NULL,
  `expense_amount` int(100) NOT NULL,
  `expense_date` date NOT NULL,
  `expense_delete_flag` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `expense_employee_id`, `expense_type`, `expense_name`, `expense_comment`, `expense_amount`, `expense_date`, `expense_delete_flag`) VALUES
(20, 4, 'CashMemo', 'stationary', 'being cash paid to mr imran', 10000, '2018-12-12', 0),
(21, 0, 'CashMemo', 'stationary', 'being cash paid to mr imran', 100, '2018-12-11', 0),
(22, 0, 'Payment', 'fffdthgfgh', 'ss', 500, '2018-12-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `SR_NO` int(11) NOT NULL,
  `details` text NOT NULL,
  `date,time` datetime NOT NULL,
  `notification_flag` text NOT NULL,
  `read_flag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`SR_NO`, `details`, `date,time`, `notification_flag`, `read_flag`) VALUES
(17, 'rajdeep rana(1) deleted Sales Receipt No 73', '2019-01-02 20:46:52', ',rajdeep,imran,mohid', ''),
(18, 'rajdeep rana(1) deleted Sales Receipt No 71', '2019-01-02 20:47:23', ',rajdeep,imran,mohid', ''),
(19, 'rajdeep rana(1) deleted Sales Receipt No 69', '2019-01-10 19:51:38', '', ''),
(20, 'rajdeep rana(1) deleted Sales Receipt No 68', '2019-01-10 19:51:54', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(100) NOT NULL,
  `product_tax` float NOT NULL,
  `product_delete_flag` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_category`, `product_type`, `product_brand`, `product_name`, `product_description`, `product_tax`, `product_delete_flag`) VALUES
(6, 'Baby & Kids', 'Diapers & Wipes', 'PAMPERS', 'PAMPERS BABY DIAPERS & WIPES', '', 12, 0),
(7, 'Packaged Food', 'Biscuits & Cookies', 'GOODDAY', 'GOODDAY COOKIES', '', 5, 0),
(10, 'Medicines', 'Drops', 'CIPLA', 'CIPLA EYE DROP', '', 28, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(100) NOT NULL,
  `purchase_receipt_id` int(100) NOT NULL,
  `purchase_product_id` int(100) NOT NULL,
  `purchase_quantity` int(100) NOT NULL,
  `purchase_rate` float NOT NULL,
  `purchase_amount` float NOT NULL,
  `purchase_mrp` float NOT NULL,
  `purchase_tax` float NOT NULL,
  `purchase_expiry` date NOT NULL,
  `purchase_unit` text NOT NULL,
  `purchase_product_name` text NOT NULL,
  `purchase_barcode_no` text NOT NULL,
  `purchase_product_tax_percent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_receipt`
--

CREATE TABLE `purchase_receipt` (
  `purchase_receipt_id` int(100) NOT NULL,
  `purchase_receipt_vendor_id` int(100) NOT NULL,
  `purchase_receipt_employee_id` int(100) NOT NULL,
  `purchase_receipt_Invoice_no` int(100) NOT NULL,
  `purchase_receipt_payment_mode` varchar(100) NOT NULL,
  `purchase_receipt_cheque_no` int(100) NOT NULL,
  `purchase_receipt_bank` text NOT NULL,
  `purchase_receipt_amount` float NOT NULL,
  `purchase_receipt_date` date NOT NULL,
  `purchase_receipt_person_name` text NOT NULL,
  `purchase_receipt_tax` float NOT NULL,
  `purchase_receipt_grand_total` float NOT NULL,
  `purchase_receipt_delete_flag` int(11) NOT NULL DEFAULT '0',
  `deleted_item_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(100) NOT NULL,
  `sales_receipt_id` int(100) UNSIGNED NOT NULL,
  `sales_product_id` int(100) UNSIGNED NOT NULL,
  `sales_quantity` int(100) UNSIGNED NOT NULL,
  `sales_rate` int(100) UNSIGNED NOT NULL,
  `sales_amount` int(100) UNSIGNED NOT NULL,
  `sales_tax` int(100) UNSIGNED NOT NULL,
  `sales_barcode_no` text NOT NULL,
  `sales_unit` varchar(100) NOT NULL,
  `sales_product_name` varchar(100) NOT NULL,
  `sales_product_tax_percent` int(100) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `sales_receipt_id`, `sales_product_id`, `sales_quantity`, `sales_rate`, `sales_amount`, `sales_tax`, `sales_barcode_no`, `sales_unit`, `sales_product_name`, `sales_product_tax_percent`) VALUES
(38, 63, 10, 1, 250, 250, 55, '1020181231100ml', '100 ml', 'CIPLA EYE DROP', 28),
(39, 63, 6, 1, 12, 12, 1, '62018123110gm', '10 gm', 'PAMPERS BABY DIAPERS & WIPES', 12),
(40, 63, 7, 1, 35, 35, 2, '72018123120gm', '20 gm', 'GOODDAY COOKIES', 5),
(41, 64, 6, 1, 30, 30, 3, '62018123112gm', '12 gm', 'PAMPERS BABY DIAPERS & WIPES', 12),
(42, 64, 10, 10, 250, 2500, 547, '1020181231100ml', '100 ml', 'CIPLA EYE DROP', 28),
(43, 65, 6, 8, 30, 240, 26, '62018123112gm', '12 gm', 'PAMPERS BABY DIAPERS & WIPES', 12),
(45, 67, 6, 5, 30, 150, 16, '62018123112gm', '12 gm', 'PAMPERS BABY DIAPERS & WIPES', 12),
(46, 68, 6, 8, 30, 240, 26, '62018123112gm', '12 gm', 'PAMPERS BABY DIAPERS & WIPES', 12),
(47, 69, 6, 18, 30, 540, 58, '62018123112gm', '12 gm', 'PAMPERS BABY DIAPERS & WIPES', 12),
(48, 70, 6, 1, 25, 25, 3, '620181231100gm', '100 gm', 'PAMPERS BABY DIAPERS & WIPES', 12),
(49, 71, 10, 1, 250, 250, 55, '1020181231100ml', '100 ml', 'CIPLA EYE DROP', 28),
(50, 72, 10, 3, 250, 750, 164, '1020181231100ml', '100 ml', 'CIPLA EYE DROP', 28),
(51, 73, 6, 2, 30, 60, 6, '62018123112gm', '12 gm', 'PAMPERS BABY DIAPERS & WIPES', 12),
(52, 74, 6, 1, 25, 25, 3, '620181231100gm', '100 gm', 'PAMPERS BABY DIAPERS & WIPES', 12),
(53, 75, 6, 1, 25, 25, 3, '620181231100gm', '100 gm', 'PAMPERS BABY DIAPERS & WIPES', 12);

-- --------------------------------------------------------

--
-- Table structure for table `sales_receipt`
--

CREATE TABLE `sales_receipt` (
  `sales_receipt_id` int(100) NOT NULL,
  `sales_receipt_date` date NOT NULL,
  `sales_receipt_customer_id` int(100) NOT NULL,
  `sales_receipt_employee_id` int(100) NOT NULL,
  `sales_receipt_invoice_no` int(100) NOT NULL,
  `sales_receipt_payment_mode` varchar(100) NOT NULL,
  `sales_receipt_cheque_no` int(100) DEFAULT NULL,
  `sales_receipt_bank_details` text NOT NULL,
  `sales_receipt_amount` float NOT NULL,
  `sales_receipt_person_name` text NOT NULL,
  `sales_receipt_tax` float NOT NULL,
  `sales_receipt_grand_total` float NOT NULL,
  `sales_receipt_delete_flag` int(11) NOT NULL DEFAULT '0',
  `deleted_item_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_receipt`
--

INSERT INTO `sales_receipt` (`sales_receipt_id`, `sales_receipt_date`, `sales_receipt_customer_id`, `sales_receipt_employee_id`, `sales_receipt_invoice_no`, `sales_receipt_payment_mode`, `sales_receipt_cheque_no`, `sales_receipt_bank_details`, `sales_receipt_amount`, `sales_receipt_person_name`, `sales_receipt_tax`, `sales_receipt_grand_total`, `sales_receipt_delete_flag`, `deleted_item_details`) VALUES
(63, '2018-12-25', 1, 1, 0, 'Cash', 0, '', 239.35, 'rajdeep', 57.65, 297, 0, '25-12-2018 01:33 pm rajdeep rana(1)'),
(64, '2018-12-25', 4, 1, 0, 'Cash', 0, '', 1979.89, 'rajdeep', 550.11, 2530, 0, '26-12-2018 03:53 pm rajdeep rana(1)'),
(65, '2018-12-26', 2, 1, 0, 'Cash', 0, '', 214.32, 'aaaa', 25.68, 240, 0, '26-12-2018 03:53 pm rajdeep rana(1)'),
(67, '2018-12-26', 3, 1, 0, 'Cash', 0, '', 133.95, 'aaaa', 16.05, 150, 0, '26-12-2018 03:51 pm rajdeep rana(1)'),
(68, '2018-12-26', 2, 1, 0, 'Cash', 0, '', 214.32, 'aaaaaaaaa', 25.68, 240, 1, '10-01-2019 07:51 pm rajdeep rana(1)'),
(69, '2018-12-26', 3, 1, 0, 'Cash', 0, '', 482.22, 'x', 57.78, 540, 1, '10-01-2019 07:51 pm rajdeep rana(1)'),
(70, '2018-12-26', 4, 2, 0, 'Cash', 0, '', 22.32, 'aa', 2.68, 25, 1, '10-01-2019 07:50 pm rajdeep rana(1)'),
(71, '2018-12-27', 4, 3, 0, 'Cash', 0, '', 195.31, 'qa', 54.69, 250, 1, '02-01-2019 08:47 pm rajdeep rana(1)'),
(72, '2018-12-27', 8, 2, 0, 'Cash', 0, '', 585.93, 'hhh', 164.07, 750, 0, ''),
(73, '2018-12-30', 1, 1, 0, 'Cash', 0, '', 53.58, '', 6.42, 60, 1, '02-01-2019 08:46 pm rajdeep rana(1)'),
(74, '2018-12-30', 3, 1, 0, 'Cash', 0, '', 22.32, '', 2.68, 25, 1, '02-01-2019 08:44 pm rajdeep rana(1)'),
(75, '2018-12-30', 2, 2, 0, 'Cash', 0, '', 22.32, '', 2.68, 25, 1, '02-01-2019 08:41 pm rajdeep rana(1)');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendors_id` int(100) NOT NULL,
  `vendor_company_name` varchar(100) NOT NULL,
  `vendor_person_name` varchar(100) NOT NULL,
  `vendor_contact_no` varchar(100) NOT NULL,
  `vendor_email` varchar(100) NOT NULL,
  `vendor_address` varchar(255) NOT NULL,
  `vendor_gst_no` varchar(100) NOT NULL,
  `vendor_pan_no` varchar(100) NOT NULL,
  `vendor_credit_amount` varchar(100) NOT NULL,
  `vendor_delete_flag` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendors_id`, `vendor_company_name`, `vendor_person_name`, `vendor_contact_no`, `vendor_email`, `vendor_address`, `vendor_gst_no`, `vendor_pan_no`, `vendor_credit_amount`, `vendor_delete_flag`) VALUES
(1, 'livetech pvt ltd', 'prashant', '1234567890', 'livetech@gmail.com', 'laminton road mumbai-72', 'aaty5vv6767812', '2345ccf566', '0', 0),
(2, 'best computer solutions', 'babu bhai', '5675675675', 'bcs@gmail.com', 'sakinaka mumbai 72', '567fgfgxvc7776', 'dfg456ghhj', '0', 0),
(3, 'e-frontline pvt ltd', 'imran bhai', '8889990001', 'efront@gmail.com', 'khadi sakinaka 72', '567rty234we', 'bn456vb', '0', 0),
(4, 'excellent computers', 'rizwan', '7778889990', 'excellent@gmail.com', 'asalpha ghatkopar ', '098fghj765gfd', 'oiumnbv676', '0', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`),
  ADD KEY `batch_product_id` (`batch_product_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`SR_NO`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `purchase_receipt`
--
ALTER TABLE `purchase_receipt`
  ADD PRIMARY KEY (`purchase_receipt_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `sales_receipt`
--
ALTER TABLE `sales_receipt`
  ADD PRIMARY KEY (`sales_receipt_id`),
  ADD KEY `sales_receipt_customer_id` (`sales_receipt_customer_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendors_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `SR_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_receipt`
--
ALTER TABLE `purchase_receipt`
  MODIFY `purchase_receipt_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `sales_receipt`
--
ALTER TABLE `sales_receipt`
  MODIFY `sales_receipt_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendors_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`batch_product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
